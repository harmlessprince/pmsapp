<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\FileUploadService;

class UserController extends Controller
{
    public function __construct(
        private readonly UserRepository    $userRepository,
        private readonly CompanyRepository $companyRepository,
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
            CompanyIdFilter::class,
            SiteIdFilter::class,
        ];
        $companies = $this->companyRepository->all();
        $userQuery = $this->userRepository->modelQuery()->whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::SECURITY->value);
        })->search();
        $userQuery = constructPipes($userQuery, $pipes);
        $users = $userQuery->with(['tenant', 'site', 'company:id,name'])->paginate(request('per_page', 15));
        return view('admin.user.index', compact('users', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = $this->companyRepository->all();
        return view('admin.user.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
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
    public function update(\App\Http\Requests\UpdateUserRequest $request, User $user)
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
        //
    }
}
