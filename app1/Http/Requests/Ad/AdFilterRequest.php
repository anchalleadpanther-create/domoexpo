<?php

namespace App\Http\Requests\Ad;

use Illuminate\Foundation\Http\FormRequest;

class AdFilterRequest extends FormRequest
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
      'filter_name' => 'required|max:100|string',
      'alias' => 'nullable|max:100|string',
      'type' => 'required',
      'description' => 'nullable|max:100|string',
      'status' => 'required',
    ];
  }
}
