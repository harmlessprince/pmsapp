<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class IndustryIdFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('industry_id', request()->query($this->filterName()));
    }
}
