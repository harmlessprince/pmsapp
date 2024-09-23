<?php

namespace App\QueryFilters;

use App\Exceptions\InvalidFilterDateException;
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

    /**
     * @throws InvalidFilterDateException
     */
    protected function applyFilter(Builder $builder): Builder
    {

        $fromDate = request()->query($this->column . '_from_date', $this->defaultStartMonth);
        $toDate = request()->query($this->column . '_to_date', $this->defaultEndMonth);
        if (!$fromDate || !$toDate) return $builder;
        if (request()->query('frequency', 'daily') == 'daily'){
            if (Carbon::parse($fromDate)->isAfter(Carbon::parse($toDate))) {
                $temp = $fromDate;
                $fromDate =  $toDate;
                $toDate =  $temp;
                request()->session()->flash('error', "Start Date can not be after the End Date");
            }
            if (Carbon::parse($fromDate)->diffInWeeks(Carbon::parse($toDate)) > 4) {
                $toDate =  Carbon::parse($fromDate)->addWeeks(4)->format('Y-m-d');
                request()->session()->flash('error', "You can not filter more than 4 weeks(1 month)");
            }
        }

        return $builder->whereBetween($this->column, [Carbon::parse($fromDate)->startOfDay(), Carbon::parse($toDate)->endOfDay()]);
    }
    protected function getFilterValueDefault():mixed
    {
        return true;
    }
}
