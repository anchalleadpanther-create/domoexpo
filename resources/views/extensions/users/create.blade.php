@extends('user.header')
@section('userContent')
  @include('extensions.alerts')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <form action="{{ route('admin.users.store') }}" method="post">
            @csrf
            <div class="col-12">

              <div class="row">
                <div class="col-xl-8 col-12">

                  <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="home4" role="tabpanel">
                          <div class="col-sm-12">
                            <div class="row grey-bg-clr">
                              <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg> Admin User Info</h5>
                              <div class="col-md-12">
                                <hr>
                              </div>
                              <div class="clearfix"></div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label text-success">Name *</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Name *" maxlength="100"
                                      name="name" value="{{ old('name') }}">
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label text-success">Email *</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="email" class="form-control" placeholder="Email" maxlength="100"
                                      name="email" value="{{ old('email') }}">
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label text-success">Phone *</label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                    <input type="text" class="form-control" placeholder="Phone" maxlength="20"
                                      name="phone" value="{{ old('phone') }}">
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label text-success">Password *</label>
                                  <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password" maxlength="30"
                                      name="password" value="">
                                    <span class="input-group-text password-view-toggle"><i class="fa fa-eye"></i></span>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="form-label text-success">Select Permission *</label>
                                  <select class="single" data-placeholder="Select permission type" name="permission_id"
                                    required>
                                    @foreach ($permissions as $permission)
                                      <option value="{{ $permission->id }}">{{ $permission->title }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="row mt-20">
                            <hr>

                            <div class="col-md-12 pull-right">

                              <div class="clearfix">
                                <button type="submit" class="waves-effect waves-light btn btn-dark mb-5">
                                  <i class="fa fa-check"></i> Save
                                </button>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>

                    </div>
                  </div>
                </div>

              </div>

            </div>
            <!-- /.box -->

          </form>
        </div>
        <!-- /.col-->
      </section>
    </div>
    <!-- ./row -->

    <!-- /.content -->
  </div>
@endsection
