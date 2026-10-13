@extends('user.header')
@section('userContent')

  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Brands</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page"><a
                      href="{{ route('admin.category.index', 0) }}">Brands</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">
        @include('extensions.alerts')
        <div class="row">
          <div class="col-12">
            <div class="box">
            <div class="box-header with-border">

                <div class="pull-right col-sm-12 col-md-12">
                  <div class="row">
                    <div class="col-md-3">
                      {{-- <div class="row">
                        <form style="width:100%;" id="catfilter" name="catfilter" enctype="multipart/form-data"
                          method="post" accept-charset="utf-8">
                          <select class="form-control  categoryfilter" name="name" tabindex="-1" aria-hidden="true"
                            onchange="newUrl(this)">
                            <option>Select Category</option>
                            @foreach ($categories as $key => $category)
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach

                          </select>
                        </form>
                      </div>
                      &nbsp;&nbsp; --}}
                    </div>
                    <div class="col-sm-6" style="    padding-top: 10px;">
                    </div>
                    <div class="col-md-3 text-right">
                      <a href="{{ route('admin.brand.create') }}"
                        class="waves-effect waves-light btn mb-5 bg-gradient-primary pull-right">
                        Add Brand
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <div class="box">
              <div class="box-body">
                <div class="table-responsive rounded card-table">

                  <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                      <div class="col-sm-12 col-md-6"></div>
                      <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                      </div>
                    </div>
                    <table class="table border-no dataTable no-footer" id="example1" role="grid"
                      aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>#</th>
                          <th>Brand Name</th>
                          <th>icon</th>
                          <th>Banner</th>
                          <th>Description</th>
                          <th>Category</th>
                          <th>Products</th>
                          <th class="text-right" width='20%'>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($brands as $key => $brand)

                          <tr class="hover-primary odd" role="row">
                            <td> {{ ++$key }} </td>
                            <td>
                              <a href="#" class="text-body fw-bold"> {{ ucfirst($brand->brand_name) }}</a>
                            </td>
                            <td>
                              <div class="avatar-md profile-user-wid mt-1">
                                <img
                                  src="{{ isset($brand->icon) ? asset('uploads/brand') . '/' . $brand->icon : asset('allUsers/icon-thumb.png') }}"
                                  class=" " style="height: 40px; width: 40px;">
                              </div>
                            </td>
                            <td>
                              <img
                                src="{{ isset($brand->banner) ? asset('uploads/brand') . '/' . $brand->banner : asset('allUsers/800X200.png') }}"
                                style="width:150px">
                            </td>
                            <td>{!! htmlspecialchars_decode($brand->description) !!}</td>
                            <td><a href="javascript:;" onclick='setTableData(this)' title='View categories'
                                data-bs-toggle="modal" data-bs-target="#table-modal" data-type='categories'
                                data-table-data='{{ $brand->mappedCategories->toJson() }}'><i
                                  class="fa fa-eye"></i></a></td>
                            <td>{{ '0' }}</td>
                            <td class="text-right">
                              <!-- Button trigger modal -->
                              <a href="{{ route('admin.brand.edit', $brand->id) }}" type="button" title="Edit brand"
                                class="badge badge-pill badge-primary"><i class="fa fa-pencil"></i></a>
                              <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete" title='Delete brand'
                                onclick="destroyUrlUpdate(this)"
                                data-destroy-url="{{ route('admin.brand.destroy', $brand->id) }}"
                                type="button"
                                class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i class="fa fa-trash"></i></a>
                              <a href="{{ route('admin.brand.status', [$brand->id, $brand->status === 1 ? 0 : 1]) }}"
                                title="{{ $brand->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                class="badge badge-pill badge-success disable"
                                catid="0011-0">@if ($brand->status === 1) <i class="fa fa-toggle-on"></i> @else <i class="fa fa-toggle-off"></i> @endif</a>
                            </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  @include('extensions.table-modal')
  <script>
    function newUrl(e) {
      let url = route('admin.category.index', {
        parent_id: e.value
      });
      location.href = url;
    }
  </script>

@endsection
