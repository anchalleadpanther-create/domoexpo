<?php

namespace App\View\Components\Customer\Products;

use Illuminate\View\Component;

class WishlistProductCard extends Component
{
  public object $product;
  public array $images;
  public string $path;
  public bool $hasDiscount;
  public string $categorySlug;
  public int $id;
  public float $mrp;
  public float $sellingPrice;
  public string $currency;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($product)
  {
    $this->product = $product->product;
    $this->path = asset('uploads/products') . '/';
    $this->images = [
      $this->product->images[0] ?? null,
      $this->product->images[1] ?? null,
    ];
    $this->hasDiscount = isset($this->product->discount) && $this->product->discount > 0 ? true : false;
    $this->categorySlug = $this->product->mappedCategories->last()->category_slug;
    $this->id = $product->id;
    $this->mrp = $this->product->rrp * getCurrentCurrency()->con_ratio;
    $this->sellingPrice = $this->product->price_unit * getCurrentCurrency()->con_ratio;
    $this->currency = getCurrentCurrency()->currency;
    /* 
      If there's no discount on product level and the discount is set on brand above 0
      then applying the discount of brand level on the product
    */
    if (isset($this->product->brand) && $this->product->brand->discount > 0.00 && !$this->hasDiscount) {
      $this->hasDiscount = true;
      $calculatedDiscount = ($this->product->brand->discount / 100) * $this->sellingPrice;
      $this->sellingPrice -= $calculatedDiscount;
    }
  }
  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.customer.products.wishlist-product-card');
  }
}
