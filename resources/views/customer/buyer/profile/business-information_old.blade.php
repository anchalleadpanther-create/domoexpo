
@extends('customer.partials-fn.buyer.header')
@section('content')
<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2>Tell Us About Your Business for Better Matches</h2>
               <p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.</p>
               
            </div>
           
            
            <!-- -------------------------------------------------------------------------------------------------------------
             -----------------------------------------------------------------------------------------------------------------
             -------------------------------------------------------------------------------------------------------------- -->

            <div class="ps-my-account">
                  <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important" >
                     <div id="main">
                        
                        <div id="div7"  class="first current" >
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> 
                                       </div>
                                    </div>
                                    <input class="form-control" name="buyer_id"  value="{{ auth()->guard('buyer')->user()->id }}" type="hidden" placeholder="">
                                    <form class="ActiveForm" action="{{route('buyer.profile-update',[auth()->guard('buyer')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       
                                       @csrf 
                                       @method('patch')
                                       <div class="row">
                                          <div class="col-sm-12 text-center">
                                             <h4 class="mb-4 login_heading">Business Type</h4>
                                          </div>
                                           @foreach(getDropdowns("Buyer Business Type")->dropdownValues as $key =>  $vlaue)
                                                @if ($vlaue->displayflag == 1)
                                                    <div class="form-group mb-1 col-6">
                                                       <div class="form-check">
                                                          <input class="form-check-input " type="radio" id="{{$vlaue->id}}{{$vlaue->dropdown_value}}"
                                                           onclick="getFieldsAccordingToBusinessType('{{$vlaue->dropdown_value}}')" value="{{$vlaue->dropdown_value}}"  name="buyer_business_type"
                                                           {{ $vlaue->dropdown_value == $user->buyer_business_type ? 'checked' : '' }} />
                                                          <label class="form-check-label mx-2" for="{{$vlaue->id}}{{$vlaue->dropdown_value}}"> {{$vlaue->dropdown_value}}</label>
                                                       </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            
                                            <div class="col-sm-12">
                                                <!-- is hotel group / chain?-->
                                                 <div class="form-group m-4 " id="is_part_of_hotel_group_and_chain_div">
                                                    <h6 class=" mx-2" for=""> Is your company part of a hotel group / chain?</h6>
                                                     <div class="row">
                                                           <div class="col-6">
                                                              <div class="form-group mb-4">
                                                                 <input class="" type="radio" id="services2-1" name="is_company_part_of_hotel_group_or_chain" value="Yes" 
                                                                 {{ $user->is_company_part_of_hotel_group_or_chain == 'Yes' ? 'checked' : '' }} />
                                                                 <label for="services2-1">Yes</label>
                                                              </div>
                                                           </div>
                                                           <div class="col-6">
                                                                 <div class="form-group mb-4">
                                                                    <input class="" type="radio" id="services2-2" name="is_company_part_of_hotel_group_or_chain" value="No" 
                                                                    {{ $user->is_company_part_of_hotel_group_or_chain == 'No' ? 'checked' : '' }} />
                                                                    <label for="services2-1">No</label>
                                                                 </div>
                                                           </div>
                                                           
                                                     </div>
                                                     <hr>
                                                  </div>
                                                 
                                                 <!-- hotel group / chain lists--> 
                                                 <div class="col-sm-12" id="hotel_n_groups_div">
                                                     <select name="hotel_groups_or_chain" class="form-select" onchange="showTextInputForHotelGroupName(this.value)">
                                                       <option value="">select</option>
                                                       @foreach (getDropdowns("Hotel Groups or Chain")->dropdownValues as $value)
                                                            @if ($vlaue->displayflag == 1)
                                                              <option value="{{ $value->dropdown_value }}" {{ $user->hotel_groups_or_chain ==  $value->dropdown_value ? 'selected' : '' }}>
                                                              {{ $value->dropdown_value }}</option>
                                                            @endif
                                                       @endforeach
                                                     </select>
                                                      <hr>
                                                 </div>
                                                
                                                <!-- other hotel groups div-->  
                                                 <div class="col-sm-12 {{ $user->hotel_groups_or_chain == 'other' ? '' : 'd-none'}}  my-2" id="other_hotel_groups_div">
                                                        <h6 for="other_hotel_groups">Enter your Hotel or Restaurant group or chain</h6>
                                                        <input class="form-control" type="text" id="other_hotel_groups" name="other_hotel_groups"  value="{{ $user->other_hotel_groups }}"  /> 
                                                         <hr>
                                                 </div>
                                                
                                                <!-- closest to your role-->  
                                                 <div class="col-sm-12 my-4"  id="closest_to_your_role_div">
                                                     <h6 for=""> Select the title that is closest to your role.</h6>
                                                     <select name="closest_role_title" class="form-select" >
                                                       <option value="">select</option>
                                                       @foreach (getDropdowns("Positions")->dropdownValues as $value)
                                                            @if ($vlaue->displayflag == 1)
                                                              <option value="{{$value->dropdown_value}}" {{ $value->dropdown_value == $user->closest_role_title ? 'selected' : '' }}>{{ $value->dropdown_value }}</option>
                                                            @endif
                                                       @endforeach
                                                     </select>
                                                      <hr>
                                                 </div>
                                                 
                                                <!-- number of hotels you are looking --> 
                                                 <div class="col-sm-12  my-2"  id="number_of_hotel_or_outlets_div">
                                                     <h6 for="nomber_of_hotels"> Enter the number of hotels or outlets you are looking after.</h6>
                                                     <input class="form-control" type="number" id="nomber_of_hotels" name="nomber_of_hotels_looking_after" value="{{ $user->nomber_of_hotels_looking_after }}"  /> 
                                                     <hr>
                                                 </div>
                                                
                                                <!-- Type of Hotels --> 
                                                 <div class="col-sm-12 my-2"  id="type_of_hotels_div">
                                                     <h6 for=""> Type of Hotels.</h6>
                                                     <div class="row">
                                                           @foreach(getDropdowns("Type of Hotels")->dropdownValues as $key =>  $value)
                                                               @if ($value->displayflag == 1)
                                                               <div class="form-group mb-1 col-6">
                                                                  <div class="ps-checkbox ">
                                                                     <input class="form-control" type="checkbox" id="services{{$key+1}}{{$value->id}}" value="{{$value->id}}" 
                                                                     name="type_of_hotels[]" {{ in_array($vlaue->id,array_column($user->mappedTypesOfHotels->toArray(), 'id')) ? 'checked' : '' }} />
                                                                     <label for="services{{$key+1}}{{$value->id}}"> {{ $value->dropdown_value }}  </label>
                                                                  </div>
                                                               </div>
                                                               @endif
                                                            @endforeach          
                                                      </div>
                                                      <hr>
                                                 </div>
                                                 
                                                 <!-- Type of Hotels --> 
                                                 <div class="col-sm-12 my-2 d-none"  id="type_of_restaurant_or_cafe_div">
                                                     <h6 for="">Type of Restaurant or Cafe.</h6>
                                                     <div class="row">
                                                           @foreach(getDropdowns("Type of Restaurant or Cafe")->dropdownValues as $key =>  $value)
                                                               @if ($value->displayflag == 1)
                                                               <div class="form-group mb-1 col-6">
                                                                  <div class="ps-checkbox ">
                                                                     <input class="form-control" type="checkbox" id="services{{$key+1}}{{$value->id}}" value="{{$value->id}}" 
                                                                     name="type_of_restaurant_or_cafe[]" {{ in_array($vlaue->id,array_column($user->mappedTypesOfHotels->toArray(), 'id')) ? 'checked' : '' }} />
                                                                     <label for="services{{$key+1}}{{$value->id}}"> {{ $value->dropdown_value }}  </label>
                                                                  </div>
                                                               </div>
                                                               @endif
                                                            @endforeach          
                                                      </div>
                                                       <hr>
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
                        <button class="ps-btn ps-btn--sm blue-bg prevBtn" id="prev" style="display:none;">Prev</button>
                        <button class="ps-btn ps-btn--sm blue-bg saveFormBtn" id="next">Save</button>
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

