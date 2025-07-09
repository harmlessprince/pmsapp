<?php

namespace App\Http\Controllers\Mobile;

use App\Enums\AttendanceActionTypeEnum;
use App\Enums\RoleEnum;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Region;
use App\Models\Site;
use App\QueryFilters\DateFilter;
use App\Repositories\Eloquent\Repository\AttendanceRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\FileUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

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
        $pipes = [
            new DateFilter('attendance_date'),
        ];
        $attendanceQuery = constructPipes($this->attendanceRepository->modelQuery(), $pipes);
        $sites = \request()->query('sites', '');
        if ($sites != '') {
            $sites = explode(',', $sites);
        } else {
            $sites = [];
        }
        if ($user->hasRole(RoleEnum::SUPERVISOR->value)) {
            $region = Region::query()->where("id", $user->region_id)->first();
            $sites = Site::query()->where("region_id", $region->id)
                ->when(count($sites) > 0, function ($query) use ($sites) {
                    $query->whereIn("id", $sites);
                })->get()->pluck("id")->toArray();
            $attendanceQuery = $attendanceQuery->whereIn('attendances.site_id', $sites);
        } else {
            $attendanceQuery = $attendanceQuery->where('attendances.site_id', $user->site_id);
        }

        $attendances = $attendanceQuery
            ->select(['id', 'site_id', 'company_id', 'attendance_time', 'attendance_date', 'attendance_date_time', 'image', 'action_type', 'user_id'])
            ->with(['site:id,name', 'company:id,name', 'user:id,first_name,last_name,profile_image'])
            ->where('company_id', $user->company_id)
            ->latest('attendance_date_time')
            ->paginate($request->query('per_page', 15));

        return sendSuccess(['attendances' => $attendances], 'All attendance retrieved');
    }

    /**
     * @throws CustomException
     */
    public function store(StoreAttendanceRequest $request)
    {
        $securityGuard = $this->userRepository->findByRole($request->input('security_guard_id'), RoleEnum::PERSONNEL->value);

        if (!$securityGuard) {
            return sendError("Personnel does not exist", 404);
        }
        $user = $request->user()->load('site');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');


        $alreadyCheckedIn = $this->attendanceRepository->modelQuery()
            ->where('attendance_date', $request->input('attendance_date'))
            ->where('user_id', $request->input('security_guard_id'))
            ->where('action_type', AttendanceActionTypeEnum::CHECK_IN->value)->oldest('attendance_date_time')->first();



        $alreadyCheckedOut = $this->attendanceRepository->modelQuery()
            ->where('attendance_date', $request->input('attendance_date'))
            ->where('user_id', $request->input('security_guard_id'))
            ->where('action_type', AttendanceActionTypeEnum::CHECK_OUT->value)->first();

        if ($alreadyCheckedOut && $request->input('action_type') == AttendanceActionTypeEnum::CHECK_OUT->value) {
            return sendError("Personnel already checked out for today", 400);
        }

        if ($latitude && $longitude) {
            $distance = calculateDistance($user->site->latitude, $user->site->longitude, $request->input('latitude'), $request->input('longitude'));
            $proximity = deriveProximity($distance);
        } else {
            $distance = null;
            $proximity = 'No Point Configured';
        }

        $image = null;

        try {
            if ($request->hasFile('image')) {
                $response = FileUploadService::uploadToS3($request->file('image'), 'profile_images');
                $image = $response->path;
            }
            $data = [
                'action_type' => $request->input('action_type'),
                'image' => $image,
                'attendance_date' => $request->input('attendance_date'),
                'attendance_date_time' => $request->input('attendance_date_time'),
                'attendance_time' => $request->input('attendance_time'),
                'comment' => $request->input('comment'),
                'longitude' => $longitude,
                'latitude' => $latitude,
                'user_id' => $request->input('security_guard_id'),
                'site_id' => $user->site_id,
                'company_id' => $user->company_id,
                'distance' => $distance,
                'proximity' => $proximity,
            ];

            if ($request->input('action_type') == AttendanceActionTypeEnum::CHECK_OUT->value && !$alreadyCheckedIn) {
                return sendError("Personnel can't checkout without checking in");
            }

            if ($request->input('action_type') == AttendanceActionTypeEnum::CHECK_OUT->value && $alreadyCheckedIn) {
                $data['check_in_to_checkout_duration'] = Carbon::parse($alreadyCheckedIn->attendance_time)->diffInSeconds(Carbon::parse($request->input('attendance_time')));
            }

            $attendance = $this->attendanceRepository->create($data);
        }catch (\Exception $e){
            Log::error($e);
            throw new CustomException('Attendance could not be processed.');
        }


        return sendSuccess(['attendances' => $attendance], 'Attendance taken successfully');
    }
}
