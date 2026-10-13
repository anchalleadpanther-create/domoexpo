@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 887px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <!-- vertical wizard -->
        <div class="box">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-6 ">
                <h4 class="box-title">Menus</h4>
              </div>
              <div class="col-6 text-right">
                {{-- <button class="btn btn-sm btn-primary "><i class="fa fa-plus"></i> Add menu</button> --}}
              </div>
            </div>
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
                              <th scope="col">Menu</th>
                              <th scope="col">Menu Name *</th>
                              <th scope="col">Menu Icon</th>
                              <th scope="col">Menu URL</th>
                              <th scope="col">Menu Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <form method="post" action="{{ route('admin.menu.store') }}" id="dropdown-form"
                                enctype="multipart/form-data">
                                @csrf
                                <td>
                                  <select class="form-select" name="parent_id" onchange="filterMenus(this)">
                                    <option value="0" selected="">Select</option>
                                    @foreach ($menus as $menu)
                                      @if ($menu->parent_id === 0)
                                        <option value="{{ $menu->id }}">{{ $menu->menu_name }}</option>
                                      @endif
                                    @endforeach
                                  </select>
                                </td>
                                <td><input maxlength="100" type="text" name="menu_name" class="form-control" required
                                    placeholder="Menu Name *"></td>
                                <td><input maxlength="100" type="text" name="menu_icon" class="form-control"
                                    placeholder="Menu Icon"></td>
                                <td><input type="text" class="form-control" name="menu_url" placeholder="Menu URL"></td>
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
                      <button type="submit" form="dropdown-form" class="waves-effect waves-light btn bg-dark3 btn-sm mb-5"><i
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
                            <th width="2%">#</th>
                            <th width="20%">MENU NAME</th>
                            <th width="20%">MENU ICON</th>
                            <th width="20%">MENU URL</th>
                            <th width="10%">SORT NUM</th>
                            <th width="10%">STATUS</th>
                            <th width="5%">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <form method="post" id="sort-form" action="{{ route('admin.menu.update', 1) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="sort-update">
                            @foreach ($menus as $key => $menu)
                              <input type="hidden" name="id[]" value="{{ $menu->id }}">
                              <tr class="result" data-pid="{{ $menu->parent_id }}">
                                <td align="left">{{ ++$key }}</td>
                                <td align="left">{{ $menu->menu_name }}</td>
                                <td align="left"><i class="{{ $menu->menu_icon }}"></i></td>
                                <td align="left"><a href="{{ $menu->menu_url }}"
                                    target="_blank">{{ $menu->menu_url }}</a></td>
                                <td align="left"><input type="number" min="0"
                                    onKeyPress="if(this.value.length===8) return false;" name="sort[]"
                                    value="{{ $menu->sort }}" class="form-control " /></td>
                                <td align="left">{{ $menu->status === 1 ? 'Enable' : 'Disable' }}</td>
                                <td>
                                  <button data-id="{{ $menu->id }}" data-menu-name="{{ $menu->menu_name }}"
                                    data-menu-pid="{{ $menu->parent_id }}" data-menu-icon="{{ $menu->menu_icon }}"
                                    data-menu-url="{{ $menu->menu_url }}" data-menu-status="{{ $menu->status }}"
                                    data-update-url="{{ route('admin.menu.update', $menu->id) }}" type="button"
                                    data-bs-toggle="modal" data-bs-target="#modal-default"
                                    class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                    style="width:100%;font-size:12px;background:#172b4c !important;color:#fff!important"
                                    onclick="updateModalInfo(this)">Edit</button>
                                </td>
                              </tr>
                            @endforeach
                            <tr>
                              <td align="left"></td>
                              <td align="left"></td>
                              <td align="left"></td>
                              <td align="left"></td>
                              <td align="center"><button class="btn btn-sm btn-primary text-nowrap"
                                  form="sort-form">Update Sort No.</button></td>
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
          <h4 class="modal-title">Edit Menu</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" id="menu-info-form">
            @csrf
            @method('PATCH')
            <input type="hidden" name="type" value="normal-update">
            <div class="form-group">
              <select class="form-select parent-id" name="parent_id">
                <option value="0" selected="">Select</option>
                @foreach ($menus as $menu)
                  @if ($menu->parent_id === 0)
                    <option value="{{ $menu->id }}">{{ $menu->menu_name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <input maxlength="100" type="text" name="menu_name" class="menu-name form-control" required
                placeholder="Menu Name *">
            </div>
            <div class="form-group">
              <td><input maxlength="100" type="text" name="menu_icon" class="form-control menu-icon" placeholder="Menu Icon">
              </td>

            </div>
            <div class="form-group">
              <input type="text" class="menu-url form-control" name="menu_url" placeholder="Menu URL"></td>
            </div>
            <div class="form-group">
              <select class="form-select menu-status" name="status">
                <option value="1">Enable</option>
                <option value="0">Disable</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="menu-info-form" class="btn btn-sm bg-dark3 float-end">Save changes</button>
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
                    <h5 class="text-dark font-weight-bolder ">Are you sure you want to delete this dropdown?</h5>
                    <p class="text-dark ">This action cannot be reversed!</p>
                  </div>
                </div>
                <form method="post" id="dropdown-delete-form">
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
      document.querySelector('#menu-info-form').setAttribute('action', info.dataset.updateUrl);
      document.querySelector('.menu-name').value = info.dataset.menuName;
      document.querySelector('.menu-url').value = info.dataset.menuUrl;
      document.querySelector('.parent-id').value = info.dataset.menuPid;
      document.querySelector('.menu-status').value = info.dataset.menuStatus;
      document.querySelector('.menu-icon').value = info.dataset.menuIcon;
    }

    function destroyUrlUpdate(info) {
      document.querySelector('#dropdown-delete-form').setAttribute('action', info.dataset.destroyUrl);
    }

    function filterMenus(e) {
      document.querySelectorAll('.result').forEach(element => {
        if (e.value == 0) {
          element.style.display = 'table-row';
        } else {
          if (element.dataset.pid === e.value) {
            element.style.display = 'table-row';
          } else {
            element.style.display = 'none';
          }
        }
      })
    }
  </script>
@endsection
