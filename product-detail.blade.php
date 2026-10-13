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


<link href="https://www.littletags.com/allUsers/75a6eb2dbd3e4ecbdf17896ce021d782-SSL-1534491742.css" charset="utf-8"
  type="text/css" rel="stylesheet">
<link href="https://www.littletags.com/allUsers/aa71fb081c551ca46c651c11a3b4a1f8-SSL-1534491742.css" charset="utf-8"
  type="text/css" rel="stylesheet">
<link href="https://www.littletags.com/allUsers/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://www.littletags.com/allUsers/magiczoomplus.js" type="text/javascript"></script>


<!--Body container-fluid-->

<div id="page-content">

  {{-- <div class="container-fluid mb-5 mobile-hide">

    <div class="row">

      <div class=" banner-text banner-style2">

        <img src="{{ asset('allUsers/frontend/images/banner-top.png') }}" alt="banner" style="width:100%">

      </div>

    </div>

  </div> --}}



  <!--Main Content-->

  <div class="container-fluid mt-5">

    <!--Product Content-->

    <div class="product-single product-view-top">

      <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">
          <div class="p-0 pt-0 res-p-0">
            <div class="breadcrumbs-wrapper text-uppercase" style="background:none">
              <div class="col-sm-12">
                <div class="breadcrumbs">


                  <a href="{{ Url('/') }}">
                    <span style="font-size: 15px;font-weight: normal;color: #5e5e5e;">
                      <i class="fa fa-home" aria-hidden="true"></i>
                    </span>
                  </a>
                  <span>
                    <i class="icon an an-chevron-right" style="font-size: 10px;font-weight: normal;color: #5e5e5e;"></i>
                  </span>
                  @isset($category->parent->parent)
                  <a href="{{ route('customer.product-category', $category->parent->parent->category_slug) }}">
                    {{ $category->parent->parent->category_name }}
                  </a>
                  <span>
                    <i class="icon an an-chevron-right" style="font-size: 10px;font-weight: normal;color: #5e5e5e;"></i>
                  </span>
                  @endisset
                  @isset($category->parent)
                  <a href="{{ route('customer.product-category', $category->parent->category_slug) }}">
                    {{ $category->parent->category_name }}
                  </a>
                  <span>
                    <i class="icon an an-chevron-right" style="font-size: 10px;font-weight: normal;color: #5e5e5e;"></i>
                  </span>
                  @endisset
                  <a href="{{ route('customer.product-category', $category->category_slug) }}">
                    <span class="fw-bold">{{ $category->category_name }}  </span>
                  </a>

                  <!--span>
                    <i class="icon an an-chevron-right" style="font-size: 10px;font-weight: normal;color: #5e5e5e;"></i>
                  </span-->

                  <!--a href="javascript:void(0)">
                    <span class="fw-bold" style="color: #e55c5c;">{{ $product->name }}</span>
                  </a-->
                </div>
              </div>
            </div>

          </div>
        </div>



        <x-customer.products.product-detail-images :product="$product" />

        <div class="col-lg-6 col-md-6 col-sm-12 col-12">

          <!-- Product Info -->

          <div class="product-single__meta mb-0">

            @auth('buyer')

            <div class="product-wish">
              <a class="wishIcon  m-0" href="javascript:;"
                style="background:none !important; padding:0 !important;height:auto">
                <i class="icon an an-heart-l product-detail-wishlist-btn wishlist-live-btn @isset($product->inMyWishlist) text-danger @endisset"
                  data-product-id="{{ $product->id }}"></i>
                <span class="tooltip-label left">
                  @isset($product->inMyWishlist)
                  Remove from wishlist
                  @endisset
                  @empty($product->inMyWishlist)
                  Add to wishlist
                  @endempty
                </span>
              </a>
            </div>

            @endauth
            @guest('buyer')
            <div class="product-wish">
              <a class="wishIcon wishlist m-0" href="javascript:;"
                style="background:none !important; padding:0 !important;height:auto">
                <i class="icon an an-heart-l wishlist-live-btn wishlist-product-id" data-bs-toggle="modal"
                  data-product-id="{{ $product->id }}" data-bs-target="#loginModal"></i>
                <span class="tooltip-label left">
                  Add to wishlist
                </span>
              </a>
            </div>
            @endguest


            <h1 class="product-single__title"> <a href="{{ url('/designer/'.$product->brand->brand_slug) }}" ><b>{{
                  Str::upper($product->brand->brand_name) }}</b></a> </h1>

            <div class="product-single__subtitle">{{ @$product->name }}</div>

            <!-- End Product Info -->

            <!-- Product Price -->

            <div class="product-single__price pb-1 mt-0">

              <x-customer.products.product-detail-pricing :product="$product" />

              <div class="product__policies fw-normal mt-1">Tax included.</div>

            </div>

            <!-- End Product Price -->

            <form method="post" action="#" class="product-form hidedropdown mobile-hide">

              <!-- Swatches Size -->

              <div @class([ 'swatch clearfix swatch-1 option2 mb-0' , 'd-none'=> $product->sku === 'LTGIFTCARD',

                ]) data-option-index="1">

                <div class="product-form__item">

                  <label class="label d-flex">Select kid's age group (in years) 
                    <a href="#sizechart" class=" sizelink txt-red">&nbsp; what's my size?
                      {{-- @if ($category->category_name == "Shoes" ||  $category->category_name == "Footwears") --}}
                      @if (strpos($category->category_slug, "footwears") !== false)
                      (UK/US Size)
                      @endif
                      @if (strpos($category->category_slug, "shoes") !== false)
                      (UK/US Size)
                      @endif
                    </a>
                  </label>

                  <ul class="swatches-size d-flex-center list-unstyled clearfix">



                    @foreach ($productTypeValues['sizesOfFirstType'] as $type)

                    {{-- <li data-value="{{ $type->productTypeValueTwo->type_value }}"
                      class="swatch-element available ">

                      <label class="swatchLbl rounded medium size-chip" data-product-uuid="{{ $type->uuid }}"
                        data-product-color="{{ isset($product->productTypeValueOne->type_value) ? $product->productTypeValueOne->type_value : '' }}"
                        data-product-size="{{ $type->productTypeValueTwo->type_value }}"
                        data-currency="{{ getCurrentCurrency()->toJSON() }}"
                        title="{{ $type->productTypeValueTwo->type_value }}">

                        {{ $type->productTypeValueTwo->type_value }}

                      </label><span class="tooltip-label">{{

                        $type->productTypeValueTwo->type_value }}</span>

                    </li> --}}



                    {{-- <li data-value="{{ $type->productTypeValueTwo->type_value }}"
                      class="swatch-element available ">

                      <label class="swatchLbl rounded medium size-chip" --}} 


                      @if($type->stock != 0)
                        <li
                            data-value="{{ $type->productTypeValueTwo->type_value }}" class="swatch-element s available ">

                            <label class="swatchLbl medium size-chip" data-product-uuid="{{ $type->uuid }}"
                              data-product-color="{{ isset($product->productTypeValueOne->type_value) ? $product->productTypeValueOne->type_value : '' }}"
                              data-product-size="{{ $type->productTypeValueTwo->type_value }}"
                              data-currency="{{ getCurrentCurrency()->toJSON() }}"
                              title="{{ $type->productTypeValueTwo->type_value }}">
                              {{ $type->productTypeValueTwo->type_value }}</label><span class="tooltip-label">
                              {{ $type->productTypeValueTwo->type_value }} </span>
                        </li>
                      @endif

                    @endforeach

                  </ul>

                </div>

              </div>
            </form>

            <!-- End Swatches Size -->

            <div @class(['row w-100', 'd-none'=> $product->sku !== 'LTGIFTCARD'])>

              <form class="col-md-6 gift-card-form" id="gift-card-form">

                <input type="hidden" name="quantity" value="1" />

                <input type="hidden" name="is_gift_card" value="1" />

                <input type="hidden" name="product_id" value="{{ $product->id }}" />

                <div class="mb-3">

                  <label class="form-label">Gift Card Value (Rs.) </label>

                  <select class="form-control form-controm-sm" name="gift_card_value">

                    @foreach ($productTypeValues['sizesOfFirstType'] as $type)

                    <option value="{{ $type->productTypeValueTwo->type_value }}">

                      {{ $type->productTypeValueTwo->type_value }}</option>

                    @endforeach

                  </select>

                </div>

                <div class="mb-3">

                  <label class="form-label">From Name</label>

                  <input type="text" maxlength="100" value="" class="form-control" name="from_name" />

                </div>

                <div class="mb-3">

                  <label class="form-label">To Name</label>

                  <input type="text" maxlength="100" value="" class="form-control" name="to_name" />

                </div>

                <div class="mb-3">

                  <label class="form-label">To Email</label>

                  <input type="text" maxlength="100" value="" class="form-control" name="to_email" />

                </div>

                <div class="mb-3">

                  <label class="form-label">Message</label>

                  <textarea maxlength="1000" class="form-control" name="message"></textarea>

                </div>

              </form>

            </div>



            <!-- Swatches Color -->


            <!-- End Swatches Color -->

            <div class="form-group text-start desktop-hide">

              <label class="label d-flex">Select kid's age group (in years) <a href="#sizechart"
                  class=" sizelink txt-red">&nbsp; what's my size?</a></label>

              <select class="form-control form-controm-sm" name="size">
                @foreach ($productTypeValues['sizesOfFirstType'] as $type)
                <option value="{{ $type->productTypeValueTwo->type_value }}">
                  {{ $type->productTypeValueTwo->type_value }}
                </option>
                @endforeach
              </select>

              {{-- <select class="form-control">

                <option>Select Size</option>

                <option> 1-2 YEARS</option>

                <option> 2-3 YEARS</option>

                <option> 3-4 YEARS</option>

                <option> 4-5 YEARS</option>

                <option> 5-6 YEARS</option>

                <option> 6-7 YEARS</option>

                <option> 7-8 YEARS</option>

                <option> 8-9 YEARS</option>

                <option> 9-10 YEARS</option>



              </select> --}}

            </div>

            <!-- Countdown -->

            <div class="countdown-text d-flex-wrap mb-3 pb-1" style="display:none">

              <label class="mb-2 mb-lg-0">Limited-Time Offer :</label>

              <div class="prcountdown d-flex" data-countdown="2024/10/01"></div>

            </div>

            <!-- End Countdown -->

            <!-- Product Sold -->

            <div class="orderMsg d-flex-center" data-user="23" data-time="24" style="display:none">

              <img src="{{ asset('allUsers/frontend/images/order-icon.jpg') }}" alt="order" />

              <p id="quantity_message" class="ms-2 ps-2 border-start">Hurry! Only <span class="items fw-bold">4</span>

                left in stock.</p>

            </div>

            <!-- End Product Sold -->

          </div>

          <!-- End Product Info -->

          <!-- Product Form -->

          <form method="post" action="#" class="product-form hidedropdown">



            <!-- Product Action -->

            <div class="product-action w-100 clearfix">

              {{-- <div class="product-form__item--quantity d-flex-center mb-3">

                <div class="qtyField">

                  <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon an an-minus-r"
                      aria-hidden="true"></i></a>

                  <input type="text" name="quantity" value="1" class="product-form__input qty">

                  <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon an an-plus-r"
                      aria-hidden="true"></i></a>

                </div>

                <div class="pro-stockLbl ms-3">

                  <span class="d-flex-center stockLbl instock"><i class="icon an an-check-cil"></i><span> In
                      stock</span></span>

                  <span class="d-flex-center stockLbl preorder d-none"><i class="icon an an-clock-r"></i><span>
                      Pre-order Now</span></span>

                  <span class="d-flex-center stockLbl outstock d-none"><i class="icon an an-times-cil"></i> <span>Sold
                      out</span></span>

                  <span class="d-flex-center stockLbl lowstock d-none" data-qty="15"><i
                      class="icon an an-exclamation-cir"></i><span> Order now, Only <span class="items">10</span>
                      left!</span></span>

                </div>

              </div> --}}







              <div class="product-action w-100 clearfix">

                <div class="product-form__item--quantity d-flex-center mb-3">

                  <div class="qtyField cart-quantity-div d-none cart-productss">

                    <a class="qtyBtn minus qty-minus" href="javascript:void(0);">-</a>

                    <input type="text" value="" readonly class="product-form__input qty product-qty-box"
                      data-product-stock="" data-cart-id="" data-product-id="">

                    <a class="qtyBtn plus qty-plus" href="javascript:void(0);">+</a>

                  </div>

                  <div class="pro-stockLbl stock-info">

                    <span @class([ 'stockLbl instock' , 'd-flex-center'=> $stockCount > 0,

                      'd-none' => $stockCount === 0,

                      ])>

                      <i class="icon an an-check-cil"></i>

                      <span> In stock</span>

                    </span>

                    <span @class([ 'stockLbl outstock' , 'd-flex-center'=> $stockCount === 0,

                      'd-none' => $stockCount > 0,

                      ])>

                      <i class="icon an an-times-cil"></i>

                      <span>Sold out</span>

                    </span>

                  </div>

                </div>



              </div>



              <div class="row action-btn-div">

                <div class="product-form__item--buyit col-sm-12 mb-2 {{ $product->is_custom == 1 ? '' : 'd-none' }}">

                  <label class="fw-600 fs-6">Enter your personalised text :</label>

                  <input type="text" maxlength="100" name="custom_name" class="form-control w-100 custom-name-input"
                    placeholder="Enter your text here" />

                </div>







                <!-- <div class="product-form__item--buyit col-sm-4 mb-2">

                                                                                        <a href="#add_personalization"

                                                                                            class=" sizelink txt-red btn rounded btn-outline-primary proceed-to-checkout">Add

                                                                                            Personalization </a>

                                                                                    </div> -->





                <div class="product-form__item--submit col-sm-6">

                  <a href="javascript:;" @class([ 'btn rounded product-form__cart-submit add-to-cart-btn' , 'd-none'=>
                    $stockCount === 0,

                    'd-none' => $product->sku === 'LTGIFTCARD',

                    ]) data-product-id="{{ $product->id }}"

                    data-click-from="">

                    Add to cart

                  </a>

                  <button @class([ 'btn rounded mt-2 product-form__cart-submit' , 'd-none'=> $stockCount === 0,

                    'd-none' => $product->sku !== 'LTGIFTCARD',

                    ]) form="gift-card-form">

                    Add to cart

                  </button>

                </div>

                @guest('buyer')

                <div class="product-form__item--submit col-sm-6 mt-2 d-none">

                  <a href="javascript:;" name="add" data-bs-toggle="modal" data-bs-target="#loginModal"
                    class="btn rounded product-form__cart-submit"><span>WISHLIST</span></a>

                </div>

                @endguest

                @auth('buyer')

                <div class="product-form__item--submit col-sm-6 mt-2 d-none">

                  <a class="btn rounded product-form__cart-submit product-detail-wishlist-btn" href="javascript:;"
                    data-product-id="{{ $product->id }}">

                    @if (isset($product->inMyWishlist))

                    <i class="icon an an-heart"></i> &nbsp;WISHLIST

                    @else

                    <i class="icon an an-heart-l"></i> &nbsp;WISHLIST

                    @endif

                  </a>

                </div>

                @endauth



                <div @class([ 'product-form__item--buyit col-6  mt-2' , 'd-none'=> $stockCount === 0,

                  'd-none' => $product->sku === 'LTGIFTCARD',

                  ])>

                  <button type="button" class="btn rounded proceed-to-checkout buy-now">

                    BUY NOW

                  </button>

                </div>



                <div @class(['product-form__item--buyit col-6 mt-2 col-sm-12'])>

                  <button type="button" class="btn rounded compare-btn" data-id="{{ $product->id }}">

                    Compare

                  </button>

                </div>


              </div>

            </div>

            <!-- End Product Action -->

            <!-- Product Info link -->

            <!--p class="infolinks d-flex-center mt-4 mb-3">
              <a class="btn add-to-wishlist " href="https://api.whatsapp.com/send?phone=+918447722222&text=Hello"><i
                  class="icon an an-whatsapp me-1" aria-hidden="true"></i>
                <span>at +8447722222 to know more about the

                  product</span></a>

            </p-->

            <!-- End Product Info link -->

            <!--div class="col-12">
              <div class="form-group customChatBox">
                <input class="spr-form-input spr-form-input-text rounded-0" id="nickname" type="text" name="name"
                  placeholder="Know more about the product..." required="">
                <a class="btn btn-secondary rounded-0 spr-button spr-button-primary"
                  href="https://api.whatsapp.com/send?phone=+918447722222&text=Hello"><span class="mobile-hide">CHAT
                    WITH US</span> <i class="icon an an-whatsapp desktop-hide" aria-hidden="true"></i></a>
              </div>
            </div-->

          </form>

          <!-- End Product Form -->

          <!-- Social Sharing -->

          <div class="social-sharing mb-3 row mt-3">

            <div class="col-sm-4 d-flex-center">

              <li class="list-inline-item">

                <x-customer.icon url="https://www.facebook.com/ltlittletags/" icon="an an-facebook" name="Facebook" />

              </li>

              <li class="list-inline-item">

                <x-customer.icon url="https://www.youtube.com/channel/UCcF3JT6qO2IdFG6NCuG317w" icon="an an-youtube"
                  name="Youtube" />

              </li>

              <li class="list-inline-item">

                <x-customer.icon url="https://www.instagram.com/little_tags/?hl=en" icon="an an-instagram"
                  name="Instagram" />

              </li>

            </div>

            <ul class="col-sm-8 text-right social-links-wrap mb-0">

              <li><a href="https://littletags.webkype.co/pages/shipping-delivery">SHIPPING POLICY</a></li>

              <li><a href="https://api.whatsapp.com/send?phone=+918447722222&text=Hello">HELP</a></li>

              <li><a href="https://littletags.webkype.co/pages/contact-us">CONTACT US</a></li>

            </ul>

          </div>

          <div class="col-sm-8 ">

            <h6 class="text-uppercase mb-1">Select Delivery location</h6>

            <p>Enter the pincode of your area to check product availability and delivery options</p>

            <div class="form-group customChatBox borderBtm_none pincode_box">

              <input class="spr-form-input spr-form-input-text rounded-0 delivery-detail-by-pincode-input" id="nickname"
                type="text" minlength="6" maxlength="6" name="name" placeholder="Enter Pincode" required="">

              <a href="javascript:void(0)"
                class="btn btn-secondary rounded-0 spr-button spr-button-primary delivery-detail-by-pincode">APPLY</a>

              <br><br>

              <div class="pincode-desc">



              </div>

            </div>



          </div>

          <div class="clearfix mb-3"></div>

          <div class="freeShipMsg text-center" data-price="199"> <i class="icon an an-award   txt-red"
              aria-hidden="true"></i><br> COD <b>available</b></div>

          <div class="shippingMsg  text-center"><i class="icon an an-chat   txt-red" aria-hidden="true"></i><br> <b
              class="me-1">7 Days</b>Return and Exchange</div>

          <div class="freeShipMsg text-center" data-price="199"><i class="icon an an-truck  txt-red"
              aria-hidden="true"></i><br> Delivery Timeline: <b>{{date('d M Y', strtotime(date('Y-m-d') . ' + ' .
              ($product->deliverytime + 4) . ' days'))}}</b></div>


              


        </div>



        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        
          <!--div class="row border_btm border_top">

            <div class="col-sm-8">

              <h6 class="text-uppercase mb-0">HAPPY15</h6>

              <p>Get Flat 15% OFF on your order. (T&C applied)</p>

            </div>

            <div class="col-sm-4 pt-3">

              <a href="#" class="  txt-red"><b>COPY CODE</b></a>

            </div>

          </div-->

          <div class="row border_btm my-3">
          <div class="col-sm-8 my-3">
                    <div class="sharethis-inline-share-buttons" style="text-align:left"></div>
          </div>

            <div class="col-sm-8">

           

              <h6 class="text-uppercase mb-1 heading_highlight---">Product Description</h6>

              <p class="mb-0" id="disclaimer-content">

                {!! $product->description !!}
                {{-- <a href="#supplier_pop" class="sizelink txt-red"><b>View more</b></a> --}}

              </p>
              <p id="disclaimer-toggle" style="cursor: pointer;" class=" mb-3 sizelink txt-red">View More</p>


              <div class="mb-3"></div>

              <h6 class="text-uppercase mb-3">Product Review <a href="#productReview" class="sizelink txt-red"><b>View
                    Review</b></a></h6>

              <div class="ratings_wrap row mb-4">

                <div class="col-sm-5 col-5">

                  <div class="card-rating">

                    <div class="ratings">

                      <div class="card-rating-text">{{ number_format($productRatings->avg('star'), 1) }}<i
                          class="fa fa-star"></i></div>

                      <p class="rating-count">{{ $productRatings->count('user_id') }} Verified Buyers</p>

                    </div>

                  </div>

                </div>

                <div class="col-sm-7 col-7">

                  <div class="rating-percents">

                    <div class="rating-percent">

                      <span class="rating-no">5 <i class="fa fa-star"></i></span>

                      <div class="rating-progress"></div>

                      <span class="rating-percent-no">{{ $productRatings->where('star', '=', 5)->count() }}</span>

                    </div>

                    <div class="rating-percent">

                      <span class="rating-no">4 <i class="fa fa-star"></i></span>

                      <div class="rating-progress"></div>

                      <span class="rating-percent-no">{{ $productRatings->where('star', '=', 4)->count() }}</span>

                    </div>

                    <div class="rating-percent">

                      <span class="rating-no">3 <i class="fa fa-star"></i></span>

                      <div class="rating-progress"></div>

                      <span class="rating-percent-no">{{ $productRatings->where('star', '=', 3)->count() }}</span>

                    </div>

                    <div class="rating-percent">

                      <span class="rating-no">2 <i class="fa fa-star"></i></span>

                      <div class="rating-progress"></div>

                      <span class="rating-percent-no">{{ $productRatings->where('star', '=', 2)->count() }}</span>

                    </div>

                    <div class="rating-percent">

                      <span class="rating-no">1 <i class="fa fa-star"></i></span>

                      <div class="rating-progress"></div>

                      <span class="rating-percent-no">{{ $productRatings->where('star', '=', 1)->count() }}</span>

                    </div>

                  </div>

                </div>


              </div>



            </div>

            <div class="col-sm-4">

              <h6 class="text-uppercase mb-0 ">Product Code</h6>

              <p class="mb-0"> {{ $product->sku }}</p>

              {{-- <a href="#supplier_pop" class=" sizelink txt-red"><b>View Supplier Information</b></a> --}}

            </div>

          </div>



          <div class="row border_btm">

            <div class="col-sm-12">

              @if(!empty($product->material))

              <div class="attribute_tb">

                <h6 class="text-uppercase mb-0">Composition</h6>

                <p>{{ $product->material }}</p>

              </div>

              @endif

              @if(!empty($product->wash_care))
              <div class="attribute_tb">

                <h6 class="text-uppercase mb-0">Care</h6>

                <p>{{ $product->wash_care }}</p>

              </div>

              @endif

            </div>

          </div>



          {{-- <div class="row border_btm">

            <div classs="col-sm-12">

              <h6 class="text-uppercase mb-0">Shipping Information</h6>

              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum

                has been the industry's standard dummy text ever since the 1500s, when an unknown

                printer took a galley of type and scrambled it to make a type specimen book.</p>

            </div>

          </div> --}}

          @if(!empty($product->disclaimer))

          <div class="row ">

            <div classs="col-sm-12">

              <h6 class="text-uppercase mb-0">Disclaimer</h6>

              {!! $product->disclaimer !!}

            </div>

          </div>

          @endif

        </div>

      </div>

    </div>

    <!--Product Content-->





  </div>

  <!--End container-fluid-->

  <!--Top Picks On Fashion Product Slider-->

  <section class="section product_slider1_1 pt-5 ">

    <div class="container-fluid">

      <div class="row">


        <div class="section-header mainHeading col-12">
          <h2 class="text-uppercase"><span>Similar Products</span></h2>
        </div>

      </div>

      <div class="productSlider_pro1 grid-products">



        @foreach ($relatedProducts->shuffle() as $relatedProduct)

        <x-customer.products.product-card :product="$relatedProduct" :showWishlist="false" :isProductListPage="false" />

        @endforeach

      </div>

    </div>

  </section>

  <!--End Top Picks On Fashion Product Slider-->

  <!--Top Picks On Fashion Product Slider-->

  <section class="section product-slider">

    <div class="container-fluid">

      <div class="row">
        <div class="section-header mainHeading col-12">
          <h2 class="text-uppercase"><span>More From {{ $product->brand->brand_name }} </span></h2>
        </div>


      </div>

      <div class="productSlider_pro grid-products">



        @foreach ($relatedBrandsProducts->shuffle() as $relatedBrandProduct)

        <x-customer.products.product-card :product="$relatedBrandProduct" :showWishlist="false"
          :isProductListPage="false" />

        @endforeach

      </div>

    </div>

  </section>

  <!--End Top Picks On Fashion Product Slider-->



  <!--Top Picks On Fashion Product Slider-->
