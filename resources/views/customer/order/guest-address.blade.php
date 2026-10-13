<div class="customer-form guest-address-form animate__animated animate__fadeInUp">
    <h3 class="h4 text-uppercase">Continue as a guest!</h3>
    <p>Please fill your address details below to place order as a guest.</p>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="firstName">First Name <span class="required">*</span></label>
                <input type="text" name="first_name" maxlength="50" id="firstName" value="" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lastName">Last Name <span class="required">*</span></label>
                <input type="text" name="last_name" maxlength="50" id="lastName" value="" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="customerEmail">Email <span class="required">*</span></label>
                <input type="email" name="email" maxlength="100" id="customerEmail" value="" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="customerMobile">Phone <span class="required">*</span></label>
                <input type="number" min="0" name="mobile" pattern="[0-9]{10}" id="customerMobile"
                    value="" required="">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="customerAddress">Address <span class="required">*</span></label>
                <input type="text" name="address_one" maxlength="100" id="customerAddress" value=""
                    required="">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="customerPostcode">Postcode <span class="required">*</span></label>
                <input type="text" min="1" maxlength="20" name="post_code" id="customerPostcode"
                    value="" required="">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label>Country <span class="required">*</span></label>
                <select class="form-control countries" name="country" onchange="getStates(this)" data-class=".states"
                    required>
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
                <select class="form-control states" name="state" onchange="getCities(this)" data-class=".cities"
                    required>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>City <span class="required">*</span></label>
                <select class="form-control cities" name="city" required>
                </select>
            </div>
        </div>
        <div class="col-md-12 my-4">
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input form-control-color" type="radio" name="address_type"
                            id="addressRadio1" value="Home address" checked>
                        <label class="form-check-label" for="addressRadio1">
                            Home Address
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input form-control-color" type="radio" name="address_type"
                            id="addressRadio2" value="Office address">
                        <label class="form-check-label" for="addressRadio2">
                            Office Address
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="order-button-payment mt-4 clearfix">
            <button
                class="cartCheckout fs-6 btn btn-lg rounded w-100 fw-600 text-white guest-place-order-btn">Continue</button>
        </div>
    </div>
</div>
