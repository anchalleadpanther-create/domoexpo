<?php

namespace App\Exports\Reports;

use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;

class LineSheetsReportExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  use RemembersRowNumber;

  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }
  public function __construct(private $lineSheets)
  {
  }

  public function headings(): array
  {
    return [
      '#', 'Type', 'Seller', 'Uploaded By Name', 'Uploaded By Email', 'Uploaded At', 'Download Link'
    ];
  }
  public function array(): array
  {
    $array = [];

    foreach ($this->lineSheets as $key => $sheet) {
      $array[$key]['#'] = $this->getRowNumber();
      $array[$key]['Type'] = Str::title(str_replace('_', ' ', $sheet->type));
      $array[$key]['Seller'] = $sheet->seller;
      $array[$key]['Uploaded By Name'] = $sheet?->user?->name;
      $array[$key]['Uploaded By Email'] = $sheet?->user?->email;
      $array[$key]['Uploaded At'] = $sheet->created_at->format('d M, Y h:i A');
      $array[$key]['Download Link'] = asset('uploads/merchant/') . '/' . $sheet->file;
    }

    return $array;
  }
}
