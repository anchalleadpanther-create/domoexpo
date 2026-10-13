<?php

namespace App\Repositories\Customer;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer\ProductWishlist;
use App\Models\Customer\DesignerWishlist;

class WishlistRepository extends BaseRepository
{
  public function addToWishlist($request): array
  {
    return $this->addProductToWishlist($request);
  }

  public function addProductToWishlist($request)
  {
    if (ProductWishlist::where([
      ['user_id', '=', Auth::guard('buyer')->user()->id],
      ['product_id', '=', $request->product_id]
    ])->exists())
      return [
        'status' => false,
        'data' => ProductWishlist::where([
          ['user_id', '=', Auth::guard('buyer')->user()->id],
          ['product_id', '=', $request->product_id]
        ])->first()
      ];


    // $request->request->marge(['user_id' => Auth::guard('buyer')->user()->id]);
    $request->merge(['user_id' => Auth::guard('buyer')->user()->id]);

        // dd($request->all());
    ProductWishlist::create($request->only('product_id', 'user_id'));

    return [
      'status' => true,
      'data' => (object)[],
    ];
  }

  public function addToWishlistDesigner($request): array
  {
    return $this->addDesignerToWishlist($request);
  }

   public function addDesignerToWishlist($request)
  {
    if (DesignerWishlist::where([
      ['user_id', '=', Auth::guard('buyer')->user()->id],
      ['designer_id', '=', $request->designer_id]
    ])->exists())
      return [
        'status' => false,
        'data' => DesignerWishlist::where([
          ['user_id', '=', Auth::guard('buyer')->user()->id],
          ['designer_id', '=', $request->designer_id]
        ])->first()
      ];

    // $request->request->add(['user_id' => Auth::guard('buyer')->user()->id]);
    $request->merge(['user_id' => Auth::guard('buyer')->user()->id]);

    DesignerWishlist::create($request->only('designer_id', 'user_id'));

    return [
      'status' => true,
      'data' => (object)[],
    ];
  }
}
