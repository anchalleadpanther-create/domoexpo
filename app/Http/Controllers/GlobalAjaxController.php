<?php

namespace App\Http\Controllers;

use Error;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Buyer\TimeSlot;
use App\Models\Extension\City;
use App\Models\Extension\State;
use Illuminate\Http\JsonResponse;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\ServiceCategory;

use App\Models\Ecommerce\ProductType;
use App\Models\Ecommerce\Product;
use Illuminate\Support\Facades\Blade;
use App\Models\Supplier\SupplierOrder;
use App\Models\Ecommerce\ProductTypeValue;
use App\Http\Controllers\Api\ApiController;
use App\Models\Buyer\PackageBooking;
use App\Models\Customer\DeliveryPincode;
use App\Models\Ecommerce\CategoryMappedFilter;
use App\Repositories\Customer\CategoryProductsRepository;
use App\View\Components\Customer\Products\ProductDetailPricing;
use App\Models\Supplier\SellerQuotation;


class GlobalAjaxController extends ApiController
{
  public function getCategoriesAndFilter(Request $request)
  {
    try {
      $categories = Category::where([['parent_id', '=', $request->category_id]])->orderBy('category_name')->get();
      if(isset($request->category_type)){
        if($request->category_type == "Service"){
             $categories = ServiceCategory::where([['parent_id', '=', $request->category_id]])->orderBy('category_name')->get();  
        }
       }
      $filters = CategoryMappedFilter::where('category_id', '=', $request->category_id)->with('filter', 'filter.mappedFilterValues')->get();
      $productTypes = ProductType::orderby('type')->whereIn('type', ['Color', 'Size'])->with('mappedProductTypeValues')->get();
      return $this->successResponse(compact('categories', 'filters', 'productTypes'));
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }
  
  public function getSellerQuoteDetail(Request $request)
  {
    try {
        $seller_quotation =  SellerQuotation::where('id',$request->seller_quote_id)->with(['rfq.RfqProducts.mappedCategories'])->first();
        $seller_quotation_products =  $seller_quotation->quotationProducts()->with(['relatedRfqProduct.mappedCategories'])->get();
      return $this->successResponse(compact('seller_quotation', 'seller_quotation_products'));
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }

  public function getServiceCategoriesAndFilter(Request $request)
  {
    try {
      $categories = ServiceCategory::where([['parent_id', '=', $request->category_id]])->orderBy('category_name')->get();
      $filters = CategoryMappedFilter::where('category_id', '=', $request->category_id)->with('filter', 'filter.mappedFilterValues')->get();
      $productTypes = ProductType::orderby('type')->whereIn('type', ['Color', 'Size'])->with('mappedProductTypeValues')->get();
      return $this->successResponse(compact('categories', 'filters', 'productTypes'));
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }
  
  public function getProductsByCategoryId(Request $request)
  {
    try {
       $categoryIds = is_array($request->category_id) 
            ? $request->category_id 
            : [$request->category_id];
      $query = Product::query();
      $query =  $query->whereHas('mappedCategories',function ($q) use ($categoryIds){
                      $q->whereIn('category_id',$categoryIds);
                  });
      $products  = $query->get();
      return $this->successResponse(compact('products'));
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }


  public function getBrands(Request $request): JsonResponse
  {
    $brands = Category::where([['id', '=', $request->category_id], ['status', '=', 1]])->with('mappedBrands')->first();
    return $this->successResponse(compact('brands'));
  }

  public function getProductTypeValues(Request $request): JsonResponse
  {
    $productTypeValues = ProductTypeValue::where('type_id', '=', $request->type_id)->get();
    return $this->successResponse(compact('productTypeValues'));
  }

  public function getProductTypeLength(Request $request): JsonResponse
  {
    return $this->successResponse(ProductType::where('category_id', '=', $request->category_id)->count());
  }

  public function getVariantDetail(CategoryProductsRepository $CategoryProductsRepository, string $uuid): object
  {
    $product = $CategoryProductsRepository->productDetail($uuid);
    $pricingTemplate =  Blade::renderComponent(new ProductDetailPricing($product, getCurrentCurrency()));
    return $this->successResponse(compact('product', 'pricingTemplate'));
  }

  public function getStates(int $countryId): JsonResponse
  {
    return $this->successResponse(State::where('country_id', $countryId)->orderBy('name')->get());
  }

  public function getCities(int $stateId): JsonResponse
  {
    return $this->successResponse(City::where('state_id', $stateId)->orderBy('name')->get());
  }
  
  public function getCitiesByCountry(int $counryId): JsonResponse
  {
    return $this->successResponse(City::where('country_id', $counryId)->orderBy('name')->get());
  }

  public function getRazorPayKey(): JsonResponse
  {
    return $this->successResponse(config('myconfig.RAZORPAY_KEY'));
  }

  public function validateOrderCounterId(Request $request): JsonResponse
  {
    try {
      if (SupplierOrder::where('order_id_counter', '=', $request->orderId)->doesntExist())
        throw new Error('Order id does not exists');

      return $this->successResponse([], 'Order id exists');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  public function getSelectedDateSlots(int $expertId, string $date): JsonResponse
  {
    try {
      $day = Str::lower(Carbon::createFromFormat('Y-m-d', $date)->format('l'));

      // $days = CarbonPeriod::create(now()->format('Y-m-d'), now()->addDays(14)->format('Y-m-d'));
      // $bookedSlots = [];
      // foreach ($days as $currentDay)
      // array_push($bookedSlots, ...PackageBooking::where('date', '=', $date)->pluck('time')->toArray());
      $bookedSlots = PackageBooking::where('date', '=', $date)->pluck('time')->toArray();

      $slots = TimeSlot::orderBy('time')->where([['day', '=', $day], ['user_id', '=', $expertId]])->whereNotIn('time', $bookedSlots)->get();

      foreach ($slots as $key => $slot)
        if (isset($slot->excluding_dates) && in_array($date, $slot->excluding_dates, true))
          unset($slots[$key]);

      $slots = array_values($slots->toArray());

      return $this->successResponse($slots, []);
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }

  public function getDeliveryPincodeInfo(Request $request): JsonResponse
  {
    $getDeliveryPincodeInfo = DeliveryPincode::where('pincode', '=', $request->pincode)->first();
    return $this->successResponse(compact('getDeliveryPincodeInfo'));
  }
  
  
   public function saveToken(Request $request)
    {
        try {
            // $request->validate([
            //     'token' => 'required|string',
            //     'device_type' => 'required|string',
            // ]);

            if(auth()->guard('buyer')->check()){
              $user = auth()->guard('buyer')->user();
            }elseif(auth()->guard('vendor')->check()){
              $user = auth()->guard('vendor')->user();
            }elseif(auth()->check()){
              $user = auth()->user();
            }
            $token = $request->token;
            $device_type = $request->device_type;
            if ($user) {
                // $user = $request->user();
                $user->device_type = $device_type;
                $user->device_token = $token;
                $user->save();
                
                return $this->successResponse($user, 'Token saved successfully');
            } else {
                return $this->errorResponse('User not found');
            }
        } catch (\Throwable $th) {
            return $this->errorResponse('User not found');
        }
    }
}
