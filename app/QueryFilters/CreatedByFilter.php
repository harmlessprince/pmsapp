<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class CreatedByFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('created_by', request()->query($this->filterName()));
    }
}
