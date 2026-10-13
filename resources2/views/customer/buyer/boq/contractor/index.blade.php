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
        <div class="col-lg-9 offset-lg-3">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12">
                    <h2>Projects</h2>
                    <p>Information about your current plan and usages</p>
                </div>

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p><b>Total Records : {{ $totalProjects ?? 0}} </b></p>
                        <div class="ps-section_header2">
                            
                            
                        </div>
                    </div>
                </section> 

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <form action="{{route('buyer.buyer-rfq')}}" method="get" class=" w-100">
                            <div class="ps-section_header2 w-100">
                                <input class="form-control  w-50 " type="text" id="search" name="search" placeholder="Search Project ID and Description ">
                                <button type="submit" class="ps-btn ml-3" id="filter-submit">Search</button>
                                <a href="{{route('buyer.buyer-rfq')}}" class="ps-btn ps-btn-black ml-3" id="clear-filters"> Reset</a>
                            </div>
                        </form>
                    </div>
                </section>

                <div class="ps-section__content p-0">
                    <div class="table-responsive">


                        <table class="table table-bordered table-hover table-striped table-responsive-sm" id="products-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Project ID</th>
                                    <th>Project Detail</th>
                                    <th>Project Address</th>
                                    <th>Project Dates</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse($projects as $project)
                                <tr>
                                    <td><strong>PRO-00{{ $project->id }}</strong></td>
                                    
                                    
                                    
                                    <td>
                                        <p class="mb-1"><strong>Name:</strong> {{ $project->project_name }}</p>
                                        <p class="mb-1"><strong>Client Name:</strong> {{ $project->client_name }}</p>
                                        <p class="mb-1"><strong>BOQ Type:</strong> {{ $project->boq_type }}</p>
                                        <p class="mb-1"><strong>Total Categories:</strong> {{ count($project->getBoqMainItem) ?? 0 }}</p>
                                        @php
                                            $totalSubItemAmount = $project->getBoqMainItem->flatMap(function($mainItem) {
                                                return $mainItem->getSubItem;
                                            })->sum('amount');
                                        @endphp
                                        
                                        <p><strong>Total Project SubItem Amount: </strong> {{ $totalSubItemAmount }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-1"><strong>Address:</strong> {{ $project->project_address }}</p>
                                        <p class="mb-1"><strong>City:</strong> {{ $project->projectCity?->name ?? '-' }}</p>
                                        <p class="mb-1"><strong>Area:</strong> {{ $project->projectArea?->name ?? '' }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-1"><strong>BOQ Deadline:</strong> {{ $project->boq_deadline }}</p>
                                        <p class="mb-1"><strong>Validity Date:</strong> {{ $project->validity_date }}</p>
                                        <p class="mb-1"><strong>Status</strong> <span class="badge badge-info my-2">{{$project->getContractorStatus(auth()->id())}}</span></p>
                                        <p class="mb-1">Created At : {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y, h:i A') }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('buyer.project-detail',[$project->id]) }}" class="btn btn-primary my-2">Go To Detail</a><br>
                                        <a class="btn btn-md btn-success my-1" href="{{ route('buyer.project-detail-pdf', [$project->id]) }}" target="_blank">Download PDF</a><br>
                                        @if($project->getContractorStatus(auth()->id()) == 'Accepted')
                                            <a href="{{ route('buyer.supplier-quotation-on-boq',[$project->id]) }}" class="btn btn-info my-2">Supplier Quotations</a><br>
                                            <br>
                                        @else
                                            @if($project->getContractorStatus(auth()->id()) == 'New Project' || $project->getContractorStatus(auth()->id()) == 'Not Sure')
                                             <a href="javascript:void(0)" onclick="setProjectData({{$project->id}})" data-toggle="modal" data-target="#projectAcceptanceModal" class="btn btn-danger my-2">
                                                  {{$project->getContractorStatus(auth()->id()) ?? 'New Project'}}</a><br>
                                            @endif
                                        @endif
                                        
                                       {{-- @if(count(getRevisedBOQProjects($project->id)) > 0)
                                            <br><a class="btn btn-sm btn-warning toggle-revised text-white mb-1 py-2 px-2"  href="javascript:void(0)" data-id="{{ $project->id }}">
                                                <i class="fa fa-plus-circle" style="font-size:14px;" aria-hidden="true"></i>History Records</a>
                                        @endif
                                        --}}
                                        
                                    </td>
                                </tr>
                                {{-- @if(count(getRevisedBOQProjects($project->id)) > 0)
                                <!-- Hidden Row for Revised Projects -->
                                <tr class="revised-row" id="revised-{{ $project->id }}">
                                    <td colspan="5">
                                        
                                        <div class="slide-content">
                                            <table class="table table-sm table-bordered mb-0" style="background:#fff1d0;">
                                                <thead class="thead-light"  style="background:#fff1d0;">
                                                    <tr>
                                                        <th><strong>Project ID</strong></th>
                                                        <th><strong>Project Detail</strong></th>
                                                        <th><strong>Project Address</strong></th>
                                                        <th><strong>Project Dates</strong></th>
                                                        <th width="10%"><strong>Status</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @foreach(getRevisedBOQProjects($project->id) as $project)
                                                    <tr>
                                                        <td><strong>PRO-00{{ $project->boq_id_counter }}</strong></td>
                                                        <td>
                                                            <p class="mb-1"><strong>Name:</strong> {{ $project->project_name }}</p>
                                                            <p class="mb-1"><strong>Client Name:</strong> {{ $project->client_name }}</p>
                                                            <p class="mb-1"><strong>BOQ Type:</strong> {{ $project->boq_type }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1"><strong>Address:</strong> {{ $project->project_address }}</p>
                                                            <p class="mb-1"><strong>City:</strong> {{ $project->projectCity?->name ?? '-' }}</p>
                                                            <p class="mb-1"><strong>Area:</strong> {{ $project->projectArea?->name ?? '' }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1"><strong>BOQ Deadline:</strong> {{ $project->boq_deadline }}</p>
                                                            <p class="mb-1"><strong>Validity Date:</strong> {{ $project->validity_date }}</p>
                                                            <p class="mb-1">Created At: {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y, h:i A') }}</p>
                                                             <p class="mb-1">Status:
                                                                <a class="btn btn-md {{$project->status == 'On Going' ? 'btn-success' : 'btn-primary' }} mb-1" href="javascript:void(0)">{{ $project->status }}</a>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-md btn-success mb-1" href="{{ route('buyer.project-preview', [$project->id]) }}">Go to Preview</a>
                                                            
                                            
                                                            @if($project->is_form_filled == 0)
                                                                <a class="btn btn-md btn-danger mb-1" href="{{ route('buyer.edit-boq', [$project->id]) }}">Complete Your Form</a>
                                                            @endif
                                                            
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                 
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                    </td>
                                </tr>
                                @endif --}}
                                
                                @empty
                                
                                <tr>
                                    <td colspan="5" class="text-center">No data found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>



                    </div>
                  {{ $projects->links('pagination::customer-custom-paginate') }}

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="projectAcceptanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project Acceptance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('buyer.accept-boq-by-contractor')}}" method="post">
                @csrf
                <input type="hidden" name="boq_id" id="boq_id_for_change_status">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12" >
                            <select class="form-select" name="status">
                                <option value="Accepted">Accepted</option>
                                <option value="Declined">Declined</option>
                                <option value="Not Sure">Not Sure</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn ps-btn ml-3" data-dismiss="modal">Close</button>-->
                    <button type="submit" class="btn ps-btn ml-3">submit</button>
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
document.querySelectorAll('.toggle-revised').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const row = document.getElementById('revised-' + id);
        row.classList.toggle('show');
    });
});
</script>

<script>

    function setProjectData(boq_id){
        $('#boq_id_for_change_status').val('');
        $('#boq_id_for_change_status').val(boq_id);
    }
    
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