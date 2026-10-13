<nav class="grid__item" id="AccessibleNav">
    <ul id="siteNav" class="site-nav medium center hidearrow">
        {{-- <li class="lvl1 parent megamenu"><a href="{{ route('customer.product-category', 'new-in') }}">NEW IN</a>
        </li>
        <li class="lvl1 parent megamenu"><a href="{{ route('customer.designers') }}">DESIGNERS</a>
        </li> --}}
        {{-- @foreach (navbarCategories() as $category)
        <li class="lvl1 parent megamenu"><a href="{{ route('customer.product-category', $category->category_slug) }}">{{
                $category->category_name }}
                <i class="an an-angle-down-l"></i></a>

            @if ($category->children !== null)
            @foreach ($category->children as $children)
            <ul class="dropdown">
                <li><a href="{{ route('customer.product-category', $children->category_slug) }}" class="site-nav">{{
                        $category->category_name }}</a></p>
            </ul>
            @endforeach
            @endif

        </li>
        @endforeach --}}

        {{-- @foreach (navbarCategories() as $category)
        <li class="lvl1 parent dropdown">
            @if ($category->category_name == 'Girl')
            <a href="{{ route('customer.girls') }}">{{ $category->category_name }}
                <i class="an an-angle-down-l"></i></a>
            @elseif($category->category_name == 'Boy')
            <a href="{{ route('customer.boys') }}">{{ $category->category_name }}
                <i class="an an-angle-down-l"></i></a>
            @elseif($category->category_name == 'Personalised')
            <a href="{{ route('customer.personalised') }}">{{ $category->category_name }}
                <i class="an an-angle-down-l"></i></a>
            @elseif($category->category_name == 'Brands')
            <a href="{{ route('customer.designers') }}">{{ $category->category_name }}
                <i class="an an-angle-down-l"></i></a>
            @else
            <a href="{{ route('customer.product-category', $category->category_slug) }}">{{ $category->category_name }}
                <i class="an an-angle-down-l"></i></a>
            @endif

            @if ($category->children !== null)
            <ul class="dropdown">

                @foreach ($category->children as $children)
                <li><a href="{{ route('customer.product-category', $children->category_slug) }}" class="site-nav">{{
                        $children->category_name }}</a></li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach --}}
        <span style="display:none">
        
        <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="#"><span>NEW IN </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY CATEGORY </p>
                                             <p class="title mtitle" data-title="By Category"><a href="#">Bags</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Bottles & Sippers</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Dresses</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Nightsuits</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Tops and T-Shirts</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY BRAND </p>
                                             <p class="title mtitle" data-title="By Category"><a href="#">Kiddorma</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Kiddreams</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Lil Planet</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="#">IO</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Sunnylife</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Sluban</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                          
                                           <div class="col-1 "><img src="https://littletags.webkype.co/allUsers/homepage/img-newIn.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div>
                                </li>

          <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/designers"><span>BRANDS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">INDIAN BRANDS </p>
                                             <p class="title mtitle" data-title="By Category"><a href="#">Alyaansh Couture</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Payal Singhal</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Rohit Bal</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">RR Blue</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Samant Chauhan</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">INTERNATIONAL BRANDS </p>
                                            <p class="title mtitle" data-title="By Category"><a href="#">Babiators</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Beau Kid</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Pamina</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Skip Hop</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Step2</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                          <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BESTSELLING </p>
                                             <p class="title mtitle" data-title="By Category"><a href="#">Fayon Kids</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Hoitymoppet</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">P & S Co</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Partykles</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Tiber Taber</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Tiny Tales</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                        </div>
                                  </div>
                                </li>
       
