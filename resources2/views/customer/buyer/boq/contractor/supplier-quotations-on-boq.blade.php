@extends('customer.partials-fn.buyer.header') 
@section('content')


<div class="container">
    <div class="row justify-content-center">
 
<div class="dot-container  toggleLoader d-none">
  <div class="dots"></div>
</div>


<style>
/* Full-screen container with blurry background */
.dot-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  backdrop-filter: blur(6px);
  background: rgba(255, 255, 255, 0.3);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999; /* on top */
}

/* Dots animation */
.dots {
  width: 3.2px;
  height: 3.2px;
  border-radius: 50%;
  background-color: #131315;
  box-shadow: 15.2px 0 0 5.6px, 30.4px 0 0 2.4px, 45.6px 0 0 0;
  transform: translateX(-30.4px);
  animation: dots-ijr34dsm 0.5s infinite alternate linear;
}


.select2-container--default .select2-selection--single, body .select2 {
    width:100% !important;
}

@keyframes dots-ijr34dsm {
  50% {
    box-shadow: 15.2px 0 0 2.4px, 30.4px 0 0 5.6px, 45.6px 0 0 2.4px;
  }
  100% {
    box-shadow: 15.2px 0 0 0, 30.4px 0 0 2.4px, 45.6px 0 0 5.6px;
  }
}
</style>
   
        <div class="col-lg-9 offset-lg-3">
            <div class="ps-section__right"> 
                <div class="ps-form__header mb-5">
                    <h2>BOQ Request Form</h2>
                </div>

                <div class="ps-my-account">
                    <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important">
                        <ul class="progressbar mb-4">
                            <li class="active">Project Info</li>
                            <li>BOQ Details</li>
                            <!--<li> Reference Documents</li>-->
                        </ul>
                        
                        
                       <!-- Step 1 -->
                            <div class="form-step active">
                                <div id="category-groups-wrapper">
                            
                                    @if(isset($project->getBoqMainItem) && count($project->getBoqMainItem) > 0)
                                        @foreach($project->getBoqMainItem as $mainKey => $mainItem) 
                                        
                                        
                                        
                                        <div class="mb-4">
                                            {{-- Static Category Row with Button --}}
                                            <div class="d-flex justify-content-between align-items-center bg-light p-2 border">
                                                <div>
                                                    <strong>Category {{ $mainKey + 1 }} :</strong>
                                                    <span class="text-success">{{ $mainItem->getCategory?->category_name ?? '' }} ({{count($mainItem->getSubItem) ?? 0}})</span>
                                                </div>
                                                <div>
                                                 
                                                </div>
                                            </div>
                                        
                                            {{-- Scrollable Subcategory Table --}}
                                            <div style="overflow-x: auto;">
                                                <table class="table table-bordered table-striped mb-0" style="min-width: 1500px;">
                                                    <thead class="bg-light">
                                                        <tr class="fw-bold text-nowrap">
                                                            <th>Sub category</th>
                                                            <th>Sub Sub Category</th>
                                                            
                                                            <th>Supplier Quotations</th>
                                                            <th>Description</th>
                                                            <th>Unit</th>
                                                            <th>Qty</th>
                                                            <th>Rate</th>
                                                            <th>Amount</th>
                                                            <th>Reference</th>
                                                            <th class="bg-danger-light">Rate from architect</th>
                                                            <th class="bg-primary-light">Rate to architect + Mark up</th>
                                                            <th class="bg-success-light">Amount</th>
                                                            <th>Contractor Remarks</th>
                                                            <th>View Supplier Rates</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        @foreach($mainItem->getSubItem as $subKey => $subItem)
                                                        
                                                        <tr>
                                                            <td>{{ $subItem->getSubCategory?->category_name ?? 'N/A' }}</td>
                                                            <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
                                                            <td>{{ count($subItem->getSupplierRate) ?? 'N/A' }}</td>
                                                            
                                                            <td>{{ $subItem->description ?? '' }}</td>
                                                            <td>{{ $subItem->unit ?? '' }}</td>
                                                            <td>{{ $subItem->quantity ?? '' }}</td>
                                                            <td>{{ $subItem->rate ?? '' }}</td>
                                                            <td>{{ $subItem->amount ?? '' }}</td>
                                                            <td>
                                                                @if(isset($subItem->reference_file))
                                                                    <a class="text-success" target="_blank" href="{{ asset('uploads/rfq/'.$subItem->attachment_file) }}">
                                                                        <i class="fa fa-download"></i>
                                                                    </a>
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                            <td class="bg-danger-light">{{ $subItem->amount ?? '' }}</td>
                                                            <td class="bg-primary-light">{{ $subItem->getSupplierRate()->where('contractor_id',auth()->id())->where('boq_sub_item_id',$subItem->id)->first()?->total_contractor_rate ??  0 }}</td>
                                                            <td class="bg-success-light">{{ $subItem->getSupplierRate()->where('contractor_id',auth()->id())->where('boq_sub_item_id',$subItem->id)->first()?->total_contractor_rate ??  '' }}</td>
                                                            <td>{{ $subItem->getSupplierRate()->where('contractor_id',auth()->id())->where('boq_sub_item_id',$subItem->id)->first()?->contractor_remark ??  0 }}</td>
                                                            
                                                            @if($mainItem->getCategory?->category_name != 'Contractor Work')
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-md btn-dark " data-toggle="modal" data-target="#supplierRatesModal{{$subItem->id}}">
                                                                    View Supplier Rates
                                                                </button>
                                                                
                                                                
                                                                <!-- Supplier Rate Modal -->
                                                                    <div class="modal fade" id="supplierRatesModal{{$subItem->id}}" tabindex="-1" role="dialog" aria-labelledby="supplierRatesModalLabel" aria-hidden="true">
                                                                      <div class="modal-dialog modal-xl" role="document">
                                                                        <div class="modal-content">
                                                                    
                                                                          <div class="modal-header">
                                                                            <h5 class="modal-title" id="supplierRatesModalLabel">Supplier Rate Details </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                          </div>
                                                                           <form class="markupForm" action="{{ route('buyer.add-contractor-markup-to-quote-architect') }}" method="post">
                                                                                @csrf
                                                                            
                                                                                <!-- Hidden fields that will get populated by JavaScript -->
                                                                                <input type="hidden" name="contractor_markup_type" class="final-contractor-markup-type">
                                                                                <input type="hidden" name="added_contractor_markup" class="final-added-contractor-markup">
                                                                                <input type="hidden" name="supplier_rate_id" class="final-supplier-rate-id">
                                                                            
                                                                                <div class="modal-body">
                                                                                    <h6 class="mb-3">Item Basic Info</h6>
                                                                                    <table class="table table-bordered table-striped w-100 mb-4">
                                                                                        <thead class="bg-light">
                                                                                            <tr class="text-nowrap">
                                                                                                <th>Sub Category</th>
                                                                                                <th>Sub Sub Category</th>
                                                                                                <th>Unit</th>
                                                                                                <th>Quantity</th>
                                                                                                <th>Rate</th>
                                                                                                <th>Architect Amount</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>{{ $subItem->getSubCategory?->category_name ?? 'N/A' }}</td>
                                                                                                <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
                                                                                                <td>{{ $subItem->unit ?? '' }}</td>
                                                                                                <td>{{ $subItem->quantity ?? '' }}</td>
                                                                                                <td>{{ $subItem->rate ?? '' }}</td>
                                                                                                <td>{{ $subItem->amount ?? '' }}</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                            
                                                                                    <h6 class="mb-3">Supplier Quotations</h6>
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-bordered table-striped">
                                                                                            <thead class="bg-light">
                                                                                                <tr class="text-nowrap">
                                                                                                    <th>#</th>
                                                                                                    <th>Supplier Name</th>
                                                                                                    <th>Supplier Rate</th>
                                                                                                    <th>Contractor Rate Type</th>
                                                                                                    <th>Markup by Contractor</th>
                                                                                                    <th>Final Rate to Architect</th>
                                                                                                    <th>Select for Quotation</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @php $i = 1; @endphp
                                                                                                @if(!empty($subItem->getSupplierRate))
                                                                                                    @foreach($subItem->getSupplierRate()->where('contractor_id',auth()->id())->get() as $supplierRate)
                                                                                                        <tr>
                                                                                                            <!-- Hidden supplier rate ID in each row -->
                                                                                                            <input type="hidden" class="supplier_rate_id" value="{{ $supplierRate->id }}">
                                                                            
                                                                                                            <td>{{ $i++ }}</td>
                                                                                                            <td>
                                                                                                                {{ $supplierRate->supplier->biz_company ?? '' }}
                                                                                                                <button type="button" class="btn btn-md btn-dark" data-toggle="modal" data-target="#supplierDetail{{$supplierRate->id}}">
                                                                                                                    <i class="fa fa-info"></i>
                                                                                                                </button>
                                                                                                                
                                                                                                                    <!-- Supplier Detail Modal -->
                                                                                                                    <div class="modal fade" id="supplierDetail{{$supplierRate->id}}" tabindex="-1" role="dialog" aria-labelledby="supplierRatesModalLabel" aria-hidden="true">
                                                                                                                      <div class="modal-dialog modal-dialog-centered modal-md" role="document"> <!-- Centered -->
                                                                                                                        <div class="modal-content border-warning shadow-lg">
                                                                                                                    
                                                                                                                          <div class="modal-header text-white">
                                                                                                                            <h5 class="modal-title" id="supplierRatesModalLabel">Supplier Information</h5>
                                                                                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                                                                              <span aria-hidden="true">&times;</span>
                                                                                                                            </button>
                                                                                                                          </div>
                                                                                                                    
                                                                                                                          <div class="modal-body bg-light">
                                                                                                                            <div class="row">
                                                                                                                              <div class="col-12">
                                                                                                                                <table class="table table-borderless table-sm">
                                                                                                                                  <tbody>
                                                                                                                                    <tr>
                                                                                                                                      <th class="text-secondary" style="width: 180px;">Supplier Name:</th>
                                                                                                                                      <td><strong>{{$supplierRate->supplier->biz_name}}</strong></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                      <th class="text-secondary">Email:</th>
                                                                                                                                      <td>{{$supplierRate->supplier->biz_email}}</td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                      <th class="text-secondary">Phone:</th>
                                                                                                                                      <td>{{$supplierRate->supplier->biz_phonecode}} {{$supplierRate->supplier->biz_phone}}</td>
                                                                                                                                    </tr>
                                                                                                                                    <!--<tr>-->
                                                                                                                                    <!--  <th class="text-secondary">Address:</th>-->
                                                                                                                                    <!--  <td>12, Green Park, New Delhi, India</td>-->
                                                                                                                                    <!--</tr>-->
                                                                                                                                    <tr>
                                                                                                                                      <th class="text-secondary">Total Experience:</th>
                                                                                                                                      <td>2 years</td>
                                                                                                                                    </tr>
                                                                                                                                    <!--<tr>-->
                                                                                                                                    <!--  <th class="text-secondary">Registration Number:</th>-->
                                                                                                                                    <!--  <td>{{$supplierRate->supplier->biz_company}}</td>-->
                                                                                                                                    <!--</tr>-->
                                                                                                                                    <tr>
                                                                                                                                      <th class="text-secondary">Company Name:</th>
                                                                                                                                      <td>{{$supplierRate->supplier->biz_company}}</td>
                                                                                                                                    </tr>
                                                                                                                                  </tbody>
                                                                                                                                </table>
                                                                                                                              </div>
                                                                                                                            </div>
                                                                                                                          </div>
                                                                                                                    
                                                                                                                          <div class="modal-footer bg-white">
                                                                                                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                                                                          </div>
                                                                                                                    
                                                                                                                        </div>
                                                                                                                      </div>
                                                                                                                    </div>

                                                                                                                
                                                                                                                
                                                                                                                
                                                                                                            </td>
                                                                                                            
                                                                                                            <td class="supplier-rate">{{ $supplierRate->total_supplier_rate ?? 0.00 }}</td>
                                                                                                            
                                                                                                            <td>
                                                                                                                <div class="row">
                                                                                                                    <div class="col">
                                                                                                                        <select class="form-control contractor-markup-type">
                                                                                                                            <option value="Flat">Flat</option>
                                                                                                                            <option value="Percentage">Percentage</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                 </div>
                                                                                                            </td>
                                                                                                            
                                                                                                            
                                                                                                            <td>
                                                                                                                <input class="form-control contractor-markup" type="text" placeholder="Add Markup">
                                                                                                            </td>
                                                                                                            <td class="text-success font-weight-bold final-rate-to-architect">
                                                                                                                {{ $supplierRate->total_supplier_rate ?? 0.00 }}
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="radio" name="send_quotation_to" value="{{ $supplierRate->supplier_id ?? '' }}">
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Send Quotation</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                      </div>
                                                                    </div>

                                                            </td>
                                                            
                                                            @else
                                                            
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-md btn-dark " data-toggle="modal" data-target="#contractorRatesModal{{$subItem->id}}">
                                                                    Add your rate
                                                                </button>
                                                            </td>
                                                            
                                                            
                                                            <!-- Supplier Detail Modal -->
                                                            <div class="modal fade" id="contractorRatesModal{{$subItem->id}}" tabindex="-1" role="dialog" aria-labelledby="supplierRatesModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog modal-dialog-centered modal-md" role="document"> <!-- Centered -->
                                                                <div class="modal-content border-warning shadow-lg">
                                                            
                                                                  <div class="modal-header text-white">
                                                                    <h5 class="modal-title" id="supplierRatesModalLabel">Supplier Information</h5>
                                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                 <form action="{{route('buyer.save-contractor-rate')}}" method="post">
                                                                     @csrf
                                                                      <div class="modal-body bg-light">
                                                                        <div class="row">
                                                                          <div class="col-12">
                                                                           
                                                                                <input type="hidden"  name="boq_sub_item_id" value="{{$subItem->id}}">
                                                                                
                                                                                <div class="form-group">
                                                                                    <label for="contractor-rate">Contractor Rate</label>
                                                                                    <input type="number" class="form-control" name="total_contractor_rate" value="">
                                                                                </div>
                                                                                
                                                                                <div class="form-group">
                                                                                    <label for="contractor-rate">Contractor Remark</label>
                                                                                    <input type="text" class="form-control"  name="contractor_remark" value="">
                                                                                </div>
                                                                            
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                
                                                                      <div class="modal-footer bg-white">
                                                                        <button type="submit" class="btn btn-outline-secondary">Save</button>
                                                                      </div>
                                                                </form>
                                                                </div>
                                                              </div>
                                                            </div>
                                                  
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        @endforeach
                                    @endif
                            
                                </div>
                            </div>


                       <!-- Step 2 -->
                            <div class="form-step ">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped  rounded">
                                            <thead class="bg-gray text-white text-center">
                                                <tr>
                                                    <th width="50%">Project Detail</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="bg-light">
                                                        <p class="mb-0"><strong>Project Name:</strong> {{ $project->project_name ?? '' }}</p>
                                                        <p class="mb-0"><strong>Client Name:</strong> {{ $project->client_name ?? '' }}</p>
                                                        <p class="mb-0"><strong>BOQ Type:</strong> {{ $project->boq_type ?? '' }}</p>
                                                        <p class="mb-0"><strong>Deadline:</strong> {{ $project->boq_deadline ?? '' }}</p>
                                                        <p class="mb-0"><strong>Validity Till:</strong> {{ $project->validity_date ?? '' }}</p>
                                                    </td>
                                                    <td class="bg-light">
                                                        <p class="mb-0"><strong>Project Address:</strong> {{ $project->project_address ?? '' }}</p>
                                                        <p class="mb-0"><strong>Project City:</strong> {{ $project->projectCity->name ?? '' }}</p>
                                                        <p class="mb-0"><strong>Project Area:</strong> {{ $project->projectArea->name ?? '' }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-light">
                                                        <p class="mb-0"><strong>Reference Documents : </p>
                                                    </td>
                                                    <td class="bg-light">
                                                        
                                                        @if(isset($project->attachment_file_one))
                                                            <a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_one )}}"> Reference 1 <i class="fa fa-download"></i></a>
                                                        @endif
                                                        
                                                         @if(isset($project->attachment_file_two))
                                                          |  <a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_two )}}"> Reference 2 <i class="fa fa-download"></i></a>
                                                        @endif
                                                        
                                                         @if(isset($project->attachment_file_three))
                                                           | <a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_three )}}"> Reference 3 <i class="fa fa-download"></i></a>
                                                        @endif
                                                        
                                                         @if(isset($project->attachment_file_four))
                                                           | <a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_four )}}"> Reference 4 <i class="fa fa-download"></i></a>
                                                        @endif
                                                       
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                           
                            

                            <!-- Navigation -->
                            <div class="row form-navigation mt-4">
                                <div class="col-12">
                                    <button type="button" class=" ps-btn ps-btn--md gray-bg px-4" id="prevBtn" onclick="prevStep()">Previous</button>
                                    <button type="button" class="ps-btn ps-btn--md lightblue-bg save-and-next px-4 float-right" id="nextBtn" onclick="nextStep()"> Next</button>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript" src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>
