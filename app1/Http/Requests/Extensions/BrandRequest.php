<?php

namespace App\Http\Requests\Extensions;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function rules()
  {
    return [
      'brand_name' => 'required|max:100',
      'description' => 'nullable|max:500',
      'brand_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:512', //|dimensions:width=300,height=300
      'brand_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' //|dimensions:width=800,height=200
    ];
  }

  public function messages()
  {
    return [
      'brand_icon.dimensions' => 'Icon must be of 50 width and height only.',
      'brand_banner.dimensions' => 'Banner must be of 800 width and 200 height only.',
    ];
  }
}
