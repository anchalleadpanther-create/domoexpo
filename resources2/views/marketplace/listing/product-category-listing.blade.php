@extends('marketplace.partials.header')
@section('content')


<div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Shop</li>
            </ul>
        </div>
    </div>
<div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
		
            <div class="ps-layout--shop">
                
                <!--Filterrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr-->
                @include('marketplace.listing.product-filters')
                <!--End of filterrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrEnddddddddd-->
               
                <div class="@if(request()->get('type') == "Supplier") ps-layout__right  @endif">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p><strong> {{count($products) ?? 0}}</strong> {{request()->get('pagetype')}} found</p>
                            <div class="ps-shopping__actions">
                                <select class="ps-select" data-placeholder="Sort Items">
                                    <option>Sort by latest</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                                <div class="ps-shopping__view">
                                    <p>View</p>
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="row">
                                 @include('marketplace.listing.card.product-listing')
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
@endsection