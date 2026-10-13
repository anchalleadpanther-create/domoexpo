<?php

namespace App\View\Components\Designers;

use Illuminate\View\Component;

class WishlistDesignerCard extends Component
{
  public object $designer;
  public string $path;
  public int $id;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($designer)
  {
    $this->designer = $designer->designer;
    $this->path = asset('uploads/brand') . '/';
    $this->id = $designer->id;
  }
  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.designers.wishlist-designer-card');
  }
}
