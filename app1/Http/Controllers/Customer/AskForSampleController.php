<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Customer\ProductWishlist;
use App\Models\Customer\DesignerWishlist;
use App\Models\AskForSample;
use App\Models\Ecommerce\Product;
use App\Http\Controllers\Api\ApiController;
use App\Repositories\Customer\WishlistRepository;

class AskForSampleController extends ApiController
{
  protected $WishlistRepository;
  protected $successMessage = ['This product has been added for Sample Request', 'This designer has been added to your wishlist'];
  protected $alreadyExistsMessage = ['Product already exists in your Sample Request!', 'Designer already exists in your wishlist!'];
  protected $removedMessage = ['Product has been removed from your  Sample Request', 'Designer has been removed from your wishlist'];

  public function __construct(WishlistRepository $WishlistRepository)
  {
    $this->WishlistRepository = $WishlistRepository;
  }

 

    public function askForSample(Request $request): object
    {
        // Get the authenticated buyer user
        $user = auth()->guard('buyer')->user();
    
        // Retrieve the product
        $product = Product::find($request->product_id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        // Check if the sample request already exists
        $existingSample = AskForSample::where([
            'buyer_id'  => $user->id,
            'seller_id' => $product->seller_id,
            'product_id' => $product->id,
        ])->first();
    
        if ($existingSample) {
            // If exists, delete the sample request
            if ($existingSample->delete()) {
                return redirect()->back();
            } else {
                return redirect()->back()->with('error', 'Failed to remove sample request. Please try again.');
            }
        } else {
            // If not exists, create a new sample request
            $save = AskForSample::create([
                'buyer_id'  => $user->id,
                'seller_id' => $product->seller_id,
                'product_id' => $product->id,
                'buyer_address' => $request->buyer_address,
            ]);
    
            if ($save) {
                return redirect()->back();
            } else {
                return redirect()->back()->with('error', 'Failed to create sample request. Please try again.');
            }
        }
    }


  public function removeFromWishlist(int $id): object
  {
    ProductWishlist::find($id)->delete();
    return back()->with('success', $this->removedMessage[0]);
  }

  public function addDesignerToWishlist(Request $request): object
  {
    $response = $this->WishlistRepository->addToWishlistDesigner($request);

    if (!$response['status']) {
      DesignerWishlist::find($response['data']->id)->delete();
      return $this->successResponse([], $this->removedMessage[1], 202);
    }

    return $this->successResponse([], $this->successMessage[1], 201);
  }

  public function removeDesignerFromWishlist(int $id): object
  {
    DesignerWishlist::find($id)->delete();
    return back()->with('success', $this->removedMessage[1]);
  }
}
