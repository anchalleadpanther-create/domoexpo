@extends('customer.partials.header')
@section('customerContent')
  <!--Body Container-->
  <style>
    .collection-hero__image {
      height: 300px !important
    }
  </style>
  <div id="page-content" class="loyalty_pg">

    <!--Store Feature-->
    <div class="about-pstyle2">
      <div class="collection-header inner-content">
        <div class="collection-hero inner mb-0">
          <div class="collection-hero__image"></div>
          <div class="collection-hero__title-wrapper d-flex-justify-center h-100">
            <div class="container position-relative mt-md-0">
              <h2 class="collection-hero__title text-white mt-2 mb-2">LOYAL LUXURY PROGRAM </h2>
              <p class="collection__subtitle fs-5 text-white mb-0">REWARD YOUR LOVE FOR YOUR KIDS</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Spring Summer Product Slider-->
    <section class="section pt-5 pb-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <div class="section-header">
              <h3 class="mt-0">PERKS OF BEING ROYAL LOYAL</h3>
              <p>The Royal Loyal is an exclusive Loyalty Program for our customers which gives irresistible offers.
                <br />
                Free shipping, Complimentary Gift wrapping & Birthday gift Vouchers, and much more.
              </p>
            </div>
          </div>
        </div>

        <div class="row mt-3"></div>

        <div class="blogpost-item mb-3 pt-3 pb-3">
          <span>1</span>
          <div class="row ">
            <div class="col-sm-2">
              <a href="#" class=" mb-0">
                <img class="blur-up lazyload" src="{{ asset('allUsers/customer/images/Gold_icon.png') }}"
                  data-src="{{ asset('allUsers/customer/images/Gold_icon.png') }}" style="margin: auto;" alt="image"
                  title="" />
              </a>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-9 pt-3 ">
              <div class="post-detail text-left" style="display:none">
                <h3 class="post-title mb-0"><a href="#">Gold Tier</a></h3>
                <ul class="mt-2" style="padding-left:15px">
                  <li><span> Min. require spent is Rs. 75,000</span></li>
                  <li><span> For every Rs. 100 spent, you earn 1 Reward Point</span></li>
                  <li><span> Birthday Gift Voucher worth Rs 1000.</span></li>
                  <li><span> Complementary Delivery.</span></li>
                  <li><span>Gift Packing on Every Order.</span></li>
                  <li><span>On Referral get 250 Points on every new referral.</span></li>
                </ul>
              </div>
              <div class="post-detail text-left">
                <h3 class="post-title mb-0"><a href="#">Gold Tier</a></h3>
                <ul class="mt-2" style="padding-left:15px">
                  <li><span> Min. require spent is Rs. 75,000</span></li>
                  <li><span> For every Rs. 100 spent, you earn 1 Reward Point</span></li>
                  <li><span> Birthday Gift Voucher worth Rs 1000.</span></li>
                  <li><span> Complementary Delivery.</span></li>
                  <li><span>Gift Packing on Every Order.</span></li>
                  <li><span>On Referral get 250 Points on every new referral.</span></li>
                </ul>
              </div>

            </div>
          </div>
        </div>


        <div class="blogpost-item  mb-3 pt-3 pb-3">
          <span>2</span>
          <div class="row ">
            <div class="col-sm-2">
              <a href="#" class=" mb-0">
                <img class="blur-up lazyload" src="{{ asset('allUsers/customer/images/platinum_icon_1_.png') }}"
                  data-src="{{ asset('allUsers/customer/images/platinum_icon_1_.png') }}" style=" margin: auto;"
                  alt="image" title="" />
              </a>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-9 pt-3">
              <div class="post-detail text-left">
                <h3 class="post-title mb-0"><a href="#">Platinum Tier </a></h3>
                <ul class="mt-2" style="padding-left:15px">
                  <li><span>Min. require spent is Rs. 5,00,000</span></li>
                  <li><span>For every Rs. 100 spent, you earn 3 Reward Points.</span></li>
                  <li><span>Birthday Gift Voucher worth Rs 2500.</span></li>
                  <li><span>Upon referral get 500 Points on every new referral.</span></li>
                  <li><span>Priority Access to Discounts & New Launch Offers.</span></li>
                  <li><span>Plus Gold Benefits</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>


        <div class="blogpost-item  mb-3 pt-3 pb-3">
          <span>3</span>
          <div class="row ">
            <div class="col-sm-2">
              <a href="#" class=" mb-0">
                <img class="blur-up lazyload" src="{{ asset('allUsers/customer/images/diamond_icon.png') }}"
                  data-src="{{ asset('allUsers/customer/images/diamond_icon.png') }}" style=" width: 400px; margin: auto;"
                  alt="image" title="" />
              </a>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-9 pt-3">
              <div class="post-detail text-left">
                <h3 class="post-title mb-0"><a href="#">Silver Tier</a></h3>
                <ul class="mt-2" style="padding-left:15px">
                  <li><span>Min. require spent is Rs. 10,00,000</span></li>
                  <li><span>For every Rs. 100 spent, you earn 5 Reward Points.</span></li>
                  <li><span>Birthday Gift Voucher worth Rs 5,000.</span></li>
                  <li><span>Personal Stylist Access.</span></li>
                  <li><span>Feature & Tagging as Client Diaries on social media.</span></li>
                  <li>
                    <span>
                      Exclusive Fashion Event Invite.
                    </span>
                  </li>
                  <li><span>Plus Platinum Benefits</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
  </div>
  </section>
  <!--End Spring Summer Product Slider-->




  <section class="section pt-5 pb-5 policy_tab__" style="margin-top: 60px;">
    <div class="container">
      <div class="row">
        <!--Product Tab vertical-->
        <div class="row tab-vertical-style ">
          <div class="col-12 col-sm-3 mb-2 sm-md-0" style="padding-right:0">
            <div class="nav flex-column nav-pills" id="vertical-tab" role="tablist" aria-orientation="vertical">
              {{-- <a class="nav-link active" id="faq-tab" data-bs-toggle="pill" href="#faq" role="tab"
                aria-controls="faq" aria-selected="true">FAQ</a> --}}
              <a class="nav-link active" id="description-tab" data-bs-toggle="pill" href="#description" role="tab"
                aria-controls="description" aria-selected="false">Terms & Conditions</a>
              <a class="nav-link" id="sizeChart-tab" data-bs-toggle="pill" href="#sizeChart" role="tab"
                aria-controls="sizeChart" aria-selected="false">Eligibility & Enrollment</a>
              <a class="nav-link" id="shippingReturn-tab" data-bs-toggle="pill" href="#shippingReturn" role="tab"
                aria-controls="shippingReturn" aria-selected="false">Privacy</a>
              <a class="nav-link" id="reviewt-tab" data-bs-toggle="pill" href="#reviewt" role="tab"
                aria-controls="reviewt" aria-selected="false">Benefits of Membership</a>
              <a class="nav-link" id="addtional1-tab" data-bs-toggle="pill" href="#addtional1" role="tab"
                aria-controls="addtional1" aria-selected="false">Severability</a>
              <a class="nav-link" id="addtional-tab" data-bs-toggle="pill" href="#addtional" role="tab"
                aria-controls="addtional" aria-selected="false">Limitations of Liability & Damages</a>
            </div>
          </div>
          <div class="col-12 col-sm-9">
            <div class="tab-content" id="vertical-tabContent">

              <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                <div class="product-description">
                  <div class="accordion" id="accordionFaq">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">What is
                          the LT Loyalty Program?</button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>
                            The LT loyalty program is a rewards program that gives you access to the most coveted
                            benefits and rewards. The more you buy, the more points you earn. These points can be redeemed
                            towards your purchases on LT & help you reach the next tier and enjoy more benefits. Get
                            ready to buy more, earn more and redeem more!!
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Who can
                          join the LT Loyalty Program?</button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>All individuals above the age of eighteen years old (18), who provide valid & accurate
                            personal information while registering with LT are eligible to be a part of the LT club.
                            Registration with LT automatically enrols you into the pink tier of the loyalty program.
                            <br />
                            Corporations, groups and associations are not eligible to participate.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Is
                          it free to join the LT Loyalty Program?</button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>Yes, it is free to join the LT Loyalty Program. Registration with LT automatically enrols
                            you into the pink tier of the loyalty program. </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How do
                          I join?</button>
                      </h2>
                      <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="collapseFour"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>Registration with LT automatically enrols you into the pink tier of the loyalty program.
                            Register here. <br />
                            @guest('buyer')
                              <a href="javascript:;" class="text-pink" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Click here to register!</a>
                            @endguest
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">What
                          information do I need to provide to join?</button>
                      </h2>
                      <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="collapseFive"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>At the time of registration you will only be asked to provide your first and last name,
                            mobile number & email address. If you need any assistance with registration, please contact us
                            on +916359880688.</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Is my
                          personal information protected?</button>
                      </h2>
                      <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="collapseSix"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>We take steps to help protect the confidentiality and security of personal information you
                            share with us. Please see our Privacy Policy for more details. <br />
                            <a href="https://fashioneditindia.com/pages/privacy-policy" class="text-pink">Privacy
                              Policy</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Do I
                          have to give my mobile number and my email?</button>
                      </h2>
                      <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="collapseSeven"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>Yes, your LT membership is linked to your phone number & email address.
                            This information must be provided in order to earn points, get notifications regarding
                            available benefits & discounts. Kindly ensure that all contact information is updated so that
                            you do not miss out on any offers. We may also send you a text message on the provided mobile
                            number to verify the number for COD purchases.</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven2" aria-expanded="false" aria-controls="collapseSeven2">What
                          will you do with my email if I give it to you?</button>
                      </h2>
                      <div id="collapseSeven2" class="accordion-collapse collapse" aria-labelledby="collapseSeven2"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>
                            By registering with LT and providing your email address, you are open to receiving marketing
                            communication from LT. These include updates regarding your order, promotional emails
                            regarding new offers & our bi-weekly newsletters.
                            You may change your marketing communication preferences online at any time in your LT
                            account. You can also unsubscribe from our newsletters by clicking on the "unsubscribe" link
                            found at the bottom of our marketing emails. If you opt out of marketing communications, you
                            will still continue to receive service messages from us. Please see our Privacy Policy for
                            more details. <br /> <a href="https://fashioneditindia.com/pages/privacy-policy"
                              class="text-pink">Privacy Policy</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven3" aria-expanded="false" aria-controls="collapseSeven3">What
                          happens if I do not verify my mobile number?</button>
                      </h2>
                      <div id="collapseSeven3" class="accordion-collapse collapse" aria-labelledby="collapseSeven3"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>Verifying your mobile number requires the receipt of and a response to a text message on the
                            mobile number provided at the time of registration with LT.
                            Verification of mobile number is essential to qualify for COD purchases with LT.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven4" aria-expanded="false" aria-controls="collapseSeven4">How
                          do I "self-identify" as an LT member?</button>
                      </h2>
                      <div id="collapseSeven4" class="accordion-collapse collapse" aria-labelledby="collapseSeven4"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>Always log in to your LT account while checking out & completing your purchase with LT. As
                            you log in, your account information will be linked to your shopping cart. <br />
                            You can view your account details & LT membership details in ‘My Account’. <br />Please
                            ensure that all contact details are up to date, so you can enjoy the benefits of the LT
                            loyalty program. </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven5" aria-expanded="false" aria-controls="collapseSeven5">How
                          do I opt out of marketing emails?</button>
                      </h2>
                      <div id="collapseSeven5" class="accordion-collapse collapse" aria-labelledby="collapseSeven5"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>You may change your marketing communication preferences online at any time in your LT
                            account. You can also unsubscribe from our newsletters by clicking on the "unsubscribe" link
                            found at the bottom of our marketing emails. If you opt out of marketing communications, you
                            will still continue to receive service messages including - messages about your membership
                            status, benefits & rewards, from us. Please see our Privacy Policy for more details. <br /> <a
                              href="https://fashioneditindia.com/pages/privacy-policy" class="text-pink">Privacy
                              Policy</a></p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven6" aria-expanded="false" aria-controls="collapseSeven6">What
                          happens if I opt out of marketing emails?</button>
                      </h2>
                      <div id="collapseSeven6" class="accordion-collapse collapse" aria-labelledby="collapseSeven6"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>We understand that sometimes we just get too many emails & it can be overwhelming. Opting out
                            of marketing emails will not affect your LT loyalty membership and ability to earn rewards or
                            enjoy benefits. However, LT marketing communications are generally sent via email, if you opt
                            out, you may miss notifications regarding special promotions such as new collections, sales,
                            exclusive offers & time sensitive opportunities. You may also miss out on exclusive offers &
                            status information regarding your LT membership. </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven7">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven7" aria-expanded="false" aria-controls="collapseSeven7">How
                          can I opt back in to marketing emails?</button>
                      </h2>
                      <div id="collapseSeven7" class="accordion-collapse collapse" aria-labelledby="collapseSeven7"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>You may change your marketing email preferences at any time by signing in to your account on
                            www.fashioneditindia.com.</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven8">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven8" aria-expanded="false" aria-controls="collapseSeven8">What
                          are my benefits and rewards?</button>
                      </h2>
                      <div id="collapseSeven8" class="accordion-collapse collapse" aria-labelledby="collapseSeven8"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>The LT loyalty program entitles you to rewards & special benefits.
                            LT rewards come in the form of points. Benefits include exclusive discounts & free shipping
                            services. Eligibility of these discounts & services may depended on your LT membership status
                            and the tier you currently qualify for. Click here to browse the details of our LT loyalty
                            program. <br />
                            <a href="https://fashioneditindia.com/program/loyalty" class="text-pink">Loyalty Program</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven9">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven9" aria-expanded="false" aria-controls="collapseSeven9">Can I
                          combine benefits, rewards and promotions to get more
                          rewards?</button>
                      </h2>
                      <div id="collapseSeven9" class="accordion-collapse collapse" aria-labelledby="collapseSeven9"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>One only one discount code can be applied at one time. Discount codes can be clubbed with
                            available sitewide discounts, depending on the running offers. Your LT points have a validy
                            on 3 months from the date of issue, after this time period these points are null & void and
                            cannot be redeemed.</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven10">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven10" aria-expanded="false" aria-controls="collapseSeven10">
                          How can I check my rewards balances?</button>
                      </h2>
                      <div id="collapseSeven10" class="accordion-collapse collapse" aria-labelledby="collapseSeven10"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>
                            You can get information about your LT membership status & rewards in the following ways: </p>
                          <ol>
                            <li> Sign in to your LT account on www.fashioneditindia.com & click on the ‘My Account’ to
                              get your LT membership information<br />
                              ‘My card’ will update you on your current LT membership status & give you
                              more information regarding the different tiers of the loyalty program. ‘My
                              E-Wallet’ will give you information regarding the points in your LT wallet. </li>
                            <li> Contact us on +916359880688 for any assistance & information regarding your LT account &
                              purchases with LT. </li>
                            <li> You will be receiving an email with your LT membership status & points as you progress &
                              grow through the tiers of the loyalty program as a member of the LT Club. </li>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven11">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven11" aria-expanded="false" aria-controls="collapseSeven11">
                          How do I update my membership account information?</button>
                      </h2>
                      <div id="collapseSeven11" class="accordion-collapse collapse" aria-labelledby="collapseSeven11"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <ol>
                            <li> Sign in to your LT account on www.fashioneditindia.com & click on the ‘My Account’ to
                              update your LT membership information.</li>
                            <li> Contact us on +916359880688 for any assistance & information regarding your LT account
                              & purchases with LT.
                            </li>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven12">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven12" aria-expanded="false" aria-controls="collapseSeven12">
                          How can I start earning points?</button>
                      </h2>
                      <div id="collapseSeven12" class="accordion-collapse collapse" aria-labelledby="collapseSeven12"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>Registration with LT automatically enrols you into the pink tier of the loyalty program &
                            entitles you to a welcome gift of points worth Rs. 1000 INR.
                            Ensure you are logged in to your LT account at the time of shopping with LT.
                            The more you buy, the more points you earn. These points can be redeemed towards your
                            purchases on LT & help you reach the next tier and enjoy more benefits. Get ready to buy
                            more, earn more and redeem more!!</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven13">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven13" aria-expanded="false" aria-controls="collapseSeven13">
                          What do you mean by qualifying items?</button>
                      </h2>
                      <div id="collapseSeven13" class="accordion-collapse collapse" aria-labelledby="collapseSeven13"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>
                            Certain products & services do not qualify or entitle you to the LT reward points or
                            discounts. For example you cannot earn points on charitable donations, certain brands might be
                            excluded from discounts and some exclusions may apply from time to time during special
                            promotions. </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven14">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven14" aria-expanded="false" aria-controls="collapseSeven14">
                          What is the difference between base points and bonus points?</button>
                      </h2>
                      <div id="collapseSeven14" class="accordion-collapse collapse" aria-labelledby="collapseSeven14"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p> Base points:<br />
                            Registration with LT automatically enrols you into the pink tier of the loyalty program &
                            entitles you to a welcome gift of points worth Rs. 1000 INR.
                          </p>
                          <p> Bonus points: <br />
                            Earn bonus reward points as you are eligible for different tiers of the LT loyalty programme.
                            To know more about the LT loyalty program click here. <br />
                            <a href="https://fashioneditindia.com/program/loyalty" class="text-pink">Loyalty Program</a>
                          </p>
                          <p> From time to time, we offer promotional opportunities to earn more points. Subscribe to our
                            newsletters to stay updated!
                          </p>
                          </ul>


                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="collapseSeven15">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseSeven15" aria-expanded="false" aria-controls="collapseSeven15">How
                          do you calculate my points?</button>
                      </h2>
                      <div id="collapseSeven15" class="accordion-collapse collapse" aria-labelledby="collapseSeven15"
                        data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                          <p>We calculate your LT reward points based on the net spend on qualifying items rounded to the
                            nearest INR. The net spend is the amount spent on qualifying items after returns, discounts
                            and taxes have been deducted. Additionally, any amount of the net spend that is paid for with
                            gift cards will be deducted before the reward is calculated. With regard to qualifying items,
                            please note that certain products and services do not qualify as spend</p>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade show active" id="description" role="tabpanel"
                aria-labelledby="description-tab">
                <div class="product-description">
                  <p>BY PARTICIPATING IN THE PROGRAM, YOU AGREE TO ACCEPT ALL VERSIONS OF THE PROGRAM TERMS AND
                    CONDITIONS AND
                    ACKNOWLEDGE THAT YOU HAVE READ, UNDERSTAND, AND CONSENT TO THE PRIVACY POLICY.</p>
                  <p>The Loyalty Program is offered exclusively by LT. Members participating in the Program agree to be
                    bound by these Terms and
                    Conditions, as they may change from time to time.</p>
                  <p>These T&Cs supersede all previous terms and conditions applicable to the Program. All Program
                    benefits, offers, rewards, and
                    services are subject to availability. Except as otherwise expressly prohibited or limited by
                    applicable laws, LT may at any time
                    amend, modify, supplement, or terminate the Program, the T&Cs, the structure for earning rewards, or
                    reward levels even though
                    such changes may affect the value of rewards, or the ability to obtain certain rewards. If notice of
                    such action is required by law, it
                    will be provided in accordance with such laws. If the Program is terminated, all unredeemed benefits
                    will be forLTted without any
                    obligation or liability and will not be honored upon termination or after the conclusion of the
                    notice period, if any notice is required
                    by law. In all matters relating to the administration of the Program, the decisions of LT will be
                    final. Under no circumstances will
                    LT be held liable for any delay or failure in performance due in whole or in part to any acts of
                    nature or other cases beyond our
                    reasonable control.</p>
                  <p>LT reserves the right to cancel or suspend your participation in the Program in the event of
                    fraud, abuse of rewards privileges,
                    violation of these Program Rules or any applicable laws, or at our discretion. Any rewards points in
                    your account will become void at
                    the time of cancellation. We may revoke some or all of your points if we determine that you received
                    the points due to an error,
                    through fraud or deception, or in any manner not authorized.</p>

                  <p>Members are responsible for reading, understanding, and remaining knowledgeable of the Program
                    Rules, any program rule
                    changes, account statements, available benefits and rewards, the LT Privacy Policy, and other
                    communications from LT in order to
                    understand your rights, responsibilities, and status in the Program. If a member has questions about
                    the Program or these Program
                    Rules, the member should contact Customer Service.</p>
                  <p>Members are responsible for any tax liability related to participation in the Program.</p>
                </div>
              </div>


              <div class="tab-pane fade" id="sizeChart" role="tabpanel" aria-labelledby="sizeChart-tab">
                <div class="product-description">
                  <ul>


                    <li>This Program is a separate and distinct program from the LT.</li>

                    <li>Rewards received under this Program and rewards received under any other program offered by LT
                      or its
                      participating partners are not interchangeable and may not be transferred or combined, unless
                      otherwise stated
                      herein.</li>

                    <li>Your mobile phone number is your unique membership identifier and must be provided to earn
                      points on
                      eligible purchases. Because we use your mobile number and email address to identify you as a
                      member and to
                      notify you of Program benefits, you must ensure that both are accurate and current.</li>

                    <li>Corporations, groups, and associations are not eligible to participate in the Program.</li>

                    <li>An individual may enroll in the Program by fully and accurately providing applicable information
                      on the LT
                      website or through other channel(s), if available.</li>

                    <li>LT may deny membership in the Program to any enrollee in its sole discretion and without
                      written notice.</li>

                    <li>The Program benefits and rewards are nontransferable unless expressly stated otherwise. Any such
                      attempt to
                      transfer or assign shall be null and void.</li>

                    <li>Upon the death of a member, the member’s account will be closed and any benefits or rewards in
                      the account
                      will be forLTted.</li>
                  </ul>
                </div>
              </div>
              <div class="tab-pane fade" id="shippingReturn" role="tabpanel" aria-labelledby="shippingReturn-tab">
                <div class="" id="shipping-return">
                  <h4 class="text-uppercase">Privacy</h4>
                  <p>
                    Any personal information you provide to LT in connection with the Program will be handled in
                    accordance with the LT Privacy
                    Policy. When you enroll in the Program and provide us your email address, you are opting in to
                    receiving marketing emails from
                    us. You may update your marketing email preferences at any time. Please note that even if you opt
                    out of receiving marketing
                    messages, you will continue to receive transactional and service-related messages from us regarding
                    the Program.
                  </p>

                  <h4 class="text-uppercase mt-4">Membership</h4>
                  <p>
                    The Program is available to any person who is at least eighteen (18) years old and provides valid
                    and accurate personal
                    information when enrolling. Participation in a separate and unique credit or debit card program is
                    not required for a general
                    membership. Once enrolled into the Program, you will enter at the Base status level and are entitled
                    to the rewards and benefits
                    of membership as set out herein or in promotional materials.</p>

                  <h4 class="text-uppercase mt-4">Employees</h4>

                  <p>LT employees are eligible to participate in the Program with limitations. Employees are not
                    eligible to participate in
                    promotional offers or receive benefits specifically associated with any status level greater than
                    Base status.</p>

                  <h4 class="text-uppercase mt-4">Membership Tiers</h4>

                  <p>Upon reaching certain milestones, members will unlock higher membership tiers with additional
                    benefits and rewards based on
                    the net value of purchases made online at LT. Each level is unlocked at a minimum Net Purchase
                    Balance. The Net Purchase
                    Balance is the purchase amount after returns, discounts, taxes, and any amounts redeemed in Gift
                    Cards have been deducted.</p>

                  <p>At the beginning of each calendar year, the NPB will be reset to zero. Members will enter the next
                    year at the previous year-end
                    status level and retain that as the minimum level through the end of the new year even though the
                    NPB was reset. As new
                    milestones are attained, members will unlock higher status levels. If, during a calendar year, the
                    member does not reach the
                    minimum NPB milestone associated with the status at which they entered the new calendar year, at the
                    end of that calendar
                    year, the status level will revert to the status appropriate for the actual NPB maintained.</p>


                </div>
              </div>
              <div class="tab-pane fade" id="reviewt" role="tabpanel" aria-labelledby="reviewt-tab">
                <div class="product-description">
                  Members will receive exclusive benefits in the form of rewards, such as points, services, and event
                  access. As communication
                  regarding the Program, your account, benefits, and promotions will be sent via email, you are
                  responsible for ensuring we have
                  the most recent and accurate email. LT is not responsible for communications, offers, or rewards sent
                  to out-of-date email
                  addresses.

                  <h4 class="text-uppercase mt-4">Earn Points</h4>
                  <p>To receive points when shopping you must self-identify as a member by providing your member mobile
                    number at Checkout.</p>

                  <h4 class="text-uppercase mt-4">Base Points</h4>
                  <p>As explained, based on your tier status and membership category, you will receive a designated
                    number of points for every rupee
                    (INR 1/-) of qualifying net spend. Some exclusions apply and certain products and services do not
                    qualify for the benefit.</p>


                  <h4 class="text-uppercase mt-4">Bonus Points</h4>

                  <p>From time to time, LT may offer the opportunity to earn bonus points. The promotional materials
                    may identify additional qualifying
                    events, exclusions, and restrictions. Certain designer boutiques, brands, and products may be
                    excluded and/or limit promotional
                    bonus points opportunities. Generally, you will be notified of any bonus point promotions by email.
                  </p>


                  <h4 class="text-uppercase mt-4">Points Calculations</h4>

                  <p>For purchases made, points are calculated based on the net purchase amount of qualifying spend
                    rounded to the nearest INR. The net
                    purchase amount is the spend amount after returns, discounts, taxes, shipping, tips, and any amounts
                    redeemed in Gift Cards or
                    points have been deducted. Points received for items that are returned will be deducted from your
                    points balance.</p>

                  <p>You will not earn points on charitable donations, and purchases of certain brands. Special
                    promotions or offers may include
                    additional exclusions and will be disclosed within the promotion or offer terms.</p>

                  <h4 class="text-uppercase mt-4">Expiration</h4>

                  <p>All points will expire after a Program account has had no activity for twelve (12) consecutive
                    months.</p>
                  <h4 class="text-uppercase mt-4"> IMPORTANT NOTE </h4>
                  <p>1. Points have no cash value and cannot be exchanged for cash or credit. You have no ownership
                    interest in points,
                    and these rewards collected do not constitute property.</p>

                  <p>2. The use of the word "earn" or similar language in marketing materials in relation to the Program
                    does not imply
                    that the points have any value prior to conversion or redemption.</p>

                  <p>3. Points may not be purchased or sold and are not transferable except as otherwise stated herein.
                  </p>

                  <p>4. Members are eligible for certain Program benefits based on tier status. Some benefits may only
                    be available on
                    certain products.</p>

                  <p>5. Tier status benefits must be used in the year in which they are awarded, and any unused benefits
                    will be forLTted
                    at the end of each calendar year.</p>

                  <p>6. At the beginning of each calendar year, the available benefits will be renewed based on the
                    status level achieved at
                    the end of the previous year. If a member advances to a higher Program tier status during that year,
                    they will only
                    be entitled to the benefit for the achieved new status. If any portion of that benefit was used
                    while in the
                    lower-level status, it will be subtracted from the total allocation of the benefit in the achieved
                    new status.</p>


                </div>
              </div>
              <div class="tab-pane fade" id="addtional1" role="tabpanel" aria-labelledby="addtional1-tab">
                <div class="product-description">
                  <p>If any provision of these Program Rules or the application of any such provision to any person or
                    circumstance is held invalid,
                    illegal, or unenforceable for any reason whatsoever, the remaining provisions of these Program Rules
                    and the application of such
                    provisions to other persons or circumstances shall not be affected. To the fullest extent possible,
                    the court finding such provision
                    invalid, illegal, or unenforceable shall modify and construe the provision so as to render it valid
                    and enforceable as against all
                    persons or entities and to give the maximum possible protection to persons subject to
                    indemnification within the bounds of
                    validity, legality, and enforceability.</p>

                  <h4>No Waiver</h4>
                  <p>
                    LT’s failure to insist upon or enforce strict compliance with any provision of these Program Rules
                    shall not be construed as a waiver of any provision or right and will not prevent us from enforcing
                    such right or provision in the future. Nothing in these Program Rules will limit LT from exercising
                    any legal rights or remedies that it may have.
                  </p>

                  <h4>Headings</h4>
                  <p>The headings for each of these Program Rules are for convenience of reference only. Such headings
                    shall be ignored in the interpretation or construction of any of these Program Rules.
                  </p>
                  <h4>Complete Understanding</h4>
                  <p>These Program Rules and the Privacy Policy referenced herein constitute the entire understanding
                    between you and LT with respect to the Program.
                  </p>
                  <h4>Errors or Inconsistencies</h4>
                  <p>Despite our best efforts to ensure accuracy, errors occasionally occur. We reserve the right to
                    correct such errors at any time even if it affects pending benefits, rewards, points in your
                    account. In the event of any inconsistency or discrepancy between the Program Rules or other
                    statements contained in any related materials or advertising, the terms of the then-current Program
                    Rules shall prevail, govern, and control.
                  </p>
                </div>
              </div>
              <div class="tab-pane fade" id="addtional" role="tabpanel" aria-labelledby="addtional-tab">
                <div class="product-description">
                  <p>EXCEPT AS OTHERWISE EXPRESSLY PROVIDED, THE PROGRAM AND ALL PRODUCTS AND SERVICES ARE PROVIDED ON
                    AN "AS IS" BASIS. LT DISCLAIMS ALL
                    WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION, IMPLIED WARRANTIES
                    OF MERCHANTABILITY AND FITNESS FOR A
                    PARTICULAR PURPOSE AND THOSE ARISING OUT OF A COURSE OF DEALING OR USAGE OF TRADE. LT DOES NOT
                    WARRANT THAT THE PROGRAM WILL BE
                    UNINTERRUPTED OR ERROR FREE.</p>
                  <p>YOUR PARTICIPATION IN THE PROGRAM IS AT YOUR OWN RISK. NEITHER LT NOR ITS AFFILIATED OR RELATED
                    ENTITIES OR ITS VENDORS OR CONTENT PROVIDERS
                    SHALL BE LIABLE TO ANY PERSON OR ENTITY FOR ANY DIRECT OR INDIRECT LOSS, DAMAGE (WHETHER ACTUAL,
                    CONSEQUENTIAL, PUNITIVE, SPECIAL OR
                    OTHERWISE), INJURY, CLAIM, OR LIABILITY OF ANY KIND OR CHARACTER WHATSOEVER BASED UPON OR RESULTING
                    FROM YOUR PARTICIPATION IN OR INABILITY
                    TO PARTICIPATE IN THE PROGRAM.</p>
                  <p>YOU AGREE TO INDEMNIFY, DEFEND AND HOLD HARMLESS NORDSTROM, ITS SHAREHOLDERS, OFFICERS, DIRECTORS,
                    EMPLOYEES, AGENTS, DISTRIBUTORS,
                    VENDORS AND AFFILIATES FROM AND AGAINST ANY AND ALL THIRD-PARTY CLAIMS, DEMANDS, LIABILITIES, COSTS
                    OR EXPENSES, INCLUDING REASONABLE
                    ATTORNEYS' FEES, RESULTING OR ARISING OUT OF YOUR BREACH OF ANY OF THESE NORDY CLUB TERMS AND
                    CONDITIONS.</p>
                  <p>If any part of these warranty disclaimers or limitations of liability is found to be invalid or
                    unenforceable for any reason or if we are otherwise found to be liable to you in
                    any manner, then our aggregate liability for all claims under such circumstances shall not exceed
                    the amount paid by you for your participation in the Program during the
                    prior twelve (12) months. Some jurisdictions do not allow the exclusion of certain warranties or the
                    limitation or exclusion of liability for damages. Accordingly, some of
                    the above indemnities, limitations and disclaimers may not apply to you. To the extent we may not,
                    as a matter of applicable law, disclaim any warranty or limit our
                    liability, the scope and duration of such warranty and the extent of our liability will be the
                    minimum permitted under such law.</p>
                  <p>We may assign our rights and obligations under these Program Rules, including in connection with a
                    merger, acquisition, sale of assets or equity, or by operation of law.

                    These Program Rules are governed by the laws of the Sovereign of India, without regard to any
                    conflict of law provisions. Any action relating to the Program or any
                    transaction with LT must be brought in the state of Ahmedabad, India. You consent and submit to the
                    personal jurisdiction of such courts for the purposes of any such
                    action.</p>
                  <p>Please contact our Service Center if you have a dispute regarding the Program.</p>
                  <h4>
                    CUSTOMER SERVICE:<br>
                    For questions or assistance, just give us a call at 000000.<br>
                    Thanks for being one of our most valued customers.<br>
                    Effective as of July 01, 2022.
                  </h4>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!--Product Tab vertical-->
      </div>
    </div>
  </section>

  <!--Testimonial Slider-->
  <section class="section testimonial-slider style1" style="display:none !important">
    <div class="container">
      <div class="row">
        <div class="col-12 section-header style1">
          <div class="section-header-left">
            <h2>Recent Members</h2>
          </div>
        </div>
      </div>
      <div class="quote-wraper">
        <!--Testimonial Slider Items-->
        <div class="quotes-slider">
          <div class="quotes-slide">
            <blockquote class="quotes-slider__text text-center">
              <div class="testimonial-image"><img class="blur-up lazyload"
                  data-src="{{ asset('allUsers/customer/images/testimonial-photo2.jpg') }}"
                  src="{{ asset('allUsers/customer/images/testimonial-photo2.jpg') }}" alt="Shetty Jamie"
                  title="Shetty Jamie" /></div>
              <div class="rte-setting">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s.</p>
              </div>
              <div class="product-review">
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star"></i>
              </div>
              <p class="authour">Shetty Jamie,</p>
              <p class="cmp-name">Kollision</p>
            </blockquote>
          </div>
          <div class="quotes-slide">
            <blockquote class="quotes-slider__text text-center">
              <div class="testimonial-image"><img class="blur-up lazyload"
                  data-src="{{ asset('allUsers/customer/images/testimonial-photo3.jpg') }}"
                  src="{{ asset('allUsers/customer/images/testimonial-photo3.jpg') }}" alt="Sara Colinton"
                  title="Sara Colinton" /></div>
              <div class="rte-setting">
                <p>Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                  PageMaker including versions readable content page.</p>
              </div>
              <div class="product-review">
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star"></i>
              </div>
              <p class="authour">Sara Colinton,</p>
              <p class="cmp-name">Pel</p>
            </blockquote>
          </div>
          <div class="quotes-slide">
            <blockquote class="quotes-slider__text text-center">
              <div class="testimonial-image"><img class="blur-up lazyload"
                  data-src="{{ asset('allUsers/customer/images/testimonial-photo4.jpg') }}"
                  src="{{ asset('allUsers/customer/images/testimonial-photo4.jpg') }}" alt="Hamlet Tuong"
                  title="Hamlet Tuong" /></div>
              <div class="rte-setting">
                <p>Scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                  into electronic of remaining essentially 1960s.</p>
              </div>
              <div class="product-review">
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star gray-star"></i>
              </div>
              <p class="authour">Hamlet Tuong,</p>
              <p class="cmp-name">OPL</p>
            </blockquote>
          </div>
          <div class="quotes-slide">
            <blockquote class="quotes-slider__text text-center">
              <div class="testimonial-image"><img class="blur-up lazyload"
                  data-src="{{ asset('allUsers/customer/images/testimonial-photo1.jpg') }}"
                  src="{{ asset('allUsers/customer/images/testimonial-photo1.jpg') }}" alt="Shetty Jamie"
                  title="Shetty Jamie" /></div>
              <div class="rte-setting">
                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                  Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum.</p>
              </div>
              <div class="product-review">
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star"></i>
                <i class="an an-star gray-star"></i>
              </div>
              <p class="authour">Happy Customer,</p>
              <p class="cmp-name">CPL</p>
            </blockquote>
          </div>
        </div>
        <!--Testimonial Slider Items-->
      </div>
    </div>
  </section>
  <!--End Testimonial Slider-->

  <!--Category Grid-->
  <div class="container-full px-3 clearfix mt-5 mb-5" style="display:none !important">
    <div class="section-header">
      <h2 class="pink_txt"> Follow us on Instagram @TLTNDIA</h2>
    </div>
    <!--Category Masonary Grid-->
    <div class=" grid-mr-10">
      <div class="  style5">
        <div class="grid-sizer col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 grid-7col"></div>
        <div class="row grid-7col mx-0">
          <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 category-grid-item cl-item">
            <div class="category-item position-relative overflow-hidden zoomscal-hov">
              <a href="shop-left-sidebar.html" class="category-link">
                <div class="zoom-scal"><img class="blur-up lazyload"
                    data-src="{{ asset('allUsers/customer/images/collection/collection1.jpg') }}"
                    src="{{ asset('allUsers/customer/images/collection/collection1.jpg') }}" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 category-grid-item cl-item">
            <div class="category-item position-relative overflow-hidden zoomscal-hov">
              <a href="shop-left-sidebar.html" class="category-link">
                <div class="zoom-scal"><img class="blur-up lazyload"
                    data-src="{{ asset('allUsers/customer/images/collection/collection2.jpg') }}"
                    src="{{ asset('allUsers/customer/images/collection/collection2.jpg') }}" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 category-grid-item cl-item">
            <div class="category-item position-relative overflow-hidden zoomscal-hov">
              <a href="shop-left-sidebar.html" class="category-link">
                <div class="zoom-scal"><img class="blur-up lazyload"
                    data-src="{{ asset('allUsers/customer/images/collection/collection3.jpg') }}"
                    src="{{ asset('allUsers/customer/images/collection/collection3.jpg') }}" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 category-grid-item cl-item">
            <div class="category-item position-relative overflow-hidden zoomscal-hov">
              <a href="shop-left-sidebar.html" class="category-link">
                <div class="zoom-scal"><img class="blur-up lazyload"
                    data-src="{{ asset('allUsers/customer/images/collection/collection4.jpg') }}"
                    src="{{ asset('allUsers/customer/images/collection/collection4.jpg') }}" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 category-grid-item cl-item">
            <div class="category-item position-relative overflow-hidden zoomscal-hov">
              <a href="shop-left-sidebar.html" class="category-link">
                <div class="zoom-scal"><img class="blur-up lazyload"
                    data-src="{{ asset('allUsers/customer/images/collection/collection5.jpg') }}"
                    src="{{ asset('allUsers/customer/images/collection/collection5.jpg') }}" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 category-grid-item cl-item">
            <div class="category-item position-relative overflow-hidden zoomscal-hov">
              <a href="shop-left-sidebar.html" class="category-link">
                <div class="zoom-scal"><img class="blur-up lazyload"
                    data-src="{{ asset('allUsers/customer/images/collection/collection6.jpg') }}"
                    src="{{ asset('allUsers/customer/images/collection/collection6.jpg') }}" alt="collection"
                    title="" /></div>

              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--End Category Masonary Grid-->
  </div>
  <!--End Category Grid-->



  </div>
  <!--End Body Container-->
@endsection
