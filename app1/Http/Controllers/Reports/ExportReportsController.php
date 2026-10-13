<?php

namespace App\Http\Controllers\Reports;

use App\Exports\Reports\FacebookProductsGBPReport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Reports\FacebookProductsReport;
use App\Exports\Reports\FacebookProductsUSAReport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportReportsController extends Controller
{
  public function facebookProductsReport(): BinaryFileResponse
  {
    return Excel::download(new FacebookProductsReport(), 'products.csv');
  }

  public function facebookProductsReportUSA(): BinaryFileResponse
  {
    return Excel::download(new FacebookProductsUSAReport(), 'products-usa.csv');
  }

  public function facebookProductsReportGBP(): BinaryFileResponse
  {
    return Excel::download(new FacebookProductsGBPReport(), 'products-gbp.csv');
  }
}
