 <div class="col-lg-7 col-md-6 col-sm-12 col-12 wishlist-div">
     <div class="product-details-img thumb-left clearfix d-flex-wrap mb-3 mb-md-0">
         <div class="product-thumb">
             <div id="gallery" class="product-dec-slider-2 product-tab-left">
                 @if (!$product->images->isEmpty())
                     @foreach ($product->images as $image)
                         <a data-image="{{ isset($image->image) ? asset('uploads/products/') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                             data-zoom-image="{{ isset($image->image) ? asset('uploads/products/') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                             class="slick-slide slick-cloned active sidebar-thumbnails">
                             <img class="blur-up lazyload"
                                 data-src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                                 src="{{ isset($image->image) ? asset('uploads/products/') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                                 alt="{{ $product->name }}" />
                         </a>
                     @endforeach
                 @endif
             </div>
         </div>
         <div class="zoompro-wrap product-zoom-right">
             <div class="zoompro-span my-zoom-image">
                 @if (!$product->images->isEmpty() && isset($product->images[0]->image))
                     <img id="zoompro" class="zoompro"
                         src="{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
                         data-zoom-image="{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
                         alt="{{ $product->name }}" />
                 @endif
             </div>
             <div class="product-labels">
                 {{-- <span class="lbl pr-label1">new</span> --}}
                 {{-- <span class="lbl on-sale">Bestseller</span> --}}
             </div>
             <div class="product-buttons">
                 {{-- <a @isset($product->youtube_url) href="{{ $product->youtube_url }}" @endisset <a
           @empty($product->youtube_url) href="https://www.youtube.com/watch?v=93A2jOW5Mog" @endempty
           class="mfpbox mfp-with-anim btn rounded popup-video"><i class="icon an an-video"></i><span
             class="tooltip-label">Watch Video</span></a> --}}
                 <a href="javascript:;" class="btn rounded prlightbox"><i class="icon an an-expand-l-arrows"></i><span
                         class="tooltip-label">Zoom Image</span></a>
             </div>
         </div>
         <div class="lightboximages">
             @if (!$product->images->isEmpty())
                 @foreach ($product->images as $image)
                     <a href="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                         data-size="850x1280"></a>
                 @endforeach
             @endif
         </div>
     </div>
 </div>



 <div class="col-lg-6 col-md-6 col-sm-12 col-12">
     <div class="product-details-img thumb-left clearfix d-flex-wrap mb-3 mb-md-0">
         <div class="zoompro-wrap product-zoom-right">
             {{-- 
<div class="zoompro-span">
                 <img id="zoompro" class="zoompro" src="assets/images/products/product-6-1.jpg"
                     data-zoom-image="assets/images/products/product-6-1.jpg" alt="product" />
             </div> --}}

             @if (!$product->images->isEmpty() && isset($product->images[0]->image))
                 <img id="zoompro" class="zoompro"
                     src="{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
                     data-zoom-image="{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
                     alt="{{ $product->name }}" />
             @endif


             <div class="product-labels">
                 <span class="lbl pr-label1">new</span><span class="lbl on-sale">Best seller</span>
             </div>
             <div class="product-wish">
                 <a class="wishIcon wishlist rounded m-0" href="my-wishlist.html"><i class="icon an an-heart"></i><span
                         class="tooltip-label left">Available in Wishlist</span></a>
             </div>
             <div class="product-buttons">
                 <a href="https://www.youtube.com/watch?v=93A2jOW5Mog"
                     class="mfpbox mfp-with-anim btn rounded popup-video"><i class="icon an an-video"></i><span
                         class="tooltip-label">Watch Video</span></a>
                 <a href="#" class="btn rounded prlightbox"><i class="icon an an-expand-l-arrows"></i><span
                         class="tooltip-label">Zoom Image</span></a>
             </div>
         </div>

         <div class="lightboximages">

             @if (!$product->images->isEmpty())
                 @foreach ($product->images as $image)
                     <a href="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                         data-size="1000x1280"></a>
                 @endforeach
             @endif
             {{-- <a href="assets/images/products/product-6-1.jpg" data-size="1000x1280"></a>
             <a href="assets/images/products/product-6-2.jpg" data-size="1000x1280"></a>
             <a href="assets/images/products/product-6-3.jpg" data-size="1000x1280"></a>
             <a href="assets/images/products/product-6-4.jpg" data-size="1000x1280"></a>
             <a href="assets/images/products/product-6-5.jpg" data-size="1000x1280"></a>
             <a href="assets/images/products/product-6-6.jpg" data-size="1000x1280"></a> --}}
         </div>
         <div class="product-thumb">
             <div id="gallery" class="product-dec-slider-2 product-tab-left">

                 @if (!$product->images->isEmpty())
                     @foreach ($product->images as $image)
                         <a href="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                             data-size="1000x1280"></a>

                         <a data-image="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                             data-zoom-image="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                             class="slick-slide active">
                             <img class="blur-up lazyload"
                                 data-src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                                 src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                                 alt="product" />
                         </a>
                     @endforeach
                 @endif
                 {{-- <a data-image="assets/images/products/product-6-1.jpg"
                     data-zoom-image="assets/images/products/product-6-1.jpg" class="slick-slide active">
                     <img class="blur-up lazyload" data-src="assets/images/products/product-6-1.jpg"
                         src="assets/images/products/product-6-1.jpg" alt="product" />
                 </a>
                 <a data-image="assets/images/products/product-6-2.jpg"
                     data-zoom-image="assets/images/products/product-6-2.jpg" class="slick-slide">
                     <img class="blur-up lazyload" data-src="assets/images/products/product-6-2.jpg"
                         src="assets/images/products/product-6-2.jpg" alt="product" />
                 </a>
                 <a data-image="assets/images/products/product-6-3.jpg"
                     data-zoom-image="assets/images/products/product-6-3.jpg" class="slick-slide">
                     <img class="blur-up lazyload" data-src="assets/images/products/product-6-3.jpg"
                         src="assets/images/products/product-6-3.jpg" alt="product" />
                 </a>
                 <a data-image="assets/images/products/product-6-4.jpg"
                     data-zoom-image="assets/images/products/product-6-4.jpg" class="slick-slide">
                     <img class="blur-up lazyload" data-src="assets/images/products/product-6-4.jpg"
                         src="assets/images/products/product-6-4.jpg" alt="product" />
                 </a>
                 <a data-image="assets/images/products/product-6-5.jpg"
                     data-zoom-image="assets/images/products/product-6-5.jpg" class="slick-slide">
                     <img class="blur-up lazyload" data-src="assets/images/products/product-6-5.jpg"
                         src="assets/images/products/product-6-5.jpg" alt="product" />
                 </a>
                 <a data-image="assets/images/products/product-6-6.jpg"
                     data-zoom-image="assets/images/products/product-6-6.jpg" class="slick-slide">
                     <img class="blur-up lazyload" data-src="assets/images/products/product-6-6.jpg"
                         src="assets/images/products/product-6-6.jpg" alt="product" />
                 </a> --}}
             </div>
         </div>
     </div>
 </div>
