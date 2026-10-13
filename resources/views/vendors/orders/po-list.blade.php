@extends('vendors.header')
@section('vendorContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">PO</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">PO</li>
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
                            <th>ID</th>
                            <th>Date/Time</th>
                            <th>Status</th>
                            <th>Order Via</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>PO</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($orders as $key => $order)
                            <tr class="hover-primary odd" role="row">
                              <td class="text-left">
                                <p class="no-margin">OID:FEI-
                                  <a href="{{ route('vendor.products-orders.show', $order->supplier_order_id) }}"
                                    style="color:#2677e7">{{ @$order->orderItemDetail->order_id_counter }}</a>
                                </p>
                              </td>

                              <td class="text-left">
                                <p class="no-margin">
                                  Date / Time:
                                  {{ @$order->orderItemDetail->created_at->format('d M, Y') }} /
                                  {{ @$order->orderItemDetail->created_at->format('h:i A') }}
                                </p>
                              </td>

                              <td class="text-left">
                                <p class="no-margin">Status :
                                  <span style="color:#2677e7">{{ @$order->OrderStatus }}</span>
                                </p>
                              </td>

                              <td class="text-left">
                                @if ($order->orderItemDetail->order->order_via === 'online')
                                  <p class="no-margin">Order Via:
                                    <span style="color:#2677e7">{{ 'Customer' }}</span>
                                  </p>
                                @else
                                  <p class="no-margin">Order Via:
                                    <span style="color:#2677e7">{{ 'FEI Store' }}</span>
                                  </p>
                                @endif
                              </td>

                              <td>
                                <p class="no-margin">
                                  <a @if (isset($order->product->mappedCategories) && isset($order->product->mappedCategories->last()->category_slug)) target="_blank"
                                  href="{{ route('customer.product-detail', [$order->product->mappedCategories->last()->category_slug, $order->product->slug, $order->product->sku, $order->product->uuid]) }}" @endif
                                    style="color:#2677e7">{{ $order->name }}</a>
                                </p>
                                <p class="no-margin">SKU: {{ $order->sku }}</p>
                              </td>

                              <td class="text-left">
                                <a
                                  @if (isset($order->product->mappedCategories) && isset($order->product->mappedCategories->last()->category_slug)) target="_blank"
                                  href="{{ route('customer.product-detail', [$order->product->mappedCategories->last()->category_slug, $order->product->slug, $order->product->sku, $order->product->uuid]) }}" @endif>
                                  <img width="60px"
                                    src="{{ isset($order->product_image) ? asset('uploads/products') . '/' . $order->product_image : asset('allUsers/icon-thumb.png') }}"
                                    alt="{{ $order->name }}" title="{{ $order->name }}">
                                </a>
                              </td>
                              <td class="text-left">
                                <a target="_blank"
                                  href="{{ asset('uploads/po') . '/' . $order->orderItemDetail->po_document }}"
                                  style="width:100%;" class="btn btn-basic btn-basic-color" data-bs-toggle="tooltip"
                                  data-bs-placement="top" title="View Purchase Order">
                                  PO PDF
                                </a>
                              </td>
                            </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                  {{ $orders->links() }}
                </div>
              </div>
            </div>
          </div>
      </section>
    </div>
  </div>
@endsection
