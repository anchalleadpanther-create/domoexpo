@extends('marketplace.partials.header')
@section('content')
 

<div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="">Page</a></li>
                <li>{{$page->name}}</li>
            </ul>
        </div>
    </div>
<div class="ps-page--shop" id="shop-sidebar">
        <div class="container-fluid">
		
            <div class="ps-layout--shop">
              
                <div class="row">
                    @if(!empty($page->image))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        
                        <!-- Hide on mobile -->
                        <a class="ps-collection" href="#"><img src="{{!empty($page->image) ? asset('uploads/page/'.$page->image) :  '' }}" alt="" style="height:450px"></a>
                       
                    </div>
                    
                     @endif
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 my-5 mx-5 ">
                        <div class="ps-tabs">
                            <div class="w-75">
                               {!!$page->content!!}
                               
                               </div>
                        </div>
                    </div>
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   </div>  
    
    

    
    @endsection
    
    
    
    