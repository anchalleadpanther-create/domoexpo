<?php



namespace App\Imports\Admin\Products;



use App\Models\Ecommerce\Product;

use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\WithValidation;

use Maatwebsite\Excel\Concerns\WithBatchInserts;

use Maatwebsite\Excel\Concerns\WithChunkReading;



class ProductsUpdate implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading

{

  /**

   * @param array $row

   *

   * @return \Illuminate\Database\Eloquent\Model|null

   */ 

  public function model(array $row)
  {
    Product::find((int)$row['id'])->update([
      'rrp' => $row['mrp'],
      'price_unit' => $row['selling_price'],
      'discount' => $this->percent($row['mrp'], $row['selling_price']),
      'stock' => $row['stock'],
    ]);

  }



  private function percent($a, $b)
  {
    $result = 0;
    $result = (($a - $b) / $a) * 100;
    return $result;
  }



  public function rules(): array
  {
    return [
      'id' => ['bail', 'required', 'exists:App\Models\Ecommerce\Product,id'],
      'name' => ['bail', 'required', 'max:200'],
      'sku' => ['bail', 'required', 'max:50'],
      'brand' => ['bail', 'required', 'exists:App\Models\Ecommerce\Brand,brand_name'],
      'mrp' => ['bail', 'required', 'numeric', 'between:0,9999999999.99'],
      'selling_price' => ['bail', 'required', 'numeric', 'between:0,9999999999.99'],
      'stock' => ['bail', 'required', 'integer', 'min:0'],
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

