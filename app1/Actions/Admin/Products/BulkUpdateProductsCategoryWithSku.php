<?php

namespace App\Actions\Admin\Products;

use App\Traits\FileUpload;
use App\Models\ImportSheet;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ExcelFileRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Validation\ValidationException;
use App\Imports\Admin\Products\SetNewProductCategoriesAgainstSku;

class BulkUpdateProductsCategoryWithSku
{
  use AsAction, FileUpload;

  public function handle(ExcelFileRequest $request)
  {
    try {
      Excel::import(new SetNewProductCategoriesAgainstSku, $request->excelSheet);

      if ($request->hasfile('excelSheet'))
        $request->request->add(['sheet' => $this->handleSingleFileUpload($request->excelSheet, 'uploads/merchant/')]);

      ImportSheet::create(['file' => $request->sheet, 'type' => 'product_category_update_sheet_with_sku', 'user_id' => auth()->user()->id]);

      return back()->with('success', 'Product sheet imported and updated successfully.');
    } catch (ValidationException  $th) {
      return back()->withErrors($th->errors());
    } catch (\Exception $th) {
      return back()->withErrors($th->getMessage());
    }
  }
}