<li class="level0 nav-2 top-level menu-baby parent full_width_li girls_menu">
                                    <a href="https://littletags.webkype.co/girls"><span>GIRLS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">CLOTHING </p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Dresses</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Inner Wear</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Jackets</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Jumpsuits</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Kurta Sets</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Lehengas</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Nightwear</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Onesies & Rompers</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Shirts</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Sweatshirt</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Swimwear</a></p>
                                           </div>
                                           <div class="col-1 _innerCategory">
                                               
                                     <p class="title mtitle" data-title="By Category"><a href="#">Tops and T-Shirts</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Tracksuits</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                               <div class="col-sm-12" style="  margin-top: 10px;margin-bottom: 10px;height:1px;background:#eee"></div>
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">ACCESSORIES </p>
                                              
                                     <p class="title mtitle" data-title="By Category"><a href="#">Caps</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Footwear</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Hair Accessories</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Jewelry</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Socks & Stockings</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Sunglasses</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Bags</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                               <div class="row">
                                                   <div class="col-sm-6">
                                                       <p class="title mtitle" data-title="By Category"><a href="#">0-3 M</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="#">3-6 M</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="#">6-9 M</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="#">9-12 M</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="#">12-24 M</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">2-3 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">3-4 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">4-5 Y</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="#">5-6 Y</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="#">6-7 Y</a></p>
                                                   </div>
                                                   <div class="col-sm-6">
                                                       <p class="title mtitle" data-title="By Category"><a href="#">7-8 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">8-9 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">9-10 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">10-11 Y</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="#">11-12 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">12-13 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">13-14 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">14-15 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">15-16 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                                   </div>
                                               </div>
                                           </div>
                                            
                                           <div class="col-1"><img src="https://www.littletags.com/bannerimages/Brandheader09jan23.jpg" style="width:100%;padding:0"></div>
                                          
                                        </div>
                                  </div>
                                </li>

         <li class="level0 nav-2 top-level menu-baby parent full_width_li boys_menu">
                                    <a href="https://littletags.webkype.co/boys"><span>BOYS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">CLOTHING </p>
                                             
                                    <p class="title mtitle" data-title="By Category"><a href="#">Inner Wear</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Kurta Sets</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Kurtas</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Nightwear</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Onesies & Rompers</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="#">Shirts</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Suits & Jackets</a></p>
                                                <p class="title mtitle" data-title="By Category"><a href="#">Sweatshirts</a></p>
                                  
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                                
                                    <p class="title mtitle" data-title="By Category"><a href="#">Swimwear</a></p>
        <p class="title mtitle" data-title="By Category"><a href="#">Tracksuits</a></p>
        <p class="title mtitle" data-title="By Category"><a href="#">T-Shirts</a></p>
        <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                                 <div class="col-sm-12" style="  margin-top: 10px;margin-bottom: 10px;height:1px;background:#eee"></div>
                                              
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">ACCESSORIES </p>
                                             <p class="title mtitle" data-title="By Category"><a href="#">Caps</a></p>
           <p class="title mtitle" data-title="By Category"><a href="#">Footwear</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">Sunglasses</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">Bags</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="title mtitle" data-title="By Category"><a href="#">0-3 M</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">3-6 M</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">6-9 M</a></p>
           <p class="title mtitle" data-title="By Category"><a href="#">9-12 M</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">12-24 M</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">2-3 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">3-4 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">4-5 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">5-6 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">6-7 Y</a></p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="title mtitle" data-title="By Category"><a href="#">7-8 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">8-9 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">9-10 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">10-11 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">11-12 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">12-13 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">13-14 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">14-15 Y</a></p>
           <p class="title mtitle" data-title="By Category"><a href="#">15-16 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                                </div>
                                            </div>
                                           </div>
                                        
                                           <div class="col-1"><img src="https://www.littletags.com/bannerimages/Brandheader09jan23.jpg" style="width:100%;padding:0"></div>
                                          
                                        </div>
                                  </div>
                                </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/lifestyle"><span>LIFESTYLE </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY CATEGORY </p>
                                              <p class="title mtitle" data-title="By Category"><a href="#">Mealtime</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Travel & Gear</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Nursery</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Oral Hygeine</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Diapering</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                            <p class="title mtitle" data-title="By Category"><a href="#">0-3 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">3-6 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">6-9 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">9-12 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">12-24 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                           <div class="col-1"><img src="https://littletags.webkype.co/uploads/sliders/Jq6osSAqtQEnthFsO0d0mEreUoy4Hn1698233270.jpg" style="width:100%;padding:0"></div>
                                          
                                        </div>
                                  </div>
                                </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="#"><span>TOYS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY CATEGORY </p>
                                              <p class="title mtitle" data-title="By Category"><a href="#">Outdoor</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Indoor</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">DIY Kits</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Educational Toys</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                           
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY PRICE </p>
                                          <p class="title mtitle" data-title="By Category"><a href="#">Below 999/-</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Below 1999/-</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Below 2999/-</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                           
                                           <div class="row">
                                               <div class="col-sm-6">
                                                   <p class="title mtitle" data-title="By Category"><a href="#">0-3 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">3-6 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">6-9 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">9-12 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">12-24 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">2-3 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">3-4 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">4-5 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">5-6 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">6-7 Y</a></p>
                                               </div>
                                               <div class="col-sm-6">
                                                    <p class="title mtitle" data-title="By Category"><a href="#">7-8 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">8-9 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">9-10 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">10-11 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">11-12 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">12-13 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">13-14 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">14-15 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">15-16 Y</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                               </div>
                                           </div>
                                           </div>
                                           
                                        </div>
                                  </div>
                                </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="#"><span>GIFTING </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY CATEGORY </p>
                                             
                                <p class="title mtitle" data-title="By Category"><a href="#">Dresses</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Nightsuits</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Onesies & Rompers</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Shirts</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Sweatshirt</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Tops & T-Shirts</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Toys</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Combos</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY PRICE </p>
                                           <p class="title mtitle" data-title="By Category"><a href="#">Below 299/-</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">Below 499/-</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">Below 699/-</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">Below 899/-</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">Below 999/-</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                         <div class="col-1"><img src="https://littletags.webkype.co/uploads/sliders/Jq6osSAqtQEnthFsO0d0mEreUoy4Hn1698233270.jpg" style="width:100%;padding:0"></div>
                                          
                                        </div>
                                  </div>
                                </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="#"><span>RETURN FAVOURS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY CATEGORY</p>
                                              <p class="title mtitle" data-title="By Category"><a href="#">Birthday</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Baby Shower</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Character Store</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Personalised</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Gift Sets</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                           <p class="title mtitle" data-title="By Category"><a href="#">0-3 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">3-6 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">6-9 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">9-12 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">12-24 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY PRICE </p>
                                           <p class="title mtitle" data-title="By Category"><a href="#">Below 999/-</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Below 1999/-</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Below 2999/-</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                          
                                        </div>
                                  </div>
                                </li>
        
        <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/personalised"><span>PERSONALISED </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">CLOTHING</p>
                                             
                                <p class="title mtitle" data-title="By Category"><a href="#">Dresses</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Nightsuits</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Onesies & Rompers</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Shirts</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Sweatshirt</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Tops & T-Shirts</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">ACCESSORIES </p>
                                          <p class="title mtitle" data-title="By Category"><a href="#">Badges</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Bags</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Caps</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Footwear</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Jewelry</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Rakhi</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                          
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">LIFESTYLE </p>
                                          <p class="title mtitle" data-title="By Category"><a href="#">Aprons</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Bedding & Décor</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Bottles And Sippers</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Diaper Bags</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Gift Set</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Key Chains</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Luggage Tags</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Stationery</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Towels</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                        </div>
                                  </div>
                                </li>
          <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
            <a href="https://littletags.webkype.co/wedding"><span>Wedding </span></a> 
           </li>
         
         <div class="clearifx"></div>
            <li class="level0 nav-2 top-level menu-baby parent full_width_li newIn_menu">
                                    <a href="#"><span>NEW IN </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">NEW COLLECTION </p>
                                             <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-bags">Bags</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime-water-bottles">Bottles & Sippers</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-dresses">Dresses</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=nightsuit">Nightsuits</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-tops-t-shirts">Tops and T-Shirts</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">NEW BRANDS </p>
                                             <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/scoobies">Scoobies</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/fayon-kids">Fayon Kids</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/boteh">Boteh</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-boys-closet">Little Boys Closet</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/bling-orn">Bling Orn</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY GENDER </p>
                                             <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl">Girl</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy">Boy</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/baby">Baby</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                          
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/homepage/img-newIn.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                        </div>
                                  </div>
                                </li>

          <li class="level0 nav-2 top-level menu-baby parent full_width_li brands_menu">
                                    <a href="https://littletags.webkype.co/designers"><span>BRANDS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">INDIAN BRANDS </p>
                                             <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/alyaansh-couture">Alyaansh Couture</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/payal-singhal">Payal Singhal</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/rohit-bal">Rohit Bal</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/rr-blue">RR Blue</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/samant-chauhan">Samant Chauhan</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">INTERNATIONAL BRANDS </p>
                                            <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/babiators">Babiators</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/beau-kid">Beau Kid</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/pamina">Pamina</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/skip-hop">Skip Hop</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">Step2</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                          <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BESTSELLING </p>
                                             <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/fayon-kids">Fayon Kids</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/hoitymoppet">Hoitymoppet</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/p-s-co">P & S Co</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/partykles">Partykles</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/tiber-taber">Tiber Taber</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">Tiny Tales</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/homepage/img-brands.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div> </div>
                                </li>
       
