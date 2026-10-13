@extends('user.header')
@section('userContent')
  <div class="content-wrapper rounded15 p-0 p-md-10" style="min-height: 887px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        @include('extensions.alerts')
        <!-- vertical wizard -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Footer Sub Categories</h4>
          </div>
          <div class="box-body">
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="qualification" role="tabpanel">
                <div class="col-sm-12">
                  <div class="row">
                    {{-- <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Other Training and Certification <a href="" class="waves-effect waves-light btn btn-info mb-5 pull-right"><i class="fa fa-plus"></i></a></h5> --}}
                    <div class="clearfix"></div>
                    <div class="col-12">
                      <div class="table-responsive-sm">
                        <table class="table mb-0">
                          <thead class="table-light">
                            <tr>
                              <th scope="col">Category Name</th>
                              <th scope="col">Sub Category Name</th>
                              <th scope="col">Sub Category Link</th>
                              <th scope="col">Sub Category Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <form method="post" action="{{ route('admin.footer-sub-category.store') }}"
                                id="dropdown-form">
                                @csrf
                                <td>
                                  <select class="form-select" required name="parent_id">
                                    <option value="">Select</option>
                                    @foreach ($categories as $subCategory)
                                      <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                  </select>
                                </td>
                                <td><input maxlength="100" type="text" name="name" class="form-control" required
                                    placeholder="Sub Category Name"></td>
                                <td><input type="text" class="form-control" value="" name="link" maxlength="500"
                                    placeholder="Sub Category Link"></td>
                                <td>
                                  <select class="form-select" name="status" required>
                                    <option value="1" selected="">Enable</option>
                                    <option value="0">Disable</option>
                                  </select>
                                </td>
                              </form>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-20">
                  <hr>
                  <div class="col-md-12  ">
                    <div class="clearfix text-right">
                      <button type="submit" form="dropdown-form" class="waves-effect waves-light btn btn-dark mb-5"><i
                          class="fa fa-check"></i> Save</button>
                      {{-- <button type="button" class="waves-effect waves-light btn btn-dark mb-5"><i class="fa fa-arrow-right"></i> Next</button> --}}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table id="example2" class="table table-lg invoice-archive tr-odd_clr">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>CATEGORY NAME</th>
                            <th>SUB CATEGORY NAME</th>
                            <th>SUB CATEGORY LINK</th>
                            <th>SORT NO.</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <form method="post" id="sort-form"
                            action="{{ route('admin.footer-sub-category.update', 1) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="sort-update">
                            @foreach ($subCategories as $key => $subCategory)
                              <input type="hidden" name="id[]" value="{{ $subCategory->id }}">
                              <tr>
                                <td align="left">{{ ++$key }}</td>
                                <td align="left">{{ $subCategory->category->name }}</td>
                                <td align="left">{{ $subCategory->name }}</td>
                                <td align="left">{{ $subCategory->link }}</td>
                                <td align="left"><input type="number" min="1"
                                    onKeyPress="if(this.value.length===8) return false;" name="sortid[]"
                                    value="{{ $subCategory->sort }}" class="form-control " /></td>
                                <td align="left">{{ $subCategory->status === 1 ? 'Enable' : 'Disable' }}</td>
                                <td>
                                  <button data-id="{{ $subCategory->id }}"
                                    data-category-id="{{ $subCategory->parent_id }}"
                                    data-category-name="{{ $subCategory->name }}"
                                    data-category-link="{{ $subCategory->link }}"
                                    data-category-status="{{ $subCategory->status }}"
                                    data-update-url="{{ route('admin.footer-sub-category.update', $subCategory->id) }}"
                                    type="button" data-bs-toggle="modal" data-bs-target="#modal-default"
                                    class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                    style="width:100%;font-size:12px;background:#649464 !important;color:#fff!important"
                                    onclick="updateModalInfo(this)">Edit</button>
                                  <button type="button"
                                    data-destroy-url="{{ route('admin.footer-sub-category.destroy', $subCategory->id) }}"
                                    data-bs-toggle="modal" data-bs-target="#modal-delete"
                                    class="waves-effect waves-light btn btn-danger btn-flat mb-5"
                                    style="width:100%;margin: 2px 0;font-size:12px"
                                    onclick="destroyUrlUpdate(this)">Delete</button>
                                </td>
                              </tr>
                            @endforeach
                            <tr>
                              <td align="left"></td>
                              <td align="left"></td>
                              <td align="left"></td>
                              <td align="left"></td>
                              <td align="center"><button class="btn btn-sm btn-primary" form="sort-form">Update Sort
                                  No.</button></td>
                              <td align="left"></td>
                              <td></td>
                            </tr>
                          </form>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  <div class="modal fade" id="modal-default" aria-modal="true" role="dialog">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Category</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" id="cat-info-form">
            @csrf
            @method('PATCH')
            <input type="hidden" name="type" value="normal-update">
            <div class="form-group">
              <select class="form-control cat-id" required name="parent_id">
                <option value="">Select</option>
                @foreach ($categories as $subCategory)
                  <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <input maxlength="100" type="text" name="name" class="form-control cat-name" required
                placeholder="Sub Category Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control cat-link" maxlength="500" value="" name="link"
                placeholder="Sub Category Link">
            </div>
            <div class="form-group">
              <select class="form-select cat-status" name="status" required>
                <option value="1">Enable</option>
                <option value="0">Disable</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="cat-info-form" class="btn btn-primary float-end">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="modal-delete" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="row text-center">
                  <div class="col-12 text-center my-2 px-1">
                    <i data-feather="trash-2" class="text-dark mb-1"></i>
                    <h5 class="text-dark font-weight-bolder ">Are you sure you want to delete this item?</h5>
                    <p class="text-dark ">This action cannot be reversed!</p>
                  </div>
                </div>
                <form method="post" id="cat-delete-form">
                  <div class="row mx-0">
                    @csrf
                    @method('DELETE')
                    <div class="col-6">
                      <div class="d-grid gap-1">
                        <button type="submit" class="btn btn-block btn-dark">Delete</button>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="d-grid gap-1">
                        <button type="button" class="btn btn-block btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
  <script type="text/javascript">
    function updateModalInfo(info) {
      document.querySelector('#cat-info-form').setAttribute('action', info.dataset.updateUrl);
      document.querySelector('.cat-id').value = info.dataset.categoryId;
      document.querySelector('.cat-name').value = info.dataset.categoryName;
      document.querySelector('.cat-link').value = info.dataset.categoryLink;
      document.querySelector('.cat-status').value = info.dataset.categoryStatus;
    }

    function destroyUrlUpdate(info) {
      document.querySelector('#cat-delete-form').setAttribute('action', info.dataset.destroyUrl);
    }
  </script>
@endsection
