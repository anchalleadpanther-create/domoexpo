
@extends('customer.partials-fn.buyer.header')
@section('content')
<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2>Request for Quotation </h2>
               <!--<p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.</p>-->
               
            </div>
           
            
            <!-- -------------------------------------------------------------------------------------------------------------
             -----------------------------------------------------------------------------------------------------------------
             -------------------------------------------------------------------------------------------------------------- -->

            <div class="ps-my-account">
                <!--<form class="ActiveForm" action="{{route('buyer.profile-update',[auth()->guard('buyer')->user()->id])}}" method="post"  enctype="multipart/form-data">-->
                <!--   @csrf -->
                    <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important" >
                        <div id="main">
                            <div id="div7"  class="first {{ Request::segment(3) == 'rfq-detail' ? 'current' : '' }}" style="display: none;">
                               <div class="ps-tabs">
                                  <div class="ps-tab active"  >
                                     <div class="ps-form__content">
                                         
                                        <div class="progress mb-5">
                                           <div class="bg-dark " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 33.33%;"> 
                                           </div>
                                        </div>
                                        
                                        <form class="ActiveForm" action="{{route('buyer.buyer-save-rfq')}}" method="post"  enctype="multipart/form-data">
                                            @csrf 
                                            <input class="form-control" name="rfq_id"  value="{{ $rfq_detail->id ?? ''}}" type="hidden" placeholder="">
                                            <input class="form-control" name="next_rfq_step"  value="rfq-item-list" type="hidden" placeholder="">
                                            
                                           <div class="row">
                                              <div class="col-sm-12 text-center">
                                                 <h4 class="mb-4 login_heading">RFQ Detail</h4>
                                              </div>
                                              <div class="col-sm-12">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Title</label>
                                                   <input class="form-control"  name="title" value="{{$rfq_detail->title ?? old('title')  }}" type="text" placeholder="" required />
                                                </div>
                                              </div>
                                              
                                            
                                              <div class="col-sm-12">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="quotation_type">Quotation Type</label>
                                                   <select class="form-control" name="quotation_type" required >
                                                       @foreach(getDropdowns('Quotation Type')->dropdownValues as $value)
                                                            <option value="{{ $value->dropdown_value }}" {{ $value->dropdown_value == old('quotation_type') ? 'selected' : '' }}>
                                                                {{ $value->dropdown_value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                              </div>
                                              
                                              
                                              <div class="col-sm-12">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Contractor Type</label>
                                                   <select class="form-select " name="contractor_type" multiple required>
                                                        <option value="">Select</option>  
                                                        @foreach(getDropdowns('Contractor Type')->dropdownValues as $value)
                                                            <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                              </div>

                                              <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Quotation Deadline</label>
                                                   <input class="form-control" id="quotation_deadline" name="quotation_deadline" value="{{ old('quotation_deadline') ?? date('Y-m-d', strtotime('+1 day')) }}"  type="date"required />
                                                </div>
                                              </div>
                                              
                                              <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Purchase Date</label>
                                                   <input class="form-control" id="purchase_date" name="purchase_date" value="{{ old('purchase_date') ?? date('Y-m-d', strtotime('+2 day')) }}"  type="date"required />
                                                </div>
                                              </div>
                                              
                                              <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Payment Terms</label>
                                                   <select class="form-control" name="payment_terms" required>
                                                        <option value="">Select</option>  
                                                        @foreach(getDropdowns('Payment Terms')->dropdownValues as $value)
                                                            <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                              </div>
                                               <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Purchase Type</label>
                                                   <select class="form-control" name="payment_type" required>
                                                        <option value="">Select</option>  
                                                        @foreach(getDropdowns('Purchase Type')->dropdownValues as $value)
                                                            <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                              </div>
                                             
                                           </div>
                                        </form>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            
                            <div id="div8 " class="{{ Request::segment(3) == 'rfq-item-list' ? 'current' : '' }}" style="display: none;">
                                <div class="ps-tabs ">
                                   <div class="ps-tab active ">
                                      <div class="ps-form__content">
                                       
                                      <div class="progress mb-5">
                                         <div class="bg-dark" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66.66%;"></div>
                                      </div>
                                      
                                        <form class="ActiveForm" action="{{route('buyer.buyer-save-rfq')}}" method="post"  enctype="multipart/form-data">
                                            @csrf 
                                            <input class="form-control" name="rfq_id"  value="{{ $rfq_detail->id ?? ''}}" type="hidden" placeholder="">
                                            <input class="form-control" name="next_rfq_step"  value="rfq-additional-detail" type="hidden" placeholder="">
                                            <div class="row">
                                            <!-- Contact Information -->
                                            <div class="col-sm-12 text-center">
                                                <h4 class="mb-4 login_heading">List</h4>
                                                <p class="prodcuts_error text-danger"></p>
                                            </div>
                                            
                                             <div class="col-sm-12">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Category</label>
                                                   <select class="form-control category" name="category" id="parent_category_select_options" data-type='sub-category' onchange="handleCategoryChange(this)" required>
                                                        <option value="">Select Category</option>  
                                                        @foreach (getCategories() as $category)
                                                            <option value="{{$category->id}}"    data-category-name="{{$category->category_name}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>  
                                                        @endforeach 
                                                    </select>
                                                </div>
                                              </div>
                                              
                                              <div class="col-sm-6 sub-categories"></div> 
                                              <div class="col-sm-6 sub-sub-categories"></div> 
                                              <div class="col-sm-6 sub-sub-sub-categories "></div> 
                                              <div class="col-sm-6 sub-sub-sub-sub-categories"></div>
                                                
                                            
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">UOM</label>
                                                   <select class="form-control" name="uom" id="uom" >
                                                        <option value="">Select</option>  
                                                        @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                                                            <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Quantity</label>
                                                   <input class="form-control" id="item_quantity" name="item_quantity" value="" type="number" placeholder="e.g., 50"  />
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Target Price</label>
                                                   <input class="form-control" id="target_price" name="target_price" value="" type="number" placeholder="e.g., 5000"  />
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Notes</label>
                                                   <input class="form-control" id="notes" name="notes" value="" type="text" placeholder=""  />
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <button class="ps-btn ps-btn--sm " onclick="addItemDataInTable()" type="button">Add Item</button>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <table class="table table-striped mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Category</th>
                                                            <th scope="col">UOM</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Notes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_body_for_item_data"></tbody>
                                                </table>
                                            </div>
                                            
                                         </div>
                                        </form>
        
                                      </div>
                                   </div>
                                </div>
                            </div>
                            
                            <div id="div9" class="{{ Request::segment(3) == 'rfq-additional-detail' ? 'current' : '' }} last" style="display: none;">
                                <div class="ps-tabs ">
                                   <div class="ps-tab active ">
                                      <div class="ps-form__content">
                                       
                                      <div class="progress mb-5">
                                         <div class="bg-dark" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                      </div>
                                        <form class="ActiveForm" action="{{route('buyer.buyer-save-rfq')}}" method="post"  enctype="multipart/form-data">
                                            @csrf 
                                            <input class="form-control" name="rfq_id"  value="{{ $rfq_detail->id ?? ''}}" type="hidden" placeholder="">
                                            <input class="form-control" name="next_rfq_step"  value="rfq-detail" type="hidden" placeholder="">
                                            <div class="row">
                                            <!-- Contact Information -->
                                            <div class="col-sm-12 text-center">
                                                <h4 class="mb-4 login_heading">Additional</h4>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Special Instructions</label>
                                                   <textarea class="form-control" cols="3" rows="5" id="spacial_instructions" name="spacial_instructions"  placeholder="Special Instructions" ></textarea>
                                                </div>
                                            </div>
                                            
                                            <!--<div class="col-sm-12">-->
                                            <!--    <div class="form-group mb-4">-->
                                            <!--       <label class="mb-2" for="contact_name">Delivery Location</label>-->
                                            <!--        <select class="form-control" name="delivery_location" required>-->
                                            <!--            <option value="">Select Location</option>  -->
                                            <!--            @forelse(Auth::guard('buyer')->user()->addresses as $address)-->
                                            <!--                <option value="{{$address->id}}"  {{old('delivery_location') == $address->id ? 'selected' : ''}}>{{$address->address_type}},{{$address->address_one}} {{$address->address_two}},{{$address->myCity->name}}, {{$address->myState->name}},{{$address->myCountry->name}}, {{$address->post_code}}</option>  -->
                                            <!--            @endforeach  -->
                                            <!--        </select>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            
                                            
                                           <div class="col-lg-12">
                                             <div class="row">
                                                 <div class="col-lg-12">
                                                     <h3>Project Location</h3>
                                                 </div>
                                                <!--<div class="col-md-6">-->
                                                <!--   <div class="form-group">-->
                                                <!--      <label for="firstName">First Name <span class="required">*</span></label>-->
                                                <!--      <input type="text" class="form-control" name="first_name" maxlength="50" id="firstName" value="" required="">-->
                                                <!--   </div>-->
                                                <!--</div>-->
                                                <!--<div class="col-md-6">-->
                                                <!--   <div class="form-group">-->
                                                <!--      <label for="lastName">Last Name <span class="required">*</span></label>-->
                                                <!--      <input type="text" class="form-control" name="last_name" maxlength="50" id="lastName" value="" required="">-->
                                                <!--   </div>-->
                                                <!--</div>-->
                                                <!--<div class="col-md-6">-->
                                                <!--   <div class="form-group">-->
                                                <!--      <label for="customerEmail">Email <span class="required">*</span></label>-->
                                                <!--      <input type="email" class="form-control"  name="address_email" maxlength="100" id="customerEmail" value="" required="">-->
                                                <!--   </div>-->
                                                <!--</div>-->
                                                <!--<div class="col-md-6">-->
                                                <!--   <div class="form-group">-->
                                                <!--      <label for="customerMobile">Phone <span class="required">*</span></label>-->
                                                <!--      <input type="number" class="form-control"  min="0" name="address_mobile" pattern="[0-9]{10}" id="customerMobile" value="" required="">-->
                                                <!--   </div>-->
                                                <!--</div>-->
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                   <div class="form-group">
                                                      <label for="customerAddress">Address <span class="required">*</span></label>
                                                      <input type="text" class="form-control" name="address_one" maxlength="100" id="customerAddress" value="" required="">
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                   <div class="form-group">
                                                      <label for="customerPostcode">Postcode <span class="required">*</span></label>
                                                      <input type="text" class="form-control" min="1" maxlength="20" name="post_code" id="customerPostcode" value="" required="">
                                                   </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                   <div class="form-group">
                                                      <label>Country <span class="required">*</span></label>
                                                      <select class="form-control countries" name="country" onchange="getStates(this)" data-class=".states" required>
                                                         <option value="">Select</option>
                                                         @foreach(getCountries() as $country)
                                                         <option value="{{$country->id}}">{{$country->name}}</option>
                                                         @endforeach
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                      <label>State <span class="required">*</span></label>
                                                      <select class="form-select states" name="state" onchange="getCities(this)" data-class=".cities" required>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                      <label>City <span class="required">*</span></label>
                                                      <select class="form-select cities" name="city" required>
                                                      </select>
                                                   </div>
                                                </div>
                                                <!--<div class="col-md-12 my-3">-->
                                                <!--   <div class="row">-->
                                                <!--      <div class="col">-->
                                                <!--         <div class="form-check">-->
                                                <!--            <input type="radio" name="address_type" id="addressRadio1" value="Home address" checked="">-->
                                                <!--            <label class="form-check-label" for="addressRadio1">-->
                                                <!--            Home Address-->
                                                <!--            </label>-->
                                                <!--         </div>-->
                                                <!--      </div>-->
                                                <!--      <div class="col">-->
                                                <!--         <div class="form-check">-->
                                                <!--            <input  type="radio" name="address_type" id="addressRadio2" value="Office address">-->
                                                <!--            <label class="form-check-label" for="addressRadio2">-->
                                                <!--            Office Address-->
                                                <!--            </label>-->
                                                <!--         </div>-->
                                                <!--      </div>-->
                                                <!--   </div>-->
                                                <!--</div>-->
                                             </div>
                                          </div>
               
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Attachment 1</label>
                                                    <input class="form-control" cols="3" rows="5" id="attachment_one" name="attachment_one" type="file"   />
                                               </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Attachment 2</label>
                                                    <input class="form-control" cols="3" rows="5" id="attachment_two" name="attachment_two" type="file"   />
                                               </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Attachment 3</label>
                                                    <input class="form-control" cols="3" rows="5" id="attachment_three" name="attachment_three" type="file"   />
                                               </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="contact_name">Attachment 4</label>
                                                    <input class="form-control" cols="3" rows="5" id="attachment_four" name="attachment_four" type="file"   />
                                               </div>
                                            </div>
                                            
                                         </div>
                                        </form>  
                                     
                                      </div>
                                   </div>
                                </div>
                            </div>

                        </div> 
                        <div class="form-group submtit mb-0 gap-mt50 text-right col-sm-12 p-0">
                            <!--<button class="ps-btn ps-btn--sm blue-bg prevBtn" id="prev" style="display:none;">Prev</button>-->
                            <!--<button class="ps-btn ps-btn--sm blue-bg " id="submitButton" type="submit" >Save</button>-->
                            <button class="ps-btn ps-btn--sm ps-btn prevBtn" id="prev" style="display:none;">Prev</button>
                            <button class="ps-btn ps-btn--sm ps-btn  saveFormBtn" id="next" onclick="next()">Save</button>
                        </div>
                    </div>
                <!--</form>-->
            </div>



             <!-- -----------------------------------------------------------------------------------------------------------
              --------------------------------------------------------------------------------------------------------------
              ------------------------------------------------------------------------------------------------------------- -->

         </div>
      </div>
   </div>
</div>
<!-- Main Container -->

<!--<script type="module" src="{{asset('allUsers/customer/buyer-profile.js')}}"></script>-->
<script type="text/javascript" src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>
<script>
 
    let itemIndex = 0; // To track the index of added items
    
    
    function addItemDataInTable() {
    $('.prodcuts_error').text('');

    const category = $('select[name=category]');
    const category_id = category.val();
    const category_name = category.find('option:selected').data('category-name') || '';

    const subCategory = $('select[name=subCategory]');
    const subCategory_id = subCategory.val();
    const subCategory_name = subCategory.find('option:selected').data('category-name') || '';

    const subSubCategory = $('select[name=subSubCategory]');
    const subSubCategory_id = subSubCategory.val();
    const subSubCategory_name = subSubCategory.find('option:selected').data('category-name') || '';

    const subSubSubCategory = $('select[name=subSubSubCategory]');
    const subSubSubCategory_id = subSubSubCategory.val();
    const subSubSubCategory_name = subSubSubCategory.find('option:selected').data('category-name') || '';

    const subSubSubSubCategory = $('select[name=subSubSubSubCategory]');
    const subSubSubSubCategory_id = subSubSubSubCategory.val();
    const subSubSubSubCategory_name = subSubSubSubCategory.find('option:selected').data('category-name') || '';

    const productSelect = $('select[name=product_id]');
    const product_id = productSelect.val();
    const product_name = productSelect.find('option:selected').data('name') || '';

    const brand_name = $('#brand_name').val();
    const uom = $('#uom').val();
    const item_quantity = $('#item_quantity').val();
    const target_price = $('#target_price').val();
    const notes = $('#notes').val() || ''; // Assuming there's an input/textarea with id="notes"

    // Uncomment this block if you want to enforce required fields
    /*
    if (!product_id || !product_name || !brand_name || !item_quantity || !target_price || !uom) {
        $('.prodcuts_error').text('All fields are required!');
        return;
    }
    */

    const category_path = [category_name, subCategory_name, subSubCategory_name, subSubSubCategory_name, subSubSubSubCategory_name]
        .filter(Boolean)
        .join(' > ');

    // Append to table
    const table_body_for_item_data = $('#table_body_for_item_data');
    const rowData = `
        <tr>
            <td>${category_path}</td>
            <td>${uom}</td>
            <td>${item_quantity}</td>
            <td>${target_price}</td>
            <td>${notes}</td>
        </tr>`;
    table_body_for_item_data.append(rowData);

    // Append hidden inputs
    const form = document.querySelector('.ActiveForm');
    
    
    
    // Gather all category IDs
    const category_ids = [
        category_id,
        subCategory_id,
        subSubCategory_id,
        subSubSubCategory_id,
        subSubSubSubCategory_id
    ].filter(Boolean);
    
    // Generate hidden inputs for all category IDs
    let hiddenFields = '';
    category_ids.forEach(catId => {
        hiddenFields += `<input type="hidden" name="product[${itemIndex}][category][]" value="${catId}" />\n`;
    });
    
    // Add the rest of the hidden inputs
    hiddenFields += `
        <input type="hidden" name="product[${itemIndex}][uom]" value="${uom}" />
        <input type="hidden" name="product[${itemIndex}][item_quantity]" value="${item_quantity}" />
        <input type="hidden" name="product[${itemIndex}][target_price]" value="${target_price}" />
        <input type="hidden" name="product[${itemIndex}][notes]" value="${notes}" />
    `;

    $(form).append(hiddenFields);

    itemIndex++;

    // Clear input fields
    productSelect.val('');
    $('#brand_name').val('');
    $('#item_quantity').val('');
    $('#target_price').val('');
    $('#notes').val('');
}

</script>

<script>
    function handleCategoryChange(selectElement) {
        let category_id = +selectElement.value;
        getMoreCategories(selectElement);
        // setProductOptionInSelectInputs(category_id)
    }
 // this function gets and sets categories, brands, filters and options dynamically to the front end.
    function getMoreCategories(e) {
      let category_id = +e.value;
      let type = e.dataset.type;
      let setType;
      let categoryInputName = 'subCategory';
      let mappedBrandTemplate = '';
      let brandTemplate = '';
      let parent_category_id = document.querySelector('.category').value;
      if (type === 'sub-category') {
        document.querySelector('.sub-sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
        setType = 'sub-sub-category';
        categoryInputName = 'subCategory';
        
      }
      if (type === 'sub-sub-category') {
        document.querySelector('.sub-sub-sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
        setType = 'sub-sub-sub-category';
        categoryInputName = 'subSubCategory';
      }
      if (type === 'sub-sub-sub-category') {
        document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
        setType = 'sub-sub-sub-sub-category';
        categoryInputName = 'subSubSubCategory';
      }
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
          let optionsTemplate = ``;

          data.data.categories.forEach(category => {
            optionsTemplate += `
                <option value="${ category.id }"  data-category-name="${ category.category_name }">${ category.category_name }</option>
              `;
          });

          let categoryTemplate = ``;
          if (data.data.categories.length > 0) {
            categoryTemplate = `<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group mb-2">
                                            <label class="mb-0 mt-4"> ${ type }:</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group mb-4">
                                            <select class="form-control" name="${categoryInputName}" data-type="${ setType }"  onchange="getMoreCategories(this)" >
                                                <option value="">Select category</option>
                                                ${optionsTemplate}
                                            </select>
                                        </div>
                                    </div>`;

          }
          if (type === 'sub-category') {
            document.querySelector('.sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-category') {
            document.querySelector('.sub-sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-sub-category') {
            document.querySelector('.sub-sub-sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-sub-sub-category') {
            document.querySelector('.sub-sub-sub-sub-categories').innerHTML = categoryTemplate;
          }
        }

      }); 
      
    //   setProductOptionInSelectInputs(category_id)

    }
    
   function setProductOptionInSelectInputs(category_id) {
        // Call getProductByCategory and handle the returned products
        getProductByCategory(category_id).then(products => {
            // Get all elements with the class 'productSelectOptionClass'
            let productsSelectElements = document.querySelectorAll('.productSelectOptionClass');
            
            if (productsSelectElements.length === 0) {
                console.error('No elements with class "productSelectOptionClass" found.');
                return;
            }
    
            // Initialize options template with a placeholder option
            let optionsTemplate = `<option value="">Select Product</option>`;
            
            // Loop through products and generate option elements
            products.forEach(product => {
                optionsTemplate += `
                    <option value="${product.id}"  data-name="${product.name}">${product.name}</option>
                `;
            });
    
            // Update each dropdown's inner HTML with the generated options
            productsSelectElements.forEach(element => {
                element.innerHTML = optionsTemplate;
            });
    
            // Log the generated options for debugging
            // console.log('Options updated:', optionsTemplate);
        }).catch(error => {
            console.error('Error fetching products:', error);
        });
    }



    function getProductByCategory(category_id) {
        return new Promise((resolve, reject) => {
            $.ajax({
                method: "GET",
                url: route('get-products-by-category-id'),
                data: { category_id },
                dataType: 'json',
                success: function(response) {
                    console.log('API Response:', response); // Log the full response
    
                    // Check if 'data' and 'products' exist in the response
                    if (response && response.data && response.data.products) {
                        resolve(response.data.products); // Resolve with the products array
                    } else {
                        reject('No products found in the response');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error); // Log errors
                    reject(error);
                }
            });
        });
    }

    // document.querySelector('select[name=quotation_type]').addEventListener('change', function(e) {
    //     let quotation_type = e.target.value;
    //     let categories = [];

    //     // Fetch categories based on quotation type
    //     if (quotation_type == 'service') {
    //         categories = {!! json_encode(getServiceCategories()) !!}; // Convert to JS array
    //     } else {
    //         categories = {!! json_encode(getCategories()) !!}; // Convert to JS array
    //     }

    //     // Get the target select element where options will be replaced
    //     // let categorySelect = document.querySelector('select[name=category_id]');
    //     let categorySelect = document.getElementById('parent_category_select_options');
    //     categorySelect.innerHTML = ''; // Clear existing options

    //     // Create new options and append to the category select element
    //     categories.forEach(function(category) {
    //         const newItem = document.createElement('option');
    //         newItem.value = category.id; // Assuming category has an 'id' field
    //         newItem.textContent = category.category_name; // Assuming category has a 'category_name' field
    //         categorySelect.appendChild(newItem); // Append the new option
    //     });

    //     // console.log(categories); // Log the categories to the console for debugging
    // });
</script>


<script>
    // JavaScript to dynamically update the Purchase Date
    document.getElementById('quotation_deadline').addEventListener('change', function () {
        const submissionDeadline = this.value; // Get selected submission deadline date
        if (submissionDeadline) {
            // Create a new Date object for the submission deadline
            const deadlineDate = new Date(submissionDeadline);

            // Add one day to the deadline date
            deadlineDate.setDate(deadlineDate.getDate() + 1);

            // Format the date to YYYY-MM-DD
            const purchaseDate = deadlineDate.toISOString().split('T')[0];

            // Set the purchase date input value
            const purchaseDateInput = document.getElementById('purchase_date');
            purchaseDateInput.value = purchaseDate;

            // Ensure the minimum date for the purchase date input is also updated
            purchaseDateInput.min = purchaseDate;
        }
    });
</script>

<script>


    document.body.addEventListener('click', async function (event) {
      // Check if the clicked button has the class 'saveFormBtn'
      if (event.target.classList.contains('prevBtn')) {
        event.preventDefault();
        prev()
      }
    });

   $(document).ready(function(){
      const $current = $('.current'); 
      // Remove 'ActiveForm' class from all forms
      $('form').removeClass('ActiveForm'); 
      // Add 'ActiveForm' class to the form within the current element
      $current.find('form').addClass('ActiveForm');
      // Ensure the current element is visible
      $current.show(); 
      // Check if the current element has the 'last' class
      if ($current.hasClass('last')) {
         $('#next').text('Save'); // Change button text to 'Save'
         return; // Exit the function
      }
   });




    // function next() {
    //     const $current = $('.current');
    //     const $form = $current.find('form'); // Get the form within the current element
    
    //     // Validate the current form
    //     if ($form.length && !$form[0].checkValidity()) {
    //         $form[0].reportValidity(); // Show validation messages if the form is invalid
    //         return; // Stop further execution if validation fails
    //     }
    
    //     $('form').removeClass('ActiveForm');
    
    //     // Check if the current form has the 'last' class
    //     if ($current.hasClass('last')) {
    //         $('#next').text('Save');
    //         submitallform(e)
    //         $current.find('form').addClass('ActiveForm');
    //         return; // Exit the function
    //     }
    
    //     const $next = $current.next();
    //     $current.removeClass('current').hide();
    
    //     // Normal flow for non-last forms
    //     $next.show().addClass('current');
    //     $('#next').text('Save & Next');
    //     $next.find('form').addClass('ActiveForm');
    
    //     // Update navigation steps
    //     $('.current1').removeClass('current1 active').next().addClass('active current1');
    //     $("li.current1").prevAll().find('span').addClass('active1');
    //     $('#prev').show();
    // }
    
    
    function next() {
        const $current = $('.current');
        const $form = $current.find('form'); // Get the form within the current element
    
        // Validate the current form
        if ($form.length && !$form[0].checkValidity()) {
            $form[0].reportValidity(); // Show validation messages if the form is invalid
            return; // Stop further execution if validation fails
        }
    
        $('form').removeClass('ActiveForm');
    
        // Check if the current form has the 'last' class
        if ($current.hasClass('last')) {
            $('#next').text('Save');
            submitallform($form); // Pass the form element to submitallform
            $form.addClass('ActiveForm');
            return; // Exit the function
        }
    
        const $next = $current.next();
        $current.removeClass('current').hide();
    
        // Normal flow for non-last forms
        $next.show().addClass('current');
        $('#next').text('Save & Next');
        $next.find('form').addClass('ActiveForm');
    
        // Update navigation steps
        $('.current1').removeClass('current1 active').next().addClass('active current1');
        $("li.current1").prevAll().find('span').addClass('active1');
        $('#prev').show();
    }

// function submitallform($form) {
//     let url = $form.attr('action'); // Get the form action URL
//     let formData = new FormData($form[0]); // Create FormData object to handle file uploads
    
//     for (let [key, value] of formData.entries()) {
//     console.log(`${key}: ${value}`);
// }

//     $.ajax({
//         url: url,
//         method: 'POST',
//         data: formData,
//         processData: false,
//         contentType: false,
//         success: function (response, textStatus, xhr) {
//             if (xhr.status === 302) {
//                 // Handle redirect if necessary
//                 console.log('Redirected to:', xhr.getResponseHeader('Location'));
//             } else {
//                 console.log('Success:', response);
//             }
//         },
//         error: function (xhr) {
//             console.error('Error:', xhr.responseText);
//         }
//     });

// }



function submitallform($form) {
    // e.preventDefault(); // Prevent the default form submission

    // Get all form elements in the document
    let form = $form; // The current form being submitted
    let url = form.attr('action'); // The action URL of the form
    console.log(url);

    // Create FormData from all forms in the document, not just the current one
    let formData = new FormData();
    
    // Append all form fields in the document
    // $('form').each(function() {
    //     $(this).find('input, select, textarea').each(function() {
    //         // Append each form element to formData
    //         formData.append($(this).attr('name'), $(this).val());
    //     });
    // });
    
    
    $('form').each(function () {
        // Iterate through all inputs, selects, and textareas in the form
        $(this).find('input, select, textarea').each(function () {
            let name = $(this).attr('name');
            if (!name) return; // Skip elements without a name attribute

            // Handle file inputs specifically
            if ($(this).attr('type') === 'file') {
                let files = $(this)[0].files; // Get the file input's files
                if (files.length > 0) {
                    for (let i = 0; i < files.length; i++) {
                        formData.append(name, files[i]); // Append each file
                    }
                }
            } else {
                // Append non-file inputs
                formData.append(name, $(this).val());
            }
        });
    });
    
    

    // Include CSRF token in the FormData if it's missing
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    $.ajax({
        url: url,
        method: 'POST',
        data: formData,
        processData: false, // Important: Do not process data for FormData
        contentType: false, // Important: Do not set content type for FormData
        success: function(response) {
            location.reload();
            // Handle success response
            // console.log('Form submitted successfully:', response);
            // alert('Form submitted successfully!');
        },
        error: function(xhr) {
            // Handle error response
            console.error('Form submission failed:', xhr.responseText);
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                let messages = Object.values(xhr.responseJSON.errors).flat().join('\n');
                alert(messages);
            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                alert(xhr.responseJSON.message);
            } else {
                alert('An error occurred while submitting the form.');
            }
            
        }
    });
}



//   function next() {
//       const $current = $('.current'); 
//       $('form').removeClass('ActiveForm');
      
//       // Check if the next form has the 'last' class
//       if ($current.hasClass('last')) {
//          $('#next').text('Save'); 
//          $current.find('form').addClass('ActiveForm'); 
//          return; // Exit the function
//       }

//       const $next = $current.next(); 
//       $current.removeClass('current').hide(); 

//       // Normal flow for non-last forms
//       $next.show().addClass('current'); 
//       $('#next').text('Save & Next'); 
//       $next.find('form').addClass('ActiveForm');

//       // Update navigation steps
//       $('.current1').removeClass('current1 active').next().addClass('active current1');
//       $("li.current1").prevAll().find('span').addClass('active1'); 
//       $('#prev').show(); 
//   }

  function prev() {
    const $current = $('.current');
    $('form').removeClass('ActiveForm'); // Remove 'ActiveForm' class from all forms
    const $prev = $current.removeClass('current').hide().prev().show().addClass('current'); // Move to the previous form

    $('#next').text('Save & Next').show(); // Reset 'next' button text
    $('.current1').removeClass('current1 active').prev().addClass('active current1'); // Update navigation steps
    $("li.current1").find('span').removeClass('active1'); // Remove highlight from current step

    $prev.find('form').addClass('ActiveForm'); // Add 'ActiveForm' class to the previous form

    if ($prev.hasClass('first')) {
      $('#prev').hide(); // Hide 'prev' button if on the first form
    } else {
      $('#prev').show(); // Show 'prev' button otherwise
    }
  }

   // Attach the function to the 'prev' button click event
   //   $('#prev').click(function() {
   //     prev();
   //   });

   //   // Attach the function to the 'next' button click event
   //   $('#next').click(function() {
   //     next();
   //   });
</script>



@endsection