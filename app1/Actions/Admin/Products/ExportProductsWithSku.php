<?php

namespace App\Actions\Admin\Products;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Exports\Products\ProductsExportWithSku;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportProductsWithSku
{
  use AsAction;

  public function handle(Request $request): BinaryFileResponse
  {
    try {
      return Excel::download(new ProductsExportWithSku($request->brand_id, $request->search), 'products-with-sku.xlsx');
    } catch (\Exception $th) {
      dd($th);
    }
  }
}
