@extends('user.header')
@section('userContent')
  @include('extensions.alerts')

  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">All permissions</h4>
              </div>
              <div class="box-body">

                <div class="table-responsive">

                  <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                      <div class="col-sm-12 col-md-6"></div>
                      <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <table id="example2" class="table table-lg invoice-archive tr-odd_clr dataTable no-footer"
                          role="grid" aria-describedby="example2_info">
                          <thead>
                            <tr role="row">

                              <th width="2%" class="sorting_asc" tabindex="0" aria-controls="example2"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Sl#: activate to sort column descending">#
                              </th>

                              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Supplier">Permission Title</th>

                              <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Action: activate to sort column ascending">Action</th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($permissions as $key => $permission)
                              <tr role="row" class="odd">
                                <td align="left" class="sorting_1">
                                  {{ ++$key }}
                                </td>

                                <td align="left">
                                  {{ $permission->title }}
                                </td>

                                <td>
                                  <a href="{{ route('admin.permissions.edit', $permission->id) }}" type="button"
                                    title="Edit permission" class="badge badge-pill badge-primary"><i
                                      class="fa fa-pencil"></i></a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  {{ $permissions->links() }}

                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
@endsection
