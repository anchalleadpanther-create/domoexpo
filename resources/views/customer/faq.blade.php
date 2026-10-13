@extends('purchasync.partials.header')
@section('customerContent')
<style>
   #faq .card {
   margin-bottom: 20px;
   border: 0;
   }
   #faq .card .card-header {
   -webkit-box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
   box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
   border-radius: 2px;
   padding: 0;
   }
   #faq .card .card-header .btn-header-link {
   color: #fff;
   display: block;
   text-align: left;
   background: #E5EAF5;
   color: #222;
   padding: 10px;  border:1px solid #B9C4DC;  font-size: 14px;border-radius:5px;font-weight:bold;
   }
   #faq .card .card-header .btn-header-link:after {
   content: "\e93a";
   font: normal normal normal 12px / 1 linearicons;
   position: absolute;
   top: 50%;
   transform: translateY(-50%);
   right: 10px;
   font-weight: bold;
   }
   #faq .card .card-header .btn-header-link.collapsed {
   background: #E5EAF5;
   color: #000;
   }
   #faq .card .card-header .btn-header-link.collapsed:after {
   content: "\e939";
   }
   #faq .card .card-body{background:#fff;}
   #faq .card .collapsing {
   background: #E5EAF5;
   line-height: 30px;
   }
   #faq .card .collapse {
   border: 0;
   }
   #faq .card .collapse.show {
   background: #E5EAF5;
   line-height: 30px;
   color: #222;
   }
   .ps-footer{border-top:1px solid #ddd;}
   div#faq {
   margin: 50px 0;
   }
</style>
<!--Body Container-->
<div id="page-content">
   <!--Collection Banner-->
   <div class="collection-header" style=" background: url(../allUsers/frontend/img/static-banner.png);padding: 130px 0;background-size: cover;">
      <div class="collection-hero">
         <div class="collection-hero__image"></div>
         <div class="collection-hero__title-wrapper container">
            <div class="breadcrumbs text-uppercase mt-1 mt-lg-2" style="text-align:center">
               <span class="fw-bold" style=" font-size: 35px !important;font-weight: 600;color:#fff">Faq's</span>
            </div>
         </div>
      </div>
   </div>
   <!--End Collection Banner-->
   <!--Main Content-->
   <div class="container mt-5 static_content">
      <div class="row">
         <div class="col-12 text-left">
            <div class="accordion" id="faq">
                
                @foreach($faqs as $key => $value)
               <div class="card">
                  <div class="card-header" id="faqhead1">
                     <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                        aria-expanded="true" aria-controls="faq1">{{$value->question}}</a>
                  </div>
                  <div id="faq1" class="collapse show {{$key == 0 ? 'show' : ''}}" aria-labelledby="faqhead1" data-parent="#faq">
                     <div class="card-body">
                         {{$value->answer}}
                     </div>
                  </div>
               </div>
               @endforeach
               
            </div>
         </div>
      </div>
   </div>
   <!--End Main Content-->
</div>
<!--End Body Container-->
<!--End Body Container-->
@endsection