<?php

namespace App\Actions\Reports;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Buyer\OrderDateReport;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\DateWiseOrderReportExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DateWiseOrderReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $orders = OrderDateReport::orderBy('date');

    if (isset($request->date_from)) {
      $orders = $orders->whereDate('date', '>=', $request->date_from);
      $orders = $orders->whereDate('date', '<=', $request->date_till);
    } else {
      $orders = $orders->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
    }

    if (isset($request->report_type))
      return Excel::download(new DateWiseOrderReportExport($orders->get()), 'date-wise-order-report.xlsx');

    $orders = $orders->paginate(100)->withQueryString();

    return view('reports.date-wise-order-report', compact('orders'));
  }
}
