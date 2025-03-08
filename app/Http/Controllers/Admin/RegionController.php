<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Models\Region;
use App\Models\Site;
use App\Models\User;
use App\QueryFilters\CompanyIdFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\RegionRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class RegionController extends Controller
{
    public function __construct(
        private readonly SiteRepository    $siteRepository,
        private readonly UserRepository    $userRepository,
        private readonly RegionRepository  $regionRepository,
        private readonly CompanyRepository $companyRepository,
        private readonly UserService       $userService,
    )
    {
    }

    public function index(Request $request)
    {

        $pipes = [
            CompanyIdFilter::class,
        ];
//        if ($request->query('export') == 'export') {
//            $name = 'scan_report_' . Carbon::now()->format('d-m-Y') . '.xlsx';
//            session()->flash('success', 'Scan exported successfully');
//            return (new ScansExport($this->scanRepository))->download($name);
//        }
        $siteId = $request->query('site_id', null);

        $regionQuery = $this->regionRepository->modelQuery()
            ->with(['supervisor:id,first_name,last_name,email', 'company:id,name'])
            ->withCount('sites')
            ->search();
        if ($siteId !== null) {
            $regionQuery = $regionQuery->whereHas('sites', function ($query) use ($siteId) {
                $query->where('id', $siteId);
            });
        }
        $regionQuery = constructPipes($regionQuery, $pipes);
        $regionsCount = $regionQuery->count();
        $regions = $regionQuery->latest()->paginate(request('per_page', 15));
        $companies = $this->companyRepository->all();
        return view('admin.regions.index', compact('regions', 'regionsCount', 'companies'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = $this->companyRepository->all();
        return view('admin.regions.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegionRequest $request)
    {
        Gate::allowIf(fn(User $user) => $user->isSuperAdmin());

        try {
            DB::beginTransaction();
            $user = $this->userRepository->create([
                'first_name' => $request->input('region_name'),
                'last_name' => $request->input('region_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'username' => $request->input('email'),
                'company_id' => $request->input('company_id'),
                'status' => $request->input('status'),
            ]);
            $this->userService->associateUserToRole($user, RoleEnum::SUPERVISOR->value);
            $region = $this->regionRepository->create([
                'name' => $request->input('region_name'),
                'company_id' => $request->input('company_id'),
                'status' => $request->input('status'),
                'created_by' => $request->user()->id,
                'supervisor_id' => $user->id,
            ]);

            $user->region_id = $region->id;
            $user->save();
            Site::query()
                ->where('company_id', $request->input('company_id'))
                ->whereIn('id', $request->input('sites'))
                ->update(["region_id" => $region->id]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return redirect()->route('admin.admin.index')->with('success', 'Region Created Successfully');
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
    public function edit(Region $region)
    {
        $region->load('sites', 'supervisor:id,first_name,last_name,email', 'company:id,name');
        $companies = $this->companyRepository->all();
        $selectedSites = $region->sites()->pluck('id')->toArray();
        return view('admin.regions.edit', compact('region', 'companies', 'selectedSites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegionRequest $request, Region $region)
    {
        Gate::allowIf(fn (User $user) => $user->isSuperAdmin());
        $submittedSiteIds = $request->input('sites', []);

        $region->supervisor()->update([
            'email' => $request->input('email'),
            'username' => $request->input('email'),
            'company_id' => $request->input('company_id'),
            'first_name' => $request->input('region_name'),
            'last_name' => $request->input('region_name'),
            'status' => $request->input('status'),
            'logout_pin' => Hash::make($request->input('logout_pin')),
        ]);


        $region->update([
            'company_id' => $request->input('company_id'),
            'name' => $request->input('region_name'),
            'status' => $request->input('status'),
        ]);


        // Step 1: Remove `region_id` from sites that are no longer selected
        Site::where('company_id', $request->input('company_id'))
            ->where('region_id', $region->id)
            ->whereNotIn('id', $submittedSiteIds) // Sites not in new selection
            ->update(['region_id' => null]);

        // Step 2: Assign `region_id` to the newly submitted sites
        Site::where('company_id', $request->input('company_id'))
            ->whereIn('id', $submittedSiteIds)
            ->update(['region_id' => $region->id]);

        return redirect()->route('admin.regions.edit', ['region' => $region])->with('success', 'Region updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
