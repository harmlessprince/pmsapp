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
        $tagQuery = constructPipes($tagQuery, $pipes);
        $tags = $tagQuery->with(['company', 'site'])->paginate(request('per_page', 15));
        return view('admin.tag.index', compact('tags', 'companies'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