<script type="module" src="{{asset('allUsers/customer/buyer-profile.js')}}"></script>

<script>
    $(document).ready(function(){
        
        toggleHotelGroupsNChainSelectInput();
        // Add event listener for when the input changes
        $('input[name="is_company_part_of_hotel_group_or_chain"]').change(function(){
            toggleHotelGroupsNChainSelectInput();
        });
        getFieldsAccordingToBusinessType("{!! $user->buyer_business_type !!}")
    });
    
    
    function getFieldsAccordingToBusinessType(businessType){
        
        $('#is_part_of_hotel_group_and_chain_div').addClass('d-none');
        $('#hotel_n_groups_div').addClass('d-none');
        
        $('#other_hotel_groups_div').addClass('d-none');
        $('#closest_to_your_role_div').addClass('d-none');
        $('#number_of_hotel_or_outlets_div').addClass('d-none');
        $('#type_of_hotels_div').addClass('d-none');
        $('#type_of_restaurant_or_cafe_div').addClass('d-none');
        
        // console.log(businessType)
        
      if(businessType == 'Hotels & Hotel Apartments'){
          $('#is_part_of_hotel_group_and_chain_div').removeClass('d-none');
          $('#hotel_n_groups_div').removeClass('d-none');
          $('#closest_to_your_role_div').removeClass('d-none');
          $('#number_of_hotel_or_outlets_div').removeClass('d-none');
          $('#type_of_hotels_div').removeClass('d-none');
      } 
      
      if(businessType == 'Restaurants & Cafes'){
          $('#is_part_of_hotel_group_and_chain_div').removeClass('d-none');
          $('#hotel_n_groups_div').removeClass('d-none');
          $('#type_of_restaurant_or_cafe_div').removeClass('d-none');
          $('#closest_to_your_role_div').removeClass('d-none');
          $('#number_of_hotel_or_outlets_div').removeClass('d-none');   
      }
      
      if(businessType == 'Catering Companies'){
          $('#closest_to_your_role_div').removeClass('d-none');
      }
      
      if(businessType == 'Food Production (Cloud Kitchens)'){
          $('#closest_to_your_role_div').removeClass('d-none');
      }
      
      if(businessType == 'Importer & Distributor'){
          $('#closest_to_your_role_div').removeClass('d-none');
      }
      
      if(businessType == 'Consultants and Agencies'){
          $('#closest_to_your_role_div').removeClass('d-none');
      }
      
    }
    
    function toggleHotelGroupsNChainSelectInput(){
        // Get the selected value of the radio button
        let is_company_part_of_hotel_group_or_chain_val = $('input[name="is_company_part_of_hotel_group_or_chain"]:checked').val();
        
        if(is_company_part_of_hotel_group_or_chain_val == 'Yes'){
            // $('#hotel_groups_or_chain').
            $('#hotel_n_groups_div').show();  // Hide the div if 'Yes' is selected
        } else {
            $('#other_hotel_groups_div').addClass('d-none');
            $('#hotel_n_groups_div').hide();  // Show the div if 'No' or another option is selected
        }
    }
    
    function showTextInputForHotelGroupName(hotelGroupName){
        if(hotelGroupName == 'Other'){
            $('#other_hotel_groups_div').removeClass('d-none');  
        }else{
            $('#other_hotel_groups_div').addClass('d-none');
        } 
    }
    
</script>

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
         return; // Exit the function
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



@endsection