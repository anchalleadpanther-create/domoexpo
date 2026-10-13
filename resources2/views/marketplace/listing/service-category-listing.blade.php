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
   @if(!empty($category->banner) && !empty($category->second_banner))
   <div class="ps-home-promotions ps-pt-60">
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
               <img src="{{ asset('/uploads/category/'.$category->banner) }}" alt="" style="width:100%;height:200px" />

            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
               <img src="{{ asset('/uploads/category/'.$category->second_banner) }}" alt=""
                  style="width:100%;height:200px" />
            </div>
         </div>
      </div>
   </div>
   @endif
   <div class="ps-page--shop ps-product-list ps-pt-60" id="shop-sidebar">
      <div class="container">
         <div class="ps-section__header ps-section__headerText p-0 bg-white border-0">
            <div class="ps-block--countdown-deal">
               <div class="ps-block__left">
                  <h3 class="mb-0">
                     Service Search : {{ $category->category_name }}
                     {{-- <small>- 1 Result Found</small> --}}
                  </h3>
               </div>
            </div>
            <div class="ps-shopping__view">
               <ul class="ps-tab-list">
                  {{-- <li class="active"><a href="#tab-1">Products</a></li> --}}
                  {{-- <li class=""><a href="#tab-2">Services</a></li>
                  <li><a href="#tab-3">Suppliers</a></li> --}}

                  {{-- <li class="{{ request()->segment(3)=== 'product' ? 'active' : '' }}"><a
                        href="#tab-1">Products</a>
                  </li> --}}
                  <li class="{{ request()->segment(3)=== 'service' ? 'active' : '' }}"><a href="#tab-2">Services</a>
                  </li>
                  <li class="{{ request()->segment(3)=== 'supplier' ? 'active' : '' }}"><a href="#tab-3">Suppliers</a>
                  </li>
                  

               </ul>
            </div>
         </div>
         <div class="ps-layout--shop">

            {{-- Left Filter Layout --}}
            <div class="ps-layout__left">
               <aside class="widget widget_shop">
                  <figure class="mt-0 pt-0">
                     <h4 class="widget-title">Categories</h4>
                     <ul class="ps-list--categories">
                        <li class="menu-item-has-children"> <a
                              href="{{ route('customer.product-category',[ !empty($category->parent->category_slug) ? $category->parent->category_slug : $category->category_slug ,'product'])  }}">
                              {{ !empty($category->parent->category_name) ? $category->parent->category_name :
                              $category->category_name }}</a>
                           <span class="sub-toggle active"><i class="fa fa-angle-down"></i></span>
                           <ul class="sub-menu d-block">
                              <li class="menu-item-has-children"><a
                                    href="{{ route('customer.product-category',[$category->category_slug,'product']) }}">{{$category->category_name}}</a>

                                 @if($category->children !== null && count($category->children) > 0)

                                 <span class="sub-toggle active "><i class="fa fa-angle-down"></i></span>
                                 <ul class="sub-menu d-block">
                                    @foreach ($category->children as $subchildren)
                                    <li><a
                                          href="{{ route('customer.product-category',[$subchildren->category_slug,'product']) }}">{{
                                          $subchildren->category_name }}</a></li>
                                    @endforeach
                                 </ul>
                                 @endif

                              </li>
                           </ul>
                        </li>
                     </ul>
                  </figure>
                  
                  
                  
                  <!--Seller Filter start here -->
                  
                   <figure class="ps-custom-scrollbar seller-filter-element {{ request()->segment(3) !== 'supplier' ? 'd-none' : '' }}" data-height="250">
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
                  
                  <figure class="ps-custom-scrollbar seller-filter-element {{ request()->segment(3) !== 'supplier' ? 'd-none' : '' }}" data-height="250">
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

                    
                  <figure class="ps-custom-scrollbar seller-filter-element {{ request()->segment(3) !== 'supplier' ? 'd-none' : '' }}" data-height="250">
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


                  <figure class="ps-custom-scrollbar seller-filter-element  {{ request()->segment(3) !== 'supplier' ? 'd-none' : '' }}" data-height="250">
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
                  
                  <figure class="ps-custom-scrollbar seller-filter-element {{ request()->segment(3) !== 'supplier' ? 'd-none' : '' }}" data-height="250">
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
                     <!-- products Tab -->
                     <div class="ps-tab product-listings {{ request()->segment(3)=== 'product' ? 'active' : '' }}"
                        id="tab-1">
                        @if(request()->segment(3) === 'product')
                        @include('purchasync.listing.card.product-listing')
                        @endif
                     </div>

                     <!-- Services Tab -->
                     <div class="ps-tab service-listings {{ request()->segment(3) === 'service' ? 'active' : '' }}"
                        id="tab-2">
                        @if(request()->segment(3) === 'service')
                        @include('purchasync.listing.card.supplier-service-listing')
                        @endif
                     </div>

                     <!-- Suppliers Tab -->
                     <div class="ps-tab supplier-listings {{ request()->segment(3) === 'supplier' ? 'active' : '' }}"
                        id="tab-3">
                        @if(request()->segment(3) === 'supplier')
                        @include('purchasync.listing.card.supplier-listing')
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
                <div class="ps-block__item">
                   <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img4.png') }}" />
                   <h4 class="mb-2">DROP AN EMAIL</h4>
                   <p class="mb-0">enquiry@fnb2b.com</p>
                </div>
             </div>
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
<script type="module" src="{{ asset('purchasync/custom-js/supplier-listing.js') }}"></script>
<script src="{{ asset('allUsers/axios.js') }}"></script>
@endsection