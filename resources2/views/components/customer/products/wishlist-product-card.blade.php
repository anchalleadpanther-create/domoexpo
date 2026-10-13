<a href="{{ route('buyer.remove-from-wishlist', $id) }}" class="btn remove-icon close-btn" data-bs-toggle="tooltip"
    data-bs-placement="top" title="Remove"><i class="icon an an-times-r"></i></a>
<div class="product-image">

    <a href="{{ route('customer.product-detail', [$categorySlug, $product->slug, $product->sku, $product->uuid]) }}"
        class="product-img">
        @isset($images[0])
            <img class="@isset($images[1]) primary @endisset blur-up lazyload"
                data-src="{{ $path }}{{ $product->images[0]->image }}"
                src="{{ $path }}{{ $product->images[0]->image }}" alt="{{ $product->name }}"
                title="{{ $product->name }}">
        @endisset

        @isset($images[1])
            <img class="hover blur-up lazyload" data-src="{{ $path }}{{ $product->images[1]->image }}"
                src="{{ $path }}{{ $product->images[1]->image }}" alt="{{ $product->name }}"
                title="{{ $product->name }}">
        @endisset
        @if ($product->product_condition !== 'New Product')
            <span class="lbl on-sale rounded">Sale</span>
        @else
            <span class="lbl pr-label1 rounded">New</span>
        @endif

    </a>

</div>

<div class="product-details text-center">

    <div class="product-name">
        <a href="product-layout1.html">{{ $product->name }}</a>
    </div>

    <div class="product-price">
        @if ($hasDiscount)
            <span class="old-price">
                {{ $currency }} {{ number_format($mrp, 2) }}
            </span>
        @endif
        <span class="price">
            {{ $currency }} {{ number_format($sellingPrice, 2) }}
        </span>
    </div>

    <form class="cart-form mt-3">
        <a href="{{ route('customer.product-detail', [$categorySlug, $product->slug, $product->sku, $product->uuid]) }}"
            class="btn btn--small rounded product-form__cart-submit"><span>View Details</span>
        </a>
    </form>

</div>
