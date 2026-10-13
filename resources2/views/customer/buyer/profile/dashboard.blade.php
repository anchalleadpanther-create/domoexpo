@extends('customer.partials-fn.buyer.header')
@section('content')

<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2> Dashboard</h2>
               <p>Information about your current plan and usages</p>
            </div>

            <div class="row">
                
                <div class="col-12">
                   <!-- Subscription & Account Status Alerts --> 
                   @if($user->status == 0)
                       <div class="alert {{ $user->status == 1 ? 'alert-success' : 'alert-warning' }} alert-dismissible fade show" role="alert">
                           <h4 class="alert-heading">Account is Pending!</h4>
                           <p>Your account is Pending for approval. Please complete your company profile and other details to help expedite the approval process.</p>
                           <button type="button" class="close " data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                   @endif
                
                   @if($user->status == 2 || $user->status == 3)
                       <div class="alert {{ $user->status == 1 ? 'alert-success' : 'alert-warning' }} alert-dismissible fade show" role="alert">
                           <h4 class="alert-heading">Account {{$user->status == 2 ? 'Disapproved' : 'On Hold'}}</h4>
                           <p>Your account is {{$user->status == 2 ? 'Disapproved' : 'on Hold'}}.</p>
                           @if(!empty($user->status_reason))
                               <p class="mt-0 mb-0"><strong>Reason : </strong>{{$user->status_reason}}</p>
                           @endif
                           @if(!empty($user->status_comment))
                               <p class="mt-0 mb-0"><strong>Comment : </strong>{{$user->status_comment}}</p>
                           @endif
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                   @endif
    
                   @if($user->account_type != 'Buyer')  
                       <div class="card mb-4">
                           <div class="card-body pt-4 pb-4">
                               <div class="row align-items-center">
                                   <div class="col-6">
                                       <h5>Platform Yearly Subscription</h5>
                                       <p class="mb-0 text-success">Membership Status : {{$user->isMembershipActive ? 'Active' : 'Inactive'}}</p>
                                       <p class="mb-0 text-danger">Membership Expiry On: {{ !empty($user->membership_expiry_date) ? date('d M Y',strtotime($user->membership_expiry_date)) : 'NA'}} </p>
                                   </div>
                                   <div class="col-6 text-end">
                                       
                                        <!--  Buy Subscription modal Button-->
                                        <button type="button" class="ps-btn text-end" data-bs-toggle="modal" data-bs-target="#buySubscriptionModalButton">
                                          Buy Subscription
                                        </button>
                                   </div>
                               </div> 
                           </div>
                       </div>
                   @endif
                </div>
                
                
                

                <!-- Modal -->
                <div class="modal fade" id="buySubscriptionModalButton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{ route('jcc.order') }}" method="POST">
                          <div class="modal-body">
                            
                               @csrf
                               <input type="hidden" name="amount" value="{{ getPlatformFee('Platform Fee') }}" required>
                               <input type="hidden" name="currency" value="978">
                               
                               <div class="row">
                                   <div class="col-12">
                                       <h4>Platform Fee : Euro {{ getPlatformFee('Platform Fee') }}</h4>
                                   </div>
                                   <div class="col-8">
                                       <label class="form-lable">Do you have any coupon code?</label>
                                       <input class="form-control form-control-sm" style="height:25px;" name="code">
                                       <button type="button" class="btn btn-success mt-2 coupon-btn">Apply</button>
                                   </div>
                                   
                               </div>
                               
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="ps-btn text-end " data-bs-dismiss="modal">Close</button>
                            <button @if($user->isMembershipActive) type="button" onclick="alert('You already have an active subscription.')" @else type="submit" @endif class="ps-btn text-end">Buy Now</button>
                           
                          </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Shared Enquiries (All Roles) -->
                
                @if($user->account_type == 'Buyer')  
                <div class="col-lg-4 mt-2">
                   <div class="accordion">
                      <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                         <div class="card-header text-center p-4">
                            <span class="title text-dark">Product Enquiries </span>
                         </div>
                         <div class="collapse show py-4">
                            <div class="card-body text-center">
                               <a class="ps-btn px-4 py-5 fs-35" href="{route('buyer.product-enquiry')}} "><strong> {{$data['totalProductEnquiries'] ?? 0 }}</strong></a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                
                @endif
                
                 <!-- Role Specific Logic -->
                @php
                    $role = Auth::guard('buyer')->user()->account_type;
                @endphp
               
                <div class="col-lg-{{$role == 'Contractor' ? '6' : '4'}} mt-2">
                   <div class="accordion">
                      <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                         <div class="card-header text-center p-4">
                            <span class="title text-dark">RFQ Enquiries</span>
                         </div>
                         <div class="collapse show py-4">
                            <div class="card-body text-center">
                               <a class="ps-btn px-4 py-5 fs-35" href="{{route('buyer.rfq-enquiries')}}"><strong> {{$data['totalRFQEnquiries'] ?? 0 }}</strong></a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>


               

                <!-- 1. CONTRACTOR VIEW -->
                @if($role == 'Contractor')
                    <div class="col-lg-6 mt-2">
                       <div class="accordion">
                          <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                             <div class="card-header text-center p-4">
                                <span class="title text-dark">Assigned Projects</span>
                             </div>
                             <div class="collapse show py-4">
                                <div class="card-body text-center">
                                   <a class="ps-btn px-4 py-5 fs-35" href="{{route('buyer.all-projects')}}"><strong> {{$data['totalProjects'] ?? 0 }}</strong></a>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                       <div class="accordion">
                          <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                             <div class="card-header text-center p-4">
                                <span class="title text-dark">Accepted Projects</span>
                             </div>
                             <div class="collapse show py-4">
                                <div class="card-body text-center">
                                   <a class="ps-btn px-4 py-5 fs-35" href="{{route('buyer.all-projects')}}"><strong>{{$data['totalAccetped'] ?? 0 }}</strong></a>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    
                    <div class="col-lg-6 mt-2">
                       <div class="accordion">
                          <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                             <div class="card-header text-center p-4">
                                <span class="title text-dark">Not Sure Projects</span>
                             </div>
                             <div class="collapse show py-4">
                                <div class="card-body text-center">
                                   <a class="ps-btn px-4 py-5 fs-35" href="{{route('buyer.all-projects')}}"><strong>{{$data['totalNotSure'] ?? 0 }}</strong></a>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                       <div class="accordion">
                          <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                             <div class="card-header text-center p-4">
                                <span class="title text-dark">Declined Projects</span>
                             </div>
                             <div class="collapse show py-4">
                                <div class="card-body text-center">
                                   <a class="ps-btn px-4 py-5 fs-35" href="{{route('buyer.all-projects')}}"><strong>{{$data['totalDeclined'] ?? 0 }}</strong></a>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>

                <!-- 2. ARCHITECT & DEVELOPER VIEW -->
                @elseif($role == 'Architect' || $role == 'Developer')

                    {{-- List of statuses to display --}}
                    @php
                        $statuses = [
                            'Pending',
                            'Sent to Architect', 
                            'Assign to Architect', 
                            'Architect Start Working', 
                            'Sent to Quantity Surveyors', 
                            //'Assign to Quantity Surveyors', 
                            'Sent to Contractor', 
                            'Assign to Contractor'
                            
                            
                        ];
                    @endphp

                    {{-- Loop through statuses and generate cards dynamically --}}
                    @foreach($statuses as $status)
                        @php
                            // Convert 'Sent to Architect' -> 'totalSentToArchitect'
                            $key = 'total' . str_replace(' ', '', ucwords($status)); 
                        @endphp

                        <div class="col-lg-4 mt-2">
                           <div class="accordion">
                              <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                                 <div class="card-header text-center p-4">
                                    <span class="title text-dark">{{ $status }}</span>
                                 </div>
                                 <div class="collapse show py-4">
                                    <div class="card-body text-center">
                                       {{-- Pass query param to filter list page by status if needed --}}
                                       <a class="ps-btn px-4 py-5 fs-35" href="{{route('buyer.projects', ['status' => $status])}}">
                                            <strong>{{ $data[$key] ?? 0 }}</strong>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                        
                    @endforeach
                    
                    {{-- Also show total projects --}}
                    <div class="col-lg-4 mt-2">
                       <div class="accordion">
                          <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                             <div class="card-header text-center p-4">
                                <span class="title text-dark">Total Projects</span>
                             </div>
                             <div class="collapse show py-4">
                                <div class="card-body text-center">
                                   <a class="ps-btn px-4 py-5 fs-35" href="{{route('buyer.projects')}}">
                                        <strong>{{ $data['totalProjects'] ?? 0 }}</strong>
                                   </a>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>

                    

                @endif

            </div>
         </div>
      </div>
   </div>
