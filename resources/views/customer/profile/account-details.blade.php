<div id="account-details" class="tab-pane fade">
  <h3>Account details </h3>
  <div class="account-login-form bg-light-gray padding-20px-all">
    <form action="{{ route('buyer.profile-update', Auth::guard('buyer')->user()->id) }}" method="post">
      @csrf
      @method('PATCH')
      <fieldset>
        <p>You can change your account details here.</p>
        <div class="row">
          <div class="form-group">
            <div class="d-flex mt-3 col-md-12 col-lg-12 col-xl-12">
              <label class="control-label me-3 mb-0"><strong>Title</strong></label>
              <div class="customRadio clearfix me-3 mb-0">
                <input name="title" id="mr" value="Mr" @checked(Auth::guard('buyer')->user()->title === 'Mr')
                  @empty(Auth::guard('buyer')->user()->title) checked @endempty type="radio" class="padding-10px-right">
                <label for="mr" class="mb-0">Mr &nbsp;</label>
              </div>
              <div class="customRadio clearfix me-3 mb-0">
                <input name="title" id="mrs" value="Ms" @checked(Auth::guard('buyer')->user()->title === 'Ms') type="radio"
                  class="padding-10px-right">
                <label for="mrs" class="mb-0">Ms</label>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-lg-6 col-xl-6">
            <label for="input-firstname" class="d-none">First Name <span class="required-f">*</span></label>
            <input name="first_name" placeholder="First Name" value="{{ Auth::guard('buyer')->user()->first_name }}"
              required id="input-firstname" class="form-control" type="text" required maxlength="50">
          </div>
          <div class="form-group col-md-6 col-lg-6 col-xl-6">
            <label for="input-lastname" class="d-none">Last Name <span class="required-f">*</span></label>
            <input name="last_name" placeholder="Last Name" value="{{ Auth::guard('buyer')->user()->last_name }}"
              id="input-lastname" class="form-control" type="text" required maxlength="50">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12 col-lg-12 col-xl-12">
            <label for="input-email" class="d-none">Email <span class="required-f">*</span></label>
            <input name="email" placeholder="Email" value="{{ Auth::guard('buyer')->user()->email }}" id="input-email"
              class="form-control" type="email" required maxlength="100">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-lg-6 col-xl-6">
            <label for="input-telephone" class="d-none">Telephone <span class="required-f">*</span></label>
            <input name="phone" placeholder="Telephone" value="{{ Auth::guard('buyer')->user()->phone }}"
              id="input-telephone" class="form-control" type="tel">
          </div>
          <div class="form-group col-md-6 col-lg-6 col-xl-6">
            <label class="d-none">Birthdate <span class="required-f">*</span></label>
            <input name="dob" class="form-control" type="date"
              @isset(Auth::guard('buyer')->user()->dob) value="{{ Auth::guard('buyer')->user()->dob->format('Y-m-d') }}" @endisset>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-12 col-lg-12 col-xl-12">
            {{-- <div class="customCheckbox clearfix mb-2">
                          <input id="offers" name="offers" type="checkbox" />
                          <label for="offers">Receive offers from our partners</label>
                        </div> --}}
            <div class="customCheckbox clearfix">
              <input id="newsletter" name="newsletter" type="checkbox" value="1" @checked(Auth::guard('buyer')->user()->newsletter === 1) />
              <label for="newsletter">Sign up for our newsletter</label>
            </div>
          </div>
        </div>
      </fieldset>
      <button type="submit" class="btn btn-primary rounded">Save</button>
    </form>
  </div>
</div>
