@extends('marketplace.partials.header')
@section('content')

@if ($message = Session::get('sweet-alert'))
  <input type="hidden" class="sweet-msg" value="{{ $message }}" />
@endif
@if ($message = Session::get('sweet-alert-error'))
  <input type="hidden" class="sweet-msg-error" value="{{ $message }}" />
@endif
@if ($message = Session::get('success'))
  <input type="hidden" class="sweet-msg" value="{{ $message }}" />
@endif
@if ($errors->any())
  <input type="hidden" class="sweet-msg-error" value="{{ implode(",\n", $errors->all()) }}" />
@endif


<div class="ps-breadcrumb">
   <div class="ps-container"></div>
</div>
<div class="ps-page--product">
   <div class="container">
      <div class="ps-product--detail ps-product--full-content">
         <div class="ps-product__top">
            <div class="ps-product__header">
               <div class="ps-product__thumbnail" data-vertical="true">
                  <figure>
                     <div class="ps-wrapper">
                        <div class="ps-product__gallery" data-arrow="true">
                            
                            @isset($product->images)
                                @foreach($product->images as $image)
                                <div class="item"><a href="{{asset('uploads/products/'.'/'.$image->image)}}"><img src="{{asset('uploads/products/'.'/'.$image->image)}}" width="500" height="350" alt=""></a></div>
                                @endforeach
                            @endisset
                           <!--<div class="item"><a href="img/products/detail/fullwidth/1.jpg"><img src="img/products/detail/fullwidth/1.jpg" alt=""></a></div>-->
                           <!--<div class="item"><a href="img/products/detail/fullwidth/2.jpg"><img src="img/products/detail/fullwidth/2.jpg" alt=""></a></div>-->
                           <!--<div class="item"><a href="img/products/detail/fullwidth/3.jpg"><img src="img/products/detail/fullwidth/3.jpg" alt=""></a></div>-->
                        </div>
                     </div>
                  </figure>
                  <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                        @isset($product->images)
                            @foreach($product->images as $image)
                            <div class="item"><img src="{{asset('uploads/products/'.'/'.$image->image)}}"  alt=""></div>
                            @endforeach
                        @endisset
                     <!--<div class="item"><img src="img/products/detail/fullwidth/1.jpg" alt=""></div>-->
                     <!--<div class="item"><img src="img/products/detail/fullwidth/2.jpg" alt=""></div>-->
                     <!--<div class="item"><img src="img/products/detail/fullwidth/3.jpg" alt=""></div>-->
                     <!--<div class="item"><img src="img/products/detail/fullwidth/4.jpg" alt=""></div>-->
                  </div>
               </div>
               <div class="ps-product__info">
                  <h1>{{$product->name ?? ""}}</h1>
                  <div class="ps-product__meta">
                     <p>Brand:<a href="">{{$product->brand?->brand_name ?? ""}}</a> </p>

                     <!--<div class="ps-product__rating">-->
                     <!--   <select class="ps-rating" data-read-only="true">-->
                     <!--      <option value="1">1</option>-->
                     <!--      <option value="1">2</option>-->
                     <!--      <option value="1">3</option>-->
                     <!--      <option value="1">4</option>-->
                     <!--      <option value="2">5</option>-->
                     <!--   </select>-->
                     <!--   <span>(1 review)</span>-->
                     <!--</div>--> 
                  </div>
                  <div class="ps-product__desc">
                     <span class="ps-product__price sale  mb-0" style=""> <del>USD {{ number_format($product->rrp > 0 ? $product->rrp : '' ,2)  }}</del><br> USD  {{ number_format($product->price_unit,2) }}</span>
                     <p>Sold By:<a href=""><strong> {{$product->seller->biz_company ?? ""}}</strong></a></p>
                     {{$product->short_desc ?? ""}}
                  </div>
                  <div class="ps-product__specification">
                     <!--<a class="report" href="#">Report Abuse</a>-->
                     <p><strong>SKU:</strong>{{$product->sku ?? ""}}</p>
                   <p class="categories">
                        <strong>Categories: </strong>
                        @if($product->mappedCategories()->count())
                            @foreach($product->mappedCategories as $category)
                                <a href="#">{{ $category->category_name }}</a>@if(!$loop->last), @endif
                            @endforeach
                        @else
                            <span>No categories available</span>
                        @endif
                    </p>

                     <p class="tags">
                         <strong> Tags: </strong>
                         {{$product->search_keywords}}
                         <!--<a href="#">sofa</a>,<a href="#">technologies</a>,<a href="#">wireless</a>-->
                         </p>
                  </div>
                  
                      
                    @if(!empty($product->seller->biz_website) || !empty($product->seller->facebook_url) || !empty($product->seller->instagram_url) || !empty($product->seller->linkedin_url))
                        <div class="ps-product__sharing">
                            <figcaption>Foloow us on social</figcaption>
                                @if(!empty($product->seller->biz_website))
                                <a class="facebook" href="{{$product->seller->biz_website ?? ''}}"><i class="fa fa-globe"></i></a>
                                @endif
                                @if(!empty($product->seller->facebook_url))
                                <a class="facebook" href="{{$product->seller->facebook_url ?? ''}}"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if(!empty($product->seller->instagram_url))
                                <a class="twitter" href="{{$product->seller->instagram_url ?? ''}}"><i class="fa fa-instagram"></i></a>
                                @endif
                                @if(!empty($product->seller->linkedin_url))
                                <a class="linkedin" href="{{$product->seller->linkedin_url ?? '' }}"><i class="fa fa-linkedin"></i></a>
                                @endif
                        </div>
                    @endif
               
               </div>
            </div>
            <div class="ps-product__price-right">
               <div class="ps-product__shopping widget_features pb-5 my-5">
                  <!--<figure>-->
                  <!--   <figcaption>Available Quantity</figcaption>-->
                     <!--<i>Maximum 100 Piece(s)</i>-->
                  <!--   <div class="form-group--number">-->
                  <!--      <button class="up">+</button>-->
                  <!--      <button class="down">-</button>-->
                  <!--      <input class="form-control" type="text" placeholder="1">-->
                  <!--   </div>-->
                  <!--</figure>-->
                  @auth('buyer')
                  <!--<a class="ps-btn " href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal111223"> Request For Quotation</a> -->
                  
                    <!-- Button trigger modal -->
                    <button type="button" class="ps-btn" data-bs-toggle="modal" data-bs-target="#exampleModal111223">Request For Quotation</button>
                  @endauth
                  @guest('buyer')
                  <a class="ps-btn " href="{{route('buyer.login')}}"> Request For Quotation</a> 
                  @endguest
                  <!--<a class="ps-btn-outline " href="#"> Request Sample</a> -->
               </div>
               <div class="ps-product__shopping widget_features pb-5 seller--features">
                  <figure>
                     <div class="d-flex">
                        <div class="seller--leftFeatures"><img src="{{seller_asset('uploads/supplier/'.@$product->seller->biz_company_logo)}}" style="width:70px"></div>
                        <div class="seller--righttFeatures pl-3">
                           <figcaption>{{$product->seller->biz_company ?? "" }}</figcaption>
                           <!--<p class="p-0 m-0 text-12">All Regions, United Arab Emirates,</p>-->
                           <!--<p class="mb-0 pl-5"><i class="fa fa-star" style="font-size:16px;color:#EDB867"></i>0</p>-->
                        </div>
                     </div>
                     <div class="d-flex" style="justify-content: space-between;">
                        <div>
                           <p class="p-0 mb-0 text-12">Response Time</p> 
                           <p class="p-0 mb-0 text-12"><b> {{$product->lead_time}}</b></p>
                        </div>
                        <div>
                           <p class="p-0 mb-0 text-12">On-time Delivery Rate</p>
                           <p class="p-0 mb-0 text-12"><b>100%</b></p>
                        </div>
                     </div>
                     <p class="text-12 p-0 mb-0 mt-4 text-center"><small>Ask for more details from the seller</small></p>
                  </figure>
                  @isset($product->seller->id)
                  <a class="ps-btn-outline " href="{{route('customer.supplier-detail',[@$product->seller->id])}}">Contact Seller</a> 
                  @endisset
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="ps-page__container">
         <div class="ps-page__left">
            <div class="ps-product--detail">
               <div class="ps-product__content ps-tab-root pt-5">
                  <ul class="ps-tab-list">
                     <li class="active"><a href="#tab-1">Description</a></li>
                     <li><a href="#tab-3">About Vendor</a></li>
                     <!--<li><a href="#tab-4">Rating amd Reviews</a></li>-->
                  </ul>
                  <div class="ps-tabs">
                     <div class="ps-tab active" id="tab-1">
                        <div class="ps-document">
                            {{$product->description ?? ""}}
                         </div>
                     </div>
                     <div class="ps-tab" id="tab-3">
                        <div class="ps-product__shopping widget_features pb-5 seller--features">
                           <figure style="width:100%">
                             <div>{{$product->seller->biz_supplier_about ?? ""}}</div>
                                <p>
                                  @isset($product->seller->id)
                                  <a class="ps-btn-outline mt-5" href="{{ route('customer.supplier-detail',[@$product->seller->id]) }}" style="width: 20%;height: 42px;">Contact Seller</a>
                                  @endisset
                                </p>
                           </figure>
                        </div>
                     </div>
                     <!--<div class="ps-tab" id="tab-4">-->
                     <!--   <div class="row">-->
                     <!--      <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">-->
                     <!--         <div class="ps-block--average-rating">-->
                     <!--            <div class="ps-block__header">-->
                     <!--               <h3>4.00</h3>-->
                     <!--               <select class="ps-rating" data-read-only="true">-->
                     <!--                  <option value="1">1</option>-->
                     <!--                  <option value="1">2</option>-->
                     <!--                  <option value="1">3</option>-->
                     <!--                  <option value="1">4</option>-->
                     <!--                  <option value="2">5</option>-->
                     <!--               </select>-->
                     <!--               <span>1 Review</span>-->
                     <!--            </div>-->
                     <!--            <div class="ps-block__star">-->
                     <!--               <span>5 Star</span>-->
                     <!--               <div class="ps-progress" data-value="100"><span></span></div>-->
                     <!--               <span>100%</span>-->
                     <!--            </div>-->
                     <!--            <div class="ps-block__star">-->
                     <!--               <span>4 Star</span>-->
                     <!--               <div class="ps-progress" data-value="0"><span></span></div>-->
                     <!--               <span>0</span>-->
                     <!--            </div>-->
                     <!--            <div class="ps-block__star">-->
                     <!--               <span>3 Star</span>-->
                     <!--               <div class="ps-progress" data-value="0"><span></span></div>-->
                     <!--               <span>0</span>-->
                     <!--            </div>-->
                     <!--            <div class="ps-block__star">-->
                     <!--               <span>2 Star</span>-->
                     <!--               <div class="ps-progress" data-value="0"><span></span></div>-->
                     <!--               <span>0</span>-->
                     <!--            </div>-->
                     <!--            <div class="ps-block__star">-->
                     <!--               <span>1 Star</span>-->
                     <!--               <div class="ps-progress" data-value="0"><span></span></div>-->
                     <!--               <span>0</span>-->
                     <!--            </div>-->
                     <!--         </div>-->
                     <!--      </div>-->
                     <!--      <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">-->
                     <!--         <form class="ps-form--review" action="index.html" method="get">-->
                     <!--            <h4>Submit Your Review</h4>-->
                     <!--            <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>-->
                     <!--            <div class="form-group form-group__rating">-->
                     <!--               <label>Your rating of this product</label>-->
                     <!--               <select class="ps-rating" data-read-only="false">-->
                     <!--                  <option value="0">0</option>-->
                     <!--                  <option value="1">1</option>-->
                     <!--                  <option value="2">2</option>-->
                     <!--                  <option value="3">3</option>-->
                     <!--                  <option value="4">4</option>-->
                     <!--                  <option value="5">5</option>-->
                     <!--               </select>-->
                     <!--            </div>-->
                     <!--            <div class="form-group">-->
                     <!--               <textarea class="form-control" rows="6" placeholder="Write your review here"></textarea>-->
                     <!--            </div>-->
                     <!--            <div class="row">-->
                     <!--               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">-->
                     <!--                  <div class="form-group">-->
                     <!--                     <input class="form-control" type="text" placeholder="Your Name">-->
                     <!--                  </div>-->
                     <!--               </div>-->
                     <!--               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">-->
                     <!--                  <div class="form-group">-->
                     <!--                     <input class="form-control" type="email" placeholder="Your Email">-->
                     <!--                  </div>-->
                     <!--               </div>-->
                     <!--            </div>-->
                     <!--            <div class="form-group submit">-->
                     <!--               <button class="ps-btn">Submit Review</button>-->
                     <!--            </div>-->
                     <!--         </form>-->
                     <!--      </div>-->
                     <!--   </div>-->
                     <!--</div>-->
                  </div>
               </div>
            </div>
         </div>
         <div class="ps-page__right">   </div>
      </div>
      <div class="ps-section--default">
         <div class="ps-section__header">
            <h3>Related products</h3>
         </div>
         <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
               
               
               @foreach ($relatedProducts as $key => $product_item)
                <!--<div class="ps-product">-->
                    <x-marketplace.product-card :product="$product_item" showWishlist="false" :isProductListPage="true" />
                <!--</div>-->
                @endforeach
               
               <!--<div class="ps-product">-->
               <!--   <div class="ps-product__thumbnail">-->
               <!--      <a href="product-default.html"><img src="img/products/shop/11.jpg" alt="" /></a>-->
               <!--      <ul class="ps-product__actions">-->
               <!--         <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>-->
               <!--         <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>-->
               <!--         <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>-->
               <!--         <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>-->
               <!--      </ul>-->
               <!--   </div>-->
               <!--   <div class="ps-product__container">-->
               <!--      <a class="ps-product__vendor" href="#">Robert's Store</a>-->
               <!--      <div class="ps-product__content">-->
               <!--         <a class="ps-product__title" href="product-default.html">Men’s Sports Runnning Swim Board Shorts</a>-->
               <!--         <div class="ps-product__rating">-->
               <!--            <select class="ps-rating" data-read-only="true">-->
               <!--               <option value="1">1</option>-->
               <!--               <option value="1">2</option>-->
               <!--               <option value="1">3</option>-->
               <!--               <option value="1">4</option>-->
               <!--               <option value="2">5</option>-->
               <!--            </select>-->
               <!--            <span>01</span>-->
               <!--         </div>-->
               <!--         <p class="ps-product__price">$13.43</p>-->
               <!--      </div>-->
               <!--      <div class="ps-product__content hover">-->
               <!--         <a class="ps-product__title" href="product-default.html">Men’s Sports Runnning Swim Board Shorts</a>-->
               <!--         <p class="ps-product__price">$13.43</p>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</div>-->
               
            </div>
         </div>
      </div>
   </div>
</div>




<!--Product Enquiry Modal -->
<div class="modal fade" id="exampleModal111223" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog model-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Quotation Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="{{route('customer.product-enquiry.store')}}" method="post">
           @csrf
           <input type="hidden" value="{{$product->id}}" name="product_id">
          <div class="modal-body">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" name="first_name" id="first_name" value="{{ auth()->guard('buyer')->user()->first_name ?? '' }}" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" name="last_name" id="last_name" value="{{ auth()->guard('buyer')->user()->last_name ?? '' }}" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ auth()->guard('buyer')->user()->email ?? '' }}" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="phone">Phone</label>
                  <input type="number" class="form-control" name="phone" id="phone"  value="{{ auth()->guard('buyer')->user()->phone ?? '' }}" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" name="quantity" id="quantity" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="message">Message</label>
                  <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                </div>
              </div>
            </div>

          <div class="modal-footer">
            <button type="button" class="ps-btn p-2" data-dismiss="modal">Close</button>
            <button class="ps-btn p-2">Submit</button>
          </div>
       </form>
    </div>
  </div>
</div>
@endsection