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
                      href="{{ route('admin.brand.index') }}">Brands</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">
        
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">

                <div class="pull-right col-sm-12 col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <form style="width:100%;" id="catfilter" action="{{ route('admin.brand.index') }}"
                        enctype="multipart/form-data" method="get" accept-charset="utf-8" class="row">
                        <div class="col-md-8">
                          <input class="form-control" name="search" value="{{ request()->search }}"
                            placeholder="Search by brand name" />
                        </div>
                        <div class="col-md-4">
                          <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-search"></i>
                            Search</button>
                        </div>
                      </form>
                      &nbsp;&nbsp;
                    </div>
                    <div class="col-sm-3" style="    padding-top: 10px;">
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
                            <th>Products</th>
                            <th>Featured</th>
                            <th>Last Product Date</th>
                            <th>Documents</th>
                            <th>Categories</th>
                            <th class="text-right" width='20%'>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($brands as $key => $brand)
                            <tr class="hover-primary odd" role="row">
                              <td> {{ ++$key }} </td>
                              <td>
                                <p class="text-body fw-bold"> {{ ucfirst($brand->brand_name) }}</p>
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

                              <td>{!! htmlspecialchars_decode($brand->description ?? '') !!}</td>

                              <td>{{ $brand->productsCount }}</td>
                              <td>{{ $brand->featured ? 'Yes' : 'No' }}</td>
                              <td>{{ $brand->latestProduct?->created_at->format('d M, Y h:i A') }}</td>
                              <td align="left" class="text-muted">

                                <div class="row">
                                  <div class="col-6">
                                    Brand Certificate:
                                  </div>
                                  @isset($brand->certificate)
                                    <div class="col-6">
                                      <a href="{{ isset($brand->certificate) ? asset('uploads/brand') . '/' . $brand->certificate : 'javascript:;' }}"
                                        target="_blank"><i class="fa fa-download" title="Download"></i> </a>
                                    </div>
                                  @endisset
                                </div>

                                <div class="row">
                                  <div class="col-6">
                                    Brand Re-Seller Auth Letter:
                                  </div>
                                  @isset($brand->reseller_auth_letter)
                                    <div class="col-6">
                                      <a href="{{ isset($brand->reseller_auth_letter) ? asset('uploads/brand') . '/' . $brand->reseller_auth_letter : 'javascript:;' }}"
                                        target="_blank"><i class="fa fa-download" title="Download"></i> </a>
                                    </div>
                                  @endisset
                                </div>
                              </td>
                              <td>
                                @foreach ($brand->categories as $category)
                                  <span>{{ $category }}</span><br />
                                @endforeach
                              </td>
                              <td class="text-right">
                                <!-- Button trigger modal -->
                                <a href="{{ route('admin.brand.edit', $brand->id) }}" type="button" title="Edit brand"
                                  class="badge badge-pill badge-primary"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                  title='Delete brand' onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.brand.destroy', $brand->id) }}" type="button"
                                  class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i
                                    class="fa fa-trash"></i></a>
                                <a href="{{ route('admin.brand.status', [$brand->id, $brand->status === 1 ? 0 : 1]) }}"
                                  title="{{ $brand->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                  class="badge badge-pill badge-success disable" catid="0011-0">
                                  @if ($brand->status === 1)
                                    <i class="fa fa-toggle-on"></i>
                                  @else
                                    <i class="fa fa-toggle-off"></i>
                                  @endif
                                </a>
                              </td>

                            </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                  {{-- {{ $brands->links() }} --}}
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
