<div class="modal fade" id="otploginModal" tabindex="-1" aria-labelledby="otploginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otploginModal">OTP Login here</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="login-register py-3">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 mb-4 mb-md-0">
                            <div class="">
                                <form method="post" action="#" class="customer-form otp-login-form">
                                    <h3 class="h4 text-uppercase">REGISTERED CUSTOMERS</h3>
                                    <p>If you have an account with us, please log in.</p>
                                    <input type="hidden" name="is_otp_login" value="1">
                                    <input type="hidden" name="userWantTo" value="sendotp">


                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="CustomerEmail" class="d-none">Mobile <span
                                                        class="required">*</span></label>
                                                <input type="number" name="login_phone" placeholder="Phone"
                                                    id="CustomerPhone" required="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-none otp-input-section">
                                            <div class="form-group">
                                                <label for="CustomerOTP" class="d-none">OTP <span
                                                        class="required">*</span></label>
                                                <input type="number" name="otp" placeholder="OTP" id="CustomerOTP">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-left col-12 col-sm-12 col-md-12 col-lg-12 ">
                                            <button class="btn rounded me-auto login-btn d-none login-btn-section"
                                                data-btn-name="otp_sign_in">Sign In</button>
                                            <button class="btn rounded me-auto  login-btn send-login-otp-section"
                                                data-btn-name="send_otp">Send OTP</button>
                                        </div>

                                        {{-- <div class="text-left col-12 col-sm-12 col-md-6 col-lg-6 ">

                                        </div> --}}

                                        <div
                                            class="text-right col-12 col-sm-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-end">
                                            <a href="javascript:;" data-bs-dismiss="modal" data-bs-toggle="modal"
                                                data-bs-target="#registerModal"><i
                                                    class="align-middle icon an an-an-double-left me-2"></i>New
                                                here? Register!</a>
                                        </div>
                                        {{-- <div class="col-12 text-center mt-5">
                                            <a class="btn btn-outline-dark bg-white text-dark shadow-sm"
                                                href="{{ route('buyer.login.google') }}" role="button"
                                                style="text-transform:none;width:250px;">
                                                <img width="20px" style="margin-bottom:3px; margin-right:5px"
                                                    alt="Google sign-in"
                                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                                Login with Google
                                            </a>
                                            <a class="btn btn-outline-dark text-white shadow-sm mt-3 d-none"
                                                href="{{ route('buyer.login.facebook') }}" role="button"
                                                style="text-transform:none;background-color:#2c6ad4;width:250px;">
                                                <i class="an an-facebook"></i>&nbsp;
                                                Login with Facebook
                                            </a>
                                        </div> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>