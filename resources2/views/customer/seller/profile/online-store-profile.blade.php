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

      .select2 {
         border : 1px solid gray !important;
      }


      </style>
<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2>Create Online Store</h2>
               <p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.</p>
            </div>
            
            <!-- -------------------------------------------------------------------------------------------------------------
             -----------------------------------------------------------------------------------------------------------------
             -------------------------------------------------------------------------------------------------------------- -->

            <div class="ps-my-account online_store--steps">
                  <div class="ps-form--account ps-tab-root ps-form--account-width" >

                     <div id="main">
                        
                        <div id="div7"  class="first {{ Request::segment(3) == 'business-type' ? 'current' : '' }}"  style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(100/7)*1}}%;"> 
                                       </div>
                                    </div>
                                    <input class="form-control" name="supplier_id"  value="{{ auth()->guard('vendor')->user()->id }}" type="hidden" placeholder="">
                                    <form class="ActiveForm" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf 
                                       @method('patch')
                                       <div class="row">
                                          <div class="col-sm-12 text-center">
                                             <h4 class="mb-4 login_heading">Business Type</h4>
                                          </div>
                                          <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                <div class="row">
                                                      @foreach($describeBusinessValues as $key =>  $describeValue)
                                                      @if ($describeValue->displayflag == 1)
                                                      <div class="form-group mb-1 col-12 col-sm-6 ">
                                                         <div class="ps-checkbox border border  border-2 rounded m-1 p-3">
                                                            <input class="form-control" type="checkbox" id="services{{$key+1}}"  value="{{$describeValue->id}}" name="describe_seller[]" {{in_array($describeValue->id,array_column($user->suppllierDescribedSeller->toArray(), 'id')) ? "checked"  :""}} />
                                                            <label for="services{{$key+1}}"> {{$describeValue->dropdown_value}}</label>
                                                         </div>
                                                      </div>
                                                      @endif
                                                      @endforeach
                                                </div>
                                             </div>
                                          </div>
                                         
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div id="div8" class="{{ Request::segment(3) == 'offerings-and-spacialization' ? 'current' : '' }}"  style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active">
                                 <div class="ps-form__content">
                                  
                                 <div class="progress mb-5">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(100/7)*2}}%;"></div>
                                 </div>
                                 <form action="{{ route('seller.profile-update', [auth()->guard('vendor')->user()->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="row">
                                       <!-- Contact Information -->
                                       <div class="col-sm-12  text-center">
                                       <h4 class="mb-4 login_heading">Services offered</h4>
                                       </div>
                                       <div class="col-sm-12">
                                          <div class="form-group mb-4">
                                             <input class="form-control" id="business_offering_one" name="business_offering_one" value="{{ $user->business_offering_one }}" type="text" max="255" placeholder=" Specialization or Unique Selling Points" required />
                                          </div>
                                       </div>

                                       <div class="col-sm-12">
                                          <div class="form-group mb-4">
                                             <input class="form-control" id="business_offering_two" name="business_offering_two" value="{{ $user->business_offering_two }}" type="text" max="255" placeholder=" Specialization or Unique Selling Points" required />
                                          </div>
                                       </div>

                                       <div class="col-sm-12">
                                          <div class="form-group mb-4">
                                             <input class="form-control" id="business_offering_three" name="business_offering_three" value="{{ $user->business_offering_three }}" type="text" max="255" placeholder=" Specialization or Unique Selling Points" required />
                                          </div>
                                       </div>

                                       <div class="col-sm-12">
                                          <div class="form-group mb-4">
                                             <input class="form-control" id="business_offering_four" name="business_offering_four" value="{{ $user->business_offering_four }}" type="text" max="255" placeholder=" Specialization or Unique Selling Points" required />
                                          </div>
                                       </div>
                                       
                                      
                                    </div>

                                 </form>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div id="div9" class="{{ Request::segment(3) == 'company-brief' ? 'current' : '' }}"  style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(100/7)*3}}%;"> 
                                       </div>
                                    </div>
                                    <form class="" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf
                                       <div class="row">
                                          <div class="col-sm-12  text-center">
                                             <h4 class="mb-4 login_heading">Write a brief about your Company</h4>
                                          </div>
                                          <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                <textarea  id="company_full_desc" name="company_full_desc" rows="3" class="form-control">{{ $user->company_full_desc }}</textarea>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     
                        <div id="div10" class="{{ Request::segment(3) == 'company-images' ? 'current' : '' }}"  style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(100/7)*4}}%;"> 
                                       </div>
                                    </div>
                                    <form class="" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf
                                       <div class="row">
                                          <div class="col-sm-12  text-center">
                                             <h4 class="mb-4 login_heading">Logo & Home page image</h4>
                                          </div>
                                          
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Upload Company Logo :</label>
                                                <input class="form-control" name="biz_logo"  type="file"  accept="image/*">

                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <img src="{{ !empty($user->biz_company_logo) ? asset('uploads/supplier/'.$user->biz_company_logo)  : asset('allUsers/no-image.png') }}" height="80"  width="100" alt="Logo" >
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Upload Home page image</label>
                                                <input class="form-control" name="biz_home_page_img"   type="file"  accept="image/*">
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <img src="{{ !empty($user->biz_home_page_image) ? asset('uploads/supplier/'.$user->biz_home_page_image)  : asset('allUsers/no-image.png') }}" height="80"  width="100" alt="Logo" >
                                             </div>
                                          </div>

                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div id="div11" class="{{ Request::segment(3) == 'certification' ? 'current' : '' }}"  style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(100/7)*5}}%;"> 
                                       </div>
                                    </div>
                                    <form class="" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf
                                       <div class="row">
                                          <div class="col-sm-12  text-center">
                                             <h4 class="mb-4 login_heading">Add company Certification & Labels</h4>
                                          </div>
                                          
                                         

                                          <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Quality</label>
                                                <select class="form-select border" name="quality_certificates[]" multiple>
                                                   <option value="">select</option>
                                                   @foreach ($quality_certificates as $value)
                                                      <option value="{{$value->id}}" 
                                                            {{ in_array($value->id, json_decode($user->quality_certificates ?? '[]', true) ?? []) ? 'selected' : '' }}>
                                                            {{$value->dropdown_value}}
                                                      </option>
                                                   @endforeach 
                                                </select>
                                             </div>
                                             
                                             <div class="row my-2">
                                                 
                                                 @foreach (getDropdownValues(json_decode($user->quality_certificates)) as $value)
                                                 <div class="col-3">
                                                        <img src="{{ !empty($value->icon) ? asset('uploads/dropdown/'.$value->icon)  : asset('allUsers/no-image.png') }}" height="80"  width="100" alt="Logo" class="rounded mx-auto d-block">

                                                 </div>
                                                 @endforeach
                                             </div>
                                          </div>

                                          <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Sustainability</label>
                                                <select class="form-select border" name="sustainability_certificates[]" multiple>
                                                   <option value="">select</option>
                                                   @foreach ($sustainability_certificates as $value)
                                                      <option value="{{$value->id}}" {{ in_array($value->id,json_decode($user->sustainability_certificates ?? '[]',true) ?? '[]') ? 'selected' : '' }}>{{$value->dropdown_value}}</option>
                                                   @endforeach
                                                </select>

                                             </div>
                                             
                                             
                                             <div class="row my-2">
                                                 
                                                 @foreach (getDropdownValues(json_decode($user->sustainability_certificates)) as $value)
                                                 <div class="col-3">
                                                        <img src="{{ !empty($value->icon) ? asset('uploads/dropdown/'.$value->icon)  : asset('allUsers/no-image.png') }}" height="80"  width="100" alt="Logo" class="rounded mx-auto d-block">
                                                 </div>
                                                 @endforeach
                                             </div>
                                          </div>
                                           <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Others</label>
                                                <select class="form-select border border-dark " name="other_certificates[]" multiple>
                                                   @foreach ($other_certificates as $value)
                                                      <option value="{{$value->id}}" {{ in_array($value->id,json_decode($user->other_certificates ?? '[]',true) ?? '[]') ? 'selected' : '' }}>{{$value->dropdown_value}}</option>
                                                   @endforeach
                                                </select>

                                             </div>
                                             <div class="row my-2">
                                                 @foreach (getDropdownValues(json_decode($user->other_certificates)) as $value)
                                                 <div class="col-3">
                                                        <img src="{{ !empty($value->icon) ? asset('uploads/dropdown/'.$value->icon)  : asset('allUsers/no-image.png') }}" height="80"  width="100" alt="Logo" class="rounded mx-auto d-block">
                                                 </div>
                                                 @endforeach
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div id="div12" class="{{ Request::segment(3) == 'online-channels' ? 'current' : '' }}"  style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(100/7)*6}}%;"> 
                                       </div>
                                    </div>
                                    <form class="" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf
                                       <div class="row">
                                          <div class="col-sm-12  text-center">
                                             <h4 class="mb-4 login_heading">Online Channels</h4>
                                          </div>

                                          <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Website</label>
                                                <input class="form-control" name="biz_website"  value="{{ $user->biz_website }}" type="text"   placeholder="Website Profile URL">
                                             </div>
                                          </div>

                                          <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Linkedin</label>
                                                <input class="form-control" name="linkedin_url"  value="{{ $user->linkedin_url }}" type="text"   placeholder="Linkedin Profile URL">
                                             </div>
                                          </div>
                                          <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Instagram</label>
                                                <input class="form-control" name="instagram_url"  value="{{ $user->instagram_url }}" type="text"  placeholder="Instagram Profile  URL">
                                             </div>
                                          </div>

                                          <!--<div class="col-sm-12">-->
                                          <!--   <div class="form-group mb-4">-->
                                          <!--      <label class="mb-2">Youtube</label>-->
                                          <!--      <input class="form-control" name="youtube_url"  value="{{ $user->youtube_url }}" type="text" placeholder="Youtube Profile URL">-->
                                          <!--   </div>-->
                                          <!--</div>-->
                                          
                                          <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                <label class="mb-2">Facebook</label>
                                                <input class="form-control" name="facebook_url"  value="{{ $user->facebook_url }}" type="text" placeholder="Facebook Profile URL">
                                             </div>
                                          </div>

                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div id="div13"  class="last {{ Request::segment(3) == 'client-references' ? 'current' : '' }}"  style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(100/7)*7}}%;"> 
                                       </div>
                                    </div>
                                   <form class="" action="{{route('seller.save-seller-client-testimonials')}}" method="post"  enctype="multipart/form-data">
                                       @csrf 
                                       <input class="form-control" name="supplier_id" value="{{auth()->guard('vendor')->user()->id}}" type="hidden">
                                       <input class="form-control" name="testimonial_id" value="" type="hidden">
                                       <input  id="is_last_div" name="is_last_div" value="1"  type="hidden" required />

                                       @if(count($clientTestimonials) < 3)
                                       <div class="row" id="clientTestimonialsFormDiv">
                                          <div class="col-sm-12  text-center">
                                             <h4 class="mb-4 login_heading">Enter Client References (up to 3)</h4>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2" for="client_name">Client Company Name</label>
                                                <input class="form-control" name="client_name" type="text" placeholder="Enter Client Name" required>
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2" for="client_country">Client country</label>
                                                <select name="client_country" class="form-select"  data-class=".state"  required>
                                                   <option value="">select</option>
                                                   @foreach (getCountries() as $value)
                                                      <option value="{{$value->id}}">{{ $value->name }}</option>
                                                   @endforeach
                                                </select>
                                            
                                             </div>
                                          </div>

                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2" for="client_city">Client City</label>
                                                <input class="form-control"  name="client_city"  type="text" required />
                                             </div>
                                          </div>

                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2" for="person_name">Person name (Optional)</label>
                                                <input class="form-control"  name="person_name"  type="text" required />
                                             </div>
                                          </div>

                                          <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                <label class="mb-2" for="biz_bank_acc_no">Testimonial (maximum 100 words)</label>
                                                <textarea  id="" name="testimonial" rows="3" class="form-control"></textarea>
                                             </div>
                                          </div>

                                          <div class="col-sm-6">
                                             <div class="form-group mb-4">
                                                <label class="mb-2" for="biz_bank_acc_no">Client Logo</label>
                                                <input class="form-control" name="catelogues"  type="file" accept="image/*">
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="row">
                                          <!-- clientTestimonials -->
                                          <div class="col-sm-12">
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
                                                <tbody id="ClientTestimonialsTableBody">
                                                   <!--@foreach ($clientTestimonials as $key =>  $value)-->
                                                   <!--<tr>-->
                                                   <!--   <th scope="row">{{ $key+1 }}</th>-->
                                                   <!--   <td>-->
                                                   <!--   Name :  {{$value->client_name}} <br>-->
                                                   <!--   @if(!empty($value->catelogue))-->
                                                   <!--      View Catalogue : <a href="{{ !empty($value->catelogue) ? asset('uploads/supplier/catelogue/' . $value->catelogue) : '#' }}" target="_blank">-->
                                                   <!--      <span class="text-primary">View</span>-->
                                                   <!--      </a>-->
                                                   <!--   @endif-->

                                                   <!--   </td>-->
                                                   <!--   <td>{{@$value->getClientCountry->name}},{{$value->client_city}}</td>-->
                                                   <!--   <td>{{$value->testimonial}}</td>-->
                                                   <!--   <td>-->
                                                   <!--      <a href="javascript:void(0)" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#editTestimonialModal" onclick="getClientTestimonials('{{$value->id}}')">Edit</a> <br>-->
                                                   <!--      <a href="javascript:void(0)" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger  mb-1">Delete</a>-->
                                                   <!--   </td>-->
                                                   <!--</tr>-->
                                                   <!--@endforeach-->
                                                   
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
               <div class=" mb-3">
                  <label class="mb-2" for="client_country">Client country</label>
                  <select id="client_country" name="client_country" class="form-select"  data-class=".state"  required>
                     <option value="">select</option>
                     @foreach (getCountries() as $value)
                        <option value="{{$value->id}}">{{ $value->name }}</option>
                     @endforeach
                  </select>
               
               </div>

            <div class="mb-3">
               <label for="client_location" class="form-label">Client City</label>
               <input type="text" class="form-control" id="client_city" name="client_city" required>
            </div>
            <div class="form-group mb-4">
               <label class="mb-2" for="person_name">Person name (Optional)</label>
               <input class="form-control" id="person_name" name="person_name"  type="text"  />
            </div>

            <div class="mb-3">
               <label for="testimonial" class="form-label">Testimonial</label>
               <textarea class="form-control" id="testimonial" name="testimonial" ></textarea>
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