@if (count($recentlyViewedProducts) > 0)
    <section class="section product-slider">
      <div class="container-fluid">
        <div class="row">
          <div class="section-header mainHeading col-12">
            <h2 class="text-uppercase"><span>Recently Viewed Products </span></h2>
          </div>
        </div>
        <div class="productSlider_pro grid-products">
          @foreach ($recentlyViewedProducts->shuffle() as $recentlyViewedProduct)
          <x-customer.products.product-card :product="$recentlyViewedProduct" :showWishlist="false"
            :isProductListPage="false" />
          @endforeach
        </div>
      </div>
    </section>
  @endif


  <!--End Top Picks On Fashion Product Slider-->

  <!--Top Picks On Fashion Product Slider-->
@if (count($customerAlsoViewedProducts) > 0)
    <section class="section product-slider">
      <div class="container-fluid">
        <div class="row">
          <div class="section-header mainHeading col-12">
            <h2 class="text-uppercase"><span>Customer Also Viewed </span></h2>
          </div>
        </div>
        <div class="productSlider_pro grid-products">
          @foreach ($customerAlsoViewedProducts->shuffle() as $customerAlsoViewedProduct)
          <x-customer.products.product-card :product="$customerAlsoViewedProduct" :showWishlist="false"
            :isProductListPage="false" />
          @endforeach
        </div>
      </div>
    </section>
  @endif


  <!--End Top Picks On Fashion Product Slider-->



  @if (count($completeTheLookProducts) > 0)
    <section class="section product-slider">
      <div class="container-fluid">
        <div class="row">
          <div class="section-header mainHeading col-12">
            <h2 class="text-uppercase"><span>Complete The Look</span></h2>
          </div>
        </div>
        <div class="productSlider_pro grid-products">
          @foreach ($completeTheLookProducts->shuffle() as $completeTheLookProduct)
          <x-customer.products.product-card :product="$completeTheLookProduct" :showWishlist="false"
            :isProductListPage="false" />
          @endforeach
        </div>
      </div>
    </section>
  @endif



