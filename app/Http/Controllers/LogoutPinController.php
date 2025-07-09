<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\UpdateSiteLogoutPinRequest;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LogoutPinController extends Controller
{
    public function update(UpdateSiteLogoutPinRequest $request, User $user)
    {
        $user->update([
            'logout_pin' => Hash::make($request->input('logout_pin'))
        ]);
        return back()->with('success', 'logout pin changed successfully');
    }
}
