<?php

namespace App\Actions\Admin\Orders;

use Carbon\Carbon;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Http;
use App\Models\BlueDartToken;

class GenerateBlueDartWaybill
{
    use AsAction;

    public function handle($cart,$cartItems, $productNames, $grandTotal, $quantity, $orderIds, $dimensions)
    {
        $url = 'https://apigateway-sandbox.bluedart.com/in/transportation/waybill/v1/GenerateWayBill';
        
        $blueDartToken = BlueDartToken::orderByDesc('id')->first()->token;
        $payload = $this->buildPayload($cart,$cartItems, $productNames, $grandTotal, $quantity, $orderIds, $dimensions);
        // dd($payload);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'JWTToken' => $blueDartToken,
        ])->post($url, $payload);

        $httpcode = $response->status();
        $res = $response->json(); 
        if ($response->successful()) {
            return $data = ['status' => $httpcode, 'AWBNo' => $res['GenerateWayBillResult']['AWBNo'] , 'message' => $response,'json'=>  $response->json()];
            return response()->json(['status' => $httpcode, 'message' => $response->json(),'json'=>  $response->json()]);
        } else {
           
            $statusCode = isset($res['error-response'][0]['Status'][0]['StatusCode']) ? $res['error-response'][0]['Status'][0]['StatusCode'] : "Try again";
            $statusInformation = isset($res['error-response'][0]['Status'][0]['StatusCode']) ? $res['error-response'][0]['Status'][0]['StatusInformation'] : "Something wrong from blue dart. Try again.";
            return  $data = ['status' => $httpcode, 'message' =>  $statusCode ." ". $statusInformation ,'json'=>  $response->json()];
            // dd($res['error-response'][0]['Status'][0]['StatusCode'],$res['error-response'][0]['Status'][0]['StatusInformation']);
            // return $data = ['status' => $httpcode, 'response' => $response->json()];
        }
    }

    private function buildPayload($cart,$cartItems, $productNames, $grandTotal, $quantity, $orderIds, $dimensions)
    {
        $date = Carbon::now()->format('Y-m-d');
        $itemDetails = [];
        $itemDimensions = [];
        foreach ($cartItems as $cartItem) {
            $itemDetails[] = [
                            "CGSTAmount" => 0,
                            "HSCode" => "",
                            "IGSTAmount" => 0,
                            "IGSTRate" => 0,
                            "Instruction" => "",
                            "InvoiceDate" => "/Date(" . Carbon::now()->timestamp . ")/",
                            "InvoiceNumber" => @$cartItem->orderItemDetail->invoice_id,
                            "ItemID" => $cartItem->product_id,
                            "ItemName" => $cartItem->name,
                            "ItemValue" => $cartItem->price_unit,
                            "Itemquantity" => $cartItem->quantity,
                            "PlaceofSupply" => "NEW DELHI",
                            "ProductDesc1" => $cartItem->name,
                            "ProductDesc2" => $cartItem->name,
                            "ReturnReason" => "",
                            "SGSTAmount" => 0,
                            "SKUNumber" => $cartItem->sku,
                            "SellerGSTNNumber" => "",
                            "SellerName" => "",
                            "TaxableAmount" => 0,
                            "TotalValue" => $cartItem->price_unit,
                            "cessAmount" => "0.0",
                            "countryOfOrigin" => "IN",
                            "docType" => "INV",
                            "subSupplyType" => 1,
                            "supplyType" => "0"
                        ];
                        
            
        }

        $itemDimensions[] = [
                "Breadth" => $dimensions['width'],
                "Count" =>  1,
                "Height" => $dimensions['height'],
                "Length" => $dimensions['length']
            ];

      


        return [
            "Request" => [
                "Consignee" => [
                    "AvailableDays" => "",
                    "AvailableTiming" => "",
                    "ConsigneeAddress1" => $cart->orderItemDetail->shipping_address,
                    "ConsigneeAddress2" => @$cart->orderItemDetail->city->name,
                    "ConsigneeAddress3" => @$cart->orderItemDetail->state->name . ' ' . @$cart->orderItemDetail->country->name,
                    "ConsigneeAddressType" => "",
                    "ConsigneeAddressinfo" => "",
                    "ConsigneeAttention" => $cart->orderItemDetail->shipping_name . ',' . @$cart->orderItemDetail->city->name . ',' . @$cart->orderItemDetail->state->name . ',' . @$cart->orderItemDetail->country->name,
                    "ConsigneeEmailID" => $cart->orderItemDetail->shipping_email,
                    "ConsigneeFullAddress" => $cart->orderItemDetail->shipping_address,
                    "ConsigneeGSTNumber" => "",
                    "ConsigneeLatitude" => "",
                    "ConsigneeLongitude" => "",
                    "ConsigneeMaskedContactNumber" => "",
                    "ConsigneeMobile" => $cart->orderItemDetail->shipping_phone,
                    "ConsigneeName" => $cart->orderItemDetail->shipping_name,
                    "ConsigneePincode" => $cart->orderItemDetail->shipping_pincode,
                    "ConsigneeTelephone" => ""
                ],
                "Returnadds" => [
                    "ManifestNumber" => "",
                    "ReturnAddress1" => "SPARSH INDIA COUTURE PLOT NO 84",
                    "ReturnAddress2" => "PATPARGANJ INDUSTRIAL AREA",
                    "ReturnAddress3" => "NEW DELHI",
                    "ReturnAddressinfo" => "",
                    "ReturnContact" => "TEST RTO",
                    "ReturnEmailID" => "INFO@LITTLETAGSLUXURY.COM",
                    "ReturnLatitude" => "",
                    "ReturnLongitude" => "",
                    "ReturnMaskedContactNumber" => "",
                    "ReturnMobile" => "7503414369",
                    "ReturnPincode" => "110092",
                    "ReturnTelephone" => ""
                ],
                "Services" => [
                    "AWBNo" => "",
                    "ActualWeight" => "0.50",
                    "CollectableAmount" => $cart->orderItemDetail->payment_method == "COD" || $cart->orderItemDetail->payment_method == "Cash on Delivery" ? $grandTotal :  0,
                    "Commodity" => [
                        "CommodityDetail1" => $cart->name,
                        "CommodityDetail2" => "",
                        "CommodityDetail3" => ""
                    ],
                    "CreditReferenceNo" => $cart->orderItemDetail->invoice_id,
                    "CreditReferenceNo2" => "",
                    "CreditReferenceNo3" => "",
                    "CurrencyCode" => "",
                    "DeclaredValue" => $grandTotal,
                    "DeliveryTimeSlot" => "",
                    "Dimensions" => $itemDimensions,
                    "FavouringName" => "",
                    "ForwardAWBNo" => "",
                    "ForwardLogisticCompName" => "",
                    "InsurancePaidBy" => "",
                    "InvoiceNo" => "",
                    "IsChequeDD" => "",
                    "IsDedicatedDeliveryNetwork" => false,
                    "IsForcePickup" => false,
                    "IsPartialPickup" => false,
                    "IsReversePickup" => false,
                    "ItemCount" => count($cartItems),
                    "OTPBasedDelivery" => "0",
                    "OTPCode" => "",
                    "Officecutofftime" => "",
                    "PDFOutputNotRequired" => true,
                    "PackType" => "",
                    "ParcelShopCode" => "",
                    "PayableAt" => "",
                    "PickupDate" => "/Date(" . Carbon::now()->timestamp . ")/",
                    "PickupMode" => "",
                    "PickupTime" => "1800",
                    "PickupType" => "",
                    "PieceCount" => "1",
                    "PreferredPickupTimeSlot" => "",
                    "ProductCode" => "A",
                    "ProductFeature" => "",
                    "ProductType" => 1,
                    "RegisterPickup" => true,
                    "SpecialInstruction" => "",
                    "SubProductCode" =>  $cart->orderItemDetail->payment_method == "COD" || $cart->orderItemDetail->payment_method == "Cash on Delivery" ? "C" :  "P",
                    "TotalCashPaytoCustomer" => 0,
                    "itemdtl" => $itemDetails,
                    "noOfDCGiven" => 0
                ],
                "Shipper" => [
                    "CustomerAddress1" => $cart->orderItemDetail->shipping_address,
                    "CustomerAddress2" => @$cart->orderItemDetail->city->name,
                    "CustomerAddress3" => @$cart->orderItemDetail->state->name . ' ' . @$cart->orderItemDetail->country->name,
                    "CustomerAddressinfo" => "",
                    "CustomerCode" => "940111",
                    "CustomerEmailID" => $cart->orderItemDetail->shipping_email,
                    "CustomerGSTNumber" => "",
                    "CustomerLatitude" => "",
                    "CustomerLongitude" => "",
                    "CustomerMaskedContactNumber" => "",
                    "CustomerMobile" => $cart->orderItemDetail->shipping_phone,
                    "CustomerName" => $cart->orderItemDetail->shipping_name,
                    "CustomerPincode" => $cart->orderItemDetail->shipping_pincode,
                    "CustomerTelephone" => (string)$cart->orderItemDetail->shipping_phone,
                    "IsToPayCustomer" => false,
                    "OriginArea" => "GGN",
                    "Sender" => "sparsh india couture",
                    "VendorCode" => ""
                ]
            ],
            "Profile" => [
                "LoginID" => "GG940111",
                "LicenceKey" => "kh7mnhqkmgegoksipxr0urmqesesseup",
                "Api_type" => "S"
            ]
        ];
    }


    // private function buildPayload($cart,$cartItems, $productNames, $grandTotal, $quantity, $orderIds, $dimensions)
    // {
    //     $date = Carbon::now()->format('Y-m-d');
    //     $itemDetails = [];
    //     $itemDimensions = [];
    //     foreach ($cartItems as $cartItem) {
    //         $itemDimensions[] = [
    //             "Breadth" => $dimensions['width'],
    //             "Count" =>  $cartItem->quantity,
    //             "Height" => $dimensions['height'],
    //             "Length" => $dimensions['length']
    //         ];
    //     }

      


    //     return [
    //         "Request" => [
    //             "Consignee" => [
    //                 "AvailableDays" => "",
    //                 "AvailableTiming" => "",
    //                 "ConsigneeAddress1" => $cart->orderItemDetail->shipping_address,
    //                 "ConsigneeAddress2" => @$cart->orderItemDetail->city->name,
    //                 "ConsigneeAddress3" => @$cart->orderItemDetail->state->name . ' ' . @$cart->orderItemDetail->country->name,
    //                 "ConsigneeAddressType" => "",
    //                 "ConsigneeAddressinfo" => "",
    //                 "ConsigneeAttention" => $cart->orderItemDetail->shipping_name . ',' . @$cart->orderItemDetail->city->name . ',' . @$cart->orderItemDetail->state->name . ',' . @$cart->orderItemDetail->country->name,
    //                 "ConsigneeEmailID" => $cart->orderItemDetail->shipping_email,
    //                 "ConsigneeFullAddress" => $cart->orderItemDetail->shipping_address,
    //                 "ConsigneeGSTNumber" => "",
    //                 "ConsigneeLatitude" => "",
    //                 "ConsigneeLongitude" => "",
    //                 "ConsigneeMaskedContactNumber" => "",
    //                 "ConsigneeMobile" => $cart->orderItemDetail->shipping_phone,
    //                 "ConsigneeName" => $cart->orderItemDetail->shipping_name,
    //                 "ConsigneePincode" => $cart->orderItemDetail->shipping_pincode,
    //                 "ConsigneeTelephone" => ""
    //             ],
    //             "Returnadds" => [
    //                 "ManifestNumber" => "",
    //                 "ReturnAddress1" => "SPARSH INDIA COUTURE PLOT NO 84",
    //                 "ReturnAddress2" => "PATPARGANJ INDUSTRIAL AREA",
    //                 "ReturnAddress3" => "NEW DELHI",
    //                 "ReturnAddressinfo" => "",
    //                 "ReturnContact" => "TEST RTO",
    //                 "ReturnEmailID" => "INFO@LITTLETAGSLUXURY.COM",
    //                 "ReturnLatitude" => "",
    //                 "ReturnLongitude" => "",
    //                 "ReturnMaskedContactNumber" => "",
    //                 "ReturnMobile" => "7503414369",
    //                 "ReturnPincode" => "110092",
    //                 "ReturnTelephone" => ""
    //             ],
    //             "Services" => [
    //                 "AWBNo" => "",
    //                 "ActualWeight" => "0.50",
    //                 "CollectableAmount" => 0,
    //                 "Commodity" => [
    //                     "CommodityDetail1" => $cart->name,
    //                     "CommodityDetail2" => "",
    //                     "CommodityDetail3" => ""
    //                 ],
    //                 "CreditReferenceNo" => $cart->orderItemDetail->order_id_counter,
    //                 "CreditReferenceNo2" => "",
    //                 "CreditReferenceNo3" => "",
    //                 "CurrencyCode" => "",
    //                 "DeclaredValue" => $grandTotal,
    //                 "DeliveryTimeSlot" => "",
    //                 "Dimensions" => [
    //                     $itemDimensions
    //                 ],
    //                 "FavouringName" => "",
    //                 "ForwardAWBNo" => "",
    //                 "ForwardLogisticCompName" => "",
    //                 "InsurancePaidBy" => "",
    //                 "InvoiceNo" => "",
    //                 "IsChequeDD" => "",
    //                 "IsDedicatedDeliveryNetwork" => false,
    //                 "IsForcePickup" => false,
    //                 "IsPartialPickup" => false,
    //                 "IsReversePickup" => false,
    //                 "ItemCount" => 1,
    //                 "OTPBasedDelivery" => "0",
    //                 "OTPCode" => "",
    //                 "Officecutofftime" => "",
    //                 "PDFOutputNotRequired" => true,
    //                 "PackType" => "",
    //                 "ParcelShopCode" => "",
    //                 "PayableAt" => "",
    //                 "PickupDate" => "/Date(" . Carbon::now()->timestamp . ")/",
    //                 "PickupMode" => "",
    //                 "PickupTime" => "1800",
    //                 "PickupType" => "",
    //                 "PieceCount" => "1",
    //                 "PreferredPickupTimeSlot" => "",
    //                 "ProductCode" => "A",
    //                 "ProductFeature" => "",
    //                 "ProductType" => 1,
    //                 "RegisterPickup" => true,
    //                 "SpecialInstruction" => "",
    //                 "SubProductCode" => "P",
    //                 "TotalCashPaytoCustomer" => 0,
    //                 "itemdtl" => [
    //                     [
    //                         "CGSTAmount" => 0,
    //                         "HSCode" => "",
    //                         "IGSTAmount" => 0,
    //                         "IGSTRate" => 0,
    //                         "Instruction" => "",
    //                         "InvoiceDate" => "/Date(" . Carbon::now()->timestamp . ")/",
    //                         "InvoiceNumber" => $cart->orderItemDetail->invoice_id,
    //                         "ItemID" => $cart->product_id,
    //                         "ItemName" => $cart->name,
    //                         "ItemValue" => $grandTotal,
    //                         "Itemquantity" => $quantity,
    //                         "PlaceofSupply" => "NEW DELHI",
    //                         "ProductDesc1" => $cart->name,
    //                         "ProductDesc2" => $cart->name,
    //                         "ReturnReason" => "",
    //                         "SGSTAmount" => 0,
    //                         "SKUNumber" => $cart->sku,
    //                         "SellerGSTNNumber" => "",
    //                         "SellerName" => "",
    //                         "TaxableAmount" => 0,
    //                         "TotalValue" => $grandTotal,
    //                         "cessAmount" => "0.0",
    //                         "countryOfOrigin" => "IN",
    //                         "docType" => "INV",
    //                         "subSupplyType" => 1,
    //                         "supplyType" => "0"
    //                     ]
    //                 ],
    //                 "noOfDCGiven" => 0
    //             ],
    //             "Shipper" => [
    //                 "CustomerAddress1" => $cart->orderItemDetail->shipping_address,
    //                 "CustomerAddress2" => @$cart->orderItemDetail->city->name,
    //                 "CustomerAddress3" => @$cart->orderItemDetail->state->name . ' ' . @$cart->orderItemDetail->country->name,
    //                 "CustomerAddressinfo" => "",
    //                 "CustomerCode" => "940111",
    //                 "CustomerEmailID" => $cart->orderItemDetail->shipping_email,
    //                 "CustomerGSTNumber" => "",
    //                 "CustomerLatitude" => "",
    //                 "CustomerLongitude" => "",
    //                 "CustomerMaskedContactNumber" => "",
    //                 "CustomerMobile" => $cart->orderItemDetail->shipping_phone,
    //                 "CustomerName" => $cart->orderItemDetail->shipping_name,
    //                 "CustomerPincode" => $cart->orderItemDetail->shipping_pincode,
    //                 "CustomerTelephone" => "7503414369",
    //                 "IsToPayCustomer" => false,
    //                 "OriginArea" => "GGN",
    //                 "Sender" => "sparsh india couture",
    //                 "VendorCode" => ""
    //             ]
    //         ],
    //         "Profile" => [
    //             "LoginID" => "GG940111",
    //             "LicenceKey" => "kh7mnhqkmgegoksipxr0urmqesesseup",
    //             "Api_type" => "S"
    //         ]
    //     ];
    // }
}
