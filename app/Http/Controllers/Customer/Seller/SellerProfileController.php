<?php

namespace App\Http\Controllers\Customer\Seller;

use App\Models\Supplier\Supplier;
use App\Models\Supplier\SuppilerMappedCountry;
use App\Models\Supplier\SupplierQNA;
use App\Models\Extensions\Dropdown;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\FileUpload;
use App\Repositories\Supplier\SupplierRepository;
use App\Http\Requests\Supplier\SupplierUpdateProfileRequest;
use App\Models\Supplier\SupplierClientTestimonial;
use App\Models\Supplier\SupplierMappedCategory;

class SellerProfileController extends Controller
{
  use FileUpload;
  public function __construct(SupplierRepository $SupplierRepository)
  {
    $this->SupplierRepository = $SupplierRepository;
  }

  public function manage_profile()
  {
    $user = Auth::guard('vendor')->user();
    $nationalities = Dropdown::where('dropdown_name', 'Nationality')->first()->dropdownValues;
    $positions =   Dropdown::where('dropdown_name','Positions')->first();
    $positionsValues =   $positions->dropdownValues;
    $businesssTypeValues =  getDropdowns("Business Type")->dropdownValues;
    $describeBusinessValues =  getDropdowns("Describe Seller")->dropdownValues;
    $sellerLikeToSell =  getDropdowns("Seller Like To Sell")->dropdownValues;
    $sellerLikeToSell =  getDropdowns("Seller Like To Sell")->dropdownValues;

    $quality_certificates =  getDropdowns("Quality Certificates")->dropdownValues;
    $sustainability_certificates =  getDropdowns("Sustainability Certificates")->dropdownValues;
    $other_certificates =  getDropdowns("Other Certificates")->dropdownValues;
    $clientTestimonials = $user->getClientTestimonials;
  
    $supplierQnA = SupplierQNA::where('supplier_id', $user->id)->first();
    return view('customer.seller.profile.manage-profile',compact('user','nationalities','positionsValues','businesssTypeValues','describeBusinessValues','sellerLikeToSell','supplierQnA','clientTestimonials','quality_certificates','sustainability_certificates','other_certificates'));
  }

  

  public function company_profile()
  {
    $user = Auth::guard('vendor')->user();
    $nationalities = Dropdown::where('dropdown_name', 'Nationality')->first()->dropdownValues;
    $positions =   Dropdown::where('dropdown_name','Positions')->first();
    $positionsValues =   $positions->dropdownValues;
    $businesssTypeValues =  getDropdowns("Business Type")->dropdownValues;
    $describeBusinessValues =  getDropdowns("Describe Seller")->dropdownValues;
    $sellerLikeToSell =  getDropdowns("Seller Like To Sell")->dropdownValues;
    $sellerLikeToSell =  getDropdowns("Seller Like To Sell")->dropdownValues;

    $quality_certificates =  getDropdowns("Quality Certificates")->dropdownValues;
    $sustainability_certificates =  getDropdowns("Sustainability Certificates")->dropdownValues;
    $other_certificates =  getDropdowns("Other Certificates")->dropdownValues;
  
    $supplierQnA = SupplierQNA::where('supplier_id', $user->id)->first();
    return view('customer.seller.profile.company-profile',compact('user','nationalities','positionsValues','businesssTypeValues','describeBusinessValues','sellerLikeToSell','supplierQnA','quality_certificates','sustainability_certificates','other_certificates'));
  }


  public function point_of_sale(){
    $user = Auth::guard('vendor')->user();
    // dd($user->mappedCategories);
    $nationalities = Dropdown::where('dropdown_name', 'Nationality')->first()->dropdownValues;
    $positions =   Dropdown::where('dropdown_name','Positions')->first();
    $positionsValues =   $positions->dropdownValues;
    $businesssTypeValues =  getDropdowns("Business Type")->dropdownValues;
    $describeBusinessValues =  getDropdowns("Describe Seller")->dropdownValues;
    $sellerLikeToSell =  getDropdowns("Seller Like To Sell")->dropdownValues;
    $sellerLikeToSell =  getDropdowns("Seller Like To Sell")->dropdownValues;

    $quality_certificates =  getDropdowns("Quality Certificates")->dropdownValues;
    $sustainability_certificates =  getDropdowns("Sustainability Certificates")->dropdownValues;
    $other_certificates =  getDropdowns("Other Certificates")->dropdownValues;
  
    $supplierQnA = SupplierQNA::where('supplier_id', $user->id)->first();
    return view('customer.seller.profile.point-of-sale',compact('user','nationalities','positionsValues','businesssTypeValues','describeBusinessValues','sellerLikeToSell','supplierQnA','quality_certificates','sustainability_certificates','other_certificates'));
  }


