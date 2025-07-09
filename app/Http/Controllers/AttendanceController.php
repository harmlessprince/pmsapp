<?php

namespace App\Http\Controllers;

use App\Exports\AttendanceExport;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Attendance;
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
use Illuminate\Support\Facades\Cookie;

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
        if ($request->query('action') == 'export') {
            $name = 'attendance_report_' . Carbon::now()->format('d-m-Y') . '.xlsx';
            session()->flash('success', 'Attendance exported successfully');
            return (new AttendanceExport($this->attendanceRepository))->download($name)->withCookie(cookie('attendance_exported', '1', 0.3));
        }
        $sites = $this->siteRepository->all();
        $attendanceQuery = $this->attendanceRepository->modelQuery()->search();
        $attendanceQuery = constructPipes($attendanceQuery, $pipes);
        $attendances = $attendanceQuery->latest('attendance_date_time')->with(['company', 'site', 'user'])->paginate(request('per_page', 15));
        return view('attendance.index', compact('attendances', 'sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
