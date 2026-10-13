@extends('customer.partials-fn.buyer.header')
@section('content')
<style>
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

    #products-table_wrapper .dt-search {
        display: none;
    }
</style>
<!-- Main Container -->
<div class="container product_table--listing">
    <div class="row justify-content-center">
        <div class="col-lg-7 offset-lg-2">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12">
                    <h2>Quotations</h2>
                    <p>Information about your current plan and usages</p>
                </div>

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p><b>Total Records : {{count($rfqs)}} 55</b></p>
                        <div class="ps-section_header2">
                            
                            <div class="ps-section_export ml-4">
                                <!--<a href="{{route('buyer.buyer-create-rfq',['rfq-detail'])}}" class="ps-btn">-->
                                <!--  Create RFQ-->
                                <!--</a>-->
                                
                                <a href="{{route('buyer.create-boq')}}" class="ps-btn">
                                  Create Project
                                </a>
                             
                            </div>
                        </div>
                    </div>
                </section> 

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <form action="{{route('buyer.buyer-rfq')}}" method="get" class=" w-100">
                            <div class="ps-section_header2 w-100">
                                <input class="form-control  w-50 " type="text" id="search" name="search" placeholder="Search RFQ ID and Description ">
                                <button type="submit" class="ps-btn ml-3" id="filter-submit">Search</button>
                                <a href="{{route('buyer.buyer-rfq')}}" class="ps-btn ps-btn-black ml-3" id="clear-filters"> Reset</a>
                            </div>
                        </form>
                    </div>
                </section>

                <div class="ps-section__content p-0">
                    <div class="table-responsive">


                        <table class="table ps-table--responsive account__table table-bordered text-center" id="products-table">
                            <thead>
                                <tr>
                                    <th>RFQ ID</th>
                                    <th>Title </th>
                                    <th>Created At Date</th>
                                    <th>Description</th>
                                    <th style="text-align:center">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                <!-- Example Row -->
                                @foreach($rfqs as $rfq)
                                <tr>
                                    <td width="10%">RFQ-000{{$rfq->id}}</td>
                                    
                                    <td  width="15%">
                                       {{$rfq->title}}
                                    </td>
                                   

                                    <td width="10%">{{ $rfq->created_at ? date('d-m-Y',strtotime($rfq->created_at)) : '' }} {{ $rfq->created_at ? date('h:i A',strtotime($rfq->created_at)) : '' }}</td>
                                   
                                    
                                    <td width="30%">{{ $rfq->spacial_instructions }}</td>

                                   
                                    <td style="text-align:center"  width="10%">
                                        
                                        {{ $rfq->status }}
                                        
                                        
                                    </td>
                                   
                                    <td  width="20%" class="ps-table-action text-center">
                                        
                                        
                                        @if($rfq?->receivedSellerQuotationRequest()->where('architect_id',auth()->user()?->id)->count() > 0)
                                            
                                            <a class="btn btn-dark" href="{{route('buyer.recevied-quotation-from-contractor',[$rfq->id])}}">
                                               Contractor  Quotations ({{$rfq?->receivedSellerQuotationRequest()->where('architect_id',auth()->user()?->id)->count()}})
                                            </a>
                                        @else
                                        
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
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
                    <button type="button" class="btn ps-btn ml-3" data-dismiss="modal">Close</button>
                    <!--<button type="submit" class="btn btn-success">submit</button>-->
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Main Container -->


<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap4.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

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
                                    <input type="number" class="form-control price text-center m-0 p-0" name="price" value="${product.price}" readonly>
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


<script>
    // $(function() {
    //     var table = $('#products-table').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         responsive: true,  // Enable responsiveness
    //         scrollX: true,     // Enable horizontal scrolling
    //         // dom: 'Bfrtip',
    //         ajax: {
    //             url: '{!! route('seller.seller-products') !!}',
    //             data: function (d) {
    //                 d.search_box = $('#search_box').val();
    //                 d.sku_filter = $('#sku_filter').val();
    //             }
    //         },
    //         columns: [
    //             { data: 'id', name: 'id' ,width: '5%' },
    //             { data: 'image', name: 'image' ,width: '10%'},
    //             {
    //                 data: 'product_detail',
    //                 name: 'product_detail',
    //                 render: function(data, type, full, meta) {
    //                     return '<b>'+full.name +'</b>' +
    //                     '<br>SKU: ' + full.sku ;
                        
    //                 },
    //                 width: '20%'
    //             },
    //             {
    //                 data: 'price_detail',
    //                 name: 'price_detail',
    //                 render: function(data, type, full, meta) {
    //                     return 'MRP: ' + full.rrp + 
    //                     '<br>Discount: ' + full.discount + 
    //                     '% <br>Unit Price: ' + full.price_unit;
                        
    //                 },
    //                 width: '20%'
    //             },
    //             { data: 'category', name: 'category' },
    //             { data: 'date_of_upload', name: 'date_of_upload' },
    //             { data: 'status', name: 'status',width: '10%'},
    //             { data: 'action', name: 'action', className : "text-center", orderable: false, searchable: false , width: '10%'}
    //         ]
    //     });

    //     // Trigger search when button is clicked
    //     $('#filter-submit').click(function() {
    //         table.draw();  // Redraw the DataTable with the new search parameters
    //     });

    //     // Optionally, trigger search when pressing Enter in the search box
    //     $('#search_box, #sku_filter').on('keyup', function(e) {
    //         if (e.keyCode === 13) {
    //             table.draw();
    //         }
    //     });

    //     $('#clear-filters').click(function() {
    //             // Reset the filter input fields
    //             $('#search_box').val('');
    //             $('#sku_filter').val('');

    //             // Redraw the DataTable
    //             table.draw();
    //         });
    // });
</script>
@endsection