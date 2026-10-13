<div id="referral" class="tab-pane fade @if (Request::segment(3) === 'referral') active show @endif">
  <div class="row mb-md-4">
    <div class="col-md-6 offset-md-3 mb-5">
      <img src="{{ asset('allUsers/customer/images/referral-image.jpg') }}" />
    </div>

    <div class="col-md-4 text-center border-end border-dark border-2 mb-4 mb-md-0 borderless-sm">
      <p class="fs-6 fw-600 text-dark">Referral Program</p>
      <p class="text-dark fw-500">For our beloved every growing <br /> #FEICommunity, refer a friend <br /> & enjoy
        discount of
        {{ getCurrentCurrency()->currency }}
        {{ number_format(\App\Helpers\Referral::getDetails()->referralAmountToBeAlloted * getCurrentCurrency()->con_ratio, 2) }}
      </p>
    </div>

    <div class="col-md-4 text-center border-end border-dark border-2 mb-4 mb-md-0 borderless-sm">
      <p class="fs-6 fw-600 text-dark">Referring Friend</p>
      <p class="text-dark fw-500">Enjoy a discount of {{ getCurrentCurrency()->currency }}
        {{ number_format(\App\Helpers\Referral::getDetails()->referralAmountToBeAlloted * getCurrentCurrency()->con_ratio, 2) }}
        <br />
        when a friend makes a <br /> purchase using your link.
      </p>
    </div>

    <div class="col-md-4 text-center mb-2 mb-md-0 borderless-sm">
      <p class="fs-6 fw-600 text-dark">Referred Friend</p>
      <p class="text-dark fw-500">Your friend enjoys a discount <br /> of {{ getCurrentCurrency()->currency }}
        {{ number_format(\App\Helpers\Referral::getDetails()->referralBonusForReferrer * getCurrentCurrency()->con_ratio, 2) }}
        on a minimum purchase of
        {{ number_format(\App\Helpers\Referral::getDetails()->referralMinimumOrderAmount * getCurrentCurrency()->con_ratio, 2) }}
      </p>
    </div>

  </div>

  <div class="row">
    <div class="my-3 col-md-8 offset-md-2 text-center">
      <label for="referralLink" class="form-label fw-500">Referral Link</label>
      <input type="text" class="form-control bg-light fw-500 referral-link copy-text" id="referralLink"
        value="{{ route('home', ['referredBy' => Crypt::encryptString(Auth::guard('buyer')->user()->email)]) }}"
        readonly data-class-name=".referral-link">
      <div class="form-text">
        <a href="javascript:;" class="text-decoration-underline fw-500 text-pink copy-text"
          data-class-name=".referral-link">
          Click here to copy this link
        </a>
      </div>
    </div>
    <div class="my-3 col-md-12 mx-md-3">
      <p class="text-dark">Terms & Conditions *</p>
      <ul>
        <li>
          A customer must have an FEI account to share the referral code with a friend.
        </li>
        <li>
          A unique referral code will be generated for each FEI account.
        </li>
        <li>
          The referring friend will enjoy a discount of Rs. 1000 - credited into their FEI wallet, after the code is
          used <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;& the purchase is completed.
        </li>
        <li>
          The referred friend can avail the discount of Rs. 1000 on a minimum order value of Rs.10,000 upon using the
          link.
        </li>
        <li>
          If the order value is above Rs. 10,000 the discount will automatically be applied to the shopping cart.
        </li>
        <li>
          The referral discount cannot be clubbed with the FIRST10 discount code.
        </li>
        </li>
      </ul>
    </div>
  </div>
</div>
