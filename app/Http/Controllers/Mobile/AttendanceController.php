<?php

namespace App\Http\Controllers\Mobile;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendanceRequest;
use App\Repositories\Eloquent\Repository\AttendanceRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\FileUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct(
        private readonly AttendanceRepository $attendanceRepository,
        private readonly UserRepository       $userRepository,
    )
    {
    }

    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $attendances = $this->attendanceRepository->modelQuery()
            ->select(['id', 'site_id', 'company_id', 'attendance_time', 'attendance_date', 'attendance_date_time', 'image'])
            ->with(['site:id,name', 'company:id,name'])
            ->where('company_id', $user->company_id)
            ->where('site_id', $user->site_id)
            ->paginate();

        return sendSuccess(['attendances' => $attendances], 'All attendance retrieved');
    }

    public function store(StoreAttendanceRequest $request)
    {
        $securityGuard = $this->userRepository->findByRole($request->input('security_guard_id'), RoleEnum::SECURITY->value);

        if (!$securityGuard) {
            return sendError("Security guard does not exist", 404);
        }
        $user = $request->user()->load('site');

        $distance = calculateDistance($user->site->latitude, $user->site->longitude, $request->input('latitude'), $request->input('longitude'));
        $proximity = deriveProximity($distance);
        $image = null;
        if ($request->hasFile('image')){
            $response = FileUploadService::uploadToS3($request->file('image'), 'profile_images');
            $image  = $response->path;
        }

        $attendance = $this->attendanceRepository->create([
            'action_type' => $request->input('action_type'),
            'image' => $image,
            'attendance_date' => $request->input('attendance_date'),
            'attendance_time' => $request->input('attendance_time'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'user_id' => $request->input('security_guard_id'),
            'site_id' => $user->site_id,
            'company_id' => $user->company_id,
            'distance' => $distance,
            'proximity' => $proximity,
        ]);
        return sendSuccess(['attendances' => $attendance], 'Attendance taken successfully');
    }
}
