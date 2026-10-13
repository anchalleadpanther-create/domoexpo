@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Currencies</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page"><a
                      href="{{ route('admin.blog.index', 0) }}">Currencies</a></li>
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
                    </div>
                    <div class="col-sm-6" style="    padding-top: 10px;">
                    </div>
                    <div class="col-md-3 text-right">
                      <a href="{{ route('admin.currencies.create') }}"
                        class="waves-effect waves-light btn mb-5 bg-gradient-primary pull-right">
                        Add Currency
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
                            <th>Currency</th>
                            <th>Con Ratio</th>
                            <th>Country</th>
                            <th>Currency Code</th>
                            <th>Currency Display Code</th>
                            <th>Status</th>
                            <th class="text-right" width='20%'>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($currencies as $key => $currency)
                            <tr class="hover-primary odd" role="row">
                              <td> {{ ++$key }} </td>
                              <td>
                                {{ $currency->currency }}
                              </td>
                              <td>
                                {{ $currency->con_ratio }}
                              </td>
                              <td>
                                {{ $currency->country?->name }}
                              </td>
                              <td>
                                {{ $currency->currency_code }}
                              </td>
                              <td>
                                {{ $currency->currency_display_code }}
                              </td>
                              <td>
                                @if ($currency->status)
                                  <span class="badge badge-success">Active</span>
                                @else
                                  <span class="badge badge-danger">Inactive</span>
                                @endif
                              </td>
                              <td class="text-right">
                                <!-- Button trigger modal -->
                                <a href="{{ route('admin.currencies.edit', $currency->id) }}" type="button"
                                  title="Edit blog" class="badge badge-pill badge-primary"><i
                                    class="fa fa-pencil"></i></a>
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                  title='Delete blog' onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.currencies.destroy', $currency->id) }}" type="button"
                                  class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i
                                    class="fa fa-trash"></i></a>
                                <a href="{{ route('admin.currencies.status', [$currency->id, $currency->status === 1 ? 0 : 1]) }}"
                                  title="{{ $currency->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                  class="badge badge-pill badge-success disable" catid="0011-0">
                                  @if ($currency->status === 1)
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
                </div>
              </div>
            </div>
          </div>
      </section>
    </div>
  </div>
@endsection
