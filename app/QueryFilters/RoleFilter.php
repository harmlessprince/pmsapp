<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class RoleFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        $value = \request()->query($this->filterName());
        if (is_array($value)) {
            return $builder->whereHas('roles', function ($query) use ($value) {
                $query->whereIn('id', $value);
            });
        }
        return $builder->whereHas('roles', function ($query) use ($value) {
            $query->where('id', $value);
        });
    }



}
