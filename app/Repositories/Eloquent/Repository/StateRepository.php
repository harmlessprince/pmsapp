<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\State;

class StateRepository extends BaseRepository
{
    public function __construct(State $model)
    {
        parent::__construct($model);
    }


    public function fetchByCountryID(int $countryID = 160)
    {
       return  $this->modelQuery()->where('country_id', $countryID)->get();
    }

}

