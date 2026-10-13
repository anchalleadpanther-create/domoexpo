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
                    <h2>Contractor Rate Detail</h2>
                </div>

                <div class="ps-my-account">
                    <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important">
                        <ul class="progressbar mb-4">
                            <li class="active">Project Info</li>
                            <li>BOQ Details</li>
                     
                        </ul>
                        
                         <div class="ps-section_export ml-4 text-right">
                                    <a  href="{{route('buyer.contractor-quotation-detail-pdf',[$project->id,$contractorId])}}" class="btn btn-md btn-success mb-1"> Download PDF</a>
                            </div>

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
                                                    <span class="text-success">{{ $mainItem->getCategory?->category_name ?? '' }}</span>
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
                                                            <th>Description</th>
                                                            <th>Unit</th>
                                                            <th>Qty</th>
                                                            <th>Rate</th>
                                                            <th>Amount</th>
                                                            <th class="bg-primary-light">Contractor Rate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($mainItem->getSubItem as $subKey => $subItem)
                                                        <tr>
                                                            <td>{{ $subItem->getSubCategory?->category_name ?? 'N/A' }} {{ $subItem->id}}</td>
                                                            <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
                                                            <td>{{ $subItem->description ?? '' }}</td>
                                                            <td>{{ $subItem->unit ?? '' }}</td>
                                                            <td>{{ $subItem->quantity ?? '' }}</td>
                                                            <td>{{ $subItem->rate ?? '' }}</td>
                                                            <td>{{ $subItem->amount ?? '' }}</td>
                                                            
                                                            <td class="bg-primary-light">
                                                                
                                                               {{ $subItem->getSupplierRate()->where('contractor_id', $contractorId)->where('is_accepted_by_contractor', 1)->where('boq_sub_item_id',$subItem->id)->first()?->total_contractor_rate ?? 'NA' }}

                                                            </td>
                                                            
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



<!-- Supplier Detail Modal -->
<div class="modal fade" id="supplierDetail" tabindex="-1" role="dialog" aria-labelledby="supplierRatesModalLabel" aria-hidden="true">
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
                  <td><strong>Rohan Mehta</strong></td>
                </tr>
                <tr>
                  <th class="text-secondary">Email:</th>
                  <td>rohan.mehta@example.com</td>
                </tr>
                <tr>
                  <th class="text-secondary">Phone:</th>
                  <td>+91 9876543210</td>
                </tr>
                <tr>
                  <th class="text-secondary">Address:</th>
                  <td>12, Green Park, New Delhi, India</td>
                </tr>
                <tr>
                  <th class="text-secondary">Total Experience:</th>
                  <td>6 years</td>
                </tr>
                <tr>
                  <th class="text-secondary">Registration Number:</th>
                  <td>29ABCDE1234F2Z5</td>
                </tr>
                <tr>
                  <th class="text-secondary">Company Name:</th>
                  <td>Mehta Constructions Pvt. Ltd.</td>
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



<script type="text/javascript" src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>
<!-- JS Logic -->


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

            const contractorMarkupInput = row.querySelector('input.contractor-markup');
            const supplierRateIdInput = row.querySelector('.supplier_rate_id'); // note: class

            const finalMarkupField = form.querySelector('.final-added-contractor-markup');
            const finalSupplierRateIdField = form.querySelector('.final-supplier-rate-id');

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




document.querySelectorAll('.contractor-markup').forEach(function(input) {
    input.addEventListener('keyup', function(e) {
        let contractorMarkup = parseFloat(e.target.value) || 0;
        let row = e.target.closest('tr');

        let supplierRateElement = row.querySelector('.supplier-rate');
        let finalRateElement = row.querySelector('.final-rate-to-architect');
        let addedMarkupElement = row.querySelector('.added-contractor-markup');

        let supplierRate = parseFloat(supplierRateElement.textContent) || 0;
        let finalRate = supplierRate + contractorMarkup;

        if (addedMarkupElement) {
            addedMarkupElement.value = contractorMarkup;
        }

        finalRateElement.textContent = finalRate.toFixed(2);
    });
});

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


