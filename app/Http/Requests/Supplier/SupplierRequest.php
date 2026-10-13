<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    // dd(app('request')->segment(3));
    return [
      'biz_name' => 'required|string|max:100',
      'biz_email' => 'nullable|email|max:100|unique:cpr_suppliers,biz_email,' . app('request')->segment(3),
      'biz_phone' => 'nullable|max:20',
      'biz_website' => 'nullable|max:1000',
      'biz_area_of_biz' => 'nullable|max:100',
      'biz_no_of_staff' => 'nullable|max:100',
      'biz_supplier_about' => 'nullable|max:600',
      'biz_company' => 'nullable|max:100',
      'biz_company_address' => 'nullable|max:250',
      'biz_company_city' => 'nullable|max:100',
      'biz_company_zip' => 'nullable|max:10',
      'biz_office' => 'nullable|max:100',
      'biz_office_address' => 'nullable|max:250',
      'biz_office_city' => 'nullable|max:100',
      'biz_office_zip' => 'nullable|max:10',
      'biz_reg_no' => 'nullable|max:40',
      'biz_reg_gst' => 'nullable|max:15',
      'biz_reg_pan_no' => 'nullable|max:10',
      'biz_bank_acc_name' => 'nullable|max:100',
      'biz_bank_acc_no' => 'nullable|max:25',
      'biz_bank_name' => 'nullable|max:100',
      'biz_bank_ifsc_code' => 'nullable|max:30',
      'biz_bank_swift_code' => 'nullable|max:25',
      'biz_bank_route_code' => 'nullable|max:25',
      'biz_bank_acc_type' => 'nullable|max:25',
      'ar_name' => 'nullable|max:100',
      'ar_email' => 'nullable|max:150',
      'ar_phone' => 'nullable|max:20',
      'accounts_name' => 'nullable|max:100',
      'accounts_email' => 'nullable|max:150',
      'accounts_phone' => 'nullable|max:20',
      'ar_department' => 'nullable|max:50',
      'ar_designation' => 'nullable|max:50',
    ];
  }
}
