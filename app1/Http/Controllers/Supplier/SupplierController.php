<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Models\Supplier\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\SupplierRequest;
use App\Repositories\Supplier\SupplierRepository;
use App\Models\Supplier\SupplierQNA;
use App\Models\Extensions\DropdownValue;
use Illuminate\Support\Facades\Mail;
use App\Models\TransactionHistory;
use App\Models\Supplier\SupplierPurchasedCategory;
use App\Models\Supplier\SupplierMappedCategory;
 

class SupplierController extends Controller
{
  public function __construct(private SupplierRepository $SupplierRepository)
  { 
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, string $type, int $supplierStatus)
  {
    $suppliers = Supplier::orderBy('created_at', 'desc')->with(['getSellerPosition','suppllierDescribedSeller','suppllierLikeToSell','suppllierCountries'])
      ->where('supplier_status', $supplierStatus);

    if (isset($request->search))
      $suppliers = $suppliers->where('biz_name', 'like', '%' . $request->search . '%')
        ->orWhere('biz_email', 'like', '%' . $request->search . '%')
        ->orWhere('biz_phone', 'like', '%' . $request->search . '%');

    $suppliers = $suppliers->paginate(100);
    return view('supplier.suppliers', compact('suppliers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('supplier.create-supplier');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(SupplierRequest $request)
  {
    $this->SupplierRepository->store($request);
    return redirect()->route('admin.supplier.index', ['new', 0])->with('success', 'Supplier has been successfully added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Supplier\Supplier  $supplier
   * @return \Illuminate\Http\Response
   */
  public function show(Supplier $supplier)
  {
    $supplier = Supplier::where('id',$supplier->id)
    ->with(['getSellerPosition','suppllierDescribedSeller','suppllierLikeToSell','suppllierCountries']);
    
     $supplier = $supplier->first();
     $qualifications = DropdownValue::whereIn('id',json_decode($supplier->quality_certificates,true) ?? [])->get()->pluck('dropdown_value')->implode(', ') ?? "";
     $others_certifications = DropdownValue::whereIn('id',json_decode($supplier->other_certificates,true) ?? [])->get()->pluck('dropdown_value')->implode(', ') ?? "";
     $sustainabilities = DropdownValue::whereIn('id',json_decode($supplier->sustainability_certificates,true) ?? [])->get()->pluck('dropdown_value')->implode(', ') ?? "";
     $clientTestimonials  = $supplier->getClientTestimonials;
    $supplierQnA = SupplierQNA::where('supplier_id', $supplier->id)->first();
    return view('supplier.supplier-detail', compact('supplier','supplierQnA','qualifications','sustainabilities','others_certifications','clientTestimonials'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Supplier\Supplier  $supplier
   * @return \Illuminate\Http\Response
   */
  public function edit(Supplier $supplier)
  {
    $productIndustries = $supplier->productIndustries()->pluck('cpr_suppliers_mapped_product_industries.dropdown_id')->toArray();
    $serviceIndustries = $supplier->serviceIndustries()->pluck('cpr_suppliers_mapped_service_industries.dropdown_id')->toArray();
    $shippingToCountries = $supplier->shippingToCountries()->pluck('cpr_suppliers_ship_to.country_id')->toArray();
    $shippingFromCountries = $supplier->shippingFromCountries()->pluck('cpr_suppliers_ship_from.country_id')->toArray();
    // dd($productIndustries, $serviceIndustries, $shippingToCountries, $shippingFromCountries, $supplier);
    return view('supplier.edit-supplier', compact('supplier', 'productIndustries', 'serviceIndustries', 'shippingToCountries', 'shippingFromCountries'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Supplier\Supplier  $supplier
   * @return \Illuminate\Http\Response
   */
  public function update(SupplierRequest $request, Supplier $supplier)
  {
    $this->SupplierRepository->update($request, $supplier->id);
    return redirect()->route('admin.suppliers.index', ['new', 0])->with('success', 'Supplier has been updated successfully.');
  }
  
  
  
  public function changePassword(Request $request)
  {
      $request->validate([
          'supplier_id' => 'required',
           'password' => 'required|confirmed|min:6',
          ]);
    
    $supplier = Supplier::where('id',$request->supplier_id)->first();
    $supplier->password = $request->password;
    $supplier->save();
    return back()->with('success', 'Supplier password has been changed.');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->SupplierRepository->toggleStatus($id, $status);
    return back()->with('success', 'Supplier status has been changed.');
  }


  public function supplierStatus(Request $request,$id)
  {
    $this->SupplierRepository->changeSupplierStatus($request,$id);
    $supplier  =  Supplier::findOrFail($id);
    Mail::to($supplier->biz_email)->send(new \App\Mail\Admin\Supplier\SupplierStatusMail(['supplier' => $supplier]));
    return back()->with('success', 'Supplier status has been changed.');
  }


public function activateFreeSubscriptionPlan(Request $request)
{
    try {
        $request->validate([
            'supplier_id' => 'required|exists:cpr_suppliers,id',
            'duration'    => 'required|in:1 Month,3 Months,6 Months,1 Year',
        ]);

        $supplier = Supplier::findOrFail($request->supplier_id);

        // ✅ FIX: Always convert to Carbon first
        $expiryDate = $supplier->membership_expiry_date ? 
            \Carbon\Carbon::parse($supplier->membership_expiry_date) : null;
            
        $start = ($expiryDate && $expiryDate->gt(now())) ? $expiryDate : now();

        switch ($request->duration) {
            case '1 Month':
                $endDate = $start->copy()->addMonth();
                break;
            case '3 Months':
                $endDate = $start->copy()->addMonths(3);
                break;
            case '6 Months':
                $endDate = $start->copy()->addMonths(6);
                break;
            case '1 Year':
                $endDate = $start->copy()->addYear();
                break;
            default:
                $endDate = now();
        }

        TransactionHistory::create([
            'user_id'               => $supplier->id,
            'user_type'             => 'vendor',
            'transaction_for'       => 'Membership',
            'membership_start_date' => $start,
            'membership_expiry_date'=> $endDate,
            'amount'                => 0.00,
            'is_free'               => 1,
            'payment_status'        => 'success'
        ]);

        $supplier->update([
            'membership_start_date'  => $start,
            'membership_expiry_date' => $endDate,
        ]);

        return back()->with('success', 'Membership activated successfully!');

    } catch (\Throwable $e) {
        return back()->with('success', $e->getMessage());
    }
}


 public function showMappedCategory(Request $request,$supplierId){
     $supplier = Supplier::find($supplierId);
     return view('supplier.mapped-category',compact('supplier'));
 }
 
 public function mapSupplierCategory(Request $request){
     try {
  
   
        $request->validate([
            'supplier_id' => 'required|exists:cpr_suppliers,id',
            'category_type'    => 'required',
            'category_id'    => 'required',
        ]);
        
   

        $user = Supplier::findOrFail($request->supplier_id);
        if(SupplierMappedCategory::where('supplier_id',$user->id)->where('category_id',$request->category_id)->exists())
            return   back()->with('success', 'Category already mapped!');
     
          // Create Purchased Category Record
           $save  =  SupplierPurchasedCategory::create([
                'supplier_id'    => $user->id,
                'category_type'  => $request->category_type,
                'category_id'    => $request->category_id,
                'is_free'       => 1,
            ]);
            if($save){
                $save  =  SupplierMappedCategory::create(['supplier_id'=> $user->id,'category_type'  => $request->category_type,'category_id'=> $request->category_id,'is_free' => 1]);
            }
          
     
      
      return back()->with('success', 'Category has been mapped successfully!');
      
     } catch (\Throwable $e) {
        return back()->with('success', $e->getMessage());
    }
      
  }





  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Supplier\Supplier  $supplier
   * @return \Illuminate\Http\Response
   */
  public function destroy(Supplier $supplier)
  {
    //
  }
}
