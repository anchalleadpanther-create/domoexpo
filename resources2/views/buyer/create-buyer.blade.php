@extends('user.header')
@section('userContent')

  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <form action="{{ route('admin.buyers.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">

              <div class="row">

                <div class="col-md-8 ">
                  <div class="box">
                    <div class="box-header">
                      <h4 class="box-title">Authorised Representative (AR)</h4>
                    </div>

                    <div class="box-body">
                      <div class="inner-user-div4">
                          
                          
                          
                        <div class="row">
                            
                            
                          
                            
                            
                            
                            
                            

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">First Name</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="First Name" maxlength="100"
                                  name="first_name" value="{{ old('first_name') }}" required>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Last Name</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="Last Name" maxlength="100"
                                  name="last_name" value="{{ old('last_name') }}" required>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">E-Mail</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="email" class="form-control" placeholder="E-Mail" maxlength="150"
                                  name="email" value="{{ old('email') }}" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Phone No</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" min="0" class="form-control" placeholder="Phone No"
                                  name="phone" value="{{ old('phone') }}">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                              <label for="CustomerPassword" class="form-label text-success">Password <span
                                  class="required">*</span></label>
                              <input id="CustomerPassword" class="form-control" type="password" name="password"
                                min="6" placeholder="Password" required="">
                            </div>
                          </div>
                          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                              <label for="CustomerConfirmPassword" class="form-label text-success">Confirm Password <span
                                  class="required">*</span></label>
                              <input id="CustomerConfirmPassword" class="form-control" type="password"
                                name="password_confirmation" min="6" placeholder="Confirm Password" required="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Address</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength="100"
                                  name="address_one" value="{{ old('address_one') }}">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Post Code</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" min="0" class="form-control" placeholder="Post Code"
                                  name="post_code" value="{{ old('post_code') }}" pattern="[0-9]{10}">
                              </div>
                            </div>
                          </div>

                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                              <label>Country <span class="required">*</span></label>
                              <select class="form-select countries" name="country" onchange="getStates(this)"
                                data-class=".states" required>
                                <option value="">Select</option>
                                @foreach (getCountries() as $country)
                                  <option @if (old('country') == $country->id) selected @endif value="{{ $country->id }}">
                                    {{ $country->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>State <span class="required">*</span></label>
                              <select class="form-select states" name="state" onchange="getCities(this)"
                                data-class=".cities" required>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>City <span class="required">*</span></label>
                              <select class="form-select cities" name="city" required>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12 my-3">
                            <div class="row">
                              <div class="col px-0">
                                <div class="form-check px-2">
                                  <input class="form-check-input form-control-color" type="radio" name="address_type"
                                    id="addressRadio1" value="Home address" checked>
                                  <label class="form-check-label" for="addressRadio1">
                                    Home Address
                                  </label>
                                </div>
                              </div>
                              <div class="col px-0">
                                <div class="form-check px-2">
                                  <input class="form-check-input form-control-color" type="radio" name="address_type"
                                    id="addressRadio2" value="Office address">
                                  <label class="form-check-label" for="addressRadio2">
                                    Office Address
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12 my-3">
                            <button class="btn btn-success">Save</button>
                          </div>


                        </div>



                      </div>

                    </div>
                  </div>
                </div>

              </div>

            </div>
            <!-- /.box -->

          </form>
        </div>
        <!-- /.col-->
      </section>
    </div>
    <!-- ./row -->

    <!-- /.content -->
  </div>
@endsection
