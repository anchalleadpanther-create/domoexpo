<?php

namespace App\Exports\Reports;

use App\Models\Buyer\Cart;
use App\Models\Buyer\Order;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LocationReportExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }
  public function __construct(private $locations)
  {
  }

  public function headings(): array
  {
    return [
      'Country', 'State ', 'City', 'Total Customers', 'Total Orders', 'Total Sales',
    ];
  }
  public function array(): array
  {
    $array = [];
    $this->locations->each(function ($location) {
      $location['customersCount'] = $location->orderItems()->whereNotIn('status', [6, 7, 8])->distinct('user_id')->count();
      $location['ordersCount'] = $location->orderItems()->whereNotIn('status', [6, 7, 8])->count();
      $location['ordersAmountTotal'] = $location->orderItems()->whereNotIn('status', [6, 7, 8])->sum('grand_total') - ($location->orderItems()->whereNotIn('status', [6, 7, 8])->sum('wallet_used') + $location->orderItems()->whereNotIn('status', [6, 7, 8])->sum('gift_card_amount') + $location->orderItems()->whereNotIn('status', [6, 7, 8])->sum('advance_amount') + $location->orderItems()->whereNotIn('status', [6, 7, 8])->sum('referral_amount') + Cart::whereIn('id', $location->orderItems()->whereNotIn('status', [6, 7, 8])->pluck('cart_item_id')->toArray())->sum('coupon_amount'));
    });

    foreach ($this->locations as $key => $location) {
      $array[$key]['Country'] = $location?->state?->country?->name;
      $array[$key]['State'] = $location?->state?->name;
      $array[$key]['City'] = $location->name;
      $array[$key]['Total Customers'] = $location->customersCount;
      $array[$key]['Total Orders'] = $location->ordersCount;
      $array[$key]['Total Sales'] = 'INR ' . number_format($location->ordersAmountTotal, 2);
    }
    return $array;
  }
}
