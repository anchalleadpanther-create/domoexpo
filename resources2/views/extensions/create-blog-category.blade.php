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
                <h4 class="box-title">{{ isset($blogCategory) ? 'Edit' : 'Add' }} Blog Category</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form
                  action="{{ isset($blogCategory) ? route('admin.blog-category.update', $blogCategory->id) : route('admin.blog-category.store') }}"
                  method="post" id="category" enctype="multipart/form-data">
                  @csrf
                  @if (isset($blogCategory)) @method('PATCH') @endif
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Blog Category Info</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Category Name *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="category_name" id="name" maxlength="200"
                                  value="@if (isset($blogCategory)){{ $blogCategory->category_name }}@else{{ old('category_name') }} @endif" placeholder="">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Meta Keyword</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" name="meta_keywords"
                                  maxlength="500" id="metakeyword" value="@if (isset($blogCategory)){{ $blogCategory->meta_keywords }}@else{{ old('meta_keywords') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Icon [50X50, MAX: 512KB]</label>
                              <input class="form-control  " id="formFileSm" name="category_icon" type="file">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Banner [800X200, MAX: 2MB]</label>
                              <input class="form-control" id="formFileSm" name="category_banner" type="file"
                                accept="image/*">
                            </div>
                          </div>
                        </div>
                        <div class="row mt-30 grey-bg-clr">
                          <h5 class="mb-3">Description [300 WORDS]</h5>
                          <div class="col-md-12">
                            {{-- <textarea name="description" maxlength="300"
                              id="summernote">@if (isset($blogCategory)){{ $blogCategory->description }}@else{{ old('description') }}@endif</textarea> --}}
                            <textarea name="description" class="form-control" maxlength="300"
                              rows='8'>@if (isset($blogCategory)){{ $blogCategory->description }}@else{{ old('description') }}@endif</textarea>
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                              </div>
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
    }
  </script>
@endsection
