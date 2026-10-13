@extends('customer.partials.header')
@section('customerContent')
    @isset($product->meta_title)
        @section('title', $product->meta_title)
    @endisset
    @isset($product->meta_description)
        @section('description', $product->meta_description)
    @endisset
    @isset($product->meta_keywords)
        @section('keywords', $product->meta_keywords)
    @endisset
    @if (!$product->images->isEmpty())
        @section('image', asset('uploads/products/') . '/' . $product->images[0]->image)
    @endif


    <!--Body container-fluid-->
    <div id="page-content">
        <div class="container-fluid mobile-hide">
            <div class="row">
                <div class="banner-text banner-style2">
                    <a @isset($mainBanner->slider_link) href="{{ $mainBanner->slider_link }}" target="_blank" @endisset>
                        <img @empty($mainBanner) src="{{ asset('allUsers/frontend/images/banner-top.png') }}"
                        alt="banner" @endempty
                            @isset($mainBanner) src="{{ asset('/uploads/sliders') }}/{{ $mainBanner->slider_image }}"
                            alt="{{ $mainBanner->slider_title }}" @endisset
                            style="width:100%" />
                    </a>
                </div>
            </div>
        </div>
        <!--Main Content-->
        <div class="container-fluid mt-5">
            <!--Product Content-->
            <div class="product-single">
                <div class="row justify-content-center">


                    <x-customer.products.product-detail-images :product="$product" />


                    <div class="col-lg-5 col-md-5 col-sm-12 col-12 offset-lg-1">
                        <!-- Product Info -->
                        <div class="product-single__meta mb-0">
                            {{-- <h1 class="product-single__title">Little Tags</h1> --}}
                            <div class="product-single__subtitle">
                                {{ @$product->name }}
                            </div>
                            <div class="product-review mb-2">
                                <a class="reviewLink d-flex-center" href="#reviews"><i class="an an-star"></i><i
                                        class="an an-star mx-1"></i><i class="an an-star"></i><i
                                        class="an an-star mx-1"></i><i class="an an-star-o"></i><span
                                        class="spr-badge-caption ms-2">16 Reviews</span></a>
                            </div>
                            <!-- End Product Info -->
                            <!-- Product Price -->
                            {{-- <div class="product-single__price pb-1 mt-0">
                                <span class="product-price__sale--single">$12,225.00</span>

                                <div class="product__policies fw-normal mt-1">
                                    Inclusive of all taxes
                                </div>
                            </div> --}}

                            <!-- Product Price -->
                            <div class="product-single__price pb-1 mt-0 product-price">
                                <x-customer.products.product-detail-pricing :product="$product" />
                            </div>
                            <!-- End Product Price -->

                            <!-- End Product Info -->
                            <form method="post" action="#" class="product-form hidedropdown">
                                <!-- Swatches Color -->
                                {{-- <div class="swatches-image swatch clearfix swatch-0 option1" data-option-index="0">
                                    <div class="product-form__item">
                                        <label class="label d-flex">Color:<span class="required d-none">*</span><span
                                                class="slVariant ms-1 fw-bold">Red</span></label>
                                        <ul class="swatches d-flex-wrap list-unstyled clearfix color_tab">
                                            <li data-value="Green" class="swatch-element color green available active">
                                                <label class="swatchLbl rounded color xlarge" style="background: #00ff00"
                                                    title="Green"></label>
                                                <span class="tooltip-label top">Green</span>
                                            </li>
                                            <li data-value="Green" class="swatch-element color green available">
                                                <label class="swatchLbl rounded color xlarge" style="background: #f5f5dc"
                                                    title="BEIGE"></label>
                                                <span class="tooltip-label top">BEIGE</span>
                                            </li>
                                            <li data-value="Green" class="swatch-element color green available">
                                                <label class="swatchLbl rounded color xlarge" style="background: #0000ff"
                                                    title="BLUE"></label>
                                                <span class="tooltip-label top">BLUE</span>
                                            </li>
                                            <li data-value="Green" class="swatch-element color green available">
                                                <label class="swatchLbl rounded color xlarge" style="background: #000000"
                                                    title="BLACK"></label>
                                                <span class="tooltip-label top">BLACK</span>
                                            </li>
                                            <li data-value="Green" class="swatch-element color green available">
                                                <label class="swatchLbl rounded color xlarge" style="background: #ffffff"
                                                    title="WHITE"></label>
                                                <span class="tooltip-label top">WHITE</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}



                                <!-- Swatches Color -->
                                <div class="swatches-image swatch clearfix swatch-0 option1" data-option-index="0">
                                    @if (isset($product->productTypeValueOne->type_value))

                                        {{-- {{ dd($product->productTypeValueOne->type_value) }} --}}
                                        <div class="product-form__item">
                                            <label class="label d-flex">
                                                @if (@$productParentCategory->is_texture == 'Yes')
                                                    Texture:
                                                @else
                                                    Color:
                                                @endif
                                                <span class="required d-none">*</span><span
                                                    class="slVariant ms-1 fw-bold">{{ $product->productTypeValueOne->type_value }}</span>
                                            </label>
                                            <ul class="swatches d-flex-wrap list-unstyled clearfix color_tab">
                                                @foreach ($productTypeValues['firstType'] as $type)
                                                    {{-- <li data-value="{{ 'Peach' }}"
                                                        class="swatch-element color  available @if ($type->uuid === Request::segment(2)) active @endif color-element">
                                                        <label
                                                            style="background-color: {{ $type->productTypeValueOne->type_color_code }}"
                                                            class="swatchLbl rounded color xlarge  color-chip w-100 p-1"
                                                            title="{{ $type->productTypeValueOne->type_value }}"
                                                            data-product-uuid="{{ $type->uuid }}"
                                                            data-category-slug="{{ Request::segment(1) }}"
                                                            data-product-slug="{{ $product->slug }}"
                                                            data-product-sku="{{ $product->sku }}">
                                                            {{ $type->productTypeValueOne->type_value }}
                                                        </label>
                                                        <span
                                                            class="tooltip-label top">{{ $type->productTypeValueOne->type_value }}</span>
                                                    </li> --}}


                                                    <li data-value="Green"
                                                        class="swatch-element color green available  @if ($type->uuid === Request::segment(2)) active @endif ">
                                                        <label class="swatchLbl rounded color xlarge"
                                                            title="{{ $type->productTypeValueOne->type_value }}"
                                                            data-product-uuid="{{ $type->uuid }}"
                                                            data-category-slug="{{ Request::segment(1) }}"
                                                            data-product-slug="{{ $product->slug }}"
                                                            data-product-sku="{{ $product->sku }}"
                                                            style="background: url('{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}');background-position: center; background-repeat: no-repeat;background-size: cover;">
                                                        </label>
                                                        <span
                                                            class="tooltip-label top">{{ $type->productTypeValueOne->type_value }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <!-- End Swatches Color -->

                                <!-- End Swatches Color -->

                                <!-- Swatches Size -->
                                <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                    <div class="product-form__item">
                                        {{-- <label class="label d-flex">Size:<span class="required d-none">*</span><span
                                                class="slVariant ms-1 fw-bold">24</span></label> --}}

                                        <ul class="swatches-size d-flex-center list-unstyled clearfix">

                                            @foreach ($productTypeValues['sizesOfFirstType'] as $type)
                                                <li data-value="{{ $type->productTypeValueTwo->type_value }}"
                                                    class="swatch-element available ">
                                                    <label class="swatchLbl rounded medium size-chip"
                                                        data-product-uuid="{{ $type->uuid }}"
                                                        data-product-color="{{ isset($product->productTypeValueOne->type_value) ? $product->productTypeValueOne->type_value : '' }}"
                                                        data-product-size="{{ $type->productTypeValueTwo->type_value }}"
                                                        data-currency="{{ getCurrentCurrency()->toJSON() }}"
                                                        title="{{ $type->productTypeValueTwo->type_value }}">
                                                        {{ $type->productTypeValueTwo->type_value }}</label><span
                                                        class="tooltip-label">{{ $type->productTypeValueTwo->type_value }}</span>
                                                </li>
                                            @endforeach

                                            <li class="ms-1">
                                                <a href="#sizechart" class="sizelink link-underline text-uppercase"><i
                                                        class="icon an an-ruler d-none"></i> Size
                                                    Guide</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Swatches Size -->
                            </form>

                            {{-- <div class="form-group text-start desktop-hide">
                                <label class="label d-flex">Select kid's age group (in years)
                                    <a href="#sizechart" class="sizelink txt-red">&nbsp; what's my size?</a></label>

                                <select class="form-control">
                                    <option>Select Size</option>
                                    <option>1-2 YEARS</option>
                                    <option>2-3 YEARS</option>
                                    <option>3-4 YEARS</option>
                                    <option>4-5 YEARS</option>
                                    <option>5-6 YEARS</option>
                                    <option>6-7 YEARS</option>
                                    <option>7-8 YEARS</option>
                                    <option>8-9 YEARS</option>
                                    <option>9-10 YEARS</option>
                                </select>
                            </div> --}}
                            <!-- Countdown -->
                            <div class="countdown-text d-flex-wrap mb-3 pb-1" style="display: none">
                                <label class="mb-2 mb-lg-0">Limited-Time Offer :</label>
                                <div class="prcountdown d-flex" data-countdown="2024/10/01"></div>
                            </div>
                            <!-- End Countdown -->
                            <!-- Product Sold -->
                            <div class="orderMsg d-flex-center" data-user="23" data-time="24" style="display: none">
                                <img src="{{ asset('allUsers/frontend/images/assets/images/order-icon.jpg') }}"
                                    alt="order" />
                                <p id="quantity_message" class="ms-2 ps-2 border-start">
                                    Hurry! Only <span class="items fw-bold">4</span> left in
                                    stock.
                                </p>
                            </div>
                            <!-- End Product Sold -->
                        </div>
                        <!-- End Product Info -->
                        <!-- Product Form -->
                        <form method="post" action="#" class="product-form hidedropdown">
                            <!-- Product Action -->
                            <div class="product-action w-100 clearfix">
                                <div class="product-form__item--quantity d-flex-center mb-2">
                                    <div class="qtyField">
                                        <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon an an-minus-r"
                                                aria-hidden="true"></i></a>
                                        <input type="text" name="quantity" value="1"
                                            class="product-form__input qty" />
                                        <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon an an-plus-r"
                                                aria-hidden="true"></i></a>
                                    </div>


                                    <div class="pro-stockLbl  ms-3">
                                        <span @class([
                                            'stockLbl instock',
                                            'd-flex-center' => $stockCount > 0,
                                            'd-none' => $stockCount === 0,
                                        ])>
                                            <i class="icon an an-check-cil"></i>
                                            <span> In stock</span>
                                        </span>
                                        <span @class([
                                            'stockLbl outstock',
                                            'd-flex-center' => $stockCount === 0,
                                            'd-none' => $stockCount > 0,
                                        ])>
                                            <i class="icon an an-times-cil"></i>
                                            <span>Sold out</span>
                                        </span>
                                    </div>

                                </div>





                                {{-- <div class="row">
                                    <div class="product-form__item--buyit col-sm-12 mb-2">
                                        <a href="#add_personalization"
                                            class="sizelink txt-red btn rounded btn-outline-primary proceed-to-checkout">Add
                                            Personalization
                                        </a>
                                    </div> 
                                    <div class="product-form__item--submit col-sm-6">
                                        <a href="cart-style1.html" name="add"
                                            class="btn rounded product-form__cart-submit"><span>ADD TO CART</span></a>
                                    </div>
                                    <div class="product-form__item--submit col-sm-6">
                                        <a href="cart-style1.html" name="add"
                                            class="btn rounded product-form__cart-submit"><span>WISHLIST</span></a>
                                    </div>
                                    <div class="product-form__item--buyit col-sm-12 mt-2">
                                        <button type="button"
                                            class="btn rounded btn-outline-primary proceed-to-checkout">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div> --}}


                                <div class="row action-btn-div">
                                    <div class="product-form__item--submit col-sm-6">
                                        <a href="javascript:;" @class([
                                            'btn rounded product-form__cart-submit add-to-cart-btn',
                                            'd-none' => $stockCount === 0,
                                        ])
                                            data-product-id="{{ $product->id }}" data-click-from="">
                                            Add to cart
                                        </a>
                                    </div>



                                    @guest('buyer')
                                        {{-- <div class="product-form__item--submit col-6">
                                            <a class="w-100 text-center" href="javascript:;" data-bs-toggle="modal"
                                                data-bs-target="#loginModal">
                                                <i class="icon an an-heart-l"></i>Wishlist
                                            </a>
                                        </div> --}}

                                        <div class="product-form__item--submit col-sm-6 mt-2">
                                            <a href="javascript:;" name="add" data-bs-toggle="modal"
                                                data-bs-target="#loginModal"
                                                class="btn rounded product-form__cart-submit"><span>WISHLIST</span></a>
                                        </div>
                                    @endguest
                                    @auth('buyer')
                                        <div class="col-6">
                                            <a class="w-100 text-center product-detail-wishlist-btn mt-2" href="javascript:;"
                                                data-product-id="{{ $product->id }}">
                                                @if (isset($product->inMyWishlist))
                                                    <i class="icon an an-heart"></i>Wishlist
                                                @else
                                                    <i class="icon an an-heart-l"></i>Wishlist
                                                @endif
                                            </a>
                                        </div>
                                    @endauth




                                    <div @class([
                                        'product-form__item--buyit col-12  mt-2',
                                        'd-none' => $stockCount === 0,
                                    ])>
                                        <button type="button" class="btn rounded proceed-to-checkout buy-now">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="product-action w-100 clearfix">
                                <div class="product-form__item--quantity d-flex-center mt-3">
                                    <div class="qtyField cart-quantity-div d-none cart-productss">
                                        <a class="qtyBtn minus qty-minus" href="javascript:void(0);">-</a>
                                        <input type="text" value="" readonly
                                            class="product-form__input qty product-qty-box" data-product-stock=""
                                            data-cart-id="" data-product-id="">
                                        <a class="qtyBtn plus qty-plus" href="javascript:void(0);">+</a>
                                    </div>
                                    <div class="pro-stockLbl stock-info">
                                        <span @class([
                                            'stockLbl instock',
                                            'd-flex-center' => $stockCount > 0,
                                            'd-none' => $stockCount === 0,
                                        ])>
                                            <i class="icon an an-check-cil"></i>
                                            <span> In stock</span>
                                        </span>
                                        <span @class([
                                            'stockLbl outstock',
                                            'd-flex-center' => $stockCount === 0,
                                            'd-none' => $stockCount > 0,
                                        ])>
                                            <i class="icon an an-times-cil"></i>
                                            <span>Sold out</span>
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <!-- End Product Action -->
                            <!-- Product Info link -->
                            <p class="infolinks d-flex-center mt-4 mb-3">
                                <a class="btn add-to-wishlist" href="#"><i class="icon an an-whatsapp me-1"
                                        aria-hidden="true"></i>
                                    <span>at +88888888 to know more about the product</span></a>
                            </p>
                            <!-- End Product Info link -->
                            <div class="col-12">
                                <div class="form-group customChatBox">
                                    <input class="spr-form-input spr-form-input-text rounded-0" id="nickname"
                                        type="text" name="name" placeholder="Know more about the product..."
                                        required="" />
                                    <a class="btn btn-secondary rounded-0 spr-button spr-button-primary"
                                        href="https://api.whatsapp.com/send?l=en&text=Hi!%20I%27m%20interested%20in%20your%20services%20at%20Webkype&phone=918488070070"><span
                                            class="mobile-hide">CHAT WITH US</span>
                                        <i class="icon an an-whatsapp desktop-hide" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </form>
                        <!-- End Product Form -->
                        <!-- Social Sharing -->
                        <div class="social-sharing mb-4 row">
                            <div class="col-sm-4 d-flex-center">
                                <a href="#" class="d-flex-center btn btn-link btn--share share-facebook"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Facebook"><i
                                        class="icon an an-facebook mx-1"></i><span
                                        class="share-title d-none">Facebook</span></a>
                                <a href="#" class="d-flex-center btn btn-link btn--share share-instagram"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Instagram"><i
                                        class="icon an an-instagram mx-1"></i><span
                                        class="share-title d-none">Instagram</span></a>
                                <a href="#" class="d-flex-center btn btn-link btn--share share-twitter"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Tweet on Twitter"><i
                                        class="icon an an-twitter mx-1"></i><span
                                        class="share-title d-none">Tweet</span></a>
                                <a href="#" class="d-flex-center btn btn-link btn--share share-pinterest"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Pin on Pinterest"><i
                                        class="icon an an-pinterest-p mx-1"></i>
                                    <span class="share-title d-none">Pin it</span></a>
                            </div>
                            <ul class="col-sm-8 text-right social-links-wrap mb-0">
                                <li><a href="">SHIPPING POLICY</a></li>
                                <li><a href="">HELP</a></li>
                                <li><a href="">CONTACT US</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-8">
                            <h6 class="text-uppercase mb-1">Select Delivery location</h6>
                            <p>
                                Enter the pincode of your area to check product availability
                                and delivery options
                            </p>
                            <div class="form-group customChatBox borderBtm_none pincode_box">
                                <input class="spr-form-input spr-form-input-text rounded-0" id="nickname" type="text"
                                    name="name" placeholder="Enter Pincode" required="" />
                                <a href=""
                                    class="btn btn-secondary rounded-0 spr-button spr-button-primary">APPLY</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="freeShipMsg" data-price="199">
                            <i class="icon an an-award" aria-hidden="true"></i> COD
                            <b>available</b>
                        </div>
                        <div class="shippingMsg d-flex text-left">
                            <i class="icon an an-chat" aria-hidden="true"></i>
                            <b class="me-1">7 Days</b>Return and Exchange
                        </div>
                        <div class="freeShipMsg" data-price="199">
                            <i class="icon an an-truck" aria-hidden="true"></i> Usually
                            ships in <b>2 days</b>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        {{-- <div class="row border_btm border_top">
                            <div class="col-sm-8">
                                <h6 class="text-uppercase mb-0">HAPPY15</h6>
                                <p>Get Flat 15% OFF on your order. (T&C applied)</p>
                            </div>
                            <div class="col-sm-4 pt-3">
                                <a href="#" class="txt-red"><b>COPY CODE</b></a>
                            </div>
                        </div> --}}
                        <div class="row row border_btm border_top">
                            <div class="col-sm-8">
                                <h6 class="text-uppercase mb-0">Product Description</h6>
                                <p class="mb-2">
                                    {!! $product->description !!}
                                    <a href="#supplier_pop" class="sizelink txt-red"><b>View more</b></a>
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="text-uppercase mb-0">Product Code</h6>
                                <p class="mb-0"> {{ $product->uuid }}</p>
                                {{-- <a href="#supplier_pop" class="sizelink txt-red"><b>View Supplier Information</b></a> --}}
                            </div>
                        </div>

                        <div class="row border_btm">
                            <div class="col-sm-12">
                                <div class="attribute_tb">
                                    <h6 class="text-uppercase mb-0">Material</h6>
                                    <p>{{ $product->material }}</p>
                                </div>
                                <div class="attribute_tb">
                                    <h6 class="text-uppercase mb-0">Product Wash Care</h6>
                                    <p>{{ $product->wash_care }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row border_btm">
                            <div classs="col-sm-12">
                                <h6 class="text-uppercase mb-0">Shipping Information</h6>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's
                                    standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a
                                    type specimen book.
                                </p>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div classs="col-sm-12">
                                <h6 class="text-uppercase mb-0">Disclaimer</h6>
                                {!! $product->disclaimer !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Product Content-->
        </div>
        <!--End container-fluid-->

        <!--Top Picks On Fashion Product Slider-->
        {{-- <section class="section product-slider pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="section-header text-uppercase col-12">
                        <h2>More From Fayon Kids</h2>
                    </div>
                </div>
                <div class="productSlider_pro grid-products">
                    <div class="item">
                        <div class="product-image">
                            <a href="product.html" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img1.jpg"
                                    src="assets/images/cat-img1.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img1.jpg"
                                    src="assets/images/cat-img1.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="product.html" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img2.jpg"
                                    src="assets/images/cat-img2.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img2.jpg"
                                    src="assets/images/cat-img2.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="product.html" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img3.jpg"
                                    src="assets/images/cat-img3.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img3.jpg"
                                    src="assets/images/cat-img3.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="product.html" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img4.jpg"
                                    src="assets/images/cat-img4.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img4.jpg"
                                    src="assets/images/cat-img4.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="product.html" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img5.jpg"
                                    src="assets/images/cat-img5.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img5.jpg"
                                    src="assets/images/cat-img5.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="product.html" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img6.jpg"
                                    src="assets/images/cat-img6.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img6.jpg"
                                    src="assets/images/cat-img6.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                </div>
            </div>
        </section> --}}
        <!--End Top Picks On Fashion Product Slider-->

        <!--Top Picks On Fashion Product Slider-->
        {{-- <section class="section product_slider1_1">
            <div class="container-fluid">
                <div class="row">
                    <div class="section-header text-uppercase col-12">
                        <h2>Similar Products</h2>
                    </div>
                </div>
                <div class="productSlider_pro1 grid-products">
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img1.jpg"
                                    src="assets/images/cat-img1.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img1.jpg"
                                    src="assets/images/cat-img1.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img2.jpg"
                                    src="assets/images/cat-img2.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img2.jpg"
                                    src="assets/images/cat-img2.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img3.jpg"
                                    src="assets/images/cat-img3.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img3.jpg"
                                    src="assets/images/cat-img3.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img4.jpg"
                                    src="assets/images/cat-img4.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img4.jpg"
                                    src="assets/images/cat-img4.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img5.jpg"
                                    src="assets/images/cat-img5.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img5.jpg"
                                    src="assets/images/cat-img5.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                    <div class="item">
                        <div class="product-image">
                            <a href="#" class="product-img">
                                <img class="primary blur-up lazyload" data-src="assets/images/cat-img6.jpg"
                                    src="assets/images/cat-img6.jpg" />
                                <img class="hover blur-up lazyload" data-src="assets/images/cat-img6.jpg"
                                    src="assets/images/cat-img6.jpg" />
                            </a>
                        </div>
                        <!--Start Product Details-->
                        <div class="product-details text-left">
                            <!--Product Name-->
                            <div class="product-name text-uppercase">
                                <a href="product-layout1.html">Floral Crop Top</a>
                                <p>Peach Silk & Tissue Lehenga Set For Girls</p>
                            </div>
                            <!--End Product Name-->
                            <!--Product Price-->
                            <div class="product-price">
                                <span class="price">$219.00</span>
                            </div>
                            <!--End Product Price-->
                        </div>
                        <!--End Product Details-->
                    </div>
                </div>
            </div>
        </section> --}}
        <!--End Top Picks On Fashion Product Slider-->



        <!--Spring Summer Product Slider-->
        <section class="section product-slider  pb-0">
            <div class="container">
                <div class="row">
                    <div class="section-header text-uppercase col-12">
                        <h2>You May Also Like</h2>
                    </div>
                </div>
                <div class="productSlider grid-products prd-grid">
                    @foreach ($relatedProducts->shuffle() as $relatedProduct)
                        <div class="item">
                            <x-customer.products.product-card :product="$relatedProduct" :showWishlist="false" />
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--End Spring Summer Product Slider-->

        <!--Spring Summer Product Slider-->
        <section class="section product-slider  product_slider1_1">
            <div class="container">
                <div class="row">
                    <div class="section-header text-uppercase col-12">
                        <h2>Recently Viewed Products</h2>
                    </div>
                </div>
                <div class="productSlider_pro1 grid-products">
                    @foreach ($relatedProducts->shuffle() as $relatedProduct)
                        <div class="item">
                            <x-customer.products.product-card :product="$relatedProduct" :showWishlist="false" />
                        </div>
                    @endforeach



                </div>
            </div>
        </section>
        <!--End Spring Summer Product Slider-->
    </div>
    <!--End Body container-fluid-->


    <x-customer.products.product-detail-light-box-images />
    <x-customer.products.size-chart-modal :productSizeChart="$product->size_chart" :brandSizeChart="$product->brand->size_chart" />
    <x-customer.products.product-enquiry-modal :productId="$product->id" />
    @if ($product->custom_tailored === 1)
        <x-customer.products.product-custom-tailored-enquiry-modal :product="$product" />
    @endif
    @if ($product->custom_tailored === 2)
        <x-customer.products.product-custom-tailored-enquiry-modal-men :product="$product" />
    @endif
    {{-- <div class="price_modal_popup">
        <span class="close_btn">x</span>
        <div class="row">
            <div class="col-sm-12 mb-3 text-center price_modalHead">
                <img src="https://fashionedit.shop/allUsers/customer/images/tfe-icon-img.png" class="mb-2"
                    style="width:100px">
                <h3 class="mb-2">PRICE MATCH GUARANTEE</h3>
                <p class="mb-0">The FEI team is committed to offering you the best shopping experience.</p>
                <p class="mb-0">Reach out to our customer care representative to use our price match offer &amp; get the
                    best
                    deal on the product of your choice!</p>
            </div>

            <div class="col-sm-12 mb-3 price_modalStep">
                <div class="row">
                    <div class="col-sm-3"><img src="{{ asset('/allUsers/customer/images/step1-img.png') }}"
                            style="width:100%">
                    </div>
                    <div class="col-sm-9">
                        <h4>STEP 1</h4>
                        <p class="mb-0">Find your favourite product on www.fashioneditindia.com</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mb-3 price_modalStep">
                <div class="row">
                    <div class="col-sm-3"><img src="{{ asset('/allUsers/customer/images/step2-img.png') }}"
                            style="width:100%">
                    </div>
                    <div class="col-sm-9">
                        <h4>STEP 2</h4>
                        <p class="mb-0">If you've seen the same product at a better price on any other online platform,
                            please take
                            a screenshot. </p>
                        <p class="mb-0">The product should be identical in brand, colour and size.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mb-3 price_modalStep">
                <div class="row">
                    <div class="col-sm-3"><img src="{{ asset('/allUsers/customer/images/step3-img.png') }}"
                            style="width:100%">
                    </div>
                    <div class="col-sm-9">
                        <h4>STEP 3</h4>
                        <p class="mb-0">Send us the screenshot on Whatsapp (+916359880688) with a message saying 'Price
                            Match'
                            &amp; we promise to match the price. </p>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}
    <script type="module" src="{{ asset('allUsers/customer/product-detail.js') }}"></script>
    <script type="module" src="{{ asset('allUsers/customer/product.js') }}"></script>
@endsection
