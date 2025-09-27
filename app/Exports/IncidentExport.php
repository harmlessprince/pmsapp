<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class IncidentExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct(
        private readonly Builder $incidentQuery,
    )
    {
    }

    public function query()
    {
       return $this->incidentQuery;
    }

    public function headings(): array
    {
        return [
            'Reported By',
            'Type',
            'Region',
            'Site',
            'Comment',
            'Image Url',
            'Date',
            'Time',
        ];
    }

    public function map($row): array
    {
        return [
            $row->reportedBy->first_name . ' ' . $row->reportedBy->last_name,
            strtoupper(Str::replace('_', ' ', $row->type)) == 'STORAGE' ? 'Storage Purpose' : 'Rapid Response',
            $row->site->region->name  ?? 'N/A',
            $row->site->name  ?? 'N/A',
            $row->comment,
            $row->image,
            Carbon::parse($row->attendance_date)->format('d-m-Y'),
            Carbon::parse($row->attendance_time)->format('g:i A'),
        ];
    }
}
