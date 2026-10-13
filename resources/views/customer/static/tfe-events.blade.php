@extends('customer.partials.header')
@section('customerContent')
  <!--Body Container-->
  <style>
    .event__box {
      font-size: 17px;
    }

    .event__box iframe {
      width: 500px;
      height: 400px;
      float: right;
      margin-left: 2%;
    }

    .event__box b {
      font-size: 22px;
      font-weight: 600;
      line-height: 1.3;
      margin: 0 auto;
      color: #000;
      text-transform: uppercase;
    }

    .event__box span {
      margin-top: 10px;
      display: block
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

    .collection-hero__image {
      height: 100px !important
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
                <li class="lvl1 parent dropdown"><a href="#upcoming_div">Upcoming event </a> </li>
                <li class="lvl1 parent dropdown"><a href="#past_events_div">Past events </a> </li>
                <li class="lvl1 parent megamenu"><a href="#upcoming_div">Visitor registration </a></li>
                <li class="lvl1 parent megamenu"><a href="#upcoming_div">Exhibitor registration </a></li>
                <li class="lvl1 parent megamenu"><a href="#">Contact us </a></li>
              </ul>
            </nav>
            <!--End Desktop Menu-->
          </div>
        </div>
      </nav>
    </div>
    <div class="about-pstyle2">
      <div class="collection-header inner-content">
        <div class="collection-hero inner mb-0">
          <div class="collection-hero__image"></div>
          <div class="collection-hero__title-wrapper d-flex-justify-center h-100">
            <div class="container position-relative mt-md-0">
              <h2 class="collection-hero__title text-white mt-2 mb-2">FEI EXHIBITIONS</h2>
              <p class="collection__subtitle fs-5 text-white mb-0">Sassy.Classy.Edited</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Home Slider-->
    {{-- <section class="slideshow slideshow-wrapper">
      <div class="home-slideshow">

        <a href="#">
          <img src="allUsers/customer/images/event-bnr.jpg" style="width:100%">
        </a>
      </div>
    </section> --}}
    <!--End Home Slider-->
    <section class="section d-block d-md-none" id="about_div">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="section-header text-left event__box" style="text-align:justify !important">
              <span class="fw-bolder text-center text-dark fs-6">Bringing to you the spirit of Indian luxury, the ultimate
                therapy
                for the soul'.</span>

              <span class="mb-3">Thoughtfully curated by fashion entrepreneurs Aditi Parekh and Ashini Patel, Fashion
                Edit India’s
                story began 7 years ago. From starting with a designer store to pioneering luxury trunk shows, FEI’s
                exhibitions showcase a mix of exceptional upcoming designers & premium brands - ensuring a diverse &
                extravagant shopping experience. </span>

              <iframe class="mb-3" src="https://www.youtube.com/embed/wl8hlvNKdV4" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>

              <span>Our ethos is rooted in identifying & promoting upcoming Indian designers by providing a platform for
                showcasing them in emerging markets-within India & across the globe. Through our traveling exhibitions we
                strive to create curated experiences & bring to you the best of fashion, jewelry, accessories, beauty &
                home.</span>
              <span> With a directory of brands like Abu Jani & Sandeep Khosla, Anita Dongre, Torani, Namrata Joshipura,
                Outhouse, AM:PM Fashions, Urvashi Kaur, Nimai Jewelry to name a few, FEI has had the opportunity to create
                a brand synonymous with artfully curated & experiential exhibitions. </span>

            </div>
          </div>

        </div>
      </div>
    </section>
    <section class="section d-none d-md-block" id="about_div">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="section-header text-left event__box" style="text-align:justify !important">
              <iframe src="https://www.youtube.com/embed/wl8hlvNKdV4" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
              <p class="fw-bolder fs-5 text-dark">Bringing to you the spirit of Indian luxury, the ultimate therapy
                for the soul'.</p>

              <span>Thoughtfully curated by fashion entrepreneurs Aditi Parekh and Ashini Patel, Fashion Edit India’s
                story began 7 years ago. From starting with a designer store to pioneering luxury trunk shows, FEI’s
                exhibitions showcase a mix of exceptional upcoming designers & premium brands - ensuring a diverse &
                extravagant shopping experience. </span>

              <span>Our ethos is rooted in identifying & promoting upcoming Indian designers by providing a platform for
                showcasing them in emerging markets-within India & across the globe. Through our traveling exhibitions we
                strive to create curated experiences & bring to you the best of fashion, jewelry, accessories, beauty &
                home.</span>
              <span> With a directory of brands like Abu Jani & Sandeep Khosla, Anita Dongre, Torani, Namrata Joshipura,
                Outhouse, AM:PM Fashions, Urvashi Kaur, Nimai Jewelry to name a few, FEI has had the opportunity to create
                a brand synonymous with artfully curated & experiential exhibitions. </span>

            </div>
          </div>

        </div>
      </div>
    </section>

    <!--Banner Masonary-->
    <!--Spring Summer Product Slider-->
    <section class="section product-slider" id="upcoming_div">
      <div class="container">
        <div class="row">
          <div class="section-header text-uppercase col-12">
            <h2>UPCOMING EVENTS</h2>
          </div>
        </div>
        <div class="productSlider grid-products prd-grid">
          @foreach ($upcomingEvents as $upcomingEvent)
            <div class="item">
              <div class="product-image ">
                <a href="{{ route('customer.tfe-event-details', $upcomingEvent->slug) }}" class="product-img"
                  tabindex="0">
                  <img class="primary  blur-up lazyloaded"
                    data-src="{{ isset($upcomingEvent->icon) ? asset('uploads/events') . '/' . $upcomingEvent->icon : asset('allUsers/customer/images/logo.png') }}"
                    src="{{ isset($upcomingEvent->icon) ? asset('uploads/events') . '/' . $upcomingEvent->icon : asset('allUsers/customer/images/logo.png') }}"
                    alt="{{ $upcomingEvent->name }}" title="{{ $upcomingEvent->name }}">
                  <img class="hover blur-up lazyloaded"
                    data-src="{{ isset($upcomingEvent->icon) ? asset('uploads/events') . '/' . $upcomingEvent->icon : asset('allUsers/customer/images/logo.png') }}"
                    src="{{ isset($upcomingEvent->icon) ? asset('uploads/events') . '/' . $upcomingEvent->icon : asset('allUsers/customer/images/logo.png') }}"
                    alt="{{ $upcomingEvent->name }}" title="{{ $upcomingEvent->name }}">
                </a>
              </div>
              <div class="product-details text-center">
                <div class="product-name text-uppercase">
                  <a href="#" class="fw-600" tabindex="0">{{ $upcomingEvent->date->format('jS F, Y') }}</a> <br>
                  <a href="#" style="font-size: 11px;text-transform: capitalize;"
                    tabindex="0">{{ $upcomingEvent->city }}</a><br>
                  {{-- <a href="#" style="font-size: 11px;text-transform: capitalize;" tabindex="0">Coming Soon</a> --}}
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </section>
    <!--End Spring Summer Product Slider-->

    <!--Spring Summer Product Slider-->
    <section class="section product-slider" id="past_events_div">
      <div class="container">
        <div class="row">
          <div class="section-header text-uppercase col-12">
            <h2>PAST EVENTS</h2>
          </div>
        </div>
        <div class="productSlider grid-products prd-grid">
          @foreach ($pastEvents as $pastEvent)
            <div class="item">
              <div class="product-image ">
                <a href="{{ route('customer.tfe-event-details', $pastEvent->slug) }}" class="product-img" tabindex="0">
                  <img class="primary  blur-up lazyloaded"
                    data-src="{{ isset($pastEvent->icon) ? asset('uploads/events') . '/' . $pastEvent->icon : asset('allUsers/customer/images/logo.png') }}"
                    src="{{ isset($pastEvent->icon) ? asset('uploads/events') . '/' . $pastEvent->icon : asset('allUsers/customer/images/logo.png') }}"
                    alt="{{ $pastEvent->name }}" title="{{ $pastEvent->name }}">
                  <img class="hover blur-up lazyloaded"
                    data-src="{{ isset($pastEvent->icon) ? asset('uploads/events') . '/' . $pastEvent->icon : asset('allUsers/customer/images/logo.png') }}"
                    src="{{ isset($pastEvent->icon) ? asset('uploads/events') . '/' . $pastEvent->icon : asset('allUsers/customer/images/logo.png') }}"
                    alt="{{ $pastEvent->name }}" title="{{ $pastEvent->name }}">
                </a>
              </div>
              <div class="product-details text-center">
                <div class="product-name text-uppercase">
                  <a href="#" class="fw-600" tabindex="0">{{ $pastEvent->date->format('jS F, Y') }}</a> <br>
                  <a href="#" style="font-size: 11px;text-transform: capitalize;"
                    tabindex="0">{{ $pastEvent->city }}</a><br>
                  {{-- <a href="#" style="font-size: 11px;text-transform: capitalize;" tabindex="0">Coming Soon</a> --}}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <!--End Spring Summer Product Slider-->

    <section @class(['section product-slider'])>
      <div class="container">
        <div class="row">
          <div class="section-header text-uppercase col-12">
            <h2>GALLERY</h2>
          </div>
        </div>
        <div class="productSlider grid-products prd-grid gallery__slider">
          @foreach ($pastEventsImages as $image)
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

  </div>



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
                  <form method="post" action="https://fashionedit.shop/tfe-event-register">
                    <input type="hidden" name="_token" value="1XNan421aWfsOdgbFI6OFhHmbcXjdVlqPkPmcwZ8">
                    <input type="hidden" name="event_id" value="5">
                    <h3>EXHIBITOR FORM</h3>
                    <p>Your one stop destination to experience a luxury curation of the finest Indian design across
                      fashion, beauty & lifestyle.</p>
                    <div class="input-group mb-2">
                      <input type="text" class="" value="" placeholder="Brand Name" name="name">
                    </div>
                    <div class="input-group mb-2">
                      <input type="email" class="" value="" placeholder="Brand Email Id"
                        name="email">
                    </div>
                    <div class="input-group mb-2">
                      <input type="text" class="" value="" placeholder="Brand Contact Number "
                        name="mobile">
                    </div>
                    <div class="input-group mb-2">
                      <input type="text" class="" value="" placeholder="Instagram / Website Link "
                        name="address">
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="input-group mb-2">
                          <label>Please upload your lookbook pdf here</label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="input-group mb-2">
                          <select class="countries" name="country_id" onchange="getStates(this)" data-class=".states"
                            required="">
                            <option value="">Select</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-12 col-sm-12 ">
                      <button class="btn rounded me-auto login-btn" style="width:100%">SUBMIT FORM</button>
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
  <!--End Body Container-->
  </div>
  <!--End Page Wrapper-->
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
