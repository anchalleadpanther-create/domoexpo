@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Complete Look</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page">Mapped Category for Complete Look </li>
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
                <div class="col-sm-12 col-md-12">
                

                </div>
              </div>
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
                          <th>Category A</th>
                          <th>Category A</th>
                          <th class="text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($mapped_categories as $key => $item)
                            <tr class="hover-primary odd" role="row">
                              <td>{{ ++$key }}</td>
                              <td>{{ ucwords(@$item->category_a_info->category_name) }}</td>
                              <td>{{ ucwords(@$item->category_b_info->category_name) }}</td>
                              <td class="text-right">
                                <a href="JavaScript:void(0);" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                  title="Delete filter" onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.delete-mapped-related-category', $item->id) }}"
                                  class="badge badge-pill badge-danger delete" attr_id="7-0"><i
                                  class="fa fa-trash"></i> 
                                </a>
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
