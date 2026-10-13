<?php

namespace App\Http\Requests\Extensions;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
      'category_id' => 'required',
      'name' => 'required|max:100',
      'content' => 'nullable',
      'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
      'seo_title' => 'nullable|max:200',
      'seo_description' => 'nullable|max:200',
      'seo_keywords' => 'nullable|max:200',
    ];
  }
}
