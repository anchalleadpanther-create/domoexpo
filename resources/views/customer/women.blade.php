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
          <a href="https://fashioneditindia.com/designer/masaba">

          <img class="blur-up lazyload desktop-hide" data-src="allUsers/customer/images/websitemayimages/WomenPage-MainBanner-1.jpg"
              src="allUsers/customer/images/websitemayimages/WomenPage-MainBanner-1.jpg" alt="MAKING BRAND VISIBLE"
              title="MAKING BRAND VISIBLE" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-WomenPage-MainBanner-1.jpg"
              src="allUsers/customer/images/websitemayimages/Mobile-WomenPage-MainBanner-1.jpg" alt="MAKING BRAND VISIBLE"
              title="MAKING BRAND VISIBLE" />
          </a>

        </div>
      </div>
      <div class="slide">
        <div class="blur-up lazyload">
          <a href="https://fashioneditindia.com/designer/yam-india">

            <img class="blur-up lazyload desktop-hide"
              data-src="allUsers/customer/images/websitemayimages/WomenPage-MainBanner-2.jpg"
              src="allUsers/customer/images/websitemayimages/WomenPage-MainBanner-2.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-WomenPage-MainBanner-2.jpg"
              src="allUsers/customer/images/websitemayimages/Mobile-WomenPage-MainBanner-2.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
          </a>

        </div>
      </div>
      <div class="slide">
        <div class="blur-up lazyload">
          <a href="https://fashioneditindia.com/designer/paulmi-harsh">

             <img class="blur-up lazyload desktop-hide"
              data-src="allUsers/customer/images/websitemayimages/WomenPage-MainBanner-3.jpg"
              src="allUsers/customer/images/websitemayimages/WomenPage-MainBanner-3.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-WomenPage-MainBanner-3.jpg"
              src="allUsers/customer/images/websitemayimages/Mobile-WomenPage-MainBanner-3.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
          </a>

        </div>
      </div>
	  
	 <div class="slide">
        <div class="blur-up lazyload">
          <a href="https://fashioneditindia.com/designer/studio-rigu">

             <img class="blur-up lazyload desktop-hide"
              data-src="allUsers/customer/images/websitemayimages/WomenPage-MainBanner-4.jpg"
              src="allUsers/customer/images/websitemayimages/WomenPage-MainBanner-4.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-WomenPage-MainBanner4.JPG"
              src="allUsers/customer/images/websitemayimages/Mobile-WomenPage-MainBanner4.JPG" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
          </a>

        </div>
      </div>

    </div>
  </section>
  <!--End Home Slider-->

  <!--Banner Masonary-->
  <section class="section collection-banners style1  d-md-block d-lg-block pt-2 ">
    <div class="container">
      <div class=" grid-mr-20">
        <div class="grid-sizer col-md-3 col-lg-3"></div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/clothing-tops">
                <div class="img">
                  <img class="blur-up lazyload" data-src="allUsers/customer/images/women_img/WomenPage-Categories-1.jpg"
                    src="allUsers/customer/images/women_img/WomenPage-Categories-1.jpg" alt="SUMMER" title="SUMMER" />
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
              <a href="https://fashioneditindia.com/clothing-dresses">
                <div class="img">
                  <img class="blur-up lazyload" data-src="allUsers/customer/images/women_img/WomenPage-Categories-2.jpg"
                    src="allUsers/customer/images/women_img/WomenPage-Categories-2.jpg" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
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
              <a href="https://fashioneditindia.com/clothing-co-ords">
                <div class="img">
                  <img class="blur-up lazyload" data-src="allUsers/customer/images/women_img/WomenPage-Categories-3.jpg"
                    src="allUsers/customer/images/women_img/WomenPage-Categories-3.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
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
              <a href="https://fashioneditindia.com/clothing-kaftans">
                <div class="img">
                  <img class="blur-up lazyload" data-src="allUsers/customer/images/women_img/WomenPage-Categories-4.jpg"
                    src="allUsers/customer/images/women_img/WomenPage-Categories-4.jpg" alt="SUMMER" title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Kaftans</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/clothing-kurta-sets">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/women_img/WomenPage-Categories-5.jpg"
                    src="allUsers/customer/images/women_img/WomenPage-Categories-5.jpg" alt="BOTTOM &amp; JEANS"
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
              <a href="https://fashioneditindia.com/clothing-sarees">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/women_img/WomenPage-Categories-6.jpg"
                    src="allUsers/customer/images/women_img/WomenPage-Categories-6.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Sarees</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/women-clothing-lehengas">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/women_img/WomenPage-Categories-7.jpg"
                    src="allUsers/customer/images/women_img/WomenPage-Categories-7.jpg" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
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
              <a href="https://fashioneditindia.com/clothing-shararas">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/women_img/WomenPage-Categories-8.jpg"
                    src="allUsers/customer/images/women_img/WomenPage-Categories-8.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Sharara Sets</h3>
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
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/women_img/WomenPage-Categories-9.jpg"
                    src="allUsers/customer/images/women_img/WomenPage-Categories-9.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
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
  <section class=" section collection-banners style8 mt-0 pt-0">
    <div class="container">
      <div class="section-header">
        <h2>NEW IN</h2>
        <p>Discover our latest collections</p>
      </div>
      <div class=" grid-mr-10">

        <div class="row mx-0">
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/mandira-wirk">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-NewIn-1.jpg"
                    src="allUsers/customer/images/websitemayimages/WomenPage-NewIn-1.jpg" alt="collection" title="" />
                </div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/bunka">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-NewIn-2.jpg"
                    src="allUsers/customer/images/websitemayimages/WomenPage-NewIn-2.jpg" alt="collection" title="" />
                </div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/kritika-madan-label">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-NewIn-3.jpg"
                    src="allUsers/customer/images/websitemayimages/WomenPage-NewIn-3.jpg" alt="collection" title="" />
                </div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/the-finicky-colorist">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-NewIn-4.jpg"
                    src="allUsers/customer/images/websitemayimages/WomenPage-NewIn-4.jpg" alt="collection"
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
  <section class="section collection-banners style1 d-md-block d-lg-block pt-0 mt-0">
    <div class="container">
      <div class="section-header">
        <h2>SEASON FAVOURITES</h2>
        <p>Effortless & Chic </p>
      </div>
      <div class=" grid-mr-20">
        <div class="grid-sizer col-md-3 col-lg-3"></div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer/tizzi">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-SeasonsFavourites-1.JPG"
                    src="allUsers/customer/images/websitemayimages/WomenPage-SeasonsFavourites-1.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Beach Please</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer/ranna-gill">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-SeasonsFavourites-2.JPG"
                    src="allUsers/customer/images/websitemayimages/WomenPage-SeasonsFavourites-2.JPG"
                    alt="BOTTOM &amp; JEANS" title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Casual & Chic</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer/vaayu">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-SeasonsFavourites-3.JPG"
                    src="allUsers/customer/images/websitemayimages/WomenPage-SeasonsFavourites-3.JPG" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Summer Essentials</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer/parul-preyanka">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-SeasonsFavourites-4.JPG"
                    src="allUsers/customer/images/websitemayimages/WomenPage-SeasonsFavourites-4.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Festive Fusion </h3>
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
        <h2>OUR BESTSELLERS</h2>

      </div>
      <div class=" grid-mr-10">

        <div class="row mx-0">
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/gopi-vaid">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-BestSellers-1 .jpg"
                    src="allUsers/customer/images/websitemayimages/WomenPage-BestSellers-1 .jpg" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/pankaj-nidhi">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-BestSellers-2 2.jpg"
                    src="allUsers/customer/images/websitemayimages/WomenPage-BestSellers-2 2.jpg" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/twinkle-hanspal">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-BestSellers-3.jpg"
                    src="allUsers/customer/images/websitemayimages/WomenPage-BestSellers-3.jpg" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a href="https://fashioneditindia.com/designer/studio-yavi">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-BestSellers-4.jpg"
                    src="allUsers/customer/images/websitemayimages/WomenPage-BestSellers-4.jpg" alt="collection"
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
  <section class="section collection-banners style1  d-md-block d-lg-block pt-0 mt-0">
    <div class="container">
      <div class="section-header">
        <h2>FEI STYLE MUSE</h2>
        <p>Dress like your favourite style icon </p>
      </div>
      <div class=" grid-mr-20">
        <div class="grid-sizer col-md-3 col-lg-3"></div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer/saaksha-kinni">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-FEIStyleMuse-1.JPG"
                    src="allUsers/customer/images/websitemayimages/WomenPage-FEIStyleMuse-1.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Malaika Arora</h3>
                    <p>In Saaksha & Kinni </p>
                  </div>
                </div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer/pankaj-nidhi">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-FEIStyleMuse-2.JPG"
                    src="allUsers/customer/images/websitemayimages/WomenPage-FEIStyleMuse-2.JPG" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Sanjana Sanghi</h3>
                    <p>In Pankaj & Nidhi</p>
                  </div>
                </div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer/studio-rigu">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-FEIStyleMuse-3.JPG"
                    src="allUsers/customer/images/websitemayimages/WomenPage-FEIStyleMuse-3.JPG" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Sonali Bendre</h3>
                    <p>In Studio Rigu </p>
                  </div>
                </div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer/sajeda">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/WomenPage-FEIStyleMuse-4.JPG"
                    src="allUsers/customer/images/websitemayimages/WomenPage-FEIStyleMuse-4.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Summiya Patni</h3>
                    <p>In Sajeda </p>
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
