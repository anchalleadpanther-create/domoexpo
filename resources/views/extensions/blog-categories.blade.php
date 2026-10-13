@extends('user.header')
@section('userContent')

  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Blog Categories</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page"><a
                      href="{{ route('admin.blog-category.index', 0) }}">Blog Categories</a></li>
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

                  <a href="{{ route('admin.blog-category.create') }}"
                    class="waves-effect waves-light btn mb-5 bg-gradient-primary pull-right">
                    Add Blog Category
                  </a>

                </div>
              </div>
              <div class="box-body py-0 px-1">
                <div class="table-responsive rounded card-table">

                  <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <table class="table border-no no-footer table-sm" id="example1" role="grid"
                      aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>#</th>
                          <th>icon</th>
                          <th>Name</th>
                          <th>Banner</th>
                          <th>Description</th>
                          <th>Mapped Blogs</th>
                          <th class="text-right" width='20%'>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categories as $key => $category)
                          <input type="hidden" name="id[]" value="{{ $category->id }}">
                          <tr class="hover-primary odd" role="row">
                            <td> {{ ++$key }} </td>
                            <td>
                              <div class="avatar-md profile-user-wid mt-1">
                                <img
                                  src="{{ isset($category->icon) ? asset('uploads/blog-category') . '/' . $category->icon : asset('allUsers/icon-thumb.png') }}"
                                  class=" " style="height: 40px; width: 40px;">
                              </div>
                            </td>
                            <td>
                              <p>{{ ucwords($category->category_name) }}</p>
                            </td>
                            <td>
                              <img
                                src="{{ isset($category->banner) ? asset('uploads/blog-category') . '/' . $category->banner : asset('allUsers/800X200.png') }}"
                                style="width:150px">

                            </td>

                            <td class="px-5">{!! htmlspecialchars_decode($category->description) !!}</td>

                            <td><a href="javascript:;" onclick='setTableData(this)' title='View Blogs'
                                data-bs-toggle="modal" data-bs-target="#table-modal" data-type='blog'
                                data-table-data='{{ $category->mappedBlogs->toJson() }}'><i
                                  class="fa @if ($category->mappedBlogs->count() === 0) fa-eye-slash @else fa-eye @endif">
                                  ({{ $category->mappedBlogs->count() }})</i></a></td>



                            <td class="text-right">
                              <!-- Button trigger modal -->
                              <a href="{{ route('admin.blog-category.edit', $category->id) }}" title="Edit category"
                                type="button" class="badge badge-pill badge-primary"> <i class="fa fa-pencil"></i></a>
                              <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                title="Delete category" onclick="destroyUrlUpdate(this)"
                                data-destroy-url="{{ route('admin.blog-category.destroy', $category->id) }}"
                                type="button" class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i
                                  class="fa fa-trash"></i></a>
                              <a href="{{ route('admin.blog-category.status', [$category->id, $category->status === 1 ? 0 : 1]) }}"
                                title="{{ $category->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                class="badge badge-pill badge-success disable" catid="0011-0">@if ($category->status === 1) <i class="fa fa-toggle-on"></i> @else <i class="fa fa-toggle-off"></i> @endif</a>
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
@endsection
