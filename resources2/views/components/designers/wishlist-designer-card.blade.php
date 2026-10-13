<a href="{{ route('buyer.remove-from-wishlist-designer', $id) }}" class="btn remove-icon close-btn"
  data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><i class="icon an an-times-r"></i></a>
<div class="product-image">

  <a href="{{ route('customer.designer-products', $designer->brand_slug) }}" class="product-img">

    @isset($designer->icon)
      <img class="blur-up lazyload" data-src="{{ $path }}{{ $designer->icon }}"
        src="{{ $path }}{{ $designer->icon }}" alt="{{ $designer->brand_name }}"
        title="{{ $designer->brand_name }}">
    @endisset

  </a>

</div>

<div class="product-details text-center">

  <div class="product-name">
    <a href="product-layout1.html">{{ $designer->brand_name }}</a>
  </div>

  <form class="cart-form mt-3">
    <a href="{{ route('customer.designer-products', $designer->brand_slug) }}"
      class="btn btn--small rounded product-form__cart-submit"><span>Explore</span></a>
  </form>

</div>
