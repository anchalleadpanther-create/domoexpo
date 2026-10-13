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
                    <h2>Proposed QS For BOQ</h2>
                    <p>Information about your current plan and usages</p>
                </div>

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p><b>Total Records : {{count($mappedQs)}} </b></p>
                        <div class="ps-section_header2">
                            
                            <div class="ps-section_export ml-4">
                                
                            </div>
                        </div>
                    </div>
                </section> 

              

                <div class="ps-section__content p-0">
                    <div class="table-responsive">
                        
                        <table class="table table-bordered table-hover table-striped table-responsive-sm" id="products-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Architect Info</th>
                                    <th> Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mappedQs as $qs)
                                
                                    <tr style="@if( $qs->status == 'Payment Done') background:#e4ebfe; @endif">
                                        
                                        <td>
                                            <p class="mb-1"><strong>Id:</strong> {{ $qs->qs->id ?? '' }}</p>
                                            <p class="mb-1"><strong>Name:</strong> {{ $qs->qs->first_name ?? '' }}  {{ $qs->qs->last_name ?? '' }}</p>
                                        </td>
                                        <td>
                                            
                                           <p class="mb-1"><strong>Status:</strong> {{ $qs->status ?? 'Pending' }}  @if($qs->status  != 'Pending') by {{ $qs->status_changed_by ?? 'Developer' }} @endif</p>
                                           @if($qs->status  == 'Proposal')<p class="mb-1"><strong>Amount:</strong> {{ $qs->amount  }} </p> @endif
                                           @if($qs->status  == 'Payment Done')
                                            <p class="mb-1"><strong>Amount:</strong> {{ $qs->amount ?? 0  }} </p>
                                            <p class="mb-1"><strong>Transaction Date:</strong> {{ $qs->transaction_date ?? ''  }} </p>
                                            <p class="mb-1"><strong>Transaction Id:</strong> {{ $qs->transaction_id ?? ''  }} </p>
                                           
                                           @endif
                                        </td>
                                        <td>
                                            @if( $qs->status != 'Payment Done') 
                                            <a  href="javascript:void(0)" class="btn btn-md btn-success mb-1 open-qs-modal" data-toggle="modal" data-target="#architectStatusModal" 
                                                data-boq-id="{{$qs->boq_id}}" data-qs-id="{{$qs->qs->id}}"><i class="fa fa-pencil"></i>
                                            </a>
                                            @endif
                                            @if( $qs->status == 'Payment Done') 
                                            <a  href="{{route('buyer.qs-project-quantity', [$qs->qs->id,$qs->boq_id])}}" class="btn btn-md btn-danger mb-1 open-qs-modal"  data-qs-id="{{$qs->qs->id}}"><i class="fa fa-eye"></i></a>
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
                                    <option value="Proposal">Accept</option>
                                    <!--<option value="Accepted">Accept</option>-->
                                    <option value="Rejected">Reject</option>
                                    @endif
                                    @if(auth()->user()->account_type == 'Architect')
                                    <option value="Payment Done">Accept</option>
                                    <option value="Cancelled">Cancel</option>
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
    console.log('BOQ ID:', boqId);
    console.log('Architect ID:', qsId);
});
});



</script>


@endsection