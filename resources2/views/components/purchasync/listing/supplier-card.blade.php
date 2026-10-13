<div class="ps-shopping-product ps-services-product">
    <div class="ps-product ps-product--wide">
        <div class="ps-product__thumbnail">
            <a href="{{ route('customer.supplier-detail',[$supplier->id]) }}"><img
                    src="{{ asset('allUsers/frontend/img/products/supplier/supplier-img1.png') }}" alt="" />

                @if($supplier->biz_company_logo)
                <img src="{{ $path }}{{ $supplier->biz_company_logo}}" alt="" width="200" height="150" />
                @endif
                @if ($supplier->biz_company_logo == null)
                <img src="https://placehold.co/200x200?text=Image+Not+Available" alt="" />
                @endif
                <div class="compare__box compare_checkbox_div">
                    <input type="checkbox" class="supplier_compare_checkbox" data-supplier-id="{{ $supplier->id }}" {{
                        in_array($supplier->id, session('compareSuppliers', [])) ? 'checked' : '' }} /> Compare
                  <!--  <a href="{{route('customer.product.compare')}}" target="_blank"-->
                  <!--class="ps-btn w-100 text-center">COMPARE</a>-->
                </div>

            </a>
        </div>
        <div class="ps-product__container">
            <div class="ps-product__content">
                <div class="d-flex">
                    <a class="ps-product__title ps-services-product__title"
                        href="{{ route('customer.supplier-detail',[$supplier->id]) }}">{{ $supplier->biz_company }}</a>
                    <div class="ps-product__rating">
                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                        <i class="fa fa-star text-secondary" aria-hidden="true"></i>
                    </div>
                </div>
                <p>
                    {{ $supplier->officeState?->name }}, {{ $supplier->officeCountry?->name }}
                    <span class="btn btn-xs btn-success">Best Match</span>
                </p>
                <p>
                    <span class="btn btn-lg btn-lightGreen">Recommend For You</span>
                </p>
                <h4 class="blue-text">Associate Categories </h4>
                <ul class="ps-product__desc ps_associate-categories">

                    @foreach($supplier->mappedProductCategories()->limit(10)->get() as $value)
                    <li class="mt-1">{{$value->category_name}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="ps-product__shopping">
                <div class="text-right">
                    <img src="{{ asset('allUsers/frontend/img/icons/verified-icon.png')}}" width="100" height="40" />
                </div>
                <!--<ul class="ps-product__desc d-flex justify-content-end mt-3">-->
                <!--    <li>Women Owned</li>-->
                <!--    <li class="ml-3">SME</li>-->
                <!--</ul>-->
                <a class="ps-btn ps-btn--sm blue-bg mt-3" href="{{ route('buyer.add-to-wishlist-designer',[$supplier->id]) }}">Add as Favorite Supplier <i class="fa {{ $supplier->inMyWishlist ? 'fa-heart'  : 'fa-heart-o' }}  wishlist-live-btn" data-product-id="{{ $supplier->id }}"  aria-hidden="true"></i></a>
                <!--<a class="ps-btn ps-btn--sm my-1 wishIcon wishlist blue-transparent" href="{{ route('buyer.add-to-wishlist',[$supplier->id]) }}" >-->
                    
                <!--</a>-->
                {{-- <a class="ps-btn ps-btn--sm blue-outline mt-3" href="#">Add as Credit Supplier</a> --}}
            </div>
        </div>
    </div>
</div>