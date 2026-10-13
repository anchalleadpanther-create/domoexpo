@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">
              <div class="box-header">
                <h4 class="box-title">UTM Report</h4>
              </div>
              <div class="box-body">

                <div class="row">

                  <span class="admin-filter" style="display:none">Filter Tab</span>
                  <div class="row mb30 account-filters">
                    <form method="get" action="{{ route('admin.utm-report') }}">
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
                        <div class="col-sm-12 col-md-3 mb-3">
                          <label class="form-label fw-500">Search</label>
                          <input type="text" class="form-control" placeholder="Search via UTM Source & Medium"
                            aria-label="Search via Coupon Name" aria-describedby="basic-addon2" name="search"
                            value="{{ request()->get('search') }}">
                        </div>
                      </div>
                      <button class="waves-effect waves-light btn btn-rounded btn-primary-light">Apply <i
                          class="fa fa-filter"></i></button>
                      <a href="{{ route('admin.utm-report') }}"
                        class="waves-effect waves-light btn btn-rounded btn-info-light">Reset <i
                          class="fa fa-refresh"></i></a>
                      <button type="submit" name="report_type" value="excel"
                        class="waves-effect waves-light btn btn-rounded btn-success-light">Download
                        Report <i class="fa fa-download"></i></button>
                  </div>
                  </form>
                </div>

                <div id="table-scroll" class="table-scroll">
                  <table id="main-table" class="main-table">
                    <thead class="bg-success-light">
                      <tr role="row">
                        <th style="width:10%">
                          UTM Source
                        </th>

                        <th>
                          UTM Medium
                        </th>

                        <th>
                          UTM Campaign
                        </th>

                        <th>
                          UTM Term
                        </th>

                        <th>
                          UTM Content
                        </th>

                        <th>
                          UTM Order Detail
                        </th>

                        <th width="10%">UTM Order Value</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $key => $order)
                        <tr>
                          <th>
                            {{ $order?->utm->utm_source }}
                          </th>
                          <td>
                            {{ $order?->utm->utm_medium }}
                          </td>
                          <td>
                            {{ $order?->utm->utm_campaign }}
                          </td>
                          <td>
                            {{ $order?->utm->utm_term }}
                          </td>
                          <td>
                            {{ $order?->utm->utm_content }}
                          </td>
                          <td>
                            <span>Order ID: {{ $order->id }}</span><br />
                            <span>Customer Name: {{ $order->shipping_name }}</span><br />
                            <span>Customer Email: {{ $order->shipping_email }}</span><br />
                          </td>
                          <td>
                            <span class="badge badge-success-light w-150">
                              INR {{ number_format($order->grand_total, 2) }}
                            </span>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                {{ $orders->links() }}
              </div>
            </div>

          </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('allUsers/user/report.js') }}"></script>
@endsection
