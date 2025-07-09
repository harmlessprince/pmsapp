<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class RegionIdFilter extends BaseFilter
{
    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('region_id', request()->query($this->filterName()));
    }
}
