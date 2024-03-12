<?php

namespace App\Http\Controllers\Company;

use App\Enums\RoleEnum;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\QueryFilters\StateIdFilter;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\StateRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        private readonly UserRepository    $userRepository,
        private readonly SiteRepository    $siteRepository,
        private  readonly StateRepository $stateRepository,
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
            $query->where('name', RoleEnum::SECURITY->value);
        })->count();
        $sites = $this->siteRepository->modelQuery()->get();
        $states = $this->stateRepository->fetchByCountryID();
        $userQuery = $this->userRepository->modelQuery()->whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::SECURITY->value);
        })->search();
        $userQuery = constructPipes($userQuery, $pipes);
        $users = $userQuery->with(['tenant', 'site', 'state', 'state.country'])->paginate(request('per_page', 15));
        return view('company.user.index', compact('users', 'countOfGuards', 'sites', 'states'));
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
        if ($request->hasfile('profile_image')){
            $response = FileUploadService::uploadToS3($request->file('profile_image'), 'profile_images');
            $validated_data['profile_image'] = $response->path;
        }else{
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
