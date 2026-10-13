<!--MiniCart Drawer-->
<div class="minicart-right-drawer modal right fade" id="similarProduct_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="cart-drawer" class="block block-cart">
                <div class="minicart-header">
                    <a href="javascript:void(0);" class="close-cart" data-bs-dismiss="modal" aria-label="Close"><i
                            class="an an-times-r" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Close"></i></a>
                    <h4 class="fs-6">SIMILAR PRODUCTS</h4>
                </div>
                <div class="row all-similar-products  grid-products">


                    @foreach ($products as $product)
                        <div class=" col-sm-6">
                            <div class="item">
                                <x-customer.products.similar-products :product="$product" :showWishlist="true" />
                            </div>
                        </div>
                    @endforeach

                </div>
                
                <!--Pagination Classic-->
                <hr class="clear">
                <div class="pagination text-center " style=" display: inline-block;">
                    <p><button class="btn btn-primary similar-load-more" type="button">Load more</button></p>
                </div>
                <!--End Pagination Classic-->


            </div>
        </div>
    </div>
</div>
<!--End MiniCart Drawer-->
