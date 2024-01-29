<?php

namespace App\Http\Controllers\Mobile;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Repository\AttendanceRepository;
use App\Repositories\Eloquent\Repository\ScanRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private readonly AttendanceRepository $attendanceRepository,
        private readonly ScanRepository       $scanRepository,
        private readonly UserRepository       $userRepository,
    )
    {
    }

    public function dashboard(Request $request): JsonResponse
    {
        $user = $request->user();
        $securityCount = $this->userRepository->modelQuery()
            ->where('company_id', $user->company_id)
            ->where('site_id', $user->site_id)
            ->whereHas('roles', function ($query) {
                $query->where('name', RoleEnum::SECURITY->value);
            })->count();
        $latestAttendance = $this->attendanceRepository->modelQuery()
            ->select(['id', 'site_id', 'company_id', 'attendance_time', 'attendance_date', 'attendance_date_time', 'image'])
            ->where('site_id', $user->site_id)
            ->where('company_id', $user->company_id)
            ->with(['site:id,name','company:id,name'])
            ->latest()->limit(10)->get();
        $latestScans = $this->scanRepository->modelQuery()
            ->select(['id', 'site_id', 'company_id', 'scan_time', 'scan_date', 'scan_date_time'])
            ->where('site_id', $user->site_id)
            ->where('company_id', $user->company_id)
            ->with(['site:id,name', 'company:id,name'])
            ->latest()->limit(10)->get();
        return sendSuccess([
            'total_security_guards' => $securityCount,
            'latest_attendances' => $latestAttendance,
            'latest_scans' => $latestScans,
        ]);
    }
}
