<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $variant,
        public string $size,
    ){}

    public function setButtonVariant($variant): string {
        return match ($variant) {
            'primary' => 'button-primary',
            'ghost' => 'button-ghost',
            default => 'button-ghost',
        };
    }

    public function setButtonSize($size): string {
        return match ($size) {
            'sm' => 'button-sm',
            'md' => 'button-md',
            'lg' => 'button-lg',
            default => 'button-md',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.button');
    }
}
