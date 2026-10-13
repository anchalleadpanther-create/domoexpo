@extends('customer.partials.header')
@section('customerContent')
  {{-- @section('title', '')
@section('description', '')
@section('keywords', '') --}}
  <!--Body Container-->
  <style>
    body,
    h1,
    .h1,
    h2,
    .h2,
    h3,
    .h3,
    h4,
    .h4,
    h5,
    .h5,
    h6,
    .h6,
    p {
      font-family: 'Playfair Display' !important;
    }

    .collection-banners .details .title {
      text-transform: capitalize !important;
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
  </style>

  <div id="page-content">

    <!--Home Slider-->
    <section class="slideshow slideshow-wrapper">
      <div class="home-slideshow">
        <div class="slide">
          <div class="blur-up lazyload">
            <a href="https://fashioneditindia.com/designer/little-luxury">
              <img class="blur-up lazyload desktop-hide"
                data-src="allUsers/customer/images/websitemayimages/KidsPage-MainBanner-1.jpg"
                src="allUsers/customer/images/websitemayimages/KidsPage-MainBanner-1.jpg" alt="MAKING BRAND VISIBLE"
                title="MAKING BRAND VISIBLE" />
              <img class="blur-up lazyload mobile-hide"
                data-src="allUsers/customer/images/websitemayimages/Mobile-KidsPage-MainBanner-1.jpg"
                src="allUsers/customer/images/websitemayimages/Mobile-KidsPage-MainBanner-1.jpg" alt="MAKING BRAND VISIBLE"
                title="MAKING BRAND VISIBLE" />
            </a>

          </div>
        </div>
        <div class="slide">
          <div class="blur-up lazyload">
            <a href="https://fashioneditindia.com/designer/bal-bachche-by-rohit-bal">
              <img class="blur-up lazyload desktop-hide"
                data-src="allUsers/customer/images/websitemayimages/KidsPage-MainBanner-2.JPG"
                src="allUsers/customer/images/websitemayimages/KidsPage-MainBanner-2.JPG" alt="HIGH CONVERTING"
                title="HIGH CONVERTING" />
              <img class="blur-up lazyload mobile-hide"
                data-src="allUsers/customer/images/websitemayimages/Mobile-KidsPage-MainBanner-2.JPG"
                src="allUsers/customer/images/websitemayimages/Mobile-KidsPage-MainBanner-2.JPG" alt="HIGH CONVERTING"
                title="HIGH CONVERTING" />
            </a>

          </div>
        </div>
        <div class="slide">
          <div class="blur-up lazyload">
            <a href="https://fashioneditindia.com/designer/mrbrat">
              <img class="blur-up lazyload desktop-hide"
                data-src="allUsers/customer/images/websitemayimages/KidsPage-MainBanner-3.jpg"
                src="allUsers/customer/images/websitemayimages/KidsPage-MainBanner-3.jpg" alt="HIGH CONVERTING"
                title="HIGH CONVERTING" />
              <img class="blur-up lazyload mobile-hide"
                data-src="allUsers/customer/images/websitemayimages/Mobile-KidsPage-MainBanner-3.jpg"
                src="allUsers/customer/images/websitemayimages/Mobile-KidsPage-MainBanner-3.jpg" alt="HIGH CONVERTING"
                title="HIGH CONVERTING" />
            </a>

          </div>
        </div>
        <div class="slide">
          <div class="blur-up lazyload">
            <a href="https://fashioneditindia.com/designer/darleen-kids-couture">
              <img class="blur-up lazyload desktop-hide"
                data-src="allUsers/customer/images/websitemayimages/KidsPage-MainBanner-4.jpg"
                src="allUsers/customer/images/websitemayimages/KidsPage-MainBanner-4.jpg" alt="HIGH CONVERTING"
                title="HIGH CONVERTING" />
              <img class="blur-up lazyload mobile-hide"
                data-src="allUsers/customer/images/websitemayimages/Mobile-KidsPage-MainBanner-4.jpg"
                src="allUsers/customer/images/websitemayimages/Mobile-KidsPage-MainBanner-4.jpg" alt="HIGH CONVERTING"
                title="HIGH CONVERTING" />
            </a>

          </div>
        </div>

      </div>
    </section>
    <!--End Home Slider-->



    <!--Banner Masonary-->
    <section class=" section collection-banners style8 mt-0 pt-2">
      <div class="container-fluid">
        <div class="section-header">
          <h2>NEW IN</h2>
          <p>Discover our latest collections</p>
        </div>
        <div class=" grid-mr-10">

          <div class="row mx-0">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
              <div class="collection-grid-item banner1">
                <a href="https://fashioneditindia.com/designers/filter?minimumPrice=2500&maximumPrice=14000&brandSlug=sougat-paul&sortType=&gender[]=Girls">
                  <div class="img"><img class="blur-up lazyload"
                      data-src="allUsers/customer/images/kids-img/New In Kids/Artboard 1.jpg"
                      src="allUsers/customer/images/kids-img/New In Kids/Artboard 1.jpg" alt="collection"
                      title="" /></div>

                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
              <div class="collection-grid-item banner1">
                <a href="https://fashioneditindia.com/designer/fayon-kids">
                  <div class="img"><img class="blur-up lazyload"
                      data-src="allUsers/customer/images/kids-img/New In Kids/Artboard 2.jpg"
                      src="allUsers/customer/images/kids-img/New In Kids/Artboard 2.jpg" alt="collection"
                      title="" /></div>

                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
              <div class="collection-grid-item banner1">
                <a href="https://fashioneditindia.com/designer/the-right-cut">
                  <div class="img"><img class="blur-up lazyload"
                      data-src="allUsers/customer/images/kids-img/New In Kids/Artboard 3.jpg"
                      src="allUsers/customer/images/kids-img/New In Kids/Artboard 3.jpg" alt="collection"
                      title="" /></div>

                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
              <div class="collection-grid-item banner1">
                <a href="https://fashioneditindia.com/designers/filter?minimumPrice=3000&maximumPrice=8500&brandSlug=pasha-india&sortType=&gender[]=Girls">
                  <div class="img"><img class="blur-up lazyload"
                      data-src="allUsers/customer/images/kids-img/New In Kids/Artboard 4.jpg"
                      src="allUsers/customer/images/kids-img/New In Kids/Artboard 4.jpg" alt="collection"
                      title="" /></div>

                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!--End Banner Masonary-->


    <!--Banner Masonary-->
    <section class="section collection-banners style1  d-md-block d-lg-block pt-0 mt-0 ">
      <div class="container-fluid">
        <div class="section-header">
          <h2>BOYS</h2>
        </div>
        <div class=" grid-mr-20">
          <div class="grid-sizer col-md-3 col-lg-3"></div>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-boys-t-shirts">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Boys-1.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Boys-1.jpg" alt="SUMMER" title="SUMMER" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Tops & Shirts</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-boys-suit-sets">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Boys-2.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Boys-2.jpg" alt="BOTTOM &amp; JEANS"
                      title="BOTTOM &amp; JEANS" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Suit Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-boys-co-ord-sets">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Boys-3.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Boys-3.jpg" alt="ACCESSORIES" title="ACCESSORIES" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Co-ord Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-boys-bandi-sets">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Boys-4.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Boys-4.jpg" alt="SUMMER" title="SUMMER" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Bandi Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-boys-kurta-pyjamas">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Boys-5.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Boys-5.jpg" alt="BOTTOM &amp; JEANS"
                      title="BOTTOM &amp; JEANS" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Kurta Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-boys-bandhgala-sets">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Boys-6.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Boys-6.jpg" alt="ACCESSORIES" title="ACCESSORIES" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Bandhgala Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-boys-achkan-sets">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Boys-7.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Boys-7.jpg" alt="BOTTOM &amp; JEANS"
                      title="BOTTOM &amp; JEANS" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Achkan Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="#">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Boys-8.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Boys-8.jpg" alt="ACCESSORIES" title="ACCESSORIES" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Dhoti Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item mobile_show"
              style="display:none">
              <div class="collection-grid-item">
                <a href="#">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Boys-9.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Boys-9.jpg" alt="ACCESSORIES" title="ACCESSORIES" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Jumpsuits</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>
    <!--End Banner Masonary-->

    <!--Banner Masonary-->
    <section class="section collection-banners style1  d-md-block d-lg-block pt-0 mt-0 ">
      <div class="container-fluid">
        <div class="section-header">
          <h2>GIRLS</h2>
        </div>
        <div class=" grid-mr-20">
          <div class="grid-sizer col-md-3 col-lg-3"></div>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-girls-tops">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Girls-1.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Girls-1.jpg" alt="Tops & Shirts"
                      title="Tops & Shirts" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Tops & Shirts</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-girls-dresses">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Girls-2.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Girls-2.jpg" alt="Dresses" title="Dresses" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Dresses</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-girls-co-ords">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Girls-3.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Girls-3.jpg" alt="Co-ord Sets" title="Co-ord Sets" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Co-ord Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-girls-jumpsuits">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Girls-4.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Girls-4.jpg" alt="Jumpsuits" title="Jumpsuits" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Jumpsuits</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-girls-kurta-sets">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Girls-5.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Girls-5.jpg" alt="Kurta Sets" title="Kurta Sets" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Kurta Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-girls-lehengas">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Girls-6.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Girls-6.jpg" alt="Lehengas" title="Lehengas" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Lehengas</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-girls-sharara-sets">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Girls-7.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Girls-7.jpg" alt="Sharara Sets"
                      title="Sharara Sets" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Sharara Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
              <div class="collection-grid-item">
                <a href="https://fashioneditindia.com/kids-girls-sarees">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Girls-8.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Girls-8.jpg" alt="Sarees" title="Sarees" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Sarees</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item mobile_show"
              style="display:none">
              <div class="collection-grid-item">
                <a href="#">
                  <div class="img">
                    <img class="blur-up lazyload" data-src="allUsers/customer/images/kids-img/Kids-Girls-9.jpg"
                      src="allUsers/customer/images/kids-img/Kids-Girls-9.jpg" alt="ACCESSORIES" title="ACCESSORIES" />
                  </div>
                  <div class="details center white-text">
                    <div class="inner">
                      <h3 class="title fs-3 mb-1">Kaftan Sets</h3>
                    </div>
                  </div>
                </a>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>
    <!--End Banner Masonary-->


  </div>
  <!--End Body Container-->
@endsection
