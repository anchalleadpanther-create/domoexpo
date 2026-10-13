<?php

namespace App\Actions\Reports;

use Illuminate\View\View;
use App\Models\Buyer\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\ProductsReportExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProductsReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $products = Cart::where([['order_status', '=', 1]])
      ->whereNotIn('status', [6, 7, 8])
      ->has('product')
      ->groupBy('product_id')
      ->orderBy('ordersCount', 'DESC')
      ->select('*', DB::raw('SUM(price_unit * quantity) as ordersTotalSum'), DB::raw('COUNT(*) as ordersCount'));

    if (isset($request->search))
      $products = $products->whereHas('product', function ($q) use ($request) {
        $q->where('name', 'like', '%' . $request->search . '%')
          ->orWhere('sku', 'like', '%' . $request->search . '%');
      });


    if (isset($request->date_from)) {
      $products = $products->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->whereDate('created_at', '>=', $request->date_from);
      });
      $products = $products->whereHas('orderItemDetail', function ($q) use ($request) {
        $q->whereDate('created_at', '<=', $request->date_till);
      });
    } else {
      $products = $products->whereHas('orderItemDetail', function ($q) {
        $q->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
      });
    }

    // if (isset($request->country))
    //   $products = $products->whereHas('orderItemDetail', function ($q) use ($request) {
    //     $q->where('shipping_country_id', '=', $request->country);
    //   });

    // if (isset($request->state))
    //   $products = $products->whereHas('orderItemDetail', function ($q) use ($request) {
    //     $q->where('shipping_state_id', '=', $request->state);
    //   });

    // if (isset($request->city))
    //   $products = $products->whereHas('orderItemDetail', function ($q) use ($request) {
    //     $q->where('shipping_city_id', '=', $request->city);
    //   });

    if (isset($request->report_type))
      return Excel::download(new ProductsReportExport($products->get()), 'products-report.xlsx');

    $products = $products->paginate(100)->withQueryString();

    return view('reports.product-reports', compact('products'));
  }
}
