@extends('user.header')
@section('userContent')
<div class="content-wrapper" style="min-height: 887px;">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Home-Page Slider <a class="btn btn-sm btn-secondary"
                                    href="{{ route('admin.sliders.index', 'Main Banner') }}">Back</a></h4>
                            {{-- <a class="btn btn-sm btn-bold btn-primary float-end"
                                href="{{ route('admin.banners.create') }}">+ New Slider</a> --}}
                        </div>
                        <div class="box-body">
                            <form method="post" action="{{ $action }}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($method)) @method($method)
                                @endif
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Slider Image [MAX 1MB] [JPEG,JPG,PNG,WEBP,GIF]
                                                *</label>
                                            <input type="file" class="form-control bg-transparent"
                                                accept=".jpg, .jpeg, .png, .webp, .gif" @if (!isset($method)) required
                                                @endif name="slider_img">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Second Slider Image [MAX 1MB]
                                                [JPEG,JPG,PNG,WEBP,GIF]
                                                *</label>
                                            <input type="file" class="form-control bg-transparent"
                                                accept=".jpg, .jpeg, .png, .webp, .gif" name="second_slider_img">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Slider Link</label>
                                            <input type="text" class="form-control" maxlength="1000" name="slider_link"
                                                value="@if (isset($slider)) {{ $slider->slider_link }}@else{{ old('slider_link') }} @endif">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Slider Title</label>
                                            <input type="text" class="form-control" maxlength="100" name="slider_title"
                                                value="@if (isset($slider)) {{ $slider->slider_title }}@else{{ old('slider_title') }} @endif">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Product MRP (The Value
                                                Store)</label>
                                            <input type="number" class="form-control" maxlength="100" name="mrp"
                                                value="@if (isset($slider)) {{ $slider->mrp }}@else{{ old('mrp') }} @endif">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Product Price (The
                                                Value Store)</label>
                                            <input type="number" class="form-control" maxlength="100" name="price_unit"
                                                value="@if (isset($slider)) {{ $slider->price_unit }}@else{{ old('price_unit') }} @endif">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Slider
                                                Description</label>
                                            <input type="text" name="slider_description" class="form-control"
                                                maxlength="100"
                                                value="@if (isset($slider)) {{ $slider->slider_description }}@else{{ old('slider_description') }} @endif" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Slider Sort</label>
                                            <input type="number" min="0" class="form-control"
                                                onKeyPress="if(this.value.length===5) return false;" name="sort"
                                                value="@if (isset($slider)) {{ $slider->sort }}@else{{ old('sort') }} @endif">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Choose Position</label>

                                        <select class="form-select" name="position" required>
                                            
                                            <option @selected(old('position')==='Main Header Tabs' ) @isset($slider)
                                                @selected($slider->position === 'Main Header Tabs') @endisset
                                                value="Main Header Tabs">Main Header Tabs</option>
                                           
                                            <option @selected(old('position')==='Left Side Main Sliders' ) @isset($slider)
                                                @selected($slider->position === 'Left Side Main Sliders') @endisset
                                                value="Left Side Main Sliders">Left Side Main Sliders</option>
                                                
                                            <option @selected(old('position')==='Right Side Main Banners' ) @isset($slider)
                                                @selected($slider->position === 'Right Side Main Banners') @endisset
                                                value="Right Side Main Banners">Right Side Main Banners</option>
                                             
                                            <option @selected(old('position')==='Banner After Premium Suppliers' ) @isset($slider)
                                                @selected($slider->position === 'Banner After Premium Suppliers') @endisset
                                                value="Banner After Premium Suppliers">Banner After Premium Suppliers</option>
                                
                                            
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-12 my-4 d-flex px-0 align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" @if (isset($slider)) {{
                                                $slider->status === 1 ? 'checked' : '' }}@else @if (old('status') ===
                                            '1') checked @endif
                                            @endif
                                            @empty(old('status')) checked @endempty
                                            name="status"
                                            value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Slider Active
                                            </label>
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
<script type="text/javascript">
    $('#summernote').summernote({
            placeholder: 'Please enter your slider content here.',
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