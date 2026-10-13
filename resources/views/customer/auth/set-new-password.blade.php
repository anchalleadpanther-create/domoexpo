@extends('customer.partials.header')
@section('customerContent')
  <!--Body Container-->
  <div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
      <div class="collection-hero">
        <div class="collection-hero__image"></div>
        <div class="collection-hero__title-wrapper container">
          <h1 class="collection-hero__title">Set New Password</h1>
          <div class="breadcrumbs text-uppercase mt-1 mt-lg-2"><a href="{{ route('home') }}"
              title="Back to the home page">Home</a><span>|</span><span class="fw-bold">Set New Password</span>
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
          <form action="{{ route('buyer.set-new-password') }}" method="post" accept-charset="UTF-8"
            class="customer-form mt-2 mt-lg-5">
            @csrf
            <input type="hidden" name="token" value="{{ Request::segment(3) }}">
            <input type="hidden" name="email" value="{{ Request::segment(4) }}">
            <h3 class="h4 text-uppercase mb-2">Reset your password</h3>
            <p>Please enter new password below.</p>
            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="password" class="d-none">Password <span class="required">*</span></label>
                  <input type="password" name="password" placeholder="New password" maxlength="100" id="password"
                    required />
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="confirm-password" class="d-none">Confirm Password <span class="required">*</span></label>
                  <input type="password" name="password_confirmation" placeholder="Confirm password" maxlength="100"
                    id="confirm-password" required />
                </div>
              </div>

            </div>
            <div class="row">
              <div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
                <p class="d-flex-center">
                  <input type="submit" class="btn rounded me-auto" value="Reset">
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
