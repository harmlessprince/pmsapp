<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Region;

class RegionRepository  extends BaseRepository
{
    public function __construct(Region $model)
    {
        parent::__construct($model);
    }


}
