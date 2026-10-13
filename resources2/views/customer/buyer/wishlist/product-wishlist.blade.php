
@extends('customer.partials-fn.buyer.header')
@section('content')
<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2>Wishlists</h2>
              
            </div>
           
            
            <!-- -------------------------------------------------------------------------------------------------------------
             -----------------------------------------------------------------------------------------------------------------
             -------------------------------------------------------------------------------------------------------------- -->

            <div class="ps-my-account">
                  <div class="ps-form--account ps-tab-root ps-form--account-width " style="border-radius:10px !important; max-width:1000px " >
                     <div id="main">
                        
                        <div id="div7"  class="first current" >
                           <div class="ps-tabs">
                              <div class="ps-tab active "  >
                                 <div class="ps-form__content ">
                                    
                                    <div class="ps-shopping-product ps-product-grid">
                                        <div class="row">
                                            @forelse ($products as $key => $product)
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-5">
                                                <x-purchasync.listing.pro-card :product="$product" showWishlist="false" :isProductListPage="true" />
                                            </div>
                                            @empty
                                            
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5 text-center">
                                                    <strong>Wishlist Not available.</strong>
                                                </div>
                                            @endforelse
                                    
                                    
                                        </div>
                                    </div>
                                    <div class="ps-pagination pt-4 product-pagination-div">
                                       {!! $products->links('pagination::bootstrap-4') !!}
                                    </div>
                                    
                                  </div>
                              </div>
                           </div>
                        </div>

                       
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





@endsection