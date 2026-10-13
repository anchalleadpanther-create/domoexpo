<?php

namespace App\View\Components\Customer\Products;

use Illuminate\View\Component;

class ProductCard extends Component
{
  public object $product;
  public bool $isProductListPage;
  public array $images;
  public string $path;
  public bool $hasDiscount;
  public string $categorySlug;
  public bool $showWishlist;
  public float $mrp;
  public float $sellingPrice;
  public string $currency;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($product, $showWishlist, $isProductListPage=true)
  {
    $getCurrentCurrency = getCurrentCurrency();
    $this->product = $product;
    $this->isProductListPage = $isProductListPage;
    // $this->path = (config('myconfig.APP_ENV') === 'development') ? config('myconfig.APP_PRODUCTION_URL') : asset('uploads/products') . '/';
    $this->path = asset('uploads/products') . '/';
    $productImages = $product->images->take(2);


    $this->images = [

      isset($productImages[0]) && file_exists(public_path() . '/uploads/products/' . $productImages[0]->image) ?  $productImages[0] : null,
      isset($productImages[1]) && file_exists(public_path() . '/uploads/products/' . $productImages[1]->image) ?  $productImages[1] : null,
    ];

    // dd(public_path() . '/uploads/products/' . $productImages[0]->image,public_path() . '/uploads/products/' . $productImages[1]->image);

    $this->hasDiscount = isset($this->product->discount) && $this->product->discount > 0 ? true : false;
    $this->categorySlug = $this->product->mappedCategories->last()->category_slug;
    $this->showWishlist = $showWishlist;
    $this->mrp = $this->product->rrp * $getCurrentCurrency->con_ratio;
    $this->sellingPrice = $this->product->price_unit * $getCurrentCurrency->con_ratio;
    $this->currency = $getCurrentCurrency->currency;
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
    return view('components.customer.products.product-card');
  }
}
