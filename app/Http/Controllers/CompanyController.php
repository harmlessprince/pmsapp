<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\QueryFilters\IndustryIdFilter;
use App\QueryFilters\PhoneNumberFilter;
use App\QueryFilters\StateIdFilter;
use App\QueryFilters\StatusFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\IndustryRepository;
use App\Repositories\Eloquent\Repository\StateRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{

    public function __construct(
        private readonly CompanyRepository $companyRepository,
        private  readonly StateRepository $stateRepository,
        private readonly IndustryRepository $industryRepository,
        private readonly UserRepository $userRepository,
        private readonly UserService $userService,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pipes = [
            PhoneNumberFilter::class,
            StatusFilter::class,
            StateIdFilter::class,
            IndustryIdFilter::class,
        ];

        $companyQuery = $this->companyRepository->modelQuery()->search();
        $companyQuery = constructPipes($companyQuery, $pipes);
        $companies = $companyQuery->with(['owner', 'state', 'industry'])->withCount(['tags'])->paginate();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = $this->stateRepository->fetchByCountryID();
        $industries = $this->industryRepository->all();
        return view('company.create', compact('states', 'industries'));
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
            $company =  $this->companyRepository->create([
                'name' => $request->input('company_name'),
                'display_name' => $request->input('display_name'),
                'maximum_number_of_tags' => Hash::make($request->input('maximum_number_of_tags')),
                'status' => $request->input('status'),
                'phone_number' => $request->input('phone_number'),
                'username' => $request->input('username'),
                'created_by' => 1,
                'industry_id' =>  $request->input('industry_id'),
                'state_id' =>  $request->input('state_id'),
                'city' => $request->input('city'),
                'owner_id' => $companyOwner->id,
            ]);
            $this->userService->associateUserToComapany($companyOwner, $company);
            $this->userService->associateUserToRole($companyOwner, RoleEnum::COMPANY_OWNER->value);
            DB::commit();
        }catch (\Exception $ex){
            DB::rollBack();
            throw $ex;
        }

        return redirect('companies.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $company->load('site', 'owner');
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $company->load('site', 'owner');
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        //
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
