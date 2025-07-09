<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $actionUrl = "",
        public string $formId = 'search-form',
        public bool   $canExport = false,
        public bool   $canSearch = false,
        public bool   $canDelete = false,
        public string   $searchPlaceholder = "Search",
        public bool $hasTable = true,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-card');
    }
}
