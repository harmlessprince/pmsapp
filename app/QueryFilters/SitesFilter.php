<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class SitesFilter extends BaseFilter
{
    private string $column;

    public function __construct(string $column = 'site_id')
    {
        $this->column = $column;
    }

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where($this->column, request()->query($this->filterName()));
    }

}
