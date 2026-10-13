<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class DesignerOnboardingRequest extends FormRequest
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
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'biz_name' => 'required|string|max:100',
      'biz_email' => 'required|email|max:100|unique:cpr_suppliers',
      'biz_phone' => 'required|max:20',
      'biz_company' => 'required|max:100',
      'biz_company_address' => 'required|max:250',
      'biz_company_state' => 'required',
      'biz_company_city' => 'required|max:100',
      'commission' => 'required|between:0,100.00',
      'biz_reg_gst' => 'required|min:15|max:15',
      'biz_reg_pan_no' => 'required|min:10|max:10',
      'biz_bank_acc_name' => 'required|max:100',
      'biz_bank_acc_no' => 'required|max:25',
      'biz_bank_name' => 'required|max:100',
      'biz_bank_branch_name' => 'required|max:150',
      'biz_bank_ifsc_code' => 'required|max:30',
      'biz_bank_acc_type' => 'required|max:25',
      'ar_name' => 'required|max:100',
      'ar_email' => 'required|max:150',
      'ar_phone' => 'required|max:20',
      'accounts_name' => 'required|max:100',
      'accounts_email' => 'required|max:150',
      'accounts_phone' => 'required|max:20',
      'merchandiser' => 'required|max:100',
      'biz_reg_gst_file' => 'required|mimes:jpeg,png,jpg,pdf|max:5000',
      'biz_reg_pan_file' => 'required|mimes:jpeg,png,jpg,pdf|max:5000',
      'biz_bank_cancel_cheque_file' => 'required|mimes:jpeg,png,jpg,pdf|max:5000',
    ];
  }
  public function messages(): array
  {
    return [
      'biz_name.required' => 'Company name is required',
      'biz_name.string' => 'Company name must be alphabets',
      'biz_name.max' => 'Company name must be below or equal to 100 characters',
      'biz_email.required' => 'Email is required',
      'biz_email.email' => 'Email must be alphabets',
      'biz_email.max' => 'Email must be below or equal to 100 characters',
      'biz_email.unique' => 'Email is already taken',
      'biz_phone.required' => 'Designer contact number is required',
      'biz_phone.max' => 'Designer contact number must be below or equal to 20 numbers',
      'biz_company.required' => 'Company/Legal name is required',
      'biz_company.max' => 'Company/Legal name must be below or equal to 100 characters',
      'biz_company_address.required' => 'Company/Legal name is required',
      'biz_company_address.max' => 'Company/Legal name must be below or equal to 250 characters',
      'biz_company_state.required' => 'State field is required',
      'biz_company_city.required' => 'City name is required',
      'biz_company_city.max' => 'City name must be below or equal to 100 characters',
      'biz_reg_gst.required' => 'GST is required',
      'biz_reg_gst.min' => 'GST must be equal to 15 characters',
      'biz_reg_gst.max' => 'GST must be equal to 15 characters',
      'biz_reg_pan_no.required' => 'Pancard number is required',
      'biz_reg_pan_no.min' => 'Pancard number must be equal to 10 characters',
      'biz_reg_pan_no.max' => 'Pancard number must be equal to 10 characters',
      'biz_bank_acc_name.required' => 'Bank account holder name is required',
      'biz_bank_acc_name.max' => 'Bank account holder name must be below or equal to 100 characters',
      'biz_bank_acc_no.required' => 'Bank account number is required',
      'biz_bank_acc_no.max' => 'Bank account number must be below or equal to 25 characters',
      'biz_bank_name.required' => 'Bank name is required',
      'biz_bank_name.max' => 'Bank name must be below or equal to 100 characters',
      'biz_bank_branch_name.required' => 'Bank branch name is required',
      'biz_bank_branch_name.max' => 'Bank branch name must be below or equal to 150 characters',
      'biz_bank_ifsc_code.required' => 'Bank IFSC code is required',
      'biz_bank_ifsc_code.max' => 'Bank IFSC code must be below or equal to 25 characters',
      'biz_bank_acc_type.required' => 'Bank account type is required',
      'biz_bank_acc_type.max' => 'Bank account type must be below or equal to 150 characters',
      'ar_name.required' => 'Merchandiser/Contact Person name is required',
      'ar_name.max' => 'Merchandiser/Contact Person name must be below or equal to 100 characters',
      'ar_email.required' => 'Merchandiser/Contact Person email is required',
      'ar_email.max' => 'Merchandiser/Contact Person email must be below or equal to 150 characters',
      'ar_phone.required' => 'Merchandiser/Contact Person phone is required',
      'ar_phone.max' => 'Merchandiser/Contact Person phone must be below or equal to 20 characters',
      'biz_reg_gst_file.required' => 'GST document is required',
      'biz_reg_gst_file.max' => 'GST document size must be below 5MB',
      'biz_reg_gst_file.mimes' => 'GST document must be of type jpeg,png,jpg,pdf',
      'biz_reg_pan_file.required' => 'Pancard document is required',
      'biz_reg_pan_file.max' => 'Pancard document size must be below 5MB',
      'biz_reg_pan_file.mimes' => 'Pancard document must be of type jpeg,png,jpg,pdf',
      'biz_bank_cancel_cheque_file.required' => 'Cancel Cheque is required',
      'biz_bank_cancel_cheque_file.max' => 'Cancel Cheque size must be below 5MB',
      'biz_bank_cancel_cheque_file.mimes' => 'Cancel Cheque must be of type jpeg,png,jpg,pdf',
    ];
  }
}
