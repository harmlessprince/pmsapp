<?php

namespace App\Http\Controllers\Company;

use App\Enums\RoleEnum;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Site;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\StateRepository;
use App\Repositories\Eloquent\Repository\TagRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    public function __construct(
        private readonly SiteRepository  $siteRepository,
        private readonly UserRepository  $userRepository,
        private readonly StateRepository $stateRepository,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siteQuery = $this->siteRepository->modelQuery();

        $pipes = [
            CreatedAtFilter::class,
        ];
        $countOfSites = $this->siteRepository->modelQuery()->count();

        $sites = $siteQuery->with(['inspector', 'state', 'state.country'])->latest()->paginate(\request('per_page', 15));
//        dd($sites->items());
        return view('company.site.index', compact('sites', 'countOfSites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = $this->stateRepository->fetchByCountryID();
        return view('company.site.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiteRequest $request)
    {
        $photoPath = null;
        if ($request->hasfile('photo')) {
            $response = FileUploadService::uploadToS3($request->file('photo'), 'sites');
            $photoPath = $response->path;
        }
        $site_inspector = DB::transaction(function () use ($request) {
            $site_inspector = $this->userRepository->create([
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'username' => $request->input('email'),
            ]);
            $site_inspector->assignRole(RoleEnum::SITE_INSPECTOR->value);
            return $site_inspector;
        });
        DB::transaction(function () use ($request, $site_inspector, $photoPath) {
            Log::info('Site inspector id' . $site_inspector->id);
            $site = $this->siteRepository->create([
                'name' => $request->input('name'),
                'company_id' => $request->user()->company_id,
                'inspector_id' => $site_inspector->id,
                'created_by' => $request->user()->id,
                'address' => $request->input('address'),
                'state_id' => $request->input('state'),
                'shift_start_time' => $request->input('shift_start_time'),
                'shift_end_time' => $request->input('shift_end_time'),
                'number_of_tags' => $request->input('number_of_tags'),
                'maximum_number_of_rounds' => $request->input('maximum_number_of_rounds'),
                'logout_pin' => Hash::make($request->input('logout_pin')),
                'longitude' => $request->input('longitude'),
                'latitude' => $request->input('latitude'),
                'photo' => $photoPath
            ]);
            $site_inspector->company_id = $site->company_id;
            $site_inspector->site_id = $site->id;
            $site_inspector->save();
            return $site;
        });
        return redirect()->route('company.sites.index')->with('success', 'Site Created Successfully');
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
    public function edit(Site $site)
    {
        $states = $this->stateRepository->fetchByCountryID();
        return view('company.site.edit', compact('site', 'states'));
    }

    /**
     * Update the specified resource in storage.
     * @throws CustomException
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
        ]);

        $site->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'state_id' => $request->input('state'),
            'shift_start_time' => $request->input('shift_start_time'),
            'shift_end_time' => $request->input('shift_end_time'),
            'number_of_tags' => $request->input('number_of_tags'),
            'maximum_number_of_rounds' => $request->input('maximum_number_of_rounds'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'photo' => $photoPath
        ]);

        return redirect()->route('company.sites.index')->with('success', 'Site Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
