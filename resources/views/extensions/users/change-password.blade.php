@extends('user.header')
@section('userContent')
  @include('extensions.alerts')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <form action="{{ route('admin.change-password') }}" method="post">
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
                                </svg> Change your password</h5>
                              <div class="col-md-12">
                                <hr>
                              </div>
                              <div class="clearfix"></div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label text-success">Password *</label>
                                  <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password" minlength="6"
                                      maxlength="30" name="password" value="" required>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-label text-success">Confirm Password *</label>
                                  <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password" minlength="6"
                                      maxlength="30" name="password_confirmation" value="" required>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="row mt-20">
                            <hr>

                            <div class="col-md-12 pull-right">

                              <div class="clearfix">
                                <button type="submit" class="waves-effect waves-light btn btn-dark mb-5">
                                  <i class="fa fa-lock"></i> Update
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
