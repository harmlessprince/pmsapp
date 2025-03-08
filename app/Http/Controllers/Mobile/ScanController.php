<?php

namespace App\Http\Controllers\Mobile;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\StoreScanRequest;
use App\Models\Region;
use App\Models\Site;
use App\QueryFilters\DateFilter;
use App\Repositories\Eloquent\Repository\ScanRepository;
use App\Repositories\Eloquent\Repository\TagRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $user = $request->user();
        $pipes = [
            new DateFilter('scan_date'),
        ];

        $scanQuery = $this->scanRepository->modelQuery()
            ->search();
            if ($user->hasRole(RoleEnum::SUPERVISOR->value)) {
                $region = Region::query()->where("id", $user->region_id)->first();
                $sites = Site::query()->where("region_id", $region->id)->get()->pluck("id")->toArray();

                $scanQuery = $scanQuery->whereIn('scans.site_id', $sites);
            } else {
                $scanQuery = $scanQuery->where('scans.site_id', $user->site_id);
            }
//

        $scanQuery = constructPipes($scanQuery, $pipes);
        $scans = $scanQuery
            ->select(['id', 'site_id', 'company_id', 'tag_id', 'scan_time', 'scan_date', 'scan_date_time'])
            ->with(['site:id,name', 'company:id,name', 'tag:id,name,code'])
            ->latest('scan_date_time')->paginate($request->query('per_page', 15));
        return sendSuccess(['scans' => $scans], 'All scans retrieved');
    }

    public function store(StoreScanRequest $request)
    {
        $user = $request->user();
//        dd($user->company_id);
        $tag = $this->tagRepository->modelQuery()
            ->where('code', $request->input('tag_code'))
            ->first();

        if (!$tag) {
            return sendError("Tag does not exist", 404);
        }
        $distance = calculateDistance($tag->latitude, $tag->longitude, $request->input('latitude'), $request->input('longitude'));
        $proximity = deriveProximity($distance);
        $lastScanOnTag = $this->scanRepository->modelQuery()
            ->where('tag_id', $tag->id)
            ->where('scan_date', $request->input('scan_date'))
            ->latest('scans.scan_date_time')
            ->first();

        $data = [
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
            'round' => 1,
            'gap_duration' => 0,
        ];
        if ($lastScanOnTag) {
            $data['gap_duration'] = Carbon::parse($lastScanOnTag->scan_time)->diffInSeconds(Carbon::parse(($data['scan_time'])));
            $data['round'] = $lastScanOnTag->round + 1;
        }

        $scan = $this->scanRepository->create($data);
        return sendSuccess(['scan' => $scan], 'Scanned successfully');
    }
}
