<?php

namespace App\Http\Controllers\Customer\Ad;

use App\Models\Ad\Ad;
use Illuminate\View\View;
use App\Models\Ad\AdCategory;
use App\Http\Controllers\Controller;
use App\Repositories\Customer\CategoryAdsRepository;
use App\Repositories\Customer\CategoryProductsRepository;

class CategoryAdController extends Controller
{
  protected $CategoryAdsRepository;
  protected $CategoryProductsRepository;

  public function __construct(CategoryAdsRepository $CategoryAdsRepository, CategoryProductsRepository $CategoryProductsRepository)
  {
    $this->CategoryAdsRepository = $CategoryAdsRepository;
    $this->CategoryProductsRepository = $CategoryProductsRepository;
  }

  public function ads(string $categoryName, int $categoryId): View
  {
    $category = AdCategory::find($categoryId);

    $ads = $this->CategoryAdsRepository->getCategoryAds($categoryId);

    $parentCategoryId = $this->CategoryProductsRepository->getParentCategory($category);

    $filters = $this->CategoryAdsRepository->getCategoryFilters($categoryId);

    $maxPrice  = $this->CategoryAdsRepository->getMinAndMaxPrice($ads)['maxPrice'];
    $minPrice = $this->CategoryAdsRepository->getMinAndMaxPrice($ads)['minPrice'];

    return view('customer.ads.category-ads', compact('ads', 'category', 'maxPrice', 'minPrice', 'filters'));
  }

  public function AdDetail(string $adName, int $adId)
  {
    $ad = Ad::find($adId);

    return view('customer.ads.ad-detail', compact('ad'));
  }
}
