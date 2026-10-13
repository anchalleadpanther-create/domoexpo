<?php

namespace App\Repositories\Buyer;

use App\Models\Buyer\Buyer;
use App\Repositories\BaseRepository;
use Spatie\Newsletter\Facades\Newsletter;



class BuyerRepository extends BaseRepository
{
  public function update($request, $id)
  {
    try {
    //   if (!isset($request->newsletter)) {
    //     $request->request->add(['newsletter' => 0]);
    //     Newsletter::unsubscribe($request->email);
    //   } else {
    //     Newsletter::subscribeOrUpdate($request->email);
    //   }
      $type_of_hotels =   $request->type_of_hotels ?? [];
      $typeOfRestaurantOrCafe =   $request->type_of_restaurant_or_cafe ?? [];
      
      if ($request->hasfile('profile_img')) :
        $request->request->add(['photo' => $this->handleSingleFileUpload($request->profile_img, 'uploads/buyer/')]);
      endif;
      
      Buyer::find($id)->update($request->except('_token','type_of_hotels'));
      $this->mapBuyerHotelTypes($id,$type_of_hotels);
      $this->mapContractorType($id,$request);
      $this->mapBuyerRestaurantOrCafeTypes($id,$typeOfRestaurantOrCafe);
   
    } catch (\Throwable $th) {
      dd($th);
    }

    return true;
  }
  
  public function mapContractorType(int $buyerId, $request): bool
  {
      return true;
    $buyer = Buyer::find($buyerId);
    $buyer->mappedTypesOfHotels()->detach();
    if (is_array($typeOfHotels) && !empty($typeOfHotels)) {
      foreach ($typeOfHotels as $value) {
        $buyer->mappedTypesOfHotels()->attach($buyerId, ['dropdown_id' => (int)$value]);
      }
    }
    return true;
  }

  public function toggleStatus($id, $status)
  {
    return Buyer::find($id)->update(['status' => $status]);
  }
  
  public function toggleQuotationStatus($id, $status)
  {
    //   dd($id, $status);
    return Buyer::find($id)->update(['quotation_status' => $status]);
  }
  
  

  // public function mapBuyerProductIndustries(int $buyerId, array $productBuyingIndustry = []): bool
  // {
  //   $buyer = Buyer::find($buyerId);
  //   $buyer->productIndustries()->detach();
  //   if (is_array($productBuyingIndustry) && !empty($productBuyingIndustry)) {
  //     foreach ($productBuyingIndustry as $value) {
  //       $buyer->productIndustries()->attach($buyerId, ['dropdown_id' => (int)$value]);
  //     }
  //   }
  //   return true;
  // }

  // public function mapBuyerServiceIndustries(int $buyerId, array $serviceBuyingIndustry = []): bool
  // {
  //   $buyer = Buyer::find($buyerId);
  //   $buyer->serviceIndustries()->detach();
  //   if (is_array($serviceBuyingIndustry) && !empty($serviceBuyingIndustry)) {
  //     foreach ($serviceBuyingIndustry as $value) {
  //       $buyer->serviceIndustries()->attach($buyerId, ['dropdown_id' => (int)$value]);
  //     }
  //   }
  //   return true;
  // }


  public function mapBuyerHotelTypes(int $buyerId, array $typeOfHotels = []): bool
  {
    $buyer = Buyer::find($buyerId);
    $buyer->mappedTypesOfHotels()->detach();
    if (is_array($typeOfHotels) && !empty($typeOfHotels)) {
      foreach ($typeOfHotels as $value) {
        $buyer->mappedTypesOfHotels()->attach($buyerId, ['dropdown_id' => (int)$value]);
      }
    }
    return true;
  }
  
  public function mapBuyerRestaurantOrCafeTypes(int $buyerId, array $typeOfRestaurantOrCafe= []): bool
  {
    $buyer = Buyer::find($buyerId);
    $buyer->mappedTypesOfRestaurantOrCafe()->detach();
    if (is_array($typeOfRestaurantOrCafe) && !empty($typeOfRestaurantOrCafe)) {
      foreach ($typeOfRestaurantOrCafe as $value) {
        $buyer->mappedTypesOfRestaurantOrCafe()->attach($buyerId, ['dropdown_id' => (int)$value]);
      }
    }
    return true;
  }
  


  public function mapBuyerOrganizationIndustries(int $buyerId, array $organizationIndustry = []): bool
  {
    $buyer = Buyer::find($buyerId);
    $buyer->organizationIndustries()->detach();
    if (is_array($organizationIndustry) && !empty($organizationIndustry)) {
      foreach ($organizationIndustry as $value) {
        $buyer->organizationIndustries()->attach($buyerId, ['dropdown_id' => (int)$value]);
      }
    }
    return true;
  }
}
