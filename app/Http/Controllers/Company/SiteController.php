<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\TagRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct(
        private readonly SiteRepository $siteRepository,
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
        $countOfSites =  $this->siteRepository->modelQuery()->count();
        $sites =  $siteQuery->with(['inspector', 'state', 'state.country'])->latest()->paginate(\request('per_page', 15));
        return view('company.site.index', compact('sites', 'countOfSites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.site.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
    public function edit(string $id)
    {
        return view('company.site.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
