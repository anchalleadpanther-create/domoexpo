<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WPXN27C');</script>
<!-- End Google Tag Manager -->
<!-- New Google tag GA4 (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S6QWMRNZ1H"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-S6QWMRNZ1H');
</script>
<!-- Google tag (gtag.js) -->

<meta name="google-site-verification" content="FvqJwGfL0sr312vEyDwyIEDs37EH42D1tIZS8oTmwN0" />


  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="desiredBaseUrl" content="{{url('/')}}">
  {{-- SEO Tags --}}
  @include('customer.partials.seo-tags')
  {{-- SEO Tags --}}
  <!-- Favicon -->
    <link rel="shortcut icon" href="https://littletags.webkype.co/favicon.ico" />

  <!-- Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('allUsers/frontend/css/plugins.css') }}" />
  <!-- Main Style CSS -->
  <link rel="stylesheet" href="{{ asset('allUsers/frontend/css/style.css?ver=7.2323') }}" />
  <link rel="stylesheet" href="{{ asset('allUsers/frontend/css/responsive.css?ver=1.19') }}" />
  <script src="{{ asset('allUsers/frontend/js/vendor/jquery-min.js') }}"></script>
  <script src="{{ asset('allUsers/sweet-alert.js') }}"></script>
  <script src="{{ asset('allUsers/axios.js') }}"></script>
  <script src="{{ asset('allUsers/lottie-player.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('allUsers/animate.css') }}" />
  <script src="{{ asset('allUsers/index.global.js') }}"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
  		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
      <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <style>
    .search-product-result a .list-group-item {
      background: #fff !important;
    }
    #header{ box-shadow: 0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -2px rgba(0,0,0,.1);}
    @media only screen and (max-width: 767px) {
    #header{ box-shadow: 0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -2px rgba(0,0,0,.1); position: relative;  }
    .res-pt{padding-top:0 !important;}
    .res-pb{padding-bottom:0 !important;}
     .res-ptb{padding-bottom:0 !important;padding-top:0 !important;}
       .res-mt{margin-top:0 !important;}
    .res-mb{margin-bottom:0 !important;}
     .res-mtb{margin-bottom:0 !important;margin-top:0 !important;}
     .store-features img {width: 40px !important;}
     .store-features p {font-size: 11px;    margin-top: 5px !important;}
     .store-features .store-info .col-lg-3{margin-bottom:0 !important;}
     .store-info .col-6:nth-child(2n) { border: 0 !important;}
     .store-info .col-6:nth-child(2n), .store-info .col-6:first-child{margin-bottom:20px !important;}
    }
  
      .top-bar{background:#000 !important;}
    .top-barTag{ 
    color: #000;
    background: #ffa500;
    padding: 3px 10px;
    font-size: 13px;
    letter-spacing: 1px; }
     @media only screen and (max-width: 575px) {
         .store-features .store-info .col-lg-4{margin-bottom:0 !important;}
         .res_text-center{text-align:center;}
     }
     
  </style>
 
      


  <!--<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=66430b38be8a4500194339b3&product=inline-share-buttons&source=platform" async="async"></script>-->
</head>
<body class="template-index index-demo1">
            {{-- @if(env('APP_ENV') == 'production') --}}

              <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WPXN27C"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
         {{--  @endif --}}
  @routes
  <div class="h-100 w-100 d-none justify-content-center align-items-center position-fixed custom-loader">
    <span class="shimming-loader"></span>
  </div>
  <form method="post" id="logout" action="{{ route('buyer.logout') }}">
    @csrf
  </form>
  @include('extensions.sweet-alert')
  <!--Page Wrapper-->
  <div class="page-wrapper">
    {{--
    <!--Topbar-->
    <x-customer.top-message-slider :messages="[
            'Enjoy 10% off on your first purchase! Use code <b>First10</b>',
            'Shop worth <b>Rs. 5000</b> & enjoy <b>Free Shipping</b> within India',
            'World wide shipping available',
        ]" />
    <!--End Topbar--> --}}
    <!--Header-->
    {{-- <div id="header" class="header header-1">
      <div class="header-main">
        <header class="header-wrap container d-flex align-items-center sticky_none ">
          <div class="row g-0 align-items-center w-100 sticky_none">
            <!--Social Icons-->
            <div class="col-4 col-sm-4 col-md-4 col-lg-5 d-none d-md-block">
              <ul class="social-icons list-inline align-items-center">
                <li class="list-inline-item">
                  <x-customer.icon url="https://www.facebook.com/" icon="an an-facebook" name="Facebook" />
                </li>
                <li class="list-inline-item">
                  <x-customer.icon url="https://www.pinterest.com/" icon="an an-pinterest-p" name="Pinterest" />
                </li>
                <li class="list-inline-item">
                  <x-customer.icon url="https://www.instagram.com/" icon="an an-instagram" name="Instagram" />
                </li>
                <li class="list-inline-item">
                  <x-customer.icon url="https://api.whatsapp.com/send?phone=+918447722222&text=Hello"
                    icon="an an-whatsapp" name="Whatsapp" />
                </li>
              </ul>

            </div>
            <!--End Social Icons-->
            <!--Logo / Menu Toggle-->
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-flex">
              <!--Mobile Toggle-->
              <button type="button"
                class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open me-3 d-lg-none"><i
                  class="icon an an-times-l"></i><i class="icon an an-bars-l"></i></button>
              <!--End Mobile Toggle-->
              <!--Logo-->
              <div class="logo mx-lg-auto"><a href="{{ route('home') }}" id="my_base_url">
                  <img class="logo-img app-logo" src="{{ asset('allUsers/customer/images/logo-new.png') }}" /><span
                    class="logo-txt d-none">Optimal</span></a></div>
              <!--End Logo-->
            </div>

            <!--Right Action-->
            <div class="col-6 col-sm-6 col-md-6 col-lg-5 icons-col text-right d-flex justify-content-end">
              <!--Search-->
              <!--Search-->
              <div class="site-search iconset"><i class="icon an an-search-l"></i><span
                  class="tooltip-label">Search</span></div>
              <!--End Search-->

              <!--End Search-->
              <!--Wishlist-->
              <div class="wishlist-link iconset @guest('buyer') @endguest"  style="display:block !important">
                <a href="{{ route('buyer.dashboard', 'wishlist') }}"><i class="icon an an-heart-l"></i><span
                    class="wishlist-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle ">{{
                    wishlistCounter() }}</span><span class="tooltip-label">Wishlist</span></a>
              </div>
              <!--End Wishlist-->
              <!--Setting Dropdown-->
              @auth('buyer')
              <a @auth('buyer') href="{{ route('buyer.dashboard') }}" @endauth>
                <div class="user-link iconset account-info" @auth('buyer')
                  data-name="{{ Auth::guard('buyer')->user()->fullName }}"
                  data-email="{{ Auth::guard('buyer')->user()->email }}"
                  data-phone="{{ Auth::guard('buyer')->user()->phone }}" @endauth>

                  <i class="icon an an-user-expand"></i>
                  <span class="tooltip-label">Account</span>
                </div>
              </a>
              @endauth
              @guest('buyer')
              <a data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-toggle="modal" href="javascript:;">
                <div class="user-link iconset account-info">
                  <i class="icon an an-user-expand"></i>
                  <span class="tooltip-label">Login</span>
                </div>
              </a>
              @endguest
              <!--End Setting Dropdown-->
              <!--Minicart Drawer-->
              <div class="header-cart iconset m-hide">

                <a @if (Request::segment(2)==='checkout' ) href="{{ route('buyer.cart') }}" @endif
                  class="site-header__cart btn-minicart" data-bs-toggle="modal" data-bs-target="#minicart-drawer">
                  <i class="icon an an-sq-bag"></i><span
                    class="site-cart-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle cart-count"></span><span
                    class="tooltip-label">Cart</span>
                </a>
              </div>
              <!--End Minicart Drawer-->
              <!--Setting Dropdown-->
              <div class="setting-link iconset pe-0"><i class="icon an an-right-bar-s"></i><span
                  class="tooltip-label">Settings</span></div>
              <div id="settingsBox">
                <div class="currency-picker">
                  <span class="ttl">Select Currency</span>
                  <ul id="currencies" class="cnrLangList">
                    @foreach (getCurrencies() as $currency)
                    <li @class([ 'selected'=>
                      session()->exists('currency') && session('currency') == $currency->id,
                      ])>
                      <a href="{{ route('customer.set-currency', ['currency' => $currency->id]) }}" @class([ 'active'=>
                        session()->exists('currency') && session('currency') == $currency->id,
                        ])>{{ $currency->currency }}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>

              </div>
              <!--End Setting Dropdown-->
            </div>
            <!--End Right Action-->
          </div>
        </header>
        <header class="header-wrap container d-flex align-items-center sticky_block d-none" style=" padding-top: 8px;">
          <div class="row g-0 align-items-center w-100 ">
            <!--End Social Icons-->
            <!--Logo / Menu Toggle-->
            <div class="col-6 col-sm-6 col-md-6 col-lg-1 d-flex">
              <!--Mobile Toggle-->
              <button type="button"
                class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open me-3 d-lg-none"><i
                  class="icon an an-times-l"></i><i class="icon an an-bars-l"></i></button>
              <!--End Mobile Toggle-->
              <!--Logo-->
              <div class="logo">
                <a href="{{ route('home') }}">
                  <img class="logo-img" src="{{ asset('allUsers/customer/images/sticky-logo.png') }}" />
                  <span class="logo-txt d-none">Optimal</span>
                </a>
              </div>
              <!--End Logo-->
            </div>
            <!--End Logo / Menu Toggle-->
            <div class="col-4 col-sm-4 col-md-4 col-lg-9 mobile-none">
              @include('customer.partials.desktop-navbar')
            </div>
            <!--Right Action-->
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 icons-col text-right d-flex justify-content-end">
              <!--Search-->
              <div class="site-search iconset">
                <i class="icon an an-search-l"></i>
                <span class="tooltip-label">Search</span>
              </div>
              <!--End Search-->
              <!--Wishlist-->

              <div class="wishlist-link iconset @guest('buyer') @endguest"  style="display:block !important">
                <a href="{{ route('buyer.dashboard', 'wishlist') }}"><i class="icon an an-heart-l"></i><span
                    class="wishlist-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle">{{
                    wishlistCounter() }}</span><span class="tooltip-label">Wishlist</span></a>
              </div>
              <!--End Wishlist-->
              <!--Setting Dropdown-->
              @auth('buyer')
              <a @auth('buyer') href="{{ route('buyer.dashboard') }}" @endauth>
                <div class="user-link iconset account-info" @auth('buyer')
                  data-name="{{ Auth::guard('buyer')->user()->fullName }}"
                  data-email="{{ Auth::guard('buyer')->user()->email }}"
                  data-phone="{{ Auth::guard('buyer')->user()->phone }}" @endauth>

                  <i class="icon an an-user-expand"></i>
                  <span class="tooltip-label">Account</span>
                </div>
              </a>
              @endauth
              @guest('buyer')
              <a data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-toggle="modal" href="javascript:;">
                <div class="user-link iconset account-info">
                  <i class="icon an an-user-expand"></i>
                  <span class="tooltip-label">Login</span>
                </div>
              </a>
              @endguest
              <!--End Setting Dropdown-->
              <!--Minicart Drawer-->
              <div class="header-cart iconset m-hide">
                <a href="javascript:;" class="site-header__cart btn-minicart" data-bs-toggle="modal"
                  data-bs-target="#minicart-drawer">
                  <i class="icon an an-sq-bag"></i><span
                    class="site-cart-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle cart-count">0</span><span
                    class="tooltip-label">Cart</span>
                </a>
              </div>
              <!--End Minicart Drawer-->
              <!--Setting Dropdown-->
              <div class="setting-link iconset pe-0"><i class="icon an an-right-bar-s"></i><span
                  class="tooltip-label">Settings</span></div>
              <div id="settingsBox">
                <div class="currency-picker">
                  <span class="ttl">Select Currency</span>
                  <ul id="currencies" class="cnrLangList">
                    @foreach (getCurrencies() as $currency)
                    <li @class([ 'selected'=>
                      session()->exists('currency') && session('currency') == $currency->id,
                      ])>
                      <a href="{{ route('customer.set-currency', ['currency' => $currency->id]) }}" @class([ 'active'=>
                        session()->exists('currency') && session('currency') == $currency->id,
                        ])>{{ $currency->currency }}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>

              </div>
              <!--End Setting Dropdown-->
            </div>
            <!--End Right Action-->
          </div>
        </header>
        <!--Main Navigation Desktop-->

        <div class="menu-outer">
          <nav class="container">
            <div class="row">
              <div class="col-1 col-sm-12 col-md-12 col-lg-12 align-self-center d-menu-col">
                <!--Desktop Menu-->
                @include('customer.partials.desktop-navbar')
                <!--End Desktop Menu-->
              </div>
            </div>
          </nav>
        </div>
        <!--End Main Navigation Desktop-->
        <!--Search Popup-->
        <x-customer.navbar-search-popup />
        <!--End Search Popup-->
        <!--</duv>-->

      </div>
    </div> --}}
    <!--End Header-->
    <!--Header-->
    <div id="header" class="header header-1">
      <div class="header-main">
      
           <div class="top-bar  " >
          <div class="container-fluid">
            <div class="inner d-flex align-items-center">
              <div class="col-12 col-sm-7 col-md-7 col-lg-7 res_text-center">
                <a href="" class="top-barTag" target="_blank">Explore </a>
                                 
              </div>
              <div class="col-12 col-sm-12 col-md-5 col-lg-5 text-center d-none d-lg-block">
                <p class="top-barTag">Need assistance? Call/ WhatsApp at +91-</p>
              </div>
              <div class="col-4 col-sm-4 col-md-4 col-lg-4 d-none d-lg-block d-md-block text-right" style="display:none !important">
                <!--Setting Dropdown-->
                <!-- <div class="setting-link iconset d-inline me-2">Language</div> -->
                <!-- <div id="settingsBox">
                                    <div class="language-picker">
                                        <span class="ttl">Select Language</span>
                                        <ul id="language" class="cnrLangList">
                                            <li><a href="#" class="active">English</a></li>
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">German</a></li>
                                        </ul>
                                    </div>
                                </div> -->
                <!--End Setting Dropdown-->
                <!--Setting Dropdown-->
                <div class="setting-link1 iconset d-inline me-2" style="font-size:14px">
                  {{ session()->exists('countryId') ? getCurrentCurrency(session('countryId'))->currency : 'INR' }}
                </div>
                <div id="settingsBox1">
                  <div class="currency-picker">
                    <span class="ttl">Select Currency</span>
                    {{-- <ul id="currencies2" class="cnrLangList">
                      @foreach (getCurrencies() as $currency)
                      <li @class([ 'selected'=>
                        session()->exists('currency') && session('currency') == $currency->id,
                        ])>
                        <a href="{{ route('customer.set-currency', ['currency' => $currency->id, 'countryId' => $currency->country_id]) }}"
                          @class([ 'active'=>
                          session()->exists('currency') && session('currency') == $currency->id,
                          ])>{{ $currency->currency }}</a>
                      </li>
                      @endforeach --}}




                    </ul>
                  </div>

                </div>
                <!--End Setting Dropdown-->
                <p class="m-0 d-inline email-id d-none d-xl-inline-block" style="font-size:14px"><a
                    href="mailto:info@example.com" class="d-flex align-items-center"><i
                      class="an an-envelope-l me-2"></i> <span class="eno">care@littletags.com</span></a></p>
              </div>
            </div>
          </div>
        </div>
        <!--Header-->
        <header  class="header header-wrap d-flex align-items-center">
          <div class="container-fluid">
            <div class="row mt-3">
              <!--Logo / Menu Toggle-->
              <div class="col-10 col-sm-10 col-md-6 col-lg-3 align-self-center justify-content-start d-flex">
                <!--Mobile Toggle-->
                <button type="button"
                  class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open me-3 d-lg-none"><i
                    class="icon an an-times-l"></i><i class="icon an an-bars-l"></i></button>
                <!--End Mobile Toggle-->
                <!--Logo-->
                <div class="logo"><a href="{{ url('/') }}"><img class="logo-img mh-100"
                      src="{{ asset('allUsers/logo.png') }}" width="140" /></a>
                </div>
                <!--End Logo-->
              </div>
              <!--End Logo / Menu Toggle-->
              <!--Search Inline-->
              <div class="col-1 col-sm-1 col-md-1 col-lg-6 d-none d-lg-block ">
                <form class="form minisearch search-inline" id="header-search1" action="/products/search?" method="get">
                  <label class="label d-none"><span>Search</span></label>
                  <div class="control">
                    <div class="searchField d-flex">
                      {{-- <div class="search-category">
                        <select id="rgsearch-category1" name="rgsearch[category]" data-default="All Categories"
                          class="rounded-pill-start">
                          <option value="00" label="All Categories" selected="selected">
                            All Categories
                          </option>
                          <optgroup id="rgsearch-shop1" label="Shop">
                            @foreach (navbarCategories() as $category)
                            <option value="{{ route('customer.product-category', $category->category_slug) }}">
                              - {{ $category->category_name }}</option>
                            @endforeach
                          </optgroup>
                        </select>
                      </div> --}}
                      <div class="input-box  w-100">
                        <input type="text" name="search" value="" placeholder="Search products"
                          class="input-text  product-search" style="width:100%" />
                        <button type="submit" title="Search" class="action  search d-inline">
                          <i class="icon an an-search-l"></i>
                        </button>

                        {{-- <input type="hidden" name="search" value="" placeholder="Search"
                          class="input-text product-search">
                        <ul class="list-group search-product-result" style="max-height: 270px;overflow-y: auto;">
                        </ul> --}}

                        <ul class="list-group search-product-result">
                          <li class="list-group-item list-group-item-action border-0">
                          </li>
                          <li class="list-group-item list-group-item-action border-0">
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!--End Search Inline-->
              <!--Right Action-->
              <div
                class="col-2 col-sm-2 col-md-6 col-lg-3  align-self-center icons-col text-right d-flex justify-content-end">
                <div class="site-search iconset desktop-hide mobile-hide"><i class="icon an an-search-l"></i><span
                    class="tooltip-label">Search</span></div>
                <!--End Wishlist-->
                <!--Setting Dropdown-->
                <div class="setting-link iconset ">{{ session()->exists('countryId') ? getCurrentCurrency(session('countryId'))->currency : 'INR' }}</div>
                <div id="settingsBox">
                  <div class="currency-picker">
                    {{-- <ul id="currencies" class="cnrLangList">
                      <li class="selected"><a href="#;" class="active">INR</a></li>
                      <li><a href="#;">GBP</a></li>
                      <li><a href="#;">CAD</a></li>
                      <li><a href="#;">USD</a></li>
                      <li><a href="#;">AUD</a></li>
                      <li><a href="#;">EUR</a></li>
                      <li><a href="#;">JPY</a></li>
                    </ul> --}}

                    <ul id="currencies" class="cnrLangList">
                      @foreach (getCurrencies() as $currency)
                        <li @class([
                            'selected' =>
                                session()->exists('currency') && session('currency') == $currency->id,
                        ])>
                          <a href="{{ route('customer.set-currency', ['currency' => $currency->id]) }}"
                            @class([
                                'active' =>
                                    session()->exists('currency') && session('currency') == $currency->id,
                            ])>{{ $currency->currency }}</a>
                        </li>
                      @endforeach
                    </ul>



                  </div>
                </div>
                <!--End Setting Dropdown-->

                @auth('buyer')
                <a @auth('buyer') href="{{ route('buyer.dashboard') }}" @endauth>
                  <div class="user-link iconset account-info" @auth('buyer')
                    data-name="{{ Auth::guard('buyer')->user()->fullName }}"
                    data-email="{{ Auth::guard('buyer')->user()->email }}"
                    data-phone="{{ Auth::guard('buyer')->user()->phone }}" @endauth>

                    <i class="icon an an-user-expand"></i>
                    <span class="tooltip-label">Account</span>
                  </div>
                </a>
                @endauth
                @guest('buyer')
                <a data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-toggle="modal" href="javascript:;">
                  <div class="user-link iconset"><i class="icon an an-user-2"></i><span
                      class="tooltip-label">Account</span></div>
                </a>
                @endguest
                <!--Minicart Drawer-->

                <div class="wishlist-link iconset">
                  <a href="{{ route('customer.compare.index') }}">
                    <i class="icon an an-clone"></i>
                    <span
                      class="wishlist-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle">{{
                      count(session('compareProducts', [])) }}</span>
                    <span class="tooltip-label">Compare</span>
                  </a>
                </div>

                <div class="wishlist-link iconset @guest('buyer') @endguest" style="display:block !important">
                  <a href="{{ route('buyer.wishlist') }}">
                    <i class="icon an an-heart-l"></i>
                    <span
                      class="wishlist-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle">{{wishlistCounter()}}</span>
                    <span class="tooltip-label">Wishlist</span>
                  </a>
                </div>

                <div class="header-cart iconset m-hide">

                  <a @if (Request::segment(2)==='checkout' ) href="{{ route('buyer.cart') }}" @endif
                    class="site-header__cart btn-minicart" data-bs-toggle="modal" data-bs-target="#minicart-drawer">
                    <i class="icon an an-sq-bag"></i><span
                      class="site-cart-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle cart-count"></span><span
                      class="tooltip-label">Cart</span>
                  </a>
                  <!--End Minicart Drawer-->

                </div>
                <div class="wishlist-link iconset">
                  <a href="https://api.whatsapp.com/send?phone=+918447722222&text=Hello">
                    <img src="https://littletags.webkype.co/allUsers/customer/images/home-img/whatslogonew1.png"
                      style="width:25px">
                  </a>
                </div>

              </div>
              <!--End Right Action-->
            </div>
            <div class="row desktop-hide mt-3 mb-3">
                <form class="form minisearch search-inline" id="header-search1" action="/products/search?" method="get">
                  <label class="label d-none"><span>Search</span></label>
                  <div class="control">
                    <div class="searchField d-flex">
                      
                      <div class="input-box  w-100">
                        <input type="text" name="search" value="" placeholder="Search products"
                          class="input-text  product-search" style="width:100%" />
                        <button type="submit" title="Search" class="action  search d-inline">
                          <i class="icon an an-search-l"></i>
                        </button>

                      </div>
                    </div>
                  </div>
                </form>
            </div>
          </div>
          <!--Search Popup-->
          <div id="search-popup" class="search-drawer">
            <div class="container">
              <span class="closeSearch an an-times-l"></span>
              <form class="form minisearch" id="header-search" action="#" method="get">
                <label class="label"><span>Search</span></label>
                <div class="control">
                  <div class="searchField">
                    <div class="search-category">
                      <select id="rgsearch-category" name="rgsearch[category]" data-default="All Categories">
                        <option value="00" label="All Categories" selected="selected">All
                          Categories</option>
                        <optgroup id="rgsearch-shop" label="Shop">
                          <option value="0">- All</option>
                          <option value="1">- Men</option>
                          <option value="2">- Women</option>
                          <option value="3">- Shoes</option>
                          <option value="4">- Blouses</option>
                          <option value="5">- Pullovers</option>
                          <option value="6">- Bags</option>
                          <option value="7">- Accessories</option>
                        </optgroup>
                      </select>
                    </div>
                    <div class="input-box">
                      <button type="submit" title="Search" class="action search"><i
                          class="icon an an-search-l"></i></button>
                      <input type="text" name="q" value="" placeholder="Search by keyword or #" class="input-text">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!--End Search Popup-->
        </header>
        <!--Main Navigation Desktop-->
        <div class="menu-outer">
          <nav class="container-fluid">
            <div class="row">
              <div class="col-1 col-sm-12 col-md-12 col-lg-12 align-self-center d-menu-col">
                <!--Desktop Menu-->
                @include('customer.partials.desktop-navbar')
                <!--End Desktop Menu-->
              </div>
            </div>
          </nav>
        </div>
        <!--End Main Navigation Desktop-->
        <!--Search Popup-->
        <div id="search-popup" class="search-drawer">
          <div class="container">
            <span class="closeSearch an an-times-l"></span>
            <form class="form minisearch" id="header-search" action="#" method="get">
              <label class="label"><span>Search</span></label>
              <div class="control">
                <div class="searchField">
                  <div class="search-category">
                    <select id="rgsearch-category" name="rgsearch[category]" data-default="All Categories">
                      <option value="00" label="All Categories" selected="selected">All
                        Categories</option>
                      <optgroup id="rgsearch-shop" label="Shop">
                        <option value="0">- All</option>
                        <option value="1">- Men</option>
                        <option value="2">- Women</option>
                        <option value="3">- Shoes</option>
                        <option value="4">- Blouses</option>
                        <option value="5">- Pullovers</option>
                        <option value="6">- Bags</option>
                        <option value="7">- Accessories</option>
                      </optgroup>
                    </select>
                  </div>


                  <div class="input-box">
                    <button type="submit" title="Search" class="action search" disabled="">
                      <i class="icon an an-search-l"></i>
                    </button>
                    <input type="text" name="q" value="" placeholder="Search by keyword or #" class="input-text" />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--End Search Popup-->
      </div>
    </div>
    <!--End Header-->
    @include('customer.partials.mobile-navbar')
    @yield('customerContent')
    <!--Footer-->
    <div class="footer footer-1">
      <div class="footer-top clearfix">
        <div class="container-fluid">
          <div class="row" style="display:none">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center about-col mb-4">
              <img src="{{ asset('allUsers/customer/images/logo.png') }}" alt="Optimal" class="mb-3" />
              <p>Together, we can make a difference in the lives of women by supporting & empowering them.
              </p>

            </div>
          </div>
          <div class="row">
            @foreach (footerCategories() as $category)
            <div class="col-12 col-sm-12 col-md-4 col-lg-3 footer-links">
              <h4 class="h4">{{ $category->name }}</h4>
              <ul>
                {{-- @foreach ($category->subCategories as $subCategory)
                <li>
                  <a @guest('buyer') @if ($subCategory->name === 'Referral Program')
                    href="javascript:;" data-bs-toggle="modal" data-bs-target="#loginModal"
                    @else
                    href="{{ $subCategory->link }}"
                    @endif
                    @endguest
                    @auth('buyer')
                    href="{{ $subCategory->link }}"
                    @endauth>
                    {{ $subCategory->name }}
                  </a>
                </li>
                @endforeach --}}

                @foreach ($category->subCategories as $subCategory)
                <li>
                  <a @guest('buyer') @if ($subCategory->name === 'Referral Program')
                    href="javascript:;" data-bs-toggle="modal" data-bs-target="#loginModal"
                    @else
                    href="{{ $subCategory->link }}"
                    @endif
                    @if ($subCategory->name === 'Customer Signup')
                    href="javascript:;" data-bs-dismiss="modal" data-bs-toggle="modal"
                    data-bs-target="#registerModal"
                    @else
                    href="{{ $subCategory->link }}"
                    @endif

                    @if ($subCategory->name === 'Customer Login')
                    href="javascript:;" data-bs-toggle="modal" data-bs-target="#loginModal"
                    @else
                    href="{{ $subCategory->link }}"
                    @endif

                    @if ($subCategory->name === 'Customer Login/Signup')
                    href="javascript:;" data-bs-toggle="modal" data-bs-target="#loginModal"
                    @else
                    href="{{ $subCategory->link }}"
                    @endif


                    

                    @endguest
                    @auth('buyer')
                    href="{{ $subCategory->link }}"
                    @endauth>
                    {{ $subCategory->name }}
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
            @endforeach
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 newsletter-col">
              <div class="display-table pt-md-3 pt-lg-0">
                <div class="display-table-cell footer-newsletter">
                  <form action="{{ route('customer.subscribe-newsletter') }}" method="post"
                    class="newsletter-form-footer">
                    @csrf
                    <label class="h4">NEWSLETTER SIGN UP</label>
                    <p>Enter your email to subscribe to our newsletter, join our online community &
                      stay updated
                      on all things fashion. </p>
                    <div class="input-group">
                      <input type="email" class="brounded-start input-group__field newsletter-input mb-0"
                        name="newsletter_email" value="" placeholder="Email address">
                      <span class="input-group__btn">
                        <button type="submit" class="btn newsletter__submit rounded-end" name="commit"
                          id="Subscribe1"><i class="an an-envelope-l"></i></button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
              <ul class="list-inline social-icons mt-3 pt-1">
                <li class="list-inline-item">
                  <x-customer.icon url="https://www.facebook.com/ltlittletags/" icon="an an-facebook" name="Facebook" />
                </li>
                <li class="list-inline-item">
                  <x-customer.icon url="https://www.youtube.com/channel/UCcF3JT6qO2IdFG6NCuG317w" icon="an an-youtube"
                    name="Youtube" />
                </li>
                <li class="list-inline-item">
                  <x-customer.icon url="https://www.instagram.com/little_tags/?hl=en" icon="an an-instagram"
                    name="Instagram" />
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-bottom clearfix">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <span class="me-3">SAFE PAYMENT:</span><img src="{{ asset('allUsers/customer/images/payment.png') }}" />
            </div>

            <div class="col-lg-6 text-right">
              <span class="me-3">SHIPPING METHODS:</span><img
                src="{{ asset('allUsers/bluedart123.png') }}" />
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom clearfix">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 text-center">
              <p>© {{ date('Y') }} LITTLETAGS. ALL RIGHTS RESERVED.</p>
            </div>
          </div>
        </div>
      </div>
      <!--End Footer-->

      <!--Sticky Menubar Mobile-->
      <div class="menubar-mobile d-flex align-items-center justify-content-between d-lg-none">
        <div class="menubar-shop menubar-item">
          <a class="btn--link site-header__menu me-3 d-lg-none mobile-nav--open" href="{{ route('home') }}"><i
              class="menubar-icon an an-th-large-l"></i><span class="menubar-label">Shop</span></a>
        </div>
        <div class="menubar-account menubar-item">
          <a @auth('buyer') href="{{ route('buyer.dashboard') }}" @endauth @guest('buyer') data-bs-toggle="modal"
            data-bs-target="#loginModal" @endguest><span class="menubar-icon an an-user-expand"></span><span
              class="menubar-label">Account</span></a>
        </div>
        <div class="menubar-search menubar-item">
          <a href="{{ route('home') }}"><span class="menubar-icon an an-home-l"></span><span
              class="menubar-label">Home</span></a>
        </div>
        <div class="menubar-wish menubar-item">
          <a href="{{ route('customer.compare.index') }}">
            <span class="span-count position-relative text-center"><span class="menubar-icon an an-clone"></span><span
                class="menubar-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle wishlist-counter">{{
                count(session('compareProducts', [])) }}</span></span>
            <span class="menubar-label">Compare</span>
          </a>
        </div>
        <div class="menubar-wish menubar-item @guest('buyer') d-none @endguest">
          <a href="{{ route('buyer.dashboard', 'wishlist') }}">
            <span class="span-count position-relative text-center"><span class="menubar-icon an an-heart-l"></span><span
                class="menubar-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle wishlist-counter">{{
                wishlistCounter() }}</span></span>
            <span class="menubar-label">Wishlist</span>
          </a>
        </div>
        <div class="menubar-cart menubar-item">
          <a href="javascript:;" class="cartBtn" data-bs-toggle="modal" data-bs-target="#minicart-drawer">
            <span class="span-count position-relative text-center"><span class="menubar-icon an an-sq-bag"></span><span
                class="menubar-count counter d-flex-center justify-content-center position-absolute translate-middle rounded-circle cart-count">0</span></span>
            <span class="menubar-label">Cart</span>
          </a>
        </div>
      </div>
      <!--End Sticky Menubar Mobile-->


      <!--Scoll Top-->
      <span id="site-scroll"><i class="icon an an-chevron-up"></i></span>
      <!--End Scoll Top-->
      <a href="https://api.whatsapp.com/send?phone=+918447722222&text=Hello" target="_blank" class="whatsapp-chat">
        <img src="{{ asset('allUsers/customer/images/home-img/whatslogonew1.png') }}">
      </a>

      <div class="modalOverly"></div>

      <!--Quickview Popup-->
      <div class="loadingBox">
        <div class="an-spin"><i class="icon an an-spinner4"></i></div>
      </div>
      <div id="quickView-modal" class="mfp-with-anim mfp-hide">
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
  
      </div>
      <!--End Quickview Popup-->

      <!--Addtocart Added Popup-->
      <div id="pro-addtocart-popup" class="mfp-with-anim mfp-hide">
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        <div class="addtocart-inner text-center clearfix">
          <h4 class="title mb-3 text-success">Added to your shopping cart successfully.</h4>
          <div class="pro-img mb-3">
            <img class="img-fluid blur-up lazyload"
              src="{{ asset('allUsers/customer/images/products/add-to-cart-popup.jpg') }}"
              data-src="{{ asset('allUsers/customer/images/products/add-to-cart-popup.jpg') }}"
              alt="Added to your shopping cart successfully." title="Added to your shopping cart successfully." />
          </div>
          <div class="pro-details">
            <h5 class="pro-name mb-0">Ditsy Floral Dress</h5>
            <p class="sku my-2">Color: Gray</p>
            <p class="mb-0 qty-total">1 X $113.88</p>
            <div class="addcart-total bg-light mt-3 mb-3 p-2">
              Total: <b class="price">$113.88</b>
            </div>
            <div class="button-action">
              <a href="checkout-style1.html" class="btn btn-primary view-cart mx-1 rounded">Go To
                Checkout</a>
              <a href="{{ route('home') }}" class="btn btn-secondary rounded">Continue Shopping</a>
            </div>
          </div>
        </div>
      </div>
      <!-- End Addtocart Added Popup-->

      <!--Newsletter Popup-->
      <div id="newsletter-modalold" class="style1 mfp-with-anim mfp-hide">
        <div class="d-flex flex-column">

          <div class="newsltr-text text-center">
            <div class="wraptext">
              <p><b>WELCOME TO <span>LIttle Tag</span></b></p>
              <h2 class="title fw-normal mb-4">Enjoy 1000% off on <span>your first purchase</span></h2>
              <p class="popup_signing_text">
                Sign up to subscribe to our newsletter, join our online community & stay updated on all
                things
                fashion.
              </p>
              <form class="mcNewsletter mb-2">
                <div class="input-group d-flex flex-nowrap">
                  <input type="email" class="rounded-start newsletter__input" name="newsletter_email_2" value=""
                    placeholder="Email address" required>
                  <span><button type="submit" class="btn mcNsBtn rounded-end"
                      name="commit"><span>Submit</span></button></span>
                </div>
              </form>
            </div>
          </div>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
      </div>
      <!--End Newsletter Popup-->





      <!-- Including Jquery -->
    </div>
    @if (Request::segment(2) !== 'login')
    <x-customer.login-modal />
    @endif
    <x-customer.otp-login-modal />
    <x-customer.register-modal />
    <x-customer.products.cart-sidebar />
    <input type="hidden" value="{{ getCurrentCurrency()->currency }}" class="selected-currency" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('allUsers/frontend/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('allUsers/frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('allUsers/frontend/js/main.js') }}"></script>
    <script src="{{ asset('allUsers/user/vendor_components/select2/dist/js/select2.full.js') }}"></script>
    <script src="{{ asset('allUsers/frontend/js/vendor/photoswipe.min.js') }}"></script>
    <script src="{{ asset('allUsers/luxon.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('allUsers/frontend/js/my-scripts.js') }}"></script> --}}
    <script type="module" type="text/javascript" src="{{ asset('allUsers/customer/customer.js') }}"></script>
    <script type="module" type="text/javascript" src="{{ asset('allUsers/customer/auth.js') }}"></script>
    <script type="module" src="{{ asset('allUsers/customer/product.js') }}"></script>
    <script type="text/javascript" src="{{ asset('allUsers/customer/js/my-scripts.js') }}"></script>
    
    <script>
      $(document).on({
        mouseenter: function() {
          $(this).addClass("result_hover");
          $(this).siblings(".options").addClass("visible");
        },
        mouseleave: function() {
          $(this).removeClass("result_hover");
          $(this).siblings(".options").removeClass("visible");
        },
        mousemove: function(event) {
          $(this).siblings(".options").position({
            my: "left+15 top+15",
            of: event,
            collision: "none"
          });
        }
      }, ".item.product-item .product-image");
    </script>
      </div>
  <!--End Page Wrapper-->
</body>
</html>