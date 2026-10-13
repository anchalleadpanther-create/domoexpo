<?php

namespace App\View\Components\Admin\Ecommerce\Orders;

use Illuminate\View\Component;

class OrderCommentModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
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
        return view('components.admin.ecommerce.orders.order-comment-modal');
    }
}
