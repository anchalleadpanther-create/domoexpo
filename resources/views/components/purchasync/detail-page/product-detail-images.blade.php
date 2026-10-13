<div class="ps-product__thumbnail" data-vertical="false">
    <figure>
        <div class="ps-wrapper">
            <div class="ps-product__gallery" data-arrow="true">

                @if (!$product->images->isEmpty())
                @foreach ($product->images as $key => $image)
                <div class="item"><a
                        href="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"><img
                            src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                            alt=""></a></div>

                @endforeach
                @endif
            </div>
        </div>
    </figure>
    <div class="ps-product__variants" data-item="6" data-md="6" data-sm="6" data-arrow="false">

        @if (!$product->images->isEmpty())
        @foreach ($product->images as $key => $image)
        <div class="item"><img
                src="{{ isset($image->image) ? asset('uploads/products') . '/' . $image->image : asset('allUsers/icon-thumb.png') }}"
                alt=""></div>
        @endforeach
        @endif
    </div>
</div>
</div>