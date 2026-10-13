@extends('user.header')
@section('userContent')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xl-8 col-12 dashboard-wrap">
            <div class="row">
              <form class="row" method="get" action="{{ route('admin.dashboard.index') }}">
                <input type="hidden" name="date_from" value="{{ Request('date_from') }}" />
                <input type="hidden" name="date_till" value="{{ Request('date_till') }}" />
                <div class="col-auto plr5 my-auto">
                  <h5> Today’s Business</h5>
                </div>
                <div class="col-sm-12 col-md-auto mb-2">
                  <div id="reportrange"
                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;border-radius: 5px; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                  </div>
                </div>
                <div class="col plr5 mb-15 mb-md-0">
                  <button class="waves-effect waves-light btn btn-sm rounded-pill btn-primary-light">Apply<i
                      class="fa fa-filter"></i></button>
                  <a href="{{ route('admin.dashboard.index') }}"
                    class="waves-effect waves-light btn btn-sm rounded-pill btn-info-light">Reset <i
                      class="fa fa-refresh"></i></a>
                </div>
                <div class="col-12 mx-10">
                  <div class="row">
                    <div class="col">
                      <div class="card">
                        <div class="card-header px-10 px-md-20 py-10">
                          <h4 class="card-title  fs-16">Total Sessions
                            <p class="subtitle fs-14 mb-0">{{ $stats['totalSessions'] }}</p>
                          </h4>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card">
                        <div class="card-header px-10 px-md-20 py-10">
                          <h4 class="card-title fs-16">Unique Sessions
                            <p class="subtitle fs-14 mb-0">{{ $stats['totalUniqueSessions'] }}</p>
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <div class="col-xl-3 col-md-6 col-6">
                <a
                  href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'status' => 0]) }}">
                  <div class="box">
                    <div class="box-body text-center" style="background-color: #C6909F;">
                      <p class="text-white mt-15 mb-5">New Order</p>
                      <h2 class="mt-0 text-white">{{ $stats['todayOrders'] }}</h2>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-3 col-md-6 col-6">
                <a
                  href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'status' => 1]) }}">
                  <div class="box">
                    <div class="box-body text-center" style="background-color: #C6909F;">
                      <p class="text-white mt-15 mb-5">Approved Orders</p>
                      <h2 class="mt-0 text-white">{{ $stats['todayAcceptedOrders'] }}</h2>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-3 col-md-6 col-6">
                <a
                  href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'status' => 6]) }}">
                  <div class="box">
                    <div class="box-body text-center" style="background-color: #C6909F;">
                      <p class="text-white mt-15 mb-5">Cancelled Orders</p>
                      <h2 class="mt-0 text-white">{{ $stats['todayCancelledOrders'] }}</h2>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-3 col-md-6 col-6">
                <a
                  href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'status' => 5]) }}">
                  <div class="box">
                    <div class="box-body text-center" style="background-color: #C6909F;">
                      <p class="text-white mt-15 mb-5">Delivered Orders</p>
                      <h2 class="mt-0 text-white">{{ $stats['todayDeliveredOrders'] }}</h2>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-3 col-md-6 col-6">
                <div class="box">
                  <div class="box-body text-center" style="background-color: #C6909F;">
                    <p class="text-white mt-15 mb-5">Total Sales</p>
                    <h2 class="mt-0 text-white">{{ number_format($stats['todayOrdersGrandTotal'], 2) }}</h2>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 col-6">
                <div class="box">
                  <div class="box-body text-center" style="background-color: #C6909F;">
                    <p class="text-white mt-15 mb-5">Refund (Value)</p>
                    <h2 class="mt-0 text-white">{{ number_format($stats['todayRefundOrdersValues'], 2) }}</h2>
                  </div>
                </div>
              </div>

            </div>
            {{-- <div class="row">
              <div class="col-sm-12">
                <p class="notification_text">Website Under beta testing mode, Please to not make any real payment.<span
                    class="pull-right"><i class="fa fa-close"></i></span></p>
              </div>
            </div> --}}

            <div class="row">
              <h5>Store Overview</h5>
              <div class="col-xl-3 col-md-6 col-6">
                <a href="{{ route('admin.products.index', ['single-with-variant']) }}">
                  <div class="box">
                    <div class="box-body text-center" style="background-color: #737174;">
                      <p class="text-white mt-15 mb-5">Products</p>
                      <h2 class="mt-0 text-white">{{ $stats['products'] }}</h2>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-3 col-md-6 col-6">
                <a href="{{ route('admin.brand.index') }}">
                  <div class="box">
                    <div class="box-body text-center" style="background-color: #737174;">
                      <p class="text-white mt-15 mb-5">Designers</p>
                      <h2 class="mt-0 text-white">{{ $stats['suppliers'] }}</h2>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-3 col-md-6 col-6">
                <a href="{{ route('admin.products-orders', ['new', 0]) }}">
                  <div class="box">
                    <div class="box-body text-center" style="background-color: #737174;">
                      <p class="text-white mt-15 mb-5">New Orders</p>
                      <h2 class="mt-0 text-white">{{ $stats['allOrders'] }}</h2>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-xl-3 col-md-6 col-6">
                <a href="{{ route('admin.products-orders', ['delivered', 5]) }}">
                  <div class="box">
                    <div class="box-body text-center" style="background-color: #737174;">
                      <p class="text-white mt-15 mb-5">Delivered Orders</p>
                      <h2 class="mt-0 text-white">{{ $stats['allDeliveredOrders'] }}</h2>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-3 col-md-6 col-6">
                <a href="{{ route('admin.products-orders', ['cancelled', 6]) }}">
                  <div class="box">
                    <div class="box-body text-center" style="background-color: #737174;">
                      <p class="text-white mt-15 mb-5">Cancelled Orders</p>
                      <h2 class="mt-0 text-white">{{ $stats['allCancelledOrders'] }}</h2>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-3 col-md-6 col-6">
                <a href="{{ route('admin.buyers.index', ['new', 0]) }}">
                  <div class="box">
                    <div class="box-body text-center" style="background-color: #737174;">
                      <p class="text-white mt-15 mb-5">Total Customers</p>
                      <h2 class="mt-0 text-white">{{ $stats['allCustomers'] }}</h2>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-xl-3 col-md-6 col-6">
                <div class="box">
                  <div class="box-body text-center" style="background-color: #737174;">
                    <p class="text-white mt-15 mb-5">Total Business</p>
                    <h2 class="mt-0 text-white">{{ number_format($stats['totalBusinessGrandTotal'], 2) }}</h2>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 col-6">
                <div class="box">
                  <div class="box-body text-center" style="background-color: #737174;">
                    <p class="text-white mt-15 mb-5">Total Refunds</p>
                    <h2 class="mt-0 text-white">{{ number_format($stats['allRefundOrdersValues'], 2) }}</h2>
                  </div>
                </div>
              </div>

            </div>



          </div>
          <div class="col-xl-4 col-12">
            <div class="box mt-2">
              <div class="box-header with-border bg-secondary rounded-0">
                <h4 class="box-title"> Average Order Value: INR {{ number_format($stats['averageOrdersValue'], 2) }}
                </h4>
              </div>
            </div>

            <div class="box">
              <div class="box-header with-border bg-secondary">
                <h4 class="box-title"> Top Selling Products</h4>
              </div>
              <div class="box-body">
                <ol class="list-group list-group-numbered">
                  @foreach ($stats['topFiveProducts'] as $key => $product)
                    <a
                      href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'sku' => $product->sku]) }}">
                      <li
                        class="list-group-item d-flex justify-content-between align-items-start border-0 border-bottom list-group-item-action">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">{{ $product->product->name }}</div>
                          <span class="small">{{ $product->product->sku }}</span>
                        </div>
                        <span class="badge bg-primary rounded-pill">{{ $product->ordersCount }}</span>
                      </li>
                    </a>
                  @endforeach
                </ol>
              </div>
            </div>

            <div class="box">
              <div class="box-header with-border bg-secondary">
                <h4 class="box-title"> Top Designers</h4>
              </div>
              <div class="box-body">
                <ol class="list-group list-group-numbered">
                  @foreach ($stats['topFiveBrands'] as $key => $brand)
                    <a
                     href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'supplier' => $brand->seller_id]) }}">
                      <li
                        class="list-group-item d-flex justify-content-between align-items-start border-0 border-bottom list-group-item-action">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">{{ $brand->seller->biz_name }}</div>
                          <span class="small">{{ $brand->seller->biz_email }}</span>
                        </div>
                        <span class="badge bg-primary rounded-pill">{{ $brand->ordersCount }}</span>
                      </li>
                    </a>
                  @endforeach
                </ol>
              </div>
            </div>

            <div class="box">
              <div class="box-header with-border bg-secondary">
                <h4 class="box-title"> Most Viewed Products</h4>
              </div>
              <div class="box-body">
                <ol class="list-group list-group-numbered">
                  @foreach ($stats['mostViewedProducts'] as $key => $product)
                    <a
                      href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'sku' => $product->sku]) }}">
                      <li
                        class="list-group-item d-flex justify-content-between align-items-start border-0 border-bottom list-group-item-action">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">{{ $product->name }}</div>
                          <span class="small">{{ $product->sku }}</span>
                        </div>
                        <span class="badge bg-primary rounded-pill">{{ $product->view_count }}</span>
                      </li>
                    </a>
                  @endforeach
                </ol>
              </div>
            </div>

            <div class="box">
              <div class="box-header with-border bg-secondary">
                <h4 class="box-title"> Top Customers</h4>
              </div>
              <div class="box-body py-15">
                @foreach ($stats['topCustomers'] as $topCustomer)
                  <div class="d-flex align-items-center mb-10">
                    <div class="me-15">
                      <img src="{{ asset('allUsers/user/images/customer.png') }}"
                        class="w-auto avatar avatar-lg rounded10 bg-primary-light" alt="">
                    </div>
                    <div class="d-flex flex-column flex-grow-1 fw-500">
                      <a href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'customer' => $topCustomer->buyer_id]) }}"
                        class="hover-primary text-dark mb-1 fs-14" style="width:100%;">
                        {{ $topCustomer->buyer->fullName }}
                        <span
                          class="hover-primary text-dark fs-14 float-end">{{ $topCustomer->buyer->latestOrder->created_at->format('d M, Y') }}</span>
                      </a>
                      <span class="text-muted fs-16">Total spent to date</span>
                      <p class="text-fade fs-14">INR {{ number_format($topCustomer->ordersTotalSum, 2) }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="box">
              <div class="box-header with-border bg-secondary">
                <h4 class="box-title"> Returning Customers</h4>
              </div>
              <div class="box-body py-15">
                @foreach ($stats['returningCustomers'] as $returningCustomer)
                  <div class="d-flex align-items-center mb-10">
                    <div class="me-15">
                      <img src="{{ asset('allUsers/user/images/customer.png') }}"
                        class="w-auto avatar avatar-lg rounded10 bg-primary-light" alt="">
                    </div>
                    <div class="d-flex flex-column flex-grow-1 fw-500">
                      <a href="{{ route('admin.orders-report', ['date_from' => Request('date_from') !== null ? Request('date_from') : defaultStartDateForReport()['dateInString'], 'date_till' => Request('date_till') !== null ? Request('date_till') : date('Y-m-d'), 'customer' => $returningCustomer->buyer_id]) }}"
                        class="hover-primary text-dark mb-1 fs-14">{{ $returningCustomer->buyer->fullName }}
                        <span
                          class="hover-primary text-dark fs-14 float-end">{{ $returningCustomer->buyer->latestOrder->created_at->format('d M, Y') }}</span>
                      </a>
                      <span class="text-muted fs-16">Total spent to date</span>
                      <p class="text-fade fs-14">INR {{ number_format($returningCustomer->ordersTotalSum, 2) }}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="box mt-2">
              <a class="text-dark" href="https://analytics.google.com/analytics/web/" target="_blank">
                <div class="box-header with-border bg-secondary rounded-0">
                  <div class="row">
                    <div class="col-4 d-flex align-items-center">
                      <p class="m-0 fs-20 fw-400">
                        Analytics

                      </p>
                    </div>
                    <div class="col-8 d-flex align-items-center justify-content-end">
                      <img src="{{ asset('allUsers/user/images/analytics.png') }}" />
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="box">
              <div class="box-header with-border bg-secondary">
                <h4 class="box-title">Visitors from social sites</h4>
              </div>
              <div class="box-body py-15">
                <div class="d-flex align-items-center mb-10">
                  <div class="me-15">
                    <img src="{{ asset('allUsers/user/images/website.png') }}"
                      class="w-auto avatar avatar-lg rounded10 bg-primary-light" alt="">
                  </div>
                  <div class="d-flex flex-column flex-grow-1 fw-500">
                    <p class="hover-primary text-dark mb-1 fs-14">
                      Website
                    </p>
                    <span class="text-muted fs-16">Website Visitors.</span>
                    <p class="text-fade fs-14">
                      {{ number_format(count($stats['websiteVisitors']), 0) }}
                    </p>
                  </div>
                </div>
              </div>

              <div class="box-body py-15">
                <div class="d-flex align-items-center mb-10">
                  <div class="me-15">
                    <img src="{{ asset('allUsers/user/images/facebook.png') }}"
                      class="w-auto avatar avatar-lg rounded10 bg-primary-light" alt="">
                  </div>
                  <div class="d-flex flex-column flex-grow-1 fw-500">
                    <p class="hover-primary text-dark mb-1 fs-14">
                      Facebook
                    </p>
                    <span class="text-muted fs-16">Facebook Visitors.</span>
                    <p class="text-fade fs-14">
                      {{ number_format(count($stats['facebookVisitors']), 0) }}
                    </p>
                  </div>
                </div>
              </div>

              <div class="box-body py-15">
                <div class="d-flex align-items-center mb-10">
                  <div class="me-15">
                    <img src="{{ asset('allUsers/user/images/google.png') }}"
                      class="w-auto avatar avatar-lg rounded10 bg-primary-light" alt="">
                  </div>
                  <div class="d-flex flex-column flex-grow-1 fw-500">
                    <p class="hover-primary text-dark mb-1 fs-14">
                      Google
                    </p>
                    <span class="text-muted fs-16">Google Visitors.</span>
                    <p class="text-fade fs-14">
                      {{ number_format(count($stats['googleVisitors']), 0) }}
                    </p>
                  </div>
                </div>
              </div>

              <div class="box-body py-15">
                <div class="d-flex align-items-center mb-10">
                  <div class="me-15">
                    <img src="{{ asset('allUsers/user/images/instagram.png') }}"
                      class="w-auto avatar avatar-lg rounded10 bg-primary-light" alt="">
                  </div>
                  <div class="d-flex flex-column flex-grow-1 fw-500">
                    <p class="hover-primary text-dark mb-1 fs-14">
                      Instagram
                    </p>
                    <span class="text-muted fs-16">Instagram Visitors.</span>
                    <p class="text-fade fs-14">
                      {{ number_format(count($stats['instagramVisitors']), 0) }}
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="box">
              <div class="box-header with-border bg-secondary">
                <h4 class="box-title">Visitor From Location</h4>
              </div>

              <div class="box-body py-15">
                <p class="fw-500 fs-16">Country</p>
                @foreach ($stats['visitorsFromCountries'] as $visitorsFromCountry)
                  <div class="d-flex align-items-center mb-10">
                    <div class="me-15">
                      <img src="{{ asset('allUsers/user/images/map.png') }}"
                        class="w-auto avatar avatar-lg rounded10 bg-primary-light" alt="">
                    </div>
                    <div class="d-flex flex-column flex-grow-1 fw-500">
                      <p class="hover-primary text-dark mb-1 fs-14">
                        {{ $visitorsFromCountry->country_name === null ? 'Unknown' : $visitorsFromCountry->country_name }}
                      </p>
                      <span class="text-muted fs-16">Total unique visitors.</span>
                      <p class="text-fade fs-14">
                        {{ $visitorsFromCountry->country_name !== null ? getAnalyticsStatsCount('country_name', $visitorsFromCountry->country_name, 'ip_address', Request('date_from'), Request('date_till')) : 0 }}
                      </p>
                    </div>
                  </div>
                @endforeach
              </div>

              <div class="box-body py-15">
                <p class="fw-500 fs-16">City</p>
                @foreach ($stats['visitorsFromCities'] as $visitorsFromCity)
                  <div class="d-flex align-items-center mb-10">
                    <div class="me-15">
                      <img src="{{ asset('allUsers/user/images/city.png') }}"
                        class="w-auto avatar avatar-lg rounded10 bg-primary-light" alt="">
                    </div>
                    <div class="d-flex flex-column flex-grow-1 fw-500">
                      <p class="hover-primary text-dark mb-1 fs-14">
                        {{ $visitorsFromCity->city_name === null ? 'Unknown' : $visitorsFromCity->city_name }}
                      </p>
                      <span class="text-muted fs-16">Total unique visitors.</span>
                      <p class="text-fade fs-14">
                        {{ $visitorsFromCity->city_name !== null ? getAnalyticsStatsCount('city_name', $visitorsFromCity->city_name, 'ip_address', Request('date_from'), Request('date_till')) : 0 }}
                      </p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="box">
              <div class="box-header with-border bg-secondary">
                <h4 class="box-title">Visitors from devices</h4>
              </div>
              <div class="box-body py-15">
                @foreach ($stats['visitorFromDevices'] as $visitorFromDevice)
                  <div class="d-flex align-items-center mb-10">
                    <div class="me-15">
                      <img
                        @if ($visitorFromDevice->device === 'Mobile') src="{{ asset('allUsers/user/images/phone.png') }}"
                        @elseif($visitorFromDevice->device === 'Desktop')
                          src="{{ asset('allUsers/user/images/pc.png') }}"
                        @else
                          src="{{ asset('allUsers/user/images/tablet.png') }}" @endif
                        class="w-auto avatar avatar-lg rounded10 bg-primary-light" alt="">
                    </div>
                    <div class="d-flex flex-column flex-grow-1 fw-500">
                      <p class="hover-primary text-dark mb-1 fs-14">
                        {{ $visitorFromDevice->device === null ? 'Unknown' : $visitorFromDevice->device }}</p>
                      <span class="text-muted fs-16">Total unique device visitors.</span>
                      <p class="text-fade fs-14">
                        {{ $visitorFromDevice->device !== null ? getAnalyticsStatsCount('device', $visitorFromDevice->device, 'ip_address', Request('date_from'), Request('date_till')) : 0 }}
                      </p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="box">
              <div class="box-header with-border bg-secondary">
                <h4 class="box-title">Top URL's</h4>
              </div>
              <div class="box-body py-15">
                @foreach ($stats['topUrls'] as $topUrl)
                  <div class="d-flex align-items-center mb-10">
                    <div class="me-15">
                      <img src="{{ asset('allUsers/user/images/url.png') }}"
                        class="w-auto avatar avatar-lg rounded10 bg-primary-light" alt="">
                    </div>
                    <div class="d-flex flex-column flex-grow-1 fw-500">
                      <a href="{{ $topUrl->url }}" target="_blank">
                        <p class="hover-primary text-dark mb-1 fs-14">
                          {{ $topUrl->url }}</p>
                      </a>
                      <span class="text-muted fs-16">Total unique url visitors.</span>
                      <p class="text-fade fs-14">
                        {{ $topUrl->url !== null ? getAnalyticsStatsCount('url', $topUrl->url, 'ip_address', Request('date_from'), Request('date_till')) : 0 }}
                      </p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar">

    <div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger" data-toggle="control-sidebar"><i
          class="ion ion-close text-white"></i></span> </div> <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-bs-toggle="tab" class="active"><i
            class="mdi mdi-message-text"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-bs-toggle="tab"><i
            class="mdi mdi-playlist-check"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <div class="flexbox">
          <a href="javascript:void(0)" class="text-grey">
            <i class="ti-more"></i>
          </a>
          <p>Users</p>
          <a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
        </div>
        <div class="lookup lookup-sm lookup-right d-none d-lg-block">
          <input type="text" name="s" placeholder="Search" class="w-p100">
        </div>
        <div class="media-list media-list-hover mt-20">
          <div class="media py-10 px-0">
            <a class="avatar avatar-lg status-success" href="#">
              <img src="{{ asset('allUsers/user/images/avatar/1.jpg') }}" alt="...">
            </a>
            <div class="media-body">
              <p class="fs-16">
                <a class="hover-primary" href="#"><strong>Tyler</strong></a>
              </p>
              <p>Praesent tristique diam...</p>
              <span>Just now</span>
            </div>
          </div>
          <div class="media py-10 px-0">
            <a class="avatar avatar-lg status-danger" href="#">
              <img src="{{ asset('allUsers/user/images/avatar/2.jpg') }}" alt="...">
            </a>
            <div class="media-body">
              <p class="fs-16">
                <a class="hover-primary" href="#"><strong>Luke</strong></a>
              </p>
              <p>Cras tempor diam ...</p>
              <span>33 min ago</span>
            </div>
          </div>
          <div class="media py-10 px-0">
            <a class="avatar avatar-lg status-warning" href="#">
              <img src="{{ asset('allUsers/user/images/avatar/3.jpg') }}" alt="...">
            </a>
            <div class="media-body">
              <p class="fs-16">
                <a class="hover-primary" href="#"><strong>Evan</strong></a>
              </p>
              <p>In posuere tortor vel...</p>
              <span>42 min ago</span>
            </div>
          </div>
          <div class="media py-10 px-0">
            <a class="avatar avatar-lg status-primary" href="#">
              <img src="{{ asset('allUsers/user/images/avatar/4.jpg') }}" alt="...">
            </a>
            <div class="media-body">
              <p class="fs-16">
                <a class="hover-primary" href="#"><strong>Evan</strong></a>
              </p>
              <p>In posuere tortor vel...</p>
              <span>42 min ago</span>
            </div>
          </div>

          <div class="media py-10 px-0">
            <a class="avatar avatar-lg status-success" href="#">
              <img src="{{ asset('allUsers/user/images/avatar/1.jpg') }}" alt="...">
            </a>
            <div class="media-body">
              <p class="fs-16">
                <a class="hover-primary" href="#"><strong>Tyler</strong></a>
              </p>
              <p>Praesent tristique diam...</p>
              <span>Just now</span>
            </div>
          </div>
          <div class="media py-10 px-0">
            <a class="avatar avatar-lg status-danger" href="#">
              <img src="{{ asset('allUsers/user/images/avatar/2.jpg') }}" alt="...">
            </a>
            <div class="media-body">
              <p class="fs-16">
                <a class="hover-primary" href="#"><strong>Luke</strong></a>
              </p>
              <p>Cras tempor diam ...</p>
              <span>33 min ago</span>
            </div>
          </div>
          <div class="media py-10 px-0">
            <a class="avatar avatar-lg status-warning" href="#">
              <img src="{{ asset('allUsers/user/images/avatar/3.jpg') }}" alt="...">
            </a>
            <div class="media-body">
              <p class="fs-16">
                <a class="hover-primary" href="#"><strong>Evan</strong></a>
              </p>
              <p>In posuere tortor vel...</p>
              <span>42 min ago</span>
            </div>
          </div>
          <div class="media py-10 px-0">
            <a class="avatar avatar-lg status-primary" href="#">
              <img src="{{ asset('allUsers/user/images/avatar/4.jpg') }}" alt="...">
            </a>
            <div class="media-body">
              <p class="fs-16">
                <a class="hover-primary" href="#"><strong>Evan</strong></a>
              </p>
              <p>In posuere tortor vel...</p>
              <span>42 min ago</span>
            </div>
          </div>

        </div>
      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <div class="flexbox">
          <a href="javascript:void(0)" class="text-grey">
            <i class="ti-more"></i>
          </a>
          <p>Todo List</p>
          <a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
        </div>
        <ul class="todo-list mt-20">
          <li class="py-15 px-5 by-1">
            <!-- checkbox -->
            <input type="checkbox" id="basic_checkbox_1" class="filled-in">
            <label for="basic_checkbox_1" class="mb-0 h-15"></label>
            <!-- todo text -->
            <span class="text-line">Nulla vitae purus</span>
            <!-- Emphasis label -->
            <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
            <!-- General tools such as edit or delete-->
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li class="py-15 px-5">
            <!-- checkbox -->
            <input type="checkbox" id="basic_checkbox_2" class="filled-in">
            <label for="basic_checkbox_2" class="mb-0 h-15"></label>
            <span class="text-line">Phasellus interdum</span>
            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li class="py-15 px-5 by-1">
            <!-- checkbox -->
            <input type="checkbox" id="basic_checkbox_3" class="filled-in">
            <label for="basic_checkbox_3" class="mb-0 h-15"></label>
            <span class="text-line">Quisque sodales</span>
            <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li class="py-15 px-5">
            <!-- checkbox -->
            <input type="checkbox" id="basic_checkbox_4" class="filled-in">
            <label for="basic_checkbox_4" class="mb-0 h-15"></label>
            <span class="text-line">Proin nec mi porta</span>
            <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li class="py-15 px-5 by-1">
            <!-- checkbox -->
            <input type="checkbox" id="basic_checkbox_5" class="filled-in">
            <label for="basic_checkbox_5" class="mb-0 h-15"></label>
            <span class="text-line">Maecenas scelerisque</span>
            <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li class="py-15 px-5">
            <!-- checkbox -->
            <input type="checkbox" id="basic_checkbox_6" class="filled-in">
            <label for="basic_checkbox_6" class="mb-0 h-15"></label>
            <span class="text-line">Vivamus nec orci</span>
            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li class="py-15 px-5 by-1">
            <!-- checkbox -->
            <input type="checkbox" id="basic_checkbox_7" class="filled-in">
            <label for="basic_checkbox_7" class="mb-0 h-15"></label>
            <!-- todo text -->
            <span class="text-line">Nulla vitae purus</span>
            <!-- Emphasis label -->
            <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
            <!-- General tools such as edit or delete-->
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li class="py-15 px-5">
            <!-- checkbox -->
            <input type="checkbox" id="basic_checkbox_8" class="filled-in">
            <label for="basic_checkbox_8" class="mb-0 h-15"></label>
            <span class="text-line">Phasellus interdum</span>
            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li class="py-15 px-5 by-1">
            <!-- checkbox -->
            <input type="checkbox" id="basic_checkbox_9" class="filled-in">
            <label for="basic_checkbox_9" class="mb-0 h-15"></label>
            <span class="text-line">Quisque sodales</span>
            <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
          <li class="py-15 px-5">
            <!-- checkbox -->
            <input type="checkbox" id="basic_checkbox_10" class="filled-in">
            <label for="basic_checkbox_10" class="mb-0 h-15"></label>
            <span class="text-line">Proin nec mi porta</span>
            <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
            <div class="tools">
              <i class="fa fa-edit"></i>
              <i class="fa fa-trash-o"></i>
            </div>
          </li>
        </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->


  <!-- Page Content overlay -->
  <script type="text/javascript" src="{{ asset('allUsers/user/report.js') }}"></script>
@endsection
