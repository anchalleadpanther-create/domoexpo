@extends('user.header')
@section('userContent')
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
                      <form class="row" method="get"
                        action="{{ route('admin.products.index', 'single-with-variant') }}">
                        @csrf
                        <div class="col-sm-5 plr5">
                          <div class="form-group">
                            <input class="form-control" maxlength="100" id="formFileSm" type="text"
                              placeholder="Search by Name & SKU" name="search" value="{{ request()->get('search') }}">
                          </div>

                        </div>
                        <div class="col-sm-2 plr5">
                          <div class="form-group">
                            <select class="form-select brand-filter" data-placeholder="Type to search brands"
                              name="brand_id">
                              <option value="">Select</option>
                              @foreach ($brands as $brand)
                                <option @selected(request()->get('brand_id') == $brand->id) value="{{ $brand->id }}">
                                  {{ $brand->brand_name }}</option>
                              @endforeach
                            </select>
                          </div>

                        </div>
                        <div class="col-sm-6 plr5">
                          <button class="btn btn-primary">Search</button>
                          <a href="{{ route('admin.products.index', 'single-with-variant') }}"
                            class="btn btn-secondary">Reset</a>

                          <a href="{{ route('admin.products.export-products', ['brand_id' => Request('brand_id'), 'search' => Request('search')]) }}"
                            @class([
                                'btn btn-dark',
                                {{-- 'd-none' => Request('brand_id') === null && Request('search') === null, --}}
                            ])>Export with Color & Size</a>
                          <a href="{{ route('admin.products.export-products-with-sku', ['brand_id' => Request('brand_id'), 'search' => Request('search')]) }}"
                            @class([
                                'btn btn-dark',
                                {{-- 'd-none' => Request('brand_id') === null && Request('search') === null, --}}
                            ])>Export with SKU</a>
                        </div>

                      </form>

                    </div>

                    <div class="col-sm-2 plr5">
                      <a href="{{ route('admin.products.create') }}"
                        class="waves-light btn mb-5 bg-gradient-primary pull-right">
                        Add Product
                      </a>
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
                    @if (Request::segment(3) === 'single-with-variant')
                      <x-admin.ecommerce.product.single-product-with-variant-table :products="$products" :productTypes="$productTypes" />
                    @elseif(Request::segment(3) === 'in-active')
                      <x-admin.ecommerce.product.inactive-product-table :products="$products" />
                    @endif
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
