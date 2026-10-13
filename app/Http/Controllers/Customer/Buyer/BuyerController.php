<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Models\Buyer\Cart;
use App\Models\Buyer\OldOrder;
use App\Models\Buyer\OldOrderSeller;
use App\Traits\FileUpload;
use App\Models\Buyer\Buyer;
use Illuminate\Http\Request;
use App\Models\Customer\Rating;
use App\Models\Customer\Address;
use App\Models\Supplier\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer\ProductWishlist;
use App\Models\Customer\DesignerWishlist;
use App\Http\Requests\Buyer\ExpertRequest;
use App\Repositories\Buyer\BuyerRepository;
use App\Http\Requests\Buyer\BuyerRegistrationRequest;
use App\Models\Buyer\BuyerGallaryImage;
use App\Models\BOQ\BoqQuotation;
use App\Models\RFQEnquiry;
use App\Models\Ecommerce\ProductEnquiry;

class BuyerController extends Controller
{
  use FileUpload;

  public function __construct(private BuyerRepository $BuyerRepository)
  {
  }

//   public function dashboard()
//   {
//     // return "dashboard"  ;
//     $user = Auth::guard('buyer')->user(); 
    
//     $data = [];
    
//     if($user->account_type == 'Contractor'){
//         $query = BoqQuotation::query()
//                 ->where(function ($q) use ($user) {
//                     $q->whereHas('mappedContractorType', function ($subQuery) use ($user) {
//                         $subQuery->whereIn('contractor_type', (array) $user->contractor_type);
//                     })
//                     ->orWhereHas('mappedContractor', function ($subQuery) use ($user) {
//                         $subQuery->whereIn('contractor_id', [(int) $user->id]);
//                     });
//                 })->where('is_form_filled',1);
    
//         $data['totalProjects'] = (clone $query)->count();
        
//         $data['totalAccetped']  = (clone $query)->whereHas('contractorAcceptation',function ($q) use ($user){
//                             $q->where('contractor_id', $user->id)->where('status', 'Accepted');
//                             })->count();
        
//         $data['totalNotSure']  = (clone $query)->whereHas('contractorAcceptation',function ($q) use ($user){
//                             $q->where('contractor_id', $user->id)->where('status', 'Not Sure');
//                             })->count();
                            
//         $data['totalDeclined']  = (clone $query)->whereHas('contractorAcceptation',function ($q) use ($user){
//                             $q->where('contractor_id', $user->id)->where('status', 'Declined');
//                             })->count();
     
//     } 
    
    
//      $projects = BoqQuotation::query()->where('parent_id',0);
        
//         if($user->account_type == 'Developer'){
//             $projects = $projects->where('created_by_user_id',$user->id);
//         }
        
//         if($user->account_type == 'Architect'){
//             $projects = $projects->where(function($q) use ($user){
//                 $q->where('created_by_user_id',$user->id)
//                     ->orWhereHas('mappedArchitect',function ($subquery) use ($user){
//                         $subquery->where('architect_id',$user->id);
//                     });
//             });
//         }
        
//         if($user->account_type == 'Quantity Surveyor'){
//             $projects = $projects->whereHas('mappedQuantitySurveyor', function ($q) use ($user) {
//                 $q->where('quantity_surveyor_id', $user->id);
//             })->where('parent_id',0);
//         }
        
//         $projects = $projects->orderByDesc('id')->get();
    
    
    
    
    
    
    
//     $data['totalProductEnquiries'] = ProductEnquiry::where('buyer_id', auth()->guard('buyer')->user()->id)->count(); 
//     $data['totalRFQEnquiries'] = $query = RFQEnquiry::orderByDesc('id')->where('user_type',$user->account_type)->where('user_id',$user->id)->count();
   
    
   
    
    
    
    
    
//     return view('customer.buyer.profile.dashboard',compact('user','data'));
//   }
  
  
  public function dashboard()
{
    $user = Auth::guard('buyer')->user(); 
    $data = [];
// dd($user);
    // --- 1. Contractor Logic (Existing) ---
    if ($user->account_type == 'Contractor') {
        $query = BoqQuotation::query()
            ->where(function ($q) use ($user) {
                $q->whereHas('mappedContractorType', function ($subQuery) use ($user) {
                    $subQuery->whereIn('contractor_type', (array) $user->contractor_type);
                })
                ->orWhereHas('mappedContractor', function ($subQuery) use ($user) {
                    $subQuery->whereIn('contractor_id', [(int) $user->id]);
                });
            })->where('is_form_filled', 1);

        $data['totalProjects'] = (clone $query)->count();

        // Contractor specific acceptance counts
        $data['totalAccetped'] = (clone $query)->whereHas('contractorAcceptation', function ($q) use ($user) {
            $q->where('contractor_id', $user->id)->where('status', 'Accepted');
        })->count();

        $data['totalNotSure'] = (clone $query)->whereHas('contractorAcceptation', function ($q) use ($user) {
            $q->where('contractor_id', $user->id)->where('status', 'Not Sure');
        })->count();

        $data['totalDeclined'] = (clone $query)->whereHas('contractorAcceptation', function ($q) use ($user) {
            $q->where('contractor_id', $user->id)->where('status', 'Declined');
        })->count();
    }


    // --- 2. Shared Logic (Developer, Architect, QS) ---
    // Start the base query
    $projects = BoqQuotation::query()->where('parent_id', 0);

    // Apply Filters based on Role
    if ($user->account_type == 'Developer') {
        $projects->where('created_by_user_id', $user->id);
    }

    if($user->account_type == 'Architect'){
    // overwrite $projects with the filtered version
    $projects = $projects->where(function($q) use ($user){
        $q->where('created_by_user_id', $user->id) // Projects I made
          ->orWhereHas('mappedArchitect', function ($subquery) use ($user){
              $subquery->where('architect_id', $user->id); // Projects assigned to me
          });
    });
}


    if ($user->account_type == 'Quantity Surveyor') {
        $projects->whereHas('mappedQuantitySurveyor', function ($q) use ($user) {
            $q->where('quantity_surveyor_id', $user->id);
        });
    }

    // --- 3. NEW: Calculate Status Counts for Architect & Developer ---
    if (in_array($user->account_type, ['Architect', 'Developer'])) {
        
        // The specific statuses you requested
        $targetStatuses = [
            'Pending',
            'Sent to Architect',
            'Assign to Architect',
            'Architect Start Working',
            'Sent to Quantity Surveyors',
            'Assign to Quantity Surveyors',
            'Sent to Contractor',
            'Assign to Contractor',
            
        ];
        
        // Optimized Query: Get all counts in one DB hit
        $myPro = (clone $projects)->whereIn('status', $targetStatuses)->pluck('id', 'status')->toArray();

        // Optimized Query: Get all counts in one DB hit
        $statusCounts = (clone $projects)->selectRaw('status, count(*) as count')->whereIn('status', $targetStatuses)
            ->groupBy('status')->pluck('count', 'status')->toArray();

        // Loop through required statuses to ensure key exists in $data (even if count is 0)
        foreach ($targetStatuses as $status) {
            // Create a variable name like 'totalSentToArchitect'
            $key = 'total' . str_replace(' ', '', ucwords($status));
            $data[$key] = $statusCounts[$status] ?? 0;
        }
        
        // Also add total projects count for these roles
        $data['totalProjects'] = (clone $projects)->count();
    }
 
    // Retrieve the actual list (if needed for the view)
    $projectsList = (clone $projects)->orderByDesc('id')->get();


    // --- 4. Other Enquiries ---
    $data['totalProductEnquiries'] = ProductEnquiry::where('buyer_id', $user->id)->count();
    $data['totalRFQEnquiries'] = RFQEnquiry::where('user_type', $user->account_type)->where('user_id', $user->id)->orderByDesc('id') // orderBy isn't needed for count(), but harmless
                                           ->count();

// dd($data,$myPro);
    return view('customer.buyer.profile.dashboard', compact('user', 'data', 'projectsList'));
}

  
  
