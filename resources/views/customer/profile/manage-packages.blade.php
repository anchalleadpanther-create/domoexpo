<div id="managePackages" class="booked-slots tab-pane">
  <div class="row">
    <div class="col-md-8">
      <h3>Manage your packages</h3>
    </div>
    <div class="col-md-4 text-right">
      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#packageModal"
        class="btn btn-small btn-outline-primary new-package">
        <i class="icon an me-2 an-chevron-circle-left"></i>new package
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-12 py-5">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Cost</th>
            <th scope="col">Duration</th>
            <th scope="col">Image</th>
            <th scope="col">Edit/Disable/Delete</th>
          </tr>
        </thead>
        <tbody class="packages">
        </tbody>

      </table>
    </div>
  </div>

</div>
<x-customer.package-modal />