<!-- JS Logic -->


<script>
    document.addEventListener('DOMContentLoaded', function () {
        function calculateFinalRate(row) {
            let contractorMarkup = parseFloat(row.querySelector('.contractor-markup').value) || 0;
            let supplierRateElement = row.querySelector('.supplier-rate');
            let finalRateElement = row.querySelector('.final-rate-to-architect');
            let addedMarkupElement =  row.querySelector('.added-contractor-markup');
            let markupType = row.querySelector('.contractor-markup-type').value;
            let supplierRate =  parseFloat(supplierRateElement.textContent) || 0;
            let finalRate = 0;
            let markupValue = 0;
            if (markupType === 'Percentage') {
                markupValue =  supplierRate * (contractorMarkup / 100);
                finalRate = supplierRate + markupValue;
            } else {
                finalRate = supplierRate + contractorMarkup;
            }
            if (addedMarkupElement) {
                addedMarkupElement.value = contractorMarkup;
            }
            finalRateElement.textContent = finalRate.toFixed(2);
        }
    
        // Contractor markup input event
        document.querySelectorAll('.contractor-markup').forEach(function (input) {
            input.addEventListener('keyup', function (event) {
                let row = event.target.closest('tr');
                calculateFinalRate(row);
            });
        });
    
        // Markup type change event
        document.querySelectorAll('.contractor-markup-type').forEach(function (select) {
            select.addEventListener('change', function (event) {
                let row = event.target.closest('tr');
                calculateFinalRate(row);
            });
        });
    });
