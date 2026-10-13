@extends('vendors.header')
@section('vendorContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Products</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Ecommerce</li>
                  <li class="breadcrumb-item active" aria-current="page">All Products & Variants</li>
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
                  <div class="row mb30 account-filters">
                    <div class="col-sm-10">
                      <form class="row" method="get" action="{{ route('vendor.products.index') }}">
                        @csrf
                        <div class="col-sm-5 plr5">
                          <div class="form-group">
                            <input class="form-control" maxlength="100" id="formFileSm" type="text"
                              placeholder="Search by Name & SKU" name="search" value="{{ request()->get('search') }}">
                          </div>

                        </div>
                        <div class="col-sm-6 plr5">
                          <button class="btn btn-primary">Search</button>
                          <a href="{{ route('vendor.products.index') }}" class="btn btn-secondary">Reset</a>

                          <a href="{{ route('vendor.products.export-products', ['brand_id' => Request('brand_id'), 'search' => Request('search')]) }}"
                            @class(['btn btn-dark'])>Export with Color & Size</a>
                        </div>

                      </form>

                      <form class="row" method="post" action="{{ route('vendor.products.update-stock') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-3">
                          <div class="mb-3">
                            <label for="formFile" class="form-label">Select Excel Sheet</label>
                            <input class="form-control" type="file" id="formFile" name="excelSheet"
                              accept=".xlx, .xlsx">
                          </div>
                          <button @class(['btn btn-dark'])>Update stock</button>
                        </div>
                      </form>

                    </div>
                  </div>
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
                    <x-vendors.products.single-product-with-variant-table :products="$products" :productTypes="$productTypes" />
                  </div>
                  {{ $products->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('allUsers/user/products.js') }}"></script>
@endsection
