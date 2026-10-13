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
                            <form action="{{route('admin.save-shop-by-ages')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{@$shopByAgesSingle->id}}" name="age_id">
                                <div class="row mb-20">
                                    <div class="col-md-3">
                                        <label>Age for</label>
                                        <select class="form-select my-2 mx-auto" name="position">
                                            <option value="">Select</option>
                                            <option value="For Girl" {{@$shopByAgesSingle->position == 'For Girl' ? 'selected' : ''}}>For Girl</option>
                                            <option value="For Boy"  {{@$shopByAgesSingle->position == 'For Boy' ? 'selected' : ''}}>For Boy</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Enter Age</label>
                                        <input type="text" class="form-control" name="title"  value="{{ @$shopByAgesSingle->title }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label>Enter Age Link</label>
                                        <input type="text" class="form-control" name="url"  value="{{ @$shopByAgesSingle->url }}">
                                    </div>

                                    <div class="col-md-3 my-3">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" >
                                    </div>
                                    
                                </div>
                            </form>
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
                                                            Age Info
                                                        </th>

                                                
                                                       
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
                                                        @foreach ($shopByAges as $key => $slider)
                                                        <input type="hidden" name="id[]" value="{{ @$slider->id }}">
                                                        <tr role="row" class="odd">
                                                            <td align="left" class="sorting_1">
                                                                {{ ++$key }}
                                                            </td>
                                                            
                                                            <td align="left">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <span>Title: </span>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <span>{{ @$slider->title }}</span>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <span>URL: </span>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <span>{{ @$slider->url }}</span>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <span>Position: </span>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <span>{{ @$slider->position }}</span>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <span>Added on: </span>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <span>{{ @$slider->created_at->format('d M, Y')
                                                                            }}</span>
                                                                    </div>
                                                                   
                                                                </div>
                                                            </td>


                                                            <td>
                                                                <a href="{{route('admin.shop-by-ages', @$slider->id)}}"
                                                                    class="waves-effect waves-light btn btn-default btn-flat mb-5 d-block"
                                                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                                                    Edit</a>

                                                                <a href="javascript:;" data-bs-toggle="modal"
                                                                    data-bs-target="#modal-delete"
                                                                    onclick="destroyUrlUpdate(this)"
                                                                    data-destroy-url="{{ route('admin.delete-shop-by-ages', @$slider->id) }}"
                                                                    class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                                                    style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                                                    Delete</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </form>
                                                   
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