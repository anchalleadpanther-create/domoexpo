<?php

namespace App\Exports;

use App\Models\Supplier\Supplier;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class SuppliersExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles, WithStrictNullComparison
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
      'Last Updated By', 'Total Products', 'Ready to Ship', 'Made to Order', 'Joined on', 'Status', 'Status Reason', 'Status Comment', 'Business Name', 'Business Email', 'Business Phone', 'Business Website', 'Company Type', 'Designer PO Emails', 'About', 'Company Name', 'Company Address', 'Company Country', 'Company State', 'Company City', 'Company Postcode', 'Office Name', 'Office Address', 'Office Country', 'Office State', 'Office City', 'Office Postcode', 'Business Registration No', 'Business Reg Date', 'GST No', 'GST No Approval', 'PAN No', 'PAN No Approval', 'Designer Commission', 'Bank Acc Name', 'Bank Acc Number',  'IFSC Code', 'Bank Branch Name', 'Swift Code', 'Route Code', 'Account Type', 'AR Name', 'AR Email', 'AR Phone No', 'AR Department', 'AR Designation', 'Accounts/Contact Person Name', 'Accounts/Contact Person Email ID', 'Accounts/Contact Person Phone Number',
    ];
  }

  public function array(): array
  {
    $suppliers = Supplier::orderBy('created_at', 'desc')->get();
    $suppliersArray = [];

    foreach ($suppliers as $key => $supplier) {
      $suppliersArray[$key]['Last Updated By'] = $supplier->user?->name . ' - ' . $supplier->user?->email;
      $suppliersArray[$key]['Total Products'] = $supplier->ProductsCount;
      $suppliersArray[$key]['Ready to Ship'] = $supplier->ReadyToShipProductsCount;
      $suppliersArray[$key]['Made to Order'] = $supplier->MadeToOrderProductsCount;
      $suppliersArray[$key]['Joined On'] = $supplier->created_at->format('Y-m-d');
      $suppliersArray[$key]['Status'] = $supplier->SupplierAcountStatus;
      $suppliersArray[$key]['Status Reason'] = $supplier->supplier_status_reason;
      $suppliersArray[$key]['Status Comment'] = $supplier->supplier_status_comment;
      $suppliersArray[$key]['Business Name'] = $supplier->biz_name;
      $suppliersArray[$key]['Business Email'] = $supplier->biz_email;
      $suppliersArray[$key]['Business Phone'] = $supplier->biz_phone;
      $suppliersArray[$key]['Business Website'] = $supplier->biz_website;
      $suppliersArray[$key]['Company Type'] = $supplier->biz_company_type;
      $suppliersArray[$key]['Designer PO Emails'] = implode(',', $supplier->po_emails);
      $suppliersArray[$key]['About'] = $supplier->biz_supplier_about;
      $suppliersArray[$key]['Company Name'] = $supplier->biz_name;
      $suppliersArray[$key]['Company Address'] = $supplier->biz_company_address;
      $suppliersArray[$key]['Company Country'] = $supplier->country?->name;
      $suppliersArray[$key]['Company State'] = $supplier->state?->name;
      $suppliersArray[$key]['Company City'] = $supplier->city?->name;
      $suppliersArray[$key]['Company Postcode'] = $supplier->biz_company_zip;
      $suppliersArray[$key]['Office Name'] = $supplier->biz_office_company;
      $suppliersArray[$key]['Office Address'] = $supplier->biz_office_address;
      $suppliersArray[$key]['Office Country'] = $supplier->officeCountry?->name;
      $suppliersArray[$key]['Office State'] = $supplier->officeState?->name;
      $suppliersArray[$key]['Office City'] = $supplier->biz_office_city;
      $suppliersArray[$key]['Office Postcode'] = $supplier->biz_office_zip;
      $suppliersArray[$key]['Business Registration No'] = $supplier->biz_reg_no;
      $suppliersArray[$key]['Business Reg Date'] = $supplier->biz_reg_date?->format('d M, Y');
      $suppliersArray[$key]['GST No'] = $supplier->biz_reg_gst;
      $suppliersArray[$key]['GST No Approval'] = $supplier->biz_reg_gst_approve;
      $suppliersArray[$key]['PAN No'] = $supplier->biz_reg_pan_no;
      $suppliersArray[$key]['PAN No Approval'] = $supplier->biz_reg_pan_approve;
      $suppliersArray[$key]['Designer Commission'] = $supplier->commission;
      $suppliersArray[$key]['Bank Acc Name'] = $supplier->biz_bank_acc_name;
      $suppliersArray[$key]['Bank Acc Number'] = $supplier->biz_bank_acc_no;
      $suppliersArray[$key]['IFSC Code'] = $supplier->biz_bank_ifsc_code;
      $suppliersArray[$key]['Bank Branch Name'] = $supplier->biz_bank_branch_name;
      $suppliersArray[$key]['Swift Code'] = $supplier->biz_bank_swift_code;
      $suppliersArray[$key]['Route Code'] = $supplier->biz_bank_route_code;
      $suppliersArray[$key]['Account Type'] = $supplier->biz_bank_acc_type;
      $suppliersArray[$key]['AR Name'] = $supplier->ar_name;
      $suppliersArray[$key]['AR Email'] = $supplier->ar_email;
      $suppliersArray[$key]['AR Phone No'] = $supplier->ar_phone;
      $suppliersArray[$key]['AR Department'] = $supplier->ar_department;
      $suppliersArray[$key]['AR Designation'] = $supplier->ar_designation;
      $suppliersArray[$key]['Accounts/Contact Person Name'] = $supplier->accounts_name;
      $suppliersArray[$key]['Accounts/Contact Person Email ID'] = $supplier->accounts_email;
      $suppliersArray[$key]['Accounts/Contact Person Phone Number'] = $supplier->accounts_phone;
    }
    return $suppliersArray;
  }
}
