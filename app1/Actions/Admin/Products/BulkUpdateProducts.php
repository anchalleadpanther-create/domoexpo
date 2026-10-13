<?php

namespace App\Actions\Admin\Products;

use App\Traits\FileUpload;
use App\Models\ImportSheet;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ExcelFileRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Imports\Admin\Products\ProductsUpdate;
use Illuminate\Validation\ValidationException;

class BulkUpdateProducts
{
  use AsAction, FileUpload;

  public function handle(ExcelFileRequest $request)
  {
    try {
      Excel::import(new ProductsUpdate, $request->excelSheet);

      if ($request->hasfile('excelSheet')) :
        $request->request->add(['sheet' => $this->handleSingleFileUpload($request->excelSheet, 'uploads/merchant/')]);
      endif;

      ImportSheet::create(['file' => $request->sheet, 'type' => 'product_update_sheet', 'user_id' => auth()->user()->id]);

      return back()->with('success', 'Product sheet imported successfully.');
    } catch (ValidationException  $th) {
      dd($th->errors());
      return back()->withErrors($th->errors());
    } catch (\Exception $th) {
      dd($th->getMessage());
      return back()->withErrors($th->getMessage());
    }
  }
}
