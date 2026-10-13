@extends('customer.partials.header')
@section('customerContent')
{{-- @section('title', '')
@section('description', '')
@section('keywords', '') --}}
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
          <a href="https://fashioneditindia.com/designer/ajiesh-oberoi">
            <img class="blur-up lazyload desktop-hide" data-src="allUsers/customer/images/websitemayimages/WeddingPage-MainBanner-1.jpg"
              src="allUsers/customer/images/websitemayimages/WeddingPage-MainBanner-1.jpg" alt="MAKING BRAND VISIBLE"
              title="MAKING BRAND VISIBLE" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-WeddingPage-MainBanner-1.jpg"
              src="allUsers/customer/images/websitemayimages/Mobile-WeddingPage-MainBanner-1.jpg" alt="MAKING BRAND VISIBLE"
              title="MAKING BRAND VISIBLE" />
          </a>
        </div>
      </div>
      <div class="slide">
        <div class="blur-up lazyload">
          <a href="https://fashioneditindia.com/designer/not-so-serious-by-pallavi-mohan">
            <img class="blur-up lazyload desktop-hide"
              data-src="allUsers/customer/images/websitemayimages/WeddingPage-MainBanner-2.jpg"
              src="allUsers/customer/images/websitemayimages/WeddingPage-MainBanner-2.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-WeddingPage-MainBanner-2.jpg"
              src="allUsers/customer/images/websitemayimages/Mobile-WeddingPage-MainBanner-2.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
          </a>

        </div>
      </div>
      <div class="slide">
        <div class="blur-up lazyload">
          <a href="https://fashioneditindia.com/designer/papa-dont-preach-by-shubhika">
            <img class="blur-up lazyload desktop-hide"
              data-src="allUsers/customer/images/websitemayimages/WeddingPage-MainBanner-3.JPG"
              src="allUsers/customer/images/websitemayimages/WeddingPage-MainBanner-3.JPG" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-WeddingPage-MainBanner-3.JPG"
              src="allUsers/customer/images/websitemayimages/Mobile-WeddingPage-MainBanner-3.JPG" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
          </a>

        </div>
      </div>
	  <div class="slide">
        <div class="blur-up lazyload">
          <a href="https://fashioneditindia.com/designer/varun-bahl">
            <img class="blur-up lazyload desktop-hide"
              data-src="allUsers/customer/images/websitemayimages/WeddingPage-MainBanner-4.jpg"
              src="allUsers/customer/images/websitemayimages/WeddingPage-MainBanner-4.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-WeddingPage-MainBanner-4.jpg"
              src="allUsers/customer/images/websitemayimages/Mobile-WeddingPage-MainBanner-4.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
          </a>

        </div>
      </div>
    </div>
  </section>
  <!--End Home Slider-->

  <!--Banner Masonary-->
  <section class="section collection-banners style1  d-md-block d-lg-block pt-2">
    <div class="container">
      <div class="section-header">
        <h2>CATEGORIES</h2>
        <p>Discover our latest collections</p>
      </div>
      <div class=" grid-mr-20">
        <div class="grid-sizer col-md-3 col-lg-3"></div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/wedding-engagement">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/wedding-img/WeddingPage-Category-1.jpg"
                    src="allUsers/customer/images/wedding-img/WeddingPage-Category-1.jpg" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Engagement</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/wedding-haldi">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/wedding-img/WeddingPage-Category-2.jpg"
                    src="allUsers/customer/images/wedding-img/WeddingPage-Category-2.jpg" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Haldi</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/wedding-mehndi">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/wedding-img/WeddingPage-Category-3.jpg"
                    src="allUsers/customer/images/wedding-img/WeddingPage-Category-3.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Mehndi</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/wedding-cocktail">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/wedding-img/WeddingPage-Category-4.jpg"
                    src="allUsers/customer/images/wedding-img/WeddingPage-Category-4.jpg" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Cocktail</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/wedding-wedding">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/wedding-img/WeddingPage-Category-5.jpg"
                    src="allUsers/customer/images/wedding-img/WeddingPage-Category-5.jpg" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Wedding</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/wedding-reception">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/wedding-img/WeddingPage-Category-6.jpg"
                    src="allUsers/customer/images/wedding-img/WeddingPage-Category-6.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Reception</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/wedding-destination-wedding">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/wedding-img/WeddingPage-Category-7.jpg"
                    src="allUsers/customer/images/wedding-img/WeddingPage-Category-7.jpg" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Destination Wedding</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/wedding-pre-festive">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/wedding-img/WeddingPage-Category-8.jpg"
                    src="allUsers/customer/images/wedding-img/WeddingPage-Category-8.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Pre-Festivities</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item mobile_show"
            style="display:none">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/wedding-bachelorette">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/wedding-img/WeddingPage-Category-9.jpg"
                    src="allUsers/customer/images/wedding-img/WeddingPage-Category-9.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Bachelorette</h3>
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
  <section class=" section collection-banners style8 mt-0 pt-0">
    <div class="container">
      <div class="section-header">
        <h2>Bestsellers</h2>

      </div>
      <div class=" grid-mr-10">

        <div class="row mx-0">
          <div class="col-12 col-sm-6 col-md-6 col-xs-6 col-lg-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/jayanti-reddy">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-BestSellers-1.jpg"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-BestSellers-1.jpg" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-xs-6 col-lg-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=rohit-bal&sortType=&gender[]=Women">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-BestSellers-2.jpg"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-BestSellers-2.jpg" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-xs-6 col-lg-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/osaa-by-adarsh">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-BestSellers-3.jpg"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-BestSellers-3.jpg" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-xs-6 col-lg-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/stotram">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-BestSellers-4.jpg"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-BestSellers-4.jpg" alt="collection"
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
    <div class="container">
      <div class="row">
        <div class="section-header col-12">
          <h2>Accessories</h2>
          <p>Complete your look</p>
        </div>
      </div>
      <div class=" grid-mr-20">
        <div class="grid-sizer col-md-3 col-lg-3"></div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/jewellery">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-Accessories-Jewellery.JPG"
                    src="allUsers/customer/imageswebsitemayimages/WeddingPage-Accessories-Jewellery.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Jewellery</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/accessories-bags">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-Accessories-Bags.JPG"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-Accessories-Bags.JPG"
                    alt="BOTTOM &amp; JEANS" title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Bags</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/accessories-juttis">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-Accessories-Shoes.JPG"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-Accessories-Shoes.JPG" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Shoes</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/jewellery-maang-tikas">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-Accessories-HeadAccessories.JPG"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-Accessories-HeadAccessories.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Head Accessories</h3>
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
    <div class="container">
      <div class="row">
        <div class="section-header  col-12">
          <h2>FEI Style Muse</h2>
          <p>Dress like your favourite style icon </p>
        </div>
      </div>
      <div class=" grid-mr-20">
        <div class="grid-sizer col-md-3 col-lg-3"></div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a
                href="https://fashioneditindia.com/designer/abhinav-mishra">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-FEIStyleMuse-1.JPG"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-FEIStyleMuse-1.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Jahnavi Kapoor</h3>
                    <p>In Abhinav Mishra</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a
                href="https://fashioneditindia.com/designer/gopi-vaid">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-FEIStyleMuse-2.JPG"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-FEIStyleMuse-2.JPG" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Rakulpreet Singh</h3>
                    <p>In Gopi Vaid </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a
                href="https://fashioneditindia.com/designer/aisha-rao">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-FEIStyleMuse-3.JPG"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-FEIStyleMuse-3.JPG" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Mira Kapoor</h3>
                    <p>In  Aisha Rao   </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer/vvani-by-vani-vats">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WeddingPage-FEIStyleMuse-4.JPG"
                    src="allUsers/customer/images/websitemayimages/WeddingPage-FEIStyleMuse-4.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Mrunal Thakur</h3>
                    <p>In Vvani by Vani Vats</p>
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

