<?php

namespace App\Http\Requests\Buyer;

use Illuminate\Foundation\Http\FormRequest;

class ExpertRequest extends FormRequest
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
      'expert_first_name' => 'required|max:50|string|regex:/^[a-zA-Z0-9\s]+$/',
      'expert_last_name' => 'required|max:50|string|regex:/^[a-zA-Z0-9\s]+$/',
      'category' => 'required|max:100',
      'description' => 'nullable',
    ];
  }

  // messages
  public function messages()
  {
    return [
      'expert_first_name.required' => 'Expert first name is required.',
      'expert_first_name.max' => 'Expert first name should not be more than 50 characters.',
      'expert_first_name.string' => 'Expert first name should be a string.',
      'expert_first_name.regex' => 'Expert first name should not contain any special characters.',
      'expert_last_name.required' => 'Expert last name is required.',
      'expert_last_name.max' => 'Expert last name should not be more than 50 characters.',
      'expert_last_name.string' => 'Expert last name should be a string.',
    ];
  }
}
