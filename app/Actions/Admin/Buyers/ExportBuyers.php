<?php

namespace App\Actions\Admin\Buyers;

use App\Exports\BuyersExport;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportBuyers
{
  use AsAction;

  public function handle(): BinaryFileResponse
  {
    return Excel::download(new BuyersExport, 'customers-report.xlsx');
  }
}
