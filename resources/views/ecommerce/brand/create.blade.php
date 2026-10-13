@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <section class="content">
        

        <div class="row">
          <div class="col-sm-8">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">{{ isset($brand) ? 'Edit' : 'Add' }} Brand</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form action="{{ isset($brand) ? route('admin.brand.update', $brand->id) : route('admin.brand.store') }}"
                  method="post" id="category" enctype="multipart/form-data">
                  @csrf
                  @if (isset($brand))
                    @method('PATCH')
                  @endif
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Brand Info</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          {{-- <div class="col-md-6">
                            <div class="form-group">
                              <label for="intType3" class="form-label">Category *</label>
                              <select class="form-select" aria-label="size 3 select example" name="category_id[]" required
                                multiple="multiple">
                                @foreach ($categories as $category)
                                  <option
                                    @if (isset($brand)) @foreach ($brand->mappedCategories as $mapCategory)
                                  {{ $mapCategory->id === $category->id ? 'selected' : '' }}
                                  @endforeach
                                @else {{ old('category_id') != null && in_array($category->id, old('category_id')) ? 'selected' : '' }} @endif
                                    value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div> --}}
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Brand Name *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" required name="brand_name" id="name"
                                  maxlength="100"
                                  value="@if (isset($brand)) {{ $brand->brand_name }}@else{{ old('brand_name') }} @endif"
                                  placeholder="">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Brand Tag </label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="tag" id="name" maxlength="100"
                                  value="@if (isset($brand)) {{ $brand->tag }}@else{{ old('tag') }} @endif"
                                  placeholder="">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Brand Categories </label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" name="brand_categories" id="name"
                                  maxlength="100" {{-- blade-formatter-disable-next-line --}}
                                  value="@if(isset($brand)){{ implode(', ', $brand->categories) }}@else{{ old('brand_categories') }}@endif" placeholder="Ex: Men, Women, Girl, Boy etc"></div>
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
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="formFileSm" class="form-label ">Brand Certificate [MAX: 2MB]</label>
                                <input class="form-control" id="formFileSm" name="brand_certificate" type="file"
                                  accept="image/*, .pdf">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="formFileSm" class="form-label ">Brand Re-Seller Auth Letter [MAX: 2MB]</label>
                                <input class="form-control" id="formFileSm" name="brand_reseller_auth_letter"
                                  type="file" accept="image/*, .pdf">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-label">Meta Title *</label>
                                <div class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                  <input type="text" class="form-control" name="meta_title" maxlength="255"
                                    value="@if (isset($brand)) {{ $brand->meta_title }}@else{{ old('meta_title') }} @endif"
                                    placeholder="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-label">Meta Description *</label>
                                <div class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                  <input type="text" class="form-control" name="meta_description" maxlength="1000"
                                    value="@if (isset($brand)) {{ $brand->meta_description }}@else{{ old('meta_description') }} @endif"
                                    placeholder="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-label">Meta Keywords *</label>
                                <div class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                  <input type="text" class="form-control" name="meta_keywords" maxlength="1000"
                                    value="@if (isset($brand)) {{ $brand->meta_keywords }}@else{{ old('meta_keywords') }} @endif"
                                    placeholder="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Feature on Home Page</label>
                              <select class="form-select" name="featured">
                                <option value="">Select</option>
                                <option
                                  @if (isset($brand)) {{ $brand->featured === 1 ? 'selected' : '' }}@else{{ old('featured') === '1' ? 'selected' : '' }} @endif
                                  value="1">Yes</option>
                                <option
                                  @if (isset($brand)) {{ $brand->featured === 0 ? 'selected' : '' }}@else{{ old('featured') === '0' ? 'selected' : '' }} @endif
                                  value="0">No</option>
                              </select>
                            </div>
                          </div>
                          </div>
                          <div class="row mt-30 grey-bg-clr">
                            <h5 class="mb-3">Description [300 WORDS]</h5>
                            <div class="col-md-12">
                              <textarea name="description" maxlength="300" class='form-control' rows='8'>
@if (isset($brand))
{{ $brand->description }}@else{{ old('description') }}
@endif
</textarea>
                              <hr>
                            </div>
                            <div class="col-md-12 mt-4">
                              <label class="form-label">Size Chart</label>
                              <textarea name="size_chart" id="summernote3">
@if (isset($brand))
{{ $brand->size_chart }}@else{{ old('size_chart') }}
@endif
</textarea>
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
    $('#summernote, #summernote3').summernote({
      placeholder: 'Please enter your content here.',
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
