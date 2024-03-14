<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSiteLogoutPinRequest;
use App\Http\Requests\UpdateSitePasswordRequest;
use App\Models\Company;
use App\Models\Site;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyCredentialController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function changePassword(UpdateSitePasswordRequest $request, Company $company)
    {
        $company_inspector = $this->userRepository->modelQuery()->where('id', $company->owner_id)->first();
        $company_inspector->password = Hash::make($request->input('password'));
        $company_inspector->save();
        return redirect()->route('admin.companies.edit', ['company' => $company])->with('success', 'Company password changed successfully');
    }

}
