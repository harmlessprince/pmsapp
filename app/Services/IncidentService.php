<?php

namespace App\Services;

use App\Enums\RoleEnum;
use App\Exports\AttendanceExport;
use App\Models\Region;
use App\Models\Site;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\DateFilter;
use App\QueryFilters\SiteIdFilter;
use App\QueryFilters\StatusFilter;
use App\Repositories\Eloquent\Repository\IncidentRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\StateRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Carbon\Carbon;

class IncidentService
{
    public function __construct(
        private readonly SiteRepository     $siteRepository,
        private readonly UserRepository     $userRepository,
        private readonly StateRepository    $stateRepository,
        private readonly IncidentRepository $incidentRepository,
    )
    {
    }

    public function getAll($authUser, $perPage = 15)
    {
        $action = request()->query('action');
        $pipes = [
            new CreatedAtFilter(),
            CompanyIdFilter::class,
            SiteIdFilter::class,
            StatusFilter::class,
        ];
        $incidentQuery = $this->incidentRepository->modelQuery()->with(['user', 'site', 'reportedBy']);
        $incidentQuery = constructPipes($incidentQuery, $pipes);
        $sites = \request()->query('sites', '');
        if ($sites != '') {
            $sites = explode(',', $sites);
        } else {
            $sites = [];
        }



        if (request()->query('type')) {
            $incidentQuery = $incidentQuery->where('type', request()->query('mode'));
        }
        if ($authUser->hasRole(RoleEnum::SUPERVISOR->value)) {
            $region = Region::query()->where("id", $authUser->region_id)->first();
            $sites = Site::query()->where("region_id", $region->id)
                ->when(count($sites) > 0, function ($query) use ($sites) {
                    $query->whereIn("id", $sites);
                })->get()->pluck("id")->toArray();
            $incidentQuery = $incidentQuery->whereIn('incidents.site_id', $sites);
        } else if ($authUser->hasRole(RoleEnum::SITE_INSPECTOR->value)) {
            $incidentQuery = $incidentQuery->where('incidents.site_id', $authUser->site_id);
        }

//        if ($action == 'export') {
//            $name = 'incident_report_' . Carbon::now()->format('d-m-Y') . '.xlsx';
//            session()->flash('success', 'Attendance exported successfully');
//            return (new AttendanceExport($incidentQuery))->download($name);
//        }

        if ($action == 'delete') {
            session()->flash('success', 'Attendances deleted successfully');
            $incidentQuery->delete();
        }

        return $incidentQuery->latest()->paginate($perPage);
    }

    public function getById(int $id)
    {
        return $this->incidentRepository->modelQuery()->where('id', $id)->first();
    }

    public function create(array $data)
    {
        return $this->incidentRepository->modelQuery()->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->incidentRepository->modelQuery()->where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->incidentRepository->modelQuery()->where('id', $id)->delete();
    }
}
