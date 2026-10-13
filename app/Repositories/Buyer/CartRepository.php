<?php

namespace App\Repositories\Buyer;

use App\Models\Buyer\Cart;
use Illuminate\Support\Arr;
use App\Models\Buyer\CartId;
use App\Models\Ecommerce\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class CartRepository extends BaseRepository
{
  // public function getCartId()
  // {
  //   // getting cart id for loggedin user
  //   if (Auth::guard('buyer')->check()) {
  //     if (!session()->exists('cart_id')) {
  //       if (Cart::latest()->where('buyer_id', '=', Auth::guard('buyer')->user()->id)->doesntExist()) {
  //         session()->put('cart_id', CartId::orderByDesc('id')->value('cart_id') + 1);
  //         CartId::create(['cart_id' => session()->get('cart_id')]);
  //       } else {
  //         $getLatestCartProduct = Cart::latest()->where('buyer_id', '=', Auth::guard('buyer')->user()->id)->select('order_status as latest_product_order_status')->first();
  //         if ($getLatestCartProduct->latest_product_order_status === 1) {
  //           session()->put('cart_id', CartId::orderByDesc('id')->value('cart_id') + 1);
  //           CartId::create(['cart_id' => session()->get('cart_id')]);
  //         } else {
  //           $getCartIdFromDB = Cart::latest()->where([['buyer_id', '=', Auth::guard('buyer')->user()->id], ['order_status', '=', 0]])->value('cart_id');
  //           (isset($getCartIdFromDB)) ? session()->put('cart_id', $getCartIdFromDB) : null;
  //           Cart::where([['cart_id', session()->get('cart_id')]])->update(['buyer_id' => Auth::guard('buyer')->user()->id]);
  //         }
  //       }
  //     } else {
  //       if (Cart::latest()->where([['buyer_id', '=', Auth::guard('buyer')->user()->id], ['order_status', '=', 0]])->exists()) {
  //         $getCartIdFromDB = Cart::latest()->where([['buyer_id', Auth::guard('buyer')->user()->id], ['order_status', '=', 0]])->value('cart_id');
  //         session()->put('cart_id', $getCartIdFromDB);
  //       }

  //       if (CartId::where('id', '=', session()->get('cart_id'))->doesntExist()) {
  //         session()->put('cart_id', CartId::orderByDesc('id')->value('cart_id') + 1);
  //         CartId::create(['cart_id' => session()->get('cart_id')]);
  //       } else {
  //         $ifOrderPlacedForCurrentCartId = Cart::where([['cart_id', session()->get('cart_id')], ['order_status', '=', 1]])->exists();
  //         if ($ifOrderPlacedForCurrentCartId) {
  //           session()->put('cart_id', CartId::orderByDesc('id')->value('cart_id') + 1);
  //           CartId::create(['cart_id' => session()->get('cart_id')]);
  //         }
  //       }
  //     }
  //   }

  //   if (!Auth::guard('buyer')->check()) {
  //     if (!session()->exists('cart_id')) {
  //       session()->put('cart_id', CartId::orderByDesc('id')->value('cart_id') + 1);
  //       CartId::create(['cart_id' => session()->get('cart_id')]);
  //     }
  //   }
  //   return session()->get('cart_id');
  // }


  public function getCartId()
  {
    // getting cart id for loggedin user
    if (Auth::guard('buyer')->check()) {
      if (session()->exists('cart_id')) {
        if (CartId::where('id', '=', session()->get('cart_id'))->doesntExist()) {
          session()->put('cart_id', CartId::orderByDesc('id')->value('cart_id') + 1);
          CartId::create(['cart_id' => session()->get('cart_id')]);
        } else {
          $ifOrderPlacedForCurrentCartId = Cart::where([['cart_id', session()->get('cart_id')], ['order_status', '=', 1]])->exists();
          if ($ifOrderPlacedForCurrentCartId) {
            session()->put('cart_id', CartId::orderByDesc('id')->value('cart_id') + 1);
            CartId::create(['cart_id' => session()->get('cart_id')]);
          }
        }
      } else {
        if (Cart::latest()->where('buyer_id', '=', Auth::guard('buyer')->user()->id)->doesntExist()) {
          session()->put('cart_id', CartId::orderByDesc('id')->value('cart_id') + 1);
          CartId::create(['cart_id' => session()->get('cart_id')]);
        } else {
          $getLatestCartProduct = Cart::latest()->where('buyer_id', '=', Auth::guard('buyer')->user()->id)->select('order_status as latest_product_order_status')->first();
          if ($getLatestCartProduct->latest_product_order_status === 1) {
            session()->put('cart_id', CartId::orderByDesc('id')->value('cart_id') + 1);
            CartId::create(['cart_id' => session()->get('cart_id')]);
          } else {
            $getCartIdFromDB = Cart::latest()->where([['buyer_id', Auth::guard('buyer')->user()->id], ['order_status', '=', 0]])->value('cart_id');
            (isset($getCartIdFromDB)) ? session()->put('cart_id', $getCartIdFromDB) : null;
            Cart::where([['cart_id', session()->get('cart_id')]])->update(['buyer_id' => Auth::guard('buyer')->user()->id]);
          }
        }
      }
    }

    if (!Auth::guard('buyer')->check()) {
      if (!session()->exists('cart_id')) {
        session()->put('cart_id', CartId::orderByDesc('id')->value('cart_id') + 1);
        CartId::create(['cart_id' => session()->get('cart_id')]);
      }
    }
    return session()->get('cart_id');
  }

  public function mergeProducts(int $currentCartId, int $newCartId): bool
  {
    // merge products from current cart to new cart and if product already exists in Cart model then update quantity
    $newCartProducts = Cart::where('cart_id', $newCartId)->get();
    foreach ($newCartProducts as $newProduct) {
      $currentCartproduct = Cart::where([['cart_id', $currentCartId], ['product_id', $newProduct->product_id]])->first();
      // if product found in the new cart then update quantity and delete the product from new cart
      if (isset($currentCartproduct)) {
        // increase quantity of the product in current cart
        if ($currentCartproduct->quantity + $newProduct->quantity <= $newProduct->product->stock) {
          Cart::find($currentCartproduct->id)->update(['quantity' => $currentCartproduct->quantity + $newProduct->quantity]);
        } else {
          Cart::find($currentCartproduct->id)->update(['quantity' => $newProduct->product->stock]);
        }
        // then deleting the product from new cart
        Cart::find($newProduct->id)->delete();
      } else {
        // if product was not found in the current cart then just add the new product to current cart
        Cart::find($newProduct->id)->update(['cart_id' => $currentCartId]);
      }
    }
    session()->forget('cart_id');
    session()->put('cart_id', $currentCartId);
    return true;
  }

  public function checkIfProductExistsInCart(int $product_id, int $cartId): bool
  {
    return Cart::where([['cart_id', $cartId], ['product_id', $product_id]])->exists();
  }

  public function checkIfNewQuantityExceedingMaxStockValue(int $newQuantity, $stock): bool
  {
    return $newQuantity > $stock;
  }

  public function checkIfBuyerIsLoggedIn(): bool
  {
    return Auth::guard('buyer')->check();
  }

  public function addToCart($request): array
  {
    $productDetails = Product::find((int) $request->product_id);
    $cartId = isset($request->update_device) ? $this->getCartIdApi() : $this->getCartId();
    $cartData = Arr::except($productDetails->toArray(), ['status', 'view_count', 'created_at', 'updated_at']);
    Arr::set($cartData, 'cart_id', $cartId);
    Arr::set($cartData, 'product_image', isset($productDetails->images[0]) ? $productDetails->images[0]->image : (isset($productDetails->parentProduct->images[0]) ? $productDetails->parentProduct->images[0]->image : ''));
    Arr::set($cartData, 'product_id', $request->product_id);
    Arr::set($cartData, 'color', $request->color);
    Arr::set($cartData, 'size', $request->size);
    Arr::set($cartData, 'custom_name', $request->custom_name);
    Arr::set($cartData, 'is_gift', !empty($request->is_gift) ? $request->is_gift : 0);
    Arr::set($cartData, 'gift_pricing', $request->is_gift === '0' ? 0 : $productDetails->gift_pricing);
    Arr::set($cartData, 'gifting_message', $request->gifting_message);
    Arr::set($cartData, 'is_gift_card', !empty($request->is_gift_card) ? 1 : 0);
    Arr::set($cartData, 'gift_card_data', !empty($request->is_gift_card) ? $request->only('gift_card_value', 'from_name', 'to_name', 'to_email', 'message') : []);
    
    if ($request->hasfile('custom_image')) :
        Arr::set($cartData, 'custom_image', $this->handleSingleFileUpload($request->custom_image, 'uploads/custom_image/'));

        // $request->request->add(['biz_reg_pan_document' => $this->handleSingleFileUpload($request->biz_reg_pan_file, 'uploads/supplier/')]);
      endif; 
      
    /*
      If there's no discount on product level and the discount is set on brand above 0
      then applying the discount of brand level on the product
    */
    if ($productDetails->brand && $productDetails->brand->discount > 0 && $productDetails->discount === 0.0) {
      Arr::set($cartData, 'discount', $productDetails->brand->discount);
      Arr::set($cartData, 'price_unit', Arr::get($cartData, 'price_unit') - ($productDetails->brand->discount / 100) * $cartData['price_unit']);
    }

    if ($this->checkIfBuyerIsLoggedIn()) {
      Arr::set($cartData, 'buyer_id', Auth::guard('buyer')->user()->id);
    }

    if (isset($request->update_device)) {
      Arr::set($cartData, 'buyer_id', auth()->user()->id);
    }
    /* checking if product exists in cart and then updating its quantity with the given quantity */
    if ($this->checkIfProductExistsInCart($request->product_id, $cartId)) {
      $cart = Cart::where([['cart_id', $cartId], ['product_id', $request->product_id]])->first();

      if ($this->checkIfNewQuantityExceedingMaxStockValue($cart->quantity + $request->quantity, $productDetails->stock)) {
        return [
          'status' => false,
          'cartData' => $cart,
        ];
      }

      $cart->quantity = $cart->quantity + $request->quantity;
      $cart->save();
      return [
        'status' => true,
        'cartData' => $cart,
      ];
    }
    Arr::set($cartData, 'quantity', $request->quantity);
    return [
      'status' => true,
      'cartData' => Cart::create($cartData),
    ];
  }

  public function updateUserIdInCart(): bool
  { 
    if(session()->exists('cart_id')) {
      $getCartIdFromDB = Cart::where([['buyer_id', Auth::guard('buyer')->user()->id], ['order_status', '=', 0]])->value('cart_id');
      if (isset($getCartIdFromDB) && $getCartIdFromDB != session()->get('cart_id')) {
        $this->mergeProducts($getCartIdFromDB, session()->get('cart_id'));
      }
    }
    if (session()->exists('cart_id')) {
      return Cart::where('cart_id', '=', session()->get('cart_id'))->update(['buyer_id' => Auth::guard('buyer')->user()->id]);
    }
    return false;
  }

  public function getCartData($cartId = null)
  {
    return Cart::where('cart_id', '=', $cartId)->get();
  }

  public function getCartCount(): int
  {
    return Cart::where('cart_id', '=', $this->getCartId())->sum('quantity');
  }

  public function getGrandTotal($products): int
  {
    $grandTotal = 0;

    foreach ($products as $product) {
      $grandTotal += $product->price_unit * $product->quantity;
      $grandTotal += $product->gift_pricing * $product->quantity;
    }
    return $grandTotal;
  }

  public function getGiftTotal($products): int
  {
    $giftTotal = 0;

    foreach ($products as $product) {
      $giftTotal += $product->gift_pricing * $product->quantity;
    }

    return $giftTotal;
  }

  public function reduceQuantity(int $cartItemId): array
  {
    $cart = Cart::find($cartItemId);
    if ($cart->quantity > 1) {
      $cart->quantity = $cart->quantity - 1;
      $cart->save();
      return [
        'status' => true,
        'cartData' => $cart,
      ];
    }
    return [
      'status' => false,
      'cartData' => $cart,
    ];
  }

  public function increaseQuantity(int $cartItemId, int $maxStock): array
  {
    $cart = Cart::find($cartItemId);
    if ($cart->quantity < $maxStock) {
      $cart->quantity = $cart->quantity + 1;
      $cart->save();
      return [
        'status' => true,
        'cartData' => $cart,
      ];
    }
    return [
      'status' => false,
      'cartData' => $cart,
    ];
  }

  public function changeCartItemsStatus(int $cartId, int $status): bool
  {
    return Cart::where('cart_id', '=', $cartId)->update(['order_status' => $status]);
  }

  public function minusStock(int $cartId): bool
  {
    $cart = Cart::where('cart_id', '=', $cartId)->get();
    foreach ($cart as $item) {
      $product = Product::find($item->product_id);
      $product->stock = $product->stock - $item->quantity;
      $product->save();
    }
    return true;
  }

  // api methods

  public function getCartIdApi()
  {
    $getCartIdFromDB = Cart::where([['buyer_id', auth()->user()->id], ['order_status', '=', 0]])->value('cart_id');
    if (isset($getCartIdFromDB)) {
      return $getCartIdFromDB;
    }
    $cart = CartId::create(['cart_id' => CartId::orderByDesc('id')->value('cart_id') + 1]);
    return $cart->cart_id;
  }

  public function getCartDataApi()
  {
    return Cart::where('cart_id', '=', $this->getCartIdApi())->get();
  }

  public function getCartCountApi(): int
  {
    return Cart::where('cart_id', '=', $this->getCartIdApi())->sum('quantity');
  }

  public function updateBuyerIdInCart(int $id)
  {
    // return $this->getCartId();
    Cart::where('cart_id', '=', $this->getCartId())->update([
      'buyer_id' => $id,
    ]);
  }

  public function putNewCartItemsViaAdmin($request)
  {
    $cartId = CartId::latest()->first();
    if (isset($cartId)) {
      $cartId = CartId::create([
        'cart_id' => ++$cartId->cart_id,
      ]);
    } else {
      $cartId = CartId::create([
        'cart_id' => 1,
      ]);
    }

    $cartId = $cartId->cart_id;

    $couponAmountTotal = 0;
    foreach ($request->product_id as $key => $productId) {
      $couponAmountTotal += isset($request->discount_amount[$key]) ? (float) $request->discount_amount[$key] : 0;
      $productDetails = Product::find((int) $productId);
      $cartData = Arr::except($productDetails->toArray(), ['status', 'view_count', 'created_at', 'updated_at', 'price_unit']);
      Arr::set($cartData, 'cart_id', $cartId);
      Arr::set($cartData, 'price_unit', (float) $request->price[$key]);
      Arr::set($cartData, 'coupon_amount', isset($request->discount_amount[$key]) ? (float) $request->discount_amount[$key] : 0);
      Arr::set($cartData, 'coupon_used', isset($request->discount_amount[$key]) && $request->discount_amount[$key] > 0 ? 1 : 0);
      Arr::set($cartData, 'coupon_code', $request->coupon_code);
      Arr::set($cartData, 'product_image', isset($productDetails->images[0]) ? $productDetails->images[0]->image : (isset($productDetails->parentProduct->images[0]) ? $productDetails->parentProduct->images[0]->image : ''));
      Arr::set($cartData, 'product_id', $productId);
      Arr::set($cartData, 'color', $request->color);
      Arr::set($cartData, 'size', $request->size);
      Arr::set($cartData, 'buyer_id', $request->customer_id);
      Arr::set($cartData, 'quantity', isset($request->quantity[$key]) ? $request->quantity[$key] : 0);
      Arr::set($cartData, 'gift_pricing', 0);
      Cart::create($cartData);
    }
    $cart = Cart::where('cart_id', '=', $cartId)->get();
    return compact('cart', 'cartId', 'couponAmountTotal');
  }
}
