@extends('user.header')
@section('userContent')
  @include('extensions.sweet-alert')

  <body class="hold-transition theme-primary bg-img"
    style="background: url({{ asset('allUsers/user/images/tfe-admin-login-1.jpg') }});background-repeat: no-repeat;background-size: cover;">

    <div class="container h-p100 bg-clr">
      <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
          <div class="row justify-content-end g-0">
            <div class="col-lg-5 col-md-5 col-12"></div>
            <div class="col-lg-4 col-md-4 col-12">
              <div class="rounded10 glass-transparent"
                style="background: rgba( 255, 255, 255, 0.3 );
                  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                  backdrop-filter: blur( 14.5px );
                  -webkit-backdrop-filter: blur( 14.5px );
                  border-radius: 10px;
                  border: 1px solid rgba( 255, 255, 255, 0.18 );">
                <div class="content-top-agile p-20 pb-0">
                  <div class="logo-lg">
                    <span class="light-logo"><img src="{{ asset('allUsers/logo.png') }}" alt="logo"
                        style="max-height:50px"></span>
                  </div>
                  <h2 class="text-white-50"> Admin Panel</h2>
                  <p class="mb-0 text-white-50">Sign in to continue to Admin Panel.</p>
                </div>
                <div class="p-40">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <div class="input-group mb-3 border-white">
                        <span class="input-group-text bg-transparent border-white"><i
                            class="ti-user text-white"></i></span>
                        <input type="email" name="email"
                          class="form-control email-input ps-15 bg-transparent border-white" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group mb-3 border-white">
                        <span class="input-group-text  bg-transparent border-white"><i
                            class="ti-lock text-white"></i></span>
                        <input type="password" name="password" required autocomplete="current-password"
                          class="form-control pass-input ps-15 bg-transparent border-white" placeholder="Password">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center">
                        <button type="submit" class="btn btn-dark mt-10">SIGN IN</button>
                      </div>
                    </div>
                  </form>
                  <div class="text-center">
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
