<!--Mobile Menu-->
<div class="mobile-nav-wrapper" role="navigation">
    <div class="closemobileMenu"><i class="icon an an-times-l pull-left"></i> &nbsp;</div>
    <ul id="MobileNav" class="mobile-nav">

        @foreach (navbarCategories() as $category)
            <li class="lvl1 parent megamenu" style="display:none"><a
                    href="{{ route('customer.product-category', $category->category_slug) }}">{{ $category->category_name }}
                    <i class="an an-angle-down-l"></i></a>


                @if ($category->children !== null)
                    <ul>
                        <li><a href="{{ route('customer.product-category', $category->category_slug) }}"
                                class="site-nav">{{ $category->category_name }}<i class="an an-plus-l"></i></a>
                            <ul class="dropdown">
                                @foreach ($category->children as $children)
                                    <li class="lvl-2">
                                        <a href="{{ route('customer.product-category', $children->category_slug) }}"
                                            class="site-nav lvl-2">{{ $children->category_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>



                    {{-- 
                    <div class="megamenu style2">
                        <div class="row">
                            @foreach ($category->children as $children)
                                <div class="lvl-1 col-md-3 col-lg-3">
                                    <a href="{{ route('customer.product-category', $children->category_slug) }}"
                                        class="site-nav lvl-1 menu-title">{{ $children->category_name }}</a>
                                    @if ($children->children !== null)
                                        <ul class="subLinks">
                                            @foreach ($children->children as $key => $subChildren)
                                                @if ($key <= 11)
                                                    <li class="lvl-2"><a
                                                            href="{{ route('customer.product-category', $subChildren->category_slug) }}"
                                                            class="site-nav lvl-2">{{ $subChildren->category_name }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                            <div class="lvl-1 col-md-3 col-lg-3 p-0">
                                <a href="javascript:;"><img
                                        src="{{ isset($category->icon) ? asset('copro/public/uploads/category') . '/' . $category->icon : asset('allUsers/customer/images/megamenu/megamenu-banner3.jpg') }}"
                                        alt="{{ $category->category_name }}" /></a>
                            </div>
                        </div>
                    </div> --}}
                @endif
            </li>
        @endforeach
<span style="display:none">

<li class="lvl1 parent megamenu">
            <a href="">NEW IN <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">BY CATEGORY <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a href="#" class="site-nav lvl-2">Bags</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Bottles & Sippers</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Dresses</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Nightsuits</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Tops and T-Shirts</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">BY BRAND <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a href="#" class="site-nav lvl-2">Kiddorma</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Kiddreams</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Lil Planet</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">IO</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Sunnylife</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Sluban</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>

<li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/designers">BRANDS <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">INDIAN BRANDS <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a href="#" class="site-nav lvl-2">Alyaansh Couture</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Payal Singhal</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Rohit Bal</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">RR Blue</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Samant Chauhan</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">INTERNATIONAL BRANDS <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a href="#" class="site-nav lvl-2">Babiators</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Beau Kid</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Pamina</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Skip Hop</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Step2</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">BESTSELLING <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Fayon Kids</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Hoitymoppet</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">P & S Co</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Partykles</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Tiber Taber</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Tiny Tales</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>
        
        
        <li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/girls">GIRLS <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">CLOTHING <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Dresses</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Inner Wear</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Jackets</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Jumpsuits</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Kurta Sets</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Lehengas</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Nightwear</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Onesies & Rompers</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Shirts</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Sweatshirt</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Swimwear</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Tops and T-Shirts</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Tracksuits</a></li>
                                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">ACCESSORIES <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a href="#" class="site-nav lvl-2">Caps</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Footwear</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Hair Accessories</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Jewelry</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Socks & Stockings</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Sunglasses</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Bags</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">BY AGE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a href="#" class="site-nav lvl-2">0-3 M</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">3-6 M</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">6-9 M</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">9-12 M</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">12-24 M</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">2-3 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">3-4 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">4-5 Y</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">5-6 Y</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">6-7 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">7-8 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">8-9 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">9-10 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">10-11 Y</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">11-12 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">12-13 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">13-14 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">14-15 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">15-16 Y</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>
        
          <li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/boys">BOYS <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">CLOTHING <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Inner Wear</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Kurta Sets</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Kurtas</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Nightwear</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Onesies & Rompers</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">Shirts</a></li>
                                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Suits & Jackets</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">Sweatshirts</a></li>
                                   <li class="lvl-2"><a href="#" class="site-nav lvl-2">Swimwear</a></li>
        <li class="lvl-2"><a href="#" class="site-nav lvl-2">Tracksuits</a></li>
        <li class="lvl-2"><a href="#" class="site-nav lvl-2">T-Shirts</a></li>
        <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">ACCESSORIES <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Caps</a></li>
           <li class="lvl-2"><a href="#" class="site-nav lvl-2">Footwear</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">Sunglasses</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">Bags</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">BY AGE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a href="#" class="site-nav lvl-2">0-3 M</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">3-6 M</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">6-9 M</a></li>
           <li class="lvl-2"><a href="#" class="site-nav lvl-2">9-12 M</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">12-24 M</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">2-3 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">3-4 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">4-5 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">5-6 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">6-7 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">7-8 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">8-9 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">9-10 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">10-11 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">11-12 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">12-13 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">13-14 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">14-15 Y</a></li>
           <li class="lvl-2"><a href="#" class="site-nav lvl-2">15-16 Y</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>
         <li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/lifestyle">LIFESTYLE <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">BY CATEGORY <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Mealtime</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Travel & Gear</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Nursery</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Oral Hygeine</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Diapering</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">BY AGE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">0-3 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">3-6 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">6-9 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">9-12 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">12-24 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        
         <li class="lvl1 parent megamenu">
            <a href="">TOYS <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">BY CATEGORY <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a href="#" class="site-nav lvl-2">Outdoor</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Indoor</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">DIY Kits</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Educational Toys</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">BY AGE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">0-3 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">3-6 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">6-9 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">9-12 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">12-24 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">2-3 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">3-4 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">4-5 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">5-6 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">6-7 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">7-8 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">8-9 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">9-10 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">10-11 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">11-12 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">12-13 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">13-14 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">14-15 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">15-16 Y</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="javascript:;" class="site-nav">BY PRICE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 999/-</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 1999/-</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 2999/-</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        
         <li class="lvl1 parent megamenu">
            <a href="">GIFTING <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">BY CATEGORY <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Dresses</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Nightsuits</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Onesies & Rompers</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Shirts</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Sweatshirt</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Tops & T-Shirts</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Toys</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Combos</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">BY PRICE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 299/-</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 499/-</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 699/-</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 899/-</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 999/-</a></li>
            <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>
        <li class="lvl1 parent megamenu">
            <a href="">RETURN FAVOURS <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">BY CATEGORY <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a href="#" class="site-nav lvl-2">Birthday</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Baby Shower</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Character Store</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Personalised</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Gift Sets</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">BY AGE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">0-3 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">3-6 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">6-9 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">9-12 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">12-24 M</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">BY PRICE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 999/-</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 1999/-</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Below 2999/-</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
            </ul>
        </li>
         <li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/personalised">PERSONALISED <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">CLOTHING <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Dresses</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Nightsuits</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Onesies & Rompers</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Shirts</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Sweatshirt</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Tops & T-Shirts</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">ACCESSORIES <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a href="#" class="site-nav lvl-2">Badges</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Bags</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Caps</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Footwear</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Jewelry</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Rakhi</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">LIFESTYLE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Aprons</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Bedding & Décor</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Bottles And Sippers</a></li>
                                <li class="lvl-2"><a href="#" class="site-nav lvl-2">Diaper Bags</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Gift Set</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Key Chains</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Luggage Tags</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Stationery</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">Towels</a></li>
    <li class="lvl-2"><a href="#" class="site-nav lvl-2">VIEW ALL</a></li>
                    </ul>
                </li>
            </ul>
        </li>

</span>

<li class="lvl1 parent megamenu">
            <a href="">NEW IN <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">NEW COLLECTION <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/anthrilo">Anthrilo</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/beau-kid">Beau Kid</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/bibbity-bobbity">Bibbity Bobbity</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/boteh">Boteh</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/choko">Choko</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="">Cute Couture</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/darleen-kids-couture">Darleen Kids Couture</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/fayon-kids">Fayon Kids</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/greendeer">Greendeer</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/hoitymoppet">Hoitymoppet</a></li>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">NEW DESIGNER <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                         <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/kiddorma">Kiddorma</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/lil-angels">Lil Angels</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/little-boys-closet">Little Boys Closet</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/little-surprise-box">Little Surprise Box</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/littleens">Littleens</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/miss-nakhrebaaz">Miss Nakhrebaaz</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/momkidsfashion">Momkidsfashion</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/one-friday">One Friday</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/p-s-co">P & S Co</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/pamina">Pamina</a></li>
                       
                    </ul>
                </li>
                
                 <li>
                    <a href="javascript:;" class="site-nav">BY GENDER <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                          <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/baby">Baby</a></li>
                                    <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl">Girl</a></li>
                                    <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy">Boy</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="javascript:;" class="site-nav">BY AGE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=27&sizes[]=28&sizes[]=29&sizes[]=71&categorySlug=new-in&sortType=">0-12 Months</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=30&sizes[]=31&sizes[]=32&categorySlug=new-in&sortType=">2-4 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=33&sizes[]=34&categorySlug=new-in&sortType=">4-6 Years</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=35&sizes[]=36&categorySlug=new-in&sortType=">6-8 Years</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=37&sizes[]=38&categorySlug=new-in&sortType=">8-10 Years</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=39&sizes[]=40&categorySlug=new-in&sortType=">10-12 Years</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=41&sizes[]=42&sizes[]=43&categorySlug=new-in&sortType=">12-14 Years</a></li>

                    </ul>
                </li>
            </ul>
        </li>

<li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/designers">BRANDS <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">TRENDING BRANDS <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/partykles">Partykles</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/pnk-isha-arora">PNK Isha Arora</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/the-little-celebs">The Little Celebs</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/tiber-taber">Tiber Taber</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/tiny-colour">Tiny Colour</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/tiny-tales">Tiny Tales</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/unitod">UNITOD</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/vived-kids">VIVEDKIDS</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/momkidsfashion">Momkidsfashion</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="">One Friday</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">INDIAN BRANDS <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/fayon-kids">Fayon Kids</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/greendeer">Greendeer</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/hoitymoppet">Hoitymoppet</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/kiddorma">Kiddorma</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/lil-angels">Lil Angels</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/little-boys-closet">Little Boys Closet</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/little-surprise-box">Little Surprise Box</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/littleens">Littleens</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/miss-nakhrebaaz">Miss Nakhrebaaz</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/jazz-my-home">Jazz My Home</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">INTERNATIONAL BRAND <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/beau-kid">Beau Kid</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/babiators">Babiators</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/cute-cute">Cute Cute</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/fabric-flavours">Fabric Flavours</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/minibanda">MINIBANDA</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/sienna-likes-to-party">Sienna Likes To Party</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/peanuts">PEANUTS</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="">Jordan</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/mintini">Mintini</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="">Mothercare</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>
        
        
        <li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/girls">GIRLS <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">Clothing <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                                     <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-anarkalis">Anarkalis</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-capes">Capes</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-co-ord-sets">Co-ord Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-coats-jackets">Coats & Jackets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-dhoti-sets">Dhoti Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-dresses">Dresses</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-gharara-sets">Gharara Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-gowns">Gowns</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-hoodies">Hoodies</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-innerwear">Innerwear</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-jumpsuits">Jumpsuits</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-kaftans">Kaftans</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-kurta-sets">Kurta Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-leggings-joggers">Leggings & Joggers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-lehenga-sets">Lehenga Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-nightsuits">Nightsuits</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-pallazzo-stes">Pallazzo Stes</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-pants">Pants</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-sarees">Sarees</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-sharara-sets">Sharara Sets</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-shirts">Shirts</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-shorts">Shorts</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-skirts">Skirts</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-sweatshirts">Sweatshirts</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-swimwears">Swimwears</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-tops-t-shirts">Tops & T-shirts</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-clothing-tracksuits">Tracksuits</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">Accessories <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-bags">Bags</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-bangles-bracelets">Bangles & Bracelets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-caps">Caps</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-clips">Clips</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-crown">Crown</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-eye-masks">Eye Masks</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-facemasks">Facemasks</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-footwears">Footwears</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-hairties">Hairties</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-potlis">Potlis</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-raincoats">Raincoats</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-rings">Rings</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-scarves">Scarves</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-socks-tights">Socks & Tights</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/girl-accessories-sunglasses">Sunglasses</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">Jewellery <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-earrings">Earrings</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-hairbands">Hairbands</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/jewellery-mathapatti">Mathapatti</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-necklaces">Necklaces</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-pendant">Pendants</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/jewellery-teekas">Teekas</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">Ages <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=27&sizes[]=28&sizes[]=29&sizes[]=71&sizes[]=30&categorySlug=girl&sortType=">0-12 Months</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=31&sizes[]=32&categorySlug=girl&sortType=">2-4 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=33&categorySlug=girl&sortType=">4-6 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=35&sizes[]=36&categorySlug=girl&sortType=">6-8 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=37&sizes[]=38&categorySlug=girl&sortType=">8-10 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=39&sizes[]=40&categorySlug=girl&sortType=">10-12 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=41&sizes[]=42&categorySlug=girl&sortType=">12-14 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=43&sizes[]=44&categorySlug=girl&sortType=">14-16 Years</a></li>
                    
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">Featured Brands <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/boteh">Boteh</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/darleen-kids-couture">Darleen Kids Couture</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/fayon-kids">Fayon Kids</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/tiny-tales">Tiny Tales</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/choko">Choko</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/vived-kids">VIVEDKIDS</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/tiber-taber">Tiber taber</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/pnk-isha-arora">PNK Isha Arora</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>
        
          <li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/boys">BOYS <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">Clothing <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                                   <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-achkan-sets">Achkan Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-bandhgala">Bandhgala</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-bandi-sets">Bandi Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-blazer">Blazer</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-co-ord-sets">Co-ord Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-coats">Coats</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-dhoti-sets">Dhoti Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-hoodies">Hoodies</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-inner-wear">Inner Wear</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-jodhupuri-sets">Jodhupuri Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-jumpsuits">Jumpsuits</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-kurta-pyjama">Kurta Pyjama</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-leggings-joggers">Leggings & Joggers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-nightsuits">Nightsuits</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-pants">Pants</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-sherwani">Sherwani</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-shirts">Shirts</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-shorts">Shorts</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-suits-jackets">Suits & Jackets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-suspender-sets">Suspender Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-sweatshirts">Sweatshirts</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-swimwears">Swimwears</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-t-shirts">T-shirts</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-tracksuits">Tracksuits</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-clothing-waist-coats">Waist Coats</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">Accessories <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-cufflinks">Cufflinks</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-shoes">Shoes</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-facemasks">Facemasks</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-tie">Tie</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-slippers">Slippers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-caps">Caps</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-raincoats">Raincoats</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-socks">Socks</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-sunglasses">Sunglasses</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-bags">Bags</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-brooches">Brooches</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/boy-accessories-buttons">Buttons</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">Ages <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=27&sizes[]=28&sizes[]=29&sizes[]=71&categorySlug=boy&sortType=">0-12 Months</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=30&sizes[]=72&sizes[]=31&sizes[]=32&categorySlug=boy&sortType=">2-4 Years</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=33&sizes[]=34&categorySlug=boy&sortType=">4-6 Years</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=35&sizes[]=36&categorySlug=boy&sortType=">6-8 Years</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=37&sizes[]=38&categorySlug=boy&sortType=">8-10 Years</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=39&sizes[]=40&categorySlug=boy&sortType=">10-12 Years</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=41&sizes[]=42&categorySlug=boy&sortType=">12-14 Years</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=43&sizes[]=44&categorySlug=boy&sortType=">14-16 Years</a></li>
                   
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">Featured Brands <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/little-boys-closet">Little Boys Closet</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/partykles">Partykles</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/fayon-kids">Fayon Kids</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/vived-kids">VIVEDKIDS</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/tiber-taber">Tiber Taber</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        
        
         <li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/girl-accessories">ACCESSORIES <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">SHOP <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-earrings">Earrings</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-necklaces">Necklaces</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-hairties">Hairties</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-potlis">Potlis</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-scarves">Scarves</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-pendant">Pendant</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-clips">Clips</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-hairbands">Hairbands</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-socks-tights">Socks & Tights</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-bags">Bags</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-crown">Crown</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-raincoats">Raincoats</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-bow-ties">Bow Ties</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-caps">Caps</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-pouches">Pouches</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-sunglasses">Sunglasses</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-facemask">Facemask</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-footwears">Footwears</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-bangles-bracelets">Bangles & Bracelets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-rakhi">Rakhi</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-cufflinks">Cufflinks</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-brooches">Brooches</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-buttons">Buttons</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-nazariya">Nazariya</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-comb">Comb</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-vest">Vest</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-swimming-accessories">Swimming Accessories</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-googles">Googles</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-key-chains">Key Chains</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/accessories-float-float-bands">Float Bands</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="javascript:;" class="site-nav">FEATURED BRANDS <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                    <li class="lvl-2"><a class="site-nav lvl-2"  href="https://littletags.webkype.co/designer/choko">Choko</a></li>
<li class="lvl-2"><a class="site-nav lvl-2"  href="https://littletags.webkype.co/designer/just-shradhas">Just Shraddhas</a></li>
<li class="lvl-2"><a class="site-nav lvl-2"  href="https://littletags.webkype.co/designer/cciki">Cciki</a></li>
<li class="lvl-2"><a class="site-nav lvl-2"  href="https://littletags.webkype.co/designer/gemstella">Gemstella</a></li>
<li class="lvl-2"><a class="site-nav lvl-2"  href="https://littletags.webkype.co/designer/hair-drama-co">Hair Drama Co.</a></li>
<li class="lvl-2"><a class="site-nav lvl-2"  href="https://littletags.webkype.co/designer/diamondtine">Diamondtine</a></li>
<li class="lvl-2"><a class="site-nav lvl-2"  href="https://littletags.webkype.co/designer/lil-ballerina-jewels">Lil Ballerina Jewels</a></li>
<li class="lvl-2"><a class="site-nav lvl-2"  href="https://littletags.webkype.co/designer/cute-cute">Cute Cute</a></li>
<li class="lvl-2"><a class="site-nav lvl-2"  href="">Saphhire Sorbet</a></li>
                    </ul>
                </li>
                
                
                
            </ul>
        </li>
        
         <li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/lifestyle">LIFESTYLE <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">Home & Living <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-calenders">Calenders</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-bloster">Bloster</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-teepee-set">Teepee Set</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-canopy">Canopy</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-photo-frames">Photo Frames</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-umbrellas">Umbrellas</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-bunting">Bunting</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-wallpaper">Wallpaper</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-furnitures">Furnitures</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-dohar">Dohar</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-shelves">Shleves</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-lamps">Lamps</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-brush-holder">Brush Holder</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-organizer-box">Organizer Box</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-blankets-quilts">Blankets & Quilts</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-pillow-cushions">Pillow & Cushions</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-mats">Mats</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-stockings">Stockings</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-home-living-storage-bags">Storage Bags</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">Travel & Gear <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-travel-gear-carrycot">Carrycot</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-travel-gear-luggage-tags">Luggage Tags</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-travel-gear-car-seat">Car Seat</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-travel-gear-carrier">Carrier</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-travel-gear-mosquito-net">Mosquito Net</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-travel-gear-highchair">Highchair</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-travel-gear-travel-cot">Travel Cot</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-travel-gear-luggage">Luggage</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-travel-gear-cup-holder">Cup Holder</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-travel-gear-stroller">Stroller</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="javascript:;" class="site-nav">Nursery <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-bumper">Bumper</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-beds">Beds</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-changing-station">Changing Station</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-potty-trainer">Potty Trainer</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-playgym">Playgym</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-walker">Walker</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-sleep-trainers">Sleep Trainers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-baby-nest">Baby Nest</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-bedding-quilts">Bedding & Quilts</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-burp-cloth">Burp Cloth</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-nursery-swaddle-wrappers">Swaddle & Wrappers</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:;" class="site-nav">Kitchen & Dining <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-kitchen-dining-coasters">Coasters</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-kitchen-dining-aprons">Aprons</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-kitchen-dining-tea-set">Tea Set</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-kitchen-dining-containers">Containers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-kitchen-dining-mugs">Mugs</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-kitchen-dining-cups">Cups</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-kitchen-dining-plate-sets">Plate Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-kitchen-dining-bowls">Bowls</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="javascript:;" class="site-nav">DECOR <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                    <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-decor-christmas-tree">Christmas Tree</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-decor-garland">Garland</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-decor-ornaments">Ornaments</a></li>
                    </ul>
                </li>
                  <li>
                    <a href="javascript:;" class="site-nav">Diapering <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                    <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-diapering-diaper-bags">Diaper Bags</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-diapering-wipes">Wipes</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-diapering-diaper-creams">Diaper Creams</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-diapering-diapers">Diapers</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:;" class="site-nav">Mealtime <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                   <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-mealtime-lunch-bags">Lunch Bags</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-mealtime-lunch-box">Lunch Box</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-mealtime-water-bottles">Water Bottles</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-mealtime-bibs-set">Bibs Set</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-mealtime-spoon-sets">Spoon Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-mealtime-straws">Straws</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-mealtime-food-jars">Food Jars</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="javascript:;" class="site-nav">Hygiene & Care <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                   <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-hygiene-care-oral-care">Oral Care</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/hygiene-care-oral-care-wipes">Wipes</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-hygiene-care-cleansers-detergents">Cleansers & Detergents</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/hygiene-care-cleansers-detergents-dishwashing-liquid">Dishwashing Liquid</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/hygiene-care-cleansers-detergents-laundry-detegents">Laundry Detegents</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/hygiene-care-cleansers-detergents-surface-cleaners">Surface Cleaners</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-hygiene-care-health-safety-essentials">Health & Safety Essentials</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/hygiene-care-health-safety-essentials-mosquito-repellant">Mosquito Repellant</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/hygiene-care-health-safety-essentials-hand-wash">Hand Wash</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-hygiene-care-medical-care">Medical Care</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/hygiene-care-medical-care-chest-rub">Chest Rub</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="javascript:;" class="site-nav">Stationary <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-chart-posters">Chart & Posters</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-books">Books</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-pen-pencils">Pen & Pencils</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-crayons-markers">Crayons & Markers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-pouches-cases">Pouches & Cases</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-stickers">Stickers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-diy-kits">DIY Kits</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-bags">Bags</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-brushes">Brushes</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-chalks">Chalks</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-compass-protractor">Compass & Protractor</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-diaries">Diaries</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-rulers">Rulers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-erasers">Erasers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-glue-stick">Glue Stick</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-stapelers">Stapelers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-stationary-notebooks">Notebooks</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="javascript:;" class="site-nav">Featured Brands <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/jazz-my-home">Jazz My Home</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/angie-homes">Angie Homes</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/pasito-a-pasito">Pasito A Pasito</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/krysaliis">Krysallis</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/janavi-baby">Janavi Baby</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/baby-forest">Baby Forest</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">Bath & Skincare <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-skincare-shampoos">Shampoos</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-skincare-grooming-essentials">Grooming Essentials</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-skincare-bathing-accessories">Bathing Accessories</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-skincare-bath-toys">Bath Toys</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-skincare-bath-towels-robes">Bath Towels & Robes</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-bath-skincare-oils">Oils</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-bath-skincare-soaps">Soaps</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-bath-skincare-kajals">Kajals</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-bath-skincare-mists">Mists</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-skincare-moisturizers">Moisturizers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-skincare-body-wash">Body Wash</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-skincare-lotions">Lotions</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-skincare-creams">Creams</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-skincare-balm">Balm</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-bath-skincare-bath-rinser">Bath Rinser</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-bath-skincare-bath-tub">Bath Tub</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/lifestyle-bath-skincare-bath-tub">Soap Dispenser</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>
        
         <li class="lvl1 parent megamenu"><a href="https://littletags.webkype.co/toys">TOYS </a>  </li>
        <li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/gifting">GIFTING <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">CLOTHING <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-clothing-romper-sets">Romper Sets</a></li>
    <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-clothing-co-ord-sets">Co-ord Sets</a></li>
    <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-clothing-combo-sets">Combo Sets</a></li>
    <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-clothing-nightsuits">Nightsuits</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">LIFESTYLE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                    <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-lifestyle-bath">Bath</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-lifestyle-skincare">Skincare</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-lifestyle-bedding-sets">Bedding Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-lifestyle-toys">Toys</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-lifestyle-stationary">Stationary</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-lifestyle-kitchen-dining">Kitchen & Dining</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-lifestyle-mealtime">Mealtime</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-lifestyle-home-living">Home & Living</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">ACCESSORIES <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                    <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-goodie-bags">Goodie Bags</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-gift-pouch">Gift Pouch</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-hamper">Hamper</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-hanging">Hanging</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-booties-set">Booties Set</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-rakhi">Rakhi</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-ties-set">Ties Set</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-facemasks-set">Facemasks Set</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-apron-sets">Apron Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-vanity-kit-sets">Vanity Kit Sets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-bangles-bracelets">Bangles & Bracelets</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-bookmark">Bookmark</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/gifting-accessories-piggy-bank">Piggy Bank</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="javascript:;" class="site-nav">BY PRICE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                         
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=280&categorySlug=gifting&page=3
">BY 299</a></li>
                                          
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=517&categorySlug=gifting&sortType=
">BY 499</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=804&categorySlug=gifting&sortType=
">BY 699</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=975&categorySlug=gifting&sortType=
">BY 899</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=1126&categorySlug=gifting&sortType=
">BY 999</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=2143&categorySlug=gifting&sortType=
">BY 1999</a></li>
                  
                    </ul>
                </li>
                
                
            </ul>
        </li>
        
         <li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/personalised">PERSONALISED <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">CLOTHING <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-clothing-nightsuits">Nightsuits</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-clothing-co-ord-set">Co-ord Set</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-clothing-rompers">Rompers</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-clothing-t-shirts">T-shirts</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-clothing-sweatshirts">Sweatshirts</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-clothing-short-sets">Short Sets</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">LIFESTYLE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                    <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-lifestyle-bath">Bath</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-lifestyle-travel-gear">Travel & Gear</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-lifestyle-nursery">Nursery</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-lifestyle-kitchen-dining">Kitchen & Dining</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-lifestyle-mealtime">Mealtime</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-lifestyle-stationary">Stationary</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-lifestyle-home-living">Home & Living</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-lifestyle-decor">Decor</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">ACCESSORIES <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-accessories-caps">Caps</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-accessories-key-chains">Key Chains</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-accessories-goodie-bags">Goodie Bags</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-accessories-rakhi">Rakhi</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-accessories-clips">Clips</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-accessories-sunglasses">Sunglasses</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-accessories-bags">Bags</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-accessories-batches">Batches</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-accessories-facemasks">Facemask</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/personalised-accessories-slippers">Slippers</a></li>
                    </ul>
                </li>
                
                
                 <li>
                    <a href="javascript:;" class="site-nav">FEATURED BRANDS <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                
               <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/tiny-tales">Tiny Tales</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="">Little West Street</a></li>
  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/stylish-returns">Stylish Returns</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/wish-a-print">Wish A Print</a></li>
  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/your-little-mess">Your Little Mess</a></li>
  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/krysaliis">Krysallis</a></li>
  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/rock-your-baby">Rock Your Baby</a></li>
  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/lil-ballerina-jewels">Lil Ballerina Jewels</a></li>
  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/miracles-happen">Miracles Happen</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/hangonfashion">Hangonfashion</a></li>
 
  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/fluffalump">Flufflump</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/jazz-my-home">Jazz My Home</a></li>
  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/stitch-a-wish">Stitch A Wish</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/baby-bed-story">Baby Bed Story</a></li>
  <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/little-surprise-box">Little Surprise Box</a></li>
                  </ul>
                </li>
            </ul>
        </li>
        
         

<li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/return-favours">RETURN FAVOURS <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">Toys & Tech <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                         <li class="lvl-2"><a class="site-nav lvl-2" href="#">Soft Toys</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Educational Toys</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Teething</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Watches</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Bluetooths</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">Skincare <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a class="site-nav lvl-2" href="#">Lotion</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Balm</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Soap</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Body Wash</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Oil</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">Themes <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a class="site-nav lvl-2" href="#">Birthday</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Mickey Mouse</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Barbie</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Spongebob</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Baby Shower</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">Accessories <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a class="site-nav lvl-2" href="#">Bracelets</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Earrings</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Necklace</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Rings</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">Combos </a>
                </li>
                 <li>
                    <a href="javascript:;" class="site-nav">Stationary <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a class="site-nav lvl-2" href="#">Bags</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Bottles</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Lunchbox</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">DIY Kits</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">Decor <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a class="site-nav lvl-2" href="#">Photo Frames</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Playmats</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="#">Stocking</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">Brands <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/advait-living">Advait Living</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/aplito">Aplito</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/bbox">B.box</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/baby-bed-story">Baby Bed Story</a></li>
                                <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/baby-forest">Baby Forest</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/baby-jalebi">Baby Jalebi</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Baby Moo</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/bling-orn">Bling Orn</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Boon</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Cetaphill</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/diamondtine">Diamondtine</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/gempetit">Gempetit</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">GULCO</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/ilearngrow">Ilearngrow</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/jazz-my-home">Jazz My Home</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/jazz-my-home">Kaypac</a></li>

<li class="lvl-2"><a class="site-nav lvl-2" href="#">Kidkraft</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/krysaliis">Krysallis</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/kstory">Kstory</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Little Canvas</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Little Jamun</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Little Rawr</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/little-boys-closet">Little Surprise Box</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">MommyPure</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">MONC</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/house-this">House This</a></li>

       <li class="lvl-2"><a class="site-nav lvl-2" href="#">Ok Play</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Oli & Carol</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/pasito-a-pasito">Pasito A Pasito</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Peekaboo Patterns</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Peppley</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Planet of Toys</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Playzu</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Potronics</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">RAD Living</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/scoobies">Scoobies</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">Sekyo</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">SENSlife</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>


<li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/sale">SALE <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">BRANDS <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                       <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/anthrilo">Anthrilo</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/greendeer">Greendeer</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/kaypac">Kaypac</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/unitod">UNITOD</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">DISCOUNTS <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                     <li class="lvl-2"><a class="site-nav lvl-2" href="#">35%</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="#">20%</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="#">15%</a></li>
 <li class="lvl-2"><a class="site-nav lvl-2" href="#">63%</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>

<li class="lvl1 parent megamenu">
            <a href="https://littletags.webkype.co/ready-to-ship">READY TO SHIP <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">BRANDS <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                      <li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/minibanda">Minibanda</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/sarabanda">Sarabanda</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/billy-loves-audrey">Billy Loves Audrey</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/cute-cute">Cute Cute</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/the-tiny-universe">The Tiny Universe</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/beau-kid">Beau Kid</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/babiators">Babiators</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/doodle-pants">Doodle Pants</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/ebru-danyal">Ebru Danyal</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/fabric-flavours">Fabric Flavours </a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/ido">iDO</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/mintini">Mintini</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/pamina">Pamina</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/peanuts">Peanuts</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/sienna-likes-to-party">Sienna Likes To Party</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="https://littletags.webkype.co/designer/peppa-pig">Peppa Pig</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">BY AGE <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                    <li class="lvl-2"><a class="site-nav lvl-2" href="#">0-12 Months</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">2-4 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">4-6 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">6-8 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">8-10 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">10-12 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">12-14 Years</a></li>
<li class="lvl-2"><a class="site-nav lvl-2" href="#">14-16 Years</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>
        
        
        
        
        
        
        
        

        {{-- <li class="lvl1 parent megamenu">
      <a href="javascript:;">New In <i class="an an-plus-l"></i></a>
      <ul>
        <li class=""><a href="{{ route('customer.search-products', ['type' => 'new-collections']) }}"
            class="site-nav ">New
            collections</a> </li>
        <li class=""><a href="{{ route('customer.designers', 'new-this-week') }}" class="site-nav ">New this
            week</a> </li>
        <li><a href="{{ route('customer.designers', 'new-in-designers') }}" class="site-nav">New designers</a></li>
      </ul>
    </li> --}}

        {{-- <li class="lvl1 parent megamenu">
            <a href="javascript:;">New In <i class="an an-plus-l"></i></a>
            <ul>
                <li><a href="javascript:;" class="site-nav">New Collections <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        @foreach (navbarMenu('New Collections') as $menu)
                            <li class="lvl-2">
                                <a href="{{ $menu->url }}" class="site-nav lvl-2">{{ $menu->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="javascript:;" class="site-nav">New Designers <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        @foreach (navbarMenu('New Designers') as $menu)
                            <li class="lvl-2">
                                <a href="{{ $menu->url }}" class="site-nav lvl-2">{{ $menu->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </li>
        
        <li class="lvl1 parent megamenu">
            <a href="https://fashioneditindia.com/weddings">Wedding <i class="an an-plus-l"></i></a>
            <ul>
                <li><a href="https://fashioneditindia.com/wedding-bachelorette" class="site-nav">Bachelorette</a></li>
                <li><a href="https://fashioneditindia.com/wedding-engagement" class="site-nav">Engagement</a></li>
                <li><a href="https://fashioneditindia.com/wedding-pre-festive" class="site-nav">Pre Festivities</a></li>
                <li><a href="https://fashioneditindia.com/wedding-haldi" class="site-nav">Haldi</a></li>
                <li><a href="https://fashioneditindia.com/wedding-mehndi" class="site-nav">Mehndi</a></li>
                <li><a href="https://fashioneditindia.com/wedding-cocktail" class="site-nav">Cocktail </a></li>
                <li><a href="https://fashioneditindia.com/wedding-wedding" class="site-nav">Wedding</a></li>
                <li><a href="https://fashioneditindia.com/wedding-reception" class="site-nav">Reception</a></li>
                <li><a href="https://fashioneditindia.com/wedding-destination-wedding" class="site-nav">Destination Wedding</a>
                </li>
            </ul>
        </li>
        <li class="lvl1 parent megamenu">
            <a href="https://fashioneditindia.com/women">Women <i class="an an-plus-l"></i></a>
            <ul>
                <li>
                    <a href="javascript:;" class="site-nav">Clothing <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-anarkalis"
                                class="site-nav lvl-2">Anarkalis</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-blouses"
                                class="site-nav lvl-2">Blouses</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-capes"
                                class="site-nav lvl-2">Capes</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-co-ords"
                                class="site-nav lvl-2">Co-Ord
                                Sets</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-dupattas"
                                class="site-nav lvl-2">Dupattas</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-kaftans"
                                class="site-nav lvl-2">Kaftans</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-dhoti-sets"
                                class="site-nav lvl-2">Dhoti-Sets</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-dresses"
                                class="site-nav lvl-2">Dresses</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-gowns"
                                class="site-nav lvl-2">Gowns</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-jackets"
                                class="site-nav lvl-2">Jackets</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-jumpsuits"
                                class="site-nav lvl-2">Jumpsuits</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-kurta-sets"
                                class="site-nav lvl-2">Kurta
                                Sets</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/women-clothing-lehengas"
                                class="site-nav lvl-2">Lehengas</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-sarees"
                                class="site-nav lvl-2">Sarees</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-shararas"
                                class="site-nav lvl-2">Shararas</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-shirts"
                                class="site-nav lvl-2">Shirts</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-skirts"
                                class="site-nav lvl-2">Skirts</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/women-clothing-pant-suit"
                                class="site-nav lvl-2">Pant Suit</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-swimwear"
                                class="site-nav lvl-2">Swimwear</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-tops"
                                class="site-nav lvl-2">Tops</a>
                        </li>


                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="site-nav">Accessories <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a href="https://fashioneditindia.com/accessories-bags"
                                class="site-nav lvl-2">Bags</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/accessories-belts"
                                class="site-nav lvl-2">Belts</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/accessories-clutches"
                                class="site-nav lvl-2">Clutches</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/accessories-potlis"
                                class="site-nav lvl-2">Potlis</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/accessories-scarves-stoles"
                                class="site-nav lvl-2">Scarves & Stoles</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/women-accessories-vanity-box"
                                class="site-nav lvl-2">Vanity Box</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="site-nav">Footwear <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a href="https://fashioneditindia.com/women-accessories-flats"
                                class="site-nav lvl-2">Flats</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/accessories-heels"
                                class="site-nav lvl-2">Heels</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/accessories-juttis"
                                class="site-nav lvl-2">Juttis</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/accessories-kolhapuris"
                                class="site-nav lvl-2">Kolhapuris</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/women-accessories-wedges"
                                class="site-nav lvl-2">Wedges</a></li>
                    </ul>
                </li>

            </ul>
        </li>
        <li class="lvl1 parent megamenu">
            <a href="https://fashioneditindia.com/men">Men <i class="an an-plus-l"></i></a>
            <ul>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-bandhgalas"
                        class="site-nav">Bandhgalas</a></li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-bottoms"
                        class="site-nav">Bottoms</a>
                </li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-co-ord-sets"
                        class="site-nav">Co-ord
                        sets</a></li>

                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-jackets-blazers"
                        class="site-nav">Jackets & Blazers</a></li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-kurta-sets"
                        class="site-nav">Kurta
                        Sets</a></li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-kurtas"
                        class="site-nav">Kurtas</a>
                </li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-nehru-jackets"
                        class="site-nav">Nehru
                        Jackets</a></li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-pants"
                        class="site-nav">Pants</a></li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-suits"
                        class="site-nav">Suits</a></li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/accessories-footwear-shoes"
                        class="site-nav">Shoes</a></li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-sherwanis"
                        class="site-nav">Sherwanis</a></li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-shirts"
                        class="site-nav">Shirts</a>
                </li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-shorts"
                        class="site-nav">Shorts</a>
                </li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-t-shirts" class="site-nav">T
                        Shirts</a></li>
                <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-waist-coats"
                        class="site-nav">Waist
                        Coats</a></li>
            </ul>
        </li>
        <li class="lvl1 parent megamenu">
            <a href="https://fashioneditindia.com/kids">Kids <i class="an an-plus-l"></i></a>
            <ul>
                <li><a href="https://fashioneditindia.com/kids-girls" class="site-nav">Girls <i
                            class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-girls-capes"
                                class="site-nav lvl-2">Capes</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-girls-co-ords"
                                class="site-nav lvl-2">Co-ord Sets</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-girls-dresses"
                                class="site-nav lvl-2">Dresses</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-girls-gowns"
                                class="site-nav lvl-2">Gowns</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-girls-jumpsuits"
                                class="site-nav lvl-2">Jumpsuits</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-girls-kaftans"
                                class="site-nav lvl-2">Kaftans</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-girls-kurta"
                                class="site-nav lvl-2">Kurta</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-girls-sharara-sets"
                                class="site-nav lvl-2">Sharara Sets </a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-girls-t-shirts"
                                class="site-nav lvl-2">T-shirts</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-girls-tunics"
                                class="site-nav lvl-2">Tunics
                            </a></li>


                    </ul>
                </li>
                <li><a href="https://fashioneditindia.com/kids-boys" class="site-nav">Boys <i
                            class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-boys-achkan-sets"
                                class="site-nav lvl-2">Achkan sets</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-boys-bottoms"
                                class="site-nav lvl-2">Bottoms</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-boys-kurta-pyjamas"
                                class="site-nav lvl-2">Kurta Pyjamas</a></li>

                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-boys-shirts"
                                class="site-nav lvl-2">Shirts</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-boys-t-shirts"
                                class="site-nav lvl-2">T
                                Shirts </a></li>
                    </ul>
                </li>
                <li><a href="https://fashioneditindia.com/kids-accessories" class="site-nav">Accessories <i
                            class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a href="https://fashioneditindia.com/kids-accessories-hair-accessories"
                                class="site-nav lvl-2">Hair Accessories</a></li>
                    </ul>
                </li>

            </ul>
        </li>
        <li class="lvl1 parent megamenu">
            <a href="https://fashioneditindia.com/jewellery">Jewellery <i class="an an-plus-l"></i></a>
            <ul>
                <li><a href="https://fashioneditindia.com/jewellery-anklets" class="site-nav">Anklets</a></li>
                <li><a href="https://fashioneditindia.com/jewellery-bangles-bracelets" class="site-nav">Bangles</a>
                </li>
                <li><a href="https://fashioneditindia.com/jewellery-bangles-bracelets" class="site-nav">Bracelets</a>
                </li>
                <li><a href="https://fashioneditindia.com/jewellery-brooches" class="site-nav">Brooches</a></li>
                <li><a href="https://fashioneditindia.com/jewellery-earrings" class="site-nav">Earrings</a></li>
                <li><a href="https://fashioneditindia.com/jewellery-maang-tikas" class="site-nav">Maang-Tikkas</a>
                </li>
                <li><a href="https://fashioneditindia.com/jewellery-necklaces" class="site-nav">Necklaces</a></li>
                <li><a href="https://fashioneditindia.com/jewellery-rings" class="site-nav">Rings</a></li>
            </ul>
        </li>
        <li class="lvl1 parent megamenu">
            <a href="https://fashioneditindia.com/beauty">Beauty <i class="an an-plus-l"></i></a>
            <ul>
                <li><a href="https://fashioneditindia.com/kids-girls" class="site-nav">Face <i
                            class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-cleanser"
                                class="site-nav">Cleansers</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-face-gels"
                                class="site-nav">Face Gels</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-face-oils"
                                class="site-nav">Face Oils</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-face-masks"
                                class="site-nav">Face
                                Masks</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-face-wash"
                                class="site-nav">Face Wash</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-moisturizers"
                                class="site-nav">Moisturisers</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-face-serums"
                                class="site-nav">Serums</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-toner"
                                class="site-nav">Toners</a></li>


                    </ul>
                </li>
                <li><a href="#" class="site-nav">Body <i class="an an-plus-l"></i></a>
                    <ul class="dropdown">
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-body-oils"
                                class="site-nav">Body Oils</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-body-scrubs"
                                class="site-nav">Body
                                Scrubs</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-hair-conditioners"
                                class="site-nav">Hair
                                Conditioners</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-hair-masks"
                                class="site-nav">Hair
                                Masks</a></li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-hair-oils"
                                class="site-nav">Hair Oils</a>
                        </li>
                        <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-shampoo"
                                class="site-nav">Shampoos</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>
        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/home">Home & Gifting</a> </li>
        <li class="lvl1 parent megamenu">
            <a href="#">Occasion <i class="an an-plus-l"></i></a>
            <ul class="">
                <li><a href="https://fashioneditindia.com/products/search?search=Evenings"
                        class="site-nav">Evenings</a></li>
                <li><a href="https://fashioneditindia.com/products/search?search=Casuals" class="site-nav">Casuals</a>
                </li>
                <li><a href="https://fashioneditindia.com/products/search?search=Weddings"
                        class="site-nav">Weddings</a>
                <li><a href="https://fashioneditindia.com/products/search?search=Party Wear" class="site-nav">Party
                        Wear</a>
                <li><a href="https://fashioneditindia.com/products/search?search=Resort Wear" class="site-nav">Resort
                        Wear</a>
                <li><a href="https://fashioneditindia.com/products/search?search=Light Indians" class="site-nav">Light
                        Indians</a>
                <li><a href="https://fashioneditindia.com/eid-elegance?utm_source=Homepage&utm_medium=Curated_by_Experts&utm_campaign=Eid_Elegance"
                        class="site-nav">Eid Elegance</a>
                <li><a href="https://fashioneditindia.com/summer-festive?utm_source=Homepage&utm_medium=Curated_by_Experts&utm_campaign=Summer_Festive"
                        class="site-nav">Summer Festive</a>
                <li><a href="https://fashioneditindia.com/destination-weddingh?utm_source=Homepage&utm_medium=Curated_by_Experts&utm_campaign=Destination_Wedding"
                        class="site-nav">Destination Weddings</a>

                </li>
            </ul>
        </li>
        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/ready-to-ship">Ready to Ship</a> </li>
        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/sale">Sale</a> </li>
        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/fei-events">FEI Exhibitions</a> </li>
        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/fei-experts">Meet The Experts</a> </li>
 --}}

    </ul>
</div>
<!--End Mobile Menu-->
