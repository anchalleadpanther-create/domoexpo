<?php

namespace App\View\Components\Customer;

use Illuminate\View\Component;

class VideoModal extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(public string $url)
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
    return view('components.customer.video-modal');
  }
}
