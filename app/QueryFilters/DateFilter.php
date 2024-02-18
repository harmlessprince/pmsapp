<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class DateFilter extends BaseFilter
{
    private string $column;
    private ?string $defaultStartMonth;
    private ?string $defaultEndMonth;

    public function __construct(string $column = 'created_at', $defaultStartMonth = null, $defaultEndMonth = null)
    {
        $this->column = $column;
        $this->defaultStartMonth = $defaultStartMonth;
        $this->defaultEndMonth = $defaultEndMonth;
    }

    protected function applyFilter(Builder $builder): Builder
    {

        $fromDate = request()->query($this->column . '_from_date', $this->defaultStartMonth);
        $toDate = request()->query($this->column . '_to_date', $this->defaultEndMonth);
        if (!$fromDate || !$toDate) return $builder;
        return $builder->whereBetween($this->column, [Carbon::parse($fromDate)->startOfDay(), Carbon::parse($toDate)->endOfDay()]);
    }
    protected function getFilterValueDefault():mixed
    {
        return true;
    }
}
