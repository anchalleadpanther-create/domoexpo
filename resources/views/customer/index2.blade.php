@extends('customer.partials.header')
@section('customerContent')
<!--Body Container-->
<style>
    /* body,
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
        } */
        
        .container {  max-width: 100% !important;padding-left: 55px;
    padding-right: 55px;}

    .discover_store {
        width: 95% !importent;
    }

    .store_section- .item .product-details {
        position: absolute;
        bottom: 10px;
        z-index: 99;
        left: 0;
        right: 0;
        margin: auto;
    }

    .store_section- .item .product-details .product-name h3 {
        color: #fff;
        font-size: 15px;
        text-align: center;
        background: rgba(0, 0, 0, .5);
        width: auto;
        display: inline-block;
        padding: 5px 10px;
        border-radius: 10px;
        font-weight: normal;
    }
    .productSlider_topCat .item .product-image img {
    border-radius: 100%;
    width: 160px;
    height: 160px;
}
.grid-products.productSlider_topCat .item .product-image:hover .primary {
    opacity: 1;
}
@media only screen and (max-width: 500px) {
.productSlider_topCat .item .product-image img {
    border-radius: 100%;
    width: 100%;
    height: 100%;
}
.quote-wraper .quotes-slide {
    background-color: #fff;
    padding: 0 15px;
}
.quote-wraper .quotes-slide .rte-setting {
    height: 200px;
    overflow: hidden;
}
.quote-wraper .quotes-slide .rte-setting p {
    line-height: 20px;
    margin-bottom: 10px;
    font-size: 13px;
}
.home-blog-post .post-detail h3{height:100% !important;}
}

