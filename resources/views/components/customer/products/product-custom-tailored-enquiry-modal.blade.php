<div id="customSize" class="mfpbox mfp-with-anim mfp-hide">
  <!--Product Tabs-->
  <div class="tabs-listing mt-2 mt-md-5">
    <ul class="product-tabs list-unstyled d-flex-wrap border-bottom m-0 d-md-flex">
      <li rel="description1" class="active"><a class="tablink i-know-my-size-btn">I KNOW MY SIZE</a></li>
      <li rel="size-chart1"><a class="tablink">I DON’T KNOW MY SIZE</a></li>
      {{-- <li rel="shipping-return1"><a class="tablink">HOW TO MEASURE </a></li> --}}

    </ul>
    <div class="tab-container">
      <div id="description1" class="tab-content">
        <div class="product-description">
          <div class="row">
            <form class="col-sm-6" method="post"
              action="{{ route('customer.product-custom-tailored-enquiry.store') }}">
              @csrf
              <input type="hidden" name="query_type" value="I know my size" />
              <input type="hidden" name="product_id" value="{{ $product->id }}" />
              <input type="hidden" name="color" value="{{ $product->productTypeValueOne?->type_value }}" />
              <input type="hidden" name="size" value="{{ 'CUSTOM' }}" />
              <input type="hidden" name="quantity" value="1" />
              <div class="row">
                <div class="col-sm-12 mb-3">
                  <span class="me-2">Choose your units</span>
                  <label class="radio-inline me-2">
                    <input type="radio" name="unit_type" @checked(old('unit') === 'inches') value="inches"
                      @empty(old('unit')) checked @endempty />
                    &nbsp;inches
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="unit_type" @checked(old('unit') === 'cms') value="cms"> &nbsp;cms
                  </label>
                </div>

              </div>
              <div class="row">
                <div class="col-12 text-center">
                  <p class="h3 text-decoration-underline mb-10">Top</p>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="upper_bust" value="{{ old('upper_bust') }}"
                        placeholder="UPPERBUST/CHEAT" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="apex_apex" value="{{ old('apex_apex') }}"
                        placeholder="APEX TO Apex" id="apex_apex" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="bust" value="{{ old('bust') }}"
                        placeholder="BUST/CHEST" id="bust">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="full_karte_legth"
                        value="{{ old('full_karte_legth') }}" placeholder="FULL KARTE LEGTH" id="full_karte_legth">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="under_bust" value="{{ old('under_bust') }}"
                        placeholder="UNDERBUST/CHEST">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="arm_hole" value="{{ old('arm_hole') }}"
                        placeholder="ARMHOLE">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="mid_waist" value="{{ old('mid_waist') }}"
                        placeholder="MID WAIST">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="bicep" value="{{ old('bicep') }}"
                        placeholder="BICEP">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="tummy" value="{{ old('tummy') }}"
                        placeholder="TUMMY">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="elbow" value="{{ old('elbow') }}"
                        placeholder="ELBOW ROUND">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="low_waist" value="{{ old('low_waist') }}"
                        placeholder="LOW WAIST">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="forearm" value="{{ old('forearm') }}"
                        placeholder="FOREARM">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="sleeve_mori" value="{{ old('sleeve_mori') }}"
                        placeholder="SLEEVE MORI">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="shoulder_to_under_bust"
                        value="{{ old('shoulder_to_under_bust') }}" placeholder="SHOULDER TO UNDERBUST"
                        id="shoulder_to_under_bust">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="sleeve_length" value="{{ old('sleeve_length') }}"
                        placeholder="SLEEVE LENGTH">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="shoulder_slope"
                        value="{{ old('shoulder_slope') }}" placeholder="SHOULDER SLOPE">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="neck_round" value="{{ old('neck_round') }}"
                        placeholder="NECK ROUND" id="neck_round" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="shoulder" value="{{ old('shoulder') }}"
                        placeholder="SHOULDER" id="shoulder" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="front_neck_depth"
                        value="{{ old('front_neck_depth') }}" placeholder="FRONT NECK DEPTH">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="across_front" value="{{ old('across_front') }}"
                        placeholder="CROSS FRONT" id="across_front" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="back_neck_depth"
                        value="{{ old('back_neck_depth') }}" placeholder="BACK NECK DEPTH">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="cross_back" value="{{ old('cross_back') }}"
                        placeholder="CROSS BACK" id="cross_back" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="waist_till_mid_thigh"
                        value="{{ old('waist_till_mid_thigh') }}" placeholder="WAIST TILL MID THIGH"
                        id="waist_till_mid_thigh" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="shoulder_to_apex"
                        value="{{ old('shoulder_to_apex') }}" placeholder="SHOULDER TO APEX"
                        id="shoulder_to_apex" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="apex" value="{{ old('apex') }}"
                        placeholder="APEX" id="apex" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="above_bust" value="{{ old('above_bust') }}"
                        placeholder="ABOVE BUST" id="above_bust" />
                    </div>
                  </div>



                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="blouse_length" value="{{ old('blouse_length') }}"
                        placeholder="BLOUSE LENGTH">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="waist_round" value="{{ old('waist_round') }}"
                        placeholder="WAIST ROUND">
                    </div>
                  </div>




                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="sleeve_round" value="{{ old('sleeve_round') }}"
                        placeholder="SLEEVE ROUND">
                    </div>
                  </div>

                </div>

                <div class="col-12 text-center">
                  <p class="h3 text-decoration-underline mb-10">Bottom</p>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="bottom" value="{{ old('bottom') }}"
                        placeholder="BOTTOM">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="mid_thigh" value="{{ old('mid_thigh') }}"
                        placeholder="MID THIGHS">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="pant_waist" value="{{ old('pant_waist') }}"
                        placeholder="PANT WAIST">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="knee" value="{{ old('knee') }}"
                        placeholder="KNEES">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="hip" value="{{ old('hip') }}"
                        placeholder="HIPS">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="calf" value="{{ old('calf') }}"
                        placeholder="CALF">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="crotch_length" value="{{ old('crotch_length') }}"
                        placeholder="CROTCH LENGTH">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="pant_length" value="{{ old('pant_length') }}"
                        placeholder="PANT LENGTH">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="upper_thigh" value="{{ old('upper_thigh') }}"
                        placeholder="UPPER THIGHS">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" maxlength="100" name="pant_mori" value="{{ old('pant_mori') }}"
                        placeholder="PANT MORI">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group">
                    <textarea type="text" maxlength="1000" name="message" value="{{ old('message') }}" placeholder="MESSAGE"></textarea>
                  </div>
                </div>

              </div>


              <div class="row">
                <div class="col-sm-12  mt-4 mb-2">
                  <h6>Your Contact Details</h6>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="email" maxlength="100" name="email" value="{{ old('email') }}"
                      placeholder="EMAIL ADDRESS *" required>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" maxlength="100" name="mobile" value="{{ old('mobile') }}"
                      placeholder="MOBILE NUMBER *" required>
                  </div>
                </div>
                <div class="product-form__item--submit col-sm-12">
                  <button class="btn rounded product-form__cart-submit">Submit</button>
                </div>
              </div>
            </form>
            <div class="col-sm-6">
              <img src="{{ asset('allUsers/front.jpeg') }}">
              <img src="{{ asset('allUsers/back.jpeg') }}">
            </div>
          </div>
        </div>
      </div>


      <div id="size-chart1" class="tab-content">
        <div class="row">

          <div class="col-sm-6">

            <form class="row" method="post"
              action="{{ route('customer.product-custom-tailored-enquiry.store') }}">
              @csrf
              <input type="hidden" name="query_type" value="I do not know my size" />
              <input type="hidden" name="product_id" value="{{ $product->id }}" />
              <input type="hidden" name="color" value="{{ $product->productTypeValueOne?->type_value }}" />
              <input type="hidden" name="size" value="{{ 'CUSTOM' }}" />
              <input type="hidden" name="quantity" value="1" />
              <div class="col-sm-12  mt-4 mb-2">
                <h6>Tell us how to get in touch with you</h6>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input type="text" maxlength="100" name="name" value="{{ old('name') }}"
                    placeholder="FULL NAME">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input type="email" maxlength="100" name="email" value="{{ old('email') }}"
                    placeholder="EMAIL ADDRESS *" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input type="text" maxlength="100" name="mobile" value="{{ old('mobile') }}"
                    placeholder="MOBILE NUMBER *" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <textarea type="text" maxlength="1000" name="message" value="{{ old('message') }}" placeholder="MESSAGE"></textarea>
                </div>
              </div>
              <div class="product-form__item--submit col-sm-12">
                <button href="javascript:;" class="btn rounded product-form__cart-submit">Submit</button>
              </div>
            </form>


          </div>



        </div>
      </div>


      {{-- <div id="shipping-return1" class="tab-content">
        <div class="col-sm-12">
          <iframe style="width:100%;height:400px" src="https://www.youtube.com/embed/PY8Yy6pYLiY?controls=0"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </div>
      </div> --}}
    </div>
  </div>
</div>