</script>


<script>






document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.markupForm').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            const selectedRadio = form.querySelector('input[name="send_quotation_to"]:checked');

            if (!selectedRadio) {
                alert('Please select a supplier.');
                e.preventDefault();
                return;
            }

            const row = selectedRadio.closest('tr');

            const contractorMarkupTypeInput = row.querySelector('select.contractor-markup-type');
            const contractorMarkupInput = row.querySelector('input.contractor-markup');
            const supplierRateIdInput = row.querySelector('.supplier_rate_id'); // note: class

            const finalMarkupField = form.querySelector('.final-added-contractor-markup');
            const finalSupplierRateIdField = form.querySelector('.final-supplier-rate-id');
            const finalContractorMarupType = form.querySelector('.final-contractor-markup-type');
            
            finalContractorMarupType.value =  contractorMarkupTypeInput ? contractorMarkupTypeInput.value : '';
            
            

            finalMarkupField.value = contractorMarkupInput ? contractorMarkupInput.value : '';
            finalSupplierRateIdField.value = supplierRateIdInput ? supplierRateIdInput.value : '';

            // console.log("Selected Supplier ID:", selectedRadio.value);
            // console.log("Contractor Markup:", finalMarkupField.value);
            // console.log("Supplier Rate ID:", finalSupplierRateIdField.value);
        });
    });
});
</script>


