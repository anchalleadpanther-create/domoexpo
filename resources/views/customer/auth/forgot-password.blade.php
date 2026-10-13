@extends('customer.partials-fn.header')
@section('customerContent')
  <!--Body Container-->
  <div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
      <div class="collection-hero">
        <div class="collection-hero__image"></div>
        <div class="collection-hero__title-wrapper container">
          <div class="breadcrumbs text-uppercase mt-0 mt-lg-0"><span class="fw-bold">Forgot Your Password</span>
          </div>
        </div>
      </div>
    </div>
    <!--End Collection Banner-->

    <!--Container-->
    <div class="container">
      <!--Main Content-->
      <div class="row">
        <div class="box col-12 col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
          <form action="{{ route('buyer.forgot-password') }}" method="post" accept-charset="UTF-8"
            class="customer-form mt-2 mt-lg-5">
            @csrf
            <h3 class="h4 text-uppercase mb-2" style="font-family:Playfair Display!important;font-weight:bold;">Reset your password</h3>
            <p>Please enter your email address below. You will receive a link to reset your password.</p>
            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="CustomerEmail" class="d-none">Email Address <span class="required">*</span></label>
                  <input type="email" value="{{ old('email') }}" name="email" placeholder="Email" maxlength="100"
                    id="CustomerEmail" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
                <p class="d-flex-center">
                  <input type="submit" class="ps-btn pink-bg ps-fullwidth text-center signup-form-btn" value="Password Reset">
                  <a href="{{ route('home') }}"><i class="align-middle icon an an-an-double-left me-2"></i>Back To
                    Home</a>
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--End Main Content-->
    </div>
    <!--End Container-->
  </div>
  <!--End Body Container-->
@endsection
