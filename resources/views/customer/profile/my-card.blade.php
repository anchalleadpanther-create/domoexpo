<div id="myCard" class="tab-pane fade loyalty_pg">

  <div class="row">
    <div class="col-sm-12">
      <div class="section-header">
        <h3>Elevate your shopping experience with our loyalty program.</h3>
        <p>Find out more on how you could qualify for access to the most coveted benefits and
          rewards. The more you buy, the more points you earn. These points help you reach the
          next level and enjoy more benefits. Get ready to buy more, earn more and redeem more!!</p>
      </div>
    </div>
  </div>
  <div class="blogpost-item mb-3 pt-3 pb-3 p-0">

    <div class="row ">
      <div class="col-sm-4">
        <a href="#" class="position_relative mb-0">
          <img class="blur-up lazyloaded" src="{{ asset('allUsers/customer/images/reward-card-500x500.png') }}"
            data-src="{{ asset('allUsers/customer/images/reward-card-500x500.png') }}"
            style=" width: 400px; margin: auto;" alt="image" title="{{ 'Pink Tier' }}">
          <div @class([
              'reward-card-info',
              'd-none' => Auth::guard('buyer')->user()->membership_type !== 'Pink Tier',
          ])>
            <center>

              <h4 class="mt-3">{{ Auth::guard('buyer')->user()->fullName }}</h4>
              <h6>{{ implode('-', str_split(Auth::guard('buyer')->user()->membership_id, 4)) }}</h6>
            </center>

            <div class="reward-info-left">
              <small>MEMBER SINCE</small>
              <p>{{ Auth::guard('buyer')->user()->created_at->format("M'y") }}</p>
            </div>
            <div class="reward-info-right">
              <small>VALID TILL</small>
              <p>{{ Auth::guard('buyer')->user()->membership_expiry_date->format("M'y") }}</p>
            </div>
          </div>

        </a>
      </div>
      <div class="col-sm-8 pt-3 ">
        <div class="post-detail text-left">
          <h3 class="post-title mb-0"><a href="#">The Pink Tier</a>
            <span @class([
                'd-none' => Auth::guard('buyer')->user()->membership_type !== 'Pink Tier',
            ])
              style=" background: green !important;color: #fff; font-size: 9px; border-radius: 6px; padding: 3px 10px; line-height: normal;">
              Active
            </span>
          </h3>
          <p class="exceprt mb-0">(Enjoy a discount of
            {{ number_format(\App\Helpers\Tiers::currentTier('Pink Tier')->percentageDiscountOnFirstPurchase, 0) }}%
            on your first purchase.)</p>
          <p class="exceprt mb-0">(Free shipping within India for any purchase over INR 5000/-)</p>
          <p class="exceprt mb-0">(Cash on delivery available on all purchases within India)</p>
          <ul class="mt-2" style="padding-left:15px">
            <li><span> This is the entry level card which anyone
                who registers with FEI will be entitled to</span></li>
            <li><span>A joining bonus of {{ getCurrentCurrency()->currency }}
                {{ number_format(\App\Helpers\Tiers::currentTier('Pink Tier')->walletBonus * getCurrentCurrency()->con_ratio, 2) }}/-
                will be added to your FEI wallet. This amount is redeemable on your
                purchase.</span></li>
            <li><span>Only 1 discount offer is applicable at a time.</span></li>
            <li><span>Points accumulated can be used along
                with any single discount towards purchases on our website</span></li>
            <li>
              <span>
                The points in your FEI wallet are valid for 3 months from date of issue. After a period of 3 months,
                these points will be null & void and cannot be redeemed.
              </span>
            </li>

          </ul>
        </div>

      </div>
    </div>
  </div>
  <div class="blogpost-item  mb-3 pt-3 pb-3 p-0">

    <div class="row ">
      <div class="col-sm-4">
        <a href="#" class="position_relative mb-0">
          <img class="blur-up lazyloaded" src="{{ asset('allUsers/customer/images/reward-card-500x500-1') }}.png"
            data-src="{{ asset('allUsers/customer/images/reward-card-500x500-1') }}.png"
            style=" width: 400px; margin: auto;" alt="image" title="">
          <div @class([
              'reward-card-info',
              'd-none' => Auth::guard('buyer')->user()->membership_type !== 'Ivory Tier',
          ])>
            <center>

              <h4 class="mt-3">{{ Auth::guard('buyer')->user()->fullName }}</h4>
              <h6>{{ implode('-', str_split(Auth::guard('buyer')->user()->membership_id, 4)) }}</h6>
            </center>

            <div class="reward-info-left">
              <small>MEMBER SINCE</small>
              <p>{{ Auth::guard('buyer')->user()->created_at->format("M'y") }}</p>
            </div>
            <div class="reward-info-right">
              <small>VALID TILL</small>
              <p>{{ Auth::guard('buyer')->user()->membership_expiry_date->format("M'y") }}</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-sm-8 pt-3">
        <div class="post-detail text-left">
          <h3 class="post-title mb-0">
            <a href="#">The Ivory Tier</a>
            <span @class([
                'd-none' => Auth::guard('buyer')->user()->membership_type !== 'Ivory Tier',
            ])
              style=" background: green !important;color: #fff; font-size: 9px; border-radius: 6px; padding: 3px 10px; line-height: normal;">
              Active
            </span>
          </h3>

          <p class="exceprt mb-0"> (Enjoy a discount of
            {{ number_format(\App\Helpers\Tiers::currentTier('Ivory Tier')->percentageDiscountOnFirstPurchase, 0) }}%
            on your first purchase as an Ivory tier card holder.)</p>

          <p class="exceprt mb-0">(Free shipping within India for any purchase over INR 1500/-)</p>

          <p class="exceprt mb-0">(Cash on delivery available on all purchases within India.)</p>

          <ul class="mt-2" style="padding-left:15px">
            <li> <span>This is the 2nd tier which will be
                automatically achieved by shopping on FEI for a value worth {{ getCurrentCurrency()->currency }}
                {{ number_format(\App\Helpers\Tiers::currentTier('Ivory Tier')->requiredPoints * getCurrentCurrency()->con_ratio, 2) }}/-</span>
            </li>

            <li><span>A bonus of points worth {{ getCurrentCurrency()->currency }}
                {{ number_format(\App\Helpers\Tiers::currentTier('Ivory Tier')->walletBonus * getCurrentCurrency()->con_ratio, 2) }}/-
                will be added to
                your FEI wallet, which is redeemable immediately. </span></li>

            <li><span>To maintain their ivory tier membership, a member needs to maintain an annual purchase value of
                INR
                {{ number_format(\App\Helpers\Tiers::currentTier('Ivory Tier')->requiredPoints * getCurrentCurrency()->con_ratio, 2) }}/-</span>
            </li>
            <li>
              <span>
                The points in your FEI wallet are valid for 3 months from date of issue. After a period of 3 months,
                these points will be null & void and cannot be redeemed.
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="blogpost-item  mb-3 pt-3 pb-3 p-0">

    <div class="row ">
      <div class="col-sm-4">
        <a href="#" class="position_relative mb-0">
          <img class="blur-up lazyloaded" src="{{ asset('allUsers/customer/images/reward-card-500x500-2') }}.png"
            data-src="{{ asset('allUsers/customer/images/reward-card-500x500-2') }}.png"
            style=" width: 400px; margin: auto;" alt="image" title="">

          <div @class([
              'reward-card-info',
              'd-none' => Auth::guard('buyer')->user()->membership_type !== 'Silver Tier',
          ])>
            <center>

              <h4 class="mt-3 text-white">{{ Auth::guard('buyer')->user()->fullName }}</h4>
              <h6 class="text-white">{{ implode('-', str_split(Auth::guard('buyer')->user()->membership_id, 4)) }}</h6>
            </center>

            <div class="reward-info-left text-white">
              <small>MEMBER SINCE</small>
              <p>{{ Auth::guard('buyer')->user()->created_at->format("M'y") }}</p>
            </div>
            <div class="reward-info-right text-white">
              <small>VALID TILL</small>
              <p>{{ Auth::guard('buyer')->user()->membership_expiry_date->format("M'y") }}</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-sm-8 pt-3">
        <div class="post-detail text-left">
          <h3 class="post-title mb-0">
            <a href="#">The Silver Tier</a>
            <span @class([
                'd-none' => Auth::guard('buyer')->user()->membership_type !== 'Silver Tier',
            ])
              style=" background: green !important;color: #fff; font-size: 9px; border-radius: 6px; padding: 3px 10px; line-height: normal;">
              Active
            </span>
          </h3>

          <p class="exceprt mb-0"> (Enjoy a discount of
            {{ number_format(\App\Helpers\Tiers::currentTier('Silver Tier')->percentageDiscountOnFirstPurchase, 0) }}%
            on all your purchases for a year as a silver tier member.)</p>

          <p class="exceprt mb-0">(Unlimited free shipping on all purchases within India)</p>

          <p class="exceprt mb-0">(Cash on delivery available on all purchases within India.)</p>

          <ul class="mt-2" style="padding-left:15px">
            {{-- <li>
              <span> Special birthday week discount of 10%, applicable sitewide.
              </span>
            </li> --}}

            <li>
              <span> This is the top tier which will be automatically achieved by shopping on FEI for a value worth
                {{ getCurrentCurrency()->currency }}
                {{ number_format(\App\Helpers\Tiers::currentTier('Silver Tier')->requiredPoints * getCurrentCurrency()->con_ratio, 2) }}/-
              </span>
            </li>

            <li>
              <span>A bonus of points worth {{ getCurrentCurrency()->currency }}
                {{ number_format(\App\Helpers\Tiers::currentTier('Silver Tier')->walletBonus * getCurrentCurrency()->con_ratio, 2) }}/-
                will be added to your FEI wallet, which is redeemable
                immediately.
              </span>
            </li>

            <li>
              <span>
                The points in your FEI wallet are valid for 3 months from date of issue. After a period of 3 months,
                these points will be null & void and cannot be redeemed.
              </span>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="blogpost-item  mb-3 pt-3 pb-3 p-0">

    <div class="row ">
      <div class="col-sm-4">
        <a href="#" class="position-relative mb-0">
          <img class="blur-up lazyloaded" src="{{ asset('allUsers/customer/images/reward-card-500x500-3') }}.png"
            data-src="{{ asset('allUsers/customer/images/reward-card-500x500-3') }}.png"
            style=" width: 400px; margin: auto;" alt="image" title="">
          <div @class([
              'reward-card-info',
              'd-none' =>
                  Auth::guard('buyer')->user()->membership_type !== 'Club Exclusive Tier',
          ])
          style="top: 0%;">
            <center>

              <h4 class="text-white">{{ Auth::guard('buyer')->user()->fullName }}</h4>
              <h6 class="text-white">{{ implode('-', str_split(Auth::guard('buyer')->user()->membership_id, 4)) }}</h6>
            </center>

            <div class="reward-info-left text-white">
              <small>MEMBER SINCE</small>
              <p>{{ Auth::guard('buyer')->user()->created_at->format("M'y") }}</p>
            </div>
            <div class="reward-info-right text-white">
              <small>VALID TILL</small>
              <p>{{ Auth::guard('buyer')->user()->membership_expiry_date->format("M'y") }}</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-sm-8 ">

        <div class="post-detail text-left">
          <h3 class="post-title mb-0"><a href="#">The Club Exclusive</a></h3>
          <p class="exceprt mb-0"> (Enjoy a discount of 10% on all your purchases. )</p>

          <p class="exceprt mb-0">(Unlimited free shipping worldwide.)</p>

          <p class="exceprt mb-0">(Cash on delivery available on all purchases within India.)</p>

          <ul class="mt-2 mb-0" style="padding-left:15px">
            <li> <span>Special birthday week discount of 10%</span> </li>

            <li><span>Membership is by invitation, based on the members purchase history with FEI. </span> </li>

            <li><span>This is the exclusive tier which can be achieved by shopping on FEI for a value worth INR 50,000/-
                per month. </span></li>
            <li>
              <span>
                The points in your FEI wallet are valid for 3 months from date of issue. After a period of 3 months,
                these points will be null & void and cannot be redeemed.
              </span>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>

</div>
