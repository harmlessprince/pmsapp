<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class IsBannedFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        $value  = request()->query($this->filterName())== "yes" ? 1 : 0;
        return $builder->where('is_banned', $value);
    }
}
