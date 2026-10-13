@extends('customer.partials-fn.seller.header') 
@section('content')
 <style>
        /* Your custom CSS */
        /* Ensure the processing background is transparent */
#products-table_processing {
    background-color: transparent !important;
    border: none !important;
    box-shadow: none !important;
    color: #000 !important; /* Customize text color */
}

.dataTables_filter {
    display: none;
}

#products-table_wrapper .dt-search{
display: none;
}
    </style>
<!-- Main Container -->
<div class="container product_table--listing">
    <div class="row justify-content-center">
        <div class="col-lg-9 offset-lg-2">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12">
                    <h2>Request for Quotations</h2>
                </div>

             {{--   <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p><b>Total Records : 15</b></p>
                        <div class="ps-section_header2">
                             <select class="form-control">
                                <option value="1">Select</option>
                            </select> -->
                            <div class="ps-section_export ml-4">
                                <a href="{{route('seller.create-seller-product')}}" class=""><label>Add Single Item </label> </a>
                                <input type="button"><label>Export to excel</label>

                            </div>
                        </div>
                    </div>
                </section> --}}

                {{-- <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <div class="ps-section_header2">
                            <input class="form-control" type="text" id="sku_filter" placeholder="Product SKU Code">
                            <input class="form-control ml-3" type="text" id="search_box" placeholder="Product Name">
                            <a href="javascript:void(0)" class="ps-btn ml-3" id="filter-submit" >Submit</a>
                            <a href="javascript:void(0)" class="ps-btn ps-btn-black ml-3" id="clear-filters"> Clear</a>
                        </div>
                        
                    </div>
                </section> --}}

                <div class="ps-section__content p-0">
                    <div class="table-responsive">
                    

                        <table class="table ps-table--responsive account__table table-bordered" id="products-table">
                            <thead>
                                <tr>
                                    <th>RFQ ID</th>
                                    <th>RFQ File </th>
                                    <th>Buyer Info</th>
                                    <th>Category</th>
                                    <th>Creation Date/Time</th>
                                    <th>Requirement</th>
                                    <th style="text-align:center">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Row -->
                                @foreach($rfqs as $rfq)
                                <tr>
                                

                                   <td>RFQ-000{{$rfq->id}} </td>
                                   <td align="center" style="vertical-align: middle;">
                                        <a href="{{ !empty($rfq->uploaded_rfq_file) ? asset('uploads/upload_rfq_file/' . $rfq->uploaded_rfq_file) : asset('allUsers/no-image.png') }}" 
                                           style="width: 40px; display: inline-block;" 
                                           target="_blank">
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
                                    <td>{{ $rfq->created_at ? date('d-m-Y',strtotime($rfq->created_at)) : '' }} <br>{{ $rfq->created_at ? date('h:i A',strtotime($rfq->created_at)) : '' }}</td>
                                    <td style="text-align:center">{{ $rfq->requirement  }}</td>
                                    <td style="text-align:center">{{ $rfq->status  }}</td>
                                    <!--<td style="text-align:center">-</td>-->
                                    <td class="ps-table-action">
                                        <a href="javascript:void(0)" onclick="assignRfqId({{$rfq->id}})"  data-toggle="modal" data-target="#changeQuotationStatus"><img src="{{asset('allUsers/frontend/img/table-icon.png')}}"></a>
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


<div class="modal fade" id="changeQuotationStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">submit</button>
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

function assignRfqId(rfq_id){
    $('#rfq_id_for_change_status').val(rfq_id);
}
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