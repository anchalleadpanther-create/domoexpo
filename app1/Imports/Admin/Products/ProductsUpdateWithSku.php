<?php

namespace App\Imports\Admin\Products;

use App\Models\Ecommerce\Brand;
use Illuminate\Validation\Rule;
use App\Models\Ecommerce\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductsUpdateWithSku implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    $currentProductData = [];
    foreach ($row as $key => $value) {
      if ($key === 'brand')
        $currentProductData[$key . '_id'] = Brand::where('brand_name', '=', $value)->first()->id;
      else
        $currentProductData[$key] = $value;
    }
    unset($currentProductData['sku']);
    Product::where('sku', '=', $row['sku'])->update($currentProductData);
  }

  public function rules(): array
  {
    return [
      'sku' => ['bail', 'required', 'exists:App\Models\Ecommerce\Product,sku'],
      'name' => ['bail', 'nullable', 'max:200'],
      'brand' => ['bail', 'nullable', 'string', 'max:100', 'exists:App\Models\Ecommerce\Brand,brand_name'],
      'barcode' => ['bail', 'nullable', 'max:50'],
      'description' => ['bail', 'nullable', 'max:100000'],
      'short_desc' => ['bail', 'nullable', 'max:250'],
      'material' => ['bail', 'nullable', 'string', 'max:1000'],
      'wash_care' => ['bail', 'nullable', 'string', 'max:1000'],
      'availability' => ['bail', 'nullable', 'exists:App\Models\Extensions\DropdownValue,dropdown_value'],
      'meta_title' => ['bail', 'nullable', 'string', 'max:200'],
      'meta_description' => ['bail', 'nullable', 'string', 'max:1000'],
      'meta_keywords' => ['bail', 'nullable', 'string', 'max:200'],
      'disclaimer' => ['bail', 'nullable', 'string', 'max:100000'],
      'collection' => ['bail', 'nullable', 'string', 'max:1000'],
      'status' => ['bail', 'nullable', Rule::in([0, 1])],
      'is_allowed_country' => ['bail', 'nullable', Rule::in([0, 1])],
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
