<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScanRequest;
use App\Http\Requests\UpdateScanRequest;
use App\Models\Scan;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\DateFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\ScanRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;

class ScanController extends Controller
{

    public function __construct(
        private readonly ScanRepository $scanRepository,
        private readonly CompanyRepository $companyRepository,
        private readonly SiteRepository $siteRepository,
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pipes = [
            new DateFilter('scan_date'),
            CompanyIdFilter::class,
            SiteIdFilter::class,
        ];



//        $companies =  $this->companyRepository->all();
        $sites =  $this->siteRepository->all();
        $scanQuery = $this->scanRepository->modelQuery()->search();
        $scanQuery = constructPipes($scanQuery, $pipes);
        $scans = $scanQuery->with(['company', 'site', 'tag'])->latest('scan_date_time')->paginate(request('per_page', 15));
        return view('scan.index', compact('scans', 'sites'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Scan $scan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scan $scan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScanRequest $request, Scan $scan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scan $scan)
    {
        //
    }
}
