@extends('customer.partials-fn.seller.header')
@section('content')
<style>
     .tag {
         display: inline-flex;
         align-items: center;
         background-color: #EBEBEB; 
         padding: 5px 10px;
         margin: 5px;
         border-radius: 35px;
      }
      #tagsContainer > div > span{
         background: #EBEBEB;
         border: 0px solid #ddd !important;
         padding: 3px 10px;
         border-radius: 100px;
         font-size: 12px;
      }
      .tag span {
         margin-right: 1px;
      }

      .tag .fa-close {
         cursor: pointer;
         margin-top:2;
      }

      .autocomplete-items {
         position: absolute;
         border-bottom: none;
         border-top: none;
         z-index: 99;
         top: 100%;
         left: 0;
         right: 0;
      }

      .autocomplete-items div {
         padding: 10px;
         cursor: pointer;
         background-color: #fff;
         border-bottom: 1px solid #d4d4d4;
      }

      .autocomplete-items div:hover {
         background-color: #e9e9e9;
      }


      </style>
<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2> Get ready to sell</h2>
               <p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.</p>
            </div>
            <div class="accordion" id="accordionExample">
         <!-- Business information -->
               <div class="card">
                  <div class="card-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">     
                     <span class="title">Business information </span>
                     <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                     <div class="card-body">
                    <form action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                        @csrf 
                        @method('patch')
                        <div class="row mb-4 "> 
                           <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                              <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Business Type *</label>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                             <div class="row">
                                    
                             
                             
                              </div>
                           </div>
                        </div>

                        <div class="row mb-4 "> 
                           <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                              <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Target Customer*</label>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                             <div class="row">
                                    @foreach($sellerLikeToSell as $key =>  $vlaue)
                                    @if ($vlaue->displayflag == 1)
                                     <div class="form-group mb-1 col-6">
                                       <div class="ps-checkbox ">
                                          <input class="form-control" type="checkbox" id="{{$vlaue->id}}{{$vlaue->dropdown_value}}"  value="{{$vlaue->id}}" name="like_to_sell[]" {{in_array($vlaue->id,array_column($user->suppllierLikeToSell->toArray(), 'id')) ? "checked"  :""}}  />
                                          <label for="{{$vlaue->id}}{{$vlaue->dropdown_value}}"> {{$vlaue->dropdown_value}}</label>
                                       </div>
                                    </div>
                                    @endif
                                    @endforeach
                              </div>
                           </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Business Name (as per license):*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="biz_company"  value="{{ $user->biz_company }}" type="text" placeholder="" required>
                                </div>
                            </div>
                            
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Business name public*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control"  name="company_short_name"  value="{{ $user->company_short_name }}" type="text" placeholder="" required>
                                </div>
                            </div>


                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Business Establishment Date:*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control"  name="company_establishment_date"  value="{{ $user->company_establishment_date }}" type="date" required>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Trade License Number:*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="trade_license"  value="{{ $user->trade_license }}"   type="text" placeholder="" required>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">VAT Number :*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="vat_number"  value="{{ $user->vat_number }}"   type="text" placeholder="" required>
                                </div>
                            </div>
                            


                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Customer Service Email:*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="customer_service_email"  value="{{ $user->customer_service_email }}" type="text" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Phone Number (Landline):*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="phone_number"  value="{{ $user->phone_number }}"  type="text" placeholder="" required>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">High Definition Logo :*</label>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="biz_logo" type="file" @if(empty($user->biz_company_logo)) required @endif>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 ">
                                <div class="form-group">
                                   <img src="{{ !empty($user->biz_company_logo) ? asset('uploads/supplier/'.$user->biz_company_logo)  : asset('allUsers/no-image.png') }}" height="80"  width="80" alt="Logo" >
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group submit d-flex justify-content-end">
                                <button class="ps-btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>

                     </div>
                  </div>
               </div>
         <!-- Address & Locations -->
               <div class="card">
                  <div class="card-header" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">     
                     <span class="title">Address & Locations</span>
                     <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                     <div class="card-body addServices pt-4">
                        <div class="col-sm-12">
                           <form action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                        @csrf 
                        @method('patch')

                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Country*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <select name="biz_office_country" class="form-select" onchange="getStates(this)" data-class=".state"  required>
                                       <option value="">select</option>
                                       @foreach (getCountries() as $value)
                                          <option value="{{$value->id}}" {{$user->biz_office_country == $value->id ? "selected" : ""}}>{{ $value->name }}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">State*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <select name="biz_office_state" class="form-select state" onchange="getCities(this)" data-class=".city"  required>
                                       @foreach (getStates($user->biz_office_country) as $state)
                                          <option @if ($user->biz_office_state === $state->id) selected @endif
                                             value="{{ $state->id }}">
                                             {{ $state->name }}</option>
                                       @endforeach
                                    </select>
                                    <!-- <input class="form-control" name="biz_office_state"  value="{{ $user->biz_company }}" type="text" placeholder=""> -->
                                </div>
                            </div>

                             <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">City*</label>
                                </div>
                            
                              </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <select name="biz_office_city" class="form-select city"  required>
                                       @foreach (getCities($user->biz_office_state) as $city)
                                          <option @if ($user->biz_office_city == $city->id) selected @endif
                                             value="{{ $city->id }}">
                                             {{ $city->name }}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">PO Box*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="biz_office_po_box"  value="{{ $user->biz_office_po_box }}" type="text" placeholder="" required>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Street name*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="biz_office_street_name" max="500"  value="{{ $user->biz_office_street_name }}" type="text" placeholder=""  required>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Building name*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="biz_office_building_name" max="500"  value="{{ $user->biz_office_building_name }}" type="text" placeholder=""  required>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Floor*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="biz_office_floor" max="255"  value="{{ $user->biz_office_floor }}" type="text" placeholder=""  required>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Office Number*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="biz_office_number" max="255"  value="{{ $user->biz_office_number }}" type="text" placeholder=""  required>
                                </div>
                            </div>



                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Service Location</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                              <div class="row">
                                 <div class="col-4">
                                    <div class="form-group mb-4">
                                       <input class="" type="radio" id="services2-1" name="selling_scope" value="Global" checked />
                                       <label for="services2-1">Global</label></div>
                                 </div>
                                 <div class="col-4">
                                    <div class="form-group mb-4">
                                       <input class="" type="radio" id="services2-2" name="selling_scope" value="Local" />
                                       <label for="services2-1">Local</label></div>
                                    </div>
                                 </div>
                              </div>
                           

                           <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 hideIfLocalSelected">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Select countries </label>
                                </div>
                            </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 hideIfLocalSelected">
                                 <div class="form-group mb-4 search_box">
                                    <input type="text" id="countryInput" placeholder="Enter or search country name" class="form-control">
                                    <i class="fa fa-search"></i>
                                 </div>
                                
                                 <div class="form-group mb-4 search_input" id="tagsContainer">
                                    <input type="hidden" name="country[]" value="">
                                    @if(!empty($user->suppllierCountries))
                                       @foreach($user->suppllierCountries as $value)
                                          <div class="tag"><input type="hidden" name="country[]" value="{{$value->id}}"><span>{{$value->name}}</span><i class="fa fa-close" aria-hidden="true" onclick="removeAddedCountry(this,'{{$user->id}}','{{$value->id}}')"></i></div>
                                       @endforeach
                                    @endif
                                    
                                 </div>
                           </div>

                            <!-- <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Office ZIP*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="biz_office_zip"  value="{{ $user->biz_office_zip }}" type="text" placeholder=""  required>
                                </div>
                            </div> -->

                            
                            <!-- <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                <div class="form-group mb-2">
                                    <label class="mb-0 mt-4">Office Address*</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group mb-4">
                                    <input class="form-control" name="biz_office_address"  value="{{ $user->biz_office_address }}" type="text" placeholder="" required>
                                </div>
                            </div> -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group submit d-flex justify-content-end">
                                <button class="ps-btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                        </div>
                     </div>
                  </div>
               </div>
         <!-- Person of Authority -->
               <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false">
                     <span class="title">Person of Authority</span>
                     <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                     <div class="card-body">
                        <!-- <p>Person of Authority</p> -->
                        <form action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                              @csrf 
                              @method('patch')
                              <div class="row">
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Full name :*</label>
                                    </div>
                                 </div>

                                 

                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="pa_name"  value="{{ $user->pa_name }}" type="text" placeholder="" required>
                                    </div>
                                 </div>
                                 
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Nationality :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                       <select name="pa_nationality" class="form-select" required >
                                          <option value="">select</option>
                                          @foreach ($nationalities as $value)
                                             <option value="{{$value->id}}" {{$user->pa_nationality == $value->id ? "selected" : ""}}>{{ $value->dropdown_value }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>


                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Position/Role :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                       <select class="form-select" name="pa_position" required>
                                          <option value="">select</option>
                                          @foreach ($positionsValues as $value)
                                             <option value="{{$value->id}}" {{ $user->pa_position == $value->id ? 'selected' : '' }}>{{$value->dropdown_value}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>

                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Passport No :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="pa_passport_number"  value="{{ $user->pa_passport_number }}" type="text" placeholder="" required>
                                    </div>
                                 </div>
                              
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">National ID no. :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="pa_id_number"  value="{{ $user->pa_id_number }}"  type="text" placeholder="" required>
                                    </div>
                                 </div>
                                 
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Visa Number :</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="pa_visa_number"  value="{{ $user->pa_visa_number }}"   type="text" placeholder="">
                                    </div>
                                 </div>
                              
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group submit d-flex justify-content-end">
                                    <button class="ps-btn">Save</button>
                                    </div>
                                 </div>
                              </div>
                        </form>
                     </div>
                  </div>
               </div>

         <!-- Contact information -->
               <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false">
                     <span class="title">Contact information</span>
                     <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                     <div class="card-body">
                           <p>Sales Contact</p>
                        <form action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                              @csrf 
                              @method('patch')
                              <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                       <div class="form-group mb-2">
                                             <label class="mb-0 mt-4">Name :*</label>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                       <div class="form-group mb-4">
                                             <input class="form-control" name="sales_contact_name"  value="{{ $user->sales_contact_name }}" type="text" placeholder="eg. Petter Parker">
                                       </div>
                                    </div>
                                    
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                       <div class="form-group mb-2">
                                             <label class="mb-0 mt-4">Position :*</label>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                       <div class="form-group mb-4">
                                          <select class="form-select" name="sales_contact_position">
                                             <option value="">select</option>
                                             @foreach ($positionsValues as $value)
                                                <option value="{{$value->id}}" {{ $user->sales_contact_position == $value->id ? 'selected' : '' }}>{{$value->dropdown_value}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                       <div class="form-group mb-2">
                                             <label class="mb-0 mt-4">Email Address :*</label>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                       <div class="form-group mb-4">
                                             <input class="form-control" name="sales_contact_email"  value="{{ $user->sales_contact_email }}" type="text" placeholder="eg. Noida">
                                       </div>
                                    </div>
                                 
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                       <div class="form-group mb-2">
                                             <label class="mb-0 mt-4">Mobile Number :*</label>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                       <div class="form-group mb-4">
                                             <input class="form-control" name="sales_contact_number"  value="{{ $user->sales_contact_number }}"  type="text" placeholder="">
                                       </div>
                                    </div>
                             
                              </div>

                              <div class="row">
                               
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <hr>
                                    <p>Finance Contact</p>
                                 </div>
                                  
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Finance Contact Person Name :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="finance_contact_person_name"  value="{{ $user->finance_contact_person_name }}"   type="text" placeholder="eg. Mr. Jack" required>
                                    </div>
                                 </div>
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Position :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                       <select class="form-select" name="finance_contact_position">
                                          <option value="">select</option>
                                          @foreach ($positionsValues as $value)
                                             <option value="{{$value->id}}" {{ $user->finance_contact_position == $value->id ? 'selected' : '' }}>{{$value->dropdown_value}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>

                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Finance Contact Email ID (for Notifications) :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="finance_contact_email"  value="{{ $user->finance_contact_email }}"   type="text" placeholder="eg. example@mail.com">
                                    </div>
                                 </div>

                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Finance Person Mobile Number :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="finance_person_mobile_number"  value="{{ $user->finance_person_mobile_number }}"   type="text" placeholder="">
                                    </div>
                                 </div>
                             
                              </div>
                              <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group submit d-flex justify-content-end">
                                    <button class="ps-btn">Save</button>
                                    </div>
                                 </div>
                              </div>
                        </form>
                     </div>
                  </div>
               </div>
         <!-- Bank details -->
               <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false">
                     <span class="title">Bank details</span>
                     <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                     <div class="card-body">
                        <!-- <p>Bank Account</p> -->
                        <form action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                              @csrf 
                              @method('patch')
                              <div class="row">
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Beneficiary Name :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="biz_bank_beneficiary_name"  value="{{ $user->biz_bank_beneficiary_name }}" type="text" placeholder="eg. Petter Parker" required>
                                    </div>
                                 </div>

                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Bank Name :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="biz_bank_name"  value="{{ $user->biz_bank_name }}"   type="text" placeholder="eg. ABC Bank " required>
                                    </div>
                                 </div>

                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Bank Branch :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="biz_bank_branch_name"  value="{{ $user->biz_bank_branch_name }}" type="text" placeholder="eg. Noida" required>
                                    </div>
                                 </div>

                                   <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Bank address :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="biz_bank_address"  value="{{ $user->biz_bank_address }}" type="text" placeholder="eg. 500111005425854254" required>
                                    </div>
                                 </div>
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Bank Account Number :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="biz_bank_acc_no"  value="{{ $user->biz_bank_acc_no }}" type="text" placeholder="eg. 500111005425854254" required>
                                    </div>
                                 </div>
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">IBAN :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="biz_iban"  value="{{ $user->biz_iban }}"  type="text" placeholder="" required>
                                    </div>
                                 </div>
                                 
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Swift Code (BIC) :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="biz_bank_swift_code"  value="{{ $user->biz_bank_swift_code }}"   type="text" placeholder="" required>
                                    </div>
                                 </div>
                              
                                 

                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group submit d-flex justify-content-end">
                                    <button class="ps-btn">Save</button>
                                    </div>
                                 </div>
                              </div>
                        </form>
                     </div>
                  </div>
               </div>

         <!-- Company Brief-->
               <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false">
                     <span class="title">Company Brief</span>
                     <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseSix" class="collapse" data-parent="#accordionExample">
                     <div class="card-body">
                        <form action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                               @csrf 
                              @method('patch') 
                              <input class="form-control" name="supplier_id" value="{{auth()->guard('vendor')->user()->id}}" type="hidden">

                              <div class="row">
                                 <div class="ccol-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Short Description*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                        <textarea  id="company_short_desc" name="company_short_desc" rows="3" class="form-control">{{ $user->company_short_desc }}</textarea>
                                    </div>
                                 </div>

                                 <div class="ccol-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Full Description*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                        <textarea  id="company_full_desc" name="company_full_desc" rows="3" class="form-control">{{ $user->company_full_desc }}</textarea>
                                    </div>
                                 </div>

                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group submit d-flex justify-content-end">
                                    <button class="ps-btn">Save</button>
                                    </div>
                                 </div>
                              </div>
                        </form>
                     </div>
                  </div>
               </div>
         
         <!-- Questions & Answers-->
               <div class="card d-none">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#QuestionsNAnswersSection" aria-expanded="false">
                     <span class="title">Questions & Answers</span>
                     <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="QuestionsNAnswersSection" class="collapse" data-parent="#accordionExample">
                     <div class="card-body">
                           <p>Questions & Answers</p>
                        <form action="{{route('seller.save-seller-qna')}}" method="post"  enctype="multipart/form-data">
                              @csrf 
                              <input class="form-control" name="supplier_id" value="{{auth()->guard('vendor')->user()->id}}" type="hidden">

                              <div class="row">
                                 <div class="ccol-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">1. How many employees are there in your company?*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="question_1"  id="question_1_1" value="{{isset($supplierQnA->question_1) ? $supplierQnA->question_1 : ''}}"   type="text" placeholder="eg. 50">
                                    </div>
                                 </div>
                                 
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">2. Is your company's core business related to eco-friendly products or services?*</label>
                                    </div>
                                 </div>

                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-checkbox" name="question_2"  id="question_2_1" value="yes"   type="radio" {{isset($supplierQnA->question_2) && $supplierQnA->question_2 == 'yes'  ? 'checked' : ''}}  >
                                          <label for="question_2_1">Yes</label>
                                          <input class="form-checkbox" name="question_2"  value="no" id="question_2_2" type="radio" {{isset($supplierQnA->question_2) && $supplierQnA->question_2 == 'no'  ? 'checked' : ''}} >
                                          <label for="question_2_2">No</label>
                                    </div>
                                 </div>
                                
                              
                                 
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">3. Is your company fully owned or hold share above 50% by a female?*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-checkbox" name="question_3"  value="yes"  id="question_3_1"    type="radio"  {{isset($supplierQnA->question_3) && $supplierQnA->question_3 == 'yes'  ? 'checked' : ''}}>
                                          <label for="question_3_1">Yes</label>
                                          <input class="form-checkbox" name="question_3"  value="no" id="question_3_2" type="radio"  {{isset($supplierQnA->question_3) && $supplierQnA->question_3 == 'no'  ? 'checked' : ''}}>
                                          <label for="question_3_2">No</label>
                                    </div>
                                 </div>
                              
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">4. Is your company CEO, MD or General Manager female?*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-checkbox" name="question_4"  value="yes" id="question_4_1"   type="radio"  {{isset($supplierQnA->question_4) && $supplierQnA->question_4 == 'yes'  ? 'checked' : ''}}>
                                          <label for="question_4_1">Yes</label>
                                          <input class="form-checkbox" name="question_4"  value="no" id="question_4_2" type="radio"  {{isset($supplierQnA->question_4) && $supplierQnA->question_4 == 'no'  ? 'checked' : ''}}>
                                          <label for="question_4_2">No</label>
                                    </div>
                                 </div>


                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">5. Is your company's employees equal or above 50% females?</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-checkbox" name="question_5"  value="yes" id="question_5_1"   type="radio"   {{isset($supplierQnA->question_5) && $supplierQnA->question_5 == 'yes'  ? 'checked' : ''}}>
                                          <label for="question_5_1">Yes</label>
                                          <input class="form-checkbox" name="question_5"  value="no" id="question_5_2" type="radio"  {{isset($supplierQnA->question_5) && $supplierQnA->question_5 == 'no'  ? 'checked' : ''}}>
                                          <label for="question_5_2">No</label>
                                    </div>
                                 </div>

                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">6. Does your company have third party liability insurance?</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-checkbox" name="question_6"  value="yes" id="question_6_1"   type="radio" {{isset($supplierQnA->question_6) && $supplierQnA->question_6 == 'yes'  ? 'checked' : ''}}>
                                          <label for="question_6_1">Yes</label>
                                          <input class="form-checkbox" name="question_6"  value="no" id="question_6_2" type="radio" {{isset($supplierQnA->question_6) && $supplierQnA->question_6 == 'no'  ? 'checked' : ''}}>
                                          <label for="question_6_2">No</label>
                                    </div>
                                 </div>

                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">7. Does your company provide solution to reduce plastic or plastic related products?</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-checkbox" name="question_7"  value="yes" id="question_7_1"   type="radio" {{isset($supplierQnA->question_7) && $supplierQnA->question_7 == 'yes'  ? 'checked' : ''}}>
                                          <label for="question_7_1">Yes</label>
                                          <input class="form-checkbox" name="question_7"  value="no" id="question_7_2" type="radio" {{isset($supplierQnA->question_7) && $supplierQnA->question_7 == 'no'  ? 'checked' : ''}}>
                                          <label for="question_7_2">No</label>
                                    </div>
                                 </div>

                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">8. Does your company officially committed to net zero target</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mt-4 py-2">
                                          <input class="form-checkbox" name="question_8"  id="question_8_1" value="yes"   type="radio"  {{isset($supplierQnA->question_8) && $supplierQnA->question_8 == 'yes'  ? 'checked' : ''}}>
                                          <label for="question_8_1">Yes</label>
                                          <input class="form-checkbox" name="question_8"  value="no" id="question_8_2" type="radio"  {{isset($supplierQnA->question_8) && $supplierQnA->question_8 == 'no'  ? 'checked' : ''}}>
                                          <label for="question_8_2">No</label>
                                    </div>
                                 </div>

                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group submit d-flex justify-content-end">
                                    <button class="ps-btn">Save</button>
                                    </div>
                                 </div>
                              </div>
                        </form>
                     </div>
                  </div>
               </div>

         <!-- Social Media & Digital-->
               <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false">
                     <span class="title">Social Media & Digital</span>
                     <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseSeven" class="collapse" data-parent="#accordionExample">
                     <div class="card-body">
                       <form action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                              @csrf 
                              @method('patch')
                              <div class="row">
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Facebook :</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="facebook_url"  value="{{ $user->facebook_url }}" type="text" placeholder="Facebook Profile URL">
                                    </div>
                                 </div>

                                 

                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Twitter :</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="twitter_url"  value="{{ $user->twitter_url }}" type="text"  placeholder="Twitter Profile URL">
                                    </div>
                                 </div>

                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Linkedin :</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="linkedin_url"  value="{{ $user->linkedin_url }}" type="text"   placeholder="Linkedin Profile URL">
                                    </div>
                                 </div>

                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Youtube :</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="youtube_url"  value="{{ $user->youtube_url }}" type="text" placeholder="Youtube Profile URL">
                                    </div>
                                 </div>
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4"> Instagram :</label>
                                    </div>
                                 </div>
                                 
                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-group mb-4">
                                          <input class="form-control" name="instagram_url"  value="{{ $user->instagram_url }}" type="text"  placeholder="Instagram Profile  URL">
                                    </div>
                                 </div>
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group submit d-flex justify-content-end">
                                    <button class="ps-btn">Save</button>
                                    </div>
                                 </div>

                              </div>
                         </form>
                     </div>
                  </div>
               </div>

            <!-- Client Testimonials-->
               <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false">
                     <span class="title">Enter testimonials from 3 of your top customers</span>
                     <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseEight" class="collapse" data-parent="#accordionExample">
                     <div class="card-body">
                        @if(count($clientTestimonials)  < 3)
                           <form action="{{route('seller.save-seller-client-testimonials')}}" method="post"  enctype="multipart/form-data">
                                 @csrf 
                                 <input class="form-control" name="supplier_id" value="{{auth()->guard('vendor')->user()->id}}" type="hidden">
                                 <input class="form-control" name="testimonial_id" value="" type="hidden">
                                 <div class="row">

                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                       <div class="form-group mb-2">
                                             <label class="mb-0 mt-4">Client Name*</label>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                       <div class="form-group mb-4">
                                             <input class="form-control" name="client_name" type="text" placeholder="Enter Client Name" required>
                                       </div>
                                    </div>

                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                       <div class="form-group mb-2">
                                             <label class="mb-0 mt-4">Client Location*</label>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                       <div class="form-group mb-4">
                                             <input class="form-control" name="client_location"  type="text"  placeholder="Enter Location" required>
                                       </div>
                                    </div>

                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                                       <div class="form-group mb-2">
                                             <label class="mb-0 mt-4">Testimonial*</label>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                       <div class="form-group mb-4">
                                          <textarea  id="" name="testimonial" rows="3" class="form-control"></textarea>
                                       </div>
                                    </div>

                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                       <div class="form-group mb-2">
                                             <label class="mb-0 mt-4">Project image or catalogue</label>
                                       </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                       <div class="form-group mb-4">
                                             <input class="form-control" name="catelogues"  type="file">
                                       </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                       <div class="form-group submit d-flex justify-content-end">
                                       <button class="ps-btn">Save</button>
                                       </div>
                                    </div>
                                 </div>
                           </form>
                        @endif
                       <!-- clientTestimonials -->

                     <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Cliant Name</th>
                              <th scope="col">Client Location</th>
                              <th scope="col">Testimonial</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($clientTestimonials as $key =>  $value)
                           <tr>
                              <th scope="row">{{ $key+1 }}</th>
                              <td>
                              Name :  {{$value->client_name}} <br>
                              @if(!empty($value->catelogue))
                                 View Catalogue : <a href="{{ !empty($value->catelogue) ? asset('uploads/supplier/catelogue/' . $value->catelogue) : '#' }}" target="_blank">
                                 <span class="text-primary">View</span>
                                 </a>
                              @endif

                              </td>
                              <td>{{$value->client_location}}</td>
                              <td>{{$value->testimonial}}</td>
                              <td>
                                 <a href="javascript:void(0)" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#editTestimonialModal" onclick="getClientTestimonials('{{$value->id}}')">Edit</a> <br>
                                 <a href="{{route('seller.deleteClientTestimonial',[$value->id])}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger  mb-1">Delete</a>
                              </td>
                           </tr>
                           @endforeach
                           
                        </tbody>
                        </table>
                     </div>

                     </div>
                  </div>
               </div>

         <!-- Certifications & Highlights-->
               <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false">
                     <span class="title">Add Certifications</span>
                     <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseNine" class="collapse" data-parent="#accordionExample">
                     <div class="card-body">
                        <form action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                              @csrf 
                              @method('patch')
                              <div class="row">
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Quality:*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                    <div class="form-group mb-4 border">
                                       <select class="form-select" name="quality_certificates[]" multiple>
                                          <option value="">select</option>
                                          @foreach ($quality_certificates as $value)
                                             <option value="{{$value->id}}" 
                                                   {{ in_array($value->id, json_decode($user->quality_certificates ?? '[]', true) ?? []) ? 'selected' : '' }}>
                                                   {{$value->dropdown_value}}
                                             </option>
                                          @endforeach 
                                       </select>
                                    </div>
                                 </div>

                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Sustainability:*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                    <div class="form-group mb-4 border">
                                       <select class="form-select" name="sustainability_certificates[]" multiple>
                                          <option value="">select</option>
                                          @foreach ($sustainability_certificates as $value)
                                             <option value="{{$value->id}}" {{ in_array($value->id,json_decode($user->sustainability_certificates ?? '[]',true) ?? '[]') ? 'selected' : '' }}>{{$value->dropdown_value}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
     
                                 <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                    <div class="form-group mb-2">
                                          <label class="mb-0 mt-4">Others :*</label>
                                    </div>
                                 </div>
                                 <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                    <div class="form-group mb-4 border">
                                       <select class="form-select border border-dark" name="other_certificates[]" multiple>
                                          @foreach ($other_certificates as $value)
                                             <option value="{{$value->id}}" {{ in_array($value->id,json_decode($user->other_certificates ?? '[]',true) ?? '[]') ? 'selected' : '' }}>{{$value->dropdown_value}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                                            
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group submit d-flex justify-content-end">
                                    <button class="ps-btn">Save</button>
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



<div class="modal fade" id="editTestimonialModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Testimonial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('seller.save-seller-client-testimonials')}}" method="post"  enctype="multipart/form-data">
         @csrf
         <div class="modal-body">
               <input type="hidden" class="form-control" id="testimonial_id" name="testimonial_id">

            <div class="mb-3">
               <label for="client_name" class="form-label">Client Name</label>
               <input type="text" class="form-control" id="client_name" name="client_name" required>
            </div>
            <div class="mb-3">
               <label for="client_location" class="form-label">Client Location</label>
               <input type="text" class="form-control" id="client_location" name="client_location" required>
            </div>
            <div class="mb-3">
               <label for="testimonial" class="form-label">Testimonial</label>
               <textarea class="form-control" id="testimonial" name="testimonial" required></textarea>
            </div>

            <div class="mb-3">
               <label for="testimonial" class="form-label">Catelogue</label>
               <input class="form-control" name="catelogues"  type="file">
            </div>
         </div>
         <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Save</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </form>
    </div>
  </div>
</div>

<script>
   function getClientTestimonials(testimonialId){
      let editTestimonialModal = new bootstrap.Modal(document.getElementById('editTestimonialModal'), {
                  keyboard: false
               });
      editTestimonialModal.show();
      fetch(`${route('seller.getTestimonial',{testimonialId})}`)
          .then(response => response.json())
          .then(data => {
              document.getElementById('testimonial_id').value = data.data.testimonial.id;
              document.getElementById('client_name').value = data.data.testimonial.client_name;
              document.getElementById('client_location').value = data.data.testimonial.client_location;
              document.getElementById('testimonial').value = data.data.testimonial.testimonial;
          });
   }
</script>
<script>
  async function removeAddedCountry(e,sellerId,countryId){
       let response = await fetch(`${route('deleteSupplierMapCountry', {sellerId,countryId})}`);
      //  let response = await fetch(`${route('getStates', countryId)}`);
      let parentElement = e.parentNode;
      if (parentElement) {
            parentElement.parentNode.removeChild(parentElement);
      }
       console.log(response);
    }
   document.addEventListener('DOMContentLoaded', function() {
    const countries = @json(getCountries());
    const input = document.getElementById('countryInput');
    const tagsContainer = document.getElementById('tagsContainer');

    input.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const filteredCountries = countries.filter(country => country.name.toLowerCase().includes(query));
        showAutocompleteSuggestions(filteredCountries);
    });

    input.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const query = this.value.toLowerCase();
            const matchingCountry = countries.find(country => country.name.toLowerCase() === query);
            if (matchingCountry) {
                addTag(matchingCountry.id,matchingCountry.name);
                this.value = '';
                removeAutocompleteSuggestions();
            }
        }
    });

    function showAutocompleteSuggestions(filteredCountries) {
        removeAutocompleteSuggestions();
        const autocompleteItems = document.createElement('div');
        autocompleteItems.setAttribute('class', 'autocomplete-items');
        input.parentNode.appendChild(autocompleteItems);
        filteredCountries.forEach(country => {
            const item = document.createElement('div');
            item.innerHTML = country.name;
            item.addEventListener('click', function() {
                addTag(country.id,country.name);
                input.value = '';
                removeAutocompleteSuggestions();
            });
            autocompleteItems.appendChild(item);
        });
    }

    function removeAutocompleteSuggestions() {
        const autocompleteItems = document.querySelector('.autocomplete-items');
        if (autocompleteItems) {
            autocompleteItems.parentNode.removeChild(autocompleteItems);
        }
    }

    function addTag(id,name) {
        const tag = document.createElement('div');
        tag.classList.add('tag');
        
        const inputField = document.createElement('input');
        inputField.type = 'hidden';
        inputField.name = 'country[]';
        inputField.value = id;
        
        const tagName = document.createElement('span');
        tagName.textContent = name;
        
        const closeIcon = document.createElement('i');
        closeIcon.classList.add('fa', 'fa-close');
        closeIcon.addEventListener('click', function() {
            tag.parentNode.removeChild(tag);
        });
        
        tag.appendChild(inputField);
        tag.appendChild(tagName);
        tag.appendChild(closeIcon);
        
        tagsContainer.appendChild(tag);
    }

    

    document.addEventListener('click', function(e) {
        if (!input.contains(e.target) && !tagsContainer.contains(e.target)) {
            removeAutocompleteSuggestions();
        }
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const globalRadio = document.getElementById('services2-1');
        const localRadio = document.getElementById('services2-2');
        const elementsToToggle = document.querySelectorAll('.hideIfLocalSelected');

        function toggleVisibility() {
            if (localRadio.checked) {
                elementsToToggle.forEach(function(element) {
                    element.style.display = 'none';
                });
            } else if (globalRadio.checked) {
                elementsToToggle.forEach(function(element) {
                    element.style.display = 'block';
                });
            }
        }

        globalRadio.addEventListener('change', toggleVisibility);
        localRadio.addEventListener('change', toggleVisibility);

        // Initial check on page load
        toggleVisibility();
    });
</script>

@endsection