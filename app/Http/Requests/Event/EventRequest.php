<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
      'title' => 'required|max:200|unique:App\Models\Event,title,' . app('request')->segment(3),
      'description' => 'nullable',
      'date' => 'nullable|max:100',
      'venue' => 'nullable|max:255',
      'city' => 'nullable|max:255',
      'time' => 'nullable|max:100',
      'organised_by' => 'nullable|max:100',
      'icon_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
      'banner_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
    ];
  }
}
