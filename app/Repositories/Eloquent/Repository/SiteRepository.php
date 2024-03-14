<?php

namespace App\Repositories\Eloquent\Repository;

use App\Enums\RoleEnum;
use App\Models\Site;
use App\Services\FileUploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SiteRepository extends BaseRepository
{
    public function __construct(Site $model)
    {
        parent::__construct($model);
    }


}

