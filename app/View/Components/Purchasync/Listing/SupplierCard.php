<?php

namespace App\View\Components\Purchasync\Listing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SupplierCard extends Component
{

     public object $supplier;
  public string $path;

    /**
     * Create a new component instance.
     */
    public function __construct($supplier)
    {
        $this->supplier = $supplier;
        $this->path = asset('uploads/supplier') . '/';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.purchasync.listing.supplier-card');
    }
}
