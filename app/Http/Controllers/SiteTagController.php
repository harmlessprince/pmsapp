<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\TagRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SiteTagController extends Controller
{
    public function __construct(public readonly TagRepository $tagRepository)
    {
    }
    public function show($site_id): JsonResponse
    {
        $tags = $this->tagRepository->modelQuery()->where('site_id', $site_id)->get();
        return sendSuccess(['tags' => $tags], 'Companies retrieved');
    }
}
