<?php

namespace App\View\Components\Purchasync\DetailPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceDetailImages extends Component
{

    public object $service;
    /**
     * Create a new component instance.
     */
    public function __construct($service)
    {
        $this->service = $service;
        // dd($service->images);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.purchasync.detail-page.service-detail-images');
    }
}
