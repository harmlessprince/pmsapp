<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class DateFilter extends BaseFilter
{
    private string $column;

    public function __construct(string $column = 'created_at')
    {
        $this->column = $column;
    }

    protected function applyFilter(Builder $builder): Builder
    {
        $fromDate = request()->query($this->column.'_from_date', Carbon::now()->startOfMonth()->toDateString());
        $toDate = request()->query($this->column.'_to_date', Carbon::now()->endOfMonth()->toDateString());
        return $builder->whereBetween($this->column, [$fromDate, $toDate]);
    }
}
