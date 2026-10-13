@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Product Types</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Setup</li>
                  <li class="breadcrumb-item active" aria-current="page">Product Types</li>
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
                    action="{{ isset($productType) ? route('admin.product-type.update', $productType->id) : route('admin.product-type.store') }}"
                    method="post">
                    @csrf
                    @if (isset($productType))
                      @method('PATCH')
                    @endif
                    <div class="row">

                      {{-- <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="form-group">
                          <label class="form-label">Product Type Category</label>
                          <select class="form-select" name="category_id" required onchange="checkCategoriesLength(this)">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                              <option
                                @if (isset($productType)) {{ $productType->category_id === $category->id ? 'selected' : '' }} @else {{ old('category_id') === $category->id ? 'selected' : '' }} @endif
                                value="{{ $category->id }}">
                                {{ $category->category_name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div> --}}

                      <div class="col-sm-12 col-lg-5 col-md-5">
                        <div class="form-group">
                          <label for="exampleInputname" class="form-label">Product Type Name</label>
                          <input type="text" name="type" maxlength="100" required class="form-control type-name"
                            value="@if (isset($productType)) {{ $productType->type }}@else{{ old('type') }} @endif"
                            placeholder="Product Type Name">
                        </div>
                      </div>

                      <div class="col-sm-12 col-lg-5 col-md-5">
                        <div class="form-group">
                          <label class="form-label">Display Status</label>
                          <select class="form-select" name="status" required data-placeholder="Choose one" tabindex="-1"
                            aria-hidden="true">
                            <option
                              @if (isset($productType)) {{ $productType->status === 1 ? 'selected' : '' }} @else {{ old('status') === 1 ? 'selected' : '' }} @endif
                              value="1">Enable</option>
                            <option
                              @if (isset($productType)) {{ $productType->status === 0 ? 'selected' : '' }} @else {{ old('status') === 0 ? 'selected' : '' }} @endif
                              value="0">Disable</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-12 col-lg-2 col-md-2">
                        <div class="form-group" style="margin-top:27px;">
                          <button type="submit"
                            class="waves-effect waves-light btn mb-5 bg-gradient-primary sub-btn">Submit</button>
                        </div>
                      </div>
                      <div class="col-12">
                        <p class="text-danger small error"></p>
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
                          <th>Product Type Name</th>
                          <th>Product Type Values</th>
                          {{-- <th>Category</th> --}}
                          {{-- <th>Sort</th> --}}
                          <th>Status</th>
                          {{-- <th class="text-right">Action</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        <form method="post" id="sort-form" action="{{ route('admin.product-type.sort') }}">
                          @csrf
                          @method('PUT')
                          @foreach ($productTypes as $key => $productType)
                            <input type="hidden" name="id[]" value="{{ $productType->id }}" />
                            <tr class="hover-primary odd" role="row">
                              <td>{{ ++$key }}</td>
                              <td>{{ ucwords($productType->type) }}</td>
                              <td><a href="javascript:;" onclick='setTableData(this)' title='View product type values'
                                  data-bs-toggle="modal" data-bs-target="#table-modal" data-type='product-type-values'
                                  data-table-data='{{ $productType->mappedProductTypeValues->toJson() }}'><i
                                    class="fa fa-eye"></i></a></td>
                              {{-- <td>{{ $productType->category->category_name }}</td> --}}

                              {{-- <td align="left"><input type="number" min="1"
                                  onKeyPress="if(this.value.length===8) return false;" name="sort[]"
                                  value="{{ $productType->sort }}" class="form-control" /></td> --}}

                              <td>{{ $productType->status === 1 ? 'Enabled' : 'Disabled' }}</td>
                              {{-- <td class="text-right">
                                <a href="{{ route('admin.product-type.edit', $productType->id) }}"
                                  title="Edit product type" class="badge badge-pill badge-primary"><i
                                    class="fa fa-pencil"></i></a>
                                <a href="JavaScript:void(0);" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                  title="Delete product type" onclick="destroyUrlUpdate(this)"
                                  data-destroy-url="{{ route('admin.product-type.destroy', $productType->id) }}"
                                  class="badge badge-pill badge-danger delete" attr_id="7-0"><i class="fa fa-trash"></i>
                                </a>
                                <a href="{{ route('admin.product-type.status', [$productType->id, $productType->status === 1 ? 0 : 1]) }}"
                                  title="{{ $productType->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                  class="badge badge-pill badge-success  disable" attr_id="7-0">
                                  @if ($productType->status === 1)
                                    <i class="fa fa-toggle-on"></i>
                                  @else
                                    <i class="fa fa-toggle-off"></i>
                                  @endif
                                </a>
                              </td> --}}
                            </tr>
                          @endforeach
                          {{-- <tr>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="center"><button class="btn btn-sm btn-primary" form="sort-form">Update Sort
                                No.</button></td>
                            <td align="left"></td>
                            <td></td>
                          </tr> --}}
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
  <script>
    async function checkCategoriesLength(e) {
      let nameField = document.querySelector('.type-name');
      let submitBtn = document.querySelector('.sub-btn');
      let error = document.querySelector('.error');
      let category_id = +e.value;

      let url = `${route('get-product-type-length')}?category_id=${category_id}`;
      const response = await fetch(url);
      let data = await response.json();
      data = data.data;

      if (data >= 2) {
        nameField.setAttribute('readonly', true);
        submitBtn.setAttribute('disabled', true);
        error.textContent = 'This category already contains maximum number of product types in it which is 2.';
      } else {
        nameField.removeAttribute('readonly');
        submitBtn.removeAttribute('disabled');
        error.textContent = '';
      }

    }
  </script>
@endsection
