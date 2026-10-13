@extends('user.header')
@section('userContent')
<div class="content-wrapper" style="min-height: 630px;">
  <div class="container-full">
    <section class="content">

      <div class="row">
        <div class="col-sm-8">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">{{ isset($serviceCategory) ? 'Edit' : 'Add' }} Service Category</h4>
            </div>
            <div class="box-body">
              <!-- Tab panes -->
              <form
                action="{{ isset($serviceCategory) ? route('admin.service-category.update', $serviceCategory->id) : route('admin.service-category.store') }}"
                method="post" id="category" enctype="multipart/form-data">
                @csrf
                @if (isset($serviceCategory))
                @method('PATCH')
                @endif
                <input type="hidden" name="parent_id"
                  value="{{ Request::segment(4) === 'edit' ? $serviceCategory->parent_id : Request::segment(4) }}">
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
                              <input type="text" class="form-control" name="category_name" id="name" maxlength="100"
                                value="@if (isset($serviceCategory)) {{ $serviceCategory->category_name }}@else{{ old('category_name') }} @endif"
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
                                value="@if (isset($serviceCategory)) {{ $serviceCategory->meta_keywords }}@else{{ old('meta_keywords') }} @endif">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="formFileSm" class="form-label ">Icon [300X300, MAX: 512KB]</label>
                            <input class="form-control  " id="formFileSm" name="category_icon" type="file">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="formFileSm" class="form-label ">Banner [1000X200, MAX: 2MB]</label>
                            <input class="form-control" id="formFileSm" name="category_banner" type="file"
                              accept="image/*">
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="formFileSm" class="form-label ">Second Banner [1000X200, MAX: 2MB]</label>
                            <input class="form-control" id="formFileSm" name="second_catgory_banner" type="file" accept="image/*">
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="formFileSm" class="form-label ">Want to show in filter</label>
                            <select class="form-select" id="intType4" name="is_show_in_filter">
                              <option value="">Select</option>
                              <option @if (isset($serviceCategory)) {{ $serviceCategory->is_show_in_filter == 0 ? 'selected' : '' }}
                                @endif
                                value="0">Show
                              </option>
                              <option @if (isset($serviceCategory)) {{ $serviceCategory->is_show_in_filter == 1 ? 'selected' : '' }}
                                @endif
                                value="1">Not Show
                              </option>
                            </select>
                          </div>
                        </div>
                        {{-- <div class="col-md-6">
                          <div class="form-group">
                            <label for="formFileSm" class="form-label ">Feature on Home Page</label>
                            <select class="form-select" name="featured" onchange="toggleFeatureBanner(this)">
                              <option value="">Select</option>
                              <option @if (isset($serviceCategory)){{ $serviceCategory->featured === 1 ? 'selected' : '' }}@else{{
                                old('featured') === '1' ? 'selected' : '' }} @endif value="1">Yes</option>
                              <option @if (isset($serviceCategory)){{ $serviceCategory->featured === 0 ? 'selected' : '' }}@else{{
                                old('featured') === '0' ? 'selected' : '' }} @endif value="0">No</option>
                            </select>
                          </div>
                        </div>
                        <div
                          class="col-md-6 @if (isset($serviceCategory)){{ $serviceCategory->featured != 1 ? 'd-none' : '' }}@else{{ old('featured') != '1' ? 'd-none' : '' }} @endif"
                          id="featured_banner">
                          <div class="form-group">
                            <label for="formFileSm" class="form-label ">Featured Banner [390X240, MAX: 2MB]</label>
                            <input class="form-control" id="formFileSm" name="feature_banner" type="file"
                              accept="image/*">
                          </div>
                        </div> --}}
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="intType3" class="form-label">Filter</label>
                            <select class="form-select" id="intType3" name="filter_ids[]" multiple="multiple">
                              <option value="">Select</option>
                              @foreach ($filters as $filter)
                              <option @if (isset($serviceCategory)) @foreach ($serviceCategory->mappedFilters as $mapFilter)
                                {{ $mapFilter->id === $filter->id ? 'selected' : '' }}
                                @endforeach
                                @else
                                {{ old('filter_id') != null && in_array($filter->id, old('filter_id')) ? 'selected' : ''
                                }} @endif
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
                            id="summernote">@if (isset($serviceCategory)){{ $serviceCategory->description }}@else{{ old('description') }}@endif</textarea>
                          --}}
                          <textarea name="description" class="form-control" maxlength="300" rows='8'>
@if (isset($serviceCategory))
{{ $serviceCategory->description }}@else{{ old('description') }}
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

    function toggleFeatureBanner(e) {
      if (e.value === '1') {
        document.querySelector('#featured_banner').classList.remove('d-none');
      } else {
        document.querySelector('#featured_banner').classList.add('d-none');
      }

    }
</script>
@endsection