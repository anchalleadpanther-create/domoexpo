<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
    <div class="ps-product">
        <div class="ps-product__thumbnail"><a href="{{route('customer.buyer-users-detail',[$architect->account_type,$architect->id])}}">
            <img src="{{!empty($architect->photo) ? asset('uploads/buyer/'.$architect->photo)  : asset('allUsers/frontend/img/products/shop/3.jpg') }}" height="200" width="200" alt="" /></a>
            <!--<ul class="ps-product__actions">-->
            <!--    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>-->
            <!--    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>-->
            <!--    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a> </li>-->
            <!--    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>-->
            <!--</ul>-->
        </div>
        <div class="ps-product__container"><a class="ps-product__vendor" href="{{route('customer.buyer-users-detail',[$architect->account_type,$architect->id])}}">{{$architect->account_type ?? ""}}</a>
            <div class="ps-product__content">
                <a class="ps-product__title" href="{{route('customer.buyer-users-detail',[$architect->account_type,$architect->id])}}">
                    {{$architect->first_name ?? ""}} {{$architect->last_name ?? ""}}
                    
                </a>
                <p>{{ $architect->company_name }}</p>
            </div>
            
        </div>
    </div>
</div>