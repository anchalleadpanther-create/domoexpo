<?php

namespace App\Actions\Marketplace\DetailPage;

use Illuminate\View\View;
use App\Models\Customer\Rating;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Supplier\CategoryServicesRepository;
use App\Models\Buyer\CustomerViewedProduct;
use App\Models\Ecommerce\RelatedCategoryMapped;
use Illuminate\Http\Request;
use App\Models\Supplier\SellerService;


class ServiceDetail
{
  use AsAction;

  public function __construct(private CategoryServicesRepository $CategoryServicesRepository)
  {
  }

  public function handle(Request $request,string $serviceSlug): View
  {
    try {
       $request->all();
      $user = auth()->guard('buyer')->user();
      //  $category = ServiceCategory::where('category_slug', $categorySlug)->firstOrFail();
      $service = $this->CategoryServicesRepository->ServiceDetail($serviceSlug);
      $images = SellerService::find($service->id)->images;
      $relatedServices = SellerService::get();
     
      return view('purchasync.detail-page.service-detail', compact('service','relatedServices', 'images'));
    } catch (ModelNotFoundException $th) {

      abort(404);
    } catch (\Throwable $th) {
      dd($th->getMessage().' '.$th->getLine());
    }
  }

  private function calculateRatings($productRatings): array
  {
    $star1Count = $star2Count = $star3Count = $star4Count = $star5Count = 0;

    // Loop through each rating and count the occurrences of each star rating
    foreach ($productRatings as $rating) {
      switch ($rating->star) {
        case 1:
          $star1Count++;
          break;
        case 2:
          $star2Count++;
          break;
        case 3:
          $star3Count++;
          break;
        case 4:
          $star4Count++;
          break;
        case 5:
          $star5Count++;
          break;
      }
    }

    // Calculate the percentage for each star rating
    $totalRatings = count($productRatings);
    $percentage1Star = $totalRatings === 0 ? 0 : number_format(($star1Count / $totalRatings) * 100, 2, '.', '.');
    $percentage2Star =  $totalRatings === 0 ? 0 : number_format(($star2Count / $totalRatings) * 100, 2, '.', '.');
    $percentage3Star =  $totalRatings === 0 ? 0 : number_format(($star3Count / $totalRatings) * 100, 2, '.', '.');
    $percentage4Star =  $totalRatings === 0 ? 0 : number_format(($star4Count / $totalRatings) * 100, 2, '.', '.');
    $percentage5Star =  $totalRatings === 0 ? 0 : number_format(($star5Count / $totalRatings) * 100, 2, '.', '.');

    return compact('percentage1Star', 'percentage2Star', 'percentage3Star', 'percentage4Star', 'percentage5Star');
  }
}
