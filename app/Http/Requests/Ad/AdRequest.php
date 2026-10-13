<?php

namespace App\Http\Requests\Ad;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
      'name' => 'bail|required|max:200',
      'category' => 'bail|required',
      // 'sku' => 'bail|required',
      // 'barcode' => 'bail|nullable|max:100',
      'min_qty' => 'bail|nullable|min:0|max:9999999',
      'max_qty' => 'bail|nullable|min:0|max:9999999',
      'rrp.*' => 'nullable|min:0|max:9999999999',
      'discount.*' => 'nullable|min:0|max:9999999999',
      'price_unit.*' => 'nullable|min:0|max:9999999999',
      'stock.*' => 'nullable|min:0|max:9999999999',
      'service_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg',
      'description' => 'nullable|max:7500',
      'warranty_terms' => 'nullable|max:7500',
      'return_and_exchange_policy' => 'nullable|max:7500',
      // 'weight' => 'nullable|max:100',
      // 'lbh' => 'nullable|max:100',
      // 'pickup_availability' => 'nullable|max:100',

    ];
  }
}
