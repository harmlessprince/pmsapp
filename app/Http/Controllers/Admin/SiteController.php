<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Attendance;
use App\Models\Scan;
use App\Models\Site;
use App\Models\Tag;
use App\Models\User;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\QueryFilters\StateIdFilter;
use App\QueryFilters\StatusFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\StateRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\FileUploadService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SiteController extends controller
{

    public function __construct(
        private readonly SiteRepository    $siteRepository,
        private readonly CompanyRepository $companyRepository,
        private readonly UserService       $userService,
        private readonly StateRepository   $stateRepository,
        private readonly UserRepository    $userRepository,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siteQuery = $this->siteRepository->modelQuery()->search();

        $pipes = [
            CreatedAtFilter::class,
            StatusFilter::class,
            StateIdFilter::class,
            CompanyIdFilter::class
        ];
        $countOfSites = $this->siteRepository->modelQuery()->count();
        $companies = $this->companyRepository->all();
        $states = $this->stateRepository->fetchByCountryID();
        $siteQuery = $siteQuery->with(['inspector', 'state', 'state.country', 'company']);
        $siteQuery = constructPipes($siteQuery, $pipes);
        $sites = $siteQuery->latest()->paginate(\request('per_page', 15));
        return view('admin.site.index', compact('sites', 'countOfSites', 'states', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = $this->companyRepository->all();
        $states = $this->stateRepository->fetchByCountryID();
        return view('admin.site.create', compact('companies', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Exception
     */
    public function store(StoreSiteRequest $request)
    {
        $photoPath = null;
        if ($request->hasfile('photo')) {
            $response = FileUploadService::uploadToS3($request->file('photo'), 'sites');
            $photoPath = $response->path;
        }
        try {
            DB::beginTransaction();
            $site_inspector = $this->userRepository->create([
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'username' => $request->input('email'),
                'created_by' => $request->user()->id,
                'state_id' => $request->input('state'),
            ]);

            $site = $this->siteRepository->create([
                'company_id' => $request->input('company_id'),
                'state_id' => $request->input('state'),
                'longitude' => $request->input('longitude'),
                'latitude' => $request->input('latitude'),
                'logout_pin' => Hash::make($request->input('logout_pin')),
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'photo' => $photoPath,
                'shift_start_time' => $request->input('shift_start_time'),
                'shift_end_time' => $request->input('shift_end_time'),
                'number_of_tags' => $request->input('number_of_tags'),
                'maximum_number_of_rounds' => $request->input('maximum_number_of_rounds'),
                'inspector_id' => $site_inspector->id,
                'created_by' => $request->user()->id,

            ]);
            $site_inspector->company_id = $site->company_id;
            $site_inspector->site_id = $site->id;
            $site_inspector->save();
            $this->userService->associateUserToRole($site_inspector, RoleEnum::SITE_INSPECTOR->value);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return redirect()->route('admin.sites.index')->with('success', 'Site Created Successfully');
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
        $states = $this->stateRepository->fetchByCountryID();
        $companies = $this->companyRepository->all();
        return view('admin.site.edit', compact('site', 'states', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiteRequest $request, Site $site)
    {
        $photoPath = null;
        if ($request->hasfile('photo')) {
            $response = FileUploadService::uploadToS3($request->file('photo'), 'sites');
            $photoPath = $response->path;
        }


        $site->inspector()->update([
            'email' => $request->input('email'),
            'username' => $request->input('email'),
            'company_id' => $request->input('company_id'),
            'site_id' => $site->id,
        ]);

        $site->update([
            'company_id' => $request->input('company_id'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'state_id' => $request->input('state'),
            'shift_start_time' => $request->input('shift_start_time'),
            'shift_end_time' => $request->input('shift_end_time'),
            'number_of_tags' => $request->input('number_of_tags'),
            'maximum_number_of_rounds' => $request->input('maximum_number_of_rounds'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'status' => $request->input('status'),
            'photo' => $photoPath
        ]);
        return redirect()->route('admin.sites.index')->with('success', 'Site Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        try {
            DB::beginTransaction();
            Scan::query()->where('site_id', $site->id)->delete();
            Attendance::query()->where('site_id', $site->id)->delete();
            Tag::query()->where('site_id', $site->id)->delete();
            User::query()->where('site_id', $site->id)->where('id', '<>', $site->inspector_id)->delete();
            $site->delete();
            User::query()->where('id', $site->inspector_id)->delete();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception);
            return redirect(route('admin.sites.index'))->with('error', 'Site could not be deleted, try again later');
        }
        return redirect(route('admin.sites.index'))->with('success', 'Site and all related resource deleted successfully');
    }
}
