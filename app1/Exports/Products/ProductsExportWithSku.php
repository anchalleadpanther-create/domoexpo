<?php

namespace App\Exports\Products;

use App\Models\Ecommerce\Product;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ProductsExportWithSku implements FromArray, WithHeadings, ShouldAutoSize, WithStyles, WithStrictNullComparison
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }

  public function __construct(private int|null $brandId, private string|null $search)
  {
  }

  public function headings(): array
  {
    return [
      'sku', 'name', 'brand', 'sort', 'barcode', 'description', 'short_desc', 'material', 'wash_care', 'gender', 'occasion', 'availability', 'youtube_url', 'meta_title', 'meta_description', 'meta_keywords', 'disclaimer', 'collection', 'status', 'is_allowed_country', 'vendor_delivery_date', 'is_custom', 'custom_tailored'
    ];
  }

  public function array(): array
  {
    $products = Product::orderByDesc('id');

    $products
      ->where([['variant_type', '=', 'single'], ['have_options', '=', 1]]);

    if (isset($this->brandId))
      $products
        ->where('brand_id', '=', $this->brandId);

    if (isset($this->search))
      $products
        ->where('name', 'like', '%' . $this->search . '%')
        ->orWhere('sku', 'like', '%' . $this->search . '%');

    $products = $products
      ->groupBy('sku')
      ->get();

    $productsArray = [];

    foreach ($products as $key => $product) {
      // $category = '';
      // $categories = $product->mappedCategories->where('parent_id', '!=', 0);

      // if ($categories->count() === 1)
      //   $category = $categories->first()->category_name;

      // if ($categories->count() === 2) {
      //   $categoryOne = $categories->first();
      //   $categoryTwo = $categories->last();
      //   if ($categoryOne->parent_id === $categoryTwo->id)
      //     $category = $categoryOne->category_name;
      //   else
      //     $category = $categoryTwo->category_name;
      // }
      $productsArray[$key]['sku'] = $product->sku;
      $productsArray[$key]['name'] = $product->name;
      $productsArray[$key]['brand'] = $product->brand->brand_name;
      $productsArray[$key]['sort'] = $product->sort;
      $productsArray[$key]['barcode'] = $product->barcode;
      $productsArray[$key]['description'] = $product->description;
      $productsArray[$key]['short_desc'] = $product->short_desc;
      $productsArray[$key]['material'] = $product->material;
      $productsArray[$key]['wash_care'] = $product->wash_care;
      $productsArray[$key]['gender'] = $product->gender;
      $productsArray[$key]['occasion'] = $product->occasion;
      $productsArray[$key]['availability'] = $product->availability;
      $productsArray[$key]['youtube_url'] = $product->youtube_url;
      $productsArray[$key]['meta_title'] = $product->meta_title;
      $productsArray[$key]['meta_description'] = $product->meta_description;
      $productsArray[$key]['meta_keywords'] = $product->meta_keywords;
      $productsArray[$key]['disclaimer'] = $product->disclaimer;
      $productsArray[$key]['collection'] = $product->collection;
      $productsArray[$key]['status'] = $product->status;
      $productsArray[$key]['is_allowed_country'] = $product->is_allowed_country;
      $productsArray[$key]['vendor_delivery_date'] = $product->vendor_delivery_date;
      $productsArray[$key]['is_custom'] = $product->is_custom;
      $productsArray[$key]['custom_tailored'] = $product->custom_tailored;
    }
    return $productsArray;
  }
}
