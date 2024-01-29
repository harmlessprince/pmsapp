<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class AttendanceActionTypeFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('action_type', request()->query($this->filterName()));
    }
}
