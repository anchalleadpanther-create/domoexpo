@extends('customer.partials-fn.seller.header') 
@section('content')
<!-- Main Container -->
 <div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2> Get ready to sell</h2>
               <p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.</p>
               <div class="alert {{ $user->supplier_status == 1 ? 'alert-success' : 'alert-warning' }} alert-dismissible fade show" role="alert">
                  @if($user->supplier_status == 0)
                    <h4 class="alert-heading">Account is Pending!</h4>
                    <p>
                        Your account is Pending for approval. Please complete your company profile and other details to help expedite the approval process.
                    </p>
                  @elseif($user->supplier_status == 1)
                    <h4 class="alert-heading">Congrats! Your account has been approved!</h4>
                    
                  @elseif($user->supplier_status == 2 || $user->supplier_status == 3)
                    <h4 class="alert-heading">Account {{$user->supplier_status == 2 ? 'Disapprove' : 'On Hold'}}</h4>
                    <p>Your account is {{$user->supplier_status == 2 ? 'Disapprove' : 'on Hold'}}.</p>
                    @if(!empty($user->supplier_status_reason))
                    <p class="mt-0"><strong>Reason : </strong>{{$user->supplier_status_reason}}</p>
                    @endif
                    @if(!empty($user->supplier_status_reason))
                    <p><strong>Comment : </strong>{{$user->supplier_status_comment}}</p>
                    @endif
                  @endif
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            
            
            <div class="accordion" id="accordionExample">
                
                <!--Setup your company profile-->
                   <div class="card">
                      <div class="card-header" data-toggle="collapse" data-target="#companyProfileSection" aria-expanded="true">     
                         <span class="title">Setup your company profile </span>
                         <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                      </div>
                      <div id="companyProfileSection" class="collapse show" data-parent="#accordionExample">
                         <div class="card-body">
                            <p>Use this personalized guide to get your store up and running</p>
                            <div class="row">
                               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                  <div class="form-group">
                                     <input class="form-control" type="text" placeholder="{{$profileComplate}} / 4 completed">
                                  </div>
                               </div>
                               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                  <div class="form-group">
                                     <a class="ps-btn blue-bg" href="{{route('seller.company-profile','company-information')}}">Update Storefront</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   
               
                   
                <!--Setup your Online store-->
                   <div class="card">
                      <div class="card-header" data-toggle="collapse" data-target="#onlineStoreSection" aria-expanded="false">     
                         <span class="title">Create Online Store </span>
                         <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                      </div>
                      <div id="onlineStoreSection" class="collapse " data-parent="#accordionExample">
                         <div class="card-body">
                            <p>Use this personalized guide to get your store up and running</p>
                            <div class="row">
                               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                  <div class="form-group">
                                     <input class="form-control" type="text" placeholder="{{$onlineStoreCompleted}} / 7 completed">
                                  </div>
                               </div>
                               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                  <div class="form-group">
                                     <a class="ps-btn blue-bg" href="{{route('seller.online-store-profile','business-type')}}">Update Your Store</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>  
                
                <!--Setup your point of sale-->
                   <div class="card">
                      <div class="card-header" data-toggle="collapse" data-target="#onlinePointOfSale" aria-expanded="false">     
                         <span class="title">Point of Sale </span>
                         <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                      </div>
                      <div id="onlinePointOfSale" class="collapse " data-parent="#accordionExample">
                         <div class="card-body">
                            <div class="row">
                               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                  <div class="form-group">
                                     <input class="form-control" type="text" placeholder="{{$pointOfSeleCompleted}} / 2 completed">
                                  </div>
                               </div>
                               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                  <div class="form-group">
                                     <a class="ps-btn blue-bg" href="{{route('seller.point-of-sale','geographical-scope')}}">Update POS</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div> 
                   
                <!--Setup your Product and service-->
                   <div class="card">
                      <div class="card-header" data-toggle="collapse" data-target="#productsNServiceSection" aria-expanded="false" aria-controls="collapseTwo">     
                         <span class="title">Add products/services</span>
                         <span class="accicon"><i class="fa fa-angle-down rotate-icon"></i></span>
                      </div>
                      <div id="productsNServiceSection" class="collapse" data-parent="#accordionExample">
                         <div class="card-body addServices pt-4">
                            <div class="col-sm-12">
                               <h4 class="mb-1">Add your product</h4>
                               <p>Write a description, add photos, and set pricing for the products you plan to sell.</p>
                               <div class="row">
                                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                     <div class="form-group submit">
                                        <a href="{{route('seller.create-seller-product')}}" class="ps-btn blue-bg">Add product</a>
                                     </div>
                                  </div>
                                  <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                     <div class="form-group ">
                                        <button class="ps-btn ps-btn-none">Bulk Import Product</button>
                                     </div>
                                  </div> -->
                               </div>
                            </div>
                            <div class="col-sm-12" style=" border-top: 1px solid #B9C4DC;padding-top: 20px;">
                               <h4 class="mb-1">Add your services</h4>
                               <p>Write a description, add photos, and set pricing for the service you plan to sell.</p>
                               <div class="row">
                                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                     <div class="form-group submit">
                                        <a href="{{route('seller.create-seller-service')}}" hre class="ps-btn blue-bg">Add service</a> 
                                     </div>
                                  </div>
                                  <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                     <div class="form-group ">
                                        <button class="ps-btn ps-btn-none">Bulk Import Product</button>
                                     </div>
                                  </div> -->
                               </div>
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
@endsection