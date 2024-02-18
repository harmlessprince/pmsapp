<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Http\Requests\UpdateTagRequest;
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
        $tags = $tagQuery->with('company', 'site.state', 'site.state.country', 'site')
            ->latest()
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
    public function store(StoreTagRequest $request)
    {
        $company_id = $request->user()->company_id;
        $site_id = $request->input('site');
        $code = generateTagCode($site_id, $company_id);

        $tag = $this->tagRepository->create([
            'name' => $request->input('tag_name'),
            'site_id' => $site_id,
            'company_id' => $company_id,
            'created_by' => $request->user()->id,
            'comment' => $request->input('comment'),
            'code' => $code,
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        $tag->code = $tag->code . '/' . $tag->id;
        $tag->save();


        return redirect()->route('company.tags.index')->with('success', 'Tag Created Successfully');
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
        $sites = $this->siteRepository->modelQuery()->get();
        return view('company.tag.edit', compact('tag', 'sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $site_id = $request->input('site');

        $this->tagRepository->update($tag->id, [
            'name' => $request->input('tag_name'),
            'site_id' => $site_id,
            'comment' => $request->input('comment'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return redirect()->route('company.tags.index')->with('success', 'Tag Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
