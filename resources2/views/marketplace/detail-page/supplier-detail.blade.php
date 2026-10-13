@extends('marketplace.partials.header')
@section('content')<div class="ps-page--single">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>Vendor Store</li>
                </ul>
            </div>
        </div>
        <div class="ps-vendor-store">
            <div class="container">
                <div class="ps-section__container">
                    <div class="ps-section__left">
                        <div class="ps-block--vendor">
                            <div class="ps-block__thumbnail">
                                
                                
                                 @if($supplier->biz_company_logo)
                                <img src="{{ seller_asset('uploads/supplier/'.$supplier->biz_company_logo)}}" alt=""  />
                                @endif
                                @if ($supplier->biz_company_logo == null)
                                <img src="https://placehold.co/200x200?text=Image+Not+Available" alt="" />
                                @endif
                                </div>
                                
                            <div class="ps-block__container">
                                <div class="ps-block__header">
                                    <h4>{{$supplier->biz_company}}</h4>
                                    <!--<select class="ps-rating" data-read-only="true">-->
                                    <!--    <option value="1">1</option>-->
                                    <!--    <option value="1">2</option>-->
                                    <!--    <option value="1">3</option>-->
                                    <!--    <option value="1">4</option>-->
                                    <!--    <option value="2">5</option>-->
                                    <!--</select>-->
                                    <!--<p><strong>85% Positive</strong> (562 rating)</p>-->
                                </div>
                                <span class="ps-block__divider"></span>
                                <div class="ps-block__content">
                                    <p>{{ \Illuminate\Support\Str::words($supplier->biz_supplier_about, 200, '...') }}</p>
                                    @if(!empty($supplier->biz_website) || !empty($supplier->facebook_url) || !empty($supplier->instagram_url) || !empty($supplier->linkedin_url))
                                    <figure>
                                        <figcaption>Follow us on social</figcaption>
                                        <ul class="ps-list--social-color">
                                            @if(!empty($supplier->biz_website))
                                            <li><a class="facebook" href="{{$supplier->biz_website ?? ''}}"><i class="fa fa-globe"></i></a></li>
                                            @endif
                                            @if(!empty($supplier->facebook_url))
                                            <li><a class="facebook" href="{{$supplier->facebook_url ?? ''}}"><i class="fa fa-facebook"></i></a></li>
                                            @endif
                                            @if(!empty($supplier->instagram_url))
                                            <li><a class="twitter" href="{{$supplier->instagram_url ?? ''}}"><i class="fa fa-instagram"></i></a></li>
                                            @endif
                                            @if(!empty($supplier->linkedin_url))
                                            <li><a class="linkedin" href="{{$supplier->linkedin_url ?? '' }}"><i class="fa fa-linkedin"></i></a></li>
                                            @endif
                                        </ul>
                                    </figure>
                                    @endif
                                </div>
                                <div class="ps-block__footer">
                                    <p>Call us directly<strong>{{$supplier->biz_phonecode ?? ''}} {{$supplier->biz_phone ?? ''}}</strong></p>
                                    <!--<p>or Or if you have any question</p><a class="ps-btn ps-btn--fullwidth" href="">Contact Seller</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-section__right">
                        <div class="ps-block--vendor-filter">
                            <div class="ps-block__left">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Products</a></li>
                                    <li><a href="#tab-2">About</a></li>
                                    <li><a href="#tab-3">Gallery</a></li>
                                </ul>
                            </div>
                            <div class="ps-block__right">
                                <form class="ps-form--search" action="index.html" method="get">
                                    <input class="form-control" type="text" placeholder="Search in this shop">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="ps-shopping ps-tab-root">
                        
                            <div class="ps-tabs">
                                <!--Product lists tab -->
                                <div class="ps-tab active" id="tab-1">
                                    <div class="row">
                                        @include('marketplace.listing.card.product-listing')
                                        
                                    </div>
                                    <!--<div class="ps-pagination">-->
                                    <!--    <ul class="pagination">-->
                                    <!--        <li class="active"><a href="#">1</a></li> -->
                                    <!--        <li><a href="#">2</a></li>-->
                                    <!--        <li><a href="#">3</a></li>-->
                                    <!--        <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>-->
                                    <!--    </ul>-->
                                    <!--</div>-->
                                </div>
                                <!--About tab -->
                                <div class="ps-tab" id="tab-2">								
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            {{$supplier->biz_supplier_about}}
                                        </div>
                                    </div>
							   </div>
							    <!--Video tab -->
                                <div class="ps-tab bg-light text-center p-5" id="tab-3">	
    						      <!--<iframe width="853" height="480" src="https://www.youtube.com/embed/yQmWAZqcJLE" title="How To Use Facebook Marketplace" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
                               
                                    
                                    
                                    <div class="row">
                            
                                        <div  class="col-12">
                                            <div id="lightgallery">
                                                
                                                {{-- Gallery Images --}}
                                                @foreach($supplier->gallaryImages as $image)
                                                    <a href="{{ seller_asset('uploads/supplier/'.$image->image) }}" data-lg-size="1600-2400">
                                                        <img src="{{ seller_asset('uploads/supplier/'.$image->image) }}" alt="Gallery Image" style="width: 120px; margin: 5px;">
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-12">
                                             @if($supplier->youtube_url)
                                               
                                                <iframe width="879" height="400" src="{{ getYoutubeEmbedUrl($supplier->youtube_url) }}" 
                                                title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                            @endif
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
    

 

@endsection