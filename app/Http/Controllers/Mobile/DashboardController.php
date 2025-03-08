<?php

namespace App\Http\Controllers\Mobile;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Site;
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

        $userQuery  =  $this->userRepository->modelQuery();
        $attendanceQuery = $this->attendanceRepository->modelQuery();
        $scanQuery = $this->scanRepository->modelQuery();

        if ($user->hasRole(RoleEnum::SUPERVISOR->value)) {
            $region = Region::query()->where("id", $user->region_id)->first();
            $sites = Site::query()->where("region_id", $region->id)->get()->pluck("id")->toArray();
            $attendanceQuery = $attendanceQuery->whereIn('attendances.site_id', $sites);
        } else {
            $attendanceQuery = $attendanceQuery->where('attendances.site_id', $user->site_id);
        }

        if ($user->hasRole(RoleEnum::SUPERVISOR->value)) {
            $region = Region::query()->where("id", $user->region_id)->first();
            $sites = Site::query()->where("region_id", $region->id)->get()->pluck("id")->toArray();

            $scanQuery = $scanQuery->whereIn('scans.site_id', $sites);
        } else {
            $scanQuery = $scanQuery->where('scans.site_id', $user->site_id);
        }

        if ($user->hasRole(RoleEnum::SUPERVISOR->value)) {
            $region = Region::query()->where("id", $user->region_id)->first();
            $sites = Site::query()->where("region_id", $region->id)->get()->pluck("id")->toArray();
            $userQuery = $userQuery->whereIn('users.site_id', $sites);
        } else {
            $userQuery = $userQuery->where('users.site_id', $user->site_id);
        }



        $securityCount = $userQuery->where('company_id', $user->company_id)
            ->whereHas('roles', function ($query) {
                $query->where('name', RoleEnum::PERSONNEL->value);
            })->count();
        $latestAttendance = $attendanceQuery->select(['id', 'site_id', 'company_id', 'attendance_time', 'attendance_date', 'attendance_date_time', 'image', 'action_type', 'user_id'])
            ->where('company_id', $user->company_id)
            ->with(['site:id,name','company:id,name', 'user:id,first_name,last_name,profile_image'])
            ->latest('attendance_date_time')->limit(10)->get();
        $latestScans = $scanQuery->select(['id', 'site_id', 'company_id', 'scan_time', 'scan_date', 'scan_date_time', 'tag_id'])
            ->where('site_id', $user->site_id)
            ->where('company_id', $user->company_id)
            ->with(['site:id,name', 'company:id,name', 'tag:id,name,code'])
            ->latest('scan_date_time')->limit(10)->get();
        return sendSuccess([
            'total_security_guards' => $securityCount,
            'latest_attendances' => $latestAttendance,
            'latest_scans' => $latestScans,
        ]);
    }
}
