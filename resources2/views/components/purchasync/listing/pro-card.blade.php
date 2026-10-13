<div class="ps-product">
    <div class="ps-product__thumbnail">

        <a href="{{ route('customer.product-detail',[$categorySlug,$product->slug,$product->sku,$product->uuid]) }}">
            @isset($images[0])
            <img src="{{ $path }}{{ $images[0]->image }}" alt="" height="300" />
            @endisset
            @if ($images[0] === null)
            <img src="https://placehold.co/225x275?text=Image+Not+Available" height="300" alt="" />
            @endif
        </a>
        @if($product->discount > 0)
        <div class="ps-product__badge">{{ $product->discount > 0 ? $product->discount.'%' : '' }}</div>
        @endif
        <div class="compare__box compare_checkbox_div">
            <input type="checkbox" class="compare_checkbox" data-product-id="{{ $product->id }}" {{
                in_array($product->id, session('compareProducts', [])) ? 'checked' : '' }} /> Compare
        </div>


    </div>
    <div class="ps-product__container">
        <div class="ps-product__content">
            <div class="ps-product__rating">

                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star text-warning" aria-hidden="true"></i>
                <i class="fa fa-star text-secondary" aria-hidden="true"></i>

            </div>
            <span class="text-uppercase pink-text fs-12"> <a
                    href="{{ route('customer.supplier-detail',[$product->seller_id]) }}">{{ $category->category_name
                    }}</a></span> <br>
            <a class="ps-product__title"
                href="{{ route('customer.product-detail',[$categorySlug,$product->slug,$product->sku,$product->uuid]) }}">
                {{ \Str::limit($product->name, 100, '...') }}</a>
            <!--<p class="ps-product__vendor">-->
            <!--    {{ \Str::limit($product->short_desc, 62, '...') }}-->
            <!--</p>-->

            <p class="ps-product__vendor product__brand">
                Sold By : <span class="text-uppercase pink-text">{{ $product->seller?->biz_company ?? ''}} </span> <br>
                Brand : <span class="text-uppercase pink-text">{{ $product->brand_name }}</span> <br>
                Country of Origin : <span class="text-uppercase pink-text"> {{ $product?->countryOfOrigin?->name}}
                </span> <br>
                @if(!empty($product?->packing_type)) <span class="text-uppercase pink-text">{{
                    $product?->packing_type}}</span>,@endif
                @if(!empty($product?->productTypeValueOne?->type_value)) <span class="text-uppercase pink-text">{{
                    $product?->productTypeValueOne?->type_value}}</span>,@endif
                @if(!empty($product?->productTypeValueTwo?->type_value)) <span class="text-uppercase pink-text">{{
                    $product?->productTypeValueTwo?->type_value}}</span>@endif
            </p>

            <div class="ps-actionBtn mb-4 text-center wishlist-div">
               @auth('buyer')
               <!--<a class="ps-btn ps-btn--sm  {{ $isAskForSample ? 'blue'  : 'blue-outline' }}  my-1" href="{{ route('buyer.ask-for-sample')}}" >Request Sample</a>-->
                
                <a class="ps-btn ps-btn--sm  {{ $isAskForSample ? 'blue'  : 'blue-outline' }}  my-1" onclick="product_id_for_sample_request({{$product?->id}})" 
                href="javascript:void(0)"  
                 {{ !$isAskForSample  ?  'data-toggle=modal'  : '' }} data-target="{{ count(Auth::guard('buyer')->user()->addresses)  == 0 ? '#addressModal'  : '#requestForSampleModal' }}" >
                   {{ $isAskForSample ? 'Requested'  : 'Request' }} Sample 
                    </a>
                <!--<a class="ps-btn ps-btn--sm  {{ $isAskForSample ? 'blue'  : 'blue-outline' }}  my-1" onclick="product_id_for_sample_request({{$product?->id}})"-->
                <!--data-toggle="modal" data-target="{{ count(Auth::guard('buyer')->user()->addresses)  == 0 ? '#addressModal'  : '#requestForSampleModal' }}">Request Sample</a>-->
                
                
                <a class="ps-btn ps-btn--sm my-1" href="#">Add to Cart</a>
                <a class="ps-btn ps-btn--sm my-1 wishIcon wishlist blue-transparent" href="{{ route('buyer.add-to-wishlist',[$product->id]) }}" >
                    <i class="fa {{ $product->inMyWishlist ? 'fa-heart'  : 'fa-heart-o' }}   wishlist-live-btn" data-product-id="{{ $product->id }}"  aria-hidden="true"></i>  
                </a>
                
               @endauth
               
               @guest('buyer')
                    <a class="ps-btn ps-btn--sm  blue-outline  my-1 " href="{{route('buyer.login')}}">Request Sample</a>
                    <a class="ps-btn ps-btn--sm my-1" href="{{route('buyer.login')}}">Add to Cart</a>
                    <a class="ps-btn ps-btn--sm my-1 blue-transparent" href="{{route('buyer.login')}}"><i class="fa fa-heart-o"  aria-hidden="true"></i></a>
               @endguest 
                
                

            </div>

        </div>
    </div>
</div>