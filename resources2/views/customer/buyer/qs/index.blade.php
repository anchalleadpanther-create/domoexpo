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
<style>
.revised-row .slide-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 1s ease;
}

.revised-row.show .slide-content {
    max-height: 1000px; /* or a large enough value */
}
</style>

<!-- Main Container -->
<div class="container product_table--listing">
    <div class="row justify-content-center">
        <div class="col-lg-9 offset-lg-3">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12">
                    <h2>Quantity Surveyor</h2>
                </div>

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p><b>Total Records : {{count($quantitySurveyors)}} </b></p>
                        <div class="ps-section_header2">
                            
                            <div class="ps-section_export ml-4">
                                
                                <a href="{{route('buyer.quantity-surveyor.create')}}" class="ps-btn">
                                  Create QS
                                </a>
                             
                            </div>
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
                                    <th>QS ID</th>
                                    <th>Contact Info</th>
                                    <th> Company Info</th>
                                    <th> Other Info</th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quantitySurveyors as $qs)
                                    <tr>
                                        <td><strong>{{ $qs->id }}</strong></td>
                                        <td>
                                            <p class="mb-1"><strong>Name:</strong> {{ $qs->first_name }} {{ $qs->last_name }}</p>
                                            <p class="mb-1"><strong> Email:</strong> {{ $qs->email }}</p>
                                            <p class="mb-1"><strong>Phone</strong> {{ $qs->phonecode }} {{ $qs->phone }}</p>
                                            
                                        </td>
                                        
                                        <td>
                                            <p class="mb-1"><strong>Company Name:</strong> {{ $qs->company_name }} </p>
                                            <p class="mb-1"><strong>Email:</strong> {{ $qs->company_email }}</p>
                                            <p class="mb-1"><strong>Phone</strong> {{ $qs->telephone_code }} {{ $qs->telephone_no }}</p>     
                                        </td>
                                        
                                        <td>
                                             <p class="mb-1"><strong>Reg. No.:</strong> {{ $qs->registration_no }} </p>
                                             <p class="mb-1"><strong>VAT No.:</strong> {{ $qs->vat_no }}</p>    
                                        </td>
                                        
                                        <td>
                                            <a class="btn btn-md btn-success mb-1" href="">Edit</a>
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




@endsection