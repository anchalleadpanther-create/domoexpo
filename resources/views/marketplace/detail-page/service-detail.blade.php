@extends('purchasync.partials.header')
@section('customerContent')
<link rel="stylesheet" href="{{asset('allUsers/frontend/css/style_old.css')}}">

<div class="ps-page--product">
    <div class="container">
        <div class="ps-page__container">
            <div class="ps-product--detail">
                <div class="row">


                    <div class="col-sm-4 offset-sm-1">

                        <x-purchasync.detail-page.service-detail-images :service="$service" />

                        <div class="col-sm-6 offset-sm-1">
                            <div class="ps-product__info">
                                <h1>{{ $service->title }}</h1>
                                <div class="ps-product__meta ps-product__meta2">

                                    <div class="ps-block--average-rating">
                                        <div class="ps-block__header d-flex mb-0">
                                            <label class="mb-0">Rating</label>
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select>
                                            <span>0 Ratings & 0 Reviews</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product__specification ps-buyerProduct__specification">
                                    <p><span>Includes :</span> <span>{{
                                            $service?->includes ?? ''}}</span></p>
                                    <p><span>Excludes :</span> <span>{{
                                            $service?->excludes ?? ''}}</span></p>
                                    <p><span>description :</span> <span>{{ $service?->description
                                            }}</span></p>


                                    <p><span>Spec sheet :</span> <a href=""
                                            class="ps-btn ps-btn--sm lighter-bg">Donwload</a></p>

                                </div>
                                <div class="ps-product__shopping">
                                    <a class="ps-btn ps-btn--black blue-bg border-0" href="#">Add to cart</a><a
                                        class="ps-btn" href="#">Buy Now</a>
                                    <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a> </div>
                                </div>
                                <div class=" row ps-product__socialBox">
                                    <div class="ps-product__specification col-sm-4 mb-0">
                                        <p class="mb-0"><strong>Sold By : </strong> {{ $service?->seller?->biz_company
                                            }}
                                        </p>
                                    </div>
                                    <div class="col-sm-4 text-center"><a href=""
                                            class="ps-btn ps-btn--sm greyy-bg">Additional Sellers</a></div>
                                    <div class="ps-product__sharing pt-0 col-sm-4">
                                        <a class="facebook" href="{{ $service?->seller?->facebook_url }}"><i
                                                class="fa fa-facebook"></i></a>
                                        <a class="twitter" href="{{ $service?->seller?->twitter_url }}"><i
                                                class="fa fa-twitter"></i></a>
                                        <a class="google" href="{{ $service?->seller?->youtube_url }}"><i
                                                class="fa fa-youtube"></i></a>
                                        <a class="linkedin" href="{{ $service?->seller?->linkedin_url }}"><i
                                                class="fa fa-linkedin"></i></a>
                                        <a class="instagram" href="{{ $service?->seller?->instagram_url }}"><i
                                                class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="ps-page--product lighter-bg gap-pt50 gap-pb50">
        <div class="container">
            <div class="ps-product__content ps-tab-root">
                <div class="ps-section__header ps-section__headerText p-0   border-0">
                    <div class="ps-block--countdown-deal">
                        <div class="ps-block__left">
                            <h3 class="mb-0">Customer <span class="blue-text">Reviews</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-sm-12 mb-4">
                                <h5>Great panel</h5>
                                <div class="ps-block--average-rating">
                                    <div class="ps-block__header mb-0">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select>
                                    </div>
                                </div>
                                <p>Bought a skid and put them up. Work great, good cost per watt</p>
                                <h6 class="blue-text">~ Atypical Supply</h6>
                            </div>
                            <div class="col-sm-12 mb-4">
                                <h5>Customized Service!</h5>
                                <div class="ps-block--average-rating">
                                    <div class="ps-block__header mb-0">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select>
                                    </div>
                                </div>
                                <p>The installation process through Sun Power has been pretty smooth.</p>
                                <h6 class="blue-text">~ Toneirie</h6>
                            </div>
                            <div class="col-sm-12 mb-4">
                                <h5>SunPower System</h5>
                                <div class="ps-block--average-rating">
                                    <div class="ps-block__header mb-0">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select>
                                    </div>
                                </div>
                                <p>The installation was quite smooth and seamless. The workmen were polite and
                                    professional.
                                </p>
                                <h6 class="blue-text">~ Amatao</h6>
                            </div>
                            <div class="col-sm-12">
                                <a class="ps-btn ps-btn--sm dark-bg" href="#">VIEW ALL REVIEWS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 text-center">
                        <div class="ps-block--average-rating">
                            <h4>Review This <span class="blue-text">Product</span></h4>
                            <div class="ps-block__header">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select>
                                <span>15 REVIEWS</span>
                            </div>
                            <a class="ps-btn ps-btn--sm blue-bg" href="#">RATE THIS PRODUCT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="ps-product-list  gap-pt50 ps-product-grid gap-pb50">
        <div class="container">
            <div class="ps-section__header ps-section__headerText p-0 bg-white border-0">
                <div class="ps-block--countdown-deal">
                    <div class="ps-block__left">
                        <h3 class="mb-0">Similar <b class="blue-text">Products</b></h3>
                    </div>
                </div>
            </div>
            <div class="ps-section__content pt-5">
                <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
                    data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4"
                    data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3"
                    data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">



                    @foreach ($relatedServices as $key => $service)

                    <x-purchasync.listing.pro-card :product="$service" showWishlist="false" :isProductListPage="true" />

                    @endforeach

                </div>
            </div>

        </div>
    </div> --}}


    <div class="ps-site-features ps-featuress-section">
        <div class="container">
            <div class="ps-block--site-features ps-block--site-features-2">
                <div class="ps-block__item">
                    <img src="img/home/home-photo/support-img1.png">
                    <h4 class="mb-2">REQUEST FOR QUOTATION</h4>
                    <p class="mb-0">we’ve made it easy for you</p>
                </div>
                <div class="ps-block__item">
                    <img src="img/home/home-photo/support-img2.png">
                    <h4 class="mb-2">FEEDBACK</h4>
                    <p class="mb-0">Opinions, Inquiries welcome</p>
                </div>
                <div class="ps-block__item">
                    <img src="img/home/home-photo/support-img3.png">
                    <h4 class="mb-2">GET IN TOUCH</h4>
                    <p class="mb-0">+971 507482498</p>
                </div>
                <div class="ps-block__item">
                    <img src="img/home/home-photo/support-img4.png">
                    <h4 class="mb-2">DROP AN EMAIL</h4>
                    <p class="mb-0">enquiry@fnb2b.com</p>
                </div>
            </div>
        </div>
    </div>

    @endsection