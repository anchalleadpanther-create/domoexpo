@extends('customer.partials-fn.header')
@section('customerContent')

<link rel="stylesheet" href="https://purchasync.com/allUsers/frontend/css/market-place-3.css">
<div id="homepage-5">
   <div class="ps-home-banner pb-4">
      <div class="container">
         <div class="ps-section__left">
            <h4 class="mb-0 text-center"><img src="{{ asset('allUsers/frontend/img/menu_icon.png') }}" style="width:20px"> All Categories</h4>
            <ul class="menu--dropdown">
               <li><a href="#" class="mt-4"><b>Products</b></a></li>
               @foreach (navbarCategories() as $category)
               @if ($category->children !== null)
               
               <li class="menu-item-has-children has-mega-menu">
                  <a href="#"> {{ $category->category_name }} <i class="fa fa-angle-right"></i></a>
                  <div class="mega-menu">
                     <div class="mega-menu__row">
                        <!-- Start row -->
                        @foreach ($category->children  as $key => $subchildren)
                        @if($key % 3 == 0 && $key != 0)
                     </div>
                     <!-- Close the current row after 3 columns -->
                     <div class="mega-menu__row">
                        <!-- Start a new row for the next 3 columns -->
                        @endif
                        <div class="mega-menu__column">
                           <!-- Start column -->
                           <h4>{{ $subchildren->category_name }}<span class="sub-toggle"></span></h4>
                           @if ($subchildren->children !== null)
                           <ul class="mega-menu__list">
                              @foreach ($subchildren->children as $subsubchildren)
                              <li><a href="#">{{ $subsubchildren->category_name }}</a></li>
                              @endforeach
                           </ul>
                           @endif
                        </div>
                        <!-- Close column -->

                        @endforeach
                     </div>
                     <!-- Close the final row -->
                  </div>
                  <!-- Close the mega-menu -->
               </li>
               @endif
               @endforeach
               <li><a href="#" class="mt-4"><b>Services</b></a></li>
               @foreach (getServiceCategories() as $category)
               @if ($category->children !== null)
               @php 
               $breakOn = 0;
               @endphp
               <li class="menu-item-has-children has-mega-menu">
                  <a href="#"> {{ $category->category_name }} <i class="fa fa-angle-right"></i></a>
                  <div class="mega-menu">
                     <div class="mega-menu__row">
                        <!-- Start row -->
                        @foreach ($category->children as $subchildren)
                        @if($breakOn % 3 == 0 && $breakOn != 0)
                     </div>
                     <!-- Close the current row after 3 columns -->
                     <div class="mega-menu__row">
                        <!-- Start a new row for the next 3 columns -->
                        @endif
                        <div class="mega-menu__column">
                           <!-- Start column -->
                           <h4>{{ $subchildren->category_name }}<span class="sub-toggle"></span></h4>
                           @if ($subchildren->children !== null)
                           <ul class="mega-menu__list">
                              @foreach ($subchildren->children as $subsubchildren)
                              <li><a href="#">{{ $subsubchildren->category_name }}</a></li>
                              @endforeach
                           </ul>
                           @endif
                        </div>
                        <!-- Close column -->
                        @php 
                        $breakOn++;
                        @endphp
                        @endforeach
                     </div>
                     <!-- Close the final row -->
                  </div>
                  <!-- Close the mega-menu -->
               </li>
               @endif
               @endforeach
            </ul>
         </div>
         <div class="ps-section__center position_relative mt70">
            <div class="ps-home-head">
               <ul>
                  <li><a href="{{route('seller.seller')}}"><img src="allUsers/frontend/img/home-head_icon1.png"> Become a seller</a></li>
                  <li><a href=""><img src="allUsers/frontend/img/home-head_icon2.png"> Partner with us</a></li>
                  <li><a href=""><img src="allUsers/frontend/img/home-head_icon3.png"> Blogs & News</a></li>
                  <li><a href=""><img src="allUsers/frontend/img/home-head_icon4.png">Invite a friend</a></li>
                  <li><a href="" class="ps-btn"><img src="allUsers/frontend/img/btn_icon-head.png">Request for Quotation</a></li>
               </ul>
            </div>
            <div class="ps-home-banner">
               <div class="ps-carousel--nav-inside">
                  <div class="ps-banner--market-1" data-background="https://purchasync.com/allUsers/frontend/img/banner-new.png" >
                     <div class="ps-banner__content col-sm-7">
                        <h2>Source Directly from Global & Local Suppliers.</h2>
                        <h2 class="blue-text">Engage, Compare, Decide!</h2>
                        <p>Simplifying Procurement and Selling for<br> the Hospitality and Food Service Industry</p>
                        <a class="ps-btn mt-2" href="#">Register Now</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="ps-top-categories mt-4 ps-trending_section">
               <h3>Popular</h3>
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 ">
                     <div class="ps-block--category mb-0 text-center">
                        <a class="ps-block__overlay" href="#"></a>
                        <img src="https://purchasync.com/allUsers/frontend/img/headPopular_img1.png" alt="" >
                        <p>Food Waste</p>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 ">
                     <div class="ps-block--category mb-0 text-center">
                        <a class="ps-block__overlay" href="#"></a>
                        <img src="https://purchasync.com/allUsers/frontend/img/headPopular_img2.png" alt="" >
                        <p>Local Sourcing</p>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 ">
                     <div class="ps-block--category mb-0 text-center">
                        <a class="ps-block__overlay" href="#"></a>
                        <img src="https://purchasync.com/allUsers/frontend/img/headPopular_img3.png" alt="" >
                        <p>Plastic Free</p>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 ">
                     <div class="ps-block--category mb-0 text-center">
                        <a class="ps-block__overlay" href="#"></a>
                        <img src="https://purchasync.com/allUsers/frontend/img/headPopular_img4.png" alt="" >
                        <p>Technology</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="ps-section__right mt70">
            <a href="#">
               <img src="https://purchasync.com/allUsers/frontend/img/deal_img1.png" alt="">
               <h3 class="blue-bgg">
                  Deals & Promotions 
                  <svg height="80" width="100%" preserveAspectRatio="none" viewBox="0 0 50 80">
                     <polygon points="10,0 50,0 50,80 10,80 30,40 " class="step2shape defaultcolor" />
                  </svg>
               </h3>
            </a>
            <a href="#">
               <img src="https://purchasync.com/allUsers/frontend/img/deal_img2.png" alt="">
               <h3 class="green-bgg">
                  Sustainability 
                  <svg height="80" width="100%" preserveAspectRatio="none" viewBox="0 0 50 80">
                     <polygon points="10,0 50,0 50,80 10,80 30,40 " class="step2shape defaultcolor" />
                  </svg>
               </h3>
            </a>
         </div>
      </div>
   </div>
