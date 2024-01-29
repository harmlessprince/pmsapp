<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class StateIdFilter extends BaseFilter
{
    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('state_id', request()->query($this->filterName()));
    }
}
