<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ScanAnalyticsService
{
    public function dailyAnalytics($scanQuery): array
    {
        $dailyScanCountPerSite = $this->dailyScanCountPerSite(clone $scanQuery);
        $actualVsExpected = $this->dailyScanCountActualVSExpected(clone $scanQuery);
        $actualVsExpectedPerSites = $this->dailyScanCountPerSiteAndActualVsExpected(clone $scanQuery);
        return ['siteDataDaily' => $dailyScanCountPerSite, 'dailyScanCountActualVSExpected' => $actualVsExpected, 'dailyScanCountPerSiteAndActualVsExpected' => $actualVsExpectedPerSites];
    }

    private function dailyScanCountActualVSExpected($scanQuery): array
    {
        $scanCountsDailyPerSite = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select(DB::raw('sites.maximum_number_of_rounds * sites.number_of_tags as expected_scan'), DB::raw('DATE(scans.scan_date) as date'), DB::raw('COUNT(*) as actual_scan'))
            ->groupBy('sites.maximum_number_of_rounds', DB::raw('DATE(scans.scan_date)'), 'sites.number_of_tags')
            ->orderBy('scan_date')
            ->get();

        $data = [];
        $labels = [];
        foreach ($scanCountsDailyPerSite as $item) {

            $labels[] = $item->date;
            $data['expected_scan'][] = $item->expected_scan;
            $data['actual_scan'][] = $item->actual_scan;
        }
        return ['labels' => $labels, 'data' => $data];
    }

    private function dailyScanCountPerSite($scanQuery)
    {
        $scanCountsDailyPerSite = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select('sites.name as site_name', DB::raw('DATE(scan_date) as date'), DB::raw('COUNT(*) as scan_count'))
            ->groupBy('sites.name', DB::raw('DATE(scan_date)'))
            ->orderBy('scan_date')
            ->get();
        $siteDataDaily = [];
        $labels = [];
        foreach ($scanCountsDailyPerSite as $scan) {
            $siteName = $scan->site_name;
            $count = $scan->scan_count;
            $date = $scan->date;
            $labels[] = $date;
            // Check if the site exists in the $siteDataMonthly array
            if (!array_key_exists($siteName, $siteDataDaily)) {
                $siteDataDaily[$siteName] = [
                    'label' => $siteName,
                    'data' => [],
                ];

            }

            // Push the count value to the data array for the corresponding site
            $siteDataDaily[$siteName]['data'][] = $count;
        }

        $siteDataDaily = array_values($siteDataDaily);
        $labels = array_unique($labels);
        return ['labels' => $labels, 'items' => $siteDataDaily];
    }

    private function dailyScanCountPerSiteAndActualVsExpected($scanQuery)
    {
        $scanCountsDailyPerSitePerActualExpected = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select(DB::raw('sites.maximum_number_of_rounds * sites.number_of_tags as expected_scan'), 'sites.name as site_name', DB::raw('DATE(scan_date) as date'), DB::raw('COUNT(*) as actual_scan'))
            ->groupBy('sites.maximum_number_of_rounds', 'sites.name', DB::raw('DATE(scan_date)'), 'sites.number_of_tags')
            ->orderBy('scan_date')
            ->get();
        return $scanCountsDailyPerSitePerActualExpected->groupBy('site_name');
    }


    public function monthlyAnalytics($scanQuery)
    {
        $scanCountPerSite = $this->monthlyScanCountPerSite(clone $scanQuery);
        $actualVsExpected = $this->monthlyScanCountActualVSExpected(clone $scanQuery);
        $actualVsExpectedPerSites = $this->monthlyScanCountPerSiteAndActualVsExpected(clone $scanQuery);
        return ['scanCountPerSite' => $scanCountPerSite, 'actualVsExpected' => $actualVsExpected, 'actualVsExpectedPerSites' => $actualVsExpectedPerSites];

    }

    private function monthlyScanCountPerSite($scanQuery): array
    {
        $scanCountsDailyPerSite = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select('sites.name as site_name', DB::raw("TO_CHAR(scan_date, 'YYYY-MM') as month"), DB::raw('COUNT(*) as scan_count'))
            ->groupBy('sites.name', DB::raw("TO_CHAR(scan_date, 'YYYY-MM')"))
//            ->orderBy(DB::raw("TO_CHAR(scan_date, 'YYYY-MM')"))
            ->get();

        $siteData = [];
        $labels = [];
        foreach ($scanCountsDailyPerSite as $scan) {

            $siteName = $scan->site_name;
            $count = $scan->scan_count;
            $date = Carbon::parse($scan->month . "-01")->endOfMonth()->format('F-Y');
            $labels[] = $date;
            // Check if the site exists in the $siteDataMonthly array
            if (!array_key_exists($siteName, $siteData)) {
                $siteData[$siteName] = [
                    'label' => $siteName,
                    'data' => [],
                ];

            }

            // Push the count value to the data array for the corresponding site
            $siteData[$siteName]['data'][] = $count;
        }

        $siteData = array_values($siteData);
        $labels = array_unique($labels);
        return ['labels' => $labels, 'items' => $siteData];
    }

    private function monthlyScanCountActualVSExpected($scanQuery)
    {
        $scanCountsMonthlyPerSite = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select(DB::raw('sites.maximum_number_of_rounds * sites.number_of_tags as expected_scan'), DB::raw("TO_CHAR(scan_date, 'YYYY-MM') as month"), DB::raw('COUNT(*) as actual_scan'))
            ->groupBy('sites.maximum_number_of_rounds', DB::raw("TO_CHAR(scan_date, 'YYYY-MM')"), 'sites.number_of_tags')
//            ->orderBy('scan_date')
            ->get();
        $data = [];
        $labels = [];
        foreach ($scanCountsMonthlyPerSite as $item) {
            $month = Carbon::parse($item->month . "-01")->endOfMonth();
            $labels[] = $month ->format('F-Y');
            $data['expected_scan'][] = $item->expected_scan * $month->daysInMonth;
            $data['actual_scan'][] = $item->actual_scan;
        }
        return ['labels' => $labels, 'data' => $data];
    }

    private function monthlyScanCountPerSiteAndActualVsExpected($scanQuery)
    {
        $scanCountsMonthlyPerSitePerActualExpected = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select(DB::raw('sites.maximum_number_of_rounds * sites.number_of_tags as expected_scan'), 'sites.name as site_name', DB::raw("TO_CHAR(scan_date, 'YYYY-MM') as month"), DB::raw('COUNT(*) as actual_scan'))
            ->groupBy('sites.maximum_number_of_rounds', 'sites.name', DB::raw("TO_CHAR(scan_date, 'YYYY-MM')"), 'sites.number_of_tags')
//            ->orderBy('scan_date')
            ->get();
        foreach ($scanCountsMonthlyPerSitePerActualExpected as $item) {
            $month = Carbon::parse($item->month . "-01")->endOfMonth();
            $item->expected_scan = $item->expected_scan * $month->daysInMonth;
        }
        return $scanCountsMonthlyPerSitePerActualExpected->groupBy('site_name');
    }


}
