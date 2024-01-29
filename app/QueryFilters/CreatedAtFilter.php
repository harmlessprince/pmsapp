<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class CreatedAtFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        $fromDate = request()->query('from_date', Carbon::now()->toDateString());
        $toDate = request()->query('to_date', Carbon::now()->addMonth()->toDateString());
        return $builder->whereBetween('created_at', [$fromDate, $toDate]);
    }
}
