@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Request for Quotation</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Quotation</li>
                  <li class="breadcrumb-item active" aria-current="page">Request for Quotation</li>
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
                  
                   <div class="box-header with-border  d-flex justify-space-between">
                <h4 class="box-title">Sellers Quotation</h4>
               
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#moreQuotationModal">More Quotation</button>

                <div class="row mt-20">
                 

                </div>
              </div>
                  
                  
                <div class="box-body">
                 
                  <div class="table-responsive rounded card-table">

                    <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                      <div class="row">
                       
                        <div class="col-sm-12 col-lg-6">
                            
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                        </div>
                      </div>
                      
                      
                      <table class="table border-no dataTable no-footer" 
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" width="40%" colspan="3"></th>

                                            @foreach ($receivedSellerQuotations->take(3) as $quotationIndex =>
                                            $quotation)
                                            <th scope="col" colspan="3">
                                                <div class="mx-1 py-3 text-white bg-info">
                                                    Quote {{ $quotationIndex +1 }}
                                                    <input type="radio" class="" name="seller_quotation_id" value="{{ $quotation->id }}">
                                                    {{ $quotation->seller?->biz_company ?? '' }}
                                                </div>
                                            </th>
                                            @endforeach


                                        </tr>
                                    </thead>
                                </table>
                      
                      
                   <table class="table border-no dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                       <thead>
                            <tr class="text-center">
                                <th scope="col" width="25%">Description</th>
                                <th scope="col">UOM</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Tax (%)</th>
                                <th scope="col">Total</th>
                                <th scope="col">Price</th>
                                <th scope="col">Tax (%)</th>
                                <th scope="col">Total</th>
                                <th scope="col">Price</th>
                                <th scope="col">Tax (%)</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @forelse ($rfq->RfqProducts as $key => $product)
                                <tr>
                                    <td>
                                        <p class="form-control text-center m-0 p-0">{{ $product->product->name }}</p>
                                    </td>
                                    <td align="center">
                                        <p class="form-control text-center m-0 p-0">{{ $product->uom }}</p>
                                    </td>
                                    <td align="center">
                                        <p class="form-control text-center m-0 p-0">{{ $product->quantity }}</p>
                                    </td>
                    
                                    {{-- Iterate through receivedSellerQuotations for each seller's quotation --}}
                                    @foreach ($receivedSellerQuotations->take(3) as $quotationIndex => $quotation)
                                        @php
                                            $quotationProduct = $quotation->quotationProducts->firstWhere('product_id', $product->product_id);
                                            ${'totalPrice_' . $quotationIndex} = $quotation->grand_total;
                                        @endphp
                                        <td align="center">
                                            <p class="form-control text-center m-0 p-0">{{ $quotationProduct->price ?? '' }}</p>
                                        </td>
                                        <td align="center">
                                            <p class="form-control text-center m-0 p-0">{{ $quotationProduct->tax ?? '' }}</p>
                                        </td>
                                        <td align="center">
                                            <p class="form-control text-center m-0 p-0">
                                                {{ (($quotationProduct->price ?? 0) * ($product->quantity ?? 0)) + ((($quotationProduct->price ?? 0) * ($product->quantity ?? 0)) * ($quotationProduct->tax ?? 0) / 100) }}
                                            </p>
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">No products available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    
                        <tfoot>
                            <tr class="text-right">
                                <th scope="col" colspan="3">
                                    <h4>Shipment Type</h4>
                                </th>
                                <th scope="col" colspan="3">
                                    <p class="form-control text-center m-0 p-0">{{ $rfq->shipment_method ?? '' }}</p>
                                </th>
                                <th scope="col" colspan="3">
                                    <p class="form-control text-center m-0 p-0">{{ $rfq->shipment_method ?? '' }}</p>
                                </th>
                                <th scope="col" colspan="3">
                                    <p class="form-control text-center m-0 p-0">{{ $rfq->shipment_method ?? '' }}</p>
                                </th>
                            </tr>
                    
                            <tr class="text-right">
                                <th scope="col" colspan="3">
                                    <h4>Total Price</h4>
                                </th>
                                <th scope="col" colspan="3">
                                    <p class="form-control text-center m-0 p-0">{{ $totalPrice_0 ?? '' }}</p>
                                </th>
                                <th scope="col" colspan="3">
                                    <p class="form-control text-center m-0 p-0">{{ $totalPrice_1 ?? '' }}</p>
                                </th>
                                <th scope="col" colspan="3">
                                    <p class="form-control text-center m-0 p-0">{{ $totalPrice_2 ?? '' }}</p>
                                </th>
                            </tr>
                    
                            <tr class="text-right">
                                <th scope="col" colspan="3">
                                    <h4>Qualification Score</h4>
                                </th>
                                <th scope="col" colspan="3">
                                    <p class="form-control text-center m-0 p-0">60%</p>
                                </th>
                                <th scope="col" colspan="3">
                                    <p class="form-control text-center m-0 p-0">60%</p>
                                </th>
                                <th scope="col" colspan="3">
                                    <p class="form-control text-center m-0 p-0">60%</p>
                                </th>
                            </tr>
                    
                            <tr class="text-right">
                                <th scope="col" colspan="3"></th>
                                <th scope="col" colspan="3">
                                    <h5>Negotiate</h5>
                                </th>
                                <th scope="col" colspan="3">
                                    <h5>Negotiate</h5>
                                </th>
                                <th scope="col" colspan="3">
                                    <h5>Negotiate</h5>
                                </th>
                            </tr>
                        </tfoot>
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
  
  
  
  
  
  
  
<!-- More Quotation Modal -->
<div class="modal fade" id="moreQuotationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">More Quotation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('seller.change-rfq-status')}}" method="post">
                @csrf
                <input type="hidden" name="rfq_id" id="rfq_id_for_change_status">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">
                                            <div class="mx-1 py-3">Quote No.</div>
                                        </th>
                                        <th scope="col">
                                            <div class="mx-1 py-3">Seller Name</div>
                                        </th>
                                        <th scope="col">
                                            <div class="mx-1 py-3">Detail</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($receivedSellerQuotations->slice(3) as $quotationIndex => $quotation)
                                        <tr class="text-center">
                                            <th>Quote {{ $quotationIndex + 1 }}</th>
                                            <th scope="col">
                                                <div class="mx-1 py-3">
                                                    {{ $quotation->seller?->biz_company ?? '' }}
                                                </div>
                                            </th>
                                            <th scope="col">
                                                <div class="mx-1 py-3">
                                                    <a href="javascript:void(0)" class="text-primary"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#viewQuotationDetailModal"
                                                       onclick="getSellerQuotationDetail({{ $quotation->id }})">View Detail</a>
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Quotation Detail Modal -->
<div class="modal fade" id="viewQuotationDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quotation Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('seller.change-rfq-status') }}" method="post">
                @csrf
                <input type="hidden" name="rfq_id" id="rfq_id_for_change_status">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" width="25%">Description</th>
                                        <th scope="col">UOM</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Tax (%)</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="sellerQuotationProducts">
                                    <tr>
                                        <td>
                                            <p class="form-control text-center m-0 p-0">Product Name</p>
                                        </td>
                                        <td align="center">
                                            <p class="form-control text-center m-0 p-0">PCS</p>
                                        </td>
                                        <td align="center">
                                            <p class="form-control text-center m-0 p-0">0</p>
                                        </td>
                                        <td align="center">
                                            <p class="form-control text-center m-0 p-0">0</p>
                                        </td>
                                        <td align="center">
                                            <p class="form-control text-center m-0 p-0">0</p>
                                        </td>
                                        <td align="center">
                                            <p class="form-control text-center m-0 p-0">0</p>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="text-right">
                                        <th scope="col" colspan="4">
                                            <h5>Shipment Type</h5>
                                        </th>
                                        <th scope="col" colspan="2">
                                            <p class="form-control text-center m-0 p-0" id="logisticSellerQuotationOnModal" name="">
                                                0
                                            </p>
                                        </th>
                                    </tr>
                                    <tr class="text-right">
                                        <th scope="col" colspan="4">
                                            <h5>Total Price</h5>
                                        </th>
                                        <th scope="col" colspan="2">
                                         
                                            
                                             <input type="number" class="form-control" id="grandTotalSellerQuotationOnModal" name="" readonly>
                                        </th>
                                    </tr>
                                    <tr class="text-right">
                                        <th scope="col" colspan="4">
                                            <h5>Qualification Score</h5>
                                        </th>
                                        <th scope="col" colspan="2">
                                            <p class="form-control text-center m-0 p-0" id="qualificationScoreSellerQuotationOnModal" name="">
                                                60%
                                            </p>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if (empty($acceptedSellerQuotation))
                        <button type="submit" class="btn btn-success">Submit</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Main Container -->

