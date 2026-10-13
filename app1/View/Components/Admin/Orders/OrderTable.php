<?php

namespace App\View\Components\Admin\Orders;

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
    return view('components.admin.orders.order-table');
  }
}
