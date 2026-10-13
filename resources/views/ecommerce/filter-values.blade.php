@extends('user.header')
@section('userContent')

  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Filter Values</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page">Filter Values</li>
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
                  <form
                    action="{{ isset($filterValue) ? route('admin.filter-values.update', $filterValue->id) : route('admin.filter-values.store') }}"
                    method="post">
                    @csrf
                    @if (isset($filterValue)) @method('PATCH') @endif
                    <div class="row">
                      <div class="col-sm-12 col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="exampleInputname" class="form-label">Filter</label>
                          <select class="form-select" name="filter_id" data-placeholder="Choose one" tabindex="-1"
                            aria-hidden="true" required onchange="filterMenus(this)">
                            <option value="0">Select</option>
                            @foreach ($filters as $filter)
                              <option @if(isset($filterValue)) {{ $filterValue->filter_id === $filter->id ? 'selected' : '' }} @else {{ old('filter_id') === $filter->id ? 'selected' : ''  }} @endif value="{{ $filter->id }}">{{ $filter->filter_name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-5 col-md-5">
                        <div class="form-group">
                          <label for="exampleInputname" class="form-label">Filter Value</label>
                          <input type="text" name="filter_value" maxlength="100" required class="form-control"
                            value="{{ isset($filterValue) ? $filterValue->filter_value : old('filter_value') }}"
                            placeholder="Filter Value">
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-3 col-md-3">
                        <div class="form-group">
                          <label class="form-label">Display Status</label>
                          <select class="form-select" name="status" required data-placeholder="Choose one"
                            tabindex="-1" aria-hidden="true">
                            <option @if (isset($filterValue)) {{ $filterValue->status === 1 ? 'selected' : '' }} @else {{ old('status') === 1 ? 'selected' : '' }} @endif value="1">Enable</option>
                            <option @if (isset($filterValue)) {{ $filterValue->status === 0 ? 'selected' : '' }} @else {{ old('status') === 0 ? 'selected' : '' }} @endif value="0">Disable</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-1 col-md-1">
                        <div class="form-group" style="margin-top:27px;">
                          <button type="submit"
                            class="waves-effect waves-light btn mb-5 bg-gradient-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>

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
                          <th>Filter Value</th>
                          <th>Filter Name</th>
                          <th width="20%">Sort Id</th>
                          <th>Status</th>
                          <th class="text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form method="post" id="sort-form" action="{{ route('admin.filter-values.sort') }}">
                          @csrf
                          @method('PATCH')
                          @foreach ($filterValues as $key => $filterValue)
                            <input type="hidden" name="id[]" value="{{ $filterValue->id }}" />
                            <tr class="hover-primary odd result" role="row" data-fid="{{$filterValue->filter_id}}">
                              <td>{{ ++$key }}</td>
                              <td>{{ ucwords($filterValue->filter_value) }}</td>
                              <td>{{ isset($filterValue->filter) ? ucwords($filterValue->filter->filter_name) : '' }}</td>
                              <td class=''>
                                <input type="number" min='0' name="sort[{{ $filterValue->id }}]" class="form-control"
                                  value="{{ $filterValue->sort }}">
                              </td>
                              
                              <td>{{ $filterValue->status === 1 ? 'Enabled' : 'Disabled' }}</td>

                              <td class="text-right">
                                <a href="{{ route('admin.filter-values.edit', $filterValue->id) }}" title="Edit filter value"
                                  class="badge badge-pill badge-primary"><i class="fa fa-pencil"></i></a>
                                <a href="JavaScript:void(0);" data-bs-toggle="modal" data-bs-target="#modal-delete" title="Delete filter value"
                                  onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.filter-values.destroy', $filterValue->id) }}"
                                  class="badge badge-pill badge-danger delete" attr_id="7-0"><i class="fa fa-trash"></i> </a>
                                <a href="{{ route('admin.filter-values.status', [$filterValue->id, $filterValue->status === 1 ? 0 : 1]) }}"
                                  title="{{ $filterValue->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                  class="badge badge-pill badge-success  disable"
                                  attr_id="7-0">@if ($filterValue->status === 1) <i class="fa fa-toggle-on"></i> @else <i class="fa fa-toggle-off"></i> @endif</a>

                              </td>
                            </tr>
                          @endforeach
                          <tr>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="center"><button class="btn btn-sm btn-primary text-nowrap" form="sort-form">Update
                                Sort No.</button></td>
                            <td align="left"></td>
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
  <script>
    function filterMenus(e) {
				document.querySelectorAll('.result').forEach(element => {
					if(e.value == 0){
						element.style.display = 'table-row';
					}else{
						if(element.dataset.fid === e.value){
							element.style.display = 'table-row';
						}else{
							element.style.display = 'none';
						}
					}
				})
			}
  </script>
@endsection
