<div class="modal fade" id="modal-delete" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="row text-center">
                <div class="col-12 text-center my-2 px-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-alert-triangle text-dark mb-1">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                    </path>
                    <line x1="12" y1="9" x2="12" y2="13"></line>
                    <line x1="12" y1="17" x2="12" y2="17"></line>
                  </svg>
                  <h5 class="text-dark font-weight-bolder ">Are you sure you want to delete this permanently?</h5>
                  <p class="text-dark ">This action cannot be reversed!</p>
                </div>
              </div>
              <form method="post" id="dropdown-delete-form">
                <div class="row mx-0">
                  @csrf
                  @method('DELETE')
                  <div class="col-6">
                    <div class="d-grid gap-1">
                      <button type="submit" class="btn btn-block btn-dark">Delete <svg
                          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-trash-2 text-white mb-1"
                          style="width:16px;height: 16px;">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                          </path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg></button>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="d-grid gap-1">
                      <button type="button" class="btn btn-block btn-secondary" data-bs-dismiss="modal">Cancel <svg
                          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-x-circle text-dark mb-1"
                          style="width:16px;height: 16px;">
                          <circle cx="12" cy="12" r="10"></circle>
                          <line x1="15" y1="9" x2="9" y2="15"></line>
                          <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script>
  function destroyUrlUpdate(info) {
    document.querySelector('#dropdown-delete-form').setAttribute('action', info.dataset.destroyUrl);
  }
</script>
