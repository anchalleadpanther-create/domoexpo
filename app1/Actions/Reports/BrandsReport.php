<?php

namespace App\Actions\Reports;

use Carbon\Carbon;
use Illuminate\View\View;
use App\Models\Buyer\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\BrandsReportExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BrandsReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $brands = Cart::where([['order_status', '=', 1]])
    ->whereNotIn('status', [6, 7, 8])
      ->has('seller')
      ->groupBy('seller_id')
      ->orderBy('ordersCount', 'DESC')
      ->select('*', DB::raw('SUM(price_unit * quantity) as ordersTotalSum'), DB::raw('COUNT(*) as ordersCount'));

    if (isset($request->search))
      $brands = $brands->whereHas('seller', function ($q) use ($request) {
        $q->where('biz_name', 'like', '%' . $request->search . '%');
      });

    if (isset($request->date_from)) {
      $brands = $brands->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->whereDate('created_at', '>=', $request->date_from);
      });
      $brands = $brands->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->whereDate('created_at', '<=', $request->date_till);
      });
    } else {
      $brands = $brands->whereHas('orderItemDetail', function ($q) {
        $q->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
      });
    }

    // if (isset($request->country))
    //   $brands = $brands->whereHas('orderItemDetail', function ($q) use ($request) {
    //     $q->where('shipping_country_id', '=', $request->country);
    //   });

    // if (isset($request->state))
    //   $brands = $brands->whereHas('orderItemDetail', function ($q) use ($request) {
    //     $q->where('shipping_state_id', '=', $request->state);
    //   });

    // if (isset($request->city))
    //   $brands = $brands->whereHas('orderItemDetail', function ($q) use ($request) {
    //     $q->where('shipping_city_id', '=', $request->city);
    //   });

    if (isset($request->report_type))
      return Excel::download(new BrandsReportExport($brands->get()), 'brands-report.xlsx');

    $brands = $brands->paginate(100)->withQueryString();

    return view('reports.brand-reports', compact('brands'));
  }
}