<script>


    
  
    $(document).on('hidden.bs.modal',function(){
        if($('.modal.show').length > 0){
            $('body').addClass('modal-open');
        }
    })

// --------Step Form Logic -------------------------------------------------------


    let currentStep = 1;

    function showStep(step) {
        const steps = document.querySelectorAll('.form-step');
        const progressItems = document.querySelectorAll('.progressbar li');
        const totalSteps = steps.length;

        steps.forEach((stepDiv, index) => {
            stepDiv.classList.toggle('active', index === step - 1);
        });

        progressItems.forEach((item, index) => {
            item.classList.toggle('active', index < step);
        });

        document.getElementById('prevBtn').style.display = (step === 1) ? 'none' : 'inline-block';
        document.getElementById('nextBtn').style.display = (step === totalSteps) ? 'none' : 'inline-block';
    }

    function nextStep() {
        const totalSteps = document.querySelectorAll('.form-step').length;
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }



    document.addEventListener('DOMContentLoaded', function () {
        showStep(currentStep);
    });

// --------End of Step form login-----------------------------------------------------------




// document.querySelectorAll('contractor-markup').forEach(function(input){
//     input.addEventListerner('onkeyup',function(e){
//         console.log(e)
//         let contractorMarkup = e.value;
//         let supplierRate = e.closet.class('supplier-rate').text;
//         let finalRateToArchitector = e.closet.class('final-rate-to-architect');
//         finalRateToArchitector.text = contractorMarkup + supplierRate;
//     })
// })







