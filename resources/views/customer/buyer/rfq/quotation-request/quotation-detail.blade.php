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
               <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important" >
                  <div id="main">
                     <div id="div7"  class="first current" style="display: none;">
                        <div class="ps-tabs">
                           <div class="ps-tab active"  >
                              <div class="ps-form__content">
                                 <div class="progress mb-5">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ empty($sellerQuotation) ? 50 : 100 }}%;"> 
                                    </div>
                                 </div>
                                 <form class="ActiveForm" action="" method="post"  enctype="multipart/form-data">
                                    @csrf 
                                    <input class="form-control" name="rfq_id"  value="{{$rfq->id}}" type="hidden" placeholder="">
                                    <input class="form-control" name="next_rfq_step"  value="rfq-item-list" type="hidden" placeholder="">
                                    <div class="row">
                                       <div class="col-sm-12 text-center">
                                          <h4 class="mb-4 login_heading">RFQ Detail</h4>
                                       </div>
                                       <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table ps-table--responsive account__table table-bordered" id="products-table">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>RFQ Detail</th>
                                                            <th>DeadLine</th>
                                                            <!--<th>Action</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <!--<td align="center" style="vertical-align: middle;">-->
                                                            <!--    <a href="{{ !empty($rfq->uploaded_rfq_file) ? asset('uploads/upload_rfq_file/' . $rfq->uploaded_rfq_file) : asset('allUsers/no-image.png') }}"-->
                                                            <!--        style="width: 40px; display: inline-block;" target="_blank">-->
                                                            <!--        <i class="fa fa-download" aria-hidden="true"></i>-->
                                                            <!--    </a>-->
                                                            <!--</td>-->
                                                            <td  width="35%">
                                                                <p class="mb-0"><strong>Bussiness Type :</strong> {{$rfq->customer->buyer_business_type}}</p>
                                                                <p class="mb-0"><strong>Location :</strong> {{$rfq->deliveryState->name ?? ""}},{{$rfq->deliveryCountry->name ?? ""}} </p>
                                                                <p class="mb-2"><strong>Delivery Address :</strong>  {{$rfq->address}}</p>
                                                                <p class="mb-0"><strong>Buyer Name :</strong>  {{$rfq->name}}</p>
                                                                <p class="mb-0"><strong>Title :</strong>  Manager</p>
                                                            </td>
                                                           
                                                            <td width="30%" class="text-center">
                                                             <p class="mb-0"><strong>RFQ Submission Deadline </strong> </p> 
                                                             <p class="mb-5 text-danger"><strong>{{ $rfq->created_at ? date('d F Y',strtotime($rfq->quotation_deadline)) : '' }}</strong> </p> 
                                                             <p class="mb-0"><strong>Time Remaining</strong> </p> 
                                                             <p class="mb-0 text-danger">
                                                                @php
                                                                    $deadline = \Carbon\Carbon::parse($rfq->quotation_deadline);
                                                                    $now = \Carbon\Carbon::now();
                                                                
                                                                    $diffInDays = $deadline->diffInDays($now);
                                                                    $diffInHours = $deadline->diffInHours($now) % 24; // Remaining hours after days
                                                                    $diffInMinutes = $deadline->diffInMinutes($now) % 60; // Remaining minutes after hours
                                                                @endphp
                                                                <strong>
                                                                    @if($rfq->quotation_deadline > $now)
                                                                        {{ $rfq->quotation_deadline ? "$diffInDays days: $diffInHours hours: $diffInMinutes minutes" : '' }}
                                                                    @else
                                                                       0 days: 0 hours: 0 minutes
                                                                    @endif
                                                                </strong>
                                                              </p> 
                                                            
                                                        </tr>
                                                        <tr>
                                                            @if(!empty($rfq->attachment_file_one))
                                                             <td align="center" style="vertical-align: middle;">
                                                                <a href="{{ !empty($rfq->attachment_file_one) ? asset('uploads/rfq/' . $rfq->attachment_file_one) : asset('allUsers/no-image.png') }}"
                                                                   class="ps-btn-outline" style="width: auto; display: inline-block;" target="_blank">View Attachment 1
                                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                            @endif
                                                            @if(!empty($rfq->attachment_file_two))
                                                            <td align="center" style="vertical-align: middle;">
                                                                <a href="{{ !empty($rfq->attachment_file_two) ? asset('uploads/rfq/' . $rfq->attachment_file_two) : asset('allUsers/no-image.png') }}"
                                                                   class="ps-btn-outline" style="width: auto; display: inline-block;" target="_blank">View Attachment 2
                                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            @if(!empty($rfq->attachment_file_three))
                                                            <td align="center" style="vertical-align: middle;">
                                                                <a href="{{ !empty($rfq->attachment_file_three) ? asset('uploads/rfq/' . $rfq->attachment_file_three) : asset('allUsers/no-image.png') }}"
                                                                   class="ps-btn-outline" style="width: auto; display: inline-block;" target="_blank">View Attachment 3
                                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                            @endif
                                                            @if(!empty($rfq->attachment_file_four))
                                                            <td align="center" style="vertical-align: middle;">
                                                                <a href="{{ !empty($rfq->attachment_file_four) ? asset('uploads/rfq/' . $rfq->attachment_file_four) : asset('allUsers/no-image.png') }}"
                                                                   class="ps-btn-outline" style="width: auto; display: inline-block;" target="_blank">View Attachment 4
                                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                            @endif
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            @if(!empty($rfq->attachment_file_five))
                                                            <td align="center" style="vertical-align: middle;">
                                                                <a href="{{ !empty($rfq->attachment_file_five) ? asset('uploads/rfq/' . $rfq->attachment_file_five) : asset('allUsers/no-image.png') }}"
                                                                   class="ps-btn-outline" style="width: auto; display: inline-block;" target="_blank">View Attachment 3
                                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                            @endif
                                                            
                                                            
                                                        </tr>
                                                     
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="div8" class=" last" style="display: none;">
                        <div class="ps-tabs ">
                           <div class="ps-tab active ">
                              <div class="ps-form__content">
                                 <div class="progress mb-5">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                 </div>
                                 <!--<form class="ActiveForm" action="{{route('buyer.map-supplier-to-rfq')}}" method="post"  enctype="multipart/form-data">-->
                                 <!--   @csrf -->
                                    <div class="row">
                                       <!-- Contact Information -->
                                       <div class="col-sm-12 text-center">
                                          <h4 class="mb-4 login_heading">List</h4>
                                       </div>
                                       
                                       <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table ps-table--responsive account__table table-bordered" id="products-table">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>Catgory </th>
                                                            <th>Uom</th>
                                                            <th>Quantity</th>
                                                            <th>Target Price</th>
                                                            <th>Notes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($rfq->RfqProducts as $Key => $product)
                                                            <tr>
                                                                
                                                                <td  width="45%">
                                                                    <p class="mb-0"><strong>{{ $product->mappedCategories->pluck('category_name')->implode(' > ') ?? '' }}</strong> </p>
                                                                </td>
                                                                
                                                                <td  width="10%">
                                                                    <p class="mb-0"><strong>{{ $product->uom }}</strong> </p>
                                                                </td>
                                                                
                                                                <td  width="10%">
                                                                    <p class="mb-0"> <strong>{{ $product->quantity ?? '' }}</strong></p>
                                                                </td>
                                                                
                                                                <td  width="10%">
                                                                    <p class="mb-0"> <strong>{{ $product->target_price ?? '' }}</strong></p>
                                                                </td>
                                                                
                                                                <td  width="25%">
                                                                    <p class="mb-0"> <strong>{{ $product->notes ?? '' }}</strong></p>
                                                                </td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td colspan="4" class="text-right">
                                                                    
                                                                    <button type="button" class="ps-btn ps-btn--sm " onclick="openModalSendToSupplierQuote({{$product->id}})"  data-toggle="modal" data-target="#sendToSupplierModal">
                                                                      Send to Supplier
                                                                    </button>
                                                                    
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                            <!--<tr style="text-align:right">-->
                                                            <!--    <td colspan="4">-->
                                                            <!--        <a href="javascript:void(0)" class=" text-primary" data-toggle="modal"-->
                                                            <!--            data-target="#productQuotationModal">Quote</a>-->
                                                            <!--    </td>-->
                                                            <!--</tr>-->
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <!--<div class="col-sm-12">-->
                                        <!--        <div class="form-group mb-4">-->
                                        <!--           <label class="mb-2" for="contact_name">Send to Supplier</label>-->
                                        <!--           <select class="form-select" name="suppliers[]" multiple>-->
                                        <!--               @foreach($suppliers as $supplier)-->
                                        <!--               <option value="{{$supplier->id}}">{{$supplier->biz_name}} {{$supplier->biz_surname}}</option>-->
                                        <!--               @endforeach-->
                                        <!--           </select>-->
                                        <!--        </div>-->
                                        <!--</div>-->
                                        
                                    </div>
                                 <!--</form>-->
                              </div>
                           </div>
                        </div>
                     </div>
                    
                  </div>
                  
                  @if(empty($sellerQuotation))
                  <div class="form-group submtit mb-0 gap-mt50 text-right col-sm-12 p-0">
                     <!--<button class="ps-btn ps-btn--sm blue-bg prevBtn" id="prev" style="display:none;">Prev</button>-->
                     <!--<button class="ps-btn ps-btn--sm blue-bg " id="submitButton" type="submit" >Save</button>-->
                     <button class="ps-btn ps-btn--sm blue-bg prevBtn" id="prev" style="display:none;">Prev</button>
                     <button class="ps-btn ps-btn--sm blue-bg saveFormBtn" id="next" onclick="next()">Save or Next</button>
                  </div>
                  @endif
               </div>
            </div>
            <!-- -----------------------------------------------------------------------------------------------------------
               --------------------------------------------------------------------------------------------------------------
               ------------------------------------------------------------------------------------------------------------- -->
         </div>
      </div>
   </div>
