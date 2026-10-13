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
                            <li> Upload Reference Documents</li>
                        </ul>

                        <form id="boqForm" class="create-rfq-form" method="post" action="">
                            <input type="hidden" name="boq_id" value="{{  $boq->id ?? request()->segment('3') }}" >
                            <!-- Step 1 -->
                            <div class="form-step active">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <input type="text" name="project_name" value="{{ $boq->project_name ?? '' }}" class="form-control" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Client Name</label>
                                            <input type="text" name="client_name" value="{{ $boq->client_name ?? ''  }}" class="form-control" >
                                        </div>
                                    </div>
                                  
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>BOQ Type</label>
                                            <select class="form-select" name="boq_type" required>
                                                @foreach(getDropdowns('Quotation Type')->dropdownValues as $value)
                                                    <option value="{{$value->dropdown_value}}" @isset($boq->boq_type) {{ $boq->boq_type == $value->dropdown_value ? 'selected' : ''  }} @endif>{{$value->dropdown_value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                           <label>Contractor Type</label>
                                           <select class="form-select " id="contractor_type" name="contractor_type[]" multiple required>
                                                <option value="">Select</option>  
                                                @foreach(getDropdowns('Contractor Type')->dropdownValues as $value)
                                                    <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                  </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Project Address</label>
                                            <input type="text" name="project_address" value="{{ $boq->project_address ?? ''  }}" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <!--this is bassicaly state in cyprus we all it city or district-->
                                            <label>Project City</label>
                                            <select class="form-select states" name="project_city" onchange="getCities(this)" data-class=".cities" required>
                                                <option value="">select</option>
                                                @foreach(getStates(251) as $state)
                                                <option value="{{$state->id}}" @isset($boq->project_city) {{$boq->project_city == $state->id ? 'selected' : ''}}    @endisset>{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <!--this is bassicaly city in cyprus we all it area-->
                                            <label>Prohect Area </label>
                                            <select class="form-select cities" name="project_area" required>
                                                @isset($boq->project_city)
                                                    @foreach(getCities(5071) as $city)
                                                    <option value="{{$city->id}}" @isset($boq->project_area) {{$boq->project_area == $city->id ? 'selected' : ''}}    @endisset>{{$city->name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                           <label>BOQ Deadline</label>
                                           <input class="form-control" id="boq_deadline" name="boq_deadline" value="{{ $boq->boq_deadline ?? date('Y-m-d', strtotime('+1 month')) }}"  type="date"required />
                                        </div>
                                    </div>
                                              
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                           <label>Validity Date</label>
                                           <input class="form-control" id="validity_date" name="validity_date" value="{{ $boq->validity_date ?? date('Y-m-d', strtotime('+1 month')) }}"  type="date"required />
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="form-step">
                                <div id="category-groups-wrapper">
                                    
                                    
                                    <!-- Category Group Template -->
                                    @if(isset($boq->getBoqMainItem) && count($boq->getBoqMainItem) > 0)
                                  
                                    
                                        @foreach($boq->getBoqMainItem as $mainKey => $mainItem)
                                        
                                            <div class="category-group border rounded p-3 mb-4">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-select parent-category" name="items[{{$mainKey}}][category_id]" onchange="getMoreCategories(this)">
                                                        <option value="">select</option>
                                                        @foreach(getCategories() as $caetgory)
                                                            <option value="{{$caetgory->id}}" {{$mainItem->category_id == $caetgory->id ? 'selected' : '' }}>{{$caetgory->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                               
                                                <div class="boq-items-wrapper">
                                                   @foreach($mainItem->getSubItem as $subKey => $subItem) 
                                                    <div class="boq-item form-row" data-category-index="{{$mainKey}}" data-wrapper-child="{{$subKey}}">
                                                        <div class="form-group col-md-3">
                                                            <label>Sub category</label>
                                                            <select class="form-select sub-category " name="items[{{$mainKey}}][category_items][{{$subKey}}][sub_category]" onchange="getMoreSubCategories(this)" data-type="sub-category">
                                                                <option value="" >select</option>
                                                                @if(!empty($mainItem->category_id))
                                                                    @foreach(getCategories($mainItem->category_id) as $subcaetgory)
                                                                        <option value="{{$subcaetgory->id}}" {{$subItem->sub_category == $subcaetgory->id ? 'selected' : '' }}>{{$subcaetgory->category_name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="sub-sub-category-div">
                                                            <div class="form-group col-md-12" style="width:250px">
                                                                <label>Sub Sub Category</label>
                                                                <select class="form-select sub-sub-category" name="items[{{$mainKey}}][category_items][{{$subKey}}][sub_sub_category]">
                                                                    <option value="">Select</option>
                                                                    @if(!empty($subItem->sub_category))
                                                                        @foreach(getCategories($subItem->sub_category) as $subsubcaetgory)
                                                                            <option value="{{$subsubcaetgory->id}}" {{$subItem->sub_sub_category == $subsubcaetgory->id ? 'selected' : '' }}>{{$subsubcaetgory->category_name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group col-md-5">
                                                            <label>Description</label>
                                                            <input type="text" name="items[{{$mainKey}}][category_items][{{$subKey}}][description]" value="{{ $subItem->description ?? ''}}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Unit</label>
                                                            <input type="text" name="items[{{$mainKey}}][category_items][{{$subKey}}][unit]" value="{{ $subItem->unit ?? ''}}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Qty</label>
                                                            <input type="number" name="items[{{$mainKey}}][category_items][{{$subKey}}][quantity]" value="{{ $subItem->quantity ?? ''}}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Rate</label>
                                                            <input type="number" name="items[{{$mainKey}}][category_items][{{$subKey}}][rate]" value="{{ $subItem->rate ?? ''}}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Amount</label>
                                                            <input type="number" name="items[{{$mainKey}}][category_items][{{$subKey}}][amount]"  value="{{ $subItem->amount ?? ''}}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Uplaod Reference @if(isset($subItem->reference_file))<a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$subItem->attachment_file )}}"> <i class="fa fa-download"></i></a>@endif</label> 
                                                            <input type="file" name="items[{{$mainKey}}][category_items][{{$subKey}}][attachment]" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-12 text-right">
                                                            <button type="button" class="btn btn-sm btn-danger delete-item" style="display: inline-block;">Delete</button>
                                                        </div>
                                                    </div>
                                                   @endforeach
                                                </div>
                                                <button type="button" class="btn btn-success btn-sm save-boq-item"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                                                <button type="button" class="btn btn-primary btn-sm add-boq-item">+ Add More</button>
                                            </div>
                                        
                                        @endforeach
                                    
                                    @else
                                    
                                        <div class="category-group border rounded p-3 mb-4">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-select parent-category" name="items[0][category_id]" onchange="getMoreCategories(this)">
                                                    <option value="">select</option>
                                                    @foreach(getCategories() as $caetgory)
                                                        <option value="{{$caetgory->id}}">{{$caetgory->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
    
                                            <div class="boq-items-wrapper">
                                                <div class="boq-item form-row" data-category-index="0" data-wrapper-child="0">
                                                    <div class="form-group col-md-3">
                                                        <label>Sub category </label>
                                                        <select class="form-select sub-category " name="items[0][category_items][0][sub_category]" onchange="getMoreSubCategories(this)"  data-type="sub-category">
                                                            <option value="" >select</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="sub-sub-category-div"></div>
                                                   
                                                    <div class="form-group col-md-5">
                                                        <label>Description</label>
                                                        <input type="text" name="items[0][category_items][0][description]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Unit</label>
                                                        <input type="text" name="items[0][category_items][0][unit]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Qty</label>
                                                        <input type="number" name="items[0][category_items][0][quantity]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Rate</label>
                                                        <input type="number" name="items[0][category_items][0][rate]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Amount</label>
                                                        <input type="number" name="items[0][category_items][0][amount]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Uplaod Reference</label>
                                                        <input type="file" name="items[0][category_items][0][attachment]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12 text-right">
                                                        <button type="button" class="btn btn-sm btn-danger delete-item" style="display: none;">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-success btn-sm save-boq-item"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                                            <button type="button" class="btn btn-outline-primary btn-sm add-boq-item">+ Add More</button>
                                        </div>
                                    
                                    @endif
                                    
                                    
                                    
                                    
                                </div>
                                <button type="button" class="btn btn-outline-secondary btn-sm add-category-group">+ Add Category</button>
                                

                            </div>
                            
                            <!-- Step 3 -->
                            <div class="form-step">
                                <div class="row">
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

                            <!-- Navigation -->
                            <div class="row form-navigation mt-4">
                                <div class="col-12">
                                    <button type="button" class=" ps-btn ps-btn--md gray-bg px-4" id="prevBtn" onclick="prevStep()">Previous</button>
                                    <button type="button" class="ps-btn ps-btn--md lightblue-bg save-and-next px-4 float-right" id="nextBtn">Save & Next</button>
                                    <button type="button" class="ps-btn ps-btn--md px-4 float-right final-submission" id="submitBtn" style="display: none;">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="module" src="{{ asset('allUsers/customer/bill-of-quantity.js') }}"></script>
<script type="text/javascript" src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>
<!-- JS Logic -->

<script>
  const mainCategoryOptions =   `@foreach(getCategories() as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach`;
</script>

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

    document.getElementById('boqForm').addEventListener('submit', function (e) {
        e.preventDefault();
        // alert('Form submitted successfully!');
        // Add AJAX if needed
    });

    document.addEventListener('DOMContentLoaded', function () {
        showStep(currentStep);
    });

// --------End of Step form login-----------------------------------------------------------

</script>



<script>
    
// --------Category Data Logic -------------------------------------------------------------



    function getMoreSubCategories(selectElement) {
        const selectedCategoryId = +selectElement.value;
        const type = selectElement.dataset.type;
        let categoryIndex = selectElement.parentElement?.parentElement?.dataset['categoryIndex'];
        let wrapperChildIndex = selectElement.parentElement?.parentElement?.dataset['wrapperChild'];

        console.log(categoryIndex, wrapperChildIndex);

    
        if (!selectedCategoryId) return;
    
        const catData = getCategoryData(selectedCategoryId); // assume sync or handle async if needed
    
        if (catData?.data?.categories?.length > 0) {
            const optionsTemplate = catData.data.categories.map(category =>
                `<option value="${category.id}" data-category-name="${category.category_name}">${category.category_name}</option>`
            ).join('');
    
            if (type === 'sub-category') {
                const categoryTemplate = `
                    <div class="form-group col-md-12" style="width:250px">
                        <label>Sub Sub Category</label>
                        <select class="form-select sub-sub-category" name="items[${categoryIndex}][category_items][${wrapperChildIndex}][sub_sub_category]">
                            <option value="">Select</option>
                            ${optionsTemplate}
                        </select>
                    </div>`;
            
                const container = selectElement.closest('.form-group').nextElementSibling;
            
                if (container && container.classList.contains('sub-sub-category-div')) {
                    container.innerHTML = categoryTemplate;
            
                    // ✅ Properly initialize select2 on the newly added select element
                    $(container).find('.sub-sub-category').select2();
                }
            }
    
        }
    }

    // this function gets and sets categories, brands, filters and options dynamically to the front end.
    function getMoreCategories(selectEl) {
        // console.log('sdfsdfsd')
        let selectedCategoryId = +selectEl.value;
        if (!selectedCategoryId) return;
        // Get the current .category-group
        const categoryGroup = selectEl.closest('.category-group');
        
        // Get all sub-category <select> elements inside this group
        const subCategorySelects = categoryGroup.querySelectorAll('.sub-category');
    
        // Clear and disable all while fetching
        subCategorySelects.forEach(select => {
            select.innerHTML = '<option disabled selected>Loading...</option>';
            select.disabled = true;
        });
      
          let mappedBrandTemplate = '';
          let brandTemplate = '';
          let category_id = selectedCategoryId;
          let parent_category_id = selectedCategoryId; 
          const catData =  getCategoryData(selectedCategoryId);
          let  optionsTemplate = '<option value="" disabled selected>select</option>';
        
        if(catData != null){
            catData.data.categories.forEach(category => {
                optionsTemplate += `<option value="${ category.id }"  data-category-name="${ category.category_name }">${ category.category_name }</option>`;
            });
        }
        
              
            // Clear and disable all while fetching
            subCategorySelects.forEach(select => {
                select.innerHTML = optionsTemplate;
                select.disabled = false;
            });
            return ;
        
     
    }
    
    function getCategoruDataWhenClickAddMore(category_id){
        let catData =  getCategoryData(category_id);
        let optionsTemplate;
        
        if(catData != null){
            catData.data.categories.forEach(category => {
                optionsTemplate += `<option value="${ category.id }"  data-category-name="${ category.category_name }">${ category.category_name }</option>`;
            });
        }
        console.log("optionsTemplate",optionsTemplate);
       return  optionsTemplate;
    }
   
    function getCategoryData(category_id){
        
        // document.querySelector('.toggleLoader')?.classList.remove('d-none'); // Show loader
        let catData = null;
        let parent_category_id = category_id;
        $.ajax({
            async: false,
            method: "get",
            url: route('get-categories-filters-and-product-types'),
            data: {
              category_id,
              parent_category_id
            },
            dataType: 'json',
            success: function(data) {
              catData = data;
            //  document.querySelector('.toggleLoader')?.classList.remove('d-none'); // Show loader 
            }
    
          }); 
         return catData; 
    }

// --------End of category data login ------------------------------------------------------


// ---------Add and Appned category Data ---------------------------------------------------

function initSelect2(){
        $('.custom-select, .form-select').select2({
            width: '100%',
            dropdownCssClass: "max-z-index",
            allowClear: true,
            placeholder: 'Select',
        });
}




var  categoryIndex = document.getElementById('category-groups-wrapper').children.length || 0;



document.addEventListener('click', function (e) {
    if (e.target.classList.contains('add-category-group')) {
        addCategoryGroup();
    }
});
function addCategoryGroup() {
    const wrapper = document.getElementById('category-groups-wrapper');
   console.log(categoryIndex);
    const group = document.createElement('div');
    group.className = 'category-group border rounded p-3 mb-4';
    group.setAttribute('data-category-index', categoryIndex);

    group.innerHTML = `
        <div class="form-group">
            <label>Category</label>
            <select class="form-select  parent-category" name="items[${categoryIndex}][category_id]" onchange="getMoreCategories(this)">
                <option value="" disabled selected>select</option>
                
                ${mainCategoryOptions}
            </select>
        </div>

        <div class="boq-items-wrapper">
            ${getBoqItemHTML(categoryIndex)}
        </div>

        <div class="mt-2 d-flex justify-content-between">
            <button type="button" class="btn btn-outline-primary btn-sm add-boq-item">+ Add More</button>
            <button type="button" class="btn btn-outline-danger btn-sm delete-category-group">Delete Category</button>
        </div>
    `;

    wrapper.appendChild(group);
    categoryIndex++;
    initSelect2()
}

function getBoqItemHTML(categoryGroupIndex,wrapperChild = 0,optionsTemplate = '') {
    // console.log("optionsTemplate22",optionsTemplate,categoryIndex);
    return `
        <div class="boq-item form-row" data-category-index="${categoryGroupIndex}" data-wrapper-child="${wrapperChild}">
            <div class="form-group col-md-3">
                <label>Sub category</label>
                <select class="form-select sub-category " name="items[${categoryGroupIndex}][category_items][${wrapperChild}][sub_category]"  onchange="getMoreSubCategories(this)" data-type="sub-category">
                    <option value="" disabled selected>select</option>
                    ${optionsTemplate}
                </select>
            </div>
            <div class="sub-sub-category-div"></div>
            <div class="form-group col-md-5">
                <label>Description</label>
                <input type="text" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][description]" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label>Unit</label>
                <input type="text" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][unit]" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label>Qty</label>
                <input type="number" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][quantity]" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label>Rate</label>
                <input type="number" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][rate]" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label>Amount</label>
                <input type="number" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][amount]" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Uplaod Reference</label>
                    <input type="file" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][attachment]" class="form-control">
            </div>
            <div class="form-group col-md-12 text-right">
                <button type="button" class="btn btn-sm btn-danger delete-item" style="display: none;">Delete</button>
            </div>
        </div>
    `;
}

// Delegate add/delete events
document.addEventListener('click', function (e) {
    // Add item inside category group
    if (e.target.classList.contains('add-boq-item')) {
        // console.log(' when click add Category categoryIndex 111:', categoryIndex);
      
        // Get the parent element (for example, the category group div)
        let parentGroup = e.target.closest('.category-group'); // change this to your actual parent class

        // Get all category groups under the wrapper
        let allGroups = Array.from(this.querySelectorAll('.category-group'));

        // Find the index of the clicked parent
        var categoryIndexWhenClickAddItem = allGroups.indexOf(parentGroup);
        
        
        
        const group = e.target.closest('.category-group');
        const parentCategoryEle = group.querySelector('.parent-category');
        const parentCategoryId = parentCategoryEle?.value;
        const wrapper = group.querySelector('.boq-items-wrapper');
        let wrapperChild = wrapper.children.length;
        const index = group.getAttribute('data-category-index');
        
        let subCatOptionsTemplate = '';
        
        console.log(parentCategoryEle,parentCategoryId);
        if(parentCategoryId != null && parentCategoryId != '')
        subCatOptionsTemplate =  getCategoruDataWhenClickAddMore(parentCategoryId)
        
        const newItem = document.createElement('div');
        newItem.innerHTML = getBoqItemHTML(categoryIndexWhenClickAddItem,wrapperChild,subCatOptionsTemplate);
        wrapper.appendChild(newItem.firstElementChild);
        // Show delete buttons for all items
        updateDeleteItemButtons(wrapper);
        initSelect2()
    
    }

    // Delete a BOQ item
    if (e.target.classList.contains('delete-item')) {
        const wrapper = e.target.closest('.boq-items-wrapper');
        const item = e.target.closest('.boq-item');
        if (wrapper.querySelectorAll('.boq-item').length > 1) {
            item.remove();
        }
        updateDeleteItemButtons(wrapper);
    }

    // Delete a whole category group
    if (e.target.classList.contains('delete-category-group')) {
        const group = e.target.closest('.category-group');
        group.remove();
    }
});

function updateDeleteItemButtons(wrapper) {
    const items = wrapper.querySelectorAll('.boq-item');
    items.forEach((item, idx) => {
        const btn = item.querySelector('.delete-item');
        btn.style.display = items.length > 1 ? 'inline-block' : 'none';
    });
}

// Init first category group
// addCategoryGroup();


// ---------End of category data logic -----------------------------------------------------

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
