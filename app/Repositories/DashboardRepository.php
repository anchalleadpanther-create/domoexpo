<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Analytic;
use App\Models\Buyer\Cart;
use App\Models\Buyer\Buyer;
use App\Models\Buyer\Order;
use App\Models\Ecommerce\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier\SupplierOrder;
use Illuminate\Database\Eloquent\Builder;

class DashboardRepository
{
  public function getDashboardStats($request): array
  {
    $todayOrdersGrandTotal = 0;
    $totalBusinessGrandTotal = 0;

    $suppliers = Product::distinct('brand_id')->count();

    $buyers = Buyer::where('status', '=', 1)->count();

    $products = Product::where([
      ['status', '=', 1],
      ['parent_id', '=', 0]
    ])->count();

    $todayOrders = SupplierOrder::orderByDesc('id')
      ->where('status', '=', 0);

    $todayAcceptedOrders = SupplierOrder::orderByDesc('id')
      ->where('status', '=', 1);

    $todayCancelledOrders = SupplierOrder::orderByDesc('id')
      ->where('status', '=', 6);

    $todayDeliveredOrders = SupplierOrder::orderByDesc('id')
      ->where('status', '=', 5);

    $todayOrdersValues = SupplierOrder::orderByDesc('id')
      ->whereNotIn('status', [6, 7, 8]);

    $todayOrdersCouponDiscountValue = Order::orderByDesc('id')
      ->whereHas('orderItems.orderItemDetail', function (Builder $query) {
        $query->whereNotIn('status', [6, 7, 8]);
      });

    $todayOrdersGiftCardDiscountValue = Order::orderByDesc('id')
      ->whereHas('orderItems.orderItemDetail', function (Builder $query) {
        $query->whereNotIn('status', [6, 7, 8]);
      });

    $todayOrdersReferralDiscountValue = Order::orderByDesc('id')
      ->whereHas('orderItems.orderItemDetail', function (Builder $query) {
        $query->whereNotIn('status', [6, 7, 8]);
      });

    $todayOrdersShippingValue = Order::orderByDesc('id')
      ->whereHas('orderItems.orderItemDetail', function (Builder $query) {
        $query->whereNotIn('status', [6, 7, 8]);
      });

    $todayRefundOrdersValues = SupplierOrder::orderByDesc('id')
      ->whereIn('status', [7]);

    $topFiveProducts = Cart::where([['order_status', '=', 1]])
      ->whereNotIn('status', [6, 7, 8])
      ->has('product')
      ->groupBy('product_id')
      ->select('*', DB::raw('COUNT(*) as ordersCount'))
      ->orderBy('ordersCount', 'DESC')
      ->limit(5);

    $mostViewedProducts = Product::groupBy('sku')
      ->orderBy('view_count', 'DESC')
      ->limit(5)
      ->get();

    $topFiveBrands = Cart::where([['order_status', '=', 1]])
      ->whereNotIn('status', [6, 7, 8])
      ->has('seller')
      ->groupBy('seller_id')
      ->select('*', DB::raw('COUNT(*) as ordersCount'))
      ->orderBy('ordersCount', 'DESC')
      ->limit(5);

    $topCustomers = Cart::where([['order_status', '=', 1], ['buyer_id', '!=', null]])
      ->whereNotIn('status', [6, 7, 8])
      ->groupBy('buyer_id')
      ->limit(5)
      ->select('*', DB::raw('SUM(price_unit * quantity) as ordersTotalSum'))
      ->orderByDesc('ordersTotalSum');

    $returningCustomers = Cart::where([['order_status', '=', 1], ['buyer_id', '!=', null]])
      ->whereNotIn('status', [6, 7, 8])
      ->groupBy('buyer_id')
      ->limit(5)
      ->select('*', DB::raw('SUM(price_unit * quantity) as ordersTotalSum'))
      ->has('buyer.orders', '>', 1)
      ->orderByDesc('ordersTotalSum');

    $averageOrdersSumAmount = Cart::where([['order_status', '=', 1]])
      ->whereNotIn('status', [6, 7, 8]);

    $averageOrdersQuantity = Cart::where([['order_status', '=', 1]])
      ->whereNotIn('status', [6, 7, 8]);

    $websiteVisitors = Analytic::groupBy('ip_address')
      ->where('ref_url', 'like', '%fashioneditindia%')
      ->orWhere('ref_url', '=', null);

    $facebookVisitors = Analytic::groupBy('ip_address')
      ->where('ref_url', 'like', '%facebook%');

    $instagramVisitors = Analytic::groupBy('ip_address')
      ->where('ref_url', 'like', '%instagram%');

    $googleVisitors = Analytic::groupBy('ip_address')
      ->where('ref_url', 'like', '%google%');

    $visitorsFromCountries = Analytic::groupBy('country_name')
      ->limit(5)
      ->select('*', DB::raw('COUNT(country_name) as totalCountryCount'))
      ->orderBy('totalCountryCount', 'DESC');

    $visitorsFromCities = Analytic::groupBy('city_name')
      ->limit(5)
      ->select('*', DB::raw('COUNT(city_name) as totalCityCount'))
      ->orderBy('totalCityCount', 'DESC');

    $visitorFromDevices = Analytic::groupBy('device')
      ->limit(5)
      ->select('*', DB::raw('COUNT(device) as totalDeviceCount'))
      ->orderBy('totalDeviceCount', 'DESC');

    $topUrls = Analytic::groupBy('url')
      ->limit(5)
      ->select('*', DB::raw('COUNT(url) as totalUrlCount'))
      ->orderBy('totalUrlCount', 'DESC');

    $totalSessions = new Analytic;
    $totalUniqueSessions = Analytic::distinct('ip_address');

    if (isset($request->date_from)) {
      $todayOrders = $todayOrders->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()])->count();

