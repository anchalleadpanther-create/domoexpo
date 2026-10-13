<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Customer\ProductWishlist;
use App\Models\Customer\DesignerWishlist;
use App\Http\Controllers\Api\ApiController;
use App\Repositories\Customer\WishlistRepository;

class WishlistController extends ApiController
{
  protected $WishlistRepository;
  protected $successMessage = ['This product has been added to your wishlist', 'This designer has been added to your wishlist'];
  protected $alreadyExistsMessage = ['Product already exists in your wishlist!', 'Designer already exists in your wishlist!'];
  protected $removedMessage = ['Product has been removed from your wishlist', 'Designer has been removed from your wishlist'];

  public function __construct(WishlistRepository $WishlistRepository)
  {
    $this->WishlistRepository = $WishlistRepository;
  }

 

 public function addToWishlist(Request $request, $product_id)
{
    // Merge product_id into the request
    $request->merge(['product_id' => $product_id]);

    // Add to wishlist using the repository
    $response = $this->WishlistRepository->addToWishlist($request);

    if (!$response['status']) {
        // If the operation failed, remove the item from the wishlist
        ProductWishlist::find($response['data']->id)->delete();

        // Check if the request expects JSON response
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $this->removedMessage[0],
                'wishlist_count' => wishlistCounter(),
            ], 202);
        }

        // Redirect back if JSON is not expected
        return redirect()->back()->with('error', $this->removedMessage[0]);
    }

    // If operation succeeded
    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => $this->successMessage[0],
            'wishlist_count' => wishlistCounter(),
        ], 201);
    }

    // Redirect back if JSON is not expected
    return redirect()->back()->with('success', '');
    // return redirect()->back()->with('success', $this->successMessage[0]);
}


  public function removeFromWishlist(int $id): object
  {
    ProductWishlist::find($id)->delete();
    return back()->with('success', $this->removedMessage[0]);
  }

//   public function addDesignerToWishlist(Request $request): object
//   {
//     $response = $this->WishlistRepository->addToWishlistDesigner($request);

//     if (!$response['status']) {
//       DesignerWishlist::find($response['data']->id)->delete();
//       return $this->successResponse([], $this->removedMessage[1], 202);
//     }

//     return $this->successResponse([], $this->successMessage[1], 201);
//   }
  
    public function addDesignerToWishlist(Request $request, $designer_id)
    {
        // Merge product_id into the request
        $request->merge(['designer_id' => $designer_id]);
    
        // Add to wishlist using the repository
        $response = $this->WishlistRepository->addToWishlistDesigner($request);
    
        if (!$response['status']) {
            // If the operation failed, remove the item from the wishlist
            DesignerWishlist::find($response['data']->id)->delete();
    
            // Check if the request expects JSON response
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $this->removedMessage[0],
                    'wishlist_count' => wishlistCounter(),
                ], 202);
            }
    
            // Redirect back if JSON is not expected
            return redirect()->back()->with('error', $this->removedMessage[1]);
        }
    
        // If operation succeeded
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $this->successMessage[1],
                'wishlist_count' => wishlistCounter(),
            ], 201);
        }
    
        // Redirect back if JSON is not expected
        return redirect()->back()->with('success', '');
        // return redirect()->back()->with('success', $this->successMessage[0]);
    }

  public function removeDesignerFromWishlist(int $id): object
  {
    DesignerWishlist::find($id)->delete();
    return back()->with('success', $this->removedMessage[1]);
  }
}
