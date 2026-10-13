  <div class="col-12 col-sm-12 col-md-12 col-lg-3 sidebar filterbar">
      <div class="closeFilter d-block d-lg-none"><i class="icon icon an an-times-r"></i></div>
      <div class="sidebar_tags all-filters">
          <!--Categories-->
          {{-- @if (!empty($lastCategories)) --}}
          <div class="sidebar_widget filterBox filter-widget size-swacthes brand-filter">
              <div class="widget-title active">
                  <h2 class="mb-0">Categories</h2>
              </div>
              <div class="filterDD" style="display:none">
                  <ul class="clearfix d-inline text-nowrap category-filter-options">
                  </ul>
              </div>
          </div>
          {{-- @endif --}}
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
                          <p class="no-margin"><input id="amount" class="w-100 pricing fw-600" readonly
                                  type="text"></p>
                      </div>
                      <div class="col-6 mt-2">
                          <label class="small text-center">Minimum</label>
                          <input type="number" min="" max=""
                              class="rounded-0 no-arrow filter-input pricing-filter-min-input" value="0" />
                      </div>
                      <div class="col-6 mt-2 text-right">
                          <label class="small text-center">Maximum</label>
                          <input type="number" min="" max=""
                              class="rounded-0 no-arrow filter-input pricing-filter-max-input" value="0" />
                      </div>
                      <div class="col-12 mt-2 text-center">
                          <button type="button"
                              class="btn btn--small rounded apply-products-price-filter py-2 px-3">Apply</button>
                      </div>
                  </div>
              </form>
          </div>
          <!--End Price Filter-->
          <!--Color-->
          <div @class([
              'sidebar_widget filterBox filter-widget size-swacthes brand-filter',
          ])>
              <div class="widget-title active">
                  <h2 class="mb-0">Colors</h2>
              </div>
              <div class="filterDD" style="display:none">
                  <ul class="clearfix color-filter-options">
                      {{-- @foreach ($colors as $key => $value)
              <li>
                <input type="checkbox" class="filter-selector colors" value="{{ $value->id }}"
                  id="color{{ $value->id }}" @checked(in_array($value->id, empty(request('colors')) ? [] : request('colors')))>
                <label for="color{{ $value->id }}"><span></span>
                  <div style="background:{{ $value->type_color_code }}"></div> {{ $value->type_value }}
            </label>
            </li>
            @endforeach --}}
                  </ul>
              </div>
          </div>
          <!--End Brand-->
          <div @class([
              'sidebar_widget filterBox filter-widget size-swacthes brand-filter',
          ])>
              <div class="widget-title active">
                  <h2 class="mb-0">Size</h2>
              </div>
              <div class="filterDD" style="display:none">
                  <ul class="clearfix size-filter-options">
                      {{-- @foreach ($sizes as $key => $value)
              <li>
                <input type="checkbox" class="filter-selector sizes" value="{{ $value->id }}"
                  id="size{{ $value->id }}" @checked(in_array($value->id, empty(request('sizes')) ? [] : request('sizes')))>
                <label for="size{{ $value->id }}"><span></span>{{ $value->type_value }}</label>
              </li>
            @endforeach --}}
                  </ul>
              </div>
          </div>
          <!--Brand-->

          <div @class([
              'sidebar_widget filterBox filter-widget size-swacthes brand-filter',
          ])>
              <div class="widget-title active">
                  <h2 class="mb-0">Brands</h2>
              </div>
              <div class="filterDD" style="display:none">
                  <ul class="clearfix brand-filter-options" style=" column-count: 1 !important;">
                      {{-- @foreach ($brands as $brand)
              <li><input type="checkbox" class="filter-selector brands" value="{{ $brand->id }}"
                  id="brands{{ $brand->id }}"><label
                  for="brands{{ $brand->id }}"><span></span>{{ $brand->brand_name }}</label></li>
            @endforeach --}}
                  </ul>
              </div>
          </div>

          <!--End Brand-->
          <!--Occassions-->
          <div @class([
              'sidebar_widget filterBox filter-widget size-swacthes availability',
          ])>
              <div class="widget-title active">
                  <h2 class="mb-0">Occasion</h2>
              </div>
              <div class="filterDD" style="display:none">
                  <ul class="clearfix occasion-filter-options">
                  </ul>
              </div>
          </div>
          <!--End Occassions-->
          <!--Availability-->
          <div @class([
              'sidebar_widget filterBox filter-widget size-swacthes availability',
          ])>
              <div class="widget-title active">
                  <h2 class="mb-0">Availability</h2>
              </div>
              <div class="filterDD" style="display:none">
                  <ul class="clearfix availability-filter-options">
                      {{-- @foreach ($availabilities as $dropdown)
              <li>
                <input type="checkbox" class="filter-selector availabilities" value="{{ $dropdown->dropdown_value }}"
                  id="byAvailability{{ $dropdown->dropdown_value }}" @checked(in_array($dropdown->dropdown_value, empty(request('availability')) ? [] : request('availability')))>
                <label for="byAvailability{{ $dropdown->dropdown_value }}">
                  <span></span>
                  {{ $dropdown->dropdown_value }}
                </label>
              </li>
            @endforeach --}}
                  </ul>
              </div>
          </div>
          <!--End Availability-->
          <!--Gender-->
          <div @class([
              'sidebar_widget filterBox filter-widget size-swacthes availability',
          ])>
              <div class="widget-title active">
                  <h2 class="mb-0">Gender</h2>
              </div>
              <div class="filterDD" style="display:none">
                  <ul class="clearfix gender-filter-options">
                      {{-- @foreach ($genders as $gender)
              @if (trim($gender) !== '')
                <li>
                  <input type="checkbox" class="filter-selector genders" value="{{ $gender }}"
                    id="byGender{{ $gender }}" @checked(in_array($gender, empty(request('gender')) ? [] : request('gender')))>
                  <label for="byGender{{ $gender }}">
                    <span></span>
                    {{ $gender }}
                  </label>
                </li>
              @endif
            @endforeach --}}
                  </ul>
              </div>
          </div>
      </div>
  </div>
