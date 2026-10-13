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

                        <form id="boqForm" class="create-rfq-form" method="post" action="">
                            <input type="hidden" name="boq_id" value="{{  $project->id ?? request()->segment('3') }}" >
                            <!-- Step 1 -->
                            <div class="form-step active">
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

                            <!-- Step 2 -->
                            <div class="form-step">
                                <div id="category-groups-wrapper">
                            
                                    @if(isset($project->getBoqMainItem) && count($project->getBoqMainItem) > 0)
                                        @foreach($project->getBoqMainItem as $mainKey => $mainItem) 
                                        <div class="mb-4">
                                            {{-- Static Category Row with Button --}}
                                            <div class="d-flex justify-content-between align-items-center bg-light p-2 border">
                                                <div>
                                                    <strong>Category {{ $mainKey + 1 }} :</strong>
                                                    <span class="text-success">{{ $mainItem->getCategory?->category_name ?? '' }}</span>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-md btn-dark float-right" data-toggle="modal" data-target="#supplierRatesModal">
                                                        View More Supplier Rates
                                                    </button>

                                                </div>
                                            </div>
                                        
                                            {{-- Scrollable Subcategory Table --}}
                                            <div style="overflow-x: auto;">
                                                <table class="table table-bordered table-striped mb-0" style="min-width: 1500px;">
                                                    <thead class="bg-light">
                                                        <tr class="fw-bold text-nowrap">
                                                            <th>Sub category</th>
                                                            <th>Sub Sub Category</th>
                                                            <th>Description</th>
                                                            <th>Unit</th>
                                                            <th>Qty</th>
                                                            <th>Rate</th>
                                                            <th>Amount</th>
                                                            <th>Reference</th>
                                                            <th class="bg-danger-light">Rate from architect</th>
                                                            <th class="bg-primary-light">Rate to architect + Mark up</th>
                                                            <th class="bg-supplier">Rate from supplier 1</th>
                                                            <th class="bg-supplier">Rate from supplier 2</th>
                                                            <th class="bg-supplier">Rate from supplier 3</th>
                                                            <th class="bg-supplier">Rate from supplier 4</th>
                                                            <th class="bg-supplier">Rate from supplier 5</th>
                                                            <th class="bg-supplier">Rate from supplier 6</th>
                                                            <th class="bg-supplier">Rate from supplier 7</th>
                                                            <th class="bg-supplier">Rate from supplier 8</th>
                                                            <th class="bg-success-light">Amount</th>
                                                            <th>Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($mainItem->getSubItem as $subKey => $subItem)
                                                        <tr>
                                                            <td>{{ $subItem->getSubCategory?->category_name ?? 'N/A' }}</td>
                                                            <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
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
                                                            <td class="bg-danger-light">5500</td>
                                                            <td class="bg-primary-light">4500</td>
                                                            <td class="bg-supplier">4555</td>
                                                            <td class="bg-supplier">4450</td>
                                                            <td class="bg-supplier">4555</td>
                                                            <td class="bg-supplier">5550</td>
                                                            <td class="bg-supplier">4445</td>
                                                            <td class="bg-supplier">5555</td>
                                                            <td class="bg-supplier">4455</td>
                                                            <td class="bg-success-light">123456</td>
                                                            <td>--</td>
                                                        </tr>
                                                        @endforeach
                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                            {{--<div class="mb-4" style="overflow-x: auto;">
                                                <table class="table table-bordered table-striped" style="min-width: 1500px;">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th colspan="18">
                                                                <strong>Category {{ $mainKey + 1 }} :</strong>
                                                                <span class="text-success">{{ $mainItem->getCategory?->category_name ?? '' }}</span>
                                                            </th>
                                                        </tr>
                                                        <tr class="fw-bold text-nowrap">
                                                            <th>Sub category</th>
                                                            <th>Sub Sub Category</th>
                                                            <th>Description</th>
                                                            <th>Unit</th>
                                                            <th>Qty</th>
                                                            <th>Rate</th>
                                                            <th>Amount</th>
                                                            <th>Reference</th>
                                                            <th class="bg-danger-light">Rate from architect</th>
                                                            <th class="bg-primary-light">Rate to architect + Mark up</th>
                                                            <th class="bg-supplier">Rate from supplier 1</th>
                                                            <th class="bg-supplier">Rate from supplier 2</th>
                                                            <th class="bg-supplier">Rate from supplier 3</th>
                                                            <th class="bg-supplier">Rate from supplier 4</th>
                                                            <th class="bg-supplier">Rate from supplier 5</th>
                                                            <th class="bg-supplier">Rate from supplier 6</th>
                                                            <th class="bg-supplier">Rate from supplier 7</th>
                                                            <th class="bg-supplier">Rate from supplier 8</th>
                                                            <th class="bg-success-light">Amount</th>
                                                            <th>Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($mainItem->getSubItem as $subKey => $subItem)
                                                            <tr>
                                                                <td>{{ $subItem->getSubCategory?->category_name ?? 'N/A' }}</td>
                                                                <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
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
                                                                <td  class="bg-danger-light">5500</td>
                                                                <td  class="bg-primary-light">4500</td>
                                                                <td class="bg-supplier">4555</td>
                                                                <td class="bg-supplier">4450</td>
                                                                <td class="bg-supplier">4555</td>
                                                                <td class="bg-supplier">5550</td>
                                                                <td class="bg-supplier">4445</td>
                                                                <td class="bg-supplier">5555</td>
                                                                <td class="bg-supplier">4455</td>
                                                                <td class="bg-supplier">4455</td>
                                                                <td class="bg-success-light">34455</td>
                                                                <td class="">Remarl</td>
                                                            </tr>
                                                        @endforeach
                            
                                                    </tbody>
                                                </table>
                                            </div> --}}
                                        @endforeach
                                    @endif
                            
                                </div>
                            </div>

                            

                            <!-- Navigation -->
                            <div class="row form-navigation mt-4">
                                <div class="col-12">
                                    <button type="button" class=" ps-btn ps-btn--md gray-bg px-4" id="prevBtn" onclick="prevStep()">Previous</button>
                                    <button type="button" class="ps-btn ps-btn--md lightblue-bg save-and-next px-4 float-right" id="nextBtn" onclick="nextStep()"> Next</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Supplier Rates Modal -->
<div class="modal fade" id="supplierRatesModal" tabindex="-1" role="dialog" aria-labelledby="supplierRatesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="supplierRatesModalLabel">Supplier Rate Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body">
        <div class="table-responsive" style="overflow-x: auto;">
          <table class="table table-bordered table-striped" style="min-width: 1600px;">
            <thead>
              <tr class="text-nowrap bg-light">
                <th>Sub Category</th>
                <th>Sub Sub Category</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Amount</th>
                <th>Reference</th>
                <th class="bg-danger-light">Rate from Architect</th>
                <th class="bg-primary-light">Rate to Architect + Markup</th>
                @for($i = 9; $i <= 20; $i++)
                  <th class="bg-supplier">Rate from Supplier {{ $i }}</th>
                @endfor
                <th class="bg-success-light">Total Amount</th>
                <th>Remarks</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $subItem->getSubCategory?->category_name ?? 'N/A' }}</td>
                <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
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
                <td>5500</td>
                <td>4500</td>
                @for($i = 9; $i <= 20; $i++)
                  <td>{{ 4000 + ($i * 100) }}</td>
                @endfor
                <td>123456</td>
                <td>--</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    
    </div>
  </div>
</div>


<script type="text/javascript" src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>
<!-- JS Logic -->


<script>
    
    
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


