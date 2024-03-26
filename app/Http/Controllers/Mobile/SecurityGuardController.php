<?php

namespace App\Http\Controllers\Mobile;

use App\Enums\RoleEnum;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSecurityGuard;
use App\Models\User;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\FileUploadService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;

class SecurityGuardController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly UserService $userService
    )
    {
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $securityGuards = $this->userRepository->modelQuery()
            ->search()
            ->where('company_id', $user->company_id)
            ->where('site_id', $user->site_id)
            ->whereHas('roles', function ($query) {
                $query->where('name', RoleEnum::PERSONNEL->value);
            })->latest()->paginate();
        return sendSuccess(['guards' => $securityGuards], 'Users retrieved');
    }

    /**
     * @throws CustomException
     */
    public function store(StoreSecurityGuard $request): JsonResponse
    {
        $user = $request->user();
        $createdUser = $this->userService->createUser(
            $request->input('first_name'),
            $request->input('last_name'),
            Str::random(4)
        );
        $photo = null;
        if ($request->hasFile('photo')){
            $response = FileUploadService::uploadToS3($request->file('photo'), 'profile_images');
            $photo  = $response->path;
        }
        $createdUser->company_id = $user->company_id;
        $createdUser->site_id = $user->site_id;
        $createdUser->profile_image = $photo;
        $createdUser->save();
        $this->userService->associateUserToRole($createdUser, RoleEnum::PERSONNEL->value);
        return sendSuccess(['user' => $createdUser], 'User created successfully');
    }
}
