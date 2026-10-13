<?php

namespace App\Exports\Reports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CustomersReportExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  public function styles(Worksheet $sheet): array
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }

  public function __construct(private $customers)
  {
  }

  public function headings(): array
  {
    return [
      'Customer Name', 'Customer Email ', 'Customer Phone', 'Orders', 'Total Sales', 'Address', 'Country', 'State', 'City',
    ];
  }
  public function array(): array
  {
    $array = [];

    foreach ($this->customers as $key => $customer) {
      $array[$key]['Customer Name'] = $customer->fullName;
      $array[$key]['Customer Email'] = $customer->email;
      $array[$key]['Customer Phone'] = $customer->phone;
      $array[$key]['Orders'] = $customer->ordersCount;
      $array[$key]['Total Sales'] = 'INR ' . number_format($customer->ordersTotalSum, 2);
      $array[$key]['Address'] = $customer->addresses()?->first()?->address_one;
      $array[$key]['Country'] = $customer->addresses()?->first()?->myCountry->name;
      $array[$key]['State'] = $customer->addresses()?->first()?->myState->name;
      $array[$key]['City'] = $customer->addresses()?->first()?->myCity->name;
    }

    return $array;
  }
}