<li class="level0 nav-2 top-level menu-baby parent full_width_li girls_menu">
                                    <a href="https://littletags.webkype.co/girls"><span>GIRLS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">CLOTHING </p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-dresses">Dresses</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-innerwear">Inner Wear</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-coats-jackets">Jackets</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-jumpsuits">Jumpsuits</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-kurta-sets">Kurta Sets</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-lehenga-sets">Lehengas</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-nightsuits">Nightwear</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/baby-rompers">Onesies & Rompers</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-shirts ">Shirts</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-sweatshirts  ">Sweatshirt</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-swimwears">Swimwear</a></p>
                                           </div>
                                           <div class="col-1 _innerCategory">
                                               
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-tops-t-shirts">Tops and T-Shirts</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-tracksuits">Tracksuits</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                               <div class="col-sm-12" style="  margin-top: 10px;margin-bottom: 10px;height:1px;background:#eee"></div>
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">ACCESSORIES </p>
                                              
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-caps">Caps</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-footwears">Footwear</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-hairbands">Hair Accessories</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/jewellery">Jewelry</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-socks-tights">Socks & Stockings</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-sunglasses">Sunglasses</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-bags">Bags</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                               <div class="row">
                                                   <div class="col-sm-6">
                                                       <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=27&categorySlug=girl&sortType=">0-3 M</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=28&categorySlug=girl&sortType=">3-6 M</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=29&categorySlug=girl&sortType=">6-9 M</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=71&categorySlug=girl&sortType=">9-12 M</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=30&categorySlug=girl&sortType=">12-24 M</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=31&categorySlug=girl&sortType=">2-3 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=32&categorySlug=girl&sortType=">3-4 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=33&categorySlug=girl&sortType=">4-5 Y</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=34&categorySlug=girl&sortType=">5-6 Y</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=35&categorySlug=girl&sortType=">6-7 Y</a></p>
                                                   </div>
                                                   <div class="col-sm-6">
                                                       <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=36&categorySlug=girl&sortType=">7-8 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=37&categorySlug=girl&sortType=">8-9 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=38&categorySlug=girl&sortType=">9-10 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=39&categorySlug=girl&sortType=">10-11 Y</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=40&categorySlug=girl&sortType=">11-12 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=41&categorySlug=girl&sortType=">12-13 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=42&categorySlug=girl&sortType=">13-14 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=43&categorySlug=girl&sortType=">14-15 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=89055&sizes[]=44&categorySlug=girl&sortType=">15-16 Y</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                                   </div>
                                               </div>
                                           </div>
                                            
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/homepage/img-girl.jpg" style="width:100%;padding:0"></div>
                                          
                                        </div>
                                  </div></div>
                                </li>

         <li class="level0 nav-2 top-level menu-baby parent full_width_li boys_menu">
                                    <a href="https://littletags.webkype.co/boys"><span>BOYS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">CLOTHING </p>
                                             
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-blazer">Blazer</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-kurta-pyjama">Kurta Sets</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-co-ord-sets">Co-ord Sets</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-nightsuits">Nightwear</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/baby-rompers">Onesies & Rompers</a></p>
                                   <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-shirts">Shirts</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-suits-jackets">Suits & Jackets</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-sweatshirts">Sweatshirts</a></p>
                                    
                                  
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                                
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-swimwears">Swimwear</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-tracksuits">Tracksuits</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-t-shirts">T-Shirts</a></p>
        <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                                 <div class="col-sm-12" style="  margin-top: 10px;margin-bottom: 10px;height:1px;background:#eee"></div>
                                              
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">ACCESSORIES </p>
                                             <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-caps">Caps</a></p>
           <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-slippers
 https://littletags.webkype.co/boy-accessories-shoes">Footwear</a></p>
            <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-sunglasses">Sunglasses</a></p>
            <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-bags">Bags</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="title mtitle" data-title="By Category"><a href="#">0-3 M</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">3-6 M</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">6-9 M</a></p>
           <p class="title mtitle" data-title="By Category"><a href="#">9-12 M</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">12-24 M</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">2-3 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">3-4 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">4-5 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">5-6 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">6-7 Y</a></p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="title mtitle" data-title="By Category"><a href="#">7-8 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">8-9 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">9-10 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">10-11 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">11-12 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">12-13 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">13-14 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">14-15 Y</a></p>
           <p class="title mtitle" data-title="By Category"><a href="#">15-16 Y</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                                </div>
                                            </div>
                                           </div>
                                        
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/homepage/img-boy.jpg" style="width:100%;padding:0"></div>
                                          
                                        </div>
                                  </div></div>
                                </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li lifestyle_menu">
                                    <a href="https://littletags.webkype.co/lifestyle"><span>LIFESTYLE </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY CATEGORY </p>
                                              <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime">Mealtime</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear">Travel & Gear</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery">Nursery</a></p>
                                
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-diapering">Diapering</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living">Home & Living</a></p>
                               
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;"> </p>
                                            
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary">Stationary</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-bath-skincare">Bath & Skincare</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-kitchen-dining">Kitche & DIning</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-hygiene-care">Hygiene & Care</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                            <p class="title mtitle" data-title="By Category"><a href="#">0-3 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">3-6 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">6-9 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">9-12 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">12-24 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                           <div class="col-1 "><img src="https://littletags.webkype.co/allUsers/homepage/img-lifestyle.jpg" style="width:100%;padding:0"></div>
                                          
                                        </div>
                                  </div>  </div>
                                </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li "> <a href="#"><span>TOYS </span></a> </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li gifting_menu">
                                    <a href="#"><span>GIFTING </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY CATEGORY </p>
                                             
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-clothing-co-ord-sets">Co-ord Sets</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Dresses</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Nightsuits</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-clothing-romper-sets">Onesies & Rompers</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Shirts</a></p>
    
                                           </div>
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;"> </p>
                                             
    <p class="title mtitle" data-title="By Category"><a href="#">Sweatshirt</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Tops & T-Shirts</a></p>
    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-lifestyle-toys">Toys</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Combos</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY PRICE </p>
                                           <p class="title mtitle" data-title="By Category"><a href="#">Below 299/-</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">Below 499/-</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">Below 699/-</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">Below 899/-</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">Below 999/-</a></p>
            <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                         <div class="col-1"><img src="https://littletags.webkype.co/allUsers/homepage/img-gifting.jpg" style="width:100%;padding:0"></div>
                                          
                                        </div>
                                  </div> </div>
                                </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li return_menu">
                                    <a href="#"><span>RETURN FAVOURS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY CATEGORY</p>
                                              <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=Birthday">Birthday</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=Baby+Shower">Baby Shower</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Character Store</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=personalised">Personalised</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=gift ">Gift Sets</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                           <p class="title mtitle" data-title="By Category"><a href="#">0-3 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">3-6 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">6-9 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">9-12 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">12-24 M</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY PRICE </p>
                                           <p class="title mtitle" data-title="By Category"><a href="#">Below 999/-</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Below 1999/-</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Below 2999/-</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                          <div class="col-1"><img src="https://littletags.webkype.co/allUsers/homepage/img-return.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div></div>
                                </li>
        
        <li class="level0 nav-2 top-level menu-baby parent full_width_li personalised_menu">
                                    <a href="https://littletags.webkype.co/personalised"><span>PERSONALISED </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">CLOTHING</p>
                                
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-t-shirts">T-shirts</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Dresses</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-nightsuits">Nightsuits</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-rompers">Onesies & Rompers</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Shirts</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-sweatshirts">Sweatshirt</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Tops & T-Shirts</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">ACCESSORIES </p>
                                          <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-batches">Badges</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-bags">Bags</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-facemasks">Facemasks</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery-bibs">Bibs</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Jewelry</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-slippers">Slippers</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Caps</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Footwear</a></p>
                                
                                <p class="title mtitle" data-title="By Category"><a href="#">Rakhi</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                          
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">LIFESTYLE </p>
                                          <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-kitchen-dining-apron-sets">Aprons</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Bedding & Décor</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Bottles And Sippers</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Diaper Bags</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Gift Set</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Key Chains</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Luggage Tags</a></p>
    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-notebooks">Notebooks</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Stationery</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">Towels</a></p>
    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                            <div class="col-1"><img src="https://littletags.webkype.co/allUsers/homepage/img-personalised.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div></div>
                                </li>
          <li class="level0 nav-2 top-level menu-baby parent full_width_li wedding_menu">
            <a href="https://littletags.webkype.co/products/search?search=wedding"><span>Wedding </span></a> 
            <div class="level0 dropdown mobile-menu mobile-dropdown">
                <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">SHOP BY CATEGORY </p>
                                              <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search/filter?minimumPrice=2200&maximumPrice=78000&search=wedding&sortType=&gender[]=Girl&type=">Girl</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-lehenga-sets">Lehenga</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-sharara-sets">Sharara</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-kurta-sets">Kurta</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-dhoti-sets">Dhoti Sets</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-gowns">Gowns</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                           
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;"> &nbsp;</p>
                                          <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search/filter?minimumPrice=2200&maximumPrice=78000&search=wedding&sortType=&gender[]=Boy&type=">Boy</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-kurta-pyjama">Kurta sets </a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-sherwani">Sherwani</a></p>
                                 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-dhoti-sets">Dhoti sets</a></p>
                                 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-blazer">Blazer Sets</a></p>
                                 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-bandi-sets">Bandi Sets</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Shop by Occassion </p>
                                           
                                           <div class="row">
                                               <div class="col-sm-6">
                                                   
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=haldi">Haldi</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=mehendi">Mehendi</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=cocktail">Cocktails</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=reception">Reception</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=engagement">Engagement</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=wedding">Wedding</a></p>
                                 <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                               </div>
                                              
                                           </div>
                                           </div>
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/homepage/img-wedding.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div></div>
           </li>
  
  
           </span>
           
            
        <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/new-in"><span>NEW IN </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">NEW COLLECTION </p>
                                             <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/anthrilo">Anthrilo</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/beau-kid">Beau Kid</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/bibbity-bobbity">Bibbity Bobbity</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/boteh">Boteh</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/choko">Choko</a></p>
 <p class="title mtitle" data-title="By Category"><a href="">Cute Couture</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/darleen-kids-couture">Darleen Kids Couture</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/fayon-kids">Fayon Kids</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/greendeer">Greendeer</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/hoitymoppet">Hoitymoppet</a></p>
                                     <!--p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p-->
                                           </div>
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">NEW DESIGNER </p>
                                             <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/kiddorma">Kiddorma</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/lil-angels">Lil Angels</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-boys-closet">Little Boys Closet</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-surprise-box">Little Surprise Box</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/littleens">Littleens</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/miss-nakhrebaaz">Miss Nakhrebaaz</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/momkidsfashion">Momkidsfashion</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/one-friday">One Friday</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/p-s-co">P & S Co</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/pamina">Pamina</a></p>
                                    <!--p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p-->
                                           </div>
                                           
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY GENDER </p>
                                             <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/baby">Baby</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl">Girl</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy">Boy</a></p>
                                    <!--p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p-->
                                           </div>
                                           
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                              <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=27&sizes[]=28&sizes[]=29&sizes[]=71&categorySlug=new-in&sortType=">0-12 Months</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=30&sizes[]=31&sizes[]=32&categorySlug=new-in&sortType=">2-4 Years</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=33&sizes[]=34&categorySlug=new-in&sortType=">4-6 Years</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=35&sizes[]=36&categorySlug=new-in&sortType=">6-8 Years</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=37&sizes[]=38&categorySlug=new-in&sortType=">8-10 Years</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=39&sizes[]=40&categorySlug=new-in&sortType=">10-12 Years</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=299&maximumPrice=18999&sizes[]=41&sizes[]=42&sizes[]=43&categorySlug=new-in&sortType=">12-14 Years</a></p>

                                             
                                    <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                         <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/newin-1.jpg" style="width:100%;padding:0"></div>
                                            <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/newin-2.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                        </div>
                                  </div>
                                </li>

          <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/designers"><span>BRANDS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">TRENDING BRANDS </p>
                                             <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/partykles">Partykles</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/pnk-isha-arora">PNK Isha Arora</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/the-little-celebs">The Little Celebs</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/tiber-taber">Tiber Taber</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/tiny-colour">Tiny Colour</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/tiny-tales">Tiny Tales</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/unitod">UNITOD</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/vived-kids">VIVEDKIDS</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/momkidsfashion">Momkidsfashion</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/one-friday">One Friday</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designers">VIEW ALL</a></p>
                                           </div>
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">INDIAN BRANDS </p>
                                            <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/fayon-kids">Fayon Kids</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/kids-of-greendeer">Kids Of Greendeer </a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/hoitymoppet">Hoitymoppet</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/kiddorma">Kiddorma</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/lil-angels">Lil Angels</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-boys-closet">Little Boys Closet</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-surprise-box">Little Surprise Box</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/littleens">Littleens</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/miss-nakhrebaaz">Miss Nakhrebaaz</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/jazz-my-home">Jazz My Home</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designers?nationality=national">VIEW ALL</a></p>
                                           </div>
                                          <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">INTERNATIONAL BRAND </p>
                                             <!--p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/beau-kid">Beau Kid</a></p-->
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/babiators">Babiators</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/cute-cute">Cute Cute</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/fabric-flavours">Fabric Flavours</a></p>
<!--p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/minibanda">MINIBANDA</a></p-->
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/sienna-likes-to-party">Sienna Likes To Party</a></p>
<!--p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/peanuts">PEANUTS</a></p-->
<!--p class="title mtitle" data-title="By Category"><a href="">Jordan</a></p-->
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/mintini">Mintini</a></p>
<p class="title mtitle" data-title="By Category"><a href="">Mothercare</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/pamina">Pamina</a></p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designers?nationality=international">VIEW ALL</a></p>
                                           </div>
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/brands-1.jpg" style="width:100%;padding:0"></div>
                                            <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/brands-2.jpg" style="width:100%;padding:0"></div>
                                            <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/brands-3.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div> </div>
                                </li>
       
        <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/girls"><span>GIRLS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Clothing </p>
                                     <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-anarkalis">Anarkalis</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-capes">Capes</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-co-ord-sets">Co-ord Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-coats-jackets">Coats & Jackets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-dhoti-sets">Dhoti Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-dresses">Dresses</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-gharara-sets">Gharara Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-gowns">Gowns</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-hoodies">Hoodies</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-innerwear">Innerwear</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-jumpsuits">Jumpsuits</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-kaftans">Kaftans</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-kurta-sets">Kurta Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-leggings-joggers">Leggings & Joggers</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-lehenga-sets">Lehenga Sets</a></p>
       
                                     </div>
                                           <div class="col-1 _innerCategory">
                                               
                                     <p class="title mtitle" data-title="By Category">&nbsp;</p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-nightsuits">Nightsuits</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-pallazzo-stes">Pallazzo Stes</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-pants">Pants</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-sarees">Sarees</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-sharara-sets">Sharara Sets</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-shirts">Shirts</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-shorts">Shorts</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-skirts">Skirts</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-sweatshirts">Sweatshirts</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-swimwears">Swimwears</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-tops-t-shirts">Tops & T-shirts</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-tracksuits">Tracksuits</a></p>
                                    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing"><b>VIEW ALL</b></a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Accessories </p>
                              <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-bags">Bags</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-bangles-bracelets">Bangles & Bracelets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-caps">Caps</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-clips">Clips</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-crown">Crown</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-eye-masks">Eye Masks</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-facemasks">Facemasks</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-footwears">Footwears</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-hairties">Hairties</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-potlis">Potlis</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-raincoats">Raincoats</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-rings">Rings</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-scarves">Scarves</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-socks-tights">Socks & Tights</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-sunglasses">Sunglasses</a></p>
       <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories"><b>VIEW ALL</b></a></p>
                                     </div>
                                     
                                     <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Jewellery </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-earrings">Earrings</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-hairbands">Hairbands</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/jewellery-mathapatti">Mathapatti</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-necklaces">Necklaces</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-pendant">Pendants</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/jewellery-teekas">Teekas</a></p>
       <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/jewellery"><b>VIEW ALL</b></a></p>
                                     </div>
                                     <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Ages </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=27&sizes[]=28&sizes[]=29&sizes[]=71&sizes[]=30&categorySlug=girl&sortType=">0-12 Months</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=31&sizes[]=32&categorySlug=girl&sortType=">2-4 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=33&categorySlug=girl&sortType=">4-6 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=35&sizes[]=36&categorySlug=girl&sortType=">6-8 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=37&sizes[]=38&categorySlug=girl&sortType=">8-10 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=39&sizes[]=40&categorySlug=girl&sortType=">10-12 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=41&sizes[]=42&categorySlug=girl&sortType=">12-14 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=99&maximumPrice=28003400&sizes[]=43&sizes[]=44&categorySlug=girl&sortType=">14-16 Years</a></p>
                                     </div>
                                     <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Featured Brands </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/boteh">Boteh</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/darleen-kids-couture">Darleen Kids Couture</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/fayon-kids">Fayon Kids</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/tiny-tales">Tiny Tales</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/choko">Choko</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/vived-kids">VIVEDKIDS</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/tiber-taber">Tiber taber</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/pnk-isha-arora">PNK Isha Arora</a></p>
                                     </div>
                                      </div>
                                  </div></div>
                                </li>

         <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/boys"><span>BOYS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Clothing </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-achkan-sets">Achkan Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-bandhgala">Bandhgala</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-bandi-sets">Bandi Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-blazer">Blazer</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-co-ord-sets">Co-ord Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-coats">Coats</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-dhoti-sets">Dhoti Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-hoodies">Hoodies</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-inner-wear">Inner Wear</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-jodhupuri-sets">Jodhupuri Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-jumpsuits">Jumpsuits</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-kurta-pyjama">Kurta Pyjama</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-leggings-joggers">Leggings & Joggers</a></p>
       
                                     </div>
                                      <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">&nbsp; </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-nightsuits">Nightsuits</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-pants">Pants</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-sherwani">Sherwani</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-shirts">Shirts</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-shorts">Shorts</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-suits-jackets">Suits & Jackets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-suspender-sets">Suspender Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-sweatshirts">Sweatshirts</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-swimwears">Swimwears</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-t-shirts">T-shirts</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-tracksuits">Tracksuits</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-waist-coats">Waist Coats</a></p>
       <p class="title mtitle" data-title="By Category"><a href="#"><b>VIEW ALL</b></a></p>
                                     </div>
                                     
                                     <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Accessories </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-cufflinks">Cufflinks</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-shoes">Shoes</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-facemasks">Facemasks</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-tie">Tie</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-slippers">Slippers</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-caps">Caps</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-raincoats">Raincoats</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-socks">Socks</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-sunglasses">Sunglasses</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-bags">Bags</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-brooches">Brooches</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-accessories-buttons">Buttons</a></p>
       <p class="title mtitle" data-title="By Category"><a href="#"><b>VIEW ALL</b></a></p>
                                     </div>
                                     
                                      <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Ages </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=27&sizes[]=28&sizes[]=29&sizes[]=71&categorySlug=boy&sortType=">0-12 Months</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=30&sizes[]=72&sizes[]=31&sizes[]=32&categorySlug=boy&sortType=">2-4 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=33&sizes[]=34&categorySlug=boy&sortType=">4-6 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=35&sizes[]=36&categorySlug=boy&sortType=">6-8 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=37&sizes[]=38&categorySlug=boy&sortType=">8-10 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=39&sizes[]=40&categorySlug=boy&sortType=">10-12 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=41&sizes[]=42&categorySlug=boy&sortType=">12-14 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=250&maximumPrice=65000&sizes[]=43&sizes[]=44&categorySlug=boy&sortType=">14-16 Years</a></p>
                                     </div>
                                     <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Featured Brands </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-boys-closet">Little Boys Closet</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/partykles">Partykles</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/fayon-kids">Fayon Kids</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/vived-kids">VIVEDKIDS</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/tiber-taber">Tiber Taber</a></p>
                                     </div>
                                     <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/boy.jpg" style="width:100%;padding:0"></div>     
                                       
                                        </div>
                                  </div></div>
                                </li>
                                
                                 <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/girl-accessories"><span>ACCESSORIES </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">SHOP </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-earrings">Earrings</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-necklaces">Necklaces</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-hairties">Hairties</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-potlis">Potlis</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-scarves">Scarves</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-pendant">Pendant</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-clips">Clips</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-hairbands">Hairbands</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-socks-tights">Socks & Tights</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-bags">Bags</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-crown">Crown</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-raincoats">Raincoats</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-bow-ties">Bow Ties</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-caps">Caps</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-pouches">Pouches</a></p>
       
                                     </div>
                                      <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">&nbsp; </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-sunglasses">Sunglasses</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-facemask">Facemask</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-footwears">Footwears</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-bangles-bracelets">Bangles & Bracelets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-rakhi">Rakhi</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-cufflinks">Cufflinks</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-brooches">Brooches</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-buttons">Buttons</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-nazariya">Nazariya</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-comb">Comb</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-vest">Vest</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-swimming-accessories">Swimming Accessories</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-googles">Goggles</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-key-chains">Key Chains</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/accessories-float-float-bands">Float Bands</a></p>
       <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories"><b>VIEW ALL</b></a></p>
                                     </div>
                                     
                                     <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">FEATURED BRANDS </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/choko">Choko</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/just-shradhas">Just Shraddhas</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/cciki">Cciki</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/gemstella">Gemstella</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/hair-drama-co">Hair Drama Co.</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/diamondtine">Diamondtine</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/lil-ballerina-jewels">Lil Ballerina Jewels</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/cute-cute">Cute Cute</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/sapphire-sorbet">Saphhire Sorbet</a></p>
                                     </div>
                                     
                                     
                                     <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/accessories1.jpg" style="width:100%;padding:0"></div>     
                                      
                                     <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/accessories2.jpg" style="width:100%;padding:0"></div>     
                                      
                                      
                                     <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/accessories3.jpg" style="width:100%;padding:0"></div>     
                                       
                                        </div>
                                  </div></div>
                                </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/lifestyle"><span>LIFESTYLE </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                              <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Home & Living </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-calenders">Calenders</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-bloster">Bloster</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-teepee-set">Teepee Set</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-canopy">Canopy</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-photo-frames">Photo Frames</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-umbrellas">Umbrellas</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-bunting">Bunting</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-wallpaper">Wallpaper</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-furnitures">Furnitures</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-dohar">Dohar</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-shelves">Shleves</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-lamps">Lamps</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-brush-holder">Brush Holder</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-organizer-box">Organizer Box</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-blankets-quilts">Blankets & Quilts</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-pillow-cushions">Pillow & Cushions</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-mats">Mats</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-stockings">Stockings</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-storage-bags">Storage Bags</a></p>
                                     </div>
                                     
                                     <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Travel & Gear </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear-carrycot">Carrycot</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear-luggage-tags">Luggage Tags</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear-car-seat">Car Seat</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear-carrier">Carrier</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear-mosquito-net">Mosquito Net</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear-highchair">Highchair</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear-travel-cot">Travel Cot</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear-luggage">Luggage</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear-cup-holder">Cup Holder</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-travel-gear-stroller">Stroller</a></p>

   <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Nursery </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery-bumper">Bumper</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery-potty-trainer">Potty Trainer</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery-playgym">Playgym</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery-walker">Walker</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery-sleep-trainers">Sleep Trainers</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery-baby-nest">Baby Nest</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery-bedding-quilts">Bedding & Quilts</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery-burp-cloth">Burp Cloth</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-nursery-swaddle-wrappers">Swaddle & Wrappers</a></p>

                                     </div>
                                      <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Kitchen & Dining </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-kitchen-dining-coasters">Coasters</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-kitchen-dining-aprons">Aprons</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-kitchen-dining-tea-set">Tea Set</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-kitchen-dining-containers">Containers</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-kitchen-dining-mugs">Mugs</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-kitchen-dining-cups">Cups</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-kitchen-dining-plate-sets">Plate Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-kitchen-dining-bowls">Bowls</a></p>



