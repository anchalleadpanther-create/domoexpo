<?php

namespace App\Repositories\Buyer;

use Carbon\Carbon;
use App\Traits\Wallet;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;
use Illuminate\Support\Arr;
use App\Models\Customer\Address;
use App\Models\Ecommerce\Coupon;
use App\Models\Ecommerce\GiftCard;
use App\Models\Extensions\Currency;
use App\Repositories\BaseRepository;
use App\Traits\WhatsappNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier\SupplierOrder;
use App\Actions\Customer\OrderEmailNotification;
use App\Actions\Customer\AddOrderToOrderDateReport;
use App\Actions\Customer\OrderWhatsappNotification;
use App\Actions\ProductOrder\ChangeProductOrderStatus;
use App\Actions\Customer\AddReferralBonusAmountToWalletOfReferrer;
use App\Actions\Customer\SendGiftCard;
use App\Actions\ProductOrder\DivideAndAllocateWalletAndGiftCardAmount;

class OrderRepository extends BaseRepository
{
  use Wallet, WhatsappNotification;

  public function __construct(protected CartRepository $CartRepository)
  {
  }

  public function setShippingDetails($address, $grandTotal, $adminOrderCurrency = null): array
  {
    $shippingCharge = 0;
    if (getCurrentCurrency()->currency === 'INR' && $grandTotal < \App\Helpers\Tiers::currentTier()->freeShipping){
      $shippingCharge = getIndianShippingCost();
      if($grandTotal > 1000)
        $shippingCharge = 0;
    }
      

    if (getCurrentCurrency()->currency !== 'INR' && $grandTotal < getInternationalShippingCircumstance()){
        $shippingCharge = getInternationalShippingCost();
        if($grandTotal > 15000)
            $shippingCharge = 0;
    }
      

    // if (isset($adminOrderCurrency)) {
    //   if ($adminOrderCurrency === 'INR' && $grandTotal < \App\Helpers\Tiers::currentTier($address->user_id)->freeShipping)
    //     $shippingCharge = getIndianShippingCost();

    //   if ($adminOrderCurrency !== 'INR' && $grandTotal < getInternationalShippingCircumstance())
    //     $shippingCharge = getInternationalShippingCost();
    // }

    return [
      'shipping_name' => $address->fullName,
      'shipping_email' => $address->email,
      'shipping_phone' => $address->mobile,
      'shipping_fax' => $address->fax,
      'shipping_company' => $address->company,
      'shipping_address' => "{$address->address_one} {$address->address_two}",
      'shipping_country_id' => $address->country,
      'shipping_state_id' => $address->state,
      'shipping_city_id' => $address->city,
      'shipping_pincode' => $address->post_code,
      'shipping_charge' => $shippingCharge,
    ];
  }

