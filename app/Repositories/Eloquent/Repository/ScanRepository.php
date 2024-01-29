<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Scan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ScanRepository extends BaseRepository
{
    public function __construct(Scan $model)
    {
        parent::__construct($model);
    }

    public function scanByMonthYear(int $year, int $startMonth = 1, int $endMonth = 12)
    {
        $start_date = Carbon::create($year, $startMonth)->toDateTime();
        $end_date = Carbon::create($year, $endMonth)->toDateTime();
        $statsMonthYear = $this->modelQuery()
            ->whereBetween('scan_date', [$start_date, $end_date])
            ->select(DB::raw("DATE_TRUNC('year', scan_date) AS year"), DB::raw("DATE_TRUNC('month', scan_date) as month"), DB::raw('COUNT(*) as total'))
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

