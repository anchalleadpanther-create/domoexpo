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

<style>
    @media only screen and (max-width: 767px) {
        .main-col .res-p-0 {
            padding: 0 !important;
        }

        .main-col .grid-products .item .product-price span.old-price,
        .main-col .grid-products .item .product-price span.price {
            width: 100%;
            display: inline-block;
        }
    }
</style>

<!--Body container-fluid-->
<div id="page-content">
    {{-- <div class="container-fluid mobile-hide">
        <div class="row">
            <div class="banner-text banner-style2">
                <img src="{{ asset('allUsers/frontend/images/banner-top.png') }}" alt="banner" style="width: 100%" />
            </div>
        </div>
    </div> --}}

    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider pb-0">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-->
                {{-- @include('customer.product.designer-filters') --}}
                @include('customer.product.product-filters')
                <!--End Sidebar-->

                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">
                    <div class="p-5 res-p-0">
                        {{-- <div class="page-title">
                            <h1>Womens</h1>
                        </div> --}}
                        <!--Active Filters-->
                        <ul class="active-filters d-flex flex-wrap align-items-center m-0 list-unstyled d-none">
                            <li><a href="#">Clear all</a></li>
                            <li>
                                <a href="#">Men
                                    <i class="an an-times-l"></i></a>
                            </li>
                            <li>
                                <a href="#">Necklaces
                                    <i class="an an-times-l"></i></a>
                            </li>
                            <li>
                                <a href="#">Accessories
                                    <i class="an an-times-l"></i></a>
                            </li>
                        </ul>
                        <!--End Active Filters-->

                        <!--Toolbar-->
                        <div class="toolbar">
                            <div class="filters-toolbar-wrapper">
                                <ul class="list-unstyled d-flex align-items-center">
                                    <li class="product-count d-flex align-items-center">
                                        <button type="button" class="btn btn-filter an an-slider-3 d-inline-flex d-lg-none me-2 me-sm-3">
                                            <span class="hidden">Filter</span>
                                        </button>
                                        <div class="filters-toolbar__item">
                                            <span class="filters-toolbar__product-count products-count">
                                                Showing: {{ $productsCount }} products
                                                <span class="shimming-loader designer-loader d-none"></span>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="collection-view ms-sm-auto">
                                        <div class="filters-toolbar__item collection-view-as d-flex align-items-center me-3 d-none">
                                            <a href="javascript:void(0)" class="change-view prd-grid change-view--active"><i class="icon an an-th" aria-hidden="true"></i><span class="tooltip-label">Grid View</span></a>
                                            <a href="javascript:void(0)" class="change-view prd-list"><i class="icon an an-th-list" aria-hidden="true"></i><span class="tooltip-label">List View</span></a>
                                        </div>
                                    </li>
                                    <li class="filters-sort ms-auto ms-sm-0">
                                        <div class="filters-toolbar__item">
                                            <label for="SortBy" class="hidden">Sort by:</label>
                                            <select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort filter-onchange-selector sort-type">
                                                <option value="">Sort By</option>
                                                <option value="view_count-desc">Popular</option>
                                                <option value="created_at-desc">Latest</option>
                                                <option value="updated_at-desc">Updated</option>
                                                <option value="price_unit-asc">Price, low to high</option>
                                                <option value="price_unit-desc">Price, high to low</option>
                                                <option value="discount-desc">Discount</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--End Toolbar-->

                        <div class="row all-products grid-products wishlist-div">
                            @foreach ($products as $key => $product)
                                <div class="col-sm-3 col-6">
                                    <x-customer.products.product-card :product="$product" :showWishlist="true" :isProductListPage="true" />
                                </div>
                            @endforeach
                        </div>

                        <!--Pagination Classic-->
                        <hr class="clear">
                        <div class="pagination text-center" style="display: inline-block;">
                            <p><button class="btn btn-primary load-more" type="button">Load more</button></p>
                        </div>
                        <!--End Pagination Classic-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->
</div>
<!--End Body container-fluid-->

<x-customer.products.similar-products-modal :products="$products" :showWishlist="true" />

<input type="hidden" class="brandSlug" value="{{ $brand->brand_slug }}" />
<input type="hidden" class="pageType" value="designerProducts" />
@if (method_exists($products, 'hasPages'))
    <input type="hidden" class="pagination-options" data-has-pages="{{ $products->hasPages() }}" data-next-page-url="{{ $products->nextPageUrl() != null ? $products?->nextPageUrl() : '' }}" />
@endif

<script type="module" src="{{ asset('allUsers/customer/designer-products.js') }}"></script>
<script type="module" src="{{ asset('allUsers/customer/designer-product-filters.js') }}"></script>

@endsection
