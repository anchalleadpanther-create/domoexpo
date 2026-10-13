@extends('customer.partials.header')
@section('customerContent')

<div id="page-content" class="girls_pg">
    <section class="section banner_sec p-0">
        <div class="container-fluid">
            <div class="row">


                <a @isset($holiFirstBanner->slider_link) href="{{
                    $holiFirstBanner->slider_link }}"
                    target="_blank" @endisset>
                    <div class="img">
                        @if (!empty($holiFirstBanner->slider_image))
                        <img class="blur-up lazyloaded"
                            data-src="{{ asset('/uploads/sliders') }}/{{ $holiFirstBanner->slider_image }}"
                            src="{{ asset('/uploads/sliders') }}/{{ $holiFirstBanner->slider_image }}" />
                        @else
                        <img class="blur-up lazyloaded" data-src="{{ asset('allUsers/holipage/holi_topBanner.jpg') }}"
                            src="{{ asset('allUsers/holipage/holi_topBanner.jpg') }}" />
                        @endif

                    </div>
                </a>


                {{--
                <a href="https://littletags.webkype.co/girl" target="_blank">
                    <img alt="banner" class=" w-100"
                        src="https://littletags.webkype.co/allUsers/holipage/holi_topBanner.jpg"> --}}
                </a>
            </div>
        </div>
    </section>
    <section class="section product-slider">
        <div class="container-fluid">
            <div class="productSlider02 grid-products">

                @forelse($holiSecondBanners as $slider)

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
                </div>
                @empty
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/banner_btmImg1.jpg') }}"
                                src="{{ asset('allUsers/holipage/banner_btmImg1.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/banner_btmImg1.jpg') }}"
                                src="{{ asset('allUsers/holipage/banner_btmImg1.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/banner_btmImg2.jpg') }}"
                                src="{{ asset('allUsers/holipage/banner_btmImg2.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/banner_btmImg2.jpg') }}"
                                src="{{ asset('allUsers/holipage/banner_btmImg2.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/banner_btmImg3.jpg') }}"
                                src="{{ asset('allUsers/holipage/banner_btmImg3.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/banner_btmImg3.jpg') }}"
                                src="{{ asset('allUsers/holipage/banner_btmImg3.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/banner_btmImg4.jpg') }}"
                                src="{{ asset('allUsers/holipage/banner_btmImg4.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/banner_btmImg4.jpg') }}"
                                src="{{ asset('allUsers/holipage/banner_btmImg4.jpg') }}" />
                        </a>
                    </div>
                </div>

                @endforelse
            </div>
        </div>
    </section>

    <section class="section product-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Colors of Holi</span></h2>
                </div>
            </div>
            <div class="productSlider02 grid-products">


                @forelse($colorsOfHoliFirstBanners as $slider)
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
                </div>
                @empty
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider1-img1.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider1-img1.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider1-img1.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider1-img1.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider1-img2.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider1-img2.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider1-img2.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider1-img2.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider1-img3.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider1-img3.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider1-img3.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider1-img3.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider1-img4.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider1-img4.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider1-img4.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider1-img4.jpg') }}" />
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

                <a @isset($colorsOfHoliFirstBanner->slider_link) href="{{
                    $holiFirstBanner->slider_link }}"
                    target="_blank" @endisset>
                    <div class="img">
                        @if (!empty($colorsOfHoliFirstBanner->slider_image))
                        <img class="blur-up lazyloaded"
                            data-src="{{ asset('/uploads/sliders') }}/{{ $colorsOfHoliFirstBanner->slider_image }}"
                            src="{{ asset('/uploads/sliders') }}/{{ $colorsOfHoliFirstBanner->slider_image }}" style="width:100%" />
                        @else
                        <img class="blur-up lazyloaded"
                            data-src="{{ asset('allUsers/holipage/holipage/holiSlider1-banneer.jpg') }}"
                            src="{{ asset('allUsers/holipage/holipage/holiSlider1-banneer.jpg') }}" style="width:100%" />
                        @endif

                    </div>
                </a>
                {{-- <a><img alt="banner" class=" w-100"
                        src="https://littletags.webkype.co/allUsers/holipage/holiSlider1-banneer.jpg"></a> --}}
            </div>
        </div>
    </section>


    <section class="section product-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Brand In Focus</span></h2>
                </div>
            </div>
            <div class="productSlider01 grid-products">

                @forelse($holiBrandsInFocusFirstBanners as $slider)
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
                </div>
                @empty
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider2-img1.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider2-img1.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider2-img1.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider2-img1.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider2-img2.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider2-img2.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider2-img2.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider2-img2.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider2-img3.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider2-img3.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider2-img3.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider2-img3.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider2-img4.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider2-img4.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider2-img4.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider2-img4.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider2-img2.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider2-img2.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider2-img2.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider2-img2.jpg') }}" />
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

                <a @isset($holiBrandsInFocusSecondBanner->slider_link) href="{{
                    $holiFirstBanner->slider_link }}"
                    target="_blank" @endisset>
                    <div class="img">
                        @if (!empty($holiBrandsInFocusSecondBanner->slider_image))
                        <img class="blur-up lazyloaded"
                            data-src="{{ asset('/uploads/sliders') }}/{{ $holiBrandsInFocusSecondBanner->slider_image }}"
                            src="{{ asset('/uploads/sliders') }}/{{ $holiBrandsInFocusSecondBanner->slider_image }}" style="width:100%" />
                        @else
                        <img class="blur-up lazyloaded"
                            data-src="{{ asset('allUsers/holipage/holipage/holiSlider2-banneer.jpg') }}"
                            src="{{ asset('allUsers/holipage/holipage/holiSlider2-banneer.jpg') }}" style="width:100%" />
                        @endif

                    </div>
                </a>
                {{-- <a><img alt="banner" class=" w-100"
                        src="https://littletags.webkype.co/allUsers/holipage/holiSlider2-banneer.jpg"></a> --}}
            </div>
        </div>
    </section>


    <section class="section product-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header mainHeading col-12">
                    <h2 class="text-uppercase"><span>Bestselleres</span></h2>
                </div>
            </div>
            {{-- 'holiBrandsInFocusFirstBanners',
            'holiBrandsInFocusSecondBanner',
            'holiBestSellersFirstBanners',
            'holiBestSellersFirstBanner' --}}
            <div class="productSlider01 grid-products">

                @forelse($holiBestSellersFirstBanners as $slider)
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
                </div>
                @empty
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider3-img1.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider3-img1.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider3-img1.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider3-img1.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider3-img2.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider3-img2.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider3-img2.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider3-img2.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider3-img3.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider3-img3.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider3-img3.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider3-img3.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider3-img4.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider3-img4.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider3-img4.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider3-img4.jpg') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider3-img2.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider3-img2.jpg') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/holipage/holiSlider3-img2.jpg') }}"
                                src="{{ asset('allUsers/holipage/holiSlider3-img2.jpg') }}" />
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

                <a @isset($holiBestSellersFirstBanner->slider_link) href="{{
                    $holiFirstBanner->slider_link }}"
                    target="_blank" @endisset>
                    <div class="img">
                        @if (!empty($holiBestSellersFirstBanner->slider_image))
                        <img class="blur-up lazyloaded"
                            data-src="{{ asset('/uploads/sliders') }}/{{ $holiBestSellersFirstBanner->slider_image }}"
                            src="{{ asset('/uploads/sliders') }}/{{ $holiBestSellersFirstBanner->slider_image }}" style="width:100%" />
                        @else
                        <img class="blur-up lazyloaded"
                            data-src="{{ asset('allUsers/holipage/holipage/holiSlider2-banneer.jpg') }}"
                            src="{{ asset('allUsers/holipage/holipage/holiSlider2-banneer.jpg') }}" style="width:100%" />
                        @endif

                    </div>
                </a>

                {{-- <a><img alt="banner" class=" w-100"
                        src="https://littletags.webkype.co/allUsers/holipage/holiSlider3-banneer.jpg"></a> --}}
            </div>
        </div>
    </section>


</div>
@endsection