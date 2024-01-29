<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class EmailFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('email', request()->query($this->filterName()));
    }
}