</div>
<main id="homepage-7">
   <div class="ps-home-banner" style="display:none">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12 p-0">
               <img src="{{ asset('allUsers/frontend/img/home/home-page__img.png')}}">
            </div>
         </div>
         <!--div class="ps-section__left">
            <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
               <a href="#"><img src="{{ asset('allUsers/frontend/img/home/slider1.jpg')}}" alt="" style="width:100%;height:470px"></a>
               <a href="#"><img src="{{ asset('allUsers/frontend/img/home/slider2.jpg')}}" alt="" style="width:100%;height:470px"></a>
            </div>
            </div>
            <div class="ps-section__right">
            <a class="ps-collection" href="#"><img src="{{ asset('allUsers/frontend/img/home/b1.jpg')}}" alt=""></a>
            <a class="ps-collection" href="#"><img src="{{ asset('allUsers/frontend/img/home/b2.jpg')}}" alt=""></a>
            </div-->
      </div>
   </div>
   <div class="ps-home-banner" style="display:none">
      <div class="ps-carousel--nav-inside  " >
         <div class="ps-banner--market-1" data-background="https://purchasync.com/allUsers/frontend/img/home/home-page__img.png" >
            <div class="ps-banner__content col-sm-6">
               <h1>The ultimate sourcing hub for <span class="text-white">Hotels & Restaurants</span></h1>
               <p class="text-white">Save time, money, and resources while building lasting partnerships</p>
               <a class="ps-btn mt-5" href="#">Get Started ></a>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-site-features ps-block-features white-bg__ gap-pt50" style="margin-top:-40px;display:none">
      <div class="container">
         <div class="ps-block--site-features ps-block--site-features-2">
            <div class="ps-block__item">
               <div class="ps-block__left"><img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png"></div>
               <div class="ps-block__right">
                  <h4>Exclusive for Hospitality</h4>
               </div>
            </div>
            <div class="ps-block__item">
               <div class="ps-block__left"><img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png"></div>
               <div class="ps-block__right">
                  <h4>Qualified Vendors</h4>
               </div>
            </div>
            <div class="ps-block__item">
               <div class="ps-block__left"><img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png"></div>
               <div class="ps-block__right">
                  <h4>Zero commission</h4>
               </div>
            </div>
            <div class="ps-block__item">
               <div class="ps-block__left"><img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png"></div>
               <div class="ps-block__right">
                  <h4>Direct Connection</h4>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-home-promotions white-bg__ gap-pt50 mb-0" style="margin-top:-30px">
      <div class="container">
         <div class="ps-section__header">
            <h3>Offers &amp; Promotions</h3>
         </div>
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
               <img src="https://purchasync.com/allUsers/frontend/img/home/home-photo/promotion-img1.png" alt="" style="width:100%">
               <div class="ps-promotion-content">
                  <h4 class="pink-text">Get up to 15% off</h4>
                  <h3 class="text-white text-uppercase">Restaurant Equipment</h3>
                  <a href="" class="ps-btn ps-btn--sm pink-btn">Get Offer</a>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
               <img src="https://purchasync.com/allUsers/frontend/img/home/home-photo/promotion-img2.png" alt="" style="width:100%">
               <div class="ps-promotion-content">
                  <h4 class="pink-text">Get up to 15% off</h4>
                  <h3 class="text-white text-uppercase">Hotels Equipment</h3>
                  <a href="" class="ps-btn ps-btn--sm pink-btn">Get Offer</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-home-suppliers bg-white gap-pt50 gap-pb80">
      <div class="container">
         <div class="row">
            <div class="col-sm-6">
               <div class="ps-section__header">
                  <h3>Source Directly from<br>
                     Global & Local Suppliers
                  </h3>
                  <h4 class="blue-text mb-5">Simplifying Procurement and Selling for the<br>
                     Hospitality and Food Service Industry
                  </h4>
                  <p>
                     Purchasync is the ultimate all-in-one platform where hospitality professionals,
                     suppliers, service providers, manufacturers, and distributors come together to
                     collaborate, grow, and succeed. Designed exclusively for the needs of hotels,
                     restaurants, and hospitality providers, Purchasync streamlines procurement and
                     drives business growth in a transparent and efficient way.
                  </p>
               </div>
            </div>
            <div class="col-sm-6">
               <img src="allUsers/frontend/img/supplier-img.png" style="width:100%">
            </div>
         </div>
         <div class="row gap-mt50 ps-home-hospitality_section">
            <div class="col-sm-12 mb-5">
               <div class="ps-section__header">
                  <h3>All-in-One Hospitality Platform: Where<br>
                     Opportunities and Solutions Meet
                  </h3>
               </div>
            </div>
            <div class="col-sm-3">
               <img src="allUsers/frontend/img/hospitality-icon.png" style="width:80px">
               <h3 class="mt-4 font-weight-normal blue-text">Exclusive for Hospitality</h3>
               <p>A specialized marketplace tailored
                  specifically for hotels, restaurants, and
                  hospitality providers, ensuring all products
                  and services meet industry standards and
                  needs.
               </p>
            </div>
            <div class="col-sm-3">
               <img src="allUsers/frontend/img/engagement-icon.png" style="width:80px">
               <h3 class="mt-4 font-weight-normal blue-text">Direct Engagement</h3>
               <p>Communicate directly with buyers and
                  sellers through real-time messaging,
                  manage requests, and send proposals with
                  streamlined efficiency.
               </p>
            </div>
            <div class="col-sm-3">
               <img src="allUsers/frontend/img/verified-icon.png" style="width:80px">
               <h3 class="mt-4 font-weight-normal blue-text">Verified Sellers and Buyers</h3>
               <p>Engage with a network of pre-qualified and
                  trustworthy partners. Our verification
                  process ensures you connect with reliable
                  and credible players in the industry.
               </p>
            </div>
            <div class="col-sm-3">
               <img src="allUsers/frontend/img/hospitality-icon.png" style="width:80px">
               <h3 class="mt-4 font-weight-normal  blue-text">Sustainability Filters</h3>
               <p>Easily find and select eco-friendly
                  products and services using our
                  advanced sustainability filters, aligning
                  your procurement with environmental
                  and ethical goals.
               </p>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-home-quotation gap-pt50 gap-pb50">
      <div class="container">
         <div class="row">
            <div class="col-sm-3 quotation_leftSection">
               <div class="ps-section__header">
                  <h3 class="mb-5">Request for<br>
                     <span class="blue-text">Quotation</span>
                  </h3>
                  <h5>How it works?</h5>
                  <ul>
                     <li>Submit an RFQ in just one minute</li>
                     <li>Get multiple quotations from verified suppliers</li>
                     <li>Compare and choose the best quotation</li>
                  </ul>
               </div>
            </div>
            <div class="col-sm-5 quotation_rightSection">
               <form class="ps-form--contact-us" action="index.html" method="get">
                  <h3>Get Quotations now</h3>
                  <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group mb-3">
                           <input class="form-control" type="text" placeholder="What are you looking for?">
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form-group">
                           <input class="form-control" type="text" placeholder="Quantity">
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form-group">
                           <select class="form-control">
                              <option>Category</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="form-group submit mb-0 text-left">
                     <button class="ps-btn">Request Quotation</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-top-categories  ps-recentSearch" style="display:none">
      <div class="container">
         <div class="ps-section__header">
            <h3>Recent Searches</h3>
         </div>
         <div class="ps-section__content"></div>
         <div class="row align-content-lg-stretch">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
               <div class="ps-block--category-2 ">
                  <div class="ps-block__content">
                     <h4>Juicer extractor machine 2023</h4>
                     <p class="mb-0">Dubai, UAE - Star Electronic Technology Pvt Ltd…</p>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
               <div class="ps-block--category-2 ">
                  <div class="ps-block__content">
                     <h4>Refrigeration equipment</h4>
                     <p class="mb-0">Dubai, UAE - Industrial Refrigerated Technology…</p>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
               <div class="ps-block--category-2 ">
                  <div class="ps-block__content">
                     <h4>Hotel restaurant furniture</h4>
                     <p class="mb-0">Dubai, UAE - Uhled Technology Company.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-home-promotions gap-pt80" style="display:none">
      <div class="container">
         <div class="ps-section__header">
            <h3>Offers & Promotions</h3>
         </div>
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/promotion-img1.png')}}" alt="" style="width:100%">
               <div class="ps-promotion-content">
                  <h4 class="pink-text">Get up to 15% off</h4>
                  <h3 class="text-white text-uppercase">Restaurant Equipment</h3>
                  <a href="" class="ps-btn ps-btn--sm pink-btn">Get Offer</a>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/promotion-img2.png')}}" alt="" style="width:100%">
               <div class="ps-promotion-content">
                  <h4 class="pink-text">Get up to 15% off</h4>
                  <h3 class="text-white text-uppercase">Hotels Equipment</h3>
                  <a href="" class="ps-btn ps-btn--sm pink-btn">Get Offer</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-releases-list gap-pt80 ps-popular-categories" style="display:none">
      <div class="container">
         <div class="ps-section__header">
            <h3>Popular categories</h3>
         </div>
         <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
               <div class="ps-product">
                  <div class="ps-product__container">
                     <a class="ps-product__vendor mt-0" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
                  <div class="ps-product__container mt-2">
                     <a class="ps-product__vendor" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__container">
                     <a class="ps-product__vendor mt-0" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
                  <div class="ps-product__container mt-2">
                     <a class="ps-product__vendor" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__container">
                     <a class="ps-product__vendor mt-0" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
                  <div class="ps-product__container mt-2">
                     <a class="ps-product__vendor" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__container">
                     <a class="ps-product__vendor mt-0" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
                  <div class="ps-product__container mt-2">
                     <a class="ps-product__vendor" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__container">
                     <a class="ps-product__vendor mt-0" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
                  <div class="ps-product__container mt-2">
                     <a class="ps-product__vendor" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__container">
                     <a class="ps-product__vendor mt-0" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
                  <div class="ps-product__container mt-2">
                     <a class="ps-product__vendor" href="#">
                        <img src="https://purchasync.com/allUsers/frontend/img/connection-icon.png" style="margin:auto">
                        <p>Category 1</p>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container gap-pt80" style="display:none">
      <div class="ps-section__header">
         <h3>New Releases</h3>
      </div>
   </div>
   <div class="ps-releases-list blue-bg__ gap-ptb40" style="display:none">
      <div class="container">
         <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="60" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
               <div class="ps-product">
                  <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img.png')}}" alt="" /></a> </div>
                  <div class="ps-product__container"><a class="ps-product__vendor" href="#">Refrigeration Equipment</a></div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img2.png')}}" alt="" /></a> </div>
                  <div class="ps-product__container"><a class="ps-product__vendor" href="#">Advertising Light Boxes</a></div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img3.png')}}" alt="" /></a> </div>
                  <div class="ps-product__container"><a class="ps-product__vendor" href="#">Audio Sound Equipment</a></div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img4.png')}}" alt="" /></a> </div>
                  <div class="ps-product__container"><a class="ps-product__vendor" href="#">Interactive Boards</a></div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img5.png')}}" alt="" /></a> </div>
                  <div class="ps-product__container"><a class="ps-product__vendor" href="#">Sound Equipment/Amc</a></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class=" gap-pt80 ps-product-list ps-product-grid" style="display:none">
      <div class="container">
         <div class="ps-section__header ps-section__headerText p-0 bg-white border-0">
            <div class="ps-block__left">
               <h3 class="mb-0">Go Green - Eco Friendly Solutions & Partners</h3>
            </div>
            <a href="#" class="ps-btn ps-btn--sm pink-bg">View all</a>
         </div>
      </div>
   </div>
   <div class="ps-product-list ps-product-grid grey-bg__ gap-ptb40 mt-5" style="display:none">
      <div class="container">
         <div class="ps-section__content pt-0">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
               <div class="ps-product">
                  <div class="ps-product__thumbnail">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img1.png')}}" alt="" /></a>
                     <div class="ps-product__badge">10%</div>
                  </div>
                  <div class="ps-product__container">
                     <div class="ps-product__content">
                        <!--div class="ps-product__rating">
                           <select class="ps-rating" data-read-only="true">
                              <option value="1">1</option>
                              <option value="1">2</option>
                              <option value="1">3</option>
                              <option value="1">4</option>
                              <option value="2">5</option>
                           </select>
                           </div-->
                        <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                        <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                        <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                        <p class="ps-product__price ">2274*850*2080mm</p>
                        <div class="ps-actionBtn mb-4">
                           <a class="ps-btn ps-btn--sm pink-bg" href="#">Request Sample</a>
                           <a class="ps-btn ps-btn--sm pink-bg ps-btn__cart" href="#"><i class="icon-cart"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img2.png')}}" alt="" /></a>
                     <div class="ps-product__badge">10% OFF</div>
                  </div>
                  <div class="ps-product__container">
                     <div class="ps-product__content">
                        <!--div class="ps-product__rating">
                           <select class="ps-rating" data-read-only="true">
                              <option value="1">1</option>
                              <option value="1">2</option>
                              <option value="1">3</option>
                              <option value="1">4</option>
                              <option value="2">5</option>
                           </select>
                           </div-->
                        <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                        <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                        <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                        <p class="ps-product__price ">2274*850*2080mm</p>
                        <div class="ps-actionBtn mb-4">
                           <a class="ps-btn ps-btn--sm pink-bg" href="#">Request Sample</a>
                           <a class="ps-btn ps-btn--sm pink-bg ps-btn__cart" href="#"><i class="icon-cart"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img3.png')}}" alt="" /></a>
                     <div class="ps-product__badge">10% OFF</div>
                  </div>
                  <div class="ps-product__container">
                     <div class="ps-product__content">
                        <!--div class="ps-product__rating">
                           <select class="ps-rating" data-read-only="true">
                              <option value="1">1</option>
                              <option value="1">2</option>
                              <option value="1">3</option>
                              <option value="1">4</option>
                              <option value="2">5</option>
                           </select>
                           </div-->
                        <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                        <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                        <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                        <p class="ps-product__price ">2274*850*2080mm</p>
                        <div class="ps-actionBtn mb-4">
                           <a class="ps-btn ps-btn--sm pink-bg" href="#">Request Sample</a>
                           <a class="ps-btn ps-btn--sm pink-bg ps-btn__cart" href="#"><i class="icon-cart"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img4.png')}}" alt="" /></a>
                     <div class="ps-product__badge">10% OFF</div>
                  </div>
                  <div class="ps-product__container">
                     <div class="ps-product__content">
                        <!--div class="ps-product__rating">
                           <select class="ps-rating" data-read-only="true">
                              <option value="1">1</option>
                              <option value="1">2</option>
                              <option value="1">3</option>
                              <option value="1">4</option>
                              <option value="2">5</option>
                           </select>
                           </div-->
                        <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                        <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                        <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                        <p class="ps-product__price ">2274*850*2080mm</p>
                        <div class="ps-actionBtn mb-4">
                           <a class="ps-btn ps-btn--sm pink-bg" href="#">Request Sample</a>
                           <a class="ps-btn ps-btn--sm pink-bg ps-btn__cart" href="#"><i class="icon-cart"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="ps-section__content pt-3">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
               <div class="ps-product">
                  <div class="ps-product__thumbnail">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img1.png')}}" alt="" /></a>
                     <div class="ps-product__badge">10%</div>
                  </div>
                  <div class="ps-product__container">
                     <div class="ps-product__content">
                        <!--div class="ps-product__rating">
                           <select class="ps-rating" data-read-only="true">
                              <option value="1">1</option>
                              <option value="1">2</option>
                              <option value="1">3</option>
                              <option value="1">4</option>
                              <option value="2">5</option>
                           </select>
                           </div-->
                        <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                        <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                        <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                        <p class="ps-product__price ">2274*850*2080mm</p>
                        <div class="ps-actionBtn mb-4">
                           <a class="ps-btn ps-btn--sm pink-bg" href="#">Request Sample</a>
                           <a class="ps-btn ps-btn--sm pink-bg ps-btn__cart" href="#"><i class="icon-cart"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img2.png')}}" alt="" /></a>
                     <div class="ps-product__badge">10% OFF</div>
                  </div>
                  <div class="ps-product__container">
                     <div class="ps-product__content">
                        <!--div class="ps-product__rating">
                           <select class="ps-rating" data-read-only="true">
                              <option value="1">1</option>
                              <option value="1">2</option>
                              <option value="1">3</option>
                              <option value="1">4</option>
                              <option value="2">5</option>
                           </select>
                           </div-->
                        <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                        <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                        <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                        <p class="ps-product__price ">2274*850*2080mm</p>
                        <div class="ps-actionBtn mb-4">
                           <a class="ps-btn ps-btn--sm pink-bg" href="#">Request Sample</a>
                           <a class="ps-btn ps-btn--sm pink-bg ps-btn__cart" href="#"><i class="icon-cart"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img3.png')}}" alt="" /></a>
                     <div class="ps-product__badge">10% OFF</div>
                  </div>
                  <div class="ps-product__container">
                     <div class="ps-product__content">
                        <!--div class="ps-product__rating">
                           <select class="ps-rating" data-read-only="true">
                              <option value="1">1</option>
                              <option value="1">2</option>
                              <option value="1">3</option>
                              <option value="1">4</option>
                              <option value="2">5</option>
                           </select>
                           </div-->
                        <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                        <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                        <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                        <p class="ps-product__price ">2274*850*2080mm</p>
                        <div class="ps-actionBtn mb-4">
                           <a class="ps-btn ps-btn--sm pink-bg" href="#">Request Sample</a>
                           <a class="ps-btn ps-btn--sm pink-bg ps-btn__cart" href="#"><i class="icon-cart"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img4.png')}}" alt="" /></a>
                     <div class="ps-product__badge">10% OFF</div>
                  </div>
                  <div class="ps-product__container">
                     <div class="ps-product__content">
                        <!--div class="ps-product__rating">
                           <select class="ps-rating" data-read-only="true">
                              <option value="1">1</option>
                              <option value="1">2</option>
                              <option value="1">3</option>
                              <option value="1">4</option>
                              <option value="2">5</option>
                           </select>
                           </div-->
                        <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                        <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                        <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                        <p class="ps-product__price ">2274*850*2080mm</p>
                        <div class="ps-actionBtn mb-4">
                           <a class="ps-btn ps-btn--sm pink-bg" href="#">Request Sample</a>
                           <a class="ps-btn ps-btn--sm pink-bg ps-btn__cart" href="#"><i class="icon-cart"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-home-promotions gap-pt80 ps-brand-section" style="display:none">
      <div class="container">
         <div class="ps-section__header ps-section__headerText ps-d__flex ">
            <div class="ps-block__left  ps-section__header__uppercase">
               <h3 class="mb-0">Browse by Brands</h3>
            </div>
            <a href="#" class="ps-btn ps-btn--sm pink-bg">View all</a>
         </div>
         <div class="row mt-4 p-0">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-img.png')}}" alt="">
               <div class="ps-promotion-content">
                  <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-icon1.png')}}" style="width:60px">
                  <h3 class="text-white mt-3">Hotel<br> Amenities</h3>
                  <a href="" class="ps-btn ps-btn--sm pink-bg">VIEW PROJECT</a>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
               <div class="row">
                  <div class="col-sm-12 mb-4">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-img2.png')}}" alt="">
                     <div class="ps-promotion-content">
                        <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-icon2.png')}}" style="width:40px">
                        <h3 class="text-white mt-3">Refrigerator Equipment</h3>
                        <a href="" class="ps-btn ps-btn--sm pink-bg">VIEW PROJECT</a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-img3.png')}}" alt="">
                     <div class="ps-promotion-content">
                        <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-icon3.png')}}" style="width:40px">
                        <h3 class="text-white mt-3">Sound Controllers</h3>
                        <a href="" class="ps-btn ps-btn--sm pink-bg">VIEW PROJECT</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-img4.png')}}" alt="">
               <div class="ps-promotion-content">
                  <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-icon4.png')}}" style="width:50px">
                  <h3 class="text-white text-uppercase mt-3">Restaurant <br>Equipment</h3>
                  <a href="" class="ps-btn ps-btn--sm pink-bg">VIEW PROJECT</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-product-list gap-pt80 " style="display:none">
      <div class="container">
         <div class="ps-section__header ps-section__headerText ">
            <div class="ps-block__left  ps-section__header__uppercase">
               <h3 class="mb-0">Buy from Manufacturers</h3>
            </div>
            <a href="#" class="ps-btn ps-btn--sm pink-bg">View all</a>
         </div>
         <div class="ps-section__content pt-4">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
               <div class="ps-product p-0">
                  <div class="ps-product__thumbnail mb-0">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/manufacturersImg.png')}}" alt="" /></a>
                  </div>
               </div>
               <div class="ps-product p-0">
                  <div class="ps-product__thumbnail mb-0">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/manufacturersImg.png')}}" alt="" /></a>
                  </div>
               </div>
               <div class="ps-product p-0">
                  <div class="ps-product__thumbnail mb-0">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/manufacturersImg.png')}}" alt="" /></a>
                  </div>
               </div>
               <div class="ps-product p-0">
                  <div class="ps-product__thumbnail mb-0">
                     <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/manufacturersImg.png')}}" alt="" /></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-releases-list gap-pt80" style="display:none">
      <div class="container">
         <div class="ps-section__header ps-section__headerText ps-d__flex ">
            <div class="ps-block__left  ps-section__header__uppercase">
               <h3 class="mb-0">Browse by Categories</h3>
            </div>
            <a href="#" class="ps-btn ps-btn--sm pink-bg">View all</a>
         </div>
         <div class="ps-section__content pt-4">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
               <div class="ps-product">
                  <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img.png')}}" alt="" /></a> </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img2.png')}}" alt="" /></a> </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img3.png')}}" alt="" /></a> </div>
               </div>
               <div class="ps-product">
                  <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img4.png')}}" alt="" /></a> </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container gap-pt80" style="display:none">
      <div class="ps-section__header ps-section__headerText ps-d__flex ">
         <div class="ps-block__left  ps-section__header__uppercase">
            <h3 class="mb-0">Innovations for inspiration</h3>
         </div>
         <a href="#" class="ps-btn ps-btn--sm pink-bg">View all</a>
      </div>
   </div>
   <div class=" ps-innovation-section lightblue-bg__ gap-ptb60 mt-4" style="display:none">
      <div class="container">
         <div class="ps-section__content">
            <div class="row">
               <figure class="col-sm-4">
                  <div class="ps-block--ourteam border-rounded40">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/innovation-img1.png')}}" alt="">
                     <span class="ps-innovation__badge">Drink Dispensers</span>
                     <div class="ps-block__content">
                        <p>Commercial Cold Hot Soft Cold 
                           Drink Dispenser Machine
                        </p>
                        <img src="{{ asset('allUsers/frontend/img/home/home-photo/arrow-icon.png')}}">     
                     </div>
                  </div>
               </figure>
               <figure class="col-sm-4">
                  <div class="ps-block--ourteam border-rounded40">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/inovation-img2.png')}}" alt="">
                     <span class="ps-innovation__badge">Catering Equipments</span>
                     <div class="ps-block__content">
                        <p>Commercial Cold Hot Soft Cold 
                           Drink Dispenser Machine
                        </p>
                        <img src="{{ asset('allUsers/frontend/img/home/home-photo/arrow-icon.png')}}"> 
                     </div>
                  </div>
               </figure>
               <figure class="col-sm-4">
                  <div class="ps-block--ourteam border-rounded40">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/innovation-img3.png')}}" alt="">
                     <span class="ps-innovation__badge">Coffee Machines</span>
                     <div class="ps-block__content">
                        <p>Commercial Cold Hot Soft Cold 
                           Drink Dispenser Machine
                        </p>
                        <img src="{{ asset('allUsers/frontend/img/home/home-photo/arrow-icon.png')}}"> 
                     </div>
                  </div>
               </figure>
            </div>
         </div>
      </div>
   </div>
   <section class="ps-home-share-work ps-whyFNB-section gap-pt50 bg-white">
      <div class="container">
         <div class="ps-section__header ps-section__headerText ">
            <div class="ps-block__left text-center">
               <h3 class=" txt40" >Why use <span class="blue-text">Purchasync?</span></h3>
            </div>
         </div>
      </div>
      <div class="ps-product__content ps-tab-root text-center">
         <ul class="ps-tab-list mb-5">
            <li class="active"><a href="#tab-1">Buyer</a></li>
            <li><a href="#tab-2">Seller</a></li>
         </ul>
         <div class="ps-tabs">
            <div class="ps-tab active" id="tab-1">
               <div class="ps-section__content">
                  <div class="container ps-section__wrapper">
                     <div class="row justify-content-center">
                        <div class="col-sm-8 mb-5">
                           <h3 class="text-white text-center">
                              Streamline Your Procurement with Smart, Automated Quotes. Connect directly with sellers and service providers to unlock faster, more efficient sourcing and get the most value for your business.
                           </h3>
                        </div>
                     </div>
                     <div class="row justify-content-center">
                        <div class="col-sm-9">
                           <div class="row">
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon1.png" style="width:30px">
                                       <h4 class="black-text mt-3">Exclusive</h4>
                                       <p>Designed specifically for the HoReCa to meet your unique needs</p>
                                    </div>
                                 </figure>
                              </div>
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon2.png" style="width:30px">
                                       <h4 class="black-text mt-3">Effortless</h4>
                                       <p>Embedded e-procurement tools that save you time and efforts</p>
                                    </div>
                                 </figure>
                              </div>
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon3.png" style="width:30px">
                                       <h4 class="black-text mt-3">Eco-Friendly</h4>
                                       <p>Go green with paperless workflows and eco-friendly supplier options</p>
                                    </div>
                                 </figure>
                              </div>
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon4.png" style="width:30px">
                                       <h4 class="black-text mt-3">Trusted</h4>
                                       <p>Directly connect with trusted, pre-qualified suppliers</p>
                                    </div>
                                 </figure>
                              </div>
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon5.png" style="width:30px">
                                       <h4 class="black-text mt-3">All-in-one</h4>
                                       <p>Access both local and global suppliers and service providers in one place</p>
                                    </div>
                                 </figure>
                              </div>
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon6.png" style="width:30px">
                                       <h4 class="black-text mt-3">Mobile ready</h4>
                                       <p>Simple, intuitive design that’s optimized for any device</p>
                                    </div>
                                 </figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="ps-tab" id="tab-2">
               <div class="ps-section__content">
                  <div class="container ps-section__wrapper">
                     <div class="row justify-content-center">
                        <div class="col-sm-8 mb-5">
                           <h3 class="text-white text-center">
                              Unlock Your Sales Potential with Purchasync: The Ultimate Marketplace for Hospitality & Food Service
                           </h3>
                        </div>
                     </div>
                     <div class="row justify-content-center">
                        <div class="col-sm-9">
                           <div class="row">
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon1.png" style="width:30px">
                                       <h4 class="black-text mt-3">Individual Storefront</h4>
                                       <p>Create a unique online presence to showcase your products, services, and success stories</p>
                                    </div>
                                 </figure>
                              </div>
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon2.png" style="width:30px">
                                       <h4 class="black-text mt-3">Targeted reach </h4>
                                       <p>Connect directly with hospitality professionals, both locally and globally</p>
                                    </div>
                                 </figure>
                              </div>
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon3.png" style="width:30px">
                                       <h4 class="black-text mt-3">Direct Engagement</h4>
                                       <p>Receive and send Proposals, communicate directly with buyers</p>
                                    </div>
                                 </figure>
                              </div>
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon4.png" style="width:30px">
                                       <h4 class="black-text mt-3">Promotions</h4>
                                       <p>Run targeted promotions and special offers</p>
                                    </div>
                                 </figure>
                              </div>
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon5.png" style="width:30px">
                                       <h4 class="black-text mt-3">Commission-Free</h4>
                                       <p>Maximize your profits by keeping all your revenue—no commission fees on sales</p>
                                    </div>
                                 </figure>
                              </div>
                              <div class="col-sm-4 col-12 mb-5">
                                 <figure>
                                    <div>
                                       <img src="allUsers/frontend/img/home/home-photo/buyerIn-icon6.png" style="width:30px">
                                       <h4 class="black-text mt-3">Global Access</h4>
                                       <p>Expand your market reach by connecting with both local and international buyers</p>
                                    </div>
                                 </figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="ps-home-blog bg-white gap-pt50 gap-pb50">
      <div class="container">
         <div class="ps-section__header">
            <h3 class="">Trends & Inspirations</h3>
         </div>
         <div class="ps-section__content">
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                  <div class="ps-post">
                     <div class="ps-post__thumbnail"><img src="allUsers/frontend/img/home/Trends-img1.png" alt=""></div>
                     <div class="ps-post__content">
                        <a class="ps-post__title mb-1" href="#">How to make a cocktail</a>
                        <p class="mb-2">This is the sub-headline</p>
                        <p class="bedge-bg">3 min read</p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                  <div class="ps-post">
                     <div class="ps-post__thumbnail"> <img src="allUsers/frontend/img/home/Trends-img2.png" alt=""></div>
                     <div class="ps-post__content">
                        <a class="ps-post__title mb-1" href="#">How to make a cocktail</a>
                        <p class="mb-2">This is the sub-headline</p>
                        <p class="bedge-bg">3 min read</p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                  <div class="ps-post">
                     <div class="ps-post__thumbnail"> <img src="allUsers/frontend/img/home/Trends-img3.png" alt=""></div>
                     <div class="ps-post__content">
                        <a class="ps-post__title mb-1" href="#">How to make a cocktail</a>
                        <p class="mb-2">This is the sub-headline</p>
                        <p class="bedge-bg">3 min read</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <div class="ps-defaultSection bg-white border-0 gap-mb50">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
               <h3 class="txt40 mb-5 text-white">Selling & Buying made easy for Hotels & Restaurants</h3>
               <a href="" class="ps-btn ps-btn-lg">Join Now</a>
            </div>
         </div>
      </div>
   </div>
   <div class="ps-site-features ps-featuress-section">
      <div class="container">
         <div class="ps-block--site-features ps-block--site-features-2">
            <div class="ps-block__item">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img1.png')}}">
               <h4 class="mb-2">REQUEST FOR QUOTATION</h4>
               <p class="mb-0">we’ve made it easy for you</p>
            </div>
            <div class="ps-block__item">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img2.png')}}">
               <h4 class="mb-2">FEEDBACK</h4>
               <p class="mb-0">Opinions, Inquiries welcome</p>
            </div>
            <div class="ps-block__item">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img3.png')}}">
               <h4 class="mb-2">GET IN TOUCH</h4>
               <p class="mb-0">+971 507482498</p>
            </div>
            <div class="ps-block__item">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img4.png')}}">
               <h4 class="mb-2">DROP AN EMAIL</h4>
               <p class="mb-0">@purchasync.com</p>
            </div>
         </div>
      </div>
   </div>
   
   
   
   
   
</main>
@endsection