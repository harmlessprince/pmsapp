<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class IdFilter extends BaseFilter
{
    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('id', request()->query($this->filterName()));
    }
}
