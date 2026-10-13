<style>
   

    ul li {
        position: relative; /* This is important for positioning submenus */
    }

    ul li ul.submenu {
        display: none; /* Hide sub-menu by default */
        /* position: absolute; Position relative to the parent <li> */
        top: 100%; /* Position below the parent <li> */
        /* left: 10; */
        background: #ffffff; /* Background color for submenu */
        list-style-type: none;
        margin-left: 30px !important; /* Optional: padding for submenu items */
        margin-bottom: 5px !important; /* Optional: padding for submenu items */
        padding: 0;
        border: 1px solid #ccc; /* Optional: border around submenu */
        z-index: 9999;
    }

    ul li:hover ul.submenu {
        display: block; /* Show submenu on hover */
        
    }

    ul li ul.submenu li a {
        text-decoration: none;
        color: #333;
        display: block;

    }

    ul li ul.submenu li a:hover {
        background: #eee; /* Optional: background color on hover */
    }
    .active{
        background: #ffffff;
    }
    .active-sub-menu{
        background: #eee; 
    }
 
</style>

<div class="ps-section__left">
    <aside class="ps-widget--account-dashboard">
        <div class="ps-widget__content"> 
        
            <ul class="ul-parent-navbar">
                <li class="{{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">
                    <a href="{{route('seller.dashboard')}}"><img src="{{asset('allUsers/frontend/img/icons/dashboard-icon.png') }}"> Dashboard</a>
                </li>
                <li class="{{ request()->routeIs('seller.company-profile') ? 'active' : '' }}">
                    <a href="javascript:void(0)"><img src="{{asset('allUsers/frontend/img/icons/profile-icon.png') }}"> Company Profile <i class="fa fa-angle-down"></i> </a>
                    <ul class="submenu">
                        <li class="{{ Request::segment(3) == 'company-information' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.company-profile','company-information')}}">Basic Information <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'contact-information' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.company-profile','contact-information')}}">Contact Details <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'company-address' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.company-profile','company-address')}}">Company Address <i class="fa fa-angle-right"></i></a></li>
                        <!--<li class="{{ Request::segment(3) == 'person-of-authority' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.company-profile','person-of-authority')}}">Person of Authority <i class="fa fa-angle-right"></i></a></li>-->
                        <!--<li class="{{ Request::segment(3) == 'bank-account' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.company-profile','bank-account')}}">Bank Details<i class="fa fa-angle-right"></i></a></li>-->
                    </ul>
                </li>
                <li class="{{ request()->routeIs('seller.online-store-profile') ? 'active' : '' }}">
                    <a href="javascript:void(0)"><img src="{{asset('allUsers/frontend/img/icons/profile-icon.png') }}">Online Store <i class="fa fa-angle-down"></i></a>
                    <ul class="submenu">
                        <li class="{{ Request::segment(3) == 'business-type' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.online-store-profile','business-type')}}">Business Type <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'offerings-and-spacialization' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.online-store-profile','offerings-and-spacialization')}}">Specialization <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'company-brief' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.online-store-profile','company-brief')}}">About Company <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'company-images' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.online-store-profile','company-images')}}">Logo and Image <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'certification' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.online-store-profile','certification')}}">Certification <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'online-channels' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.online-store-profile','online-channels')}}">Online Channels <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'client-references' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.online-store-profile','client-references')}}">References <i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('seller.point-of-sale') ? 'active' : '' }}">
                    <a href="javascript:void(0)">
                        <img src="{{asset('allUsers/frontend/img/icons/listing-icon.png') }}">Point of Sale <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="submenu">
                        <li class="{{ Request::segment(3) == 'geographical-scope' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.point-of-sale','geographical-scope')}}">Service Location <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'like-to-sell' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.point-of-sale','like-to-sell')}}">Target Customer <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'seller-categories' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.point-of-sale','seller-categories')}}">Categories <i class="fa fa-angle-right"></i></a></li>
                        
                    </ul>
                </li>
                <!--li><a href="{{route('seller.manage-profile')}}"><img src="{{asset('allUsers/frontend/img/icons/profile-icon.png') }}"> Manage Profile</a></li-->
                <li class="{{ request()->routeIs('seller.seller-products') ? 'active' : '' }}">
                    <a href="javascript:void(0)"><img src="{{asset('allUsers/frontend/img/icons/listing-icon.png') }}">Manage Listing <i class="fa fa-angle-down"></i></a> 
                    <ul class="submenu">
                        <li class="{{ Request::segment(3) == 'seller-products' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.seller-products')}}"> Products <i class="fa fa-angle-right"></i></a></li>
                        <li class="{{ Request::segment(3) == 'seller-services' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.seller-services')}}"> Services <i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </li>
                <!--<li class="{{ request()->routeIs('seller.seller-services') ? 'active' : '' }}">-->
                <!--    <a href="javascript:void(0)"><img src="{{asset('allUsers/frontend/img/icons/listing-icon.png') }}">Service Listing <i class="fa fa-angle-down"></i> </a> -->
                <!--    <ul class="submenu">-->
                <!--        <li><a href="{{route('seller.seller-services')}}">View Listing <i class="fa fa-angle-right"></i></a></li>-->
                <!--    </ul>-->
                <!--</li>-->
                <li class="{{ Request::segment(3) == 'seller-rfq' ? 'active-sub-menu' : '' }}"><a href="{{route('seller.seller-rfq')}}"><img src="{{asset('allUsers/frontend/img/icons/quotation-icon.png') }}"> Quotations</a></li>
                <li><a href="#"><img src="{{asset('allUsers/frontend/img/icons/order-icon.png') }}"> Orders</a></li>
                <li><a href="#"><img src="{{asset('allUsers/frontend/img/icons/order-icon.png') }}"> Promotions</a></li>
                <li><a href="#"><img src="{{asset('allUsers/frontend/img/icons/order-icon.png') }}"> Blogs / Articles</a></li>
                <li><a href="#"><img src="{{asset('allUsers/frontend/img/icons/message-icon.png') }}"> Messages</a></li>
                <li><a href="{{route('seller.logout')}}"><img src="{{asset('allUsers/frontend/img/icons/logout-1.png') }}"> Logout</a></li>
            </ul>

            <div class="card subscription_box">
            <div class="card-header">
                Current Subscription 
            </div>
            <div class="card-body pt-4 pb-4"> 
                <h4>Free Plan</h4>
                <p>Expiry Date: 17 Jun 2024</p>
                <a href="" class="ps-btn">UPDATE PLAN</a> 
            </div>
            </div>
        </div>
    </aside>
</div>

<script>

    $(document).ready(function(){
    // Select all li elements under the parent ul with class 'ul-parent-navbar'
    let activeNavbar = $('.ul-parent-navbar li');
    
    // Iterate over each li element
    activeNavbar.each(function() {
        // Check if the current li has the 'active' class
        if ($(this).hasClass('active')) {
            // Show the submenu of this li
            $(this).children('ul').show();
        } else {
            // Hide the submenu of this li
            $(this).children('ul').hide();
        }
    });
});
$(document).ready(function(){

    $('ul li').click(function(e) {
        // Prevent the click from closing the submenu immediately
        e.stopPropagation();
        // Toggle the submenu
        $(this).children('ul.submenu').slideToggle();
    });

    // Optional: Hide submenus when clicking elsewhere
    // $(document).click(function(){
    //     $('ul.submenu').slideUp();
    // });
});
</script>


<script>
$(document).ready(function(){
  $(".responsive_filter-btn").click(function(){
    $(".ps-widget--account-dashboard ul.ul-parent-navbar").toggleClass("main");
  });
});
</script>
