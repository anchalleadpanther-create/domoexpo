<?php

namespace App\View\Components\Purchasync\DetailPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductDetailImages extends Component
{
    public object $product;
    /**
     * Create a new component instance.
     */
    public function __construct($product)
    {
         $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.purchasync.detail-page.product-detail-images');
    }
}
