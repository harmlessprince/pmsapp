<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class ExampleFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('example', request()->query($this->filterName()));
    }
}
