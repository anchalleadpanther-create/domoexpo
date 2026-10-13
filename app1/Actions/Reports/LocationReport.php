<?php

namespace App\Actions\Reports;

use Illuminate\View\View;
use App\Models\Buyer\Cart;
use Illuminate\Http\Request;
use App\Models\Extension\City;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\LocationReportExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LocationReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $locations = City::orderBy('name')
      ->whereHas('orderItems', function ($q) {
        $q->whereNotIn('status', [6, 7, 8]);
      });

    if (isset($request->date_from)) {
      $locations = $locations->whereHas('orderItems', function ($q) use ($request) {
        $q->whereDate('created_at', '>=', $request->date_from);
      });
      $locations = $locations->whereHas('orderItems', function ($q) use ($request) {
        $q->whereDate('created_at', '<=', $request->date_till);
      });
    } else {
      $locations = $locations->whereHas('orderItems', function ($q) {
        $q->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
      });
    }

    if (isset($request->report_type))
      return Excel::download(new LocationReportExport($locations->get()), 'location-report.xlsx');

    $locations = $locations->paginate(100)->withQueryString();

    $locations->each(function ($location) {
      $location['customersCount'] = $location->orderItems()->whereNotIn('status', [6, 7, 8])->distinct('user_id')->count();
      $location['ordersCount'] = $location->orderItems()->whereNotIn('status', [6, 7, 8])->count();
      $location['ordersAmountTotal'] = $location->orderItems()->whereNotIn('status', [6, 7, 8])->sum('grand_total') - ($location->orderItems()->whereNotIn('status', [6, 7, 8])->sum('wallet_used') + $location->orderItems()->whereNotIn('status', [6, 7, 8])->sum('gift_card_amount') + $location->orderItems()->whereNotIn('status', [6, 7, 8])->sum('advance_amount') + $location->orderItems()->whereNotIn('status', [6, 7, 8])->sum('referral_amount') + Cart::whereIn('id', $location->orderItems()->whereNotIn('status', [6, 7, 8])->pluck('cart_item_id')->toArray())->sum('coupon_amount'));
    });

    return view('reports.location-report', compact('locations'));
  }
}
