@extends('customer.partials-fn.buyer.header')
@section('content')
<script src="{{asset('allUsers/axios.js')}}"></script>
<link rel="stylesheet" href="https://christianbayer.github.io/image-uploader/dist/image-uploader.min.css">

<!-- Main Container -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 offset-lg-2">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5">
                    <h2>Tell Us About Your Business for Better Matches</h2>
                    <p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.</p>

                </div>


                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="accordion" id="accordionExample">
                            <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                                <div class="card-header  p-4" data-toggle="collapse" data-target="#companyProfileSection" aria-expanded="true">
                                    <span class="title text-dark"> Company Information </span>
                                    <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                                </div>
                                <div id="companyProfileSection" class="collapse current show py-4" data-parent="#accordionExample">
                                    <form class="ActiveForm" action="{{route('buyer.quantity-surveyor.store')}}" method="post" enctype="multipart/form-data">
                                        <input class="form-control" name="parent_id" value="{{ auth()->guard('buyer')->user()->id }}" type="hidden" placeholder="">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- Account Type --}}
                                                <div class="col-sm-12 my-2">
                                                    <h5>Account Type :</h5>
                                                    <select class="form-control" name="account_type" id="account_type" {{ isset($qs) ? 'disabled' : '' }} readonly>
                                                        <option value="Quantity Surveyor" {{ old('account_type', $qs->account_type ?? '') == "Quantity Surveyor" ? "selected" : "" }}>Quantity Surveyor</option>
                                                    </select>
                                                </div>

                                                {{-- Contractor Type (only show if account_type is Contractor) --}}
                                                @if(old('account_type', $qs->account_type ?? '') == "Contractor")
                                                <div class="col-sm-12">
                                                    <div class="form-group mb-4">
                                                        <label class="mb-2">Contractor Type</label>
                                                        <select class="form-select" name="contractor_type[]" multiple required>
                                                            <option value="">Select</option>
                                                            @foreach(getDropdowns('Contractor Type')->dropdownValues as $value)
                                                            <option value="{{ $value->dropdown_value }}" @if(in_array($value->dropdown_value, old('contractor_type', $qs->contractor_type ?? []))) selected @endif>
                                                                {{ $value->dropdown_value }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @endif

                                                {{-- Company Name --}}
                                                <div class="col-sm-6 my-2">
                                                    <h5>Company Name :</h5>
                                                    <input class="form-control" name="company_name" value="{{ old('company_name', $qs->company_name ?? '') }}" type="text" />
                                                </div>

                                                {{-- Registration Number --}}
                                                <div class="col-sm-6 my-2">
                                                    <h5>Registration Number :</h5>
                                                    <input class="form-control" name="registration_no" value="{{ old('registration_no', $qs->registration_no ?? '') }}" type="text" />
                                                </div>

                                                {{-- VAT Number --}}
                                                <div class="col-sm-6 my-2">
                                                    <h5>VAT Number :</h5>
                                                    <input class="form-control" name="vat_no" value="{{ old('vat_no', $qs->vat_no ?? '') }}" type="text" />
                                                </div>

                                                {{-- Telephone Number with Code --}}
                                                <div class="col-sm-6 my-2">
                                                    <h5>Telephone No. :</h5>
                                                    <div class="row">
                                                        <div class="col-4 pr-1">
                                                            <select class="form-select phonecode" name="telephone_code" id="companyphonecode" style="padding: 0; text-align: center;">
                                                                @foreach (getCountries() as $country)
                                                                <option value="{{ $country->phonecode }}" {{ $country->phonecode == old('telephone_code', $qs->telephone_code ?? '357') ? 'selected' : '' }}>
                                                                    {{ $country->phonecode }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-8 pl-1">
                                                            <input class="form-control" name="telephone_no" value="{{ old('telephone_no', $qs->telephone_no ?? '') }}" type="text" />
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Address --}}
                                                <div class="col-sm-12 my-2">
                                                    <h5>Address :</h5>
                                                    <input class="form-control" name="address" value="{{ old('address', $qs->address ?? '') }}" type="text" />
                                                </div>

                                                {{-- Company Email --}}
                                                <div class="col-sm-6 my-2">
                                                    <h5>Company Email :</h5>
                                                    <input class="form-control" name="company_email" value="{{ old('company_email', $qs->company_email ?? '') }}" type="email" />
                                                </div>

                                                {{-- Contact Person Name --}}
                                                <div class="col-sm-6 my-2">
                                                    <h5>Contact Person Name :</h5>
                                                    <input class="form-control" name="first_name" value="{{ old('first_name', $qs->first_name ?? '') }}" type="text" />
                                                </div>

                                                {{-- Contact Person Surname --}}
                                                <div class="col-sm-6 my-2">
                                                    <h5>Contact Person Surname :</h5>
                                                    <input class="form-control" name="last_name" value="{{ old('last_name', $qs->last_name ?? '') }}" type="text" />
                                                </div>

                                                {{-- Contact Person Email --}}
                                                <div class="col-sm-6 my-2">
                                                    <h5>Contact Person Email :</h5>
                                                    <input class="form-control" name="email" value="{{ old('email', $qs->email ?? '') }}" type="email" />
                                                </div>

                                                {{-- Mobile Number with Code --}}
                                                <div class="col-sm-6 my-2">
                                                    <h5>Mobile No. :</h5>
                                                    <div class="row">
                                                        <div class="col-4 pr-1">
                                                            <select class="form-select phonecode" name="phonecode" id="phonecode-select" style="padding: 0; text-align: center;">
                                                                @foreach (getCountries() as $country)
                                                                <option value="{{ $country->phonecode }}" {{ $country->phonecode == old('phonecode', $qs->phonecode ?? '357') ? 'selected' : '' }}>
                                                                    {{ $country->phonecode }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-8 pl-1">
                                                            <input class="form-control" name="phone" value="{{ old('phone', $qs->phone ?? '') }}" type="text" />
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Optional Password Fields --}}
                                                @if(!isset($qs))
                                                <div class="col-sm-6 my-2">
                                                    <h5>Password :</h5>
                                                    <input class="form-control" name="password" type="password" />
                                                </div>

                                                <div class="col-sm-6 my-2">
                                                    <h5>Confirm Password :</h5>
                                                    <input class="form-control" name="password_confirmation" type="password" />
                                                </div>
                                                @endif
                                                
                                                <div class="col-sm-12 my-2">
                                                    <input class="btn btn-primary" name="submit" type="submit" />
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="col-lg-12 mt-5">
                    <div class="accordion" id="accordionExample">
                        <div class="card"  style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                          <div class="card-header  p-4" data-toggle="collapse" data-target="#companyProfileSection" aria-expanded="true">     
                             <span class="title text-dark"> Change Password </span>
                             <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                          </div>
                          
                          <form action="{{route('buyer.set-new-password')}}" method="post">
                    @csrf
                    <div id="companyProfileSection" class="collapse show py-4" data-parent="#accordionExample">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-6 my-2">
                                    <h5 for="first_name"> Email Address :</h5>
                                    <input class="form-control" type="text" name="email" value="{{ $user->email }}" readonly />
                                </div>

                                <div class="col-lg-6 my-2">
                                    <h5 for="last_name">Current Password :</h5>
                                    <input class="form-control" type="password" id="current_password" name="current_password" value="" required />
                                </div>
                                <div class="col-lg-6  my-2">
                                    <h5 for="email">New Password :</h5>
                                    <input class="form-control" type="password" id="new_password" name="password" value="" required />
                                </div>
                                <div class="col-lg-6  my-2">
                                    <h5 for="phone">Confirm New Password :</h5>
                                    <input class="form-control" type="password" id="confirm_new_password" name="password_confirmation" value="" required />
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <button class="ps-btn ps-btn--sm blue-bg px-4">SUBMIT</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div> --}}


    </div>