  public function setOrderData($request, $grandTotal): array
  {
    $walletAmount = Auth::guard('buyer')->user()->wallet > $grandTotal ? $grandTotal :  Auth::guard('buyer')->user()->wallet;
    $orderData = $request->only(['comment', 'payment_method']);
    $orderData = array_merge($orderData, $this->setShippingDetails(Address::findOrFail($request->address), $grandTotal));
    $orderData = Arr::add($orderData, 'grand_total', $grandTotal);
    $orderData = Arr::add($orderData, 'referral_amount', (Auth::guard('buyer')->user()->OrdersCount === 0 && isset(Auth::guard('buyer')->user()->referred_by) && $grandTotal > 5000) ? \App\Helpers\Referral::getDetails()->referralAmountToBeAlloted : 0);
    $orderData = Arr::add($orderData, 'currency', getCurrentCurrency()->currency);
    $orderData = Arr::add($orderData, 'razorpay_payment_id', $request->razorpay_payment_id);
    $orderData = Arr::add($orderData, 'cart_id', (isset($request->update_device)) ? $this->CartRepository->getCartIdApi() : session()->get('cart_id'));
    $orderData = Arr::add($orderData, 'user_id', (isset($request->update_device)) ? auth()->user()->id : Auth::guard('buyer')->user()->id);
    $orderData = Arr::add($orderData, 'wallet_used', isset($request->wallet_used) ? true : false);
    $orderData = Arr::add($orderData, 'wallet', isset($request->wallet_used) ? $walletAmount : 0);
    $orderData = Arr::add($orderData, 'currency_id', getCurrentCurrency()->id);
    $orderData = Arr::add($orderData, 'currency_con_ratio', getCurrentCurrency()->con_ratio);
    $orderData = Arr::add($orderData, 'currency_code', getCurrentCurrency()->currency);
    $orderData = Arr::add($orderData, 'gift_card', $request->gift_card);
    $orderData = Arr::add($orderData, 'gift_card_amount', $request->used_gift_card_amount);
    $orderData = Arr::add($orderData, 'coupon_code', Cart::where([['buyer_id', '=', Auth::guard('buyer')->user()->id], ['order_status', '=', 0], ['coupon_used', '=', TRUE], ['cart_id', '=', session()->get('cart_id')]])->first()?->coupon_code);

    $couponAppliedValue = 0;

    if (isset($orderData['coupon_code'])) {
      $couponAppliedProducts = Cart::where([['buyer_id', '=', Auth::guard('buyer')->user()->id], ['order_status', '=', 0], ['coupon_used', '=', TRUE], ['cart_id', '=', session()->get('cart_id')]])->get();

      $couponAppliedValue = $couponAppliedProducts->map(function ($product) {
        return $product->quantity * $product->coupon_amount;
      });
      $couponAppliedValue = array_sum($couponAppliedValue->toArray());
    }

    $orderData = Arr::add($orderData, 'coupon_amount', $couponAppliedValue);

    if (Coupon::where('code', '=', $orderData['coupon_code'])->value('uses') === 1)
      Coupon::where('code', '=', $orderData['coupon_code'])->update(['status' => 0]);

    return $orderData;
  }

  public function mapOrderToSuppliersOrderTable($order, $cartProducts): bool
  {
    $supplierOrderData = [];
    foreach ($cartProducts as $key => $cartProduct) {
      $orderIdCount = ++$key;
      $supplierOrderData = Arr::except($order->toArray(), ['id', 'grand_total', 'created_at', 'updated_at']);
      $supplierOrderData = Arr::add($supplierOrderData, 'grand_total', $cartProduct->price_unit * $cartProduct->quantity);
      $supplierOrderData = Arr::add($supplierOrderData, 'order_id', $order->id);
      $supplierOrderData = Arr::add($supplierOrderData, 'order_id_counter', "{$order->id}-{$orderIdCount}");
      $supplierOrderData = Arr::add($supplierOrderData, 'cart_item_id', $cartProduct->id);
      $supplierOrderData = Arr::add($supplierOrderData, 'wallet_used', 0);
      $supplierOrderData = Arr::add($supplierOrderData, 'gift_card_amount', 0);

      $supplierOrder = SupplierOrder::create($supplierOrderData);
      $cartProduct->update(['supplier_order_id' => $supplierOrder->id]);
    }
    return true;
  }

