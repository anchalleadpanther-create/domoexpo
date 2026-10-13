@extends('customer.partials-fn.buyer.header')
@section('content')<style>
    /* Your custom CSS */
    /* Ensure the processing background is transparent */
    #products-table_processing {
        background-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
        color: #000 !important;
        /* Customize text color */
    }

    .dataTables_filter {
        display: none;
    }
    .table thead th {
        font-weight : 700!important;
    } 
    .form-control{
        color:#000000!important;
    }

    #products-table_wrapper .dt-search {
        display: none;
    }
</style>

<!-- Main Container -->
<div class="container product_table--listing">
    <div class="row justify-content-center">
        <div class="col-lg-9 offset-lg-2">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12 text-center">
                    <h2> Received Quotation</h2>
                </div>

                <div class="ps-section__content p-0">

                    <div class="card ">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 my-auto">
                                    <h4 class="mb-0" class="mb-0"> Quotation received from Supplier</h4>
                                </div>
                                {{-- @if(count($receivedSellerQuotations) > 3 ) --}}
                                    @if(empty($acceptedSellerQuotation))
                                        <div class="col-lg-6 d-flex justify-content-end flex-wrap">
                                            <button type="button" class="ps-btn" data-toggle="modal"
                                                data-target="#moreQuotationModal">More Quotation</button>
                                        </div>
                                    @endif
                                {{-- @endif --}}
                            </div>
                        </div>


                        <form action="{{route('buyer.accept-particular-seller-quotation-by-buyer')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="rfq_id" value="{{ $rfq->id }}">
                                <table class="table table-borderless   table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" width="40%" colspan="3"></th>

                                            @foreach ($receivedSellerQuotations->take(1) as $quotationIndex =>
                                            $quotation)
                                            <th scope="col" colspan="3">
                                                <div class="mx-1 py-3  rounded  " style="background:#63c3ff">
                                                  <a href="{{ route('buyer.rfq-pdf-detail',[$quotation->id])  }}" target="_blank">
                                                    Quote {{ $quotationIndex + 1 }}
                                                    <input type="radio" class="" name="seller_quotation_id" value="{{ $quotation->id }}" checked>
                                                    <span class="font-weight-bold">  {{ $quotation->seller?->biz_company ?? '' }} (Seller)</span>
                                                  </a>
                                                </div>
                                            </th>
                                            @endforeach


                                        </tr>
                                    </thead>
                                </table>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="25%">Description</th>
                                            <th scope="col">UOM</th>
                                            <th scope="col">QTY</th>
                                            @if(count($receivedSellerQuotations) != 0)
                                                @if(count($receivedSellerQuotations) >= 1)
                                                <th scope="col">Price</th>
                                                <th scope="col">Tax (%)</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Your Price</th>
                                                @endif
                                               
                                            @endif
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        @forelse ($rfq->RfqProducts as $key => $product)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="product[{{ $key }}][product_id]" value="{{ $product->product->id ?? '' }}">
                                                <input type="text" class="form-control  m-0 p-0 px-2 bg-white" value="{{ $product->mappedCategories->pluck('category_name')->implode(' > ')  }} "
                                                    name="" readonly>
                                            </td>
                                            <td align="center">
                                                <input type="text" class="form-control  m-0 p-0 px-2 bg-white"  name="" value="{{ $product->uom }}" readonly>
                                            </td>
                                            <td align="center">
                                                <input type="number" class="form-control quantity m-0 p-0 px-2 bg-white" name="product[{{ $key }}][quantity]" value="{{ $product->quantity }}" readonly>
                                            </td>

                                            {{-- Iterate through receivedSellerQuotations for each seller's quotation
                                            data --}}
                                            
                                            @if(count($receivedSellerQuotations) != 0)
                                                @foreach ($receivedSellerQuotations->take(1) as $quotationIndex => $quotation)
                                                    @php
                                                 
                                                 
                                                    $quotationProduct = $quotation->quotationProducts[$key];
                                                    ${'totalPrice_' . $quotationIndex} = $quotation->grand_total;
                                                    
                                                    ${'shipmentCost_' . $quotationIndex} = $quotation->total_shipment;

                                                    @endphp
                                                    
                                                    <input type="hidden" class="form-control tax m-0 p-0 px-2 bg-white" 
                                                            name="product[{{ $key }}][id]" value="{{ $quotationProduct->id  ?? '' }}" readonly>
                                                            
                                                    <td align="center">
                                                        <input type="number" class="form-control price m-0 p-0 px-2 bg-white" 
                                                            name="product[{{ $key }}][seller_{{ $quotationIndex }}][price]"
                                                            value="{{( @$quotationProduct->base_price  * @$product->quantity ) - @$quotationProduct->discount_amount ?? '' }}" readonly>
                                                    </td>
                                                    <td align="center">
                                                        <input type="number" class="form-control tax m-0 p-0 px-2 bg-white" 
                                                            name="product[{{ $key }}][seller_{{ $quotationIndex }}][tax]"
                                                            value="{{ $quotationProduct->tax  ?? '' }}" readonly>
                                                    </td>
                                                    <td align="center">
                                                        <input type="number" class="form-control total  m-0 p-0 px-2 bg-white" 
                                                            name="product[{{ $key }}][seller_{{ $quotationIndex }}][total]"
                                                            value="{{ @$quotationProduct->total_price}}"
                                                            readonly>
                                                    </td>
                                                    
                                                    <td align="center">
                                                        <input type="number" class="form-control total  m-0 p-0 px-2 bg-white" 
                                                            name="product[{{ $key }}][contractor_price]"
                                                            value="{{ @$quotationProduct->contractor_price}}">
                                                    </td>
                                                    
                                                @endforeach
                                            @endif
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="12" class="text-center">No products available.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    @if(count($receivedSellerQuotations) != 0)
                                        <tfoot>
                                            <tr class="text-right">
                                                <th scope="col" colspan="3">
                                                    <h5>Shipment Cost</h5>
                                                </th>
                                                @if(count($receivedSellerQuotations) >= 1)
                                                <th scope="col" colspan="3">
                                                    <input type="text" class="form-control m-0 p-0 px-2 bg-white"  name=""
                                                        value="{{$shipmentCost_0 ?? 0}}"  readonly>
                                                </th>
                                                @endif
                                                
                                            </tr>
    
                                            <tr class="text-right">
                                                <th scope="col" colspan="3">
                                                    <h5>Total Price</h5>
                                                </th>
                                                @if(count($receivedSellerQuotations) >= 1)
                                                <th scope="col" colspan="3">
                                                    <input type="text" class="form-control  m-0 p-0 px-2 bg-white"  name=""
                                                        value="{{$totalPrice_0 ?? 0}}" placeholder="Grand Total" readonly>
                                                </th>
                                                @endif
                                            </tr>
                                          
                                        </tfoot>
                                    @endif 
                                </table>
                            </div>
                            @if(count($receivedSellerQuotations) != 0)
                            <div class="card-footer text-muted">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td align="center" width="60%"></td>
                                            <td align="center">
                                                @if(empty($acceptedSellerQuotation))
                                                <button type="submit"
                                                    class="ps-btn btn-primary w-100">Send to Architect</button></td>
                                                @endif
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="moreQuotationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">More Quotation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('seller.change-rfq-status')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <table class="table  table-striped">
                                <thead> 
                                    <tr class="text-center">
                                      <th scope="col" > <div class="mx-1 py-3">Quote No.</div></th>                                        
                                      <th scope="col" >
                                            <div class="mx-1 py-3">Seller Name</div>
                                      </th>
                                      <th scope="col">
                                            <div class="mx-1 py-3 ">Detail</div>
                                      </th>
                                    </tr>
                                </thead>
                                <thead> 
                                    @foreach ($receivedSellerQuotations as $quotationIndex =>
                                        $quotation)
                                    <tr class="text-center">
                                      <th>Quote {{ $quotationIndex + 1 }}</th>                                        
                                      <th scope="col">
                                            <div class="mx-1 py-3">
                                                {{ $quotation->seller?->biz_company ?? '' }}
                                            </div>
                                        </th>
                                        <th scope="col" >
                                            <div class="mx-1 py-3 ">
                                              <a href="javascript:void(0)" class=" text-primary" data-toggle="modal"
                                                    data-target="#viewQuotationDetailModal"onclick="getSellerQuotationDetail({{$quotation->id}}),assignRfqId({{$quotation->rfq_id}})">View Detail</a>
                                            </div>
                                        </th>
                                    </tr>
                                    @endforeach
                                </thead>
                            </table>
                           
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="viewQuotationDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quotation Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('buyer.accept-particular-seller-quotation-by-buyer')}}" method="post">
                @csrf
                <input type="hidden" name="rfq_id" id="rfq_id_for_change_status" value="">
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
                                        <th scope="col">Discount (%)</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Your Price</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="sellerQuotationProducts">
                                    <tr>
                                        <td>
                                            <input type="hidden" name=""
                                                value="">
                                            <input type="text" class="form-control text-center m-0 p-0 px-2 bg-white" 
                                                value="Prodcut name" name="description" readonly>
                                        </td>
                                        <td align="center">
                                            <input type="text" class="form-control text-center m-0 p-0 px-2 bg-white"  name="uom"
                                                value="PCS" readonly>
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control quantity text-center m-0 p-0 px-2 bg-white" 
                                                name="quantity"  value="0" readonly>
                                        </td>

                                        <td align="center">
                                            <input type="number" class="form-control price text-center m-0 p-0 px-2 bg-white" 
                                                name="price" value="0" readonly>
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control tax text-center m-0 p-0 px-2 bg-white" 
                                                name="tax" value="0" readonly>
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control discount text-center m-0 p-0 px-2 bg-white" 
                                                name="discount" value="0" readonly>
                                        </td>
                                        
                                        <td align="center">
                                            <input type="number" class="form-control total text-center m-0 p-0 px-2 bg-white" 
                                                name="total" value="0" readonly>
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control contractor_price text-center m-0 p-0 px-2 bg-white" 
                                                name="contractor_price" value="0" >
                                        </td>
                                        
                                       
                                    </tr>
                                    
                                    <!--<tr>-->
                                    <!--    <td colspan="12" class="text-center">No products available.</td>-->
                                    <!--</tr>-->
                                
                                </tbody>
                                
                                <tfoot>
                                        <tr class="text-right">
                                            <th scope="col" colspan="6">
                                                <h5>Shipment Type</h5>
                                            </th>
                                            <th scope="col" colspan="2">
                                                <input type="text" class="form-control text-center m-0 p-0 px-2 bg-white"  id="logisticSellerQuotationOnModal" name=""
                                                    value="0" readonly>
                                            </th>
                                            
                                        </tr>

                                        <tr class="text-right">
                                            <th scope="col" colspan="6">
                                                <h5>Total Price</h5>
                                            </th>
                                            <th scope="col" colspan="2">
                                                <input type="text" class="form-control text-center m-0 p-0 px-2 bg-white"  id="grandTotalSellerQuotationOnModal" name=""
                                                    value="0" readonly>
                                            </th>
                                           
                                        </tr>


                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="ps-btn btn-secondary " data-dismiss="modal">Close</button>
                    @if(empty($acceptedSellerQuotation))
                    <button type="submit" class="ps-btn btn-primary ">Send to Architect</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Main Container -->

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
                // console.log(data.data.seller_quotation_products);  // Debugging - you can inspect the data
    
                // Empty current table body
                var tableBody = $('#sellerQuotationProducts');
                tableBody.empty();
                // Loop through the products and add rows dynamically
                data.data.seller_quotation_products.forEach(function(product, index)  {
                    const categories = product.related_rfq_product.mapped_categories;
                        let catResult = '';
                        
                        categories.forEach(cat => {
                          if (cat.parent_id !== 0) {
                            const parent = categories.find(p => p.id === cat.parent_id);
                            if (parent) {
                              catResult += `${parent.category_name} > ${cat.category_name}, `;
                            }
                          }
                        });
                        
                        // Remove the trailing comma and space
                        catResult = catResult.slice(0, -2);
                    
                    
                    var row = `<tr>
                                <td>
                                    <input type="hidden" name="product[${index}][product_id]" value="${product.product_id}">
                                    <input type="hidden" name="product[${index}][id]" value="${product.id}">
                                    <input type="hidden" name="seller_quotation_id" value="${seller_quote_id}">
                                    <input type="text" class="form-control text-center m-0 p-0 px-2 bg-white"  value="${catResult}" name="product[${index}][description]" readonly>
                                </td>
                                <td align="center">
                                    <input type="text" class="form-control text-center m-0 p-0 px-2 bg-white"  name="uom" value="${product.uom}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control quantity text-center m-0 p-0 px-2 bg-white"  name="quantity" value="${product.quantity}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control price text-center m-0 p-0 px-2 bg-white"  name="price" value="${product.base_price}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control tax text-center m-0 p-0 px-2 bg-white"  name="tax" value="${product.tax}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control discount text-center m-0 p-0 px-2 bg-white"  name="discount" value="${product.discount}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control total text-center m-0 p-0 px-2 bg-white"  name="total" value="${product.total_price}" readonly>
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control contractor_price text-center m-0 p-0 px-2 bg-white"  name="product[${index}][contractor_price]" value="${product.contractor_price}" >
                                </td>
                            </tr>`;
                    tableBody.append(row);
                });
    
                // Update the footer with the Grand Total
                var grand_total = data.data.seller_quotation.grand_total;
                $('#grandTotalSellerQuotationOnModal').val(grand_total);
    
                // Optionally, you can add more data to footer if needed (like shipment type or qualification score)
                var total_shipment = data.data.seller_quotation.total_shipment;
                $('#logisticSellerQuotationOnModal').val(total_shipment);  // Adjust as necessary
                $('#qualificationScoreSellerQuotationOnModal').val('60%');  // Adjust as necessary
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

</script>
<script>
    function assignRfqId(rfq_id){
        $('#rfq_id_for_change_status').val(rfq_id);
    }
    
</script>
@endsection