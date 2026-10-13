<?php

namespace App\Exports;

use App\Models\Buyer\Buyer;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class BuyersExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles, WithStrictNullComparison
{
  public function styles(Worksheet $sheet)
  {
    return [
      1 => ['font' => ['bold' => true]],
    ];
  }

  public function headings(): array
  {
    return [
      'Title', 'Name', 'Email', 'Phone', 'Membership ID', 'Membership Exiry Date', 'Membership Points', 'Membership Type', 'Date of Birth', 'Newsletter Subscriber', 'Wallet Amount', 'Referred By', 'Is Expert', 'Expert Name', 'Category', 'Description', 'Status', 'Joined on', 'Address Name', 'Address Email', 'Address Mobile', 'Address Line', 'Address Country', 'Address State', 'Address City', 'Address Postcode', 'Address Type'
    ];
  }

  public function array(): array
  {
    $buyers = Buyer::orderBy('first_name')->orderBy('last_name')->get();
    $buyersArray = [];

    foreach ($buyers as $key => $buyer) {
      $buyersArray[$key]['Title'] = $buyer->title;
      $buyersArray[$key]['Name'] = $buyer->fullName;
      $buyersArray[$key]['Email'] = $buyer->email;
      $buyersArray[$key]['phone'] = $buyer->phone;
      $buyersArray[$key]['Membership ID'] = str_split($buyer->membership_id, 4)[0] . '-' . str_split($buyer->membership_id, 4)[1] . '-' . str_split($buyer->membership_id, 4)[2] . '-' . str_split($buyer->membership_id, 4)[3];
      $buyersArray[$key]['Membership Exiry Date'] = $buyer->membership_expiry_date?->format('d M, Y');
      $buyersArray[$key]['Membership Points'] = $buyer->membership_points;
      $buyersArray[$key]['Membership Type'] = $buyer->membership_type;
      $buyersArray[$key]['Date of Birth'] = $buyer->dob?->format('Y-m-d');
      $buyersArray[$key]['Newsletter Subscriber'] = $buyer->newsletter === 1 ? 'Yes' : 'No';
      $buyersArray[$key]['Wallet Amount'] = $buyer->wallet;
      $buyersArray[$key]['Referred By'] = $buyer->referred?->fullName . ' - ' . $buyer->referred?->email;
      $buyersArray[$key]['Is Expert'] = $buyer->is_expert ? 'Yes' : 'No';
      $buyersArray[$key]['Expert Name'] = $buyer->expertFullName;
      $buyersArray[$key]['Category'] = $buyer->category;
      $buyersArray[$key]['Description'] = strip_tags($buyer->description);
      $buyersArray[$key]['Status'] = $buyer->status === 1 ? 'Active' : 'In-Active';
      $buyersArray[$key]['Joined On'] = $buyer->created_at->format('Y-m-d');
      $buyersArray[$key]['Address Name'] = $buyer?->addresses->first()?->fullName;
      $buyersArray[$key]['Address Email'] = $buyer?->addresses->first()?->email;
      $buyersArray[$key]['Address Mobile'] = $buyer?->addresses->first()?->mobile;
      $buyersArray[$key]['Address Line'] = $buyer?->addresses->first()?->address_one;
      $buyersArray[$key]['Address Country'] = $buyer?->addresses->first()?->myCountry->name;
      $buyersArray[$key]['Address State'] = $buyer?->addresses->first()?->myState->name;
      $buyersArray[$key]['Address City'] = $buyer?->addresses->first()?->myCity->name;
      $buyersArray[$key]['Address Postcode'] = $buyer?->addresses->first()?->post_code;
      $buyersArray[$key]['Address Type'] = $buyer?->addresses->first()?->address_type;
    }
    return $buyersArray;
  }
}
