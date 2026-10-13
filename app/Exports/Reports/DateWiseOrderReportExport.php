<?php

namespace App\Exports\Reports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DateWiseOrderReportExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  public function styles(Worksheet $order): array
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }

  public function __construct(private $orders)
  {
  }

  public function headings(): array
  {
    return [
      'Date', 'New Orders', 'New Orders Value', 'Returning Orders', 'Returning Orders Value', 'Total Order Value',
    ];
  }
  public function array(): array
  {
    $array = [];

    foreach ($this->orders as $key => $order) {
      $array[$key]['Date'] = $order->date->format('d M, Y');
      $array[$key]['New Orders'] = "$order->new_order";
      $array[$key]['New Orders Value'] = 'INR ' .  number_format($order->new_order_value, 2);
      $array[$key]['Returning Orders'] = "$order->returning_order";
      $array[$key]['Returning Orders Value'] = 'INR ' .  number_format($order->returning_order_value, 2);
      $array[$key]['Total Order Value'] = 'INR ' .  number_format($order->new_order_value + $order->returning_order_value, 2);
    }

    return $array;
  }
}
