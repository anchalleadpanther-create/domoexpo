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
                    <h2>Products Listing</h2>
                </div>

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p><b>Total Records : 15</b></p>
                        <div class="ps-section_header2">
                            <!-- <select class="form-control">
                                <option value="1">Select</option>
                            </select> -->
                            <div class="ps-section_export ml-4">
                                <a href="{{route('seller.create-seller-product')}}" class=""><label>Add Single Item </label> </a>
                                <input type="button"><label>Export to excel</label>

                            </div>
                        </div>
                    </div>
                </section>

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <div class="ps-section_header2">
                            <input class="form-control" type="text" id="sku_filter" placeholder="Product SKU Code">
                            <input class="form-control ml-3" type="text" id="search_box" placeholder="Product Name">
                            <a href="javascript:void(0)" class="ps-btn ml-3" id="filter-submit" >Submit</a>
                            <a href="javascript:void(0)" class="ps-btn ps-btn-black ml-3" id="clear-filters"> Clear</a>
                        </div>
                        
                    </div>
                </section>

                <div class="ps-section__content p-0">
                    <div class="table-responsive">
                    

                        <table class="table ps-table--responsive account__table table-bordered" id="products-table">
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Image</th>
                                    <th>Product Detail</th>
                                    <th>Price Detail</th>
                                    <th style="text-align:center">Map Categories</th>
                                    <th style="text-align:center">Date of Upload</th>
                                    <th style="text-align:center">Status</th>
                                    <th>Manage Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Row -->
                                <tr>
                                    <!-- <td>1</td>
                                    <td><img src="{{asset('allUsers/frontend/img/image-icon1.png')}}" alt="" style="width:40px"></td>
                                    <td>SDG-1001</td>
                                    <td>Furnish</td>
                                    <td>Restaurant Table & Chair, Seating Capacity : 4 - 6</td>
                                    <td style="text-align:center">03-04-2024</td>
                                    <td style="text-align:center">restaurant-table-chair</td>
                                    <td style="text-align:center">No</td>
                                    <td style="text-align:center">Pending</td>
                                    <td style="text-align:center">-</td>
                                    <td class="ps-table-action">
                                        <a href=""><img src="{{asset('allUsers/frontend/img/table-icon.png')}}"></a>
                                        <a href="" class="ml-2"><img src="{{asset('allUsers/frontend/img/table-icon2.png')}}"></a>
                                        <a href="" class="ml-2"><img src="{{asset('allUsers/frontend/img/table-icon3.png')}}"></a>
                                        <a href=""><img src="{{asset('allUsers/frontend/img/table-icon4.png')}}"></a>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>

                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Container -->

   
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap4.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


<script>
    $(function() {
        var table = $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,  // Enable responsiveness
            scrollX: true,     // Enable horizontal scrolling
            // dom: 'Bfrtip',
            ajax: {
                url: '{!! route('seller.seller-products') !!}',
                data: function (d) {
                    d.search_box = $('#search_box').val();
                    d.sku_filter = $('#sku_filter').val();
                }
            },
            columns: [
                { data: 'id', name: 'id' ,width: '5%' },
                { data: 'image', name: 'image' ,width: '10%'},
                {
                    data: 'product_detail',
                    name: 'product_detail',
                    render: function(data, type, full, meta) {
                        return '<b>'+full.name +'</b>' +
                        '<br>SKU: ' + full.sku ;
                        
                    },
                    width: '20%'
                },
                {
                    data: 'price_detail',
                    name: 'price_detail',
                    render: function(data, type, full, meta) {
                        return 'MRP: ' + full.rrp + 
                        '<br>Discount: ' + full.discount + 
                        '% <br>Unit Price: ' + full.price_unit;
                        
                    },
                    width: '20%'
                },
                { data: 'category', name: 'category' },
                { data: 'date_of_upload', name: 'date_of_upload' },
                { data: 'status', name: 'status',width: '10%'},
                { data: 'action', name: 'action', className : "text-center", orderable: false, searchable: false , width: '10%'}
            ]
        });

        // Trigger search when button is clicked
        $('#filter-submit').click(function() {
            table.draw();  // Redraw the DataTable with the new search parameters
        });

        // Optionally, trigger search when pressing Enter in the search box
        $('#search_box, #sku_filter').on('keyup', function(e) {
            if (e.keyCode === 13) {
                table.draw();
            }
        });

        $('#clear-filters').click(function() {
                // Reset the filter input fields
                $('#search_box').val('');
                $('#sku_filter').val('');

                // Redraw the DataTable
                table.draw();
            });
    });
</script>
@endsection