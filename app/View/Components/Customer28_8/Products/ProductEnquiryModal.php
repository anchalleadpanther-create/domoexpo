<?php

namespace App\View\Components\Customer\Products;

use Illuminate\View\Component;

class ProductEnquiryModal extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(public int $productId)
  {
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.customer.products.product-enquiry-modal');
  }
}
