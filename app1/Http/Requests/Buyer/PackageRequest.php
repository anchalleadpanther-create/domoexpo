<?php

namespace App\Http\Requests\Buyer;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
      'name' => ['required', 'max:100', 'string'],
      'price' => ['required', 'between:0,9999999999.99'],
      'duration' => ['required', 'max:50', 'string'],
      'description' => ['required', 'max:100', 'string'],
      'long_description' => ['required', 'string'],
      'inclusions' => ['required'],
      'package_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048']
    ];
  }
}
