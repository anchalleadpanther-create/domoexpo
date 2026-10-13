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
                    <h2>Contractor Quotation</h2>
                    <p>Information about your current plan and usages</p>
                </div>

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p><b>Total Records : {{count($contractorAcceptations)}} </b></p>
                        <div class="ps-section_header2">
                            
                            <div class="ps-section_export ml-4">
                            </div>
                        </div>
                    </div>
                </section> 

                <!--<section class="ps-store-box col-sm-12">-->
                <!--    <div class="ps-section__header">-->
                <!--        <form action="{{route('buyer.buyer-rfq')}}" method="get" class=" w-100">-->
                <!--            <div class="ps-section_header2 w-100">-->
                <!--                <input class="form-control  w-50 " type="text" id="search" name="search" placeholder="Search Project ID and Description ">-->
                <!--                <button type="submit" class="ps-btn ml-3" id="filter-submit">Search</button>-->
                <!--                <a href="{{route('buyer.buyer-rfq')}}" class="ps-btn ps-btn-black ml-3" id="clear-filters"> Reset</a>-->
                <!--            </div>-->
                <!--        </form>-->
                <!--    </div>-->
                <!--</section>-->

                <div class="ps-section__content p-0">
                    <div class="table-responsive">
                        
                        <table class="table table-bordered table-hover table-striped table-responsive-sm" id="products-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Contractor Info</th>
                                    <th> Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contractorAcceptations as $contractor)
                                
                                    <tr style="@if( $contractor->status == 'Payment Done') background:#e4ebfe; @endif">
                                        
                                        <td>
                                            <p class="mb-1"><strong>Id:</strong> {{ $contractor->id ?? '' }}</p>
                                            <p class="mb-1"><strong>Name:</strong> {{ $contractor->contractor->first_name ?? '' }} {{ $contractor->contractor->last_name ?? '' }}</p>
                                            
                                        </td>
                                        
                                        <td>
                                            <p class="mb-1">{{ $contractor->status ?? '' }}</p> 
                                        </td>
                                        
                                        <td>
                                            @if( $contractor->status == 'Acceptedd') 
                                            <a  href="javascript:void(0)" class="btn btn-md btn-success mb-1 open-qs-modal" data-toggle="modal" data-target="#architectStatusModal" 
                                                data-boq-id="{{$contractor->boq_id}}" data-qs-id="{{$contractor->id}}"><i class="fa fa-pencil"></i>
                                            </a>
                                           @endif
                                            @if( $contractor->status == 'Accepted') 
                                            <a  href="{{route('buyer.contractor-quotation-detail', [$contractor->boq_id,$contractor->contractor_id])}}" class="btn btn-md btn-danger mb-1 open-qs-modal"  data-qs-id="{{$contractor->id}}"><i class="fa fa-eye"></i></a>
                                            @endif
                                            
                                            {{-- <a  href="javascript:void(0)" class="btn btn-md btn-success mb-1 open-sent-document-modal" data-toggle="modal" data-target="#sentDocumentModal" 
                                                data-boq-id="{{$contractor->boq_id}}" data-receiver-type="Contractor" data-receiver-id="{{$contractor->contractor_id}}">Send Document</i>
                                            </a> --}}
                                            <a class="btn btn-md btn-info mb-1" href="{{ route('buyer.user-shared-document') }}?boq_id={{ $contractor->boq_id }}&receiver_id={{ $contractor->contractor_id }}&receiver_type=Contractor" target="_blank">Project Documents</a>
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

<!--Architect and Developer Status Modal-->
<div class="modal fade" id="architectStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quotation Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('buyer.acceptance-status-by-qs-architect')}}" method="post">
                @csrf
                <input type="hidden" name="boq_id" id="boq_id">
                <input type="hidden" name="qs_id" id="qs_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Choose Status</label>
                                <select class="form-select" name="status" id="qsStatusForDeveloper">
                                    <!--Pending,Accepted,Rejected,Cancelled,Payment	-->
                                    <!--Pending,Accepted,Rejected,Cancelled,Payment	-->
                                    @if(auth()->user()->account_type == 'Quantity Surveyor')
                                    <option value="">choose</option>
                                    <option value="Proposal">Proposal</option>
                                    <option value="Accepted">Accept</option>
                                    <option value="Rejected">Reject</option>
                                    @endif
                                    @if(auth()->user()->account_type == 'Architect')
                                    <option value="Cancelled">Cancel</option>
                                    <option value="Payment Done">Payment Done</option>
                                    @endif
                                </select>
                            </div>
                            
                            <div class="col-lg-12 d-none hideDiv developer_proposal_amount_div">
                                <div class="form-group">
                                    <label>Proposal Amount</label>
                                    <input type="number" min="0" name="amount" value="" class="form-control" >
                                </div>
                            </div>
                            
                            <div class="col-lg-12 d-none hideDiv developer_proposal_trans_id_div">
                                <div class="form-group">
                                    <label>Transaction Id</label>
                                    <input type="text" min="0" name="transaction_id" value="" class="form-control" >
                                </div>
                            </div>
                            
                            <div class="col-lg-12 d-none hideDiv developer_proposal_trans_date_div">
                                <div class="form-group">
                                    <label>Transaction Date</label>
                                    <input type="date" min="0" name="transaction_date" value="" class="form-control" >
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn ps-btn ml-3" data-dismiss="modal">Close</button>-->
                    <button type="submit" class="btn btn-success">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End of Architect Status Modal-->




<!--Sent Document Modal Modal-->
<div class="modal fade" id="sentDocumentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quotation Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('buyer.save-user-shared-document')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="boq_id" id="boq_id" value="{{request()->segment(3)}}">
                <input type="hidden" name="receiver_id" value="" id="receiver_id">
                <input type="hidden" name="receiver_type" value="" id="receiver_type">
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Document</label>
                                    <input type="file" name="document_file" accept="image/*,.pdf" class="form-control">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn ps-btn ml-3" data-dismiss="modal">Close</button>-->
                    <button type="submit" class="btn btn-success">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End of Sent Document Modal Modal-->











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
    $(document).ready(function(){
        $(document).on('click','.open-sent-document-modal',function(){
            let receiver_type   = $(this).data('receiver-type');
            let receiver_id     = $(this).data('receiver-id');
            
            $('#receiver_type').val(receiver_type);
            $('#receiver_id').val(receiver_id);
        });
    });
       
</script>


<script>
$(document).ready(function() {
    // Initialize Select2 (if not already done)
    $('#qsStatusForDeveloper').select2();

    // Listen for change event on the Select2-enhanced select
    $('#qsStatusForDeveloper').on('change', function() {
        const status = $(this).val();
        qsStatusForDeveloper(status);
    });

    function qsStatusForDeveloper(status) {
        console.log("Selected status:", status);
        $('.hideDiv').addClass('d-none');
        if (status === 'Proposal') {
            $('.developer_proposal_amount_div').removeClass('d-none');
        }else if(status == 'Payment Done'){
             $('.developer_proposal_trans_id_div').removeClass('d-none');
             $('.developer_proposal_trans_date_div').removeClass('d-none');     
        }
    }
    
    
    $(document).on('click', '.open-qs-modal', function () {
    var boqId = $(this).data('boq-id');
    var qsId = $(this).data('qs-id');

    // Set the values into the hidden fields
    $('#boq_id').val(boqId);
    $('#qs_id').val(qsId);

    // Optional: Log to console to verify
    // console.log('BOQ ID:', boqId);
    // console.log('Architect ID:', qsId);
});
});



</script>


@endsection