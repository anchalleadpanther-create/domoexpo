<?php

namespace App\Http\Controllers\Customer\Buyer\Wishlist;

use Illuminate\Http\JsonResponse;
use App\Models\Buyer\PackageBooking;
use App\Models\Ecommerce\Product;
use Illuminate\Support\Facades\Blade;
use App\Http\Controllers\Api\ApiController;
use App\View\Components\Customer\BookingsList;
use App\Models\Customer\ProductWishlist;
use App\Models\Customer\DesignerWishlist;
use App\Models\Supplier\Supplier;

class BuyerWishlistListController extends ApiController
{
  public function product_wishlist()
  {
    try {
      $user = auth()->guard('buyer')->user();
      $product_ids_arr = ProductWishlist::where('user_id',$user->id)->pluck('product_id')->toArray() ?? [];
      $products =  Product::whereIn('id',$product_ids_arr)->paginate(10);
      return view('customer.buyer.wishlist.product-wishlist',compact('products'));
    } catch (\Throwable $th) {
        return  back()->with('error',$th->getMessage());
    //   return $this->errorResponse([], $th->getMessage());
    }
  }
  
   public function designer_wishlist()
  {
    try {
      $user = auth()->guard('buyer')->user();
      $seller_ids_arr = DesignerWishlist::where('user_id',$user->id)->pluck('designer_id')->toArray() ?? [];
      $suppliers =  Supplier::whereIn('id',$seller_ids_arr)->paginate(10);
      return view('customer.buyer.wishlist.supplier-wishlist',compact('suppliers'));
    } catch (\Throwable $th) {
        // return  back()->with('error',$th->getMessage());
      return $this->errorResponse([], $th->getMessage());
    }
  }
}
