<?php

namespace App\Http\Requests\Extensions;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
      'category_name' => 'required|max:200',
      'meta_keywords' => 'nullable|max:500',
      'description' => 'nullable|max:500',
      'category_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:512', //|dimensions:width=100,height=100
      'category_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' //dimensions:width=800,height=200
    ];
  }

  public function messages()
  {
    return [
      'category_icon.dimensions' => 'Icon must be of 100 width and height only.',
      'category_banner.dimensions' => 'Banner must be of 800 width and 200 height only.',
    ];
  }
}
