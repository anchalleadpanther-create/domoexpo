@extends('marketplace.partials.header')
@section('content')

<style>
/* Hide on mobile */
@media (max-width: 767px) {
    .hidden-xs {
        display: none !important;
    }
}

/* Hide on tablet + desktop */
@media (min-width: 768px) {
    .hidden-sm {
        display: none !important;
    }
}
</style>
    <div id="homepage-1">
        
        
        <div class="ps-site-features pb-0 pt-5 d-none">
            <div class="container ">
                <div class="ps-block--site-features row">
                    
                    @forelse($mainHeaderTabs as $slider)
                        <div class=" col-lg-3 col-sm-6" >
                           <div class="ps-block__item mx-0  align-items-center w-100 mw-100" style="gap:5px;">
                               <div class="ps-block__left my-0"><i class="icon-sync"></i></div>
                             <a href="@isset($slider->slider_link){{$slider->slider_link}}@endisset"/>
                            <div class="ps-block__right px-0">
                                <h4>{{$slider->slider_title}}</h4>
                            </div>
                            </a>
                           </div>
                            
                        </div>
                    @empty
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-sync"></i></div>
                        <div class="ps-block__right">
                            <h4>Products & Suppliers</h4>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-sync"></i></div>
                        <div class="ps-block__right">
                            <h4>Services & Providers</h4>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-sync"></i></div>
                        <div class="ps-block__right">
                            <h4>Freelancers & Consultants</h4>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-sync"></i></div>
                        <div class="ps-block__right">
                            <h4>Sustainability</h4>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-sync"></i></div>
                        <div class="ps-block__right">
                            <h4>Deals & Promotions</h4>
                        </div>
                    </div>
                    
                    @endforelse
                </div>
             

            </div>
        </div>
        
        
        
        
        <div class="ps-home-banner ps-home-banner--1 pb-4">
            <div class="ps-container">
                <div class="ps-section__left">
                    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true"
                        data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                        data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1"
                        data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on"
                        data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                        
                        @forelse($leftSideMainSliders as $slider)
                            <!-- Hide on mobile -->
                            <!--<div class="ps-banner bg--cover d-none d-sm-block "-->
                            <!--    data-background="{{ asset('uploads/sliders/') }}/{{$slider->slider_image}}">-->
                            <!--    <a class="ps-banner__overlay" href="{{ asset('uploads/sliders/') }}/{{$slider->slider_image}}"></a>-->
                            <!--</div>-->
                        
                            <!-- Hide on desktop -->
                            <!--<div class="ps-banner bg--cover d-block d-sm-none"-->
                            <!--    data-background="{{ asset('uploads/sliders/') }}/{{$slider->second_slider_image}}">-->
                            <!--    <a class="ps-banner__overlay" href="{{ $slider->slider_link ?? '#' }}"></a>-->
                            <!--</div>-->
                            
                            
                            
                           <!-- Desktop -->
                            <div class="ps-banner bg--cover "
                                 style="background-image: url('{{ asset('uploads/sliders/'.$slider->slider_image) }}')">
                                <a class="ps-banner__overlay" href="{{ asset('uploads/sliders/'.$slider->slider_image) }}"></a>
                            </div>
                            
                            <!-- Mobile -->
                            <!--<div class="ps-banner bg--cover hidden-xs"-->
                            <!--     style="background-image: url('{{ asset('uploads/sliders/'.$slider->second_slider_image) }}')">-->
                            <!--    <a class="ps-banner__overlay" href="{{ $slider->slider_link ?? '#' }}"></a>-->
                            <!--</div>-->
                            
                            
                        @empty
                        
                        <div class="ps-banner bg--cover"
                            data-background="{{asset('allUsers/frontend/img/slider/home-1/slide-1.jpg')}}"><a
                                class="ps-banner__overlay" href="{{url('/')}}/p/furniture-fixtures"></a></div>
                        <div class="ps-banner bg--cover"
                            data-background="{{asset('allUsers/frontend/img/slider/home-1/slide-2.jpg')}}"><a
                                class="ps-banner__overlay" href="{{url('/')}}/p/furniture-fixtures"></a></div>
                        <div class="ps-banner bg--cover"
                            data-background="{{asset('allUsers/frontend/img/slider/home-1/slide-3.jpg')}}"><a
                                class="ps-banner__overlay" href="{{url('/')}}/p/furniture-fixtures"></a></div>
                        @endforelse
                    </div>
                </div>
                <div class="ps-section__right">
                    
                    @forelse($rightSideMainBanners as $slider)
                            <!-- Hide on mobile -->
                            <a class="ps-collection d-none d-sm-block" href="{{ $slider->slider_link ?? '#' }}">
                                <img  src="{{ asset('uploads/sliders/') }}/{{$slider->slider_image}}" alt="">
                            </a>
                        
                            <!-- Hide on desktop -->
                            <a class="ps-collection  d-block d-sm-none" href="{{ $slider->slider_link ?? '#' }}">
                                <img src="{{ asset('uploads/sliders/') }}/{{$slider->second_slider_image}}" alt="">
                            </a>
                    @empty
                    
                        <a class="ps-collection" href="#">
                            <img    src="{{asset('allUsers/frontend/img/slider/home-1/promotion-1.jpg')}}" alt="">
                        </a>
                        <a class="ps-collection" href="#">
                         <img src="{{asset('allUsers/frontend/img/slider/home-1/promotion-2.jpg')}}" alt="">
                        </a>
                     @endforelse
                    </div>
            </div>
        </div>


        <div class="ps-product-list ps-Suppliers">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Premium Suppliers</h3>
                </div>
                <div class="ps-section__content pt-3">
                    <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true"
                        data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true"
                        data-owl-item="3" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                        data-owl-item-lg="3" data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">
                        
                        @forelse($premiumSuppliers as $supplier)
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="{{url('/')}}/supplier-detail/{{$supplier->id}}">
                                <img
                                        src="{{isset($supplier->gallaryImages[0]->image) ? asset('uploads/supplier/'.$supplier->gallaryImages[0]->image) : asset('allUsers/frontend/img/products/home/1.jpg')}}" alt=""
                                        style="height:100px" />
                                </a>
                            </div>

                            <div class="d-flex p-4" style=" border: 1px solid #ddd; border-top: 0;">
                                <div class="ps-block__thumbnail pt-0 pr-3 bg-gray"><img
                                        src="{{ !empty($supplier->biz_company_logo) ?  asset('uploads/supplier/'.$supplier->biz_company_logo) : asset('allUsers/frontend/img/icons/verified-icon.png')}}" alt=""
                                        style="width:80px"></div>
                                <div class="ps-block__content pt-0" style="width:100%">
                                    <div class="d-flex" style=" justify-content: space-between;">
                                        <span><b>{{$supplier->biz_company}}</b></span>
                                        <span>
                                            <!--<img src="{{ !empty($supplier->biz_company_logo) ?  asset('uploads/supplier/'.$supplier->biz_company_logo) : asset('allUsers/frontend/img/icons/verified-icon.png')}}"-->
                                            <!--    style="width:50px">-->
                                        </span>
                                    </div>
                                    <div class="">
                                        {{$supplier->state?->name}},{{$supplier->country?->name}} <i class="fa fa-star" style="color:#EDB867"></i> <span>2.7</span>
                                    </div>
                                    <div class="text-right"><a href="{{url('/')}}/supplier-detail/{{$supplier->id}}" style="padding: 2px 6px; font-size: 11px;"
                                            class="ps-btn">Contact Seller</a></div>
                                </div>
                            </div>
                        </div>
                        @empty
                        
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="{{url('/')}}/p/furniture-fixtures"><img
                                        src="{{asset('allUsers/frontend/img/products/home/1.jpg')}}" alt=""
                                        style="height:100px" /></a>
                            </div>

                            <div class="d-flex p-4" style=" border: 1px solid #ddd; border-top: 0;">
                                <div class="ps-block__thumbnail pt-0 pr-3"><img
                                        src="{{asset('allUsers/frontend/img/categories/home-2/1.jpg')}}" alt=""
                                        style="width:80px"></div>
                                <div class="ps-block__content pt-0" style="width:100%">
                                    <div class="d-flex" style=" justify-content: space-between;">
                                        <span><b>Young Shop</b></span>
                                        <span><img src="{{asset('allUsers/frontend/img/icons/verified-icon.png')}}"
                                                style="width:50px"></span>
                                    </div>
                                    <div class="">
                                        Delhi, India <i class="fa fa-star" style="color:#EDB867"></i> <span>2.7</span>
                                    </div>
                                    <div class="text-right"><a href="" style="padding: 2px 6px; font-size: 11px;"
                                            class="ps-btn">Contact Seller</a></div>
                                </div>
                            </div>
                        </div>
                        
                        @endforelse
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-home-ads mb-5 mt-0">
            <div class="ps-container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        @if(isset($bannerAfterPremiumSuppliers))
                        <!-- Hide on mobile -->
                        <a class="ps-collection d-none d-sm-block" href="{{ $bannerAfterPremiumSuppliers->slider_link ?? '#' }}"><img
                                src="{{ asset('uploads/sliders/') }}/{{$bannerAfterPremiumSuppliers->slider_image}}" alt=""
                                style="height:450px"></a>
                        
                        <!-- Hide on desktop -->       
                        <a class="ps-collection d-block d-sm-none" href="{{ $bannerAfterPremiumSuppliers->slider_link ?? '#' }}"><img
                                src="{{ asset('uploads/sliders/') }}/{{$bannerAfterPremiumSuppliers->second_slider_image}}" alt=""
                                style="height:450px"></a>
                        @else
                        
                         <a class="ps-collection" href="#"><img
                                src="{{asset('allUsers/frontend/img/collection/home-1/1.jpg')}}" alt=""
                                style="height:450px"></a>
                        
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ps-product-list ps-categories pb-5">
            <div class="ps-container">
                <div class="ps-section__header">
                    <div class="ps-block--countdown-deal">
                        <div class="ps-block__left">
                            <h3>Featured Categories</h3>
                        </div>
                    </div><a href="#"></a>
                </div>
                <div class="ps-section__content pt-0">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
                        data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                        data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                        data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        
                        @forelse($featuredCategories as $category)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="{{url('/')}}/p/{{$category->category_slug}}">
                                        <img src="{{asset('uploads/category')}}/{{$category->icon}}" alt="" /></a>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="{{url('/')}}/p/{{$category->category_slug}}"><span>{{$category->category_name}}</span> <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        @empty
                        
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="{{url('/')}}/p/furniture-fixtures">
                                    <img src="{{asset('allUsers/frontend/img/categories/cat-img1.png')}}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#"><span>Food, Drinks
                                        & Ingredients</span> <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="{{url('/')}}/p/furniture-fixtures">
                                    <img src="{{asset('allUsers/frontend/img/categories/cat-img2.png')}}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#"><span>Furniture &
                                        Equipent</span> <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="{{url('/')}}/p/furniture-fixtures">
                                    <img src="{{asset('allUsers/frontend/img/categories/cat-img1.png')}}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#"><span>Food, Drinks
                                        & Ingredients</span> <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="{{url('/')}}/p/furniture-fixtures">
                                    <img src="{{asset('allUsers/frontend/img/categories/cat-img2.png')}}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#"><span>Furniture &
                                        Equipent</span> <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="{{url('/')}}/p/furniture-fixtures">
                                    <img src="{{asset('allUsers/frontend/img/categories/cat-img1.png')}}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#"><span>Food, Drinks
                                        & Ingredients</span> <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                        
                        
                        @endforelse
                        

                    </div>
                </div>
            </div>
        </div>

        

        <div class="ps-product-list ps-brands d-none">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Top Brands</h3>
                    <ul class="ps-section__links">
                        <li><a href=""></a></li>
                    </ul>
                </div>
                <div class="ps-section__content pt-3">
                    <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true"
                        data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true"
                        data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2"
                        data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                        
                         @forelse($featuredBrands as $brand)
                         
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="#">
                                        <img src="{{asset('uploads/brand/')}}/{{$brand->banner}}" alt="" />
                                    </a>
                                </div>
                            </div>
                        
                        @empty
                        
                        <!--<div class="ps-product">-->
                        <!--    <div class="ps-product__thumbnail"><a href="{{url('/')}}/p/furniture-fixtures"><img-->
                        <!--                src="{{asset('allUsers/frontend/img/products/clothing/1.jpg')}}" alt="" /></a>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="ps-product">-->
                        <!--    <div class="ps-product__thumbnail"><a href="{{url('/')}}/p/furniture-fixtures"><img-->
                        <!--                src="{{asset('allUsers/frontend/img/products/clothing/2.jpg')}}" alt="" /></a>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="ps-product">-->
                        <!--    <div class="ps-product__thumbnail"><a href="{{url('/')}}/p/furniture-fixtures"><img-->
                        <!--                src="{{asset('allUsers/frontend/img/products/clothing/3.jpg')}}" alt="" /></a>-->


                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="ps-product">-->
                        <!--    <div class="ps-product__thumbnail"><a href="{{url('/')}}/p/furniture-fixtures"><img-->
                        <!--                src="{{asset('allUsers/frontend/img/products/clothing/4.jpg')}}" alt="" /></a>-->

                        <!--    </div>-->
                        <!--</div>-->
                        
                         @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection