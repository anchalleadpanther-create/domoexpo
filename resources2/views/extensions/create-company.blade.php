@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <section class="content">
        @include('extensions.alerts')

        <div class="row">
          <div class="col-sm-8">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">{{ isset($company) ? 'Edit' : 'Add' }} Company</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form
                  action="{{ isset($company) ? route('admin.company.update', $company->id) : route('admin.company.store') }}"
                  method="post" id="category" enctype="multipart/form-data">
                  @csrf
                  @if (isset($company))
                    @method('PATCH')
                  @endif
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Business/Organisation Entity Information</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>

                          @if (getDropdowns('Entity Category')->displayflag === 1)
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="intType3"
                                  class="form-label">{{ getDropdowns('Entity Category')->dropdown_name }}</label>
                                <select class="form-select" name="entity_category"
                                  @if (getDropdowns('Entity Category')->dropdown_type === 'multiple') multiple @endif>
                                  <option value="">Select
                                  </option>
                                  @foreach (getDropdowns('Entity Category')->dropdownValues as $dropdown)
                                    <option
                                      @isset($company) @selected($company->entity_category === $dropdown->dropdown_value) @endisset
                                      @empty($company) @selected(old('entity_category') == $dropdown->dropdown_value) @endempty
                                      @if (old('entity_category') === $dropdown->dropdown_value) selected @endif
                                      value="{{ $dropdown->dropdown_value }}">
                                      {{ $dropdown->dropdown_value }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          @endif
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Entity Name *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input required type="text" class="form-control" name="company_name" id="company_name"
                                  maxlength="100"
                                  value="@if(isset($company)){{ $company->company_name }}@else{{ old('company_name') }} @endif"
                                  placeholder="" />
                              </div>
                            </div>
                          </div>
                          @if (getDropdowns('Entity Type')->displayflag === 1)
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="intType3"
                                  class="form-label">{{ getDropdowns('Entity Type')->dropdown_name }}</label>
                                <select class="form-select" name="entity_type"
                                  @if (getDropdowns('Entity Type')->dropdown_type === 'multiple') multiple @endif>
                                  <option value="">Select
                                  </option>
                                  @foreach (getDropdowns('Entity Type')->dropdownValues as $dropdown)
                                    <option
                                      @isset($company) @selected($company->entity_type === $dropdown->dropdown_value) @endisset
                                      @empty($company) @selected(old('entity_type') == $dropdown->dropdown_value) @endempty
                                      @if (old('entity_type') === $dropdown->dropdown_value) selected @endif
                                      value="{{ $dropdown->dropdown_value }}">
                                      {{ $dropdown->dropdown_value }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          @endif
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Entity Full Address (Including Postal Code)</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='200'
                                  name="company_address" id="metatitle"
                                  value="@if(isset($company)){{ $company->company_address }}@else{{ old('company_address') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Office Email</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='150'
                                  name="company_email" id="metatitle"
                                  value="@if(isset($company)){{ $company->company_email }}@else{{ old('company_email') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-3">
                                <div class="form-group">
                                  <label class="form-label">Country Code</label>
                                  <select class="form-select" name="company_phone_code">
                                    <option value="">Select</option>
                                    @foreach (getCountries() as $country)
                                      <option
                                        @isset($company) @selected($company->company_phone_code === $country->phonecode) @endisset
                                        @empty($company) @selected(old('company_phone_code') == $country->phonecode) @endempty
                                        value="{{ $country->phonecode }}">{{ $country->phonecode }}
                                      </option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-9">
                                <div class="form-group">
                                  <label class="form-label">Office Phone No</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="number" class="form-control" placeholder="" name="company_phone"
                                      id="company_phone" onKeyPress="if(this.value.length===15) return false;"
                                      value="@if(isset($company)){{ $company->company_phone }}@else{{ old('company_phone') }} @endif">
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Company Website</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='1000'
                                  name="company_website" id="metatitle"
                                  value="@if(isset($company)){{ $company->company_website }}@else{{ old('company_website') }} @endif">
                              </div>
                            </div>
                          </div>
                          @if (getDropdowns('Entity Registration Type')->displayflag === 1)
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="intType3"
                                  class="form-label">{{ getDropdowns('Entity Registration Type')->dropdown_name }}</label>
                                <select class="form-select" name="registration_type"
                                  @if (getDropdowns('Entity Registration Type')->dropdown_type === 'multiple') multiple @endif>
                                  <option value="">Select
                                  </option>
                                  @foreach (getDropdowns('Entity Registration Type')->dropdownValues as $dropdown)
                                    <option
                                      @isset($company) @selected($company->registration_type === $dropdown->dropdown_value) @endisset
                                      @empty($company) @selected(old('registration_type') == $dropdown->dropdown_value) @endempty
                                      @if (old('registration_type') === $dropdown->dropdown_value) selected @endif
                                      value="{{ $dropdown->dropdown_value }}">
                                      {{ $dropdown->dropdown_value }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          @endif
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Company GST Number</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='15'
                                  name="company_gst_number" id="metatitle"
                                  value="@if(isset($company)){{ $company->company_gst_number }}@else{{ old('company_gst_number') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Entity Registration No</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='10'
                                  name="company_pan_number" id="metatitle"
                                  value="@if(isset($company)){{ $company->company_pan_number }}@else{{ old('company_pan_number') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Country</label>
                              <select class="form-select" name="country_id">
                                <option value="">Select</option>
                                @foreach (getCountries() as $country)
                                  <option
                                    @isset($company) @selected($company->country_id === $country->id) @endisset
                                    @empty($company) @selected(old('country_id') == $country->id) @endempty
                                    value="{{ $country->id }}">{{ $country->name }}
                                  </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Company UAC Number
                              </label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='30'
                                  name="company_uac_number" id="metatitle"
                                  value="@if(isset($company)){{ $company->company_uac_number }}@else{{ old('company_uac_number') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Entity Registration Documents [MAX:
                                1MB]
                                @isset($company->document_one)
                                  <a target="_blank"
                                    href="@if (Storage::disk('appFiles')->exists("company/{$company->document_one}")) {{ asset('uploads/company') . '/' . $company->document_one }} @endif"><i
                                      class="fa fa-download"></i></a>
                                @endisset
                              </label>
                              <input class="form-control" id="formFileSm" name="first_document" type="file">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Others [MAX: 1MB]
                                @isset($company->document_two)
                                  <a target="_blank"
                                    href="@if (Storage::disk('appFiles')->exists("company/{$company->document_two}")) {{ asset('uploads/company') . '/' . $company->document_two }} @endif"><i
                                      class="fa fa-download"></i></a>
                                @endisset
                              </label>
                              <input class="form-control" id="formFileSm" name="second_document" type="file">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Document Three [MAX: 1MB]
                                @isset($company->document_three)
                                  <a target="_blank"
                                    href="@if (Storage::disk('appFiles')->exists("company/{$company->document_three}")) {{ asset('uploads/company') . '/' . $company->document_three }} @endif"><i
                                      class="fa fa-download"></i></a>
                                @endisset
                              </label>
                              <input class="form-control" id="formFileSm" name="third_document" type="file">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Document Four [MAX: 1MB]
                                @isset($company->document_tfour)
                                  <a target="_blank"
                                    href="@if (Storage::disk('appFiles')->exists("company/{$company->document_tfour}")) {{ asset('uploads/company') . '/' . $company->document_tfour }} @endif"><i
                                      class="fa fa-download"></i></a>
                                @endisset
                              </label>
                              <input class="form-control" id="formFileSm" name="four_document" type="file">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Entity Logo [300X300, MAX: 500KB]
                                @isset($company->company_logo)
                                  <a target="_blank"
                                    href="@if (Storage::disk('appFiles')->exists("company/{$company->company_logo}")) {{ asset('uploads/company') . '/' . $company->company_logo }} @endif"><i
                                      class="fa fa-download"></i></a>
                                @endisset
                              </label>
                              <input class="form-control" id="formFileSm" name="logo" type="file"
                                accept=".jpg, .jpeg, .png, .gif, .webp">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Account Representative (AR) Name</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='100'
                                  name="contact_name" id="metatitle"
                                  value="@if(isset($company)){{ $company->contact_name }}@else{{ old('contact_name') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">AR Work Email</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="email" class="form-control" placeholder="" maxlength='200'
                                  name="contact_email" id="metatitle"
                                  value="@if(isset($company)){{ $company->contact_email }}@else{{ old('contact_email') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Mobile No.</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" class="form-control" placeholder="" name="contact_mobile"
                                  id="contact_mobile" onKeyPress="if(this.value.length===15) return false;"
                                  value="@if(isset($company)){{ $company->contact_mobile }}@else{{ old('contact_mobile') }} @endif">
                              </div>
                            </div>
                          </div>
                          @if (getDropdowns('Department')->displayflag === 1)
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="intType3"
                                  class="form-label">{{ getDropdowns('Department')->dropdown_name }}</label>
                                <select class="form-select" name="contact_department"
                                  @if (getDropdowns('Department')->dropdown_type === 'multiple') multiple @endif>
                                  <option value="">Select
                                  </option>
                                  @foreach (getDropdowns('Department')->dropdownValues as $dropdown)
                                    <option
                                      @isset($company) @selected($company->contact_department === $dropdown->dropdown_value) @endisset
                                      @empty($company) @selected(old('contact_department') == $dropdown->dropdown_value) @endempty
                                      @if (old('contact_department') === $dropdown->dropdown_value) selected @endif
                                      value="{{ $dropdown->dropdown_value }}">
                                      {{ $dropdown->dropdown_value }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          @endif
                          @if (getDropdowns('Designation')->displayflag === 1)
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="intType3"
                                  class="form-label">{{ getDropdowns('Designation')->dropdown_name }}</label>
                                <select class="form-select" name="contact_designation"
                                  @if (getDropdowns('Designation')->dropdown_type === 'multiple') multiple @endif>
                                  <option value="">Select
                                  </option>
                                  @foreach (getDropdowns('Designation')->dropdownValues as $dropdown)
                                    <option
                                      @isset($company) @selected($company->contact_designation === $dropdown->dropdown_value) @endisset
                                      @empty($company) @selected(old('contact_designation') == $dropdown->dropdown_value) @endempty
                                      @if (old('contact_designation') === $dropdown->dropdown_value) selected @endif
                                      value="{{ $dropdown->dropdown_value }}">
                                      {{ $dropdown->dropdown_value }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          @endif
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">AR Photo
                                @isset($company->contact_picture)
                                  <a target="_blank"
                                    href="@if (Storage::disk('appFiles')->exists("company/{$company->contact_picture}")) {{ asset('uploads/company') . '/' . $company->contact_picture }} @endif"><i
                                      class="fa fa-download"></i></a>
                                @endisset
                              </label>
                              <input class="form-control" id="formFileSm" name="contact_picture" type="file"
                                accept="image/*">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-20">
                        <hr>
                        <div class="col-md-12 pull-right">
                          <div class="clearfix">
                            <button type="submit" class="waves-effect waves-light btn btn-dark mb-5 category"><i
                                class="fa fa-check"></i> Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
    </div>
  </div>
  <script type="text/javascript">
    $('#summernote').summernote({
      placeholder: 'Please enter your category content here.',
      tabsize: 2,
      height: 250,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['codeview', 'help']]
      ]
    });
  </script>
@endsection
