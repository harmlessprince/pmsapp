<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class StatusFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('status', request()->query($this->filterName()));
    }
}
