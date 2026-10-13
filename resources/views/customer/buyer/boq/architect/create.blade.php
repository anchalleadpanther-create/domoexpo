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
                <div class="ps-form__header mb-5 d-flex justify-content-between align-items-center flex-wrap">
                    <h2 class="mb-0">BOQ Request Form</h2>
                    @if(in_array(auth()->user()->account_type, ['Architect', 'Developer']))
                    <div class="d-flex gap-2 flex-wrap mt-2 mt-md-0">
                        <a href="{{ route('buyer.boq-templates') }}" class="btn btn-outline-secondary btn-sm">My Templates</a>
                        @if(!empty($hasBoqItems))
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#saveBoqTemplateModal">Save as Template</button>
                        @endif
                    </div>
                    @endif
                </div>

                <div class="ps-my-account">
                    <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important">
                        <ul class="progressbar mb-4">
                            <li class="active">Project Info</li>
                            @if(auth()->user()->account_type != 'Developer')<li>BOQ Details</li>@endif
                            <li> Upload Reference Documents</li>
                        </ul>

                        <form id="boqForm" class="create-rfq-form" method="post" action="">
                            <input type="hidden" name="boq_id" value="{{  $boq->id ?? request()->segment('3') }}" >
                            <input type="hidden" name="created_by" value="{{  $boq->created_by ?? auth()->user()->account_type }}" >
                           
                            <!-- Step 1 -->
                            <div class="form-step active">
                                <div class="row">
                                    <div class="col-12">
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
                                                    <option value="{{$value->dropdown_value}}" @isset($boq->boq_type) {{ $boq->boq_type == $value->dropdown_value ? 'selected' : ''  }} @endisset>{{$value->dropdown_value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                
                                <!--================================================================================================-->
                                @if(auth()->user()->account_type == 'Developer')
                                
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Developer Amount</label>
                                            <input type="number" min="0" name="developer_amount" value="{{ $boq->developer_amount ?? ''  }}" class="form-control" >
                                        </div>
                                    </div>
                                
                                    <div class="col-12" id="architects_div">
                                        <div class="form-group">
                                           <label>Architects</label>
                                           <select class="form-select " id="architects" name="architects[]"  multiple required>
                                                <option value="">Select</option>  
                                                @foreach($architects as $architect)
                                                    <option value="{{$architect->id}}" @isset($boq->mappedContractorType) @selected(in_array($architect->id,$boq->mappedArchitect()->pluck('architect_id')->toArray())) @endisset>{{$architect->first_name}} {{$architect->last_name}} | {{$architect->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-12 " id="contractor_type_div">
                                        <div class="form-group">
                                            <label>BOQ Project Need</label>
                                    
                                            @php
                                                $selectedTypes = isset($boq->project_need) ? $boq->project_need : [];
                                            @endphp
                                    
                                            <div class="row">
                                                @foreach(getDropdowns('BOQ Project Need')->dropdownValues as $value)
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input 
                                                                type="checkbox" class="form-check-input" name="project_need[]" 
                                                                value="{{ $value->dropdown_value }}" id="contractor_{{ $loop->index }}"
                                                                {{ in_array($value->dropdown_value, $selectedTypes) ? 'checked' : '' }} >
                                                            <label class="form-check-label" for="contractor_{{ $loop->index }}">
                                                                {{ $value->dropdown_value }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                    
                                        </div>
                                    </div>
                                    
                                @endif
                                <!--================================================================================================-->    
                                
                                
                                
                                <!--===============================================================================================-->
                                    @if(auth()->user()->account_type == 'Architect')
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>You want to send this Project?</label>
                                            <select class="form-select" id="project_sent_to" name="project_sent_to" required>
                                                <option value="Choose" selected>Choose</option>
                                                <option value="Contractor Type" >Contractor Type</option>
                                                <option value="Direct Contractor">Direct Contractor</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 d-none"  id="contractor_type_div">
                                        <div class="form-group">
                                           <label>Contractor Type</label>
                                           <select class="form-select " id="contractor_type" name="contractor_type[]"  multiple required>
                                                <option value="">Select</option>  
                                                @foreach(getDropdowns('Contractor Type')->dropdownValues as $value)
                                                    <option value="{{$value->dropdown_value}}" @isset($boq->mappedContractorType) {{ in_array($value->dropdown_value,$boq->mappedContractorType->pluck('contractor_type')->toArray()) ? 'selected' : '' }} @endisset>{{$value->dropdown_value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 d-none" id="contractors_div">
                                        <div class="form-group">
                                           <label>Contractors</label>
                                           <select class="form-select " id="contractors" name="contractors[]"  multiple required>
                                                <option value="">Select</option>  
                                                @foreach($contractors as $contractor)
                                                    <option value="{{$contractor->id}}" @isset($boq->mappedContractorType) {{ in_array($value->dropdown_value,$boq->mappedContractorType->pluck('contractor_type')->toArray()) ? 'selected' : '' }} @endisset>{{$contractor->first_name}} {{$contractor->last_name}} | {{$contractor->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                
                                    <div class="col-12" id="quantity_surveyor_div">
                                        <div class="form-group">
                                            <label>Quantity Surveyor (If You want to send this Project to QA?)</label>
                                            <select class="form-select" id="quantity_surveyor" name="quantity_surveyors[]" multiple>
                                                <option value="">Choose</option>
                                                @foreach($quantitySurveyors as $value)
                                                <option value="{{ $value->id }}">{{ 'ID : '. $value->id }} | {{ $value->first_name }} {{ $value->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    @endif
                                <!--===============================================================================================-->
                                
                                
                                
                                
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
                                            <label>Project Area </label>
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
                                           <input class="form-control  bg-white" id="boq_deadline" name="boq_deadline" type="text" placeholder= "choose date" required />
                                        </div>
                                    </div> 
                                              
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                           <label>Validity Date</label>
                                            <select class="form-select" name="validity_date" name="validity_date" required>
                                                <option value="1 Month" @isset($boq->validity_date) {{$boq->validity_date == "1 Month" ? 'selected' : ''}}    @endisset>1 Month</option>
                                                <option value="2 Month" @isset($boq->validity_date) {{$boq->validity_date == "2 Months" ? 'selected' : ''}}    @endisset>2 Months</option>
                                                <option value="3 Month" @isset($boq->validity_date) {{$boq->validity_date == "3 Months" ? 'selected' : ''}}    @endisset>3 Months</option>
                                                <option value="4 Month" @isset($boq->validity_date) {{$boq->validity_date == "4 Months" ? 'selected' : ''}}    @endisset>4 Months</option>
                                                <option value="5 Month" @isset($boq->validity_date) {{$boq->validity_date == "5 Months" ? 'selected' : ''}}    @endisset>5 Months</option>
                                                <option value="6 Month" @isset($boq->validity_date) {{$boq->validity_date == "6 Months" ? 'selected' : ''}}    @endisset>6 Months</option>
                                            </select>
                                           <!--<input class="form-control bg-white" id="validity_date" name="validity_date" placeholder="choose date"  type="text" required />-->
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>


                            @if(auth()->user()->account_type != 'Developer')
                            <!-- Step 2 -->
                            <div class="form-step">
                                @if(in_array(auth()->user()->account_type, ['Architect', 'Developer']))
                                    @php $boq = $boq ?? (object) ['id' => null]; @endphp
                                    @include('customer.buyer.boq.qs.partials.template-selector')
                                @endif
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
                                                   @forelse($mainItem->getSubItem as $subKey => $subItem) 
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
                                                        <div class="form-group col-md-3">
                                                            <label>Unit</label>
                                                            <select class="form-select" name="items[{{$mainKey}}][category_items][{{$subKey}}][unit]">
                                                                @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                                                                    <option value="{{$value->dropdown_value}}" @isset($subItem->unit) {{ $subItem->unit == $value->dropdown_value ? 'selected' : ''  }} @endisset>{{$value->dropdown_value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Qty</label>
                                                            <input type="number" name="items[{{$mainKey}}][category_items][{{$subKey}}][quantity]" value="{{ $subItem->quantity ?? ''}}" min="0"  value="0" class="form-control item-quantity">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Rate</label>
                                                            <input type="number" name="items[{{$mainKey}}][category_items][{{$subKey}}][rate]" value="{{ $subItem->rate ?? ''}}"  min="0"  value="0" class="form-control item-rate">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Amount</label>
                                                            <input type="number" name="items[{{$mainKey}}][category_items][{{$subKey}}][amount]"  value="{{ $subItem->amount ?? ''}}"  min="0"  value="0" class="form-control item-total-amount" readonly>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Uplaod Reference @if(isset($subItem->reference_file))<a class="text-success" target="_blank" href="{{asset('uploads/rfq/'.$subItem->attachment_file )}}"> <i class="fa fa-download"></i></a>@endif</label> 
                                                            <input type="file" name="items[{{$mainKey}}][category_items][{{$subKey}}][attachment]" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-12 text-right">
                                                            <button type="button" class="btn btn-sm btn-danger delete-item" style="display: inline-block;">Delete</button>
                                                        </div>
                                                    </div>
                                                   @empty
                                                    <div class="boq-item form-row" data-category-index="{{$mainKey}}" data-wrapper-child="0">
                                                        <div class="form-group col-md-3">
                                                            <label>Sub category</label>
                                                            <select class="form-select sub-category" name="items[{{$mainKey}}][category_items][0][sub_category]" onchange="getMoreSubCategories(this)" data-type="sub-category">
                                                                <option value="">select</option>
                                                                @if(!empty($mainItem->category_id))
                                                                    @foreach(getCategories($mainItem->category_id) as $subcaetgory)
                                                                        <option value="{{$subcaetgory->id}}">{{$subcaetgory->category_name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="sub-sub-category-div"></div>
                                                        <div class="form-group col-md-5">
                                                            <label>Description</label>
                                                            <input type="text" name="items[{{$mainKey}}][category_items][0][description]" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Unit</label>
                                                            <select class="form-select" name="items[{{$mainKey}}][category_items][0][unit]">
                                                                @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                                                                    <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Qty</label>
                                                            <input type="number" name="items[{{$mainKey}}][category_items][0][quantity]" min="0" value="0" class="form-control item-quantity">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Rate</label>
                                                            <input type="number" name="items[{{$mainKey}}][category_items][0][rate]" min="0" value="0" class="form-control item-rate">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Amount</label>
                                                            <input type="number" name="items[{{$mainKey}}][category_items][0][amount]" min="0" value="0" class="form-control item-total-amount" readonly>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Uplaod Reference</label>
                                                            <input type="file" name="items[{{$mainKey}}][category_items][0][attachment]" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-12 text-right">
                                                            <button type="button" class="btn btn-sm btn-danger delete-item" style="display: none;">Delete</button>
                                                        </div>
                                                    </div>
                                                   @endforelse
                                                </div>
                                                <div class="mt-2 d-flex justify-content-between flex-wrap gap-2">
                                                    <div>
                                                        <button type="button" class="btn btn-success btn-sm save-boq-item"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                                                        <button type="button" class="btn btn-primary btn-sm add-boq-item">+ Add More</button>
                                                    </div>
                                                    <button type="button" class="btn btn-outline-danger btn-sm delete-category-group">Delete Category</button>
                                                </div>
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
                                                    <div class="form-group col-md-3">
                                                        <label>Unit</label>
                                                        <select class="form-select" name="items[0][category_items][0][unit]">
                                                            @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                                                                <option value="{{$value->dropdown_value}}" >{{$value->dropdown_value}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Qty</label>
                                                        <input type="number" name="items[0][category_items][0][quantity]"  min="0"  value="0"  class="form-control item-quantity">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Rate</label>
                                                        <input type="number" name="items[0][category_items][0][rate]"  min="0"  value="0"  class="form-control item-rate">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Amount</label>
                                                        <input type="number" name="items[0][category_items][0][amount]"  min="0" value="0"  class="form-control item-total-amount" readonly>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Uplaod Reference</label>
                                                        <input type="file" name="items[0][category_items][0][attachment]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12 text-right">
                                                        <button type="button" class="btn btn-sm btn-danger delete-item" style="display: none;">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 d-flex justify-content-between flex-wrap gap-2">
                                                <div>
                                                    <button type="button" class="btn btn-success btn-sm save-boq-item"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                                                    <button type="button" class="btn btn-outline-primary btn-sm add-boq-item">+ Add More</button>
                                                </div>
                                                <button type="button" class="btn btn-outline-danger btn-sm delete-category-group" style="display: none;">Delete Category</button>
                                            </div>
                                        </div>
                                    
                                    @endif
                                    
                                </div>
                                <button type="button" class="btn btn-outline-secondary btn-sm add-category-group">+ Add Category</button>
                                

                            </div> 
                            @endif
                            
                            <!-- Step 3 -->
                            <div class="form-step">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Attachment 1  
                                            @isset($boq) @if(!empty($boq->attachment_file_one))<a class="text-primary" href="{{asset('uploads/rfq/'.$boq->attachment_file_one)}}" target="_blank">[Download Reference 1]</a> @endif @endisset
                                            </label>
                                            <input type="file" name="attachment_one" class="form-control">
                                        </div>
                                    </div>
                                   
                                   <div class="col-6">
                                        <div class="form-group">
                                            <label>Attachment 2
                                             @isset($boq) @if(!empty($boq->attachment_file_two))<a class="text-primary" href="{{asset('uploads/rfq/'.$boq->attachment_file_two)}}" target="_blank">[Download Reference 2]</a> @endif @endisset
                                           </label>
                                            <input type="file" name="attachment_two" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Attachment 3
                                             @isset($boq) @if(!empty($boq->attachment_file_three))<a class="text-primary" href="{{asset('uploads/rfq/'.$boq->attachment_file_three)}}" target="_blank">[Download Reference 3]</a> @endif @endisset
                                           </label>
                                            <input type="file" name="attachment_three" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Attachment 4
                                             @isset($boq) @if(!empty($boq->attachment_file_four))<a class="text-primary" href="{{asset('uploads/rfq/'.$boq->attachment_file_four)}}" target="_blank">[Download Reference 4]</a> @endif @endisset
                                           </label>
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
                                    
                                    <button type="button" class="ps-btn ps-btn--md px-4 bg-danger float-right final-submission mx-3"  id="submitBtn" style="display: none;">Submit</button>
                                    @if(auth()->user()->account_type != 'Developer')
                                    <button type="button" class="ps-btn ps-btn--md px-4  bg-success float-right save-without-submission" id="saveWithoutSubmissionBtn" style="display: none;">Save without Submission</button>
                                    @endif
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(in_array(auth()->user()->account_type, ['Architect', 'Developer']))
@include('customer.buyer.boq.qs.partials.template-modals')
<script type="module" src="{{ asset('allUsers/customer/boq-template.js') }}"></script>
@endif
<script type="module" src="{{ asset('allUsers/customer/bill-of-quantity.js') }}"></script>
<script type="text/javascript" src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>
<!-- JS Logic -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    // document.getElementById('project_sent_to').addEventListener('change', function (e) {
    //     let project_sent_to =  e.value;
    //     console.log(project_sent_to);
       
    // });
</script>


<script>
   $(document).ready(function () {
    // Initialize Select2
    $('#project_sent_to').select2();

    // Add change listener after initialization
    $('#project_sent_to').on('change', function () { 
        let selectedValue = $(this).val();

        if (selectedValue === 'Direct Contractor') {
            $('#contractor_type_div').addClass('d-none');
            $('#contractors_div').removeClass('d-none');
            // $('#quantity_surveyor_div').addClass('d-none');
        } else if(selectedValue === 'Contractor Type') {
            $('#contractor_type_div').removeClass('d-none');
            $('#contractors_div').addClass('d-none');
            // $('#quantity_surveyor_div').removeClass('d-none');
        }else{  
            $('#contractor_type_div').addClass('d-none');
            $('#contractors_div').addClass('d-none');
            // $('#quantity_surveyor_div').removeClass('d-none');
            
        }

        console.log("Selected value:", selectedValue);
    });
});
</script>

<script>
//   flatpickr("#boq_deadline,#validity_date", {
//     dateFormat: "Y-m-d"
//     // defaultDate: "{{ $boq->boq_deadline ?? date('Y-m-d', strtotime('+1 month')) }}"
//   });

  
  // Helper to add months to a date
  function addMonths(date, months) {
    const d = new Date(date);
    d.setMonth(d.getMonth() + months);
    return d;
  }

  const today = new Date();

  // BOQ Deadline Picker
  const boqDeadlinePicker = flatpickr("#boq_deadline", {
    dateFormat: "Y-m-d",
    minDate: addMonths(today, 0), // must be at least one month ahead
    defaultDate: "{{ isset($boq->boq_deadline) ? $boq->boq_deadline : '' }}",
    onChange: function(selectedDates, dateStr) {
      if (dateStr) {
        // Set min date for validity date picker to one day after selected deadline
        const selected = new Date(dateStr);
        selected.setDate(selected.getDate() + 1);
        validityDatePicker.set('minDate', selected);
      }
    }
  });

  // Validity Date Picker
  const validityDatePicker = flatpickr("#validity_date", {
    dateFormat: "Y-m-d",
    minDate: addMonths(today, 1), // will be updated based on boq_deadline
    defaultDate: "{{ isset($boq->validity_date) ? $boq->validity_date : '' }}"
  });
</script>
 


<script>
  const mainCategoryOptions =   `@foreach(getCategories() as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach`;
</script>

<script>
 let currentStep = 1;
let skipSecondStep = false;

// Check if URL contains 'edit-boq'
const isEditBoqPage = window.location.href.includes("edit-boq");

$(document).ready(function () {

    $('#quantity_surveyor').on('change', function () {
        // Do nothing if it's edit-boq page
        if (isEditBoqPage) return;

        let selectedQS = $(this).val();

        // If at least 1 QS is selected, mark to skip step 2
        if (selectedQS && selectedQS.length > 0) {
            skipSecondStep = true;

            // If currently on step 1, immediately jump to step 3
            if (currentStep === 1) {
                currentStep = 3; // jump directly to step 3
                // showStep(currentStep);
            }
        } else {
            // If none selected, don’t skip
            skipSecondStep = false;
        }
    });
});

function showStep(step) {
    console.log(step)
    const steps = document.querySelectorAll('.form-step');
    const progressItems = document.querySelectorAll('.progressbar li');
    const totalSteps = steps.length;
    
    
    console.log(totalSteps)

    steps.forEach((stepDiv, index) => {
        stepDiv.classList.toggle('active', index === step - 1);
    });

    progressItems.forEach((item, index) => {
        item.classList.toggle('active', index < step);
    });

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    const saveWithoutSubmissionBtn = document.getElementById('saveWithoutSubmissionBtn');
    
    if (prevBtn) {
        prevBtn.style.display = (step == 1) ? 'none' : 'inline-block';
    }
    
    if (nextBtn) {
        nextBtn.style.display = (step == totalSteps) ? 'none' : 'inline-block';
    }
    
    if (submitBtn) {
        submitBtn.style.display = (step == totalSteps) ? 'inline-block' : 'none';
    }
    
    if (saveWithoutSubmissionBtn) {
        saveWithoutSubmissionBtn.style.display = (step == totalSteps) ? 'inline-block' : 'none';
    }
    
}

function nextStep() {
    const totalSteps = document.querySelectorAll('.form-step').length;

    // Skip logic only if NOT on edit-boq page
    if (!isEditBoqPage) {
        if (skipSecondStep && currentStep === 1) {
            currentStep = 3; // jump directly to 3
        } else if (currentStep < totalSteps) {
            currentStep++;
        }
    } else {
        // Normal next step behavior
        if (currentStep < totalSteps) {
            currentStep++;
        }
    }
    

    showStep(currentStep);
}

window.nextStep = nextStep;

function prevStep() {
    // Skip logic only if NOT on edit-boq page
    if (!isEditBoqPage) {
        if (skipSecondStep && currentStep === 3) {
            currentStep = 1; // jump back directly to step 1
        } else if (currentStep > 1) {
            currentStep--;
        }
    } else {
        // Normal previous step behavior
        if (currentStep > 1) {
            currentStep--;
        }
    }

    showStep(currentStep);
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




var categoryIndex = 0;

function syncCategoryIndex() {
    const wrapper = document.getElementById('category-groups-wrapper');
    if (!wrapper) return;

    let maxIndex = -1;
    wrapper.querySelectorAll('.parent-category').forEach((select) => {
        const match = select.name.match(/items\[(\d+)\]/);
        if (match) {
            maxIndex = Math.max(maxIndex, parseInt(match[1], 10));
        }
    });

    categoryIndex = maxIndex + 1;
}

function updateCategoryGroupDeleteButtons() {
    const wrapper = document.getElementById('category-groups-wrapper');
    if (!wrapper) return;

    const groups = wrapper.querySelectorAll('.category-group');
    groups.forEach((group) => {
        const btn = group.querySelector('.delete-category-group');
        if (btn) {
            btn.style.display = groups.length > 1 ? 'inline-block' : 'none';
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    syncCategoryIndex();
    document.querySelectorAll('.boq-items-wrapper').forEach(updateDeleteItemButtons);
    updateCategoryGroupDeleteButtons();
});

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
            <div>
                <button type="button" class="btn btn-success btn-sm save-boq-item"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                <button type="button" class="btn btn-outline-primary btn-sm add-boq-item">+ Add More</button>
            </div>
            <button type="button" class="btn btn-outline-danger btn-sm delete-category-group">Delete Category</button>
        </div>
    `;

    wrapper.appendChild(group);
    categoryIndex++;
    initSelect2();
    updateCategoryGroupDeleteButtons();
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
            
            <div class="form-group col-md-3">
                <label>Unit</label>
                <select class="form-select" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][unit]">
                    @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                        <option value="{{$value->dropdown_value}}" >{{$value->dropdown_value}}</option>
                    @endforeach
                </select>
            </div>
            
            
            <div class="form-group col-md-2">
                <label>Qty</label>
                <input type="number" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][quantity]"  min="0"  class="form-control item-quantity">
            </div>
            <div class="form-group col-md-2">
                <label>Rate</label>
                <input type="number" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][rate]" min="0"  class="form-control  item-rate">
            </div>
            <div class="form-group col-md-2">
                <label>Amount</label>
                <input type="number" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][amount]" min="0"  class="form-control item-total-amount" readonly>
            </div>
            <div class="form-group col-md-3">
                <label>Uplaod Reference</label>
                    <input type="file" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][attachment]" class="form-control">
            </div>
            <div class="form-group col-md-12 text-right">
                <button type="button" class="btn btn-sm btn-danger delete-item" style="display: none;">Delete</button>
            </div>
        </div>
    `;
}



  // Function to update the amount field in a given row
  function updateAmount(row) {
    const quantity = parseFloat(row.querySelector('.item-quantity')?.value) || 0;
    const rate = parseFloat(row.querySelector('.item-rate')?.value) || 0;
    const amountInput = row.querySelector('.item-total-amount');

    if (amountInput) {
      amountInput.value = (quantity * rate).toFixed(2);
    }
  }

  // Event delegation: Listen for changes on quantity or rate
  document.addEventListener('input', function (e) {
    // Only respond to item-quantity or item-rate inputs
    if (e.target.classList.contains('item-quantity') || e.target.classList.contains('item-rate')) {
      const row = e.target.closest('.boq-items-wrapper .boq-item'); // find the row inside the wrapper
      if (row) {
        updateAmount(row);
      }
    }
  });



// Delegate add/delete events
document.addEventListener('click', function (e) {
    // Add item inside category group
    if (e.target.classList.contains('add-boq-item')) {
        // console.log(' when click add Category categoryIndex 111:', categoryIndex);
      
        // Get the parent element (for example, the category group div)
        let parentGroup = e.target.closest('.category-group'); // change this to your actual parent class

        const group = e.target.closest('.category-group');
        const parentCategoryEle = group.querySelector('.parent-category');
        const parentCategoryId = parentCategoryEle?.value;
        const wrapper = group.querySelector('.boq-items-wrapper');
        let wrapperChild = wrapper.children.length;

        const categoryIndexMatch = parentCategoryEle?.name?.match(/items\[(\d+)\]/);
        var categoryIndexWhenClickAddItem = categoryIndexMatch
            ? parseInt(categoryIndexMatch[1], 10)
            : Array.from(document.querySelectorAll('.category-group')).indexOf(group);
        
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
        const wrapper = document.getElementById('category-groups-wrapper');
        const groups = wrapper?.querySelectorAll('.category-group') ?? [];

        if (groups.length <= 1) {
            return;
        }

        const group = e.target.closest('.category-group');
        if (group) {
            group.remove();
            syncCategoryIndex();
            updateCategoryGroupDeleteButtons();
        }
    }
});

function updateDeleteItemButtons(wrapper) {
    const items = wrapper.querySelectorAll('.boq-item');
    items.forEach((item) => {
        const btn = item.querySelector('.delete-item');
        if (btn) {
            btn.style.display = items.length > 1 ? 'inline-block' : 'none';
        }
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


@endsection
