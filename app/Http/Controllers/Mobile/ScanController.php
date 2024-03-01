<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\StoreScanRequest;
use App\Repositories\Eloquent\Repository\ScanRepository;
use App\Repositories\Eloquent\Repository\TagRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function __construct(
        private readonly ScanRepository $scanRepository,
        private readonly TagRepository  $tagRepository,
    )
    {
    }

    public function index(Request $request): JsonResponse
    {
        $scans = $this->scanRepository->modelQuery()
            ->select(['id', 'site_id', 'company_id','tag_id', 'scan_time', 'scan_date', 'scan_date_time'])
            ->with(['site:id,name','company:id,name', 'tag:id,name,code'])
            ->latest('scan_date_time')->paginate($request->query('per_page', 15));
        return sendSuccess(['scans' => $scans], 'All scans retrieved');
    }

    public function store(StoreScanRequest $request)
    {
        $user = $request->user();
        $tag = $this->tagRepository->modelQuery()
            ->where('code', $request->input('tag_code'))
            ->first();
        if (!$tag) {
            return sendError("Tag does not exist", 404);
        }
        $distance = calculateDistance($tag->latitude, $tag->longitude, $request->input('latitude'), $request->input('longitude'));
        $proximity = deriveProximity($distance);
        $scan = $this->scanRepository->create([
            'scan_date' => $request->input('scan_date'),
            'scan_time' => $request->input('scan_time'),
            'scan_date_time' => $request->input('scan_date_time'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'tag_id' => $tag->id,
            'site_id' => $tag->site_id,
            'company_id' => $tag->company_id,
            'scanned_by' => $user->id,
            'distance' => $distance,
            'proximity' => $proximity,
        ]);
        return sendSuccess(['scan' => $scan], 'Scanned successfully');
    }
}
