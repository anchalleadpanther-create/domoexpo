{{-- <div class="product-image">
    <a href="{{ route('customer.product-detail', [$categorySlug, $product->slug, $product->sku, $product->uuid]) }}"
        class="product-img">
        @isset($images[0])
        <img class="@isset($images[0]) primary @endisset blur-up lazyload" data-src="{{ $path }}{{ $images[0]->image }}"
            src="{{ $path }}{{ $images[0]->image }}" alt="{{ $product->name }}" title="{{ $product->name }}">
        @endisset

        @isset($images[1])
        <img class="hover blur-up lazyload" data-src="{{ $path }}{{ $images[1]->image }}"
            src="{{ $path }}{{ $images[1]->image }}" alt="{{ $product->name }}" title="{{ $product->name }}">
        @endisset
    </a>

    <div class="similarproduct- btn-minicart" data-bs-toggle="modal" data-bs-target="#similarProduct_modal">
        <span class="similarproduct-sprite"></span>
        <span class="similarproduct-iconText">VIEW SIMILAR</span>
    </div>
</div>
<!--Start Product Details-->
<div class="product-details text-left">
    <!--Product Name-->
    <div class="product-name text-uppercase">
        <a
            href="{{ route('customer.product-detail', [$categorySlug, $product->slug, $product->sku, $product->uuid]) }}">
            {{ $product->name }}</a>

    </div>
    <!--End Product Name-->
    <!--Product Price-->
    <div class="product-price">

        @if ($hasDiscount)
        <span class="old-price" style="font-size: 11px;">
            {{ $currency }} {{ number_format($mrp, 2) }}
        </span>
        @endif
        <span class="price" style="font-size: 11px;">
            {{ $currency }} {{ number_format($sellingPrice, 2) }}
        </span>
    </div>
    <!--End Product Price-->
</div> --}}



{{-- ======================================= --}}


<div class="product-image">

    <a href="{{ route('customer.product-detail', [$categorySlug, $product->slug, $product->sku, $product->uuid]) }}"
        class="product-img">
        @isset($images[0])
        <img class="@isset($images[0]) primary @endisset blur-up lazyload" data-src="{{ $path }}{{ $images[0]->image }}"
            src="{{ $path }}{{ $images[0]->image }}" alt="{{ $product->name }}" title="{{ $product->name }}">
        @endisset

        {{-- <img class="hover blur-up lazyload" data-src="{{ $path . ($images[1] ?? @$images[0])->image }}"
            src="{{ $path . ($images[1] ?? @$images[0])->image }}" alt="{{ $product->name }}"
            title="{{ $product->name }}"> --}}

        @if(isset($images[1]))
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

        @if(count($images) == 0)
        <img class="blur-up lazyload" data-src="https://placehold.co/225x275?text=Image+Not+Available"
            src="https://placehold.co/225x275?text=Image+Not+Available" alt="{{ $product->name }}"
            title="{{ $product->name }}">
        @endif
    </a>
</div>
<!--Start Product Details-->
<div class="product-details text-left">
    <!--Product Name-->
    <div class="product-name text-uppercase">
        <a href="{{ url('/designer') }}/{{ strtolower(str_replace(' ','-',$product->brand_name)) }}">
            {{ $product->brand_name }}
        </a>
        <p>
            <a href="{{ route('customer.product-detail', [$categorySlug, $product->slug, $product->sku, $product->uuid]) }}"
                style="font-weight:normal">
                {{ $product->name }}
            </a>
        </p>
    </div>
    <!--End Product Name-->
    <!--Product Price-->
    <div class="product-price">

        @if ($hasDiscount)
        <span class="old-price" style="font-size: 11px;">
            {{ $currency }} {{ number_format($mrp, 2) }}
        </span>
        @endif
        <span class="price" style="font-size: 11px;">
            {{ $currency }} {{ number_format($sellingPrice, 2) }}
        </span>
    </div>
    <!--End Product Price-->

</div>
<!--End Product Details-->