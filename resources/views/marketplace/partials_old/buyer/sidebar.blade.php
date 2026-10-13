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
                <li class="{{ request()->routeIs('buyer.dashboard') ? 'active' : '' }}">
                    <a href="{{route('buyer.dashboard')}}"><img src="{{asset('allUsers/frontend/img/icons/dashboard-icon.png') }}"> Dashboard</a>
                </li>
                
                <li class="{{ request()->routeIs('buyer.business-information') ? 'active' : '' }}">
                    <a href="{{route('buyer.business-information')}}"><img src="{{asset('allUsers/frontend/img/icons/dashboard-icon.png') }}"> Business Information</a>
                </li>
               

                
                <li><a href="{{route('buyer.logout')}}"><img src="{{asset('allUsers/frontend/img/icons/logout-1.png') }}"> Logout</a></li>
            </ul>

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
