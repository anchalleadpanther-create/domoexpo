<div id="wishlist" class="product-wishlist tab-pane fade @if (Request::segment(3) === 'wishlist') active show @endif">
  <h3>My Products Wishlist</h3>

  <!-- Grid Product -->
  <div class="grid-products grid--view-items wishlist-grid mt-4">
    <div class="row">
      @foreach ($wishlistProducts as $product)
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 item position-relative">
          <x-customer.products.wishlist-product-card :product="$product" />
        </div>
      @endforeach
    </div>
  </div>

  <hr />
  <h3>My Designers Wishlist</h3>
  <!-- Grid Product -->
  <div class="grid-products grid--view-items wishlist-grid mt-4">
    <div class="row">
      @foreach ($wishlistDesigners as $designer)
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 item position-relative">
          <x-designers.wishlist-designer-card :designer="$designer" />
        </div>
      @endforeach
    </div>
  </div>
  <!-- End Grid Product-->
</div>
