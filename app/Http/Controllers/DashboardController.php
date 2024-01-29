<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Repository\AttendanceRepository;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\ScanRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\TagRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private  readonly UserRepository $userRepository,
        private readonly TagRepository $tagRepository,
        private readonly SiteRepository $siteRepository,
        private readonly CompanyRepository $companyRepository,
        private readonly ScanRepository $scanRepository,
        private readonly AttendanceRepository $attendanceRepository,
    )
    {
    }

    public function admin()
    {
        $countOfUsers = $this->userRepository->modelQuery()->count();
        $countOfCompanies = $this->companyRepository->modelQuery()->count();
        $countOfSites = $this->siteRepository->modelQuery()->count();
        $countOfTags = $this->tagRepository->modelQuery()->count();
        $countOfScans = $this->scanRepository->modelQuery()->count();
        $countOfAttendance = $this->attendanceRepository->modelQuery()->count();
        $currentYear = (int)Carbon::now()->format('Y');
        $countOfAttendanceByYearAndMonth = $this->attendanceRepository->attendanceByMonthYear($currentYear);
        $countOfScanByYearAndMonth = $this->scanRepository->scanByMonthYear($currentYear);

        return view('admin.dashboard',
            compact('countOfUsers',
            'countOfCompanies',
            'countOfSites', 'countOfTags', 'countOfScans', 'countOfAttendance', 'countOfAttendanceByYearAndMonth', 'countOfScanByYearAndMonth'));
    }
}
