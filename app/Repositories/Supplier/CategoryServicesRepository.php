<?php

namespace App\Repositories\Supplier;

use Carbon\Carbon;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Filter;
use App\Models\Supplier\SellerService;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryServicesRepository extends BaseRepository
{
  /* 
    These functions get product for the category page
  */

  // this function gets the product detail depending upon its uuid
  public function ServiceDetail(string $serviceSlug): object
  {
    return SellerService::where([['slug', $serviceSlug], ['status', '=', 1]])->firstOrFail();
  }

  public function relatedServices($product): object
  {
    return SellerService::where([['status', '=', 1]])->get();
  //  return  $product->mappedCategoriesUntouched->last()->id;
  //   if ($product->parent_id === 0) {
  //     return $this->getCategoryProducts($product->mappedCategoriesUntouched->last()->id, 25, ($product->parent_id != 0) ? $product->parent_id : $product->id);
  //   } else {
  //     return $this->getCategoryProducts($product->parentProduct->mappedCategoriesUntouched->last()->id, 25, ($product->parent_id != 0) ? $product->parent_id : $product->id);
  //   }

  }

 


}
