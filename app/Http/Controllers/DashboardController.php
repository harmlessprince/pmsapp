<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Models\User;
use App\Repositories\Eloquent\Repository\AttendanceRepository;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\ScanRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\TagRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct(
        private readonly UserRepository       $userRepository,
        private readonly TagRepository        $tagRepository,
        private readonly SiteRepository       $siteRepository,
        private readonly CompanyRepository    $companyRepository,
        private readonly ScanRepository       $scanRepository,
        private readonly AttendanceRepository $attendanceRepository,
    )
    {
    }

    public function admin()
    {
//        Gate::allowIf(fn (User $user) => $user->isAdministrator());
        $countOfUsers = $this->userRepository->modelQuery()->count();
        $countOfCompanies = $this->companyRepository->modelQuery()->count();
        $countOfSites = $this->siteRepository->modelQuery()->count();
        $countOfTags = $this->tagRepository->modelQuery()->count();
        $countOfScans = $this->scanRepository->modelQuery()->count();
        $countOfAttendance = $this->attendanceRepository->modelQuery()->count();
        $currentYear = (int)Carbon::now()->format('Y');
        $countOfAttendanceByYearAndMonth = $this->attendanceRepository->attendanceByMonthYear($currentYear);
        $countOfScanByYearAndMonth = $this->scanRepository->scanByMonthYear($currentYear);
        $latestScans  = $this->scanRepository->modelQuery()->with(['tag', 'site'])->orderBy('scan_date_time', 'DESC')->limit(6)->get();
        $latestAttendance  = $this->attendanceRepository->modelQuery()->with(['site', 'user:id,first_name,last_name,profile_image'])->latest('attendance_date_time')->limit(6)->get();

        return view('dashboard.admin',
            compact('countOfUsers',
                'countOfCompanies',
                'countOfSites', 'countOfTags', 'countOfScans', 'countOfAttendance', 'latestScans', 'latestAttendance'));
    }

    public function company()
    {
        Gate::allowIf(fn (User $user) => $user->isCompanyOwner());
        $countOfGuards = $this->userRepository->modelQuery()->whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::SECURITY->value);
        })->count();
        $countOfSites = $this->siteRepository->modelQuery()->count();
        $countOfTags = $this->tagRepository->modelQuery()->count();

        $latestScans  = $this->scanRepository->modelQuery()->with(['tag', 'site'])->orderBy('scan_date_time', 'DESC')->limit(6)->get();
        $latestAttendance  = $this->attendanceRepository->modelQuery()->with(['site', 'user:id,first_name,last_name,profile_image'])->latest('attendance_date_time')->limit(6)->get();

        return view(
            'dashboard.company',
            compact('countOfGuards', 'countOfSites', 'countOfTags', 'latestScans', 'latestAttendance')
        );
    }
}
