<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Tag;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\TagRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(
        private readonly TagRepository  $tagRepository,
        private readonly SiteRepository $siteRepository,
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
            SiteIdFilter::class,
        ];
        $sites = $this->siteRepository->modelQuery()->get();
        $tagQuery = $this->tagRepository->modelQuery()->search();
        $tagQuery = constructPipes($tagQuery, $pipes);
        $tagsCount = $this->tagRepository->modelQuery()->count();
        $tags = $tagQuery->with('company', 'company.state', 'company.state.country')
            ->paginate(\request('per_page', 15));
        return view('company.tag.index', compact('sites', 'tags', 'tagsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sites = $this->siteRepository->modelQuery()->get();
        return view('company.tag.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
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
    public function edit(Tag $tag)
    {
        return view('company.tag.edit', compact('tag'));
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
