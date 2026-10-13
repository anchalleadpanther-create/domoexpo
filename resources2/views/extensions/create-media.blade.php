@extends('user.header')
@section('userContent')

  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <section class="content">
        @include('extensions.alerts')
        <div class="row">
          <div class="col-sm-8">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">{{ isset($media) ? 'Edit' : 'Add' }} Media</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form
                  action="{{ isset($media) ? route('admin.media.update', $media->id) : route('admin.media.store') }}"
                  method="post" enctype="multipart/form-data">
                  @csrf
                  @if (isset($media)) @method('PATCH') @endif
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Media Info</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="intType3" class="form-label">Media Folder</label>
                              <select class="form-select" id="intType3" name="folder_name">
                                <option label="Select" value=""></option>
                                <option @if(isset($media)) @if($media->folder_name === 'Folder One') selected @endif @endif @if(old('folder_name') === 'Folder One') selected @endif value='Folder One'>Folder One</option>
                                <option @if(isset($media)) @if($media->folder_name === 'Folder Two') selected @endif @endif @if(old('folder_name') === 'Folder Two') selected @endif value='Folder Two'>Folder Two</option>
                                <option @if(isset($media)) @if($media->folder_name === 'Folder Three') selected @endif @endif @if(old('folder_name') === 'Folder Three') selected @endif value='Folder Three'>Folder Three</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Media Name *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="name" id="name" maxlength="200"
                                  value=" @if(isset($media)){{ $media->name }}@else{{ old('name') }} @endif" placeholder="">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Media File [MAX: 2MB]</label>
                              <input class="form-control" id="formFileSm" name="media" type="file" accept="image/*">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="intType3" class="form-label">Media Position</label>
                              <select class="form-select" id="intType3" name="position">
                                <option label="Select" value=""></option>
                                <option @if(isset($media)) @if($media->position === 'Home Slider') selected @endif @endif @if(old('position') === 'Home Slider') selected @endif value='Home Slider'>Home Slider</option>
                                <option @if(isset($media)) @if($media->position === 'Header Logo') selected @endif @endif @if(old('position') === 'Header Logo') selected @endif value='Header Logo'>Header Logo</option>
                                <option @if(isset($media)) @if($media->position === 'Footer Icons') selected @endif @endif @if(old('position') === 'Footer Icons') selected @endif value='Footer Icons'>Footer Icons</option>
                                <option @if(isset($media)) @if($media->position === 'Position X') selected @endif @endif @if(old('position') === 'Position X') selected @endif value='Position X'>Position X</option>
                                <option @if(isset($media)) @if($media->position === 'Position Y') selected @endif @endif @if(old('position') === 'Position Y') selected @endif value='Position Y'>Position Y</option>
                              </select>
                            </div>
                          </div>
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
  <script type="text/javascript">
    $('#summernote').summernote({
      placeholder: 'Please enter your category content here.',
      tabsize: 2,
      height: 250,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['view', ['codeview', 'help']]
      ]
    });
  </script>
@endsection
