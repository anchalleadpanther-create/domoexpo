  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.header--mobile{
     background:#fff !important;
}
    .navigation--list{
        background:#fff !important;
        border-bottom:1px solid #ddd;
    }
    .ps-logo img {
    width: 100px ! Important;
    max-width: 60%;
}
.ps-block--user-header a i, .ps-cart--mini a i{
    color:#000 !important;
}
.new-listed-hide ul li {
    text-decoration:none;
    list-style:none !important;
}
.new-listed-hide ul li a{
    color:#000;
}
@media(max-width:576px){
    .header--mobile .navigation--mobile{
        padding:10px 14px;
    }
}

</style>

<header class="header header--mobile" data-sticky="true">
        <!--<div class="header__top">-->
        <!--    <div class="header__left">-->
        <!--        <p>Welcome to expo Online Shopping Store !</p>-->
        <!--    </div>-->
        <!--    <div class="header__right">-->
        <!--        <ul class="navigation__extra">-->
        <!--            <li><a href="#">Sell on expo</a></li>-->
        <!--            <li><a href="#">Tract your order</a></li>-->
        <!--            <li>-->
        <!--                <div class="ps-dropdown"><a href="#">US Dollar</a>-->
        <!--                    <ul class="ps-dropdown-menu">-->
        <!--                        <li><a href="#">Us Dollar</a></li>-->
        <!--                        <li><a href="#">Euro</a></li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        <!--            </li>-->
        <!--            <li>-->
        <!--                <div class="ps-dropdown language"><a href="#"><img-->
        <!--                            src="{{asset('allUsers/frontend/img/flag/en.png')}}" alt="" />English</a>-->
        <!--                    <ul class="ps-dropdown-menu">-->
        <!--                        <li><a href="#"><img src="{{asset('allUsers/frontend/img/flag/germany.png')}}" alt="" />-->
        <!--                                Germany</a></li>-->
        <!--                        <li><a href="#"><img src="{{asset('allUsers/frontend/img/flag/fr.png')}}" alt="" />-->
        <!--                                France</a>-->
        <!--                        </li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        <!--            </li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="navigation--mobile border-bottom bg-white">
            <div class="navigation__left"><a class="ps-logo" href="{{url('/')}}"><img
                        src="https://domo.expo.cy/allUsers/frontend/img/Domo-Expo-Cy-v2.png" alt="" /></a></div>
            <div class="navigation__right">
                <div class="header__actions">
                    <div class="ps-cart--mini">
                        <a class="header__extra" title="Shop" target="_blank" href="https://seller.domo.expo.cy/">
                             <i class="icon-bag2"> </i>
                           <!--<span><i>0</i></span>-->
                        </a>
                        {{--<div class="ps-cart__content">
                            <div class="ps-cart__items">
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img
                                                src="{{asset('allUsers/frontend/img/products/clothing/7.jpg')}}"
                                                alt="" /></a>
                                    </div>
                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i
                                                class="icon-cross"></i></a><a href="{{url('/')}}/p/furniture-fixtures">MVMTH
                                            Classical Leather Watch In Black</a>
                                        <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                    </div>
                                </div>
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img
                                                src="{{asset('allUsers/frontend/img/products/clothing/5.jpg')}}"
                                                alt="" /></a>
                                    </div>
                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i
                                                class="icon-cross"></i></a><a href="{{url('/')}}/p/furniture-fixtures">Sleeve Linen
                                            Blend Caro Pane Shirt</a>
                                        <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-cart__footer">
                                <h3>Sub Total:<strong>$59.99</strong></h3>
                                <figure><a class="ps-btn" href="{{url('/')}}/p/furniture-fixtures">View Cart</a><a class="ps-btn"
                                        href="checkout.html">Checkout</a></figure>
                            </div>
                        </div> --}}
                    </div>
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><a href="{{url('/')}}/buyer/login"><i class="icon-user"></i></a></div>
                        <div class="ps-block__right"><a href="{{url('/')}}/buyer/login">Login</a><a
                            href="{{url('/')}}/buyer/register">Register</a></div>
                    </div>
                    
                        <!-- Hamburger Button -->
                    <div class="hamburger">
                       <a type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                        <i class="fa-solid fa-bars" style="font-size:24px; cursor:pointer; color:#000;"></i>
                      </a>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="ps-search--mobile">
            <!--<form class="ps-form--search-mobile" action="{{url('/')}}" method="get">-->
            <!--    <div class="form-group--nest">-->
            <!--        <input class="form-control border" type="text" placeholder="Search something..." />-->
            <!--        <button><i class="icon-magnifier"></i></button>-->
            <!--    </div>-->
            <!--</form>-->
            
             <form class="ps-form--quick-search" action="{{url('/search')}}" method="get">
                <div class="form-group--icon w-25"><i class="icon-chevron-down"></i>
                    <select class="form-control" name="type">
                        <option @if(request()->get('type') == "Architect") selected="selected" @endif value="Architect"></option>
                        <option @if(request()->get('type') == "Architect") selected="selected" @endif value="Architect">Architect</option>
                        <option class="level-0" @if(request()->get('type') == "Contractor") selected="selected" @endif value="Contractor">Contractor</option>
                        <option class="level-0" @if(request()->get('type') == "Developer") selected="selected" @endif value="Developer">Developer</option>
                        <option class="level-0" @if(request()->get('type') == "Supplier") selected="selected" @endif value="Supplier">Supplier</option>
                    </select>
                </div>
                <input class="form-control border" type="text" name="q"  value="{{request()->get('q')}}" placeholder="Search something..." />
                <button><i class="icon-magnifier"></i></button>
                
            </form>
            
            
            
        </div>
       
    </header>
    



    
 <!-- ✅ Offcanvas Sidebar -->
  <div class="offcanvas offcanvas-start" style="z-index:9999" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
    <div class="offcanvas-header">
     <div class="text-center">
         <a class="ps-logo" href="{{url('/')}}"><img
                        src="https://domo.expo.cy/allUsers/frontend/img/Domo-Expo-Cy-v2.png" alt="" /></a>
    </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
 
    </div>
    <div class="offcanvas-body">
      
        <div class="ps-panel__content new-listed-hide">
    <ul class="menu--mobile p-0">
        @foreach(navbarCategories() as $category)
            <li class="menu-item-has-children has-mega-menu">
                <a href="{{ route('customer.product-category', [$category->category_slug, 'product']) }}">
                    {{ $category->category_name }}
                </a>
                <span class="sub-toggle"></span>

                @if(count($category->children) > 0)
                    <div class="mega-menu">
                        @php
                            // Split children into groups of 6 for multiple columns (adjust as needed)
                            $childGroups = $category->children->chunk(6);
                        @endphp

                        @foreach($childGroups as $group)
                            <div class="mega-menu__column">
                                <ul class="mega-menu__list">
                                    @foreach($group as $childCategory)
                                        <li>
                                            <a href="{{ route('customer.product-category', [$childCategory->category_slug, 'product']) }}">
                                                {{ $childCategory->category_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>

        
      
    </div>
  </div>
  
  
  
  

