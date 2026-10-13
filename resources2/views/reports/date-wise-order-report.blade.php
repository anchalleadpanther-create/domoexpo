@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">

              <div class="box-header">
                <h4 class="box-title">Date Wise Order Report</h4>
              </div>

              <div class="box-body">
                <span class="admin-filter mt-3" style="display:none">Filter Tab</span>

                <div class=" mb30 account-filters">
                  <form method="get" action="{{ route('admin.date-wise-order-report') }}">
                    <input type="hidden" name="date_from" value="{{ Request('date_from') }}" />
                    <input type="hidden" name="date_till" value="{{ Request('date_till') }}" />
                    <div class="row">
                      <div class="col-sm-12 col-md-auto mb-2">
                        <label class="form-label fw-500 fs-14">Order Date From/Till</label>
                        <div id="reportrange"
                          style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;border-radius: 5px; width: 100%">
                          <i class="fa fa-calendar"></i>&nbsp;
                          <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                      </div>
                    </div>
                    <button class="waves-effect waves-light btn btn-rounded btn-primary-light">Apply <i
                        class="fa fa-filter"></i></button>
                    <a href="{{ route('admin.date-wise-order-report') }}"
                      class="waves-effect waves-light btn btn-rounded btn-info-light">Reset <i
                        class="fa fa-refresh"></i></a>
                    <button type="submit" name="report_type" value="excel"
                      class="waves-effect waves-light btn btn-rounded btn-success-light">Download
                      Report <i class="fa fa-download"></i></button>
                  </form>
                </div>

                <div id="table-scroll" class="table-scroll">
                  <table id="main-table" class="main-table">
                    <thead class="bg-success-light">
                      <tr>
                        <th style="width:10%">Date</th>
                        <th>New Orders</th>
                        <th>New Orders Value</th>
                        <th>Returning Orders</th>
                        <th>Returning Orders Value</th>
                        <th width="10%">Total Order Value</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $key => $order)
                        <tr role="row">
                          <th>
                            {{ $order->date->format('d M, Y') }}
                          </th>
                          <td>
                            {{ $order->new_order }}
                          </td>
                          <td>
                            INR {{ number_format($order->new_order_value, 2) }}
                          </td>
                          <td>
                            {{ $order->returning_order }}
                          </td>
                          <td>
                            INR {{ number_format($order->returning_order_value, 2) }}
                          </td>
                          <td>
                            <span class="badge badge-success-light w-150">
                              INR {{ number_format($order->new_order_value + $order->returning_order_value, 2) }}
                            </span>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row mx-2">
                {{ $orders->links() }}
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('allUsers/user/report.js') }}"></script>
@endsection
