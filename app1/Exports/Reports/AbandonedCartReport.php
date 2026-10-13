<?php

namespace App\Exports\Reports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AbandonedCartReport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }
  public function __construct(private $products)
  {
  }

  public function headings(): array
  {
    return [
      'Product Id', 'Product Name', 'Product Brand', 'Product SKU', 'Product QTY', 'Product Pricing', 'Customer Name', 'Customer Email', 'Customer Phone Number', 'Customer Country', 'Customer State', 'Customer City', 'Customer Address', 'Added Date/Time in Cart'
    ];
  }
  public function array(): array
  {
    $array = [];
    $lastKey = 0;
    $totalQuantity = (int)$this->products->sum('quantity');
    $grandTotal = 0;

    foreach ($this->products as $key => $product) {
      $array[$key]['Product Id'] = @$product->product_id;
      $array[$key]['Product Name'] = @$product->name;
      $array[$key]['Product Brand'] = $product->brand?->brand_name;
      $array[$key]['Product SKU'] = $product->sku;
      $array[$key]['Product QTY'] = $product->quantity;
      $array[$key]['Product Pricing'] = 'INR ' . number_format($product->price_unit, 2);
      $array[$key]['Customer Name'] = $product->buyer?->fullName;
      $array[$key]['Customer Email'] = $product->buyer?->email;
      $array[$key]['Customer Phone Number'] = $product->buyer?->phone;
      $array[$key]['Customer Country'] = $product?->buyer?->addresses->first()?->myCountry->name;
      $array[$key]['Customer State'] = $product?->buyer?->addresses->first()?->myState->name;
      $array[$key]['Customer City'] = $product?->buyer?->addresses->first()?->myCity->name;
      $array[$key]['Customer Address'] = $product?->buyer?->addresses->first()?->address_one;
      $array[$key]['Added Date/Time in Cart'] = $product->created_at->format('d M, Y h:i A');

      $grandTotal += $product->price_unit * $product->quantity;
      $lastKey = $key;
    }

    $array[++$lastKey]['Order Id'] = 'Total Cart Quantity: ' . $totalQuantity;
    $array[++$lastKey]['Order Date'] = 'Total Cart Grand Total: INR ' . number_format($grandTotal, 2);
    return $array;
  }
}
