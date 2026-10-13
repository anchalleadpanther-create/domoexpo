@extends('purchasync.partials.header')
@section('customerContent')
<!--link rel="stylesheet" href="{{asset('allUsers/frontend/css/style_old.css')}}"-->

<div class="ps-page--product">
    <div class="container">
        <div class="ps-page__container">
            <div class="ps-product--detail">
                <div class="row">


                    <div class="col-sm-4 offset-sm-1">

                        <x-purchasync.detail-page.product-detail-images :product="$product" />

                        <div class="col-sm-6 offset-sm-1">
                            <div class="ps-product__info">
                                <h1>{{ $product->name }}</h1>
                                <div class="ps-product__meta ps-product__meta2">

                                    <!--<x-purchasync.detail-page.product-detail-pricing :product="$product" />-->


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
                                    
                                    @if(!empty($product?->countryOfOrigin))<p class="mb-4"><span>Country of Origin : </span> <span>{{ $product?->countryOfOrigin?->name ?? ''}}</span></p> @endif
                                    <p class="mb-4"><span>Brand : </span> <span>{{ $product?->brand?->brand_name }}</span></p>
                                    <p class="mb-4"><span>Material : </span> <span>{{ $product?->productTypeValueThree?->type_value }}</span></p>
                                    <p class="mb-4"><span>Size : </span> <span>{{ $product?->productTypeValueTwo?->type_value }}</span></p>
                                    <p class="mb-4"><span>Colour : </span> <span>{{ $product?->productTypeValueOne?->type_value }}</span></p>
                                    <p class="mb-4"><span>Minimum order quantity : </span> <span> {{ $product->quantity }} Sets</span></p>
                                    <p class="mb-4"><span>Customizable :</span> <span>{{ $product->is_customizable == 1 ? 'Yes' : 'No' }}</span></p>
                                    <p class="mb-4"><span>Spec sheet :</span> <a href="" class="ps-btn ps-btn--sm lighter-bg">Donwload</a></p>
                                    <p class="mb-4"><span>Quantity :</span> <span class="form-group--number border-0 p-0">
                                            <button class="up"><i class="fa fa-plus"></i></button>
                                            <button class="down"><i class="fa fa-minus"></i></button>
                                            <input class="form-control" type="text" placeholder="1">
                                        </span>
                                    </p>
                                    <!--<p class="mb-4"><span>Warranty Terms :</span> <span>{{ $product->warranty_terms }}</span></p>-->
                                    
                                    
                                </div>
                               
                                <div class="ps-actionBtn mb-4 fs-bold ">
                                       @auth('buyer')
                                        <a class="ps-btn ps-btn--sm  {{ $isAskForSample ? 'blue'  : 'blue-outline' }}  my-1" href="{{route('buyer.ask-for-sample',[$product->id])}}" >Request Sample</a>
                                        <a class="ps-btn ps-btn--sm my-1" href="#">Add to Cart</a>
                                        <a class="ps-btn ps-btn--sm my-1 wishIcon wishlist blue-transparent" href="{{ route('buyer.add-to-wishlist',[$product->id]) }}" >
                                            <i class="fa {{ $product->inMyWishlist ? 'fa-heart'  : 'fa-heart-o' }}   wishlist-live-btn" data-product-id="{{ $product->id }}"  aria-hidden="true"></i>
                                               
                                        </a>
                                        
                                       @endauth
                                       
                                       @guest('buyer')
                                            <a class="ps-btn ps-btn--sm  blue-outline  my-1 " href="{{route('buyer.login')}}">Request Sample</a>
                                            <a class="ps-btn ps-btn--sm my-1" href="{{route('buyer.login')}}">Add to Cart</a>
                                            <a class="ps-btn ps-btn--sm my-1 blue-transparent" href="{{route('buyer.login')}}"><i class="fa fa-heart-o"  aria-hidden="true"></i></a>
                                       @endguest 
                                </div>
                                
                                
                                <div class=" row ps-product__socialBox">
                                    <div class="ps-product__specification col-sm-4 mb-0">
                                        <p class="mb-1"><strong>SKU : </strong> {{ $product->sku }}</p>
                                        <p class="mb-0"><strong>Sold By : </strong> <a class="ps-product__title ps-services-product__title" href="{{ route('customer.supplier-detail',[$product->seller_id]) }}"> {{ $product?->seller?->biz_company
                                            }}</a>
                                        </p>
                                    </div>
                                    <!--<div class="col-sm-4 text-center"><a href=""-->
                                    <!--        class="ps-btn ps-btn--sm greyy-bg">Additional Sellers</a></div>-->
                                    <div class="ps-product__sharing pt-0 col-sm-4">
                                        <a class="facebook" href="{{ $product?->seller?->facebook_url }}"><i
                                                class="fa fa-facebook"></i></a>
                                        <a class="twitter" href="{{ $product?->seller?->twitter_url }}"><i
                                                class="fa fa-twitter"></i></a>
                                        <a class="google" href="{{ $product?->seller?->youtube_url }}"><i
                                                class="fa fa-youtube"></i></a>
                                        <a class="linkedin" href="{{ $product?->seller?->linkedin_url }}"><i
                                                class="fa fa-linkedin"></i></a>
                                        <a class="instagram" href="{{ $product?->seller?->instagram_url }}"><i
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


    <div class="ps-page--product lighter-bg gap-pt50 gap-pb50">
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
    </div>

    <div class="ps-product-list  gap-pt50 ps-product-grid gap-pb50">
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

                    @foreach ($relatedProducts as $key => $product)
                    <x-purchasync.listing.pro-card :product="$product" showWishlist="false" :isProductListPage="true" />
                    @endforeach

                    {{-- <div class="ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="product-default.html"><img src="img/home/home-photo/product-img1.png" alt="" /></a>
                            <div class="ps-product__badge">10%</div>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content">
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                                <p class="ps-product__vendor">Pro audio outdoor active speaker professional wooden
                                    sound…
                                </p>
                                <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC
                                        Brand</span> Made in Dubai</p>
                                <p class="ps-product__price ">2274*850*2080mm</p>
                                <div class="ps-actionBtn mb-4">
                                    <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                    <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="product-default.html"><img src="img/home/home-photo/product-img2.png" alt="" /></a>
                            <div class="ps-product__badge">10% OFF</div>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content">
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                                <p class="ps-product__vendor">Pro audio outdoor active speaker professional wooden
                                    sound…
                                </p>
                                <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC
                                        Brand</span> Made in Dubai</p>
                                <p class="ps-product__price ">2274*850*2080mm</p>
                                <div class="ps-actionBtn mb-4">
                                    <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                    <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="product-default.html"><img src="img/home/home-photo/product-img3.png" alt="" /></a>
                            <div class="ps-product__badge">10% OFF</div>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content">
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                                <p class="ps-product__vendor">Pro audio outdoor active speaker professional wooden
                                    sound…
                                </p>
                                <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC
                                        Brand</span> Made in Dubai</p>
                                <p class="ps-product__price ">2274*850*2080mm</p>
                                <div class="ps-actionBtn mb-4">
                                    <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                    <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="product-default.html"><img src="img/home/home-photo/product-img4.png" alt="" /></a>
                            <div class="ps-product__badge">10% OFF</div>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content">
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                                <p class="ps-product__vendor">Pro audio outdoor active speaker professional wooden
                                    sound…
                                </p>
                                <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC
                                        Brand</span> Made in Dubai</p>
                                <p class="ps-product__price ">2274*850*2080mm</p>
                                <div class="ps-actionBtn mb-4">
                                    <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                    <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="ps-section__content pt-4">
                <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
                    data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4"
                    data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3"
                    data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                    src="img/home/home-photo/product-img1.png" alt="" /></a>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content">
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                                <p class="ps-product__vendor">Pro audio outdoor active speaker professional wooden
                                    sound…
                                </p>
                                <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC
                                        Brand</span> Made in Dubai</p>
                                <p class="ps-product__price ">2274*850*2080mm</p>
                                <div class="ps-actionBtn mb-4">
                                    <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                    <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                    src="img/home/home-photo/product-img2.png" alt="" /></a>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content">
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                                <p class="ps-product__vendor">Pro audio outdoor active speaker professional wooden
                                    sound…
                                </p>
                                <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC
                                        Brand</span> Made in Dubai</p>
                                <p class="ps-product__price ">2274*850*2080mm</p>
                                <div class="ps-actionBtn mb-4">
                                    <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                    <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                    src="img/home/home-photo/product-img3.png" alt="" /></a>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content">
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                                <p class="ps-product__vendor">Pro audio outdoor active speaker professional wooden
                                    sound…
                                </p>
                                <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC
                                        Brand</span> Made in Dubai</p>
                                <p class="ps-product__price ">2274*850*2080mm</p>
                                <div class="ps-actionBtn mb-4">
                                    <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                    <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                    src="img/home/home-photo/product-img4.png" alt="" /></a>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content">
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select>
                                </div>
                                <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
                                <p class="ps-product__vendor">Pro audio outdoor active speaker professional wooden
                                    sound…
                                </p>
                                <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC
                                        Brand</span> Made in Dubai</p>
                                <p class="ps-product__price ">2274*850*2080mm</p>
                                <div class="ps-actionBtn mb-4">
                                    <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                    <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                    <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img2.png') }}">
                    <h4 class="mb-2">FEEDBACK</h4>
                    <p class="mb-0">Opinions, Inquiries welcome</p>
                </div>
                <div class="ps-block__item">
                    <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img3.png') }}">
                    <h4 class="mb-2">GET IN TOUCH</h4>
                    <p class="mb-0">+971 507482498</p>
                </div>
                <div class="ps-block__item">
                    <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img4.png') }}">
                    <h4 class="mb-2">DROP AN EMAIL</h4>
                    <p class="mb-0">enquiry@fnb2b.com</p>
                </div>
            </div>
        </div>
    </div>

    @endsection