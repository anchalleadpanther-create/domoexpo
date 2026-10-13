
@foreach ($products as $key => $product)
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
    <x-marketplace.product-card :product="$product" showWishlist="false" :isProductListPage="true" />
</div>
@endforeach

<div class="ps-pagination pt-4 product-pagination-div d-none">
    

    {{-- {!! $products->onEachSide(5)->appends(request()->input())->links('pagination::bootstrap-4')
    !!} --}}
    {!! $products->appends(request()->query())->links('pagination::bootstrap-4') !!}
</div>