@extends('customer.partials.header')

@section('customerContent')

@section('title', '')

@section('description', '')

@section('keywords', '')

<!--Body Container-->

{{-- style=" display: inline-block; width: 100%;" --}}

<div id="page-content" class="girls_pg">
    <section class="section banner_sec p-0">

        <div class="container-fluid">

            <div class="row">

                <a @isset($mainBanner->slider_link) href="{{
                    $mainBanner->slider_link }}"
                    target="_blank" @endisset>
                    @if (!empty($mainBanner->slider_image))
                    <img alt="banner" alt="" class=" w-100"
                        src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->slider_image }}" />
                    @else
                    <img src="{{ asset('allUsers/girlpage/girl-banner.png') }}" alt="banner" alt="" class=" w-100" />
                    @endif
                </a>

            </div>

        </div>

    </section>



    <!--Top Picks On Fashion Product Slider-->

    <section class="section product-slider pt-4">

        <div class="container-fluid">

            <div class="productSlider0 grid-products">


                @forelse ($girlPageFirstSlider as $slider)
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
                        </a>
                    </div>
                </div>
                @empty

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

                @endforelse




            </div>

        </div>

    </section>

    <!--End Top Picks On Fashion Product Slider-->



    <!--Top Picks On Fashion Product Slider-->

    <section class="section product-slider res-pt">

        <div class="container-fluid">

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

    <section class="section product-slider girls_catSlider res-pt">

        <div class="container-fluid">

            <div class="row">

                <div class="section-header mainHeading col-12">

                    <h2 class="text-uppercase"><span>Shop By Categories</span></h2>

                </div>

            </div>

            <div class="productSlider02 grid-products">

                @forelse ($shopByCategoriesOne as $slider)
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
                        </a>
                    </div>
                </div>
                @empty

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

                @endforelse

            </div>

            {{-- shopByCategoriesTwo --}}

            <div class="productSlider02 grid-products mt-5 res_mt20">

                @forelse ($shopByCategoriesTwo as $slider)
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
                        </a>
                    </div>
                </div>
                @empty

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

                    <h2 class="text-uppercase"><span>Shop By Brands</span></h2>

                </div>

            </div>

            <div class="productSlider02 grid-products">

                @forelse ($shopByBrandsSliders as $slider)
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
                        </a>
                    </div>
                </div>
                @empty
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
                @endforelse

            </div>

        </div>

    </section>

    <!--Top Picks On Fashion Product Slider-->

    <section class="section product-slider res-pt">

        <div class="container-fluid">

            <div class="row">

                <div class="section-header mainHeading col-12">

                    <h2 class="text-uppercase"><span>SUMMER CLOSET</span></h2>

                </div>

            </div>

            <div class="productSlider02 grid-products">

                @forelse ($winterClosetSliders as $slider)
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
                        </a>
                    </div>
                </div>
                @empty

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

                @endforelse
            </div>

        </div>

    </section>

    <!--End Body Container-->



    <section class="section banner_sec pt-0">

        <div class="container-fluid">

            <div class="row">

                <a @isset($footWearsBanner->slider_link) href="{{
                    $footWearsBanner->slider_link }}"
                    target="_blank" @endisset>
                    @if (!empty($footWearsBanner->slider_image) || !empty($footWearsBanner->second_slider_image))
                    <img alt="banner" class=" w-100 hidden-xs"
                        src="{{ asset('/uploads/sliders') }}/{{ $footWearsBanner->slider_image }}" />


                    <img alt="banner" class=" w-100 hidden-sm"
                        src="{{ asset('/uploads/sliders') }}/{{ $footWearsBanner->second_slider_image }}" />

                    {{-- <img alt="banner" class=" w-100 hidden-sm"
                        src="allUsers/customer/images/mobile-images/girl banner mobile.jpg" /> --}}
                    @else
                    <img src="{{ asset('allUsers/girlpage/girl-MidBanner.png') }}" alt="banner" alt="" class=" w-100" />
                    @endif
                </a>

                <a href="#" target="_blank">


                </a>

            </div>

        </div>

    </section>



    <!--Top Picks On Fashion Product Slider-->

    <section class="section product-slider res-pt">
        <div class="container-fluid">
            <div class="row">
                  <div class="section-header mainHeading col-12 mt-2">
                    <h2><span>Accessories</span></h2>
                </div>
            </div>
            <div class="productSlider01 grid-products">

                @forelse ($accessoriesSliders as $slider)
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
                        </a>
                    </div>
                </div>
                @empty

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

                @endforelse





            </div>

            <div class="row">

                <div class=" col-12 text-center mt-2">

                    <a href="https://littletags.webkype.co/girl-accessories-bags" class="text-uppercase btn btn-light" style="font-size: 11px;padding: 6px 10px;">View All</a>

                </div>

            </div>

        </div>

    </section>

    <!--End Body Container-->

    <!--Top Picks On Fashion Product Slider-->

    <section class="section product-slider res-pt">

        <div class="container-fluid">

            <div class="row">

                <div class="section-header mainHeading col-12">

                    <h2 class="text-uppercase"><span>Bestsellers</span></h2>

                </div>

            </div>

            <div class="productSlider02 grid-products">


                @forelse ($bestSeller as $slider)
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
                        </a>
                    </div>
                </div>
                @empty
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
                @endforelse




            </div>

        </div>

    </section>

    <!--End Body Container-->



</div>

<input type="hidden" class="new-in-designer" value="{{ Request::segment(3) }}" />

<script type="module" src="{{ asset('allUsers/customer/designer.js') }}"></script>

@endsection