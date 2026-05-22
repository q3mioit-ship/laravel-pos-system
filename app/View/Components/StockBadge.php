<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StockBadge extends Component
{
    public $stock;

    public function __construct($stock)
    {
        $this->stock = $stock;
    }

    public function render(): View
    {
        return view('components.stock-badge');
    }
}