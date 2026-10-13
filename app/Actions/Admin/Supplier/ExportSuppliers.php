<?php

namespace App\Actions\Admin\Supplier;

use App\Exports\SuppliersExport;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportSuppliers
{
  use AsAction;

  public function handle(): BinaryFileResponse
  {
    return Excel::download(new SuppliersExport, 'suppliers-report.xlsx');
  }
}
