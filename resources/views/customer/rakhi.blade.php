@extends('customer.partials.header')
@section('customerContent')
{{-- @section('title', '')
@section('description', '')
@section('keywords', '') --}}
<style>
   
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
   <section class="section banner_sec p-0">
      <div class="container-fluid">
         <div class="row">
            <!-- <a href="#" target="_blank">
            <img alt="banner" class=" w-100" src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-bnnaer.jpg">
            </a> -->
                <a @isset($mainBanner->slider_link) href="{{ $mainBanner->slider_link }}"
                    target="_blank" @endisset>
                    <div class="img">
                        @if (!empty($mainBanner->slider_image) ||
                        !empty($mainBanner->second_slider_image))
                        {{-- for dasktop --}}
                        <img class="blur-up lazyloaded hidden-xs"
                            data-src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->slider_image }}"
                            src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->slider_image }}" />
                        <img class="blur-up lazyloaded hidden-sm"
                            data-src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->second_slider_image }}"
                            src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->second_slider_image }}" />
                        @endif
                    </div>
                </a>


         </div>
      </div>
   </section>
   <!--Top Picks On Fashion Product Slider-->
   <section class="section product-slider">
      <div class="container-fluid">
         <div class="productSlider02 grid-products">


         @forelse($mainSlider as $slider)
            <div class="item">
                <div class="product-image">
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
                  <img class="primary blur-up lazyload" data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat01.jpg" src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat01.jpg" />
                  <img class="hover blur-up lazyload" data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat01.jpg" src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat01.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload" data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat02.jpg" src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat02.jpg" />
                  <img class="hover blur-up lazyload" data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat02.jpg" src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat02.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload" data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat03.jpg" src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat03.jpg" />
                  <img class="hover blur-up lazyload" data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat03.jpg" src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat03.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload" data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat04.jpg" src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat04.jpg" />
                  <img class="hover blur-up lazyload" data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat04.jpg" src="https://littletags.webkype.co/public/allUsers/rakhi-img/rakhi-cat04.jpg" />
                  </a>
               </div>
            </div>
        @endforelse
         </div>
      </div>
   </section>
   <!--End Body Container-->
   <section class="collection-banners style1 section pt-0">
      <div class="container-fluid">
         <div class=" col-sm-12">
            <div class="row">
               <div class="col-12 col-lg-8 cl-item">
                  <div class="collection-grid-item mb-2">
                    <a @isset($mainBanner->slider_link) href="{{ $mainThirdSectionFirstBanner->slider_link }}"
                        target="_blank" @endisset>
                        <div class="img">
                            @if (!empty($mainThirdSectionFirstBanner->slider_image) ||
                            !empty($mainThirdSectionFirstBanner->second_slider_image))
                            {{-- for dasktop --}}
                            <img class="blur-up lazyloaded hidden-xs"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $mainThirdSectionFirstBanner->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $mainThirdSectionFirstBanner->slider_image }}" />
                            <img class="blur-up lazyloaded hidden-sm"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $mainThirdSectionFirstBanner->second_slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $mainThirdSectionFirstBanner->second_slider_image }}" />
                            @endif
                        </div>
                    </a>

                  </div>
               </div>
               <div class="col-12 col-lg-4 cl-item">
                  <div class="collection-grid-item mb-2">
                    <a @isset($mainBanner->slider_link) href="{{ $mainThirdSectionSecondBanner->slider_link }}"
                        target="_blank" @endisset>
                        <div class="img">
                            @if (!empty($mainThirdSectionSecondBanner->slider_image) ||
                            !empty($mainThirdSectionSecondBanner->second_slider_image))
                            {{-- for dasktop --}}
                            <img class="blur-up lazyloaded hidden-xs"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $mainThirdSectionSecondBanner->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $mainThirdSectionSecondBanner->slider_image }}" />
                            <img class="blur-up lazyloaded hidden-sm"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $mainThirdSectionSecondBanner->second_slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $mainThirdSectionSecondBanner->second_slider_image }}" />
                            @endif
                        </div>
                    </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--Top Picks On Fashion Product Slider-->
   <section class="section product-slider res-pt pt-0">
      <div class="container-fluid">
         <div class="row">
            <div class="section-header mainHeading col-12">
               <h2 class="text-uppercase"><span>FESTIVE AD-ONS</span></h2>
            </div>
         </div>
         <div class="productSlider02 grid-products">
             @forelse($fastiveAdOnsSlider as $slider)
                <div class="item">
                    <div class="product-image">
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
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img01.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img01.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img01.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img01.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img02.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img02.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img02.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img02.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img03.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img03.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img03.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img03.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img04.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img04.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img04.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/fastive-img04.jpg" />
                  </a>
               </div>
            </div>
            @endforelse
         </div>
      </div>
   </section>
   <!--End Body Container-->
   <section class="collection-banners style1 section pt-0">
      <div class="container-fluid">
         <div class=" col-sm-12">
            <div class="row">
               <div class="section-header mainHeading col-12">
                  <h2 class="text-uppercase"><span>GIFTING</span></h2>
               </div>
            </div>
            <div class="row">
               <div class="col-6 col-lg-6 cl-item">
                  <div class="collection-grid-item mb-2">
            
                     <a @isset($mainBanner->slider_link) href="{{ $giftingFirstBanner->slider_link }}"
                        target="_blank" @endisset>
                        <div class="img">
                            @if (!empty($giftingFirstBanner->slider_image) ||
                            !empty($giftingFirstBanner->second_slider_image))
                            {{-- for dasktop --}}
                            <img class="blur-up lazyloaded hidden-xs"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $giftingFirstBanner->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $giftingFirstBanner->slider_image }}" />
                            <img class="blur-up lazyloaded hidden-sm"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $giftingFirstBanner->second_slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $giftingFirstBanner->second_slider_image }}" />
                            @endif
                        </div>
                    </a>
                  </div>
               </div>
               <div class="col-6 col-lg-6 cl-item">
                  <div class="collection-grid-item mb-2">
                     <a @isset($mainBanner->slider_link) href="{{ $giftingSecondBanner->slider_link }}"
                        target="_blank" @endisset>
                        <div class="img">
                            @if (!empty($giftingSecondBanner->slider_image) ||
                            !empty($giftingSecondBanner->second_slider_image))
                            {{-- for dasktop --}}
                            <img class="blur-up lazyloaded hidden-xs"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $giftingSecondBanner->slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $giftingSecondBanner->slider_image }}" />
                            <img class="blur-up lazyloaded hidden-sm"
                                data-src="{{ asset('/uploads/sliders') }}/{{ $giftingSecondBanner->second_slider_image }}"
                                src="{{ asset('/uploads/sliders') }}/{{ $giftingSecondBanner->second_slider_image }}" />
                            @endif
                        </div>
                    </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="section product-slider res-pt pt-0">
      <div class="container-fluid">
         <div class="productSlider01 grid-products">
            @forelse($giftingFirstSlider as $slider)
                <div class="item">
                    <div class="product-image">
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
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img1.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img1.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img1.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img1.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img2.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img2.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img2.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img2.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img3.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img3.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img3.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img3.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img4.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img4.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img4.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img4.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img5.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img5.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img5.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/gifting-img5.jpg" />
                  </a>
               </div>
            </div>
            @endforelse
         </div>
      </div>
   </section>
   <section class="section product-slider res-pt pt-0">
      <div class="container-fluid">
         <div class="row">
            <div class="section-header mainHeading col-12">
               <h2 class="text-uppercase"><span>BRAND ON FOCUS</span></h2>
            </div>
         </div>
         <div class="productSlider02 grid-products">

         @forelse($brandOnFocusSlider as $slider)
                <div class="item">
                    <div class="product-image">
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
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img01.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img01.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img01.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img01.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img02.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img02.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img02.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img02.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img03.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img03.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img03.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img03.jpg" />
                  </a>
               </div>
            </div>
            <div class="item">
               <div class="product-image">
                  <a href="#" class="product-img">
                  <img class="primary blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img04.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img04.jpg" />
                  <img class="hover blur-up lazyload"
                     data-src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img04.jpg"
                     src="https://littletags.webkype.co/public/allUsers/rakhi-img/brand-img04.jpg" />
                  </a>
               </div>
            </div>
         </div>
        @endforelse
      </div>
   </section>
</div>
<!--End Body Container-->
@endsection