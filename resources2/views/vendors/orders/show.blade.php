@extends('vendors.header')
@section('vendorContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="row">
              <div class="col-xl-2 col-12">
                <div class="box listing_menu">
                  <div class="box-header">
                    <h4 class="box-title">Manage Orders</h4>
                  </div>
                  <div class="box-body">

                    <div class="inner-user-div4">
                      <ul>
                        <li><a href="{{ route('vendor.products-orders.index', ['new', 0]) }}">New Orders
                            ({{ $newOrdersCount }})</a></li>
                        <li><a href="{{ route('vendor.products-orders.index', ['approved', 1]) }}">Accepted Orders
                            ({{ $acceptedOrdersCount }})</a></li>
                        <li><a href="{{ route('vendor.products-orders.index', ['packed', 2]) }}">Packed Orders
                            ({{ $packedOrdersCount }})</a></li>
                        <li><a href="{{ route('vendor.products-orders.index', ['ready-to-ship', 3]) }}">Ready to Ship
                            Orders
                            ({{ $readyToShipOrdersCount }})</a></li>
                        <li><a href="{{ route('vendor.products-orders.index', ['shipped', 4]) }}">Shipped Orders
                            ({{ $shippedOrdersCount }})</a></li>
                        <li><a href="{{ route('vendor.products-orders.index', ['delivered', 5]) }}">Delivered Orders
                            ({{ $deliveredOrdersCount }})</a></li>
                        <li><a href="{{ route('vendor.products-orders.index', ['cancelled', 6]) }}">Cancelled Orders
                            ({{ $cancelledOrdersCount }})</a></li>
                        <li><a href="{{ route('vendor.products-orders.index', ['return', 7]) }}">Returned Orders
                            ({{ $returnedOrdersCount }})</a></li>
                        <li><a href="{{ route('vendor.products-orders.index', ['pending', 8]) }}">Pending Orders
                            ({{ $pendingOrdersCount }})</a></li>
                      </ul>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xl-10 col-12">
                <div class="box">
                  <div class="box-header with-border pb-0">
                    <h4 class="title mb30 col-sm-12">OID: {{ @$order->orderItemDetail->order_id_counter }}
                    </h4>

                  </div>

                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <td colspan="2" class="text-left"><b>Order Details:</b> </td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="width: 50%;" class="text-left">
                              <b> OID: </b>{{ @$order->orderItemDetail->order_id_counter }}<br />
                              <b> Order Placed Date:</b>
                              {{ @$order->orderItemDetail->created_at->format('d M, Y') }}<br />
                              {{-- <b> Order Value :</b> INR
                            @if (isset($order->orderItemDetail->order->orderItems) && $order->orderItemDetail->order->orderItems->count() === 1)
                              {{ number_format($order->orderItemDetail->grand_total + - ($order->coupon_amount + $order->orderItemDetail->order->wallet) * $order->quantity, 2) }}
                            @elseif(isset($order->orderItemDetail->order->orderItems) && $order->orderItemDetail->order->orderItems->count() > 1)
                              {{ number_format($order->orderItemDetail->grand_total - $order->coupon_amount * $order->quantity, 2) }}
                            @endif --}}
                              {{-- <br /> --}}
                              <b>Payment Method :</b> {{ @$order->orderItemDetail->payment_method }}<br />
                              <b>Order Status :</b> {{ @$order->orderItemDetail->OrderStatus }}<br />
                              <b>Currency Code :</b> {{ @$order->orderItemDetail->order->currency_code }}<br />
                              <b>Currency Con Ratio :</b> {{ @$order->orderItemDetail->order->currency_con_ratio }}<br />
                              <b>Comment :</b> {{ @$order->orderItemDetail->order->comment }}<br />
                              <b>Gift Message :</b> {{ @$order->gifting_message }}<br />
                              {{-- <b>Order Value in {{ @$order->orderItemDetail->order->currency_code }} :</b>
                            @if (isset($order->orderItemDetail->order->orderItems) && $order->orderItemDetail->order->orderItems->count() === 1)
                              {{ number_format(($order->orderItemDetail->grand_total - ($order->coupon_amount + $order->orderItemDetail->order->wallet) * $order->quantity) * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
                            @elseif(isset($order->orderItemDetail->order->orderItems) && $order->orderItemDetail->order->orderItems->count() > 1)
                              {{ number_format(($order->orderItemDetail->grand_total - $order->coupon_amount * $order->quantity) * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
                            @endif --}}
                              {{-- <br /> --}}

                            </td>
                            <td style="width: 50%;" class="text-left">
                              <b> {{ @$order->seller->biz_name }}</b> <br />
                              {{ @$order->seller->biz_company_address }} <br />
                              {{ @$order->seller->biz_company_city }} ({{ @$order->seller->biz_company_zip }}) <br />
                              {{ @$order->seller->state->name }}, {{ @$order->seller->country->name }}
                              {{ @$order->seller->country->emoji }} <br />
                              UACID: CPR000000001
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    {{-- <div class="table-responsive">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <td style="width: 50%; vertical-align: top;" class="text-left">Billing Address</td>
                            <td style="width: 50%; vertical-align: top;" class="text-left"> Shipping Address</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="width: 50%;" class="text-left">
                              {{ @$order->orderItemDetail->shipping_name }}<br />
                              {{ @$order->orderItemDetail->shipping_address }}<br />
                              {{ @$order->orderItemDetail->country->name }}
                              <br />
                              {{ @$order->orderItemDetail->state->name }},
                              {{ @$order->orderItemDetail->city->name }}
                              ({{ @$order->orderItemDetail->shipping_pincode }}) <br />
                              <b>Name:</b> {{ @$order->buyer->fullName }}<br />
                              <b>Contact: </b>M: {{ @$order->buyer->phone }} | E: {{ @$order->buyer->email }}
                            </td>
                            <td style="width: 50%;" class="text-left">
                              {{ @$order->orderItemDetail->shipping_name }}<br />
                              {{ @$order->orderItemDetail->shipping_address }}<br />
                              {{ @$order->orderItemDetail->country->name }}
                              <br />
                              {{ @$order->orderItemDetail->state->name }},
                              {{ @$order->orderItemDetail->city->name }}
                              ({{ @$order->orderItemDetail->shipping_pincode }}) <br />
                              <b>Name:</b> {{ @$order->buyer->fullName }}<br />
                              <b>Contact: </b>M: {{ @$order->buyer->phone }} | E: {{ @$order->buyer->email }}
                            </td>

                          </tr>
                        </tbody>
                      </table>
                    </div> --}}
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <td class="text-left">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Brand</td>
                            <td class="text-right">Specification</td>
                            <td class="text-right">Quantity</td>
                            <td class="text-right">Price</td>
                            <td class="text-right">Total</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-left">
                              <img width="60px;"
                                src="{{ isset($order->product_image) ? asset('uploads/products') . '/' . $order->product_image : asset('allUsers/icon-thumb.png') }}"
                                alt="{{ $order->name }}" title="{{ $order->name }}" />
                            </td>
                            <td class="text-left">
                              {{ $order->name }} <br />
                              @isset($order->custom_name)
                                <span class="mt-2"><i>Custom Name: {{ $order->custom_name }}</i></span>
                              @endisset
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
                            <td class="text-right">INR {{ number_format($order->price_unit, 2) }}</td>
                            <td class="text-right">INR {{ number_format($order->orderItemDetail->grand_total, 2) }}
                            </td>
                          </tr>
                        </tbody>
                        {{-- @if (isset($order->orderItemDetail->order->orderItems) &&
    $order->orderItemDetail->order->orderItems()->where('status', '!=', 6)->count() === 1) --}}
                        @include('ecommerce.orders.order-detail-total-for-single-order')
                        {{-- @elseif(isset($order->orderItemDetail->order->orderItems) && $order->orderItemDetail->order->orderItems->count() > 1)
                          @include('ecommerce.orders.order-detail-total-for-multi-order')
                        @endif --}}
                      </table>
                    </div>

                    <div class="row clearfix">
                      <div class="col plr5 d-none shipping-measurement">
                        <input type="text" placeholder="Length" value="" class="form-control" maxlength="50"
                          name="length" required form="status-change-form" />
                      </div>
                      <div class="col plr5 d-none shipping-measurement">
                        <input type="text" placeholder="Height" value="" class="form-control" maxlength="50"
                          name="height" required form="status-change-form" />
                      </div>
                      <div class="col plr5 d-none shipping-measurement">
                        <input type="text" placeholder="Width" value="" class="form-control" maxlength="50"
                          name="width" required form="status-change-form" />
                      </div>
                      <div class="col plr5 d-none shipping-measurement">
                        <input type="text" placeholder="Weight" value="" class="form-control" maxlength="50"
                          name="weight" required form="status-change-form" />
                      </div>
                      {{-- <div class="col-sm-3 plr5">
                        <div class="form-group">
                          <select class="form-select order-action order-status"
                            data-cart-id="{{ $order->supplier_order_id }}">
                            <option value="" selected disabled> Change Order Status</option>
                            @if ($order->status === 0)
                              <option value="1">Accept Order </option>
                            @endif
                            @if ($order->status === 1)
                              <option value="2">Pack Order </option>
                            @endif
                            @if ($order->status === 2)
                              <option value="3">Ready to Ship Order</option>
                            @endif
                            @if ($order->status === 3)
                              <option value="4">Ship Order</option>
                            @endif
                            @if ($order->status === 4)
                              <option value="5">Delivered Order</option>
                            @endif
                            <option value="6"> Cancel Order</option>
                            @if ($order->status === 5)
                              <option value="7">Return Order</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="col" style="margin-left:10px">
                        <a class="btn btn-primary change-status-btn" href="javascript:;">
                          Update
                        </a>
                      </div> --}}

                    </div>

                    <h3>Order History</h3>
                    {{-- <div class="row">
                      <div class="col-12">
                        <form
                          action="{{ route('admin.product-order-change-status', [$order->supplier_order_id, $order->status]) }}"
                          method="get" id="status-change-form">
                          <div class="input-group mb-3">
                            <span class="input-group-text">Remark</span>
                            <input type="text" class="form-control" name="remark" maxlength="255" required>
                            <button class="btn btn-success remark-btn">Save
                              <i class="fa fa-save"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div> --}}
                    <div class="row">
                      <div class="col-12 comment_wrap__">
                        @foreach ($order->activities as $activity)
                          <div class="comment">
                            <div class="comment__item">
                              <div class="flex">
                                <img src="{{ asset('allUsers/user/images/avatar-img--.jpg') }}"
                                  class="comment__item__avatar">
                                <div class="flex-grow ms-3">
                                  <h3 class="comment__item__title"> By:
                                    {{ $activity->type === 'Admin' ? $activity->action_by : 'Customer' }}
                                    ({{ $activity->type }})
                                  </h3>
                                  <h4 class="comment__item__subtitle">{{ $activity->created_at->format('d M, Y') }}<span
                                      class="comment__item__time">{{ $activity->created_at->format('h:i A') }}</span>
                                    <span class="comment__item__status">({{ $activity->status }})</span>
                                  </h4>
                                </div>
                              </div>
                              <p class="comment__item__content">{{ $activity->remark }}</p>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>


          </div>
        </div>

      </section>
    </div>

    <!-- /.content -->
  </div>
  <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paymentModalLabel">Enter Payment Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('admin.update-po-payment') }}">
            @csrf
            <input type="hidden" name="supplierOrderId" value="{{ $order->orderItemDetail->id }}" />
            <div class="mb-3">
              <label class="form-label">Invoice Number</label>
              <input type="text" maxlength="100" class="form-control" name="payment_invoice_number"
                value="{{ $order->orderItemDetail->payment_invoice_number }}">
            </div>
            <div class="mb-3">
              <label class="form-label">Payment Amount</label>
              <input type="number" min="0" step="0.01" class="form-control" name="payment_amount"
                value="{{ $order->orderItemDetail->payment_amount }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="module" src="{{ asset('allUsers/user/order-detail.js') }}"></script>
@endsection
