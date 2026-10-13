<div class="col-xl-3 col-lg-2 col-md-12 mb-4 mb-lg-0  h-100">
  <!-- Nav tabs -->
  <ul class="nav flex-column bg-light h-100 dashboard-list" role="tablist">
    <li><a class="nav-link sidebar-links @empty(Request::segment(3)) active @endempty" data-bs-toggle="tab"
        href="#dashboard">Dashboard</a></li>
    <li><a class="nav-link sidebar-links orders-tab-btn @if (Request::segment(3) === 'orders') active @endif" data-bs-toggle="tab" href="#orders">Orders</a></li>
    {{-- <li><a class="nav-link sidebar-links" data-bs-toggle="tab" href="#orderstracking">Orders tracking</a></li> --}}
    <li><a class="nav-link sidebar-links address-tab-btn @if (Request::segment(3) === 'address') active @endif"
        data-bs-toggle="tab" href="#address">Addresses</a></li>
    <li><a class="nav-link sidebar-links accounts-tab-btn" data-bs-toggle="tab" href="#account-details">Account
        details</a></li>
    {{--<li><a class="nav-link sidebar-links" data-bs-toggle="tab" href="#myCard">My Card</a></li> --}}
    {{--<li><a class="nav-link sidebar-links" data-bs-toggle="tab" href="#myeWallet">My e-Wallet</a></li> --}}
    {{--<li><a class="nav-link sidebar-links @if (Request::segment(3) === 'referral') active @endif" data-bs-toggle="tab"
        href="#referral">Referral</a></li>--}}
    <li><a class="nav-link sidebar-links @if (Request::segment(3) === 'wishlist') active @endif" data-bs-toggle="tab"
        href="#wishlist">Wishlist </a></li>
    @if (auth()->user()->is_expert)
      <li><a class="nav-link sidebar-links" data-bs-toggle="tab" href="#calendar">Manage Calendar</a></li>
      <li><a class="nav-link sidebar-links" data-bs-toggle="tab" href="#expert-details">Expert details</a></li>
      <li><a class="nav-link sidebar-links" data-bs-toggle="tab" href="#managePackages">Manage Packages</a></li>
    @endif
  {{--<li><a class="nav-link sidebar-links" data-bs-toggle="tab" href="#bookedSlots">Bookings</a></li>--}}  
    <li><a class="nav-link sidebar-links" href="javascript:;"
        onclick="document.querySelector('#logout').submit();">logout</a>
    </li>
  </ul>
  <!-- End Nav tabs -->
</div>
