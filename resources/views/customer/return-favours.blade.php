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

    .discover_store {
        width: 95% !importent;
    }
</style>
<!--Body container-->
<div id="page-content">

    <section class="section banner_sec pt-0">
        <div class="container-fluid">
            <div class="row">
                <a @isset($mainBanner->slider_link) href="{{
                    $mainBanner->slider_link }}"
                    target="_blank" @endisset>
                    @if (!empty($mainBanner->slider_image))
                    <!-- <img alt="banner" alt="" class=" w-100"
                        src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->slider_image }}" /> -->

                         {{-- for dasktop --}}
                        <img class=" primary blur-up lazyloaded hidden-xs"
                            data-src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->slider_image }}"
                            src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->slider_image }}"  title="{{ $mainBanner->slider_title }}"  />

                        {{-- for Mobile --}}
                        
                        <img class=" primary blur-up lazyloaded hidden-sm"
                            data-src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->second_slider_image }}"
                            src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->second_slider_image }}" />

                    @else
                    <img src="{{ asset('allUsers/girlpage/girl-banner.png') }}" alt="banner" alt="" class=" w-100" />
                    @endif
                </a>
            </div>
        </div>
    </section>

    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="collection-slider-7items grid-products returnfavours_cat">

                        @forelse ($circleImagesSliders as $slider)
                        <div class="item">
                            <div class="product-image">
                                <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                                    @endisset
                                    class="product-img">
                                    <img class="primary blur-up lazyload"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                                    <img class="hover blur-up lazyload"
                                        data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                        src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                                </a>
                            </div>
                            <div class="product-details text-center">
                                <!--Product Name-->
                                <div class="product-name text-uppercase">
                                    <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                                        @endisset class="fw-normal" tabindex="0">{{$slider->slider_title}}</a>
                                </div>
                                <!--End Product Name-->
                            </div>
                        </div>
                        @empty
                        <div class="item">
                            <div class="product-image">
                                <a href="#" class="product-img" tabindex="0">
                                    <img class="primary blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                    <img class="hover blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                </a>
                            </div>
                            <div class="product-details text-center">
                                <!--Product Name-->
                                <div class="product-name text-uppercase">
                                    <a href="#" class="fw-normal" tabindex="0">Combos</a>
                                </div>
                                <!--End Product Name-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <a href="#" class="product-img" tabindex="0">
                                    <img class="primary blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                    <img class="hover blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                </a>
                            </div>
                            <div class="product-details text-center">
                                <!--Product Name-->
                                <div class="product-name text-uppercase">
                                    <a href="#" class="fw-normal" tabindex="0">Backpacks</a>
                                </div>
                                <!--End Product Name-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <a href="#" class="product-img" tabindex="0">
                                    <img class="primary blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                    <img class="hover blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                </a>
                            </div>
                            <div class="product-details text-center">
                                <!--Product Name-->
                                <div class="product-name text-uppercase">
                                    <a href="#" class="fw-normal" tabindex="0">Art & Craft</a>
                                </div>
                                <!--End Product Name-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <a href="#" class="product-img" tabindex="0">
                                    <img class="primary blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                    <img class="hover blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                </a>
                            </div>
                            <div class="product-details text-center">
                                <!--Product Name-->
                                <div class="product-name text-uppercase">
                                    <a href="#" class="fw-normal" tabindex="0">Stationery</a>
                                </div>
                                <!--End Product Name-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <a href="#" class="product-img" tabindex="0">
                                    <img class="primary blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                    <img class="hover blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                </a>
                            </div>
                            <div class="product-details text-center">
                                <!--Product Name-->
                                <div class="product-name text-uppercase">
                                    <a href="#" class="fw-normal" tabindex="0">Food & Drinks</a>
                                </div>
                                <!--End Product Name-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <a href="#" class="product-img" tabindex="0">
                                    <img class="primary blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                    <img class="hover blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                </a>
                            </div>
                            <div class="product-details text-center">
                                <!--Product Name-->
                                <div class="product-name text-uppercase">
                                    <a href="#" class="fw-normal" tabindex="0">Toy & Tech</a>
                                </div>
                                <!--End Product Name-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image">
                                <a href="#" class="product-img" tabindex="0">
                                    <img class="primary blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                    <img class="hover blur-up lazyloaded"
                                        data-src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png"
                                        src="https://littletags.webkype.co/allUsers/customer/images/new-theme/winter-img1.png">
                                </a>
                            </div>
                            <div class="product-details text-center">
                                <!--Product Name-->
                                <div class="product-name text-uppercase">
                                    <a href="#" class="fw-normal" tabindex="0">Little Fingers</a>
                                </div>
                                <!--End Product Name-->
                            </div>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

    <section class="collection-banners style1 section ">
        <div class="container-fluid">
            <div class=" col-sm-12">
                <div class="grid-sizer col-md-3 col-lg-3"></div>
                <div class="row">
                    <div class="col-6 col-lg-6 cl-item">
                        <div class="collection-grid-item mb-2">

                            <a @isset($thirdSectionFirstBanner->slider_link) href="{{
                                $thirdSectionFirstBanner->slider_link }}"
                                target="_blank" @endisset>
                                @if (!empty($thirdSectionFirstBanner->slider_image) || !empty($thirdSectionFirstBanner->second_slider_image))
                          
                                {{-- for dasktop --}}
                                <img class=" primary blur-up lazyloaded hidden-xs"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $thirdSectionFirstBanner->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $thirdSectionFirstBanner->slider_image }}"  title="{{ $thirdSectionFirstBanner->slider_title }}"  />

                                {{-- for Mobile --}}
                                
                                <img class=" primary blur-up lazyloaded hidden-sm"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $thirdSectionFirstBanner->second_slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $thirdSectionFirstBanner->second_slider_image }}" />
                                    
                                @else
                                <img class="blur-up lazyload" style="width:100%"
                                    data-src="{{ asset('allUsers/return-favoursPage/return-favourshalfBanner.png') }}"
                                    src="{{ asset('allUsers/return-favoursPage/return-favourshalfBanner.png') }}" />
                                @endif
                            </a>

                        </div>
                    </div>

                    <div class="col-6 col-lg-6 cl-item">
                        <div class="collection-grid-item mb-2">

                            <a @isset($thirdSectionSecondBanner->slider_link) href="{{
                                $thirdSectionSecondBanner->slider_link }}"
                                target="_blank" @endisset>
                                @if (!empty($thirdSectionSecondBanner->slider_image))
                                <img class="blur-up lazyload" style="width:100%"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $thirdSectionSecondBanner->slider_image }}"
                                    src=" {{ asset('/uploads/sliders') }}/{{ $thirdSectionSecondBanner->slider_image }}" />
                                @else
                                <img class="blur-up lazyload" style="width:100%"
                                    data-src="{{ asset('allUsers/return-favoursPage/return-favourshalfBanner2.png') }}"
                                    src="{{ asset('allUsers/return-favoursPage/return-favourshalfBanner2.png') }}" />
                                @endif
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider return_favoursSellers res-pt">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Bestsellers</span></h2>
                </div>
            </div>
            <div class="productSlider02 grid-products">

                @forelse ($bestSellerSliders as $slider)
                <div class="item">
                    <div class="product-image">
                        <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank" @endisset
                            class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                            <span class="newArrival">{{$slider->slider_title}}</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a @isset($slider->slider_link) href="{{ $slider->slider_link }}"
                                    target="_blank" @endisset
                                    class="fw-normal"><b>{{$slider->slider_description}}</b></a>
                            </h3>
                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price">
                            <span class="old-price">₹{{$slider->mrp}}</span>
                            <span class="price">₹{{$slider->price_unit}}</span>
                        </div>
                        <!-- End Product Price-->
                        {{-- <a href="" class="btn btn-outline-black w-100">Add to Cart</a> --}}
                    </div>
                </div>


                @empty


                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <span class="newArrival">New Arrival</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>
                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <span class="Discount_tb">-30% OFF</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>

                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <span class="newArrival">New Arrival</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>
                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <span class="Discount_tb">-30% OFF</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>

                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <span class="newArrival">New Arrival</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>
                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <span class="Discount_tb">-30% OFF</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>

                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
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
                    <h2 class="text-uppercase"><span>Character Store</span></h2>
                </div>
            </div>
            <div class="productSlider02 grid-products pb-3 mb-3">


                @forelse ($characterStoreSliderOne as $slider)
                <div class="item">
                    <div class="product-image">
                        <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                            @endisset class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a @isset($slider->slider_link) href="{{ $slider->slider_link }}"
                                    target="_blank"
                                    @endisset class="fw-normal text-uppercase"
                                    tabindex="0"><b>{{$slider->slider_title}}</b></a></h3>
                            <a @isset($slider->slider_link) href="{{ $slider->slider_link }}"
                                target="_blank"
                                @endisset class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                @empty

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal text-uppercase" tabindex="0"><b>New
                                        Arrivals</b></a></h3>
                            <a href="" class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal text-uppercase" tabindex="0"><b>New
                                        Arrivals</b></a></h3>
                            <a href="" class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg3.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg3.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg3.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg3.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal text-uppercase" tabindex="0"><b>New
                                        Arrivals</b></a></h3>
                            <a href="" class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal text-uppercase" tabindex="0"><b>New
                                        Arrivals</b></a></h3>
                            <a href="" class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal text-uppercase" tabindex="0"><b>New
                                        Arrivals</b></a></h3>
                            <a href="" class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>

                @endforelse


            </div>

            <div class="productSlider02 grid-products pb-3">

                @forelse ($characterStoreSliderTwo as $slider)
                <div class="item">
                    <div class="product-image">
                        <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                            @endisset class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a @isset($slider->slider_link) href="{{ $slider->slider_link }}"
                                    target="_blank"
                                    @endisset class="fw-normal text-uppercase"
                                    tabindex="0"><b>{{$slider->slider_title}}</b></a></h3>
                            <a @isset($slider->slider_link) href="{{ $slider->slider_link }}"
                                target="_blank"
                                @endisset class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                @empty

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal text-uppercase" tabindex="0"><b>New
                                        Arrivals</b></a></h3>
                            <a href="" class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal text-uppercase" tabindex="0"><b>New
                                        Arrivals</b></a></h3>
                            <a href="" class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg3.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg3.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg3.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg3.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal text-uppercase" tabindex="0"><b>New
                                        Arrivals</b></a></h3>
                            <a href="" class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg1.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal text-uppercase" tabindex="0"><b>New
                                        Arrivals</b></a></h3>
                            <a href="" class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-characterImg2.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal text-uppercase" tabindex="0"><b>New
                                        Arrivals</b></a></h3>
                            <a href="" class="shop_btn">Shop Now</a>
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
    <section class="section product-slider return_favoursSellers pt-0">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Hot Deals</span></h2>
                </div>
            </div>
            <div class="productSlider02 grid-products">

                @forelse ($hotDealsSliders as $slider)
                <div class="item">
                    <div class="product-image">
                        <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                            @endisset class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name  mt-2">
                            <h3 class="mb-0">
                                <a @isset($slider->slider_link) href="{{ $slider->slider_link }}"
                                    target="_blank"
                                    @endisset class="fw-normal"
                                    tabindex="0"><b>{{$slider->slider_title}}</b></a>
                            </h3>

                            <!--Product Price-->
                            <div class="product-price ">
                                @if(!empty($slider->price_unit))
                                <span class="old-price">₹{{ $slider->price_unit}}</span>
                                @endif
                                @if(!empty($slider->mrp))
                                <span class="price">₹{{$slider->mrp}}</span>
                                @endif
                            </div>
                            <a @isset($slider->slider_link) href="{{ $slider->slider_link }}"
                                target="_blank"
                                @endisset class="shop_btn">Shop Now</a>
                        </div>
                        <!--End Product Name-->

                    </div>
                </div>
                @empty

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <span class="newArrival">New Arrival</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>
                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <span class="Discount_tb">-30% OFF</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>

                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <span class="newArrival">New Arrival</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>
                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <span class="Discount_tb">-30% OFF</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>

                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg.png') }}" />
                            <span class="newArrival">New Arrival</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>
                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-bestSellerImg2.png') }}" />
                            <span class="Discount_tb">-30% OFF</span>
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Tentacle Fun Crawling Octopus MAXX- Buy 3
                                        Get 1 Free</b></a></h3>

                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price mt-3 mb-3">
                            <span class="old-price">₹1196.00</span>
                            <span class="price">₹897.00</span>
                        </div>
                        <!-- End Product Price-->
                        <a href="" class="btn btn-outline-black w-100">Add to Cart</a>
                    </div>
                </div>

                @endforelse

            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

    <section class="section product-slider">
        <div class="container-fluid">
            <div class="row">
                
                 <div class="section-header mainHeading col-12 ">
                    <h2><span>The Value Store</span></h2>
                </div>
            </div>
            <div class="productSlider02 grid-products">


                @forelse ($theValueStoreSliders as $slider)
                <div class="item">
                    <div class="product-image">
                        <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                            @endisset class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                        </a>
                    </div>
                </div>
                @empty
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg1.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg1.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg1.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg2.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg2.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg3.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg3.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg3.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg3.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg4.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg4.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg4.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg4.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg3.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg3.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg3.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-storeImg3.png') }}" />
                        </a>
                    </div>
                </div>

                @endforelse

            </div>
        </div>
    </section>

    <section class="section banner_sec pt-0">
        <div class="container-fluid">
            <div class="row">
                <a @isset($theValueStoreBanner->slider_link) href="{{
                    $theValueStoreBanner->slider_link }}"
                    target="_blank" @endisset>
                    @if (!empty($theValueStoreBanner->slider_image) || !empty($theValueStoreBanner->second_slider_image))
                    <img alt="banner" alt="" class=" w-100 hidden-xs"
                        src="{{ asset('/uploads/sliders') }}/{{ $theValueStoreBanner->slider_image }}" />
                    <img alt="banner" alt="" class=" w-100 hidden-sm"
                        src="{{ asset('/uploads/sliders') }}/{{ $theValueStoreBanner->second_slider_image }}" />
                    @else
                    <img src="https://littletags.webkype.co/allUsers/return-favoursPage/gift_card.png" alt="banner"
                        class=" w-100">
                    @endif
                </a>
            </div>
        </div>
    </section>


    <!--Blog Post-->
    <section class="section home-blog-post">
        <div class="container-fluid">
            
            <div class="section-header mainHeading col-12">
                    <h2><span>Ready To Ship</span></h2>
                </div>
            <div class="productSlider02 grid-products mb-3">

                @forelse ($readyToShipSlidersOne as $slider)
                <div class="item">
                    <div class="product-image">
                        <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                            @endisset class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                        </a>
                    </div>
                </div>
                @empty
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Product Name</b></a></h3>
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
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Product Name</b></a></h3>
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
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Product Name</b></a></h3>
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
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Product Name</b></a></h3>
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
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Product Name</b></a></h3>
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

            <div class="productSlider02 grid-products">

                @forelse ($readyToShipSlidersTwo as $slider)
                <div class="item">
                    <div class="product-image">
                        <a @isset($slider->slider_link) href="{{ $slider->slider_link }}" target="_blank"
                            @endisset class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a @isset($slider->slider_link) href="{{ $slider->slider_link }}"
                                    target="_blank"
                                    @endisset class="fw-normal"><b>{{ $slider->slider_title }}</b></a></h3>
                        </div>
                        <!--End Product Name-->

                        <!--Product Price-->
                        <div class="product-price">
                            <span class="price">{{ $slider->price_unit }}</span>
                        </div>
                        <!-- End Product Price-->
                    </div>
                </div>

                @empty
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Product Name</b></a></h3>
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
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Product Name</b></a></h3>
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
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Product Name</b></a></h3>
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
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Product Name</b></a></h3>
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
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}"
                                src="{{ asset('allUsers/return-favoursPage/return-favours-ship.png') }}" />
                        </a>
                    </div>
                    <div class="product-details text-left">
                        <!--Product Name-->
                        <div class="product-name text-uppercase mt-2">
                            <h3 class="mb-0"><a href="#" class="fw-normal"><b>Product Name</b></a></h3>
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
    </section>
    <!--End Blog Post-->

    <section class="section banner_sec pt-0">
        <div class="container-fluid">
            <div class="row">
                <a @isset($readyToShipBanner->slider_link) href="{{
                    $readyToShipBanner->slider_link }}"
                    target="_blank" @endisset>
                    @if (!empty($readyToShipBanner->slider_image) || !empty($readyToShipBanner->second_slider_image) )
                    <img alt="banner" alt="" class=" w-100 hidden-xs"
                        src="{{ asset('/uploads/sliders') }}/{{ $readyToShipBanner->slider_image }}" />
                    <img alt="banner" alt="" class=" w-100 hidden-sm"
                        src="{{ asset('/uploads/sliders') }}/{{ $readyToShipBanner->second_slider_image }}" />
                    @else
                    <img src="https://littletags.webkype.co/allUsers/return-favoursPage/return-favours-personalised.png"
                        alt="banner" class=" w-100">
                    @endif
                </a>

            </div>
        </div>
    </section>
    <section class="section banner_sec order_wrapper">
        <div class="container-fluid">
            <div class="row">
                      <div class="section-header mainHeading col-12 mb-5">
                    <h2><span>Corporate Bulk Order</span></h2>
                    <p>Please submit the details mentionel below and we'll get back to you may also call on +
                        91-8447755555 for any queries</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5 mb-5">
                    <div class="contact-inner">
                        <!-- Contact Form -->
                        <div class="formFeilds contact-form form-vertical">
                            <form action="" name="contactus" method="post" id="contact-form" class="contact-form">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text" id="ContactFormName" name="name" class="form-control"
                                                placeholder="Name">
                                            <span class="error_msg" id="name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text" id="ContactFormName" name="name" class="form-control"
                                                placeholder="Phone">
                                            <span class="error_msg" id="name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="email" id="ContactFormEmail" name="email" class="form-control"
                                                placeholder="Email">
                                            <span class="error_msg" id="email_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text" id="ContactFormName" name="name" class="form-control"
                                                placeholder="Requirement">
                                            <span class="error_msg" id="name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-4">
                                        <div class="form-group">
                                            <a href="" class="btn btn-primary">SUBMIT</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Contact Form -->

                    </div>

                </div>
                <div class="col-sm-5">
                    <div class="row">

                        @forelse ($inquiryFromSideImages as $key => $slider)
                        @if($key == 0)
                        <div class="col-sm-4 col-4">
                            @endif

                            @if($key == 0)
                            <img src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" class="w-100 mb-2">
                            @endif

                            @if($key == 1)
                            <img src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" class="w-100 mb-2">
                            @endif


                            @if($key == 1)
                        </div>
                        @endif

                        @if ($key == 2)
                        <div class="col-sm-8 col-8">
                            <img src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" class="w-100 mb-2">
                        </div>
                        @endif

                        @if ($key > 2)
                        <div class="col-sm-4 col-4">
                            <img src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" class="w-100 mb-2">
                        </div>
                        @endif

                        @empty

                        <div class="col-sm-4 col-4">
                            <img src="https://littletags.webkype.co/allUsers/return-favoursPage/return-favours-orderImg1.png"
                                class="w-100 mb-2">
                            <img src="https://littletags.webkype.co/allUsers/return-favoursPage/return-favours-orderImg2.png"
                                class="w-100 mb-2">
                        </div>
                        <div class="col-sm-8 col-8">
                            <img src="https://littletags.webkype.co/allUsers/return-favoursPage/return-favours-orderImg2.png"
                                class="w-100 mb-2">
                        </div>
                        <div class="col-sm-4 col-4">
                            <img src="https://littletags.webkype.co/allUsers/return-favoursPage/return-favours-orderImg4.png"
                                class="w-100 mb-2">
                        </div>
                        <div class="col-sm-4 col-4">
                            <img src="https://littletags.webkype.co/allUsers/return-favoursPage/return-favours-orderImg3.png"
                                class="w-100 mb-2">
                        </div>
                        <div class="col-sm-4 col-4">
                            <img src="https://littletags.webkype.co/allUsers/return-favoursPage/return-favours-orderImg5.png"
                                class="w-100 mb-2">
                        </div>

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection