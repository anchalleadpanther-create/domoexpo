@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Categories</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page"><a
                      href="{{ route('admin.category.index', 0) }}">Categories</a></li>
                  @if (isset($category->parent->parent))
                    <li class="breadcrumb-item"><a href="javascript:;">{{ $category->parent->parent->category_name }}</a>
                    </li>
                  @endif
                  @if (isset($category->parent))
                    <li class="breadcrumb-item"><a href="javascript:;">{{ $category->parent->category_name }}</a>
                    </li>
                  @endif
                  <li class="breadcrumb-item"><a href="javascript:;">{{ @$category->category_name }}</a>
                  </li>
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
                    <div class="col-md-8">
                      <form style="width:100%;" id="catfilter" name="catfilter" accept-charset="utf-8" class="row">
                        <div class="col">
                          <select class="form-select  categoryfilter" name="name" tabindex="-1" aria-hidden="true"
                            onchange="newUrl(this)">
                            <option>Select Category</option>
                            @empty(Request('search'))
                              @foreach ($categories as $key => $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                              @endforeach
                            @endempty
                          </select>
                        </div>
                        <div class="col">
                          <input type="text" name="search" value="" class="form-control search" />
                        </div>
                        <div class="col">
                          <button class="btn btn-primary search-category" type="button">Search</button>
                          <!--<a href="javascript:;" title="Export products" type="button" class="btn btn-secondary"-->
                          <!--  data-bs-toggle="modal" data-bs-target="#importModal">-->
                          <!--  <i class="fa fa-upload"></i>Upload Sort Excel</a>-->
                        </div>
                      </form>
                      &nbsp;&nbsp;
                    </div>
                    
                    <div class="col-md-2 text-right">
                      
                    </div>
                    <div class="col-md-2 text-right">
                      <a href="{{ route('admin.category.create', Request::segment(3)) }}"
                        class="waves-effect waves-light btn mb-5 bg-gradient-primary pull-right">
                        Add Category
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-body py-0 px-1">
                <div class="table-responsive rounded card-table">

                  <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <table class="table border-no no-footer table-sm" id="example1" role="grid"
                      aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>Cat ID</th>
                          <th>icon</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Banner</th>
                          <th>Mapped Categories</th>
                          <th>Products</th>
                          {{-- <th>Featured</th> --}}
                          <th>Sort No.</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form method="post" id="sort-form" action="{{ route('admin.categories.sort') }}">
                          @csrf
                          @method('PUT')
                          @foreach ($categories as $key => $category)
                            <input type="hidden" name="id[]" value="{{ $category->id }}">
                            <tr class="hover-primary odd" role="row">
                              <td> {{ $category->id }} </td>
                              <td>
                                <div class="avatar-md profile-user-wid mt-1">
                                  <img
                                    src="{{ isset($category->icon) ? asset('uploads/category') . '/' . $category->icon : asset('allUsers/icon-thumb.png') }}"
                                    class=" " style="height: 40px; width: 40px;">

                                </div>
                              </td>
                              <td>
                                <a href="javascript:;" target="_blank">{{ ucwords($category->category_name) }}</a>
                              </td>
                              <td>
                                <a href="{{ route('customer.product-category', $category->category_slug) }}"
                                  target="_blank">{{ $category->category_slug }}</a>
                              </td>
                              <td>
                                <img
                                  src="{{ isset($category->banner) ? asset('uploads/category') . '/' . $category->banner : asset('allUsers/800X200.png') }}"
                                  style="width:150px">

                              </td>
                              
                              <td>
                                <a href="javascript:;" onclick='setTableData(this)' title='View categories'
                                  data-bs-toggle="modal" data-bs-target="#table-modal" data-type='categories'
                                  data-table-data='{{ $category->children->toJson() }}'><i
                                    class="fa @if ($category->children->count() === 0) fa-eye-slash @else fa-eye @endif">
                                    ({{ $category->children->count() }})
                                  </i></a>
                              </td>

                              <td><a href="javascript:;">({{ $category->mappedProducts->count() }})</a>
                              </td>

                              {{-- <td>{{ $category->featured ? 'Yes' : 'No' }}</td> --}}

                              <td align="left"><input type="number" min="1"
                                  onKeyPress="if(this.value.length===8) return false;" name="sort[]"
                                  value="{{ $category->sort }}" class="form-control" /></td>

                              <td class="text-center">
                                <!-- Button trigger modal -->
                                <a href="{{ route('admin.category.edit', $category->id) }}" title="Edit category"
                                  type="button" class="badge badge-pill badge-primary"> <i
                                    class="fa fa-pencil"></i></a>
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                  title="Delete category" onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.category.destroy', $category->id) }}"
                                  type="button" class="badge badge-pill badge-danger delete"
                                  href="JavaScript:void(0);"><i class="fa fa-trash"></i></a>
                                <a href="{{ route('admin.category.status', [$category->id, $category->status === 1 ? 0 : 1]) }}"
                                  title="{{ $category->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                  class="badge badge-pill badge-success disable" catid="0011-0">
                                  @if ($category->status === 1)
                                    <i class="fa fa-toggle-on"></i>
                                  @else
                                    <i class="fa fa-toggle-off"></i>
                                  @endif
                                </a>
                                <a href="{{ route('admin.category.export-products', $category->id) }}"
                                  title="Export products" type="button" class="badge badge-pill badge-primary"> <i
                                    class="fa fa-download"></i></a>
                              </td>
                            </tr>
                          @endforeach
                          <tr>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="center"><button class="btn btn-sm btn-primary" form="sort-form">Update Sort
                                No.</button></td>
                            <td></td>
                          </tr>
                        </form>
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
  <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="importModalLabel">Update Sorts</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.category.import-products') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Upload excel</label>
              <input type="file" class="form-control" name="excelSheet" accept=".xlsx,.xls" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function newUrl(e) {
      let url = route('admin.category.index', {
        parent_id: e.value
      });
      location.href = url;
    }

    document.querySelector('.search-category').addEventListener('click', () => {
      const search = document.querySelector('.search').value;
      location.href = route('admin.category.index', {
        parent_id: 0,
        search,
      });
    });
  </script>
@endsection
