@extends('customer.partials.header')
@section('customerContent')
  <!--Body Container-->
  <div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
      <div class="collection-hero">
        <div class="collection-hero__image"></div>
        <div class="collection-hero__title-wrapper container">
          <div class="breadcrumbs text-uppercase mt-0 mt-lg-0"><span class="fw-bold">Checkout Failed</span>
          </div>
        </div>
      </div>
    </div>
    <!--End Collection Banner-->

    <!--Main Content-->
    <div class="container">
      <div class="checkout-success-content py-2">
        <!--Order Card-->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="checkout-scard card border-0 rounded">
              <div class="card-body text-center">
                <p class="card-icon"><i class="icon an an-times-cil text-danger fs-1"></i></p>
                <h4 class="card-title">Something went wrong!</h4>
                <p class="card-text mb-1">Seems like your order has been cancelled or was unable to process due to any
                  technical issue.</p>
                <p class="card-text text-order badge bg-danger my-3">Your order # is: <b>{{ @$order->id }}</b></p>
                <p class="card-text mb-0">Order date: {{ @$order->created_at->format('d M, Y') }}</p>
              </div>
            </div>
          </div>
        </div>
        <!--End Order Card-->
        <!--Order Summary-->
        <div class="row">
          <h2 class="fs-6 mb-3">Order Summary</h2>
          <div class="col-12 col-sm-12 col-md-12 col-lg-6">
            <div class="checkout-item-ordered">
              <div class="table-content table-responsive order-table mb-4">
                <table class="table table-bordered align-middle table-hover text-center mb-0">
                  <thead>
                    <tr>
                      <th class="fw-bold">Image</th>
                      <th class="text-start fw-600">Product Name</th>
                      <th class="fw-600">Price</th>
                      <th class="fw-600">Qty</th>
                      <th class="fw-600">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order->orderItems as $product)
                      <tr>
                        <td class="pro-img"><a href="javascript:;"><img class="primary blur-up lazyload"
                              src="{{ asset('uploads/products') . '/' . $product->product_image }}"
                              alt="{{ $product->name }}" title="{{ $product->name }}" width="80" /></a></td>
                        <td class="pro-name text-start">
                          <a href="javascript:;" class="d-block">{{ $product->name }}</a>
                          <div class="cart__meta-text">
                            Color: {{ $product->color }}<br>Size: {{ $product->size }}<br>
                            @isset($product->custom_name)
                              Custom Name: {{ $product->custom_name }}
                            @endisset
                          </div>
                        </td>
                        <td class="pro-price">{{ @$order->currency_code }}
                          {{ number_format($product->price_unit * $order->currency_con_ratio, 2) }}
                        </td>
                        <td class="pro-qty">{{ $product->quantity }}</td>
                        <td class="pro-total fw-500">
                          {{ @$order->currency_code }}
                          {{ number_format($product->price_unit * $order->currency_con_ratio * $product->quantity, 2) }}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4" class="item subtotal text-end fw-bolder">Subtotal:</td>
                      <td class="fw-500 last">{{ @$order->currency_code }}
                        {{ number_format($order->grand_total - $giftTotal * $order->currency_con_ratio, 2) }}
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="item tax text-end fw-bolder">Tax:</td>
                      <td class="fw-500 last">{{ @$order->currency_code }} 0.00</td>
                    </tr>
                    <tr>
                      <td colspan="4" class="item discount text-end fw-bolder">Discount Via Coupon:</td>
                      <td class="fw-500 last">- {{ @$order->currency_code }}
                        {{ number_format($order->coupon_amount * $order->currency_con_ratio, 2) }}
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="item discount text-end fw-bolder">Discount Via Referral:</td>
                      <td class="fw-500 last">- {{ @$order->currency_code }}
                        {{ number_format($order->referral_amount * $order->currency_con_ratio, 2) }}
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="item discount text-end fw-bolder">Discount Via Gift Card:</td>
                      <td class="fw-500 last">- {{ @$order->currency_code }}
                        {{ number_format($order->gift_card_amount * $order->currency_con_ratio, 2) }}
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="item shipping text-end fw-bolder">Shipping:</td>
                      <td class="fw-500 last">{{ @$order->currency_code }}
                        {{ number_format($order->shipping_charge * $order->currency_con_ratio, 2) }}
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="item shipping text-end fw-bolder">Gift:</td>
                      <td class="fw-500 last">{{ @$order->currency_code }}
                        {{ number_format($giftTotal * $order->currency_con_ratio, 2) }}
                      </td>
                    </tr>
                    @if ($order->wallet_used)
                      <tr>
                        <td colspan="4" class="item shipping text-end fw-bolder">Wallet:</td>
                        <td class="fw-500 last">- {{ @$order->currency_code }}
                          {{ number_format($order->wallet * $order->currency_con_ratio, 2) }}</td>
                      </tr>
                    @endif
                    <tr>
                      <td colspan="4" class="item total text-end fw-bolder">Grand Total:</td>
                      <td class="fw-500 last">{{ @$order->currency_code }}
                        {{ number_format(($order->grand_total + $order->shipping_charge - ($order->wallet + $order->coupon_amount + $order->gift_card_amount + $order->referral_amount)) * $order->currency_con_ratio, 2) }}
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-6">
            <div class="ship-info-details shipping-method-details">
              <div class="row g-0">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <div class="shipping-details mb-4 mb-sm-0 clearfix">
                    <h3>Shipping Address</h3>
                    <p>{{ @$order->shipping_address }}</p>
                    <p>{{ @$order->city->name }},</p>
                    <p>{{ @$order->state->name }},</p>
                    <p>{{ @$order->country->name }}.</p>
                    <p>{{ @$order->shipping_pincode }}</p>
                    <p>{{ @$order->shipping_phone }}</p>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <div class="billing-details clearfix">
                    <h3>Billing Address</h3>
                    <p>{{ @$order->shipping_address }}</p>
                    <p>{{ @$order->city->name }},</p>
                    <p>{{ @$order->state->name }},</p>
                    <p>{{ @$order->country->name }}.</p>
                    <p>{{ @$order->shipping_pincode }}</p>
                    <p>{{ @$order->shipping_phone }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="ship-info-details billing-payment-details">
              <div class="row g-0">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <div class="shipping-details mb-4 mb-sm-0 clearfix">
                    <h3>Shipping Method</h3>
                    <p>Flat Rate - Fixed</p>
                    <p>Delivery Date: N/A</p>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <div class="billing-details clearfix">
                    <h3>Payment Method</h3>
                    <p>{{ @$order->payment_method }}</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex-wrap w-100 mt-4 text-center">
              <a href="{{ route('home') }}"
                class="d-inline-flex align-items-center btn btn-outline-primary rounded me-2 mb-2 me-sm-3"><i
                  class="me-2 icon an an-angle-left-r"></i>Continue Shopping</a>
              <a href="{{ route('buyer.dashboard') }}"
                class="d-inline-flex align-items-center btn rounded me-2 mb-2 me-sm-3"><i
                  class="me-2 icon an an-user"></i>Go to my account</a>
              {{-- <button type="button" class="d-inline-flex align-items-center btn rounded me-2 mb-2 me-sm-3"><i
                  class="me-2 icon an an-sync-ar"></i>Re-Order</button> --}}
            </div>
          </div>
        </div>
        <!--End Order Summary-->
      </div>
    </div>
    <!--End Main Content-->
  </div>
  <!--End Body Container-->
@endsection
