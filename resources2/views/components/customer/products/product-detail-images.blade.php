{{-- <div class="col-lg-5 col-md-5 col-sm-12 col-12">
    <div class="product-details-img thumb-left clearfix d-flex-wrap mb-3 mb-md-0">
        <div class="zoompro-wrap product-zoom-right">


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
                        data-size="100x128"></a>
                @endforeach
            @endif

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


            </div>
        </div>
    </div>
</div> --}}


{{-- 
<div class="col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="product-details-img thumb-left clearfix d-flex-wrap mb-3 mb-md-0">
        <div class="zoompro-wrap product-zoom-right">
            <div class="zoompro-span">

                @if (!$product->images->isEmpty() && isset($product->images[0]->image))
                    <img id="zoompro" class="zoompro"
                        src="{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
                        data-zoom-image="{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
                        alt="{{ $product->name }}" />
                @endif
            </div>
            <div class="product-labels">
                <span class="lbl pr-label1">{{ $product->product_condition }}</span><span class="lbl on-sale">Best
                    seller</span>
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

            <a href="{{ asset('allUsers/frontend/images/products/product-6-1.jpg') }}" data-size="1000x1280"></a>
            <a href="{{ asset('allUsers/frontend/images/products/product-6-2.jpg') }}" data-size="10x12"></a>
            <a href="{{ asset('allUsers/frontend/images/products/product-6-3.jpg') }}" data-size="10x12"></a>
            <a href="{{ asset('allUsers/frontend/images/products/product-6-4.jpg') }}" data-size="10x12"></a>
            <a href="{{ asset('allUsers/frontend/images/products/product-6-5.jpg') }}" data-size="10x12"></a>
            <a href="{{ asset('allUsers/frontend/images/products/product-6-6.jpg') }}" data-size="10x12"></a>
        </div>
        <div class="product-thumb">
            <div id="gallery" class="product-dec-slider-2 product-tab-left">


                @if (!$product->images->isEmpty())
                    @foreach ($product->images as $key => $image)
                        <a data-image="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                            data-zoom-image="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                            class="slick-slide {{ $key == 0 ? 'active' : '' }}">
                            <img class="blur-up lazyload"
                                data-src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                                src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                                alt="product" />
                        </a>
                    @endforeach
                @endif


            </div>
        </div>


    </div>
</div>

 --}}




{{-- 
<div class="col-lg-6 col-md-6 col-sm-12 col-12">
  <div class="product-details-img thumb-left clearfix d-flex-wrap mb-3 mb-md-0">
    <div class="product-thumb">
      <div id="gallery" class="product-dec-slider-2 product-tab-left">


        @if (!$product->images->isEmpty())
          @foreach ($product->images as $key => $image)
            <a data-image="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
              data-zoom-image="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
              class="slick-slide {{ $key == 0 ? 'active' : '' }}">
              <img class="blur-up lazyload"
                data-src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                alt="product" />
            </a>
          @endforeach
        @endif

      </div>
    </div>
    <div class="zoompro-wrap product-zoom-right">
      <div class="zoompro-span">

        @if (!$product->images->isEmpty() && isset($product->images[0]->image))
          <img id="zoompro" class="zoompro"
            src="{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
            data-zoom-image="{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
            alt="{{ $product->name }}" />
        @endif

      </div>

    </div>

    <div class="lightboximages">
      @if (!$product->images->isEmpty())
        @foreach ($product->images as $key => $image)
          <a href="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
            data-size="1000x1280"></a>
        @endforeach
      @endif

    </div>

  </div>
</div> --}}

<div class="col-lg-6 col-md-6 col-sm-12 col-12 product-img-box">
  <div class="preview col">
    <div class="app-figure" id="zoom-fig">
      @if (!$product->images->isEmpty() && isset($product->images[0]->image))
        <a id="Zoom-1" class="MagicZoom right-img"
          href="{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}">
          <img
            src="{{ isset($product->images[0]->image) ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
            alt="100% Organic Pajama Short Set Cream & Navy Blue Dot Nightdress" />
        </a>
      @endif
      <div class="selectors">
        @if (!$product->images->isEmpty())
          @foreach ($product->images as $key => $image)
            <a data-zoom-id="Zoom-1"
              href="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
              data-image="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
              data-zoom-image="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}">
              <img style="height: 65px;" class="blur-up lazyload"
                data-src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}" />
            </a>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>
