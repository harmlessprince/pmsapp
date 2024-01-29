<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Attendance;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceRepository extends BaseRepository
{
    public function __construct(Attendance $model)
    {
        parent::__construct($model);
    }

    public function attendanceByMonthYear(int $year, int $startMonth = 1, int $endMonth = 12)
    {
        $start_date = Carbon::create($year, $startMonth)->toDateTime();
        $end_date = Carbon::create($year, $endMonth)->toDateTime();
        $statsMonthYear = $this->modelQuery()
            ->whereBetween('attendance_date', [$start_date, $end_date])
            ->select(DB::raw("DATE_TRUNC('year', attendance_date) AS year"), DB::raw("DATE_TRUNC('month', attendance_date) as month"), DB::raw('COUNT(*) as total'))
            ->groupBy('year', 'month')
            ->get();
        $stats = [];
        $statsMonthYear->each(function ($data) use (&$stats) {
            $monthName = getMonthName(Carbon::parse($data->month)->month, 'F');
            $stats[$monthName] = [
                'name' => $monthName,
                'total' => $data->total
            ];
        });
        return $stats;
    }
}

