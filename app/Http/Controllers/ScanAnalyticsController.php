<?php

namespace App\Http\Controllers;

use App\Enums\AnalyticsFrequencyEnum;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\DateFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\ScanRepository;
use App\Services\ScanAnalyticsService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ScanAnalyticsController extends Controller
{
    public function __construct(
        private readonly ScanRepository       $scanRepository,
        private readonly ScanAnalyticsService $scanAnalyticsService,
    )
    {
    }

    public function __invoke(Request $request)
    {
        $frequency = $request->query('frequency', 'daily');
        if (request()->query('frequency', 'daily') == 'daily'){
            $defaultStartMonth =  Carbon::now()->subWeeks(4)->format('Y-m-d');
            $defaultEndMonth =  Carbon::now()->format('Y-m-d');
        }else{
            $defaultStartMonth =  Carbon::now()->subMonths(4)->format('Y-m-d');
            $defaultEndMonth =  Carbon::now()->format('Y-m-d');
        }


        $pipes = [
            new DateFilter('scan_date', $defaultStartMonth, $defaultEndMonth),
            CompanyIdFilter::class,
            SiteIdFilter::class,
        ];

        $frequencies = [AnalyticsFrequencyEnum::DAILY->value, AnalyticsFrequencyEnum::MONTHLY->value];
        $scanQuery = $this->scanRepository->modelQuery();
        $scanQuery = constructPipes($scanQuery, $pipes);
        switch ($frequency) {
            case AnalyticsFrequencyEnum::MONTHLY->value:
                $analytics = $this->scanAnalyticsService->monthlyAnalytics($scanQuery);
                $months = generateMonths();
                $view = view('scan.analytics.monthly', compact('frequencies', 'analytics', 'months', 'defaultEndMonth', 'defaultStartMonth'));
                break;
            default:
                $fromDate = request()->query('scan_date_from_date', $defaultStartMonth);
                $toDate = request()->query('scan_date_to_date', $defaultEndMonth);
                if (Carbon::parse($fromDate)->diffInWeeks(Carbon::parse($toDate)) > 4) {
                    $toDate =  Carbon::parse($fromDate)->addWeeks(4)->format('Y-m-d');
                    request()->session()->flash('error', "You can not filter more than 4 weeks(1 month)");
                }
                $analytics = $this->scanAnalyticsService->dailyAnalytics($scanQuery, $fromDate, $toDate);
//                dd($analytics);
                $view = view('scan.analytics.daily', compact('frequencies', 'analytics',  'defaultEndMonth', 'defaultStartMonth'));
        }
        return $view;
    }


}
