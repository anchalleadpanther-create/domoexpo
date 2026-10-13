<style>
    .mega-menu {
        width: max-content;
    }
    a{
        text-decoration:none !important;
         font-size:14px !important;
      
    }
    .ps-block__right a{
        font-size:14px !important;
        color:#000 !important;
    }
   .ps-form--quick-search .form-control{
         font-size:14px !important;
   }
   .ps-list--link li a{
         font-size:14px !important;
   }
   .form-group--nest input.form-control{
        font-size:14px !important;
   }
   li a{
        font-size:14px !important;
        color:#000 !important;
   }
   .ps-checkbox label{
         font-size:14px !important;
   }
   .ps-product__title{
       font-size:14px !important;
        color:#000 !important; 
   }
</style>

<header class="header header--1" data-sticky="true">
        <div class="header__top p-0">
            <div class="ps-container align-items-center">
                <div class="header__left">
                    <a class="ps-logo" href="{{url('/')}}" style="display:block !important"><img class="mw-100"
                          src="{{asset('allUsers/frontend/img/logo-photo.png')}}" alt=""
                            style="height:100px; object-fit: contain; width: auto !important;"  /></a>
                </div>
                
                <div class="header__center">
                    <form class="ps-form--quick-search" action="{{url('/search')}}" method="get">
                        <div class="form-group--icon w-25"><i class="icon-chevron-down"></i>
                            <select class="form-control" name="type">
                                <option @if(request()->get('type') == "Architect") selected="selected" @endif value="Architect">Architect</option>
                                <option class="level-0" @if(request()->get('type') == "Contractor") selected="selected" @endif value="Contractor">Contractor</option>
                                <option class="level-0" @if(request()->get('type') == "Developer") selected="selected" @endif value="Developer">Developer</option>
                                <option class="level-0" @if(request()->get('type') == "Supplier") selected="selected" @endif value="Supplier">Supplier</option>
                            </select>
                        </div>
                        <input class="form-control" type="text" name="q" value="{{request()->get('q')}}" placeholder="I'm shopping for..." id="input-search" />
                        <button>Search</button>
                        
                    </form>
                </div>
                <div class="header__right">
                    <div class="header__actions">
                        <!--<a class="header__extra" href="#"><i-->
                        <!--        class="icon-chart-bars"></i><span><i>0</i></span></a>-->
                        <!--<a class="header__extra"-->
                        <!--    href="#"><i class="icon-heart"></i><span><i>0</i></span></a>-->
                            
                            
                        <!--<div class="ps-cart--mini"><a class="header__extra" href="#"><i-->
                        <!--            class="icon-bag2"></i><span><i>0</i></span></a>-->
                        <!--    <div class="ps-cart__content">-->
                        <!--        <div class="ps-cart__items">-->
                        <!--            <div class="ps-product--cart-mobile">-->
                        <!--                <div class="ps-product__thumbnail"><a href="#"><img-->
                        <!--                            src="{{asset('allUsers/frontend/img/products/clothing/7.jpg')}}"-->
                        <!--                            alt="" /></a></div>-->
                        <!--                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i-->
                        <!--                            class="icon-cross"></i></a><a href="{{url('/')}}/p/furniture-fixtures">MVMTH-->
                        <!--                        Classical Leather Watch In Black</a>-->
                        <!--                    <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="ps-product--cart-mobile">-->
                        <!--                <div class="ps-product__thumbnail"><a href="#"><img-->
                        <!--                            src="{{asset('allUsers/frontend/img/products/clothing/5.jpg')}}"-->
                        <!--                            alt="" /></a></div>-->
                        <!--                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i-->
                        <!--                            class="icon-cross"></i></a><a href="{{url('/')}}/p/furniture-fixtures">Sleeve-->
                        <!--                        Linen Blend Caro Pane Shirt</a>-->
                        <!--                    <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="ps-cart__footer">-->
                        <!--            <h3>Sub Total:<strong>$59.99</strong></h3>-->
                        <!--            <figure><a class="ps-btn" href="{{url('/')}}/p/furniture-fixtures">View Cart</a><a class="ps-btn"-->
                        <!--                    href="checkout.html">Checkout</a></figure>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="ps-block--user-header">
                            <div class="ps-block__left"><i class="icon-user"></i></div>
                            @auth('buyer')
                            <div class="ps-block__right">
                                <a href="{{url('/')}}/buyer/dashboard">{{auth()->guard('buyer')->user()->first_name}} {{auth()->guard('buyer')->user()->last_name}} </a>
                                <a href="{{url('/')}}/buyer/dashboard">{{auth()->guard('buyer')->user()->account_type}} </a>
                                <!--<a href="{{url('/')}}/buyer/dashboard">Dashboard</a>-->
                            
                            </div>
                            @endauth
                            
                            
                            
                            @if(!auth()->guard('buyer')->check())
                                @guest('buyer')
                                <div class="ps-block__right">
                                    <a href="{{url('/')}}/buyer/login">Login</a>
                                    <a href="{{url('/')}}/buyer/register">Register</a>
                                </div>
                                @endguest
                            @endif
                        </div>
                        <div class="ps-block--user-header">
                            <div class="ps-block__left"><i class="icon-bag2"></i></div>
                            <div class="ps-block__right"><a href="https://seller.domo.expo.cy/" target="_blank">Supplier <br> Portal</a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <nav class="navigation">
            <div class="ps-container">

                <div class="navigation__right">
                    
                    <ul class="menu">
                        @foreach(navbarCategories() as $index => $category)
                        
                            <li class="menu-item-has-children has-mega-menu menu-item {{ $index >= 7 ? 'extra-menu ' : '' }}">
                                <a href="{{ route('customer.product-category',[$category->category_slug,'product']) }}">
                                    {{$category->category_name}}
                                </a>
                                <span class="sub-toggle"></span>
                    
                                @if(count($category->children) > 0)
                                    <div class="mega-menu">
                                        <div class="mega-menu__column">
                                            <ul class="mega-menu__list">
                                                @foreach($category->children as $childCategory)  
                                                    <li class="border-bottom my-2">
                                                        <a href="{{ route('customer.product-category',[$childCategory->category_slug,'product']) }}">
                                                            {{$childCategory->category_name}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </li>
                    
                        @endforeach
                    
                        {{-- Show More Button --}}
                        {{--@if(count(navbarCategories()) > 7) --}}
                            <li class="menu-item">
                                <a href="javascript:void(0)"   ><span class="badge badge-primary" id="toggleMenu">Show Less</span></a>
                            </li>
                        {{-- @endif --}}
                    </ul>
                    
                    
                   {{-- <ul class="menu">
                        
                        @foreach(navbarCategories() as $category)
                        
                            <li class="menu-item-has-children has-mega-menu">
                                <a href="{{ route('customer.product-category',[$category->category_slug,'product']) }}">{{$category->category_name}}</a><span class="sub-toggle"></span>
                                @if(count($category->children) > 0)
                                <div class="mega-menu">
                                    <div class="mega-menu__column">
                                        <!--<h4>Catalog Pages<span class="sub-toggle"></span></h4>-->
                                        <ul class="mega-menu__list">
                                            
                                           @foreach($category->children as $childCategory)  
                                            <li class="border-bottom my-2"><a href="{{ route('customer.product-category',[$childCategory->category_slug,'product']) }}">{{$childCategory->category_name}}</a></li>
                                           @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </li>
                        
                        @endforeach

                    </ul>  --}}
                </div>
            </div>
        </nav>
    </header>
    <script>
    
$(document).ready(function () {
    let expanded = true;

    $('#toggleMenu').click(function () {
        if (!expanded) {
            $('.extra-menu').removeClass('d-none');
            $(this).text('Show Less');
        } else {
            $('.extra-menu').addClass('d-none');
            $(this).text('Show More');
        }

        expanded = !expanded;
    });
});
    </script>
    
    
