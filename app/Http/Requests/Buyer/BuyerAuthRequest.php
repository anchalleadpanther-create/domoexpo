<?php

namespace App\Http\Requests\Buyer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class BuyerAuthRequest extends FormRequest
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
    $buyer_id = null;
    if(Auth::guard('buyer')->check()) {
      $buyer_id = Auth::guard('buyer')->user()->id;
    }
    return [
      'biz_name' => 'nullable|string|max:100',
      'biz_email' => 'nullable|email|max:100|unique:App\Models\Buyer\Buyer,biz_email,' . $buyer_id ,
      'biz_phone' => 'nullable|max:20|unique:App\Models\Buyer\Buyer,biz_phone,' . $buyer_id ,
      'biz_website' => 'nullable|max:1000|url',
      'biz_area_of_biz' => 'nullable|max:100',
      'biz_no_of_staff' => 'nullable|max:100',
      'biz_supplier_about' => 'nullable|max:300',
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
      'biz_bank_ifsc_code' => 'nullable|max:25',
      'biz_bank_swift_code' => 'nullable|max:25',
      'biz_bank_route_code' => 'nullable|max:25',
      'biz_bank_acc_type' => 'nullable|max:25',
      'ar_name' => 'required|max:100',
      'ar_email' => 'required|max:150|unique:App\Models\Buyer\Buyer,ar_email,' . $buyer_id,
      'ar_phone' => 'required|max:15|unique:App\Models\Buyer\Buyer,ar_phone,' . $buyer_id,
      'ar_department' => 'nullable|max:50',
      'ar_designation' => 'nullable|max:50',
      'password' => "sometimes|required|min:6|max:50|confirmed",
    ];
  }
}
