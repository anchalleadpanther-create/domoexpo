@extends('customer.partials-fn.buyer.header')
@section('content')<style>
    /* Your custom CSS */
    /* Ensure the processing background is transparent */
        .invoice {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .details, .items {
            margin-top: 20px;
        }
        .details .info {
            display: flex;
            justify-content: space-between;
        }
        .details .info div {
            /*width: 100%;*/
        }
        .items table {
            width: 100%;
            border-collapse: collapse;
        }
        .items th, .items td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .items th {
            background: #f8f8f8;
        }
        .total {
            margin-top: 20px;
            text-align: right;
            font-size: 15px;
            font-weight: bold;
        }
        .margin-bottom-0{
            margin-bottom: 0px;
        }
        
        .ml-20{
            margin-bottom: 0px;
        }
        .fs-13{
            font-size:13px;
        }
        .fs-12{
            font-size:12px;
        }
        .fw-600{
            font-weight:600;
        }
        
        .gray-bg{
             background: #f8f8f8;
        }
        .text-center {
            text-align: center !important;
        }
        .text-left {
            text-align: left  !important;
        }
        .text-right {
            text-align: right  !important;
        }
        .flex-container {
          display: flex;
        }
        
        .p-5{
          padding:5px !important;  
        }
</style>

<!-- Main Container -->
<div class="container product_table--listing">
    <div class="row justify-content-center">
        <div class="col-lg-10 offset-lg-2">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5 col-sm-12 text-center">
                    <h2>Quotation Detail </h2>
                </div>

                <div class="ps-section__content p-0">

                    <div class="card ">
                       
                        
                        <div class="invoice">
        
                            <div class="items">
                                
                                <table>
                                    <tr>
                                        <td colspan="2" style="border:0px;"><a href="{{ url()->previous() }}">Back</a></td>
                                    </tr>
                                    <tr  class="fs-13">
                                        <td class="p-5" width="50%">
                                            <span class="fw-600">RFQ Number:</span> RFQ-000{{$rfq->id}}
                                        </td>
                                        <td class="p-5" width="50%" rowspan="2">
                                            
                                            <div class="details">
                                                <div class="info ">
                                                    <div class="ml-20 flex-container ">
                                                        <div class=" flex-container ">
                                                            
                                                            <div style="width: 100px;">
                                                                <img src="{{!empty($sellerQuote->seller->biz_company_logo) ? asset('uploads/supplier/'.$sellerQuote->seller->biz_company_logo)  : 'https://placehold.co/225x275?text=Image+Not+Available'}}"  style="width:80px;border-radius: 50%;" alt="" />
                                                             </div>
                                                            <div>
                                                                <p class="fs-13 fw-600 " style="margin:20px auto 5px 5px">{{ $sellerQuote->seller?->biz_company}}</5>
                                                                <p style="margin:auto 5px">{{ $sellerQuote->seller?->officeState?->name }},{{ $sellerQuote->seller?->officeCountry?->name }}</p>
                                                                <p style="margin:auto 5px"><span class="fw-600">Vat Number:</span>{{ $sellerQuote->seller?->vat_number }}</p>
                                                            </div>
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr  class="fs-13">
                                        <td class="p-5"  width="50%">
                                          <span class="fw-600">  Date: </span>{{ $sellerQuote->created_at->format('d/m/Y') ?? '' }}
                                        </td>
                                    </tr>
                                    
                                    <tr  class="fs-13">
                                        <td  width="50%">
                                            <h4>Billing Address</h4>
                                            <p style="margin:10px 10px">{{ $rfq->name}}</p> 
                                            <p style="margin:10px 10px">{{ $rfq->address}}</p>
                                            <p style="margin:10px 10px">{{ $rfq->deliveryState->name }},{{ $rfq->deliveryCountry->name }} </p> 
                                            <!--<p style="margin:10px 10px">VAT Number: 239572398236</p>-->
                                        </td>
                                        <td  width="50%">
                                            <h4 >Shipping Address</h4>
                                            <p style="margin:10px 10px">{{ $rfq->name}}</p> 
                                            <p style="margin:10px 10px">{{ $rfq->address}}</p>
                                            <p style="margin:10px 10px">{{ $rfq->deliveryState->name }},{{ $rfq->deliveryCountry->name }} </p> 
                                        </td>
                                    </tr>
                                </table>
                                
                            
                                
                                <table>
                                    <thead>
                                        <tr class="fs-13">
                                            <th>S. No.</th>
                                            <th>Product Details</th>
                                            <th>Model No.</th>
                                            <th>Base Price (AED)</th>
                                            <th>Qty</th>
                                            <th>Discount (AED)</th>
                                            <th>Taxable Price (AED)</th>
                                            <th>VAT(AED)</th>
                                            <th>Amount (AED)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sellerQuote->quotationProducts as $key => $value)
                                        
                                            <tr class="fs-12 fw-600">
                                                <td>{{$key + 1}}</td>
                                                <td>{{$value->product_name}}</td>
                                                <td>{{$value->product->sku}}</td>
                                                <td>{{$value->base_price}}</td>
                                                <td>{{$value->quantity}}</td>
                                                <td>{{$value->discount_amount}}</td>
                                                <td>{{($value->base_price * $value->quantity) - $value->discount_amount}}</td>
                                                <td> {{(($value->base_price * $value->quantity) - $value->discount_amount)*($value->tax/100)}}</td>
                                                <td> {{ ($value->base_price * $value->quantity - $value->discount_amount) + (($value->base_price * $value->quantity) - $value->discount_amount)*($value->tax/100)}}</td>
                                            </tr>
                                        @endforeach
                                       
                                        
                                        <tr class="fs-13 fw-600 gray-bg ">
                                            <td colspan="7" class="text-right">Shipping Amount (excl. VAT)(AED):</td>
                                            <td colspan="2"  class="text-center"> {{  $sellerQuote->shipment_cost }}</td>
                                        </tr>
                                        
                                        <tr class="fs-13 fw-600 gray-bg ">
                                            <td colspan="7" class="text-right">Shipping VAT Amount(AED):</td>
                                            <td colspan="2"  class="text-center"> {{  $sellerQuote->vat_on_shipment }}</td>
                                        </tr>
                                        
                                        <tr class="fs-13 fw-600 gray-bg ">
                                            <td colspan="7" class="text-right">Total Amount Pad Incl VAT (AED):</td>
                                            <td colspan="2"  class="text-center"> {{  $sellerQuote->total_shipment }}</td>
                                        </tr>
                                        <tr class="fs-13 fw-600 gray-bg ">
                                            <td colspan="7" class="text-right"> Total Payble (AED):</td>
                                            <td colspan="2"  class="text-center"> {{  $sellerQuote->grand_total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <table>
                                    <tr  class=" ">
                                        <td width="50%" style="border:1px ">
                                           <h3> Seller Name</h3>
                                            
                                           {{$sellerQuote->seller?->biz_company}}
                                            
                                        </td>
                                        <td class="text-right"  style="border:1px " width="50%">
                                             <h3>Authorized Signatory</h3>
                    
                                             <img src="{{ asset('purchasync_aurthorize_sign.jpeg') }}"  style="width:auto;" alt="" />
                                                            
                                        </td>
                                    </tr>
                                </table>
                            </div>
        
                        </div>
                        
                        
                        
                        
                        
                        
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection