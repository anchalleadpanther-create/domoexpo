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

    <div id="page-content">

        <!--Main Content-->
        <div class="container">
            <!--Product Content-->
            <div class="product-single pt-4">
                <div class="row">
                    <x-customer.products.product-detail-images :product="$product" />
                    <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                        <!-- Product Info -->
                        <div class="product-single__meta">
                            <h1 class="product-single__title"> <a
                                    href="{{ route('customer.designer-products', $product->brand->brand_slug) }}">{{ Str::upper($product->brand->brand_name) }}</a>
                            </h1>
                            <div class="product-single__subtitle">{{ $product->name }} </div>
                            

                            <!-- End Product Info -->
                            <form method="post" action="#" class="product-form hidedropdown">
                                <!-- Swatches Color -->
                                <div class="swatches-image swatch clearfix swatch-0 option1" data-option-index="0">
                                    @if (isset($product->productTypeValueOne->type_value))
                                        <div class="product-form__item">
                                            <label class="label d-flex">Color:<span class="required d-none">*</span><span
                                                    class="slVariant ms-1 fw-bold">{{ $product->productTypeValueOne->type_value }}</span></label>
                                            <ul class="swatches d-flex-wrap list-unstyled clearfix color_tab">
                                                @foreach ($productTypeValues['firstType'] as $type)
                                                    <li data-value="{{ 'Peach' }}"
                                                        class="swatch-element color peach available @if ($type->uuid === Request::segment(2)) active @endif color-element">
                                                        <label
                                                            class="swatchLbl rounded color xlarge peach color-chip w-100 p-1"
                                                            title="{{ $type->productTypeValueOne->type_value }}"
                                                            data-product-uuid="{{ $type->uuid }}"
                                                            data-category-slug="{{ Request::segment(1) }}"
                                                            data-product-slug="{{ $product->slug }}"
                                                            data-product-sku="{{ $product->sku }}">
                                                            {{ $type->productTypeValueOne->type_value }}
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
                                <!-- Swatches Size -->
                                <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                    <div class="product-form__item">
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
                                            <li @class(['ms-1 active', 'd-none' => $product->custom_tailored === 0])>
                                                <a href="#customSize"
                                                    onclick="document.querySelector('.i-know-my-size-btn').click()"
                                                    class="swatchLbl rounded medium sizelink link-underline text-uppercase">
                                                    <i class="icon an an-ruler d-none"></i>
                                                    Custom Order
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <ul style="list-style-type: none;">
                                    <li @class([
                                        'ms-1',
                                        'd-none' =>
                                            !isset($product->size_chart) && !isset($product->brand->size_chart),
                                    ]) style=" width: 100%;">
                                        <a href="#sizechart" class="sizelink link-underline text-uppercase">
                                            <i class="icon an an-ruler d-none"></i>
                                            Size Guide
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Swatches Size -->

                            </form>

                            <!-- Product Price -->
                            <div class="product-single__price pb-1 mt-0 product-price">
                                <x-customer.products.product-detail-pricing :product="$product" />
                            </div>
                            <!-- End Product Price -->

                        </div>
                        <!-- End Product Info -->
                        <!-- Product Form -->
                        <form method="post" action="#" class="product-form hidedropdown">
                            <input type="hidden" value="0" name="is_gift" class="is-gift" />
                            <!-- Product Action -->
                            <div class="product-action w-100 clearfix">
                                <div class="product-form__item--quantity d-flex-center mb-3">
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

                                <div class="row wish_tb">
                                    @guest('buyer')
                                        <div class="col-6">
                                            <a class="w-100 text-center" href="javascript:;" data-bs-toggle="modal"
                                                data-bs-target="#loginModal">
                                                <i class="icon an an-heart-l"></i>Wishlist
                                            </a>
                                        </div>
                                    @endguest
                                    @auth('buyer')
                                        <div class="col-6">
                                            <a class="w-100 text-center product-detail-wishlist-btn" href="javascript:;"
                                                data-product-id="{{ $product->id }}">
                                                @if (isset($product->inMyWishlist))
                                                    <i class="icon an an-heart"></i>Wishlist
                                                @else
                                                    <i class="icon an an-heart-l"></i>Wishlist
                                                @endif
                                            </a>
                                        </div>
                                    @endauth
                                    <div @class(['col-6', 'd-none' => $product->gift_pricing === 0.0])>
                                        <a @class(['w-100 text-center make-it-extra-special']) href="javascript:;">
                                            Make It Extra Special
                                        </a>
                                    </div>
                                    <div @class(['col-6'])>
                                        <a @class(['w-100 text-center modal-price']) href="javascript:;">
                                            Price Match Guarantee
                                        </a>
                                    </div>
                                    <div @class(['col-6 gift-pricing-div d-none'])>
                                        <img @class(['d-none' => $product->gift_pricing === 600.0]) src="{{ asset('allUsers/box-one.jpg') }}" />
                                        <img @class(['d-none' => $product->gift_pricing === 1200.0]) src="{{ asset('allUsers/box-two.jpg') }}" />
                                    </div>
                                    <div @class([
                                        'col-6 d-none align-items-center justify-content-center text-center gift-pricing-div',
                                    ])>
                                        <div class="mb-3">
                                            <label class="form-label">Gifting this to a loved one? <br /> Make it even more
                                                special with our FEI gift packaging</label>
                                            <textarea type="email" class="form-control text-center gifting-message" placeholder="Add a personal message"
                                                maxlength="100" name="gifting_message" style="resize: none;" rows="3"></textarea>

                                            <div id="emailHelp" class="form-text mt-2">
                                                {{ getCurrentCurrency()->currency }}.
                                                {{ number_format($product->gift_pricing * getCurrentCurrency()->con_ratio, 2) }}
                                                &nbsp;<button type="button" class="py-0 add-gifting-btn">ADD</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div @class(['row', 'd-none' => $product->is_custom === 0])>
                                    <div class="col-sm-12 my-4">
                                        <label class="fw-600 fs-6">Enter your personalised text :</label>
                                        <input type="text" maxlength="100" class="form-control w-50 custom-name-input"
                                            placeholder="Enter your text here" />
                                    </div>
                                </div>

                                <div class="row action-btn-div">
                                    <div class="product-form__item--submit col-6">
                                        <a href="javascript:;" @class([
                                            'btn rounded product-form__cart-submit add-to-cart-btn',
                                            'd-none' => $stockCount === 0,
                                        ])
                                            data-product-id="{{ $product->id }}" data-click-from="">
                                            Add to cart
                                        </a>
                                    </div>
                                    <div @class([
                                        'product-form__item--buyit col-6  mt-2',
                                        'd-none' => $stockCount === 0,
                                    ])>
                                        <button type="button" class="btn rounded proceed-to-checkout buy-now">
                                            Buy it now
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <p class="infolinks d-flex-center mt-2 mb-3 fw-500">DISCLAIMER
                            <ul>
                                <li class="small" style="list-style-position: outside;margin-left: 1.4em;">
                                    This product will be exclusively handcrafted for you, making the colour/texture/pattern
                                    slightly
                                    vary from the image shown, due to multiple artisan-led techniques and processes
                                    involved.
                                </li>
                            </ul>
                            </p>

                            <p class="infolinks d-flex-center mt-2 mb-3 fw-600 fs-14">
                                <a class="emaillink me-0" href="#productInquiry">
                                    <i class="icon an an-question-cil me-3"></i>
                                    Ask a question
                                </a>
                            </p>

                        </form>
                        <!-- End Product Form -->
                        <div id="ShippingInfo" class="mfpbox mfp-with-anim mfp-hide">
                            {!! htmlspecialchars_decode($product->disclaimer) !!}
                        </div>

                        <!-- Product Info -->
                        <div class="freeShipMsg " data-price="199">
                            <i class="icon an an-truck me-1" aria-hidden="true"></i>
                            Free shipping in India
                        </div>
                        @isset($product->disclaimer)
                            <p class="infolinks d-flex-center mt-2">
                                <a class="">
                                    <i class="icon an an-paper-l-plane me-3"></i>{!! htmlspecialchars_decode($product->disclaimer) !!}
                                </a>
                            </p>
                        @endisset
                        @isset($product->availability)
                            <p class="infolinks d-flex-center mb-3">
                                <a class="mb-4">
                                    <i class="icon an an-paper-l-plane me-3"></i>{!! htmlspecialchars_decode($product->availability) !!}
                                </a>
                            </p>
                        @endisset
                        <div class="social-sharing d-flex-center my-3">
                            <span class="sharing-lbl me-2">Share :</span>
                            <ul class="list-inline social-icons">
                                <li class="list-inline-item">
                                    <x-customer.icon url="https://www.facebook.com/fashioneditindia" icon="an an-facebook"
                                        name="Facebook" />
                                </li>
                                <li class="list-inline-item">
                                    <x-customer.icon url="https://www.pinterest.com/Thefashioneditofficial"
                                        icon="an an-pinterest-p" name="Pinterest" />
                                </li>
                                <li class="list-inline-item">
                                    <x-customer.icon url="https://www.instagram.com/fashioneditindia"
                                        icon="an an-instagram" name="Instagram" />
                                </li>
                                <li class="list-inline-item">
                                    <x-customer.icon url="https://api.whatsapp.com/send?phone=+916359880688&text=Hello"
                                        icon="an an-whatsapp" name="Whatsapp" />
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <!--Product Content-->

            <!--Product Tabs-->
            <div class="tabs-listing mt-2 mt-md-5">
                <ul class="product-tabs list-unstyled d-flex-wrap border-bottom m-0 d-none d-md-flex">
                    <li rel="description" class="active"><a class="tablink">Description</a></li>
                    {{-- <li rel="size-chart"><a class="tablink">Size Chart</a></li> --}}
                    {{-- <li rel="shipping-return"><a class="tablink">Shipping </a></li> --}}
                    {{-- <li rel="reviews"><a class="tablink">Reviews</a></li> --}}
                    {{-- <li rel="addtional-tabs"><a class="tablink">Addtional Tabs</a></li> --}}
                </ul>
                <div class="tab-container">
                    <h3 class="tabs-ac-style d-md-none active" rel="description">Description</h3>
                    <div id="description" class="tab-content">
                        <div class="product-description">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4 mb-md-0">
                                    {!! htmlspecialchars_decode($product->description) !!}

                                    <ul class="mt-4">

                                    @empty(!trim($product->material))
                                        <li>
                                            <b>Fabric</b>
                                            <p>{{ Str::ucfirst(Str::lower($product->material)) }}</p>
                                        </li>
                                    @endempty


                                @empty(!trim($product->wash_care))
                                    <li>
                                        <b>Product Care</b>
                                        <p> {!! htmlspecialchars_decode(Str::ucfirst(Str::lower($product->wash_care))) !!}</p>
                                    </li>
                                @endempty
                            @empty(!trim($product->occasion))
                                <li>
                                    <b>Occasion</b>
                                    <p>{!! htmlspecialchars_decode(Str::ucfirst(Str::lower($product->occasion))) !!}</p>
                                </li>
                            @endempty
                            <li>
                                <b>SKU</b>
                                <p>{{ Str::ucfirst($product->sku) }}</p>
                            </li>


                        @empty(!trim($product->collection))
                            <li>
                                <b>Collection</b>
                                <p> {{ Str::ucfirst(Str::lower($product->collection)) }}</p>
                            </li>
                        @endempty
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--End Product Tabs-->
</div>
<!--End Container-->

<!--Spring Summer Product Slider-->
<section class="section product-slider">
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
<section class="section product-slider">
<div class="container">
<div class="row">
    <div class="section-header text-uppercase col-12">
        <h2>Recently Viewed Products</h2>
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


</div>
<!--End Body Container-->`
<x-customer.products.product-detail-light-box-images />
<x-customer.products.size-chart-modal :productSizeChart="$product->size_chart" :brandSizeChart="$product->brand->size_chart" />
<x-customer.products.product-enquiry-modal :productId="$product->id" />
@if ($product->custom_tailored === 1)
<x-customer.products.product-custom-tailored-enquiry-modal :product="$product" />
@endif
@if ($product->custom_tailored === 2)
<x-customer.products.product-custom-tailored-enquiry-modal-men :product="$product" />
@endif
<div class="price_modal_popup">
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
</div>
<script type="module" src="{{ asset('allUsers/customer/product-detail.js') }}"></script>
<script type="module" src="{{ asset('allUsers/customer/product.js') }}"></script>
@endsection
