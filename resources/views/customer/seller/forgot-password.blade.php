<!-- headers-->
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="desiredBaseUrl" content="{{url('/')}}">
      <meta name="format-detection" content="telephone=no">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="author" content="">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <title>Seller Signup | FNB2B</title>
      <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
      <script src="{{ asset('allUsers/axios.js') }}"></script>
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
      <link rel="stylesheet" href="{{asset('allUsers/frontend/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/css/home-photo.css')}}">
      <link rel="stylesheet" href="{{asset('allUsers/frontend/css/market-place-1.css')}}">

   <style>
      .tag {
         display: inline-flex;
         align-items: center;
         background-color: #EBEBEB;
         padding: 5px 10px;
         margin: 5px;
         border-radius: 35px;
      }
      #tagsContainer > div > span{
         background: #EBEBEB;
         border: 0px solid #ddd !important;
         padding: 3px 10px;
         border-radius: 100px;
         font-size: 12px;
      }
      .tag span {
         margin-right: 1px;
      }

      .tag .fa-close {
         cursor: pointer;
         margin-top:2;
      }
      .autocomplete-items {
         position: absolute;
         border-bottom: none;
         border-top: none;
         z-index: 99;
         top: 100%;
         left: 0;
         right: 0;
      }
      .autocomplete-items div {
         padding: 10px;
         cursor: pointer;
         background-color: #fff;
         border-bottom: 1px solid #d4d4d4;
      }
      .autocomplete-items div:hover {
         background-color: #e9e9e9;
      }
   </style>

   </head>
   <body class="login_page">
      @include('extensions.sweet-alert')
      @routes
      <div class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}/seller/seller">Home</a></li>
                    <li>Password Reset</li> 
                </ul>
            </div>
        </div>
        
        <div class="ps-my-account">
            <div class="container">
                <form class="ps-form--account ps-tab-root" action="{{ route('seller.forgot-password') }}" method="post">
                   @csrf
                    <div class="ps-tabs">
                        <div class="col-sm-12 text-center"><img src="https://purchasync.com/allUsers/frontend/img/logo-photo.png" style=" width: 200px; margin-bottom: 20px;"></div>
                        
                        <div class="ps-tab active p-5 border-rounded text-left" id="sign-in">
                            <div class="ps-form__content">
                                <!-- <h3 class="fnb_logoText blue-text mb-4">FNB2B.com</h3> -->
                                <h3 class="fnb_logoText blue-text mb-4">Reset your password</h3>
                                <p class="mb-4">Please enter your email address below. You will receive a link to reset your password.</p>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="biz_email" placeholder="Email">
                                </div>
                                <div class="form-group submtit ps-fullwidth">
                                    <button class="ps-btn blue-bg ps-fullwidth text-center" type="submit" >Password Reset</button><br><br>
                                    <span><a href="{{route('seller.seller-login')}}" class="blue-text" style="font-weight: 800">Back To Login</a></span>
                                    <!-- <button class="ps-btn blue-bg ps-fullwidth text-center" href="javascript:void(0);" data-toggle="modal" data-target="#login_error">Login</button> -->
                                </div>
                            </div> 
                        </div>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
     <div class="modal fade" id="login_error" tabindex="-1" role="dialog" aria-labelledby="login_error" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-5 text-center"><span class="modal-close" data-dismiss="modal" style="position: absolute;right: 20px;top: 20px;"><i class="icon-cross2"></i></span>
                <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header" style="display: inline-block;">
                        <img src="img/icons/error-icon.png" style="width:50px" class="mb-4">
                        <p>You Cannot Login As Your Registration Is Either Incomplete Or Your Account Is Under Admin Review.</p>
                          <a href="javascript:void(0);" class="ps-btn blue-bg border-rounded100 mt-4" style="width:auto">Ok</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
    
    <div id="back2top"><i class="icon icon-arrow-up"></i></div>
    <div class="ps-site-overlay"></div>


<script src="{{asset('allUsers/frontend/plugins/jquery.min.js')}}"></script>
      <script src="{{ asset('allUsers/sweet-alert.js') }}"></script>

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
      <script src="{{asset('allUsers/frontend/plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
      <!-- <script src="{{asset('allUsers/frontend/plugins/sticky-sidebar/dist/sticky-sidebar.min.js')}}"></script> -->
      <script src="{{asset('allUsers/frontend/plugins/select2/dist/js/select2.full.min.js')}}"></script>
      <!-- <script src="{{asset('allUsers/frontend/plugins/gmap3.min.js')}}"></script> -->
      <!-- custom scripts-->
      <script src="{{asset('allUsers/frontend/js/main.js')}}"></script>

      <script type="module" src="{{asset('allUsers/customer/seller-auth.js')}}"></script>
    <script type="text/javascript" src="{{ asset('allUsers/customer/js/my-scripts.js') }}"></script>

     
   </body>
</html>