<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class GenderFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('gender', request()->query($this->filterName()));
    }
}
