@extends('user.header')
@section('userContent')

  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Shipping</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page"><a
                      href="{{ route('admin.shipping.index') }}">Shipping</a></li>
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
                      <h4 class="box-title">Shipping</h4>
                    </div>
                    <div class="col-sm-6" style="padding-top: 10px;">

                    </div>
                    <div class="col-md-3 text-right">
                      <a href="{{ route('admin.shipping.create') }}"
                        class="waves-effect waves-light btn mb-5 bg-gradient-primary pull-right">
                        Add Shipping
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
                            <th>Shipping Name</th>
                            <th>Shipping Type</th>
                            <th>Price</th>
                            <th>Weight</th>
                            <th>Shipping Fee</th>
                            <th>Added</th>
                            <th class="text-right" width='20%'>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($shippings as $key => $shipping)

                            <tr class="hover-primary odd" role="row">
                              <td> {{ ++$key }} </td>
                              <td align="left">
                                <a href="javascript:;">Country: {{ $shipping->country->emoji }} {{ $shipping->country->name }}
                                  ({{ $shipping->country->iso2 }})<br />
                                </a>
                              </td>
                              <td>
                                {{ ucwords($shipping->name) }}
                              </td>
                              <td>
                                {{ ucwords($shipping->type) }}
                              </td>
                              <td>
                                $ {{ number_format($shipping->price_from, 2) }} - $ {{ number_format($shipping->price_to, 2) }}
                              </td>
                              <td>
                                {{ number_format($shipping->weight_from, 2) }} (g) -
                                {{ number_format($shipping->weight_to, 2) }} (g)
                              </td>
                              <td>
                                $ {{ number_format($shipping->cost, 2) }}
                              </td>
                              <td>
                                {{ $shipping->created_at->format('Y-M-d') }}
                              </td>
                              <td class="text-right">
                                <!-- Button trigger modal -->
                                <a href="{{ route('admin.shipping.edit', $shipping->id) }}" type="button" title="Edit Shipping"
                                  class="badge badge-pill badge-primary"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                  title='Delete Shipping' onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.shipping.destroy', $shipping->id) }}" type="button"
                                  class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i
                                    class="fa fa-trash"></i></a>
                                <a href="{{ route('admin.shipping.status', [$shipping->id, $shipping->status === 1 ? 0 : 1]) }}"
                                  title="{{ $shipping->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                  class="badge badge-pill badge-success disable"
                                  catid="0011-0">@if ($shipping->status === 1) <i class="fa fa-toggle-on"></i> @else <i class="fa fa-toggle-off"></i> @endif</a>
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
