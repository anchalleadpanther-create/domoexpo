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
      <title>Buyer Signup | {{env('APP_NAME')}}</title>
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
      
      /* Set the width of the Select2 container */
      .select2-container--default {
            width: 105.8px !important;
        }
        .select2-container--default .select2-selection--single {
            width: 95% !important; /* Fixed width for the dropdown */
            padding: 0;
            text-align: center;
            white-space: nowrap; /* Prevent wrapping inside the select box */
            overflow-x: hidden; /* Hide overflow content initially */
            border-radius: 5px;
            border: 2px solid #ebebeb;
        }
        
        /* Customize the dropdown menu itself */
        .select2-container--default .select2-results > .select2-results__options {
            max-width: none; /* Remove max width limitation */
            overflow-x: auto; /* Enable horizontal scrolling */
            white-space: nowrap; /* Prevent wrapping of options */
            
        }
        
        .select2-container--default .select2-results > .select2-results__options {
            max-height: 200px;
            overflow-y: auto;
            scrollbar-width: none;
        }
        
        /* Optional: Adjust the scrollbar appearance */
        .select2-container--default .select2-results > .select2-results__options::-webkit-scrollbar {
            height: 6px; /* Set scrollbar height */
        }
        
        .select2-container--default .select2-results > .select2-results__options::-webkit-scrollbar-thumb {
            background-color: #aaa; /* Set scrollbar thumb color */
            border-radius: 10px; /* Round the corners of the scrollbar thumb */
        }
        
       .select2-container .select2-dropdown--below, .select2-container .select2-dropdown--above{
           border: 1px solid #ebebeb;
           width: 100.8px !important;
       }
       
       .select2-container .select2-dropdown--below .select2-search--dropdown input, .select2-container .select2-dropdown--above .select2-search--dropdown input{
           border: 2px solid #ebebeb;
       }
       
       
        
        .select2 .select2-selection--single .select2-selection__rendered {
            line-height: 28px;
            padding: 10px 0px;
            
        }
        
      </style>
   </head>
   <body class="login_page">
      <div class="ps-page--my-account">
         <div class="ps-breadcrumb">
            <div class="container">
               <ul class="breadcrumb">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li>Buyer Sign Up</li>
               </ul>
            </div>
         </div>
           @include('extensions.sweet-alert')
           @routes
         <div class="ps-my-account">
             <div class="col-sm-12 text-center"><img src="{{asset('allUsers/frontend/img/logo-photo.png')}}" style=" width: 62px; margin-bottom: 20px;"></div>
                        
            <div class="container"> 
               <div class="ps-form--account ps-tab-root ps-form--account-width rounded  m-auto" >
                    
                  <form id="sellerSignupFrom1" class="register-form" action="{{route('buyer.register')}}" method="post">
                   @csrf()
                     <div id="main">
                        <div id="div1" class="step first current submit-form">
                            
                           <div class="ps-tabs">
                              
                              <div class="ps-tab active" id="sign-in">
                                 <div class="ps-form__content">
                                    <h5>{{env('APP_NAME')}}</h5>
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> 
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <h4 class="mb-4 login_heading">Create your account.</h4>
                                       </div>
                                       
                                       <div class="col-sm-12 mb-4" >
                                           <label class="mb-2">Account Type :</label>
                                           <select class="form-control" name="account_type" id="account_type" required>
                                               <option value="" >Select</option>
                                               <option value="Buyer" >Buyer</option>
                                               <option value="Developer" >Developer</option>
                                              <option value="Architect" >Architect</option>
                                              <option value="Contractor" >Contractor</option>
                                              <option value="Quantity Surveyor" >Quantity Surveyor</option>
                                           </select>
                                        </div>
                                        
                                        
                                        <div class="col-sm-12 hiddenJsFunction">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Company Name :</label>
                                             <input class="form-control" name="company_name" type="text" />
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-6 hiddenJsFunction">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Registration Number:</label>
                                             <input class="form-control" name="registration_no" type="text" />
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-6 hiddenJsFunction">
                                          <div class="form-group mb-4 hiddenJsFunction">
                                             <label class="mb-2">VAT Number :</label>
                                             <input class="form-control" name="vat_no" type="text" />
                                          </div>
                                       </div>
                                       
                                       
                                       
                                       <div class="col-sm-6 hiddenJsFunction">
                                          <div class="form-group mb-4">
                                          <label class="mb-2">Telephone No. :</label>
                                          <div class="row">
                                                <div class="col-4" style="padding-right: 5px;">
                                                   <select class="form-select phonecode" name="telephone_code" id="companyphonecode" style="padding: 0; text-align: center;">
                                                      @foreach (getCountries() as $country)
                                                            <option value="{{ $country->phonecode }}" {{$country->phonecode == '357' ? 'selected' : ''}}  data-image="{{ $country->flag_icon}}" >{{ $country->phonecode }}</option>
                                                      @endforeach
                                                   </select>
                                                </div>

                                             <div class="col-8"  style="padding-left: 5px;">
                                                   <input class="form-control" name="telephone_no" type="text" />
                                             </div>
                                          </div>
                                          </div>
                                       </div>
                                       
                                       
                                       
                                       <div class="col-sm-6 hiddenJsFunction">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Company Email :</label>
                                             <input class="form-control" name="company_email" type="text"  />
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Contact Person Name :</label>
                                             <input class="form-control" name="first_name" type="text" />
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Contact Person Surname :</label>
                                             <input class="form-control" name="last_name" type="text" />
                                          </div>
                                       </div>
                                      
                                      
                                       <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Contact Person Email :</label>
                                             <input class="form-control" name="email" type="text"  />
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                          <label class="mb-2"> Mobile No. :</label>
                                          <div class="row">
                                                <div class="col-4" style="padding-right: 5px;">
                                                   <select class="form-select phonecode" name="phonecode" id="phonecode-select" style="padding: 0; text-align: center;">
                                                      @foreach (getCountries() as $country)
                                                            <option value="{{ $country->phonecode }}" {{$country->phonecode == '357' ? 'selected' : ''}}  data-image="{{ $country->flag_icon}}" >{{ $country->phonecode }}</option>
                                                      @endforeach
                                                   </select>
                                                </div>

                                             <div class="col-8"  style="padding-left: 5px;">
                                                   <input class="form-control" name="phone" type="text" />
                                             </div>
                                          </div>
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-12 ">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Address :</label>
                                             <input class="form-control" name="address" type="text" />
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Password :</label>
                                             <input class="form-control" name="password" type="password" />
                                          </div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Confirm Password :</label>
                                             <input class="form-control"  name="password_confirmation" type="password" />
                                          </div>
                                       </div>
                                     
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="div2" class="last">
                           <div class="ps-tabs">
                              <div class="ps-tab active" id="sign-in">
                                 <div class="ps-form__content">
                                    <div class="row">
                                       <div class="col-sm-12 text-center my-5">
                                          <!--<img src="{{ asset('allUsers/frontend/img/icons/email-icon.png') }}" style="width:100px" class="mb-4">-->
                                          <h3 class="mb-2 login_heading">Thank you for registering...</h3>
                                          <a class="btn btn-primary p-3" href=""> <b>OK</b></a>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div> 
                        <input class="form-control" type="hidden" id="is_signup_complete"  name="is_signup_complete" value="1" />
                       
                    <div class="form-group submtit ps-fullwidth" id="submit-buttons">
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="ps-btn ps-btn--sm  " type="button" onclick="previous()" id="prev">Prev</button>
                                <!--<button class="ps-btn   ps-fullwidth text-center" type="submit" id="login-submit-btn" >Login</button><br><br>-->
                                <button class="ps-btn pink-bg ps-fullwidth text-center register-btn signup-form-btn  py-4" type="submit" id="next">Create {{env('APP_NAME')}} account</button>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group  mt-3 mb-4">
                                 <div class="ps-checkbox text-center">
                                     <span class=" green-bg" style="display: flex;justify-content: center;"  >If already have an account <a  class="blue-text" href="{{route('buyer.login')}}"  style="font-weight: 800;margin-left: 5px;font-size:15px;"> Login here</a></span>

                                   By Signing up, I agree to the <a href="{{url('/')}}/pages/terms-conditions" class="blue-text" style="font-weight: 600;font-size:15px;"> Terms & Conditions </a>& {{env('APP_NAME')}} <a href="{{url('/')}}/pages/policy" class="blue-text"  style="font-weight: 600;font-size:15px;">Privacy Policy.</a>
                                     
                                 </div>
                                 
                                 
                                </div>
                            </div>
                       </div>
                    </div>
                        
                     <!--<div class="form-group submtit  mb-0 gap-mt50 text-right col-sm-12 p-0 d-flex justify-content-end" id="submit-buttons">-->
                     <!--   <button class="ps-btn ps-btn--sm  " type="button" onclick="previous()" id="prev">Prev</button>-->
                     <!--   <button class="ps-btn ps-btn--sm green-bg register-btn" type="submit" id="next">Create {{env('APP_NAME')}} account</button>-->
                        <!-- <button class="ps-btn ps-btn--sm green-bg register-btn" type="submit" id="submit_button">Save & Submit</button> -->
                     <!--</div>-->
                     
                   </form>
               </div>
               
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

      <script type="module" src="{{asset('allUsers/customer/auth.js')}}"></script>

        


    <script>
        document.querySelector('select[name=account_type]').addEventListener('change', function(e) {
            let account_type = e.target.value;
            const hiddenElements = document.querySelectorAll('.hiddenJsFunction');
            if (account_type === 'Buyer') {
                hiddenElements.forEach(function(el) {
                    el.classList.add('d-none');
                });
            } else {
                hiddenElements.forEach(function(el) {
                    el.classList.remove('d-none');
                });
            }
            console.log(value);
        });

    </script>

      <script>


        $(document).ready(function() {
            
             
            $('#phonecode-select,#companyphonecode').select2({
                templateResult: formatState,
                templateSelection: formatState
            });
        
           
            function formatState(state) {
                if (!state.id) {
                    return state.text; // Return the text for placeholder
                }
        
                var baseUrl = $(state.element).data('image');
                var $state = $(
                    '<span><img src="' + baseUrl + '" class="img-flag" style="width: 20px; margin-right: 10px;"/>' + state.text + '</span>'
                );
                return $state;
            }
        });
        
        
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



      </script>
   </body>
</html>