</div>
</div>
</div>
</div>
<!-- Main Container -->


{{--
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('buyer.address.store')}}" class="customer-form new-address-form" method="post">
                @csrf
                <input type="hidden" name="rfq_id" id="rfq_id_for_change_status">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">First Name <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="first_name" maxlength="50" id="firstName" value="" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName">Last Name <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="last_name" maxlength="50" id="lastName" value="" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customerEmail">Email <span class="required">*</span></label>
                                        <input type="email" class="form-control" name="address_email" maxlength="100" id="customerEmail" value="" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customerMobile">Phone <span class="required">*</span></label>
                                        <input type="number" class="form-control" min="0" name="address_mobile" pattern="[0-9]{10}" id="customerMobile" value="" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="customerAddress">Address <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="address_one" maxlength="100" id="customerAddress" value="" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="customerPostcode">Postcode <span class="required">*</span></label>
                                        <input type="text" class="form-control" min="1" maxlength="20" name="post_code" id="customerPostcode" value="" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="form-control countries" name="country" onchange="getStates(this)" data-class=".states">
                                            <option value="">Select</option>
                                            @foreach(getCountries() as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State <span class="required">*</span></label>
                                        <select class="form-select states" name="state" onchange="getCities(this)" data-class=".cities">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City <span class="required">*</span></label>
                                        <select class="form-select cities" name="city">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 my-3">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" name="address_type" id="addressRadio1" value="Home address" checked="">
                                                <label class="form-check-label" for="addressRadio1">
                                                    Home Address
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" name="address_type" id="addressRadio2" value="Office address">
                                                <label class="form-check-label" for="addressRadio2">
                                                    Office Address
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

--}}
<!--<script type="module" src="{{asset('allUsers/customer/buyer-profile.js')}}"></script>-->
<!--<script type="module" src="{{asset('allUsers/customer/new-address.js')}}"></script>-->
<!--<script type="text/javascript" src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>-->


<!--<script type="text/javascript" src="https://christianbayer.github.io/image-uploader/dist/image-uploader.min.js"></script>-->




@endsection