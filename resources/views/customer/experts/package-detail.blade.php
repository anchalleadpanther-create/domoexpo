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
              <h2 class="collection-hero__title text-white mt-2 mb-2"> PACKAGE | {{ $package->name }} </h2>
              <!--p class="collection__subtitle fs-5 text-white mb-0">Home | FEI Experts | Expert Details</p-->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--End Spring Summer Product Slider-->
    <div class="grid-products grid--view-items prd-grid mt-3 pt-2">
      <div class="container">
        <div class="row all-products wishlist-div">

          <div class="col-4 col-sm-3 col-md-3 item product-item d-flex d-md-block align-items-center">
            <div class="product-image cat_product-image" style="height:auto">
              <a href="#" class="product-img">
                <img class="primary  blur-up lazyloaded"
                  data-src="{{ isset($package->expert->photo) ? asset('uploads/buyer') . '/' . $package->expert->photo : asset('allUsers/customer/images/logo-new.png') }}"
                  src="{{ isset($package->expert->photo) ? asset('uploads/buyer') . '/' . $package->expert->photo : asset('allUsers/customer/images/logo-new.png') }}"
                  alt="{{ $package->expert->expertFullName }}" title="{{ $package->expert->expertFullName }}"
                  style="opacity:1 !important">
              </a>
            </div>
          </div>
          <div class="col-8 col-sm-9 col-md-9 item product-item d-block d-md-none my-auto text-left">
            <h3 class="mt-0 mb-0">{{ $package->expert->expertFullName }}</h3>
            <p class="mt-0 mb-0">{{ $package->name }}</p>
            <h6>INR {{ number_format($package->price, 2) }}/{{ $package->duration }}</h6>
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#videoModal" class="mt-0 mb-0 text-pink">Watch
              Video</a>
          </div>
          <div class="col-12 col-sm-9 col-md-9 item product-item">

            <div class="section-header text-left">
              <div class="d-none d-md-block">
                <h3 class="mt-0 mb-0">{{ $package->expert->expertFullName }}</h3>
                <p class="mt-0 mb-0">{{ $package->name }}</p>
                <h6>INR {{ number_format($package->price, 2) }}/{{ $package->duration }}</h6>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#videoModal"
                  class="mt-0 mb-0 text-pink">Watch
                  Video</a>
              </div>
              <p>
                {!! htmlspecialchars_decode($package->long_description) !!}
              </p>
              {{-- <p>
                {!! htmlspecialchars_decode($package->inclusions) !!}

              </p> --}}
              @isset($package->photo)
                <img class="primary  blur-up lazyloaded" data-src="{{ asset('uploads/package') . '/' . $package->photo }}"
                  src="{{ asset('uploads/package') . '/' . $package->photo }}"
                  alt="{{ $package->expert->expertFullName }}" title="{{ $package->expert->expertFullName }}"
                  style="opacity:1 !important" />
              @endisset
              {{-- <iframe class="mt-3" style="width:100%;height:400px"
                src="https://www.youtube.com/embed/ouMmd5hg2Ws?controls=1" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe> --}}
            </div>

            <form class="policy_tab__ text-left package-booking-form">
              <input type="hidden" name="package_id" value="{{ Request::segment(3) }}" />
              <input type="hidden" name="expert_id" value="{{ $package->expert->id }}" />
              <h3>Book A Session With {{ $package->expert->expertFullName }}</h3>
              <div class="row">
                <div class="col-sm-4">
                  <div class="input-group mb-2">
                    <input type="text" class="" value="{{ Auth::guard('buyer')?->user()?->fullName }}"
                      placeholder="Name" name="name">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group mb-2">
                    <input type="email" class="" value="{{ Auth::guard('buyer')?->user()?->email }}"
                      placeholder="Email Address" name="email">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group mb-2">
                    <input type="text" class="" value="{{ Auth::guard('buyer')?->user()?->phone }}"
                      placeholder="Phone Number" name="phone">
                  </div>
                </div>
                <div class="col-sm-3 d-none">
                  <div class="input-group mb-2">
                    <select name="type">
                      <option value="">Select Counseling Type</option>
                      <option value="Fertility Counseling">Fertility Counseling</option>
                      <option value="Parenting Issues As A Couple Counseling">Parenting Issues As A Couple Counseling
                    </select>
                  </div>
                </div>
              </div>

              <div class="input-group mb-2 radio_opn mt-2">
                <label for="p"><b>Preferred Mode of Counseling</b></label>
                {{-- <p class="mb-0 d-flex align-items-center">
                  <input type="radio" id="p" name="pmco" value="Skype Video Call" required=""
                    onBlur="pradiobtn(form)" />&nbsp;<img src="allUsers/customer/images/s-cl.png"
                    style="width:15px">&nbsp;&nbsp;<span class="space">Skype Video Call</span>
                </p> --}}
                <p class="mb-0 d-flex align-items-center">

                  <input type="radio" id="p" name="mode" value="Google Meet"
                    onBlur="pradiobtn(form)" />&nbsp; <img src="{{ asset('allUsers/customer/images/g-cl.png') }}"
                    style="width:15px">&nbsp;&nbsp;<span class="space">Google Meet Video Call</span>
                </p>
                <p class="mb-0 d-flex align-items-center">

                  <input type="radio" id="p" name="mode" value="Zoom Call"
                    onBlur="pradiobtn(form)" />&nbsp;<img src="{{ asset('allUsers/customer/images/z-cl.png') }}"
                    style="width:15px">&nbsp;&nbsp;<span class="space">Zoom Video Call</span>
                </p>
                <p class="mb-0 d-flex align-items-center">

                  <input type="radio" id="p" name="mode" value="Phone Call"
                    onBlur="pradiobtn(form)" />&nbsp;<img src="{{ asset('allUsers/customer/images/z-cl.png') }}"
                    style="width:15px">&nbsp;&nbsp;<span class="space">Phone Voice Call</span>
                </p>

              </div>

              <div class="row mt-3">
                <div class="col-sm-4">
                  <div class="input-group mb-2">
                    <label for="Date"><b>Date of Appointment</b></label>
                    <select class="form-control w-100 selected-date rounded" name="date">
                      <option value="">Select</option>
                      @foreach (\Carbon\CarbonPeriod::create(
          now()->format('Y-m-d'),
          now()->addDays(14)->format('Y-m-d'),
      ) as $date)
                        <option value="{{ $date->format('Y-m-d') }}">{{ $date->format('F j, D, Y') }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group mb-2">
                    <label for="Time"><b>Time of Appointment</b></label>
                    <select class="form-control w-100 time-slots rounded" name="time">
                      <option value="">Select date</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group mb-2 radio_opn">
                    <label for="p"><b>Select Payment Currency</b></label>
                    <p class="mb-0" style=" width: 45% !important; margin-right:4%">
                      <input type="radio" id="p" checked required="" name="payment"
                        value="{{ $package->price }}" />
                      &nbsp;<span class="space"> INR {{ number_format($package->price, 2) }}</span>
                    </p>
                    {{-- <p class="mb-0" style=" width: 45% !important;"><input type="radio" id="p"
                        name="paym" value="$" required="">&nbsp;<span class="space">$ 25</span></p> --}}

                  </div>
                </div>


              </div>
              <div class="input-group mb-2 mt-2">
                <label><b>What do you need help with? Describe in brief (optional)</b></label>
                <textarea type="text" name="help" maxlength="255"></textarea>
              </div>


              <div class="input-group mb-2">
                <p><input type="checkbox" required="" /> By
                  sending request you agree to our Terms of Use and Privacy Policy, as well as receiving emails and
                  messages from FEI. </p>
              </div>


              <div class="form-group col-12 col-sm-12 ">
                <button class="btn rounded book-btn" style="width:100%">Book My Session</button>
              </div>
            </form>
          </div>



        </div>

      </div>
    </div>


    <!--End Spring Summer Product Slider-->
    <div class="grid-products grid--view-items prd-grid mt-4 d-none">
      <div class="container">
        <div class="row all-products wishlist-div">
          <h3>Similar Experts</h3>


          <div class="col-xs-6 col-sm-3 col-md-3 item product-item mb-5">
            <div class="product-image cat_product-image" style="height:auto">
              <a href="" class="product-img">
                <img class="primary  blur-up lazyloaded"
                  data-src="{{ asset('allUsers/customer/images/experts-img0.jpg') }}"
                  src="{{ asset('allUsers/customer/images/experts-img0.jpg') }}" alt="" title=""
                  style="opacity:1 !important">
              </a>
            </div>
            <div class="product-details text-left">
              <div class="product-name text-uppercase">
                <a href="" class="fw-600">
                  Dr Ayush Shukla</a>
                <p style="margin-bottom:0">Nutrition</p>
                <h6>₹1200 ($25)/60 Mins</h6>
                <a href="" class="btn rounded"
                  style="font-size: 11px;font-weight: normal;width:100%;padding:8px !important">EXPLORE PACKAGES</a>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-3 col-md-3 item product-item mb-5">
            <div class="product-image cat_product-image" style="height:auto">
              <a href="#" class="product-img">
                <img class="primary  blur-up lazyloaded"
                  data-src="{{ asset('allUsers/customer/images/experts-img3.jpg') }}"
                  src="{{ asset('allUsers/customer/images/experts-img3.jpg') }}" alt="" title=""
                  style="opacity:1 !important">
              </a>
            </div>
            <div class="product-details text-left">
              <div class="product-name text-uppercase">
                <a href="#" class="fw-600">
                  Dr Ayush Shukla</a>
                <p style="margin-bottom:0">Skin Care</p>
                <h6>₹1200 ($25)/60 Mins</h6>
                <a href="" class="btn rounded"
                  style="font-size: 11px;font-weight: normal;width:100%;padding:8px !important">EXPLORE PACKAGES</a>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-3 col-md-3 item product-item mb-5">
            <div class="product-image cat_product-image" style="height:auto">
              <a href="#" class="product-img">
                <img class="primary  blur-up lazyloaded"
                  data-src="{{ asset('allUsers/customer/images/experts-img2.jpg') }}"
                  src="{{ asset('allUsers/customer/images/experts-img2.jpg') }}" alt="" title=""
                  style="opacity:1 !important">
              </a>
            </div>
            <div class="product-details text-left">
              <div class="product-name text-uppercase">
                <a href="#" class="fw-600">
                  Dr Ayush Shukla</a>
                <p style="margin-bottom:0">Make Up</p>
                <h6>₹1200 ($25)/60 Mins</h6>
                <a href="" class="btn rounded"
                  style="font-size: 11px;font-weight: normal;width:100%;padding:8px !important">EXPLORE PACKAGES</a>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-3 col-md-3 item product-item mb-5">
            <div class="product-image cat_product-image" style="height:auto">
              <a href="#" class="product-img">
                <img class="primary  blur-up lazyloaded"
                  data-src="{{ asset('allUsers/customer/images/experts-img3.jpg') }}"
                  src="{{ asset('allUsers/customer/images/experts-img3.jpg') }}" alt="" title=""
                  style="opacity:1 !important">
              </a>
            </div>
            <div class="product-details text-left">
              <div class="product-name text-uppercase">
                <a href="#" class="fw-600">
                  Dr Ayush Shukla</a>
                <p style="margin-bottom:0">Self Love</p>
                <h6>₹1200 ($25)/60 Mins</h6>
                <a href="" class="btn rounded"
                  style="font-size: 11px;font-weight: normal;width:100%;padding:8px !important">EXPLORE PACKAGES</a>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

    <!--Spring Summer Product Slider-->
  </div>
  </div>
  <!--End Body Container-->
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script type="module" src="{{ asset('allUsers/customer/package-booking.js') }}"></script>
  <x-customer.video-modal url="https://www.youtube.com/embed/ouMmd5hg2Ws?controls=1" />
@endsection
