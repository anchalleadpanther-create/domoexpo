@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Product Type Values</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page">Product Type Values</li>
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
                    action="{{ isset($productTypeValue) ? route('admin.product-type-value.update', $productTypeValue->id) : route('admin.product-type-value.store') }}"
                    method="post">
                    @csrf
                    @if (isset($productTypeValue))
                      @method('PATCH')
                    @endif
                    <div class="row">

                      <div class="col-sm-12 col-lg-4 col-md-3">
                        <div class="form-group">
                          <label class="form-label">Product Type</label>
                          <select class="form-select" name="type_id" required data-placeholder="Choose one" tabindex="-1"
                            aria-hidden="true" onchange="toggleColorPicker(this)">
                            <option value="">Select Type</option>
                            @foreach ($productTypes as $productType)
                              <option
                                @if (isset($productTypeValue)) {{ $productTypeValue->type_id === $productType->id ? 'selected' : '' }} @else {{ old('type_id') === $productType->id ? 'selected' : '' }} @endif
                                value="{{ $productType->id }}">{{ @$productType->type }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12 col-lg-4 col-md-3">
                        <div class="form-group">
                          <label for="exampleInputname" class="form-label">Product Type Value</label>
                          <input type="text" name="type_value" maxlength="500" required class="form-control"
                            value="@if (isset($productTypeValue)) {{ $productTypeValue->type_value }}@else{{ old('type_value') }} @endif"
                            placeholder="Product Type Value. eg: Red">
                        </div>
                      </div>

                      <div
                        class=" col-sm-12 col-lg-1 col-md-1 color-picker @if (isset($productTypeValue) && $productTypeValue->type_id === 2) d-none @endif @if (old('type_id' === '2')) d-none @endif">
                        <div class="form-group">
                          <label for="exampleInputname" class="form-label">Color Code</label>
                          <input type="color" name="type_color_code" maxlength="50" required class="form-control"
                            title="Choose your color"
                            value="@if (isset($productTypeValue)) {{ $productTypeValue->type_color_code }}@else{{ old('type_color_code') }} @endif">
                        </div>
                      </div>

                      <div class="col-sm-12 col-lg-3 col-md-3">
                        <div class="form-group">
                          <label class="form-label">Display Status</label>
                          <select class="form-select" name="status" required data-placeholder="Choose one" tabindex="-1"
                            aria-hidden="true">
                            <option
                              @if (isset($productTypeValue)) {{ $productTypeValue->status === 1 ? 'selected' : '' }} @else {{ old('status') === 1 ? 'selected' : '' }} @endif
                              value="1">Enable</option>
                            <option
                              @if (isset($productTypeValue)) {{ $productTypeValue->status === 0 ? 'selected' : '' }} @else {{ old('status') === 0 ? 'selected' : '' }} @endif
                              value="0">Disable</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12 col-lg-12 col-md-12 text-right">
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
                          <th>Product Type Value</th>
                          <th>Product Type</th>
                          <th>Color Code</th>
                          <th width="10%">Sort Num</th>
                          <th width="10%">Status</th>
                          <th class="text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form method="post" id="sort-form" action="{{ route('admin.product-type-value.sort', 1) }}">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="type" value="sort-update">
                          @foreach ($productTypeValues as $key => $productTypeValue)
                            <input type="hidden" name="id[]" value="{{ $productTypeValue->id }}" />
                            <tr class="hover-primary odd" role="row">
                              <td>{{ ++$key }}</td>
                              <td>{{ ucwords($productTypeValue->type_value) }}</td>
                              <td>{{ @$productTypeValue->productType->type }}</td>
                              <td
                                @if ($productTypeValue->productType->type === 'Color') style="background-color: {{ $productTypeValue->type_color_code }};" @endif>
                                @if ($productTypeValue->productType->type === 'Color')
                                  {{ @$productTypeValue->type_color_code }}
                                @endif
                              </td>
                              <td align="left">
                                <input type="number" min="0" onKeyPress="if(this.value.length===8) return false;"
                                  name="sort[]" value="{{ $productTypeValue->sort }}" class="form-control " />
                              </td>
                              <td>{{ $productTypeValue->status === 1 ? 'Enabled' : 'Disabled' }}</td>
                              <td class="text-right">
                                <a href="{{ route('admin.product-type-value.edit', $productTypeValue->id) }}"
                                  title="Edit product type value" class="badge badge-pill badge-primary"><i
                                    class="fa fa-pencil"></i></a>
                                <a href="JavaScript:void(0);" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                  title="Delete product type value" onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.product-type-value.destroy', $productTypeValue->id) }}"
                                  class="badge badge-pill badge-danger delete" attr_id="7-0"><i
                                    class="fa fa-trash"></i>
                                </a>
                                <a href="{{ route('admin.product-type-value.status', [$productTypeValue->id, $productTypeValue->status === 1 ? 0 : 1]) }}"
                                  title="{{ $productTypeValue->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                  class="badge badge-pill badge-success  disable" attr_id="7-0">
                                  @if ($productTypeValue->status === 1)
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
                            <td align="center"><button class="btn btn-sm btn-primary text-nowrap"
                                form="sort-form">Update Sort No.</button></td>
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
  @include('extensions.table-modal')
@endsection
