<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
      'first_name' => 'required|max:50|string|regex:/^[a-zA-Z0-9\s]+$/',
      'last_name' => 'required|max:50|string|regex:/^[a-zA-Z0-9\s]+$/',
      'email' => 'required|max:150|email',
      'mobile' => 'required|max:25',
      'fax' => 'nullable|max:20',
      'company' => 'nullable|max:100|string',
      'address_one' => 'required|max:100|string',
      'address_two' => 'nullable|max:100|string',
      'post_code' => 'required|min:1|max:20',
      'country' => 'required',
      'state' => 'required',
      'city' => 'required|max:100|string',
      'address_type' => 'required',
    ];
  }
}
