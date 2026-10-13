
@extends('customer.partials-fn.buyer.header')
@section('content')
<script src="{{asset('allUsers/axios.js')}}"></script>
<link rel="stylesheet" href="https://christianbayer.github.io/image-uploader/dist/image-uploader.min.css">

<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2>Tell Us About Your Business for Better Matches</h2>
               <p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.</p>
               
            </div>
            
            
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="accordion" id="accordionExample">
                        <div class="card"  style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                          <div class="card-header  p-4" data-toggle="collapse" data-target="#companyProfileSection" aria-expanded="true">     
                             <span class="title text-dark"> Company Information </span>
                             <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                          </div>
                          <div id="companyProfileSection" class="collapse current show py-4" data-parent="#accordionExample">
                              <form class="ActiveForm" action="{{route('buyer.profile-update',[auth()->guard('buyer')->user()->id])}}" method="post"  enctype="multipart/form-data"> 
                              <input class="form-control" name="buyer_id"  value="{{ auth()->guard('buyer')->user()->id }}" type="hidden" placeholder="">
                                    @csrf 
                                    @method('patch')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 my-2" >
                                           <h5>Account Type :</h5>
                                           <select class="form-control" name="account_type" id="account_type" disabled>
                                              <option value="Architect"  {{$user->account_type == "Architect" ? "selected" : "" }}>Architect</option>
                                              <option value="Contractor"  {{$user->account_type == "Contractor" ? "selected" : "" }}>Contractor</option>
                                              <option value="Quantity Surveyor" {{$user->account_type == "Quantity Surveyor" ? "selected" : "" }}>Quantity Surveyor</option>
                                              <option value="Developer" {{$user->account_type == "Developer" ? "selected" : "" }}>Developer</option>
                                              <option value="Buyer" {{$user->account_type == "Buyer" ? "selected" : "" }}>Buyer</option>
                                           </select>
                                        </div>
                                        
                                        @if($user->account_type == "Contractor")
                                        <div class="col-sm-12">
                                            <div class="form-group mb-4">
                                               <label class="mb-2" for="contact_name">Contractor Type</label>
                                               <select class="form-select " name="contractor_type[]" multiple required>
                                                    <option value="">Select</option>  
                                                    @foreach(getDropdowns('Contractor Type')->dropdownValues as $value)
                                                        <option value="{{$value->dropdown_value}}" {{ in_array($value->dropdown_value , $user->contractor_type) ? 'selected'  : '' }} >{{$value->dropdown_value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                          </div>
                                        @endif
                                        
                                        <div class="col-sm-6 my-2" >
                                             <h5 class="mb-2">Company Name :</h5>
                                             <input class="form-control" name="company_name" value="{{ $user->company_name }}" type="text" />
                                        </div>
                                        
                                        <div class="col-sm-6 my-2" >
                                             <h5 class="mb-2">Registration Number:</h5>
                                             <input class="form-control" name="registration_no" value="{{ $user->registration_no }}" type="text" />
                                        </div>
                                        
                                        <div class="col-sm-6 my-2" >
                                             <h5 class="mb-2">VAT Number :</h5>
                                             <input class="form-control" name="vat_no" value="{{ $user->vat_no }}" type="text" />
                                        </div>
                                        
                                        <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                          <h5 class="mb-2">Telephone No. :</h5>
                                          <div class="row">
                                                <div class="col-4" style="padding-right: 5px;">
                                                   <select class="form-select phonecode" name="telephone_code" id="companyphonecode" style="padding: 0; text-align: center;">
                                                      @foreach (getCountries() as $country)
                                                            <option value="{{ $country->phonecode }}" {{$country->phonecode == $user->telephone_code  ? 'selected' : ''}}  data-image="{{ $country->flag_icon}}" >{{ $country->phonecode }}</option>
                                                      @endforeach
                                                   </select>
                                                </div>

                                             <div class="col-8"  style="padding-left: 5px;">
                                                   <input class="form-control" name="telephone_no" value="{{$user->telephone_no}}" type="text" />
                                             </div>
                                          </div>
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-6 my-2" >
                                             <h5 class="mb-2">Address :</h5>
                                             <input class="form-control" name="Address" value="{{ $user->address }}" type="text" />
                                        </div>
                                        
                                        
                                       <div class="col-lg-6 my-2">
                                            <h5 for="first_name">Name :</h5>
                                            <input class="form-control" type="text" id="first_name" name="buyer_first_name"  value="{{ $user->first_name }}"  /> 
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <h5 for="last_name">Surname :</h5>
                                            <input class="form-control" type="text" id="last_name" name="buyer_last_name"  value="{{ $user->last_name }}"  /> 
                                        </div>
                                        
                                        <div class="col-lg-6  my-2">
                                            <h5 for="email">Email Address :</h5>
                                            <input class="form-control" type="text" id="email" name="buyer_email"  value="{{ $user->email }}"  /> 
                                        </div>
                                        
                                        <div class="col-lg-6  my-2">
                                            <h5 for="phone"> Mobile No. :</h5>
                                            <input class="form-control" type="text" id="phone" name="buyer_phone"  value="{{ $user->phone }}"  /> 
                                        </div>
                                        
                                        
                                        <!--Social Media-->
                                        <div class="col-lg-6  my-2">
                                            <h5 for="youtube_video"> Youtube Video Link:</h5>
                                            <input class="form-control" type="text" id="youtube_video" name="youtube_video"  value="{{ $user->youtube_video ?? "" }}"  /> 
                                        </div>
                                        
                                        <div class="col-lg-6  my-2">
                                                <h5 for="website">Website</h5>
                                                <input class="form-control" name="website_url"  value="{{ $user->website_url }}" type="text"  id="website"   placeholder="Website Profile URL">
                                        </div>

                                        <div class="col-lg-6  my-2">
                                                <h5 for="linkedin">Linkedin</h5>
                                                <input class="form-control" name="linkedin_url"  value="{{ $user->linkedin_url }}" type="text"  id="linkedin"   placeholder="Linkedin Profile URL">
                                        </div>
                                        <div class="col-lg-6  my-2">
                                                <h5 for="instagram">Instagram</h5>
                                                <input class="form-control" name="instagram_url"  value="{{ $user->instagram_url }}" type="text" id="instagram"    placeholder="Instagram Profile  URL">
                                        </div>

                                        <div class="col-lg-6  my-2">
                                                <h5 for="facebook">Facebook</h5>
                                                <input class="form-control" name="facebook_url"  value="{{ $user->facebook_url }}" type="text" id="facebook"   placeholder="Facebook Profile URL">
                                        </div>
                                        <!---->
                                        
                                        
                                        
                                        
                                        
                                        <div class="col-lg-12  my-2">
                                            <h5 for="phone"> Describe you work:</h5>
                                            <textarea class="form-control" row="10" id="description" name="description">{{ $user->description ?? "" }}</textarea>
                                        </div>
                                        
                                        <div class="col-lg-6  my-2">
                                            <h5 for="phone"> Profile Image:</h5>
                                            <input class="form-control" type="file" id="profile_img" name="profile_img"  /> 
                                        </div>
                                        
                                        
                                         <div class="col-lg-6 text-center my-2">
                                            <a href="{{asset('uploads/buyer')}}/{{$user->photo}}" class="" target="_blank"><img src="{{asset('uploads/buyer')}}/{{$user->photo}}" width="200" height="100" class="profile-img"></a> 
                                        </div>
                                        
                                       
                                        
                                        
                                    </div>
                                    
                                    <div class="row d-none">
                                      <div class="col-sm-12">
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
                                        
                                        <div class="col-sm-12 ">
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
                                         
                                         
                                         <div class="row">
                                       <div class="col-sm-12">
                                           <button class="ps-btn ps-btn--sm blue-bg saveFormBtn" id="next">Save</button>
                                       </div> 
                                       </div>  
                                         
                                         
                                   
                                </form>
                             </div>
                          </div>
                       </div>
                    </div>
                </div>
                
                
                @if($user->account_type != "Buyer")
                <!--gallary -->
                 <div class="col-lg-12 mt-5">
                    <div class="accordion" id="accordionExample">
                        <div class="card"  style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                          <div class="card-header  p-4" data-toggle="collapse" data-target="#companyProfileSection" aria-expanded="true">     
                             <span class="title text-dark"> Gallery Images </span>
                             <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                          </div>
                          
                          <form action="{{route('buyer.upload-gallary-images')}}" method="post"  enctype="multipart/form-data">
                              @csrf
                            <div id="companyProfileSection" class="collapse show py-4" data-parent="#accordionExample">
                             <div class="card-body">
                                
                                <div class="row">
                                   <div class="col-lg-12 my-2">
                                        <h5 for="first_name"> Gallery Images:</h5>
                                        <div class="gallary_images"></div>

                                    </div>
                                    
                                    <div class="col-sm-12 mt-4">
                                        <button class="ps-btn ps-btn--sm blue-bg px-4">Save</button>
                                    </div>
                                    
                                </div>
                                
                             </div>
                          </div>
                          </form>
                       </div>
                    </div>
                </div>
                @endif
                
                <div class="col-lg-12 mt-5">
                    <div class="accordion" id="accordionExample2">
                        <div class="card"  style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                          <div class="card-header p-4" data-toggle="collapse" data-target="#buyerAddresses" aria-expanded="true">     
                             <span class="title text-dark">  Delivery Location </span>
                             <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                          </div>
                          <div id="buyerAddresses" class="collapse show py-4" data-parent="#accordionExample2">
                             <div class="card-body">
                                <div class="row">
                                    @forelse(Auth::guard('buyer')->user()->addresses as $address)
                                      <div class="col-sm-6">
                                        <div class="card" style="border:2px solid #DEDEDE;">
                                            
                                          <div class="card-body">
                                            <h5 class="card-title text-blue d-flex justify-content-between "><span class="font-weight-bold">{{$address->first_name}} {{$address->last_name}}</span>  <span class="font-weight-bold"> {{$address->address_type}} </span></h5>
                                            <!--<p class="card-text mb-0"> {{$address->email}}</p>-->
                                            <p class="card-text mb-0"> {{$address->address_one}} {{$address->address_two}}</p>
                                            <p class="card-text mb-0"> {{$address->myCity->name}} - {{$address->post_code}}  </p>
                                            <p class="card-text mb-2">{{$address->myState->name}} -  {{$address->myCountry->name}}</p>
                                            <p class="card-text mb-1"> {{$address->mobile}}</p>
                                           </div>
                                          
                                          <div class="card-footer d-flex justify-content-between font-weight-bold">
                                              <form action="{{ route('buyer.address.destroy', $address->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="link-underline view ms-3 border-0 font-weight-bold">
                                                        Remove
                                                    </button>
                                                </form>
                                                
                                                <a class="link-underline edit-address font-weight-bold" 
                                                   href="javascript:;" 
                                                   data-toggle="modal" 
                                                   data-target="#addressModal" 
                                                   data-id="{{$address->id}}">
                                                   Edit
                                                </a>
                                               
                                                
                                          </div>
                                          
                                        </div>
                                      </div>
                                    @empty
                                      <div class="col-sm-12">
                                        <div class="card">
                                          <div class="card-body text-center">
                                            <h5 class="card-title">Address not available.</h5>
                                           
                                          </div>
                                        </div>
                                      </div>
                                    @endforelse
                                    
                                    <div class="col-sm-12 mt-4">
                                        <button class="ps-btn ps-btn--sm blue-bg px-4" data-toggle="modal" data-target="#addressModal">CREATE NEW ADDRESS</button>
                                    </div>
                                    
                                </div>   
                             </div>
                          </div>
                       </div>
                    </div>
                </div>
                
                <div class="col-lg-12 mt-5">
                    <div class="accordion" id="accordionExample">
                        <div class="card"  style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                          <div class="card-header  p-4" data-toggle="collapse" data-target="#companyProfileSection" aria-expanded="true">     
                             <span class="title text-dark"> Change Password </span>
                             <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                          </div>
                          
                          <form action="{{route('buyer.set-new-password')}}" method="post">
                              @csrf
                            <div id="companyProfileSection" class="collapse show py-4" data-parent="#accordionExample">
                             <div class="card-body">
                                
                                <div class="row">
                                   <div class="col-lg-6 my-2">
                                        <h5 for="first_name"> Email Address :</h5>
                                        <input class="form-control" type="text"  name="email"  value="{{ $user->email }}" readonly  /> 
                                    </div>
                                    
                                    <div class="col-lg-6 my-2">
                                        <h5 for="last_name">Current Password :</h5>
                                        <input class="form-control" type="password" id="current_password" name="current_password"  value=""  required /> 
                                    </div>
                                    <div class="col-lg-6  my-2">
                                        <h5 for="email">New Password :</h5>
                                        <input class="form-control" type="password" id="new_password" name="password"  value="" required /> 
                                    </div>
                                    <div class="col-lg-6  my-2">
                                        <h5 for="phone">Confirm New Password :</h5>
                                        <input class="form-control" type="password" id="confirm_new_password" name="password_confirmation"  value="" required /> 
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <button class="ps-btn ps-btn--sm blue-bg px-4">SUBMIT</button>
                                    </div>
                                </div>
                                
                             </div>
                          </div>
                          </form>
                       </div>
                    </div>
                </div>
                
                
             </div>
            
            
            
            
         </div>
      </div>
   </div>
</div>
<!-- Main Container -->



<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Address</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{route('buyer.address.store')}}" class="customer-form new-address-form" method="post">
            @csrf
            <input type="hidden" name="rfq_id" id="rfq_id_for_change_status">
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="firstName">First Name <span class="required">*</span></label>
                              <input type="text" class="form-control" name="first_name" maxlength="50" id="firstName" value="" required="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="lastName">Last Name <span class="required">*</span></label>
                              <input type="text" class="form-control" name="last_name" maxlength="50" id="lastName" value="" required="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="customerEmail">Email <span class="required">*</span></label>
                              <input type="email" class="form-control"  name="address_email" maxlength="100" id="customerEmail" value="" required="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="customerMobile">Phone <span class="required">*</span></label>
                              <input type="number" class="form-control"  min="0" name="address_mobile" pattern="[0-9]{10}" id="customerMobile" value="" required="">
                           </div>
                        </div>
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
                              <select class="form-control countries" name="country" onchange="getStates(this)" data-class=".states" >
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
                              <select class="form-select states" name="state" onchange="getCities(this)" data-class=".cities" >
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>City <span class="required">*</span></label>
                              <select class="form-select cities" name="city" >
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12 my-3">
                           <div class="row">
                              <div class="col">
                                 <div class="form-check">
                                    <input type="radio" name="address_type" id="addressRadio1" value="Home address" checked="">
                                    <label class="form-check-label" for="addressRadio1">
                                    Home Address
                                    </label>
                                 </div>
                              </div>
                              <div class="col">
                                 <div class="form-check">
                                    <input  type="radio" name="address_type" id="addressRadio2" value="Office address">
                                    <label class="form-check-label" for="addressRadio2">
                                    Office Address
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-success">submit</button>
            </div>
         </form>
      </div>
   </div>
</div>


<script type="module" src="{{asset('allUsers/customer/buyer-profile.js')}}"></script>
<script type="module" src="{{asset('allUsers/customer/new-address.js')}}"></script>
<script type="text/javascript" src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>


<script type="text/javascript" src="https://christianbayer.github.io/image-uploader/dist/image-uploader.min.js"></script>



<script>

   $(document).ready(function(){
        // Convert PHP preloaded array to a JSON format that JS can read
        let preloaded = {!! json_encode($preloaded) !!};
        
        // Initialize the image uploader with preloaded images
        $('.gallary_images').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'gallary_images',    // Name for new images
            preloadedInputName: 'old',            // Name for preloaded images (existing)
            maxSize: 2 * 1024 * 1024,             // Max file size: 2MB
            maxFiles: 18                           // Max number of files: 20
        });
    });
   
</script>

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