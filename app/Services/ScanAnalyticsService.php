<?php

namespace App\Services;

use App\Models\Site;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ScanAnalyticsService
{
    public function dailyAnalytics($scanQuery, $startDate, $endDate): array
    {
        $dailyScanCountPerSite = $this->dailyScanCountPerSite(clone $scanQuery, $startDate, $endDate);
        $actualVsExpected = $this->dailyScanCountActualVSExpected(clone $scanQuery, $startDate, $endDate);
        $actualVsExpectedPerSites = $this->dailyScanCountPerSiteAndActualVsExpected(clone $scanQuery);
//
        return ['siteDataDaily' => $dailyScanCountPerSite, 'dailyScanCountActualVSExpected' => $actualVsExpected, 'dailyScanCountPerSiteAndActualVsExpected' => $actualVsExpectedPerSites];
    }

    private function dailyScanCountActualVSExpected($scanQuery, $startDate, $endDate): array
    {

        $totalExpectedScans = Site::query()
            ->select(DB::raw('SUM(sites.maximum_number_of_rounds * sites.number_of_tags) as total_expected_scan'))
            ->first()->total_expected_scan;

        $scanCountsDailyPerSite = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select(
                DB::raw('DATE(scans.scan_date) as date'),
                DB::raw('COUNT(scans.id) as actual_scan')
            )
            ->groupBy(DB::raw('DATE(scans.scan_date)'))
            ->orderBy('scan_date')
            ->get();

        $labels = $this->generateDateRange($startDate, $endDate);
        $data = [
            'expected_scan' => array_fill(0, count($labels), $totalExpectedScans),
            'actual_scan' => array_fill(0, count($labels), 0),
        ];
        foreach ($scanCountsDailyPerSite as $item) {
            $dateIndex = array_search($item->date, $labels);
            if ($dateIndex !== false) {
                $data['expected_scan'][$dateIndex] = $totalExpectedScans;
                $data['actual_scan'][$dateIndex] = $item->actual_scan;
            }
        }

        return [
            'labels' => $labels,
            'expected_scan' => $data['expected_scan'],
            'actual_scan' => $data['actual_scan']
        ];
    }

    private function dailyScanCountPerSite($scanQuery, $startDate, $endDate): array
    {
        $scanQuery = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select(
                'sites.name as site_name',
                'site_id',
                DB::raw('DATE(scan_date) as date'),
                DB::raw('COUNT(scans.id) as scan_count')
            )->groupBy('sites.name', 'site_id', DB::raw('DATE(scans.scan_date)'))
            ->orderBy('scan_date');
        $siteDataDaily = [];
        $labels = $this->generateDateRange($startDate, $endDate);
        $scanCountsDailyPerSite = $scanQuery->get();
        foreach ($scanCountsDailyPerSite as $scan) {
            $siteName = $scan->site_name;
            $count = $scan->scan_count;
            $date = $scan->date;

            // Check if the site exists in the $siteDataDaily array
            if (!isset($siteDataDaily[$siteName])) {
                $siteDataDaily[$siteName] = [
                    'label' => $siteName,
                    'data' => array_fill(0, count($labels), 0), // Initialize with zeros to maintain date consistency
                ];
            }
            $dateIndex = array_search($date, $labels);
            if ($dateIndex !== false) {
                $siteDataDaily[$siteName]['data'][$dateIndex] = $count;
            }
        }
        return ['labels' => $labels, 'items' => array_values($siteDataDaily)];
    }

    private function dailyScanCountPerSiteAndActualVsExpected($scanQuery)
    {
        $scanCountsDailyPerSitePerActualExpected = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select(
                'site_id',
                'sites.name as site_name', DB::raw('DATE(scan_date) as date'),
                DB::raw('COUNT(*) as actual_scan'),
                DB::raw('(sites.maximum_number_of_rounds * sites.number_of_tags) as expected_scan')
            )
            ->groupBy('sites.name', 'site_id', DB::raw('DATE(scan_date)'), 'sites.maximum_number_of_rounds', 'sites.number_of_tags')
            ->orderBy('scan_date')->get();
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
            ->select('sites.name as site_name', 'site_id', DB::raw("TO_CHAR(scan_date, 'YYYY-MM') as month"), DB::raw('COUNT(*) as scan_count'))
            ->orderByRaw('month')
            ->groupBy('sites.name', 'site_id', DB::raw("TO_CHAR(scan_date, 'YYYY-MM')"))
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


        // Step 2: Calculate the total expected scans only for the sites involved in the scans
        $totalExpectedScans = Site::query()
            ->select(DB::raw('SUM(sites.maximum_number_of_rounds * sites.number_of_tags) as total_expected_scan'))
            ->first()->total_expected_scan;

        $scanCountsMonthlyPerSite = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select(
                DB::raw("TO_CHAR(scan_date, 'YYYY-MM') as month"),
                DB::raw('COUNT(scans.id) as actual_scan')
            )
            ->groupBy("month")
            ->orderBy('month')
            ->get();

        $data = [];
        $labels = [];
        foreach ($scanCountsMonthlyPerSite as $item) {
            $month = Carbon::parse($item->month . "-01")->endOfMonth();
            $labels[] = $month->format('F-Y');
            $data['expected_scan'][] = $totalExpectedScans * $month->daysInMonth;
            $data['actual_scan'][] = $item->actual_scan;
        }
        return ['labels' => $labels, 'data' => $data];
    }

    private function monthlyScanCountPerSiteAndActualVsExpected($scanQuery)
    {
//        $totalExpectedScans = Site::query()
//            ->select(DB::raw('SUM(sites.maximum_number_of_rounds * sites.number_of_tags) as total_expected_scan'))
//            ->first()->total_expected_scan;
        $scanCountsMonthlyPerSitePerActualExpected = $scanQuery
            ->join('sites', 'scans.site_id', '=', 'sites.id')
            ->select(
                'sites.name as site_name',
                'site_id',
                DB::raw("TO_CHAR(scan_date, 'YYYY-MM') as month"),
                DB::raw('COUNT(scans.id) as actual_scan'),
                DB::raw('(sites.maximum_number_of_rounds * sites.number_of_tags) as expected_scan')
            )->groupBy('sites.name', 'site_id', DB::raw("TO_CHAR(scan_date, 'YYYY-MM')"), 'sites.maximum_number_of_rounds', 'sites.number_of_tags')
            ->orderByRaw('month')->get();
        foreach ($scanCountsMonthlyPerSitePerActualExpected as $item) {
            $month = Carbon::parse($item->month . "-01")->endOfMonth();
            $item->expected_scan = $item->expected_scan * $month->daysInMonth;
        }
        return $scanCountsMonthlyPerSitePerActualExpected->groupBy('site_name');
    }

    private function generateDateRange($startDate, $endDate): array
    {
        $dates = [];
        $currentDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        while ($currentDate <= $endDate) {
            $dates[] = date('Y-m-d', $currentDate);
            $currentDate = strtotime("+1 day", $currentDate);
        }

        return $dates;
    }

}
