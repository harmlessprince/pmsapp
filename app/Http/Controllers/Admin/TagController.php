<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\SiteIdFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\TagRepository;

class TagController extends controller
{
    public function __construct(
        private readonly TagRepository $tagRepository,
        private readonly CompanyRepository $companyRepository
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
            CompanyIdFilter::class,
            SiteIdFilter::class,
        ];
        $companies =  $this->companyRepository->all();
        $tagQuery = $this->tagRepository->modelQuery()->search();
        $tagCount = $this->tagRepository->modelQuery()->count();
        $tagQuery = constructPipes($tagQuery, $pipes);
        $tags = $tagQuery->with(['company', 'site'])->latest()->paginate(request('per_page', 15));
        return view('admin.tag.index', compact('tags', 'companies', 'tagCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies =  $this->companyRepository->all();
        return view('admin.tag.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $company_id = $request->input('company_id');
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


        return redirect()->route('admin.tags.index')->with('success', 'Tag Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $companies =  $this->companyRepository->all();
        return view('admin.tag.edit', compact('tag', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {

//        dd($request->validated());

        $site_id = $request->input('site');

        $this->tagRepository->update($tag->id, [
            'name' => $request->input('tag_name'),
            'site_id' => $site_id,
            'company_id' => $request->input('company_id'),
            'comment' => $request->input('comment'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return redirect()->route('admin.tags.edit', $tag->refresh())->with('success', 'Tag Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
