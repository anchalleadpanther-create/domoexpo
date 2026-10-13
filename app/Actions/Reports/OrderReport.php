<?php

namespace App\Actions\Reports;

use Illuminate\View\View;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Buyer;
use Illuminate\Http\Request;
use App\Models\Supplier\Supplier;
use App\Models\Ecommerce\Category;
use App\Exports\Reports\OrderReport as ExportOrderReport;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class OrderReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $orders = Cart::orderByDesc('id')->where('order_status', '=', 1)
      ->with('orderItemDetail');

    if (isset($request->date_from)) {
      $orders = $orders->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->whereDate('created_at', '>=', $request->date_from);
      });
      $orders = $orders->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->whereDate('created_at', '<=', $request->date_till);
      });
    } else {
      $orders = $orders->whereHas('orderItemDetail', function ($q) {
        $q->whereDate('created_at', '>=', defaultStartDateForReport()['dateInString']);
      });
    }

    if (isset($request->sku))
      $orders = $orders->where('sku', '=', $request->sku);

    if (isset($request->supplier))
      $orders = $orders->where('seller_id', '=', $request->supplier);

    if (isset($request->customer))
      $orders = $orders->where('buyer_id', '=', $request->customer);

    if (isset($request->status))
      $orders = $orders->where('status', '=', $request->status);
    else
      $orders = $orders->whereNotIn('status', [6, 7, 8]);

    if (isset($request->country))
      $orders = $orders->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->where('shipping_country_id', '=', $request->country);
      });

    if (isset($request->state))
      $orders = $orders->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->where('shipping_state_id', '=', $request->state);
      });

    if (isset($request->city))
      $orders = $orders->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->where('shipping_city_id', '=', $request->city);
      });

    if (isset($request->coupon))
      $orders = $orders->where('coupon_code', '=', $request->coupon);

    if (isset($request->report_type))
      // return Excel::download(new OrderReport($orders->get()), 'orders-report.xlsx');
      return Excel::download(new ExportOrderReport($orders->get()), 'normal-orders-report.xlsx');

    $totalQuantity = (int)$orders->sum('quantity');
    $grandTotal = 0;
    $orderIds = [];
    $discountAmounts = 0;

    foreach ($orders->get() as $order) {
      $grandTotal += ($order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge) - ($order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount + $order->coupon_amount);
      if (!in_array($order->orderItemDetail->order_id, $orderIds))
        $orderIds[] = $order->orderItemDetail->order_id;
    }

    // $couponDiscountAmount = Order::whereIn('id', $orderIds)->sum('coupon_amount');
    // $referralDiscountAmount = Order::whereIn('id', $orderIds)->sum('referral_amount');
    // $giftCardDiscountAmount = Order::whereIn('id', $orderIds)->sum('gift_card_amount');
    // $shippingAmount = Order::whereIn('id', $orderIds)->sum('shipping_charge');

    // $grandTotal += $shippingAmount;
    // $grandTotal -= ($couponDiscountAmount + $referralDiscountAmount + $giftCardDiscountAmount);

    $orders = $orders->paginate(50)->withQueryString();

    $suppliers = Supplier::where('status', '=', 1)
      ->select('id', 'biz_name')
      ->orderBy('biz_name')
      ->get();

    $customers = Buyer::where('status', '=', 1)
      ->select('id', 'first_name', 'last_name')
      ->orderBy('first_name')
      ->get();

    $categories = Category::where('status', '=', 1)
      ->select('id', 'category_name')
      ->orderBy('category_name')
      ->get();

    $products = Cart::where('order_status', '=', 1)
      ->whereNotIn('status', [6, 7, 8])
      ->groupBy('sku')
      ->select('sku', 'name')
      ->orderBy('name')
      ->get();

    $coupons = Cart::where([['order_status', '=', 1], ['coupon_code', '!=', null]])
      ->whereNotIn('status', [6, 7, 8])
      ->groupBy('coupon_code')
      ->select('coupon_code')
      ->orderBy('coupon_code')
      ->get();

    return view('reports.normal-order-reports', compact('orders', 'suppliers', 'customers', 'categories', 'totalQuantity', 'grandTotal', 'products', 'coupons'));
  }
}
