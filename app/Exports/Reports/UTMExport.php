<?php

namespace App\Exports\Reports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UTMExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  public function styles(Worksheet $sheet)
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
      'UTM Source', 'UTM Medium', 'UTM Campaign', 'UTM Terms', 'UTM Content', 'Customer Name', 'Customer Email', 'Order ID', 'Order Value',
    ];
  }
  public function array(): array
  {
    $array = [];

    foreach ($this->orders as $key => $order) {
      $array[$key]['UTM Source'] = $order?->utm?->utm_source;
      $array[$key]['UTM Medium'] = $order?->utm?->utm_medium;
      $array[$key]['UTM Campaign'] = $order?->utm?->utm_campaign;
      $array[$key]['UTM Terms'] = $order?->utm?->utm_terms;
      $array[$key]['UTM Content'] = $order?->utm?->utm_content;
      $array[$key]['Customer Name'] = $order?->shipping_name;
      $array[$key]['Customer Email'] = $order?->shipping_email;
      $array[$key]['Order ID'] = $order?->id;
      $array[$key]['Order Value'] = 'INR ' . number_format($order->grand_total, 2);
    }

    return $array;
  }
}
