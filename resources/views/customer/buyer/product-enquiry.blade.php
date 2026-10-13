@extends('customer.partials-fn.buyer.header')
@section('content')
<script src="https://littletags.webkype.co/allUsers/axios.js"></script>
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
        <div class="col-lg-9 offset-lg-2">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12">
                    <h2>Product Enquiry</h2>
                    
                </div>
                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <!--<p><b>Total Records : {{count(Auth::guard('buyer')->user()->addresses)}}</b></p>-->
                        
                    </div>
                </section>
                
                <div class="ps-section__content p-0">
                    <div class="table-responsive">
                        <table class="table ps-table--responsive account__table table-bordered" id="products-table">
                            <thead>
                                <tr>
                                    <th style="width:10%;">S No</th>
                                    <th  style="text-align:center;width:10%;">Image</th>
                                    <th style="width:25%;">Product Detail</th>
                                    <th style="width:25%;">User Detail</th>
                                    <th style="text-align:center;width:30%;">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Data loaded dynamically via DataTables --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap4.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    $('#products-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('buyer.product-enquiry') }}",
    columns: [
        { data: 'id', name: 'id' },
        { data: 'image', name: 'image', orderable: false, searchable: false },
        { data: 'product_detail', name: 'product_detail' },
        { data: 'user_detail', name: 'user_detail' },
        { data: 'message', name: 'message' },
    ]
});

</script>


<!-- Main Container -->
@endsection













