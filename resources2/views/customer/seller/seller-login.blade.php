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
      <title>Seller Signin | Purchasync</title>
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
                    <li><a href="{{ url('/seller/seller') }}">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
        
        <div class="ps-my-account">
            <div class="container">
               
                
                <form class="ps-form--account ps-tab-root login-form" action="" method="get">
                   @csrf
                    <div class="ps-tabs">
                        <div class="col-sm-12 text-center"><img src="https://purchasync.com/allUsers/frontend/img/logo-photo.png" style=" width: 200px; margin-bottom: 20px;"></div>
                        
                        <div class="ps-tab active p-5 border-rounded text-left" id="sign-in">
                            <div class="ps-form__content"> 
                                <h3 class="mb-0">Seller Signin</h3>
                                 <p class="mb-4">Continue to purchasync.com</p>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="biz_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password"  name="password" placeholder="Password">
                                </div> 
                                <div class="form-group submtit ps-fullwidth">
                                    <button class="ps-btn blue-bg ps-fullwidth text-center" type="submit" id="login-submit-btn" >Login</button><br><br>
                                    <span>Don't have a account <a href="{{route('seller.seller-signup')}}" class="blue-text" style="font-weight: 800">Sign Up Here</a></span>
                                    <!-- <button class="ps-btn blue-bg ps-fullwidth text-center" href="javascript:void(0);" data-toggle="modal" data-target="#login_error">Login</button> -->
                                </div>
                                <p class="text-center"><a href="{{ route('seller.forgot-password') }}" class="blue-text">Forgot Password?</a></p>
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

      <script>

         function next() {
         // $('#next').click(function() {
            $('.current').removeClass('current').hide().next().show().addClass('current');  

            $('.current1').removeClass('current1').removeClass('active').next().addClass('active').addClass('current1');
            $( "li.current1" ).prevAll().find('span').addClass('active1');

            if ($('.current').hasClass('first')) {
               $('#prev').css('display', 'none');
               $('#submit-buttons').addClass('justify-content-end').removeClass('justify-content-between');
            }else{
               $('#submit-buttons').addClass('justify-content-between').removeClass('justify-content-end');
            }
            
            if ($('.current').hasClass('last')) {
               $('#prev').css('display', 'none');
               $('#next').css('display', 'none');
            }else{
               $('#prev').css('display', 'block');
               $('#next').css('display', 'block');
            }
            if($('.current').hasClass('submit-form')){
             $('#is_signup_complete').val(1);
            }else{
             $('#is_signup_complete').val(0);
             $('#submit_button').css('display', 'none');
            }

            // $('#prev').css('display', 'block');
         // });
      }
      
      function previous(){
         // $('#prev').click(function() {
            $('.current').removeClass('current').hide()
            .prev().show().addClass('current');
            $('.current1').removeClass('current1').removeClass('active').prev().addClass('active').addClass('current1');
            
            $("li.current1").find('span').removeClass('active1'); 
            
            if ($('.current').hasClass('first')) {
               $('#prev').css('display', 'none');
               $('#submit-buttons').addClass('justify-content-end').removeClass('justify-content-between');
            }else{
               $('#submit-buttons').addClass('justify-content-between').removeClass('justify-content-end');
            }

            if($('.current').hasClass('submit-form')){
             $('#is_signup_complete').val(1);
            }else{
             $('#is_signup_complete').val(0);
             $('#submit_button').css('display', 'none');
            }
            $('#next').css('display', 'block');
         // });

      }





document.addEventListener('DOMContentLoaded', function() {
    const countries = @json(getCountries());
    const input = document.getElementById('countryInput');
    const tagsContainer = document.getElementById('tagsContainer');

    input.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const filteredCountries = countries.filter(country => country.name.toLowerCase().includes(query));
        showAutocompleteSuggestions(filteredCountries);
    });

    input.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const query = this.value.toLowerCase();
            const matchingCountry = countries.find(country => country.name.toLowerCase() === query);
            if (matchingCountry) {
                addTag(matchingCountry.id,matchingCountry.name);
                this.value = '';
                removeAutocompleteSuggestions();
            }
        }
    });

    function showAutocompleteSuggestions(filteredCountries) {
        removeAutocompleteSuggestions();
        const autocompleteItems = document.createElement('div');
        autocompleteItems.setAttribute('class', 'autocomplete-items');
        input.parentNode.appendChild(autocompleteItems);
        filteredCountries.forEach(country => {
            const item = document.createElement('div');
            item.innerHTML = country.name;
            item.addEventListener('click', function() {
                addTag(country.id,country.name);
                input.value = '';
                removeAutocompleteSuggestions();
            });
            autocompleteItems.appendChild(item);
        });
    }

    function removeAutocompleteSuggestions() {
        const autocompleteItems = document.querySelector('.autocomplete-items');
        if (autocompleteItems) {
            autocompleteItems.parentNode.removeChild(autocompleteItems);
        }
    }

    function addTag(id,name) {
        const tag = document.createElement('div');
        tag.classList.add('tag');
        
        const inputField = document.createElement('input');
        inputField.type = 'hidden';
        inputField.name = 'country[]';
        inputField.value = id;
        
        const tagName = document.createElement('span');
        tagName.textContent = name;
        
        const closeIcon = document.createElement('i');
        closeIcon.classList.add('fa', 'fa-close');
        closeIcon.addEventListener('click', function() {
            tag.parentNode.removeChild(tag);
        });
        
        tag.appendChild(inputField);
        tag.appendChild(tagName);
        tag.appendChild(closeIcon);
        
        tagsContainer.appendChild(tag);
    }

    document.addEventListener('click', function(e) {
        if (!input.contains(e.target) && !tagsContainer.contains(e.target)) {
            removeAutocompleteSuggestions();
        }
    });
});


      </script>
   </body>
</html>