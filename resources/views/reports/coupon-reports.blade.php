@extends('user.header')
@section('userContent')

  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">
              <div class="box-header">
                <h4 class="box-title">Customers Report</h4>
              </div>
              <div class="box-body">

                <div class="row">

                  <span class="admin-filter" style="display:none">Filter Tab</span>
                  <div class="row mb30 account-filters">
                    <form method="get" action="{{ route('admin.coupons-report') }}">
                      <div class="col-sm-12 col-md-3 mb-3">
                        <label class="form-label fw-500">Search</label>
                        <input type="text" class="form-control" placeholder="Search via Coupon Name"
                          aria-label="Search via Coupon Name" aria-describedby="basic-addon2" name="search"
                          value="{{ request()->get('search') }}">
                      </div>
                      <button class="waves-effect waves-light btn btn-rounded btn-primary-light">Apply <i
                          class="fa fa-filter"></i></button>
                      <a href="{{ route('admin.coupons-report') }}"
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
                        <th style="width:10%">Coupon Name</th>
                        <th>Coupon Total Uses</th>
                        <th>Coupon Validity</th>
                        <th width="10%">Coupon Total Discount</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($coupons as $key => $coupon)
                        <tr>
                          <th>
                            <a
                              href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'coupon' => $coupon->code]) }}">
                              {{ $coupon->name }}
                            </a>
                          </th>
                          <td>
                            {{ $coupon->totalUses }}
                          </td>
                          <td>
                            {{ $coupon->date_from->format('d M, Y') }} -
                            {{ $coupon->date_till->format('d M, Y') }}
                          </td>
                          <td>
                            <span class="badge badge-success-light w-150">
                              INR {{ number_format($coupon->totalDiscounts, 2) }}
                            </span>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                {{ $coupons->links() }}
              </div>
            </div>

          </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('allUsers/user/report.js') }}"></script>
@endsection
