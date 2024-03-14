<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly UserService    $userService,
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
        $adminRoles = Role::query()->select('id')->whereIn('name', [RoleEnum::SUPER_ADMIN->value, RoleEnum::ADMIN->value])->get()->pluck('id');
        $userQuery = $this->userRepository->modelQuery()
            ->whereHas('roles', function ($query) use ($adminRoles) {
                $query->whereIn('id', $adminRoles->toArray());
            });
        $userQuery = constructPipes($userQuery, $pipes);
        $usersCount = (clone $userQuery)->count();
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
    public function store(StoreAdminRequest $request)
    {
        try {
            DB::beginTransaction();
            $admin = $this->userRepository->create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'username' => $request->input('email'),
            ]);
            $this->userService->associateUserToRole($admin, RoleEnum::SUPER_ADMIN->value);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return redirect()->route('admin.admin.index')->with('success', 'Admin Created Successfully');
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
    public function edit(User $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, User $admin)
    {
        $this->userRepository->update($admin->id, [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'username' => $request->input('email'),
        ]);
        $admin = $admin->fresh();
        return redirect()->route('admin.admin.edit', ['admin' => $admin])->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
