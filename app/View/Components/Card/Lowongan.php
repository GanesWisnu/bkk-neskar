<?php

namespace App\View\Components\Card;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Lowongan extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public object $list,
    )
    {
        // dd($list);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.lowongan');
    }
}
