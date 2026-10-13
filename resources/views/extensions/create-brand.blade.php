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
                <h4 class="box-title">{{ isset($brand) ? 'Edit' : 'Add' }} Brand</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form
                  action="{{ isset($brand) ? route('admin.brand.update', $brand->id) : route('admin.brand.store') }}"
                  method="post" id="category" enctype="multipart/form-data">
                  @csrf
                  @if (isset($brand)) @method('PATCH') @endif
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Brand Info</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="intType3" class="form-label">Category *</label>
                              <select class="form-select" id="intType3" name="category_id[]" required
                                multiple="multiple">
                                <option label="choose one" value=""></option>
                                @foreach ($categories as $category)
                                  <option @if (isset($brand))
                                    @foreach ($brand->mappedCategories as $mapCategory)
                                      {{ $mapCategory->id === $category->id ? 'selected' : '' }}
                                    @endforeach
                                  @else
                                    {{ old('category_id') != null && in_array($category->id, old('category_id')) ? 'selected' : '' }}
                                    @endif value="{{ $category->id }}">{{ $category->category_name }}
                                  </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Brand Name *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" required name="brand_name" id="name"
                                  maxlength="100" value=" @if (isset($brand)){{ $brand->brand_name }}@else{{ old('brand_name') }} @endif" placeholder="">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Logo [300X300, MAX: 512KB]</label>
                              <input class="form-control" id="formFileSm" name="brand_icon" type="file">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Banner [800X200, MAX: 2MB]</label>
                              <input class="form-control" id="formFileSm" name="brand_banner" type="file"
                                accept="image/*">
                            </div>
                          </div>
                          
                        </div>
                        <div class="row mt-30 grey-bg-clr">
                          <h5 class="mb-3">Description [300 WORDS]</h5>
                          <div class="col-md-12">
                            {{-- <textarea name="description" maxlength="300" id="summernote">@if (isset($brand)){{ $brand->description }}@else{{ old('description') }}@endif</textarea> --}}
                            <textarea name="description" maxlength="300" class='form-control'
                              rows='8'>@if (isset($brand)){{ $brand->description }}@else{{ old('description') }}@endif</textarea>
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
      placeholder: 'Please enter your brand content here.',
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
