<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class FirstNameFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('first_name', request()->query($this->filterName()));
    }
}
