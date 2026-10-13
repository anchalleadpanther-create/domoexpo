<!-- headers-->
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="desiredBaseUrl" content="{{url('/')}}">
      {{-- SEO Tags --}}
      @include('customer.partials.seo-tags')
      {{-- SEO Tags --}}
      <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/font-awesome/css/font-awesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/fonts/Linearicons/Linearicons/Font/demo-files/demo.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/bootstrap/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/owl-carousel/assets/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/owl-carousel/assets/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/slick/slick/slick.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/nouislider/nouislider.min.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/select2/dist/css/select2.min.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/css/style-dashboard.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/css/style.css')}}">
      <script type="text/javascript" src="{{ asset('allUsers/sweet-alert.js') }}"></script>

       <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap4.css">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/a91a27e46f.js" crossorigin="anonymous"></script>
      <script src="{{asset('allUsers/frontend/plugins/jquery.min.js')}}"></script>

      @routes
   </head>






   <body class="dashboard_page">
   @include('extensions.sweet-alert')
   

      <header class="header header--standard header--electronic dashboard_header lightblue-bg__" data-sticky="true">
         <div class="header__content">
            <div class="container">
               <div class="header__content-left" ><a class="ps-logo" href="{{ url('/') }}/seller/seller"><img src="{{asset('allUsers/frontend/img/logo-photo.png') }}" alt=""></a>
               </div>
               <div class="header__content-center">
               </div>
               <div class="header__content-right">
                  <div class="header__actions">
                     <div class="ps-block--user-header">
                         
                          
                        <div class="ps-block__left" style="background:#fff"><i class="icon-user"></i></div>
                        <div class="ps-block__right"><a href="#">Hi {{auth()->guard('vendor')->user()->biz_name ?? 'User'}}</a> </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <header class="header header--mobile header--mobile-photo" data-sticky="true">
         <div class="navigation--mobile">
            <div class="navigation__left"><span class="responsive_filter-btn" style="display:none"><i class="icon-menu" style=" font-size: 23px;"></i> </span><a class="ps-logo" href="{{url('/')}}/seller/seller"><img src="{{asset('allUsers/frontend/img/logo-photo.png') }}" alt=""></a></div>
            <div class="navigation__right">
               <div class="header__actions">
                  <!--div class="ps-cart--mini">
                     <a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a>
                     <div class="ps-cart__content">
                        <div class="ps-cart__items">
                           <div class="ps-product--cart-mobile">
                              <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('allUsers/frontend/img/products/clothing/7.jpg') }}" alt=""></a></div>
                              <div class="ps-product__content">
                                 <a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                                 <p><strong>Sold by:</strong> YOUNG SHOP</p>
                                 <small>1 x $59.99</small>
                              </div>
                           </div>
                           <div class="ps-product--cart-mobile">
                              <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('allUsers/frontend/img/products/clothing/5.jpg') }}" alt=""></a></div>
                              <div class="ps-product__content">
                                 <a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                 <p><strong>Sold by:</strong> YOUNG SHOP</p>
                                 <small>1 x $59.99</small>
                              </div>
                           </div>
                        </div>
                        <div class="ps-cart__footer">
                           <h3>Sub Total:<strong>$59.99</strong></h3>
                           <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
                        </div>
                     </div>
                  </div-->
                  <div class="ps-block--user-header">
                     <div class="ps-block__left"><i class="icon-user"></i></div>
                     <div class="ps-block__right"><a href="my-account.html">Login</a><a href="my-account.html">Register</a></div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <main class="ps-page--my-account">
         <section class="ps-section--account">

        <!-- Sidebar -->
         @include('customer.partials-fn.seller.sidebar')
        <!-- Enn Sidebar -->

         @yield('content')
 
         </section>
      </main>
      <footer class="ps-footer ps-footer--photo">
            <div class="container">
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
                                       <li><a href="#">All Features</a></li>
                                       <li><a href="#">Invite a friend</a></li>
                                    </ul>
                                 </aside>
                              </div>
                              <div class="col-md-4 col-sm-6 col-6">
                                 <aside class="widget widget_footer">
                                    <h4 class="widget-title">Useful Links</h4>
                                    <ul class="ps-list--link">
                                       <li><a href="#">Terms &amp; Condition</a></li>
                                       <li><a href="#">Privacy Policy</a></li>
                                       <li><a href="#">Procurement Policy</a></li>
                                       <li><a href="#">Supplier Policy</a></li>
                                    </ul>
                                 </aside>
                              </div>
                              <div class="col-md-4 col-sm-6 col-6">
                                 <aside class="widget widget_footer">
                                    <h4 class="widget-title">Sell with us</h4>
                                    <ul class="ps-list--link">
                                       <li><a href="#">Become a Seller</a></li>
                                       <li><a href="#">Become a Partner</a></li>
                                       <li><a href="#">Advertise with us</a></li>
                                       <li><a href="#">Enroll a brand</a></li>
                                    </ul>
                                 </aside>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <aside class="widget widget_newletters">
                              <h5 class="widget-title">JOIN OUR LIST AND RECEIVE EXCLUSIVES</h5>
                              <form class="ps-form--newletter" action="#" method="get">
                                 <div class="form-group--nest">
                                    <input class="form-control" type="text" placeholder="Email Address">
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
                  <p>© 2024-25 purchasync.com. All Rights Reserved</p>
               </div>
            </div>
         </footer>
      <footer class="ps-footer ps-footer--photo" style="display:none">
         <div class="ps-container">
            <div class="ps-footer__widgets">
               <div class="ps-footer__left">
                  <aside class="widget widget_footer widget_contact-us">
                     <div class="widget_content">
                        <img src="{{asset('allUsers/frontend/img/blue-logo.png') }}">
                     </div>
                  </aside>
               </div>
               <div class="ps-footer__right">
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="row">
                           <div class="col-md-4 col-sm-6 col-6">
                              <aside class="widget widget_footer">
                                 <h4 class="widget-title">Resources</h4>
                                 <ul class="ps-list--link">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Faq’s</a></li>
                                    <li><a href="#">Why FNB2B</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                 </ul>
                              </aside>
                           </div>
                           <div class="col-md-4 col-sm-6 col-6">
                              <aside class="widget widget_footer">
                                 <h4 class="widget-title">Policy</h4>
                                 <ul class="ps-list--link">
                                    <li><a href="#">Return Policy</a></li>
                                    <li><a href="#">Shipping Policy</a></li>
                                    <li><a href="#">Payment Settlement Policy</a></li>
                                    <li><a href="#">Packaging Guidelines</a></li>
                                 </ul>
                              </aside>
                           </div>
                           <div class="col-md-4 col-sm-6 col-6">
                              <aside class="widget widget_footer">
                                 <h4 class="widget-title">Useful Links</h4>
                                 <ul class="ps-list--link">
                                    <li><a href="#">Prohibited Products</a></li>
                                    <li><a href="#">Restricted Products</a></li>
                                    <li><a href="#">Taxes</a></li>
                                    <li><a href="#">Fee Structure</a></li>
                                 </ul>
                              </aside>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <aside class="widget widget_footer payment_icons">
                           <h4 class="widget-title">Payment Method</h4>
                           <p>
                              <a href="#"><img src="{{asset('allUsers/frontend/img/home/home-photo/seller/payment-icon1.png') }}" alt=""></a>
                              <a href="#"><img src="{{asset('allUsers/frontend/img/home/home-photo/seller/payment-icon2.png') }}" alt=""></a>
                              <a href="#"><img src="{{asset('allUsers/frontend/img/home/home-photo/seller/payment-icon3.png') }}" alt=""></a>
                              <a href="#"><img src="{{asset('allUsers/frontend/img/home/home-photo/seller/payment-icon4.png') }}" alt=""></a>
                           </p>
                        </aside>
                     </div>
                  </div>
               </div>
            </div>
            <div class="ps-footer__copyright">
               <p>© 2024 FnB2B.com. All Rights Reserved</p>
               <p></p>
               <p></p>
               <ul class="ps-list--social">
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                  <li><a class="google-plus" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="google-plus" href="#"><i class="fa fa-youtube-play"></i></a></li>
               </ul>
            </div>
         </div>
      </footer>
      <div id="back2top"><i class="icon icon-arrow-up"></i></div>
      <div class="ps-site-overlay"></div>
      <div class="ps-panel--sidebar" id="cart-mobile">
         <div class="ps-panel__header">
            <h3>Shopping Cart</h3>
         </div>
         <div class="navigation__content">
            <div class="ps-cart--mobile">
               <div class="ps-cart__content">
                  <div class="ps-product--cart-mobile">
                     <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('allUsers/frontend/img/products/clothing/7.jpg') }}" alt=""></a></div>
                     <div class="ps-product__content">
                        <a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                        <p><strong>Sold by:</strong> YOUNG SHOP</p>
                        <small>1 x $59.99</small>
                     </div>
                  </div>
               </div>
               <div class="ps-cart__footer">
                  <h3>Sub Total:<strong>$59.99</strong></h3>
                  <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
               </div>
            </div>
         </div>
      </div>
      <!--include ../../data/menu/menu-product-categories-->
      <div class="ps-panel--sidebar" id="navigation-mobile">
         <div class="ps-panel__header">
            <h3>Categories</h3>
         </div>
         <div class="ps-panel__content">
            <div class="menu--product-categories">
               <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
               <div class="menu__content">
                  <ul class="menu--mobile">
                     <li><a href="#.html">Hot Promotions</a>
                     </li>
                     <li class="menu-item-has-children has-mega-menu">
                        <a href="#">Consumer Electronic</a><span class="sub-toggle"></span>
                        <div class="mega-menu">
                           <div class="mega-menu__column">
                              <h4>Electronic<span class="sub-toggle"></span></h4>
                              <ul class="mega-menu__list">
                                 <li><a href="#.html">Home Audio &amp; Theathers</a>
                                 </li>
                                 <li><a href="#.html">TV &amp; Videos</a>
                                 </li>
                                 <li><a href="#.html">Camera, Photos &amp; Videos</a>
                                 </li>
                                 <li><a href="#.html">Cellphones &amp; Accessories</a>
                                 </li>
                                 <li><a href="#.html">Headphones</a>
                                 </li>
                                 <li><a href="#.html">Videosgames</a>
                                 </li>
                                 <li><a href="#.html">Wireless Speakers</a>
                                 </li>
                                 <li><a href="#.html">Office Electronic</a>
                                 </li>
                              </ul>
                           </div>
                           <div class="mega-menu__column">
                              <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>
                              <ul class="mega-menu__list">
                                 <li><a href="#.html">Digital Cables</a>
                                 </li>
                                 <li><a href="#.html">Audio &amp; Video Cables</a>
                                 </li>
                                 <li><a href="#.html">Batteries</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </li>
                     <li><a href="#.html">Clothing &amp; Apparel</a>
                     </li>
                     <li><a href="#.html">Home, Garden &amp; Kitchen</a>
                     </li>
                     <li><a href="#.html">Health &amp; Beauty</a>
                     </li>
                     <li><a href="#.html">Yewelry &amp; Watches</a>
                     </li>
                     <li class="menu-item-has-children has-mega-menu">
                        <a href="#">Computer &amp; Technology</a><span class="sub-toggle"></span>
                        <div class="mega-menu">
                           <div class="mega-menu__column">
                              <h4>Computer &amp; Technologies<span class="sub-toggle"></span></h4>
                              <ul class="mega-menu__list">
                                 <li><a href="#.html">Computer &amp; Tablets</a>
                                 </li>
                                 <li><a href="#.html">Laptop</a>
                                 </li>
                                 <li><a href="#.html">Monitors</a>
                                 </li>
                                 <li><a href="#.html">Networking</a>
                                 </li>
                                 <li><a href="#.html">Drive &amp; Storages</a>
                                 </li>
                                 <li><a href="#.html">Computer Components</a>
                                 </li>
                                 <li><a href="#.html">Security &amp; Protection</a>
                                 </li>
                                 <li><a href="#.html">Gaming Laptop</a>
                                 </li>
                                 <li><a href="#.html">Accessories</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </li>
                     <li><a href="#.html">Babies &amp; Moms</a>
                     </li>
                     <li><a href="#.html">Sport &amp; Outdoor</a>
                     </li>
                     <li><a href="#.html">Phones &amp; Accessories</a>
                     </li>
                     <li><a href="#.html">Books &amp; Office</a>
                     </li>
                     <li><a href="#.html">Cars &amp; Motocycles</a>
                     </li>
                     <li><a href="#.html">Home Improments</a>
                     </li>
                     <li><a href="#.html">Vouchers &amp; Services</a>
                     </li>
                  </ul>
               </div>
            </div>
            <!--+createMenu(product_categories, 'menu--mobile')-->
         </div>
      </div>
      <div class="navigation--list">
         <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div>
      </div>
      <div class="ps-panel--sidebar" id="search-sidebar">
         <div class="ps-panel__header">
            <form class="ps-form--search-mobile" action="index.html" method="get">
               <div class="form-group--nest">
                  <input class="form-control" type="text" placeholder="Search something...">
                  <button><i class="icon-magnifier"></i></button>
               </div>
            </form>
         </div>
         <div class="navigation__content"></div>
      </div>
      <div class="ps-panel--sidebar" id="menu-mobile">
         <div class="ps-panel__header">
            <h3>Menu</h3>
         </div>
         <div class="ps-panel__content">
            <ul class="menu--mobile">
               <li class="menu-item-has-children">
                  <a href="index">Home</a><span class="sub-toggle"></span>
                  <ul class="sub-menu">
                     <li><a href="index.html">Marketplace Full Width</a>
                     </li>
                     <li><a href="home-autopart.html">Home Auto Parts</a>
                     </li>
                     <li><a href="home-technology.html">Home Technology</a>
                     </li>
                     <li><a href="home-organic.html">Home Organic</a>
                     </li>
                     <li><a href="home-marketplace.html">Home Marketplace V1</a>
                     </li>
                     <li><a href="home-marketplace-2.html">Home Marketplace V2</a>
                     </li>
                     <li><a href="home-marketplace-3.html">Home Marketplace V3</a>
                     </li>
                     <li><a href="home-marketplace-4.html">Home Marketplace V4</a>
                     </li>
                     <li><a href="home-electronic.html">Home Electronic</a>
                     </li>
                     <li><a href="home-furniture.html">Home Furniture</a>
                     </li>
                     <li><a href="home-kid.html">Home Kids</a>
                     </li>
                     <li><a href="homepage-photo-and-video.html">Home photo and picture</a>
                     </li>
                     <li><a href="home-medical.html">Home Medical</a>
                     </li>
                  </ul>
               </li>
               <li class="menu-item-has-children has-mega-menu">
                  <a href="shop-default">Shop</a><span class="sub-toggle"></span>
                  <div class="mega-menu">
                     <div class="mega-menu__column">
                        <h4>Catalog Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                           <li><a href="shop-default.html">Shop Default</a>
                           </li>
                           <li><a href="shop-default.html">Shop Fullwidth</a>
                           </li>
                           <li><a href="shop-categories.html">Shop Categories</a>
                           </li>
                           <li><a href="shop-sidebar.html">Shop Sidebar</a>
                           </li>
                           <li><a href="shop-sidebar-without-banner.html">Shop Without Banner</a>
                           </li>
                           <li><a href="shop-carousel.html">Shop Carousel</a>
                           </li>
                        </ul>
                     </div>
                     <div class="mega-menu__column">
                        <h4>Product Layout<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                           <li><a href="product-default.html">Default</a>
                           </li>
                           <li><a href="product-extend.html">Extended</a>
                           </li>
                           <li><a href="product-full-content.html">Full Content</a>
                           </li>
                           <li><a href="product-box.html">Boxed</a>
                           </li>
                           <li><a href="product-sidebar.html">Sidebar</a>
                           </li>
                           <li><a href="product-default.html">Fullwidth</a>
                           </li>
                        </ul>
                     </div>
                     <div class="mega-menu__column">
                        <h4>Product Types<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                           <li><a href="product-default.html">Simple</a>
                           </li>
                           <li><a href="product-default.html">Color Swatches</a>
                           </li>
                           <li><a href="product-image-swatches.html">Images Swatches</a>
                           </li>
                           <li><a href="product-countdown.html">Countdown</a>
                           </li>
                           <li><a href="product-multi-vendor.html">Multi-Vendor</a>
                           </li>
                           <li><a href="product-instagram.html">Instagram</a>
                           </li>
                           <li><a href="product-affiliate.html">Affiliate</a>
                           </li>
                           <li><a href="product-on-sale.html">On sale</a>
                           </li>
                           <li><a href="product-video.html">Video Featured</a>
                           </li>
                           <li><a href="product-groupped.html">Grouped</a>
                           </li>
                           <li><a href="product-out-stock.html">Out Of Stock</a>
                           </li>
                        </ul>
                     </div>
                     <div class="mega-menu__column">
                        <h4>Woo Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                           <li><a href="shopping-cart.html">Shopping Cart</a>
                           </li>
                           <li><a href="checkout.html">Checkout</a>
                           </li>
                           <li><a href="whishlist.html">Whishlist</a>
                           </li>
                           <li><a href="compare.html">Compare</a>
                           </li>
                           <li><a href="order-tracking.html">Order Tracking</a>
                           </li>
                           <li><a href="my-account.html">My Account</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="menu-item-has-children has-mega-menu">
                  <a href="">Pages</a><span class="sub-toggle"></span>
                  <div class="mega-menu">
                     <div class="mega-menu__column">
                        <h4>Basic Page<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                           <li><a href="about-us.html">About Us</a>
                           </li>
                           <li><a href="contact-us.html">Contact</a>
                           </li>
                           <li><a href="faqs.html">Faqs</a>
                           </li>
                           <li><a href="comming-soon.html">Comming Soon</a>
                           </li>
                           <li><a href="404-page.html">404 Page</a>
                           </li>
                        </ul>
                     </div>
                     <div class="mega-menu__column">
                        <h4>Vendor Pages<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                           <li><a href="become-a-vendor.html">Become a Vendor</a>
                           </li>
                           <li><a href="vendor-store.html">Vendor Store</a>
                           </li>
                           <li><a href="vendor-dashboard-free.html">Vendor Dashboard Free</a>
                           </li>
                           <li><a href="vendor-dashboard-pro.html">Vendor Dashboard Pro</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="menu-item-has-children has-mega-menu">
                  <a href="">Blogs</a><span class="sub-toggle"></span>
                  <div class="mega-menu">
                     <div class="mega-menu__column">
                        <h4>Blog Layout<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                           <li><a href="blog-grid.html">Grid</a>
                           </li>
                           <li><a href="blog-list.html">Listing</a>
                           </li>
                           <li><a href="blog-small-thumb.html">Small Thumb</a>
                           </li>
                           <li><a href="blog-left-sidebar.html">Left Sidebar</a>
                           </li>
                           <li><a href="blog-right-sidebar.html">Right Sidebar</a>
                           </li>
                        </ul>
                     </div>
                     <div class="mega-menu__column">
                        <h4>Single Blog<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                           <li><a href="blog-detail.html">Single 1</a>
                           </li>
                           <li><a href="blog-detail-2.html">Single 2</a>
                           </li>
                           <li><a href="blog-detail-3.html">Single 3</a>
                           </li>
                           <li><a href="blog-detail-4.html">Single 4</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
       <!--div id="loader-wrapper">
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div-->
      <div class="ps-search" id="site-search">
         <a class="ps-btn--close" href="#"></a>
         <div class="ps-search__content">
            <form class="ps-form--primary-search" action="do_action" method="post">
               <input class="form-control" type="text" placeholder="Search for...">
               <button><i class="aroma-magnifying-glass"></i></button>
            </form>
         </div>
      </div>
      <div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
               <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                  <div class="ps-product__header">
                     <div class="ps-product__thumbnail" data-vertical="false">
                        <div class="ps-product__images" data-arrow="true">
                           <div class="item"><img src="{{asset('allUsers/frontend/img/products/detail/fullwidth/1.jpg') }}" alt=""></div>
                           <div class="item"><img src="{{asset('allUsers/frontend/img/products/detail/fullwidth/2.jpg') }}" alt=""></div>
                           <div class="item"><img src="{{asset('allUsers/frontend/img/products/detail/fullwidth/3.jpg') }}" alt=""></div>
                        </div>
                     </div>
                     <div class="ps-product__info">
                        <h1>Marshall Kilburn Portable Wireless Speaker</h1>
                        <div class="ps-product__meta">
                           <p>Brand:<a href="shop-default.html">Sony</a></p>
                           <div class="ps-product__rating">
                              <select class="ps-rating" data-read-only="true">
                                 <option value="1">1</option>
                                 <option value="1">2</option>
                                 <option value="1">3</option>
                                 <option value="1">4</option>
                                 <option value="2">5</option>
                              </select>
                              <span>(1 review)</span>
                           </div>
                        </div>
                        <h4 class="ps-product__price">$36.78 – $56.99</h4>
                        <div class="ps-product__desc">
                           <p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>
                           <ul class="ps-list--dot">
                              <li> Unrestrained and portable active stereo speaker</li>
                              <li> Free from the confines of wires and chords</li>
                              <li> 20 hours of portable capabilities</li>
                              <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                              <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                           </ul>
                        </div>
                        <div class="ps-product__shopping">
                           <a class="ps-btn ps-btn--black" href="#">Add to cart</a><a class="ps-btn" href="#">Buy Now</a>
                           <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                        </div>
                     </div>
                  </div>
               </article>
            </div>
         </div>
      </div>

      
      <script src="{{asset('allUsers/frontend/plugins/nouislider/nouislider.min.js')}}"></script>
      <script src="{{asset('allUsers/frontend/plugins/popper.min.js')}}"></script>
      <script src="{{asset('allUsers/frontend/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
      <script src="{{asset('allUsers/frontend/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('allUsers/frontend/plugins/imagesloaded.pkgd.min.js')}}"></script>
      <script src="{{asset('allUsers/frontend/plugins/masonry.pkgd.min.js')}}"></script>
      <script src="{{asset('allUsers/frontend/plugins/isotope.pkgd.min.js')}}"></script>
      <script src="{{asset('allUsers/frontend/plugins/jquery.matchHeight-min.js')}}"></script>
      <script src="{{asset('allUsers/frontend/plugins/slick/slick/slick.min.js')}}"></script>
      <script src="{{asset('allUsers/frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
      <script src="{{asset('allUsers/frontend/plugins/slick-animation.min.js')}}"></script>
      <!-- <script src="{{ asset('allUsers/sweet-alert.js') }}"></script> -->
      <script src="{{asset('allUsers/frontend/plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
      <!-- <script src="{{asset('allUsers/frontend/plugins/sticky-sidebar/dist/sticky-sidebar.min.js')}}"></script> -->
      <script src="{{asset('allUsers/frontend/plugins/select2/dist/js/select2.full.min.js')}}"></script>
      <!-- <script src="{{asset('allUsers/frontend/plugins/gmap3.min.js')}}"></script> -->
      <script src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>

    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->

      <!-- custom scripts-->
      <script src="{{asset('allUsers/frontend/js/main.js')}}"></script>




     
   </body>
</html> 