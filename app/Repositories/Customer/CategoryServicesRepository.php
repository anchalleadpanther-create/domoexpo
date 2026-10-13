<?php

namespace App\Repositories\Customer;

use App\Models\Service\Service;
use App\Repositories\BaseRepository;
use App\Models\Service\ServiceFilter;

class CategoryServicesRepository extends BaseRepository
{
  public function getCategoryServices($categoryId): object
  {
    return
      Service::orderByDesc('id')->where([
        ['status', '=', 1]
      ])->whereHas('mappedCategories', function ($q) use ($categoryId) {
        $q->where('category_id', '=', $categoryId);
      })->get();
  }

  public function getCategoryFilters($categoryId): object
  {
    return ServiceFilter::where([
      ['status', '=', 1]
    ])->whereHas('mappedCategories', function ($q) use ($categoryId) {
      $q->where('category_id', '=', $categoryId);
    })->get();
  }

  public function getMinAndMaxPrice($services): array
  {
    $maxPrice = $minPrice = NULL;
    if (!$services->isEmpty()) {
      foreach ($services as $key => $service) {
        if ($service->price->rrp >   $maxPrice || $maxPrice === NULL) {
          $maxPrice = $service->price->rrp;
        }
        if ($service->price->rrp < $minPrice || $minPrice === NULL) {
          $minPrice = $service->price->rrp;
        }
      }
    }
    return compact('maxPrice', 'minPrice');
  }
}
