<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class UserCompanyIndustryFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->whereHas('company.businessSector', function ($query)
        {
            $query->where('name', 'LIKE', '%' . request()->query($this->filterName()) . '%');
        });
    }
}
