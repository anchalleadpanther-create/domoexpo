<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeSliderRequest extends FormRequest
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
      'slider_img' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:1024',
      'slider_title' => 'nullable|string|max:100',
      'slider_description' => 'nullable|string|max:100',
      'slider_link' => 'nullable|max:1000',
      'sort' => 'nullable|digits_between:0,99999',
      'position' => 'required|string|max:100',
    ];
  }
}
