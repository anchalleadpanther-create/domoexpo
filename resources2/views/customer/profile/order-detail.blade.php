@extends('customer.partials.header')
@section('customerContent')
  <style>
    .active>.icon {

      color: #ffffff !important;

    }



    .tracking-detail {

      padding: 3rem 0
    }



    #tracking {
      margin-bottom: 1rem
    }


    [class*=tracking-status-] p {

      margin: 0;

      font-size: 1.1rem;

      color: #fff;

      text-transform: uppercase;

      text-align: center
    }



    [class*=tracking-status-] {

      padding: 1.6rem 0
    }

    .tracking-status-outfordelivery {

      background-color: #f5a551
    }



    .tracking-status-deliveryoffice {

      background-color: #f7dc6f
    }



    .tracking-status-delivered {

      background-color: #4cbb87
    }



    .tracking-status-attemptfail {

      background-color: #b789c7
    }



    .tracking-status-error,

    .tracking-status-exception {

      background-color: #d26759
    }



    .tracking-status-expired {

      background-color: #616e7d
    }



    .tracking-status-pending {

      background-color: #ccc
    }



    .tracking-status-inforeceived {

      background-color: #214977
    }



    .tracking-list {

      border: 1px solid #e5e5e5
    }



    .tracking-item {
      border-left: 1px solid #f7e3e2;
      position: relative;
      padding: 2rem 1.5rem .5rem 2.5rem;
      font-size: .9rem;
      margin-left: 2rem;
      min-height: 5rem;
      display: none;
    }



    .tracking-item:last-child {
      padding-bottom: 4rem
    }



    .tracking-item .tracking-date {
      margin-bottom: .5rem
    }



    .tracking-item .tracking-date span {
      color: #888;
      font-size: 85%;
      padding-left: .4rem
    }



    .tracking-item .tracking-content {
      padding: .5rem .8rem;
      background-color: #f4f4f4;
      border-radius: .5rem
    }



    .tracking-item .tracking-content span {
      display: block;
      color: #888;
      font-size: 85%
    }



    .tracking-item .tracking-icon {
      line-height: 2.6rem;
      position: absolute;
      left: -1.3rem;
      width: 2.6rem;
      height: 2.6rem;
      text-align: center;
      border-radius: 50%;
      font-size: 1.1rem;
      background-color: #fff;
      color: #fff
    }

    .tracking-item .tracking-icon.status-sponsored {
      background-color: #f68
    }

    .tracking-item .tracking-icon.status-delivered {
      background-color: #4cbb87
    }



    .tracking-item .tracking-icon.status-outfordelivery {
      background-color: #f5a551
    }



    .tracking-item .tracking-icon.status-deliveryoffice {

      background-color: #f7dc6f
    }



    .tracking-item .tracking-icon.status-attemptfail {

      background-color: #b789c7
    }



    .tracking-item .tracking-icon.status-exception {

      background-color: #d26759
    }



    .tracking-item .tracking-icon.status-inforeceived {

      background-color: #214977
    }



    .tracking-item .tracking-icon.status-intransit {

      color: #e5e5e5;

      font-size: .6rem
    }



    @media(min-width:992px) {

      .tracking-item {

        margin-left: 10rem
      }



      .tracking-item .tracking-date {

        position: absolute;

        left: -10rem;

        width: 7.5rem;

        text-align: right
      }



      .tracking-item .tracking-date span {

        display: block
      }



      .tracking-item .tracking-content {

        padding: 0;

        background-color: transparent
      }

    }

    .tracking-detail ul li { display: -webkit-box; display: -ms-flexbox; display: flex; margin-bottom: 5px; }
    .tracking-detail ul li .left { min-width: 220px; text-transform: capitalize; font-weight: 600; }
    .tracking-detail ul li .right { color: #555555; }
    .tracking-map iframe { border: 5px solid #fff; -webkit-box-shadow: 0px 5px 15px rgba(0,0,0,0.09); box-shadow: 0px 5px 15px rgba(0,0,0,0.09); border-radius: 8px; }
    .tracking-steps .step { text-align: center; margin: 0 5px 8px; padding: 10px 10px 10px 30px; min-width: 180px; position: relative; background-color: #f0f0f0; min-height: 40px; -webkit-transition: background-color 0.2s ease; transition: background-color 0.2s ease; }
    .tracking-steps .step span { position: relative; font-size: 13px; font-weight: 500; text-transform: capitalize; }
    .tracking-steps .step:before, .tracking-steps .step:after { content:" "; position: absolute; top: 0; right: -17px; width: 0; height: 0; border-top: 20px solid transparent; border-bottom: 20px solid transparent; border-left: 17px solid #f0f0f0; z-index: 2; -webkit-transition: border-color 0.2s ease; transition: border-color 0.2s ease; }
    .tracking-steps .step:before { right: auto; left: 0; border-left: 17px solid #fff; z-index: 0; }
    .tracking-steps .step:first-child { border-top-left-radius: 4px; border-bottom-left-radius: 4px; }
    .tracking-steps .step:first-child:before { border: none; }
    .tracking-steps .step.done { color: #222; background-color: #d7d7d7; }
    .tracking-steps .step.done:after { border-left: 17px solid #d7d7d7; }
    .tracking-steps .step.current { color: #fff; background-color: #fe877b; }
    .tracking-steps .step.current:after { border-left: 17px solid #fe877b; }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px;
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -45px;
        text-align: center;
        position: relative;
    }
    .track .step::before {
        height: 7px;
        position: absolute;
        content: '';
        width: 100%;
        left: 0;
        top: 45px;
    }
    .track .step.active:before {
      color:#ffffff;
        background: #e55c5c;
    }
    .track .icon {
        display: inline-block;
        width: 90px;
        height: 90px;
        line-height: 90px;
        position: relative;
        border-radius: 100%;
        background: #787678;font-size: 10px;
    }
    .track .step.active .icon {
        background: #e55c5c;
    }
    .track .text {
        display: block;
        margin-top: 7px;
    }
 
  </style>
  <!--Body Container-->
  <div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
      <div class="collection-hero">
        <div class="collection-hero__image"></div>
        <div class="collection-hero__title-wrapper container">
          <div class="breadcrumbs text-uppercase mt-0 mt-lg-0"><span class="fw-bold">My Account</span></div>
        </div>
      </div>
    </div>
    <!--End Collection Banner-->

    <!--Container-->
    <div class="container pt-2">
      <!--Main Content-->
      <div class="dashboard-upper-info">
        <div class="row align-items-center g-0">
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="d-single-info">
              <p class="user-name">Hello <span class="fw-600">{{ Auth::guard('buyer')->user()->fullName }}</span></p>
              <p>(not {{ Auth::guard('buyer')->user()->fullName }}? <a class="link-underline fw-600" href="javascript:;"
                  onclick="document.querySelector('#logout').submit();">Log Out</a>)</p>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-sm-6">
            <div class="d-single-info">
              <p>Need Assistance? Customer service at.</p>
              <p><a href="https://api.whatsapp.com/send?phone=+916359880688&text=Hello" target="_blank">+916359880688</a>
              </p>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="d-single-info">
              <p>E-mail them at </p>
              <p><a href="mailto:info@littletags.com" target="_blank">info@littletags.com</a>
              </p>
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 col-sm-6">
            <div class="d-single-info text-lg-center">
              <a class="link-underline fw-600 view-cart" href="{{ route('buyer.cart') }}"><i
                  class="icon an an-sq-bag me-2"></i>View Cart</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex d-md-none">

        <div class="col-md-12 col-lg-12">
          <div id="tracking-pre"></div>
          <div id="tracking">
            <div class="text-center tracking-status-intransit bg-pink">
              <p class="tracking-status text-dark">{{ $order->activities()->first()->status }}</p>
            </div>
            <div class="tracking-list">
              <div class="tracking-item d-block">
                <div class="tracking-icon status-intransit" style="background-color: #f7e3e2;">
                  <span class="icon text-dark">LittleTag</span>
                </div>
                <div class="tracking-content">{{ $order->created_at->format('d M Y') }}<span>Order Placed</span></div>
              </div>
              @if ($order->activities()->first()->status === 'Order Cancelled')
                <div class="tracking-item d-block">
                  <div class="tracking-icon status-intransit" style="background-color: #f7e3e2;">
                    <span class="icon text-dark">LittleTag</span>
                  </div>
                  <div class="tracking-content">{{ $order->cancelled_at?->format('d M Y') }}<span>Order Cancelled</span>
                  </div>
                </div>
              @elseif($order->activities()->first()->status === 'Order Returned')
                <div class="tracking-item d-block">
                  <div class="tracking-icon status-intransit" style="background-color: #f7e3e2;">
                    <span class="icon text-dark">LittleTag</span>
                  </div>
                  <div class="tracking-content"><span>Order Returned</span></div>
                </div>
              @elseif($order->activities()->first()->status === 'Order Pending')
                <div class="tracking-item d-block">
                  <div class="tracking-icon status-intransit" style="background-color: #f7e3e2;">
                    <span class="icon text-dark">LittleTag</span>
                  </div>
                  <div class="tracking-content"><span>Order Pending</span></div>
                </div>
              @else
                <div @class([
                    'tracking-item',
                    'd-block' => in_array($order->activities()->first()->status, [
                        'Order Accepted',
                        'Order Packed',
                        'Order Ready to Ship',
                        'Order Shipped',
                        'Order Delivered',
                    ]),
                ])>
                  <div class="tracking-icon status-intransit" style="background-color: #f7e3e2;">
                    <span class="icon text-dark">LittleTag</span>
                  </div>
                  <div class="tracking-content">{{ $order->accepted_at?->format('d M Y') }}<span>Order Processed</span>
                  </div>
                </div>
                <div @class([
                    'tracking-item',
                    'd-block' => in_array($order->activities()->first()->status, [
                        'Order Packed',
                        'Order Ready to Ship',
                        'Order Shipped',
                        'Order Delivered',
                    ]),
                ])>
                  <div class="tracking-icon status-intransit" style="background-color: #f7e3e2;">
                    <span class="icon text-dark">LittleTag</span>
                  </div>
                  <div class="tracking-content">{{ $order->packed_at?->format('d M Y') }}<span>Order Packed </span>
                  </div>
                </div>
                <div @class([
                    'tracking-item',
                    'd-block' => in_array($order->activities()->first()->status, [
                        'Order Ready to Ship',
                        'Order Shipped',
                        'Order Delivered',
                    ]),
                ])>
                  <div class="tracking-icon status-intransit" style="background-color: #f7e3e2;">
                    <span class="icon text-dark">LittleTag</span>
                  </div>
                  <div class="tracking-content">{{ $order->shipped_at?->format('d M Y') }}<span>Order Shipped </span>
                  </div>
                </div>
                <div @class([
                    'tracking-item',
                    'd-block' => in_array($order->activities()->first()->status, [
                        'Order Shipped',
                        'Order Delivered',
                    ]),
                ])>
                  <div class="tracking-icon status-intransit" style="background-color: #f7e3e2;">
                    <span class="icon text-dark">LittleTag</span>
                  </div>
                  <div class="tracking-content"><span>Order Out for Delivery</span>
                  </div>
                </div>
                <div @class([
                    'tracking-item',
                    'd-block' => in_array($order->activities()->first()->status, [
                        'Order Delivered',
                    ]),
                ])>
                  <div class="tracking-icon status-intransit" style="background-color: #f7e3e2;">
                    <span class="icon text-dark">LittleTag</span>
                  </div>
                  @if (in_array($order->activities()->first()->status, ['Order Delivered']))
                    <div class="tracking-content">
                      {{ $order->activities()->first()->created_at->format('d M Y') }}<span>Order Delivered </span>
                    </div>
                  @elseif(in_array($order->activities()->first()->status, ['Order Shipped']))
                    <div class="tracking-content"><span>Arriving early!</span>
                    </div>
                  @else
                    <div class="tracking-content"><span>Order Delivered!</span>
                    </div>
                  @endif
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="row px-3 mb-5 d-none d-md-flex">
        <div class="col-sm-12 col-md-10 offset-md-1">
          <div class="track">
            <div @class(['step active'])>
              <span class="icon text-white">LittleTag</span>
              <span class="text small">Order Placed <br /> {{ $order->created_at->format('d M Y') }}</span>
            </div>
            @if ($order->activities()->first()->status === 'Order Cancelled')
              <div @class(['step active'])>
                <span class="icon text-white">LittleTag</span>
                <span class="text small">Order Cancelled <br /> {{ $order->cancelled_at?->format('d M Y') }}</span>
              </div>
            @elseif($order->activities()->first()->status === 'Order Returned')
              <div @class(['step active'])>
                <span class="icon text-white">LittleTag</span>
                <span class="text small">Order Returned</span>
              </div>
            @elseif($order->activities()->first()->status === 'Order Pending')
              <div @class(['step active'])>
                <span class="icon text-white">LittleTag</span>
                <span class="text small">Order Pending</span>
              </div>
            @else
              <div @class([
                  'step',
                  'active' => in_array($order->activities()->first()->status, [
                      'Order Accepted',
                      'Order Packed',
                      'Order Ready to Ship',
                      'Order Shipped',
                      'Order Delivered',
                  ]),
              ])>
                <span class="icon text-white">LittleTag</span>
                <span class="text small">Order Processed <br /> {{ $order->accepted_at?->format('d M Y') }}</span>
              </div>
              <div @class([
                  'step',
                  'active' => in_array($order->activities()->first()->status, [
                      'Order Packed',
                      'Order Ready to Ship',
                      'Order Shipped',
                      'Order Delivered',
                  ]),
              ])>
                <span class="icon text-white">LittleTag</span>
                <span class="text small">Order Packed <br /> {{ $order->packed_at?->format('d M Y') }}</span>
              </div>
              <div @class([
                  'step',
                  'active' => in_array($order->activities()->first()->status, [
                      'Order Ready to Ship',
                      'Order Shipped',
                      'Order Delivered',
                  ]),
              ])>
                <span class="icon text-white">LittleTag</span>
                <span class="text small">Order Shipped <br /> {{ $order->shipped_at?->format('d M Y') }}</span>
              </div>
              <div @class([
                  'step',
                  'active' => in_array($order->activities()->first()->status, [
                      'Order Shipped',
                      'Order Delivered',
                  ]),
              ])>
                <span class="icon text-white">LittleTag</span>
                <span class="text small">Order Out for Delivery</span>
              </div>
              <div @class([
                  'step',
                  'active' => in_array($order->activities()->first()->status, [
                      'Order Delivered',
                  ]),
              ])>
                <span class="icon text-white">LittleTag</span>
                @if (in_array($order->activities()->first()->status, ['Order Delivered']))
                  <span class="text small">Order Delivered on <br />
                    {{ $order->activities()->first()->created_at->format('d M Y') }}</span>
                @elseif(in_array($order->activities()->first()->status, ['Order Shipped']))
                  <span class="text small">Arriving early!</span>
                @else
                  <span class="text small">Order Delivered!</span>
                @endif
              </div>
            @endif
          </div>
        </div>
      </div>

      <div class="row mb-4 mb-lg-5 pb-lg-5">
        <div class="col-sm-12 col-md-10 offset-md-1">
          <div class="row mb-2 align-items-center">
            <div class="col-md-6">
              <h2 class="">OID: {{ @$order->orderItemDetail->order_id_counter }}</h2>
            </div>
            <div class="col-md-6 text-right">
              <a href="{{ route('buyer.dashboard') }}" class="btn bg-pink">Back</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="bg-pink">
                <tr>
                  <td colspan="2" class="text-left">
                    <p>Order Details:</p>
                  </td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 50%;" class="text-left">
                    <b> OID: </b>{{ @$order->orderItemDetail->order_id_counter }}<br>
                    <b> Order Placed Date:</b> {{ @$order->orderItemDetail->created_at->format('d M, Y') }}<br>
                    <b> Order Value :</b>
                    {{ @$order->orderItemDetail->order->currency_code }}

                    {{ number_format(
                        ($order->orderItemDetail->grand_total +
                            $order->orderItemDetail->shipping_charge +
                            $giftTotal -
                            $order->coupon_amount -
                            ($order->orderItemDetail->wallet_used +
                                $order->orderItemDetail->gift_card_amount +
                                $order->orderItemDetail->referral_amount)) *
                            @$order->orderItemDetail->order->currency_con_ratio,
                        2,
                    ) }}
                    <br>
                    <b>Payment Method :</b> {{ @$order->orderItemDetail->payment_method }}<br>
                    <b>Order Status :</b> {{ @$order->orderItemDetail->OrderStatus }}<br />
                    <b>Gifting Message :</b> {{ @$order->gifting_message }}

                  </td>
                  <td style="width: 50%;" class="text-left">
                    <b> {{ @$order->seller->biz_name }}</b> <br>
                    {{ @$order->seller->biz_company_address }} <br>
                    {{ @$order->seller->biz_company_city }} ({{ @$order->seller->biz_company_zip }}) <br />
                    {{ @$order->seller->state->name }}, {{ @$order->seller->country->name }} <br>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="bg-pink">
                <tr>
                  <td style="width: 50%; vertical-align: top;" class="text-left">Billing Address</td>
                  <td style="width: 50%; vertical-align: top;" class="text-left"> Shipping Address</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-left">
                    {{ @$order->orderItemDetail->shipping_name }}<br />
                    {{-- {{ @$order->orderItemDetail->shipping_company }} --}}
                    {{-- {{ isset($order->orderItemDetail->shipping_fax) ? $order->orderItemDetail->shipping_fax : ''
                  }}<br /> --}}
                    {{ @$order->orderItemDetail->shipping_address }}<br />
                    {{ @$order->orderItemDetail->country->name }}
                    {{ @$order->orderItemDetail->country->emoji }}
                    <br />
                    {{ @$order->orderItemDetail->state->name }}, {{ @$order->orderItemDetail->city->name }}
                    ({{ @$order->orderItemDetail->shipping_pincode }}) <br />
                    <b>Contact: </b>M: {{ @$order->orderItemDetail->shipping_phone }} | E:
                    {{ @$order->orderItemDetail->shipping_email }}
                  </td>

                  <td class="text-left">
                    {{ @$order->orderItemDetail->shipping_name }}<br />
                    {{-- {{ @$order->orderItemDetail->shipping_company }} --}}
                    {{-- {{ isset($order->orderItemDetail->shipping_fax) ? $order->orderItemDetail->shipping_fax : ''
                  }}<br /> --}}
                    {{ @$order->orderItemDetail->shipping_address }}<br />
                    {{ @$order->orderItemDetail->country->name }}
                    {{ @$order->orderItemDetail->country->emoji }}
                    <br />
                    {{ @$order->orderItemDetail->state->name }}, {{ @$order->orderItemDetail->city->name }}
                    ({{ @$order->orderItemDetail->shipping_pincode }}) <br />
                    <b>Contact: </b>M: {{ @$order->orderItemDetail->shipping_phone }} | E:
                    {{ @$order->orderItemDetail->shipping_email }}

                  </td>

                </tr>
              </tbody>
            </table>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="bg-pink">
                <tr>
                  <td class="text-left">Image</td>
                  <td class="text-left">Product Name</td>
                  <td class="text-left">Brand</td>
                  <td class="text-right">Color & Size</td>
                  <td class="text-right">Quantity</td>
                  <td class="text-right">Price</td>
                  <td class="text-right">Total</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-left">
                    <a
                      @isset($order->product)
                    target="_blank"
                    href="{{ route('customer.product-detail', [
                        $order->product->mappedCategories->last()->category_slug,
                        $order->product->slug,
                        $order->product->sku,
                        $order->product->uuid,
                    ]) }}"
                    @endisset>
                      <img width="60px;"
                        src="{{ isset($order->product_image) ? asset('uploads/products') . '/' . $order->product_image : asset('allUsers/icon-thumb.png') }}"
                        alt="{{ $order->name }}" title="{{ $order->name }}" />
                    </a>
                  </td>
                  <td class="text-left">
                    <a
                      @isset($order->product)
                    target="_blank"
                    href="{{ route('customer.product-detail', [
                        $order->product->mappedCategories->last()->category_slug,
                        $order->product->slug,
                        $order->product->sku,
                        $order->product->uuid,
                    ]) }}"
                    @endisset>

                      {{ $order->name }} <br />
                      @isset($order->custom_name)
                        <span class="mt-2"><i>Custom Name: {{ $order->custom_name }}</i></span>
                      @endisset
                    </a>
                    <a href="javascript:void:;" data-bs-toggle="modal" data-bs-target="#giveReviewModal"><i
                        class="fas fa-registered" style="color: #f93434;"></i> <strong>Give Review</strong></a>

                  </td>
                  <td class="text-left">{{ @$order->brand->brand_name }}</td>
                  <td class="text-right">
                    @if (isset($order->color))
                      {{ $order->color . '-' }}
                    @endif
                    @if (isset($order->size))
                      {{ $order->size }}
                    @endif
                  </td>
                  <td class="text-right">{{ $order->quantity }}</td>
                  <td class="text-right">
                    {{ @$order->orderItemDetail->order->currency_code }}
                    {{ number_format($order->price_unit * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
                  </td>
                  <td class="text-right">
                    {{ @$order->orderItemDetail->order->currency_code }}
                    {{ number_format($order->orderItemDetail->grand_total * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5"></td>
                  <td class="text-right"><b>Sub-Total</b>
                  </td>
                  <td class="text-right">{{ @$order->orderItemDetail->order->currency_code }}
                    {{ number_format($order->orderItemDetail->grand_total * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
                  </td>
                </tr>
                <tr>
                  <td colspan="5"></td>
                  <td class="text-right"> <b>Gift</b>
                  </td>
                  <td class="text-right">
                    {{ @$order->orderItemDetail->order->currency_code }}
                    {{ number_format($order->gift_pricing * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
                  </td>
                </tr>
                <tr>
                  <td colspan="5"></td>
                  <td class="text-right"> <b>Flat Shipping Rate</b>
                  </td>
                  <td class="text-right">
                    {{ @$order->orderItemDetail->order->currency_code }}
                    {{ number_format(
                        $order->orderItemDetail->shipping_charge * @$order->orderItemDetail->order->currency_con_ratio,
                        2,
                    ) }}
                  </td>
                </tr>
                <tr>
                  <td colspan="5"></td>
                  <td class="text-right"> <b>Wallet Used</b>
                  </td>
                  <td class="text-right">
                    - {{ @$order->orderItemDetail->order->currency_code }}
                    {{ number_format($order->orderItemDetail->wallet_used * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
                  </td>
                </tr>
                <tr>
                  <td colspan="5"></td>
                  <td class="text-right"> <b>Discount Via Coupon ({{ $order->orderItemDetail->order->coupon_code }})</b>
                  </td>
                  <td class="text-right">
                    - {{ @$order->orderItemDetail->order->currency_code }}
                    {{ number_format($order->coupon_amount * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
                  </td>
                </tr>
                <tr>
                  <td colspan="5"></td>
                  <td class="text-right">
                    <b>Discount Via Referral</b>
                  </td>
                  <td class="text-right">
                    - {{ @$order->orderItemDetail->order->currency_code }}
                    {{ number_format(
                        $order->orderItemDetail->referral_amount * @$order->orderItemDetail->order->currency_con_ratio,
                        2,
                    ) }}
                  </td>
                </tr>
                <tr>
                  <td colspan="5"></td>
                  <td class="text-right"> <b>Discount Via Gift Card
                      ({{ $order->orderItemDetail->order->gift_card }})</b>
                  </td>
                  <td class="text-right">
                    - {{ @$order->orderItemDetail->order->currency_code }}
                    {{ number_format(
                        $order->orderItemDetail->gift_card_amount * @$order->orderItemDetail->order->currency_con_ratio,
                        2,
                    ) }}
                  </td>
                </tr>

                <tr>
                  <td colspan="5"></td>
                  <td class="text-right"><b>Total</b>
                  </td>
                  <td class="text-right">
                    <b>{{ @$order->orderItemDetail->order->currency_code }}
                      {{ number_format(
                          ($order->orderItemDetail->grand_total +
                              $order->orderItemDetail->shipping_charge +
                              $giftTotal -
                              $order->coupon_amount -
                              ($order->orderItemDetail->wallet_used +
                                  $order->orderItemDetail->gift_card_amount +
                                  $order->orderItemDetail->referral_amount)) *
                              @$order->orderItemDetail->order->currency_con_ratio,
                          2,
                      ) }}</b>
                  </td>
                </tr>
              </tfoot>

            </table>
          </div>
          @if ($order->status <= 3)
            <div class="col-12 text-right my-3">
              <a data-href="{{ route('buyer.order-status-update', [$order->id, 6, Auth::guard('buyer')->user()->fullName, 'Customer']) }}"
                href="javascript:;" class="btn btn-outline-secondary cancel-order-btn">Cancel</a>
            </div>
          @endif

          {{-- <h3>Order History</h3>
      @if (isset($order->activities))
      <table class="table table-bordered table-hover">
        <thead class="bg-pink">
          <tr>
            <td class="text-left">Date</td>
            <td class="text-left">Time</td>
            <td class="text-left">Action By</td>
            <td class="text-left">Status</td>
            <td class="text-left">Remark</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($order->activities as $activity)
          <tr>
            <td class="text-left">
              {{ @$activity->created_at->format('d M, Y') }}
            </td>
            <td class="text-left">
              {{ @$activity->created_at->format('h:i A') }}
            </td>
            <td class="text-left">{{ $activity->action_by === 'TFE' ? 'LittleTag' : $activity->action_by }}
              ({{ $activity->type }})
            </td>
            <td class="text-left">{{ $activity->status }}</td>
            <td class="text-left">{{ $activity->remark }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif --}}

        </div>
      </div>
    </div>
  </div>




  <!-- Modal -->
  <div class="modal fade" id="giveReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Product Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="modal-body review-form" id="review-form">
          <input type="hidden" name="product_id" class="product_id" value="{{ $order->product_id }}">
          <input type="hidden" name="product_rating" class="product_rating" value="1">
          <div class="form-group">
            <label for="">Rate this product</label>
            {{-- <i class="fas fa-star" style="color: #e5c006;"> </i> --}}
            <a href="javascript:void(0)">
              <i class="fas fa-star fs-3 rating-star" style="color: #e5c006;" data-star-rate="1"></i>
              <i class="far fa-star fs-3 rating-star" style="color: #e5c006;" data-star-rate="2"></i>
              <i class="far fa-star fs-3 rating-star" style="color: #e5c006;" data-star-rate="3"></i>
              <i class="far fa-star fs-3 rating-star" style="color: #e5c006;" data-star-rate="4"></i>
              <i class="far fa-star fs-3 rating-star" style="color: #e5c006;" data-star-rate="5"></i>
            </a>
          </div>

          <div class="form-group">
            <label for="">Write Something about this product</label>
            <textarea name="product_rating_desc" class="product_rating_desc" cols="30" rows="3"></textarea>
          </div>

          <div class="form-group">
            <label for="">Uploads upto 4 images</label>
            <input name="images[]" class="form-control pt-2" type="file" multiple accept=".gif,.jpg,.jpeg,.png,.webp" required />
          </div>

        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary submit-review-btn" form="review-form">Submit Review</button>
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="{{ asset('allUsers/customer/orders.js') }}"></script>
@endsection