<p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">DECOR </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-decor-christmas-tree">Christmas Tree</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-decor-garland">Garland</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-decor-ornaments">Ornaments</a></p>
       
       <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Diapering </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-diapering-diaper-bags">Diaper Bags</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-diapering-wipes">Wipes</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-diapering-diaper-creams">Diaper Creams</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-diapering-diapers">Diapers</a></p>
      
       
                                     </div>
                                     
                                      <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Mealtime </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime-lunch-bags">Lunch Bags</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime-lunch-box">Lunch Box</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime-water-bottles">Water Bottles</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime-bibs-set">Bibs Set</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime-spoon-sets">Spoon Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime-straws">Straws</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime-food-jars">Food Jars</a></p>
     
     <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Hygiene & Care </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-hygiene-care-oral-care">Oral Care</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/hygiene-care-oral-care-wipes">Wipes</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-hygiene-care-cleansers-detergents">Cleansers & Detergents</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/hygiene-care-cleansers-detergents-dishwashing-liquid">Dishwashing Liquid</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/hygiene-care-cleansers-detergents-laundry-detegents">Laundry Detegents</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/hygiene-care-cleansers-detergents-surface-cleaners">Surface Cleaners</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-hygiene-care-health-safety-essentials">Health & Safety Essentials</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/hygiene-care-health-safety-essentials-hand-wash">Hand Wash</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/hygiene-care-medical-care-chest-rub">Chest Rub</a></p>

                                     </div>
                                     
                                       <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Stationary </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-chart-posters">Chart & Posters</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-books">Books</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-pen-pencils">Pen & Pencils</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-crayons-markers">Crayons & Markers</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-pouches-cases">Pouches & Cases</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-stickers">Stickers</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-diy-kits">DIY Kits</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-bags">Bags</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-brushes">Brushes</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-chalks">Chalks</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-compass-protractor">Compass & Protractor</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-diaries">Diaries</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-rulers">Rulers</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-erasers">Erasers</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-glue-stick">Glue Stick</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-stapelers">Stapelers</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-notebooks">Notebooks</a></p>
      
                                     </div>
                                     
                                      <div class="col-1 _innerCategory">
                                           <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Featured Brands </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/jazz-my-home">Jazz My Home</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/angie-homes">Angie Homes</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/pasito-a-pasito">Pasito A Pasito</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/krysaliis">Krysallis</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/janavi-baby">Janavi Baby</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/baby-forest">Baby Forest</a></p>
                                          
      
      <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Bath & Skincare </p>

