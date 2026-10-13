@extends('user.header')
@section('userContent')
  <style>
    @media only screen and (max-width:500px) {
      .admin-filter {
        display: block !important;
        background: #1dbfc1 !important;
        color: #fff;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
        font-size: 17px;
        margin-bottom: 20px;
      }

      .account-filters {
        display: none;
      }

      .account-filters.open {
        display: block;
      }

      .account-filters .col.plr5,
      .account-filters .col,
      .account-filters .col.plr5 a,
      .account-filters .col.plr5 button {
        width: 100%;
        flex: 100%;
      }

      .account-filters .col.plr5 a,
      .account-filters .col.plr5 button {
        margin-bottom: 10px
      }
    }
  </style>
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="row">

              <div class="col-xl-12 col-12">
                <div class="box">
                  <div class="box-header">
                    <h4 class="box-title" style="width:100%">Order Report
                    </h4>

                  </div>

                  <div class="box-body">
                    <div class="clearfix"></div>
                    <div class="col-sm-12">

                      <span class="admin-filter" style="display:none">Filter Tab</span>

                      <div class="row mb30 account-filters">
                        <form class="col-sm-12" method="get" action="{{ route('admin.order-report') }}">
                          <input type="hidden" name="date_from" value="{{ Request('date_from') }}" />
                          <input type="hidden" name="date_till" value="{{ Request('date_till') }}" />
                          <div class="row">
                            <div class="col-sm-12 col-md-auto mb-2 mb-md-0">
                              <label class="form-label fw-500 fs-14">Order Date From/Till</label>
                              <div id="reportrange"
                                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;border-radius: 5px; width: 100%">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                              </div>
                            </div>
                            <div class="col plr5 d-none">
                              <div class="form-group">
                                <label class="form-label">Category</label>
                                <select class="custom-select" name="category">
                                  <option></option>
                                  @foreach ($categories as $category)
                                    <option @selected(Request('category') == $category->id) value="{{ $category->id }}">
                                      {{ $category->category_name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col plr5">
                              <div class="form-group">
                                <label class="form-label">Order Status</label>
                                <select class="custom-select" name="status">
                                  <option></option>
                                  <option @selected(Request('status') === '0') value="0">New Order</option>
                                  <option @selected(Request('status') === '1') value="1">Accept Order </option>
                                  <option @selected(Request('status') === '2') value="2">Pack Order </option>
                                  <option @selected(Request('status') === '3') value="3">Ready to Ship Order </option>
                                  <option @selected(Request('status') === '4') value="4">Ship Order</option>
                                  <option @selected(Request('status') === '5') value="5">Delivered Order</option>
                                  <option @selected(Request('status') === '6') value="6"> Cancel Order</option>
                                  <option @selected(Request('status') === '7') value="7">Return Order</option>
                                </select>
                              </div>
                            </div>
                            <div class="col plr5">
                              <div class="form-group">
                                <label class="form-label">Designer</label>
                                <select class="custom-select" name="supplier">
                                  <option></option>
                                  @foreach ($suppliers as $supplier)
                                    <option @selected(Request('supplier') == $supplier->id) value="{{ $supplier->id }}">
                                      {{ $supplier->biz_name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col plr5">
                              <div class="form-group">
                                <label class="form-label">Customer</label>
                                <select class="custom-select" name="customer">
                                  <option></option>
                                  @foreach ($customers as $customer)
                                    <option @selected(Request('customer') == $customer->id) value="{{ $customer->id }}">
                                      {{ $customer->fullName }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label class="form-label">Order Country</label>
                                <select class="single order-country" data-placeholder="Search countries" name="country"
                                  onchange="getStates(this)" data-class=".order-state">
                                  <option value="">Select</option>
                                  @foreach (getCountries() as $country)
                                    <option @if (Request('country') == $country->id) selected @endif value="{{ $country->id }}">
                                      {{ $country->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label class="form-label">Order State</label>
                                <select class="single order-state" name="state" onchange="getCities(this)"
                                  data-class=".order-city">
                                  <option value=""> Select </option>
                                  @foreach (getStates(Request('country')) as $state)
                                    <option @if (Request('state') == $state->id) selected @endif
                                      value="{{ $state->id }}">
                                      {{ $state->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label class="form-label">Order City</label>
                                <select class="single order-city" name="city">
                                  <option value=""> Select </option>
                                  @foreach (getCities(Request('state')) as $city)
                                    <option @if (Request('city') == $city->id) selected @endif
                                      value="{{ $city->id }}">
                                      {{ $city->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label class="form-label">Product</label>
                                <select class="single order-city" name="sku">
                                  <option value=""> Select </option>
                                  @foreach ($products as $product)
                                    <option @if (Request('sku') === $product->sku) selected @endif
                                      value="{{ $product->sku }}">
                                      {{ $product->name }} [{{ $product->sku }}]</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label class="form-label">Coupon</label>
                                <select class="single order-city" name="coupon">
                                  <option value=""> Select </option>
                                  @foreach ($coupons as $coupon)
                                    <option @if (Request('coupon') === $coupon->coupon_code) selected @endif
                                      value="{{ $coupon->coupon_code }}">
                                      {{ $coupon->coupon_code }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col plr5 my-auto">
                              <button class="waves-effect waves-light btn btn-rounded btn-primary-light">Apply <i
                                  class="fa fa-filter"></i></button>
                              <a href="{{ route('admin.order-report') }}"
                                class="waves-effect waves-light btn btn-rounded btn-info-light">Reset <i
                                  class="fa fa-refresh"></i></a>
                              <button type="submit" name="report_type" value="excel"
                                class="waves-effect waves-light btn btn-rounded btn-success-light">Download
                                Report <i class="fa fa-download"></i></button>
                            </div>
                          </div>
                        </form>

                      </div>

                    </div>
                    <div class="tab-content clearfix" style="padding: 0; border: 0; padding-top: 10px;">
                      <div class="tab-pane active">
                        <div class="row">
                          <div class="col-12 mb-30">
                            <span class="text-primary fw-700 fs-16">Total Orders Quantity: {{ $totalQuantity }}</span>
                            <br />
                            <span class="text-primary fw-700 fs-16">Total Orders Grand Total: INR
                              {{ number_format($grandTotal, 2) }}</span>
                          </div>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover wishlist" style="border:0">
                            <thead class="bg-success-light fw-700">
                              <tr>
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
                                <td class="text-left">Action</td>
                              </tr>
                            </thead>
                            <tbody>
                              <x-admin.orders.order-table :orders="$orders" />
                            </tbody>
                          </table>
                        </div>
                      </div>
                      {{ $orders->withQueryString()->links() }}
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
  <script type="text/javascript" src="{{ asset('allUsers/user/report.js') }}"></script>
@endsection