</div>

<!--End Body container-fluid-->

<!--Size Chart-->

<div id="productReview" class="mfpbox mfp-with-anim mfp-hide">

  <div class="col-12 col-sm-12 col-md-12 col-lg-12">

    <div class="spr-reviews">

      <h4 class="spr-form-title text-uppercase mb-3">Customer Reviews</h4>



      @if (!empty($productRatings))

      @foreach ($productRatings as $rating)

      <div class="review-inner">

        <div class="spr-review">



          <div class="spr-review-header">



            <h5 class="spr-review-header-title mt-1">{{ @$rating->user->first_name }}

              {{ @$rating->user->last_name }}</h5>



            <div class="">

              @foreach ($rating->images as $image)

              <a target="_blank" href="{{ asset('uploads/products') . '/' . $image }}"><img
                  src="{{ asset('uploads/products') . '/' . $image }}" class="img-thumbnail" style="width:150px;" /></a>

              @endforeach

            </div>



            <span class="spr-review-header-byline mb-0"><strong>Review</strong> on

              <strong>{{ @$rating->created_at->format('d M, Y') }}</strong></span><span
              class="product-review spr-starratings"><span class="reviewLink">



                @for ($i = 1; $i <= 5; $i++) @if ($rating->star >= $i)

                  <i class="icon an an-star"></i>

                  @else

                  <i class="icon an an-star-o"></i>

                  @endif

                  @endfor

              </span>

            </span>

          </div>
          <div class="spr-review-content mt-2">
            <p class="spr-review-content-body">{{ $rating->review }}</p>
          </div>

        </div>

      </div>

      @endforeach

      @else

      <div class="review-inner text-center">

        <div class="spr-review">

          <div class="spr-review-header">

            <h5 class="spr-review-header-title mt-1">Review not available</h5>

          </div>

        </div>

      </div>

      @endif

    </div>

  </div>

