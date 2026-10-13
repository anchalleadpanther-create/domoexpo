<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventExhibitorRegistrationRequest extends FormRequest
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
      'event_id' => 'required',
      'name' => 'required|max:100',
      'email' => 'required|email|max:100',
      'mobile' => 'required|max:20',
      'link' => 'required|max:1000',
      'lookbook_pdf' => 'required|mimes:pdf',
    ];
  }
}
