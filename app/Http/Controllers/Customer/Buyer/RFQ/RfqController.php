<?php
namespace App\Http\Controllers\Customer\Buyer\RFQ;

use App\Traits\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer\RequestForQuotation;
use App\Models\Customer\RfqMappedCategory;
use App\Models\Customer\RfqMapWithSameCategorySupplier;
use App\Models\Customer\RfqProduct;
use App\Models\Customer\Address;
use App\Models\Supplier\Supplier;
use App\Models\Customer\CategoryMappedRfqItem;
use App\Models\Customer\RfqMappedWithContractorType;


class RfqController extends Controller
{
  use FileUpload;

  
  public function index(Request $request)
  {
    // return "dashboard"  ;
    $user = Auth::guard('buyer')->user();
    $rfqs = RequestForQuotation::query();
    // dd($request->search);
    // Apply search filter if provided
    if (!empty($request->search)) {
        $rfqs->where(function ($query) use ($request) {
            $query->where('id', 'like', '%' . $request->search . '%')
                  ->orWhere('name', 'like', '%' . $request->search . '%')
                  ->orWhere('title', 'like', '%' . $request->search . '%')
                  ->orWhere('spacial_instructions', 'like', '%' . $request->search . '%');
        });
    }
    
    // Filter by buyer ID and paginate
    $rfqs = $rfqs->orderByDesc('id')->where('buyer_id', $user->id)->paginate(10);

    return view('customer.buyer.rfq.rfqs',compact('rfqs'));
  }
  
  
  public function rfqDetail(Request $request)
  {
    // return "dashboard"  ;
    $user = Auth::guard('buyer')->user();
    $rfq = RequestForQuotation::find($request->rfq_id);
    // dd($rfq);

    return view('customer.buyer.rfq.rfq-detail',compact('rfq'));
  }
  
  
  public function create(Request $request)
  {
      $rfq_detail = '';
      if(!empty($request->rfq_id))
      {
        $rfq_detail =   RequestForQuotation::where('id',$request->rfq_id)->first();
        if($rfq_detail->quotation_type == 'product'){
          $categories =   $rfq_detail->productCategories->last();
        }else{
          $categories =  $rfq_detail->serviceCategories->last();
        }
        
        // dd($categories->mappedProducts);
      }
    $user = Auth::guard('buyer')->user();
    $rfqs = RequestForQuotation::where('buyer_id',$user->id)->get();
    return view('customer.buyer.rfq.create-rfq',compact('rfqs','user','rfq_detail'));
  }
  
  
  public function save_rfq(Request $request)
    {
        // dd($request->all());
        $user = auth()->guard('buyer')->user();
        
        $request->validate([
            'attachment_one' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,csv,odt,ods|max:2048',
            'attachment_two' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,csv,odt,ods|max:2048',
            'attachment_three' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,csv,odt,ods|max:2048',
            'attachment_four' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,csv,odt,ods|max:2048',
        ]
        ,[
            'attachment_one.max' => 'The attachment one must not be greater than 2MB.',  // max is in kilobytes
            'attachment_two.max' => 'The attachment one must not be greater than 2MB.', 
            'attachment_three.max' => 'The attachment one must not be greater than 2MB.', 
            'attachment_four.max' => 'The attachment one must not be greater than 2MB.',
        ]
        );

        
        // Handle file upload if present
        if ($request->hasfile('attachment_one')) {
            $request->request->add([
                'attachment_file_one' => $this->handleSingleFileUpload($request->attachment_one, 'uploads/rfq/')
            ]);
        }
        
        if ($request->hasfile('attachment_two')) {
            $request->request->add([
                'attachment_file_two' => $this->handleSingleFileUpload($request->attachment_two, 'uploads/rfq/')
            ]);
        }
        
        if ($request->hasfile('attachment_three')) {
            $request->request->add([
                'attachment_file_three' => $this->handleSingleFileUpload($request->attachment_three, 'uploads/rfq/')
            ]);
        }
        
        if ($request->hasfile('attachment_four')) {
            $request->request->add([
                'attachment_file_four' => $this->handleSingleFileUpload($request->attachment_four, 'uploads/rfq/')
            ]);
        }
        
       
        $address = Address::where('id',$request->delivery_location)->first();
        
        // Add buyer_id to the request
        $request->request->add(['buyer_id' => $user->id]);
        $request->request->add(['name' => $user->first_name.' '.$user->last_name]);
        $request->request->add(['email' => $user->email]);
        $request->request->add(['mobile' => $user->phone]);
        
        if(!empty($address)){
            $request->request->add(['buyer_address_id' => $address->id]);
            $request->request->add(['address_type' => $address->address_type]);
            $request->request->add(['address' => $address->address_one. ' ' .$address->address_two]);
            $request->request->add(['country' => $address->country]);
            $request->request->add(['state' => $address->state]);
            $request->request->add(['city' => $address->city]);
            $request->request->add(['post_code' => $address->post_code]);
        }else{
            $request->request->add(['address_type' => !empty($request->address_type) ? $request->address_type  : "Office Address"]);
            $request->request->add(['address' => $request->address_one. ' ' .$request->address_two]);
            $request->request->add(['country' => $request->country]);
            $request->request->add(['state' => $request->state]);
            $request->request->add(['city' => $request->city]);
            $request->request->add(['post_code' => $request->post_code]);
        }
        
        // Save the main RFQ data
        $save = RequestForQuotation::create($request->except('_token', 'upload_rfq_file', 'category', 'submit', 'product','next_rfq_step'));
        
        $this->mapRfqCategory($request, $save->id);
        $this->mapWithSameCategorySupplier($request, $save->id);
        $this->mapContractorTypeToRfq($request, $save->id);
    
        // Save products in the RfqProduct table
        if ($request->has('product') && is_array($request->product)) {
            foreach ($request->product as $productData) {
                    $item = RfqProduct::create([
                            'rfq_id' => $save->id, // Link the product to the RFQ
                            'uom' => $productData['uom'] ?? '',
                            'quantity' => $productData['item_quantity'],
                            'target_price' => $productData['target_price'],
                            'notes' => $productData['notes'],
                        ]);
                    $this->mapCategoryToRfqItem($productData['category'],$item->id);
            }
        }
      return  $this->successResponse([], 'Save Successfully!');
      // return back()->with('success', "Request submitted successfully. Our team will contact you soon!");
    }
    
