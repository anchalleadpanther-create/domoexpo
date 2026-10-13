@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Taxes</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page"><a
                      href="{{ route('admin.taxes.index') }}">Taxes</a></li>
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
                    <div class="col-md-3">
                      <h4 class="box-title">Taxes</h4>
                    </div>
                    <div class="col-sm-6" style="padding-top: 10px;">

                    </div>
                    <div class="col-md-3 text-right">
                      <a href="{{ route('admin.taxes.create') }}"
                        class="waves-effect waves-light btn mb-5 bg-gradient-primary pull-right">
                        Add Tax
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
                            <th>Country</th>
                            <th>Tax Name</th>
                            <th>Tax Rate</th>
                            <th>Added </th>
                            <th class="text-right" width='20%'>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($taxes as $key => $tax)
                            <tr class="hover-primary odd" role="row">
                              <td> {{ ++$key }} </td>
                              <td align="left">
                                <a href="javascript:;">Country:
                                  @if (isset($tax->country))
                                    {{ $tax->country->emoji }} {{ $tax->country->name }}
                                    ({{ $tax->country->iso2 }})
                                    <br />
                                  @else
                                    <i class="fa fa-globe"></i> All Countries<br />
                                  @endif
                                </a>
                              </td>
                              <td>
                                {{ $tax->tax_name }}
                              </td>
                              <td>
                                {{ $tax->tax_rate }} %
                              </td>
                              <td>
                                {{ $tax->created_at->format('Y-M-d') }}
                              </td>
                              <td class="text-right">
                                <!-- Button trigger modal -->
                                <a href="{{ route('admin.taxes.edit', $tax->id) }}" type="button" title="Edit Tax"
                                  class="badge badge-pill badge-primary"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                  title='Delete Tax' onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.taxes.destroy', $tax->id) }}" type="button"
                                  class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i
                                    class="fa fa-trash"></i></a>
                                <a href="{{ route('admin.taxes.status', [$tax->id, $tax->status === 1 ? 0 : 1]) }}"
                                  title="{{ $tax->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                  class="badge badge-pill badge-success disable" catid="0011-0">
                                  @if ($tax->status === 1)
                                  <i class="fa fa-toggle-on"></i> @else <i class="fa fa-toggle-off"></i>
                                  @endif
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
@endsection
