<?php

namespace App\Http\Requests\Buyer;

use Illuminate\Foundation\Http\FormRequest;

class BookPackageRequest extends FormRequest
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
      'package_id' => ['required', 'exists:App\Models\Buyer\Package,id'],
      'expert_id' => ['required', 'exists:App\Models\Buyer\Buyer,id'],
      'name' => ['required', 'max:100', 'string'],
      'email' => ['required', 'email', 'max:100'],
      'phone' => ['required', 'max:20'],
      'type' => ['nullable', 'string'],
      'mode' => ['required', 'string'],
      'date' => ['required'],
      'time' => ['required'],
      'payment' => ['required', 'between:0,9999999999.99'],
      'help' => ['nullable', 'string', 'max:255'],
    ];
  }
}