  public function businessInformation(Request $request)
  {
      
      
    // return "dashboard";
    $user = Auth::guard('buyer')->user();
    // return $user->mappedTypesOfHotels;
    
    $userGalleries = BuyerGallaryImage::where('buyer_id', $user->id)->get();

    $preloaded = $userGalleries->map(function ($image) {
        return [
            'id' => $image->id,
            'src' => asset('uploads/buyer/' . $image->image),
        ];
    });
    return view('customer.buyer.profile.business-information',compact('user','preloaded'));
  }
  
  

  public function update(BuyerRegistrationRequest $request, int $id)
  {
    $this->BuyerRepository->update($request, $id);
    $buyer = Buyer::where('id',$id)->first();
    // dd($buyer);
    if (request()->wantsJson()) {
       return $this->successResponse(['buyer'=>$buyer], 'Your details has been updated successfully.'); 
    }
    return back()->with('sweet-alert', 'Your details has been updated successfully.');
  }
  
    public function uploadGallaryImages(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'gallary_images' => 'sometimes|array', // Ensure it's an array of files
            'gallary_images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Max 2MB per image
        ]);
        $user = Auth::guard('buyer')->user();
        
        if(isset($request->old))
        BuyerGallaryImage::where('buyer_id',$user->id)->whereNotIn('id',$request->old)->delete();
        
        if ($request->hasFile('gallary_images')) {
            $images = [];
            foreach ($request->file('gallary_images') as $file) {
                $images[] = [
                    'buyer_id' => $user->id,
                    'image'    => $this->handleSingleFileUpload($file, 'uploads/buyer/'),
                ];
            }
    
            BuyerGallaryImage::insert($images);
        }
    
        if ($request->wantsJson()) {
            return $this->successResponse(['buyer' => $user], 'Images have been uploaded successfully.');
        }
    
        return back()->with('sweet-alert', 'Images have been uploaded successfully.');
    }


  public function updateExpertDetails(ExpertRequest $request)
  {
    if ($request->hasfile('expert_photo'))
      $request->request->add(['photo' => $this->handleSingleFileUpload($request->expert_photo, 'uploads/buyer/')]);

    Buyer::findOrFail(Auth::guard('buyer')->user()->id)->update($request->validated() + ['photo' => $request->photo]);
    return back()->with('sweet-alert', 'Your details has been updated successfully.');
  }


  public function addProductReview(Request $request)
  {
    try {
      $all = $request->all();
      $saveRating = new Rating();
      $saveRating->user_id = Auth::guard('buyer')->user()->id;
      $saveRating->product_id = $request->product_id;
      $saveRating->star = $request->product_rating;
      $saveRating->review = $request->product_rating_desc;
      $saveRating->type = 'product';
      if($request->images){
        $saveRating->images = $this->handleMultiFileUpload($request, 'images', 'uploads/products', 4);
      }
      $saveRating->save();
      return $this->successResponse([], 'Product review has been saved Successfully!');
    } catch (\Throwable $th) {
      return $this->errorResponse([], $th->getMessage());
    }
  }



  public function logout(Request $request)
  {
    Auth::guard('buyer')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('home');
  }

   public function wishlist(Request $request){
// return "klmdsf";
    
    $wishlistProducts = ProductWishlist::where('user_id', Auth::guard('buyer')->user()->id)->orderByDesc('id')->get();
    $wishlistDesigners = DesignerWishlist::where('user_id', Auth::guard('buyer')->user()->id)->orderByDesc('id')->get();
    return view('customer.wishlist',compact('wishlistProducts','wishlistDesigners'));
  }
  
    public function becomeASeller(Request $request)
{
        $buyer = Auth::guard('buyer')->user();
    
        // Ensure the buyer is authenticated
        if (!$buyer) {
            return back()->with('error', 'You need to be logged in as a buyer to perform this action.');
        }
    
        // Check if a supplier with the buyer's email already exists
        if (Supplier::where('biz_email', $buyer->email)->exists()) {
            return back()->with('success', 'You have already become a seller.');
        }
    
        // Create a new Supplier entry
        $supplier = new Supplier();
        $supplier->biz_name = $buyer->first_name;
        $supplier->biz_surname = $buyer->last_name;
        $supplier->biz_email = $buyer->email;
        $supplier->biz_phonecode = $buyer->phonecode;
        $supplier->biz_phone = $buyer->phone;
    
        $supplier->password = $buyer->password;
    
        // Save the supplier
        $supplier->save();
    
        return back()->with('success', 'You are now registered as a seller.');
    }



    public function sellerLoginByHisEmail(Request $request)
    {
        try {
            // Check if the supplier exists by email
            $supplierExists = Supplier::where('biz_email', $request->email)->exists();
    
            if (!$supplierExists) {
                return back()->with('error', 'E-mail does not exist.');
            }
    
            // Prepare external URL with base64-encoded email and redirect URL
            $emailEncoded = base64_encode($request->email);
            $redirectUrl = urlencode(url()->previous()); // Encodes the previous URL safely
    
            $externalUrl = "https://seller.purchasync.global/seller/login-with-seller-email?email={$emailEncoded}&redirect_url={$redirectUrl}";
    
            // Redirect to external URL
            return redirect()->away($externalUrl);
        } catch (\Throwable $th) {
            // Handle exceptions
            return back()->with('error', $th->getMessage());
        }
    }

  
  
  
  
  
  
  


