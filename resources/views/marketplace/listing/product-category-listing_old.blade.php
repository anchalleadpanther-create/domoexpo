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
   <div class="ps-home-promotions ps-pt-60">
      @if(!empty($category->banner) && !empty($category->second_banner))
      <div class="ps-home-promotions ps-pt-60">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <img src="{{ asset('/uploads/category/'.$category->banner) }}" alt=""
                     style="width:100%;height:200px" />

               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <img src="{{ asset('/uploads/category/'.$category->second_banner) }}" alt=""
                     style="width:100%;height:200px" />

               </div>
            </div>
         </div>
      </div>
      @endif
   </div>
   <div class="ps-page--shop ps-product-list ps-pt-60" id="shop-sidebar">
      <div class="container">
         <div class="ps-section__header ps-section__headerText p-0 bg-white border-0">
            <div class="ps-block--countdown-deal">
               <div class="ps-block__left">
                  <h3 class="mb-0">
                     Product Search : {{$category->category_name}}
                     {{-- <small>- 0 Result Found</small> --}}
                  </h3>
               </div>
            </div>
            <div class="ps-shopping__view">
               <ul class="ps-tab-list">
                  <li class="{{ request()->segment(3)=== 'product' ? 'active' : '' }}"><a href="#tab-1">Products</a>
                  </li>
                  <li class="{{ request()->segment(3)=== 'supplier' ? 'active' : '' }}"><a href="#tab-3">Suppliers</a>
                  </li>
                  
                  {{-- <li class=""><a href="#tab-2">Services</a></li> --}}

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
                        <li class="menu-item-has-children active" style="z-index: 1;"><a
                              href="{{ route('customer.product-category',[ !empty($category->parent->category_slug) ? $category->parent->category_slug : $category->category_slug ,'product'])  }}">
                              {{ !empty($category->parent->category_name) ? $category->parent->category_name :
                              $category->category_name }}</a>
                           <span class="sub-toggle active"><i class="fa fa-angle-down"></i></span>
                           <ul class="sub-menu d-block">
                              <li class="menu-item-has-children"><a
                                    href="{{ route('customer.product-category',[$category->category_slug,'product']) }}">{{$category->category_name}}</a>

                                 @if($category->children !== null && count($category->children) > 0)

                                 <span class="sub-toggle active"><i class="fa fa-angle-down"></i></span>
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

                 
                  <!-- Quality Safety Certificates -->
                    <figure class="ps-custom-scrollbar product-filter-element {{ request()->segment(3) !== 'product' ? 'd-none' : '' }}" data-height="250">
                        <h4 class="widget-title">Quality Safety Certificates</h4>
                        @if(!empty($filters['product_filters']['quality_safety_certificates']))
                            @foreach ($filters['product_filters']['quality_safety_certificates'] as $item)
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="quality_safety_certificates{{ $item }}"
                                           value="{{ $item }}" name="filter_by_quality_safety_certificates[]" />
                                    <label for="quality_safety_certificates{{ $item }}" style="z-index:1">
                                        <span>{{ $item }}</span>
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </figure>
                    
                    <!-- Health Hygiene Certificates -->
                    <figure class="ps-custom-scrollbar product-filter-element {{ request()->segment(3) !== 'product' ? 'd-none' : '' }}" data-height="250">
                        <h4 class="widget-title">Health Hygiene Certificates</h4>
                        @if(!empty($filters['product_filters']['health_hygiene_certificates']))
                            @foreach ($filters['product_filters']['health_hygiene_certificates'] as $item)
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="health_hygiene_certificates{{ $item }}"
                                           value="{{ $item }}" name="filter_by_health_hygiene_certificates[]" />
                                    <label for="health_hygiene_certificates{{ $item }}" style="z-index:1">
                                        <span>{{ $item }}</span>
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </figure>
                    
                    <!-- Environmental Certificates -->
                    <figure class="ps-custom-scrollbar product-filter-element {{ request()->segment(3) !== 'product' ? 'd-none' : '' }}" data-height="250">
                        <h4 class="widget-title">Environmental Certificates</h4>
                        @if(!empty($filters['product_filters']['environmental_certificates']))
                            @foreach ($filters['product_filters']['environmental_certificates'] as $item)
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="environmental_certificates{{ $item }}"
                                           value="{{ $item }}" name="filter_by_environmental_certificates[]" />
                                    <label for="environmental_certificates{{ $item }}" style="z-index:1">
                                        <span>{{ $item }}</span>
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </figure>
                    
                    <!-- Brands -->
                    <figure class="ps-custom-scrollbar product-filter-element {{ request()->segment(3) !== 'product' ? 'd-none' : '' }}" data-height="250">
                        <h4 class="widget-title">BRANDS</h4>
                        @if(!empty($filters['product_filters']['brands']))
                            @foreach ($filters['product_filters']['brands'] as $item)
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="brand{{ $item->id }}"
                                           value="{{ $item->brand_slug }}" name="filter_brands[]" />
                                    <label for="brand{{ $item->id }}" style="z-index:1">{{ $item->brand_name }}</label>
                                </div>
                            @endforeach
                        @endif
                    </figure>
                    
                    <!-- Country -->
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
                  <div class="ps-shopping__header d-flex justify-content-end">

                     <div class="ps-shopping__actions ">
                        <select class="ps-select w-100" data-placeholder="Sort Items" name="sortBy">
                           <option value="">Sort by</option>
                           <option value="created_at-desc">Latest Product</option>
                           <option value="view_count-desc">Popularity</option>
                           <option value="price_unit-asc">Average rating</option>
                           <option value="price_unit-asc">Price: low to high</option>
                           <option value="discount-desc">Price: high to low</option>
                        </select>
                     </div>
                  </div>
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



