<!--Sidebar-->
<div class="col-12 col-sm-12 col-md-12 col-lg-3 sidebar filterbar">
    <div class="closeFilter d-block d-lg-none">
        <i class="icon icon an an-times-r"></i>
    </div>
    <div class="sidebar_tags all-filters">
        @isset($category->category_slug)
        <div class="col-12 text-right margin-25px-top">
            <a href="{{ route('customer.product-category', $category->category_slug) }}" class="btn btn--small rounded py-2 px-3">
                Reset
            </a>
        </div>
        @endisset

        @isset($brand->brand_slug)
        <div class="col-12 text-right margin-25px-top">
            <a href="{{ route('customer.designer-products', $brand->brand_slug) }}" class="btn btn--small rounded py-2 px-3">
                Reset
            </a>
        </div>
        @endisset

        <!--Categories-->
        <div class="sidebar_widget categories filterBox filter-widget">
            <div class="widget-title">
                <h2 class="mb-0">Categories</h2>
            </div>
            <div class="widget-content filterDD">
                <ul class="clearfix sidebar_categories mb-0 category-filter-options">
                </ul>
            </div>
        </div>
        <!--End Categories-->

        <!--Price Filter-->
        <div class="sidebar_widget filterBox filter-widget">
            <div class="widget-title">
                <h2 class="mb-0">Price</h2>
            </div>
            <form action="#" method="post" class="price-filter filterDD">
                <div id="slider-range" class="mt-2"></div>
                <div class="row">
                    <div class="col-6">
                        <p class="no-margin">
                            <input id="amount" value="500 - 100" type="text">
                            <input type="hidden" min="" max="" class="rounded-0 no-arrow filter-input pricing-filter-min-input" value="0" />
                            <input type="hidden" min="" max="" class="rounded-0 no-arrow filter-input pricing-filter-max-input" value="0" />
                        </p>
                    </div>
                    <div class="col-6 text-right margin-25px-top">
                        <button type="button" class="btn btn--small rounded apply-products-price-filter py-2 px-3">
                            Apply
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!--End Price Filter-->

        <!--Gender Filter-->
        <div class="sidebar_widget filterBox filter-widget size-swacthes">
            <div class="widget-title">
                <h2 class="mb-0">Gender</h2>
            </div>
            <div class="filterDD">
                <ul class="clearfix gender-filter-options">
                </ul>
            </div>
        </div>
        <!--End Gender Filter-->

        <!--Color Filter-->
        <div class="sidebar_widget filterBox filter-widget size-swacthes brand-filter">
            <div class="widget-title">
                <h2 class="mb-0">COLOR</h2>
            </div>
            <div class="filterDD">
                <ul class="clearfix color-filter-options">
                </ul>
            </div>
        </div>
        <!--End Color Filter-->

        <!--Size Swatches-->
        <div class="sidebar_widget filterBox filter-widget size-swacthes">
            <div class="widget-title">
                <h2 class="mb-0">Size</h2>
            </div>
            <div class="filterDD">
                <ul class="clearfix size-filter-options">
                </ul>
            </div>
        </div>
        <!--End Size Swatches-->

        <!--Brands Filter-->
        <div class="sidebar_widget filterBox filter-widget size-swacthes product-type">
            <div class="widget-title">
                <h2 class="mb-0">Brands</h2>
            </div>
            <div class="filterDD">
                <ul class="clearfix brand-filter-options">
                </ul>
            </div>
        </div>
        <!--End Brands Filter-->

        <!--Occasion Filter-->
        <div class="sidebar_widget filterBox filter-widget size-swacthes availability occasion-filter_">
            <div class="widget-title">
                <h2 class="mb-0">Occasion</h2>
            </div>
            <div class="filterDD">
                <ul class="clearfix occasion-filter-options">
                </ul>
            </div>
        </div>
        <!--End Occasion Filter-->

        <!--Availability Filter-->
        <div class="sidebar_widget filterBox filter-widget size-swacthes availability">
            <div class="widget-title">
                <h2 class="mb-0">Availability</h2>
            </div>
            <div class="filterDD">
                <ul class="clearfix availability-filter-options">
                </ul>
            </div>
        </div>
        <!--End Availability Filter-->

        <!--Discount Range Filter-->
        <div class="sidebar_widget filterBox filter-widget size-swacthes discount-range">
            <div class="widget-title">
                <h2 class="mb-0">DISCOUNT RANGE</h2>
            </div>
            <div class="filterDD">
                <ul class="clearfix discount-range-filter-options" style="column-count: 1!important;">
                </ul>
            </div>
        </div>
        <!--End Discount Range Filter-->

    </div>
</div>
<!--End Sidebar-->
