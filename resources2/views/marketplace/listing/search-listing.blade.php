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
                
                @if(request()->get('type') == "Supplier")
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">
                            
                            @foreach(getCategories() as $category)
                            
                            <li class="menu-item-has-children"><a href="">{{$category->category_name}}</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                @if(isset($category->children) && !empty($category->children))
                                <ul class="sub-menu">
                                    
                                    @foreach($category->children as $category)
                                    <li><a href="">{{$category->category_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            
                            @endforeach
                            
                        </ul>
                    </aside>
                </div>
                @endif
                <div class="@if(request()->get('type') == "Supplier") ps-layout__right  @endif">
                    <div class="ps-shopping ps-tab-root">
                        
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                @if(request()->get('type') === 'Architect')
                                 @include('marketplace.listing.card.architector-listing')
                                @endif
                                
                                @if(request()->get('type') === 'Contractor')
                                 @include('marketplace.listing.card.architector-listing')
                                @endif
                                
                                @if(request()->get('type') === 'Developer')
                                 @include('marketplace.listing.card.architector-listing')
                                @endif
                                
                                
                                
                                
                                @if(request()->get('type') === 'Supplier')
                                 @include('marketplace.listing.card.supplier-listing')
                                @endif
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
@endsection