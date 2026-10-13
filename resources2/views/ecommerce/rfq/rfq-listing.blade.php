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
                            <tr>
                                <tr>
                                    <th>RFQ ID</th>
                                    <th>RFQ File </th>
                                    <th>Buyer Info</th>
                                    <th>Category</th>
                                    <th>Creation Date/Time</th>
                                    <th>Requirement</th>
                                    <th>Accept Request</th>
                                    <th style="text-align:center">Status</th>
                                    <th>Action</th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                        
                                
                                
                                @foreach($rfqs as $rfq)
                                <tr>


                                    <td>RFQ-000{{$rfq->id}}</td>
                                    <td align="center" style="vertical-align: middle;">
                                        <a href="{{ !empty($rfq->uploaded_rfq_file) ? asset('uploads/upload_rfq_file/' . $rfq->uploaded_rfq_file) : asset('allUsers/no-image.png') }}"
                                            style="width: 40px; display: inline-block;" target="_blank">
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <p class="mb-0">Name : {{$rfq->name}}</p>
                                        <p class="mb-0">e-Mail : {{$rfq->email}} </p>
                                        <p class="mb-0">Phone : {{$rfq->mobile}}</p>
                                    </td>
                                    <td>
                                        @if($rfq->quotation_type == 'product' && !empty($rfq->productCategories))
                                        @foreach($rfq->productCategories as $value)
                                        <p class="mb-0"> {{$value->category_name}}</p>
                                        @endforeach
                                        @endif
                                        @if($rfq->quotation_type == 'service' && !empty($rfq->serviceCategories))
                                        @foreach($rfq->serviceCategories as $value)
                                        <p class="mb-0">{{$value->category_name}}</p>
                                        @endforeach
                                        @endif
                                    </td>

                                    <td>{{ $rfq->created_at ? date('d-m-Y',strtotime($rfq->created_at)) : '' }} <br>{{
                                        $rfq->created_at ? date('h:i A',strtotime($rfq->created_at)) : '' }}</td>

                                    <td style="text-align:center">{{ $rfq->requirement }}</td>
                                    <td style="text-align:center">
                                        @php
                                            $acceptedSellerQuotation = $rfq->receivedSellerQuotationRequest()->where('status','accepted')->first() 
                                        @endphp
                                         <p class="mb-0">Name : {{ $acceptedSellerQuotation->seller->biz_company ?? '' }}</p>
                                        <p class="mb-0">Grand Total : {{$acceptedSellerQuotation->grand_total ?? '' }} </p>
                                        <p class="mb-0">Comment : {{$acceptedSellerQuotation->comment ?? ''  }}</p>
                                         
                                        <a href="javascript:void(0)" class=" text-primary" data-bs-toggle="modal"
                                                    data-bs-target="#viewQuotationDetailModal"onclick="getSellerQuotationDetail({{$acceptedSellerQuotation->id ?? ''}})">View Detail</a>
                                    </td>
                                    <td style="text-align:center">{{ $rfq->status }}</td>
                                    <!--<td style="text-align:center">-</td>-->
                                    <td class="ps-table-action">
                                         <a href="{{route('admin.requested-seller-quotation',[$rfq->id])}}" ><img src="{{asset('allUsers/frontend/img/table-icon.png')}}"></a>
                                   
                                        
                                    </td>
                                </tr>
                                @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                  {{ $rfqs->links() }}
                </div>
              </div>
            </div>
          </div>
      </section>
    </div>
  </div>
  
  
  
  
    <div class="modal fade" id="viewQuotationDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
        
        
    <div class="modal-dialog modal-lg"  tabindex="-1" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quotation Detail</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('seller.change-rfq-status')}}" method="post">
                @csrf
                <input type="hidden" name="rfq_id" id="rfq_id_for_change_status">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <table class="table  table-striped">
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
                                            <input type="hidden" name=""
                                                value="">
                                            <input type="text" class="form-control text-center m-0 p-0"
                                                value="Prodcut name"
                                                name="description" readonly>
                                        </td>
                                        <td align="center">
                                            <input type="text" class="form-control text-center m-0 p-0" name="uom"
                                                value="PCS" readonly>
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control quantity text-center m-0 p-0"
                                                name="quantity"  value="0" readonly>
                                        </td>

                                        <td align="center">
                                            <input type="number" class="form-control price text-center m-0 p-0"
                                                name="price" value="0" readonly>
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control tax text-center m-0 p-0"
                                                name="tax" value="0" readonly>
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control total text-center m-0 p-0"
                                                name="total" value="0" readonly>
                                        </td>
                                       
                                    </tr>
                                    
                                    <!--<tr>-->
                                    <!--    <td colspan="12" class="text-center">No products available.</td>-->
                                    <!--</tr>-->
                                
                                </tbody>
                                
                                <tfoot>
                                        <tr class="text-right">
                                            <th scope="col" colspan="4">
                                                <h5>Shipment Type</h5>
                                            </th>
                                            <th scope="col" colspan="2">
                                                <input type="text" class="form-control text-center m-0 p-0" id="logisticSellerQuotationOnModal" name=""
                                                    value="0" placeholder="By Logistic" readonly>
                                            </th>
                                            
                                        </tr>

                                        <tr class="text-right">
                                            <th scope="col" colspan="4">
                                                <h5>Total Price</h5>
                                            </th>
                                            <th scope="col" colspan="2">
                                                <input type="text" class="form-control text-center m-0 p-0" id="grandTotalSellerQuotationOnModal" name=""
                                                    value="0" placeholder="Grand Total" readonly>
                                            </th>
                                           
                                        </tr>

                                        <tr class="text-right">
                                            <th scope="col" colspan="4">
                                                <h5>Qualification Score</h5>
                                            </th>
                                            <th scope="col" colspan="2">
                                                 <input type="text" class="form-control text-center m-0 p-0"  id="qualificationScoreSellerQuotationOnModal"  name=""
                                                    value="60%" placeholder="60%" readonly>
                                            </th>
                                        </tr>

                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!--<button type="submit" class="btn btn-success">submit</button>-->
                </div>
            </form>
        </div>
    </div>
</div>

  
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
    function getSellerQuotationDetail(seller_quote_id) {
        // console.log(seller_quote_id); 
        
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
                                    <input type="text" class="form-control text-center m-0 p-0" value="${product.product_name}" name="description" readonly>
                                </td>
                                <td align="center">
                                    <input type="text" class="form-control text-center m-0 p-0" name="uom" value="${product.uom}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control quantity text-center m-0 p-0" name="quantity" value="${product.quantity}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control " name="price" value="${product.price}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control tax text-center m-0 p-0" name="tax" value="${product.tax}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control total text-center m-0 p-0" name="total" value="${product.total_price}" readonly>
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

@endsection
