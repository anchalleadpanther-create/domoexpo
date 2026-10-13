<div id="productInquiry" class="mfpbox mfp-with-anim mfp-hide">
  <div class="contact-form form-vertical p-lg-1">
    <div class="page-title">
      <h3>Product Inquiry Popup</h3>
    </div>
    <form method="post" action="{{ route('customer.product-enquiry.store') }}" id="contact_form" class="contact-form">
      @csrf
      <input type="hidden" name="product_id" value="{{ $productId }}" />
      <div class="formFeilds">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
              <input type="text" id="ContactFormName" name="name" placeholder="Name" required maxlength="100"
                @auth('buyer') value="{{ auth()->guard('buyer')->user()->fullName }}" @endauth />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
              <input type="email" id="ContactFormEmail" name="email" placeholder="Email" required maxlength="100"
                @auth('buyer') value="{{ auth()->guard('buyer')->user()->email }}" @endauth />
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
              <input type="number" id="ContactFormPhone" name="contact_phone" pattern="[0-9]{1}[0-9]{5,15}"
                placeholder="Phone Number"
                @auth('buyer') value="{{ auth()->guard('buyer')->user()->phone }}" required @endauth />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
              <input type="text" id="ContactFormSubject" name="subject" placeholder="Subject" value="" required
                maxlength="100" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
              <textarea rows="8" maxlength="500" id="ContactFormMessage" name="message" placeholder="Message" required></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <input type="submit" class="btn rounded w-100" value="Send Message" />
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