  public function newOrder($request): Order
  {
    // getting order data
    $cartProducts = (isset($request->update_device)) ? $this->CartRepository->getCartDataApi() : $this->CartRepository->getCartData(session()->get('cart_id'));
    $grandTotal = $this->CartRepository->getGrandTotal($cartProducts);
    // setting order data 
    $orderData = $this->setOrderData($request, $grandTotal);
    $this->setGiftCardUsage($request, $grandTotal, $orderData['gift_card']);
    // dd($orderData);
    // saving order into db
    $order = Order::create($orderData);
    // copying just created order into sellers order table
    $this->mapOrderToSuppliersOrderTable($order, $cartProducts);
    // minusing stock from the quantity
    $this->CartRepository->minusStock((isset($request->update_device)) ? $this->CartRepository->getCartIdApi() : session()->get('cart_id'));
    // changing cart items status to order placed
    $this->CartRepository->changeCartItemsStatus((isset($request->update_device)) ? $this->CartRepository->getCartIdApi() : session()->get('cart_id'), 1);
    // emptying user wallet if used and make an entry in wallet history
    (!isset($request->wallet_used)) ?: $this->orderWalletUpdate(Buyer::find(Auth::guard('buyer')->user()->id), $order->id);
    // change all the product items status to new in the cart table. 
    ChangeProductOrderStatus::run(session()->get('cart_id'), 0, $order->buyer->fullName, 'Buyer');
    // sending email notification via email
    OrderEmailNotification::run($order, auth()->user()->email, 'Order Placed');
    // giving bonus amount to the referrer if order is via referral after successful order
    AddReferralBonusAmountToWalletOfReferrer::run(Buyer::find(Auth::guard('buyer')->user()->id), $order);
    // dividing wallet and allocating amounts of wallet & giftcard among all the ordered products after successful order
    DivideAndAllocateWalletAndGiftCardAmount::run(SupplierOrder::where('order_id', '=', $order->id)->get());
    // Creating/Updating date wise order report table.
    AddOrderToOrderDateReport::run(buyerId: $order->user_id, date: $order->created_at->format('Y-m-d'), grandTotal: $order->grand_total);
    // sending order whatsapp notification to buyer after successful order
    // $this->newOrderNotification($order);
    // sending giftcard to the receiver if the buyer has bought a giftcard.
    SendGiftCard::run($order);
    if ($order->payment_method === 'Cash on Delivery') $this->receivedCODOrder($order);
    elseif ($order->payment_method !== 'Cash on Delivery' && $order->shipping_country_id === 101) $this->orderConfirmationPrepaidOrder($order);
    if ($order->shipping_country_id !== 101) $this->orderConfirmationInternationalOrder($order);
    if (in_array('CUSTOM', $order->orderItems->pluck('size')->toArray())) $this->CustomOrderWhatsappNotification($order);
    // emptying cart session
    session()->forget('cart_id');
    return $order;
  }


  public function newOrderViaCCAvenue($request): array
  {
    // getting order data
    $cartProducts = (isset($request->update_device)) ? $this->CartRepository->getCartDataApi() : $this->CartRepository->getCartData(session()->get('cart_id'));
    $grandTotal = $this->CartRepository->getGrandTotal($cartProducts);
    // setting order data
    $orderData = $this->setOrderData($request, $grandTotal);
    // saving order into db

    $order = Order::create($orderData + ['status' => 8]);

    // minusing stock from the quantity

    // $this->CartRepository->minusStock((isset($request->update_device)) ? $this->CartRepository->getCartIdApi() : session()->get('cart_id'));

    // Creating/Updating date wise order report table.
    // AddOrderToOrderDateReport::run(buyerId: $order->user_id, date: $order->created_at->format('Y-m-d'), grandTotal: $order->grand_total);

    return compact('order', 'cartProducts');
  }

  public function newOrderViaPaypal($request): array
  {
    // getting order data
    $cartProducts = (isset($request->update_device)) ? $this->CartRepository->getCartDataApi() : $this->CartRepository->getCartData(session()->get('cart_id'));
    $grandTotal = $this->CartRepository->getGrandTotal($cartProducts);
    // setting order data 
    $orderData = $this->setOrderData($request, $grandTotal);
    // saving order into db
    $order = Order::create($orderData + ['status' => 8]);
    // minusing stock from the quantity
    $this->CartRepository->minusStock((isset($request->update_device)) ? $this->CartRepository->getCartIdApi() : session()->get('cart_id'));
    // Creating/Updating date wise order report table.
    AddOrderToOrderDateReport::run(buyerId: $order->user_id, date: $order->created_at->format('Y-m-d'), grandTotal: $order->grand_total);

    return compact('order', 'cartProducts');
  }

  public function updateStatus($id, $status): bool
  {
    $order = Order::find($id);
    $order->status = $status;
    $order->cancelled_at = Carbon::now()->toDateTimeString();
    $order->orderItems()->update(['status' => $status, 'cancelled_at' => Carbon::now()->toDateTimeString()]);
    return $order->save();
  }

