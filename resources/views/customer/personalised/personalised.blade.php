@extends('customer.partials.header')
@section('customerContent')
@section('title', '')
@section('description', '')
@section('keywords', '')
<!--Body Container-->
{{-- style=" display: inline-block; width: 100%;" --}}
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
    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider res-pt">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-header mainHeading col-12">
                        <h2 class="text-uppercase"><span>Shop By Occassion</span></h2>
                    </div>
                </div>
                <div class="productSlider0 grid-products">

                    @forelse ($shopByOccassionOne as $slider)
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
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="productSlider0 grid-products mt-3">

                    @forelse ($shopByOccassionTwo as $slider)
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
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    @endforelse


                </div>

            </div>
            <!-- <div class="row"> 
                <div class=" col-12 text-center mt-4">
                    <a href="" class="text-uppercase btn btn-light">View All</a>
                </div>
            </div> -->
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->
    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider res-pt ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-header mainHeading col-12">
                        <h2 class="text-uppercase"><span>Shop By Category</span></h2>
                    </div>
                </div>
                <div class="productSlider01 grid-products">
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
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="productSlider01 grid-products">
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
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-occassionImg.png') }}" />
                            </a>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <!--div class="row">
                <div class=" col-12 text-center mt-4">
                    <a href="" class="text-uppercase btn btn-light">View All</a>
                </div>
            </div-->
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider res-pt">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-header mainHeading col-12">
                        <h2 class="text-uppercase"><span>Bestsellers</span></h2>
                    </div>
                </div>
                {{-- <div class="productSlider-category grid-products">



                    @forelse ($bestSellerSlidersOne as $slider)
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
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>

                    @endforelse
                </div> --}}
                <div class="productSlider01 grid-products ">
                    @forelse ($bestSellerSlidersOne as $slider)
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
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>

                    @endforelse
                </div>
            </div>

            <div class="row mt-3">
                <a @isset($bestSellerBanner->slider_link) href="{{
                    $bestSellerBanner->slider_link }}" target="_blank" @endisset>
                    @if (!empty($bestSellerBanner->slider_image))
                    <img alt="banner" alt="" class=" w-100 hidden-xs"
                        src="{{ asset('/uploads/sliders') }}/{{ $bestSellerBanner->slider_image }}" />
                    <img alt="banner" alt="" class=" w-100 hidden-sm"
                        src="{{ asset('/uploads/sliders') }}/{{ $bestSellerBanner->second_slider_image }}" />
                    @else
                    <img src="{{ asset('allUsers/personalisedPage/personalised-midBanner.png') }}" alt="banner" alt=""
                        class=" w-100" />
                    @endif
                </a>
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
                        <h2 class="text-uppercase"><span>Featured Brands</span></h2>
                    </div>
                </div>
                <div class="productSlider01 grid-products">

                    @forelse ($featuredBrandsSliders as $slider)
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
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                                <img class="hover blur-up lazyload"
                                    data-src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}"
                                    src="{{ asset('allUsers/personalisedPage/personalised-brands.png') }}" />
                            </a>
                        </div>
                    </div>
                    @endforelse
                </div>

            </div>


        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

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

</div>
<!--End Body Container-->
<input type="hidden" class="new-in-designer" value="{{ Request::segment(3) }}" />
<script type="module" src="{{ asset('allUsers/customer/designer.js') }}"></script>
@endsection