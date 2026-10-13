<nav class="grid__item" id="AccessibleNav">
    <ul id="siteNav" class="site-nav medium center hidearrow">
        <li class="lvl1 parent megamenu"><a href="{{ route('customer.product-category', 'new-in') }}">NEW IN</a>
        </li>
        <li class="lvl1 parent megamenu"><a href="{{ route('customer.designers') }}">DESIGNERS</a>
        </li>
        @foreach (navbarCategories() as $category)
            <li class="lvl1 parent megamenu"><a
                    href="{{ route('customer.product-category', $category->category_slug) }}">{{ $category->category_name }}
                    <i class="an an-angle-down-l"></i></a>
                @if ($category->children !== null)
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
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</nav>


<nav @class([
    'grid__item',
    'd-none' => in_array(Request::segment(1), [
        'fei-events',
        'fei-event-details',
    ]),
]) id="AccessibleNav">
    <ul id="siteNav" class="site-nav medium center hidearrow">

        {{-- <li class="lvl1 parent dropdown">
      <a href="javascript:;">New in<i class="an an-angle-down-l"></i>
      </a>

      <ul class="dropdown">
        <li class=""><a href="{{ route('customer.search-products', ['type' => 'new-collections']) }}"
            class="site-nav ">New collections</a>
        </li>
        <li class=""><a href="{{ route('customer.designers', 'new-this-week') }}" class="site-nav ">New this
            week</a>
        </li>
        <li><a href="{{ route('customer.designers', 'new-in-designers') }}" class="site-nav">New designers</a></li>
      </ul>
    </li> --}}

        <li class="lvl1 parent megamenu"><a href="javascript:;">New In <i class="an an-angle-down-l"></i></a>
            <div class="megamenu style2">
                <div class="row">
                    <div class="lvl-1 col-md-3 col-lg-3"><a href="javascript:;" class="site-nav lvl-1 menu-title">New
                            Collections</a>
                        <ul class="subLinks">
                            @foreach (navbarMenu('New Collections') as $menu)
                                <li class="lvl-2">
                                    <a href="{{ $menu->url }}" class="site-nav lvl-2">{{ $menu->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3">
                        <a href="javascript:;" class="site-nav lvl-1 menu-title">New Designers</a>
                        <ul class="subLinks">
                            @foreach (navbarMenu('New Designers') as $menu)
                                <li class="lvl-2">
                                    <a href="{{ $menu->url }}" class="site-nav lvl-2">{{ $menu->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3 p-0">
                        <a href="#"><img
                                src="{{ asset('allUsers/customer/images/websitemayimages/NewIn-DropDown-1.JPG') }}"
                                alt="" /></a>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3 p-0">
                        <a href="#"><img
                                src="{{ asset('allUsers/customer/images/websitemayimages/NewIn-DropDown-2.JPG') }}"
                                alt="image" /></a>
                    </div>
                </div>
            </div>

        </li>


        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/designers">Designers <i
                    class="an an-angle-down-l"></i></a>

            <div class="megamenu style2">
                <div class="row">
                    <div class="lvl-1 col-md-3 col-lg-3">
                        <ul class="subLinks">
                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/amrich"
                                    class="site-nav lvl-2">Amrich</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/aseem-kapoor"
                                    class="site-nav lvl-2">Aseem Kapoor</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/balance-by-rohit-bal"
                                    class="site-nav lvl-2">Balance by Rohit Bal</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/bodice"
                                    class="site-nav lvl-2">Bodice</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/gulabo-by-abu-sandeep"
                                    class="site-nav lvl-2">Gulabo by Abu Sandeep</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/itrh"
                                    class="site-nav lvl-2">Itrh</a>
                            </li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/jayanti-reddy"
                                    class="site-nav lvl-2">Jayanti Reddy</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/outhouse-jewellery"
                                    class="site-nav lvl-2">Outhouse Jewellery</a></li>
                        </ul>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3">
                        <ul class="subLinks">

                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/pankaj-nidhi"
                                    class="site-nav lvl-2">Pankaj & Nidhi</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/paulmi-harsh"
                                    class="site-nav lvl-2">Paulmi & Harsh</a> </li>

                            <li class="lvl-2"><a
                                    href="https://fashioneditindia.com/designer/blue-by-raghevandra-rathore"
                                    class="site-nav lvl-2">Raghavendra Rathore Jodhpur</a></li>

                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/rajdeep-ranawat"
                                    class="site-nav lvl-2">Rajdeep Ranawat</a></li>



                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/sangeeta-boochra"
                                    class="site-nav lvl-2">Sangeeta Boochra</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/designer/shivan-narresh"
                                    class="site-nav lvl-2">Shivan & Narresh</a></li>

                            <li class="lvl-2"><a href="https://fashioneditindia.com/designers"
                                    class="site-nav lvl-2" style="color:#d0899c">View All</a></li>

                        </ul>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3 p-0">
                        <a href="#"><img
                                src="https://fashioneditindia.com/allUsers/customer/images/websitemayimages/Designers-DropDown-1.JPG"
                                alt="image" /></a>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3 p-0">
                        <a href="#"><img
                                src="https://fashioneditindia.com/allUsers/customer/images/websitemayimages/Designers-DropDown-2.JPG"
                                alt="image" /></a>
                    </div>
                </div>
            </div>
        </li>

        <li class="lvl1 parent dropdown"><a href="https://fashioneditindia.com/weddings">Wedding <i
                    class="an an-angle-down-l"></i></a>
            <ul class="dropdown">
                <li><a href="https://fashioneditindia.com/wedding-bachelorette" class="site-nav">Bachelorette</a></li>
                <li><a href="https://fashioneditindia.com/wedding-engagement" class="site-nav">Engagement</a></li>
                <li><a href="https://fashioneditindia.com/wedding-pre-festive" class="site-nav">Pre Festivities</a>
                </li>
                <li><a href="https://fashioneditindia.com/wedding-haldi" class="site-nav">Haldi</a></li>
                <li><a href="https://fashioneditindia.com/wedding-mehndi" class="site-nav">Mehndi</a></li>
                <li><a href="https://fashioneditindia.com/wedding-cocktail" class="site-nav">Cocktail </a></li>
                <li><a href="https://fashioneditindia.com/wedding-wedding" class="site-nav">Wedding</a></li>
                <li><a href="https://fashioneditindia.com/wedding-reception" class="site-nav">Reception</a></li>
                <li><a href="https://fashioneditindia.com/wedding-destination-wedding" class="site-nav">Destination
                        Wedding</a></li>

            </ul>
        </li>

        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/women">Women <i
                    class="an an-angle-down-l"></i></a>
            <div class="megamenu style2">
                <div class="row">
                    <div class="lvl-1 col-md-3 col-lg-2">
                        <a href="javascript:;" class="site-nav lvl-1 menu-title">Clothing</a>
                        <ul class="subLinks">
                            <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-anarkalis"
                                    class="site-nav lvl-2">Anarkalis</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-blouses"
                                    class="site-nav lvl-2">Blouses</a></li>

                            <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-capes"
                                    class="site-nav lvl-2">Capes</a>
                            </li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/clothing-co-ords"
                                    class="site-nav lvl-2">Co-Ord Sets</a></li>

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


                        </ul>
                    </div>

                    <div class="lvl-1 col-md-3 col-lg-2">
                        <ul class="subLinks">
                            <li class="lvl-2"><a href="#" class="site-nav lvl-2"></a></li>
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
                            {{-- <li class="lvl-2"><a href="https://fashioneditindia.com/women-clothing" class="site-nav lvl-2"
                  style="color:#d0899c">View All</a></li> --}}

                        </ul>
                    </div>

                    <div class="lvl-1 col-md-3 col-lg-2">

                        <a href="javascript:;" class="site-nav lvl-1 menu-title">Accessories</a>
                        <ul class="subLinks">
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
                            {{-- <li class="lvl-2"><a href="https://fashioneditindia.com/accessories" class="site-nav lvl-2"
                  style="color:#d0899c">View All</a></li> --}}
                        </ul>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-2">
                        <a href="#" class="site-nav lvl-1 menu-title">Footwear</a>
                        <ul class="subLinks">
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
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-4 p-0">
                        <a href="#"><img
                                src="https://fashioneditindia.com/allUsers/customer/images/websitemayimages/Women-DropDown .JPG"
                                alt="image" /></a>
                    </div>
                </div>
            </div>

        </li>

        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/men">Men <i
                    class="an an-angle-down-l"></i></a>
            <div class="megamenu style2">
                <div class="row">
                    <div class="lvl-1 col-md-3 col-lg-3"><a href="https://fashioneditindia.com/kids-girls"
                            class="site-nav lvl-1 menu-title">Categories</a>
                        <ul class="subLinks">
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-bandhgalas"
                                    class="site-nav">Bandhgalas</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-bottoms"
                                    class="site-nav">Bottoms</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-co-ord-sets"
                                    class="site-nav">Co-ord sets</a></li>

                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-jackets-blazers"
                                    class="site-nav">Jackets & Blazers</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-kurta-sets"
                                    class="site-nav">Kurta Sets</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-kurtas"
                                    class="site-nav">Kurtas</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-nehru-jackets"
                                    class="site-nav">Nehru Jackets</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-pants"
                                    class="site-nav">Pants</a></li>

                        </ul>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1 menu-title"></a>
                        <ul class="subLinks">
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-suits"
                                    class="site-nav">Suits</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/accessories-footwear-shoes"
                                    class="site-nav">Shoes</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-sherwanis"
                                    class="site-nav">Sherwanis</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-shirts"
                                    class="site-nav">Shirts</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-shorts"
                                    class="site-nav">Shorts</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-t-shirts"
                                    class="site-nav">T
                                    Shirts</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/mens-clothing-waist-coats"
                                    class="site-nav">Waist Coats</a></li>



                        </ul>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3 p-0">
                        <a href="#"><img
                                src="https://fashioneditindia.com/allUsers/customer/images/websitebannerimages01jan23/MensDropDown-1.jpg"
                                alt="image" /></a>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3 p-0">
                        <a href="#"><img
                                src="https://fashioneditindia.com/allUsers/customer/images/websitebannerimages01jan23/MensDropDown-2.jpg"
                                alt="image" /></a>
                    </div>
                </div>
            </div>
        </li>

        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/kids">Kids <i
                    class="an an-angle-down-l"></i></a>
            <div class="megamenu style2">
                <div class="row">
                    <div class="lvl-1 col-md-3 col-lg-3"><a href="https://fashioneditindia.com/kids-girls"
                            class="site-nav lvl-1 menu-title">Girls</a>
                        <ul class="subLinks">
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
                                    class="site-nav lvl-2">Tunics </a></li>


                        </ul>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3"><a href="https://fashioneditindia.com/kids-boys"
                            class="site-nav lvl-1 menu-title">Boys</a>
                        <ul class="subLinks">
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
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3"><a href="https://fashioneditindia.com/kids-accessories"
                            class="site-nav lvl-1 menu-title">Accessories</a>
                        <ul class="subLinks">
                            <li class="lvl-2"><a
                                    href="https://fashioneditindia.com/kids-accessories-hair-accessories"
                                    class="site-nav lvl-2">Hair Accessories</a></li>
                        </ul>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3 p-0">
                        <a href="#"><img
                                src="https://fashioneditindia.com/allUsers/customer/images/kids-drop-down.jpg"
                                alt="image" /></a>
                    </div>
                </div>
            </div>

        </li>


        <li class="lvl1 parent dropdown"><a href="https://fashioneditindia.com/jewellery">Jewellery <i
                    class="an an-angle-down-l"></i></a>
            <ul class="dropdown">
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

        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/beauty">Beauty <i
                    class="an an-angle-down-l"></i></a>
            <div class="megamenu style2">
                <div class="row">

                    <div class="lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1 menu-title">Face</a>
                        <ul class="subLinks">
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-cleanser"
                                    class="site-nav">Cleansers</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-face-gels"
                                    class="site-nav">Face
                                    Gels</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-face-oils"
                                    class="site-nav">Face
                                    Oils</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-face-masks"
                                    class="site-nav">Face
                                    Masks</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-face-wash"
                                    class="site-nav">Face
                                    Wash</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-moisturizers"
                                    class="site-nav">Moisturisers</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-face-serums"
                                    class="site-nav">Serums</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-toner"
                                    class="site-nav">Toners</a></li>

                        </ul>
                    </div>

                    <div class="lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1 menu-title">Body</a>
                        <ul class="subLinks">
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-body-oils"
                                    class="site-nav">Body
                                    Oils</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-body-scrubs"
                                    class="site-nav">Body
                                    Scrubs</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-hair-conditioners"
                                    class="site-nav">Hair Conditioners</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-hair-masks"
                                    class="site-nav">Hair
                                    Masks</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-hair-oils"
                                    class="site-nav">Hair
                                    Oils</a></li>
                            <li class="lvl-2"><a href="https://fashioneditindia.com/beauty-shampoo"
                                    class="site-nav">Shampoos</a>
                            </li>


                        </ul>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3 p-0">
                        <a href="#"><img
                                src="https://fashioneditindia.com/allUsers/customer/images/BeautyDropdown-1.jpg"
                                alt="image" /></a>
                    </div>
                    <div class="lvl-1 col-md-3 col-lg-3 p-0">
                        <a href="#"><img
                                src="https://fashioneditindia.com/allUsers/customer/images/BeautyDropDown-2.jpg"
                                alt="image" /></a>
                    </div>
                </div>
            </div>
        </li>


        <li class="lvl1 parent dropdown"><a href="https://fashioneditindia.com/home">Home & Gifting<i
                    class="an an-angle-down-l"></i></a>
        </li>
        <li class="lvl1 parent dropdown"><a href="#">Occasion<i class="an an-angle-down-l"></i></a>
            <ul class="dropdown">
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
                <li><a href="https://fashioneditindia.com/destination-wedding?utm_source=Homepage&utm_medium=Curated_by_Experts&utm_campaign=Destination_Wedding"
                        class="site-nav">Destination Weddings</a>

                </li>
            </ul>
        </li>
        <li class="lvl1 parent megamenu"><a href="https://fashioneditindia.com/ready-to-ship">Ready to Ship <i
                    class="an an-angle-down-l"></i></a></li>
        <li class="lvl1 parent megamenu"><a href="https://littletags.webkype.co/sale">Sale <i
                    class="an an-angle-down-l"></i></a></li>
    </ul>
</nav>
