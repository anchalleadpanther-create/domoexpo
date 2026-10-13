<?php

namespace App\View\Components\Purchasync\Listing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SupplierServiceCard extends Component
{
    public object $service;
    public string $currency;
    public string $categorySlug;
    public string $path;
    public array $images;

    /**
     * Create a new component instance.
     */
    public function __construct($service)
    {
        $getCurrentCurrency = getCurrentCurrency();
        $this->service = $service;
       $this->categorySlug = $this->service->mappedServiceCategories->last()->category_slug ?? '';
        $this->currency = $getCurrentCurrency->currency;
        $this->path = asset('uploads/services') . '/';
        $serviceImages = $service->images->take(2);

        $this->images = [
        isset($serviceImages[0]) && file_exists(public_path() . '/uploads/products/' . $serviceImages[0]->image) ?  $serviceImages[0] : null,
        isset($serviceImages[1]) && file_exists(public_path() . '/uploads/products/' . $serviceImages[1]->image) ?  $serviceImages[1] : null,
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.purchasync.listing.supplier-service-card');
    }
}
