<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSitePasswordRequest;
use App\Models\User;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPasswordChangeController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }
    public function changePassword(UpdateSitePasswordRequest $request, User $admin)
    {
        $admin = $this->userRepository->modelQuery()->where('id', $admin->id)->first();
        $admin->password = Hash::make($request->input('password'));
        $admin->save();
        return redirect()->route('admin.admin.edit', ['admin' => $admin])->with('success', 'Password changed successfully');
    }
}
