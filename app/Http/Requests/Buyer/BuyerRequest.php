<?php

namespace App\Http\Requests\Buyer;

use Illuminate\Foundation\Http\FormRequest;

class BuyerRequest extends FormRequest
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
      'first_name' => 'required|string|max:50',
      'last_name' => 'required|string|max:50',
      'email' => 'required|email|max:100|unique:App\Models\Buyer\Buyer,email,' . app('request')->segment(3),
      'phone' => 'required|max:20',
      'address_one' => 'sometimes|max:100|string',
      'address_two' => 'nullable|max:100|string',
      'post_code' => 'sometimes|digits_between:6,10',
      'country' => 'sometimes',
      'state' => 'sometimes',
      'city' => 'sometimes|max:100|string',
      'address_type' => 'sometimes',
      'password' => 'sometimes|confirmed|min:6',
    ];
  }
}
