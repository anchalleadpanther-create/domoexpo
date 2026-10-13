@extends('vendors.header')
@section('vendorContent')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-6 offset-md-3 bg-white shadow-sm rounded p-20">
            <form class="row g-3 vendor-upload-detail onboard-form">
              <input type="hidden" name="type" value="Profile update" />
              <h3>Designer Onboarding Form</h3>
              <div class="col-md-6">
                <label for="designer-email" class="form-label">Email *</label>
                <input type="email" maxlength="150" class="form-control" id="designer-email" required="" disabled
                  name="biz_email" value="{{ Auth::guard('vendor')->user()->biz_email }}">
              </div>
              <div class="col-md-6">
                <label for="designer-merchandiser" class="form-label">Fashion Edit India Merchandiser *</label>
                <input type="text" maxlength="100" class="form-control" id="designer-merchandiser" required=""
                  disabled name="merchandiser" value="{{ Auth::guard('vendor')->user()->merchandiser }}">
              </div>
              <div class="col-md-6">
                <label for="designer-company-name" class="form-label">Company/Legal Name *</label>
                <input type="text" maxlength="200" class="form-control" id="designer-company-name" required=""
                  disabled name="biz_company" value="{{ Auth::guard('vendor')->user()->biz_company }}">
              </div>
              <div class="col-md-6">
                <label for="designer-name" class="form-label">Designer Name *</label>
                <input type="text" maxlength="200" class="form-control" id="designer-name" required="" disabled
                  name="biz_name" value="{{ Auth::guard('vendor')->user()->biz_name }}">
              </div>
              <div class="col-md-6">
                <label for="designer-number" class="form-label">Designer Contact Number *</label>
                <input type="text" maxlength="20" class="form-control" id="designer-number" required=""
                  name="biz_phone" value="{{ Auth::guard('vendor')->user()->biz_phone }}">
              </div>
              <div class="col-md-6">
                <label for="designer-address-one" class="form-label">Designer Address *</label>
                <input type="text" maxlength="200" class="form-control" id="designer-address-one" required=""
                  name="biz_company_address" value="{{ Auth::guard('vendor')->user()->biz_company_address }}">
              </div>
              <div class="col-md-6">
                <label for="designer-gst" class="form-label">GST Number *</label>
                <input type="text" minlength="15" maxlength="15" class="form-control" id="designer-gst" required=""
                  disabled name="biz_reg_gst" value="{{ Auth::guard('vendor')->user()->biz_reg_gst }}">
              </div>
              <div class="col-md-6">
                <label for="designer-pan" class="form-label">Pan Number *</label>
                <input type="text" minlength="10" maxlength="10" class="form-control" id="designer-pan" required=""
                  disabled name="biz_reg_pan_no" value="{{ Auth::guard('vendor')->user()->biz_reg_pan_no }}">
              </div>
              <div class="col-md-6">
                <label for="designer-commission" class="form-label">Mark Down Percentage *</label>
                <input type="number" min="0" step="0.01" class="form-control" id="designer-commission"
                  required="" disabled name="commission" value="{{ Auth::guard('vendor')->user()->commission }}">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-name" class="form-label">Merchandiser/Contact Person Name *</label>
                <input type="text" maxlength="200" class="form-control" id="designer-ar-name" required=""
                  disabled name="ar_name" value="{{ Auth::guard('vendor')->user()->ar_name }}">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-number" class="form-label">Merchandiser/Contact Person Phone number *</label>
                <input type="text" maxlength="20" class="form-control" id="designer-ar-number" required=""
                  disabled name="ar_phone" value="{{ Auth::guard('vendor')->user()->ar_phone }}">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-email" class="form-label">Merchandiser/Contact Person Email ID *</label>
                <input type="email" maxlength="150" class="form-control" id="designer-ar-email" required=""
                  disabled name="ar_email" value="{{ Auth::guard('vendor')->user()->ar_email }}">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-name" class="form-label">Accounts/Contact Person Name *</label>
                <input type="text" maxlength="200" class="form-control" id="designer-ar-name" required=""
                  disabled name="accounts_name" value="{{ Auth::guard('vendor')->user()->accounts_name }}">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-number" class="form-label">Accounts/Contact Person Phone number *</label>
                <input type="text" maxlength="20" class="form-control" id="designer-ar-number" required=""
                  disabled name="accounts_phone" value="{{ Auth::guard('vendor')->user()->accounts_phone }}">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-email" class="form-label">Accounts/Contact Person Email ID *</label>
                <input type="email" maxlength="150" class="form-control" id="designer-ar-email" required=""
                  disabled name="accounts_email" value="{{ Auth::guard('vendor')->user()->accounts_email }}">
              </div>

              <div class="col-md-6">
                <label for="designer-state" class="form-label">Select State *</label>
                <select name="biz_company_state" id="designer-state" class="form-select" required="">
                  <option value="0" label="--"></option>
                  @foreach (getStates(101) as $state)
                    <option @selected(Auth::guard('vendor')->user()->biz_company_state === $state->id) value="{{ $state->id }}">{{ $state->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="designer-city" class="form-label">City *</label>
                <input type="text" maxlength="100" class="form-control" id="designer-city" required=""
                  name="biz_company_city" value="{{ Auth::guard('vendor')->user()->biz_company_city }}">
              </div>

              <h3 class="mt-4">Bank Details</h3>

              <div class="col-md-6">
                <label for="designer-bank-number" class="form-label">Bank Account Number *</label>
                <input type="text" maxlength="30" class="form-control" id="designer-bank-number" required=""
                  disabled name="biz_bank_acc_no" value="{{ Auth::guard('vendor')->user()->biz_bank_acc_no }}">
              </div>
              <div class="col-md-6">
                <label class="form-label">Type of Account *</label>
                <div class="form-checkbox-box d-flex-wrap">
                  <div class="form-check-inline">
                    <div class="customRadio">
                      <input type="radio" class="form-check-input" id="saving-account" disabled
                        name="biz_bank_acc_type" @checked(Auth::guard('vendor')->user()->biz_bank_acc_type === 'Saving Account') value="Saving Account" />
                      <label for="saving-account">Saving Account</label>
                    </div>
                  </div>
                  <div class="form-check-inline">
                    <div class="customRadio">
                      <input type="radio" class="form-check-input" id="current-account" disabled
                        name="biz_bank_acc_type" @checked(Auth::guard('vendor')->user()->biz_bank_acc_type === 'Current Account') value="Current Account" />
                      <label for="current-account">Current Account</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="designer-bank-name" class="form-label">Name of the Bank *</label>
                <input type="text" maxlength="100" class="form-control" id="designer-bank-name" required=""
                  disabled name="biz_bank_name" value="{{ Auth::guard('vendor')->user()->biz_bank_name }}">
              </div>
              <div class="col-md-6">
                <label for="designer-bank-ifsc" class="form-label">IFSC Code *</label>
                <input type="text" maxlength="30" class="form-control" id="designer-bank-ifsc" required=""
                  disabled name="biz_bank_ifsc_code" value="{{ Auth::guard('vendor')->user()->biz_bank_ifsc_code }}">
              </div>
              <div class="col-md-6">
                <label for="designer-bank-branch" class="form-label">Branch Name *</label>
                <input type="text" maxlength="150" class="form-control" id="designer-bank-branch" required=""
                  disabled name="biz_bank_branch_name"
                  value="{{ Auth::guard('vendor')->user()->biz_bank_branch_name }}">
              </div>
              <div class="col-md-6">
                <label for="designer-bank-acc-holder-name" class="form-label">Name of Account holder *</label>
                <input type="text" maxlength="150" class="form-control" id="designer-bank-acc-holder-name"
                  required="" disabled name="biz_bank_acc_name"
                  value="{{ Auth::guard('vendor')->user()->biz_bank_acc_name }}">
              </div>

              <h3 class="mt-4">Documents</h3>

              <div class="col-md-4">
                <label for="designer-gst-certi" class="form-label">GST Certificate Copy *
                  <a
                    href="{{ isset($supplier->biz_reg_gst_document) ? asset('uploads/supplier') . '/' . $supplier->biz_reg_gst_document : 'javascript:;' }}"><i
                      class="fa fa-download"></i></a>
                </label>
                <input type="file" class="form-control" id="designer-gst-certi" required="" disabled
                  name="biz_reg_gst_file" accept=".pdf,.jpg,.jpeg,.png" style="padding: 10px 18px;">
              </div>

              <div class="col-md-4">
                <label for="designer-gst-certi" class="form-label">Pan Card Copy *
                  <a
                    href="{{ isset($supplier->biz_reg_pan_document) ? asset('uploads/supplier') . '/' . $supplier->biz_reg_pan_document : 'javascript:;' }}"><i
                      class="fa fa-download"></i></a>
                </label>
                <input type="file" class="form-control" id="designer-gst-certi" required="" disabled
                  name="biz_reg_pan_file" accept=".pdf,.jpg,.jpeg,.png" style="padding: 10px 18px;">
              </div>

              <div class="col-md-4">
                <label for="designer-gst-certi" class="form-label">Canceled Cheque Copy *
                  <a
                    href="{{ isset($supplier->biz_bank_cancel_cheque) ? asset('uploads/supplier') . '/' . $supplier->biz_bank_cancel_cheque : 'javascript:;' }}"><i
                      class="fa fa-download"></i></a>
                </label>
                <input type="file" class="form-control" id="designer-gst-certi" required="" disabled
                  name="biz_bank_cancel_cheque_file" accept=".pdf,.jpg,.jpeg,.png" style="padding: 10px 18px;">
              </div>

              <div class="col-md-12 my-4">
                <button type="submit" class="btn btn-primary rounded submit-btn">Update!</button>
              </div>
            </form>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  <script type="module" src="{{ asset('allUsers/user/vendor-profile.js') }}"></script>
@endsection