      $todayAcceptedOrders = $todayAcceptedOrders->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()])->count();

      $todayCancelledOrders = $todayCancelledOrders->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()])->count();

      $todayDeliveredOrders = $todayDeliveredOrders->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()])->count();

      $todayOrdersValues = $todayOrdersValues->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()])->get();

      $topFiveProducts = $topFiveProducts->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);
      })
        ->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $topFiveBrands = $topFiveBrands->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);
      })->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $topCustomers = $topCustomers->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);
      });

      $returningCustomers = $returningCustomers->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);
      });

      $averageOrdersSumAmount = $averageOrdersSumAmount->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $averageOrdersQuantity = $averageOrdersQuantity->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $websiteVisitors = $websiteVisitors->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $facebookVisitors = $facebookVisitors->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $instagramVisitors = $instagramVisitors->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $googleVisitors = $googleVisitors->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $totalSessions = $totalSessions->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $totalUniqueSessions = $totalUniqueSessions->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $visitorsFromCountries = $visitorsFromCountries->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $visitorsFromCities = $visitorsFromCities->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $visitorFromDevices = $visitorFromDevices->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $topUrls = $topUrls->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()]);

      $todayRefundOrdersValues = $todayRefundOrdersValues->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->date_till)->endOfDay()])->sum('grand_total');
    } else {
      $todayOrders = $todayOrders->whereDate('created_at', '>=', Carbon::today())->count();

      $todayAcceptedOrders = $todayAcceptedOrders->whereDate('created_at', '>=', Carbon::today())->count();

      $todayCancelledOrders = $todayCancelledOrders->whereDate('created_at', '>=', Carbon::today())->count();

      $todayDeliveredOrders = $todayDeliveredOrders->whereDate('created_at', '>=', Carbon::today())->count();

      $todayOrdersValues = $todayOrdersValues->whereDate('created_at', '>=', Carbon::today())->get();

      $todayRefundOrdersValues = $todayRefundOrdersValues->whereDate('created_at', '>=', Carbon::today())->sum('grand_total');

      $topFiveProducts = $topFiveProducts->whereHas('orderItemDetail', function ($q) {
        $q->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
      })->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $topFiveBrands = $topFiveBrands->whereHas('orderItemDetail', function ($q) {
        $q->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
      })->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $topCustomers = $topCustomers->whereHas('orderItemDetail', function ($q) {
        $q->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
      })->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $returningCustomers = $returningCustomers->whereHas('orderItemDetail', function ($q) {
        $q->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
      })->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $averageOrdersSumAmount = $averageOrdersSumAmount->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $averageOrdersQuantity = $averageOrdersQuantity->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $websiteVisitors = $websiteVisitors->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $facebookVisitors = $facebookVisitors->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $instagramVisitors = $instagramVisitors->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $googleVisitors = $googleVisitors->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $totalSessions = $totalSessions->whereDate('created_at', '>=', Carbon::today());

      $totalUniqueSessions = $totalUniqueSessions->whereDate('created_at', '>=', Carbon::today());

      $visitorsFromCountries = $visitorsFromCountries->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $visitorsFromCities = $visitorsFromCities->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $visitorFromDevices = $visitorFromDevices->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);

      $topUrls = $topUrls->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
    }

    $allOrdersValues = SupplierOrder::orderByDesc('id')
      ->whereNotIn('status', [6, 7, 8])
      ->get();

    foreach ($todayOrdersValues as $order)
      $todayOrdersGrandTotal += $order->grand_total - ($order->wallet_used + $order->gift_card_amount + $order->advance_amount + $order->referral_amount + $order->cartItem?->coupon_amount);

    foreach ($allOrdersValues as $order)
      $totalBusinessGrandTotal += $order->grand_total - ($order->wallet_used + $order->gift_card_amount + $order->advance_amount + $order->referral_amount + $order->cartItem?->coupon_amount);

    $allOrders = Cart::orderByDesc('id')
      ->where([['order_status', '=', 1], ['status', '=', 0]])
      ->count();

    $allDeliveredOrders = Cart::orderByDesc('id')
      ->where([['order_status', '=', 1], ['status', '=', 5]])
      ->count();

    $allCancelledOrders = Cart::orderByDesc('id')
      ->where([['order_status', '=', 1], ['status', '=', 6]])
      ->count();

    $allCustomers = Buyer::count();

    $allRefundOrdersValues = SupplierOrder::orderByDesc('id')
      ->whereIn('status', [7])
      ->sum('grand_total');

    $topFiveProducts = $topFiveProducts->get();

    $topFiveBrands = $topFiveBrands->get();

    $topCustomers = $topCustomers->get();

    $returningCustomers = $returningCustomers->get();

    $websiteVisitors = $websiteVisitors->get();
    $facebookVisitors = $facebookVisitors->get();
    $instagramVisitors = $instagramVisitors->get();
    $googleVisitors = $googleVisitors->get();

    $visitorsFromCountries = $visitorsFromCountries->get();

    $visitorsFromCities = $visitorsFromCities->get();

    $visitorFromDevices = $visitorFromDevices->get();

    $topUrls = $topUrls->get();

    $totalSessions = $totalSessions->count();

    $totalUniqueSessions = $totalUniqueSessions->count();

    $averageOrdersSumAmount = $averageOrdersSumAmount->sum(DB::raw('price_unit * quantity'));
    $averageOrdersQuantity = $averageOrdersQuantity->sum('quantity');
    $averageOrdersValue = $averageOrdersSumAmount > 0 ? $averageOrdersSumAmount / $averageOrdersQuantity : 0;

    return compact(
      'suppliers',
      'buyers',
      'products',
      'todayOrders',
      'todayAcceptedOrders',
      'todayCancelledOrders',
      'todayDeliveredOrders',
      'todayOrdersGrandTotal',
      'todayRefundOrdersValues',
      'allOrders',
      'allDeliveredOrders',
      'allCancelledOrders',
      'allCustomers',
      'allOrdersValues',
      'totalBusinessGrandTotal',
      'allRefundOrdersValues',
      'topFiveProducts',
      'mostViewedProducts',
      'topFiveBrands',
      'topCustomers',
      'returningCustomers',
      'averageOrdersValue',
      'websiteVisitors',
      'facebookVisitors',
      'instagramVisitors',
      'googleVisitors',
      'visitorsFromCountries',
      'visitorsFromCities',
      'visitorFromDevices',
      'topUrls',
      'totalSessions',
      'totalUniqueSessions'
    );
  }
}