    // CategoryMappedRfqItem  RfqMappedWithContractorType
    
    public function mapContractorTypeToRfq($request,$rfqID){
        
        if (!empty($request->contractor_type)) :
            $contractor_types = is_array($request->contractor_type) ? $request->contractor_type: explode(',',$request->contractor_type);
            if(is_array($contractor_types)) :
              foreach ($contractor_types as $value) {
                if (isset($value)) {
                  $data[] = [ 
                    'rfq_id' => $rfqID,
                    'contractor_type' => $value
                  ];
                }
              }
              RfqMappedWithContractorType::insert($data);
          endif;
        endif;
    }
    
    
    public function mapCategoryToRfqItem($categories,$rfqItemID){
        
        if (!empty($categories) && is_array($categories)) : 
          foreach ($categories as $value) {
            if (isset($value)) {
              $data[] = [
                'item_id' => $rfqItemID,
                'category_id' => $value
              ];
            }
          }
          CategoryMappedRfqItem::insert($data);
        endif;
    }
    
    
    public function mapWithSameCategorySupplier($request,$rfqID){
        $user = auth()->guard('buyer')->user();
        $sellers = Supplier::get();
        if (!empty($sellers)) :
          foreach ($sellers as $value) {
            if (isset($value)) {
              $data[] = [
                'rfq_id' => $rfqID,
                'buyer_id' => $user->id,
                'seller_id' => $value->id,
                'status' => 'Pending',
              ];
            }
          }
          RfqMapWithSameCategorySupplier::insert($data);
        endif;
    }
    
    
    public function mapRfqCategory($request,$rfqID){
        RfqMappedCategory::where('rfq_id', '=', $rfqID)->where('category_type',$request->quotation_type)->delete();
        if (is_array($request->category)) :
          foreach ($request->category as $value) {
            if (isset($value)) {
              $categoryData[] = [
                'rfq_id' => $rfqID,
                'category_type' => $request->quotation_type,
                'category_id' => $value,
              ];
            }
          }
          RfqMappedCategory::insert($categoryData);
        endif;
    }
  
  
  
  
}












