<?php

namespace App\Exports\Products;

use App\Models\Ecommerce\Product;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ProductsExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles, WithStrictNullComparison
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }

  public function __construct(private int|null $brandId, private string|null $search, private int|null $sellerId)
  {
  }

  public function headings(): array
  {
    return [
      'ID', 'Name ', 'Sku', 'Color', 'Size', 'Category', 'Brand', 'Mrp', 'Selling Price', 'Stock',
    ];
  }

  public function array(): array
  {
    $products = Product::orderByDesc('id');

    $products->where([['variant_type', '=', 'single'], ['have_options', '=', 1]]);

    if (isset($this->brandId))
      $products->where('brand_id', '=', $this->brandId);

    if (isset($this->search))
      $products->where('name', 'like', '%' . $this->search . '%')
        ->orWhere('sku', 'like', '%' . $this->search . '%');

    if (isset($this->sellerId))
      $products->where('seller_id', '=', $this->sellerId);


    $products = $products->get();

    $productsArray = [];

    foreach ($products as $key => $product) {
      $category = '';
      $categories = $product->mappedCategories->where('parent_id', '!=', 0);

      if ($categories->count() === 1)
        $category = $categories->first()->category_name;

      if ($categories->count() === 2) {
        $categoryOne = $categories->first();
        $categoryTwo = $categories->last();
        if ($categoryOne->parent_id === $categoryTwo->id)
          $category = $categoryOne->category_name;
        else
          $category = $categoryTwo->category_name;
      }

      $productsArray[$key]['ID'] = $product->id;
      $productsArray[$key]['Name'] = $product->name;
      $productsArray[$key]['Sku'] = $product->sku;
      $productsArray[$key]['Color'] = $product->productTypeValueOne?->type_value;
      $productsArray[$key]['Size'] = $product->productTypeValueTwo?->type_value;
      $productsArray[$key]['Category'] = $category;
      $productsArray[$key]['Brand'] = $product->brand->brand_name;
      $productsArray[$key]['Mrp'] = $product->rrp;
      $productsArray[$key]['Selling Price'] = $product->price_unit;
      $productsArray[$key]['Stock'] = $product->stock;
    }
    return $productsArray;
  }
}
