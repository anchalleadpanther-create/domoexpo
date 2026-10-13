@extends('marketplace.partials.header')
@section('content')

<main id="homepage-photo" class="seller_page">
   <section class="ps-home-share-work gap-pb50 why-sellSection">
      <div class="container">
         <h3 class="mb-5 text-center">
         Get Quote </h2>
         <form action="{{route('save-rfq')}}" method="post" enctype="multipart/form-data" autocomplate="off">
            @csrf
            <div class="col-sm-12">
               <div class="row header_text">
                  <p>Please provide a detailed enquiry so that we can assist your specific needs</p>
               </div>
               <div class="row rfq_section pb-3">
                  <div class="col-sm-4">
                     <div class="form-group mb-4">
                        <label class="mb-2">Quotation Type :</label>
                        <select class="form-control" name="quotation_type" required >
                        <option value="product" {{old('quotation_type') == "product" ? 'selected' : ''}}>Product	</option>  
                        <option value="service" {{old('quotation_type') == "service" ? 'selected' : ''}}>Service	</option>  
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group mb-4">
                        <label class="mb-2">Category :</label>
                        <select class="form-control category" name="category[]" id= "parent_category_select_options" data-type='sub-category' onchange="handleCategoryChange(this)" >
                           <option value="">Select Category</option>
                           @foreach (getCategories() as $category)
                           <option value="{{$category->id}}"  {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>  
                           @endforeach 
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-4 sub-categories"></div>
                  <div class="col-sm-4 sub-sub-categories"></div>
                  <div class="col-sm-4 sub-sub-sub-categories"></div>
                  <div class="col-sm-4 sub-sub-sub-sub-categories"></div>
                  <!--------Start-------------------------------------------------------------------------------------------------------->
                  <!--<button type="button" class="btn btn-primary mb-3" id="add-more">Add More</button>-->
                  <!--<div id="dynamic-form">-->
                  <!--    <div class="row form-row mb-3">-->
                  <!--    <div class="col-sm-3">-->
                  <!--        <div class="form-group">-->
                  <!--            <label>Product Name:</label>-->
                  <!--            <input type="date" name="target_date[]" min="{{ date('Y-m-d') }}" class="form-control">-->
                  <!--        </div>-->
                  <!--    </div>-->
                  <!--    <div class="col-sm-2">-->
                  <!--        <div class="form-group">-->
                  <!--            <label>Brand Name:</label>-->
                  <!--            <input type="text" name="brand_name[]" class="form-control">-->
                  <!--        </div>-->
                  <!--    </div>-->
                  <!--    <div class="col-sm-2">-->
                  <!--        <div class="form-group">-->
                  <!--            <label>UOM:</label>-->
                  <!--            <input type="text" name="uom[]" class="form-control">-->
                  <!--        </div>-->
                  <!--    </div>-->
                  <!--    <div class="col-sm-2">-->
                  <!--        <div class="form-group">-->
                  <!--            <label>Quantity:</label>-->
                  <!--            <input type="number" name="quantity[]" min="0" class="form-control">-->
                  <!--        </div>-->
                  <!--    </div>-->
                  <!--    <div class="col-sm-2">-->
                  <!--        <div class="form-group">-->
                  <!--            <label>Target Price:</label>-->
                  <!--            <input type="number" name="target_price[]" step="0.10" class="form-control">-->
                  <!--        </div>-->
                  <!--    </div>-->
                  <!--    <div class="col-sm-1">-->
                  <!--        <button type="button" class="btn btn-danger remove-row mt-4">Delete</button>-->
                  <!--    </div>-->
                  <!--</div>-->
                  <!--</div>-->
                  <!-- Add More Section -->
                  <!--<div class="col-sm-12 mb-3 d-flex justify-content-end">-->
                  <!--    <button type="button" class="btn btn-primary p-3" id="add-more"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
                  <!--</div>-->
                  <!-- Dynamic Fields Section -->
                  <div class="col-sm-12" id="dynamic-form">
                     <div class="row form-row mb-3">
                        <input type="hidden" name="product_number" value="0" class="form-control">
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label class="mb-2">UOM:</label>
                              <!--<input type="text" name="product[0][uom]" class="form-control">-->
                              <select class="form-control" name="product[0][uom]" >
                                 <option value="">Select</option>
                                 @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                                 <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label class="mb-2">Quantity:</label>
                              <input type="number" name="product[0][quantity]" min="0" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label class="mb-2">Target Price:</label>
                              <input type="number" name="product[0][target_price]" step="0.10" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-1 mt-4">
                           <button type="button" class="btn btn-primary px-4 p-3 mt-3" id="add-more"><i class="fa fa-plus" aria-hidden="true"></i></button>
                           <!--<button type="button" class="btn btn-danger remove-row mt-4"><i class="fa fa-trash-o" aria-hidden="true"></i></button>-->
                        </div>
                     </div>
                  </div>
                  <!-------------End----------------------------------------------------------------------------->
               </div>
            </div>
            <div class="col-sm-12">
               <div class="row rfq_section">
                  <div class="col-sm-12">
                     <h5 style="
                        border-bottom: 1px solid #ddd;
                        padding-bottom: 13px;
                        margin-bottom: 30px;
                        ">Requirement Information</h5>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group mb-4">
                        <label class="mb-2">Quote Submission Deadline:</label>
                        <input type="date" min="{{ date('Y-m-d', strtotime('+1 day')) }}" name="target_date"  id="submission_deadline" value="{{ old('target_date') ?? date('Y-m-d', strtotime('+1 day')) }}" 
                           class="form-control" required>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group mb-4">
                        <label class="mb-2">Contract Type:</label>
                        <select class="form-control" name="payment_terms" required>
                           <option value="">Select</option>
                           @foreach(getDropdowns('Contract Type')->dropdownValues as $value)
                           <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group mb-4">
                        <label class="mb-2">Purchase Date:</label>
                        <input type="date"  min="{{ date('Y-m-d', strtotime('+2 day'))}}" name="purchase_date" id="purchase_date" value="{{ old('purchase_date') ?? date('Y-m-d', strtotime('+2 day')) }}" 
                           class="form-control" required>
                     </div>
                  </div>
                  {{-- 
                  <div class="col-sm-4">
                     <div class="form-group mb-4">
                        <label class="mb-2">Delivery Location :</label>
                        <select class="form-control" name="delivery_location" required>
                           <option value="">Select Location</option>
                           @forelse(Auth::guard('buyer')->user()->addresses as $address)
                           <option value="{{$address->id}}"  {{old('delivery_location') == $address->id ? 'selected' : ''}}>{{$address->address_type}},{{$address->address_one}} {{$address->address_two}},{{$address->myCity->name}}, {{$address->myState->name}},{{$address->myCountry->name}}, {{$address->post_code}}</option>  
                           @endforeach  
                        </select>
                     </div>
                  </div>
                  --}}
                  <div class="col-sm-4">
                     <div class="form-group mb-4">
                        <label class="mb-2">Payment Terms :</label>
                        <select class="form-control" name="payment_terms" required>
                           <option value="">Select</option>
                           @foreach(getDropdowns('Payment Terms')->dropdownValues as $value)
                           <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group mb-4">
                        <label class="mb-2">Shipment Method:</label>
                        <input type="text" name="shipment_method" placeholder="Enter shipment method (for international shipment) " value="{{old('shipment_method') ?? 'Deliver to the door'}}" class="form-control" required>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group mb-4">
                        <label class="mb-2">Attach Document:</label>
                        <input type="file" name="document" placeholder="Attach Document" name="upload_rfq_file" class="form-control">
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-12">
               <div class="form-group mb-4">
                  <input type="submit" class="ps-btn blue-bg " style="border-radius:5px">
               </div>
            </div>
      </div>
      </form>
      </div> <!-- row  -->
   </section>
</main>
<style>
   .header--standard .header__top,
   .header--standard .navigation,
   .header--standard .header__content-center,
   .header .header__extra {
   display: none;
   }
   body .header--standard .header__content {
   padding: 30px 0;
   }
</style>
<script>
   document.addEventListener("DOMContentLoaded", function () {
    // Function to add new row
    document.getElementById("add-more").addEventListener("click", function () {
        
        let categorySelects = document.querySelectorAll('select[name="category[]"]');
        let categoryValues = Array.from(categorySelects)
            .map(select => select.value) // Extract the values
            .filter(value => value !== null && value !== undefined && value.trim() !== ""); // Remove null, undefined, and empty strings
        
        // Get the last valid value, or the second last if the last isn't available, etc.
        let lastCategoryValue = categoryValues[categoryValues.length - 1] || 
                                categoryValues[categoryValues.length - 2] || 
                                categoryValues[categoryValues.length - 3] || 
                                null;
    
        // console.log('Last Category Value:', lastCategoryValue);
    
        // Fetch products for the last selected category
        getProductByCategory(lastCategoryValue).then(products => {
            let optionsTemplate = `<option value="">Select Product</option>`;
    
            // Loop through products and generate option elements
            products.forEach(product => {
                optionsTemplate += `
                    <option value="${product.id}">${product.name}</option>
                `;
            });
    
            let product_number = document.querySelector('input[name="product_number"]').value;
            product_number  = parseInt(product_number) + 1;
           
            // Create the new row after fetching the products
            let newRow = document.createElement("div");
            newRow.className = "row form-row mb-3";
            newRow.innerHTML = `
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Product Name:</label>
                        <select class="form-control productSelectOptionClass" name="product[${product_number}][product_id]">
                            ${optionsTemplate}
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Brand Name:</label>
                        <input type="text" name="product[${product_number}][brand_name]" class="form-control">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>UOM:</label>
                        <select class="form-control" name="product[${product_number}][uom]" >
                            <option value="">Select</option>  
                            @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                                <option value="{{$value->dropdown_value}}">{{$value->dropdown_value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Quantity:</label>
                        <input type="number" name="product[${product_number}][quantity]" min="0" class="form-control">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Target Price:</label>
                        <input type="number" name="product[${product_number}][target_price]" step="0.10" class="form-control">
                    </div>
                </div>
                <div class="col-sm-1 mt-5 ">
                    <button type="button" class="btn btn-danger remove-row px-4 p-3 mt-3"><i class="fa fa-trash-o remove-row" aria-hidden="true"></i></button>
                </div>
            `;
             document.querySelector('input[name="product_number"]').value = product_number;
            // Append the new row to the form
            document.getElementById("dynamic-form").appendChild(newRow);
        }).catch(error => {
            console.error('Error fetching products:', error);
        });
    });
   
    // Function to remove a row
    document.getElementById("dynamic-form").addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("remove-row")) {
            e.target.closest(".form-row").remove();
        }
    });
   });
