<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\UpdateSiteLogoutPinRequest;
use App\Http\Requests\UpdateSitePasswordRequest;
use App\Models\Site;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiteCredentialController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function changeSitePassword(UpdateSitePasswordRequest $request, Site $site)
    {
        $site_inspector = $this->userRepository->modelQuery()->where('id', $site->inspector_id)->first();
        $site_inspector->password = Hash::make($request->input('password'));
        $site_inspector->save();
        if (!$request->user()->hasRole(RoleEnum::COMPANY_OWNER->value)){
            return redirect()->route('admin.sites.edit', ['site' => $site])->with('success', 'Site password changed successfully');
        }
        return redirect()->route('company.sites.edit', ['site' => $site])->with('success', 'Site password changed successfully');
    }

    public function changeSiteLogoutPin(UpdateSiteLogoutPinRequest $request, Site $site)
    {
        $site->update([
            'logout_pin' => Hash::make($request->input('logout_pin'))
        ]);
        if (!$request->user()->hasRole(RoleEnum::COMPANY_OWNER->value)){
            return redirect()->route('admin.sites.edit', ['site' => $site])->with('success', 'Site logout pin changed successfully');
        }
        return redirect()->route('company.sites.edit', ['site' => $site])->with('success', 'Site logout pin changed successfully');
    }
}
