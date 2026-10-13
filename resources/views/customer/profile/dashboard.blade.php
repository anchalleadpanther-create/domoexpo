@extends('customer.partials.header')
@section('customerContent')
  <!--Body Container-->
  <div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
      <div class="collection-hero">
        <div class="collection-hero__image"></div>
        <div class="collection-hero__title-wrapper container">
          <div class="breadcrumbs text-uppercase mt-0 mt-lg-0">
            <span class="fw-bold">My Account</span>
          </div>
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
              <p>Need assistance ? Contact our customer service on:</p>
              <p><a href="tel:8447722222" target="_blank">+91- 8447722222</a>
              </p>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="d-single-info">
              <p>Email us at </p>
              <p><a href="mailto:care@littletags.com" target="_blank">care@littletags.com </a>
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

      <div class="row mb-4 mb-lg-5 pb-lg-5">
        @include('customer.profile.sidebar')
        <div class="col-xl-9 col-lg-10 col-md-12 px-0 px-md-2">
          <!-- Tab panes -->
          <div class="tab-content dashboard-content">
            <!-- Dashboard -->
            <div id="dashboard" class="tab-pane fade @empty(Request::segment(3)) active show @endempty">
              <h3>Dashboard </h3>
              <p>From your account dashboard. you can easily check &amp; view your
                <a class="text-decoration-underline" href="javascript:;"
                  onclick="document.querySelector('.orders-tab-btn').click()">recent orders</a>, manage your
                <a class="text-decoration-underline" href="javascript:;"
                  onclick="document.querySelector('.address-tab-btn').click()">shipping and billing addresses</a> and
                <a class="text-decoration-underline" href="javascript:;"
                  onclick="document.querySelector('.accounts-tab-btn').click()">edit your password and account details.</a>
              </p>
              <div class="row user-profile mt-4">
                <div class="col-12 col-lg-6">
                  <div class="profile-img">
                    <div class="img"><img src="{{ asset('allUsers/woman-png.png') }}"
                        alt="{{ Auth::guard('buyer')->user()->fullName }}" width="75" />
                    </div>
                    <div class="detail ms-3 w-100">
                      <h5 class="mb-1">{{ Auth::guard('buyer')->user()->fullName }}</h5>
                      <p>Joined On: <strong>{{ Auth::guard('buyer')->user()->created_at->format('d M, Y') }}</strong>
                      </p>
                      <p>Membership ID:
                        <strong>{{ implode('-', str_split(Auth::guard('buyer')->user()->membership_id, 4)) }}</strong>
                      </p>
                      <p>Expires On:
                        <strong>{{ Auth::guard('buyer')->user()->membership_expiry_date->format('m/y') }}</strong>
                      </p>
                      <p>Wallet: ₹ <strong>{{ number_format(Auth::guard('buyer')->user()->wallet, 2) }}</strong></p>
                    </div>
                    {{-- <div class="lbl">FEI User</div> --}}
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <ul class="profile-order mt-3 mt-lg-0">
                    <li>
                      <h3 class="mb-1">{{ $allOrders }}</h3>
                      All Orders
                    </li>
                    <li>
                      <h3 class="mb-1">{{ $awaitingShipmentOrders }}</h3>
                      Awaiting Shipment
                    </li>
                    <li>
                      <h3 class="mb-1">{{ $deliveredOrders }}</h3>
                      Awaiting Delivery
                    </li>
                    <li>
                      <h3 class="mb-1">{{ $cancelledOrders }}</h3>
                      Cancelled Deliveries
                    </li>
                  </ul>
                </div>
              </div>
              <div class="table-responsive order-table mt-4">
                <table class="table table-bordered table-hover align-middle text-center mb-0">
                  <thead class="alt-font">
                    <tr>
                      <th>Order</th>
                      <th>Product</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Total</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($orders as $key => $order)
                      @if ($key < 5)
                        <tr>
                          <td>{{ @$order->orderItemDetail->order_id_counter }}</td>
                          <td>
                            <a
                              @isset($order->product)
                              target="_blank"
                              href="{{ route('customer.product-detail', [$order->product->mappedCategories->last()->category_slug, $order->product->slug, $order->product->sku, $order->product->uuid]) }}"
                              @endisset>
                              {{ $order->name }}
                            </a>
                          </td>
                          <td>
                            {{ isset($order->orderItemDetail->created_at) ? $order->orderItemDetail->created_at->format('d M, Y') : '' }}
                          </td>
                          <td class="text-success">{{ @$order->OrderStatus }}</td>
                          <td> {{ @$order->orderItemDetail->order->currency_code }}
                            {{ number_format(@$order->orderItemDetail->grand_total * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
                            for
                            {{ $order->quantity }}
                            item </td>
                          <td><a class="link-underline view"
                              href="{{ route('buyer.order-detail', $order->supplier_order_id) }}">Track your order</a>
                          </td>
                        </tr>
                      @endif
                    @empty
                      <tr>
                        <td colspan="6">
                          <p class="h5 my-2">No orders found! <i class="icon an an-times-cil"></i></p>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
            <!-- End Dashboard -->

            <!-- Orders -->
            @include('customer.profile.orders')
            <!-- End Orders -->

            <!-- Orders tracking -->
            @include('customer.profile.order-tracking')
            <!-- End Orders tracking -->

            <!-- Address -->
            @include('customer.profile.addresses')
            <!-- End Address -->

            <!-- Account Details -->
            @include('customer.profile.account-details')
            <!-- End Account Details -->
            <!-- my-card Details -->
            @include('customer.profile.my-card')
            <!-- End my-card Details -->
            <!-- e-wallet Details -->
            @include('customer.profile.e-wallet')
            <!-- End e-wallet Details -->

            <!-- Wishlist -->
            @include('customer.profile.wishlist')
            <!-- End Wishlist -->

            <!-- Referral -->
            @include('customer.profile.referral')
            <!-- End Referral -->

            <!-- Calendar -->
            @include('customer.profile.manage-calendar')
            <!-- End Calendar -->

            <!-- Calendar -->
            @include('customer.profile.expert-details')
            <!-- End Calendar -->

            <!-- Booked slots -->
            @include('customer.profile.booked-slots')
            <!-- End Booked slots -->

            <!-- Manage Packages -->
            @include('customer.profile.manage-packages')
            <!-- End Manage Packages -->
          </div>
          <!-- End Tab panes -->
        </div>
      </div>
      <!--End Main Content-->
    </div>
    <!--End Container-->
  </div>
  <!--End Body Container-->
  <script type="module" src="{{ asset('allUsers/customer/my-calendar.js') }}"></script>
  <script type="module" src="{{ asset('allUsers/customer/my-package.js') }}"></script>
@endsection
