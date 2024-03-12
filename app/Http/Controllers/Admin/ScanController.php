<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ScansExport;
use App\Http\Controllers\Controller;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\DateFilter;
use App\QueryFilters\SiteIdFilter;
use App\QueryFilters\TagIdFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\ScanRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function __construct(
        private readonly ScanRepository $scanRepository,
        private readonly CompanyRepository $companyRepository,
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $pipes = [
            new DateFilter('scan_date'),
            CompanyIdFilter::class,
            SiteIdFilter::class,
            TagIdFilter::class,
        ];
        if ($request->query('export') == 'export') {
            $name = 'scan_report_' . Carbon::now()->format('d-m-Y') . '.xlsx';
            session()->flash('success', 'Scan exported successfully');
            return (new ScansExport($this->scanRepository))->download($name);
        }
        $companies =  $this->companyRepository->all();
        $scanQuery = $this->scanRepository->modelQuery()->search();
        $scanQuery = constructPipes($scanQuery, $pipes);
        $scans = $scanQuery->with(['company', 'site', 'tag'])->latest('scan_date_time')->paginate(request('per_page', 15));
        return view('admin.scan.index', compact('scans', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
