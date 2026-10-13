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
                    <h2>Projects</h2>
                    <p>Information about your current plan and usages</p>
                </div>

                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p><b>Total Records : {{count($projects)}} </b></p>
                        <div class="ps-section_header2">
                            
                            <div class="ps-section_export ml-4">
                                <!--<a href="{{route('buyer.buyer-create-rfq',['rfq-detail'])}}" class="ps-btn">-->
                                <!--  Create RFQ-->
                                <!--</a>-->
                                @if(auth()->user()->account_type == 'Quantity Surveyor')
                                    <a href="{{ route('buyer.boq-templates') }}" class="ps-btn">
                                      My Templates
                                    </a>
                                @else
                                    <a href="{{route('buyer.create-boq')}}" class="ps-btn">
                                      Create Project
                                    </a>
                                    @if(auth()->user()->account_type == 'Architect')
                                    <a href="{{ route('buyer.boq-templates') }}" class="ps-btn ml-2">
                                      My Templates
                                    </a>
                                    @endif
                                @endif
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
                                    <th>Project ID</th>
                                    <th>Project Detail</th>
                                    <th>Other Info</th>
                                    <th>Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr   style="background:@if($project->created_by == 'Developer') #e4ebfe; @endif">
                                    <td><strong>PRO-00{{ $project->id }}</strong></td>
                                    <td>
                                        <p class="mb-1"><strong>Name:</strong> {{ $project->project_name }}</p>
                                        <p class="mb-1"><strong>Client Name:</strong> {{ $project->client_name }}</p>
                                        <p class="mb-1"><strong>BOQ Type:</strong> {{ $project->boq_type }}</p>
                                        @if((auth()->user()->account_type == 'Architect' || auth()->user()->account_type == 'Developer') && $project->developer_amount > 0)
                                        <p class="mb-0"><strong>Developer Amount: </strong> {{ number_format($project->developer_amount ?? 0, 2, '.', ',') }}</p>
                                        @endif
                                        
                                         <p class="mb-1"><strong>Total Categories:</strong> {{ count($project->getBoqMainItem) ?? 0 }}</p>
                                        @php
                                            $totalSubItemAmount = $project->getBoqMainItem->flatMap(function($mainItem) {
                                                return $mainItem->getSubItem;
                                            })->sum('amount');
                                        @endphp
                                        
                                        <p><strong>Total Project Sub Item Amount: </strong> {{ $totalSubItemAmount }}</p>
                                        @if(auth()->user()->account_type == 'Developer' || auth()->user()->account_type == 'Architect')
                                            <p><a href="javascript:void(0)" class="btn btn-info open-project-modal" data-toggle="modal" data-target="#projectNeedModal" data-project-need="{{is_array($project->project_need) ? implode(' | ',$project->project_need) : ''}}">Project Need</a> </p>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="mb-1"><strong>Address:</strong> {{ $project->project_address }}</p>
                                        <p class="mb-1"><strong>City:</strong> {{ $project->projectCity?->name ?? '-' }}</p>
                                        <p class="mb-1"><strong>Area:</strong> {{ $project->projectArea?->name ?? '' }}</p>
                                        
                                        <hr>
                                        
                                        <p class="mb-1"><strong>BOQ Deadline:</strong> {{ $project->boq_deadline }}</p>
                                        <p class="mb-1"><strong>Validity Date:</strong> {{ $project->validity_date }}</p>
                                        <p class="mb-1"><strong>Created By:</strong> <span class="text-dark"> {{ $project->boqCreatedBy->fullname ?? '' }} (ID: {{ $project->created_by_user_id }})</span></p>
                                        <p class="mb-1"><strong>Created By:</strong> <span class="text-primary">{{ $project->created_by }}</span></p>
                                        <p class="mb-1">Created At: {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y, h:i A') }}</p>
                                        
                                    </td>
                                    <td>
                                        <p class="mb-1"><strong>Project Status:</strong> {{ $project->status }}</p>
                                        
                                        
                                        @if(auth()->user()->account_type == 'Quantity Surveyor')
                                            <p class="mb-1">QS Status:
                                               {{ $project->mappedQuantitySurveyor()->where('quantity_surveyor_id',auth()->user()->id)->first()->status ?? 'Pending' }}
                                               
                                               @if($project->mappedQuantitySurveyor()->where('quantity_surveyor_id',auth()->user()->id)->first()->status != 'Payment Done')
                                                <a class="btn btn-md btn-success mb-1 open-qs-modal" data-toggle="modal" data-target="#qsStatusModal" data-qs-id="{{auth()->user()->id}}" data-boq-id="{{$project->id}}" href="javascript:void(0)"><i class="fa fa-pencil"></i></a>
                                               @endif
                                            </p>
                                            
                                        @elseif(auth()->user()->account_type == 'Architect')
                                        
                                            <hr>
                                            @if($project->created_by == 'Developer')
                                            
                                                <p class="mb-1">
                                                    <strong>Developer Status: </strong>{{ $project->mappedArchitect()->where('architect_id',auth()->user()->id)->first()->status ?? 'Pending' }}
                                                    @if(in_array($project->mappedArchitect()->where('architect_id',auth()->user()->id)->first()->status,['Pending','Proposal']))
                                                    <a class="btn btn-md btn-success mb-1 open-architect-modal" data-toggle="modal" data-target="#architectStatusModal" data-boq-id="{{$project->id}}" data-architect-id="{{auth()->user()->id}}" href="javascript:void(0)"><i class="fa fa-pencil"></i></a>
                                                    @endif
                                                </p>
                                            
                                            @endif
                                            
                                            @isset($project->mappedArchitect()->where('architect_id',auth()->user()->id)->first()->status_changed_by)
                                            <p class="mb-1"><strong>Status changed By:</strong>
                                               {{ $project->mappedArchitect()->where('architect_id',auth()->user()->id)->first()->status_changed_by ?? 'Developer' }}
                                            </p>
                                            @endisset
                                            
                                            
                                        @elseif(auth()->user()->account_type == 'Developer')
                                            
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-md btn-success mb-1" href="{{ route('buyer.project-preview', [$project->id]) }}">Go to Preview</a>
                                        
                                         @if(auth()->user()->account_type == 'Quantity Surveyor' )
                                            @if($project->mappedQuantitySurveyor()->where('quantity_surveyor_id',auth()->user()->id)->first()->status == 'Payment Done')
                                            <a class="btn btn-md btn-danger mb-1" href="{{ route('buyer.add-project-quantity', [$project->id]) }}" >Add/View Project Quantity</a>
                                            @endif
                                         @endif
                                            @if(auth()->user()->account_type == 'Architect')
                                                @if(!in_array($project->status,['Pending','Sent To Architects']))
                                                
                                                    @if($project->is_form_filled == 0 && $project->status != 'Assign To Architect') 
                                                        <a class="btn btn-md btn-danger mb-1" href="{{ route('buyer.edit-boq', [$project->id]) }}">Complete Your Form</a>
                                                    @else
                                                       
                                                        @if($project->status == 'Assign To Architect')
                                                            <a class="btn btn-sm btn-info mb-1" href="{{ route('buyer.change-boq-status',[$project->id,'Architect Start Wroking']) }}">Start Working</a><br>
                                                        @endif
                                                       
                                                            <a class="btn btn-sm btn-info mb-1" href="{{ route('buyer.create-revised-project',[$project->id]) }}">Revised Project</a><br>
                                                        @if(count(getRevisedBOQProjects($project->id)) > 0)
                                                            <!-- Toggle Button -->
                                                           <a class="btn btn-sm btn-warning toggle-revised text-white mb-1 py-2 px-2"  href="javascript:void(0)" data-id="{{ $project->id }}">
                                                            <i class="fa fa-plus-circle" style="font-size:14px;" aria-hidden="true"></i>History Records</a> <br>
                                                        @endif
                                                        
                                                         @if(!empty($project->mappedContractorForWork))
                                                        @if(count($project->mappedContractorForWork) > 0)
                                                        <a class="btn btn-sm btn-danger toggle-revised text-white mb-1 py-2 px-2"  href="{{route('buyer.contractor-quotations',[$project->id])}}">
                                                            <i class="fa fa-plus-circle" style="font-size:14px;" aria-hidden="true"></i> Contractor Quotations ({{count($project->mappedContractorForWork)}})</a> <br>   
                                                        @endif
                                                        @endif
                                                        
                                                    @endif
                                                
                                                @endif
                                                
                                                @if(count($project->mappedQuantitySurveyor) > 0)
                                                    <a class="btn btn-md btn-success mb-1" href="{{ route('buyer.proposed-qs-for-boq', [$project->id]) }}" target="_blank">Proposed QS </a>
                                                @endif
                                                
                                                <a class="btn btn-md btn-success mb-1" href="{{ route('buyer.project-detail-pdf', [$project->id]) }}" target="_blank">Download PDF</a>  <br>
                                            @endif
                                        
                                       
                                        
                                        @if(auth()->user()->account_type == 'Developer')
                                            @if($project->is_form_filled_developer == 0) 
                                                <a class="btn btn-md btn-danger mb-1" href="{{ route('buyer.edit-boq', [$project->id]) }}">Complete Your Form</a>
                                            @endif
                                            @if(count($project->mappedArchitect) > 0)
                                            <a class="btn btn-md btn-success mb-1" href="{{ route('buyer.proposed-architect-for-boq', [$project->id]) }}" target="_blank">Proposed Architects </a>
                                            @endif
                                        @endif
                                        
                                        @if(auth()->user()->account_type == 'Architect' && $project->created_by == 'Developer')
                                        <a class="btn btn-md btn-success mb-1" href="{{ route('buyer.user-shared-document') }}?boq_id={{$project->id}}&receiver_id={{$project->created_by_user_id}}&receiver_type={{$project->created_by}}" target="_blank"> Send Document </a>
                                        @endif

                                        @if(auth()->user()->account_type == 'Architect' && !empty($project->mappedContractorForWork) && count($project->mappedContractorForWork) > 0)
                                        <a class="btn btn-md btn-success mb-1" href="{{ route('buyer.contractor-quotations', [$project->id]) }}" target="_blank"> Send Document To Contractor </a>
                                        @endif
                                        
                                        
                                    </td>
                                </tr>
                        
                            @if(count(getRevisedBOQProjects($project->id)) > 0)
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
                                                            @else
                                                                <a class="btn btn-md btn-success mb-1" href="{{ route('buyer.project-detail-pdf', [$project->id]) }}" target="_blank">Download PDF</a>
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
                            @endif
                            
                            
                        @endforeach
                            </tbody>
                        </table>



                        {{--<table class="table table-bordered table-hover table-striped table-responsive-sm" id="products-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Project ID</th>
                                    <th>Project Detail</th>
                                    <th>Project Address</th>
                                    <th>Project Dates</th>
                                    <th width="10%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
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
                                    <td>
                                        @if($project->status == 'On Going')
                                            <a class="btn btn-md btn-success mb-1" href="javascript:void(0)">{{ $project->status ?? '' }}</a>
                                        @else
                                            <a class="btn btn-md btn-warning mb-1" href="javascript:void(0)">{{ $project->status ?? '' }}</a>
                                        @endif
                                        
                                        @if($project->is_form_filled == 0)
                                            <a class="btn btn-md btn-danger mb-1" href="{{route('buyer.edit-boq',[$project->id])}}">Compelete Your Form</a>
                                        @endif
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td colspan="5">
                                    
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>4</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> --}}



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
                <input type="hidden" name="rfq_id">
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

<!--Architect and QS Status Modal-->
<div class="modal fade" id="qsStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <input type="hidden" name="boq_id" id="qs_boq_id">
                <input type="hidden" name="qs_id" id="qs_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-select" name="status" id="qsStatusForDeveloper">
                                    <!--Pending,Accepted,Rejected,Cancelled,Payment	-->
                                    @if(auth()->user()->account_type == 'Quantity Surveyor')
                                    <option value="">choose</option>
                                    <!--<option value="Proposal">Proposal</option>-->
                                    <option value="Accepted">Accept</option>
                                    <option value="Rejected">Reject</option>
                                    @endif
                                    @if(auth()->user()->account_type == 'Architect')
                                    <option value="Cancelled">Cancel</option>
                                    <option value="Payment Done">Payment Done</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 d-none architect_proposal_amount_div">
                                <div class="form-group">
                                    <label>Proposal Amount</label>
                                    <input type="number" min="0" name="amount" value="" class="form-control" >
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
<!--End of QS Status Modal-->


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
            <form action="{{route('buyer.acceptance-status-by-architect-developer')}}" method="post">
                @csrf
                <input type="hidden" name="boq_id" id="boq_id">
                <input type="hidden" name="architect_id" id="architect_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Choose Status</label>
                                <select class="form-select" name="status" id="architectStatusForDeveloper">
                                    <!--Pending,Accepted,Rejected,Cancelled,Payment	-->
                                    @if(auth()->user()->account_type == 'Architect')
                                    <option value="">choose</option>
                                    <!--<option value="Proposal">Proposal</option>-->
                                    
                                    <option value="Rejected">Reject</option>
                                    <option value="Proposal">Accept</option>
                                    @endif
                                    @if(auth()->user()->account_type == 'Developer')
                                    <option value="Cancelled">Cancel</option>
                                    <option value="Payment Done">Payment Done</option>
                                    @endif
                                </select>
                            </div>
                            
                            <div class="col-lg-12 d-none developer_proposal_amount_div">
                                <div class="form-group">
                                    <label>Proposal Amount</label>
                                    <input type="number" min="0" name="amount" value="" class="form-control" >
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



<!--Project Need Modal-->
<div class="modal fade" id="projectNeedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project Need By Developer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="projectNeedContent"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn ps-btn ml-3" data-dismiss="modal">Close</button>
                </div>
            
        </div>
    </div>
</div>
<!--End of Project Need Modal-->








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
    
    
    
    $(document).on('click','.open-project-modal',function(){
        var projectNeed = $(this).data('project-need');
        console.log(projectNeed);
        $('#projectNeedContent').text(projectNeed);
        
    });
    
    
    
    // Initialize Select2 (if not already done)
    $('#architectStatusForDeveloper').select2();

    // Listen for change event on the Select2-enhanced select
    $('#architectStatusForDeveloper').on('change', function() {
        const status = $(this).val();
        architectStatusForDeveloper(status);
    });

    function architectStatusForDeveloper(status) {
        console.log("Selected status:", status);
        if (status === 'Proposal') {
            $('.developer_proposal_amount_div').removeClass('d-none');
        } else {
            $('.developer_proposal_amount_div').addClass('d-none');
        }
    }
    
    
    $(document).on('click', '.open-architect-modal', function () {
        var boqId = $(this).data('boq-id');
        var architectId = $(this).data('architect-id');
    
        // Set the values into the hidden fields
        $('#boq_id').val(boqId);
        $('#architect_id').val(architectId);
    
        // Optional: Log to console to verify
        // console.log('BOQ ID:', boqId);
        // console.log('Architect ID:', architectId);
    });
});


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
        if (status === 'Proposal') {
            $('.architect_proposal_amount_div').removeClass('d-none');
        } else {
            $('.architect_proposal_amount_div').addClass('d-none');
        }
    }
    
    
    $(document).on('click', '.open-qs-modal', function () {
        var boqId = $(this).data('boq-id');
        var qsId = $(this).data('qs-id');
    
        // Set the values into the hidden fields
        $('#qs_boq_id').val(boqId);
        $('#qs_id').val(qsId);
    
        // // Optional: Log to console to verify
        // console.log('BOQ ID:', boqId);
        // console.log('Architect ID:', qsId);
    });
});





</script>







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