<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-shampoos">Shampoos</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-grooming-essentials">Grooming Essentials</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-bathing-accessories">Bathing Accessories</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-bath-toys">Bath Toys</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-bath-towels-robes">Bath Towels & Robes</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-bath-skincare-oils">Oils</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-bath-skincare-soaps">Soaps</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-bath-skincare-kajals">Kajals</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-bath-skincare-mists">Mists</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-body-wash">Body Wash</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-lotions">Lotions</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-creams">Creams</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-bath-skincare-bath-rinser">Bath Rinser</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-bath-skincare-bath-tub">Bath Tub</a></p>

                                     </div>
                                            
                                        </div>
                                  </div>  </div>
                                </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
              <a href="https://littletags.webkype.co/toys"><span>TOYS </span></a>
              
               <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/toys-soft-toys">Soft Toys</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/toys-indoor-toys">Indoor Toys</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/toys-outdoor-toys">Outdoor Toys</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/toys-educational-toys">Educational Toys</a></p>
                                           </div>
                                           
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/toy1.png" style="width:100%;padding:0"></div>
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/toy2.png" style="width:100%;padding:0"></div>
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/toy3.png" style="width:100%;padding:0"></div>
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/toy4.png" style="width:100%;padding:0"></div>
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/toy5.png" style="width:100%;padding:0"></div>
                                           </div>
                                  </div>
                                  </div>
              </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/gifting"><span>GIFTING </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">CLOTHING </p>
                                             
    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-clothing-romper-sets">Romper Sets</a></p>
    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-clothing-co-ord-sets">Co-ord Sets</a></p>
    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-clothing-combo-sets">Combo Sets</a></p>
    <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-clothing-t-shirts">T-Shirts</a></p>
    
                                           </div>
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">LIFESTYLE </p>
                                             
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-lifestyle-bath">Bath</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-lifestyle-bedding-sets">Bedding Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-lifestyle-toys">Toys</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-lifestyle-stationary">Stationary</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-lifestyle-kitchen-dining">Kitchen & Dining</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-lifestyle-mealtime">Mealtime</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-lifestyle-home-living">Home & Living</a></p>
                                           </div>
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">ACCESSORIES </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-goodie-bags">Goodie Bags</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-gift-pouch">Gift Pouch</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-hamper">Hamper</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-hanging">Hanging</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-socks-booties-set">Booties Set</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-rakhi">Rakhi</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-ties-set">Ties Set</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-facemasks-set">Facemasks Set</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-apron-sets">Apron Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-vanity-kit-sets">Vanity Kit Sets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-bangles-bracelets">Bangles & Bracelets</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-bookmark">Bookmark</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/gifting-accessories-piggy-bank">Piggy Bank</a></p>
                                           </div>
                                           
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY PRICE </p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=280&categorySlug=gifting&page=3
">BY 299</a></p>
                                          
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=517&categorySlug=gifting&sortType=
">BY 499</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=804&categorySlug=gifting&sortType=
">BY 699</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=975&categorySlug=gifting&sortType=
">BY 899</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=1126&categorySlug=gifting&sortType=
">BY 999</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=2143&categorySlug=gifting&sortType=
">BY 1999</a></p>
                                           </div>
                                         <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/gifting1.jpg" style="width:100%;padding:0"></div>
                                          <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/gifting2.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div> </div>
                                </li>
        
         <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/return-favours"><span>RETURN FAVOURS </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Categories</p>
                                <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;"><a href="https://littletags.webkype.co/return-favours-toys-tech
