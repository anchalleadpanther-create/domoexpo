<?php

namespace App\Actions\Reports;

use Illuminate\View\View;
use App\Models\Buyer\Buyer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\CustomersReportExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CustomersReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $buyers = Buyer::where([['status', '=', 1]])->orderBy('first_name')->has('orders', '>=', 1);

    if (isset($request->search))
      $buyers = $buyers->where('first_name', 'like', '%' . $request->search . '%')
        ->orWhere('last_name', 'like', '%' . $request->search . '%')
        ->orWhere('email', 'like', '%' . $request->search . '%')
        ->orWhere('phone', 'like', '%' . $request->search . '%');

    if (isset($request->report_type))
      return Excel::download(new CustomersReportExport($buyers->get()), 'customers-report.xlsx');

    $buyers = $buyers->paginate(100)->withQueryString();

    return view('reports.customer-reports', compact('buyers'));
  }
}
