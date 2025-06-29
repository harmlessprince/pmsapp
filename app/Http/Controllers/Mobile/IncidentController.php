<?php

namespace App\Http\Controllers\Mobile;

use App\Enums\RoleEnum;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncidentRequest;
use App\Http\Requests\StoreMultipleIncidentRequest;
use App\Models\Incident;
use App\Models\Region;
use App\Models\Site;
use App\Repositories\Eloquent\Repository\IncidentRepository;
use App\Services\FileUploadService;
use App\Services\IncidentService;

class IncidentController extends Controller
{
    public function __construct(
        private readonly IncidentService $incidentService,
    )
    {
    }

    public function index()
    {
        $user = request()->user()->load('site');
        $incidents = $this->incidentService->getAll($user, request()->query('per_page', 15));
        return sendSuccess(['incidents' => $incidents], 'All incidents retrieved');
    }

    public function store(StoreIncidentRequest $request)
    {
        $user = $request->user()->load('site');
        $validated = $request->validated();

        $validated['site_id'] = $request->input('site_id');
        $validated['company_id'] = $user->company_id;
        $validated['user_id'] = $user->id;
        if ($request->hasFile('image')) {
            $response = FileUploadService::uploadToS3($request->file('image'), 'profile_images');
            $image = $response->path;
            $validated['image'] = $image;
        }

        $incident = $this->incidentService->create($validated);
        return sendSuccess(['incident' => $incident], 'Incident created');
    }

    /**
     * @throws CustomException
     */
    public function storeMultiple(StoreMultipleIncidentRequest $request)
    {
        $user = $request->user()->load('site');
        $validated = $request->validated();

        $createdIncidents = [];
        $loopIndex = 0;
        foreach ($validated['incidents'] as $incidentData) {
//            $incidentData['site_id'] = $incidentData['site_id'];
            $incidentData['company_id'] = $user->company_id;
            $incidentData['user_id'] = $user->id;
            $incident = $this->incidentService->create($incidentData);
            $createdIncidents[] = $incident;
            $loopIndex++;
        }

        return sendSuccess(['incidents' => $createdIncidents], 'Incidents created');
    }
}