</script>
<script>
   // JavaScript to dynamically update the Purchase Date
   document.getElementById('submission_deadline').addEventListener('change', function () {
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
   function handleCategoryChange(selectElement) {
       let category_id = +selectElement.value;
       getMoreCategories(selectElement);
       setProductOptionInSelectInputs(category_id)
   }
   
   // this function gets and sets categories, brands, filters and options dynamically to the front end.
   function getMoreCategories(e) {
     let category_id = +e.value;
     let type = e.dataset.type;
     let setType;
     let mappedBrandTemplate = '';
     let brandTemplate = '';
     let parent_category_id = document.querySelector('.category').value;
     if (type === 'sub-category') {
       document.querySelector('.sub-sub-categories').innerHTML = '';
       document.querySelector('.sub-sub-sub-categories').innerHTML = '';
       document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
       setType = 'sub-sub-category';
     }
     if (type === 'sub-sub-category') {
       document.querySelector('.sub-sub-sub-categories').innerHTML = '';
       document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
       setType = 'sub-sub-sub-category';
     }
     if (type === 'sub-sub-sub-category') {
       document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
       setType = 'sub-sub-sub-sub-category';
     }
     $.ajax({
       async: false,
       method: "get",
       url:"{{ route('get-categories-filters-and-product-types') }}",
       data: {
         category_id,
         parent_category_id
       },
       dataType: 'json',
       success: function(data) {
         let optionsTemplate = ``;
   
         data.data.categories.forEach(category => {
           optionsTemplate += `
               <option value="${ category.id }">${ category.category_name }</option>
             `;
         });
   
         let categoryTemplate = ``;
         if (data.data.categories.length > 0) {
           categoryTemplate = `<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                       <div class="form-group mb-1">
                                           <label class="mb-0"> ${ type }:</label>
                                       </div>
                                   </div>
                                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                       <div class="form-group mb-4">
                                           <select class="form-control" name="category[]" data-type="${ setType }"  onchange="getMoreCategories(this),getProductByCategory(this)" >
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
     
     setProductOptionInSelectInputs(category_id)
   
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
                   <option value="${product.id}">${product.name}</option>
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
   
   document.querySelector('select[name=quotation_type]').addEventListener('change', function(e) {
       let quotation_type = e.target.value;
       let categories = [];
   
       // Fetch categories based on quotation type
       if (quotation_type == 'service') {
           categories = {!! json_encode(getServiceCategories()) !!}; // Convert to JS array
       } else {
           categories = {!! json_encode(getCategories()) !!}; // Convert to JS array
       }
   
       // Get the target select element where options will be replaced
       // let categorySelect = document.querySelector('select[name=category_id]');
       let categorySelect = document.getElementById('parent_category_select_options');
       categorySelect.innerHTML = ''; // Clear existing options
   
       // Create new options and append to the category select element
       categories.forEach(function(category) {
           const newItem = document.createElement('option');
           newItem.value = category.id; // Assuming category has an 'id' field
           newItem.textContent = category.category_name; // Assuming category has a 'category_name' field
           categorySelect.appendChild(newItem); // Append the new option
       });
   
       // console.log(categories); // Log the categories to the console for debugging
   });
</script>
@endsection