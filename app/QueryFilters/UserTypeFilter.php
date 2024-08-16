<?php

namespace App\QueryFilters;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserTypeFilter extends BaseFilter
{

    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('user_type', request()->query($this->filterName(), $this->getFilterValueDefault()));
    }

    protected function getFilterValueDefault(): ?string
    {
        return '';
    }

}