</div>

<script type="module" src="{{ asset('allUsers/customer/apply-coupon.js') }}"></script>
@endsection





{{--@extends('customer.partials-fn.buyer.header')
@section('content')

<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2> Dashboard</h2>
               <p>Information about your current plan and usages</p>
            </div>

            <div class="row">
                
                <div class="card subscription_box">
                    
            @if($user->status == 0)
            </div>
                <div class="alert {{ $user->status == 1 ? 'alert-success' : 'alert-warning' }} alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Account is Pending!</h4>
                    <p>
                        Your account is Pending for approval. Please complete your company profile and other details to help expedite the approval process.
                    </p>
                    
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                   </div>
                        
                @endif
                
                @if($user->status == 2 || $user->status == 3)
                <div class="card-body pt-4 pb-4">
                  <div class="alert {{ $user->status == 1 ? 'alert-success' : 'alert-warning' }} alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Account {{$user->status == 2 ? 'Disapprove' : 'On Hold'}}</h4>
                        <p>Your account is {{$user->status == 2 ? 'Disapprove' : 'on Hold'}}.</p>
                        @if(!empty($user->status_reason))
                            <p class="mt-0 mb-0"><strong>Reason : </strong>{{$user->status_reason}}</p>
                        @endif
                        @if(!empty($user->status_reason))
                            <p class="mt-0 mb-0"><strong>Comment : </strong>{{$user->status_comment}}</p>
                        @endif
                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  </div>
                @endif
                        
                        
                      @if($user->account_type != 'Buyer')  
                        <div class="card-body pt-4 pb-4">
                        
                        
                        <div class="row  align-items-center">
                            <div class="col-6 align-items-center">
                                <h5>Platform Monthly Subscription</h5>
                                <p class="mb-0 text-success">Mambership Status :  {{$user->isMembershipActive ? 'Active' : 'Inactive'}}</p>
                                <p  class="mb-0 text-danger">Mambership Expiry On:  {{ !empty($user->membership_expiry_date) ? date('d M Y',strtotime($user->membership_expiry_date)) : 'NA'}} </p>

                                
                            </div>
                            <div class="col-6 align-items-center">
                                <form action="{{ route('jcc.order') }}" method="POST">
                                    <!--<p>Expiry Date: 17 Jun 2024</p>-->
                                    <!--<a href="" class="ps-btn">Purchase Now</a> -->
                                    
                                    @csrf
                                        <input type="hidden" name="amount" value="{{getPlatformFee('Platform Fee')}}" required>
                                    
                                        <!--<label>Currency (978 = EUR)</label>-->
                                        <input type="hidden" name="currency" value="978">
                                    
                                        <button   @if($user->isMembershipActive) type="button" onclick="alert('You already have an active subscription.')" @else type="submit" @endif class="ps-btn">Buy Now</button>
                                </form>
                                
                            </div>
                        </div> 
                         </div>
                        @endif
                        
                   
                    
                </div>
                
                
                
                
               
               <div class="col-lg-6  mt-2">
                  <div class="accordion" id="accordionExample">
                     <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                        <div class="card-header text-center p-4" data-toggle="collapse"
                           data-target="#companyProfileSection" aria-expanded="true">
                           <span class="title text-dark">Product Enquiries</span>
                           <!--<span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>-->
                        </div>
                        <div id="companyProfileSection" class="collapse show py-4" data-parent="#accordionExample">
                           <div class="card-body">

                              <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
                                    <div class="form-group ">
                                       <a class="ps-btn px-4  py-5 fs-35" href="{{route('buyer.rfq-enquiries')}}"><strong> {{$data['totalProductEnquiries'] ?? 0 }}</strong></a>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
               
               <div class="col-lg-6  mt-2">
                  <div class="accordion" id="accordionExample">
                     <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                        <div class="card-header text-center p-4" data-toggle="collapse"
                           data-target="#companyProfileSection" aria-expanded="true">
                           <span class="title text-dark">RFQ Enquiries</span>
                           <!--<span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>-->
                        </div>
                        <div id="companyProfileSection" class="collapse show py-4" data-parent="#accordionExample">
                           <div class="card-body">

                              <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
                                    <div class="form-group ">
                                       <a class="ps-btn px-4  py-5 fs-35" href="{{route('buyer.product-enquiry')}}"><strong> {{$data['totalRFQEnquiries'] ?? 0 }}</strong></a>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>


            @if(Auth::guard('buyer')->user()->account_type == 'Contractor')
               <div class="col-lg-6  mt-2">
                  <div class="accordion" id="accordionExample">
                     <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                        <div class="card-header text-center p-4" data-toggle="collapse"
                           data-target="#companyProfileSection" aria-expanded="true">
                           <span class="title text-dark"> Accepted Projects </span>
                           <!--<span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>-->
                        </div>
                        <div id="companyProfileSection" class="collapse show py-4" data-parent="#accordionExample">
                           <div class="card-body">

                              <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
                                    <div class="form-group ">
                                       <a class="ps-btn px-4  py-5 fs-35" href="{{route('buyer.all-projects')}}"><strong>{{$data['totalAccetped'] ?? 0 }}</strong></a>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6  mt-2">
                  <div class="accordion" id="accordionExample">
                     <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                        <div class="card-header text-center p-4" data-toggle="collapse"
                           data-target="#companyProfileSection" aria-expanded="true">
                           <span class="title text-dark">Assigned Projects</span>
                           <!--<span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>-->
                        </div>
                        <div id="companyProfileSection" class="collapse show py-4" data-parent="#accordionExample">
                           <div class="card-body">

                              <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
                                    <div class="form-group ">
                                       <a class="ps-btn px-4  py-5 fs-35" href="{{route('buyer.all-projects')}}"><strong> {{$data['totalProjects'] ?? 0 }}</strong></a>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6  mt-2">
                  <div class="accordion" id="accordionExample">
                     <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                        <div class="card-header text-center p-4" data-toggle="collapse"
                           data-target="#companyProfileSection" aria-expanded="true">
                           <span class="title text-dark"> Not Sure Projects</span>
                           <!--<span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>-->
                        </div>
                        <div id="companyProfileSection" class="collapse show py-4" data-parent="#accordionExample">
                           <div class="card-body">

                              <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
                                    <div class="form-group">
                                       <a class="ps-btn px-4  py-5 fs-35" href="{{route('buyer.all-projects')}}"><strong>{{$data['totalNotSure'] ?? 0 }}</strong></a>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 mt-2">
                  <div class="accordion" id="accordionExample">
                     <div class="card" style="border: 1px solid #c9d5f4;border-radius: 1rem!important;">
                        <div class="card-header text-center p-4" data-toggle="collapse"
                           data-target="#companyProfileSection" aria-expanded="true">
                           <span class="title text-dark">Declined Projects</span>
                           <!--<span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>-->
                        </div>
                        <div id="companyProfileSection" class="collapse show py-4" data-parent="#accordionExample">
                           <div class="card-body">

                              <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
                                    <div class="form-group ">
                                       <a class="ps-btn px-4  py-5 fs-35" href="{{route('buyer.all-projects')}}"><strong>{{$data['totalDeclined'] ?? 0 }}</strong></a>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endif
               
               
            </div>

            <div class="row mt-5">
               

            </div>

         </div>
      </div>
   </div>
</div>
<!-- Main Container -->
@endsection--}}