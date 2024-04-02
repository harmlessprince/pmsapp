<?php

namespace App\Http\Controllers\Company;

use App\Enums\RoleEnum;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\QueryFilters\StateIdFilter;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\StateRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\FileUploadService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function __construct(
        private readonly UserRepository  $userRepository,
        private readonly SiteRepository  $siteRepository,
        private readonly StateRepository $stateRepository,
        private readonly UserService       $userService,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pipes = [
            CreatedAtFilter::class,
            SiteIdFilter::class,
            StateIdFilter::class,
        ];
        $countOfGuards = $this->userRepository->modelQuery()->whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::PERSONNEL->value);
        })->count();
        $sites = $this->siteRepository->modelQuery()->get();
        $states = $this->stateRepository->fetchByCountryID();
        $userQuery = $this->userRepository->modelQuery()->whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::PERSONNEL->value);
        })->search();
        $userQuery = constructPipes($userQuery, $pipes);
        $users = $userQuery->latest()->with(['tenant', 'site', 'state', 'state.country'])->paginate(request('per_page', 15));
        return view('company.user.index', compact('users', 'countOfGuards', 'sites', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sites = $this->siteRepository->modelQuery()->where('company_id', \request()->user()->company_id)->get();
        return view('company.user.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = $request->user();
        $createdUser = $this->userRepository->create([
            'password' => Hash::make(Str::random(4)),
            "first_name" => $request->input('first_name'),
            "last_name" => $request->input('last_name'),
            'address' => $request->input('address'),
            'state_id' => $request->input('state_id'),
            'company_id' => $user->company_id,
            'site_id' => $request->input('site_id'),
            'phone_number' => $request->input('phone_number'),
            'shift_start_time' => $request->input('shift_start_time'),
            'shift_end_time' => $request->input('shift_end_time'),
            'normal_rate_per_hour' => $request->input('normal_rate_per_hour'),
            'sunday_rate_per_hour' => $request->input('sunday_rate_per_hour'),
            'holiday_rate_per_hour' => $request->input('holiday_rate_per_hour'),
            'number_of_night_shift' => $request->input('number_of_night_shift'),
            'night_shift_allowance' => $request->input('night_shift_allowance'),
        ]);
        $photo = null;
        if ($request->hasFile('profile_image')) {
            $response = FileUploadService::uploadToS3($request->file('profile_image'), 'profile_images');
            $photo = $response->path;
        }
        $createdUser->profile_image = $photo;
        $createdUser->save();
        $this->userService->associateUserToRole($createdUser, RoleEnum::PERSONNEL->value);
        return redirect(route('company.users.index'))->with('success', 'User created successfully');
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
    public function edit(User $user)
    {
        $sites = $this->siteRepository->modelQuery()->get();
        $states = $this->stateRepository->fetchByCountryID();
        return view('company.user.edit', compact('user', 'sites', 'states'));
    }

    /**
     * Update the specified resource in storage.
     * @throws CustomException
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated_data = $request->validated();
        if ($request->hasfile('profile_image')) {
            $response = FileUploadService::uploadToS3($request->file('profile_image'), 'profile_images');
            $validated_data['profile_image'] = $response->path;
        } else {
            unset($validated_data['profile_image']);
        }

        $user->update($validated_data);

        return redirect(route('company.users.index'))->with('success', 'User Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

    }
}
