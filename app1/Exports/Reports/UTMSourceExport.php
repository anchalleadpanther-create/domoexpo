<?php

namespace App\Exports\Reports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UTMSourceExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }
  public function __construct(private $utms)
  {
  }

  public function headings(): array
  {
    return [
      'UTM Source', 'UTM Counts', 'UTM Total Order Value'
    ];
  }
  public function array(): array
  {
    $array = [];

    foreach ($this->utms as $key => $utm) {
      $array[$key]['UTM Source'] = $utm->utm_source;
      $array[$key]['UTM Counts'] = $utm->orders()->count();
      $array[$key]['Order Value'] = 'INR ' . number_format($utm->orders()->sum('grand_total'), 2);
    }

    return $array;
  }
}