  public function online_store_profile()
  {
    $user = Auth::guard('vendor')->user();
    
    
    $nationalities = Dropdown::where('dropdown_name', 'Nationality')->first()->dropdownValues;
    $positions =   Dropdown::where('dropdown_name','Positions')->first();
    $positionsValues =   $positions->dropdownValues;
    $businesssTypeValues =  getDropdowns("Business Type")->dropdownValues;
    $describeBusinessValues =  getDropdowns("Describe Seller")->dropdownValues;
    $sellerLikeToSell =  getDropdowns("Seller Like To Sell")->dropdownValues;
    $sellerLikeToSell =  getDropdowns("Seller Like To Sell")->dropdownValues;

    $quality_certificates =  getDropdowns("Quality Certificates")->dropdownValues;
    $sustainability_certificates =  getDropdowns("Sustainability Certificates")->dropdownValues;
    $other_certificates =  getDropdowns("Other Certificates")->dropdownValues;
    $clientTestimonials = $user->getClientTestimonials;
  
    $supplierQnA = SupplierQNA::where('supplier_id', $user->id)->first();
    return view('customer.seller.profile.online-store-profile',compact('user','nationalities','positionsValues','businesssTypeValues','describeBusinessValues','sellerLikeToSell','supplierQnA','clientTestimonials','quality_certificates','sustainability_certificates','other_certificates'));
  }


  public function update(SupplierUpdateProfileRequest $request, int $id)
  {
    // dd($request->all());
      $this->SupplierRepository->update($request, $id);
      $is_last_div = 0;
      if($request->is_last_div){
        $is_last_div = 1;
      }
      if (request()->wantsJson()) {
        return $this->successResponse(['is_last_div'=>$is_last_div], 'Seller details have been updated successfully.');
      }
 
    return back()->with('success', 'Seller details has been updated successfully.');
  }
  public function deleteMappedSupplierCategory(Request $request)
  {
   
    $category = SupplierMappedCategory::where('id',$request->mappedCategoryid)->first();
    if($category){
        $category->delete();
    }
    
    return back()->with('success', 'Seller details has been updated successfully.');
  }

  public function save_seller_qna(Request $request){
    if (SupplierQNA::where('supplier_id', $request->supplier_id)->exists()) {
        $save = SupplierQNA::where('supplier_id', $request->supplier_id)->update($request->except('_token'));
    } else {
        $save = SupplierQNA::create($request->except('_token'));
    }
    return back()->with('success', 'Question & Answer has been saved successfully.');
  }

  public function save_client_testimonial(Request $request){
    if ($request->hasfile('catelogues')) :
        $request->request->add(['catelogue' => $this->handleSingleFileUpload($request->catelogues, 'uploads/supplier/catelogue/')]);
    endif;
    if (SupplierClientTestimonial::where('id', $request->testimonial_id)->exists()) {
        $save = SupplierClientTestimonial::where('id', $request->testimonial_id)->update($request->except('_token','testimonial_id','catelogues'));
    } else {
        $save = SupplierClientTestimonial::create($request->except('_token','testimonial_id','catelogues'));
    }
    $is_last_div = 0;
    if($request->is_last_div){
      $is_last_div = 1;
    }
    if (request()->wantsJson()) {
      return $this->successResponse(['is_last_div'=>$is_last_div], 'Seller details have been updated successfully.');
    }
    return back();
  }

  

