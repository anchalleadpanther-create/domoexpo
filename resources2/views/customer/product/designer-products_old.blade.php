@extends('customer.partials.header')
@section('customerContent')
  @isset($brand->meta_title)
    @section('title', $brand->meta_title)
  @endisset
  @isset($brand->meta_description)
    @section('description', $brand->meta_description)
  @endisset
  @isset($brand->meta_keywords)
    @section('keywords', $brand->meta_keywords)
  @endisset
  <!--Body Container-->
  <div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
      <div class="collection-hero">
        <div class="collection-hero__image"></div>
        <div class="collection-hero__title-wrapper container">
          <div class="breadcrumbs text-uppercase mt-1 mt-lg-2">

            <a href="{{ route('customer.designer-products', $brand->brand_slug) }}">
              <span class="fw-bold">{{ $brand->brand_name }}</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--End Collection Banner-->
    <div class="container">
      <div class="row"> 
        <!--Sidebar-->
        @include('customer.product.designer-filters')
        <!--End Sidebar-->

        <!--Main Content-->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">

          <!--Active Filters-->
          <ul class="active-filters d-flex flex-wrap align-items-center m-0 list-unstyled d-none">
            <li><a href="#">Clear all</a></li>
            <li><a href="#">Men <i class="an an-times-l"></i></a></li>
            <li><a href="#">Neckalses <i class="an an-times-l"></i></a></li>
            <li><a href="#">Accessories <i class="an an-times-l"></i></a></li>
          </ul>
          <!--End Active Filters-->
          <!--Toolbar-->
          <div class="toolbar">
            <div class="filters-toolbar-wrapper">
              <ul class="list-unstyled d-flex align-items-center">
                <li class="product-count d-flex align-items-center">
                  <button type="button" class="btn btn-filter an an-slider-3 d-inline-flex d-lg-none me-2 me-sm-3"><span
                      class="hidden">Filter</span></button>
                  <div class="filters-toolbar__item mx-5">
                    <span class="filters-toolbar__product-count products-count">
                      <span class="shimming-loader designer-loader">
                      </span>
                      {{-- Showing: 100 Products --}}
                    </span>
                  </div>
                </li>
                <li class="collection-view ms-sm-auto">
                  <div class="filters-toolbar__item collection-view-as d-flex align-items-center me-3">
                    <a href="javascript:void(0)" class="change-view prd-grid change-view--active"><i class="icon an an-th"
                        aria-hidden="true"></i><span class="tooltip-label">Grid
                        View</span></a>
                    <a href="javascript:void(0)" class="change-view prd-list"><i class="icon an an-th-list"
                        aria-hidden="true"></i><span class="tooltip-label">List View</span></a>
                  </div>
                </li>
                <li class="filters-sort ms-auto ms-sm-0">
                  <div class="filters-toolbar__item">
                    <label for="SortBy" class="hidden">Sort by:</label>
                    <select name="SortBy" id="SortBy"
                      class="filters-toolbar__input filters-toolbar__input--sort filter-onchange-selector sort-type">
                      <option value="">Sort By</option>
                      <option value="name-asc">Alphabetically, A-Z</option>
                      <option value="name-desc">Alphabetically, Z-A</option>
                      <option value="price_unit-asc">Price, low to high</option>
                      <option value="price_unit-desc">Price, high to low</option>
                      <option value="created_at-asc">Date, old to new</option>
                      <option value="created_at-desc">Date, new to old</option>
                    </select>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!--End Toolbar-->

          <!--Product Grid-->
          <div class="grid-products grid--view-items prd-grid">
            <div class="row all-products wishlist-div">
              @foreach ($products as $product)
                <div class="col-6 col-sm-6 col-md-4 col-lg-4 item  product-item">
                  <x-customer.products.product-card :product="$product" :showWishlist="true" />
                </div>
              @endforeach
            </div>
          </div>
          <!--End Product Grid-->

          <!--Pagination Classic-->
          <hr class="clear">
          <div class="pagination text-center" style=" display: inline-block;">
            <p><button class="btn btn-primary load-more" type="button">Load more</button></p>
          </div>
          <!--End Pagination Classic-->

          <!--Collection Description-->
          <div class="collection-description mt-4 pt-2">
            <p>{{ $brand->description }}</p>
          </div>
          <!--End Collection Description-->
        </div>
        <!--End Main Content-->
      </div>
    </div>
  </div>
  <!--End Body Container-->


  <input type="hidden" class="brandSlug" value="{{ $brand->brand_slug }}" />
  <input type="hidden" class="pageType" value="designerProducts" />
  @if (method_exists($products, 'hasPages'))
    <input type="hidden" class="pagination-options" data-has-pages="{{ $products->hasPages() }}"
      data-next-page-url="{{ $products->nextPageUrl() != null ? $products?->nextPageUrl() : '' }}" />
  @endif
  <script type="module" src="{{ asset('allUsers/customer/designer-products.js') }}"></script>
  <script type="module" type="text/javascript" src="{{ asset('allUsers/customer/designer-product-filters.js') }}"></script>
@endsection
