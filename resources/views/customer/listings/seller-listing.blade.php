@extends('customer.partials-fn.header')
@section('customerContent')

      <!--include navigation-mobile-->
      <div class="navigation--list">
         <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div>
      </div>
      <!--include search-sidebar-->
      <div class="ps-panel--sidebar" id="menu-mobile">
         <div class="ps-panel__header">
            <h3>Menu</h3>
         </div>
         <div class="ps-panel__content">
            <ul class="menu--mobile">
               <li><a href="#"><strong>Sell Stocks</strong></a></li>
               <li><a href="#">Contact</a></li>
               <li><a href="#">Blog</a></li>
            </ul>
         </div>
      </div>
      <div class="ps-home-promotions ps-pt-60">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                  <img src="img/home/home-photo/promotion-img1.png" alt="" style="width:100%">
                  <div class="ps-promotion-content">
                     <h4 class="pink-text">Get up to 15% off</h4>
                     <h3 class="text-white text-uppercase">Restaurant Equipment</h3>
                     <a href="" class="ps-btn ps-btn--sm pink-btn">Get Offer</a>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                  <img src="img/home/home-photo/promotion-img2.png" alt="" style="width:100%">
                  <div class="ps-promotion-content">
                     <h4 class="pink-text">Get up to 15% off</h4>
                     <h3 class="text-white text-uppercase">Hotels Equipment</h3>
                     <a href="" class="ps-btn ps-btn--sm pink-btn">Get Offer</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="ps-page--shop ps-product-list ps-pt-60" id="shop-sidebar">
         <div class="container">
            <div class="ps-section__header ps-section__headerText p-0 bg-white border-0">
               <div class="ps-block--countdown-deal">
                  <div class="ps-block__left">
                     <h3 class="mb-0">Product Search: Hotel Restaurant Furniture <small>-  203 Products Found</small></h3>
                  </div>
               </div>
               <div class="ps-shopping__view">
                  <ul class="ps-tab-list">
                     <li class="active"><a href="#tab-1">Products</a></li>
                     <li><a href="#tab-2">Services</a></li>
                     <li><a href="#tab-3">Suppliers</a></li>
                  </ul>
               </div>
            </div>
            <div class="ps-layout--shop">
               <div class="ps-layout__left">
                  <aside class="widget widget_shop">
                     <figure class="mt-0 pt-0">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">
                           <li class="menu-item-has-children">
                              <a href="">Furniture & Fixtures</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                              <ul class="sub-menu">
                                 <li class="menu-item-has-children">
                                    <a href="">Tables & Chairs</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                       <li><a href="">Study Tables</a></li>
                                       <li><a href="">Office Tables</a></li>
                                       <li><a href="">Computer Tables</a></li>
                                       <li><a href="">Laptop Tables</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="">Sofa & Couches</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                              <ul class="sub-menu">
                                 <li><a href="">Cookware</a>
                                 </li>
                                 <li><a href="">Decoration</a>
                                 </li>
                                 <li><a href="">Furniture</a>
                                 </li>
                                 <li><a href="">Garden Tools</a>
                                 </li>
                                 <li><a href="">Home Improvement</a>
                                 </li>
                                 <li><a href="">Powers And Hand Tools</a>
                                 </li>
                                 <li><a href="">Utensil &amp; Gadget</a>
                                 </li>
                              </ul>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="">Outdoor Furniture</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                              <ul class="sub-menu">
                                 <li class="menu-item-has-children">
                                    <a href="">Air Conditioners</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                       <li><a href="">Accessories</a>
                                       </li>
                                       <li><a href="">Type Hanging Cell</a>
                                       </li>
                                       <li><a href="">Type Hanging Wall</a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li class="menu-item-has-children">
                                    <a href="">Audios &amp; Theaters</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                       <li><a href="">Headphone</a>
                                       </li>
                                       <li><a href="">Home Theater System</a>
                                       </li>
                                       <li><a href="">Speakers</a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li class="menu-item-has-children">
                                    <a href="">Car Electronics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                       <li><a href="">Audio &amp; Video</a>
                                       </li>
                                       <li><a href="">Car Security</a>
                                       </li>
                                       <li><a href="">Radar Detector</a>
                                       </li>
                                       <li><a href="">Vehicle GPS</a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li class="menu-item-has-children">
                                    <a href="">Office Electronics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                       <li><a href="">Printers</a>
                                       </li>
                                       <li><a href="">Projectors</a>
                                       </li>
                                       <li><a href="">Scanners</a>
                                       </li>
                                       <li><a href="">Store &amp; Business</a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li class="menu-item-has-children">
                                    <a href="">TV Televisions</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                       <li><a href="">4K Ultra HD TVs</a>
                                       </li>
                                       <li><a href="">LED TVs</a>
                                       </li>
                                       <li><a href="">OLED TVs</a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li class="menu-item-has-children">
                                    <a href="">Washing Machines</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                       <li><a href="">Type Drying Clothes</a>
                                       </li>
                                       <li><a href="">Type Horizontal</a>
                                       </li>
                                       <li><a href="">Type Vertical</a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li><a href="">Refrigerators</a>
                                 </li>
                              </ul>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="">Kitchen Equipments</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                              <ul class="sub-menu">
                                 <li><a href="">Equipments</a>
                                 </li>
                                 <li><a href="">Hair Care</a>
                                 </li>
                                 <li><a href="">Perfumer</a>
                                 </li>
                                 <li><a href="">Skin Care</a>
                                 </li>
                              </ul>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="">Laundry Equipments</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                              <ul class="sub-menu">
                                 <li><a href="">Desktop PC</a>
                                 </li>
                                 <li><a href="">Laptop</a>
                                 </li>
                                 <li><a href="">Smartphones</a>
                                 </li>
                              </ul>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="">Beds</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                              <ul class="sub-menu">
                                 <li><a href="">Gemstone Jewelry</a>
                                 </li>
                                 <li><a href="">Men's Watches</a>
                                 </li>
                                 <li><a href="">Women's Watches</a>
                                 </li>
                              </ul>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="">Sofa Cum Beds</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                              <ul class="sub-menu">
                                 <li><a href="">Iphone 8</a>
                                 </li>
                                 <li><a href="">Iphone X</a>
                                 </li>
                                 <li><a href="">Sam Sung Note 8</a>
                                 </li>
                                 <li><a href="">Sam Sung S8</a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </figure>
                     <figure class="ps-custom-scrollbar" data-height="250">
                        <h4 class="widget-title">BRANDS</h4>
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
                        <div class="ps-checkbox">
                           <input class="form-control" type="checkbox" id="brand-7" name="brand" />
                           <label for="brand-7">Casio (9)</label>
                        </div>
                        <div class="ps-checkbox">
                           <input class="form-control" type="checkbox" id="brand-8" name="brand" />
                           <label for="brand-8">Electrolux (0)</label>
                        </div>
                        <div class="ps-checkbox">
                           <input class="form-control" type="checkbox" id="brand-9" name="brand" />
                           <label for="brand-9">Gallaxy (0)</label>
                        </div>
                        <div class="ps-checkbox">
                           <input class="form-control" type="checkbox" id="brand-10" name="brand" />
                           <label for="brand-10">Samsung (0)</label>
                        </div>
                        <div class="ps-checkbox">
                           <input class="form-control" type="checkbox" id="brand-11" name="brand" />
                           <label for="brand-11">Sony (0)</label>
                        </div>
                     </figure>
                     <figure>
                        <h4 class="widget-title">Price</h4>
                        <div class="ps-checkbox">
                           <input class="form-control" type="checkbox" id="price-1" name="price" />
                           <label for="price-1">0 AED - 500 AED</label>
                        </div>
                        <div class="ps-checkbox">
                           <input class="form-control" type="checkbox" id="price-2" name="price" />
                           <label for="price-2">501 AED - 1000 AED</label>
                        </div>
                        <div class="ps-checkbox">
                           <input class="form-control" type="checkbox" id="price-3" name="price" />
                           <label for="price-3">1001 AED - 1500 AED</label>
                        </div>
                        <div class="ps-checkbox">
                           <input class="form-control" type="checkbox" id="price-4" name="price" />
                           <label for="price-4">1501 AED - 2000 AED</label>
                        </div>
                        <div class="ps-checkbox">
                           <input class="form-control" type="checkbox" id="price-5" name="price" />
                           <label for="price-5">Above 2000AED</label>
                        </div>
                     </figure>
                     <figure>
                        <h4 class="widget-title">Color</h4>
                        <div class="ps-checkbox ps-checkbox--color color-1  ">
                           <input class="form-control" type="checkbox" id="color-1" name="size" />
                           <label for="color-1"><span>Black</span></label>
                        </div>
                        <div class="ps-checkbox ps-checkbox--color color-2  ">
                           <input class="form-control" type="checkbox" id="color-2" name="size" />
                           <label for="color-2"><span>Blue</span></label>
                        </div>
                        <div class="ps-checkbox ps-checkbox--color color-3  ">
                           <input class="form-control" type="checkbox" id="color-3" name="size" />
                           <label for="color-3"><span>Brown</span></label>
                        </div>
                        <div class="ps-checkbox ps-checkbox--color color-4  ">
                           <input class="form-control" type="checkbox" id="color-4" name="size" />
                           <label for="color-4"><span>Light Blue</span></label>
                        </div>
                        <div class="ps-checkbox ps-checkbox--color color-5  ">
                           <input class="form-control" type="checkbox" id="color-5" name="size" />
                           <label for="color-5"><span>Light Brown</span></label>
                        </div>
                        <div class="ps-checkbox ps-checkbox--color color-6 ">
                           <input class="form-control" type="checkbox" id="color-6" name="size" />
                           <label for="color-6"><span>Green</span></label>
                        </div>
                        <div class="ps-checkbox ps-checkbox--color color-7  ">
                           <input class="form-control" type="checkbox" id="color-7" name="size" />
                           <label for="color-7"><span>Grey</span></label>
                        </div>
                     </figure>
                     <figure>
                        <h4 class="widget-title">Product Rating</h4>
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
                  </aside>
               </div>
               <div class="ps-layout__right">
                  <div class="ps-shopping ps-tab-root">
                     <div class="ps-shopping__header">
                        <form class="ps-form--widget-search mb-0" action="do_action" method="get">
                           <input class="form-control" type="text" placeholder="What are you looking for?">
                           <button><i class="icon-magnifier"></i></button>
                        </form>
                        <div class="ps-shopping__actions">
                           <select class="ps-select" data-placeholder="Sort Items" >
                              <option>Sort by Latest Product</option>
                              <option>Sort by popularity</option>
                              <option>Sort by average rating</option>
                              <option>Sort by price: low to high</option>
                              <option>Sort by price: high to low</option>
                           </select>
                        </div>
                     </div>
                     <div class="ps-tabs">
                        <div class="ps-tab active" id="tab-1">
                           <div class="ps-shopping-product ps-product-grid">
                              <div class="row">
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                                    <div class="ps-product">
                                       <div class="ps-product__thumbnail">
                                          <a href="buyer-details.html"><img src="img/home/home-photo/product-img1.png" alt="" /></a>
                                          <div class="ps-product__badge">10%</div>
                                          <div class="compare__box">
                                             <input type="checkbox"> Compare
                                          </div>
                                       </div>
                                       <div class="ps-product__container">
                                          <div class="ps-product__content">
                                             <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                   <option value="1">1</option>
                                                   <option value="1">2</option>
                                                   <option value="1">3</option>
                                                   <option value="1">4</option>
                                                   <option value="2">5</option>
                                                </select>
                                             </div>
                                             <a class="ps-product__title" href="buyer-details.html">Refrigeration Equipment</a>
                                             <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                                             <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                                             <p class="ps-product__price ">2274*850*2080mm</p>
                                             <div class="ps-actionBtn mb-4">
                                                <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                                <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                                    <div class="ps-product">
                                       <div class="ps-product__thumbnail">
                                          <a href="buyer-details.html"><img src="img/home/home-photo/product-img2.png" alt="" /></a>
                                          <div class="ps-product__badge">10% OFF</div>
                                          <div class="compare__box">
                                             <input type="checkbox"> Compare
                                          </div>
                                       </div>
                                       <div class="ps-product__container">
                                          <div class="ps-product__content">
                                             <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                   <option value="1">1</option>
                                                   <option value="1">2</option>
                                                   <option value="1">3</option>
                                                   <option value="1">4</option>
                                                   <option value="2">5</option>
                                                </select>
                                             </div>
                                             <a class="ps-product__title" href="buyer-details.html">Refrigeration Equipment</a>
                                             <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                                             <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                                             <p class="ps-product__price ">2274*850*2080mm</p>
                                             <div class="ps-actionBtn mb-4">
                                                <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                                <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                                    <div class="ps-product">
                                       <div class="ps-product__thumbnail">
                                          <a href="buyer-details.html"><img src="img/home/home-photo/product-img3.png" alt="" /></a>
                                          <div class="ps-product__badge">10% OFF</div>
                                          <div class="compare__box">
                                             <input type="checkbox"> Compare
                                          </div>
                                       </div>
                                       <div class="ps-product__container">
                                          <div class="ps-product__content">
                                             <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                   <option value="1">1</option>
                                                   <option value="1">2</option>
                                                   <option value="1">3</option>
                                                   <option value="1">4</option>
                                                   <option value="2">5</option>
                                                </select>
                                             </div>
                                             <a class="ps-product__title" href="buyer-details.html">Refrigeration Equipment</a>
                                             <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                                             <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                                             <p class="ps-product__price ">2274*850*2080mm</p>
                                             <div class="ps-actionBtn mb-4">
                                                <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                                <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                                    <div class="ps-product">
                                       <div class="ps-product__thumbnail">
                                          <a href="buyer-details.html"><img src="img/home/home-photo/product-img1.png" alt="" /></a>
                                          <div class="ps-product__badge">10%</div>
                                          <div class="compare__box">
                                             <input type="checkbox"> Compare
                                          </div>
                                       </div>
                                       <div class="ps-product__container">
                                          <div class="ps-product__content">
                                             <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                   <option value="1">1</option>
                                                   <option value="1">2</option>
                                                   <option value="1">3</option>
                                                   <option value="1">4</option>
                                                   <option value="2">5</option>
                                                </select>
                                             </div>
                                             <a class="ps-product__title" href="buyer-details.html">Refrigeration Equipment</a>
                                             <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                                             <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                                             <p class="ps-product__price ">2274*850*2080mm</p>
                                             <div class="ps-actionBtn mb-4">
                                                <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                                <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                                    <div class="ps-product">
                                       <div class="ps-product__thumbnail">
                                          <a href="buyer-details.html"><img src="img/home/home-photo/product-img2.png" alt="" /></a>
                                          <div class="ps-product__badge">10% OFF</div>
                                          <div class="compare__box">
                                             <input type="checkbox"> Compare
                                          </div>
                                       </div>
                                       <div class="ps-product__container">
                                          <div class="ps-product__content">
                                             <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                   <option value="1">1</option>
                                                   <option value="1">2</option>
                                                   <option value="1">3</option>
                                                   <option value="1">4</option>
                                                   <option value="2">5</option>
                                                </select>
                                             </div>
                                             <a class="ps-product__title" href="buyer-details.html">Refrigeration Equipment</a>
                                             <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                                             <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                                             <p class="ps-product__price ">2274*850*2080mm</p>
                                             <div class="ps-actionBtn mb-4">
                                                <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                                <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                                    <div class="ps-product">
                                       <div class="ps-product__thumbnail">
                                          <a href="buyer-details.html"><img src="img/home/home-photo/product-img3.png" alt="" /></a>
                                          <div class="ps-product__badge">10% OFF</div>
                                          <div class="compare__box">
                                             <input type="checkbox"> Compare
                                          </div>
                                       </div>
                                       <div class="ps-product__container">
                                          <div class="ps-product__content">
                                             <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                   <option value="1">1</option>
                                                   <option value="1">2</option>
                                                   <option value="1">3</option>
                                                   <option value="1">4</option>
                                                   <option value="2">5</option>
                                                </select>
                                             </div>
                                             <a class="ps-product__title" href="buyer-details.html">Refrigeration Equipment</a>
                                             <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                                             <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                                             <p class="ps-product__price ">2274*850*2080mm</p>
                                             <div class="ps-actionBtn mb-4">
                                                <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                                <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                                    <div class="ps-product">
                                       <div class="ps-product__thumbnail">
                                          <a href="buyer-details.html"><img src="img/home/home-photo/product-img1.png" alt="" /></a>
                                          <div class="ps-product__badge">10%</div>
                                          <div class="compare__box">
                                             <input type="checkbox"> Compare
                                          </div>
                                       </div>
                                       <div class="ps-product__container">
                                          <div class="ps-product__content">
                                             <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                   <option value="1">1</option>
                                                   <option value="1">2</option>
                                                   <option value="1">3</option>
                                                   <option value="1">4</option>
                                                   <option value="2">5</option>
                                                </select>
                                             </div>
                                             <a class="ps-product__title" href="buyer-details.html">Refrigeration Equipment</a>
                                             <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                                             <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                                             <p class="ps-product__price ">2274*850*2080mm</p>
                                             <div class="ps-actionBtn mb-4">
                                                <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                                <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                                    <div class="ps-product">
                                       <div class="ps-product__thumbnail">
                                          <a href="buyer-details.html"><img src="img/home/home-photo/product-img2.png" alt="" /></a>
                                          <div class="ps-product__badge">10% OFF</div>
                                          <div class="compare__box">
                                             <input type="checkbox"> Compare
                                          </div>
                                       </div>
                                       <div class="ps-product__container">
                                          <div class="ps-product__content">
                                             <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                   <option value="1">1</option>
                                                   <option value="1">2</option>
                                                   <option value="1">3</option>
                                                   <option value="1">4</option>
                                                   <option value="2">5</option>
                                                </select>
                                             </div>
                                             <a class="ps-product__title" href="buyer-details.html">Refrigeration Equipment</a>
                                             <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                                             <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                                             <p class="ps-product__price ">2274*850*2080mm</p>
                                             <div class="ps-actionBtn mb-4">
                                                <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                                <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 mb-5">
                                    <div class="ps-product">
                                       <div class="ps-product__thumbnail">
                                          <a href="buyer-details.html"><img src="img/home/home-photo/product-img3.png" alt="" /></a>
                                          <div class="ps-product__badge">10% OFF</div>
                                          <div class="compare__box">
                                             <input type="checkbox"> Compare
                                          </div>
                                       </div>
                                       <div class="ps-product__container">
                                          <div class="ps-product__content">
                                             <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                   <option value="1">1</option>
                                                   <option value="1">2</option>
                                                   <option value="1">3</option>
                                                   <option value="1">4</option>
                                                   <option value="2">5</option>
                                                </select>
                                             </div>
                                             <a class="ps-product__title" href="buyer-details.html">Refrigeration Equipment</a>
                                             <p class="ps-product__vendor" >Pro audio outdoor active speaker professional wooden sound…</p>
                                             <p class="ps-product__vendor product__brand"><span class="text-uppercase pink-text">ABC Brand</span> Made in Dubai</p>
                                             <p class="ps-product__price ">2274*850*2080mm</p>
                                             <div class="ps-actionBtn mb-4">
                                                <a class="ps-btn ps-btn--sm blue-bg" href="#">Request Sample</a>
                                                <a class="ps-btn ps-btn--sm blue-outline" href="#">Add to Cart</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-pagination pt-4">
                              <ul class="pagination">
                                 <li class="active"><a href="#">1</a></li>
                                 <li><a href="#">2</a></li>
                                 <li><a href="#">3</a></li>
                                 <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="ps-tab" id="tab-2">
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail"><a href=" "><img src="img/products/services/service-img1.png" alt="" /></a>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <a class="ps-product__title ps-services-product__title" href=" ">Wooden door installation for Hotels and Restaurants</a>
                                       <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                             <option value="1">1</option>
                                             <option value="1">2</option>
                                             <option value="1">3</option>
                                             <option value="1">4</option>
                                             <option value="2">5</option>
                                          </select>
                                       </div>
                                       <h4 class="mt-4">AED 499.00 <small class="ml-2">1 hr 5 mins</small></h4>
                                       <ul class="ps-product__desc">
                                          <li> Repair of either single leg or headboard (any kind of bed)</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="ps-product__actions">
                                          <h4 class="mb-0 text-right">Good<br><small>474 reviews</small></h4>
                                          <div class="ps-product__badge ps-product__reviewBox ml-3">7.4</div>
                                       </div>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-4" href="#">Request for Sample</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail"><a href=" "><img src="img/products/services/service-img2.png" alt="" /></a>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <a class="ps-product__title ps-services-product__title" href=" ">Ceiling-mounted hanger installation</a>
                                       <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                             <option value="1">1</option>
                                             <option value="1">2</option>
                                             <option value="1">3</option>
                                             <option value="1">4</option>
                                             <option value="2">5</option>
                                          </select>
                                       </div>
                                       <h4 class="mt-4">AED 499.00 <small class="ml-2">1 hr 5 mins</small></h4>
                                       <ul class="ps-product__desc">
                                          <li> Repair of either single leg or headboard (any kind of bed)</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="ps-product__actions">
                                          <h4 class="mb-0 text-right">Good<br><small>474 reviews</small></h4>
                                          <div class="ps-product__badge ps-product__reviewBox ml-3">7.4</div>
                                       </div>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-4" href="#">Request for Sample</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail"><a href=" "><img src="img/products/services/service-img3.png" alt="" /></a>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <a class="ps-product__title ps-services-product__title" href=" ">Bed support repair for hotel rooms</a>
                                       <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                             <option value="1">1</option>
                                             <option value="1">2</option>
                                             <option value="1">3</option>
                                             <option value="1">4</option>
                                             <option value="2">5</option>
                                          </select>
                                       </div>
                                       <h4 class="mt-4">AED 499.00 <small class="ml-2">1 hr 5 mins</small></h4>
                                       <ul class="ps-product__desc">
                                          <li> Repair of either single leg or headboard (any kind of bed)</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="ps-product__actions">
                                          <h4 class="mb-0 text-right">Good<br><small>474 reviews</small></h4>
                                          <div class="ps-product__badge ps-product__reviewBox ml-3">7.4</div>
                                       </div>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-4" href="#">Request for Sample</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail"><a href=" "><img src="img/products/services/service-img4.png" alt="" /></a>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <a class="ps-product__title ps-services-product__title" href=" ">Cupboard hinge service (up to two)</a>
                                       <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                             <option value="1">1</option>
                                             <option value="1">2</option>
                                             <option value="1">3</option>
                                             <option value="1">4</option>
                                             <option value="2">5</option>
                                          </select>
                                       </div>
                                       <h4 class="mt-4">AED 499.00 <small class="ml-2">1 hr 5 mins</small></h4>
                                       <ul class="ps-product__desc">
                                          <li> Repair of either single leg or headboard (any kind of bed)</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="ps-product__actions">
                                          <h4 class="mb-0 text-right">Good<br><small>474 reviews</small></h4>
                                          <div class="ps-product__badge ps-product__reviewBox ml-3">7.4</div>
                                       </div>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-4" href="#">Request for Sample</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail"><a href=" "><img src="img/products/services/service-img5.png" alt="" /></a>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <a class="ps-product__title ps-services-product__title" href=" ">Door lock installation</a>
                                       <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                             <option value="1">1</option>
                                             <option value="1">2</option>
                                             <option value="1">3</option>
                                             <option value="1">4</option>
                                             <option value="2">5</option>
                                          </select>
                                       </div>
                                       <h4 class="mt-4">AED 499.00 <small class="ml-2">1 hr 5 mins</small></h4>
                                       <ul class="ps-product__desc">
                                          <li> Repair of either single leg or headboard (any kind of bed)</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="ps-product__actions">
                                          <h4 class="mb-0 text-right">Good<br><small>474 reviews</small></h4>
                                          <div class="ps-product__badge ps-product__reviewBox ml-3">7.4</div>
                                       </div>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-4" href="#">Request for Sample</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail"><a href=" "><img src="img/products/services/service-img6.png" alt="" /></a>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <a class="ps-product__title ps-services-product__title" href=" ">Bathroom mirror installation</a>
                                       <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                             <option value="1">1</option>
                                             <option value="1">2</option>
                                             <option value="1">3</option>
                                             <option value="1">4</option>
                                             <option value="2">5</option>
                                          </select>
                                       </div>
                                       <h4 class="mt-4">AED 499.00 <small class="ml-2">1 hr 5 mins</small></h4>
                                       <ul class="ps-product__desc">
                                          <li> Repair of either single leg or headboard (any kind of bed)</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="ps-product__actions">
                                          <h4 class="mb-0 text-right">Good<br><small>474 reviews</small></h4>
                                          <div class="ps-product__badge ps-product__reviewBox ml-3">7.4</div>
                                       </div>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-4" href="#">Request for Sample</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail"><a href=" "><img src="img/products/services/service-img7.png" alt="" /></a>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <a class="ps-product__title ps-services-product__title" href=" ">Coffee table assembly</a>
                                       <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                             <option value="1">1</option>
                                             <option value="1">2</option>
                                             <option value="1">3</option>
                                             <option value="1">4</option>
                                             <option value="2">5</option>
                                          </select>
                                       </div>
                                       <h4 class="mt-4">AED 499.00 <small class="ml-2">1 hr 5 mins</small></h4>
                                       <ul class="ps-product__desc">
                                          <li> Repair of either single leg or headboard (any kind of bed)</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="ps-product__actions">
                                          <h4 class="mb-0 text-right">Good<br><small>474 reviews</small></h4>
                                          <div class="ps-product__badge ps-product__reviewBox ml-3">7.4</div>
                                       </div>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-4" href="#">Request for Sample</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail"><a href=" "><img src="img/products/services/service-img8.png" alt="" /></a>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <a class="ps-product__title ps-services-product__title" href=" ">Table/chair wheels fitting</a>
                                       <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                             <option value="1">1</option>
                                             <option value="1">2</option>
                                             <option value="1">3</option>
                                             <option value="1">4</option>
                                             <option value="2">5</option>
                                          </select>
                                       </div>
                                       <h4 class="mt-4">AED 499.00 <small class="ml-2">1 hr 5 mins</small></h4>
                                       <ul class="ps-product__desc">
                                          <li> Repair of either single leg or headboard (any kind of bed)</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="ps-product__actions">
                                          <h4 class="mb-0 text-right">Good<br><small>474 reviews</small></h4>
                                          <div class="ps-product__badge ps-product__reviewBox ml-3">7.4</div>
                                       </div>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-4" href="#">Request for Sample</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-pagination">
                              <ul class="pagination">
                                 <li class="active"><a href="#">1</a></li>
                                 <li><a href="#">2</a></li>
                                 <li><a href="#">3</a></li>
                                 <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="ps-tab" id="tab-3">
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail">
                                    <a href=" "><img src="img/products/supplier/supplier-img1.png" alt="" /></a>
                                    <div class="compare__box">
                                       <input type="checkbox"> Compare
                                    </div>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <div class="d-flex">
                                          <a class="ps-product__title ps-services-product__title" href=" ">Star Electronic Technology Co. Ltd.</a>
                                          <div class="ps-product__rating">
                                             <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <p>Dubai, United Arab Emirates <span class="btn btn-xs btn-success">Best Match</span></p>
                                       <p><span class="btn btn-lg btn-lightGreen">Recommend For You</span></p>
                                       <h4 class="blue-text">Associate Categories</h4>
                                       <ul class="ps-product__desc ps_associate-categories">
                                          <li>Study Tables</li>
                                          <li>Office Tables</li>
                                          <li>Computer Tables</li>
                                          <li>Laptop Tables</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="text-right"> <img src="img/icons/Verified.png" ></div>
                                       <ul class="ps-product__desc d-flex justify-content-end mt-3">
                                          <li>Women Owned</li>
                                          <li class="ml-3">SME</li>
                                       </ul>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Add as Favorite Supplier</a>
                                       <a class="ps-btn ps-btn--sm blue-outline mt-3" href="#">Add as Credit Supplier</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail">
                                    <a href=" "><img src="img/products/supplier/supplier-img2.png" alt="" /></a>
                                    <div class="compare__box">
                                       <input type="checkbox"> Compare
                                    </div>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <div class="d-flex">
                                          <a class="ps-product__title ps-services-product__title" href=" ">Uhled Technology Co.</a>
                                          <div class="ps-product__rating">
                                             <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <p>Dubai, United Arab Emirates <span class="btn btn-xs btn-success">Best Match</span></p>
                                       <p><span class="btn btn-lg btn-lightGreen">Recommend For You</span></p>
                                       <h4 class="blue-text">Associate Categories</h4>
                                       <ul class="ps-product__desc ps_associate-categories">
                                          <li>Study Tables</li>
                                          <li>Office Tables</li>
                                          <li>Computer Tables</li>
                                          <li>Laptop Tables</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="text-right"> <img src="img/icons/Verified.png" ></div>
                                       <ul class="ps-product__desc d-flex justify-content-end mt-3">
                                          <li>Women Owned</li>
                                          <li class="ml-3">SME</li>
                                       </ul>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Add as Favorite Supplier</a>
                                       <a class="ps-btn ps-btn--sm blue-outline mt-3" href="#">Add as Credit Supplier</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail">
                                    <a href=" "><img src="img/products/supplier/supplier-img3.png" alt="" /></a>
                                    <div class="compare__box">
                                       <input type="checkbox"> Compare
                                    </div>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <div class="d-flex">
                                          <a class="ps-product__title ps-services-product__title" href=" ">Canbest Opto Technology Co. Ltd.</a>
                                          <div class="ps-product__rating">
                                             <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <p>Dubai, United Arab Emirates <span class="btn btn-xs btn-success">Best Match</span></p>
                                       <p><span class="btn btn-lg btn-lightGreen">Recommend For You</span></p>
                                       <h4 class="blue-text">Associate Categories</h4>
                                       <ul class="ps-product__desc ps_associate-categories">
                                          <li>Study Tables</li>
                                          <li>Office Tables</li>
                                          <li>Computer Tables</li>
                                          <li>Laptop Tables</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="text-right"> <img src="img/icons/Verified.png" ></div>
                                       <ul class="ps-product__desc d-flex justify-content-end mt-3">
                                          <li>Women Owned</li>
                                          <li class="ml-3">SME</li>
                                       </ul>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Add as Favorite Supplier</a>
                                       <a class="ps-btn ps-btn--sm blue-outline mt-3" href="#">Add as Credit Supplier</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail">
                                    <a href=" "><img src="img/products/supplier/supplier-img1.png" alt="" /></a>
                                    <div class="compare__box">
                                       <input type="checkbox"> Compare
                                    </div>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <div class="d-flex">
                                          <a class="ps-product__title ps-services-product__title" href=" ">Star Electronic Technology Co. Ltd.</a>
                                          <div class="ps-product__rating">
                                             <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <p>Dubai, United Arab Emirates <span class="btn btn-xs btn-success">Best Match</span></p>
                                       <p><span class="btn btn-lg btn-lightGreen">Recommend For You</span></p>
                                       <h4 class="blue-text">Associate Categories</h4>
                                       <ul class="ps-product__desc ps_associate-categories">
                                          <li>Study Tables</li>
                                          <li>Office Tables</li>
                                          <li>Computer Tables</li>
                                          <li>Laptop Tables</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="text-right"> <img src="img/icons/Verified.png" ></div>
                                       <ul class="ps-product__desc d-flex justify-content-end mt-3">
                                          <li>Women Owned</li>
                                          <li class="ml-3">SME</li>
                                       </ul>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Add as Favorite Supplier</a>
                                       <a class="ps-btn ps-btn--sm blue-outline mt-3" href="#">Add as Credit Supplier</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail">
                                    <a href=" "><img src="img/products/supplier/supplier-img2.png" alt="" /></a>
                                    <div class="compare__box">
                                       <input type="checkbox"> Compare
                                    </div>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <div class="d-flex">
                                          <a class="ps-product__title ps-services-product__title" href=" ">Uhled Technology Co.</a>
                                          <div class="ps-product__rating">
                                             <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <p>Dubai, United Arab Emirates <span class="btn btn-xs btn-success">Best Match</span></p>
                                       <p><span class="btn btn-lg btn-lightGreen">Recommend For You</span></p>
                                       <h4 class="blue-text">Associate Categories</h4>
                                       <ul class="ps-product__desc ps_associate-categories">
                                          <li>Study Tables</li>
                                          <li>Office Tables</li>
                                          <li>Computer Tables</li>
                                          <li>Laptop Tables</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="text-right"> <img src="img/icons/Verified.png" ></div>
                                       <ul class="ps-product__desc d-flex justify-content-end mt-3">
                                          <li>Women Owned</li>
                                          <li class="ml-3">SME</li>
                                       </ul>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Add as Favorite Supplier</a>
                                       <a class="ps-btn ps-btn--sm blue-outline mt-3" href="#">Add as Credit Supplier</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail">
                                    <a href=" "><img src="img/products/supplier/supplier-img3.png" alt="" /></a>
                                    <div class="compare__box">
                                       <input type="checkbox"> Compare
                                    </div>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <div class="d-flex">
                                          <a class="ps-product__title ps-services-product__title" href=" ">Canbest Opto Technology Co. Ltd.</a>
                                          <div class="ps-product__rating">
                                             <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <p>Dubai, United Arab Emirates <span class="btn btn-xs btn-success">Best Match</span></p>
                                       <p><span class="btn btn-lg btn-lightGreen">Recommend For You</span></p>
                                       <h4 class="blue-text">Associate Categories</h4>
                                       <ul class="ps-product__desc ps_associate-categories">
                                          <li>Study Tables</li>
                                          <li>Office Tables</li>
                                          <li>Computer Tables</li>
                                          <li>Laptop Tables</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="text-right"> <img src="img/icons/Verified.png" ></div>
                                       <ul class="ps-product__desc d-flex justify-content-end mt-3">
                                          <li>Women Owned</li>
                                          <li class="ml-3">SME</li>
                                       </ul>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Add as Favorite Supplier</a>
                                       <a class="ps-btn ps-btn--sm blue-outline mt-3" href="#">Add as Credit Supplier</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail">
                                    <a href=" "><img src="img/products/supplier/supplier-img1.png" alt="" /></a>
                                    <div class="compare__box">
                                       <input type="checkbox"> Compare
                                    </div>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <div class="d-flex">
                                          <a class="ps-product__title ps-services-product__title" href=" ">Star Electronic Technology Co. Ltd.</a>
                                          <div class="ps-product__rating">
                                             <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <p>Dubai, United Arab Emirates <span class="btn btn-xs btn-success">Best Match</span></p>
                                       <p><span class="btn btn-lg btn-lightGreen">Recommend For You</span></p>
                                       <h4 class="blue-text">Associate Categories</h4>
                                       <ul class="ps-product__desc ps_associate-categories">
                                          <li>Study Tables</li>
                                          <li>Office Tables</li>
                                          <li>Computer Tables</li>
                                          <li>Laptop Tables</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="text-right"> <img src="img/icons/Verified.png" ></div>
                                       <ul class="ps-product__desc d-flex justify-content-end mt-3">
                                          <li>Women Owned</li>
                                          <li class="ml-3">SME</li>
                                       </ul>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Add as Favorite Supplier</a>
                                       <a class="ps-btn ps-btn--sm blue-outline mt-3" href="#">Add as Credit Supplier</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail">
                                    <a href=" "><img src="img/products/supplier/supplier-img2.png" alt="" /></a>
                                    <div class="compare__box">
                                       <input type="checkbox"> Compare
                                    </div>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <div class="d-flex">
                                          <a class="ps-product__title ps-services-product__title" href=" ">Uhled Technology Co.</a>
                                          <div class="ps-product__rating">
                                             <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <p>Dubai, United Arab Emirates <span class="btn btn-xs btn-success">Best Match</span></p>
                                       <p><span class="btn btn-lg btn-lightGreen">Recommend For You</span></p>
                                       <h4 class="blue-text">Associate Categories</h4>
                                       <ul class="ps-product__desc ps_associate-categories">
                                          <li>Study Tables</li>
                                          <li>Office Tables</li>
                                          <li>Computer Tables</li>
                                          <li>Laptop Tables</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="text-right"> <img src="img/icons/Verified.png" ></div>
                                       <ul class="ps-product__desc d-flex justify-content-end mt-3">
                                          <li>Women Owned</li>
                                          <li class="ml-3">SME</li>
                                       </ul>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Add as Favorite Supplier</a>
                                       <a class="ps-btn ps-btn--sm blue-outline mt-3" href="#">Add as Credit Supplier</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-shopping-product ps-services-product">
                              <div class="ps-product ps-product--wide">
                                 <div class="ps-product__thumbnail">
                                    <a href=" "><img src="img/products/supplier/supplier-img3.png" alt="" /></a>
                                    <div class="compare__box">
                                       <input type="checkbox"> Compare
                                    </div>
                                 </div>
                                 <div class="ps-product__container">
                                    <div class="ps-product__content">
                                       <div class="d-flex">
                                          <a class="ps-product__title ps-services-product__title" href=" ">Canbest Opto Technology Co. Ltd.</a>
                                          <div class="ps-product__rating">
                                             <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                             </select>
                                          </div>
                                       </div>
                                       <p>Dubai, United Arab Emirates <span class="btn btn-xs btn-success">Best Match</span></p>
                                       <p><span class="btn btn-lg btn-lightGreen">Recommend For You</span></p>
                                       <h4 class="blue-text">Associate Categories</h4>
                                       <ul class="ps-product__desc ps_associate-categories">
                                          <li>Study Tables</li>
                                          <li>Office Tables</li>
                                          <li>Computer Tables</li>
                                          <li>Laptop Tables</li>
                                       </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                       <div class="text-right"> <img src="img/icons/Verified.png" ></div>
                                       <ul class="ps-product__desc d-flex justify-content-end mt-3">
                                          <li>Women Owned</li>
                                          <li class="ml-3">SME</li>
                                       </ul>
                                       <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Add as Favorite Supplier</a>
                                       <a class="ps-btn ps-btn--sm blue-outline mt-3" href="#">Add as Credit Supplier</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="ps-pagination">
                              <ul class="pagination">
                                 <li class="active"><a href="#">1</a></li>
                                 <li><a href="#">2</a></li>
                                 <li><a href="#">3</a></li>
                                 <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="ps-site-features ps-featuress-section">
         <div class="container">
            <div class="ps-block--site-features ps-block--site-features-2">
               <div class="ps-block__item">
                  <img src="img/home/home-photo/support-img1.png">
                  <h4 class="mb-2">REQUEST FOR QUOTATION</h4>
                  <p class="mb-0">we’ve made it easy for you</p>
               </div>
               <div class="ps-block__item">
                  <img src="img/home/home-photo/support-img2.png">
                  <h4 class="mb-2">FEEDBACK</h4>
                  <p class="mb-0">Opinions, Inquiries welcome</p>
               </div>
               <div class="ps-block__item">
                  <img src="img/home/home-photo/support-img3.png">
                  <h4 class="mb-2">GET IN TOUCH</h4>
                  <p class="mb-0">+971 507482498</p>
               </div>
               <div class="ps-block__item">
                  <img src="img/home/home-photo/support-img4.png">
                  <h4 class="mb-2">DROP AN EMAIL</h4>
                  <p class="mb-0">enquiry@fnb2b.com</p>
               </div>
            </div>
         </div>
      </div>
      

@endsection