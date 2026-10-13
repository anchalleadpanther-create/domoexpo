@extends('user.header')
@section('userContent')
  
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <form action="{{ route('admin.suppliers.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">

              <div class="row">
                <div class="col-xl-8 col-12">

                  <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="home4" role="tabpanel">
                          <div class="col-sm-12">
                            {{--  --}}
                            <div class="row grey-bg-clr">
                              <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg> Designer Status</h5>
                              <div class="col-md-12">
                                <hr>
                              </div>
                              <div class="clearfix"></div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Select Status</label>
                                  <select class="single" name="supplier_status">
                                    <option>Select</option>
                                    <option @if (old('supplier_status') === '1') selected @endif value="1">Approved
                                      Supplier
                                    </option>
                                    <option @if (old('supplier_status') === '2') selected @endif value="2">Disapprove
                                      Supplier</option>
                                    <option @if (old('supplier_status') === '3') selected @endif value="3">On Hold
                                      Supplier
                                    </option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Status Reason</label>
                                  <select class="single" name="supplier_status_reason">
                                    <option value="">Select</option>
                                    <option @if (old('supplier_status_reason') === 'Document Incomplete') selected @endif value="Document Incomplete">
                                      Document Incomplete
                                    </option>
                                    <option @if (old('supplier_status_reason') === 'Criteria Mismatch') selected @endif value="Criteria Mismatch">
                                      Criteria Mismatch</option>
                                    <option @if (old('supplier_status_reason') === 'Wrong Information') selected @endif value="Wrong Information">
                                      Wrong Information</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Status Comment</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Status Comment"
                                      maxlength="100" name="supplier_status_comment"
                                      value="{{ old('supplier_status_comment') }}">
                                  </div>
                                </div>
                              </div>
                            </div>
                            {{--  --}}
                            <div class="row grey-bg-clr">
                              <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg> Business Info</h5>
                              <div class="col-md-12">
                                <hr>
                              </div>
                              <div class="clearfix"></div>

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Business Name *</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Business Name *"
                                      maxlength="100" name="biz_name" value="{{ old('biz_name') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Business Email</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="email" class="form-control" placeholder="Business Email"
                                      maxlength="150" name="biz_email" value="{{ old('biz_email') }}">
                                  </div>
                                </div>
                              </div>
                              <!--    <div class="col-md-4">-->
                              <!--        	<div class="form-group">-->
                              <!--	<label for="intType3" class="form-label text-success">Select Builder</label>-->
                              <!--	<select class="form-select" id="intType3" data-placeholder="Type to search cities" name="intType3">-->
                              <!--		<option value="Banquet">Company Type 1</option>-->
                              <!--		<option value="Fund Raiser">Company Type 2</option>-->
                              <!--	</select>-->
                              <!--</div>-->
                              <!--    </div>-->
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Business Phone</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Business Phone"
                                      maxlength="20" name="biz_phone" value="{{ old('biz_phone') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Business Website</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Business Website"
                                      maxlength="1000" name="biz_website" value="{{ old('biz_website') }}">
                                  </div>
                                </div>
                              </div>
                              {{-- @if (getDropdowns('Business Industry')->displayflag === 1)
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="form-label text-success">Product Selling Industry</label>
                                    <select class="single" data-placeholder="Search" name="product_selling_industry[]"
                                      @if (getDropdowns('Business Industry')->dropdown_type === 'multiple') multiple @endif>
                                      @foreach (getDropdowns('Business Industry')->dropdownValues as $dropdown)
                                        <option
                                          @if (old('product_selling_industry') != null) @if (in_array($dropdown->id, old('product_selling_industry'))) selected @endif
                                          @endif value="{{ $dropdown->id }}">
                                          {{ $dropdown->dropdown_value }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              @endif

                              @if (getDropdowns('Business Industry')->displayflag === 1)
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="form-label text-success">Service Selling Industry</label>
                                    <select class="single" data-placeholder="Search" name="service_selling_industry[]"
                                      @if (getDropdowns('Business Industry')->dropdown_type === 'multiple') multiple @endif>
                                      @foreach (getDropdowns('Business Industry')->dropdownValues as $dropdown)
                                        <option
                                          @if (old('service_selling_industry') != null) @if (in_array($dropdown->id, old('service_selling_industry'))) selected @endif
                                          @endif value="{{ $dropdown->id }}">
                                          {{ $dropdown->dropdown_value }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              @endif
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Can Ship To</label>
                                  <select class="single" data-placeholder="Search" name="can_ship_to[]" multiple>
                                    @foreach (getCountries() as $dropdown)
                                      <option
                                        @if (old('can_ship_to') != null) @if (in_array($dropdown->id, old('can_ship_to'))) selected @endif
                                        @endif value="{{ $dropdown->id }}">
                                        {{ $dropdown->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Can Ship From</label>
                                  <select class="single" data-placeholder="Search" name="can_ship_from[]" multiple>
                                    @foreach (getCountries() as $dropdown)
                                      <option
                                        @if (old('can_ship_from') != null) @if (in_array($dropdown->id, old('can_ship_from'))) selected @endif
                                        @endif value="{{ $dropdown->id }}">
                                        {{ $dropdown->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Number of Staff</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Number of Staff"
                                      maxlength="100" name="biz_no_of_staff" value="{{ old('biz_no_of_staff') }}">
                                  </div>
                                </div>
                              </div> --}}
                              @if (getDropdowns('Company Type')->displayflag === 1)
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label
                                      class="form-label text-success">{{ getDropdowns('Company Type')->dropdown_name }}</label>
                                    <select class="single" name="biz_company_type"
                                      @if (getDropdowns('Company Type')->dropdown_type === 'multiple') multiple @endif>
                                      <option value="">Select</option>
                                      @foreach (getDropdowns('Company Type')->dropdownValues as $dropdown)
                                        <option @if (old('biz_company_type') === $dropdown->dropdown_value) selected @endif
                                          value="{{ $dropdown->dropdown_value }}">
                                          {{ $dropdown->dropdown_value }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              @endif

                              {{-- <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Supplier Type</label>
                                  <select class="single" name="biz_supplier_type">
                                    <option value="">Select</option>
                                    <option @if (old('biz_supplier_type') === 'Products Supplier') selected @endif
                                      value="Products Supplier">
                                      Products Supplier</option>
                                    <option @if (old('biz_supplier_type') === 'Service Supplier') selected @endif value="Service Supplier">
                                      Service Supplier</option>
                                    <option @if (old('biz_supplier_type') === 'Product & Service Supplier') selected @endif
                                      value="Product & Service Supplier">
                                      Product & Service Supplier</option>
                                  </select>
                                </div>
                              </div> --}}

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success ">Upload Company Logo </label>
                                  <input class="form-control" id="formFileSm" type="file" name="biz_logo"
                                    accept="image/*" />
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success ">Upload Banner
                                    [1000X400]</label>
                                  <input class="form-control" id="formFileSm" type="file"
                                    name="biz_supplier_banner_file" accept="image/*" />
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success ">Feature on Home Page</label>
                                  <select class="single" name="featured">
                                    <option value="">Select</option>
                                    <option {{ old('featured') === '1' ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{ old('featured') === '0' ? 'selected' : '' }} value="0">No</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label ">Designer Certificate [MAX: 2MB]</label>
                                  <input class="form-control" id="formFileSm" name="designer_certificate"
                                    type="file" accept="image/*, .pdf">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label ">Designer Re-Seller Auth Letter [MAX:
                                    2MB]</label>
                                  <input class="form-control" id="formFileSm" name="designer_reseller_auth_letter"
                                    type="file" accept="image/*, .pdf">
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="form-label text-success">About Business/Supplier</label>
                                  <textarea maxlength="600" rows="4" class="form-control" name="biz_supplier_about">{{ old('biz_supplier_about') }}</textarea>
                                </div>
                              </div>

                            </div>

                            <div class="row mt-30">
                              <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg> Address
                                <div class="checkbox" style="float: right;">
                                  <input onchange="copyBizAddressToOffice(this);" type="checkbox" value="1"
                                    id="same_address" name="biz_same_office_address"
                                    @if (old('biz_same_office_address') === 1) checked @endif>
                                  <label for="same_address">Same Address</label>
                                </div>
                              </h5>

                              <div class="col-md-12">
                                <hr>
                              </div>
                              <div class="clearfix"></div>
                              <div class="row">

                                <div class="col-md-6">
                                  <h4>Business Address</h4>
                                  <hr>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="form-label text-success">Company</label>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                        <input type="text" class="form-control biz-company" placeholder="Company"
                                          maxlength="100" name="biz_company" value="{{ old('biz_company') }}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="form-label text-success">Address 1</label>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                        <input type="text" class="form-control biz-address" placeholder="Address 1"
                                          maxlength="250" name="biz_company_address"
                                          value="{{ old('biz_company_address') }}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="form-label text-success">Country</label>
                                        <select class="single biz-country" data-placeholder="Search countries"
                                          name="biz_company_country" onchange="getStates(this)"
                                          data-class=".biz-state">
                                          <option value="">Select</option>
                                          @foreach (getCountries() as $country)
                                            <option @if (old('biz_company_country') === $country->name) selected @endif
                                              value="{{ $country->id }}">
                                              {{ $country->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="biz-state" class="form-label text-success">Region / State</label>
                                        <select class="single biz-state" data-placeholder="Search states"
                                          id="biz-state" name="biz_company_state"
                                          onchange="localStorage.setItem('stateId', this.value);">
                                          <option value="">Select</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="form-label text-success">City</label>
                                        <div class="input-group mb-3">
                                          <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                          <input type="text" class="form-control biz-city" placeholder="City"
                                            maxlength="100" name="biz_company_city"
                                            value="{{ old('biz_company_city') }}">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="form-label text-success">Post Code</label>
                                        <div class="input-group mb-3">
                                          <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                          <input type="text" class="form-control biz-zip" placeholder="Post Code"
                                            maxlength="10" name="biz_company_zip"
                                            value="{{ old('biz_company_zip') }}">
                                        </div>
                                      </div>
                                    </div>


                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <h4>Office Address</h4>
                                  <hr>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="form-label text-success">Company</label>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                        <input type="text" class="form-control office-company" placeholder="Company"
                                          maxlength="100" name="biz_office_company"
                                          value="{{ old('biz_office_company') }}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="form-label text-success">Address 1</label>
                                      <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                        <input type="text" class="form-control office-address"
                                          placeholder="Address 1" maxlength="250" name="biz_office_address"
                                          value="{{ old('biz_office_address') }}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="form-label text-success">Country</label>
                                        <select class="single office-country" name="biz_office_country"
                                          data-placeholder="Search countries" onchange="getStates(this)"
                                          data-class=".office-state">
                                          <option value="">Select</option>
                                          @foreach (getCountries() as $country)
                                            <option @if (old('biz_office_country') === $country->name) selected @endif
                                              value="{{ $country->id }}">
                                              {{ $country->name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="form-label text-success">Region / State</label>
                                        <select class="single office-state" name="biz_office_state"
                                          data-placeholder="Search states">
                                          <option value="">Select</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="form-label text-success">City</label>
                                        <div class="input-group mb-3">
                                          <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                          <input type="text" class="form-control office-city" placeholder="City"
                                            maxlength="100" name="biz_office_city"
                                            value="{{ old('biz_office_city') }}">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="form-label text-success">Post Code</label>
                                        <div class="input-group mb-3">
                                          <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                          <input type="text" class="form-control office-zip" placeholder="Post Code"
                                            maxlength="10" name="biz_office_zip" value="{{ old('biz_office_zip') }}">
                                        </div>
                                      </div>
                                    </div>


                                  </div>
                                </div>

                              </div>

                            </div>

                            <div class="row mt-30 grey-bg-clr">
                              <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg> Registration Type</h5>
                              <div class="col-md-12">
                                <hr>
                              </div>
                              <div class="clearfix"></div>

                              {{-- <h4>Newsletter</h4>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="form-label text-success">Registered With</label>
                                </div>
                              </div>

                              <div class="col-md-9">
                                <div class="form-group">
                                  <input id="acra" type="radio" value="ACRA"
                                    @if (old('biz_reg_with') === 'ACRA') checked @endif name="biz_reg_with" />
                                  <label class="form-label text-success radio-inline" for="acra">ACRA</label>
                                  <input id="uen" type="radio" value="UEN Issuance Agencies"
                                    @if (old('biz_reg_with') === 'UEN Issuance Agencies') checked @endif name="biz_reg_with" />
                                  <label for="uen" class="radio-inline" style="margin-left:10px">UEN Issuance
                                    Agencies</label>
                                </div>
                              </div> --}}

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success "> Business Registration
                                    No.</label>
                                  <input class="form-control  " id="formFileSm" type="text"
                                    placeholder="Business Registration No." name="biz_reg_no" maxlength="40"
                                    value="{{ old('biz_reg_no') }}">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Business Reg Date</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="date" class="form-control" placeholder="" name="biz_reg_date"
                                      value="{{ old('biz_reg_date') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success ">Business Document or
                                    Proof</label>
                                  <input class="form-control  " id="formFileSm" type="file" name="biz_reg_file">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success "> GST No</label>
                                  <input class="form-control" id="formFileSm" type="text" maxlength="15"
                                    placeholder="Enter GST No." name="biz_reg_gst" value="{{ old('biz_reg_gst') }}">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success ">Upload GST Doc </label>
                                  <input class="form-control  " id="formFileSm" type="file"
                                    name="biz_reg_gst_file">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">GST No</label>
                                  <select class="single" name="biz_reg_gst_approve">
                                    <option value="">Select</option>
                                    <option @if (old('biz_reg_gst_approve' === 'Approve')) selected @endif value="Approve">Approve
                                    </option>
                                    <option @if (old('biz_reg_gst_approve' === 'Not Approve')) selected @endif value="Not Approve">Not
                                      Approve</option>

                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success "> PAN No</label>
                                  <input class="form-control  " id="formFileSm" type="text"
                                    placeholder="Enter PAN No." maxlength="10" name="biz_reg_pan_no"
                                    value="{{ old('biz_reg_pan_no') }}">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success ">Upload PAN Doc </label>
                                  <input class="form-control  " id="formFileSm" type="file"
                                    name="biz_reg_pan_file">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">PAN No</label>
                                  <select class="single" name="biz_reg_pan_approve">
                                    <option value="">Select</option>
                                    <option @if (old('biz_reg_pan_approve' === 'Approve')) selected @endif value="Approve">Approve
                                    </option>
                                    <option @if (old('biz_reg_pan_approve' === 'Not Approve')) selected @endif value="Not Approve">Not
                                      Approve</option>

                                  </select>
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success ">Upload Designer Agreement
                                  </label>
                                  <input class="form-control" id="formFileSm" type="file"
                                    name="designer_agreement_document" accept=".pdf">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success "> Designer Commission</label>
                                  <input class="form-control" id="formFileSm" type="number"
                                    placeholder="Enter Designer commission" min="0" step="0.01"
                                    name="commission" value="{{ old('commission') !== null ? old('commission') : 0 }}">
                                </div>
                              </div>

                            </div>

                            <div class="row mt-30 ">
                              <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg> Bank Details : </h5>
                              <div class="col-md-12">
                                <hr>
                              </div>
                              <div class="clearfix"></div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Bank Acc. Name</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Bank Acc. Name"
                                      maxlength="100" name="biz_bank_acc_name" value="{{ old('biz_bank_acc_name') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Bank Acc Number</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Bank Acc Number"
                                      maxlength="25" name="biz_bank_acc_no" value="{{ old('biz_bank_acc_no') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Bank Name</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Bank Name" maxlength="100"
                                      name="biz_bank_name" value="{{ old('biz_bank_name') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">IFSC / Bank Code</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="IFSC / Bank Code"
                                      maxlength="25" name="biz_bank_ifsc_code"
                                      value="{{ old('biz_bank_ifsc_code') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Bank Branch Name</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Bank Branch Name"
                                      maxlength="150" name="biz_bank_branch_name"
                                      value="{{ old('biz_bank_branch_name') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Swift Code</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Swift Code" maxlength="25"
                                      name="biz_bank_swift_code" value="{{ old('biz_bank_swift_code') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Route Code</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Route Code" maxlength="25"
                                      name="biz_bank_route_code" value="{{ old('biz_bank_route_code') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-label text-success">Account Type </label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Account Type"
                                      maxlength="25" name="biz_bank_acc_type" value="{{ old('biz_bank_acc_type') }}">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="formFileSm" class="form-label text-success ">Upload Cancel Cheque</label>
                                  <input class="form-control  " id="formFileSm" type="file"
                                    name="biz_bank_cancel_cheque_file">
                                </div>
                              </div>




                            </div>
                          </div>
                          <div class="row mt-20">
                            <hr>

                            <div class="col-md-12 pull-right">

                              <div class="clearfix">
                                <button type="submit" class="waves-effect waves-light btn btn-dark mb-5"><i
                                    class="fa fa-check"></i> Save</button>
                                {{-- <button type="button" class="waves-effect waves-light btn btn-dark mb-5"><i
                                  class="fa fa-align-left"></i> List</button>
                              <button type="button" class="waves-effect waves-light btn btn-dark mb-5"><i
                                  class="fa fa-close"></i> Clear</button>
                              <button type="button" class="waves-effect waves-light btn btn-dark mb-5"><i
                                  class="fa fa-repeat"></i> Refresh</button> --}}

                              </div>
                            </div>
                          </div>

                        </div>

                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-12">
                  <div class="box">
                    <div class="box-header">
                      <h4 class="box-title">Authorised Representative (AR)</h4>
                    </div>

                    <div class="box-body">
                      <div class="inner-user-div4">
                        <div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label text-success">Full Name *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="Full Name" maxlength="100"
                                  name="ar_name" value="{{ old('ar_name') }}">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label text-success">E-Mail *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="email" required class="form-control" placeholder="E-Mail"
                                  maxlength="150" name="ar_email" value="{{ old('ar_email') }}">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label text-success">Phone No</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="Phone No" maxlength="15"
                                  name="ar_phone" value="{{ old('ar_phone') }}">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label text-success">Department</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength="50"
                                  name="ar_department" value="{{ old('ar_department') }}">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label text-success">Designation</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="Designation" maxlength="50"
                                  name="ar_designation" value="{{ old('ar_designation') }}">
                              </div>
                            </div>
                          </div>
                          {{-- <div class="col-md-12">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label text-success ">Upload Photo</label>
                              <input class="form-control  " id="formFileSm" type="file" name="ar_file">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label text-success ">Upload KYC</label>
                              <input class="form-control" id="formFileSm" type="file" name="ar_kyc_file">
                            </div>
                          </div> --}}

                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label text-success">Accounts/Contact Person Name</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="Full Name" maxlength="100"
                                  name="accounts_name" value="{{ old('accounts_name') }}">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label text-success">Accounts/Contact Person Email ID</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="email" required class="form-control" placeholder="E-Mail"
                                  maxlength="150" name="accounts_email" value="{{ old('accounts_email') }}">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label text-success">Accounts/Contact Person Phone number</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="Phone No" maxlength="15"
                                  name="accounts_phone" value="{{ old('accounts_phone') }}">
                              </div>
                            </div>
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
  <script>
    function copyBizAddressToOffice(e) {
      let bizCompanyName = document.querySelector('.biz-company').value;
      let bizAddress = document.querySelector('.biz-address').value;
      let bizCountry = document.querySelector('.biz-country').value;
      let bizState = document.querySelector('.biz-state').value;
      let bizCity = document.querySelector('.biz-city').value;
      let bizZip = document.querySelector('.biz-zip').value;
      if (e.checked) {
        document.querySelector('.office-company').value = bizCompanyName;
        document.querySelector('.office-address').value = bizAddress;
        document.querySelector('.office-country').value = bizCountry;
        let element = document.querySelector('.office-country');
        element.onchange();
        document.querySelector('.office-city').value = bizCity;
        document.querySelector('.office-zip').value = bizZip;
      } else {
        document.querySelector('.office-company').value = '';
        document.querySelector('.office-address').value = '';
        document.querySelector('.office-country').value = '';
        document.querySelector('.office-state').value = '';
        document.querySelector('.office-city').value = '';
        document.querySelector('.office-zip').value = '';
      }
      setTimeout(setState, 1200);
      $('.office-country').select2({
        width: '100%',
        dropdownCssClass: "max-z-index",
        allowClear: true,
        placeholder: 'Select',
      });
    }

    function setState() {
      if (localStorage.getItem('stateId') === null) {
        document.querySelector('.office-state').value = bizState;
      } else {
        document.querySelector('.office-state').value = localStorage.getItem('stateId');
      }
      $('.office-state').select2({
        width: '100%',
        dropdownCssClass: "max-z-index",
        allowClear: true,
        placeholder: 'Select',
      });
    }
  </script>
@endsection
