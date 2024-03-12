<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\IndustryIdFilter;
use App\QueryFilters\PhoneNumberFilter;
use App\QueryFilters\StateIdFilter;
use App\QueryFilters\StatusFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\IndustryRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\StateRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{

    public function __construct(
        private readonly CompanyRepository  $companyRepository,
        private readonly StateRepository    $stateRepository,
        private readonly IndustryRepository $industryRepository,
        private readonly SiteRepository     $siteRepository,
        private readonly UserService        $userService,
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
            StatusFilter::class,
            StateIdFilter::class,
        ];

        $companyQuery = $this->companyRepository->modelQuery()->search();
        $countCompany = $this->companyRepository->modelQuery()->count();
        $companyQuery = constructPipes($companyQuery, $pipes);
        $states = $this->stateRepository->fetchByCountryID();
        $companies = $companyQuery->with(['owner', 'state', 'industry'])->latest()->withCount(['tags'])->paginate(request('per_page', 15));
        return view('admin.company.index', compact('companies', 'countCompany', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = $this->stateRepository->fetchByCountryID();
        $industries = $this->industryRepository->all();
        return view('admin.company.create', compact('states', 'industries'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Exception
     */
    public function store(StoreCompanyRequest $request)
    {
        try {
            DB::beginTransaction();
            $companyOwner = $this->userService->createUser(
                $request->input('first_name'),
                $request->input('last_name'),
                $request->input('password'),
                $request->input('email'),
                $request->input('status'),
                $request->input('username')
            );
            $company = $this->companyRepository->create([
                'name' => $request->input('display_name'),
                'display_name' => $request->input('display_name'),
                'maximum_number_of_tags' => $request->input('maximum_number_of_tags'),
                'status' => $request->input('status'),
                'phone_number' => $request->input('phone_number'),
                'created_by' => 1,
                'industry_id' => $request->input('industry_id'),
                'state_id' => $request->input('state_id'),
                'city' => $request->input('city'),
                'address' => $request->input('address'),
                'owner_id' => $companyOwner->id,
            ]);
            $this->userService->associateUserToComapany($companyOwner, $company);
            $this->userService->associateUserToRole($companyOwner, RoleEnum::COMPANY_OWNER->value);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            throw $ex;
        }

        return redirect(route('admin.companies.index'))->with('success', 'Company created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $company->load('sites', 'owner');
        return view('admin.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $states = $this->stateRepository->fetchByCountryID();
        $industries = $this->industryRepository->all();
        $company->load('sites', 'owner');
        return view('admin.company.edit', compact('company', 'states', 'industries'));
    }

    /**
     * Update the specified resource in storage.
     * @throws \Exception
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        try {
            DB::beginTransaction();
            $company->owner()->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'status' => $request->input('status'),
            ]);
             $company->update([
                'name' => $request->input('display_name'),
                'display_name' => $request->input('display_name'),
                'maximum_number_of_tags' => $request->input('maximum_number_of_tags'),
                'status' => $request->input('status'),
                'phone_number' => $request->input('phone_number'),
                'industry_id' => $request->input('industry_id'),
                'state_id' => $request->input('state_id'),
                'city' => $request->input('city'),
                'address' => $request->input('address')
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            throw $ex;
        }

        return redirect(route('admin.companies.index'))->with('success', 'Company updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('company.index');
    }
}