</style>
<!--Body container-->
<div id="page-content">


    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider desktop-hide">
        <div class="container-fluid">

            <div class="row">
                <div class="productSlider_topCat grid-products">


                    @forelse($topSliders as $slider)
                    <div class="item">
                        <div class="product-image">
                            <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset
                                class="product-img">
                                

                            @if (!empty($slider->slider_image) || !empty($slider->second_slider_image))
                                {{-- for dasktop --}}
                                <img class=" primary blur-up lazyloaded hidden-xs"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"  title="{{ $slider->slider_title }}"  />

                                {{-- for Mobile --}}
                                
                                <img class=" primary blur-up lazyloaded hidden-sm"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />


                                @endif

                                
                            </a>
                        </div>
                        <div class="product-details text-center">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                                    @endisset
                                    class="fw-normal">{{ $slider->slider_title }}</a>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>

                    @empty
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary "
                                    data-src="{{ asset('allUsers/customer/images/new-theme/top-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/top-img1.png') }}" />
                                
                            </a>
                        </div>
                        <div class="product-details text-center">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="#" class="fw-normal">JACKETS</a>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary "
                                    data-src="{{ asset('allUsers/customer/images/new-theme/top-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/top-img1.png') }}" />
                              
                            </a>
                        </div>
                        <div class="product-details text-center">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="#" class="fw-normal">JACKETS</a>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary "
                                    data-src="{{ asset('allUsers/customer/images/new-theme/top-img2.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/top-img2.png') }}" />
                               
                            </a>
                        </div>
                        <div class="product-details text-center">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="#" class="fw-normal">JACKETS</a>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary "
                                    data-src="{{ asset('allUsers/customer/images/new-theme/top-img3.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/top-img3.png') }}" />
                                
                            </a>
                        </div>
                        <div class="product-details text-center">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="#" class="fw-normal">JACKETS</a>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>
                    

                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->
    <!--Home Slider-->
    <section class="section slideshow slideshow-wrapper  pt-0">
        <div class="container-fluid">
            <div class="home-slideshow p-0">

                @forelse($sliders as $slider)
                <div class="slide">
                    <div class="blur-up lazyload">


                            <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset>
                                

                                @if (!empty($slider->slider_image) || !empty($slider->second_slider_image))
                                {{-- for dasktop --}}
                                <img class="blur-up lazyloaded hidden-xs"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                                {{-- for Mobile --}}
                               
                                <img class="blur-up lazyloaded hidden-sm"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->second_slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->second_slider_image }}" />


                                @endif
                            </a>

                       
                    </div>
                </div>
                @empty
                <div class="slide">
                    <div class="blur-up lazyload">
                        <img class="blur-up lazyload desktop-hide"
                            data-src="{{ asset('allUsers/ebony/images/slider-img1.png') }}"
                            src="{{ asset('allUsers/ebony/images/slider-img1.png') }}" />
                        <img class="blur-up lazyload mobile-hide"
                            data-src="{{ asset('allUsers/ebony/images/slider-img1.png') }}"
                            src="{{ asset('allUsers/ebony/images/slider-img1.png') }}" />
                    </div>
                </div>
                <div class="slide">
                    <div class="blur-up lazyload">
                        <img class="blur-up lazyload desktop-hide"
                            data-src="{{ asset('allUsers/ebony/images/slider-img1.png') }}"
                            src="{{ asset('allUsers/ebony/images/slider-img1.png') }}" />
                        <img class="blur-up lazyload mobile-hide"
                            data-src="{{ asset('allUsers/ebony/images/slider-img1.png') }}"
                            src="{{ asset('allUsers/ebony/images/slider-img1.png') }}" />
                    </div>
                </div>
                <div class="slide">
                    <div class="blur-up lazyload">
                        <img class="blur-up lazyload desktop-hide"
                            data-src="{{ asset('allUsers/ebony/images/slider-img1.png') }}"
                            src="{{ asset('allUsers/ebony/images/slider-img1.png') }}" />
                        <img class="blur-up lazyload mobile-hide"
                            data-src="{{ asset('allUsers/ebony/images/slider-img1.png') }}"
                            src="{{ asset('allUsers/ebony/images/slider-img1.png') }}" />
                    </div>
                </div>
                <div class="slide">
                    <div class="blur-up lazyload">
                        <img class="blur-up lazyload desktop-hide"
                            data-src="{{ asset('allUsers/ebony/images/slider-img1.png') }}"
                            src="{{ asset('allUsers/ebony/images/slider-img1.png') }}" />
                        <img class="blur-up lazyload mobile-hide"
                            data-src="{{ asset('allUsers/ebony/images/slider-img1.png') }}"
                            src="{{ asset('allUsers/ebony/images/slider-img1.png') }}" />
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </section>
    <!--End Home Slider-->

    <!--Banner Masonary-->
    <section class="collection-banners style1 section ">
        <div class="container-fluid">
            <div class="section-header mainHeading col-12">
                <h2><span>Shop By Gender</span></h2>
            </div>
            <div class=" col-sm-12">
                <div class="grid-sizer col-md-3 col-lg-3"></div>
                <div class="row">
                    <div class="col-6 col-lg-5 cl-item">
                        <div class="collection-grid-item mb-2">


                            <a @isset($shopByGenderOne->slider_link) href="{{
                                $shopByGenderOne->slider_link }}"
                                target="_blank" @endisset>
                                <div class="img">
                                    @if (!empty($shopByGenderOne->slider_image) || !empty($shopByGenderOne->second_slider_image))
                                    <!-- <img class="blur-up lazyloaded"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderOne->slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderOne->slider_image }}" />
                                    -->

                                        {{-- for dasktop --}}
                                        <img class=" primary blur-up lazyloaded hidden-xs"
                                            data-src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderOne->slider_image }}"
                                            src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderOne->slider_image }}"  title="{{ $shopByGenderOne->slider_title }}"  />

                                        {{-- for Mobile --}}
                                        
                                        <img class=" primary blur-up lazyloaded hidden-sm"
                                            data-src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderOne->second_slider_image }}"
                                            src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderOne->second_slider_image }}" />

                                    @else
                                    <img class="blur-up lazyloaded"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/shopbyGender-img1.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/shopbyGender-img1.png') }}" />
                                    @endif

                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-2 col-2 hidden-xs"></div>
                    <div class="col-6 col-lg-5 cl-item">
                        <div class="collection-grid-item mb-2">

                            <a @isset($shopByGenderTwo->slider_link) href="{{
                                $shopByGenderTwo->slider_link }}"
                                target="_blank" @endisset>
                                <div class="img">
                                    @if (!empty($shopByGenderTwo->slider_image) || !empty($shopByGenderTwo->second_slider_image))
                                    <!-- <img class="blur-up lazyloaded"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderTwo->slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderTwo->slider_image }}" /> -->


                                        {{-- for dasktop --}}
                                        <img class=" primary blur-up lazyloaded hidden-xs"
                                            data-src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderTwo->slider_image }}"
                                            src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderTwo->slider_image }}"  title="{{ $shopByGenderTwo->slider_title }}"  />

                                        {{-- for Mobile --}}
                                        
                                        <img class=" primary blur-up lazyloaded hidden-sm"
                                            data-src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderTwo->second_slider_image }}"
                                            src="{{ asset('/uploads/sliders') }}/{{ $shopByGenderTwo->second_slider_image }}" />


                                    @else
                                    <img class="blur-up lazyloaded"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/shopbyGender-img2.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/shopbyGender-img2.png') }}" />
                                    @endif

                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Masonary-->
    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider category_slider-- res-pt">
        <div class="container-fluid">
            <div class="brand_slide col-sm-12">
                <div class="row">
                    
                    <div class="section-header mainHeading col-12 ">
                    <h2 class="text-uppercase"><span>Our Designers</span></h2>
                </div>
                </div>
                <div class="productSlider grid-products">


                    @forelse($ourDesigners as $slider)


                    <div class="item">
                        <div class="product-image">
                           {{-- <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset
                                class="product-img">
                                <img class="blur-up lazyload "
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    alt="{{ $slider->slider_title }}" title="{{ $slider->slider_title }}" />
                                <!--img class="blur-up lazyload mobile-hide"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    alt="{{ $slider->slider_title }}" title="{{ $slider->slider_title }}" /-->
                            </a>--}}

                            <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset>   
                                @if (!empty($slider->slider_image) || !empty($slider->second_slider_image))
                                {{-- for dasktop --}}
                                <img class="blur-up lazyloaded hidden-xs"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                                {{-- for Mobile --}}
                               
                                <img class="blur-up lazyloaded hidden-sm"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->second_slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->second_slider_image }}" />
                                @endif
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img04.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img04.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img04.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img04.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img05.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img05.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img05.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img05.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}" />
                            </a>
                        </div>
                    </div>

                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img01.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img02.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}"
                                    src="{{ asset('https://littletags.webkype.co/allUsers/frontend/images/home-img/brand-style-img03.png') }}" />
                            </a>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

    <!--Banner Masonary-->
    <section class="collection-banners style1 section res-pt">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase mb-3"><span>Sunny Days in Breezy Styles</span></h2>
                    <!--p style="margin-top:0 !important">Top Summer Essentials</p-->
                </div>
            </div>
            <div class="grid-mr-20">
                <div class="grid-sizer col-md-3 col-lg-3"></div>
                <div class="">

                    <div class="col-12 col-lg-12  cl-item">
                        <div class="collection-grid-item mb-2">

                            <a @isset($cheseAwayTheGoldBanner->slider_link) href="{{ $cheseAwayTheGoldBanner->slider_link }}"
                                target="_blank" @endisset>
                                <div class="img">
                                    @if (!empty($cheseAwayTheGoldBanner->slider_image) ||
                                    !empty($cheseAwayTheGoldBanner->second_slider_image))
                                    {{-- for dasktop --}}
                                    <img class="blur-up lazyloaded hidden-xs"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $cheseAwayTheGoldBanner->slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $cheseAwayTheGoldBanner->slider_image }}" />

                                    {{-- for Mobile --}}
                                    {{-- <img class="blur-up lazyloaded hidden-sm"
                                        data-src="allUsers/customer/images/mobile-images/casual banner mobile.jpg"
                                        src="allUsers/customer/images/mobile-images/casual banner mobile.jpg" /> --}}

                                    <img class="blur-up lazyloaded hidden-sm"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $cheseAwayTheGoldBanner->second_slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $cheseAwayTheGoldBanner->second_slider_image }}" />
                                    @endif
                                </div>
                            </a>


                            {{-- <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/winter-banner.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/winter-banner.png') }}" />
                                </div>
                            </a> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End Banner Masonary-->
    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider  pt-0">
        <div class="container-fluid">
            <div class="productSlider0 grid-products">


                @forelse ($cheseAwayTheGoldSliders as $slider)
                <div class="item">
                    <div class="product-image">
                        <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset
                            class="product-img">
                            <img class="blur-up lazyload desktop-hide"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                alt="{{ $slider->slider_title }}" title="{{ $slider->slider_title }}" />
                            <img class="blur-up lazyload mobile-hide"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                alt="{{ $slider->slider_title }}" title="{{ $slider->slider_title }}" />
                        </a>
                    </div>

                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset
                                class="fw-normal">{{ $slider->slider_title }}</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                @empty
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img1.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img1.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img1.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="#" class="fw-normal">CAPS & MUFFLERS</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img2.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="#" class="fw-normal">THERMALS</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img3.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img3.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img3.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img3.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="#" class="fw-normal">JACKETS</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img1.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img1.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img1.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="#" class="fw-normal">CAPS & MUFFLERS</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img2.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="#" class="fw-normal">THERMALS</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img3.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img3.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/winter-img3.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/winter-img3.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <a href="#" class="fw-normal">JACKETS</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                @endforelse




            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider res-pt">
        <div class="container-fluid">

            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2><span>Spotlight On</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="productSlider_hm1 grid-products">

                    @forelse ($spotlightOn as $slider)
                    <div class="item">
                        <div class="product-image">
                            <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset
                                class="product-img">
                                <img class="blur-up lazyload desktop-hide"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    alt="{{ $slider->slider_title }}" title="{{ $slider->slider_title }}" />
                                <img class="blur-up lazyload mobile-hide"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    alt="{{ $slider->slider_title }}" title="{{ $slider->slider_title }}" />
                            </a>
                        </div>

                        <div class="product-details text-center">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                                    @endisset
                                    class="fw-normal">{{ $slider->slider_title }}</a>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>
                    @empty
                    <div class="item">
                        <div class="product-image">
                            {{-- $spotlightOn --}}
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img1.png') }}" />
                            </a>
                        </div>

                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img2.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img2.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img2.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img2.png') }}" />
                            </a>
                        </div>

                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img3.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img3.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img3.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img3.png') }}" />
                            </a>
                        </div>

                    </div>

                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img1.png') }}" />
                            </a>
                        </div>

                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img2.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img2.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img2.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img2.png') }}" />
                            </a>
                        </div>

                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img3.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img3.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/spotlight-img3.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/spotlight-img3.png') }}" />
                            </a>
                        </div>

                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

    <!--Banner Masonary-->
    <section class="collection-banners style1 section res-pt">
        <div class="container-fluid">

            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Shop by Occasion</span></h2>
                </div>

            </div>
            <div class="productSlider-item2 grid-products">
                <div class="item">
                    <div class="product-image">
                      {{--  <a @isset($shopByOccasionBannerOne->slider_link) href="{{ $shopByOccasionBannerOne->slider_link }}"
                            target="_blank" @endisset>
                            <div class="img">
                                @if (!empty($shopByOccasionBannerOne->slider_image))
                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerOne->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerOne->slider_image }}" />
                                @else
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/occasion-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/occasion-img1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/occasion-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/occasion-img1.png') }}" />
                                @endif

                            </div>
                        </a>
                        --}}

                            <a @isset($cheseAwayTheGoldBanner->slider_link) href="{{ $shopByOccasionBannerOne->slider_link }}"
                                target="_blank" @endisset>
                                <div class="img">
                                    @if (!empty($shopByOccasionBannerOne->slider_image) ||
                                    !empty($shopByOccasionBannerOne->second_slider_image))
                                    {{-- for dasktop --}}
                                    <img class="blur-up lazyloaded hidden-xs"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerOne->slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerOne->slider_image }}" />

                                    {{-- for Mobile --}}
                                    {{-- <img class="blur-up lazyloaded hidden-sm"
                                        data-src="allUsers/customer/images/mobile-images/casual banner mobile.jpg"
                                        src="allUsers/customer/images/mobile-images/casual banner mobile.jpg" /> --}}

                                    <img class="blur-up lazyloaded hidden-sm"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerOne->second_slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerOne->second_slider_image }}" />
                                    @endif
                                </div>
                            </a>

                    </div>
                </div>
                <div class="item">
                    <div class="product-image">

                     {{--  <a @isset($shopByOccasionBannerTwo->slider_link) href="{{
                            $shopByOccasionBannerTwo->slider_link }}"
                            target="_blank" @endisset>
                            <div class="img">
                                @if (!empty($shopByOccasionBannerTwo->slider_image))
                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerTwo->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerTwo->slider_image }}" />
                                @else
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}" />
                                @endif

                            </div>
                        </a>
                        --}} 

                        <a @isset($cheseAwayTheGoldBanner->slider_link) href="{{ $shopByOccasionBannerTwo->slider_link }}"
                                target="_blank" @endisset>
                                <div class="img">
                                    @if (!empty($shopByOccasionBannerTwo->slider_image) ||
                                    !empty($shopByOccasionBannerTwo->second_slider_image))
                                    {{-- for dasktop --}}
                                    <img class="blur-up lazyloaded hidden-xs"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerTwo->slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerTwo->slider_image }}" />

                                    {{-- for Mobile --}}
                                    {{-- <img class="blur-up lazyloaded hidden-sm"
                                        data-src="allUsers/customer/images/mobile-images/casual banner mobile.jpg"
                                        src="allUsers/customer/images/mobile-images/casual banner mobile.jpg" /> --}}

                                    <img class="blur-up lazyloaded hidden-sm"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerTwo->second_slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $shopByOccasionBannerTwo->second_slider_image }}" />
                                    @endif
                                </div>
                            </a>


                        {{-- <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}" />
                        </a> --}}
                    </div>
                </div>
                {{-- <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/occasion-img2.png') }}" />
                        </a>
                    </div>
                </div> --}}
            </div>

        </div>
    </section>
    <!--End Banner Masonary-->

    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider res-pt">
        <div class="container-fluid">

            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2><span>Bestsellers</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="productSlider02 grid-products">

                    @forelse ($bestsellerSliders as $slider)
                    <div class="item">
                        <div class="product-image">
                            <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset
                                class="product-img">
                                <img class="blur-up lazyload desktop-hide"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    alt="{{ $slider->slider_title }}" title="{{ $slider->slider_title }}" />
                                <img class="blur-up lazyload mobile-hide"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    alt="{{ $slider->slider_title }}" title="{{ $slider->slider_title }}" />
                            </a>
                        </div>
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0" style="height:35px;overflow:hidden;">
                                    <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                                        @endisset
                                        class="fw-normal">{{ $slider->slider_title }}</a>
                                </h3>
                                <!--p class="mb-0">{{ $slider->slider_description }}</p-->
                            </div>
                            <!--End Product Name-->

                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">₹ {{ $slider->price_unit }}</span>
                            </div>
                            <!-- End Product Price-->
                        </div>
                    </div>

                    @empty

                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/bestseller-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/bestseller-img1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/bestseller-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/bestseller-img1.png') }}" />
                            </a>
                        </div>
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0"><a href="#" class="fw-normal"><b>La Dee Da</b></a></h3>
                                <p class="mb-0">Pearl Embellished Top & Embroidered Set</p>
                            </div>
                            <!--End Product Name-->

                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">₹4,000</span>
                            </div>
                            <!-- End Product Price-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/bestseller-img2.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/bestseller-img2.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/bestseller-img2.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/bestseller-img2.png') }}" />
                            </a>
                        </div>
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0"><a href="#" class="fw-normal"><b>La Dee Da</b></a></h3>
                                <p class="mb-0">Pearl Embellished Top & Embroidered Set</p>
                            </div>
                            <!--End Product Name-->

                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">₹4,000</span>
                            </div>
                            <!-- End Product Price-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/bestseller-img3.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/bestseller-img3.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/bestseller-img3png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/bestseller-img3.png') }}" />
                            </a>
                        </div>
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0"><a href="#" class="fw-normal"><b>La Dee Da</b></a></h3>
                                <p class="mb-0">Pearl Embellished Top & Embroidered Set</p>
                            </div>
                            <!--End Product Name-->

                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">₹4,000</span>
                            </div>
                            <!-- End Product Price-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/bestseller-img4.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/bestseller-img4.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/bestseller-img4.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/bestseller-img4.png') }}" />
                            </a>
                        </div>
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0"><a href="#" class="fw-normal"><b>La Dee Da</b></a></h3>
                                <p class="mb-0">Pearl Embellished Top & Embroidered Set</p>
                            </div>
                            <!--End Product Name-->

                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">₹4,000</span>
                            </div>
                            <!-- End Product Price-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/bestseller-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/bestseller-img1.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/customer/images/new-theme/bestseller-img1.png') }}"
                                    src="{{ asset('allUsers/customer/images/new-theme/bestseller-img1.png') }}" />
                            </a>
                        </div>
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0"><a href="#" class="fw-normal"><b>La Dee Da</b></a></h3>
                                <p class="mb-0">Pearl Embellished Top & Embroidered Set</p>
                            </div>
                            <!--End Product Name-->

                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">₹4,000</span>
                            </div>
                            <!-- End Product Price-->
                        </div>
                    </div>

                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->


    <section class="collection-banners style1 section res-ptb">
        <div class="container-fluid">
            <div class="section-header mainHeading col-12">
                <h2><span>The Value Store</span></h2>
            </div>
            <div class=" col-sm-12">
                <div class="grid-sizer col-md-3 col-lg-3"></div>
                <div class="row">

                    @forelse ($theValueStoreImages as $slider)
                    <div class="col-6 col-lg-3 cl-item">
                        <div class="collection-grid-item mb-4">
                            <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset>
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                                </div>
                                </a>
                                <div class="product-details text-center">
                                    <div class="product-name text-uppercase">
                                        <h4 class="mb-0">{{ $slider->slider_title }}</h4>
                                    </div>
                                    <!--Product Name-->
                                    <div class="product-name text-uppercase">
                                        <small>{{ !empty($slider->mrp) ?  'UNDER '. $slider->mrp: '' }}</small>
                                    </div>
                                    <!--End Product Name-->
                                </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-6 col-lg-3 cl-item">
                        <div class="collection-grid-item mb-4">
                            <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/valueStore-img1.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/valueStore-img1.png') }}" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 cl-item">
                        <div class="collection-grid-item mb-4">
                            <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/valueStore-img2.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/valueStore-img2.png') }}" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 cl-item">
                        <div class="collection-grid-item mb-4">
                            <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/valueStore-img3.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/valueStore-img3.png') }}" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 cl-item">
                        <div class="collection-grid-item mb-4">
                            <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/valueStore-img4.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/valueStore-img4.png') }}" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 cl-item">
                        <div class="collection-grid-item mb-4">
                            <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/valueStore-img5.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/valueStore-img5.png') }}" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 cl-item">
                        <div class="collection-grid-item mb-4">
                            <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/valueStore-img6.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/valueStore-img6.png') }}" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 cl-item">
                        <div class="collection-grid-item mb-4">
                            <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/valueStore-img7.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/valueStore-img7.png') }}" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 cl-item">
                        <div class="collection-grid-item mb-4">
                            <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/valueStore-img8.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/valueStore-img8.png') }}" />
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforelse


                </div>
            </div>
        </div>
    </section>




    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider res-pt pt-0">
        <div class="container-fluid">

            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2><span>Most Loved Designers</span></h2>
                </div>
            </div>
            <div class="productSlider02 grid-products">
                @forelse ($mostLovedDesignersImages as $slider)

                <div class="item">
                    <div class="product-image">
                        <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset>
                            <div class="img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                            </div>
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a @isset($slider->slider_link) href="{{ $slider->slider_link }}"
                                    target="_blank" @endisset class="fw-normal"><b>{{ $slider->slider_title }}</b></a>
                            </h3>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>

                @empty
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Little Cheer</b></a></h3>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Little Cheer</b></a></h3>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Little Cheer</b></a></h3>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Little Cheer</b></a></h3>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img1.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Little Cheer</b></a></h3>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}"
                                src="{{ asset('allUsers/customer/images/new-theme/designer-img2.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-center">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Little Cheer</b></a></h3>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->


    <!--Banner Masonary-->
    <section class="collection-banners style1 section res-ptb">
        <div class="container-fluid">
            <div class="grid-mr-20">
                <div class="grid-sizer col-md-3 col-lg-3"></div>
                <div class="">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 banner-item cl-item">
                        <div class="collection-grid-item mb-2">

                            <a @isset($mostLovedDesignersBannerOne->slider_link) href="{{
                                $mostLovedDesignersBannerOne->slider_link }}"
                                target="_blank" @endisset>
                                <div class="img">

                                    @if (!empty($mostLovedDesignersBannerOne->slider_image) || !empty($mostLovedDesignersBannerOne->second_slider_image))
                                        {{-- for dasktop --}}
                                        <img class="blur-up lazyloaded hidden-xs"
                                            data-src="{{ asset('/uploads/sliders') }}/{{ $mostLovedDesignersBannerOne->slider_image }}"
                                            src="{{ asset('/uploads/sliders') }}/{{ $mostLovedDesignersBannerOne->slider_image }}" />

                                        {{-- for Mobile --}}
                                        {{-- <img class="blur-up lazyloaded hidden-sm"
                                            data-src="allUsers/customer/images/mobile-images/casual banner mobile.jpg"
                                            src="allUsers/customer/images/mobile-images/casual banner mobile.jpg" /> --}}

                                        <img class="blur-up lazyloaded hidden-sm"
                                            data-src="{{ asset('/uploads/sliders') }}/{{ $mostLovedDesignersBannerOne->second_slider_image }}"
                                            src="{{ asset('/uploads/sliders') }}/{{ $mostLovedDesignersBannerOne->second_slider_image }}" />
                                    @else
                                        <img class="blur-up lazyload"
                                            data-src="{{ asset('allUsers/customer/images/new-theme/cardship-img1.png') }}"
                                            src="{{ asset('allUsers/customer/images/new-theme/cardship-img1.png') }}" />
                                    @endif

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 banner-item cl-item">
                        <div class="collection-grid-item mb-2">
                            <a @isset($mostLovedDesignersBannerTwo->slider_link) href="{{
                                $mostLovedDesignersBannerTwo->slider_link }}"
                                target="_blank" @endisset>
                                <div class="img">

                                    @if (!empty($mostLovedDesignersBannerTwo->slider_image) || !empty($mostLovedDesignersBannerTwo->second_slider_image))
                                        {{-- for dasktop --}}
                                        <img class="blur-up lazyloaded hidden-xs"
                                            data-src="{{ asset('/uploads/sliders') }}/{{ $mostLovedDesignersBannerTwo->slider_image }}"
                                            src="{{ asset('/uploads/sliders') }}/{{ $mostLovedDesignersBannerTwo->slider_image }}" />

                                        {{-- for Mobile --}}
                                        {{-- <img class="blur-up lazyloaded hidden-sm"
                                            data-src="allUsers/customer/images/mobile-images/casual banner mobile.jpg"
                                            src="allUsers/customer/images/mobile-images/casual banner mobile.jpg" /> --}}

                                        <img class="blur-up lazyloaded hidden-sm"
                                            data-src="{{ asset('/uploads/sliders') }}/{{ $mostLovedDesignersBannerTwo->second_slider_image }}"
                                            src="{{ asset('/uploads/sliders') }}/{{ $mostLovedDesignersBannerTwo->second_slider_image }}" />
                                    @else
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/customer/images/new-theme/cardship-img1.png') }}"
                                        src="{{ asset('allUsers/customer/images/new-theme/cardship-img1.png') }}" />
                                    @endif

                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End Banner Masonary-->

    <!--Testimonial Slider-->
    <section class="section testimonial-slider">
        <div class="container-fluid">
            <div class="section-header mb-0">
                <div class="product-review">
                    <i class="an an-star-o"></i>
                    <i class="an an-star-o"></i>
                    <i class="an an-star-o"></i>
                    <i class="an an-star-o"></i>
                    <i class="an an-star-o"></i>
                </div>
               
                <div class="section-header mainHeading col-12 mt-2">
                    <h2><span>We love hearing from you...</span></h2>
                </div>
            
            </div>
            <div class="quote-wraper">
                <!--Testimonial Slider Items-->
                <div class="quotes-slider arwOut3">
                    @foreach ($getAllTestimonials as $testimonial)
                    <div class="quotes-slide">
                        <blockquote class="quotes-slider__text text-center">
                            <div class="rte-setting">
                                <p>{!! htmlspecialchars_decode($testimonial->testimonial) !!}</p>
                            </div>
                            <p class="authour">{{ $testimonial->patient_name }}</p>
                            <p class="cmp-name">{{ $testimonial->patient_occupation }}</p>
                        </blockquote>
                    </div>
                    @endforeach
                </div>
                <!--Testimonial Slider Items-->
            </div>
        </div>
    </section>
    <!--End Testimonial Slider-->

    <!--Blog Post-->
    <section class="section home-blog-post pt-0 pb-5 res-pb">
        <div class="container-fluid">
            
             <div class="section-header mainHeading col-12">
                    <h2><span>Latest Stories</span></h2>
                </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="blog-post-slider">
                        @forelse ($latestBlogs as $blog_item)
                        <div class="blogpost-item">
                            <a href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}"
                                class="post-thumb">
                                <img class="blur-up lazyload" src="{{asset('uploads/blog/')}}/{{$blog_item->image}}"
                                    data-src="{{asset('uploads/blog/')}}/{{$blog_item->image}}" alt="image" title="" />
                            </a>
                            <div class="post-detail">
                                <h3 class="post-title mb-2" style="height:50px"><a href="#">{{$blog_item->name}}</a></h3>
                               <p class="exceprt">
                                    
                                    {{ Str::limit($blog_item->short_desc, 120) }}

 
                                </p>
                                <a href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}"
                                    class="btn-small" style="color:#dc3545">Read More</a>
                            </div>
                        </div>

                        @empty
                        <div class="blogpost-item">
                            <a href="#" class="post-thumb">
                                <img class="blur-up lazyload" src="allUsers/customer/images/new-theme/story-img1.png
                        " data-src="allUsers/customer/images/new-theme/story-img1.png
                        " alt="image" title="" />
                            </a>
                            <div class="post-detail">
                                <h3 class="post-title mb-3"><a href="#">A Childrensalon Christmas</a></h3>
                                <p class="exceprt">There are many variations of passages of Lorem Ipsum available, but
                                    the majority have suffered alteration in some form, by injected humour, or rand...
                                </p>
                                <a href="#" class="btn-small">Read the Story</a>
                            </div>
                        </div>
                        <div class="blogpost-item">
                            <a href="#" class="post-thumb">
                                <img class="blur-up lazyload" src="allUsers/customer/images/new-theme/story-img2.png
                        " data-src="allUsers/customer/images/new-theme/story-img2.png
                        " alt="image" title="" />
                            </a>
                            <div class="post-detail">
                                <h3 class="post-title mb-3"><a href="#">A Childrensalon Christmas</a></h3>
                                <p class="exceprt">There are many variations of passages of Lorem Ipsum available, but
                                    the majority have suffered alteration in some form, by injected humour, or rand...
                                </p>
                                <a href="#" class="btn-small">Read the Story</a>
                            </div>
                        </div>
                        <div class="blogpost-item">
                            <a href="#" class="post-thumb">
                                <img class="blur-up lazyload" src="allUsers/customer/images/new-theme/story-img3.png
                        " data-src="allUsers/customer/images/new-theme/story-img3.png
                        " alt="image" title="" />
                            </a>
                            <div class="post-detail">
                                <h3 class="post-title mb-3"><a href="#">A Childrensalon Christmas</a></h3>
                                <p class="exceprt">There are many variations of passages of Lorem Ipsum available, but
                                    the majority have suffered alteration in some form, by injected humour, or rand...
                                </p>
                                <a href="#" class="btn-small">Read the Story</a>
                            </div>
                        </div>
                        <div class="blogpost-item">
                            <a href="#" class="post-thumb">
                                <img class="blur-up lazyload" src="allUsers/customer/images/new-theme/story-img4.png
                        " data-src="allUsers/customer/images/new-theme/story-img4.png
                        " alt="image" title="" />
                            </a>
                            <div class="post-detail">
                                <h3 class="post-title mb-3"><a href="#">A Childrensalon Christmas</a></h3>
                                <p class="exceprt">There are many variations of passages of Lorem Ipsum available, but
                                    the majority have suffered alteration in some form, by injected humour, or rand...
                                </p>
                                <a href="#" class="btn-small">Read the Story</a>
                            </div>
                        </div>

                        @endforelse


                    </div>
                </div>
            </div>
        <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <a href="https://littletags.webkype.co/blogs" class="btn btn-danger">GO TO BLOG</a>
                    
                </div>
            </div>
        </div>
    </section>
    <!--End Blog Post-->
    
    
    
    <!--End Blog Post-->
    
    <section class="store-features">
                    <div class="container-fluid">
                        <div class="row store-info border pt-3 pb-3">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3  text-center" style="border-right: 1px solid #ddd;">
                                <a  href="#">
                                    <div class="detail">
                                        <img src="https://littletags.webkype.co/allUsers/frontend/images/home-img/GUARANTED-AUTHENTICITY-ICONS.png" style="width:60px">
                                        <p class="sub-text mt-3">Guaranted Aunthenticity</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3  text-center" style="border-right: 1px solid #ddd;">
                                <a  href="#">
                                    <div class="detail">
                                        <img src="https://littletags.webkype.co/allUsers/frontend/images/home-img/COD-AVAILABLE-ICONS.png" style="width:60px">
                                        <p class="sub-text mt-3">COD Available</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center" style="border-right: 1px solid #ddd;">
                                <a  href="#">
                                    <div class="detail">
                                       <img src="https://littletags.webkype.co/allUsers/frontend/images/home-img/PERSONALIZATION-AVAILABLE-ICONS.png" style="width:60px">
                                        <p class="sub-text mt-3">Personalisation Available</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center">
                                <a  href="#">
                                    <div class="detail">
                                       <img src="https://littletags.webkype.co/allUsers/frontend/images/home-img/FREE-SHIPPING-ICONS.png" style="width:60px">
                                        <p class="sub-text mt-3">Free Shipping <sup>*</sup></p>
                                    </div>
                                </a>
                            </div>
                           
                        </div>
                    </div>
                </section>
    

    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider store_section-" style="display:none">
        <div class="container-fluid">

            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2><span>Store</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="productSlider02 grid-products">
                    <div class="item">
                        <div class="product-image">
                            <a href="https://littletags.webkype.co/store-locator" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/DLF_Avenue.jpg"
                                    src="allUsers/customer/images/new-theme/DLF_Avenue.jpg" />
                                <img class="hover blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/DLF_Avenue.jpg"
                                    src="allUsers/customer/images/new-theme/DLF_Avenue.jpg" />
                            </a>
                        </div>
                        <div class="product-details">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0">Delhi Store</h3>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="https://littletags.webkype.co/store-locator" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/La_Femme.jpg"
                                    src="allUsers/customer/images/new-theme/La_Femme.jpg" />
                                <img class="hover blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/La_Femme.jpg"
                                    src="allUsers/customer/images/new-theme/La_Femme.jpg" />
                            </a>
                        </div>
                        <div class="product-details">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0">Greater Kailash</h3>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="https://littletags.webkype.co/store-locator" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/johdpurstorelocator.jpeg"
                                    src="allUsers/customer/images/new-theme/johdpurstorelocator.jpeg" />
                                <img class="hover blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/johdpurstorelocator.jpeg"
                                    src="allUsers/customer/images/new-theme/johdpurstorelocator.jpeg" />
                            </a>
                        </div>
                        <div class="product-details">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0">Jodhpur Store</h3>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="https://littletags.webkype.co/store-locator" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/Hyderabad.jpg"
                                    src="allUsers/customer/images/new-theme/Hyderabad.jpg" />
                                <img class="hover blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/Hyderabad.jpg"
                                    src="allUsers/customer/images/new-theme/Hyderabad.jpg" />
                            </a>
                        </div>
                        <div class="product-details">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0">Hyderabad Store</h3>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="https://littletags.webkype.co/store-locator" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/Mumbai-Store.jpg"
                                    src="allUsers/customer/images/new-theme/Mumbai-Store.jpg" />
                                <img class="hover blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/Mumbai-Store.jpg"
                                    src="allUsers/customer/images/new-theme/Mumbai-Store.jpg" />
                            </a>
                        </div>
                        <div class="product-details">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0">Mumbai Store</h3>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>

                    <div class="item">
                        <div class="product-image">
                            <a href="https://littletags.webkype.co/store-locator" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/kolkata_store.jpg"
                                    src="allUsers/customer/images/new-theme/kolkata_store.jpg" />
                                <img class="hover blur-up lazyload"
                                    data-src="allUsers/customer/images/new-theme/kolkata_store.jpg"
                                    src="allUsers/customer/images/new-theme/kolkata_store.jpg" />
                            </a>
                        </div>
                        <div class="product-details">
                            <!--Product Name-->
                            <div class="product-name text-uppercase mt-2">
                                <h3 class="mb-0">Kolkata Store</h3>
                            </div>
                            <!--End Product Name-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

    <!--End Banner Masonary-->
