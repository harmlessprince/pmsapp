<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AttendanceExport;
use App\Http\Controllers\Controller;
use App\QueryFilters\AttendanceActionTypeFilter;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\DateFilter;
use App\QueryFilters\SiteIdFilter;
use App\QueryFilters\StatusFilter;
use App\Repositories\Eloquent\Repository\AttendanceRepository;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct(
        private readonly AttendanceRepository $attendanceRepository,
        private readonly CompanyRepository    $companyRepository,
        private readonly SiteRepository       $siteRepository,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pipes = [
            new DateFilter('attendance_date'),
            CompanyIdFilter::class,
            SiteIdFilter::class,
            StatusFilter::class,
            AttendanceActionTypeFilter::class,
        ];
        if ($request->query('export') == 'export') {
            $name = 'attendance_report_' . Carbon::now()->format('d-m-Y') . '.xlsx';
            session()->flash('success', 'Attendance exported successfully');
            return (new AttendanceExport($this->attendanceRepository))->download($name);
        }
        $companies =  $this->companyRepository->all();
        $attendanceQuery = $this->attendanceRepository->modelQuery()->search();
        $attendanceQuery = constructPipes($attendanceQuery, $pipes);
        $attendances = $attendanceQuery->latest('attendance_date_time')->with(['company', 'site', 'user'])->paginate(request('per_page', 15));
        return view('admin.attendance.index', compact('attendances', 'companies'));
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
