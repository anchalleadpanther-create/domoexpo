@extends('customer.partials.header')
@section('customerContent')
  <!--Body Container-->
  <div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
      <div class="collection-hero">
        <div class="collection-hero__image"></div>
        <div class="collection-hero__title-wrapper container">
          <h1 class="collection-hero__title">Login</h1>
          <div class="breadcrumbs text-uppercase mt-1 mt-lg-2"><a href="{{ route('home') }}"
              title="Back to the home page">Home</a><span>|</span><span class="fw-bold">Login</span>
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
          <form class="mt-2 mt-lg-5 login-form">
            @csrf
            <h3 class="h4 text-uppercase mb-2">Login</h3>
            <p>Please enter your login credentials below.</p>
            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="CustomerEmail" class="d-none">Email <span class="required">*</span></label>
                  <input type="email" name="login_email" placeholder="Email" id="CustomerEmail" required="">
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="CustomerPassword" class="d-none">Password <span class="required">*</span></label>
                  <input type="password" name="password" placeholder="Password" id="CustomerPassword" required="">
                  <a href="{{ route('buyer.forgot-password') }}">
                    <p class="small mt-2">Forgot password?</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="text-left col-12 col-sm-12 col-md-12 col-lg-12">
                <p class="d-flex-center">
                  <input type="submit" class="btn rounded me-auto" value="Login">
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
