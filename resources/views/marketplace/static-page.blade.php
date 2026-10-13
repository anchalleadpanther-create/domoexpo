@extends('purchasync.partials.header')
@section('customerContent')
  @isset($page->meta_title)
    @section('title', $page->meta_title)
  @endisset
  @isset($page->meta_description)
    @section('description', $page->meta_description)
  @endisset
  @isset($page->meta_keywords)
    @section('keywords', $page->meta_keywords)
  @endisset
  <!--Body Container-->
  <style>
  #page-content p, #page-content span {
    font-size: 18px !important;
    line-height: 27px !important;
    font-family: Calibri, sans-serif !important;
}
      #page-content p span{font-size:15px !important;text-align:left !important;}
      #page-content ol, #page-content ul{padding-left:50px !important;}
      #page-content li{list-style: disc !important;}
      #page-content li span{font-size:16px !important;}
      .static_content.container{ min-width: 1140px;}
.ps-footer{border-top:1px solid #ddd;}
      
      
      
      @media (max-width: 767px) {
      .static_content.container { min-width: 100%;}
}
      
  </style>
  
  
  <div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header" style=" background: url(../allUsers/frontend/img/static-banner.png);padding: 130px 0;background-size: cover;">
      <div class="collection-hero">
        <div class="collection-hero__image"></div>
        <div class="collection-hero__title-wrapper container">
          <div class="breadcrumbs text-uppercase mt-1 mt-lg-2" style="text-align:center">
            <span class="fw-bold" style=" font-size: 35px !important;font-weight: 600;color:#fff">{{ $page->name }}</span>
          </div>
        </div>
      </div>
    </div>
    <!--End Collection Banner-->

    <!--Main Content-->
    <div class="container mt-5 static_content">
      <div class="row">
        <div class="col-12 text-center">
          <div class="error-content py-4">
            <div>
              {!! htmlspecialchars_decode($page->content) !!}
            </div>
            <!--p class="mt-5">
              <a href="{{ route('home') }}" class="btn ps-btn rounded mb-2 text-capitalize">Go To Home Page</a>
            </p-->
          </div>
        </div>
      </div>
    </div>
    <!--End Main Content-->
  </div>
  <!--End Body Container-->
@endsection
