@extends('customer.partials.header')
@section('customerContent')
@section('title', "$category->meta_title")
@section('description', "$category->meta_description")
@section('keywords', "$category->meta_keywords")
<div class="page-type d-none">category-products</div>


<!--Body container-fluid-->
<div id="page-content">
    <div class="container-fluid mobile-hide">
        <div class="row">
            <div class=" banner-text banner-style2">
                <img src="{{ asset('allUsers/frontend/images/banner-top.png') }}" alt="banner" style="width:100%">
            </div>
        </div>
    </div>



    <!--Top Picks On Fashion Product Slider-->
    <section class="section product-slider pb-0">
        <div class="container-fluid">
            <div class="row">



                <!--Sidebar-->
                @include('customer.product.product-filters')
                <!--End Sidebar-->

                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">
                    <div class="page-title">
                        <h1>Womens</h1>
                    </div>
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
                                    <button type="button"
                                        class="btn btn-filter an an-slider-3 d-inline-flex d-lg-none me-2 me-sm-3"><span
                                            class="hidden">Filter</span></button>



                                    <div class="filters-toolbar__item">
                                        <span class="filters-toolbar__product-count products-count">
                                            <span class="shimming-loader designer-loader">
                                            </span>
                                            {{-- Showing: 100 Products --}}
                                        </span>
                                    </div>

                                </li>
                                <li class="collection-view ms-sm-auto">
                                    <div
                                        class="filters-toolbar__item collection-view-as d-flex align-items-center me-3">
                                        <a href="javascript:void(0)" class="change-view prd-grid change-view--active"><i
                                                class="icon an an-th" aria-hidden="true"></i><span
                                                class="tooltip-label">Grid
                                                View</span></a>
                                        <a href="javascript:void(0)" class="change-view prd-list"><i
                                                class="icon an an-th-list" aria-hidden="true"></i><span
                                                class="tooltip-label">List View</span></a>
                                    </div>
                                </li>
                                <li class="filters-sort ms-auto ms-sm-0">
                                    <div class="filters-toolbar__item">
                                        <label for="SortBy" class="hidden">Sort by:</label>
                                        <select name="SortBy" id="SortBy"
                                            class="filters-toolbar__input filters-toolbar__input--sort filter-onchange-selector  sort-type">
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


                    <div class="row  all-products grid-products">

                        @foreach ($products as $product)
                            <div class=" col-sm-3">
                                <x-customer.products.product-card :product="$product" :showWishlist="true" />
                            </div>
                        @endforeach

                    </div>


                    <!--Pagination Classic-->
                    <hr class="clear">
                    <div class="pagination text-center " style=" display: inline-block;">
                        <p><button class="btn btn-primary load-more" type="button">Load more</button></p>
                    </div>
                    <!--End Pagination Classic-->
                </div>
            </div>
        </div>
    </section>
    <!--End Top Picks On Fashion Product Slider-->

</div>
<!--End Body container-fluid-->






<!--End Body Container-->
<input type="hidden" class="categorySlug" value="{{ $category->category_slug }}" />
<input type="hidden" class="pageType" value="categoryProducts" />
@if (method_exists($products, 'hasPages'))
    <input type="hidden" class="pagination-options" data-has-pages="{{ $products->hasPages() }}"
        data-next-page-url="{{ $products->nextPageUrl() != null ? $products?->nextPageUrl() : '' }}" />
@endif
<script type="module" src="{{ asset('allUsers/customer/product-categories.js') }}"></script>
<script type="module" src="{{ asset('allUsers/customer/category-product-filters.js') }}"></script>
@endsection
