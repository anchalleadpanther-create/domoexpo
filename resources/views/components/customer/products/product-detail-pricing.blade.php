<span class="visually-hidden">Regular price</span>
<span class="product-price__sale--single">
    @if ($hasDiscount)
    <span class="product-price-old-price">
        {{ $currency }} {{ number_format($mrp, 2) }}</span>
    @endif
    <span class=" product-price__sale text-dark">
        {{-- <span></span> --}}
        <span class="product-price">{{ $currency }} {{ number_format($sellingPrice, 2, '.', '') }}

        </span>
    </span>
    @if ($hasDiscount)
    <span class="discount-badge"><span class="devider me-2">|</span><span>Save: </span><span
            class="product-single__save-amount"></span><span class="off ms-1">(<span>{{ number_format($discount, 2)
                }}</span>%)</span></span>
    @endif
</span>