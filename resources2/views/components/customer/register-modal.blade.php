<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register here</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="login-register py-3">
          <div class="row">
            <div class="col-md-10 offset-md-1 box">
              <h3 class="h4 text-uppercase mb-3">Personal Information</h3>
              <form method="post" action="#" accept-charset="UTF-8" class="customer-form register-form">
                <fieldset class="register-fieldset">
                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="form-group">
                        <label for="CustomerFirstName" class="d-none">First Name <span class="required">*</span></label>
                        <input id="CustomerFirstName" type="text" name="register_first_name" placeholder="First Name"
                          required="">
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="form-group">
                        <label for="CustomerFirstName" class="d-none">Last Name <span class="required">*</span></label>
                        <input id="CustomerFirstName" type="text" name="register_last_name" placeholder="last Name"
                          required="">
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="CustomerLastName" class="d-none">Email <span class="required">*</span></label>
                        <input id="CustomerLastName" type="email" name="register_email" placeholder="Email" required="">
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="CustomerLastName" class="d-none">phone <span class="required">*</span></label>
                        <input id="CustomerLastName" type="number" min="0" name="phone" placeholder="phone" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group form-check col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="customCheckbox clearfix">
                        <input id="newsletter" name="newsletter" type="checkbox" value="1">
                        <label for="newsletter">Sign Up for Newsletter</label>
                      </div>
                    </div>
                  </div>
                  <h3 class="h4 text-uppercase mb-3">Login Information</h3>
                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="form-group">
                        <label for="CustomerPassword" class="d-none">Password <span class="required">*</span></label>
                        <input id="CustomerPassword" type="password" name="register_password" min="6"
                          placeholder="Password" required="">
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="form-group">
                        <label for="CustomerConfirmPassword" class="d-none">Confirm Password <span
                            class="required">*</span></label>
                        <input id="CustomerConfirmPassword" type="Password" name="password_confirmation" min="6"
                          placeholder="Confirm Password" required="">
                      </div>
                    </div>


                  </div>

                  <div class="row register-otp-field-row d-none">
                    <h3 class="h4 text-uppercase mb-3">Enter OTP</h3>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="CustomerLastName" class="d-none">Enter OTP <span class="required">*</span></label>
                        <input id="CustomerLastName" type="number" name="register_otp" placeholder="Enter OTP"
                          required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="text-left col-12 col-sm-12 col-md-6 col-lg-6">
                      <button type="submit" class="btn rounded mb-3 register-btn d-none">Submit</button>

                      <button type="button" class="btn rounded mb-3 send-otp-register-btn">Send OTP</button>

                    </div>

                    <div
                      class="text-right col-12 col-sm-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-end">
                      <a href="javascript:;" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#loginModal"><i class="align-middle icon an an-an-double-left me-2"></i>Back
                        To
                        Login</a>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>