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

    <!--Home Slider-->
    <section class="slideshow slideshow-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="home-slideshow p-0">

                    @forelse ($sliders as $slider)
                    <div class="slide">
                        <div class="blur-up lazyload">
                            <a href="{{ $slider->slider_link }}" target="_blank">
                                <img class="blur-up lazyload desktop-hide"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                                <img class="blur-up lazyload mobile-hide"
                                    data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                    src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="slide">
                        <div class="blur-up lazyload">
                            <a href="#" target="_blank">
                                <img class="blur-up lazyload desktop-hide"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/wedding-banner.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/wedding-banner.png') }}" />

                                <img class="blur-up lazyload mobile-hide"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/wedding-banner.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/wedding-banner.png') }}" />
                            </a>
                        </div>
                    </div>

                    @endforelse






                </div>
            </div>
        </div>
    </section>
    <!--End Home Slider-->


    <!--Banner Masonary-->
    <section class="collection-banners style1 section pb-0 ">
        <div class="container-fluid">
            <div class="grid-mr-20">
                <div class="grid-sizer col-md-3 col-lg-3"></div>
                <div class="row">
                    @if (isset($subSliders))
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 banner-item cl-item">
                        <div class="collection-grid-item mb-2">
                            <a @isset($subSliders[0]->slider_link) href="{{ $subSliders[0]->slider_link }}"
                                target="_blank"
                                @endisset>
                                <div class="img">
                                    <img class="blur-up lazyload" @isset($subSliders[0]->slider_image) data-src="{{
                                    asset('/uploads/sliders') }}/{{$subSliders[0]->slider_image }}"
                                    target="_blank"
                                    @endisset />
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 banner-item cl-item">
                        <div class="collection-grid-item mb-2">
                            <a @isset($subSliders[1]->slider_link) href="{{ $subSliders[1]->slider_link }}"
                                target="_blank"
                                @endisset>
                                <div class="img">

                                    <img class="blur-up lazyload" @isset($subSliders[1]->slider_image) data-src="{{
                                    asset('/uploads/sliders') }}/{{$subSliders[1]->slider_image }}"
                                    target="_blank"
                                    @endisset />

                                </div>
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 banner-item cl-item">
                        <div class="collection-grid-item mb-2">
                            <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/frontend/images/wedding/wedding-girlBnr.png') }}"
                                        src="{{ asset('allUsers/frontend/images/wedding/wedding-girlBnr.png') }}" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 banner-item cl-item">
                        <div class="collection-grid-item mb-2">
                            <a href="#">
                                <div class="img">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('allUsers/frontend/images/wedding/wedding-boyBnrpng.png') }}"
                                        src="{{ asset('allUsers/frontend/images/wedding/wedding-boyBnrpng.png') }}" />
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif




                </div>
            </div>
        </div>
    </section>
    <!--End Banner Masonary-->


    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header text-uppercase col-12">
                    <h2>Designer </h2>
                </div>
            </div>
            <div class="productSlider0 grid-products">


                @forelse ($weddingDesignerSliders as $slider)
                <div class="item">
                    <div class="product-image">
                        <a href="{{ $slider->slider_link }}" target="_blank">
                            <img class="blur-up lazyload desktop-hide"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="blur-up lazyload mobile-hide"
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
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img1.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img1.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img1.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img2.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img2.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img2.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img3.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img3.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img3.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img3.png') }}" />
                        </a>
                    </div>
                </div>

                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img4.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img4.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img4.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img4.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img5.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img5.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img5.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img5.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img6.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img6.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/designer-img6.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/designer-img6.png') }}" />
                        </a>
                    </div>
                </div>
                @endforelse



            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

    <!--Banner Masonary-->
    <section class="section pb-0 ">
        <div class="container-fluid">
            <div class="row">

                @if (isset($weddingDesignerBannersLeft->slider_image))
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <div class="collection-grid-item">
                        <a href="#">
                            <div class="img">

                                <img class="blur-up lazyload" @isset($weddingDesignerBannersLeft->slider_image)
                                data-src="{{
                                asset('/uploads/sliders') }}/{{$weddingDesignerBannersLeft->slider_image}}"
                                target="_blank"
                                src="{{ asset('/uploads/sliders') }}/{{$weddingDesignerBannersLeft->slider_image }}"
                                @endisset />

                            </div>
                        </a>
                    </div>
                </div>
                @else
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <div class="collection-grid-item">
                        <a href="#">
                            <div class="img">

                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/lehengas-bnr.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/lehengas-bnr.png') }}" />
                            </div>
                        </a>
                    </div>
                </div>
                @endif
                @forelse ($weddingDesignerBannersRight as $slider)
                <div class="col-6 col-sm-3 col-md-3 col-lg-3 ">
                    <div class="collection-grid-item">
                        <a href="{{ $slider->slider_link }}" target="_blank">
                            <img class="blur-up lazyload desktop-hide"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="blur-up lazyload mobile-hide"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-6 col-sm-3 col-md-3 col-lg-3 ">
                    <div class="collection-grid-item">
                        <a href="#">
                            <div class="img">
                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/lehengas-img1.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/lehengas-img1.png') }}" />
                            </div>
                        </a>
                    </div>
                </div>



                <div class="col-6 col-sm-3 col-md-3 col-lg-3">
                    <div class="collection-grid-item">
                        <a href="#">
                            <div class="img">
                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/lehengas-img2.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/lehengas-img2.png') }}" />
                            </div>
                        </a>
                    </div>
                </div>
                @endforelse


            </div>
        </div>
    </section>

    <!--Banner Masonary-->

    <!--More Offer on Brands Slider-->
    <section class="section product-slider pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header text-uppercase col-12">
                    <h2>Girl</h2>
                </div>
            </div>
            <div class="productSlider02 grid-products">

                @forelse ($weddingGirl as $slider)
                <div class="item">
                    <div class="product-image">
                        <a href="{{ $slider->slider_link }}" target="_blank">
                            <img class="blur-up lazyload desktop-hide"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="blur-up lazyload mobile-hide"
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
                                data-src="{{ asset('allUsers/frontend/images/wedding/style-img1.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/style-img1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/style-img1.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/style-img1.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/style-img2.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/style-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/style-img2.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/style-img2.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/style-img3.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/style-img3.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/style-img3.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/style-img3.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/style-img4.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/style-img4.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/style-img4.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/style-img4.png') }}" />
                        </a>
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

    <!--More Offer on Brands Slider-->
    <section class="section product-slider pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header text-uppercase col-12">
                    <h2>Boy</h2>
                </div>
            </div>
            <div class="productSlider02 grid-products">

                @forelse ($weddingBoy as $slider)
                <div class="item">
                    <div class="product-image">
                        <a href="{{ $slider->slider_link }}" target="_blank">
                            <img class="blur-up lazyload desktop-hide"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="blur-up lazyload mobile-hide"
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
                                data-src="{{ asset('allUsers/frontend/images/wedding/boy_style-img1.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/boy_style-img1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/boy_style-img1.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/boy_style-img1.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/boy_style-img2.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/boy_style-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/boy_style-img2.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/boy_style-img2.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/boy_style-img1.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/boy_style-img1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/boy_style-img1.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/boy_style-img1.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/boy_style-img2.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/boy_style-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/boy_style-img2.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/boy_style-img2.png') }}" />
                        </a>
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->



    <!--Banner Masonary-->
    <section class="section pb-0 ">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header text-uppercase col-12">
                    <h2>Occasions</h2>
                </div>
            </div>
            <div class="row">

                @forelse ($weddingOccasions as $slider)
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 mb-4">
                    <div class="collection-grid-item">
                        <a href="{{ $slider->slider_link }}" target="_blank">
                            <img class="blur-up lazyload desktop-hide"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="blur-up lazyload mobile-hide"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />
                        </a>
                    </div>
                </div>
                @empty

                <div class="col-4 col-sm-4 col-md-4 col-lg-4 mb-4">
                    <div class="collection-grid-item">
                        <a href="#">
                            <div class="img">
                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/occasions-img1.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/occasions-img1.png') }}" />
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 mb-4">
                    <div class="collection-grid-item">
                        <a href="#">
                            <div class="img">
                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/occasions-img2.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/occasions-img2.png') }}" />
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 mb-4">
                    <div class="collection-grid-item">
                        <a href="#">
                            <div class="img">
                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/occasions-img3.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/occasions-img3.png') }}" />
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="collection-grid-item">
                        <a href="#">
                            <div class="img">
                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/occasions-img4.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/occasions-img4.png') }}" />
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="collection-grid-item">
                        <a href="#">
                            <div class="img">
                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/occasions-img5.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/occasions-img5.png') }}" />
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="collection-grid-item">
                        <a href="#">
                            <div class="img">
                                <img class="blur-up lazyloaded"
                                    data-src="{{ asset('allUsers/frontend/images/wedding/occasions-img6.png') }}"
                                    src="{{ asset('allUsers/frontend/images/wedding/occasions-img6.png') }}" />
                            </div>
                        </a>
                    </div>
                </div>
                @endforelse



            </div>
        </div>
    </section>

    <!--Banner Masonary-->


    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider ">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header text-uppercase col-12">
                    <h2>Accessory Edit</h2>
                </div>
            </div>
            <div class="productSlider_hm1 grid-products">

                @forelse ($weddingAccessoryEdit as $slider)
                <div class="item">
                    <div class="product-image">
                        <a href="{{ $slider->slider_link }}" target="_blank">
                            <img class="blur-up lazyload desktop-hide"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}" />

                            <img class="blur-up lazyload mobile-hide"
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
                                data-src="{{ asset('allUsers/frontend/images/wedding/accessory-img1.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/accessory-img1.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/accessory-img1.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/accessory-img1.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/accessory-img2.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/accessory-img2.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/accessory-img2.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/accessory-img2.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/accessory-img3.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/accessory-img3.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/accessory-img3.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/accessory-img3.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/accessory-img4.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/accessory-img4.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/accessory-img4.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/accessory-img4.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="product-image">
                        <a href="#" class="product-img">
                            <img class="primary blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/accessory-img5.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/accessory-img5.png') }}" />
                            <img class="hover blur-up lazyload"
                                data-src="{{ asset('allUsers/frontend/images/wedding/accessory-img5.png') }}"
                                src="{{ asset('allUsers/frontend/images/wedding/accessory-img5.png') }}" />
                        </a>
                    </div>
                </div>
                @endforelse


            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->


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
                <h2 class="title fw-normal mb-4">ENJOY 10% OFF ON YOUR FIRST PURCHASE</h2>
                <form action="{{ route('customer.subscribe-newsletter') }}" method="post"
                    class="mcNewsletter mb-4 newsletter-form-2">
                    @csrf
                    <div class="input-group d-flex flex-nowrap">
                        <input type="email" class="rounded-start newsletter__input" name="newsletter_email_2" value=""
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
{{-- <script>
    function newsletter_popup() {
                var cookieSignup = "cookieSignup",
                    date = new Date();
                if ($.cookie(cookieSignup) != 'true' && window.location.href.indexOf("challenge#newsletter-modal") <= -1) {
                   
                    
                //    alert(1)
                    setTimeout(function () {
                        $.magnificPopup.open({
                            items: {
                                src: '#newsletter-modal'
                            },
                            type: 'inline',
                            removalDelay: 300,
                            // mainClass: 'mfp-zoom-in'
                        });
                    }, 1000);
                }
     $.magnificPopup.instance.close = function () {
                    alert(2)
                    if ($("#dontshow").prop("checked") == true) {
                        $.cookie(cookieSignup, 'true', {
                            expires: 1,
                            path: '/'
                        });
                    }
                    $.magnificPopup.proto.close.call(this);
                }
            }
            
            document.addEventListener("DOMContentLoaded", (event) => {
                newsletter_popup();
            });

</script> --}}
@endsection