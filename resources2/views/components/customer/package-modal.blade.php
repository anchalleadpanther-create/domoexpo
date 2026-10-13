<div class="modal fade" id="packageModal" tabindex="-1" aria-labelledby="packageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="packageModalLabel">Add new package</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="package-form">
          <div class="row">
            <div class="col-4">
              <div class="mb-3">
                <label for="packageName" class="form-label">Name of the package *</label>
                <input type="text" maxlength="100" class="form-control" id="packageName"
                  placeholder="Ex: Hairdresser, Makeup artist etc" name="name" />
              </div>
            </div>
            <div class="col-4">
              <div class="mb-3">
                <label for="packagePrice" class="form-label">Price of the package *</label>
                <input type="number" min="0" max="9999999999.99" class="form-control" id="packagePrice"
                  placeholder="Ex: 9950.0" name="price" />
              </div>
            </div>
            <div class="col-4">
              <div class="mb-3">
                <label for="packageDuration" class="form-label">Duration of the package *</label>
                <input type="text" maxlength="50" class="form-control" id="packageDuration"
                  placeholder="Ex: 60-90 Minutes" name="duration" />
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="packageDescription" class="form-label">Short Description of the package *</label>
                <input type="text" maxlength="100" class="form-control" id="packageDescription"
                  placeholder="Ex: Makeup artist specialized in bridal makeup and party makeup..." name="description" />
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="packageInclusions" class="form-label">Inclusions of the package *</label>
                <textarea type="text" class="package-inclusions" id="packageInclusions"
                  placeholder="Ex: Makeup artist specialized in bridal makeup and party makeup..." name="inclusions"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="packageDescriptionLong" class="form-label">Long Description of the package *</label>
                <textarea type="text" maxlength="2000" class="form-control package-description" id="packageDescriptionLong" rows="4"
                  placeholder="Ex: Makeup artist specialized in bridal makeup and party makeup..." name="long_description"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="packagePhoto" class="form-label">Photo</label>
                <input type="file" accept=".jpg,.webp,.jpeg,.png" class="form-control pt-2"
                  id="packagePhoto"name="package_photo" />
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

