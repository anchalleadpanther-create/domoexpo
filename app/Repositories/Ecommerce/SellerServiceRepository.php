<?php

namespace App\Repositories\Ecommerce;

use Illuminate\Support\Str;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

use App\Models\Supplier\SellerService;
use App\Models\Ecommerce\ServiceCategory;
use App\Models\Supplier\SellerServiceMappedCategory;
use App\Models\Ecommerce\ServiceImage;
use App\Models\Supplier\SellerServiceMappedServiceLabel;


class SellerServiceRepository extends BaseRepository
{ 
  public function getServiceDetails($service)
  {
    $pCategories = $pSubCategories = $pSubSubCategories = $lastCategoryId = null;
    $brands = [];
    $categories = ServiceCategory::where([['status', '=', 1], ['parent_id', '=', 0]])->get();
 
    foreach ($service->mappedServiceCategories as $mappedCategory) {
      if ($mappedCategory->parent_id === 0) {
        $brands = ServiceCategory::where([['id', '=', $mappedCategory->id], ['status', '=', 1]])->with('mappedBrands')->first();
        $mainCategory = ServiceCategory::find($mappedCategory->id);
        $pCategories = ServiceCategory::where('parent_id', '=', 0)->get();
        $pSubCategories = ServiceCategory::where([['status', '=', 1], ['parent_id', '=', $mainCategory->id]])->get();
        $pSubSubCategories = ServiceCategory::where([['status', '=', 1]])->whereIn('parent_id', $pSubCategories->pluck('id')->toArray())->get();
      }
    }

    $deliveryOptions = explode(',', $service->delivery_options);

    $lastCategoryId = @$service->mappedServiceCategories->first()->id;


    return compact('categories', 'pCategories', 'pSubCategories', 'pSubSubCategories', 'deliveryOptions', );
  }


  // Store method
  public function store($request)
  {
    try {
      // dd($request->all());
      $request->request->add(['slug' => Str::slug($request->title, '-')]);
      $request->request->add(['add_by' => Auth::user()->id]);
      $sData = $request->only('seller_id','title','description','includes','excludes','slug');
      $service = SellerService::create($sData);
      $this->imageUpload($request,$service->id);
      $this->SellerServiceMappedServiceLabel($request,$service->id);
      $this->mapServiceCategories($request, $service->id);

    } catch (\Throwable $th) {
      dd($th->getLine(), $th->getMessage());
    }

    return true;
  }

  // Update method
  public function update($request, $service)
  {
    try {
      $request->request->add(['slug' => Str::slug($request->title, '-')]);
      $request->request->add(['add_by' => Auth::user()->id]);
      $sData = $request->only('seller_id','title','description','includes','excludes','slug');
      $service->update($sData);
      $this->imageUpload($request,$service->id);
      $this->SellerServiceMappedServiceLabel($request,$service->id);
      $this->mapServiceCategories($request, $service->id);

    } catch (\Throwable $th) {
      dd($th);
    }
  }


  // SellerServiceMappedServiceLabel method
  public function SellerServiceMappedServiceLabel($request,$serviceID){
      SellerServiceMappedServiceLabel::where('seller_service_id', '=', $serviceID)->delete();
      if (is_array($request->service_label)) :
        foreach ($request->service_label as $value) {
          $filterData[] = [
            'seller_service_id' => $serviceID,
            'dropdown_id' => $value,
          ];
        }
        SellerServiceMappedServiceLabel::insert($filterData);
      endif;
  }

  // imageUpload method
  public function imageUpload($request, $serviceID)
  {
    if ($request->hasfile('service_images')) {
      ServiceImage::where('service_id', '=', $serviceID)->delete();
      $images = $this->handleMultiFileUpload($request, 'service_images', 'uploads/services', 6);
      $imageData = [];
      foreach ($images as $image) {
          $imageData[] = [
            'service_id' => $serviceID,
            'image' => $image
          ];
      }
      ServiceImage::insert($imageData);
    } 
  }


    // mapServiceCategories method
  public function mapServiceCategories($request, $serviceID)
  {
    SellerServiceMappedCategory::where('service_id', '=', $serviceID)->delete();
    if (is_array($request->category)) :
      foreach ($request->category as $value) {
        if (isset($value)) {
          $categoryData[] = [
            'service_id' => $serviceID,
            'category_id' => $value,
          ];
        }
      }
      SellerServiceMappedCategory::insert($categoryData);
    endif;
  }

  // toggleStatus method
  public function toggleStatus($id, $status)
  {
    SellerService::where('id', $id)->update(['status' => $status]);
  }

}
