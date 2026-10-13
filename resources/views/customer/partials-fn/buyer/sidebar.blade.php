

<style>

    ul li {
        position: relative;
        /* This is important for positioning submenus */
    }

    ul li ul.submenu {
        display: none;
        /* Hide sub-menu by default */
        /* position: absolute; Position relative to the parent <li> */
        top: 100%;
        /* Position below the parent <li> */
        /* left: 10; */
        background: #ffffff;
        /* Background color for submenu */
        list-style-type: none;
        margin-left: 30px !important;
        /* Optional: padding for submenu items */
        margin-bottom: 5px !important;
        /* Optional: padding for submenu items */
        padding: 0;
        border: 1px solid #ccc;
        /* Optional: border around submenu */
        z-index: 9999;
    }

    ul li:hover ul.submenu {
        display: block;
        /* Show submenu on hover */

    }

    ul li ul.submenu li a {
        text-decoration: none;
        color: #333;
        display: block;

    }

    ul li ul.submenu li a:hover {
        background: #eee;
        /* Optional: background color on hover */
    }

    .active {
        background: #ffffff;
    }

.ps-widget--account-dashboard .ps-widget__content ul li a i{
    float:left;
}
    .active-sub-menu {
        background: #eee;
    }
    
    @media (max-width: 991px) {
  .new-ps-section__left{
      position:relative !important;
      width:100% !important;
    
  }
}
</style>
<div class="ps-section__left new-ps-section__left ">
    <aside class="ps-widget--account-dashboard">
        <div class="ps-widget__content">
            <ul class="ul-parent-navbar d-block">
                <li class="{{ request()->routeIs('buyer.dashboard') ? 'active' : '' }}">
                   <a href="{{route('buyer.dashboard')}}"> <i class="fa fa-dashboard"></i> <strong> Dashboard </strong></a>
                </li>

                <li class="{{ request()->routeIs('buyer.business-information') ? 'active' : '' }}">
                    <a href="{{route('buyer.business-information')}}"><i class="fa fa-user"></i> <strong>Manage Profile</strong></a>
                </li>
                
               {{-- @if(Auth::user()->account_type == 'Architect' || Auth::user()->account_type == 'Developer')
                <li class="{{ request()->routeIs('buyer.quantity-surveyor.index') ? 'active' : '' }}">
                    <a href="{{route('buyer.quantity-surveyor.index')}}"><i class="fa fa-file-text-o"></i> <strong>Quantity Surveyor</strong></a>
                </li>
                @endif --}}

                @if(Auth::user()->account_type == 'Architect' || Auth::user()->account_type == 'Developer' || Auth::user()->account_type == 'Quantity Surveyor')
                <li class="{{ request()->routeIs('buyer.projects') ? 'active' : '' }}">
                    <a href="{{route('buyer.projects')}}"><i class="fa fa-file-text-o"></i> <strong>Projects</strong></a>
                </li>
                @endif
                
                @if(Auth::user()->account_type == 'Contractor')
                 <li class="{{ request()->routeIs('buyer.all-projects') ? 'active' : '' }}">
                    <a href="{{route('buyer.all-projects')}}"><i class="fa fa-file-text-o"></i> <strong>Projects</strong></a>
                </li>
                @endif
                
                
                <li class="{{ request()->routeIs('buyer.notifications') ? 'active' : '' }}">
                    <a href="{{route('buyer.notifications')}}"><i class="fa fa-bell"></i> <strong>Notification</strong></a>
                </li>
                
                <li class="{{ request()->routeIs('buyer.rfq-enquiries') ? 'active' : '' }}">
                    <a href="{{route('buyer.rfq-enquiries')}}"><i class="fa fa-shopping-cart"></i> <strong>RFQ Enquiries</strong></a>
                </li>
                
                <li class="{{ request()->routeIs('buyer.chat-message') ? 'active' : '' }}">
                    <a href="{{route('buyer.chat-message')}}"><i class="fa fa-shopping-cart"></i> <strong>Messages</strong></a>
                </li>

              

                <!--<li class="">-->
                <!--    <a href=""><i class="fa fa-bar-chart"></i> <strong>Reports</strong></a>-->
                <!--</li>-->

               

                <!--<li class="{{ request()->routeIs('buyer.buyer-designer-wishlist-list') ? 'active' : '' }}">-->
                <!--    <a href="{{route('buyer.buyer-designer-wishlist-list')}}"><i class="fa fa-star"></i> <strong>Seller Wishlist</strong></a>-->
                <!--</li>-->

                <li>
                    <a href="{{route('buyer.logout')}}"><i class="fa fa-sign-out"></i> <strong>Logout</strong></a>
                </li>
            </ul>

            <div class="card subscription_box d-none">
                <div class="card-body pt-4 pb-4">
                    @if(\App\Models\Supplier\Supplier::where('biz_email',Auth::guard('buyer')->user()->email)->exists())
                        <a href="{{route('buyer.seller-login-by-his-email',[Auth::guard('buyer')->user()->email])}}" target="_blank" class="ps-btn">Go To Seller Dashboard</a>
                    @else
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#becomeSellerModal" class="ps-btn">Become a seller</a>
                    @endif
                </div>
            </div>

        </div>
    </aside>
</div>


<div class="modal fade" id="becomeSellerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Boecome a Seller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div> You want to become a seller?</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" href="{{route('buyer.become-a-seller')}}" class="btn btn-primary">Confirm</a>
      </div>
    </div>
  </div>
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