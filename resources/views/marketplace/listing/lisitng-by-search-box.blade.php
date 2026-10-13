@extends('purchasync.partials.header')
@section('customerContent')
<style>
   .ps-shopping-product {
      min-height: auto;
   }

   .pagination li>span {
      padding: 0 14px;
      position: relative;
      display: inline-block;
      z-index: 30;
      color: #999;
      line-height: 32px;
      border: none;
      background-color: #f5f5f5;
      color: #000;
      vertical-align: middle;
      font-size: 14px;
   }
</style>
<!-- -------------------------- -->
<div class="buyer_page">
   <!--<div class="ps-home-promotions ps-pt-60">-->
   <!--   <div class="container">-->
   <!--      <div class="row">-->
   <!--         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">-->
   <!--            <img src="{{ asset('allUsers/frontend/img/home/home-photo/promotion-img1.png') }}" alt=""-->
   <!--               style="width: 100%" />-->
   <!--            <div class="ps-promotion-content">-->
   <!--               <h4 class="pink-text">Get up to 15% off</h4>-->
   <!--               <h3 class="text-white text-uppercase">Restaurant Equipment</h3>-->
   <!--               <a href="" class="ps-btn ps-btn--sm pink-btn">Get Offer</a>-->
   <!--            </div>-->
   <!--         </div>-->
   <!--         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">-->
   <!--            <img src="{{ asset('allUsers/frontend/img/home/home-photo/promotion-img2.png') }}" alt=""-->
   <!--               style="width: 100%" />-->
   <!--            <div class="ps-promotion-content">-->
   <!--               <h4 class="pink-text">Get up to 15% off</h4>-->
   <!--               <h3 class="text-white text-uppercase">Hotels Equipment</h3>-->
   <!--               <a href="" class="ps-btn ps-btn--sm pink-btn">Get Offer</a>-->
   <!--            </div>-->
   <!--         </div>-->
   <!--      </div>-->
   <!--   </div>-->
   <!--</div>-->
   <div class="ps-page--shop ps-product-list ps-pt-60" id="shop-sidebar">
      <div class="container">
         <div class="ps-section__header ps-section__headerText p-0 bg-white border-0">
            <div class="ps-block--countdown-deal">
               <div class="ps-block__left">
                  <h3 class="mb-0">
                     <!--Product Search: Hotel Restaurant Furniture-->
                     {{-- <small>- 0 Result Found</small> --}}
                  </h3>
               </div>
            </div>
            <div class="ps-shopping__view">
               <ul class="ps-tab-list">
                  <li
                     class="{{ request()->query('pagetype') === 'supplier' || empty(request()->query('pagetype')) ? 'active' : '' }}">
                     <a href="#tab-3">Suppliers</a>
                  </li>
                  <li class="{{ request()->query('pagetype') === 'product'}}">
                     <a href="#tab-1">Products</a>
                  </li>
                  <li class="{{ request()->query('pagetype') === 'service' ? 'active' : '' }}"><a
                        href="#tab-2">Services</a>
                  </li>

               </ul>
            </div>
         </div>
         <div class="ps-layout--shop">

            {{-- Left Filter Layout --}}
            <div class="ps-layout__left">
               <aside class="widget widget_shop">


                  <figure class="ps-custom-scrollbar product-filter-element {{ request()->segment(3) !== 'product' ? 'd-none' : '' }}" data-height="250">
                     <h4 class="widget-title">Quality Safety Certificates</h4>
                     {{-- @if(!count($filters['quality_safety_certificates']) > 0) --}}
                     @foreach ($filters['product_filters']['quality_safety_certificates'] as $item)
                     <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="quality_safety_certificates{{ $item  }}"
                           value="{{ $item }}" name="filter_by_quality_safety_certificates[]" />
                        <label for="quality_safety_certificates{{ $item  }}"  style="z-index:1"><span>{{ $item }}</span></label>
                     </div>
                     @endforeach
                     {{-- @endif --}}
                  </figure>
                  
                  <figure class="ps-custom-scrollbar product-filter-element {{ request()->segment(3) !== 'product' ? 'd-none' : '' }}" data-height="250">
                     <h4 class="widget-title">Health Hygiene Certificates</h4>
                     {{-- @if(!count($filters['quality_safety_certificates']) > 0) --}}
                     @foreach ($filters['product_filters']['health_hygiene_certificates'] as $item)
                     <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="health_hygiene_certificates{{ $item }}"
                           value="{{ $item }}" name="filter_by_health_hygiene_certificates[]" />
                        <label for="health_hygiene_certificates{{ $item  }}"  style="z-index:1"><span>{{ $item }}</span></label>
                     </div>
                     @endforeach
                     {{-- @endif --}}
                  </figure>
                  
                  <figure class="ps-custom-scrollbar product-filter-element {{ request()->segment(3) !== 'product' ? 'd-none' : '' }}" data-height="250">
                     <h4 class="widget-title">Environmental Certificates</h4>
                     {{-- @if(!count($filters['quality_safety_certificates']) > 0) --}}
                     @foreach ($filters['product_filters']['environmental_certificates'] as $item)
                     <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="environmental_certificates{{ $item }}"
                           value="{{ $item }}" name="filter_by_environmental_certificates[]" />
                        <label for="environmental_certificates{{ $item  }}"  style="z-index:1"><span>{{ $item }}</span></label>
                     </div>
                     @endforeach
                     {{-- @endif --}}
                  </figure>
                  
                 {{-- <figure class="ps-custom-scrollbar product-filter-element {{ request()->segment(3) !== 'product' ? 'd-none' : 'd-none' }}" data-height="250">
                     <h4 class="widget-title">Color</h4>
                      @if(!count($filters['product_filters']['colors']) > 0) 
                     @foreach ($filters['product_filters']['colors'] as $item)
                     <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="color{{ $item->id  }}"
                           value="{{ $item->type_value }}" name="filter_by_color[]" />
                        <label for="color{{ $item->id  }}"  style="z-index:1"><span>{{ $item->type_value }}</span></label>
                     </div>
                     @endforeach
                      @endif
                  </figure> --}}
                  
                  <figure class="ps-custom-scrollbar product-filter-element {{ request()->segment(3) !== 'product' ? 'd-none' : '' }}" data-height="250">
                     <h4 class="widget-title">BRANDS</h4>
                     {{-- @if(!count($filters['brands']) > 0) --}}
                     @foreach ($filters['product_filters']['brands'] as $item)
                     <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="brand{{ $item->id }}"
                           value="{{ $item->brand_slug }}" name="filter_brands[]" />
                        <label for="brand{{ $item->id }}"  style="z-index:1">{{ $item->brand_name }}</label>
                     </div>
                     @endforeach
                     {{-- @endif --}}
                  </figure>
                  
                  <figure class="ps-custom-scrollbar product-filter-element {{ request()->segment(3) !== 'product' ? 'd-none' : '' }}" data-height="250">
                    <h4 class="widget-title">Country</h4>
                    @if(!empty($filters['product_filters']['country_of_origin']))
                        @foreach ($filters['product_filters']['country_of_origin'] as $item)
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="country{{ $item['id'] ?? '' }}"
                                       value="{{ $item['name'] ?? '' }}" name="filter_by_country_of_origin[]" />
                                <label for="country{{ $item['id'] ?? '' }}" style="z-index:1">
                                    <span>{{ $item['name'] ?? '' }}</span>
                                </label>
                            </div>
                        @endforeach
                    @endif
                  </figure>


                  <!--Seller Filter start here -->
                  
                   <figure class="ps-custom-scrollbar seller-filter-element {{ request()->segment(3) !== 'supplier' ? '' : '' }}" data-height="250">
                    <h4 class="widget-title">Business Type</h4>
                    @if(!empty($filters['seller_filters']['suppllier_described_seller']))
                        @foreach ($filters['seller_filters']['suppllier_described_seller'] as $item)
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="business_type{{ $item->id  ?? '' }}"
                                       value="{{ $item->dropdown_value  ?? '' }}" name="suppllier_described_seller[]" />
                                <label for="business_type{{ $item->id  ?? '' }}" style="z-index:1">
                                    <span>{{ $item->dropdown_value ?? '' }}</span>
                                </label>
                            </div>
                        @endforeach
                    @endif
                  </figure>
                  
                   <figure class="ps-custom-scrollbar seller-filter-element {{ request()->segment(3) !== 'supplier' ? '' : '' }}" data-height="250">
                     <h4 class="widget-title">Quality Certificates</h4>
                     {{-- @if(!count($filters['colors']) > 0) --}}
                     @foreach ($filters['seller_filters']['quality_certificates'] as $item)
                     <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="quality_certificates{{ $item->id  }}"
                           value="{{ $item->id }}" name="filter_by_quality_certificates[]" />
                        <label for="quality_certificates{{ $item->id  }}"  style="z-index:1"><span>{{ $item->dropdown_value
                              }}</span></label>
                     </div>
                     @endforeach
                     {{-- @endif --}}
                  </figure>

                   <figure class="ps-custom-scrollbar seller-filter-element {{ request()->segment(3) !== 'supplier' ? '' : '' }}" data-height="250">
                     <h4 class="widget-title">Sustainability Certificates</h4>
                     {{-- @if(!count($filters['colors']) > 0) --}}
                     @foreach ($filters['seller_filters']['sustainability_certificates'] as $item)
                     <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="sustainability_certificates{{ $item->id  }}"
                           value="{{ $item->id }}" name="filter_by_sustainability_certificates[]" />
                        <label for="sustainability_certificates{{ $item->id  }}"  style="z-index:1"><span>{{ $item->dropdown_value
                              }}</span></label>
                     </div>
                     @endforeach
                     {{-- @endif --}}
                  </figure>

                   <figure class="ps-custom-scrollbar seller-filter-element  {{ request()->segment(3) !== 'supplier' ? '' : '' }}" data-height="250">
                     <h4 class="widget-title">Other Certificates </h4>
                     {{-- @if(!count($filters['colors']) > 0) --}}
                     @foreach ($filters['seller_filters']['other_certificates'] as $item)
                     <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="other_certificates{{ $item->id  }}"
                           value="{{ $item->id }}" name="filter_by_other_certificates[]" />
                        <label for="other_certificates{{ $item->id  }}"  style="z-index:1"><span>{{ $item->dropdown_value
                              }}</span></label>
                     </div>
                     @endforeach
                     {{-- @endif --}}
                  </figure>
                  
                   <figure class="ps-custom-scrollbar seller-filter-element {{ request()->segment(3) !== 'supplier' ? '' : '' }}" data-height="250">
                    <h4 class="widget-title">Country</h4>
                    @if(!empty($filters['seller_filters']['seller_office_country']))
                        @foreach ($filters['seller_filters']['seller_office_country'] as $item)
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="sellercountry{{ $item['id'] ?? '' }}"
                                       value="{{ $item['name'] ?? '' }}" name="filter_by_seller_office_country[]" />
                                <label for="sellercountry{{ $item['id'] ?? '' }}" style="z-index:1">
                                    <span>{{ $item['name'] ?? '' }}</span>
                                </label>
                            </div>
                        @endforeach
                    @endif
                   </figure>
                  

               </aside>
            </div>
            {{--End of Left Filter Layout --}}


            <div class="ps-layout__right">
               <div class="ps-shopping ps-tab-root">

                  <div class="ps-tabs">

                     <!-- Suppliers Tab -->
                     <div
                        class="ps-tab supplier-listings {{ request()->query('pagetype') === 'supplier' || empty(request()->query('pagetype')) ? 'active' : '' }}"
                        id="tab-3">
                        @if(request()->query('pagetype') === 'supplier')
                        @include('purchasync.listing.card.supplier-listing')
                        @endif
                     </div>


                     <!-- products Tab -->
                     <div
                        class="ps-tab product-listings {{ request()->query('pagetype') === 'product' ? 'active' : '' }}"
                        id="tab-1">

                        @if(request()->query('pagetype') === 'product')
                        @include('purchasync.listing.card.product-listing')
                        @endif
                     </div>

                     <!-- Services Tab -->
                     <div
                        class="ps-tab service-listings {{ request()->query('pagetype') === 'service' ? 'active' : '' }}"
                        id="tab-2">
                        @if(request()->query('pagetype') === 'service')
                        @include('purchasync.listing.card.supplier-service-listing')
                        @endif
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="ps-site-features ps-featuress-section">
      <div class="container">
         <div class="ps-block--site-features ps-block--site-features-2">
            <div class="ps-block__item">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img1.png') }}" />
               <h4 class="mb-2">REQUEST FOR QUOTATION</h4>
               <p class="mb-0">we’ve made it easy for you</p>
            </div>
            <div class="ps-block__item">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img2.png') }}" />
               <h4 class="mb-2">FEEDBACK</h4>
               <p class="mb-0">Opinions, Inquiries welcome</p>
            </div>
            <div class="ps-block__item">
               <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img3.png') }}" />
               <h4 class="mb-2">GET IN TOUCH</h4>
               <p class="mb-0">+971 507482498</p>
            </div>
            <!--<div class="ps-block__item">-->
            <!--   <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img4.png') }}" />-->
            <!--   <h4 class="mb-2">DROP AN EMAIL</h4>-->
            <!--   <p class="mb-0">enquiry@fnb2b.com</p>-->
            <!--</div>-->
         </div>
      </div>
   </div>
</div>


{{-- <div id="loader" class="position-fixed top-50 start-50 translate-middle">
   <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
   </div>
</div> --}}


<!-- ------------- -->
<script type="module" src="{{ asset('purchasync/custom-js/listing-by-serach.js') }}"></script>
<script src="{{ asset('allUsers/axios.js') }}"></script>
@endsection