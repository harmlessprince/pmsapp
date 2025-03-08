<?php

namespace App\Services;

use App\Enums\RoleEnum;
use App\Models\Region;
use App\Models\Site;
use App\Repositories\Eloquent\Repository\IncidentRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Repositories\Eloquent\Repository\StateRepository;
use App\Repositories\Eloquent\Repository\UserRepository;

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

    public function getAll($authUser, $perPage = 10)
    {
        $incidentQuery = $this->incidentRepository->modelQuery();
        if ($authUser->hasRole(RoleEnum::SUPERVISOR->value)) {
            $region = Region::query()->where("id", $authUser->region_id)->first();
            $sites = Site::query()->where("region_id", $region->id)->get()->pluck("id")->toArray();

            $incidentQuery = $incidentQuery->whereIn('incidents.site_id', $sites);
        } else {
            $incidentQuery = $incidentQuery->where('incidents.site_id', $authUser->site_id);
        }
        return $incidentQuery->paginate($perPage);
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
