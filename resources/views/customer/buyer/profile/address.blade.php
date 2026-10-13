@extends('customer.partials-fn.buyer.header')
@section('content')
<script src="https://littletags.webkype.co/allUsers/axios.js"></script>
<style>
    /* Your custom CSS */
    /* Ensure the processing background is transparent */
    #products-table_processing {
        background-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
        color: #000 !important;
        /* Customize text color */
    }

    .dataTables_filter {
        display: none;
    }

    #products-table_wrapper .dt-search {
        display: none;
    }
</style>
<!-- Main Container -->
<div class="container product_table--listing">
    <div class="row justify-content-center">
        <div class="col-lg-7 offset-lg-2">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12">
                    <h2>Addresses</h2>
                    
                </div>
                <section class="ps-store-box col-sm-12">
                    <div class="ps-section__header">
                        <p><b>Total Records : {{count(Auth::guard('buyer')->user()->addresses)}}</b></p>
                        <div class="ps-section_header2">
                            <div class="ps-section_export ml-4">
                                <a  type="button" data-toggle="modal" data-target="#addressModal" class="" ><label>Add Address</label></a>
                            </div>
                        </div>
                    </div>
                </section>
                
                <div class="ps-section__content p-0">
                    
                   
                    
                    
                    
                    <div class="row">
                        @forelse(Auth::guard('buyer')->user()->addresses as $address)
                          <div class="col-sm-4">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">{{$address->first_name}} {{$address->last_name}} ({{$address->address_type}})</h5>
                                <p class="card-text mb-0"> {{$address->email}},{{$address->mobile}}</p>
                                <p class="card-text mb-0"> {{$address->address_one}} {{$address->address_two}}</p>
                                <p class="card-text mb-0"> {{$address->myCity->name}}, {{$address->myState->name}} </p>
                                <p class="card-text mb-1"> {{$address->myCountry->name}}, {{$address->post_code}} </p>
                               
                                <a class="link-underline edit-address" 
                                   href="javascript:;" 
                                   data-toggle="modal" 
                                   data-target="#addressModal" 
                                   data-id="{{$address->id}}">
                                   Edit
                                </a>
                                |
                                <form action="{{ route('buyer.address.destroy', $address->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="link-underline view ms-3 border-0 ">
                                        Delete
                                    </button>
                                </form>

                             
                                
                            
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
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>



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
<!-- Main Container -->
<script type="module" src="{{asset('allUsers/customer/new-address.js')}}"></script>
<script type="text/javascript" src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>
@endsection













