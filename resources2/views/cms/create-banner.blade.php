@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 887px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Home-Page Banners <a class="btn btn-sm btn-secondary"
                    href="{{ route('admin.sliders.index') }}">Back</a></h4>
                {{-- <a class="btn btn-sm btn-bold btn-primary float-end" href="{{ route('admin.banners.create') }}">+ New Slider</a> --}}
              </div>
              <div class="box-body">
                <form method="post" action="@if (isset($banner)){{ route('admin.banners.update', $banner->id) }}@else{{ route('admin.banners.store') }} @endif" enctype="multipart/form-data">
                  @csrf
                  @if (isset($banner)) @method('PATCH') @endif
                  <div class="row">
                    <div class="col-4 d-flex align-items-center border-right border-gray">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Left Image [MAX 2MB] [JPEG,JPG,PNG,WEBP] [530X390]
                            @if (isset($banner->image_one))
                              <a href="{{ asset('uploads/banners') . '/' . $banner->image_one }}"><i
                                  class="fa fa-download"></i></a>
                            @endif
                            </label>
                            <input type="file" class="form-control bg-transparent" accept="image/*"
                            name="banner_img_one">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Banner Link</label>
                            <input type="text" class="form-control" maxlength="500" name="link_one"
                              value="@if (isset($banner)){{ $banner->link_one }}@else{{ old('link_one') }} @endif">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Center Image 1 [MAX 2MB] [JPEG,JPG,PNG,WEBP] [530X180]
                            @if (isset($banner->image_two))
                              <a href="{{ asset('uploads/banners') . '/' . $banner->image_two }}"><i
                                  class="fa fa-download"></i></a>
                            @endif
                            </label>
                            <input type="file" class="form-control bg-transparent" accept="image/*"
                            name="banner_img_two">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Banner Link</label>
                            <input type="text" class="form-control" maxlength="500" name="link_two"
                              value="@if (isset($banner)){{ $banner->link_two }}@else{{ old('link_two') }} @endif">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Center Image 2 [MAX 2MB] [JPEG,JPG,PNG,WEBP] [530X180]
                            @if (isset($banner->image_three))
                              <a href="{{ asset('uploads/banners') . '/' . $banner->image_three }}"><i
                                  class="fa fa-download"></i></a>
                            @endif
                            </label>
                            <input type="file" class="form-control bg-transparent" accept="image/*"
                            name="banner_img_three">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Banner Link</label>
                            <input type="text" class="form-control" maxlength="500" name="link_three"
                              value="@if (isset($banner)){{ $banner->link_three }}@else{{ old('link_three') }} @endif">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-4 d-flex align-items-center border-left border-gray">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Right Image [MAX 2MB] [JPEG,JPG,PNG,WEBP] [530X390]
                            @if (isset($banner->image_four))
                              <a href="{{ asset('uploads/banners') . '/' . $banner->image_four }}"><i
                                  class="fa fa-download"></i></a>
                            @endif
                            </label>
                            <input type="file" class="form-control bg-transparent" accept="image/*"
                            name="banner_img_four">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Banner Link</label>
                            <input type="text" class="form-control" maxlength="500" name="link_four"
                              value="@if (isset($banner)){{ $banner->link_four }}@else{{ old('link_four') }} @endif">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
