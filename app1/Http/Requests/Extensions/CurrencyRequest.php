<?php

namespace App\Http\Requests\Extensions;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
      'currency' => 'required|string|max:20|unique:App\Models\Extensions\Currency,currency,' . app('request')->segment(3),
      'con_ratio' => 'required|numeric|min:0',
      'currency_code' => 'required|string|max:20',
      'currency_display_code' => 'required|string|max:10',
      'country_id' => 'required|numeric|min:0|exists:cpr_countries,id',
    ];
  }
}
