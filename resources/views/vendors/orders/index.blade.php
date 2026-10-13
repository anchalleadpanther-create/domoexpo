@extends('vendors.header')
@section('vendorContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->
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
                        <li><a href="{{ route('vendor.products-orders.index', ['ready-to-ship', 3]) }}">Ready to Ship Orders
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
                  <div class="box-header with-border">
                    <h4 class="box-title" style="width:100%">{{ Str::ucfirst(Request::segment(3)) }} Orders</h4>

                  </div>

                  <div class="box-body">
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                      <form class="row mb30 account-filters" method="get"
                        action="{{ route('vendor.products-orders.index', [Request::segment(3), Request::segment(4)]) }}">
                        <div class="col-sm-10">
                          <div class="row">
                            <div class="col-sm-5 plr5">
                              <div class="form-group">
                                <input class="form-control  " id="formFileSm" type="text"
                                  placeholder="Search by Order ID, Customer Name, Email, Phone," name="search"
                                  value="{{ Request('search') }}">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-2 plr5">
                          <button class="btn btn-basic-color btn-block" style="width:100%">Search</button>
                        </div>
                      </form>

                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-content clearfix" style="padding: 0; border: 0; padding-top: 10px;">
                      <div class="tab-pane active">
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover wishlist" style="border:0">
                            <thead>
                              <tr style="background:#eee">
                                <td class="text-left">IDS</td>
                                <td class="text-center">Image</td>
                                <td class="text-left">Product</td>
                                <td class="text-left">QTY</td>
                                <td class="text-left">Pricing</td>
                                <td class="text-left">Sold By</td>
                                {{-- <td class="text-left">Buyer</td> --}}
                                <td class="text-left" style="width:15%;">Action</td>
                              </tr>
                            </thead>
                            <tbody>
                              <x-vendors.orders.order-table :orders="$orders" />
                            </tbody>
                          </table>
                        </div>
                        {{ $orders->links() }}
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
  <input type="hidden" value="{{ Request::segment(3) }}" class="order-type" />
@endsection