@if (count($compareProducts) > 0)
<div class="supplier_modal--Section">
   <div class="container">
      <div class="row">
         @foreach ($compareProducts as $item)
         <div class="col-sm-3">
            <div class="card">
               <div class="card-body">

                  <h5 class="mb-2">{{ $item->name }}</h5>
                  <h5 class="mb-2">{{ $item->seller?->biz_company }}</h5>
                  <p>{{ $item->seller?->officeState?->name }},{{ $item->seller->officeCountry?->name }} </p>
                  <div class="form-group mb-0 mt-5">
                     <a class="ps-btn blue-bg" href="{{ route('customer.supplier-detail',[$item->seller_id]) }}">View
                        Supplier Details</a>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         {{-- <div class="col-sm-3">
            <div class="card">
               <div class="card-body">
                  <h5 class="mb-2">Star Electronic Technology Co. Ltd.</h5>
                  <p>Dubai, United Arab Emirates </p>
                  <div class="form-group mb-0 mt-5">
                     <a class="ps-btn blue-bg" href="#">View Supplier Details</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-3">
            <div class="card">
               <div class="card-body">
                  <h5 class="mb-2">Star Electronic Technology Co. Ltd.</h5>
                  <p>Dubai, United Arab Emirates </p>
                  <div class="form-group mb-0 mt-5">
                     <a class="ps-btn blue-bg" href="#">View Supplier Details</a>
                  </div>
               </div>
            </div>
         </div> --}}

         <div class="col-sm-2">
            <div class="form-group mb-0 mt-5">
               {{-- @auth('buyer')
               <a href="{{url('/')}}/rfq" class="ps-btn w-100 text-center">GET QUOTE</a>
               @endauth --}}
               {{-- @guest('buyer')
               <a href="{{route('buyer.login')}}" class="ps-btn w-100 text-center">GET QUOTE</a>
               @endguest --}}
               <a href="{{route('customer.product.compare')}}" target="_blank"
                  class="ps-btn w-100 text-center">COMPARE</a>
               <br><br>

               <a href="{{route('customer.remove.compare')}}" class="ps-btn w-100 ps-btn-white text-center">RESET</a>
            </div>
         </div>
      </div>
   </div>

</div>
@endif


@if (count($compareSuppliers) > 0)
<div class="supplier_modal--Section">
   <div class="container">
      <div class="row">
         @foreach ($compareSuppliers as $item)
         <div class="col-sm-3">
            <div class="card">
               <div class="card-body text-center">

                  
                  <h4 class="mb-2">{{ $item->seller?->biz_company }}</h4>
                  <p>{{ $item->seller?->officeState?->name }},{{ $item->seller->officeCountry?->name }} </p>
                  @if(isset($item->seller))
                      @if($item->seller->is_verified == 1)
                        <div class="text-center">
                            <img src="{{ asset('allUsers/frontend/img/icons/verified-icon.png')}}" width="100"  />
                        </div>
                      @endif
                  @endif
                  <div class="form-group mb-0 mt-5">
                     <a class="ps-btn blue-bg" href="{{ route('customer.supplier-detail',[$item->seller_id]) }}">View
                        Supplier Details</a>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         {{-- <div class="col-sm-3">
            <div class="card">
               <div class="card-body">
                  <h5 class="mb-2">Star Electronic Technology Co. Ltd.</h5>
                  <p>Dubai, United Arab Emirates </p>
                  <div class="form-group mb-0 mt-5">
                     <a class="ps-btn blue-bg" href="#">View Supplier Details</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-3">
            <div class="card">
               <div class="card-body">
                  <h5 class="mb-2">Star Electronic Technology Co. Ltd.</h5>
                  <p>Dubai, United Arab Emirates </p>
                  <div class="form-group mb-0 mt-5">
                     <a class="ps-btn blue-bg" href="#">View Supplier Details</a>
                  </div>
               </div>
            </div>
         </div> --}}

         <div class="col-sm-2">
            <div class="form-group mb-0 mt-5">
               {{-- @auth('buyer')
               <a href="{{url('/')}}/rfq" class="ps-btn w-100 text-center">GET QUOTE</a>
               @endauth --}}
               {{-- @guest('buyer')
               <a href="{{route('buyer.login')}}" class="ps-btn w-100 text-center">GET QUOTE</a>
               @endguest --}}
               <a href="{{route('customer.supplier.compare')}}" target="_blank"
                  class="ps-btn w-100 text-center">COMPARE</a>
               <br><br>

               <a href="{{route('customer.remove.compare')}}" class="ps-btn w-100 ps-btn-white text-center">RESET</a>
            </div>
         </div>
      </div>
   </div>

