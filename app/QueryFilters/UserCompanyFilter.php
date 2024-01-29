<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class UserCompanyFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        // dd(request()->query($this->filterName()) );
        
        return $builder->whereHas('company', function ($query)
        {
            $query->where('name', 'LIKE', '%' . request()->query($this->filterName()) . '%');
        });
    }
}