</div>

<button title="Close (Esc)" type="button" class="mfp-close">×</button>

</div>

<!--End Size Chart-->



<x-customer.products.product-detail-light-box-images />

<x-customer.products.size-chart-modal :productSizeChart="$product->size_chart"
  :brandSizeChart="$product->brand->size_chart" />

<x-customer.products.product-enquiry-modal :productId="$product->id" />

@if ($product->custom_tailored === 1)

<x-customer.products.product-custom-tailored-enquiry-modal :product="$product" />

@endif

@if ($product->custom_tailored === 2)

<x-customer.products.product-custom-tailored-enquiry-modal-men :product="$product" />

@endif


<script type="module" src="{{ asset('allUsers/customer/product-detail.js') }}"></script>

<script type="module" src="{{ asset('allUsers/customer/product.js') }}"></script>
<script>
  const disclaimerContent = document.getElementById('disclaimer-content');
  const disclaimerToggle = document.getElementById('disclaimer-toggle');

  const characterLimit = 150; // Set your desired character limit
  let truncatedText = disclaimerContent.textContent.substring(0, characterLimit);
  const fullText = disclaimerContent.textContent;

  // Check if content length exceeds limit and add ellipsis if necessary
  if (fullText.length > characterLimit) {
    truncatedText += '...';
  }

  disclaimerContent.textContent = truncatedText;
  disclaimerContent.style.display = '-webkit-box'; // Ensure multi-line content wraps
  disclaimerContent.style.WebkitLineClamp = 2; // Set number of visible lines (optional)

  // Hide the toggle button if content is less than or equal to the limit
  disclaimerToggle.hidden = fullText.length <= characterLimit;

  disclaimerToggle.addEventListener('click', () => {
    if (disclaimerContent.textContent === truncatedText) {
      disclaimerContent.textContent = fullText;
      disclaimerToggle.textContent = 'View Less';
    } else {
      disclaimerContent.textContent = truncatedText;
      disclaimerToggle.textContent = 'View More';
    }
  });



