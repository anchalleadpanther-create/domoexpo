<?php

namespace App\Exports\Reports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersReportExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }

  public function __construct(private $orders)
  {
  }

  public function headings(): array
  {
    return [
      'Order_ID', 'Line Order_ID', 'Wallet Balance', 'Month', 'Order_Date', 'Cancelled Order', 'Order Status', 'Document Type', 'Invoice_Date', 'Invoice_Number', 'TFE GSTIN', 'Customer_Full_Name', 'Customer_Phone', 'Customer_Mail Id', 'Billing_Address', 'Shipping_Address', 'Customer_GSTIN', 'Product_Name', 'Product_Sku', 'HSN', ' Quantity', 'Display_Price', 'Discount_Per_Product', 'Discount_Percentage_Per_Product', 'Discount_Coupon_Code', 'Wallet Used', 'Gift Card Amount', 'Referral Amount', 'Amount_Before_Tax', 'SGST_%', 'CGST_%', 'IGST_%', 'CESS_%', 'SGST', 'CGST', 'IGST', 'CESS', 'Total_Tax', 'Amount_After_Tax', 'R/off', 'Bill_City', 'Bill_Pincode', 'Bill_To_State', 'Bill_State_Code', 'Bill_State_No', 'Bill_Country', 'Ship_City', 'Ship_Pincode', 'Ship_To_State', 'Ship_State_Code', 'Ship_State_No', 'Ship_Country', 'Payment_Mode', 'Order_Note', 'Status', 'Fulfillment_Status', 'Fulfill_Location_Id', 'Fulfill_Location_State_Code', 'Transport Mode', 'Delivery Logistic Partner Name', 'Product Category', 'AWB No', 'AWB Date', 'Shipping Bill No', 'Shipping Bill Date', 'Final Date of Delivery to Customer', 'First Delivery AWB', 'First Delivery AWB Date', 'Second Delivery AWB', 'Second Delivery AWB Date', 'Third Delivery AWB', 'Third Delivery AWB Date', 'Delivery Status', 'referrer_host', 'Customer Landing Page', 'Customer Membership Category', 'Order Qty', 'Return Qty', 'Net Qty', 'Value in Foreign Currency', 'Advance Amount', 'Amount Receivable', 'Customer Type', 'Customer Category', 'Payment Gateway', 'Payment settlement_id', 'Payment Collection Fees without Tax', 'Delivery destination_pin', 'Delivery/Courier Charges Excl.GST', 'Delivery/Courier GST', 'Total Delivery/Courier Charges', 'REMARKS FIELD', 'VENDOR CODE', 'PO Status Cancelled', 'BRAND NAME', 'LEGAL NAME', 'ADDRESS', 'CITY', 'STATE', 'GSTIN', 'CONTACT NO', 'MAIL ID', 'PO No', 'PO Date', 'Type of Order', 'Expected Delivery Date as per PO', 'Actual Date of Receipt of Goods to TFE W/h', 'Tracking No', 'MRP of Cloth to Customer', 'Margin %', 'Margin Amount', 'Additional Discount from Designer in %', 'Additional Discount from Designer in Value', 'PO Basic Value', 'IGST%', 'CGST%', 'SGST%', 'IGST Amt', 'CGST Amt', 'SGST Amt', 'Total PO Amount', 'VENDOR INVOICE NO', 'VENDOR INVOICE DATE', 'Invoice Basic Amount', 'igst%', 'cgst%', 'sgst%', 'igst amt', 'cgst amt', 'sgst amt', 'Total Invoice Amount', 'Invoice/Debit Note Reference No', 'VENDOR INVOICE PAYMENT STATUS', 'DATE OF PAYMENT', 'MODE OF PAYMENT', 'PAYMENT REFERENCE NO', 'AMOUNT PAID', 'BALANCE AMOUNT', 'REMARKS'
    ];
  }
  public function array(): array
  {
    $array = [];

    foreach ($this->orders as $key => $order) {
      $supplierOrder = $order->orderItemDetail;
      $sameState = $supplierOrder->state->name === 'Haryana';
      $product = $order?->product;
      $seller = $order?->product?->seller;

      $amountWithoutTax = ($order->price_unit * $order->quantity) / (1 + ($order->gst / 100));
      $amountWithTax = $order->price_unit * $order->quantity;
      $taxAmount = $amountWithTax - $amountWithoutTax;
      $docType = $supplierOrder->invoice_document !== null ? 'Invoice' : ($supplierOrder->credit_note_document !== null ? 'Credit Note' : null);
      $commissionAmount = ($seller?->commission / 100) * $supplierOrder->grand_total;
      $poTaxAmount = ($supplierOrder->grand_total - $commissionAmount) -
        ($supplierOrder->grand_total - $commissionAmount) / (1 + ($order->gst / 100));
      $invoiceTaxAmount = $supplierOrder->grand_total - $order->gstAmount;

      $array[$key]['Order_ID'] = 'OID:TFE-' . $supplierOrder->order_id;
      $array[$key]['Line Order_ID'] = 'OID:TFE-' . $supplierOrder->order_id_counter;
      $array[$key]['Wallet Balance'] = $order?->buyer->wallet;
      $array[$key]['Month'] = $supplierOrder->created_at->format('M-d');
      $array[$key]['Order_Date'] = $supplierOrder->created_at->format('d-m-Y');
      $array[$key]['Cancelled Order'] = $order->orderStatus === 'Order Cancelled' ? 'Yes' : 'No';
      $array[$key]['Order Status'] = $order->orderStatus;
      $array[$key]['Document Type'] = $docType;
      $array[$key]['Invoice_Date'] = $supplierOrder->invoice?->created_at->format('d-m-Y');
      $array[$key]['Invoice_Number'] =  $supplierOrder->invoice_id !== null ? invoicePrefix()  . '/' .  $supplierOrder->invoice_id : null;
      $array[$key]['TFE GSTIN'] = gstNumber();
      $array[$key]['Customer_Full_Name'] = $supplierOrder->shipping_name;
      $array[$key]['Customer_Phone'] = $supplierOrder->shipping_phone;
      $array[$key]['Customer_Mail Id'] = $supplierOrder->shipping_email;
      $array[$key]['Billing_Address'] = $supplierOrder->shipping_address;
      $array[$key]['Shipping_Address'] = $supplierOrder->shipping_address;
      $array[$key]['Customer_GSTIN'] = '';
      $array[$key]['Product_Name'] = $order->name;
      $array[$key]['Product_Sku'] = $order->sku;
      $array[$key]['HSN'] = $order->hsn_code;
      $array[$key]['Quantity'] = $order->quantity;
      $array[$key]['Display_Price'] = number_format($order->price_unit, 2, '.', '');
      $array[$key]['Discount_Per_Product'] = number_format($order->coupon_amount, 2, '.', '');
      $array[$key]['Discount_Percentage_Per_Product'] = $order->coupon_percent;
      $array[$key]['Discount_Coupon_Code'] = $order->coupon_code;
      $array[$key]['Wallet Used'] = $supplierOrder->wallet_used;
      $array[$key]['Gift Card Amount'] = $supplierOrder->gift_card_amount;
      $array[$key]['Referral Amount'] = $supplierOrder->referral_amount;
      $array[$key]['Amount_Before_Tax'] = number_format(($supplierOrder->grand_total + $supplierOrder->shipping_charge - ($order->coupon_amount + $supplierOrder->wallet_used + $supplierOrder->gift_card_amount + $supplierOrder->referral_amount) - $taxAmount), 2, '.', '');
      $array[$key]['SGST_%'] = $sameState ? $order->gst / 2 . '%' : null;
      $array[$key]['CGST_%'] = $sameState ? $order->gst / 2 . '%' : null;
      $array[$key]['IGST_%'] = !$sameState ? $order->gst . '%' : null;
      $array[$key]['CESS_%'] = null;
      $array[$key]['SGST'] = $sameState ? number_format($taxAmount / 2, 2, '.', '') : null;
      $array[$key]['CGST'] = $sameState ? number_format($taxAmount / 2, 2, '.', '') : null;
      $array[$key]['IGST'] = !$sameState ? number_format($taxAmount, 2, '.', '') : null;
      $array[$key]['CESS'] = null;
      $array[$key]['Total_Tax'] = number_format($taxAmount, 2, '.', '');
      $array[$key]['Amount_After_Tax'] = number_format($supplierOrder->grand_total + $supplierOrder->shipping_charge - ($order->coupon_amount + $supplierOrder->wallet_used + $supplierOrder->gift_card_amount + $supplierOrder->referral_amount), 2, '.', '');
      $array[$key]['R/off'] = null;
      $array[$key]['Bill_City'] = $supplierOrder->city->name;
      $array[$key]['Bill_Pincode'] = $supplierOrder->shipping_pincode;
      $array[$key]['Bill_To_State'] = $supplierOrder->state?->name;
      $array[$key]['Bill_State_Code'] = $supplierOrder->state?->iso2;
      $array[$key]['Bill_State_No'] = $supplierOrder->state?->state_no;
      $array[$key]['Bill_Country'] = $supplierOrder->country?->name;
      $array[$key]['Ship_City'] = $supplierOrder->city?->name;
      $array[$key]['Ship_Pincode'] = $supplierOrder->shipping_pincode;
      $array[$key]['Ship_To_State'] = $supplierOrder->state?->name;
      $array[$key]['Ship_State_Code'] = $supplierOrder->state?->iso2;
      $array[$key]['Ship_State_No'] = $supplierOrder->state?->state_no;
      $array[$key]['Ship_Country'] = $supplierOrder->country?->name;
      $array[$key]['Payment_Mode'] = $supplierOrder->payment_method;
      $array[$key]['Order_Note'] = $supplierOrder->comment;
      $array[$key]['Status'] = $supplierOrder->payment_method === 'Cash on Delivery' ? 'COD' : 'Paid';
      $array[$key]['Fulfillment_Status'] = $order->status === 5 ? 'Delivered is Fulfilled' : null;
      $array[$key]['Fulfill_Location_Id'] = null;
      $array[$key]['Fulfill_Location_State_Code'] = $supplierOrder->state?->iso2;
      $array[$key]['Transport Mode'] = null;
      $array[$key]['Delivery Logistic Partner Name'] = !empty($supplierOrder->delhivery_response) ? 'Delhivery' : null;
      $array[$key]['Product Category'] = $product?->mappedCategories()?->first()->category_name ?? null;
      $array[$key]['AWB No'] = isset($supplierOrder->delhivery_response['packages'][0]['waybill']) ? $supplierOrder->delhivery_response['packages'][0]['waybill'] : null;
      $array[$key]['AWB Date'] = null;
      $array[$key]['Shipping Bill No'] = isset($supplierOrder->delhivery_response['packages'][0]['waybill']) ? $supplierOrder->delhivery_response['packages'][0]['waybill'] : null;
      $array[$key]['Shipping Bill Date'] = $order?->shipped_at?->format('d-m-Y');
      $array[$key]['Final Date of Delivery to Customer'] = null;
      $array[$key]['First Delivery AWB'] = null;
      $array[$key]['First Delivery AWB Date'] = null;
      $array[$key]['Second Delivery AWB'] = null;
      $array[$key]['Second Delivery AWB Date'] = null;
      $array[$key]['Third Delivery AWB'] = null;
      $array[$key]['Third Delivery AWB Date'] = null;
      $array[$key]['Delivery Status'] = $order->status === 5 ? 'Delivered' : null;
      $array[$key]['referrer_host'] = $supplierOrder->order?->utm?->utm_source;
      $array[$key]['Customer Landing Page'] = $supplierOrder->order?->utm?->utm_source;
      $array[$key]['Customer Membership Category'] = $order?->buyer->membership_type;
      $array[$key]['Order Qty'] = $order->quantity;
      $array[$key]['Return Qty'] = null;
      $array[$key]['Net Qty'] = $order->quantity;
      $array[$key]['Value in Foreign Currency'] = $supplierOrder->shipping_country_id !== 101 ? $supplierOrder->currency . ' ' . number_format(($supplierOrder->grand_total + $order->gift_pricing + $supplierOrder->shipping_charge - ($order->coupon_amount + $supplierOrder->wallet_used + $supplierOrder->gift_card_amount + $supplierOrder->referral_amount)) * @$supplierOrder->order->currency_con_ratio, 2, '.', '') : null;

      $array[$key]['Advance Amount'] = $supplierOrder->payment_method !== 'Cash on Delivery' ? number_format($supplierOrder->grand_total + $supplierOrder->shipping_charge - ($order->coupon_amount + $supplierOrder->wallet_used + $supplierOrder->gift_card_amount + $supplierOrder->referral_amount), 2, '.', '') : number_format($supplierOrder->advance_amount, 2, '.', '');

      $array[$key]['Amount Receivable'] = $supplierOrder->payment_method === 'Cash on Delivery' ? number_format($supplierOrder->grand_total + $order->gift_pricing + $supplierOrder->shipping_charge - ($order->coupon_amount + $supplierOrder->wallet_used + $supplierOrder->gift_card_amount + $supplierOrder->referral_amount + $supplierOrder->advance_amount), 2, '.', '') : '0';

      $array[$key]['Customer Type'] = $order?->buyer?->orders()->count() > 1 ? 'Returning' : 'New';
      $array[$key]['Customer Category'] = null;
      $array[$key]['Payment Gateway'] = $supplierOrder->payment_method;
      $array[$key]['Payment settlement_id'] = $supplierOrder?->order->razorpay_payment_id;
      $array[$key]['Payment Collection Fees without Tax'] = null;
      $array[$key]['Delivery destination_pin'] = $supplierOrder->shipping_pincode;
      $array[$key]['Delivery/Courier Charges Excl.GST'] = null;
      $array[$key]['Delivery/Courier GST'] = null;
      $array[$key]['Total Delivery/Courier Charges'] = $supplierOrder->shipping_charge;
      $array[$key]['REMARKS FIELD'] = $supplierOrder->admin_comment;
      $array[$key]['VENDOR CODE'] = $seller?->id;
      $array[$key]['PO Status Cancelled'] = $supplierOrder->po_status === 2 ? 'Yes' : 'No';
      $array[$key]['BRAND NAME'] = $seller?->biz_name;
      $array[$key]['LEGAL NAME'] = $seller?->biz_name;
      $array[$key]['ADDRESS'] = $seller?->biz_company_address;
      $array[$key]['CITY'] = $seller?->biz_company_city;
      $array[$key]['STATE'] = $seller?->state?->name;
      $array[$key]['GSTIN'] = $seller?->biz_reg_gst;
      $array[$key]['CONTACT NO'] = $seller?->biz_phone;
      $array[$key]['MAIL ID'] = $seller?->biz_email;
      $array[$key]['PO No'] = $supplierOrder->po_number !== null ? $supplierOrder->po_prefix . $supplierOrder->po_number : null;
      $array[$key]['PO Date'] = $supplierOrder->po_status_date?->format('d-m-Y');
      $array[$key]['Type of Order'] = $product?->availability;
      $array[$key]['Expected Delivery Date as per PO'] = $product?->vendor_delivery_date;
      $array[$key]['Actual Date of Receipt of Goods to TFE W/h'] = $order?->packed_at?->format('d-m-Y');
      $array[$key]['Tracking No'] = null;
      $array[$key]['MRP of Cloth to Customer'] = $order?->price_unit;
      $array[$key]['Margin %'] = $seller?->commission;
      $array[$key]['Margin Amount'] = number_format($commissionAmount, 2, '.', '');
      $array[$key]['Additional Discount from Designer in %'] = null;
      $array[$key]['Additional Discount from Designer in Value'] = null;
      $array[$key]['PO Basic Value'] = number_format($supplierOrder->grand_total - ($commissionAmount + $poTaxAmount), 2, '.', '');
      $array[$key]['IGST%'] = !$sameState ? $order->gst . '%' : null;
      $array[$key]['CGST%'] = $sameState ? $order->gst / 2 . '%' : null;
      $array[$key]['SGST%'] = $sameState ? $order->gst / 2 . '%' : null;
      $array[$key]['IGST amt'] = !$sameState ? number_format($poTaxAmount, 2, '.', '') : null;
      $array[$key]['CGST amt'] = $sameState ? number_format($poTaxAmount / 2, 2, '.', '') : null;
      $array[$key]['SGST amt'] = $sameState ? number_format($poTaxAmount / 2, 2, '.', '') : null;
      $array[$key]['Total PO Amount'] = number_format($supplierOrder->grand_total - $commissionAmount, 2, '.', '');
      $array[$key]['VENDOR INVOICE NO'] = $supplierOrder->payment_invoice_number;
      $array[$key]['VENDOR INVOICE DATE'] = null;
      // $array[$key]['Invoice Basic Amount'] = number_format($supplierOrder->grand_total - $invoiceTaxAmount, 2,'.','');
      // $array[$key]['igst%'] = !$sameState ? $order->gst . '%' : null;
      // $array[$key]['cgst%'] = $sameState ? $order->gst / 2 . '%' : null;
      // $array[$key]['sgst%'] = $sameState ? $order->gst / 2 . '%' : null;
      // $array[$key]['igst amt'] = !$sameState ? number_format($supplierOrder->grand_total - $order->gstAmount, 2,'.','') : null;
      // $array[$key]['cgst amt'] = $sameState ? number_format(($supplierOrder->grand_total - $order->gstAmount) / 2, 2,'.','') : null;
      // $array[$key]['sgst amt'] = $sameState ? number_format(($supplierOrder->grand_total - $order->gstAmount) / 2, 2,'.','') : null;
      // $array[$key]['Total Invoice Amount'] = number_format($supplierOrder->grand_total + $supplierOrder->shipping_charge - ($order->coupon_amount +$supplierOrder->wallet_used + $supplierOrder->gift_card_amount + $supplierOrder->referral_amount), 2,'.','');
      // $array[$key]['Invoice/Debit Note Reference No'] = $supplierOrder->payment_invoice_number;
      $array[$key]['Invoice Basic Amount'] = null;
      $array[$key]['igst%'] =  null;
      $array[$key]['cgst%'] =  null;
      $array[$key]['sgst%'] =  null;
      $array[$key]['igst amt'] =  null;
      $array[$key]['cgst amt'] =  null;
      $array[$key]['sgst amt'] =  null;
      $array[$key]['Total Invoice Amount'] = null;
      $array[$key]['Invoice/Debit Note Reference No'] = $supplierOrder->payment_invoice_number;
      $array[$key]['VENDOR INVOICE PAYMENT STATUS'] = null;
      $array[$key]['DATE OF PAYMENT'] = null;
      $array[$key]['MODE OF PAYMENT'] = null;
      $array[$key]['PAYMENT REFERENCE NO'] = null;
      $array[$key]['AMOUNT PAID'] = null;
      $array[$key]['BALANCE AMOUNT'] = null;
      $array[$key]['REMARKS'] = null;
    }

    return $array;
  }
}