//   public function dashboard()
//   {
//     $orders = Cart::orderByDesc('id')
//       ->where([['buyer_id', Auth::guard('buyer')->user()->id], ['order_status', '=', 1]])
//       ->get();

//       $oldOrders = OldOrderSeller::orderByDesc('sid')
//       ->where([['emailid', Auth::guard('buyer')->user()->email]])
//       ->get();
      
//     // return   $oldOrders[0]->orderItem->productname;

//     $addresses = Address::where('user_id', '=', Auth::guard('buyer')->user()->id)->orderByDesc('id')->orderByDesc('id')->get();

//     $wishlistProducts = ProductWishlist::where('user_id', Auth::guard('buyer')->user()->id)->orderByDesc('id')->get();

//     $wishlistDesigners = DesignerWishlist::where('user_id', Auth::guard('buyer')->user()->id)->orderByDesc('id')->get();

//     $allOrders = Cart::orderByDesc('id')
//       ->where([
//         ['buyer_id', Auth::guard('buyer')->user()->id]
//       ])
//       ->count();

//     $awaitingShipmentOrders = Cart::orderByDesc('id')
//       ->where([
//         ['buyer_id', Auth::guard('buyer')->user()->id]
//       ])
//       ->whereIn('status', [0, 1])
//       ->count();

//     $deliveredOrders = Cart::orderByDesc('id')
//       ->where([
//         ['buyer_id', Auth::guard('buyer')->user()->id], ['status', '=', 3]
//       ])
//       ->count();

//     $cancelledOrders = Cart::orderByDesc('id')
//       ->where([
//         ['buyer_id', Auth::guard('buyer')->user()->id], ['status', '=', 4]
//       ])
//       ->count();

//     return view('customer.profile.dashboard', compact('orders', 'oldOrders','addresses', 'wishlistProducts', 'wishlistDesigners', 'allOrders', 'awaitingShipmentOrders', 'deliveredOrders', 'cancelledOrders'));
//   }
  
}





















