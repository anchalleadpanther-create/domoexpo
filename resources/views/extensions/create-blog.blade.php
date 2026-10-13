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
                <h4 class="box-title">{{ isset($blog) ? 'Edit' : 'Add' }} Blog</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form action="{{ isset($blog) ? route('admin.blog.update', $blog->id) : route('admin.blog.store') }}"
                  method="post" id="category" enctype="multipart/form-data">
                  @csrf
                  @if (isset($blog))
                    @method('PATCH')
                  @endif
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Blog Info</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Blog Category *</label>
                              <div class="input-group mb-3">
                                <select class="form-control" required name="category_id">
                                  <option value="">Select Category</option>
                                  @foreach ($categories as $category)
                                    <option
                                      @if (isset($blog)) {{ $category->id === $blog->category_id ? 'selected' : '' }} @else {{ $category->id == old('category_id') ? 'selected' : '' }} @endif
                                      value="{{ $category->id }}">
                                      {{ $category->category_name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Blog Name *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="name" id="name" maxlength="100"
                                  value="@if (isset($blog)) {{ $blog->name }}@else{{ old('name') }} @endif"
                                  placeholder="">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Banner [1920X700, MAX: 2MB]</label>
                              <input class="form-control" id="formFileSm" name="banner" type="file" accept="image/*">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Seo Title</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='200' name="seo_title"
                                  maxlength="500" id="metatitle"
                                  value="@if (isset($blog)) {{ $blog->seo_title }}@else{{ old('seo_title') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Seo Description</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='200'
                                  name="seo_description" maxlength="500" id="metatitle"
                                  value="@if (isset($blog)) {{ $blog->seo_description }}@else{{ old('seo_description') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Seo Keyword</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" maxlength='200'
                                  name="seo_keywords" maxlength="500" id="metakeyword"
                                  value="@if (isset($blog)) {{ $blog->seo_keywords }}@else{{ old('seo_keywords') }} @endif">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 mt-30">
                            <h5 class="mb-3">Content</h5>
                            <div class="col-md-12">
                              <textarea name="content" id="summernote">
@if (isset($blog))
{{ $blog->content }}@else{{ old('content') }}
@endif
</textarea>
                              <hr>
                            </div>
                            <div class="clearfix"></div>
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
      placeholder: 'Please enter your event content here.',
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