</div>
<!--End Body container-->
<!--Newsletter Popup-->
<div id="newsletter-modal" class="style1 mfp-with-anim mfp-hide">
    <div class="d-flex flex-column">
        <div class="newsltr-img d-none d-sm-none d-md-block"><img
                src="https://www.littletags.com/bannerimageshome/lohri/Artboard1.jpg" alt="image">
        </div>
        <div class="newsltr-text text-center">
            <div class="wraptext">
                <p><b>WELCOME TO THE LITTLETAGS</b></p>
                <h2 class="title fw-normal mb-4">ENJOY 10 {{Session::get('is_not_open')}}% OFF ON YOUR FIRST PURCHASE
                </h2>
                <form action="{{ route('customer.subscribe-newsletter') }}" method="post"
                    class="mcNewsletter mb-4 newsletter-form-two">
                    @csrf
                    <div class="input-group d-flex flex-nowrap">
                        <input type="email" class="rounded-start newsletter__input" name="newsletter_email_two" value=""
                            placeholder="Email address" required>
                        <span><button type="submit" class="btn mcNsBtn rounded-end" name="commit"
                                id="Subscribe"><span>Subscribe</span></button></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
</div>
<!--End Newsletter Popup-->


<script>
    // function newsletter_popup() {
    //             var cookieSignup = "cookieSignup",
    //                 date = new Date();
    //             if ($.cookie(cookieSignup) != 'true' && window.location.href.indexOf("challenge#newsletter-modal") <= -1) {
                   
                    
    //             //    alert(1)
    //                 setTimeout(function () {
    //                     $.magnificPopup.open({
    //                         items: {
    //                             src: '#newsletter-modal'
    //                         },
    //                         type: 'inline',
    //                         removalDelay: 300,
    //                         // mainClass: 'mfp-zoom-in'
    //                     });
    //                 }, 1000);
    //             }
    //  $.magnificPopup.instance.close = function () {
    //                 alert(2)
    //                 if ($("#dontshow").prop("checked") == true) {
    //                     $.cookie(cookieSignup, 'true', {
    //                         expires: 1,
    //                         path: '/'
    //                     });
    //                 }
    //                 $.magnificPopup.proto.close.call(this);
    //             }
    //         }
            
            // document.addEventListener("DOMContentLoaded", (event) => {
            //     newsletter_popup();
            // });

</script>
@endsection