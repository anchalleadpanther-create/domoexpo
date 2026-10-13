<?php

namespace App\Actions\Admin\Products;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Products\ProductsExport;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportProducts
{
  use AsAction;

  public function handle(Request $request): BinaryFileResponse
  {
    try {
      return Excel::download(new ProductsExport($request->brand_id, $request->search, Auth::guard('vendor')->check() ? Auth::guard('vendor')->user()->id : null), 'products-with-color-sizes.xlsx');
    } catch (\Exception $th) {
      dd($th);
    }
  }
}
