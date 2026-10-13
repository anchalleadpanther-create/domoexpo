@extends('user.header')
@section('userContent')
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
                        <li><a href="{{ route('admin.products-orders', ['new', 0]) }}">New Orders
                            ({{ $newOrdersCount }})</a></li>
                        <li><a href="{{ route('admin.products-orders', ['approved', 1]) }}">Accepted Orders
                            ({{ $acceptedOrdersCount }})</a></li>
                        <li><a href="{{ route('admin.products-orders', ['packed', 2]) }}">Packed Orders
                            ({{ $packedOrdersCount }})</a></li>
                        <li><a href="{{ route('admin.products-orders', ['ready-to-ship', 3]) }}">Ready to Ship Orders
                            ({{ $readyToShipOrdersCount }})</a></li>
                        <li><a href="{{ route('admin.products-orders', ['shipped', 4]) }}">Shipped Orders
                            ({{ $shippedOrdersCount }})</a></li>
                        <li><a href="{{ route('admin.products-orders', ['delivered', 5]) }}">Delivered Orders
                            ({{ $deliveredOrdersCount }})</a></li>
                        <li><a href="{{ route('admin.products-orders', ['cancelled', 6]) }}">Cancelled Orders
                            ({{ $cancelledOrdersCount }})</a></li>
                        <li><a href="{{ route('admin.products-orders', ['return', 7]) }}">Returned Orders
                            ({{ $returnedOrdersCount }})</a></li>
                        <li><a href="{{ route('admin.products-orders', ['pending', 8]) }}">Pending Orders
                            ({{ $pendingOrdersCount }})</a></li>
                      </ul>
                    </div>

                  </div>
                </div>
              </div>

              <div class="col-xl-10 col-12">
                <div class="box">
                  <div class="box-header with-border d-flax">
                    <h4 class="box-title" style="width:100%">{{ Str::ucfirst(Request::segment(3)) }} Orders</h4>
                       <a href="#" class="pull-right btn btn-basic btn-basic-color mb10">Download CSV</a></h4>
                       <a href="{{route('admin.generate.blueDartToken')}}" class="pull-right btn btn-basic btn-basic-color me-2 mb10">Generate Blue Dart Token</a>

                  </div>

                  <div class="box-body">
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                      <form class="row mb30 account-filters" method="get"
                        action="{{ route('admin.products-orders', [Request::segment(3), Request::segment(4)]) }}">
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

                      <div class="col-sm-12">
                        <div class="row mb30 account-filters">
                          <div class="col-sm-10">
                            <div class="row">
                              <div class="col-sm-3 plr5">
                                <select class="form-select order-status" name="status">
                                  <option value="" selected disabled> Change Order Status</option>
                                  @if (Request::segment(3) === 'new' || Request::segment(3) === 'pending')
                                    <option value="1">Accept Order </option>
                                  @endif
                                  @if (Request::segment(3) === 'approved')
                                    <option value="2">Pack Order </option>
                                  @endif
                                  @if (Request::segment(3) === 'packed')
                                    <option value="3">Ready to Ship Order</option>
                                  @endif
                                  @if (Request::segment(3) === 'ready-to-ship')
                                    <option value="4">Ship Order</option>
                                  @endif
                                  @if (Request::segment(3) === 'shipped')
                                    <option value="5">Delivered Order</option>
                                  @endif
                                  <option value="6"> Cancel Order</option>
                                  @if (Request::segment(3) === 'delivered')
                                    <option value="7">Return Order</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col plr5 d-none shipping-measurement">
                                <input type="text" placeholder="Length" value="" class="form-control"
                                  maxlength="50" name="length" required form="status-change-form" />
                              </div>
                              <div class="col plr5 d-none shipping-measurement">
                                <input type="text" placeholder="Height" value="" class="form-control"
                                  maxlength="50" name="height" required form="status-change-form" />
                              </div>
                              <div class="col plr5 d-none shipping-measurement">
                                <input type="text" placeholder="Width" value="" class="form-control"
                                  maxlength="50" name="width" required form="status-change-form" />
                              </div>
                              <div class="col plr5 d-none shipping-measurement">
                                <input type="text" placeholder="Weight in KG" value="" class="form-control"
                                  maxlength="50" name="weight" required form="status-change-form" />
                              </div>
                              <div class="col plr5 d-none shipping-measurement">
                                <select class="form-select" name="shipping_api" form="status-change-form">
                                  <option value="">Select</option>
                                  <option value="BlueDart">BlueDart</option>
                                  <!-- <option value="delhivery">Delhivery</option>
                                  <option value="pickrr">Pickrr</option> -->
                                </select>
                              </div>
                              <div class="col-sm-2">
                                <a href="javascript:;" class="btn btn-basic-color btn-sm change-order-status"
                                  style="width:100%">Change Status</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-content clearfix" style="padding: 0; border: 0; padding-top: 10px;">
                      <div class="tab-pane active">
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover wishlist" style="border:0">
                            <thead>
                              <tr style="background:#eee">
                                <td class="text-left"> <input type="checkbox" id="md_checkbox_20"
                                    class="filled-in chk-col-primary" data-class=".order-checkboxes"
                                    onchange="checkAll(this)">
                                  <label for="md_checkbox_20"></label>
                                </td>
                                <td class="text-left">IDS</td>
                                <td class="text-center">Image</td>
                                <td class="text-left">Product</td>
                                <td class="text-left">QTY</td>
                                <td class="text-left">Pricing</td>
                                <td class="text-left">Sold By</td>
                                <td class="text-left">Buyer</td>
                                <td class="text-left" style="width:15%;">Action</td>
                              </tr>
                            </thead>
                            <tbody>
                              <form method="post" class="change-order-status-form" id="status-change-form"
                                action="{{ route('admin.bulk-order-status-change') }}">
                                @csrf
                                <input type="hidden" name="order_status" class="hidden-order-status" value=""
                                  required>
                                <input type="hidden" name="action_by" value="{{ auth()->user()->name }}" required>
                                <input type="hidden" name="action_type" value="{{ 'Admin' }}" required>
                                <x-admin.orders.order-table :orders="$orders" />
                              </form>

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
