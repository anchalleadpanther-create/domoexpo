<?php

namespace App\Exports\Reports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrderReport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
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
      'Order Id', 'Order Date ', 'Order Time', 'Order Status', 'Invoice ID', 'Product Name', 'Product Color/Size', 'Product Condition', 'Product Brand', 'Product SKU', 'Product Barcode', 'Product QTY', 'Product Sub Total', 'Product Shipping Rate', 'Product Wallet Used', 'Product Discount Via Coupon', 'Product Discount Via Coupon Amount', 'Product Discount Via Referral', 'Product Discount Via Gift Card', 'Product Discount Via Gift Card Amount', 'Product Total', 'Payment Type', 'Currency Code', 'Currency Con Ratio', 'Ordered Currency Product Price', 'Seller Name', 'Seller Country', 'Seller State', 'Buyer Name', 'Buyer Email', 'Buyer Phone Number', 'Customer Type'
    ];
  }
  public function array(): array
  {
    $array = [];
    $lastKey = 0;
    $totalQuantity = (int)$this->orders->sum('quantity');
    $grandTotal = 0;
    $totalGrandTotal = 0;
    $orderIds = [];
    $discountAmounts = 0;

    foreach ($this->orders->sortByDesc('orderItemDetail.created_at', SORT_REGULAR, false) as $key => $order) {
      $grandTotal = $order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge - $order->coupon_amount - ($order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount + $order->orderItemDetail->advance_amount);

      $totalGrandTotal += $order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge - $order->coupon_amount - ($order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount + $order->orderItemDetail->advance_amount);

      $colorAndSize = null;

      if (isset($order->productTypeValueOne)) {
        $colorAndSize .= $order->productTypeValueOne->type_value;
        if (isset($order->productTypeValueTwo))
          $colorAndSize .= ' - ' . $order->productTypeValueTwo->type_value;
      }

      if (!in_array($order->orderItemDetail->order_id, $orderIds))
        $orderIds[] = $order->orderItemDetail->order_id;

      $array[$key]['Order Id'] = @$order->orderItemDetail->order_id_counter;
      $array[$key]['Order Date'] = @$order->orderItemDetail->created_at->format('d M, Y');
      $array[$key]['Order Time'] = @$order->orderItemDetail->created_at->format('h:i A');
      $array[$key]['Order Status'] = @$order->OrderStatus;
      $array[$key]['Invoice ID'] = @$order->orderItemDetail->invoice_id;
      $array[$key]['Product Name'] = $order->name;
      $array[$key]['Product Color/Size'] = $colorAndSize;
      $array[$key]['Product Condition'] = $order->product_condition;
      $array[$key]['Product Brand'] = @$order->brand->brand_name;
      $array[$key]['Product SKU'] = $order->sku;
      $array[$key]['Product Barcode'] = $order->barcode;
      $array[$key]['Product QTY'] = $order->quantity;
      $array[$key]['Product Sub Total'] = number_format($order->orderItemDetail->grand_total, 2);
      $array[$key]['Product Shipping Rate'] = number_format($order->orderItemDetail->shipping_charge, 2);
      $array[$key]['Product Wallet Used'] = number_format($order->orderItemDetail->wallet_used, 2);
      $array[$key]['Product Discount Via Coupon'] = $order->orderItemDetail->order->coupon_code;
      $array[$key]['Product Discount Via Coupon Amount'] = number_format($order->coupon_amount, 2);
      $array[$key]['Product Discount Via Referral'] = number_format($order->orderItemDetail->referral_amount, 2);
      $array[$key]['Product Discount Via Gift Card'] = $order->orderItemDetail->order->gift_card;
      $array[$key]['Product Discount Via Gift Card Amount'] = number_format($order->orderItemDetail->gift_card_amount, 2);
      $array[$key]['Product Total'] = number_format($grandTotal, 2);
      $array[$key]['Payment Type'] = $order->orderItemDetail->payment_method;
      $array[$key]['Currency Code'] = @$order->orderItemDetail->order->currency_code;
      $array[$key]['Currency Con Ratio'] = @$order->orderItemDetail->order->currency_con_ratio;
      $array[$key]['Ordered Currency Product Price'] = number_format($grandTotal * @$order->orderItemDetail->order->currency_con_ratio, 2);
      $array[$key]['Seller Name'] = @$order->seller->biz_name;
      $array[$key]['Seller Country'] = @$order->seller->country->name;
      $array[$key]['Seller State'] = @$order->seller->state->name;
      $array[$key]['Buyer Name'] = @$order->buyer->fullName;
      $array[$key]['Buyer Email'] = @$order->buyer->email;
      $array[$key]['Buyer Phone Number'] = @$order->buyer->phone;
      $array[$key]['Customer Type'] = $order->buyer->ordersCount === 1 ? 'New Customer' : 'Returning Customer';
      $lastKey = $key;
    }
    // $couponDiscountAmount = Order::whereIn('id', $orderIds)->sum('coupon_amount');
    // $referralDiscountAmount = Order::whereIn('id', $orderIds)->sum('referral_amount');
    // $giftCardDiscountAmount = Order::whereIn('id', $orderIds)->sum('gift_card_amount');
    // $shippingAmount = Order::whereIn('id', $orderIds)->sum('shipping_charge');

    // $grandTotal += $shippingAmount;
    // $grandTotal -= ($couponDiscountAmount + $referralDiscountAmount + $giftCardDiscountAmount);

    $array[++$lastKey]['Order Id'] = 'Total Orders Quantity: ' . $totalQuantity;
    $array[++$lastKey]['Order Date'] = 'Total Orders Grand Total: INR ' . number_format($totalGrandTotal, 2);
    return $array;
  }
}