  public function newOrderViaAdmin($request): Order
  {
    try {
      // getting order data
      $response = $this->CartRepository->putNewCartItemsViaAdmin($request);
      $cartProducts = $response['cart'];
      $cartId = $response['cartId'];
      $couponAmountTotal = $response['couponAmountTotal'];
      $buyer = Buyer::find($request->customer_id);

      $grandTotal = $this->CartRepository->getGrandTotal($cartProducts);
      // setting order data 
      $orderData = $this->setAdminOrderData($request, $grandTotal, $cartId, $couponAmountTotal);
      // saving order into db
      $order = Order::create($orderData + ['order_via' => 'offline']);
      // copying just created order into sellers order table
      $this->mapOrderToSuppliersOrderTable($order, $cartProducts);
      // minusing stock from the quantity
      $this->CartRepository->minusStock($cartId);
      // changing cart items status to order placed
      $this->CartRepository->changeCartItemsStatus($cartId, 1);
      // emptying user wallet if used and make an entry in wallet history
      (!isset($request->wallet_used)) ?: $this->orderWalletUpdate($buyer, $order->id);

      ChangeProductOrderStatus::run($cartId, 0, auth()->user()->name, 'Admin');
      // returning order id
      OrderEmailNotification::run($order, $buyer->email, 'Order Placed');
      // dividing wallet and allocating amounts of wallet & giftcard among all the ordered products after successful order
      DivideAndAllocateWalletAndGiftCardAmount::run(SupplierOrder::where('order_id', '=', $order->id)->get());
      // Creating/Updating date wise order report table.
      AddOrderToOrderDateReport::run(buyerId: $order->user_id, date: $order->created_at->format('Y-m-d'), grandTotal: $order->grand_total);
      // sending order whatsapp notification to buyer after successful order
      // $this->newOrderNotification($order);
      if ($order->payment_method === 'Cash on Delivery') $this->receivedCODOrder($order);
      elseif ($order->payment_method !== 'Cash on Delivery' && $order->shipping_country_id === 101) $this->orderConfirmationPrepaidOrder($order);
      if ($order->shipping_country_id !== 101) $this->orderConfirmationInternationalOrder($order);
      if (in_array('CUSTOM', $order->orderItems->pluck('size')->toArray())) $this->CustomOrderWhatsappNotification($order);

      return $order;
    } catch (\Throwable $th) {
      dd($th->getMessage(), $th);
    }
  }

  public function setAdminOrderData($request, $grandTotal, $cartId, $couponAmountTotal): array
  {
    $currency = Currency::where('currency', '=', $request->currency)->first();
    $orderData = $request->only(['comment', 'payment_method']);
    $orderData = array_merge($orderData, $this->setShippingDetails(Address::findOrFail($request->address), $grandTotal, isset($request->currency) ? $request->currency : null));
    Arr::set($orderData, 'coupon_amount', $couponAmountTotal);
    Arr::set($orderData, 'coupon_code', $request->coupon_code);
    $orderData = Arr::add($orderData, 'grand_total', $grandTotal);
    $orderData = Arr::add($orderData, 'currency', $request->currency);
    $orderData = Arr::add($orderData, 'cart_id', $cartId);
    $orderData = Arr::add($orderData, 'user_id', $request->customer_id);
    $orderData = Arr::add($orderData, 'wallet_used', isset($request->wallet_used) ? true : false);
    $orderData = Arr::add($orderData, 'wallet', isset($request->wallet_used) ? $request->wallet_used : 0);
    $orderData = Arr::add($orderData, 'currency_id', $currency->id);
    $orderData = Arr::add($orderData, 'currency_con_ratio', $currency->con_ratio);
    $orderData = Arr::add($orderData, 'currency_code', $currency->currency);
    return $orderData;
  }

  public function setGiftCardUsage($request, $grandTotal, $giftCard)
  {
    if (isset($request->gift_card)) {
      $buyer = Buyer::find(auth()->user()->id);
      if (GiftCard::where([['gift_card', '=', $request->gift_card], ['user_id', '=', null]])->exists()) {
        GiftCard::where('gift_card', '=', $request->gift_card)->update(['user_id' => $buyer->id]);
        $card = GiftCard::where('gift_card', '=', $giftCard)->first();
        $giftCardAmount = $card->amount;
        $remainingGiftCardAmount = $giftCardAmount - $grandTotal;
        if ($remainingGiftCardAmount > 0) {
          $buyer->update(['wallet' => $remainingGiftCardAmount]);
          $this->giftCardWalletUpdate($buyer, $remainingGiftCardAmount);
        }
      }
    }
  }
}
