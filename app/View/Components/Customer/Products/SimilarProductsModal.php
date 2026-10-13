<?php

namespace App\View\Components\Customer\Products;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SimilarProductsModal extends Component
{


    public object $products;
//   public array $images;
//   public string $path;
//   public bool $hasDiscount;
//   public string $categorySlug;
  public bool $showWishlist;
//   public float $mrp;
//   public float $sellingPrice;
//   public string $currency;

    /**
     * Create a new component instance.
     */
     public function __construct($products, $showWishlist)
  { 
    // $getCurrentCurrency = getCurrentCurrency();
    $this->products = $products;
    $this->showWishlist = $showWishlist;
    
  }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customer.products.similar-products-modal');
    }
}
