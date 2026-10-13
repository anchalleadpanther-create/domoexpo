<?php

namespace App\View\Components\Marketplace;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\AskForSample;

class ArchitectorCard extends Component
{

  public object $architect;
    /**
     * Create a new component instance.
     */
  public function __construct($architect)
  {
      $user = auth()->guard('buyer')->user();
    
  }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.marketplace.listing.architect-card');
    }
}
