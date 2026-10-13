<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Product;
use App\Models\Supplier\Supplier;
use App\Models\Ecommerce\Category;
use App\Http\Controllers\Controller;
use App\Models\Ecommerce\ProductType;
use App\Models\Ecommerce\ProductImage;
use App\Models\Ecommerce\ProductCategory;
use App\Models\Customer\Rating;
use App\Http\Requests\Ecommerce\ProductRequest;
use App\Repositories\Ecommerce\ProductRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;

class RatingListingController extends Controller
{
  use ApiResponser;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  

  public function ratings(Request $request)
  {
    $ratings = Rating::query();
    if(isset($request->reviewer) && !empty($request->reviewer)){
       $ratings = $ratings->where('user_type', $request->reviewer); 
    }
    
    if(isset($request->reviewed_for) && !empty($request->reviewed_for)){
       $ratings = $ratings->where('type', $request->reviewed_for); 
    }
    if(isset($request->status) && !empty($request->status) || $request->status == '0'){
       $ratings = $ratings->where('status', $request->status); 
    }
    $ratings = $ratings->paginate(20);
    return view('ecommerce.ratings.ratings', compact('ratings'));
  }

  public function toggleRatingStatus(int $id, int $status)
  {
    $saveStatus =  Rating::find($id);
    $saveStatus->status = $status;
    $saveStatus->save();
    return back()->with('success', 'Product  Rating status has been changed.');
  }
}
