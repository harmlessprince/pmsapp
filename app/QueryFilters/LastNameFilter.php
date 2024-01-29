<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class LastNameFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('last_name', request()->query($this->filterName()));
    }
}
