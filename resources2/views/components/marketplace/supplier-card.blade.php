<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
<div class="ps-product">
    <div class="ps-product__thumbnail"><a href="{{ route('customer.supplier-detail',[$supplier->id]) }}">
         @if($supplier->biz_company_logo)
                <img src="{{ $path }}{{ $supplier->biz_company_logo}}" alt="" width="200" height="150" />
                @endif
                @if ($supplier->biz_company_logo == null)
                <img src="https://placehold.co/200x200?text=Image+Not+Available" alt="" />
                @endif
        <!--<img src="img/products/shop/18.jpg" alt="" />-->
    </a>
        <!--<ul class="ps-product__actions">-->
        <!--    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>-->
        <!--    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>-->
        <!--    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>-->
        <!--    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>-->
        <!--</ul>-->
    </div>
    <div class="ps-product__container"><a class="ps-product__title ps-services-product__title" href="{{ route('customer.supplier-detail',[$supplier->id]) }}">{{ $supplier->biz_company }}</a>
    
        <!--<div class="ps-product__content"><a class="ps-product__title" href="product-default.html">EPSION Plaster Printer</a>-->
        <!--    <div class="ps-product__rating">-->
        <!--        <select class="ps-rating" data-read-only="true">-->
        <!--            <option value="1">1</option>-->
        <!--            <option value="1">2</option>-->
        <!--            <option value="1">3</option>-->
        <!--            <option value="1">4</option>-->
        <!--            <option value="2">5</option>-->
        <!--        </select><span>01</span>-->
        <!--    </div>-->
        <!--    <p class="ps-product__price">$233.28</p>-->
        <!--</div>-->
        <!--<div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">EPSION Plaster Printer</a>-->
        <!--    <p class="ps-product__price">$233.28</p>-->
        <!--</div>-->
    </div>
</div>

</div>



















