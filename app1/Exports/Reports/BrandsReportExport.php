<?php

namespace App\Exports\Reports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BrandsReportExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }
  public function __construct(private $brands)
  {
  }

  public function headings(): array
  {
    return [
      'BID', 'Brand Name ', 'Brand Description', 'Brand Featured', 'Orders', 'Total Sales'
    ];
  }
  public function array(): array
  {
    $array = [];

    foreach ($this->brands as $key => $brand) {
      $array[$key]['PID'] = $brand->seller->id;
      $array[$key]['Brand Name'] = ucfirst($brand->seller->brand_name);
      $array[$key]['Brand Description'] = htmlspecialchars_decode($brand->seller->description);
      $array[$key]['Brand Featured'] = $brand->seller->featured ? 'Yes' : 'No';
      $array[$key]['Orders'] = $brand->seller->ordersCount;
      $array[$key]['Total Sales'] = 'INR ' . number_format($brand->ordersTotalSum, 2);
    }

    return $array;
  }
}
