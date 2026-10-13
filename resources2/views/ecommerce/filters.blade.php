@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Filters</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page">Filters</li>
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
                    action="{{ isset($filter) ? route('admin.filter.update', $filter->id) : route('admin.filter.store') }}"
                    method="post">
                    @csrf
                    @if (isset($filter))
                      @method('PATCH')
                    @endif
                    <div class="row">
                      <div class="col-sm-12 col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="exampleInputname" class="form-label">Filter Name</label>
                          <input type="text" name="filter_name" maxlength="100" required class="form-control"
                            value="{{ isset($filter) ? $filter->filter_name : old('filter_name') }}"
                            placeholder="Filter Name">
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-2 col-md-2">
                        <div class="form-group">
                          <label for="exampleInputname" class="form-label">Filter Alias</label>
                          <input type="text" name="alias" maxlength="100" class="form-control"
                            value="{{ isset($filter) ? $filter->alias : old('alias') }}" placeholder="Filter Alias">
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-2 col-md-2">
                        <div class="form-group">
                          <label class="form-label">Dropdown Type</label>
                          <select class="form-select" name="type" data-placeholder="Choose one" tabindex="-1"
                            aria-hidden="true" required>
                            <option
                              @if (isset($filter)) {{ $filter->type === 'single' ? 'selected' : '' }} @else {{ old('type') === 'single' ? 'selected' : '' }} @endif
                              value="single">Single</option>
                            <option
                              @if (isset($filter)) {{ $filter->type === 'multiple' ? 'selected' : '' }} @else {{ old('type') === 'multiple' ? 'selected' : '' }} @endif
                              value="multiple">Multiple</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-2 col-md-2">
                        <div class="form-group">
                          <label for="exampleInputname" class="form-label">Description</label>
                          <input type="text" name="description" maxlength="100" class="form-control"
                            value="{{ isset($filter) ? $filter->description : old('description') }}"
                            placeholder="Filter Description">
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-2 col-md-2">
                        <div class="form-group">
                          <label class="form-label">Display Status</label>
                          <select class="form-select" name="status" required data-placeholder="Choose one" tabindex="-1"
                            aria-hidden="true">
                            <option
                              @if (isset($filter)) {{ $filter->status === 1 ? 'selected' : '' }} @else {{ old('status') === 1 ? 'selected' : '' }} @endif
                              value="1">Enable</option>
                            <option
                              @if (isset($filter)) {{ $filter->status === 0 ? 'selected' : '' }} @else {{ old('status') === 0 ? 'selected' : '' }} @endif
                              value="0">Disable</option>
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
                          <th>Filter Name</th>
                          <th>Alias</th>
                          <th>Type</th>
                          <th>Description</th>
                          <th>Filter Values</th>
                          <th>Mapped Categories</th>
                          <th width="15%">Sort Id</th>
                          <th>Status</th>
                          <th class="text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form method="post" id="sort-form" action="{{ route('admin.filter.sort') }}">
                          @csrf
                          @method('PATCH')
                          @foreach ($filters as $key => $filter)
                            <input type="hidden" name="id[]" value="{{ $filter->id }}" />
                            <tr class="hover-primary odd" role="row">
                              <td>{{ ++$key }}</td>
                              <td>{{ ucwords($filter->filter_name) }}</td>
                              <td>{{ ucwords($filter->alias) }}</td>
                              <td>{{ ucfirst($filter->type) }}</td>
                              <td>{{ ucfirst($filter->description) }}</td>
                              <td><a href="javascript:;" onclick='setTableData(this)' title='View filter values'
                                  data-bs-toggle="modal" data-bs-target="#table-modal" data-type='filter-values'
                                  data-table-data='{{ $filter->mappedFilterValues->toJson() }}'><i
                                    class="fa fa-eye"></i></a></td>
                              <td><a href="javascript:;" onclick='setTableData(this)' title='View categories'
                                  data-bs-toggle="modal" data-bs-target="#table-modal" data-type='categories'
                                  data-table-data='{{ $filter->mappedCategories->toJson() }}'><i
                                    class="fa fa-eye"></i></a></td>
                              <td class=''>
                                <input type="number" min='0' name="sort[{{ $filter->id }}]"
                                  class="form-control" value="{{ $filter->sort }}">
                              </td>
                              <td>{{ $filter->status === 1 ? 'Enabled' : 'Disabled' }}</td>
                              <td class="text-right">
                                <a href="{{ route('admin.filter.edit', $filter->id) }}" title="Edit filter"
                                  class="badge badge-pill badge-primary"><i class="fa fa-pencil"></i></a>
                                <a href="JavaScript:void(0);" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                  title="Delete filter" onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.filter.destroy', $filter->id) }}"
                                  class="badge badge-pill badge-danger delete" attr_id="7-0"><i
                                    class="fa fa-trash"></i> </a>
                                <a href="{{ route('admin.filter.status', [$filter->id, $filter->status === 1 ? 0 : 1]) }}"
                                  title="{{ $filter->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                  class="badge badge-pill badge-success  disable" attr_id="7-0">
                                  @if ($filter->status === 1)
                                    <i class="fa fa-toggle-on"></i>
                                  @else
                                    <i class="fa fa-toggle-off"></i>
                                  @endif
                                </a>

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
                            <td align="center"><button class="btn btn-sm btn-primary text-nowrap"
                                form="sort-form">Update
                                Sort No.</button></td>
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
@endsection
