<?php

namespace App\View\Components\Customer\Products;

use Illuminate\View\Component;

class SizeChartModal extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(public string|null $productSizeChart, public string|null $brandSizeChart)
  {
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.customer.products.size-chart-modal');
  }
}
