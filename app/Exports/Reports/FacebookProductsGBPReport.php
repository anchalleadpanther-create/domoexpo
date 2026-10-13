<?php

namespace App\Exports\Reports;

use App\Models\Ecommerce\Product;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FacebookProductsGBPReport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }

  public function headings(): array
  {
    return [
      'id', /* 'item_group_id', */ 'title ', 'description', 'availability', 'condition', 'price', 'link', 'image_link', 'brand', 'additional_image_link', 'sale_price', 'color', 'material', 'pattern', /* 'size', */ 'gender', 'age_group', 'product_type',
      'custom_label_0', 'custom_label_1', 'custom_label_2', 'google_product_category',
    ];
  }
  public function array(): array
  {
    $path = asset('uploads/products') . '/';
    $products = Product::where([
      ['status', '=', 1],
    ])
      ->groupBy('sku')
      ->get();

    $array = [];
    $getCurrentCurrency = getCurrentCurrency(232);

    foreach ($products as $key => $product) {
      if (isset($product->mappedCategories->last()->category_slug)) {
        $productImages = $product->images->take(2);
        $categories = implode(' > ', $product->mappedCategories()->pluck('category_name')->toArray());
        $array[$key]['id'] = $product->sku;
        // $array[$key]['item_group_id'] = $product->sku;
        $array[$key]['title'] = $product->name;
        $array[$key]['description'] = htmlspecialchars_decode($product->description);
        $array[$key]['availability'] = $product->stock === 0 ? 'out of stock' : 'in stock';
        $array[$key]['condition'] = 'new';
        $array[$key]['price'] = $product->rrp * $getCurrentCurrency->con_ratio . ' GBP';
        $array[$key]['link'] = route('customer.product-detail', [$product->mappedCategories->last()->category_slug, $product->slug, $product->sku, $product->uuid]);
        $array[$key]['image_link'] = isset($productImages[0]) &&
          file_exists(public_path() . '/uploads/products/' . $productImages[0]->image) ?  $path . $productImages[0]->image : null;
        $array[$key]['brand'] = $product->brand?->brand_name;
        $array[$key]['Additional_image_link'] = isset($productImages[1]) &&
          file_exists(public_path() . '/uploads/products/' . $productImages[1]->image) ?  $path . $productImages[1]->image : $path . $productImages[0]->image;
        $array[$key]['sale_price'] = $product->price_unit * $getCurrentCurrency->con_ratio . ' GBP';
        $array[$key]['color'] = $product->productTypeValueOne?->type_value;
        $array[$key]['material'] = $product->material;
        $array[$key]['pattern'] = $product->print_pattern;
        // $array[$key]['size'] = $product->productTypeValueTwo?->type_value;
        $array[$key]['gender'] = $product->gender;
        $array[$key]['age_group'] = $product->mappedCategories->first()->category_name === 'Kids' ? 'kids' : 'adult';
        $array[$key]['product_type'] = $categories;
        $array[$key]['custom_label_0'] = $categories;
        $array[$key]['custom_label_1'] = $product->brand?->brand_name;
        $array[$key]['custom_label_2'] = $product->gender;
        $array[$key]['google_product_category'] = 'Apparel & Accessories > Clothing > Dresses';
      }
    }
    return $array;
  }
}
