<?php

namespace App\Repositories\Customer;

use App\Models\Ad\Ad;
use App\Models\Ad\AdFilter;
use App\Repositories\BaseRepository;

class CategoryAdsRepository extends BaseRepository
{
  public function getCategoryAds($categoryId): object
  {
    return
      Ad::orderByDesc('id')->where([
        ['status', '=', 1]
      ])->whereHas('mappedCategories', function ($q) use ($categoryId) {
        $q->where('category_id', '=', $categoryId);
      })->get();
  }

  public function getCategoryFilters($categoryId): object
  {
    return AdFilter::where([
      ['status', '=', 1]
    ])->whereHas('mappedCategories', function ($q) use ($categoryId) {
      $q->where('category_id', '=', $categoryId);
    })->get();
  }

  public function getMinAndMaxPrice($ads): array
  {
    $maxPrice = $minPrice = NULL;
    if (!$ads->isEmpty()) {
      foreach ($ads as $key => $ad) {
        if ($ad->price->rrp > $maxPrice || $maxPrice === NULL) {
          $maxPrice = $ad->price->rrp;
        }
        if ($ad->price->rrp < $minPrice || $minPrice === NULL) {
          $minPrice = $ad->price->rrp;
        }
      }
    }
    return compact('maxPrice', 'minPrice');
  }
}
