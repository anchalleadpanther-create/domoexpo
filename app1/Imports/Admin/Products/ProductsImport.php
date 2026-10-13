<?php

namespace App\Imports\Admin\Products;

use Exception;
use Illuminate\Support\Str;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Product;
use App\Models\Supplier\Supplier;
use App\Models\Ecommerce\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Ecommerce\ProductTypeValue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{
  private static int $productId = 0;
  private static string $skuGroupCode = '';
  private static array $allowedProductsSku = [];
  private static string $sellerName = '';

  public function __destruct()
  {
    Product::where('sku_group_code', '!=', NULL)->update(['sku_group_code' => NULL]);
  }
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    // dd($row);
    /*
     * checking if the current iterating sku exists in database
     * if yes then error will be thrown
     * if the product doesn't exists in the database
     * then we will allow the product for the current sheet 
     * to be executed freely regardless of 
     * position of the sku inside the sheet
     */
    if (!in_array($row['sku_code'], self::$allowedProductsSku)) {
      if (Product::where('sku', '=', $row['sku_code'])->exists()) {
        throw new Exception("SKU '{$row['sku_code']}' already exists!");
      }
    }
    array_push(self::$allowedProductsSku, $row['sku_code']);

    /*
     *  
     * check if the group_sku_code is already in the property
     * if not, then set the productId property to 0 
     * if yes, then set the productId property to the
     * productId of previous product so that the new 
     * products can have its parent id.
     *
     */
    self::$productId = $row['sku_group_code'] === self::$skuGroupCode ? self::$productId : 0;
    if (self::$productId === 0) {
      if (Product::where('sku_group_code', $row['sku_group_code'])->exists())
        self::$productId = Product::where('sku_group_code', $row['sku_group_code'])->first()->id;
    }

    $product = $this->saveProduct($row);
    $images = $this->getImages($row);
    $product->images()->createMany($images);
    $product->mappedCategories()->attach($row['maincategory']);

    if (Category::find($row['maincategory'])->exists()) {
      $parent = Category::find($row['maincategory']);
      if (isset($parent->parent))
        $product->mappedCategories()->attach($parent->parent->id);

      if (isset($parent->parent->parent))
        $product->mappedCategories()->attach($parent->parent->parent);
    }

    if (isset($row['category'])) {
      $extraCategoryArray = explode(',', $row['category']);

      foreach ($extraCategoryArray as $extraCategory) {
        if (Category::find(trim($extraCategory))->exists())
          $product->mappedCategories()->attach(trim($extraCategory), ['is_extra_cat' => 1]);
      }
    }

    self::$skuGroupCode = $row['sku_group_code'];
    self::$sellerName = $row['seller'];
  }

  public function getSellerName(): string
  {
    return self::$sellerName;
  }

  public function rules(): array
  {
    return [
      'seller' => ['bail', 'required', 'exists:App\Models\Supplier\Supplier,biz_name', 'max:100'],
      'brand' => ['bail', 'required', 'exists:App\Models\Ecommerce\Brand,brand_name', 'max:100'],
      'sku_code' => ['bail', 'required', 'max:50'],
      'sku_group_code' => ['bail', 'required', 'max:50'],
      'product_name' => ['bail', 'required', 'max:200'],
      'product_description' => ['nullable', 'max:17500'],
      'maincategory' => ['bail', 'required', 'numeric', 'exists:App\Models\Ecommerce\Category,id'],
      'searchkeyword' => ['bail', 'nullable', 'max:200'],
      'color' => ['bail', 'nullable', 'exists:App\Models\Ecommerce\ProductTypeValue,type_value'],
      'size' => ['bail', 'required', 'exists:App\Models\Ecommerce\ProductTypeValue,type_value'],
      // 'material' => ['bail', 'nullable', 'string', 'max:1000'],
      // 'product_length' => ['bail', 'nullable', 'numeric', 'min:0'],
      // 'packaging_dimension' => ['bail', 'nullable', 'string', 'min:0'],
      // 'product_weight_kg' => ['bail', 'nullable', 'numeric', 'min:0'],
      'mrp' => ['bail', 'required', 'numeric', 'min:0'],
      'sale_price' => ['bail', 'required', 'numeric', 'min:0'],
      'tax' => ['bail', 'required', 'numeric', 'min:0'],
      'inventory' => ['bail', 'required', 'numeric', 'min:0'],
      'hsn_code' => ['bail', 'nullable', 'max:50'],
      // 'wash_care' => ['bail', 'nullable', 'string', 'max:1000'],
      'meta_title' => ['bail', 'nullable', 'string', 'max:200'],
      'meta_description' => ['bail', 'nullable', 'string', 'max:1000'],
      'meta_keywords' => ['bail', 'nullable', 'string', 'max:200'],
      'product_warranty' => ['bail', 'nullable', 'string', 'max:255'],
      // 'gender' => ['bail', 'nullable', 'exists:App\Models\Extensions\DropdownValue,dropdown_value'],
      // 'occasion' => ['bail', 'nullable', 'exists:App\Models\Extensions\DropdownValue,dropdown_value'],
      'by_availability' => ['bail', 'nullable', 'exists:App\Models\Extensions\DropdownValue,dropdown_value'],
      // 'disclaimers' => ['bail', 'nullable', 'string', 'max:100000'],
      'main_image_url' => ['bail', 'required', 'string', 'max:100'],
      'image_url1' => ['bail', 'nullable', 'string', 'max:100'],
      'image_url2' => ['bail', 'nullable', 'string', 'max:100'],
      'image_url3' => ['bail', 'nullable', 'string', 'max:100'],
      'image_url4' => ['bail', 'nullable', 'string', 'max:100'],
      'image_url5' => ['bail', 'nullable', 'string', 'max:100'],
      // 'youtue_video_url' => ['bail', 'nullable', 'string', 'max:1000'],
      // 'collection' => ['bail', 'nullable', 'string', 'max:1000'],
      'vendor_delivery_date' => ['required', 'nullable', 'string', 'max:100'],
    ];
  }

  public function messages()
  {
    return [];
  }

  public function batchSize(): int
  {
    return 1000;
  }

  public function chunkSize(): int
  {
    return 1000;
  }

  private  function getBrandId(string $brandName): int
  {
    return Brand::where('brand_name', $brandName)->value('id');
  }

  private  function getSellerId(string $sellerName): int
  {
    return Supplier::where('biz_name', $sellerName)->value('id');
  }

  private function getColorId(string $color): int
  {
    return ProductTypeValue::where('type_value', $color)->where('type_id', 1)->value('id');
  }

  private function getSizeId(string $size): int
  {
    return ProductTypeValue::where('type_value', $size)->where('type_id', 2)->value('id');
  }

  // getImages 
  private function getImages(array $row): array
  {
    $images = [];
    $images[] = ['image' => $row['main_image_url']];

    if (isset($row['image_url1']))
      $images[] = ['image' => $row['image_url1']];

    if (isset($row['image_url2']))
      $images[] = ['image' => $row['image_url2']];

    if (isset($row['image_url3']))
      $images[] = ['image' => $row['image_url3']];

    if (isset($row['image_url4']))
      $images[] = ['image' => $row['image_url4']];

    if (isset($row['image_url5']))
      $images[] = ['image' => $row['image_url5']];

    return $images;
  }

  private function percent($a, $b)
  {
    $result = 0;
    $result = (($a - $b) / $a) * 100;
    return $result;
  }

  private function saveProduct(array $row)
  {
    $searchKeyword = $row['product_name'] . ' ' . $row['brand'] . ' ' . $row['sku_code'] . ' ' . $row['gender'] . ' ' . $row['occasion'];

    return Product::create([
      'uuid' => (string) Str::uuid(),
      'parent_id' => self::$productId,
      'user_id' => auth()->user()->id,
      'brand_id' => $this->getBrandId($row['brand']),
      'brand_name' => $row['brand'],
      'seller_id' => $this->getSellerId($row['seller']),
      'type_value_id_1' => isset($row['color']) ? $this->getColorId($row['color']) : null,
      'type_value_id_2' => $this->getSizeId($row['size']),
      'rrp' => (float)$row['mrp'],
      'price_unit' => (float)$row['sale_price'],
      'discount' => $this->percent($row['mrp'], $row['sale_price']),
      'stock' => (int)$row['inventory'],
      'variant_type' => 'single',
      'have_options' => 1,
      'name' => $row['product_name'],
      'slug' =>  Str::slug($row['product_name'], '-'),
      'sku' => $row['sku_code'],
      'front_end_search_keyword' => $searchKeyword,
      'sku_group_code' => $row['sku_group_code'],
      'product_condition' => 'New Product',
      'description' => $row['product_description'],
      'short_desc' => Str::limit(strip_tags($row['product_description'], 150)),
      'warranty' => $row['product_warranty'],
      'weight' => $row['product_weight_kg'],
      'material' => $row['material'],
      'gst' => $row['tax'],
      'hsn_code' => $row['hsn_code'],
      'wash_care' => $row['wash_care'],
      'gender' => $row['gender'] ?? '',
      'occasion' => $row['occasion'] ?? '',
      'availability' => $row['by_availability'],
      'youtube_url' => $row['youtue_video_url'],
      'meta_title' => $row['meta_title'],
      'meta_description' => $row['meta_desc'],
      'meta_keywords' => $row['searchkeyword'],
      'disclaimer' => $row['disclaimers'],
      'collection' => $row['collection'] ?? '',
      'components' => $row['components'] ?? '',
      'lining' => $row['lining'] ?? '',
      'print_pattern' => $row['print_pattern'] ?? '',
      'embroidery_work' => $row['embroidery_work'] ?? '',
      'fit' => $row['fit'] ?? '',
      'neck_type' => $row['neck_type'] ?? '',
      'style_customization' => $row['style_customization'] ?? '',
      'how_to_use' => $row['how_to_use'] ?? '',
      'good_to_know' => $row['good_to_know'] ?? '',
      'suitable_for' => $row['suitable_for'] ?? '',
      'expiry' => $row['expiry'] ?? '',
      'imported_from' => $row['imported_from'] ?? '',
      'ingredients' => $row['ingredients'] ?? '',
      'vendor_delivery_date' => $row['vendor_delivery_date'] ?? '',
    ]);
  }
}
