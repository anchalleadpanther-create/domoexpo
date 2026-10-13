@extends('customer.partials.header')
@section('customerContent')
  <!--Body Container-->
  <style>
    .collection-banners .details .title {
      text-transform: capitalize !important;
    }

    .event-form {
      position: relative;
      width: 100%;
      margin: 30px 0;
      background: #fef3f7;
      padding: 20px 40px;
    }

    @media only screen and (max-width: 575px) {
      .collection-grid-item .details.center.white-text {
        width: 100% !important;
        padding: 18px 0 0;
      }

      .collection-grid-item .details.center.white-text h3.title {
        font-size: 12px !important;
      }

      .collection-grid-item .details.center.white-text p {
        font-size: 10px !important;
      }

      .event-form {
        position: relative !important;
        top: 0 !important;
        left: 0 !important;
        margin: 20px 0 30px 0;
      }
    }

    .gallery__slider .gallery {
      background: #373027;
      border-radius: 10px;
    }

    .gallery__slider .gallery img {
      height: 100%;
      width: auto;
      margin: auto;
    }

    .pswp .pswp__container .pswp__item img {
      width: auto !important;
      height: 600px !important;
      left: 0;
      margin: auto;
      right: 0;
      top: 0;
      bottom: 0;
    }

    .pswp .pswp__container .pswp__zoom-wrap {
      transform: none !important;
    }

    .collection-banners .details .title {
      text-transform: capitalize !important;
    }

    .collection-banners .collection-grid-item .img:before {
      /*background: rgba(0, 0, 0, .5);*/
      width: 100%;
      position: absolute;
      left: 0;
      content: " ";
      z-index: 9;
      height: 100%;
    }

    .collection-banners.style1 .collection-grid-item .details {
      z-index: 9999
    }

    .grid-products-wrappp .product-name a {
      color: #000;
      font-size: 14px;
    }

    .grid-products-wrappp p {
      font-size: 14px;
    }

    .grid-products-wrappp .bordr-btn {
      text-align: center;
      border: 2px solid #222;
      padding: 6px;
      margin-top: 20px;
    }

    .menu-outer-header-- .site-nav li a {
      font-size: 16px !important;
      padding: 10px 20px !important;
    }

    #about_div p {
      text-align: justify;
    }

    @media only screen and (max-width: 575px) {
      .collection-grid-item .details.center.white-text {
        width: 100% !important;
        padding: 18px 0 0;
      }

      .collection-grid-item .details.center.white-text h3.title {
        font-size: 12px !important;
      }

      .collection-grid-item .details.center.white-text p {
        font-size: 10px !important;
      }
    }

    .collection-banners .details .title {
      text-transform: capitalize !important;
    }

    .event-form {
      position: relative;
      width: 100%;
      margin: 30px 0;
      background: #fef3f7;
      padding: 20px 40px;
    }

    @media only screen and (max-width: 575px) {
      .collection-grid-item .details.center.white-text {
        width: 100% !important;
        padding: 18px 0 0;
      }

      .collection-grid-item .details.center.white-text h3.title {
        font-size: 12px !important;
      }

      .collection-grid-item .details.center.white-text p {
        font-size: 10px !important;
      }

      .event-form {
        position: relative !important;
        top: 0 !important;
        left: 0 !important;
        margin: 20px 0 30px 0;
      }
    }

    @media only screen and (max-width: 767px) {
      .grid-products.productSlider .slick-arrow {
        margin-top: -4px !important;
      }

      .pswp .pswp__container .pswp__item img {
        width: 100% !important;
        height: auto !important;
      }

      .event__box iframe {
        width: 100% !important;
        height: 250px !important;

      }

      .pswp--touch .pswp__button--arrow--left,
      .pswp--touch .pswp__button--arrow--right {
        visibility: visible !important;
      }

      .pswp__top-bar,
      .pswp__caption {
        background-color: rgba(0, 0, 0, .8) !important;
      }

      .pswp__bg {
        opacity: 0.8 !important;
      }
    }
  </style>

  <div id="page-content">
    <div class="menu-outer menu-outer-header--">
      <nav class="container">
        <div class="row">
          <div class="col-1 col-sm-12 col-md-12 col-lg-12 align-self-center d-menu-col">
            <!--Desktop Menu-->
            <nav class="grid__item">
              <ul id="siteNav" class="site-nav medium center hidearrow">
                <li class="lvl1 parent"><a href="/">Shop </a></li>
                <li class="lvl1 parent megamenu"><a href="{{ route('customer.static-page', 'about-fei') }}">About us </a>
                </li>
                <li class="lvl1 parent dropdown"><a href="{{ route('customer.tfe-events') }}/#upcoming_div">Upcoming event
                  </a> </li>
                <li class="lvl1 parent dropdown"><a href="{{ route('customer.tfe-events') }}/#past_events_div">Past events
                  </a> </li>
                <li class="lvl1 parent megamenu"><a href="{{ route('customer.tfe-events') }}/#upcoming_div">Visitor
                    registration </a></li>
                <li class="lvl1 parent megamenu"><a href="{{ route('customer.tfe-events') }}/#upcoming_div">Exhibitor
                    registration </a></li>
                <li class="lvl1 parent megamenu"><a href="#">Contact us</a></li>
              </ul>
            </nav>
            <!--End Desktop Menu-->
          </div>
        </div>
      </nav>
    </div>
    <!--Home Slider-->
    <section class="slideshow slideshow-wrapper">
      <div class="home-slideshow">
        <img
          src="{{ isset($event->banner) ? asset('uploads/events') . '/' . $event->banner : asset('allUsers/800X200.png') }}"
          style="width:100%;">
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="section-header text-left pt-4">
              <h2 class="mb-2">{{ $event->title }}</h2>
              <p>
                {!! htmlspecialchars_decode($event->description) !!}
              </p>
              <p class="mb-0"><b>Organised By :</b> {{ $event->organised_by }} </p>
              <p class="mb-0"><b>Date :</b> {{ $event->date->format('jS F, Y') }}</p>
              <p class="mb-0"><b>Time :</b> {{ $event->time }}</p>
              <p class="mb-0"><b>Venue :</b> {{ $event->venue }}{{ isset($event->city) ? ', ' . $event->city : null }}
              </p>
              <p @class(['mt-3', 'd-none' => $event->type === 'Past Event'])>To participate in our upcoming exhibition & know more, please <a
                  data-bs-toggle="modal" data-bs-target="#exhibitorModal" href="javascript:;" style="color:#d17f96">click
                  here</a>.</p>
            </div>
          </div>
          <div class="col-sm-4"style=" position: relative;">
            <div @class([
                'event-form text-center',
                'd-none' => $event->type === 'Past Event',
            ])>
              <form method="post" action="{{ route('customer.tfe-event-register') }}">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}" />
                <h3>VISITOR REGISTRATION</h3>
                <p>
                  Your one stop destination to experience a luxury curation of the finest Indian design across fashion,
                  beauty & lifestyle.
                </p>

                <div class="input-group mb-2">
                  <input type="text" class="" value="{{ old('name') }}" placeholder="Name" name="name">
                </div>
                <div class="input-group mb-2">
                  <input type="email" class="" value="{{ old('email') }}" placeholder="Email " name="email">
                </div>
                <div class="input-group mb-2">
                  <input type="text" class="" value="{{ old('mobile') }}" placeholder="Mobile " name="mobile">
                </div>
                <div class="input-group mb-2">
                  <input type="text" class="" value="{{ old('address') }}" placeholder="Address "
                    name="address">
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="input-group mb-2">
                      <select class="countries" name="country_id" onchange="getStates(this)" data-class=".states"
                        required>
                        <option value="">Select</option>
                        @foreach (getCountries() as $country)
                          <option @if (old('country') == $country->id) selected @endif value="{{ $country->id }}">
                            {{ $country->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group mb-2">
                      <select class="states" name="state_id" onchange="getCities(this)" data-class=".cities" required>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="input-group mb-2">
                      <select class="form-control cities" name="city_id" required>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group mb-2">
                      <input type="text" class="" value="{{ old('pincode') }}" placeholder="Pincode "
                        name="pincode">
                    </div>
                  </div>
                </div>
                <div class="form-group col-12 col-sm-12 ">
                  <button class="btn rounded me-auto" style="width:100%">Sign In</button>
                </div>

              </form>
            </div>
            <div @class([
                'mt-4 ',
                'd-none' =>
                    $event->type === 'Upcoming Event' || $event->youtube_id === null,
            ])>
              <iframe style="width:100%;height:400px" src="https://www.youtube.com/embed/{{ $event->youtube_id }}"
                title="{{ $event->name }}" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Home Slider-->
    <!--Spring Summer Product Slider-->
    <section @class([
        'section product-slider p-0',
        'd-none' => $event->type === 'Upcoming Event',
    ])>
      <div class="container">
        <div class="row">
          <div class="section-header text-uppercase col-12">
            <h2>GALLERY</h2>
          </div>
        </div>
        <div class="productSlider grid-products prd-grid gallery__slider">
          @foreach ($event->images as $image)
            <div class="item">
              <div class="cl-item grid-lookbook">
                <div class="lookbook-item gallery">
                  <a class="zoom" href="{{ asset('uploads/events') . '/' . $image }}" data-size="500x500">
                    <img class="rounded blur-up lazyload" data-src="{{ asset('uploads/events') . '/' . $image }}"
                      src="{{ asset('uploads/events') . '/' . $image }}" alt="lookbook" title=" " />
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <!--End Spring Summer Product Slider-->

  </div>
  <!--End Body Container-->

  <div class="modal " id="exhibitorModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-body" style="padding:0">
          <div class="login-register">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
              style="position: absolute; right: 9px;top: 15px;z-index: 99;"></button>
            <div class="">
              <div class="col-md-12 mb-4 mb-md-0">
                <div class="event-form text-center row" style="margin:0">
                  <form method="post" action="{{ route('customer.tfe-event-exhibitor-register') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <h3>EXHIBITOR FORM</h3>
                    <p>Your one stop destination to experience a luxury curation of the finest Indian design across
                      fashion, beauty & lifestyle.</p>
                    <div class="input-group mb-2">
                      <input type="text" class="" value="" maxlength="100" required
                        placeholder="Brand Name" name="name">
                    </div>
                    <div class="input-group mb-2">
                      <input type="email" class="" value="" maxlength="100" required
                        placeholder="Brand Email Id" name="email">
                    </div>
                    <div class="input-group mb-2">
                      <input type="text" class="" value="" maxlength="20"
                        placeholder="Brand Contact Number " name="mobile">
                    </div>
                    <div class="input-group mb-2">
                      <input type="text" class="" value="" maxlength="1000"
                        placeholder="Instagram / Website Link " name="link">
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="input-group mb-2">
                          <label>Please upload your lookbook pdf here</label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="input-group mb-2">
                          <input type="file" class="form-control" name="lookbook_pdf" accept=".pdf"
                            required="" />
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-12 col-sm-12 ">
                      <button class="btn rounded me-auto" style="width:100%">SUBMIT FORM</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>
      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
          <div class="pswp__counter"></div>
          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
          <div class="pswp__share-tooltip"></div>
        </div>
        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
        <div class="pswp__caption">
          <div class="pswp__caption__center"></div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('allUsers/customer/gallery.js') }}"></script>
@endsection
