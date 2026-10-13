<?php

namespace App\Actions\Admin\Products;

use Illuminate\Http\Request;

use App\Traits\FileUpload;
use App\Models\ImportSheet;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ExcelFileRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Imports\Admin\Products\ProductsImport;
use App\Imports\Purchasync\Products\PurchasyncProductsImport;
use Illuminate\Validation\ValidationException;

class BulkProductUpload
{
  use AsAction, FileUpload;
  
  
  
  
  public function handle(Request $request)
  {
    try {
        // dd('sassdf');
      $import = new PurchasyncProductsImport;
       Excel::import($import, $request->excelSheet);

      if ($request->hasfile('excelSheet'))
        $request->request->add(['sheet' => $this->handleSingleFileUpload($request->excelSheet, 'uploads/merchant/')]);

    //   ImportSheet::create(['file' => $request->sheet, 'type' => 'product_sheet', 'user_id' => auth()->user()->id, 'seller' => $import->getSellerName()]);
 ImportSheet::create(['file' => $request->sheet, 'type' => 'product_sheet', 'user_id' => auth()->user()->id, 'seller' => '']);
      return back()->with('success', 'Product sheet imported successfully.');
    } catch (ValidationException  $th) {
      return back()->withErrors($th->errors());
    } catch (\Exception $th) {
      return back()->withErrors($th->getMessage());
    }
  }

//   public function handle(ExcelFileRequest $request)
//   {
//     try {
//       $import = new ProductsImport;
//       Excel::import($import, $request->excelSheet);

//       if ($request->hasfile('excelSheet'))
//         $request->request->add(['sheet' => $this->handleSingleFileUpload($request->excelSheet, 'uploads/merchant/')]);

//       ImportSheet::create(['file' => $request->sheet, 'type' => 'product_sheet', 'user_id' => auth()->user()->id, 'seller' => $import->getSellerName()]);

//       return back()->with('success', 'Product sheet imported successfully.');
//     } catch (ValidationException  $th) {
//       return back()->withErrors($th->errors());
//     } catch (\Exception $th) {
//       return back()->withErrors($th->getMessage());
//     }
//   }
}
