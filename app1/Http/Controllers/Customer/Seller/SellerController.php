<?php

namespace App\Http\Controllers\Customer\Seller;

use App\Models\Supplier\Supplier;
use App\Models\Supplier\SupplierQNA;
use App\Models\Extensions\Dropdown;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\Supplier\SupplierRepository;
use App\Http\Requests\Supplier\SupplierUpdateProfileRequest;
use DB;

class SellerController extends Controller
{
  public function __construct(SupplierRepository $SupplierRepository)
  {
    $this->SupplierRepository = $SupplierRepository;
  }

  public function dashboard()
  {
    // return  ;
     $user = Auth::guard('vendor')->user();
    $nationalities = Dropdown::where('dropdown_name', 'Nationality')->first()->dropdownValues;
    $positions =   Dropdown::where('dropdown_name','Positions')->first();
    $positionsValues =   $positions->dropdownValues;
    $supplierQnA = SupplierQNA::where('supplier_id', $user->id)->first();

    $profileComplate = 0;
    if(!empty($user->customer_service_email) || !empty($user->vat_number))
      $profileComplate += 1;

    if(!empty($user->sales_contact_email) && !empty($user->finance_contact_email))
      $profileComplate += 1;

    if(!empty($user->biz_office_country) && !empty($user->biz_office_state))
      $profileComplate += 1;

    if(!empty($user->biz_bank_name) && !empty($user->biz_bank_branch_name))
      $profileComplate += 1;
    
    // ------------------  
    $onlineStoreCompleted = 0;
    if(count($user->suppllierDescribedSeller) > 0)
      $onlineStoreCompleted += 1;
      
    if(!empty($user->business_offering_one))
      $onlineStoreCompleted += 1;
    
    if(!empty($user->company_full_desc))
      $onlineStoreCompleted += 1;  
     
    if(!empty($user->biz_company_logo) && !empty($user->biz_company_logo))
      $onlineStoreCompleted += 1; 
    
    if($user->quality_certificates != '[]' && $user->sustainability_certificates != '[]')
      $onlineStoreCompleted += 1;   
    
    if(!empty($user->biz_website) && !empty($user->linkedin_url) && !empty($user->instagram_url))
      $onlineStoreCompleted += 1;  
      
    if(count($user->getClientTestimonials) ==  3)
      $onlineStoreCompleted += 1;
      
    // ------------------ 
    $pointOfSeleCompleted = 0;
    if(!empty($user->selling_scope))
      $pointOfSeleCompleted += 1;
      
    if(count($user->mappedCategories) > 0)
      $pointOfSeleCompleted += 1;
    
    

    return view('customer.seller.profile.dashboard',compact('user','nationalities','positionsValues','supplierQnA','profileComplate','onlineStoreCompleted','pointOfSeleCompleted'));
  }



  public function logout(Request $request)
  {
    Auth::guard('vendor')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('seller.seller');
  }

}
