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
                            <h4 class="box-title">Home-Page Banners</h4>
                            <a class="btn btn-sm btn-bold bg-dark float-end"
                                href="{{ route('admin.sliders.create') }}">+
                                New
                                Banner</a>
                        </div>
                        <div class="box-body">
                            <div class="row mb-20">
                                <div class="col-md-3">
                                    <label>Choose Banner</label>
                                    <select class="form-select my-2 mx-auto" onchange="changePosition(this)">
                                        <option value="">Select</option>
                                        
                                        <option value="Main Header Tabs">Main Header Tabs</option>
                                        <option value="Left Side Main Sliders">Left Side Main Sliders</option>
                                        <option value="Right Side Main Banners">Right Side Main Banners</option>
                                        <option value="Banner After Premium Suppliers">Banner After Premium Suppliers</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <div id="example2_wrapper"
                                    class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-lg invoice-archive tr-odd_clr dataTable no-footer"
                                                role="grid" aria-describedby="example2_info">
                                                <thead>
                                                    <tr role="row">

                                                        <th width="3%" class="sorting_asc" tabindex="0"
                                                            aria-controls="example2" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Sl#: activate to sort column descending">Sl#
                                                        </th>
                                                        <th width="20%" class="sorting" tabindex="0"
                                                            aria-controls="example2" rowspan="1" colspan="1"
                                                            aria-label="Client Name: activate to sort column ascending">
                                                            Banner Image
                                                        </th>

                                                        <th width="20%" class="sorting" tabindex="0"
                                                            aria-controls="example2" rowspan="1" colspan="1"
                                                            aria-label="Client Name: activate to sort column ascending">
                                                            Second Banner Image
                                                        </th>
                                                        <th width="40%" class="sorting" tabindex="0"
                                                            aria-controls="example2" rowspan="1" colspan="1"
                                                            aria-label="Client Address: activate to sort column ascending">
                                                            Banner
                                                            Details
                                                        </th>
                                                        <th width="13%" class="sorting" tabindex="0"
                                                            aria-controls="example2" rowspan="1" colspan="1"
                                                            aria-label="Next Call: activate to sort column ascending">
                                                            Banner Sort</th>
                                                        <th width="13%" class="sorting" tabindex="0"
                                                            aria-controls="example2" rowspan="1" colspan="1"
                                                            aria-label="Client Followup: activate to sort column ascending">
                                                            Banner
                                                            Status</th>
                                                        <th width="13%" class="sorting" tabindex="0"
                                                            aria-controls="example2" rowspan="1" colspan="1"
                                                            aria-label="Action: activate to sort column ascending">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <form id="sorting-form" method="post"
                                                        action="{{ route('admin.home-slider-sort-update') }}">
                                                        @csrf
                                                        @foreach ($sliders as $key => $slider)
                                                        <input type="hidden" name="id[]" value="{{ $slider->id }}">
                                                        <tr role="row" class="odd">
                                                            <td align="left" class="sorting_1">
                                                                {{ ++$key }}
                                                            </td>
                                                            <td align="left">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12">
                                                                        <a href="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                                                            target="_blank">
                                                                            <img src="{{ asset('/uploads/sliders') }}/{{ $slider->slider_image }}"
                                                                                class="img-fluid" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td align="left">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12">
                                                                        <a href="{{ asset('/uploads/sliders') }}/{{ $slider->second_slider_image }}"
                                                                            target="_blank">
                                                                            <img src="{{ asset('/uploads/sliders') }}/{{ $slider->second_slider_image }}"
                                                                                class="img-fluid" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td align="left">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <span>Title: </span>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <span>{{ $slider->slider_title }}</span>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <span>Description: </span>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <span>{{ $slider->slider_description }}</span>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <span>Position: </span>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <span>{{ $slider->position }}</span>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <span>Added on: </span>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <span>{{ $slider->created_at->format('d M, Y')
                                                                            }}</span>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <span>Banner Link: </span>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <span><a href="{{ $slider->slider_link }}"
                                                                                target="_blank">{{ $slider->slider_link
                                                                                }}</a></span>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td align="left">
                                                                <input type="number" min="0"
                                                                    name="sort[{{ $slider->id }}]"
                                                                    class="form-control w-auto mx-0"
                                                                    value="{{ $slider->sort }}">
                                                            </td>

                                                            <td align="left">
                                                                @if ($slider->status === 1)
                                                                {{ 'Active' }}
                                                                @else
                                                                {{ 'In-Active' }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                                                                    class="waves-effect waves-light btn btn-default btn-flat mb-5 d-block"
                                                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                                                    Edit</a>

                                                                <a href="javascript:;" data-bs-toggle="modal"
                                                                    data-bs-target="#modal-delete"
                                                                    onclick="destroyUrlUpdate(this)"
                                                                    data-destroy-url="{{ route('admin.sliders.destroy', $slider->id) }}"
                                                                    class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                                                    Delete</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </form>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><button form="sorting-form"
                                                                class="btn btn-sm bg-dark">Update banners
                                                                Sort</button></td>
                                                        <td></td>

                                                        <td></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection