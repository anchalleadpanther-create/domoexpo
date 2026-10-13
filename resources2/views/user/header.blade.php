<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('allUsers/logo.png') }}">
  <title>{{ env('APP_NAME') }} </title>
  <!-- Vendors Style-->
  <link rel="stylesheet" href="{{ asset('allUsers/user/css/vendors_css.css') }}">
  <!-- Style-->
  <link rel="stylesheet" href="{{ asset('allUsers/user/css/horizontal-menu.css') }}">
  <link rel="stylesheet" href="{{ asset('allUsers/user/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('allUsers/user/css/skin_color.css') }}">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js">
  </script>
  <script type="text/javascript" src="{{ asset('allUsers/sweet-alert.js') }}"></script>
  <script type="text/javascript" src="{{ asset('allUsers/lottie-player.js') }}"></script>
  <script type="text/javascript" src="{{ asset('allUsers/axios.js') }}"></script>
</head>
@if (Request::path() !== 'admin/login')
  {{-- body --}}

  <body class="layout-top-nav light-skin theme-success fixed">
    @include('extensions.sweet-alert')
    {{-- @include('extensions.alerts') --}}
    <div class="wrapper">
      {{-- <div id="loader"></div> --}}
      <header class="main-header">
        <div class="inside-header">
          <div class="d-flex align-items-center logo-box justify-content-start">
            <!-- Logo -->
            <a href="{{ route('admin.dashboard.index') }}" class="logo">
              <!-- logo-->
              <div class="logo-lg">
                {{-- <span class="light-logo"><img src="{{ asset('allUsers/webkype-logo-big.png') }}" alt="logo"
                    style='width:150px'></span>
                <span class="dark-logo"><img src="{{ asset('allUsers/webkype-logo-big.png') }}" alt="logo"
                    style='width:150px'></span> --}}
                <span class="light-logo"><img src="{{ asset('allUsers/logo.png') }}" alt="logo"
                    style='width:120px;height:50px;'></span>
                <span class="dark-logo"><img src="{{ asset('allUsers/logo.png') }}" alt="logo"
                    style='width:120px;height:50px;'></span>
              </div>
            </a>
          </div>
          {{-- nav start --}}
          <!-- Header Navbar -->
          <nav class="navbar navbar-static-top @if (Request::segment(5) === 'profile-update' || Request::segment(1) === 'tell-us-more') d-none @endif">
            <!-- Sidebar toggle button-->
            <div class="app-menu">
              <ul class="header-megamenu nav">
                <li class="btn-group d-lg-inline-flex d-none">
                  <div class="app-menu">
                    <div class="search-bx mx-5 d-none">
                      <form>
                        <div class="input-group">
                          <input type="search" class="form-control" placeholder="Search" aria-label="Search"
                            aria-describedby="button-addon2">
                          <div class="input-group-append">
                            <button class="btn" type="submit" id="button-addon3"><i
                                data-feather="search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="navbar-custom-menu r-side">
              <ul class="nav navbar-nav">
                <!-- Notifications -->
                <li class="dropdown notifications-menu d-none">
                  <a href="#" class="waves-effect waves-light dropdown-toggle btn-info-light"
                    data-bs-toggle="dropdown" title="Notifications">
                    <i data-feather="bell"></i>
                  </a>
                  <ul class="dropdown-menu animated bounceIn ">
                    <li class="header">
                      <div class="p-20">
                        <div class="flexbox">
                          <div>
                            <h4 class="mb-0 mt-0">Notifications</h4>
                          </div>
                          <div>
                            <a href="#" class="text-danger">Clear All</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu sm-scrol">
                        <li>
                          <a href="#">
                            <i class="fa fa-users text-info"></i> Web application under construction.
                          </a>
                          {{-- </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in
                            semper diam posuere.
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor
                            pretium a erat.
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
                          </a>
                        </li> --}}
                          {{-- <li>
                          <a href="#">
                            <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at
                            scelerisque ipsum imperdiet.
                          </a>
                        </li> --}}
                      </ul>
                    </li>
                    <li class="footer">
                      <a href="#">View all</a>
                    </li>
                  </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!-- User Account-->
                <li class="dropdown user user-menu">
                  <a href="#"
                    class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent py-0 no-shadow"
                    data-bs-toggle="dropdown" title="User">
                    <div class="d-flex pt-1">
                      <div class="text-end me-10">
                        <p class="pt-5 fs-14 mb-0 fw-700 text-primary">{{ config('app.name') }}</p>
                        <small class="fs-10 mb-0 text-uppercase text-mute">Admin</small>
                      </div>
                      <img src="{{ asset('allUsers/user/images/avatar/avatar-1.png') }}"
                        class="avatar rounded-10 bg-primary-light h-40 w-40" alt="" />
                    </div>
                  </a>
                  <ul class="dropdown-menu animated flipInX">
                    <li class="user-body">
                      <a href="{{ route('admin.change-password') }}" class="dropdown-item text-dark">
                        <i class="ti-key text-muted me-2"></i>
                        Change Password
                      </a>
                    </li>
                    <li class="user-body">
                      <div class="dropdown-divider"></div>
                      <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-dark">
                          <i class="ti-lock text-muted me-2"></i>
                          Logout
                        </button>
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <nav class="main-nav @if (Request::segment(5) === 'profile-update' || Request::segment(1) === 'tell-us-more') d-none @endif" role="navigation">
        @include('user.nav')
      </nav>
      {{-- end nav --}}
