<div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">
                            
                            @foreach(getCategories() as $category)
                            
                            <li class="menu-item-has-children"><a href="">{{$category->category_name}}</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                @if(isset($category->children) && !empty($category->children))
                                <ul class="sub-menu">
                                    
                                    @foreach($category->children as $category)
                                    <li><a href="">{{$category->category_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            
                            @endforeach
                          {{--  <li class="menu-item-has-children"><a href="shop-default.html">Clothing &amp; Apparel</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Womens</a>
                                    </li>
                                    <li><a href="shop-default.html">Mens</a>
                                    </li>
                                    <li><a href="shop-default.html">Bags</a>
                                    </li>
                                    <li><a href="shop-default.html">Sunglasses</a>
                                    </li>
                                    <li><a href="shop-default.html">Accessories</a>
                                    </li>
                                    <li><a href="shop-default.html">Kid's Fashion</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="shop-default.html">Jewelry &amp; Watches</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Gemstone Jewelry</a>
                                    </li>
                                    <li><a href="shop-default.html">Men's Watches</a>
                                    </li>
                                    <li><a href="shop-default.html">Women's Watches</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="shop-default.html">Phones &amp; Accessories</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Iphone 8</a>
                                    </li>
                                    <li><a href="shop-default.html">Iphone X</a>
                                    </li>
                                    <li><a href="shop-default.html">Sam Sung Note 8</a>
                                    </li>
                                    <li><a href="shop-default.html">Sam Sung S8</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="shop-default.html">Sport &amp; Outdoor</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="shop-default.html">Freezer Burn</a>
                                    </li>
                                    <li><a href="shop-default.html">Fridge Cooler</a>
                                    </li>
                                    <li><a href="shop-default.html">Wine Cabinets</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="shop-default.html">Babies &amp; Moms</a>
                            </li>
                            <li><a href="shop-default.html">Books &amp; Office</a>
                            </li>
                            <li><a href="shop-default.html">Cars &amp; Motocycles</a>
                            </li> --}}
                        </ul>
                    </aside>
                    <aside class="widget widget_shop d-none">
                        <h4 class="widget-title">BY BRANDS</h4>
                        <form class="ps-form--widget-search" action="do_action" method="get">
                            <input class="form-control" type="text" placeholder="">
                            <button><i class="icon-magnifier"></i></button>
                        </form>
                        <figure class="ps-custom-scrollbar" data-height="250">
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-1" name="brand" />
                                <label for="brand-1">Adidas (3)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-2" name="brand" />
                                <label for="brand-2">Amcrest (1)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-3" name="brand" />
                                <label for="brand-3">Apple (2)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-4" name="brand" />
                                <label for="brand-4">Asus (19)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-5" name="brand" />
                                <label for="brand-5">Baxtex (20)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-6" name="brand" />
                                <label for="brand-6">Adidas (11)</label>
                            </div>
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div id="nonlinear"></div>
                            <p class="ps-slider__meta">Price:<span class="ps-slider__value">$<span class="ps-slider__min"></span></span>-<span class="ps-slider__value">$<span class="ps-slider__max"></span></span></p>
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-1" name="review">
                                <label for="review-1"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i></span><small>(13)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-2" name="review">
                                <label for="review-2"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i></span><small>(13)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-3" name="review">
                                <label for="review-3"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(5)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-4" name="review">
                                <label for="review-4"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(5)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-5" name="review">
                                <label for="review-5"><span><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(1)</small></label>
                            </div>
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Color</h4>
                            <div class="ps-checkbox ps-checkbox--color color-1 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-1" name="size" />
                                <label for="color-1"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-2 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-2" name="size" />
                                <label for="color-2"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-3 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-3" name="size" />
                                <label for="color-3"></label>
                            </div>
                            
                        </figure>
                        <figure class="sizes">
                            <h4 class="widget-title">BY SIZE</h4><a href="#">L</a><a href="#">M</a><a href="#">S</a><a href="#">XL</a>
                        </figure>
                    </aside>
                </div>