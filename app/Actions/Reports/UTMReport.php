<?php

namespace App\Actions\Reports;

use App\Models\UTM;
use Illuminate\View\View;
use App\Models\Buyer\Order;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use App\Exports\Reports\UTMExport;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\ProductsReportExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UTMReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $orders = Order::latest()->where('utm_id', '!=', NULL);

    if (isset($request->search))
      $orders = $orders->whereHas('utm', function ($q) use ($request) {
        $q->where('utm_source', 'like', '%' . $request->search . '%')
          ->orWhere('utm_medium', 'like', '%' . $request->search . '%');
      });

    if (isset($request->date_from)) {
      $orders = $orders->whereDate('created_at', '>=', $request->date_from);
      $orders = $orders->whereDate('created_at', '<=', $request->date_till);
    } else {
      $orders = $orders->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
    }

    if (isset($request->report_type))
      return Excel::download(new UTMExport($orders->get()), 'utm-report.xlsx');

    $orders = $orders->paginate(100)->withQueryString();

    return view('reports.utm-report', compact('orders'));
  }
}
