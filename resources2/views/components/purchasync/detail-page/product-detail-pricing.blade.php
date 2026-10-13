<h4 class="ps-product__price mb-0">{{ $currency }} {{ number_format($mrp, 2) }}</h4>
<p class="old-price">{{ $currency }} {{ number_format($sellingPrice, 2, '.', '') }}</p>
<p class="discount-price">({{ number_format($discount, 2)}} % OFF)</p>