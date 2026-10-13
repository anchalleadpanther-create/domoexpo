@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Adandoned Cart Products</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Orders</li>
                  <li class="breadcrumb-item active" aria-current="page">Adandoned Cart Products</li>
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
              <div class="box">
                <div class="box-body">
                  <div class="col-sm-12">

                    <span class="admin-filter" style="display:none">Filter Tab</span>
                    <div class="row mb30 account-filters">
                      <form class="col-sm-12" method="get" action="{{ route('admin.products.abandoned-cart') }}">
                        <input type="hidden" name="date_from" value="{{ Request('date_from') }}" />
                        <input type="hidden" name="date_till" value="{{ Request('date_till') }}" />
                        <div class="row">
                          <div class="col-sm-12 col-md-auto mb-2 mb-md-0">
                            <label class="form-label fw-500 fs-14">Date From/Till</label>
                            <div id="reportrange"
                              style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;border-radius: 5px; width: 100%">
                              <i class="fa fa-calendar"></i>&nbsp;
                              <span></span> <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col plr5 my-auto">
                            <button class="waves-effect waves-light btn btn-rounded btn-primary-light">Apply <i
                                class="fa fa-filter"></i></button>
                            <a href="{{ route('admin.products.abandoned-cart') }}"
                              class="waves-effect waves-light btn btn-rounded btn-info-light">Reset <i
                                class="fa fa-refresh"></i></a>
                            <button type="submit" name="report_type" value="excel"
                              class="waves-effect waves-light btn btn-rounded btn-success-light">Download
                              Report <i class="fa fa-download"></i></button>
                          </div>
                        </div>
                      </form>

                    </div>

                    <div class="row">
                      <div class="col-12 mb-30">
                        <span class="text-primary fw-700 fs-16">Total Cart Quantity: {{ $totalQuantity }}</span>
                        <br />
                        <span class="text-primary fw-700 fs-16">Total Cart Grand Total: INR
                          {{ number_format($grandTotal, 2) }}</span>
                      </div>
                    </div>

                  </div>
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
                            <th>Product Detail</th>
                            <th>Product Image</th>
                            <th>Customer Details</th>
                            <th>Added Date/Time In Cart</th>
                            <th width="10%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $key => $product)
                            <tr class="hover-primary odd" role="row">
                              <td> {{ ++$key }} </td>
                              <td align="left">
                                <a href="javascript:;">PID: {{ $product->product_id }}</a><br />
                                <a href="javascript:;">Name: {{ $product->name }}</a><br />
                                <a href="javascript:;">SKU: {{ $product->sku }}</a><br />
                                <a href="javascript:;">Brand: {{ $product->brand?->brand_name }}</a><br />
                                <a href="javascript:;">Price: INR {{ number_format($product->price_unit, 2) }}</a>
                                <a href="javascript:;">Quantity: {{ $product->quantity }}</a>
                              </td>
                              <td>
                                <div class="avatar-md profile-user-wid mt-1">
                                  <a
                                    @isset($product->product->mappedCategories)
                                    target="_blank"
                                    href="{{ route('customer.product-detail', [$product->product->mappedCategories->last()->category_slug, $product->product->slug, $product->product->sku, $product->product->uuid]) }}"
                                    @endisset>
                                    <img
                                      src="{{ isset($product->product_image) ? asset('uploads/products') . '/' . $product->product_image : asset('allUsers/icon-thumb.png') }}"
                                      class="" style="height: 60px; width: 60px;" />
                                  </a>
                                </div>
                              </td>
                              <td align="left">
                                <a href="javascript:;">Name: {{ $product->buyer?->fullName }}</a><br />
                                <a href="javascript:;">Email: {{ $product->buyer?->email }}</a><br />
                                <a href="tel:{{ $product->buyer?->phone }}">Phone:
                                  {{ $product->buyer?->phone }}</a><br />
                                <a href="javascript:;">Country:
                                  {{ $product?->buyer?->addresses->first()?->myCountry->name }}</a><br />
                                <a href="javascript:;">State:
                                  {{ $product?->buyer?->addresses->first()?->myState->name }}</a><br />
                                <a href="javascript:;">City:
                                  {{ $product?->buyer?->addresses->first()?->myCity->name }}</a><br />
                                <a href="javascript:;">Address:
                                  {{ $product?->buyer?->addresses->first()?->address_one }}</a><br />
                                <a href="javascript:;">
                                  {{ $product->buyer->ordersCount === 1 ? 'New Customer' : 'Returning Customer' }}</a>
                              </td>
                              <td>
                                {{ $product->created_at->format('d M, Y h:i A') }}
                              </td>
                              <td>
                                <a href="javascript:;" class="waves-effect waves-light btn btn-default btn-flat mb-5"
                                  title="Add remark" data-bs-toggle="modal" data-bs-target="#remarkModal"
                                  style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important"
                                  onclick="document.querySelector(`input[name='product_cart_id']`).value={{ $product->id }}">
                                  Add Remark
                                </a>
                                <a href="javascript:;"
                                  class="waves-effect waves-light btn btn-default btn-flat mb-5 view-remarks"
                                  title="View remarks" data-bs-toggle="modal" data-bs-target="#viewRemarkModal"
                                  data-cart-id="{{ $product->id }}"
                                  style="width:100%;font-size:12px;background:#989898 !important;color:#fff !important">
                                  View Remarks
                                </a>
                              </td>
                            </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                  {{ $products->links() }}
                </div>
              </div>
            </div>
          </div>
      </section>
    </div>
  </div>
  <div class="modal fade" id="remarkModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Remark</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" id="remark-form" action="{{ route('admin.products.abandoned-cart-remark') }}">
            @csrf
            <input type="hidden" name="product_cart_id" value="" />
            <div class="form-group">
              <select class="form-select" name="type">
                <option value="Fake client / order">Fake client / order</option>
                <option value="Genuine Client">Genuine Client</option>
                <option value="Negotiator">Negotiator</option>
                <option value="Testers">Testers</option>
              </select>
            </div>
            <div class="form-group">
              <textarea maxlength="1000" name="remark" class="form-control" rows="6"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="remark-form" class="btn btn-sm bg-dark3 float-end">Save Remark</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="viewRemarkModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Viewing Remarks</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col" width="10%">#</th>
                  <th scope="col" width="70%">Remark</th>
                  <th scope="col" width="70%">Type</th>
                  <th scope="col" width="20%">Created at</th>
                </tr>
              </thead>
              <tbody class="all-remarks">
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script>
    document.querySelectorAll('.view-remarks').forEach(remarks => {
      remarks.addEventListener('click', async remark => {
        const response = await axios.get(route(`admin.products.get-abandoned-cart-remark`, remark.target.dataset
          .cartId));
        const template = response.data.data?.map((comment, index) => {
          return `<tr>
                  <th scope="row">${++index}</th>
                  <td>${comment.remark}</td>
                  <td>${comment.type}</td>
                  <td>${new Date(comment.created_at).getDate()+' '+new Date(comment.created_at).toLocaleString('default', { month: 'long' })+' '+new Date(comment.created_at).getFullYear()}</td>
                </tr>`;
        }).join(' ');
        document.querySelector('.all-remarks').innerHTML = template;
      })
    });
  </script>
  <script type="text/javascript" src="{{ asset('allUsers/user/report.js') }}"></script>
@endsection