<script>
    function getSellerQuotationDetail(seller_quote_id) {
        console.log(seller_quote_id); 
        
        $.ajax({
            async: false,
            method: "get",
            url: route('get-seller-quote-detail'),
            data: {
                seller_quote_id: seller_quote_id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data.data.seller_quotation_products);  // Debugging - you can inspect the data
    
                // Empty current table body
                var tableBody = $('#sellerQuotationProducts');
                tableBody.empty();
    
                // Loop through the products and add rows dynamically
                data.data.seller_quotation_products.forEach(function(product) {
                    var row = `<tr>
                                <td>
                                    <input type="hidden" name="product_id[]" value="${product.product_id}">
                                    <input type="text" class="form-control" value="${product.product_name}"  name="description" readonly>
                                </td>
                                <td align="center">
                                    <input type="text" class="form-control" name="uom" value="${product.uom}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control" name="quantity" value="${product.quantity}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control" name="price" value="${product.price}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control" name="tax" value="${product.tax}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control" name="total" value="${product.total_price}" readonly>
                                </td>
                            </tr>`;
                    tableBody.append(row);
                });
    
                // Update the footer with the Grand Total
                var grandTotal = data.data.seller_quotation.grand_total;
                $('#grandTotalSellerQuotationOnModal').val(grandTotal);
    
                // Optionally, you can add more data to footer if needed (like shipment type or qualification score)
                $('#logisticSellerQuotationOnModal').val('By Logistic');  // Adjust as necessary
                $('#qualificationScoreSellerQuotationOnModal').val('60%');  // Adjust as necessary
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

</script>
  
  
  
  
  
  
  
  
  
  
  
  
  <div class="modal fade" id="changeQuotationStatus" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Change Status</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.change-rfq-status')}}" method="post">
          @csrf
        <div class="modal-body">
          <div class="row">
                <div class="col-lg-12">
                    <label for="basic-url">Select Status</label>
                    <div class="input-group mb-3">
                      <select class="custom-select" name="status" id="inputGroupSelect01">
                        <option value="">Choose...</option>
                        <option value="Received">Received</option>
                        <option value="Accepted">Accepted</option>
                        <option value="Rejected">Rejected</option>
                      </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Submit</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
  <script>
    
  </script>
@endsection