">Toys & Tech</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/toys-soft-toys">Soft Toys</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/toys-educational-toys">Educational Toys</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Teething</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-toys-tech-watches">Watches</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">Bluetooths</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favour"><b>VIEW ALL</b></a></p>
                                
                                
                                 <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Skincare</p>
                                 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-lotions">Lotion</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-balm">Balm</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-bath-skincare-soaps">Soap</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-skincare-body-wash">Body Wash</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-bath-skincare-oils">Oil</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-bath-skincare"><b>VIEW ALL</b></a></p>
                                          
                                    <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Themes</p>
                                  <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-themes-birthday">Birthday</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-themes-micky-mouse">Mickey Mouse</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-themes-barbie">Barbie</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-themes-spongebob">Spongebob</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-themes-peppa-pig">Peppa Pig</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-themes"><b>VIEW ALL</b></a></p>
                                           </div>
                                       
                                        <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;"> &nbsp;</p>
                                              <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Accessories</p>
                                              <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-accessories-bangles-bracelets">Bracelets</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-accessories-earrings">Earrings</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-accessories-necklaces">Necklace</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-accessories-nazariya">Nazariya</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-accessories-rings">Rings</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/return-favours-accessories"><b>VIEW ALL</b></a></p>
                                
                                
                                 <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;"><a href="https://littletags.webkype.co/return-favours-combo-sets"></a>Combos</p>
                                          
                                           <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Stationary</p>
                                              <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-bags">Bags</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime-water-bottles">Bottles</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-mealtime-lunch-box">Lunchbox</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary-diy-kits">DIY Kits</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-stationary"><b>VIEW ALL</b></a></p>
                                          
                                          
                                             <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Decor</p>
                                              <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-photo-frames">Photo Frames</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-mats">Playmats</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living-stockings">Stocking</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/lifestyle-home-living"><b>VIEW ALL</b></a></p>
                                           </div>
                                       
                                       <div class="col-1 _innerCategory">
                                              <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Brands</p>
                                              <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/advait-living">Advait Living</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/aplito">Aplito</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/bbox">B.box</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/baby-bed-story">Baby Bed Story</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/baby-forest">Baby Forest</a></p><p class="title mtitle" data-title="By Category"><a href="#">Baby Moo</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/bling-orn">Bling Orn</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/boon">Boon</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/cetaphil">Cetaphill</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/diamondtine">Diamondtine</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/gempetit">Gempetit</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/gulco">GULCO</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/ilearngrow">Ilearngrow</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/jazz-my-home">Jazz My Home</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/kaypac">Kaypac</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/kidkraft">Kidkraft</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/krysaliis">Krysallis</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/kstory">Kstory</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-canvas">Little Canvas</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-jamun">Little Jamun</a></p>
                                           </div>
                                        
                                        
                                          <div class="col-1 _innerCategory">
                                              <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;</p>
                                            
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-rawr">Little Rawr</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-surprise-box">Little Surprise Box</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/monc">MONC</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/house-this">House This</a></p>

       <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/ok-play">Ok Play</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/oli-carol">Oli & Carol</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/pasito-a-pasito">Pasito A Pasito</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/peekaboo-patterns">Peekaboo Patterns</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/pepplay">Pepplay</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/planet-of-toys">Planet of Toys</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/rad-living">RAD Living</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/scoobies">Scoobies</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/sekyo">Sekyo</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/senslife">SENSlife</a></p>

                                           </div>
                                        
                                          <div class="col-1 _innerCategory">
                                              <p class="title mtitle" data-title="By Category" style="margin-top:10px;margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">&nbsp;</p>
                                             
                                     
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/skip-hop">Skip Hop</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/sluban">Sluban</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/starplay">Starplay</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/step2">Step 2</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/stylish-returns">Stylish Returns</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/sunnylife">SunnyLife</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/the-sass-bar">The Sass Bar</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/vkaire">Vkaire</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/watchout-wearables">Watchout Wearables</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/windmill-baby">Windmill Baby</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/wish-a-print">Wish A Print</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/youp">Youp</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/zoku">Zoku</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/zoli">Zoli</a></p>
                                             
                                           </div>
                                        
                                     <div class="col-1"><img src="https://littletags.webkype.co/allUsers/homepage/img-personalised.jpg" style="width:100%;padding:0"></div>

                                        </div>
                                  </div></div>
                                </li>
        
        <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/personalised"><span>PERSONALISED </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">CLOTHING</p>
                                
                               <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-nightsuits">Nightsuits</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-co-ord-set">Co-ord Set</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-rompers">Rompers</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-shirts">Shirts</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-t-shirts">T-shirts</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-sweatshirts">Sweatshirts</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-clothing-short-sets">Short Sets</a></p>
                                
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">LIFESTYLE </p>
                                          <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-lifestyle-bath">Bath</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-lifestyle-travel-gear">Travel & Gear</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-lifestyle-nursery">Nursery</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-lifestyle-kitchen-dining">Kitchen & Dining</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-lifestyle-mealtime">Mealtime</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-lifestyle-stationary">Stationary</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-lifestyle-home-living">Home & Living</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-lifestyle-decor">Decor</a></p>
                                
                                           </div>
                                          
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">ACCESSORIES </p>
                                           <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-caps">Caps</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-key-chains">Key Chains</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-goodie-bags">Goodie Bags</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-rakhi">Rakhi</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-clips">Clips</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-sunglasses">Sunglasses</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-bags">Bags</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-batches">Batches</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-facemasks">Facemask</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/personalised-accessories-slippers">Slippers</a></p>
    
                                           </div>
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">FEATURED BRANDS </p>
                                           <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/tiny-tales">Tiny Tales</a></p>
 <p class="title mtitle" data-title="By Category"><a href="">Little West Street</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/stylish-returns">Stylish Returns</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/wish-a-print">Wish A Print</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/your-little-mess">Your Little Mess</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/krysaliis">Krysallis</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/rock-your-baby">Rock Your Baby</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/lil-ballerina-jewels">Lil Ballerina Jewels</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/miracles-happen">Miracles Happen</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/hangonfashion">Hangonfashion</a></p>
 
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/fluffalump">Flufflump</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/jazz-my-home">Jazz My Home</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/stitch-a-wish">Stitch A Wish</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/baby-bed-story">Baby Bed Story</a></p>
 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-surprise-box">Little Surprise Box</a></p>
 
                                           </div>
                                            <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/personalised1.jpg" style="width:100%;padding:0"></div>
                                              <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/personalised2.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div></div>
                                </li>
                                <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/sale"><span>SALE </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BRANDS</p>
                                
                              
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/anthrilo">Anthrilo</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/byb-premium">BYB Premium</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/bownbee">BownBee</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/cukoo">Cukoo</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/little-surprise-box">Little Surprise Box</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/pasha-india">Pasha India</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/ranj">Ranj</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/scoobies">Scoobies</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/house-of-auromo">House Of Auromo</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/humicure">Humicure</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/ilearngrow">ilearnngrow</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/kaypac">Kaypac</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/miko-lolo">Miko Lolo</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/ola-otter">Ola! Otter</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/momkidsfashion">Momkidsfashion</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/piccolo-piglet">Piccolo Piglet</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/rad-living">RAD Living</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/royal-brats">Royal Brats</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/uboard">Uboard</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/unitod">UNITOD</a></p>


                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Percentage </p>
                                           
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=13499&categorySlug=sale&sortType=&discountRange[]=10">10%-20% </a></p> 
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=13499&categorySlug=sale&sortType=&discountRange[]=20">20%-30% </a></p> 
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=13499&categorySlug=sale&sortType=&discountRange[]=30">30%-40% </a></p> 
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=13499&categorySlug=sale&sortType=&discountRange[]=40">40%-50% </a></p> 
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=13499&categorySlug=sale&sortType=&discountRange[]=50">50%-60% </a></p> 
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=13499&categorySlug=sale&sortType=&discountRange[]=60">60%-70% </a></p> 
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=119&maximumPrice=13499&categorySlug=sale&sortType=&discountRange[]=70">70%-80% </a></p> 
                                           </div>
                                          
                                            <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/sale1.jpg" style="width:100%;padding:0"></div>
                                            
                                            <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/sale2.jpg" style="width:100%;padding:0"></div>
                                             <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/sale3.jpg" style="width:100%;padding:0"></div>
                                              <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/sale4.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div></div>
                                </li>
                                
                                
                                
                                 <li class="level0 nav-2 top-level menu-baby parent full_width_li ">
                                    <a href="https://littletags.webkype.co/ready-to-ship"><span>READY TO SHIP </span></a> 
                                    <div class="level0 dropdown mobile-menu mobile-dropdown">
                                        <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BRANDS</p>
                              <!--p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/minibanda">Minibanda</a></p-->