</div>
@endif



<div class="modal fade show" id="requestForSampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Request For Sample</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{ route('buyer.ask-for-sample')}}" class="customer-form" method="get">
            @csrf
            <input type="hidden" class="form-control" name="product_id" id="product_id_for_sample_request" value="" >
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="row">
                         
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Select Delivery Address <span class="required">*</span></label>
                              <select class="form-select" name="buyer_address" >
                                  <option value=""></option>
                                  @if(Auth::guard('buyer')->check())
                                  @foreach(Auth::guard('buyer')->user()->addresses as $value)
                                    <option value="{{$value->address_one}},{{$value->myCountry->name}},{{$value->myState->name}},{{$value->myCity->name}},{{$value->post_name}}" selected>
                                      {{$value->address_one}},{{$value->myCountry->name}},{{$value->myState->name}},{{$value->myCity->name}},{{$value->post_code}}
                                    </option>
                                  @endforeach
                                  @endif
                              </select>
                           </div>
                        </div>
                        
                        
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-success">submit</button>
            </div>
         </form>
      </div>
   </div>
</div>





<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Address</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{route('buyer.address.store')}}" class="customer-form new-address-form" method="post">
            @csrf
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="firstName">First Name <span class="required">*</span></label>
                              <input type="text" class="form-control" name="first_name" maxlength="50" id="firstName" value="{{ Auth::guard('buyer')->user()->first_name ?? '' }}" required="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="lastName">Last Name <span class="required">*</span></label>
                              <input type="text" class="form-control" name="last_name" maxlength="50" id="lastName" value="{{ Auth::guard('buyer')->user()->last_name ?? '' }}" required="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="customerEmail">Email <span class="required">*</span></label>
                              <input type="email" class="form-control"  name="address_email" maxlength="100" id="customerEmail" value="{{ Auth::guard('buyer')->user()->email ?? '' }}" required="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="customerMobile">Phone <span class="required">*</span></label>
                              <input type="number" class="form-control"  min="0" name="address_mobile" pattern="[0-9]{10}" id="customerMobile" value="{{ Auth::guard('buyer')->user()->phone ?? '' }}" required="">
                           </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                           <div class="form-group">
                              <label for="customerAddress">Address <span class="required">*</span></label>
                              <input type="text" class="form-control" name="address_one" maxlength="100" id="customerAddress" value="" required="">
                           </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                           <div class="form-group">
                              <label for="customerPostcode">Postcode <span class="required">*</span></label>
                              <input type="text" class="form-control" min="1" maxlength="20" name="post_code" id="customerPostcode" value="" required="">
                           </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                           <div class="form-group">
                              <label>Country <span class="required">*</span></label>
                              <select class="form-control countries" name="country" onchange="getStates(this)" data-class=".states" >
                                 <option value="">Select</option>
                                 @foreach(getCountries() as $country)
                                 <option value="{{$country->id}}">{{$country->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State <span class="required">*</span></label>
                              <select class="form-select states" name="state" onchange="getCities(this)" data-class=".cities" >
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>City <span class="required">*</span></label>
                              <select class="form-select cities" name="city" >
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12 my-3">
                           <div class="row">
                              <div class="col">
                                 <div class="form-check">
                                    <input type="radio" name="address_type" id="addressRadio1" value="Home address" checked="">
                                    <label class="form-check-label" for="addressRadio1">
                                    Home Address
                                    </label>
                                 </div>
                              </div>
                              <div class="col">
                                 <div class="form-check">
                                    <input  type="radio" name="address_type" id="addressRadio2" value="Office address">
                                    <label class="form-check-label" for="addressRadio2">
                                    Office Address
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-success">submit</button>
            </div>
         </form>
      </div>
   </div>
</div>



{{-- <div id="loader" class="position-fixed top-50 start-50 translate-middle">
   <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
   </div>
</div> --}}

<script>
  // Ensure the DOM is fully loaded before triggering the modal
//   document.addEventListener('DOMContentLoaded', function () {
//     $('#requestForSampleModal').modal('show');
//   });
  
  function product_id_for_sample_request(product_id){
      $('#product_id_for_sample_request').val(product_id);
    //   $('#delivery_address_id_for_sample_request').val(delivery_address_id);
  }
</script>

<!-- ------------- -->
<script type="module" src="{{ asset('purchasync/custom-js/listing.js') }}"></script>
<script type="module" src="{{ asset('purchasync/custom-js/comparison.js') }}"></script>
<script src="{{ asset('allUsers/axios.js') }}"></script>

<script type="module" src="{{asset('allUsers/customer/new-address.js')}}"></script>
<script type="text/javascript" src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>
@endsection