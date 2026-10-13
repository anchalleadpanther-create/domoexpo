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
              <h2 class="collection-hero__title text-white mt-2 mb-2">MEET THE EXPERTS </h2>
              <!--p class="collection__subtitle fs-5 text-white mb-0">Home | FEI Experts </p-->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Spring Summer Product Slider-->
    <section class="section pt-5 pb-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <div class="section-header">

              <p>As a member of the FEI circle, meet the top industry experts across fashion, beauty & lifestyle. Our team
                of experts are trailblazers in their respective fields and are here to help you look & feel your best.</p>
              <p>At Fashion Edit India, we endeavour to empower the beautiful you - inside & out !</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Spring Summer Product Slider-->
    <div class="grid-products grid--view-items prd-grid">
      <div class="container">

        <div class="row tab-vertical-style ">
          <div class="col-12 col-sm-12 mb-2 sm-md-0">
            <div class="nav nav-pills" id="hori-tab" role="tablist" aria-orientation="vertical">
              <a @class(['nav-link', 'active' => Request('category') === null]) href="{{ route('customer.tfe-experts') }}">All</a>
              <a @class([
                  'nav-link',
                  'active' => Request('category') === 'personal-styling',
              ])
                href="{{ route('customer.tfe-experts', ['category' => 'personal-styling']) }}">Personal
                Styling</a>
            </div>
          </div>
          <div class="col-12 col-sm-12">
            <div class="tab-content" id="vertical-tabContent" style="">
              <div class="tab-pane fade show active" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                <div class="row all-products wishlist-div">
                  {{-- @if (Request('category') === null)
                    @foreach ($experts as $expert)
                      <div class="col-xs-6 col-sm-3 col-md-3 item product-item mb-5">
                        <div class="product-image cat_product-image" style="height:auto">
                          <a href="{{ route('customer.tfe-expert-package-detail', [Str::slug($expert->defaultPackage->name), $expert->defaultPackage->id]) }}"
                            class="product-img">
                            <img class="primary  blur-up lazyloaded"
                              data-src="{{ isset($expert->photo) ? asset('uploads/buyer') . '/' . $expert->photo : asset('allUsers/customer/images/logo-new.png') }}"
                              src="{{ isset($expert->photo) ? asset('uploads/buyer') . '/' . $expert->photo : asset('allUsers/customer/images/logo-new.png') }}"
                              alt="{{ $expert->fullName }}" title="{{ $expert->fullName }}" style="opacity:1 !important">
                          </a>
                        </div>
                        <div class="product-details text-left">
                          <div class="product-name text-uppercase text-center">
                            <a href="{{ route('customer.tfe-expert-package-detail', [Str::slug($expert->defaultPackage->name), $expert->defaultPackage->id]) }}"
                              class="fw-600">
                              {{ $expert->expertFullName }}
                            </a>
                            <p style="margin-bottom:0">{{ $expert->category }}</p>
                            <h6>INR {{ number_format($expert->defaultPackage?->price, 2) }} /
                              {{ $expert->defaultPackage?->duration }}</h6>
                            <a href="{{ route('customer.tfe-expert-package-detail', [Str::slug($expert->defaultPackage->name), $expert->defaultPackage->id]) }}"
                              class="btn rounded"
                              style="font-size: 11px;font-weight: normal;width:100%;padding:8px !important">BOOK AN
                              APPOINTMENT</a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  @endif --}}
                  {{-- @if (Request('category') === 'personal-styling') --}}
                    @foreach ($experts as $expert)
                      <div class="col-xs-6 col-sm-3 col-md-3 item product-item mb-5">
                        <div class="product-image cat_product-image" style="height:auto">
                          <a href="{{ route('customer.tfe-expert-package-detail', [Str::slug($expert->defaultPackage->name), $expert->defaultPackage->id]) }}"
                            class="product-img">
                            <img class="primary  blur-up lazyloaded"
                              data-src="{{ isset($expert->photo) ? asset('uploads/buyer') . '/' . $expert->photo : asset('allUsers/customer/images/logo-new.png') }}"
                              src="{{ isset($expert->photo) ? asset('uploads/buyer') . '/' . $expert->photo : asset('allUsers/customer/images/logo-new.png') }}"
                              alt="{{ $expert->fullName }}" title="{{ $expert->fullName }}"
                              style="opacity:1 !important">
                          </a>
                        </div>
                        <div class="product-details text-left">
                          <div class="product-name text-uppercase text-center">
                            <a href="{{ route('customer.tfe-expert-package-detail', [Str::slug($expert->defaultPackage->name), $expert->defaultPackage->id]) }}"
                              class="fw-600">
                              {{ $expert->expertFullName }}
                            </a>
                            <p style="margin-bottom:0">{{ $expert->category }}</p>
                            <h6>INR {{ number_format($expert->defaultPackage?->price, 2) }} /
                              {{ $expert->defaultPackage?->duration }}</h6>
                            <a href="{{ route('customer.tfe-expert-package-detail', [Str::slug($expert->defaultPackage->name), $expert->defaultPackage->id]) }}"
                              class="btn rounded"
                              style="font-size: 11px;font-weight: normal;width:100%;padding:8px !important">BOOK AN
                              APPOINTMENT</a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    @foreach ($experts as $expert)
                      <div class="col-xs-6 col-sm-3 col-md-3 item product-item mb-5 position-relative">
                        <div class="product-image cat_product-image" style="height:auto">
                          <a href="{{ route('customer.tfe-expert-packages', [Str::slug($expert->fullName), $expert->id]) }}"
                            class="product-img">
                            <img class="primary  blur-up lazyloaded"
                              data-src="{{ isset($expert->photo) ? asset('uploads/buyer') . '/' . $expert->photo : asset('allUsers/customer/images/logo-new.png') }}"
                              src="{{ isset($expert->photo) ? asset('uploads/buyer') . '/' . $expert->photo : asset('allUsers/customer/images/logo-new.png') }}"
                              alt="{{ $expert->fullName }}" title="{{ $expert->fullName }}"
                              style="opacity:1 !important">
                          </a>
                        </div>
                        <div class="product-details text-left fixed-bottom position-absolute">
                          <div class="product-name text-uppercase text-center ">
                            <a href="{{ route('customer.tfe-expert-packages', [Str::slug($expert->fullName), $expert->id]) }}"
                              class="fw-600">
                              {{ $expert->expertFullName }}
                            </a>
                            <p style="margin-bottom:0">{{ $expert->category }}</p>
                            <h6>&nbsp;</h6>
                            <a href="{{ route('customer.tfe-expert-packages', [Str::slug($expert->fullName), $expert->id]) }}"
                              class="btn rounded"
                              style="font-size: 11px;font-weight: normal;width:100%;padding:8px !important">EXPLORE
                              PACKAGES</a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  {{-- @endif --}}
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!--End Body Container-->
@endsection