  public function getTestimonial(Request $request){
    try {
        $testimonial = SupplierClientTestimonial::where('id', $request->testimonialId)->first();
        return $this->successResponse(compact('testimonial'));
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }

  public  function deleteSupplierMapCountry(Request $request)
    {
        $supplier = Supplier::find($request->sellerId);
        if (SuppilerMappedCountry::where('supplier_id',$request->sellerId)->where('country_id', $request->countryId)->exists()) {
            SuppilerMappedCountry::where('supplier_id',$request->sellerId)->where('country_id', $request->countryId)->delete();
            return true;
        }
        return false;
  }
  
  
  public function deleteSellerCategoryTableData(Request $request){
    try {
        if (SupplierMappedCategory::where('id', $request->row_id)->exists()) {
            SupplierMappedCategory::where('id', $request->row_id)->delete();
             return response()->json(['message' => "deleted"]);
        }
        return response()->json(['message' => "Not exists."]);
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }
  
  
  public function getSellerCategoryTableHtml(Request $request)
  {
    // Fetch authenticated vendor user
    $user = Auth::guard('vendor')->user();

    // Get mapped categories from the user, ordered by descending ID
    $mappedCategories = $user->mappedCategories()->orderByDesc('id')->get();

    // Initialize an empty string for the HTML
    $html = '';

    // Loop through mapped categories and build table rows
    foreach ($mappedCategories as $key => $value) {
        $html .= '<tr>';
        $html .= '<th scope="row">' . $key + 1 . '</th>';
        $html .= '<td>' . $value->category_type . '</td>';
        $html .= '<td>';

        // Check if category_type is 'Service' and build the category name string
        if ($value->category_type == "Service") {
            $serviceCategories = [];

            // Add service categories, avoiding undefined or null values
            if (!is_null($value->serviceCategory->parent->parent ?? null)) {
                $serviceCategories[] = $value->serviceCategory->parent->parent->category_name;
            }
            if (!is_null($value->serviceCategory->parent ?? null)) {
                $serviceCategories[] = $value->serviceCategory->parent->category_name;
            }
            if (!is_null($value->serviceCategory->category_name ?? null)) {
                $serviceCategories[] = $value->serviceCategory->category_name;
            }

            // Join the service categories array with commas
            $html .= implode(', ', $serviceCategories);
        } else {
            // Handle the case for non-Service categories
            $categories = [];

            // Add category names, avoiding undefined or null values
            if (!is_null($value->category->parent->parent ?? null)) {
                $categories[] = $value->category->parent->parent->category_name;
            }
            if (!is_null($value->category->parent ?? null)) {
                $categories[] = $value->category->parent->category_name;
            }
            if (!is_null($value->category->category_name ?? null)) {
                $categories[] = $value->category->category_name;
            }

            // Join the categories array with commas
            $html .= implode(', ', $categories);
        }

        $html .= '</td>';

        // Add Delete button with JavaScript function for deleting row
        $html .= '<td><a class="btn btn-danger" onclick="deleteSellerCategoryTableData(' . $value->id . ')" href="javascript:void(0)">Delete</a></td>';
        $html .= '</tr>';
    }

    // Return the HTML string as a JSON response
    return response()->json(['html' => $html]);
}




    public  function deleteClientTestimonialsTableData(Request $request)
    {
        try {
            if (SupplierClientTestimonial::where('id', $request->testimonial_id)->exists()) {
                SupplierClientTestimonial::where('id', $request->testimonial_id)->delete();
                 return response()->json(['message' => "deleted"]);
            }
            return response()->json(['message' => "Not exists."]);
        } catch (\Throwable $th) {
          dd($th->getMessage());
        }
    }

    
    public function getClientTestimonialsHtml(Request $request)
    {
        // Fetch authenticated vendor user
        $user = Auth::guard('vendor')->user();
        
        // Get client testimonials from the user
        $clientTestimonials = $user->getClientTestimonials ?? [];
        
        // Initialize an empty string for the HTML
        $html = '';
        
        // Loop through client testimonials and build table rows
        foreach ($clientTestimonials as $key => $value) {
            $html .= '<tr>';
            
            $html .= '<th scope="row">' . ($key + 1) . '</th>';
            
            $html .= '<td>';
                $html .= 'Client Name : ' . $value->client_name . '<br>';
                $html .= 'City : ' . $value->client_city . '<br>';
                $html .= 'Country : ' . $value?->getClientCountry?->name . '<br>';
            $html .= '</td>';
            
            $html .= '<td>';
                $html .= 'Person Name : ' . @$value->person_name. '<br>';
                // Add catalogue link if it exists
                if (!empty($value->catelogue)) {
                    $html .= 'View Catalogue : <a href="' . asset('uploads/supplier/catelogue/' . $value->catelogue) . '" target="_blank">';
                    $html .= '<span class="text-primary">View</span>';
                    $html .= '</a>';
                }
            $html .= '</td>';
            
            $html .= '<td>' . $value->testimonial . '</td>';
            
            // Add Edit and Delete buttons
            $html .= '<td>';
            $html .= '<a href="javascript:void(0)" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#editTestimonialModal" onclick="getClientTestimonials(' . $value->id . ')">Edit</a> <br>';
            $html .= '<a href="javascript:void(0)" onclick="deleteClientTestimonialsTableData('.$value->id.')" class="btn btn-danger mb-1">Delete</a>';
            $html .= '</td>';
            $html .= '</tr>';
        }
    
        // Return the HTML string as a JSON response
        return response()->json(['html' => $html,'totalTestimonials' => count($clientTestimonials) ]);
    }




} 

