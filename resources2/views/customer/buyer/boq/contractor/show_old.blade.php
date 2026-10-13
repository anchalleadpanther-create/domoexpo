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
        <div class="col-lg-8 offset-lg-2">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12">
                    <h2>Project Detail</h2>
                </div>

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p></p>
                        <div class="ps-section_header2">
                            <div class="ps-section_export ml-4">
                                <a href="" class="ps-btn">See More Categories</a>
                            </div>
                        </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>PRO-00{{ $project->id }}</strong></td>
                                    <td>
                                        <p class="mb-1"><strong>Name:</strong> {{ $project->project_name }}</p>
                                        <p class="mb-1"><strong>Client Name:</strong> {{ $project->client_name }}</p>
                                        <p class="mb-1"><strong>BOQ Type:</strong> {{ $project->boq_type }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-1"><strong>Address:</strong> {{ $project->project_address }}</p>
                                        <p class="mb-1"><strong>City:</strong> {{ $project->project_city ?? '-' }}</p>
                                        <p class="mb-1"><strong>Area:</strong> {{ $project->project_area }}</p>
                                    </td>
                                    <td>
                                        
                                        <p class="mb-1"><strong>BOQ Deadline:</strong> {{ $project->boq_deadline }}</p>
                                        <p class="mb-1"><strong>Validity Date:</strong> {{ $project->validity_date }}</p>
                                        <p class="mb-1">Created At : {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y, h:i A') }}</p>
                                    </td>
                                   
                                </tr>
                                
                                <!--Reference Documents -->
                                <tr>
                                    <td colspan="2"  class="text-center">
                                        <strong>Reference Documents : </strong>
                                    </td>
                                  
                                    <td  colspan="2" class="text-center">
                                       <a href="" class="btn btn-success"><strong><i class="fa fa-download"></i> Document 1</strong> </a>
                                       <a href="" class="btn btn-success"><strong><i class="fa fa-download"></i> Document 2</strong> </a>
                                       <a href="" class="btn btn-success"><strong><i class="fa fa-download"></i> Document 3</strong> </a>
                                       <a href="" class="btn btn-success"><strong><i class="fa fa-download"></i> Document 4</strong> </a>
                                    </td>
                                </tr>
                                
                                <!--BOQ Details:-->
                                <tr>
                                    <td colspan="4"  class="text-center"><p class="text-danger mt-3 "><strong> BOQ Details:</strong></p></td>
                                </tr>
                                
                                <!--Category Item Detail-->
                                <tr>
                                    <td colspan="4"  class=""><p class=" mt-2 ">Category 1 : <strong><span class="text-success"> Aluminium </span></strong></p></td>
                                </tr>
                                
                                <tr>
                                    <th>Project ID</th>
                                    <th>Project Detail</th>
                                    <th>Project Address</th>
                                    <th>Project Dates</th>
                                </tr>
                            
                                <tr>
                                    <td><strong>PRO-00{{ $project->id }}</strong></td>
                                    <td>
                                        <p class="mb-1"><strong>Name:</strong> {{ $project->project_name }}</p>
                                        <p class="mb-1"><strong>Client Name:</strong> {{ $project->client_name }}</p>
                                        <p class="mb-1"><strong>BOQ Type:</strong> {{ $project->boq_type }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-1"><strong>Address:</strong> {{ $project->project_address }}</p>
                                        <p class="mb-1"><strong>City:</strong> {{ $project->project_city ?? '-' }}</p>
                                        <p class="mb-1"><strong>Area:</strong> {{ $project->project_area }}</p>
                                    </td>
                                    <td>
                                        
                                        <p class="mb-1"><strong>BOQ Deadline:</strong> {{ $project->boq_deadline }}</p>
                                        <p class="mb-1"><strong>Validity Date:</strong> {{ $project->validity_date }}</p>
                                        <p class="mb-1">Created At : {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y, h:i A') }}</p>
                                    </td>
                                   
                                </tr>
                              
                       
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

@endsection




