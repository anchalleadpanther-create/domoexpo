


















<!--Old Code-->
{{--<div class="ps-section__left">
    <h4 class="mb-0 text-center"><img src="{{ asset('allUsers/frontend/img/menu_icon.png') }}"
            style="width:20px;margin-right:5px"> All
        Categories</h4>
    
    <ul class="menu--dropdown">
        <li><a href="javascript:;" class="mt-4"><b>Products</b></a></li>
        @foreach (navbarCategories() as $category)
        @if ($category->children !== null)
        <li class="menu-item-has-children has-mega-menu">
            <a href="javascript:;"> 
              <!--<img src="{{ !empty($category->icon) ? asset('uploads/category/'.$category->icon)  : asset('allUsers/frontend/new-product.png') }}" style="width:20px;margin-right:5px">  -->
            {{ $category->category_name }} <i class="fa fa-angle-right"></i></a>
            <div class="mega-menu">
                <div class="mega-menu__row p-0">
                    <!-- Start row -->
                    <!-- Start a new row for the next 3 columns -->

                    <div class="mega-menu__column">
                        <!-- Start column -->
                        <h4> {{ $category->category_name }} <span class="sub-toggle"></span></h4>
                        @foreach ($category->children as $key => $subchildren)

                        <ul class="mega-menu__list mb-2">
                            <li>
                                <a
                                    href="{{ route('customer.product-category',[$subchildren->category_slug,'product']) }}">
                                      <img src="{{ !empty($subchildren->icon) ? asset('uploads/category/'.$subchildren->icon)  : asset('allUsers/frontend/new-product.png') }}" style="width:20px;margin-right:5px">  
                                        {{ $subchildren->category_name }}</a>
                            </li>
                        </ul>

                        @endforeach
                    </div>
                    <!-- Close the final row -->
                </div>
                <!-- Close the mega-menu -->
        </li>
        @endif
        @endforeach

        <!--  -->
        <li><a href="#" class="mt-4"><b>Services</b></a></li>
        @foreach (getServiceCategories() as $category)
        @if ($category->children !== null)
        @php
        $breakOn = 0;
        @endphp
        <li class="menu-item-has-children has-mega-menu">
            <a href="javascript:;"> 
            <!--<img src="{{ !empty($category->icon) ? asset('uploads/category/'.$category->icon)  : asset('allUsers/frontend/new-product.png') }}" style="width:20px;margin-right:5px"> -->
                                        {{ $category->category_name }} <i class="fa fa-angle-right"></i></a>
            <div class="mega-menu">
                <div class="mega-menu__row p-0">
                    <!-- Start row -->
                    <div class="mega-menu__column">
                        <!-- Start column -->
                        <h4>{{ $category->category_name }}<span class="sub-toggle"></span></h4>
                        @foreach ($category->children as $subchildren)
                        <ul class="mega-menu__list mb-2">
                            <li><a
                                    href="{{ route('customer.service-category',[$subchildren->category_slug,'service']) }}">
                                <img src="{{ !empty($subchildren->icon) ? asset('uploads/category/'.$subchildren->icon)  : asset('allUsers/frontend/new-product.png') }}" style="width:20px;margin-right:5px"> 
                                        {{
                                    $subchildren->category_name }}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <!-- Close the final row -->
            </div>
            <!-- Close the mega-menu -->
        </li>
        @endif
        @endforeach
    </ul>
</div>

<div class="ps-section__center position_relative mt70">
    <div class="ps-home-head">
        <ul>
            <li><a href="https://seller.purchasync.com/seller/seller-login"><img
                        src="allUsers/frontend/img/home-head_icon1.png"> Become
                    a seller</a></li>
            <li><a href="https://partner.purchasync.com" target="_blank"><img
                        src="allUsers/frontend/img/home-head_icon2.png"> Partner with us</a></li>
            <li><a href=""><img src="allUsers/frontend/img/home-head_icon3.png"> Blogs & News</a></li>
            <li><a href=""><img src="allUsers/frontend/img/home-head_icon4.png">Invite a friend</a></li>
            @auth('buyer')
            <li><a href="{{url('/')}}/buyer/buyer-create-rfq/rfq-detail" class="ps-btn"><img src="allUsers/frontend/img/btn_icon-head.png">Request for
                    Quotation</a></li>
            @endauth
            @guest('buyer')
            <li><a href="{{route('buyer.login')}}" class="ps-btn"><img
                        src="allUsers/frontend/img/btn_icon-head.png">Request for Quotation</a></li>
            @endguest
        </ul>
    </div>


    <div class="ps-home-banner">

        <div class="ps-carousel--dots owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
            data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
            data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
            data-owl-mousedrag="on">
            @forelse($mainBanners as $slider)
            <a href="{{ $slider->slider_url }}"><img
                    src="{{ !empty($slider->slider_image) ? asset('uploads/sliders/'.$slider->slider_image) : 'https://placehold.co/600x500?text=Purchasync'}}"
                    alt="" style="width:100% !important"></a>
            @empty
            <a href="#"><img src="https://purchasync.com/uploads/sliders/KZDwyer64rCd0KfNEgzMkqzeDyUyBL1729794285.jpg"
                    alt="" style="width:100% !important"></a>
            <a href="#"><img src="https://purchasync.com/uploads/sliders/KZDwyer64rCd0KfNEgzMkqzeDyUyBL1729794285.jpg"
                    alt="" style="width:100% !important"></a>
            <a href="#"><img src="https://purchasync.com/uploads/sliders/KZDwyer64rCd0KfNEgzMkqzeDyUyBL1729794285.jpg"
                    alt="" style="width:100% !important"></a>

            @endforelse
        </div>


    </div>

    <div class="ps-top-button col-sm-12" style="display:none">
        <div class="row">
            <div class="col-3">
                <div class="ps-button___boxs">
                    <img src="allUsers/frontend/img/icons/res-cat-icon.png">
                    <h4>All<br>Categories</h4>
                </div>
            </div>
            <div class="col-3">
                <div class="ps-button___boxs">
                    <img src="allUsers/frontend/img/icons/res-quotation-icon.png">
                    <h4>Request for<br>Quotation</h4>
                </div>
            </div>
            <div class="col-3">
                <div class="ps-button___boxs">
                    <img src="allUsers/frontend/img/icons/res-seller-icon.png">
                    <h4>Become a<br>seller</h4>
                </div>
            </div>
            <div class="col-3">
                <div class="ps-button___boxs">
                    <img src="allUsers/frontend/img/icons/res-partner-icon.png">
                    <h4>Become a<br>partner</h4>
                </div>
            </div>
        </div>

    </div>

    <div class="ps-top-categories mt-4 ps-trending_section col-sm-12">
        <h3>Popular</h3>
        <div class="row">

            @forelse($mainPopularBanners as $slider)

            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-3 ">
                <div class="ps-block--category mb-0 text-center">
                    <a class="ps-block__overlay" href="{{ $slider->slider_url }}"></a>
                    <img src="{{ !empty($slider->slider_image) ? asset('uploads/sliders/'.$slider->slider_image) : 'https://placehold.co/400x450?text=Purchasync'}}"
                        alt="{{ $slider->slider_title }}">
                    <p>{{ $slider->slider_title }}</p>
                </div>
            </div>
            @empty
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 ">
                <div class="ps-block--category mb-0 text-center">
                    <a class="ps-block__overlay" href="#"></a>
                    <img src="https://purchasync.com/allUsers/frontend/img/headPopular_img1.png" alt="">
                    <p>Food Waste</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 ">
                <div class="ps-block--category mb-0 text-center">
                    <a class="ps-block__overlay" href="#"></a>
                    <img src="https://purchasync.com/allUsers/frontend/img/headPopular_img2.png" alt="">
                    <p>Local Sourcing</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 ">
                <div class="ps-block--category mb-0 text-center">
                    <a class="ps-block__overlay" href="#"></a>
                    <img src="https://purchasync.com/allUsers/frontend/img/headPopular_img3.png" alt="">
                    <p>Plastic Free</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 ">
                <div class="ps-block--category mb-0 text-center">
                    <a class="ps-block__overlay" href="#"></a>
                    <img src="https://purchasync.com/allUsers/frontend/img/headPopular_img4.png" alt="">
                    <p>Technology</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div> --}}