<div class="col-12 col-sm-12 col-md-12 col-lg-3 sidebar filterbar">
  <div class="closeFilter d-block d-lg-none"><i class="icon icon an an-times-r"></i></div>
  <div class="sidebar_tags all-filters">
    @isset($category->category_slug)
        <div class="col-12 text-right margin-25px-top">
            <a href="{{ route('customer.designer-products', $category->category_slug) }}" class="btn btn--small rounded  py-2 px-3">
                    Reset
            </a>
        </div>
    @endisset

    <!--Categories-->
    <div class="sidebar_widget filterBox filter-widget size-swacthes brand-filter">
      <div class="widget-title active">
        <h2 class="mb-0">Categories</h2>
      </div>
      <div class="filterDD" style="display:none">
        <ul class="clearfix d-inline text-nowrap category-filter-options">
        </ul>
      </div>
    </div>
    <!--Categories-->
    <!--Price Filter-->
    <div class="sidebar_widget filterBox filter-widget">
      <div class="widget-title active">
        <h2 class="mb-0">Price</h2>
      </div>
      <form action="#" method="post" class="price-filter filterDD" style="display:none">
        <div id="slider-range" class="mt-2"></div>
        <div class="row">
          <div class="col-12">
            <p class="no-margin"><input id="amount" class="w-100 pricing" readonly type="text"></p>
          </div>
          <div class="col-6 mt-2">
            <label class="small text-center">Minimum</label>
            <input type="number" min="" max="" class="rounded-0 no-arrow filter-input pricing-filter-min-input"
              value="0" />
          </div>
          <div class="col-6 mt-2 text-right">
            <label class="small text-center">Maximum</label>
            <input type="number" min="" max="" class="rounded-0 no-arrow filter-input pricing-filter-max-input"
              value="0" />
          </div>
          <div class="col-12 mt-2 text-center">
            @if (str_contains(Request::url(), 'search'))
            <button type="button" class="btn btn--small rounded apply-search-price-filter py-2 px-3">Apply</button>
            @else
            <button type="button" class="btn btn--small rounded apply-designer-price-filter py-2 px-3">Apply</button>
            @endif
          </div>
        </div>
      </form>
    </div>
    {{-- <div class="sidebar_widget filterBox filter-widget">
      <div class="widget-title active">
        <h2 class="mb-0">Price</h2>
      </div>
      <form action="#" method="post" class="price-filter filterDD" style="display:none">
        <div id="slider-range" class="mt-2"></div>
        <div class="row">
          <div class="col-12">
            <span class="min-price-text">₹ {{ $minPrice }}</span>
            <span class="max-price-text float-end">₹ {{ $maxPrice }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="input-group">
              <input class="pricing form-control" type="text">
              <input class="pricing form-control" type="text">
            </div>
          </div>
          <div class="col-5 text-right margin-25px-top">
            <button type="button" class="btn btn--small rounded filter-selector">filter</button>
          </div>
        </div>
      </form>
    </div> --}}
    <!--End Price Filter-->
    <!--Color-->

    <div @class([ 'sidebar_widget filterBox filter-widget size-swacthes brand-filter' , ])>
      <div class="widget-title active">
        <h2 class="mb-0">Colors</h2>
      </div>
      <div class="filterDD" style="display:none">
        <ul class="clearfix color-filter-options">
        </ul>
      </div>
    </div>

    <div @class([ 'sidebar_widget filterBox filter-widget size-swacthes brand-filter' , ])>
      <div class="widget-title active">
        <h2 class="mb-0">Size</h2>
      </div>
      <div class="filterDD" style="display:none">
        <ul class="clearfix size-filter-options">
        </ul>
      </div>
    </div>
    <!--End Brand-->

    <!--Occassions-->
    <div @class([ 'sidebar_widget filterBox filter-widget size-swacthes availability d-none' , ])>
      <div class="widget-title active">
        <h2 class="mb-0">Occasion</h2>
      </div>
      <div class="filterDD" style="display:none">
        <ul class="clearfix occasion-filter-options">
        </ul>
      </div>
    </div>

    <!--End Occassions-->
    <!--Gender-->
    <div @class([ 'sidebar_widget filterBox filter-widget size-swacthes availability' , ])>
      <div class="widget-title active">
        <h2 class="mb-0">Gender</h2>
      </div>
      <div class="filterDD" style="display:none">
        <ul class="clearfix gender-filter-options">
        </ul>
      </div>
    </div>
    <div @class([ 'sidebar_widget filterBox filter-widget size-swacthes brand-filter' , ])>
      <div class="widget-title active">
        <h2 class="mb-0">Brands</h2>
      </div>
      <div class="filterDD" style="display:none">
        <ul class="clearfix brand-filter-options" style=" column-count: 1 !important;">
        </ul>
      </div>
    </div>
    <!--End Gender-->
  </div>
</div>