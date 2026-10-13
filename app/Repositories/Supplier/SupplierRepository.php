<?php

namespace App\Repositories\Supplier;

use App\Models\Buyer\Buyer;
use Illuminate\Support\Str;
use App\Models\Supplier\Supplier;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Mail;
use App\Mail\Buyer\SendLoginCredentials;
use App\Models\Supplier\SupplierMappedCategory;

class SupplierRepository extends BaseRepository
{
   public function store($request)
  {
    try {
      if ($request->hasfile('biz_logo')) :
        $request->request->add(['biz_company_logo' => $this->handleSingleFileUpload($request->biz_logo, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_supplier_banner_file')) :
        $request->request->add(['biz_supplier_banner' => $this->handleSingleFileUpload($request->biz_supplier_banner_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_reg_file')) :
        $request->request->add(['biz_reg_document' => $this->handleSingleFileUpload($request->biz_reg_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_reg_gst_file')) :
        $request->request->add(['biz_reg_gst_document' => $this->handleSingleFileUpload($request->biz_reg_gst_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_reg_pan_file')) :
        $request->request->add(['biz_reg_pan_document' => $this->handleSingleFileUpload($request->biz_reg_pan_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_bank_cancel_cheque_file')) :
        $request->request->add(['biz_bank_cancel_cheque' => $this->handleSingleFileUpload($request->biz_bank_cancel_cheque_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('ar_file')) :
        $request->request->add(['ar_photo' => $this->handleSingleFileUpload($request->ar_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('ar_kyc_file')) :
        $request->request->add(['ar_kyc_document' => $this->handleSingleFileUpload($request->ar_kyc_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('designer_certificate'))
        $request->request->add(['certificate' => $this->handleSingleFileUpload($request->designer_certificate, 'uploads/supplier/')]);

      if ($request->hasfile('designer_reseller_auth_letter'))
        $request->request->add(['reseller_auth_letter' => $this->handleSingleFileUpload($request->designer_reseller_auth_letter, 'uploads/supplier/')]);

      if ($request->hasfile('designer_agreement_document'))
        $request->request->add(['agreement_document' => $this->handleSingleFileUpload($request->designer_agreement_document, 'uploads/supplier/')]);
     

      $supplier = Supplier::create($request->except('_token', 'supplier_id', 'biz_logo', 'biz_reg_file', 'biz_reg_gst_file', 'biz_reg_pan_file', 'biz_bank_cancel_cheque_file', 'ar_file', 'ar_kyc_file', 'designer_certificate', 'designer_reseller_auth_letter', 'designer_agreement_document'));

      $this->mapSupplierProductIndustries($supplier->id, (isset($request->product_selling_industry) ? $request->product_selling_industry : []));
      $this->mapSupplierServiceIndustries($supplier->id, (isset($request->service_selling_industry) ? $request->service_selling_industry : []));;
      $this->mapSupplierShippingToCountries($supplier->id, isset($request->can_ship_to) ? $request->can_ship_to : []);
      $this->mapSupplierShippingFromCountries($supplier->id, (isset($request->can_ship_from) ? $request->can_ship_from : []));

      // $this->mapAsABuyer($request, $supplier->id);
    } catch (\Throwable $th) {
      dd($th);
    }

    return $supplier;
  }

  public function update($request, $id)
  {
    try {
      if ($request->hasfile('biz_logo')) :
        $request->request->add(['biz_company_logo' => $this->handleSingleFileUpload($request->biz_logo, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_home_page_img')) :
        $request->request->add(['biz_home_page_image' => $this->handleSingleFileUpload($request->biz_home_page_img, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_supplier_banner_file')) :
        $request->request->add(['biz_supplier_banner' => $this->handleSingleFileUpload($request->biz_supplier_banner_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_reg_file')) :
        $request->request->add(['biz_reg_document' => $this->handleSingleFileUpload($request->biz_reg_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_reg_gst_file')) :
        $request->request->add(['biz_reg_gst_document' => $this->handleSingleFileUpload($request->biz_reg_gst_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_reg_pan_file')) :
        $request->request->add(['biz_reg_pan_document' => $this->handleSingleFileUpload($request->biz_reg_pan_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('biz_bank_cancel_cheque_file')) :
        $request->request->add(['biz_bank_cancel_cheque' => $this->handleSingleFileUpload($request->biz_bank_cancel_cheque_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('ar_file')) :
        $request->request->add(['ar_photo' => $this->handleSingleFileUpload($request->ar_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('ar_kyc_file')) :
        $request->request->add(['ar_kyc_document' => $this->handleSingleFileUpload($request->ar_kyc_file, 'uploads/supplier/')]);
      endif;

      if ($request->hasfile('designer_certificate'))
        $request->request->add(['certificate' => $this->handleSingleFileUpload($request->designer_certificate, 'uploads/supplier/')]);

      if ($request->hasfile('designer_reseller_auth_letter'))
        $request->request->add(['reseller_auth_letter' => $this->handleSingleFileUpload($request->designer_reseller_auth_letter, 'uploads/supplier/')]);

      if ($request->hasfile('designer_agreement_document'))
        $request->request->add(['agreement_document' => $this->handleSingleFileUpload($request->designer_agreement_document, 'uploads/supplier/')]);

      if (isset($request->po_email))
        $request->mergeIfMissing(['po_emails' => array_unique(array_map('strtolower', array_map('trim', explode(',', $request->po_email))))]);

      Supplier::find($id)->update($request->except('_token', 'supplier_id', '_method', 'biz_logo', 'biz_reg_file', 'biz_reg_gst_file', 'biz_reg_pan_file', 'biz_bank_cancel_cheque_file', 'ar_file', 'ar_kyc_file', 'designer_certificate', 'designer_reseller_auth_letter', 'designer_agreement_document', 'po_email') + ['user_id' => auth()->user()->id ?? ""]);

      $this->mapSupplierProductIndustries($id, (isset($request->product_selling_industry)) ? $request->product_selling_industry : []);
      $this->mapSupplierServiceIndustries($id, (isset($request->service_selling_industry)) ? $request->service_selling_industry : []);
      $this->mapSupplierShippingToCountries($id, (isset($request->can_ship_to)) ? $request->can_ship_to : []);
      $this->mapSupplierShippingFromCountries($id, (isset($request->can_ship_from)) ? $request->can_ship_from : []);
     
      $this->mapSuppllierDescribedSeller($id, (isset($request->describe_seller)) ? $request->describe_seller : []);
      $this->mapSuppllierLikeToSell($id, (isset($request->like_to_sell)) ? $request->like_to_sell : []);
      $this->mapSuppllierCountries($id, (isset($request->country)) ? $request->country : []);
      
      if(!empty($request->category)){
         $this->mapSupplierCategories($request,$id); 
      }
      
      // $this->mapAsABuyer($request, $id);
    } catch (\Throwable $th) {
      dd($th);
    }
    return true;
  }
  
  
    public function mapSupplierCategories($request, $supplierId)
    {
        // Convert the category input to an array (if it's not already)
        $categories = is_array($request->category) ? $request->category : $request->input('category', []);
    
        if (is_array($categories)) {
            $lastCategoryId = end($categories); // Get the last element of the category array
    
            $categoryData = [
                'category_type' => $request->category_type,
                'categories' => implode(',', $categories), // Implode all categories into a string
                'supplier_id' => $supplierId,
                'category_id' => $lastCategoryId, // Use the last category ID
            ];
    
            SupplierMappedCategory::create($categoryData);
        }
    }


  public function makeSupplierIfnotExist(int $buyerId): bool
  {
    $buyer = Buyer::find($buyerId);
    $buyer = array_diff_key($buyer->toArray(), array_flip(["password", "id"]));
    $buyer['buyer_id'] = $buyerId;
    (Supplier::where('buyer_id', $buyerId)->doesntExist()) ? Supplier::create($buyer) : NULL;

    return true;
  }

  public function toggleStatus($id, $status)
  {
    return Supplier::find($id)->update(['status' => $status]);
  }
  
  public function toggleQuotationStatus($id, $status)
  {
    //   dd($id, $status);
    return Supplier::find($id)->update(['quotation_status' => $status]);
  }
  
  

  
  public function changeSupplierStatus($request,$id)
  {
    return Supplier::find($id)->update(['supplier_status' => $request->supplier_status,'supplier_status_reason'=>$request->supplier_status_reason,'supplier_status_comment'=>$request->supplier_status_comment]);
  }

  public function mapSupplierProductIndustries(int $supplierId, array $productSellingIndustry = []): bool
  {
    $supplier = Supplier::find($supplierId);
    $supplier->productIndustries()->detach();
    if (is_array($productSellingIndustry) && !empty($productSellingIndustry)) {
      foreach ($productSellingIndustry as $value) {
        $supplier->productIndustries()->attach($supplierId, ['dropdown_id' => (int)$value]);
      }
    }
    return true;
  }

  public function mapSuppllierDescribedSeller(int $supplierId, array $describedSeller = []): bool
  {
    $supplier = Supplier::find($supplierId);
    if(count($describedSeller)){
      $supplier->suppllierDescribedSeller()->detach();
      if (is_array($describedSeller) && !empty($describedSeller)) {
        foreach ($describedSeller as $value) {
          $supplier->suppllierDescribedSeller()->attach($supplierId, ['dropdown_id' => (int)$value]);
        }
      }
    }
    
    return true;
  }


  public function mapSuppllierLikeToSell(int $supplierId, array $likeToSellService = []): bool
  {
    $supplier = Supplier::find($supplierId);
    if(count($likeToSellService) > 0){
      $supplier->suppllierLikeToSell()->detach();
      if (is_array($likeToSellService) && !empty($likeToSellService)) {
        foreach ($likeToSellService as $value) {
          $supplier->suppllierLikeToSell()->attach($supplierId, ['dropdown_id' => (int)$value]);
        }
      }
    }
    
    return true;
  }

  public function mapSuppllierCountries(int $supplierId, array $sellingCountries = []): bool
  {
    $supplier = Supplier::find($supplierId);
    if(count($sellingCountries) > 0){
      $supplier->suppllierCountries()->detach();
      if (is_array($sellingCountries) && !empty($sellingCountries)) {
        foreach ($sellingCountries as $value) {
          $supplier->suppllierCountries()->attach($supplierId, ['country_id' => (int)$value]);
        }
      }
    }
    return true;
  }



  

  public function mapSupplierServiceIndustries(int $supplierId, array $serviceSellingIndustry = []): bool
  {
    $supplier = Supplier::find($supplierId);
    $supplier->serviceIndustries()->detach();
    if (is_array($serviceSellingIndustry) && !empty($serviceSellingIndustry)) {
      foreach ($serviceSellingIndustry as $value) {
        $supplier->serviceIndustries()->attach($supplierId, ['dropdown_id' => (int)$value]);
      }
    }
    return true;
  }

  public function mapSupplierShippingToCountries(int $supplierId, array $shippingToCountries = []): bool
  {
    $supplier = Supplier::find($supplierId);
    $supplier->shippingToCountries()->detach();
    if (is_array($shippingToCountries) && !empty($shippingToCountries)) {
      foreach ($shippingToCountries as $value) {
        $supplier->shippingToCountries()->attach($supplierId, ['country_id' => (int)$value]);
      }
    }
    return true;
  }

  public function mapSupplierShippingFromCountries(int $supplierId, array $shippingFromCountries = []): bool
  {
    $supplier = Supplier::find($supplierId);
    $supplier->shippingFromCountries()->detach();
    if (is_array($shippingFromCountries) && !empty($shippingFromCountries)) {
      foreach ($shippingFromCountries as $value) {
        $supplier->shippingFromCountries()->attach($supplierId, ['country_id' => (int)$value]);
      }
    }
    return true;
  }

  // public function mapAsABuyer($request, $id)
  // {
  //   if (Buyer::where('ar_email', Str::lower($request->ar_email))->doesntExist()) {
  //     $random = Str::random(5);
  //     $password = "copro{$random}";
  //     $request->request->add(['password' => $password]);

  //     $buyer = Buyer::create($request->except('_token', '_method', 'supplier_status', 'supplier_status_reason', 'supplier_status_comment', 'supplier_id', 'biz_logo', 'biz_reg_file', 'biz_reg_gst_file', 'biz_reg_pan_file', 'biz_bank_cancel_cheque_file', 'ar_file', 'ar_kyc_file'));

  //     Supplier::find($id)->update(['buyer_id' => $buyer->id]);

  //     $data2 = [
  //       'userDetails' => $buyer,
  //       'password' => $password,
  //     ];

  //     Mail::to(Str::lower($buyer->ar_email))->send(new SendLoginCredentials($data2));
  //   }
  // }
}
