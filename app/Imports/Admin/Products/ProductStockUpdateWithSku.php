<?php

namespace App\Imports\Admin\Products;

use App\Models\Ecommerce\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductStockUpdateWithSku implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{
  public function __construct(private int $sellerId)
  {
  }

  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    Product::where([['sku', '=', $row['sku']], ['seller_id', '=', $this->sellerId]])->update(['stock' => $row['stock']]);
  }

  public function rules(): array
  {
    return [
      'sku' => ['bail', 'required', 'exists:App\Models\Ecommerce\Product,sku'],
      'stock' => ['bail', 'required', 'numeric', 'min:0'],
    ];
  }

  public function batchSize(): int
  {
    return 50;
  }

  public function chunkSize(): int
  {
    return 50;
  }
}
