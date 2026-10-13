@extends('purchasync.partials.header')
@section('customerContent')

<div class="ps-page--shop ps-product-list ps-pt-60 ps-pb-60">
    <div class="container">
        <div class="table-responsive">


            @if(count($products) > 0)

            <table class="table table-bordered ps-table ps-table--specification table-striped">
                <!--<thead>-->
                    
                <!--</thead>-->
                <tbody>
                    <tr>
                        <th style="width:200px"> </th>
                        @foreach ($products as $product)
                        <th style="text-align:center">
                            @isset($product->images[0])
                            <img src="{{ asset('uploads/products/'.$product->images[0]->image) }}" class="rounded" alt=""
                                width="100" height="100" />
                            @else
                            <img src="https://placehold.co/225x275?text=Image+Not+Available" class="rounded" height="150" alt="" />
                            @endisset
                            <br>
                             @auth('buyer')
                             <a href="{{url('/')}}/buyer/buyer-create-rfq/rfq-detail" class="ps-btn ps-btn--sm blue-bg mt-3">Get Quote</a>
                             @endauth
                             @guest('buyer')
                             <a href="{{route('buyer.login')}}" class="ps-btn ps-btn--sm blue-bg mt-3">Get Quote</a>
                             @endguest
                        </th>
                        @endforeach
                    </tr>
                    <tr>
                        <td ></td>
                        @foreach ($products as $product)
                        <td><a style="color:#06c"
                                href="{{ route('customer.product-detail', [$product->mappedCategories->last()->category_slug, $product->slug, $product->sku, $product->uuid]) }}">
                            <strong>View Details</strong></a></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><b>Sold By</b></td>
                        @foreach ($products as $product)
                        <td>{{ @$product?->seller?->biz_name}} {{ @$product?->seller?->biz_surname}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><b>Brand</b></td>
                        @foreach ($products as $product)
                        <td>{{ @$product->brand->brand_name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><b>Country of Origin</b></td>
                        @foreach ($products as $product)
                        <td>{{ $product?->countryOfOrigin?->name ?? '' }}</td>
                        @endforeach
                    </tr>

                    <tr>
                        <td><b>Certificate</b></td>
                        @foreach ($products as $product)
                        <td>
                            {{-- {{ @$product->certificate }} --}}

                            @php
                            $sustainability_certificates =
                            getDropdownValues(json_decode($product->seller->sustainability_certificates))
                            @endphp

                            @foreach (getDropdownValues(json_decode($product->seller->quality_certificates)) as $value)
                            <span> {{ $value->dropdown_value }}</span>,
                            @endforeach

                            @foreach ($sustainability_certificates as $value)
                            <span> {{ $value->dropdown_value }}</span>,
                            @endforeach
                            @foreach (getDropdownValues(json_decode($product->seller->other_certificates)) as $value)
                            <span> {{ $value->dropdown_value }}</span>,
                            @endforeach

                        </td>
                        @endforeach
                    </tr>

                    <tr>
                        <td><b>Label</b></td>
                        @foreach ($products as $product)
                        <td>{{ @$product->product_labels }}</td>
                        @endforeach
                    </tr>

                    <tr>
                        <td><b>Warranty</b></td>
                        @foreach ($products as $product)
                        <td>{{ @$product->warranty_terms }}</td>
                        @endforeach
                    </tr>


                    <tr>
                        <td><b>Rating / Review</b></td>
                        @foreach ($products as $product)
                        <td>5 out of 5</td>
                        @endforeach
                    </tr>

                </tbody>
            </table>

            @else

            <table class="table table-bordered ps-table ps-table--specification">
                <thead>
                    <tr>
                        <th class="text-center">Add Products To Compare.</th>
                    </tr>
                </thead>

            </table>

            @endif


















            <!--<table class="table table-bordered ps-table ps-table--specification">-->
            <!--   <tbody>-->
            <!--      <tr>-->
            <!--         <td style="width:200px"></td>-->
            <!--         <td style="text-align:center">-->
            <!--            <img src="img/products/supplier/supplier-img1.png" style="width:100px"><br>-->
            <!--            <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Get Quote</a>-->
            <!--         </td>-->
            <!--         <td style="text-align:center">-->
            <!--            <img src="img/products/supplier/supplier-img2.png" style="width:100px"><br>-->
            <!--            <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Get Quote</a>-->
            <!--         </td>-->
            <!--         <td style="text-align:center">-->
            <!--            <img src="img/products/supplier/supplier-img3.png" style="width:100px"><br>-->
            <!--            <a class="ps-btn ps-btn--sm blue-bg mt-3" href="#">Get Quote</a>-->
            <!--         </td>-->
            <!--      </tr>-->
            <!--      <tr>-->
            <!--         <td></td>-->
            <!--         <td><a href="">View Details</a></td>-->
            <!--         <td><a href="">View Details</a></td>-->
            <!--         <td><a href="">View Details</a></td>-->
            <!--      </tr>-->
            <!--      <tr>-->
            <!--         <td><b>Supplier</b></td>-->
            <!--         <td>Star Electronic Technology Co. Ltd.</td>-->
            <!--         <td>Uhled Technology Co.</td>-->
            <!--         <td>Canbest Opto Technology Co. Ltd.</td>-->
            <!--      </tr>-->
            <!--      <tr>-->
            <!--         <td><b>FNB2B Authorized</b></td>-->
            <!--         <td>Verified</td>-->
            <!--         <td>Verified Pro</td>-->
            <!--         <td>NAN</td>-->
            <!--      </tr>-->
            <!--      <tr>-->
            <!--         <td><b>Type</b></td>-->
            <!--         <td>Manufacturer</td>-->
            <!--         <td>Distributor</td>-->
            <!--         <td>Service Provider</td>-->
            <!--      </tr>-->
            <!--      <tr>-->
            <!--         <td><b>Label</b></td>-->
            <!--         <td>Top Ranked</td>-->
            <!--         <td>Best Match</td>-->
            <!--         <td>Last Approved</td>-->
            <!--      </tr>-->
            <!--      <tr>-->
            <!--         <td><b>Label</b></td>-->
            <!--         <td>3 out 5</td>-->
            <!--         <td>4 out 5</td>-->
            <!--         <td>5 out 5</td>-->
            <!--      </tr>-->
            <!--      <tr>-->
            <!--         <td><b>Certificate</b></td>-->
            <!--         <td>Certificate 1</td>-->
            <!--         <td>Certificate 2</td>-->
            <!--         <td>Certificate 3</td>-->
            <!--      </tr>-->
            <!--      <tr>-->
            <!--         <td><b>Rating</b></td>-->
            <!--         <td>3 out 5</td>-->
            <!--         <td>2 out 5</td>-->
            <!--         <td>1 out 5</td>-->
            <!--      </tr>-->
            <!--      <tr>-->
            <!--         <td><b>Selling Type</b></td>-->
            <!--         <td>Hotels</td>-->
            <!--         <td>Restaurants</td>-->
            <!--         <td>Catering</td>-->
            <!--      </tr>-->
            <!--      <tr>-->
            <!--         <td><b>Country Origin</b></td>-->
            <!--         <td>India</td>-->
            <!--         <td>UAE</td>-->
            <!--         <td>UAE</td>-->
            <!--      </tr>-->
            <!--   </tbody>-->
            <!--</table>-->
        </div>
    </div>
</div>

@endsection