@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Brand Report</h4>
              </div>

              <div class="box-body">

                <span class="admin-filter mt-3" style="display:none">Filter Tab</span>
                <div class=" mb30 account-filters">
                  <form method="get" action="{{ route('admin.brands-report') }}">
                    <input type="hidden" name="date_from" value="{{ Request('date_from') }}" />
                    <input type="hidden" name="date_till" value="{{ Request('date_till') }}" />
                    <div class="row">
                      <div class="col-md-2">
                        <label class="form-label">Search</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search via Name"
                            aria-describedby="basic-addon2" name="search" value="{{ request()->get('search') }}">
                        </div>
                      </div>
                      <div class="col-md-3 mb-2 mb-md-0">
                        <label class="form-label fw-500 fs-14">Order Date From/Till</label>
                        <div id="reportrange"
                          style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;border-radius: 5px; width: 100%">
                          <i class="fa fa-calendar"></i>&nbsp;
                          <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                      </div>
                      {{-- <div class="col-sm-12 col-md">
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
                      <div class="col-sm-12 col-md">
                        <div class="form-group">
                          <label class="form-label">Order State</label>
                          <select class="single order-state" name="state" onchange="getCities(this)"
                            data-class=".order-city">
                            <option value=""> Select </option>
                            @foreach (getStates(Request('country')) as $state)
                              <option @if (Request('state') == $state->id) selected @endif value="{{ $state->id }}">
                                {{ $state->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md">
                        <div class="form-group">
                          <label class="form-label">Order City</label>
                          <select class="single order-city" name="city">
                            <option value=""> Select </option>
                            @foreach (getCities(Request('state')) as $city)
                              <option @if (Request('city') == $city->id) selected @endif value="{{ $city->id }}">
                                {{ $city->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div> --}}
                    </div>
                    <button class="waves-effect waves-light btn btn-rounded btn-primary-light">Apply <i
                        class="fa fa-filter"></i></button>
                    <a href="{{ route('admin.brands-report') }}"
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
                        <th style="width:10%">Brand Name</th>

                        <th>Brand Featured</th>

                        <th>Orders</th>

                        <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                          colspan="1" aria-label="KYC">Total Sales</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($brands as $key => $brand)
                        <tr role="row" class="odd">
                          <th>
                            <a
                              href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'supplier' => $brand->seller->id]) }}">
                              {{ ucfirst($brand->seller->biz_name) }}
                            </a>
                          </th>
                          <td>
                            {{ $brand->seller->featured ? 'Yes' : 'No' }}
                          </td>
                          <td>
                            {{ $brand->ordersCount }}
                          </td>
                          <td>
                            <span class="badge badge-success-light w-150">
                              INR {{ number_format($brand->ordersTotalSum, 2) }}
                            </span>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                {{ $brands->links() }}

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
