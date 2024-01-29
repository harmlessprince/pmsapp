<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class CompanyIdFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('company_id', request()->query($this->filterName()));
    }
}
