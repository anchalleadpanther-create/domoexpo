<?php

namespace App\Http\Requests\Extensions;

use Illuminate\Foundation\Http\FormRequest;

class SelextBoxValueRequest extends FormRequest
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
      'dropdown_id' => 'required',
      'dropdown_values' => 'required',
      'displayflag' => 'required',
    ];
  }
}
