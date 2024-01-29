<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class SiteIdFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('site_id', request()->query($this->filterName()));
    }
}
{

}
