{{-- {{dd($images[1])}} --}}
<div class="item product-item">
  <div class="product-image">
    <a target="_blank"
      href="{{ route('customer.product-detail', [@$product->mappedCategoriesNotInExtraCat->first()->category_slug, $product->slug, $product->sku, $product->uuid]) }}"
      class="product-img">

      @isset($images[0])
      <img class="@isset($images[0]) primary @endisset blur-up lazyload" data-src="{{ $path }}{{ $images[0]->image }}" data-test-url = "{{public_path() }}"
        src="{{ $path }}{{ $images[0]->image }}" alt="{{ $product->name }}" title="{{ $product->name }}">
      @endisset

      {{-- <img class="hover blur-up lazyload" data-src="{{ $path . ($images[1] ?? @$images[0])->image }}"
        src="{{ $path . ($images[1] ?? @$images[0])->image }}" alt="{{ $product->name }}" title="{{ $product->name }}">
      --}}

      @if (isset($images[1]))
        @if ($images[1] != null)
        <img class="hover blur-up lazyload"
          data-src="{{ $path }}{{ $images[1] != null ? $images[1]->image : $images[0]->image }}"
          src="{{ $path }}{{ $images[1] != null ? $images[1]->image : $images[0]->image }}" alt="{{ $product->name }}"
          title="{{ $product->name }}">
        @endif
      @else
      <img class="hover blur-up lazyload" data-src="{{ $path }}{{ @$images[0]->image }}"
        src="{{ $path }}{{ @$images[0]->image }}" alt="{{ $product->name }}" title="{{ $product->name }}">
      @endif

   @if ($images[0] === null)  
      <img class="blur-up lazyload" data-src="https://placehold.co/225x275?text=Image+Not+Available"
        src="https://placehold.co/225x275?text=Image+Not+Available" alt="{{ $product->name }}"
        title="{{ $product->name }}">
   @endif

    </a>

    <!-- <div class="product-labels"><span class="lbl pr-label1">New</span></div> -->
    @if (!empty($product->product_tag))
    <div class="product-labels">
      <span class="lbl pr-label1">{{ $product->product_tag }}</span>
    </div>
    @endif

   

    @if ($isProductListPage)
    <div class="similarproduct- btn-minicart" data-bs-toggle="modal" data-bs-target="#similarProduct_modal">
      <span class="similarproduct-sprite"></span>
      <span class="similarproduct-iconText">VIEW SIMILAR</span>
    </div>
    @endif


  </div>
  <!--Start Product Details-->
  <div class="options" style="top: 51px; left: 200px;display:none">
    <table class="options-items">
      <tr>
        <td>Available Sizes</td>
      </tr>
      <tbody>
        @php

        $getProductBySku = getProductBySku($product);
        @endphp
        @foreach ($getProductBySku as $item)
        <tr>
          <td><span>{{ @$item->productTypeValueTwo->type_value }}</span></td>
        </tr>
        @endforeach
        {{-- <tr>
          <td><span>{{ var_dump($getProductBySku) }}</span></td>
        </tr> --}}

      </tbody>
    </table>
  </div>

  <div class="product-details text-left mt-2">
       @if ($product->inMyWishlist)
    @endif

    @auth('buyer')
    @if ($showWishlist)
    <div class="product-wish">
      <a class="wishIcon wishlist m-0" href="javascript:;"
        style="background:none !important; padding:0 !important;height:auto">
        <i class="icon an an-heart-l wishlist-live-btn @isset($product->inMyWishlist) text-danger @endisset"
          data-product-id="{{ $product->id }}"></i>
        <span class="tooltip-label left">
          @isset($product->inMyWishlist)
          Remove from wishlist
          @endisset
          @empty($product->inMyWishlist)
          Add to wishlist
          @endempty
        </span>
      </a>
    </div>
    @endif
    @endauth
    @guest('buyer')
    <div class="product-wish">
      <a class="wishIcon wishlist m-0" href="javascript:;"
        style="background:none !important; padding:0 !important;height:auto">
        <i class="icon an an-heart-l wishlist-live-btn wishlist-product-id" data-bs-toggle="modal" data-product-id="{{ $product->id }}" data-bs-target="#loginModal"></i>
        <span class="tooltip-label left">
          Add to wishlist
        </span>
      </a>
    </div>
    @endguest
    {{-- <div class="wishlist-btn- btn-minicart">
      <span @class(['fa fa-heart', $product->inMyWishlist])></span>
    </div> --}}
    <!--Product Name-->
    <div class="product-name ">
      <a href="{{ url('/designer') }}/{{ strtolower(str_replace(' ', '-', $product->brand_name)) }}"
        class="text-uppercase">
       <b> {{ $product->brand_name }}</b>
      </a>
      <p>
        <a target="_blank"
          href="{{ route('customer.product-detail', [@$product->mappedCategoriesNotInExtraCat->first()->category_slug, $product->slug, $product->sku, $product->uuid]) }}"
          style="font-weight:normal">
          {{ $product->name }}
        </a>
      </p>
    </div>
    <!--End Product Name-->
    <!--Product Price-->
    <div class="product-price">
      {{-- <span class="price">$1043.00</span>
      <span class="old-price">$1490.00</span><span class="txt-red price">(30%
        OFF)</span>
      --}}


      @if ($hasDiscount)
      <span class="old-price" style="font-size: 12px;">
        {{ $currency }} {{ number_format($mrp, 2) }}
      </span>
      @endif
      <span class="price" style="font-size: 12px;">
        {{ $currency }}  {{ number_format($sellingPrice, 2) }}

      </span>

      @if ($product->discount != 0)
      <span class="discount text-danger" style="font-size: 12px;">
        ({{ $product->discount }}% OFF)
      </span>
      @endif

    </div>
    <!--End Product Price-->
  </div>
  <!--End Product Details-->
</div>