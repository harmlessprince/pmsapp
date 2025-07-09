<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AttendanceExport;
use App\Http\Controllers\Controller;
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
        $action = $request->query('action');
        $pipes = [
            new DateFilter('attendance_date'),
            CompanyIdFilter::class,
            SiteIdFilter::class,
            StatusFilter::class,
        ];
        if ($action != 'delete'){
            $pipes[] = AttendanceActionTypeFilter::class;
        }
        $attendanceQuery = $this->attendanceRepository->modelQuery()->search();
        $attendanceQuery = constructPipes($attendanceQuery, $pipes);
        if ($request->query('action') == 'export') {
            $name = 'attendance_report_' . Carbon::now()->format('d-m-Y') . '.xlsx';
            session()->flash('success', 'Attendance exported successfully');
            return (new AttendanceExport($this->attendanceRepository))->download($name);
        }

        if ($request->query('action') == 'delete') {
            session()->flash('success', 'Attendances deleted successfully');
            $attendanceQuery->delete();
        }
        $companies =  $this->companyRepository->all();

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
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect(route('admin.attendance.index'))->with('success', 'Attendance deleted successfully');
    }
}
