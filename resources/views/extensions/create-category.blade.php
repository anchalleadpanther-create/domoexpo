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
                <h4 class="box-title">{{ isset($category) ? 'Edit' : 'Add' }} Category</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form
                  action="{{ isset($category) ? route('admin.category.update', $category->id) : route('admin.category.store') }}"
                  method="post" id="category" enctype="multipart/form-data">
                  @csrf
                  @if (isset($category))
                    @method('PATCH')
                  @endif
                  <input type="hidden" name="parent_id"
                    value="{{ Request::segment(4) === 'edit' ? $category->parent_id : Request::segment(4) }}">
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Category Info</h5>
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
                                  value="@if (isset($category)) {{ $category->category_name }}@else{{ old('category_name') }} @endif"
                                  placeholder="">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">Meta Keyword</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="" name="meta_keywords"
                                  maxlength="500" id="metakeyword"
                                  value="@if (isset($category)) {{ $category->meta_keywords }}@else{{ old('meta_keywords') }} @endif">
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
                              <label for="formFileSm" class="form-label ">Banner [1920X300, MAX: 2MB]</label>
                              <input class="form-control" id="formFileSm" name="category_banner" type="file"
                                accept="image/*">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="intType3" class="form-label">Filter</label>
                              <select class="form-select" id="intType3" name="filter_ids[]" multiple="multiple">
                                <option label="choose one" value=""></option>
                                @foreach ($filters as $filter)
                                  <option
                                    @if (isset($category)) @foreach ($category->mappedFilters as $mapFilter)
                                      {{ $mapFilter->id === $filter->id ? 'selected' : '' }}
                                    @endforeach
                                  @else
                                    {{ old('filter_id') != null && in_array($filter->id, old('filter_id')) ? 'selected' : '' }} @endif
                                    value="{{ $filter->id }}">{{ $filter->filter_name }}
                                  </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-30 grey-bg-clr">
                          <h5 class="mb-3">Description [300 WORDS]</h5>
                          <div class="col-md-12">
                            {{-- <textarea name="description" maxlength="300"
                              id="summernote">@if (isset($category)){{ $category->description }}@else{{ old('description') }}@endif</textarea> --}}
                            <textarea name="description" class="form-control" maxlength="300" rows='8'>
@if (isset($category))
{{ $category->description }}@else{{ old('description') }}
@endif
</textarea>
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
  </script>
@endsection
