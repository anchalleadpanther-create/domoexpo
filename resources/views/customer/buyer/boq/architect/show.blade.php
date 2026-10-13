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
                                                    <td>{{$subItem->getSubCategory?->category_name ?? 'N/A'}}</td>
                                                    <td>{{$subItem->getSubSubCategory?->category_name ?? 'N/A'}}</td>
                                                    <td>{{ $subItem->description ?? ''}} {{ $subItem->description ?? ''}} </td>
                                                    <td>{{ $subItem->unit ?? ''}}</td>
                                                    <td>{{ $subItem->quantity ?? ''}}</td>
                                                    <td>{{ $subItem->rate ?? ''}}</td>
                                                    <td>{{ $subItem->amount ?? ''}}</td>
                                                    <td>
                                                        @if(isset($subItem->reference_file))
                                                            <a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$subItem->attachment_file )}}"> <i class="fa fa-download"></i></a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                                
                                            @endforeach
                                            
                                        </tbody>
                                        
                                    </table>
                                        @endforeach
                                    @else
                                    <table class="table table-bordered table-striped   rounded">
                                        <thead>
                                            <th class="text-center"><strong><span class="text-success">Quantity not available.</span></strong></th>
                                        </thead> 
                                    </table>   
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




{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9 offset-lg-3">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5">
                    <h2>BOQ Request Form</h2>
                </div>

                <div class="ps-my-account">
                    <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important">

                        <!-- Progress Bar -->
                        <ul class="progressbar mb-4">
                            <li class="active">Project Info</li>
                            <li>BOQ Details</li>
                        </ul>

                        <!-- Form -->
                        <form id="boqForm">
                            <!-- Step 1 -->
                            <div class="form-step active">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <input type="text" name="project_name" class="form-control" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Site Name</label>
                                            <input type="text" name="site" class="form-control" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Building Name</label>
                                            <input type="text" name="building" class="form-control" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Reference Drawing</label>
                                            <input type="text" name="reference_drawing" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>BOQ For</label>
                                            <input type="text" name="boq_for" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Bill of Quantities</label>
                                            <input type="text" name="bill_of_quantities" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Project Address</label>
                                            <input type="text" name="bill_of_quantities" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <select class="form-select">
                                                <option value="" disabled>select</option>
                                                <option value="Nicosia" >Nicosia</option>
                                                <option value="Limassol" >Limassol</option>
                                                <option value="Larnaca" >Larnaca</option>
                                                <option value="Paphos" >Paphos</option>
                                                <option value="Famagusta" >Famagusta</option>
                                                <option value="Kyrenia" >Kyrenia</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <select class="form-select">
                                                <option value="" disabled>select</option>
                                                 <option value="City 1" >City 1</option>
                                                  <option value="City 2" >City 2</option>
                                                   <option value="City 3" >City 3</option>
                                                    <option value="City 4" >City 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Attachment 1</label>
                                            <input type="file" name="attachment_one" class="form-control">
                                        </div>
                                    </div>
                                   
                                   <div class="col-6">
                                        <div class="form-group">
                                            <label>Attachment 2</label>
                                            <input type="file" name="attachment_two" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Attachment 3</label>
                                            <input type="file" name="attachment_three" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Attachment 4</label>
                                            <input type="file" name="attachment_four" class="form-control">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="form-step">
                                <div id="boq-items-wrapper">
                                    <div class="boq-item border p-3 mb-3 position-relative">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>Category</label>
                                                <select class="form-select">
                                                    <option value="" disabled>select</option>
                                                    @foreach(getCategories() as $caetgory)
                                                        <option value="{{$caetgory->id}}">{{$caetgory->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Subcategory</label>
                                                <input type="text" name="subcategory[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Item No.</label>
                                                <input type="text" name="item_no[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Description</label>
                                                <input type="text" name="description[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Unit</label>
                                                <input type="text" name="unit[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Quantity</label>
                                                <input type="number" name="quantity[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Rate</label>
                                                <input type="number" name="rate[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Amount</label>
                                                <input type="number" name="amount[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-success btn-md mb-3" onclick="addBOQItem()">+ Add More</button>
                            </div>

                            <!-- Navigation -->
                            <div class="row form-navigation mt-4">
                                <div class="col-12">
                                <button type="button" class=" ps-btn ps-btn--md gray-bg px-4" id="prevBtn" onclick="prevStep()">Previous</button>
                                <button type="button" class="ps-btn ps-btn--md lightblue-bg  px-4 float-right" id="nextBtn" onclick="nextStep()">Next</button>
                                <button type="submit" class="ps-btn ps-btn--md px-4 float-right" id="submitBtn" style="display: none;">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<!-- JavaScript -->
<script>
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
        document.getElementById('submitBtn').style.display = (step === totalSteps) ? 'inline-block' : 'none';
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

    function addBOQItem() {
        const wrapper = document.getElementById('boq-items-wrapper');
        const firstItem = wrapper.querySelector('.boq-item');
        const clone = firstItem.cloneNode(true);

        clone.querySelectorAll('input').forEach(input => input.value = '');

        // Add delete button only if it's not the first one
        const deleteBtn = document.createElement('button');
        deleteBtn.type = 'button';
        deleteBtn.className = 'btn btn-danger btn-sm position-absolute';
        deleteBtn.style.top = '5px';
        deleteBtn.style.right = '5px';
        deleteBtn.textContent = 'Delete';
        deleteBtn.onclick = function () {
            clone.remove();
        };

        clone.appendChild(deleteBtn);
        wrapper.appendChild(clone);
    }

    document.getElementById('boqForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Form submitted successfully!');
        // Optionally send AJAX request here
    });

    document.addEventListener('DOMContentLoaded', function() {
        showStep(currentStep);
    });
</script>

<!-- Styles -->
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

    .boq-item {
        position: relative;
        border-radius: 10px;
        background-color: #f9f9f9;
    }
</style>
--}}
@endsection


