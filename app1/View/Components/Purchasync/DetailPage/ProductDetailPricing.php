<?php

namespace App\View\Components\Purchasync\DetailPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductDetailPricing extends Component
{

    public object $product;
    public bool $hasDiscount;
    public float $discount;
    public float $mrp;
    public float $sellingPrice;
    public string $currency;
    /**
     * Create a new component instance.
     */
    public function __construct($product)
    {
        $getCurrentCurrency = getCurrentCurrency();
        $this->product = $product;

        $this->hasDiscount = isset($product->discount) && $product->discount > 0 ? true : false;
        $this->discount = $product->discount;
        $this->mrp = $product->rrp * $getCurrentCurrency->con_ratio;
        $this->sellingPrice = $product->price_unit * $getCurrentCurrency->con_ratio;
        $this->currency = $getCurrentCurrency->currency;
        /* 
        If there's no discount on product level and the discount is set on brand above 0
        then applying the discount of brand level on the product
        */
        if (isset($product->brand) && $product->brand->discount > 0.00 && !$this->hasDiscount) {
        $this->hasDiscount = true;
        $calculatedDiscount = ($product->brand->discount / 100) * $this->sellingPrice;
        $this->sellingPrice -= $calculatedDiscount;
        $this->discount = $product->brand->discount;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.purchasync.detail-page.product-detail-pricing');
    }
}
