@extends('customer.partials.header')
@section('customerContent')
@section('title', '')
@section('description', '')
@section('keywords', '')
<!--Body Container-->
{{-- style=" display: inline-block; width: 100%;" --}}
<div id="page-content">

    <section class="section banner_sec p-0">
        <div class="container">
            <div class="row">
                 <a href="#" target="_blank" >
 <img src="{{ asset('allUsers/girlpage/girl-banner.png') }}"  alt="banner" alt="" class=" w-100" />
                    </a>
            </div>
        </div>
            </section>
    
      <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider pt-4">
        <div class="container">
            <div class="productSlider0 grid-products">
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bannerImg1.png') }}" />
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->
    
    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Shop By Ages</span></h2>
                </div>

                    <div class="productSlider_ages grid-products shop_agesTab">
                        @forelse($shopByAge as $item)
                        <div class="item">
                                <div class="product-image">
                                   <a href="{{$item->url}}"><span>{{$item->title}}</span></a> 
                                </div>
                            </div>
                        @empty

                        <div class="item">
                            <div class="product-image">
                                <span>Premature</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <span>1-3 Yrs</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <span>3-5 Yrs</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <span>5-7 Yrs</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <span>7-10 yrs</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <span>10-12 Yrs</span>
                            </div>
                        </div>

                        <div class="item">
                            <div class="product-image">
                                <span>12-14 Yrs</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <span>14-16 Yrs</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <span>16+ Yrs</span>
                            </div>
                        </div>
                        @endforelse
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider">
        <div class="container">
            <div class="row"> 
                <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Shop By Categories</span></h2>
                </div>
            </div>
            <div class="productSlider02 grid-products p-3" style=" background: #ffedd5;">
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg2.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg2.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg2.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg2.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg3.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg3.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg3.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg3.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg4.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg4.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg4.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg4.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg5.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg5.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg5.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg5.png') }}" />
                            </a>
                        </div>
                    </div>
                   
                            </div>
        
            <div class="productSlider02 grid-products p-3" style=" background: #ffedd5;">
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg2.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg2.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg2.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg2.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg3.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg3.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg3.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg3.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg4.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg4.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg4.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg4.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg5.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg5.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-catImg5.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-catImg5.png') }}" />
                            </a>
                        </div>
                    </div>
                   
                            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->


    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider">
        <div class="container">
            <div class="row"> 
                 <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Shop By Brands</span></h2>
                </div>
            </div>
             <div class="productSlider02 grid-products">
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-brandImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                   
                            </div>
        </div>
</section>
<!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider">
        <div class="container">
            <div class="row"> 
                 <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Winter Closet</span></h2>
                </div>
            </div>
             <div class="productSlider02 grid-products">
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                      <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-closetImg1.png') }}" />
                            </a>
                        </div>
                    </div>
                   
                            </div>
        </div>
</section>
<!--End Body Container-->

 <section class="section banner_sec pt-0">
        <div class="container">
            <div class="row">
                 <a href="#" target="_blank" >
 <img src="{{ asset('allUsers/girlpage/girl-MidBanner.png') }}"  alt="banner" alt="" class=" w-100" />
                    </a>
            </div>
        </div>
            </section>

<!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider">
        <div class="container">
            <div class="row"> 
                <div class="section-header text-uppercase col-12">
                    <h2>Accessories</h2>
                </div>
            </div>
             <div class="productSlider01 grid-products">
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}" />
                            </a>
                        </div>
                    </div>
                      <div class="item">
                        <div class="product-image">
                             <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                             <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                             <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-accessoriesImg.png') }}" />
                            </a>
                        </div>
                    </div>
                   
                            </div>
       <div class="row"> 
                <div class=" col-12 text-center mt-3">
                    <a href="" class="text-uppercase btn btn-light">View All</a>
                </div>
            </div>
        </div>
</section>
<!--End Body Container-->
<!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider">
        <div class="container">
            <div class="row"> 
                 <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Bestsellers</span></h2>
                </div>
            </div>
             <div class="productSlider02 grid-products">
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}" />
                            </a>
                        </div>
                    </div>
                      <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}" />
                            </a>
                        </div>
                    </div>
                     <div class="item">
                        <div class="product-image">
                           <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}"
                                    src="{{ asset('allUsers/girlpage/girl-bestseller.png') }}" />
                            </a>
                        </div>
                    </div>
                   
                            </div>
        </div>
</section>
<!--End Body Container-->
</div>
<!--End Body Container-->
<input type="hidden" class="new-in-designer" value="{{ Request::segment(3) }}" />
<script type="module" src="{{ asset('allUsers/customer/designer.js') }}"></script>
@endsection