</div>



<!--Send to supplier Modal -->
<div class="modal fade" id="sendToSupplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('buyer.map-supplier-to-rfq')}}" method="post"  enctype="multipart/form-data">
       @csrf 
       <input name="rfq_id"  value="{{$rfq->id}}" type="hidden" placeholder="">
       <input type="hidden" name="product_id" value="" id="productIdForSupplierrQuotation">
      <div class="modal-body">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="form-group mb-4">
                   <label class="mb-2" for="contact_name">Send to Supplier</label>
                   <select class="form-select" name="suppliers[]" multiple>
                       @foreach($suppliers as $supplier)
                       <option value="{{$supplier->id}}">{{$supplier->biz_company}}</option>
                       @endforeach
                   </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<script>
    
    function openModalSendToSupplierQuote(product_id){
        console.log(678)
        $('#productIdForSupplierrQuotation').val(product_id)
    }
    
</script>
<script>


    let total_price = 0;
    let total_vat = 0;
    let sub_total = 0;
    let grand_total = 0;
    
    
    let rowCount = 0; // To track the number of rows added
    
    // Function to save the data to the main table
    function saveToMainTable() {
        // Retrieve data from the modal inputs
        const productName = $('#product_name').text();
        const productID = $('#product_id_on_modal').val();
        const brandName = $('#brand_name').val();
        
        const countryOrigin = $('#country_origin').val();
        const quantity = parseInt($('#quantity').val()) || 0;
        const packing = $('#packing').val();
        const basePrice = parseFloat($('#base_price').val()) || 0;
        const discount = parseFloat($('#discount').val()) || 0;
        const discountAmount = parseFloat($('#discount_amount').val()) || 0;
        const vatPercentage = parseFloat($('#vat_percentage').val()) || 0;
        const total = parseFloat($('#total').val()) || 0;
    
        // Validate inputs
        if (
            !brandName || !countryOrigin || quantity <= 0 || !packing ||
            basePrice <= 0 || discount < 0 || discountAmount < 0 ||
            vatPercentage < 0 || total <= 0
        ) {
            alert("Please fill all fields correctly.");
            return false;
        }
    
        // Calculate totals
        const rowVatAmount = (basePrice * vatPercentage) / 100; // VAT Amount for the current row
        total_price += total - rowVatAmount;
        total_vat += rowVatAmount;
        sub_total += total;
        grand_total += total;
    
        // console.log(`Total Price: ${total_price}, Total VAT: ${total_vat}, Grand Total: ${grand_total}, sub total :  ${sub_total}`);
    
        // Create a new row with hidden input fields
        const newRow = `
            <tr class="text-center">
                <td>
                    ${productName}
                    <input type="hidden" name="product[${rowCount}][product_name]" value="${productName}" />
                    <input type="hidden" name="product[${rowCount}][product_id]" value="${productID}" />
                    
                </td>
                <td>
                    ${brandName}
                    <input type="hidden" name="product[${rowCount}][brand_name]" value="${brandName}" />
                </td>
                <td>
                    ${countryOrigin}
                    <input type="hidden" name="product[${rowCount}][country_origin]" value="${countryOrigin}" />
                </td>
                <td>
                    ${quantity}
                    <input type="hidden" name="product[${rowCount}][quantity]" value="${quantity}" />
                </td>
                <td>
                    ${packing}
                    <input type="hidden" name="product[${rowCount}][packing]" value="${packing}" />
                </td>
                <td>
                    ${basePrice.toFixed(2)}
                    <input type="hidden" name="product[${rowCount}][base_price]" value="${basePrice.toFixed(2)}" />
                </td>
                <td>
                    ${discount}%
                    <input type="hidden" name="product[${rowCount}][discount]" value="${discount}" />
                </td>
                <td>
                    ${discountAmount.toFixed(2)}
                    <input type="hidden" name="product[${rowCount}][discount_amount]" value="${discountAmount.toFixed(2)}" />
                </td>
                <td>
                    ${vatPercentage}%
                    <input type="hidden" name="product[${rowCount}][vat_percentage]" value="${vatPercentage}" />
                </td>
                <td>
                    ${total.toFixed(2)}
                    <input type="hidden" name="product[${rowCount}][total_price]" value="${total.toFixed(2)}" />
                </td>
            </tr>
        `;
    
        // Append the new row to the main table
        $('#products-main-table tbody').append(newRow);
    
        // Update the grand total input field
        $('input[name="total_price"]').val(total_price.toFixed(2));
        $('input[name="vat_total"]').val(total_vat.toFixed(2));
        $('input[name="sub_total"]').val(sub_total.toFixed(2));
        $('input[name="grand_total"]').val(grand_total.toFixed(2));
        // Increment the row count
        rowCount++;
    
        // Optional: Clear the modal inputs after saving
        clearModalInputs();
        $('#productQuotationModal').modal('hide');
    }
    
    // Function to clear modal inputs (optional)
    function clearModalInputs() {
        $('#product_name, #brand_name, #country_origin, #quantity, #packing, #base_price, #discount, #discount_amount, #vat_percentage, #total').val('');
    }

    // Function to clear the modal inputs (optional)
    function clearModalInputs() {
        // $('#quantity').val('');
        $('#base_price').val('');
        $('#discount').val('');
        $('#discount_amount').val('');
        $('#vat_percentage').val('');
        $('#total').val('');
        $('#country_origin').val('');
        $('#packing').val('');
    }
    
    // Attach click event to the Save button
    $('#save-button').on('click', function () {
        saveToMainTable();
    });

