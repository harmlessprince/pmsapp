<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Site;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{

    public function __construct(
        private readonly SiteRepository $siteRepository,
        private readonly CompanyRepository $companyRepository,
        private readonly UserService $userService,
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites =  $this->siteRepository->allPaginated();
        return view('site.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = $this->companyRepository->all();
        return view('site.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Exception
     */
    public function store(StoreSiteRequest $request)
    {
        $company = $this->companyRepository->findById($request->input('company_id'));
        $companySiteTagsCount = $this->siteRepository->modelQuery()
            ->where('company_id', $company->id)->sum('maximum_number_of_tags');
        try {
            DB::beginTransaction();
            $siteInspector = $this->userService->createUser(
                $request->input('first_name'),
                $request->input('last_name'),
                $request->input('password'),
                $request->input('email'),
                $request->input('status'),
                $request->input('username')
            );

            $site = $this->siteRepository->create([
                'company_id' =>  $request->input('company_id'),
                'longitude' =>  $request->input('longitude'),
                'latitude' =>  $request->input('latitude'),
                'logout_pin' => Hash::make( $request->input('logout_pin')),
                'name' =>  $request->input('site_name'),
                'address' =>  $request->input('address'),
                'photo' =>  $request->input('photo'),
                'shift_start_time' => $request->input('shift_start_time'),
                'shift_end_time' => $request->input('shift_end_time'),
                'number_of_tags' =>  $request->input('number_of_tags'),
                'maximum_number_of_rounds' =>  $request->input('maximum_number_of_rounds'),
                'attendance_date' =>  $request->input('attendance_date'),
                'site_inspector' => $siteInspector->id,
                'created_by' => 1,
            ]);
            $this->userService->associateUserToRole($siteInspector, RoleEnum::SITE_INSPECTOR->value);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiteRequest $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        //
    }
}
