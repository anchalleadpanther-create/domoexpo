<?php

namespace App\Http\Requests\Buyer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if(Auth::guard('buyer')->check()) {
      return true;
    }
    abort(403);
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'shipping_name' => 'required|max:100|string',
      'shipping_email' => 'required|email|max:150',
      'shipping_phone' => 'required|max:20',
      'shipping_address' => 'required|max:150|string',
      'shipping_country_id' => 'required',
      'shipping_state_id' => 'required',
      'shipping_city_id' => 'required',
      'payment_method' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'shipping_name.required' => 'Shipping name is required',
      'shipping_name.max' => 'Shipping name cannot exceed 100 characters',
      'shipping_email.required' => 'Shipping email is required',
      'shipping_email.max' => 'Shipping email cannot exceed 150 characters',
      'shipping_phone.max' => 'Shipping phone number cannot exceed 20 characters',
      'shipping_address.max' => 'Shipping address cannot exceed 150 characters',
      'shipping_country_id.required' => 'Shipping country is required',
      'shipping_state_id.required' => 'Shipping state is required',
      'shipping_city_id.required' => 'Shipping city is required',
      'payment_method.required' => 'Payment method is required',
    ];
  }
}