</script>

<script>
   function setProdcutToModal(product) {
        // Populate table values
        $('#product_id_on_modal').val(product.product.id);
        $('#product_name').text(product.product.name);
        $('#brand_name').val(product.brand_name);
        $('#country_origin').val(product.product.country_of_origin);
        $('#quantity').val(product.quantity);
        $('#base_price').val();
        $('#discount').val();
    
        // Trigger calculations
         // Attach event listeners to inputs for real-time calculation
        $('input[name="base_price"], input[name="discount"], input[name="vat_percentage"]').on('input', function () {
            calculateTotals();
        });
    }

    // // Event listeners for recalculations
    // $('#quantity, #base_price, #discount').on('input', function () {
    //     calculateTotals();
    // });
    
     // Attach event listeners to inputs for real-time calculation
    $('input[name="base_price"], input[name="discount"], input[name="vat_percentage"]').on('input', function () {
        calculateTotals();
    });
    
    $('input[name="shipment_cost"], input[name="vat_on_shipment"], input[name="total_shipment"]').on('input', function () {
       const shipment_cost = parseFloat($('input[name="shipment_cost"]').val()) || 0;
       const vat_on_shipment = parseFloat($('input[name="vat_on_shipment"]').val()) || 0;
       const total_shipment = shipment_cost + vat_on_shipment || 0;
       let grand_total_with_shipping = grand_total + total_shipment;
       $('input[name=total_shipment]').val(total_shipment);
       $('input[name=grand_total]').val(grand_total_with_shipping);
       
                                        
    });
    
    
    
    
    
    function calculateTotals() {
        // Retrieve values from inputs
        const quantity = parseFloat($('input[name="quantity"]').val()) || 0;
        const basePrice = parseFloat($('input[name="base_price"]').val()) || 0;
        const discountPercentage = parseFloat($('input[name="discount"]').val()) || 0;
        const vatPercentage = parseFloat($('input[name="vat_percentage"]').val()) || 0;
    
        // Perform calculations
        const subTotal = quantity * basePrice; // Subtotal = Quantity * Base Price
        const discountAmount = (subTotal * discountPercentage) / 100; // Discount Amount
        const discountedTotal = subTotal - discountAmount; // Discounted Total = Subtotal - Discount Amount
        const vatAmount = (discountedTotal * vatPercentage) / 100; // VAT Amount
        const total = discountedTotal + vatAmount; // Total = Discounted Total + VAT Amount
    
        // Update the respective input fields
        $('input[name="discount_amount"]').val(discountAmount.toFixed(2));
        $('input[name="total"]').val(total.toFixed(2));
    }

</script>










<!-- Main Container -->
<!--<script type="module" src="{{asset('allUsers/customer/buyer-profile.js')}}"></script>-->
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
   
   function submitallform($form) {
   // e.preventDefault(); // Prevent the default form submission
   
   // Get all form elements in the document
   let form = $form; // The current form being submitted
   let url = form.attr('action'); // The action URL of the form
//   console.log(url);
   
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
           alert('An error occurred while submitting the form.');
       }
   });
   }
   
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