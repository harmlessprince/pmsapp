<?php

namespace App\Http\Controllers;

use App\Enums\AnalyticsFrequencyEnum;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\DateFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\AttendanceRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Services\AttendanceAnalyticsService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceAnalyticsController extends Controller
{
    public function __construct(
        private readonly AttendanceRepository       $attendanceRepository,
        private readonly AttendanceAnalyticsService $attendanceAnalyticsService,
        private readonly SiteRepository             $siteRepository,
    )
    {
    }

    public function __invoke(Request $request)
    {
        $frequency = $request->query('frequency', 'daily');
        $startMonthYear = $request->query('month_year', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endMonthYear = Carbon::parse($startMonthYear)->endOfMonth()->format('Y-m-d');

        $defaultStartMonth = Carbon::now()->subMonths(1)->endOfMonth()->format('Y-m-d');

        $defaultEndMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
        $pipes = [
            new DateFilter('attendance_date', $defaultStartMonth, $defaultEndMonth),
            CompanyIdFilter::class,
            SiteIdFilter::class,
        ];
        if ($frequency == AnalyticsFrequencyEnum::MONTHLY->value) {
            $pipes = [
                new DateFilter('attendance_date', $startMonthYear, $endMonthYear),
                CompanyIdFilter::class,
                SiteIdFilter::class,
            ];
        }


        $frequencies = [AnalyticsFrequencyEnum::DAILY->value, AnalyticsFrequencyEnum::MONTHLY->value];
        $sites = $this->siteRepository->all();
        $scanQuery = $this->attendanceRepository->modelQuery()->search();
        $scanQuery = constructPipes($scanQuery, $pipes);

        switch ($frequency) {
            case AnalyticsFrequencyEnum::MONTHLY->value:
                $analytics = $this->attendanceAnalyticsService->monthlyAnalytics($scanQuery, $startMonthYear)->paginate(\request('per_page', 15));
                $months = generateMonths();

                $view = view('attendance.analytics.monthly', compact('frequencies', 'analytics', 'months', 'startMonthYear', 'sites'));
                break;
            default:
                $analytics = $this->attendanceAnalyticsService->dailyAnalytics($scanQuery)->paginate(\request('per_page', 15));
                $view = view('attendance.analytics.daily', compact('frequencies', 'analytics', 'defaultEndMonth', 'defaultStartMonth', 'sites'));
        }
//        dd($analytics);
        return $view;
    }
}
