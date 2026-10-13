@extends('user.header')
@section('userContent')

  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Companies</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page"><a
                      href="{{ route('admin.company.index') }}">Companies</a></li>
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
                    <div class="col-sm-6" style="padding-top: 10px;">
                    </div>
                    <div class="col-md-3 text-right">
                      <a href="{{ route('admin.company.create') }}"
                        class="waves-effect waves-light btn mb-5 bg-gradient-primary pull-right">
                        Add Company
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
                            <th></th>
                            <th>Company Details</th>
                            <th>Address</th>
                            <th>Contact Details</th>
                            <th>Contact Photo</th>
                            <th class="text-right" width='20%'>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($companies as $key => $company)

                            <tr class="hover-primary odd" role="row">
                              <td> {{ ++$key }} </td>
                              <td align="left">
                                <a class="avatar avatar-lg " href=javascript:;">
                                  <img
                                    src="{{ isset($company->company_logo) ? asset('uploads/company') . '/' . $company->company_logo : asset('allUsers/icon-thumb.png') }}"
                                    class="bg-success-light" alt="{{ $company->company_logo }}">
                                </a>
                              </td>
                              <td align="left">
                                <a href="javascript:;">{{ ucfirst($company->company_name) }}<br />
                                </a>
                                <span class="d-block text-muted">Email: {{ $company->company_email }}</span>

                                <span class="d-block text-muted">Phone: {{ $company->company_phone }}</span>
                                <a href="{{ $company->company_website }}" target="_blank"><span
                                    class="">Website</span></a>
                              </td>
                              <td>
                                {{ $company->company_address }}
                              </td>
                              <td align="left">
                                <a href="javascript:;">Name: {{ ucfirst($company->contact_name) }}<br />
                                </a>
                                <span class="d-block text-muted">Email: {{ $company->contact_email }}</span>
                                <span class="d-block text-muted">Phone: {{ $company->contact_mobile }}</span>
                                <span class="d-block text-muted">Dept: {{ $company->contact_department }}</span>
                                <span class="d-block text-muted">Des: {{ $company->contact_designation }}</span>
                              </td>
                              <td align="left">
                                <a class="avatar avatar-lg " href=javascript:;">
                                  <img
                                    src="{{ isset($company->contact_photo) ? asset('uploads/company') . '/' . $company->contact_photo : asset('allUsers/icon-thumb.png') }}"
                                    class="bg-success-light" alt="{{ $company->company_logo }}">
                                </a>
                              </td>
                              <td class="text-right">
                                <!-- Button trigger modal -->
                                <a href="{{ route('admin.company.edit', $company->id) }}" type="button"
                                  title="Edit Company" class="badge badge-pill badge-primary"><i
                                    class="fa fa-pencil"></i></a>
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                  title='Delete Company' onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.company.destroy', $company->id) }}" type="button"
                                  class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i
                                    class="fa fa-trash"></i></a>
                                <a href="{{ route('admin.company.status', [$company->id, $company->status === 1 ? 0 : 1]) }}"
                                  title="{{ $company->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                  class="badge badge-pill badge-success disable"
                                  catid="0011-0">@if ($company->status === 1) <i class="fa fa-toggle-on"></i> @else <i class="fa fa-toggle-off"></i> @endif</a>
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
  {{-- @include('extensions.table-modal') --}}
  <script>
    function newUrl(e) {
      let url = route('admin.category.index', {
        parent_id: e.value
      });
      location.href = url;
    }
  </script>

@endsection
