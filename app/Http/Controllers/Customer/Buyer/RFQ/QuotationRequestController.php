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
use App\Models\Customer\MapSupplierToRfq;
use App\Models\Customer\Address;
use App\Models\Supplier\Supplier;
use App\Models\Customer\CategoryMappedRfqItem;
use App\Models\Customer\RfqMappedWithContractorType;


class QuotationRequestController extends Controller
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
    $rfqs = $rfqs->orderByDesc('id')->paginate(10);
// /home/domoexpo/public_html/resources/views/customer/buyer/rfq/quotation-request/quotation-list.blade.php
    return view('customer.buyer.rfq.quotation-request.quotation-list',compact('rfqs'));
  }
  
  
  public function quotationDetail(Request $request)
  {
    // return "dashboard"  ;
    $user = Auth::guard('buyer')->user();
    $rfq = RequestForQuotation::find($request->rfq_id);
    
    $categoryIds = $rfq->RfqProducts->flatMap(function ($product) {
        return $product->mappedCategories->pluck('id');
    })->unique()->values();
    
    $suppliers = Supplier::query();
    
    if ($rfq->quotation_type == "product") {
        $suppliers = $suppliers->whereHas('mappedProductCategories', function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        });
    }
    
    if ($rfq->quotation_type == "service") {
        $suppliers = $suppliers->whereHas('mappedServiceCategories', function ($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        });
    }
    
    $suppliers = $suppliers->get();
    
    // dd($suppliers,$categoryIds);

    // dd($rfq,$rfq->RfqProducts[0]->mappedCategories,$categoryIds);
 

    return view('customer.buyer.rfq.quotation-request.quotation-detail',compact('rfq','suppliers'));
  }
  
  
 
    
    // CategoryMappedRfqItem  RfqMappedWithContractorType
    
    public function mapSupplierToRfq(Request $request)
    {
        $user = Auth::guard('buyer')->user();
        $suppliers = is_array($request->suppliers) ? $request->suppliers : [];
    
        if (count($suppliers) > 0) {
            $data = [];
            foreach ($suppliers as $value) {
                if (isset($value)) {
                    $data[] = [ 
                        'supplier_id' => $value,
                        'rfq_id' => $request->rfq_id,
                        'product_id' => $request->product_id,
                        'contractor_id' => $user->id
                    ];
                }
            }
            MapSupplierToRfq::insert($data);
        }
    
        // Return JSON if AJAX or expects JSON
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Suppliers mapped successfully.']);
        }
    
        // Otherwise, redirect back
        return back()->with('success', 'Suppliers mapped successfully.');
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












