@extends('customer.partials.header')
@section('customerContent')
<!--Body Container-->
<div id="page-content">
  <!--Collection Banner-->
  <div class="collection-header">
    <div class="collection-hero">
      <div class="collection-hero__image"></div>
      <div class="collection-hero__title-wrapper container">
        <div class="breadcrumbs text-uppercase mt-0 mt-lg-0"><span class="fw-bold">My Cart</span>
        </div>
      </div>
    </div>
  </div>
  <!--End Collection Banner-->

  <!--Main Content-->
  <div class="container">
    <!--Cart Page-->
    <div class="row cart-row my-5">
      <div class="col-12 col-sm-12 col-md-12 col-lg-8 main-col mx-auto">
        {{-- <div class="alert alert-success py-2 rounded-1 alert-dismissible fade show cart-alert" role="alert">
          <i class="align-middle icon an an-truck icon-large me-2"></i><strong
            class="text-uppercase">Congratulations!</strong> You've got free shipping!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}

        <form action="#" method="post" class="cart style2">
          <table class="align-middle">
            <thead class="cart__row cart__header small--hide">
              <tr>
                <th class="action">&nbsp;</th>
                <th colspan="2" class="text-start">Product</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Total</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody class="cart-productss">

            <tbody>
              <td colspan="6" class="text-right">
                <p class="fw-bold">Shipping: </p>
              </td>
              <td class="text-center cart-page-shipping-total">0.00</td>
            </tbody>
            <tbody class="d-none gift-pricing">
              <td colspan="6" class="text-right">
                <p class="fw-bold">Gift: </p>
              </td>
              <td class="text-center cart-page-gift-total">0.00</td>
            </tbody>
            </tbody>
            <tbody class="">
              <td colspan="6" class="text-right">
                <p class="fw-bold">Total: </p>
              </td>
              <td class="text-center cart-page-sub-total">0.00</td>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3" class="text-start pt-3"><a href="{{ route('home') }}"
                    class="btn btn--small d-inline-flex align-items-center rounded cart-continue"><i
                      class="me-1 icon an an-angle-left-l"></i><span>Continue
                      shopping</span></a></td>
                <td colspan="5" class="text-end pt-3">
                  {{-- <a href="{{ route('buyer.remove-all-products-from-cart') }}"
                    class="btn btn--link d-inline-flex align-items-center btn--small small--hide"><i
                      class="me-1 icon an an-times-r"></i><span class="ms-1 text-decoration-underline">Clear
                      Shoping Cart</span></a> --}}
                  <a href="{{ route('buyer.checkout') }}"
                    class="btn btn--small d-inline-flex align-items-center rounded cart-continue ml-2"><i
                      class="me-1 icon an an-sync-ar d-none"></i>Checkout</a>
                </td>
              </tr>
            </tfoot>
          </table>
        </form>

      </div>

    </div>
    <!--End Cart Page-->
  </div>
  <!--End Main Content-->

  <section class="section product_slider1_1 pt-5 ">

    <div class="container-fluid">

      <div class="row">

        <div class="section-header text-uppercase col-12">

          <h2>Trending Products</h2>

        </div>

      </div>

      <div class="productSlider_pro1 grid-products">

        @foreach ($trandingProducts->shuffle() as $trandingProduct)

        <x-customer.products.product-card :product="$trandingProduct" :showWishlist="false"
          :isProductListPage="false" />

        @endforeach
      </div>

    </div>

  </section>

  <section class="section product_slider1_1 pt-5 ">

    <div class="container-fluid">

    @if(count($sortByPriceProducts) > 0)
      <div class="row">

        <div class="section-header text-uppercase col-12">
          <h2>Complete The Look</h2>
        </div>

      </div>

      <div class="productSlider_pro1 grid-products">
        @foreach ($sortByPriceProducts->shuffle() as $latestProduct)
        <x-customer.products.product-card :product="$latestProduct" :showWishlist="false" :isProductListPage="false" />
        @endforeach
      </div>

    </div>
    @endif

  </section>
</div>
<!--End Body Container-->
<script type="module" type="text/javascript" src="{{ asset('allUsers/customer/cart.js') }}"></script>
<script type="module" type="text/javascript" src="{{ asset('allUsers/customer/product.js') }}"></script>
@endsection