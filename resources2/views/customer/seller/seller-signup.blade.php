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
      <title>Seller Signup | Purchasync</title>
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
            line-height: 22px;
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
                  <li>Sign Up</li>
               </ul>
            </div>
         </div>
           @include('extensions.sweet-alert')
           @routes
         <div class="ps-my-account">
            <div class="container"> 
            <div class="col-sm-12 text-center"><img src="https://purchasync.com/allUsers/frontend/img/logo-photo.png" style=" width: 200px; margin-bottom: 20px;"></div>
                        
               <div class="ps-form--account ps-tab-root ps-form--account-width rounded" style="margin:30px auto" >
                  <form id="sellerSignupFrom1" class="sellerSignupFrom" action="{{route('seller.save-seller-signup')}}" method="post">
                   @csrf()
                     <div id="main">
                         
                        <div id="div1" class="step first current submit-form">
                           <div class="ps-tabs">
                              <div class="ps-tab active" id="sign-in">
                                 <div class="ps-form__content">
                                    <h5>Purchasync</h5>
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> 
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <h4 class="mb-4 login_heading">Create your account..</h4>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">First Name :</label>
                                             <input class="form-control" name="biz_name" type="text" />
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Surname :</label>
                                             <input class="form-control" name="biz_surname" type="text" />
                                          </div>
                                       </div>
                                      
                                      
                                       <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                             <label class="mb-2">Email Address :</label>
                                             <input class="form-control" name="biz_email" type="text"  />
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group mb-4">
                                          <label class="mb-2">Mobile No. :</label>
                                          <div class="row">
                                             <div class="col-4" style="padding-right: 5px;">
                                                   <select class="form-select" name="biz_phonecode" id="phonecode-select" style="padding: 0; text-align: center;">
                                                      @foreach (getCountries() as $country)
                                                            <option value="{{ $country->phonecode }}"  data-image="{{ $country->flag_icon}}" >{{ $country->phonecode }}</option>
                                                      @endforeach
                                                   </select>
                                                </div>

                                             <div class="col-8"  style="padding-left: 5px;">
                                                   <input class="form-control" name="biz_phone" type="text" />
                                             </div>
                                          </div>
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
                                       <div class="col-sm-12 text-center">
                                          <img src="{{ asset('allUsers/frontend/img/icons/email-icon.png') }}" style="width:100px" class="mb-4">
                                          <h3 class="mb-2 login_heading">Thank you for registering...</h3>
                                          <p>Please check your email...</p>
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
                                <button class="ps-btn ps-btn--sm blue-bg" type="button" onclick="previous()" id="prev">Prev</button>
                                <!--<button class="ps-btn blue-bg ps-fullwidth text-center" type="submit" id="login-submit-btn" >Login</button><br><br>-->
                                <button class="ps-btn blue-bg ps-fullwidth text-center signup-form-btn" type="submit" id="next">Create Purchasync account</button>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group  mt-3 mb-4">
                                 <div class="ps-checkbox text-center">
                                    <span class=" green-bg" style="display: flex;justify-content: center;"  >If already have an account <a  class="blue-text" href="{{route('seller.seller-login')}}"  style="font-weight: 800;margin-left: 5px;font-size:15px;"> Login here</a></span>

                                    By Signing up, I agree to the <a href="" class="blue-text" style="font-weight: 600;font-size:15px;"> Terms & Conditions </a>& Purchasync <a href="" class="blue-text"  style="font-weight: 600;font-size:15px;">Privacy Policy.</a>
                                
                                 </div>
                                 
                                 
                                </div>
                            </div>
                       </div>
                    </div>
                        
                     <!--<div class="form-group submtit  mb-0 gap-mt50 text-right col-sm-12 p-0 d-flex justify-content-end" id="submit-buttons">-->
                     <!--   <button class="ps-btn ps-btn--sm blue-bg" type="button" onclick="previous()" id="prev">Prev</button>-->
                     <!--   <button class="ps-btn ps-btn--sm green-bg signup-form-btn" type="submit" id="next">Create Purchasync account</button>-->
                        <!-- <button class="ps-btn ps-btn--sm green-bg signup-form-btn" type="submit" id="submit_button">Save & Submit</button> -->
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

      <script type="module" src="{{asset('allUsers/customer/seller-auth.js')}}"></script>




      <script>


        $(document).ready(function() {
            $('#phonecode-select').select2({
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





// document.addEventListener('DOMContentLoaded', function() {
//     const countries = @json(getCountries());
//     const input = document.getElementById('countryInput');
//     const tagsContainer = document.getElementById('tagsContainer');

//     input.addEventListener('input', function() {
//         const query = this.value.toLowerCase();
//         const filteredCountries = countries.filter(country => country.name.toLowerCase().includes(query));
//         showAutocompleteSuggestions(filteredCountries);
//     });

//     input.addEventListener('keypress', function(event) {
//         if (event.key === 'Enter') {
//             event.preventDefault();
//             const query = this.value.toLowerCase();
//             const matchingCountry = countries.find(country => country.name.toLowerCase() === query);
//             if (matchingCountry) {
//                 addTag(matchingCountry.id,matchingCountry.name);
//                 this.value = '';
//                 removeAutocompleteSuggestions();
//             }
//         }
//     });

//     function showAutocompleteSuggestions(filteredCountries) {
//         removeAutocompleteSuggestions();
//         const autocompleteItems = document.createElement('div');
//         autocompleteItems.setAttribute('class', 'autocomplete-items');
//         input.parentNode.appendChild(autocompleteItems);
//         filteredCountries.forEach(country => {
//             const item = document.createElement('div');
//             item.innerHTML = country.name;
//             item.addEventListener('click', function() {
//                 addTag(country.id,country.name);
//                 input.value = '';
//                 removeAutocompleteSuggestions();
//             });
//             autocompleteItems.appendChild(item);
//         });
//     }

//     function removeAutocompleteSuggestions() {
//         const autocompleteItems = document.querySelector('.autocomplete-items');
//         if (autocompleteItems) {
//             autocompleteItems.parentNode.removeChild(autocompleteItems);
//         }
//     }

//     function addTag(id,name) {
//         const tag = document.createElement('div');
//         tag.classList.add('tag');
        
//         const inputField = document.createElement('input');
//         inputField.type = 'hidden';
//         inputField.name = 'country[]';
//         inputField.value = id;
        
//         const tagName = document.createElement('span');
//         tagName.textContent = name;
        
//         const closeIcon = document.createElement('i');
//         closeIcon.classList.add('fa', 'fa-close');
//         closeIcon.addEventListener('click', function() {
//             tag.parentNode.removeChild(tag);
//         });
        
//         tag.appendChild(inputField);
//         tag.appendChild(tagName);
//         tag.appendChild(closeIcon);
        
//         tagsContainer.appendChild(tag);
//     }

//     document.addEventListener('click', function(e) {
//         if (!input.contains(e.target) && !tagsContainer.contains(e.target)) {
//             removeAutocompleteSuggestions();
//         }
//     });
// });


      </script>
   </body>
</html>