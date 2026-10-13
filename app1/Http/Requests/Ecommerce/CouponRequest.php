<?php

namespace App\Http\Requests\Ecommerce;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
      'name' => 'required|string|max:255',
      'code' => 'required|string|max:255|unique:App\Models\Ecommerce\Coupon,code,' . app('request')->segment(3),
      'percent' => 'required|numeric|between:1,100',
      'date_from' => 'required|date',
      'date_till' => 'required|date',
      'coupon_type' => 'required',
      
    ];
  }
}
