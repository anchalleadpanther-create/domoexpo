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
          <a href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=rohit-bal&sortType=&gender[]=Men">
            <img class="blur-up lazyload desktop-hide" data-src="allUsers/customer/images/websitemayimages/MenPage-MainBanner-1.jpg"
              src="allUsers/customer/images/websitemayimages/MenPage-MainBanner-1.jpg" alt="MAKING BRAND VISIBLE"
              title="MAKING BRAND VISIBLE" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-MenPage-MainBanner-1.jpg"
              src="allUsers/customer/images/websitemayimages/Mobile-MenPage-MainBanner-1.jpg" alt="MAKING BRAND VISIBLE"
              title="MAKING BRAND VISIBLE" />
          </a>

        </div>
      </div>
      <div class="slide">
        <div class="blur-up lazyload">
          <a
            href="https://fashioneditindia.com/designer/blue-by-raghevandra-rathore?utm_source=Men_page&utm_medium=Main_Banners">
            <img class="blur-up lazyload desktop-hide"
              data-src="allUsers/customer/images/websitemayimages/MenPage-MainBanner-2.jpg"
              src="allUsers/customer/images/websitemayimages/MenPage-MainBanner-2.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-MenPage-MainBanner-2.jpg"
              src="allUsers/customer/images/websitemayimages/Mobile-MenPage-MainBanner-2.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
          </a>

        </div>
      </div>
      <div class="slide">
        <div class="blur-up lazyload">
          <a href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=genes-lecoanet-hemant&sortType=&gender[]=Men">
            <img class="blur-up lazyload desktop-hide"
              data-src="allUsers/customer/images/websitemayimages/MenPage-MainBanner-3.jpg"
              src="allUsers/customer/images/websitemayimages/MenPage-MainBanner-3.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-MenPage-MainBanner-3.jpg"
              src="allUsers/customer/images/websitemayimages/Mobile-MenPage-MainBanner-3.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
          </a>

        </div>
      </div>
      <div class="slide">
        <div class="blur-up lazyload">
          <a
            href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=varun-chakkilam&sortType=&gender[]=Men">
            <img class="blur-up lazyload desktop-hide"
              data-src="allUsers/customer/images/websitemayimages/MenPage-MainBanner-4.jpg"
              src="allUsers/customer/images/websitemayimages/MenPage-MainBanner-4.jpg" alt="HIGH CONVERTING"
              title="HIGH CONVERTING" />
            <img class="blur-up lazyload mobile-hide" data-src="allUsers/customer/images/websitemayimages/Mobile-MenPage-MainBanner-4.jpg"
              src="allUsers/customer/images/websitemayimages/Mobile-MenPage-MainBanner-4.jpg" alt="HIGH CONVERTING"
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
              <a href="https://fashioneditindia.com/mens-clothing-shirts">
                <div class="img">
                  <img class="blur-up lazyload" data-src="allUsers/customer/images/men_img/categories-men/1 Shirts.jpg"
                    src="allUsers/customer/images/men_img/categories-men/1 Shirts.jpg" alt="SUMMER" title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Shirts</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/mens-clothing-nehru-jackets">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/men_img/categories-men/2 nehru jackets.jpg"
                    src="allUsers/customer/images/men_img/categories-men/2 nehru jackets.jpg" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Nehru Jackets</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/mens-clothing-bandhgalas">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/men_img/categories-men/3 bandhgalas.jpg"
                    src="allUsers/customer/images/men_img/categories-men/3 bandhgalas.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Bandhgalas</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/mens-clothing-sherwanis">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/men_img/categories-men/4 sherwanis.jpg"
                    src="allUsers/customer/images/men_img/categories-men/4 sherwanis.jpg" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Sherwanis</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/mens-clothing-kurta-sets">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/men_img/categories-men/5 kurta sets.jpg"
                    src="allUsers/customer/images/men_img/categories-men/5 kurta sets.jpg" alt="BOTTOM &amp; JEANS"
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
              <a href="https://fashioneditindia.com/mens-clothing-jackets-blazers">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/men_img/categories-men/6 blazers.jpg"
                    src="allUsers/customer/images/men_img/categories-men/6 blazers.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Blazers</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/mens-clothing-t-shirts">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/men_img/categories-men/7 t shirts.jpg"
                    src="allUsers/customer/images/men_img/categories-men/7 t shirts.jpg" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">T-shirts</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/mens-clothing-co-ord-sets">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/men_img/categories-men/8 co ord sets.jpg"
                    src="allUsers/customer/images/men_img/categories-men/8 co ord sets.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Co-ord sets</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-4 banner-item cl-item mobile_show"
            style="display:none">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/mens-clothing-suits">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/men_img/categories-men/9 co-ord sets.jpg"
                    src="allUsers/customer/images/men_img/categories-men/9 co-ord sets.jpg" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Suits</h3>
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
              <a
                href="https://fashioneditindia.com/designer/bohame">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/MenPage-NewIn-Banner1.jpg"
                    src="allUsers/customer/images/websitemayimages/MenPage-NewIn-Banner1.jpg" alt="collection" title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a
                href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=studio-rigu&sortType=&gender[]=Men">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/MenPage-NewIn-Banner2.jpg"
                    src="allUsers/customer/images/websitemayimages/MenPage-NewIn-Banner2.jpg" alt="collection" title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6  col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a
                href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=masaba&sortType=&gender[]=Men">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/MenPage-NewIn-Banner3.jpg"
                    src="allUsers/customer/images/websitemayimages/MenPage-NewIn-Banner3.jpg" alt="collection" title="" />
                </div>

              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xs-6 mw-100 cl-item banner-item">
            <div class="collection-grid-item banner1">
              <a
                href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=itrh&sortType=&gender[]=Men">
                <div class="img"><img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/MenPage-NewIn-Banner4.jpg"
                    src="allUsers/customer/images/websitemayimages/MenPage-NewIn-Banner4.jpg" alt="collection" title="" /></div>

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
        <div class="row">
          <div class="section-header col-12">
            <h2>SEASON FAVOURITES</h2>
            <p>Dapper & Dashing</p>
          </div>
        </div>
      </div>
      <div class=" grid-mr-20">
        <div class="grid-sizer col-md-3 col-lg-3"></div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a
                href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=soniya-g&sortType=&gender[]=Men">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/MenPage-SeasonsFavourites-1.JPG"
                    src="allUsers/customer/images/websitemayimages/MenPage-SeasonsFavourites-1.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Summer Festive</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer/project-bandi?utm_source=Men_page&utm_medium=Seasons_Favourites&utm_campaign=Reinvented_Classics_Project_Bandi">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/MenPage-SeasonsFavourites-2.JPG"
                    src="allUsers/customer/images/websitemayimages/MenPage-SeasonsFavourites-2.JPG" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Reinvented Classics</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a
                href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=son-of-a-noble&sortType=&gender[]=Men&gender[]=MEN">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/MenPage-SeasonsFavourites-3.JPG"
                    src="allUsers/customer/images/websitemayimages/MenPage-SeasonsFavourites-3.JPG" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Artisanal & Edgy</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a
                href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=shivan-narresh&sortType=&gender[]=Men">
                <div class="img">
                  <img class="blur-up lazyload"
                    data-src="allUsers/customer/images/websitemayimages/MenPage-SeasonsFavourites-4.JPG"
                    src="allUsers/customer/images/websitemayimages/MenPage-SeasonsFavourites-4.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Vacation Wardrobe</h3>
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
        <div class="row">
          <div class="section-header col-12">
            <h2>FEI STYLE MUSE</h2>
            <p>Dress like your favourite style icon </p>
          </div>
        </div>
      </div>
      <div class=" grid-mr-20">
        <div class="grid-sizer col-md-3 col-lg-3"></div>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a
                href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=shivan-narresh&sortType=&gender[]=Men">
                <div class="img">
                  <img class="blur-up lazyload" data-src="allUsers/customer/images/websitemayimages/MenPage-FEIStyleMuse-1.JPG"
                    src="allUsers/customer/images/websitemayimages/MenPage-FEIStyleMuse-1.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Vicky Kaushal</h3>
                    <p>In Shivan & Narresh</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a
                href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=masaba&sortType=&gender[]=Men">
                <div class="img">
                  <img class="blur-up lazyload" data-src="allUsers/customer/images/websitemayimages/MenPage-FEIStyleMuse-2.JPG"
                    src="allUsers/customer/images/websitemayimages/MenPage-FEIStyleMuse-2.JPG" alt="BOTTOM &amp; JEANS"
                    title="BOTTOM &amp; JEANS" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Ritwik Bhowmik</h3>
                    <p>In Masaba</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a
                href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=abhishek-sharma&sortType=&gender[]=Men">
                <div class="img">
                  <img class="blur-up lazyload" data-src="allUsers/customer/images/websitemayimages/MenPage-FEIStyleMuse-3.JPG"
                    src="allUsers/customer/images/websitemayimages/MenPage-FEIStyleMuse-3.JPG" alt="ACCESSORIES"
                    title="ACCESSORIES" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Ritesh Deshmukh</h3>
                    <p>In Abhishek Sharma </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xs-6 banner-item cl-item">
            <div class="collection-grid-item">
              <a href="https://fashioneditindia.com/designer-filter/filters?minimumPrice=&maximumPrice=&brandSlug=advait&sortType=&gender[]=Men">
                <div class="img">
                  <img class="blur-up lazyload" data-src="allUsers/customer/images/websitemayimages/MenPage-FEIStyleMuse-4.JPG"
                    src="allUsers/customer/images/websitemayimages/MenPage-FEIStyleMuse-4.JPG" alt="SUMMER"
                    title="SUMMER" />
                </div>
                <div class="details center white-text">
                  <div class="inner">
                    <h3 class="title fs-3 mb-1">Slow Cheeta </h3>
                    <p>In Advait </p>
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
