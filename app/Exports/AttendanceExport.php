<?php

namespace App\Exports;

use App\QueryFilters\AttendanceActionTypeFilter;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\DateFilter;
use App\QueryFilters\SiteIdFilter;
use App\QueryFilters\StatusFilter;
use App\Repositories\Eloquent\Repository\AttendanceRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class AttendanceExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct(
        private readonly AttendanceRepository $attendanceRepository,
    )
    {
    }

    public function headings(): array
    {
        return [
            'Date',
            'Time',
            'Action Type',
            'Site Name',
            'Profile Name',
            'Distance',
            'Proximity',
            'Latitude',
            'Longitude'
        ];
    }

    public function map($row): array
    {
        return [
            Carbon::parse($row->attendance_date)->format('d-m-Y'),
            Carbon::parse($row->attendance_time)->format('g:i A'),
            strtoupper(Str::replace('_', ' ', $row->action_type)),
            $row->site->name,
            $row->user->first_name . ' ' . $row->user->last_name,
            $row->distance . ' KM',
            $row->proximity,
            $row->latitude,
            $row->longitude,
        ];
    }

    public function query()
    {
        $pipes = [
            new DateFilter('attendance_date'),
            CompanyIdFilter::class,
            SiteIdFilter::class,
            StatusFilter::class,
            AttendanceActionTypeFilter::class,
        ];

        $attendanceQuery = $this->attendanceRepository->modelQuery()->search();
        $attendanceQuery = $attendanceQuery->latest('attendance_date_time')->with(['company', 'site', 'user']);
        return constructPipes($attendanceQuery, $pipes);
    }
}