<script>
   function getClientTestimonials(testimonialId){
      let editTestimonialModal = new bootstrap.Modal(document.getElementById('editTestimonialModal'), {
                  keyboard: false
               });
      editTestimonialModal.show();
      fetch(`${route('seller.getTestimonial',{testimonialId})}`)
          .then(response => response.json())
          .then(data => {
              document.getElementById('testimonial').value = data.data.testimonial.testimonial;
              document.getElementById('testimonial_id').value = data.data.testimonial.id;
              document.getElementById('client_name').value = data.data.testimonial.client_name;
              const clientCountrySelect = document.getElementById('client_country');
               clientCountrySelect.value = data.data.testimonial.client_country;

               // Update Select2 to reflect this change
               $(clientCountrySelect).trigger('change');
              document.getElementById('client_city').value = data.data.testimonial.client_city;
              document.getElementById('person_name').value = data.data.testimonial.person_name;
              document.getElementById('client_location').value = data.data.testimonial.client_location;
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
        getClientTestimonialsTable()
    });
    // this function gets and sets categories, brands, filters and options dynamically to the front end.
    function getClientTestimonialsTable(userId = null) {
        $.ajax({
            url: route('seller.get-client-testimonials-html'),
            type: 'GET',
            data: {
                user_id: userId  // Pass the user ID as part of the data
            },
            dataType: 'json',
            success: function(response) {
                // Assuming you have a <div id="categoryTable"></div> in your HTML
                $('#ClientTestimonialsTableBody').html(response.html);
                if(response.totalTestimonials >= 3){
                    $('#clientTestimonialsFormDiv').addClass('d-none');
                }else{
                    $('#clientTestimonialsFormDiv').removeClass('d-none');
                }
            }
        });
    }
    
    function deleteClientTestimonialsTableData(testimonial_id) {
        if(confirm('Are you want to delete?')){
            $.ajax({
                url: route('seller.delete-client-testimonials-table-data',{ testimonial_id: testimonial_id }),
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    getClientTestimonialsTable()
                }
            });
        } 
    }
    
   
    
    
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