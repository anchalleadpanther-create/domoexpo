<?php

namespace App\Http\Requests\Extensions;

use Illuminate\Foundation\Http\FormRequest;

class DropdownRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  // public function authorize()
  // {
  //     return false;
  // }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'dropdown_name' => 'required|string|max:100|unique:cpr_dropdowns',
      'dropdown_type' => 'required|string',
      'dropdown_desc' => 'nullable|string|max:200',
      'displayflag' => 'required|numeric',
    ];
  }
}
