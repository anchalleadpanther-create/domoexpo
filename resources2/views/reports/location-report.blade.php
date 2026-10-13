@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">

              <div class="box-header">
                <h4 class="box-title">Location Report</h4>
              </div>

              <div class="box-body">
                <span class="admin-filter mt-3" style="display:none">Filter Tab</span>

                <div class=" mb30 account-filters">
                  <form method="get" action="{{ route('admin.location-report') }}">
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
                    <a href="{{ route('admin.location-report') }}"
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
                        <th style="width:10%">Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Total Customers</th>
                        <th>Total Orders</th>
                        <th width="10%">Total Sales</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($locations as $key => $location)
                        <tr role="row">
                          <th>
                            <a
                              href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'country' => $location?->state?->country?->id]) }}">
                              {{ $location?->state?->country?->name }}
                            </a>
                          </th>
                          <td>
                            <a
                              href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'state' => $location?->state?->id]) }}">
                              {{ $location?->state?->name }}
                            </a>
                          </td>
                          <td>
                            <a
                              href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'city' => $location->id]) }}">
                              {{ $location->name }}
                            </a>
                          </td>
                          <td>
                            {{ $location->customersCount }}
                          </td>
                          <td>
                            {{ $location->ordersCount }}
                          </td>
                          <td>
                            <span class="badge badge-success-light w-150">
                              INR {{ number_format($location->ordersAmountTotal, 2) }}
                            </span>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row mx-2">
                {{ $locations->links() }}
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
