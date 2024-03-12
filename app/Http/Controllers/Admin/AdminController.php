<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pipes = [
            CreatedAtFilter::class
        ];
        $adminRoles = Role::query()->select('id')->whereIn('name', [RoleEnum::SUPER_ADMIN->value,  RoleEnum::ADMIN->value])->get()->pluck('id');
        $userQuery = $this->userRepository->modelQuery()
            ->whereHas('roles', function ($query) use ($adminRoles) {
                $query->whereIn('id', $adminRoles->toArray());
            });
        $userQuery = constructPipes($userQuery, $pipes);
        $usersCount =  (clone  $userQuery)->count();
        $users = $userQuery->with('roles')->search()->paginate(request('per_page', 15));
        return view('admin.admin.index', compact('users', 'usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create');
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
    public function edit(string $id)
    {
        //
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
