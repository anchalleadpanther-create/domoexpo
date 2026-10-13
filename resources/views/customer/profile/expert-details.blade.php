<div id="expert-details" class="tab-pane fade">
  <h3>Expert details </h3>
  <div class="account-login-form bg-light-gray padding-20px-all">
    <form action="{{ route('buyer.expert-profile-update') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <fieldset>
        <p>You can change your expert details here.</p>
        <div class="row mt-2">
          <div class="form-group col-md-6 col-lg-6 col-xl-6">
            <label for="input-firstname" class="d-none">First Name <span class="required-f">*</span></label>
            <input name="expert_first_name" placeholder="First Name"
              value="{{ Auth::guard('buyer')->user()->expert_first_name }}" required id="input-firstname"
              class="form-control" type="text" required maxlength="50">
          </div>
          <div class="form-group col-md-6 col-lg-6 col-xl-6">
            <label for="input-lastname" class="d-none">Last Name <span class="required-f">*</span></label>
            <input name="expert_last_name" placeholder="Last Name"
              value="{{ Auth::guard('buyer')->user()->expert_last_name }}" id="input-lastname" class="form-control"
              type="text" required maxlength="50">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12 col-lg-12 col-xl-12">
            <label for="input-email" class="d-none">Category <span class="required-f">*</span></label>
            <input type="text" name="category" placeholder="Category"
              value="{{ Auth::guard('buyer')->user()->category }}" id="input-email" class="form-control" required
              maxlength="100">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12 col-lg-12 col-xl-12">
            <label for="input-email" class="d-none">Description <span class="required-f">*</span></label>
            <textarea rows="5" name="description" placeholder="Description" id="input-email" class="desc">{{ Auth::guard('buyer')->user()->description }}</textarea>
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="packagePhoto" class="form-label">Photo
              @isset(Auth::guard('buyer')->user()->photo)
                <a target="_blank" href="{{ asset('uploads/buyer') . '/' . Auth::guard('buyer')->user()->photo }}"
                  class="text-pink "><i class="fa fa-image"></i></a>
              @endisset
            </label>
            <input type="file" accept=".jpg,.webp,.jpeg,.png" class="form-control pt-2"
              id="packagePhoto"name="expert_photo" />
          </div>
        </div>
      </fieldset>
      <button type="submit" class="btn btn-primary rounded">Save</button>
    </form>
  </div>
</div>

