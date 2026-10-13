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
                    <h2>Project Info</h2>
                </div>

                <div class="ps-my-account">
                    <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important">
                        <ul class="progressbar mb-4">
                            <li class="active">Project Info</li>
                            <li>BOQ Details</li>
                            <!--<li> Reference Documents</li>-->
                        </ul>
                        
                        
                        <!-- Step 2 -->
                            <div class="form-step active">
                                <div id="category-groups-wrapper">
                                    
                                    <!-- Category Group Template -->
                                    @if(isset($project->getBoqMainItem) && count($project->getBoqMainItem) > 0)
                                        @foreach($project->getBoqMainItem as $mainKey => $mainItem) 
                                    <table class="table table-bordered table-striped  rounded">
                                        <thead>
                                            <th colspan="8"><strong>Category {{ $mainKey + 1 }} : <span class="text-success">{{ $mainItem->getCategory?->category_name ?? '' }}</span></strong></th>
                                        </thead> 
                                        <thead>
                                            <tr class="fw-900">
                                                
                                                <th width="15%">Sub category</th>
                                                <th  width="17%">Sub Sub Category</th>
                                                <th  width="40%">Description</th>
                                                <th>Unit</th>
                                                <th>Qty</th>
                                                <th>Rate</th>
                                                <th>Amount</th>
                                                <th> Reference</th>
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
                                                        @if(!empty($subItem->attachment_file))
                                                            <a class="text-success" target="_blank" href="{{ asset('uploads/rfq/'.$subItem->attachment_file) }}">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        
                                            @if($project->getContractorStatus(auth()->id()) == 'Accepted' &&  $mainItem->getCategory?->category_name != 'Contractor Work')
                                            @php
                                                $suppliers = \App\Models\Supplier\Supplier::whereHas('mappedCategories', function ($q) use ($mainItem) {
                                                    $q->where('category_id', $mainItem->category_id);
                                                })->get();
                                            @endphp
                                                <tr>
                                                    <form class="sendToSupplierForm" action="{{ route('buyer.send-to-supplier') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{ $mainItem->id }}" name="main_item_id">
                                                        <td colspan="2"><strong>Send to Supplier</strong></td>
                                                        <td colspan="5">
                                                            <div class="form-group mb-4">
                                                                <select class="form-select" name="suppliers[]" multiple>
                                                                    <option value="" disabled>Choose</option>
                                                                    @foreach($suppliers as $supplier)
                                                                        <option value="{{ $supplier->id }}">{{ $supplier->biz_company }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="submit" class="btn ps-btn ml-3">Submit</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endif
                                        </tbody>

                                        
                                    </table>
                                        @endforeach
                                        
                                        @if($project->getContractorStatus(auth()->id()) == 'Accepted')
                                        
                                        <table class="table table-bordered table-striped  rounded">
                                            <tbody>
                                                <tr>
                                                    
                                                    <form action="{{ route('buyer.send-to-supplier') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{$project->id}}" name="boq_id">
                                                        <input type="hidden" value="sendToAll" name="sendToAll">
                                                        <td colspan="2"><strong>Send to All Supplier</strong></td>
                                                        
                                                        <td colspan="2">
                                                            <button type="submit" class="btn ps-btn ml-3">Send to all Supplier</button>
                                                        </td>
                                                    </form>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                    @endif
                                    
                                    
                                    
                                </div>
                                

                            </div>
                            

                            <!-- Step 2 -->
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

$(document).on('submit', '.sendToSupplierForm', function(e) {
    e.preventDefault();

    let form = $(this);
    let url = form.attr('action');
    let formData = form.serialize();

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        success: function(response) {

            alert('You have sent to suppliers successfully.');

            // Optional reset only current form
            form.trigger("reset");

        },
        error: function(xhr) {
            console.log(xhr.responseText);
            alert('Something went wrong');
        }
    });
});
    
    
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


