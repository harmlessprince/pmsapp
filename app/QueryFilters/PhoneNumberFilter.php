<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class PhoneNumberFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('phone_number', request()->query($this->filterName()));
    }
}
