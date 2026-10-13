<!--MiniCart Drawer-->
<div class="minicart-right-drawer modal right fade" @if (Request::segment(2) !== 'cart') id="minicart-drawer" @endif>
  <div class="modal-dialog">
    <div class="modal-content">
      <!--MiniCart Empty-->
      <div id="cartEmpty" class="cartEmpty d-flex-justify-center flex-column text-center p-3 text-muted d-none">
        <div class="minicart-header d-flex-center justify-content-between w-100">
          <h4 class="fs-6">Your cart (0 Items)</h4>
          <a href="javascript:void(0);" class="close-cart" data-bs-dismiss="modal" aria-label="Close"><i
              class="an an-times-r" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Close"></i></a>
        </div>
      </div>
      <!--End MiniCart Empty-->

      <!--MiniCart Content-->
      <div id="cart-drawer" class="block block-cart">
        <div class="minicart-header">
          <a href="javascript:void(0);" class="close-cart" data-bs-dismiss="modal" aria-label="Close"><i
              class="an an-times-r" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Close"></i></a>
          <h4 class="fs-6">Your cart (<span class="cart-count">0</span> Items)</h4>
        </div>
        <div class="minicart-content">
          <ul class="clearfix cart-products cart-productss">
          </ul>
        </div>
        <div class="minicart-bottom">
          {{-- <div class="shipinfo text-center mb-3 text-uppercase">
            <p class="freeShipMsg"><i class="an an-truck fs-5 me-2 align-middle"></i>SPENT
              <b>{{ getCurrentCurrency()->currency }} 5000.00</b> MORE
              FOR FREE SHIPPING
            </p>
          </div> --}}
          <div class="subtotal">
            <span>Shipping:</span>
            <span class="product-price cart-shipping-total">{{ getCurrentCurrency()->currency }} 0.00</span>
          </div>
          <div class="subtotal">
            <span>Total:</span>
            <span class="product-price cart-grand-total">{{ getCurrentCurrency()->currency }} 0.00</span>
          </div>
          <a href="{{ route('buyer.checkout') }}"
            class="w-100 p-2 my-2 btn btn-outline-primary proceed-to-checkout rounded">Proceed to Checkout</a>
          <a href="{{ route('buyer.cart') }}" class="w-100 btn btn-primary cart-btn rounded">View Cart</a>
        </div>
      </div>
      <!--End MiniCart Content-->
    </div>
  </div>
</div>
<!--End MiniCart Drawer-->
