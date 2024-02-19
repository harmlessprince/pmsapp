<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class TagIdFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder)
    {
        return $builder->where('tag_id', request()->query($this->filterName()));
    }
}
