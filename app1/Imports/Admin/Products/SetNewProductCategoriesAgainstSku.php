<?php

namespace App\Imports\Admin\Products;

use App\Models\Ecommerce\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SetNewProductCategoriesAgainstSku implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    $products = Product::where('sku', '=', $row['sku'])->get();
    foreach ($products as $product)
      $product->mappedCategories()->attach($row['cat_id'], ['is_extra_cat' => 1]);
  }

  public function rules(): array
  {
    return [
      'sku' => ['bail', 'required', 'exists:App\Models\Ecommerce\Product,sku'],
      'cat_id' => ['bail', 'required', 'exists:App\Models\Ecommerce\Category,id'],
    ];
  }

  public function batchSize(): int
  {
    return 100;
  }

  public function chunkSize(): int
  {
    return 100;
  }
}
