@extends('customer.partials.header')
@section('customerContent')
  <div id="page-content">

    <div class="collection-header">
      <div class="collection-hero">
        <div class="collection-hero__image" style=""></div>
        <div class="collection-hero__title-wrapper container">
          <h1 class="collection-hero__title">Designer Onboarding</h1>
        </div>
      </div>
    </div>


    <!--Home Slider-->
    <section class="slideshow slideshow-wrapper">

      <div class="container">


        <div class="row">
          <div class="offset-md-2 col-md-8">
            <form class="row g-3 vendor-upload-detail onboard-form">
              <input type="hidden" name="type" value="Registration" />
              <h3>Designer Onboarding Form</h3>
              <div class="col-md-6">
                <label for="designer-email" class="form-label">Email *</label>
                <input type="email" maxlength="150" class="form-control" id="designer-email" required=""
                  name="biz_email">
              </div>
              <div class="col-md-6">
                <label for="designer-merchandiser" class="form-label">Fashion Edit India Merchandiser *</label>
                <input type="text" maxlength="100" class="form-control" id="designer-merchandiser" required=""
                  name="merchandiser">
              </div>
              <div class="col-md-6">
                <label for="designer-company-name" class="form-label">Company/Legal Name *</label>
                <input type="text" maxlength="200" class="form-control" id="designer-company-name" required=""
                  name="biz_company">
              </div>
              <div class="col-md-6">
                <label for="designer-name" class="form-label">Designer Name *</label>
                <input type="text" maxlength="200" class="form-control" id="designer-name" required=""
                  name="biz_name">
              </div>
              <div class="col-md-6">
                <label for="designer-number" class="form-label">Designer Contact Number *</label>
                <input type="text" maxlength="20" class="form-control" id="designer-number" required=""
                  name="biz_phone">
              </div>
              <div class="col-md-6">
                <label for="designer-address-one" class="form-label">Designer Address *</label>
                <input type="text" maxlength="200" class="form-control" id="designer-address-one" required=""
                  name="biz_company_address">
              </div>
              <div class="col-md-6">
                <label for="designer-gst" class="form-label">GST Number *</label>
                <input type="text" minlength="15" maxlength="15" class="form-control" id="designer-gst" required=""
                  name="biz_reg_gst">
              </div>
              <div class="col-md-6">
                <label for="designer-pan" class="form-label">Pan Number *</label>
                <input type="text" minlength="10" maxlength="10" class="form-control" id="designer-pan" required=""
                  name="biz_reg_pan_no">
              </div>
              <div class="col-md-6">
                <label for="designer-commission" class="form-label">Mark Down Percentage *</label>
                <input type="number" min="0" step="0.01" class="form-control" id="designer-commission"
                  required="" name="commission">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-name" class="form-label">Merchandiser/Contact Person Name *</label>
                <input type="text" maxlength="200" class="form-control" id="designer-ar-name" required=""
                  name="ar_name">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-number" class="form-label">Merchandiser/Contact Person Phone number *</label>
                <input type="text" maxlength="20" class="form-control" id="designer-ar-number" required=""
                  name="ar_phone">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-email" class="form-label">Merchandiser/Contact Person Email ID *</label>
                <input type="email" maxlength="150" class="form-control" id="designer-ar-email" required=""
                  name="ar_email">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-name" class="form-label">Accounts/Contact Person Name *</label>
                <input type="text" maxlength="200" class="form-control" id="designer-ar-name" required=""
                  name="accounts_name">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-number" class="form-label">Accounts/Contact Person Phone number *</label>
                <input type="text" maxlength="20" class="form-control" id="designer-ar-number" required=""
                  name="accounts_phone">
              </div>
              <div class="col-md-6">
                <label for="designer-ar-email" class="form-label">Accounts/Contact Person Email ID *</label>
                <input type="email" maxlength="150" class="form-control" id="designer-ar-email" required=""
                  name="accounts_email">
              </div>



              <div class="col-md-6">
                <label for="designer-state" class="form-label">Select State *</label>
                <select name="biz_company_state" id="designer-state" required="">
                  <option value="0" label="--" selected="selected"></option>
                  @foreach (getStates(101) as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="designer-city" class="form-label">City *</label>
                <input type="text" maxlength="100" class="form-control" id="designer-city" required=""
                  name="biz_company_city">
              </div>

              <h3 class="mt-4">Bank Details</h3>

              <div class="col-md-6">
                <label for="designer-bank-number" class="form-label">Bank Account Number *</label>
                <input type="text" maxlength="30" class="form-control" id="designer-bank-number" required=""
                  name="biz_bank_acc_no">
              </div>
              <div class="col-md-6">
                <label class="form-label">Type of Account *</label>
                <div class="form-checkbox-box d-flex-wrap">
                  <div class="form-check-inline">
                    <div class="customRadio">
                      <input type="radio" class="form-check-input" id="saving-account" name="biz_bank_acc_type"
                        value="Saving Account" />
                      <label for="saving-account">Saving Account</label>
                    </div>
                  </div>
                  <div class="form-check-inline">
                    <div class="customRadio">
                      <input type="radio" class="form-check-input" id="current-account" name="biz_bank_acc_type"
                        value="Current Account" />
                      <label for="current-account">Current Account</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="designer-bank-name" class="form-label">Name of the Bank *</label>
                <input type="text" maxlength="100" class="form-control" id="designer-bank-name" required=""
                  name="biz_bank_name">
              </div>
              <div class="col-md-6">
                <label for="designer-bank-ifsc" class="form-label">IFSC Code *</label>
                <input type="text" maxlength="30" class="form-control" id="designer-bank-ifsc" required=""
                  name="biz_bank_ifsc_code">
              </div>
              <div class="col-md-6">
                <label for="designer-bank-branch" class="form-label">Branch Name *</label>
                <input type="text" maxlength="150" class="form-control" id="designer-bank-branch" required=""
                  name="biz_bank_branch_name">
              </div>
              <div class="col-md-6">
                <label for="designer-bank-acc-holder-name" class="form-label">Name of Account holder *</label>
                <input type="text" maxlength="150" class="form-control" id="designer-bank-acc-holder-name"
                  required="" name="biz_bank_acc_name">
              </div>

              <h3 class="mt-4">Documents</h3>

              <div class="col-md-4">
                <label for="designer-gst-certi" class="form-label">GST Certificate Copy *</label>
                <input type="file" class="form-control" id="designer-gst-certi" required=""
                  name="biz_reg_gst_file" accept=".pdf,.jpg,.jpeg,.png" style="padding: 10px 18px;">
              </div>

              <div class="col-md-4">
                <label for="designer-gst-certi" class="form-label">Pan Card Copy *</label>
                <input type="file" class="form-control" id="designer-gst-certi" required=""
                  name="biz_reg_pan_file" accept=".pdf,.jpg,.jpeg,.png" style="padding: 10px 18px;">
              </div>

              <div class="col-md-4">
                <label for="designer-gst-certi" class="form-label">Canceled Cheque Copy *</label>
                <input type="file" class="form-control" id="designer-gst-certi" required=""
                  name="biz_bank_cancel_cheque_file" accept=".pdf,.jpg,.jpeg,.png" style="padding: 10px 18px;">
              </div>

              <div class="col-md-12 my-4">
                <button type="submit" class="btn btn-primary rounded submit-btn">Onboard!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!--End Home Slider-->


  </div>
  <!--End Body Container-->
  <script type="module" src="{{ asset('allUsers/customer/designer-onboarding.js') }}"></script>
@endsection
