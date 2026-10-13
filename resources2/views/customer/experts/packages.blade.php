@extends('customer.partials.header')
@section('customerContent')
  <!--Body Container-->
  <div id="page-content" class="loyalty_pg"style=" min-height: 100%;">
    <!--Store Feature-->
    <div class="about-pstyle2">
      <div class="collection-header inner-content">
        <div class="collection-hero inner mb-0">
          <div class="collection-hero__image"></div>
          <div class="collection-hero__title-wrapper d-flex-justify-center h-100">
            <div class="container position-relative mt-md-0">
              <h2 class="collection-hero__title text-white mt-2 mb-2">MEET THE EXPERTS | PACKAGES</h2>
              <!--p class="collection__subtitle fs-5 text-white mb-0">Home | FEI Experts </p-->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Spring Summer Product Slider-->
    <section class="section py-4">
      <div class="container">
        <div class="row">
          <div class="col-4 col-sm-3 col-md-3 item product-item">
            <div class="product-image cat_product-image" style="height:auto">
              <a href="javascript:;" class="product-img">
                <img class="primary  blur-up lazyloaded"
                  data-src="{{ isset($expert->photo) ? asset('uploads/buyer') . '/' . $expert->photo : asset('allUsers/customer/images/logo-new.png') }}"
                  src="{{ isset($expert->photo) ? asset('uploads/buyer') . '/' . $expert->photo : asset('allUsers/customer/images/logo-new.png') }}"
                  alt="" title="" style="opacity:1 !important">
              </a>
            </div>

          </div>
          <div class="col-8 col-sm-9 col-md-9 item product-item d-block d-md-none my-auto text-left">
            <h3 class="mt-0 mb-0">{{ $expert->ExpertFullName }}</h3>
            <p class="mt-0 mb-0">{{ $expert->category }}</p>
            <h6>INR {{ number_format($expert->defaultPackage?->price, 2) }} /
              {{ $expert->defaultPackage?->duration }}</h6>
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#videoModal" class="mt-0 mb-0 text-pink">Watch
              Video</a>

          </div>
          <div class="col-12 col-sm-9 col-md-9 item product-item">

            <div class="section-header text-left">
              <div class="d-none d-md-block">
                <h3 class="mt-0 mb-0">{{ $expert->ExpertFullName }}</h3>
                <p class="mt-0 mb-0">{{ $expert->category }}</p>
                <h6>INR {{ number_format($expert->defaultPackage?->price, 2) }} /
                  {{ $expert->defaultPackage?->duration }}</h6>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#videoModal"
                  class="mt-0 mb-0 text-pink">Watch Video</a>
              </div>
              <p>
                {!! htmlspecialchars_decode($expert->description) !!}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Spring Summer Product Slider-->
    <div class="grid-products grid--view-items prd-grid">
      <div class="container">
        <div class="row">
          @foreach ($expert->packages as $package)
            <div class="col-xs-12 col-sm-4 col-md-4 mb-4 text-center">
              <a href="{{ route('customer.tfe-expert-package-detail', [Str::slug($package->name), $package->id]) }}"
                class="experts-packages_wrap" style="height:300px;!important;overflow-y:auto">
                <h2>{{ $package->name }}</h2>
                <h5>INR {{ $package->price }} / {{ $package->duration }}</h5>
                <p>{{ $package->description }}</p>
                <h6>Package includes:</h6>
                <p class="mb-0">
                  {!! htmlspecialchars_decode($package->inclusions) !!}
                </p>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!--End Body Container-->

  <x-customer.video-modal url="https://www.youtube.com/embed/ouMmd5hg2Ws?controls=1" />
@endsection
