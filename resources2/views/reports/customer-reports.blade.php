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
                    <form method="get" action="{{ route('admin.customers-report') }}">
                      <div class="col-sm-12 col-md-3 mb-3">
                        <label class="form-label fw-500">Search</label>
                        <input type="text" class="form-control" placeholder="Search via Name, Email & Phone Number"
                          aria-label="Search via Name, Email & Phone Number" aria-describedby="basic-addon2"
                          name="search" value="{{ request()->get('search') }}">
                      </div>
                      <button class="waves-effect waves-light btn btn-rounded btn-primary-light">Apply <i
                          class="fa fa-filter"></i></button>
                      <a href="{{ route('admin.customers-report') }}"
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
                      <tr>
                        <th scope="col" style="width:10%">Customer Name</th>
                        <th scope="col">Customer Email</th>
                        <th scope="col">Customer Phone</th>
                        <th scope="col">Orders</th>
                        <th width="10%" scope="col">Total Sales</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($buyers as $key => $buyer)
                        <tr>
                          <th>
                            <a
                              href="{{ route('admin.orders-report', ['date_from' => '2022-09-05', 'date_till' => \Carbon\Carbon::today()->format('Y-m-d'), 'customer' => $buyer->id]) }}">
                              <span style="margin-right:20px">{{ ++$key }}</span>
                              {{ $buyer->fullName }}
                            </a>
                          </th>
                          <td>{{ $buyer->email }}</td>
                          <td> {{ $buyer->phone }} </td>
                          <td> {{ $buyer->ordersCount }}</td>
                          <td><span class="badge badge-success-light w-150">INR
                              {{ number_format($buyer->ordersTotalSum, 2) }}</span></td>

                        </tr>
                      @endforeach
                    </tbody>

                  </table>
                </div>
                {{ $buyers->links() }}
              </div>
            </div>

          </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('allUsers/user/report.js') }}"></script>
@endsection
