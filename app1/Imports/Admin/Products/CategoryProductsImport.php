<?php

namespace App\Imports\Admin\Products;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Models\Ecommerce\ProductMappedCategory;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CategoryProductsImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{

  public function __destruct()
  {
  }
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    ProductMappedCategory::find($row['id'])->update(['sort' => $row['sort']]);
  }

  public function rules(): array
  {
    return [
      'id' => ['required', 'exists:App\Models\Ecommerce\ProductMappedCategory,id'],
      'sort' => ['bail', 'required', 'digits_between:0,99999999'],
    ];
  }

  public function batchSize(): int
  {
    return 1000;
  }

  public function chunkSize(): int
  {
    return 1000;
  }
}
