<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class StatusFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        $status = request()->query($this->filterName()) == 'yes';

        return $builder->where('status', $status);
    }
}
