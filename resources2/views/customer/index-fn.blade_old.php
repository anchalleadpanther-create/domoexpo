@extends('customer.partials-fn.header')
@section('customerContent')
   <main id="homepage-7">
         <div class="ps-home-banner">
            <div class="container">
               <div class="ps-section__left">
                  <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                     <a href="#"><img src="{{ asset('allUsers/frontend/img/home/slider1.jpg')}}" alt="" style="width:100%;height:470px"></a>
                     <a href="#"><img src="{{ asset('allUsers/frontend/img/home/slider2.jpg')}}" alt="" style="width:100%;height:470px"></a>
                  </div>
               </div>
               <div class="ps-section__right">
                  <a class="ps-collection" href="#"><img src="{{ asset('allUsers/frontend/img/home/b1.jpg')}}" alt=""></a>
                  <a class="ps-collection" href="#"><img src="{{ asset('allUsers/frontend/img/home/b2.jpg')}}" alt=""></a>
               </div>
            </div>
         </div>
         <div class="ps-top-categories  ps-recentSearch">
            <div class="container">
               <div class="ps-section__header">
                  <h3>Recent Searches</h3>
               </div>
               <div class="ps-section__content"></div>
               <div class="row align-content-lg-stretch">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                     <div class="ps-block--category-2 ">
                        <div class="ps-block__content">
                           <h4>Juicer extractor machine 2023</h4>
                           <p class="mb-0">Dubai, UAE - Star Electronic Technology Pvt Ltd…</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                     <div class="ps-block--category-2 ">
                        <div class="ps-block__content">
                           <h4>Refrigeration equipment</h4>
                           <p class="mb-0">Dubai, UAE - Industrial Refrigerated Technology…</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                     <div class="ps-block--category-2 ">
                        <div class="ps-block__content">
                           <h4>Hotel restaurant furniture</h4>
                           <p class="mb-0">Dubai, UAE - Uhled Technology Company.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="ps-home-promotions gap-pt80">
            <div class="container">
               <div class="ps-section__header">
                  <h3>Offers & Promotions</h3>
               </div>
               <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/promotion-img1.png')}}" alt="" style="width:100%">
                     <div class="ps-promotion-content">
                        <h4 class="pink-text">Get up to 15% off</h4>
                        <h3 class="text-white text-uppercase">Restaurant Equipment</h3>
                        <a href="" class="ps-btn ps-btn--sm pink-btn">Get Offer</a>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/promotion-img2.png')}}" alt="" style="width:100%">
                     <div class="ps-promotion-content">
                        <h4 class="pink-text">Get up to 15% off</h4>
                        <h3 class="text-white text-uppercase">Hotels Equipment</h3>
                        <a href="" class="ps-btn ps-btn--sm pink-btn">Get Offer</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="ps-releases-list gap-pt80">
            <div class="container">
               <div class="ps-section__header">
                  <h3>New Releases</h3>
               </div>
               <div class="ps-section__content">
                  <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Refrigeration Equipment</a></div>
                     </div>
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img2.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Advertising Light Boxes</a></div>
                     </div>
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img3.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Audio Sound Equipment</a></div>
                     </div>
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img4.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Interactive Boards</a></div>
                     </div>
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img5.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Sound Equipment/Amc</a></div>
                     </div>
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img6.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Mobile POS</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="ps-product-list  gap-pt80 ps-product-grid">
            <div class="container">
               <div class="ps-section__header ps-section__headerText p-0 bg-white border-0">
                  <div class="ps-block--countdown-deal">
                     <div class="ps-block__left">
                        <h3 class="mb-0">Go Green - Eco Friendly Solutions & Partners</h3>
                     </div>
                  </div>
                  <a href="#" class="ps-btn ps-btn--sm blue-bg">View all</a>
               </div>
               <div class="ps-section__content pt-5">
                  <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                     <div class="ps-product">
                        <div class="ps-product__thumbnail">
                           <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img1.png')}}" alt="" /></a>
                           <div class="ps-product__badge">10%</div>
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
                              <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
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
                     <div class="ps-product">
                        <div class="ps-product__thumbnail">
                           <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img2.png')}}" alt="" /></a>
                           <div class="ps-product__badge">10% OFF</div>
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
                              <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
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
                     <div class="ps-product">
                        <div class="ps-product__thumbnail">
                           <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img3.png')}}" alt="" /></a>
                           <div class="ps-product__badge">10% OFF</div>
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
                              <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
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
                     <div class="ps-product">
                        <div class="ps-product__thumbnail">
                           <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img4.png')}}" alt="" /></a>
                           <div class="ps-product__badge">10% OFF</div>
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
                              <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
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
               <div class="ps-section__content pt-4">
                  <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img1.png')}}" alt="" /></a>
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
                              <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
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
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img2.png')}}" alt="" /></a>
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
                              <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
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
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img3.png')}}" alt="" /></a>
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
                              <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
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
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/product-img4.png')}}" alt="" /></a>
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
                              <a class="ps-product__title" href="product-default.html">Refrigeration Equipment</a>
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
         </div>
         <div class="ps-home-promotions gap-pt80 ps-brand-section">
            <div class="container">
               <div class="ps-section__header">
                  <h3>Browse by Brands</h3>
               </div>
               <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-img.png')}}" alt="">
                     <div class="ps-promotion-content">
                        <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-icon1.png')}}" style="width:60px">
                        <h3 class="text-white mt-3">Hotel<br> Amenities</h3>
                        <a href="" class="ps-btn ps-btn--sm blue-bg">VIEW PROJECT</a>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                     <div class="row">
                        <div class="col-sm-12 mb-4">
                           <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-img2.png')}}" alt="">
                           <div class="ps-promotion-content">
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-icon2.png')}}" style="width:40px">
                              <h3 class="text-white mt-3">Refrigerator Equipment</h3>
                              <a href="" class="ps-btn ps-btn--sm blue-bg">VIEW PROJECT</a>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-img3.png')}}" alt="">
                           <div class="ps-promotion-content">
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-icon3.png')}}" style="width:40px">
                              <h3 class="text-white mt-3">Sound Controllers</h3>
                              <a href="" class="ps-btn ps-btn--sm blue-bg">VIEW PROJECT</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-img4.png')}}" alt="">
                     <div class="ps-promotion-content">
                        <img src="{{ asset('allUsers/frontend/img/home/home-photo/brand-icon4.png')}}" style="width:50px">
                        <h3 class="text-white text-uppercase mt-3">Restaurant <br>Equipment</h3>
                        <a href="" class="ps-btn ps-btn--sm blue-bg">VIEW PROJECT</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="ps-product-list  gap-pt80 ps-product-grid">
            <div class="container">
               <div class="ps-section__header ps-section__headerText p-0 bg-white border-0">
                  <div class="ps-block--countdown-deal">
                     <div class="ps-block__left">
                        <h3 class="mb-0">Buy from Manufacturers</h3>
                     </div>
                  </div>
                  <a href="#" class="ps-btn ps-btn--sm blue-bg">View all</a>
               </div>
               <div class="ps-section__content pt-4">
                  <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                     <div class="ps-product p-0">
                        <div class="ps-product__thumbnail">
                           <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/manufacturersImg.png')}}" alt="" /></a>
                           <ul class="ps-product__actions">
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                              <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="ps-product p-0">
                        <div class="ps-product__thumbnail">
                           <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/manufacturersImg.png')}}" alt="" /></a>
                           <ul class="ps-product__actions">
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                              <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="ps-product p-0">
                        <div class="ps-product__thumbnail">
                           <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/manufacturersImg.png')}}" alt="" /></a>
                           <ul class="ps-product__actions">
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                              <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="ps-product p-0">
                        <div class="ps-product__thumbnail">
                           <a href="product-default.html"><img src="{{ asset('allUsers/frontend/img/home/home-photo/manufacturersImg.png')}}" alt="" /></a>
                           <ul class="ps-product__actions">
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                              <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                              <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="ps-releases-list gap-pt80">
            <div class="container">
               <div class="ps-section__header">
                  <h3>Browse by Categories</h3>
               </div>
               <div class="ps-section__content">
                  <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Refrigeration Equipment</a></div>
                     </div>
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img2.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Advertising Light Boxes</a></div>
                     </div>
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img3.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Audio Sound Equipment</a></div>
                     </div>
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img4.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Interactive Boards</a></div>
                     </div>
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img5.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Sound Equipment/Amc</a></div>
                     </div>
                     <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ asset('allUsers/frontend/img/home/home-photo/release-img6.png')}}" alt="" /></a> </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#">Mobile POS</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="gap-pt80 ps-innovation-section">
            <div class="container">
               <div class="ps-section__header">
                  <h3>Innovations for inspiration</h3>
               </div>
               <div class="ps-section__content">
                  <div class="row">
                     <figure class="col-sm-4">
                        <div class="ps-block--ourteam">
                           <img src="{{ asset('allUsers/frontend/img/home/home-photo/innovation-img1.png')}}" alt="">
                           <span class="ps-innovation__badge">Drink Dispensers</span>
                           <div class="ps-block__content">
                              <p>Commercial Cold Hot Soft Cold 
                                 Drink Dispenser Machine
                              </p>
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/arrow-icon.png')}}">     
                           </div>
                        </div>
                     </figure>
                     <figure class="col-sm-4">
                        <div class="ps-block--ourteam">
                           <img src="{{ asset('allUsers/frontend/img/home/home-photo/inovation-img2.png')}}" alt="">
                           <span class="ps-innovation__badge">Catering Equipments</span>
                           <div class="ps-block__content">
                              <p>Commercial Cold Hot Soft Cold 
                                 Drink Dispenser Machine
                              </p>
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/arrow-icon.png')}}"> 
                           </div>
                        </div>
                     </figure>
                     <figure class="col-sm-4">
                        <div class="ps-block--ourteam">
                           <img src="{{ asset('allUsers/frontend/img/home/home-photo/innovation-img3.png')}}" alt="">
                           <span class="ps-innovation__badge">Coffee Machines</span>
                           <div class="ps-block__content">
                              <p>Commercial Cold Hot Soft Cold 
                                 Drink Dispenser Machine
                              </p>
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/arrow-icon.png')}}"> 
                           </div>
                        </div>
                     </figure>
                  </div>
               </div>
            </div>
         </div>
         <section class="ps-home-share-work ps-whyFNB-section gap-pt80">
            <div class="container">
               <div class="ps-section__header pb-0 text-center">
                  <h3>Why FNB2B?</h3>
               </div>
               <div class="ps-actionBtn mb-5 text-center">
                  <a class="ps-btn pink-bg" href="#">Buyer Information</a>
                  <a class="ps-btn  black-outline" href="#">Seller Information</a>
               </div>
            </div>
            <div class="ps-section__content">
               <div class="container">
                  <div class="row ps-section__wrapper">
                     <div class="col-sm-1"></div>
                     <div class="col-sm-10">
                        <div class="ps-section__header pb-4 text-center">
                           <h3>Buyer Information</h3>
                           <p>Step into the future of procurement with FNB2B.com. Say goodbuy to outdated methods and embrace streamlined sourcing and transparent communications. Sign up for the wait list to revolutionize your purchasing experience, save valuable time and stay ahead in the competitive world of hospitality.</p>
                        </div>
                     </div>
                     <div class="col-sm-4 col-12 mb-5">
                        <figure>
                           <div class="ps-block--icon">
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/buyerIn-icon1.png')}}">
                              <h5 class="blue-text">Effortless Sourcing</h5>
                              <p>Streamline your procurement process, saving valuable time and resources.</p>
                           </div>
                        </figure>
                     </div>
                     <div class="col-sm-4 col-12 mb-5">
                        <figure>
                           <div class="ps-block--icon">
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/buyerIn-icon2.png')}}">
                              <h5 class="blue-text">Eco-friendly</h5>
                              <p>Reduce waste and environmental impact by minimizing paperwork.</p>
                           </div>
                        </figure>
                     </div>
                     <div class="col-sm-4 col-12 mb-5">
                        <figure>
                           <div class="ps-block--icon">
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/buyerIn-icon3.png')}}">
                              <h5 class="blue-text">Value Generation</h5>
                              <p>Access a diverse vendor network and negotiate better deals to ensure savings</p>
                           </div>
                        </figure>
                     </div>
                     <div class="col-sm-4 col-12 mb-5">
                        <figure>
                           <div class="ps-block--icon">
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/buyerIn-icon4.png')}}">
                              <h5 class="blue-text">Future Ready</h5>
                              <p>Stay ahead of the curve with data-driven insights and technology for tomorrow.</p>
                           </div>
                        </figure>
                     </div>
                     <div class="col-sm-4 col-12 mb-5">
                        <figure>
                           <div class="ps-block--icon">
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/buyerIn-icon5.png')}}">
                              <h5 class="blue-text">Transparent & Collaborative</h5>
                              <p>Cultivate a culture of transparency through direct collaborations, fostering stronger partnerships.</p>
                           </div>
                        </figure>
                     </div>
                     <div class="col-sm-4 col-12 mb-5">
                        <figure>
                           <div class="ps-block--icon">
                              <img src="{{ asset('allUsers/frontend/img/home/home-photo/buyerIn-icon6.png')}}">
                              <h5 class="blue-text">User-Friendly Design</h5>
                              <p>Navigate our platform effortlessly with an intuitive interface.</p>
                           </div>
                        </figure>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <div class="ps-site-features ps-featuress-section">
            <div class="container">
               <div class="ps-block--site-features ps-block--site-features-2">
                  <div class="ps-block__item">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img1.png')}}">
                     <h4 class="mb-2">REQUEST FOR QUOTATION</h4>
                     <p class="mb-0">we’ve made it easy for you</p>
                  </div>
                  <div class="ps-block__item">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img2.png')}}">
                     <h4 class="mb-2">FEEDBACK</h4>
                     <p class="mb-0">Opinions, Inquiries welcome</p>
                  </div>
                  <div class="ps-block__item">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img3.png')}}">
                     <h4 class="mb-2">GET IN TOUCH</h4>
                     <p class="mb-0">+971 507482498</p>
                  </div>
                  <div class="ps-block__item">
                     <img src="{{ asset('allUsers/frontend/img/home/home-photo/support-img4.png')}}">
                     <h4 class="mb-2">DROP AN EMAIL</h4>
                     <p class="mb-0">enquiry@fnb2b.com</p>
                  </div>
               </div>
            </div>
         </div>
         <footer class="ps-footer ps-footer--photo">
            <div class="ps-container">
               <div class="ps-footer__widgets">
                  <div class="ps-footer__right">
                     <div class="row">
                        <div class="col-lg-8">
                           <div class="row">
                              <div class="col-md-4 col-sm-6 col-6">
                                 <aside class="widget widget_footer">
                                    <h4 class="widget-title">Resources</h4>
                                    <ul class="ps-list--link">
                                       <li><a href="#">About Us</a></li>
                                       <li><a href="#">Contact Us</a></li>
                                       <li><a href="#">Why FNB2B.com</a></li>
                                       <li><a href="#">Request for Quote</a></li>
                                    </ul>
                                 </aside>
                              </div>
                              <div class="col-md-4 col-sm-6 col-6">
                                 <aside class="widget widget_footer">
                                    <h4 class="widget-title">USEFUL LINKS</h4>
                                    <ul class="ps-list--link">
                                       <li><a href="#">Faq’s</a></li>
                                       <li><a href="#">Cancellation and Returns</a></li>
                                       <li><a href="#">Shipping and Delivery</a></li>
                                       <li><a href="#">Payments</a></li>
                                    </ul>
                                 </aside>
                              </div>
                              <div class="col-md-4 col-sm-6 col-6">
                                 <aside class="widget widget_footer">
                                    <h4 class="widget-title">SELL WITH US</h4>
                                    <ul class="ps-list--link">
                                       <li><a href="#">Brand Portal</a></li>
                                       <li><a href="#">Seller Portal</a></li>
                                       <li><a href="#">Become a Seller</a></li>
                                       <li><a href="#">Enroll a Brand</a></li>
                                    </ul>
                                 </aside>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <aside class="widget widget_newletters">
                              <h4 class="widget-title">JOIN OUR LIST AND RECEIVE EXCLUSIVES</h4>
                              <form class="ps-form--newletter" action="#" method="get">
                                 <div class="form-group--nest">
                                    <input class="form-control" type="text" placeholder="Email Address" />
                                    <button class="ps-btn">Subscribe</button>
                                 </div>
                                 <ul class="ps-list--social">
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                 </ul>
                              </form>
                           </aside>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="ps-footer__copyright">
                  <p>© 2024-25 FnB2B.com. All Rights Reserved</p>
               </div>
            </div>
         </footer>
   </main>
@endsection