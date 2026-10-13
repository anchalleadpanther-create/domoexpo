@extends('customer.partials.header')
@section('customerContent')


<style>
    .checkout-success-content .card{border-radius:10px;}
    .cart-detailsInfo .col-sm-9 small {
    width: 100%;
    display: inline-block;
    line-height: normal;
    font-size: 12px;
}
</style>

  <!--Body Container-->
  <div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
      <div class="collection-hero mb-0">
        <div class="collection-hero__image"></div>
        <div class="collection-hero__title-wrapper container">
          <div class="breadcrumbs text-uppercase mt-0 mt-lg-0"><span class="fw-bold">Checkout Success</span>
          </div>
        </div>
      </div>
    </div>
    <!--End Collection Banner-->
<div class="col-sm-12" style="background: #f7f7f7;">
    <!--Main Content-->
    <div class="container">
      <div class="checkout-success-content pt-5 pb-5">
          <div class="row">
             
               <div class="col-12 col-sm-5 mx-auto">
                   <div class="card p-3 mb-1">
                       <div class="row">
                           <div class="col-sm-1 pe-0">
                               <i class="icon an an-shield-check" style="color: #f9cad7;font-size: 22px;margin-top: 10px;"></i>
                           </div>
                           <div class="col-sm-11">
                                <h4>ORDER RECEIVED!</h4>
                       <p class="mb-0">We shall get in touch with you within 24 hours to re-confirm the order. You may be required to pay a taken amount upon reconfirmation.</p>
                   <p>Your order ID is {{$order->id}}</p>
                           </div>
                       </div>
                      
                   </div>
                   
                   <div class="card p-3 mb-1">
                       <h4>WhatsApp Updates Enabled <img src="https://littletags.webkype.co/allUsers/customer/images/home-img/whatslogonew1.png" style="width:20px"></h4>
                       <p>
                       You will receive order and shipment updates as well as tracking details on your WhatsApp.
                       </p>
                   </div>
                  {{-- {{ dd($order)}} --}}
                   <div class="card p-3 mb-1">
                       <div class="row mb-2">
                           <div class="col-sm-6">
                               <small>ORDER ID</small>
                               <p> {{$order->id}}</p>
                           </div>
                            <div class="col-sm-6">
                               <small>TOTAL PAID</small>
                               <p>{{ $order->currency_code }}
                                        {{ number_format(($order->grand_total + $order->shipping_charge - ($order->wallet + $order->coupon_amount + $order->gift_card_amount + $order->referral_amount)) * $order->currency_con_ratio, 2) }}
                              </p>
                           </div>
                       </div>
                        <div class="row">
                           <div class="col-sm-6">
                               <small>ORDER DATE</small>
                               <p> {{$order->created_at->format('M d Y')}}</p>
                           </div>
                            <div class="col-sm-6">
                               <small>PAYMENT MODE</small>
                               <p>{{ $order->payment_method }}</p>
                           </div>
                       </div>
                   </div>
              
                <div class="card p-3 mb-1 cart-detailsInfo">
                    <div class="card-header">Cart Details </div>
                    <div class="card-body p-0 mt-2">

                       @foreach ($order->orderItems as $product)
                          <div class="row">
                              <div class="col-sm-3">
                                  <img src="{{ asset('uploads/products') . '/' . $product->product_image }}" 
                                  alt="{{ $product->name }}" title="{{ $product->name }}" style="width:120px">
                              </div>


                             
                              <div class="col-sm-9">
                                  <h5 class="mb-1 mt-2">
                                      {{ $product->name }}
                                  </h5>
                                  <small>{{Str::limit( $product->short_desc , 90)}}</small>
                                  <small>Code : {{ $product->color }}</small>
                                  <small>Size : {{ $product->size }}</small>
                                  @isset($product->custom_name)
                                  <small>  Custom Name: {{ $product->custom_name }} </small>
                                  @endisset
                                  <p><b>{{ $order->currency_code }}
                                  {{ number_format($product->price_unit * $order->currency_con_ratio, 2) }}</b></p>
                              </div>
                          </div>
                        @endforeach
                        
                         <div class="col-sm-12 mt-3 mb-3">
                             <div class="card-header">Shipping Details </div>
                         </div>
                        
                        <div class="col-sm-5 address_wrap">
                            <h5>Shipping Address</h5>
                            <p class="mb-0">{{ $order->shipping_address }}</p>
                            <p class="mb-0">{{ @$order->city->name }},</p>
                            <p class="mb-0">{{ @$order->state->name }},</p>
                            <p class="mb-0">{{@ $order->country->name }}.</p>
                            <p class="mb-0">{{ $order->shipping_pincode }}</p>
                            <p>{{ $order->shipping_phone }}</p>


                        </div>
                        <div class="col-sm-12"><hr></div>
                        <div class="col-sm-5 address_wrap">
                            <h5>Billing Address</h5>
                            <p class="mb-0">{{ $order->shipping_address }}</p>
                            <p class="mb-0">{{ @$order->city->name }},</p>
                            <p class="mb-0">{{ @$order->state->name }},</p>
                            <p class="mb-0">{{ @$order->country->name }}.</p>
                            <p class="mb-0">{{ $order->shipping_pincode }}</p>
                            <p class="mb-0">{{ $order->shipping_phone }}</p>
                        </div>
                         <div class="col-sm-12 mt-3 mb-3">
                             <div class="card-header">Payment Summary </div>
                         </div>
                        
                        <div class="col-sm-12">
                            <div class="table-responsive">
                            <table>
                                <tr><td>Cart Total</td><td align="right">{{ $order->currency_code }}
                                  {{ number_format($order->grand_total - $giftTotal * $order->currency_con_ratio, 2) }}
                                </td> </tr>
                                 <tr><td>Discount</td><td align="right">- {{ $order->currency_code }}
                                    {{ number_format( ($order->wallet + $order->coupon_amount + $order->gift_card_amount + $order->referral_amount) * $order->currency_con_ratio, 2) }}</td> </tr>
                                 <tr> <td>Shipping</td><td align="right">{{ $order->currency_code }}
                                    {{ number_format($order->shipping_charge * $order->currency_con_ratio, 2) }}</td></tr>

                                 <tr> <td>Amount Due</td><td align="right">{{ $order->currency_code }}
                                  {{ number_format(($order->grand_total + $order->shipping_charge - ($order->wallet + $order->coupon_amount + $order->gift_card_amount + $order->referral_amount)) * $order->currency_con_ratio, 2) }}
                                 </td></tr>
                                 @if ($order->wallet_used)
                                  <tr>
                                        <tr>
                                          <td>Wallet:</td>
                                          <td  align="right">- {{ $order->currency_code }}
                                            {{ number_format($order->wallet * $order->currency_con_ratio, 2) }}</td>
                                        </tr>
                                  </tr>
                                 @endif
                                 <tr> <td colspan="2"><hr></td></tr>
                                 <tr> <td><p class="mb-0">Total Payable</p></td>
                                 <td align="right"><p class="mb-0">{{ $order->currency_code }}
                                        {{ number_format(($order->grand_total + $order->shipping_charge - ($order->wallet + $order->coupon_amount + $order->gift_card_amount + $order->referral_amount)) * $order->currency_con_ratio, 2) }}
                              </p></td></tr>
                            </table>
                             </div>
                             </div>
                    </div>
                </div>
               <div class="card p-3 mb-1">
                       <div class="row mb-2">
                           <div class="col-sm-12">
                               <h5>NOTE:</h5>
                               <p>You shall receive an order confirmation once the cash is collected.</p>
                               <p>Disclaimer time will be considered post order confirmation.</p>
                               <p>In case the payment collection is not successful within 5 days, the order would be cancelled automatically.</p>
                               <img src="https://littletags.webkype.co/uploads/sliders/VPiWYTQrn8UvLs8fsy3e8VcQpINxKV1708497413.jpg" style="width:100%">
                             </div>
                             <div class="col-sm-12 text-center">
                                    <a href="https://littletags.webkype.co" class="d-inline-flex align-items-center btn  rounded mt-2">
                                        <i class="me-2 icon an an-angle-left-r"></i>Continue Shopping</a>
                          
                             </div>
                       </div>
                       
                   </div>
              
               </div>
          </div>
           </div>
    </div>
    </div>
{{--  Old design start here --}}
 
      <!--End Main Content-->
    </div>
  
  {{--  Old design End  here --}}
  <!--End Body Container-->
  <input type="hidden" class="order-details" value="{{ $order->id }}" data-currency="{{ $order->currency_code }}"
    data-coupon-code="{{ $order->coupon_code }}"
    data-product-ids="{{ $order->orderItems->pluck('product_id')->implode(',') }}"
    data-shipping-charge="{{ $order->shipping_charge * $order->currency_con_ratio }}"
    data-grand-total="{{ ($order->grand_total + $order->shipping_charge - ($order->wallet + $order->coupon_amount + $order->gift_card_amount + $order->referral_amount)) * $order->currency_con_ratio }}" />
  <script type="module" type="text/javascript" src="{{ asset('allUsers/customer/order-successful.js') }}"></script>
@endsection
