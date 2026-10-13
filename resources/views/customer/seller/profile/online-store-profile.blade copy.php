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
            <!-- Company information -->
               <div class="card">
                  <div class="card-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">     
                     <span class="title">Company Type </span>
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
                                    @foreach($describeBusinessValues as $key =>  $describeValue)
                                    @if ($describeValue->displayflag == 1)
                                     <div class="form-group mb-1 col-6">
                                       <div class="ps-checkbox ">
                                          <input class="form-control" type="checkbox" id="services{{$key+1}}"  value="{{$describeValue->id}}" name="describe_seller[]" {{in_array($describeValue->id,array_column($user->suppllierDescribedSeller->toArray(), 'id')) ? "checked"  :""}} />
                                          <label for="services{{$key+1}}"> {{$describeValue->dropdown_value}}</label>
                                       </div>
                                    </div>
                                    @endif
                                    @endforeach
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
        
            <!-- Certifications & Highlights-->
               <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false">
                     <span class="title">Certifications & Labels</span>
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

            <!-- Online Channels-->
               <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false">
                     <span class="title">Online Channels</span>
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

            <!-- Client References-->
               <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false">
                     <span class="title">Client References</span>
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
                        <tbody id="ClientTestimonialsTableBody">
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
    //   console.log(response);
    }
   document.addEventListener('DOMContentLoaded', function() {
    getClientTestimonialsTable()
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
    
    // this function gets and sets categories, brands, filters and options dynamically to the front end.
    function getClientTestimonialsTable(userId = null) {
        alert();
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
                
            }
        });
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