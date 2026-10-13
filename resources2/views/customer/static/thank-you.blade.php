@extends('customer.partials.header')
@section('customerContent')
  <!--Body Container-->
  <div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
      <div class="collection-hero">
        <div class="collection-hero__image"></div>
        <div class="collection-hero__title-wrapper container">
          <div class="breadcrumbs text-uppercase mt-0 mt-lg-0">
            @if ($status === 1)
              <span class="fw-bold">Purchase order Accepted</span>
            @else
              <span class="fw-bold">Purchase order Rejected</span>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!--End Collection Banner-->

    <!--Main Content-->
    <div class="container">
      <div class="checkout-success-content py-2">
        <!--Order Card-->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="checkout-scard card border-0 rounded">
              <div class="card-body text-center">
                @if ($status === 1)
                  <p class="card-icon"><i class="icon an an-shield-check fs-1" style=" color: #f9cad7;"></i></p>
                  <h4 class="card-title">Thank you!</h4>
                  <p class="card-text mb-1">
                    You have successfully accepted the purchase order for the order ID's of: {{ $orderIds }}
                  </p>
                @else
                  <p class="card-icon"><i class="icon an an-times-cil fs-1" style=" color: #f9cad7;"></i></p>
                  <h4 class="card-title">Uh Oh!</h4>
                  <p class="card-text mb-1">
                    You have rejected the purchase order for the order ID's of: {{ $orderIds }}
                  </p>
                @endif
              </div>
            </div>
          </div>
        </div>
        <!--End Order Card-->
        <!--Order Summary-->
        <div class="row justify-content-center">
          @if ($status === 1)
            <lottie-player src="https://lottie.host/17caede3-9994-4e90-8006-daad20b33b5d/xl9No36ibb.json"
              background="transparent" speed="1" style="width: auto; height: 300px;" loop autoplay></lottie-player>
          @else
            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_kl8fqoe3.json" background="transparent"
              speed="1" style="width: auto; height: 300px;" loop autoplay></lottie-player>
          @endif
          <div class="col-12">
            <div class="w-100 mt-4 text-center">
              <a href="{{ route('home') }}"
                class="d-inline-flex align-items-center btn btn-outline-primary rounded me-2 mb-2 me-sm-3">
                <i class="me-2 icon an an-angle-left-r"></i>
                Keep Exploring
              </a>
            </div>
          </div>
        </div>
        <!--End Order Summary-->
      </div>
    </div>
    <!--End Main Content-->
  </div>
  <!--End Body Container-->
@endsection
