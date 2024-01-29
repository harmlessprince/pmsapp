<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class BaseFilter
{

//    public function __construct()
//    {
//    }

    public function handle(mixed $builder, \Closure $next)
    {
        $builder = $next($builder);
        if (!\request()->has($this->filterName())  && !$this->getFilterValueDefault()) return $builder;
        if (!\request()->query($this->filterName()) && !$this->getFilterValueDefault()) return $builder;
        return $this->applyFilter($builder);
    }

    protected function filterName(): string
    {
        $string = str_replace('Filter', '', class_basename($this));
        return Str::snake($string);
    }


    protected abstract function applyFilter(Builder $builder);

    protected function getFilterValueDefault():mixed
    {
        return null;
    }
}
