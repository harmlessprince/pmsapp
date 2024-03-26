<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceAnalyticsService
{
    public function dailyAnalytics(\Illuminate\Database\Eloquent\Builder $attendanceQuery)
    {
        return $attendanceQuery->with(['user', 'site'])
            ->select(
                "user_id",
                DB::raw('MIN(attendance_date_time) as check_in_time'),
                DB::raw('MAX(site_id) as site_id'),
                DB::raw('MAX(attendance_date_time) as check_out_time'),
                DB::raw('MAX(check_in_to_checkout_duration) as check_in_to_checkout_duration'),
                DB::raw('COUNT(*) as total_attendance'),
            )->groupBy('user_id', 'attendance_date');
    }


    public function monthlyAnalytics($attendanceQuery, $monthYear)
    {

        return $attendanceQuery->with(['user', 'site'])
            ->select(
                "user_id",
                DB::raw('MIN(attendance_date_time) as check_in_time'),
                DB::raw('MAX(site_id) as site_id'),
                DB::raw('MAX(attendance_date_time) as check_out_time'),
                DB::raw('SUM(check_in_to_checkout_duration) as check_in_to_checkout_duration'),
//                DB::raw("DATE_TRUNC('year', attendance_date_time) AS year"),
//                DB::raw("DATE_TRUNC('month', attendance_date_time) as month"),
                DB::raw('COUNT(*) as total_attendance'),
            )->groupBy('user_id', DB::raw("DATE_TRUNC('month', attendance_date)"), DB::raw("DATE_TRUNC('year', attendance_date)"));
    }

}
