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
                <h4 class="box-title">All Admin Users</h4>
                <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-bold bg-gradient-primary pull-right">+
                  Admin User</a>
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

                              <th width="18%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Supplier">Name</th>

                              <th width="12%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Supplier Address">Email
                              </th>

                              <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Auth Representative">Phone</th>

                              <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Client Followup: activate to sort column ascending">Permission
                              </th>

                              <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="Action: activate to sort column ascending">Action</th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $key => $user)
                              <tr role="row" class="odd">
                                <td align="left" class="sorting_1">
                                  {{ ++$key }}
                                </td>

                                <td>
                                  {{ $user->name }}
                                </td>

                                <td>
                                  {{ $user->email }}
                                </td>

                                <td>
                                  {{ $user->phone }}
                                </td>

                                <td>
                                  {{ $user->permission?->title }}
                                </td>

                                <td>
                                  <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="waves-effect waves-light btn btn-default btn-flat mb-5 d-block"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                    Update
                                  </a>

                                  <a href="{{ route('admin.users.status', [$user->id, $user->status === 1 ? 0 : 1]) }}"
                                    class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                    title="{{ $user->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                    @if ($user->status === 1)
                                      Enabled
                                    @else
                                      Disabled
                                    @endif
                                  </a>

                                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                    onclick="destroyUrlUpdate(this)"
                                    data-destroy-url="{{ route('admin.users.destroy', $user->id) }}"
                                    class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                    Delete</a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    {{ $users->links() }}
                  </div>

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