@endif
@yield('userContent')
@routes
@if (Request::path() !== 'admin/login')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
      <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">FAQ</a>
        </li>
        {{-- <li class="nav-item">
							<a class="nav-link" href="#">Purchase Now</a>
						</li> --}}
      </ul>
    </div>
    <p class="">Copyright @ {{ env('APP_NAME') }} - Developed By <a href="www.webkype.com">Webkype</a>.
    </p>
  </footer>
  <!-- Vendor JS -->
@endif
<x-admin.delete-modal />
<x-admin.orders.order-comment-modal />
<script type="module" src="{{ asset('allUsers/user/orders.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/vendor_components/moment/min/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/vendor_components/fullcalendar/fullcalendar.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('allUsers/user/admin.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/customer/js/my-scripts.js') }}"></script>
{{-- <script src="{{ asset('allUsers/user/js/pages/chat-popup.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('allUsers/user/js/vendors.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/icons/feather-icons/feather.min.js') }}"></script>
<script type="text/javascript"
  src="{{ asset('allUsers/user/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/vendor_components/select2/dist/js/select2.full.js') }}">
</script>
<script type="text/javascript"
  src="{{ asset('allUsers/user/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
<script type="text/javascript"
  src="{{ asset('allUsers/user/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('allUsers/user/vendor_plugins/input-mask/jquery.inputmask.js') }}">
</script>
<script type="text/javascript"
  src="{{ asset('allUsers/user/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script type="text/javascript"
  src="{{ asset('allUsers/user/vendor_plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/vendor_plugins/iCheck/icheck.min.js') }}"></script>
{{-- <script src="{{ asset('allUsers/user/js/pages/advanced-form-element.js') }}"></script> --}}
{{-- <script src="{{ asset('allUsers/user/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script> --}}
<script type="text/javascript"
  src="{{ asset('allUsers/user/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
</script>
<script type="text/javascript"
  src="{{ asset('allUsers/user/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<script type="text/javascript"
  src="{{ asset('allUsers/user/vendor_components/date-paginator/bootstrap-datepaginator.min.js') }}"></script>
<!-- Rhythm Admin App -->
<script type="text/javascript" src="{{ asset('allUsers/user/vendor_components/jquery-ui/jquery-ui.min.js') }}">
</script>
<script type="text/javascript"
  src="{{ asset('allUsers/user/vendor_components/perfect-scrollbar-master/perfect-scrollbar.jquery.min.js') }}">
</script>
{{-- <script src="{{ asset('allUsers/user/vendor_components/fullcalendar/lib/moment.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('allUsers/user/js/jquery.smartmenus.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/js/menus.js') }}"></script>
@if (Request::path() != 'admin/login')
  <script type="text/javascript" src="{{ asset('allUsers/user/js/template.js') }}"></script>
@endif
<script type="text/javascript" src="{{ asset('allUsers/user/js/pages/calendar.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/js/pages/gcal.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/js/pages/dashboard.js') }}"></script>
<script type="text/javascript"
  src="{{ asset('allUsers/user/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/js/pages/toastr.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/js/pages/notification.js') }}"></script>
<script type="text/javascript" src="{{ asset('allUsers/user/vendor_components/datatable/datatables.min.js') }}">
</script>

</body>

</html>
