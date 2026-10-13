<div class="ps-shopping-product ps-services-product">
    <div class="ps-product ps-product--wide">
        <div class="ps-product__thumbnail" style="min-height: 200px;min-width: 225px;">
            <a href="{{ route('customer.service-detail',[$service->slug]) }}">
                @isset($service->images)
                <img src="{{ $path }}{{ $service->images[0]->image }}" alt="" class="rounded w-100 h-100" />
                @endisset
                @if ($service->images === null)
                <img src="https://placehold.co/200x200?text=Image+Not+Available" alt="" />
                @endif
            </a>
            {{-- <a href=" "><img src="allUsers/frontend/img/products/services/service-img1.png" alt="" /></a> --}}
        </div>
        <div class="ps-product__container">
            <div class="ps-product__content w-75" >
                <a class="ps-product__title ps-services-product__title" href=" ">{{ $service->title }}</a>
                <!--<p class="ps-product__vendor product__brand">-->
                    <!--<span>Sold By : <a href="{{ route('customer.supplier-detail',[$service->seller_id]) }}"> {{ $service->seller->biz_company }} </a></span>-->
                <!--</p>-->
                <div class="ps-product__rating">
                    
                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                    <i class="fa fa-star text-secondary" aria-hidden="true"></i>
                 
                </div>
                
                {{-- <h4 class="mt-4">
                    {{ $currency}} 499.00 <small class="ml-2">1 hr 5 mins</small>
                </h4> --}}
                <ul class="ps-product__desc">
                    <li>
                        {{ \Str::limit($service->description, 150, '...') }}
                    </li>
                    <!--<li>-->
                    <!--    Included : {{ \Str::limit($service->includes, 60, '...') }}-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--    Excluded : {{ \Str::limit($service->excludes, 60, '...') }}-->
                    <!--</li>-->
                </ul>
                <!--<p>-->
                <!--    <span>Included : {{ \Str::limit($service->includes, 60, '...') }}</span>-->
                <!--</p>-->
                
            </div>
            <div class="ps-product__shopping">
                <div class="ps-product__actions">
                    <h4 class="mb-0 text-right">
                        Good<br /><small>474 reviews</small>
                    </h4>
                    <div class="ps-product__badge ps-product__reviewBox ml-3">
                        7.4
                    </div>
                </div>
                @auth('buyer')
                <a class="ps-btn ps-btn--sm blue-bg mt-4" href="{{url('/')}}/rfq">Request for Sample</a>
                @endauth
                @guest('buyer')
                <a class="ps-btn ps-btn--sm blue-bg mt-4" href="{{route('buyer.login')}}">Request for Sample</a>
                @endguest
                
            </div>
        </div>
    </div>
</div>