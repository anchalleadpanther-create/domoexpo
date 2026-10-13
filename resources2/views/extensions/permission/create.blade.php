@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <section class="contentsummernote-">
        @include('extensions.alerts')

        <div class="row">
          <div class="col-sm-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">New Permission</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form action="{{ route('admin.permissions.store') }}" method="post" id="category">
                  @csrf
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <div class="clearfix"></div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Permissions Title</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="title" id="name" maxlength="100"
                                  value="" placeholder="" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 mb-3">
                            <div class="form-check form-check-inline px-0">
                              <input class="form-check-input" type="radio" name="permission_type" id="inlineRadio1"
                                value="view">
                              <label class="form-check-label" for="inlineRadio1">View Permissions</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input checked class="form-check-input" type="radio" name="permission_type" id="inlineRadio2"
                                value="edit">
                              <label class="form-check-label" for="inlineRadio2">Edit Permissions</label>
                            </div>
                          </div>

                          @foreach ($menus as $menu)
                            <div class="col-md-4">
                              <input class="form-check-input" name="permissions[]" value="{{ $menu->id }}"
                                type="checkbox" id="flexCheckDefault{{ $menu->id }}">
                              <label class="form-check-label" for="flexCheckDefault{{ $menu->id }}">
                                {{ $menu->menu_name }}
                              </label>
                              @foreach ($menu->children as $childMenu)
                                <div @class(['row mx-0', 'mt-3' => $loop->first, 'mb-3' => $loop->last])>
                                  <div class="col-md-12">
                                    <input class="form-check-input" name="permissions[]" value="{{ $childMenu->id }}"
                                      type="checkbox" id="flexCheckDefault{{ $childMenu->id }}">
                                    <label class="form-check-label" for="flexCheckDefault{{ $childMenu->id }}">
                                      {{ $childMenu->menu_name }}
                                    </label>
                                  </div>
                                </div>
                              @endforeach
                            </div>
                          @endforeach
                        </div>
                      </div>
                      <div class="row mt-20">
                        <hr>
                        <div class="col-md-12 pull-right">
                          <div class="clearfix">
                            <button type="submit" class="waves-effect waves-light btn btn-dark mb-5 category"><i
                                class="fa fa-check"></i> Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
