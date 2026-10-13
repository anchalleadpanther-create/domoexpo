<?php

namespace App\Exports\Products;

use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\ProductMappedCategory;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class CategoryProductsExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles, WithStrictNullComparison
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }

  public function __construct(private Collection $categories)
  {
  }

  public function headings(): array
  {
    return [
      'ID', 'Category Name ', 'Product Name', 'SKU', 'Color', 'Size', 'Sort',
    ];
  }

  public function array(): array
  {
    $productsArray = [];

    foreach ($this->categories as $key => $mappedCategory) {
      $productsArray[$key]['ID'] = $mappedCategory->id;
      $productsArray[$key]['Category Name'] = $mappedCategory->category?->category_name;
      $productsArray[$key]['Product Name'] = $mappedCategory->product?->name;
      $productsArray[$key]['SKU'] = $mappedCategory->product?->sku;
      $productsArray[$key]['Color'] = $mappedCategory->product?->productTypeValueOne?->type_value;
      $productsArray[$key]['Size'] = $mappedCategory->product?->productTypeValueTwo?->type_value;
      $productsArray[$key]['Sort'] = $mappedCategory->sort;
    }
    return $productsArray;
  }
}
