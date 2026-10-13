<?php

namespace App\Http\Requests\Extensions;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
    return [
      'company_name' => 'required|max:100',
      'company_address' => 'nullable|max:200',
      'company_email' => 'nullable|email|max:150',
      'company_phone' => 'nullable|min:10|max:15',
      'company_website' => 'nullable|max:1000',
      'company_tax_number' => 'nullable|max:25',
      'company_gst_number' => 'nullable|max:15',
      'company_pan_number' => 'nullable|max:10',
      'company_uac_number' => 'nullable|max:30',
      'contact_name' => 'nullable|max:100',
      'contact_email' => 'nullable|email|max:200',
      'contact_phone' => 'nullable|min:10|max:15',
      'contact_department' => 'nullable|max:100',
      'contact_designation' => 'nullable|max:100',
      'first_document' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:1024',
      'second_document' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:1024',
      'third_document' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:1024',
      'four_document' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:1024',
      'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:512',

    ];
  }
}
