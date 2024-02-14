<?php

namespace App\Http\Controllers\Company;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        private readonly UserRepository    $userRepository,
        private readonly SiteRepository    $siteRepository,
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
        ];
        $countOfGuards = $this->userRepository->modelQuery()->whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::SECURITY->value);
        })->count();
        $sites = $this->siteRepository->modelQuery()->get();
        $userQuery = $this->userRepository->modelQuery()->search();
        $userQuery = constructPipes($userQuery, $pipes);
        $users = $userQuery->with(['tenant', 'site', 'state', 'state.country'])->paginate(request('per_page', 15));
        return view('company.user.index', compact('users', 'countOfGuards', 'sites'));
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
        return view('company.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
