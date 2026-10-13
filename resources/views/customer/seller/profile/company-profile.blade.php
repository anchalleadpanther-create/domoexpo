
@extends('customer.partials-fn.seller.header')
@section('content')
<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-0">
               <h2>Set up your Company Profile</h2>
               <p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.</p>
            </div>
            
            <!-- -------------------------------------------------------------------------------------------------------------
             -----------------------------------------------------------------------------------------------------------------
             -------------------------------------------------------------------------------------------------------------- -->

            <div class="ps-my-account">
                  <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important" >
                     <div id="main">
                        
                        <div id="div7"  class="first {{ Request::segment(3) == 'company-information' ? 'current' : '' }}"  style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"> 
                                       </div>
                                    </div>
                                    <input class="form-control" name="supplier_id"  value="{{ auth()->guard('vendor')->user()->id }}" type="hidden" placeholder="">
                                    <form class="ActiveForm" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf 
                                       @method('patch')
                                       <div class="row">
                                          <div class="col-sm-12 text-center">
                                             <h4 class="mb-4 login_heading">Basic information</h4>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Company Name (as in Trade License) :</label>
                                                <input class="form-control" name="biz_company"  value="{{ $user->biz_company }}" type="text" placeholder="" >
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Company Name Short :</label>
                                                <input class="form-control"  name="company_short_name"  value="{{ $user->company_short_name }}" type="text" placeholder="" required>
                                             </div>
                                          </div>
                                          
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Customer Service Email :</label>
                                                <input class="form-control" name="customer_service_email"  value="{{ $user->customer_service_email }}" type="text" placeholder="" required>
                                             </div>
                                          </div>
                                          
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Phone Number (Landline) :</label>
                                                <input class="form-control" name="phone_number"  value="{{ $user->phone_number }}"  type="text" placeholder="" required>

                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Trade License Number :</label>
                                                <input class="form-control" name="trade_license"  value="{{ $user->trade_license }}"   type="text" placeholder="" required>
                                             </div>
                                          </div>
                                          <!--<div class="col-sm-4 pl-0">-->
                                          <!--   <div class="form-group mb-4">-->
                                          <!--      <label class="mb-2"> </label>-->
                                          <!--      <input class="form-control"  name="company_establishment_date"  value="{{ $user->company_establishment_date }}" type="date" required>-->
                                          <!--   </div>-->
                                          <!--</div>-->
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">VAT Number :</label>
                                                <input class="form-control" name="vat_number"  value="{{ $user->vat_number }}"   type="text" placeholder="" required>
                                             </div>
                                          </div>
                                          
                                            <div class="col-sm-6">
                                                <div class="form-group mb-4">
                                                   <label class="mb-2" for="company_establishment_date">Company Establishment Year:</label>
                                                   <select class="form-select" id="company_establishment_date"  name="company_establishment_date" required>
                                                      <option value="">Select</option>
                                                      @for ($year = 1999; $year <= date('Y'); $year++)
                                                      <option value="{{$year}}" {{ $user->company_establishment_date == $year ? 'selected' : '' }}>{{$year}}</option>
                                                      @endfor
                                                   </select>
                                                </div>
                                            </div>
                                    
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div id="div8" class="{{ Request::segment(3) == 'contact-information' ? 'current' : '' }}" style="display: none;">
                        <div class="ps-tabs ">
                           <div class="ps-tab active ">
                              <div class="ps-form__content">
                               
                              <div class="progress mb-5">
                                 <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                              </div>
                              <form action="{{ route('seller.profile-update', [auth()->guard('vendor')->user()->id]) }}" method="post" enctype="multipart/form-data">
                                 @csrf 
                                 <div class="row">
                                    <!-- Contact Information -->
                                    <div class="col-sm-12 text-center">
                                    <h4 class="mb-4 login_heading">Sales Contact</h4>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                       <label class="mb-2" for="contact_name">Name:</label>
                                       <input class="form-control" id="contact_name" name="sales_contact_name" value="{{ $user->sales_contact_name }}" type="text" placeholder="e.g., Peter Parker" required />
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                       <label class="mb-2" for="contact_position">Position:</label>
                                       <select class="form-select" id="contact_position" name="sales_contact_position" required>
                                          <option value="">Select</option>
                                          @foreach ($positionsValues as $value)
                                          <option value="{{ $value->id }}" {{ $user->sales_contact_position == $value->id ? 'selected' : '' }}>{{ $value->dropdown_value }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                       <label class="mb-2" for="contact_email">Email Address:</label>
                                       <input class="form-control" id="contact_email" name="sales_contact_email" value="{{ $user->sales_contact_email }}" type="email" placeholder="e.g., email@example.com" required />
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                       <label class="mb-2" for="contact_number">Mobile Number:</label>
                                       <input class="form-control" id="contact_number" name="sales_contact_number" value="{{ $user->sales_contact_number }}" type="text" placeholder="e.g., 1234567890" required />
                                    </div>
                                    </div>
                                 </div>

                                 <div class="row d-none">
                                    <!-- Finance & Accounting Contact -->
                                    <div class="col-sm-12">
                                    <h4 class="mb-4 login_heading">Finance & Accounting Contact</h4>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                       <label class="mb-2" for="finance_contact_person_name">Name:</label>
                                       <input class="form-control" id="finance_contact_person_name" name="finance_contact_person_name" value="{{ $user->finance_contact_person_name }}" type="text" placeholder="e.g., Jane Doe" required />
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                       <label class="mb-2" for="finance_position">Position:</label>
                                       <select class="form-select" id="finance_position" name="finance_contact_position" required>
                                          <option value="">Select</option>
                                          @foreach ($positionsValues as $value)
                                          <option value="{{ $value->id }}" {{ $user->finance_contact_position == $value->id ? 'selected' : '' }}>{{ $value->dropdown_value }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                       <label class="mb-2" for="finance_email">Email Address:</label>
                                       <input class="form-control" id="finance_email" name="finance_contact_email" value="{{ $user->finance_contact_email }}" type="email" placeholder="e.g., email@example.com" required />
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                       <label class="mb-2" for="finance_person_mobile_number">Mobile Number:</label>
                                       <input class="form-control" id="finance_number" name="finance_person_mobile_number" value="{{ $user->finance_person_mobile_number }}" type="text" placeholder="e.g., 1234567890" required />
                                    </div>
                                    </div>
                                 </div>

                              </form>
                              </div>
                           </div>
                        </div>
                        </div>

                        <div id="div9" class="last {{ Request::segment(3) == 'company-address' ? 'current' : '' }}" style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> 
                                       </div>
                                    </div>
                                    
                                    <form class="" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf
                                       <input  id="is_last_div" name="is_last_div" value="1"  type="hidden" required />
                                       <div class="row">
                                          <div class="col-sm-12 text-center">
                                             <h4 class="mb-4 login_heading">Company Address</h4>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Country :</label>
                                                <select name="biz_office_country" class="form-select" onchange="getStates(this)" data-class=".state"  required>
                                                   <option value="">select</option>
                                                   @foreach (getCountries() as $value)
                                                      <option value="{{$value->id}}" {{$user->biz_office_country == $value->id ? "selected" : ""}}>{{ $value->name }}</option>
                                                   @endforeach
                                                </select>
                                             </div>
                                          </div>

                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">State :</label>
                                                   <select name="biz_office_state" class="form-select state" onchange="getCities(this)" data-class=".city"  required>
                                                      @foreach (getStates($user->biz_office_country) as $state)
                                                         <option @if ($user->biz_office_state === $state->id) selected @endif
                                                            value="{{ $state->id }}">
                                                            {{ $state->name }}</option>
                                                      @endforeach
                                                   </select>
                                             </div>
                                          </div>

                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">City :</label>
                                                <select name="biz_office_city" class="form-select city"  required>
                                                   @foreach (getStates($user->biz_office_country) as $state)
                                                      <option @if ($user->biz_office_state === $state->id) selected @endif
                                                         value="{{ $state->id }}">
                                                         {{ $state->name }}</option>
                                                   @endforeach
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">PO Box :</label>
                                                <input class="form-control" name="biz_office_po_box"  value="{{ $user->biz_office_po_box }}" type="text" placeholder="" required>
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Street Name :</label>
                                                 <input class="form-control" name="biz_office_street_name" max="500"  value="{{ $user->biz_office_street_name }}" type="text" placeholder=""  required>
                                             </div>
                                          </div>

                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Building Name :</label>
                                                 <input class="form-control" name="biz_office_building_name" max="500"  value="{{ $user->biz_office_building_name }}" type="text" placeholder=""  required>
                                             </div>
                                          </div>

                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Unit No :</label>
                                                 <input class="form-control" name="biz_office_floor" max="255"  value="{{ $user->biz_office_floor }}" type="text" placeholder=""  required>
                                             </div>
                                          </div>

                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     
                        <!--<div id="div10" class="{{ Request::segment(3) == 'person-of-authority' ? 'current' : '' }}" style="display: none;">-->
                        <!--   <div class="ps-tabs">-->
                        <!--      <div class="ps-tab active"  >-->
                        <!--         <div class="ps-form__content">-->
                                     
                        <!--            <div class="progress mb-5">-->
                        <!--               <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"> -->
                        <!--               </div>-->
                        <!--            </div>-->
                        <!--            <form class="" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">-->
                        <!--               @csrf-->
                        <!--               <div class="row">-->
                        <!--                  <div class="col-sm-12 text-center">-->
                        <!--                     <h4 class="mb-4 login_heading">Person of Authority</h4>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                        <label class="mb-2">Name :</label>-->
                        <!--                          <input class="form-control" name="sales_contact_name"  value="{{ $user->sales_contact_name }}" type="text" placeholder="eg. Petter Parker">-->
                        <!--                     </div>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                        <label class="mb-2">Nationality :</label>-->
                        <!--                        <select class="form-select" name="sales_contact_position">-->
                        <!--                           <option value="">select</option>-->
                        <!--                           @foreach ($positionsValues as $value)-->
                        <!--                              <option value="{{$value->id}}" {{ $user->sales_contact_position == $value->id ? 'selected' : '' }}>{{$value->dropdown_value}}</option>-->
                        <!--                           @endforeach-->
                        <!--                        </select>-->
                        <!--                     </div>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                        <label class="mb-2">Passport Number :</label>-->
                        <!--                        <input class="form-control" name="sales_contact_passport_number"  value="{{ $user->sales_contact_passport_number }}" type="number" >-->
                        <!--                     </div>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                        <label class="mb-2">ID Number :</label>-->
                        <!--                        <input class="form-control" name="sales_contact_id_number"  value="{{ $user->sales_contact_passport_number }}" type="number" >-->

                        <!--                     </div>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                        <label class="mb-2">Visa Number :</label>-->
                        <!--                        <input class="form-control" name="sales_contact_visa_number"  value="{{ $user->sales_contact_visa_number }}" type="number" >-->

                        <!--                     </div>-->
                        <!--                  </div>-->
                        <!--               </div>-->
                        <!--            </form>-->
                        <!--         </div>-->
                        <!--      </div>-->
                        <!--   </div>-->
                        <!--</div>-->

                        <!--<div id="div11"  class="last {{ Request::segment(3) == 'bank-account' ? 'current' : '' }}" style="display: none;">-->
                        <!--   <div class="ps-tabs">-->
                        <!--      <div class="ps-tab active"  >-->
                        <!--         <div class="ps-form__content">-->
                                     
                        <!--            <div class="progress mb-5">-->
                        <!--               <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> -->
                        <!--               </div>-->
                        <!--            </div>-->
                        <!--           <form class="" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">-->
                        <!--               @csrf -->
                        <!--               <input  id="is_last_div" name="is_last_div" value="1"  type="hidden" required />-->

                        <!--               <div class="row">-->
                        <!--                  <div class="col-sm-12 text-center">-->
                        <!--                     <h4 class="mb-4 login_heading">Bank Details</h4>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                     <label class="mb-2" for="biz_bank_name">Bank Account Name:</label>-->
                        <!--                     <input class="form-control" id="biz_bank_name" name="biz_bank_name" value="{{ $user->biz_bank_name }}"  type="text" required />-->
                        <!--                     </div>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                     <label class="mb-2" for="biz_bank_acc_no">Bank Account Number:</label>-->
                        <!--                     <input class="form-control" id="biz_bank_acc_no" name="biz_bank_acc_no" value="{{ $user->biz_bank_acc_no }}"  type="text" required />-->
                        <!--                     </div>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                     <label class="mb-2" for="biz_bank_branch_name">Bank Branch:</label>-->
                        <!--                     <input class="form-control" id="biz_bank_branch_name" name="biz_bank_branch_name" value="{{ $user->biz_bank_branch_name }}"  type="text" required />-->
                        <!--                     </div>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                     <label class="mb-2" for="biz_iban">IBAN:</label>-->
                        <!--                     <input class="form-control" id="biz_iban" name="biz_iban"  value="{{ $user->biz_iban }}"  type="text" required />-->
                        <!--                     </div>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                     <label class="mb-2" for="swift_code">Swift Code (BIC):</label>-->
                        <!--                     <input class="form-control" id="biz_bank_swift_code" name="biz_bank_swift_code" value="{{ $user->biz_bank_swift_code }}" type="text" required />-->
                        <!--                     </div>-->
                        <!--                  </div>-->
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                     <label class="mb-2" for="bank_name">Bank Name:</label>-->
                        <!--                     <input class="form-control" id="biz_bank_name" name="biz_bank_name"   value="{{ $user->biz_bank_name }}" type="text" required />-->
                        <!--                     </div>-->
                        <!--                  </div>-->
                                          
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                        <label class="mb-2">Country :</label>-->
                        <!--                        <select name="bank_country" class="form-select" onchange="getStates(this)" data-class=".bank-state"  required>-->
                        <!--                           <option value="">select</option>-->
                        <!--                           @foreach (getCountries() as $value)-->
                        <!--                              <option value="{{$value->id}}" {{$user->bank_country == $value->id ? "selected" : ""}}>{{ $value->name }}</option>-->
                        <!--                           @endforeach-->
                        <!--                        </select>-->
                        <!--                     </div>-->
                        <!--                  </div>-->
                                          
                                         
                        <!--                  <div class="col-sm-6">-->
                        <!--                     <div class="form-group mb-4">-->
                        <!--                        <label class="mb-2">State :</label>-->
                        <!--                           <select name="bank_state" class="form-select bank-state" data-class=".bank-city"  required>-->
                        <!--                              @foreach (getStates($user->bank_country) as $state)-->
                        <!--                                 <option @if ($user->bank_state == $state->id) selected @endif-->
                        <!--                                    value="{{ $state->id }}">-->
                        <!--                                    {{ $state->name }}</option>-->
                        <!--                              @endforeach-->
                        <!--                           </select>-->
                        <!--                     </div>-->
                        <!--                  </div>-->

                                          
                        <!--               </div>-->
                        <!--            </form>-->

                        <!--         </div>-->
                        <!--      </div>-->
                        <!--   </div>-->
                        <!--</div>-->
                    
                      </div> 
                     <div class="form-group submtit mb-0 gap-mt50 text-right col-sm-12 p-0">
                        <button class="ps-btn ps-btn--sm blue-bg prevBtn" id="prev" style="display:none;">Prev</button>
                        <button class="ps-btn ps-btn--sm blue-bg saveFormBtn" id="next">Save & Next</button>
                     </div>
                  </div>
            </div>



             <!-- -----------------------------------------------------------------------------------------------------------
              --------------------------------------------------------------------------------------------------------------
              ------------------------------------------------------------------------------------------------------------- -->

         </div>
      </div>
   </div>
</div>
<!-- Main Container -->

<script type="module" src="{{asset('allUsers/customer/seller-company-profile.js')}}"></script>







<script>

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
   $('form').removeClass('ActiveForm'); 

   const $next = $current.next(); 
   $current.removeClass('current').hide(); 

   // Check if the next form has the 'last' class
   if ($next.hasClass('last')) {
      $next.show().addClass('current'); 
      $('#next').text('Save'); 
      $next.find('form').addClass('ActiveForm'); 
    //   alert('last');
      return; // Exit the function here to prevent going to the next section
   }

   // Normal flow for non-last forms
   $next.show().addClass('current'); 
   $('#next').text('Save & Next'); 
   $next.find('form').addClass('ActiveForm');

   // Update navigation steps
   $('.current1').removeClass('current1 active').next().addClass('active current1');
   $("li.current1").prevAll().find('span').addClass('active1'); 
   $('#prev').show(); 
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



<!-- ALTER TABLE `cpr_suppliers` ADD `sales_contact_passport_number` TEXT NULL DEFAULT NULL AFTER `sales_contact_position`, ADD `sales_contact_id_number` TEXT NULL AFTER `sales_contact_passport_number`, ADD `sales_contact_visa_number` TEXT NULL AFTER `sales_contact_id_number`; -->

@endsection