<!--p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/sarabanda">Sarabanda</a></p-->
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/billy-loves-audrey">Billy Loves Audrey</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/cute-cute">Cute Cute</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/the-tiny-universe">The Tiny Universe</a></p>
<!--p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/beau-kid">Beau Kid</a></p-->
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/babiators">Babiators</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/doodle-pants">Doodle Pants</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/ebru-danyal">Ebru Danyal</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/fabric-flavours">Fabric Flavours </a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/ido">iDO</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/mintini">Mintini</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/pamina">Pamina</a></p>
<!--p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/peanuts">Peanuts</a></p-->
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/sienna-likes-to-party">Sienna Likes To Party</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/designer/peppa-pig">Peppa Pig</a></p>
                                
                                           </div>
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">BY AGE </p>
                                           <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=270&maximumPrice=31400&sizes[]=27&sizes[]=28&sizes[]=29&sizes[]=71&categorySlug=ready-to-ship&sortType=">0-12 Months</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=270&maximumPrice=31400&sizes[]=30&sizes[]=31&sizes[]=32&categorySlug=ready-to-ship&sortType=">2-4 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=270&maximumPrice=31400&sizes[]=33&sizes[]=34&categorySlug=ready-to-ship&sortType=">4-6 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=270&maximumPrice=31400&sizes[]=35&sizes[]=36&categorySlug=ready-to-ship&sortType=">6-8 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/product/filter?minimumPrice=270&maximumPrice=31400&sizes[]=37&sizes[]=38&categorySlug=ready-to-ship&sortType=">8-10 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="#">10-12 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="#">12-14 Years</a></p>
