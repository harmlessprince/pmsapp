<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Attendance;
use App\Models\Incident;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IncidentRepository extends BaseRepository
{
    public function __construct(Incident $model)
    {
        parent::__construct($model);
    }
}
