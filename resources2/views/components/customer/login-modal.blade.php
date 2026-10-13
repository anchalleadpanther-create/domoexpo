<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login here</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="login-register py-3">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 mb-4 mb-md-0">
                            <div class="">
                                <form method="post" action="#" class="customer-form login-form">
                                <input type="hidden" name="product_id_for_wishlist" value="199905" id="product_id_for_wishlist">
                                    <h3 class="h4 text-uppercase">REGISTERED CUSTOMERS</h3>
                                    <p>If you have an account with us, please log in.</p>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="CustomerEmail" class="d-none">Email <span
                                                        class="required">*</span></label>
                                                <input type="email" name="login_email" placeholder="Email"
                                                    id="CustomerEmail" required="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="CustomerPassword" class="d-none">Password <span
                                                        class="required">*</span></label>
                                                <input type="password" name="password" placeholder="Password"
                                                    id="CustomerPassword" required="">
                                                <a href="{{ route('buyer.forgot-password') }}">
                                                    <p class="small mt-2">Forgot password?</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-left col-12 col-sm-12 col-md-6 col-lg-6">
                                            <button class="btn rounded me-auto login-btn">Sign In</button>
                                        </div>
                                        <div
                                            class="text-right col-12 col-sm-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-end">
                                            <a href="javascript:;" data-bs-dismiss="modal" data-bs-toggle="modal"
                                                data-bs-target="#otploginModal"><i
                                                    class="align-middle icon an an-an-double-left me-2"></i>Login with
                                                otp</a>
                                        </div>

                                        <div
                                            class="text-right col-12 col-sm-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-end">
                                            <a href="javascript:;" data-bs-dismiss="modal" data-bs-toggle="modal"
                                                data-bs-target="#registerModal"><i
                                                    class="align-middle icon an an-an-double-left me-2"></i>New
                                                here? Register!</a>
                                        </div>


                                        <div class="col-12 text-center mt-5">
                                            <a class="btn btn-outline-dark bg-white text-dark shadow-sm"
                                                href="{{ route('buyer.login.google') }}" role="button"
                                                style="text-transform:none;width:250px;">
                                                <img width="20px" style="margin-bottom:3px; margin-right:5px"
                                                    alt="Google sign-in"
                                                    src="{{asset('allUsers/g_icon.png')}}" />
                                                Login with Google
                                            </a>
                                            <a class="btn btn-outline-dark text-white shadow-sm mt-3 d-none"
                                                href="{{ route('buyer.login.facebook') }}" role="button"
                                                style="text-transform:none;background-color:#2c6ad4;width:250px;">
                                                <i class="an an-facebook"></i>&nbsp;
                                                Login with Facebook
                                            </a>
                                        </div>
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