<p class="title mtitle" data-title="By Category"><a href="#">14-16 Years</a></p>
                                           </div>
                                          
                                            <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/ready-to-ship1.jpg" style="width:100%;padding:0"></div>
                                            
                                            <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/ready-to-ship2.jpg" style="width:100%;padding:0"></div>
                                             <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/ready-to-ship3.jpg" style="width:100%;padding:0"></div>
                                              <div class="col-1"><img src="https://littletags.webkype.co/allUsers/frontend/images/menu-images/ready-to-ship4.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div></div>
                                </li>
                                
          <li class="level0 nav-2 top-level menu-baby parent full_width_li " style="display:none !important">
            <a href="https://littletags.webkype.co/products/search?search=wedding"><span>Wedding </span></a> 
            <div class="level0 dropdown mobile-menu mobile-dropdown">
                <div class="container">
                                        <div class="dropdown-inner">
                                             <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">SHOP BY CATEGORY </p>
                                              <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search/filter?minimumPrice=2200&maximumPrice=78000&search=wedding&sortType=&gender[]=Girl&type=">Girl</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-lehenga-sets">Lehenga</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-sharara-sets">Sharara</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-kurta-sets">Kurta</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-dhoti-sets">Dhoti Sets</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/girl-clothing-gowns">Gowns</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                           
                                           <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;"> &nbsp;</p>
                                          <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search/filter?minimumPrice=2200&maximumPrice=78000&search=wedding&sortType=&gender[]=Boy&type=">Boy</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-kurta-pyjama">Kurta sets </a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-sherwani">Sherwani</a></p>
                                 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-dhoti-sets">Dhoti sets</a></p>
                                 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-blazer">Blazer Sets</a></p>
                                 <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/boy-clothing-bandi-sets">Bandi Sets</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                           </div>
                                           
                                           
                                            <div class="col-1 _innerCategory">
                                               <p class="title mtitle" data-title="By Category" style="margin-bottom:5px;Font-weight:bold;font-size:13px;letter-spacing: 1px;text-transform: uppercase;">Shop by Occassion </p>
                                           
                                           <div class="row">
                                               <div class="col-sm-6">
                                                   
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=haldi">Haldi</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=mehendi">Mehendi</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=cocktail">Cocktails</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=reception">Reception</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=engagement">Engagement</a></p>
                                <p class="title mtitle" data-title="By Category"><a href="https://littletags.webkype.co/products/search?search=wedding">Wedding</a></p>
                                 <p class="title mtitle" data-title="By Category"><a href="#">VIEW ALL</a></p>
                                               </div>
                                              
                                           </div>
                                           </div>
                                           <div class="col-1"><img src="https://littletags.webkype.co/allUsers/homepage/img-wedding.jpg" style="width:100%;padding:0"></div>
                                        </div>
                                  </div></div>
           </li>
           
            <li class="lvl1 parent megamenu"><a href="https://littletags.webkype.co/rakhi">Rakhi <i
                    class="an an-angle-down-l"></i></a></li>
      </ul>
</nav>