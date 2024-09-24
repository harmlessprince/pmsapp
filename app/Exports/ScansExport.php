<?php

namespace App\Exports;

use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\DateFilter;
use App\QueryFilters\SiteIdFilter;
use App\QueryFilters\TagIdFilter;
use App\Repositories\Eloquent\Repository\ScanRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ScansExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct(
        private readonly ScanRepository $scanRepository,
    )
    {
    }

    public function headings(): array
    {
        return [
            'Date',
            'Time',
            'Tag Name',
            'Site Name',
            'Gap',
            'Round'
        ];
    }

    public function map($row): array
    {
        return [
            Carbon::parse($row->scan_date)->format('d-m-Y'),
            Carbon::parse($row->scan_time)->format('g:i A'),
            $row->tag->name,
            $row->site->name,
            secondsToHoursMinutes($row->gap_duration),
            $row->round
        ];
    }

    public function query()
    {
        $pipes = [
            new DateFilter('scan_date'),
            CompanyIdFilter::class,
            SiteIdFilter::class,
            TagIdFilter::class,
        ];

        $scanQuery = $this->scanRepository->modelQuery()->search();
        $scanQuery = $scanQuery->with(['company', 'site', 'tag'])->latest('scan_date_time');
        return constructPipes($scanQuery, $pipes);
    }
}
