<?php

namespace App\Actions\Reports;

use App\Models\UTM;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use App\Exports\Reports\UTMExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Reports\UTMSourceExport;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\ProductsReportExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UTMSourceReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $utms = UTM::latest()->groupBy('utm_source');

    if (isset($request->date_from)) {
      $utms = $utms->whereDate('created_at', '>=', $request->date_from);
      $utms = $utms->whereDate('created_at', '<=', $request->date_till);
    } else {
      $utms = $utms->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
    }

    if (isset($request->report_type))
      return Excel::download(new UTMSourceExport($utms->get()), 'utm-source-report.xlsx');

    $utms = $utms->paginate(100)->withQueryString();

    return view('reports.utm-source-report', compact('utms'));
  }
}
