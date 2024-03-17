<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Loader extends Component
{
    public string $loaderId;

    /**
     * Create a new component instance.
     */
    public function __construct(string $loaderId = 'ajax_loader')
    {
        $this->loaderId = $loaderId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.loader', [
            'loaderId' => $this->loaderId
        ]);
    }
}
