<?php



namespace App\Exports\Reports;



use Maatwebsite\Excel\Concerns\FromArray;

use Maatwebsite\Excel\Concerns\WithStyles;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;



class ProductsReportExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles

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

      'PID', 'Name', 'SKU', 'Barcode', 'Orders', 'Total Sales','Category Name'

    ];

  }

  public function array(): array

  {

    $array = [];



    foreach ($this->products as $key => $product) {

      $array[$key]['PID'] = $product->product->id;

      $array[$key]['Name'] = $product->product->name;

      $array[$key]['SKU'] = $product->product->sku;

      $array[$key]['Barcode'] = $product->product->barcode;

      $array[$key]['Orders'] = $product->ordersCount;

      $array[$key]['Total Sales'] = 'INR ' . number_format($product->ordersTotalSum, 2);

      $array[$key]['Category Name'] = @$product->product->mappedCategoriesNotInExtraCat->first()->category_name;

    }



    return $array;

  }

}

