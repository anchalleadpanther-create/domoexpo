@extends('purchasync.partials.header')
@section('customerContent')

<div class="ps-page--shop ps-product-list ps-pt-60 ps-pb-60">
    <div class="container">
        <div class="table-responsive">


            @if(count($suppliers) > 0)

            <table class="table table-bordered ps-table ps-table--specification table-striped">
                <!--<thead>-->
                    
                <!--</thead>-->
                <tbody>
                    <tr>
                        <th style="width:200px"> </th>
                        @foreach ($suppliers as $supplier)
                        <th style="text-align:center">
                            
                            @if($supplier->biz_company_logo)
                            <img src="{{ asset('uploads/supplier/'.$supplier->biz_company_logo)}}" class="rounded" alt="" width="150" height="150" />
                            @endif
                            @if ($supplier->biz_company_logo == null)
                            <img src="https://placehold.co/200x200?text=Image+Not+Available" alt="" />
                            @endif
                            
                            <br>
                            
                             @auth('buyer')
                             <a href="{{url('/')}}/buyer/buyer-create-rfq/rfq-detail" class="ps-btn ps-btn--sm blue-bg mt-3">Get Quote</a>
                             @endauth
                             @guest('buyer')
                             <a href="{{route('buyer.login')}}" class="ps-btn ps-btn--sm blue-bg mt-3">Get Quote</a>
                             @endguest
                            
                            
                            <!--<a class="ps-btn ps-btn--sm blue-bg mt-3" href="{{route('customer.supplier-detail',$supplier->id) }}">Get Quote</a>-->
                        </th>
                        @endforeach
                    </tr>
                    <tr>
                        <td ></td>
                        @foreach ($suppliers as $supplier)
                        <td><a style="color:#06c"
                                href="{{route('customer.supplier-detail',$supplier->id) }}">
                            <strong>View Details</strong></a></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><b>Supplier</b></td>
                        @foreach ($suppliers as $supplier)
                        <td>{{ @$supplier?->biz_company}}</td>
                        @endforeach
                    </tr>
                   <tr>
                        <td><b>FNBEB Authorized</b></td>
                        @foreach ($suppliers as $supplier)
                        <td>
                            {{ @$supplier?->is_verified == 1  ? 'Verified' : 'Not Verified' }}
                            </td>
                        @endforeach
                    </tr>
                    
                    <tr>
                        <td><b>Type</b></td>
                        @foreach ($suppliers as $supplier)
                        <td>
                            {{ implode(',',$supplier->suppllierDescribedSeller->pluck('dropdown_value')->toArray()) ?? '' }}
                        </td>
                        @endforeach
                    </tr>
                    
                    <tr>
                        <td><b>Label</b></td>
                        @foreach ($suppliers as $supplier)
                        <td>
                            {{ implode(',',$supplier->suppllierDescribedSeller->pluck('dropdown_value')->toArray()) ?? '' }}
                        </td>
                        @endforeach
                    </tr>

                    <tr>
                        <td><b>Certificate</b></td>
                        @foreach ($suppliers as $supplier)
                        <td>
                            {{-- {{ @$supplier->certificate }} --}}

                            @php
                            $sustainability_certificates =
                            getDropdownValues(json_decode($supplier->sustainability_certificates))
                            @endphp

                            @foreach (getDropdownValues(json_decode($supplier->quality_certificates)) as $value)
                            <span> {{ $value->dropdown_value }}</span>,
                            @endforeach

                            @foreach ($sustainability_certificates as $value)
                            <span> {{ $value->dropdown_value }}</span>,
                            @endforeach
                            @foreach (getDropdownValues(json_decode($supplier->other_certificates)) as $value)
                            <span> {{ $value->dropdown_value }}</span>,
                            @endforeach

                        </td>
                        @endforeach
                    </tr>



                    <tr>
                        <td><b>Rating / Review</b></td>
                        @foreach ($suppliers as $supplier)
                        <td>5 out of 5</td>
                        @endforeach
                    </tr>
                    
                    <tr>
                        <td><b>Selling type </b></td>
                        @foreach ($suppliers as $supplier)
                        <td>{{ implode(',',$supplier->suppllierDescribedSeller->pluck('dropdown_value')->toArray()) ?? '' }}</td>
                        @endforeach
                    </tr>
                    
                    <tr>
                        <td><b>Country Origin</b></td>
                        @foreach ($suppliers as $supplier)
                        <td>{{ $supplier?->officeCountry?->name }}</td>
                        @endforeach
                    </tr>

                </tbody>
            </table>

            @else

            <table class="table table-bordered ps-table ps-table--specification">
                <thead>
                    <tr>
                        <th class="text-center">Add Supplier To Compare.</th>
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