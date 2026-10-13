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

  public function addToWishlist(Request $request): object
  {
    $response = $this->WishlistRepository->addToWishlist($request);

    if (!$response['status']) {
      ProductWishlist::find($response['data']->id)->delete();
      return $this->successResponse([wishlistCounter()], $this->removedMessage[0], 202);
    }

    return $this->successResponse([wishlistCounter()], $this->successMessage[0], 201);
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
