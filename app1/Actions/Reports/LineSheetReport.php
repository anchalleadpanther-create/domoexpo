<?php

namespace App\Actions\Reports;

use Illuminate\View\View;
use App\Models\ImportSheet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\LineSheetsReportExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LineSheetReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $lineSheets = ImportSheet::whereIn('type', ['product_sheet'])
      ->orderByDesc('id');

    if (isset($request->date_from)) {
      $lineSheets = $lineSheets->whereDate('created_at', '>=', $request->date_from);
      $lineSheets = $lineSheets->whereDate('created_at', '<=', $request->date_till);
    } else {
      $lineSheets = $lineSheets->whereDate('created_at', '>=', defaultStartDateForReport()['dateInCarbon']);
    }

    if (isset($request->date_till))

    if (isset($request->report_type))
      return Excel::download(new LineSheetsReportExport($lineSheets->get()), 'line-sheet-report.xlsx');

    $lineSheets = $lineSheets->paginate(100)->withQueryString();

    return view('reports.line-sheet-report', compact('lineSheets'));
  }
}
