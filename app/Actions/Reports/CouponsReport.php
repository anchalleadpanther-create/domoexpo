<?php

namespace App\Actions\Reports;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Coupon;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Reports\CouponsReportExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CouponsReport
{
  use AsAction;

  public function handle(Request $request): View | BinaryFileResponse
  {
    $coupons = Coupon::orderBy('name');

    if (isset($request->search))
      $coupons = $coupons->where('name', 'like', '%' . $request->search . '%');

    if (isset($request->report_type))
      return Excel::download(new CouponsReportExport($coupons->get()), 'coupons-report.xlsx');

    $coupons = $coupons->paginate(100)->withQueryString();

    return view('reports.coupon-reports', compact('coupons'));
  }
}
