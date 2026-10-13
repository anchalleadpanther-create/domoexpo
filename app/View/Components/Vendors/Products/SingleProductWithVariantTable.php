<?php

namespace App\View\Components\Vendors\Products;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SingleProductWithVariantTable extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(public LengthAwarePaginator $products, public Collection $productTypes)
  {
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.vendors.products.single-product-with-variant-table');
  }
}
