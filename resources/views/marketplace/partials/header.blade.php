<!-- headers-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>domo.expo.cy</title>

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('allUsers/frontend/fonts/Linearicons/Linearicons/Font/demo-files/demo.css')}}">
    <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/owl-carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{asset('allUsers/frontend/plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('allUsers/frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{asset('allUsers/frontend/plugins/select2/dist/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('allUsers/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('allUsers/frontend/css/home-photo.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('allUsers/frontend/img/favicon-icon.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="{{asset('allUsers/frontend/plugins/jquery.min.js')}}"></script>

</head>

<body>
    <!--sweet-alert-->
     @include('extensions.sweet-alert')
    <!--Desktop Navbar Header-->
     @include('marketplace.partials.desktop-navbar')

    <!--Mobile Navbar Header-->
     @include('marketplace.partials.mobile-navbar')


      @yield('content')
      
      
    <!--News latter form-->
    @include('marketplace.partials.news-latter-form')
    


    <footer class="ps-footer">
        <div class="ps-container">
            <div class="ps-footer__widgets">
                <aside class="widget widget_footer widget_contact-us">
                    <h4 class="widget-title">Contact us</h4>
                    <div class="widget_content">
                        <p>Call us 24/7</p>
                        <h3> +357 25336613</h3>
                        <p>Address: Ψηλορείτου 15Α -17Γ και, Σουδας 16Β-18Γ, Λεμεσός 3048<br><a
                                href="mailto:support@domo.expo.cy">support@domo.expo.cy</a></p>
                        <!--<ul class="ps-list--social">-->
                        <!--    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>-->
                        <!--    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>-->
                        <!--    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>-->
                        <!--    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>-->
                        <!--</ul>-->
                    </div>
                </aside>
                
                
                
                 
                
               @foreach (footerCategories() as $category) 
                <aside class="widget widget_footer">
                    <h4 class="widget-title">{{ $category->name }}</h4>
                    @if(count($category->subCategories) > 0)
                    <ul class="ps-list--link">
                        @foreach ($category->subCategories as $subCategory)
                        <li><a href="{{ $subCategory->link }}">{{$subCategory->name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </aside>
                
                @endforeach
                
            </div>
            <div class="ps-footer__links">
              
                @foreach(getCategories() as $category)
                <p><strong>{{$category->category_name}} : </strong>
                    @foreach($category->children as  $subcategory)
                    <a href="{{ route('customer.product-category',[$subcategory->category_slug,'product']) }}">{{$subcategory->category_name}}</a>
                    @endforeach
                </p>
                @endforeach
                
            </div>
            <div class="ps-footer__copyright d-flex justify-content-center text-center">
                <p>&copy; {{date('Y')}} expo. All Rights Reserved</p>
                <!--<p><span>We Using Safe Payment For:</span><a href="#"><img-->
                <!--            src="{{asset('allUsers/frontend/img/payment-method/1.jpg')}}" alt="" /></a><a href="#"><img-->
                <!--            src="{{asset('allUsers/frontend/img/payment-method/2.jpg')}}" alt="" /></a><a href="#"><img-->
                <!--            src="{{asset('allUsers/frontend/img/payment-method/3.jpg')}}" alt="" /></a><a href="#"><img-->
                <!--            src="{{asset('allUsers/frontend/img/payment-method/4.jpg')}}" alt="" /></a><a href="#"><img-->
                <!--            src="{{asset('allUsers/frontend/img/payment-method/5.jpg')}}" alt="" /></a></p>-->
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
                        <div class="ps-product__thumbnail"><a href="#"><img
                                    src="{{asset('allUsers/frontend/img/products/clothing/7.jpg')}}" alt=""></a></div>
                        <div class="ps-product__content"><a class="ps-product__remove" href="#"><i
                                    class="icon-cross"></i></a><a href="{{url('/')}}/p/furniture-fixtures">MVMTH Classical Leather
                                Watch In Black</a>
                            <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                        </div>
                    </div>
                </div>
                <div class="ps-cart__footer">
                    <h3>Sub Total:<strong>$59.99</strong></h3>
                    <figure><a class="ps-btn" href="{{url('/')}}/p/furniture-fixtures">View Cart</a><a class="ps-btn"
                            href="checkout.html">Checkout</a></figure>
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
                        <li class="menu-item-has-children has-mega-menu"><a href="#">Consumer Electronic</a><span
                                class="sub-toggle"></span>
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
                        <li class="menu-item-has-children has-mega-menu"><a href="#">Computer &amp; Technology</a><span
                                class="sub-toggle"></span>
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
    <!--<div class="navigation--list">-->
    <!--    <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i-->
    <!--                class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar"-->
    <!--            href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a-->
    <!--            class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span>-->
    <!--                Search</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i-->
    <!--                class="icon-bag2"></i><span> Cart</span></a></div>-->
    <!--</div>-->
    <div class="ps-panel--sidebar" id="search-sidebar">
        <div class="ps-panel__header">
            <form class="ps-form--search-mobile" action="{{url('/')}}" method="get">
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
                <li class="menu-item-has-children"><a href="index">Home</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="{{url('/')}}">Marketplace Full Width</a>
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
                <li class="menu-item-has-children has-mega-menu"><a href="{{url('/')}}/p/furniture-fixtures">Shop</a><span
                        class="sub-toggle"></span>
                    <div class="mega-menu">
                        <div class="mega-menu__column">
                            <h4>Catalog Pages<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Shop Default</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Shop Fullwidth</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Shop Categories</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Shop Sidebar</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Shop Without Banner</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Shop Carousel</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mega-menu__column">
                            <h4>Product Layout<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Default</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Extended</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Full Content</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Boxed</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Sidebar</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Fullwidth</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mega-menu__column">
                            <h4>Product Types<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Simple</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Color Swatches</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Images Swatches</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Countdown</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Multi-Vendor</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Instagram</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Affiliate</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">On sale</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Video Featured</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Grouped</a>
                                </li>
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Out Of Stock</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mega-menu__column">
                            <h4>Woo Pages<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="{{url('/')}}/p/furniture-fixtures">Shopping Cart</a>
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
                <li class="menu-item-has-children has-mega-menu"><a href="">Pages</a><span class="sub-toggle"></span>
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
                <li class="menu-item-has-children has-mega-menu"><a href="">Blogs</a><span class="sub-toggle"></span>
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
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="do_action" method="post">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
                <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header">
                        <div class="ps-product__thumbnail" data-vertical="false">
                            <div class="ps-product__images" data-arrow="true">
                                <div class="item"><img
                                        src="{{asset('allUsers/frontend/img/products/detail/fullwidth/1.jpg')}}" alt="">
                                </div>
                                <div class="item"><img
                                        src="{{asset('allUsers/frontend/img/products/detail/fullwidth/2.jpg')}}" alt="">
                                </div>
                                <div class="item"><img
                                        src="{{asset('allUsers/frontend/img/products/detail/fullwidth/3.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <h1>Marshall Kilburn Portable Wireless Speaker</h1>
                            <div class="ps-product__meta">
                                <p>Brand:<a href="{{url('/')}}/p/furniture-fixtures">Sony</a></p>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>(1 review)</span>
                                </div>
                            </div>
                            <h4 class="ps-product__price">$36.78 – $56.99</h4>
                            <div class="ps-product__desc">
                                <p>Sold By:<a href="{{url('/')}}/p/furniture-fixtures"><strong> Go Pro</strong></a></p>
                                <ul class="ps-list--dot">
                                    <li> Unrestrained and portable active stereo speaker</li>
                                    <li> Free from the confines of wires and chords</li>
                                    <li> 20 hours of portable capabilities</li>
                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                </ul>
                            </div>
                            <div class="ps-product__shopping"><a class="ps-btn ps-btn--black" href="#">Add to cart</a><a
                                    class="ps-btn" href="#">Buy Now</a>
                                <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a
                                        href="#"><i class="icon-chart-bars"></i></a></div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    
    
    <!-- ✅ Bootstrap JS (with Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- <script src="plugins/jquery.min.js"></script>
    <script src="plugins/nouislider/nouislider.min.js"></script>
    <script src="plugins/popper.min.js"></script>
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/imagesloaded.pkgd.min.js"></script>
    <script src="plugins/masonry.pkgd.min.js"></script>
    <script src="plugins/isotope.pkgd.min.js"></script>
    <script src="plugins/jquery.matchHeight-min.js"></script>
    <script src="plugins/slick/slick/slick.min.js"></script>
    <script src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="plugins/slick-animation.min.js"></script>
    <script src="plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
    <script src="plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
    <script src="plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="plugins/gmap3.min.js"></script>
    <!-- custom scripts-->
    <script src="js/main.js"></script> --}}



    
    <script src="{{asset('allUsers/frontend/plugins/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('allUsers/frontend/plugins/popper.min.js')}}"></script>
    <script src="{{asset('allUsers/frontend/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('allUsers/frontend/plugins/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('allUsers/frontend/plugins/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('allUsers/frontend/plugins/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('allUsers/frontend/plugins/jquery.matchHeight-min.js')}}"></script>
    <script src="{{asset('allUsers/frontend/plugins/slick/slick/slick.min.js')}}"></script>
    <script src="{{asset('allUsers/frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('allUsers/frontend/plugins/slick-animation.min.js')}}"></script>
    <script src="{{ asset('allUsers/sweet-alert.js') }}"></script>
    <script src="{{asset('allUsers/frontend/plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
    <!-- <script src="{{asset('allUsers/frontend/plugins/sticky-sidebar/dist/sticky-sidebar.min.js')}}"></script> -->
    <script src="{{asset('allUsers/frontend/plugins/select2/dist/js/select2.full.min.js')}}"></script>



    <!-- <script src="{{asset('allUsers/frontend/plugins/gmap3.min.js')}}"></script> -->
    <!-- custom scripts-->
    <script src="{{asset('allUsers/frontend/js/main.js')}}"></script>
    <script src="{{asset('allUsers/customer/js/my-scripts.js')}}"></script>
    <script src="{{asset('allUsers/customer/customer.js')}}" type="module"></script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/video/lg-video.min.js"></script>




<script>
document.addEventListener('DOMContentLoaded', function () {
    const el = document.getElementById('lightgallery');
    if (el) {
        lightGallery(el, {
            selector: 'a',
            plugins: [lgVideo], // include the thumbnail plugin
            thumbnail: true,
            animateThumb: true,
            showThumbByDefault: true,
            speed: 500
        });
    }
});
</script>
</body>

</html>