<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Site;
class SiteRepository extends BaseRepository
{
    public function __construct(Site $model)
    {
        parent::__construct($model);
    }
}