</script>


<style>
  .ratings_wrap {

    background-color: #fff;

    border-radius: 1rem;

    padding: 0;

    text-align: left;

  }



  .ratings_wrap .card-title {

    -webkit-text-stroke: 1px #222;

    -webkit-text-fill-color: var(--martinique);

    font-size: 3.2rem;

    font-weight: bold;

    filter: drop-shadow(0.1rem 0.25rem 0.1rem rgba(0, 0, 0, 0.5));

  }



  .ratings_wrap .card-rating {

    margin: 10px 0;

    display: inline-block;

    width: 100%;

    height: 100%;

    border-right: 1px solid #eee;

  }



  .ratings_wrap .ratings {

    display: inline-block;

  }



  .ratings_wrap .ratings img {

    width: 3.2rem;

    height: 3.2rem;

  }



  .ratings_wrap .card-rating-text {

    font-size: 50px;

    color: #323357;

    font-weight: 400;

    line-height: normal;

  }



  .ratings_wrap .card-rating-text .fa-star {

    font-size: 19px;

    color: #169293;

  }



  .ratings_wrap .rating-count {

    font-size: 14px;

    font-weight: 400;

    color: #595b71;

  }



  .ratings_wrap .rating-percents {

    margin-top: 0;

    display: flex;

    flex-direction: column;

    grid-row-gap: 8px;

  }



  .ratings_wrap .rating-percent {

    display: flex;

    justify-content: space-around;

  }



  .ratings_wrap .rating-no {

    font-size: 13px;

    font-weight: 400;

    color: #c8c8c8;

    line-height: normal;

  }



  .ratings_wrap .rating-progress {

    margin: 5px 0;

    background-color: #f5f8ff;

    border-radius: 1.8rem;

    width: 10rem;

    height: 6px;

    position: relative;

  }



  .ratings_wrap .rating-progress::before {

    position: absolute;

    content: '';

    top: 0;

    left: 0;

    height: 100%;

    background-color: #fccc4d;

    border-radius: 1.8rem;

  }



  .ratings_wrap .rating-percent:nth-child(1) .rating-progress::before {

    width: 84%;

  }



  .ratings_wrap .rating-percent:nth-child(2) .rating-progress::before {

    width: calc(2* 9%);

  }



  .ratings_wrap .rating-percent:nth-child(3) .rating-progress::before {

    width: calc(2* 4%);

  }



  .ratings_wrap .rating-percent:nth-child(4) .rating-progress::before {

    width: calc(2* 2%);

  }



  .ratings_wrap .rating-percent:nth-child(5) .rating-progress::before {

    width: calc(2* 1%);

  }



  .ratings_wrap .rating-percent-no {

    font-size: 13px;

    color: #222;

    font-weight: 400;

    line-height: normal;

  }



  .sizelink {

    font-size: 12px !important;

    font-weight: 400 !important;

    text-transform: capitalize;

  }



  .ratings_wrap .rating-percent:nth-child(1) .rating-progress::before {

    width: {
        {
        $calculatedRatings['percentage5Star']
      }
    }



  }



  .ratings_wrap .rating-percent:nth-child(2) .rating-progress::before {

    width: {
        {
        $calculatedRatings['percentage4Star']
      }
    }


  }



  .ratings_wrap .rating-percent:nth-child(3) .rating-progress::before {

    width: {
        {
        $calculatedRatings['percentage3Star']
      }
    }



  }



  .ratings_wrap .rating-percent:nth-child(4) .rating-progress::before {

    width: {
        {
        $calculatedRatings['percentage2Star']
      }
    }


  }



  .ratings_wrap .rating-percent:nth-child(5) .rating-progress::before {

    width: {
        {
        $calculatedRatings['percentage1Star']
      }
    }


  }
</style>


@endsection