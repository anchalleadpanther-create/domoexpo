<?php

namespace App\View\Components\Vendors\Orders;

use Illuminate\View\Component;

class OrderTable extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(public $orders)
  {
    //
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.vendors.orders.order-table');
  }
}
