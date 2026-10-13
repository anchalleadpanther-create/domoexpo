@extends('customer.partials.header')
@section('customerContent')
@section('title', '')
@section('description', '')
@section('keywords', '')
<style>
  ul.TAGS_designer-name-list li.title:first-child {
    border: 0 !important;
  }

  .TAGSdesigner_rightpart li.desc-block.title {
    font-weight: bold;
    color: #002b4f;
    border-top: 1px solid #fcd3c1;
    margin-top: 20px;
    padding-top: 20px;
    width: 100%;
    font-size: 17px;
    text-decoration: underline;
  }

  .TAGSdesigner_rightpart li.desc-block {
    display: inline-block;
    width: 100%;
    padding: 0 15px 0 0;
    vertical-align: top;
  }

  .TAGSdesigner_rightpart li {
    list-style-type: none;
  }

  .TAGSdesigner_rightpart li {
    list-style-type: none;
  }

  .TAGSdesigner_rightpart ul.designer-listing {
    list-style: none;
    float: left;
    padding-left: 0px;
    width: 100%;
  }

  .TAGSdesigner_rightpart ul.designer-listing>li {
    width: 33.0%;
    float: left;
  }

  @media screen and (max-width: 768px) {
    .TAGSdesigner_rightpart ul.designer-listing>li {
      width: 100%;
      float: left;
      padding: 4px 0;
    }

    .TAGSdesigner_rightpart ul.designer-listing>li a {
      font-size: 14px;
    }
  }

  .new-tag {
    display: inline-block;
    vertical-align: middle;
    font-size: 9px;
    line-height: 12px;
    font-weight: 700;
    text-transform: uppercase;
    padding: 0 3px;
    margin: -4px 0 0 3px;
    background: #e47a9f;
    color: #fff;
  }

  .sale-tag {
    display: inline-block;
    vertical-align: middle;
    font-size: 9px;
    line-height: 12px;
    font-weight: 700;
    text-transform: uppercase;
    padding: 0 3px;
    margin: -4px 0 0 3px;
    background: red;
    color: #fff;
  }

  .exclusive-tag {
    display: inline-block;
    vertical-align: middle;
    font-size: 9px;
    line-height: 12px;
    font-weight: 700;
    text-transform: uppercase;
    padding: 0 1px;
    margin: -4px 0 0 3px;
    background: #e47a9f;
    color: #fff;
  }
</style>
<!--Body Container-->
<div id="page-content" style=" display: inline-block; width: 100%;">
  <!--Collection Banner-->
  <div class="collection-header designer-collection-header">
    <div class="collection-hero">
      <div class="collection-hero__image"></div>
      <div class="collection-hero__title-wrapper container">
        <div class="breadcrumbs text-uppercase mt-0 mt-lg-0"><span class="fw-bold">Designers</span></div>
      </div>
    </div>
  </div>
  <!--End Collection Banner-->
  {{-- <div @class([
      'container-fluid designer_filter_tbl',
      // 'd-none' => Request::segment(3) !== null,
      'd-none',
  ])>
    <div class="table-responsive">
      <table class="table" cellpadding="0" cellspacing="0">

        <tr>
          <td style="border:0; width: 1%;">
            <a href="javascript:;" class="change-designer-category" data-category="{{ 'all' }}">
              {{ 'ALL' }}
            </a>
          </td>
          @foreach ($brandCategories as $brandCategory)
            <td style="border:0; width: 1%;">
              <a href="javascript:;" class="change-designer-category" data-category="{{ $brandCategory }}">
                {{ Str::upper($brandCategory) }}
              </a>
            </td>
          @endforeach

        </tr>
      </table>
    </div>

  </div> --}}

  <!--Main Content-->
  <div class="container-fluid designer_listing_tb">
    <div class="toolbar row">
      <div class="filters-toolbar-wrapper">
        <ul class="list-unstyled align-items-center">


          <li @class([
              'filters-sort ms-auto ms-sm-0',
              'd-none' => Request::segment(3) !== null,
          ]) style="float:left">
            <div class="filters-toolbar__item ">
              <input type="text" class="search-designer" placeholder="Search for Designers..">
            </div>
            <span class=" shimming-loader designer-loader d-none"></span>

          </li>
        </ul>
      </div>
    </div>
    <div class="col-sm-12"></div>
    <!-- Our Brands -->
    @empty(Request::segment(3))
      {{-- <div class="filterbrand d-flex-wrap text-center mb-4 d-filterbrand">
      @foreach (range('a', 'z') as $letter)
      <a href="javascript:;" class="fw-500 change-designer-preference" data-letter="{{ $letter }}">{{
        Str::upper($letter) }}</a>
      @endforeach
      <a href="javascript:;" class="fw-500 change-designer-preference" data-letter="{{ '#' }}">#</a>
      <a href="{{ route('customer.designers') }}" class="fw-500">All</a>


    </div> --}}
      <div class="filterbrand text-center mb-4 m-filterbrand">
          <div class="row">
              
              <div class="col-md-12">
                  <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                @foreach (range('a', 'z') as $letter)
                  <td >
                    <a href="javascript:;" class="fw-500 change-designer-preference"
                      data-letter="{{ $letter }}">{{ Str::upper($letter) }}</a>
                  </td>
                @endforeach
                <td> <a href="javascript:;" class="fw-500 change-designer-preference"
                    data-letter="{{ '#' }}">#</a></td>
                <td> <a href="{{ route('customer.designers') }}" class="fw-500">All</a></td>
              </tr>
            </tbody>
          </table>
        </div> 
                  
              </div>
          </div>
      </div>


    @endempty

    <div class="row">
      <ul class="col-md-auto mt-4">
        <ul class="list-group">
          <a href="{{ route('customer.designers', ['nationality' => '']) }}" @class(['bg-light' => Request('nationality') === null])>
            <li class="list-group-item w-100 border-0">All</li>
          </a>
          <a href="{{ route('customer.designers', ['nationality' => 'national']) }}" @class(['bg-light' => Request('nationality') === 'national'])>
            <li class="list-group-item w-100 border-0">Indian</li>
          </a>
          <a href="{{ route('customer.designers', ['nationality' => 'international']) }}" @class(['bg-light' => Request('nationality') === 'international'])>
            <li class="list-group-item w-100 border-0">International</li>
          </a>
        </ul>
      </ul>

      <ul class="col-md-10 designer-wishlist-div">
        <ul class="TAGS_designer-name-list  TAGSdesigner_rightpart designers-alphabet-list"
          id="TAGS_designer-name-list">

        </ul>
      </ul>
    </div>
    <!-- End Our Brands -->
  </div>
  <!--End Main Content-->
</div>
<!--End Body Container-->
<input type="hidden" class="new-in-designer" value="{{ Request::segment(3) }}" />
<input type="hidden" class="nationality" value="{{ Request('nationality') }}" />
<script type="module" src="{{ asset('allUsers/customer/designer.js') }}"></script>


@endsection
