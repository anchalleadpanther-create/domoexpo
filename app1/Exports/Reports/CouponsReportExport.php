<?php

namespace App\Exports\Reports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CouponsReportExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }

  public function __construct(private $coupons)
  {
  }

  public function headings(): array
  {
    return [
      'Coupon Name', 'Total Uses ', 'Total Discount',
    ];
  }
  public function array(): array
  {
    $array = [];

    foreach ($this->coupons as $key => $coupon) {
      $array[$key]['Coupon Name'] = $coupon->name;
      $array[$key]['Total Uses'] = $coupon->totalUses;
      $array[$key]['Total Discount'] = 'INR ' . number_format($coupon->totalDiscounts, 2);
    }

    return $array;
  }
}
