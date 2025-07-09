<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\TagRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanySiteController extends Controller
{
    public function __construct(public readonly TagRepository $tagRepository, public readonly SiteRepository $siteRepository)
    {
    }

    public function show($company_id): JsonResponse
    {
        $search = \request()->query('q');
        $query = $this->siteRepository->modelQuery()->where('company_id', $company_id);
        if ($search) {
            $query->where('name', 'ILIKE', "%{$search}%"); // Filter by name
        }
        return sendSuccess(['sites' => $query->get()], 'Company sites retrieved');
    }
}