</script>
<script>
// document.querySelectorAll('.contractor-markup').forEach(function(input) {
//     input.addEventListener('keyup', function(e) {
//         let contractorMarkup = parseFloat(e.target.value) || 0;
//         let row = e.target.closest('tr');

//         let supplierRateElement = row.querySelector('.supplier-rate');
//         let finalRateElement = row.querySelector('.final-rate-to-architect');

//         let supplierRate = parseFloat(supplierRateElement.textContent) || 0;
//         let finalRate = supplierRate + contractorMarkup;
        
//         document.querySelector('.added-contractor-markup').value = contractorMarkup;

//         finalRateElement.textContent = finalRate.toFixed(2);
//     });
// });





</script>





<!-- CSS -->
<style>

.bg-danger-light{
    background-color:#ffcacf;
}

.bg-primary-light{
    background-color:#badbff;
}
.bg-supplier {
    background-color: #fff3cd;
}
    .form-step { display: none; }
    .form-step.active { display: block; }

    .progressbar {
        counter-reset: step;
        display: flex;
        justify-content: space-between;
        padding-left: 0;
        list-style: none;
    }

    .progressbar li {
        position: relative;
        text-align: center;
        flex: 1;
        color: #999;
    }

    .progressbar li::before {
        content: counter(step);
        counter-increment: step;
        width: 30px;
        height: 30px;
        display: block;
        margin: 0 auto 10px;
        border-radius: 50%;
        background: #ccc;
        color: white;
        line-height: 30px;
    }

    .progressbar li::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        background: #ccc;
        top: 15px;
        left: -50%;
        z-index: -1;
    }

    .progressbar li:first-child::after {
        content: none;
    }

    .progressbar li.active {
        color: #000000;
    }

    .progressbar li.active::before,
    .progressbar li.active::after {
        background: #000000;
    }
</style>

@endsection


