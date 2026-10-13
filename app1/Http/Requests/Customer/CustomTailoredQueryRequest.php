<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomTailoredQueryRequest extends FormRequest
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
  public function rules(): array
  {
    return [
      'product_id' => ['required',  'numeric', 'exists:App\Models\Ecommerce\Product,id'],
      'query_type' => ['required', 'max:50', 'string'],
      'unit_type' => ['nullable', 'max:20', 'string'],
      'shoulder' => ['nullable', 'max:100', 'string'],
      'bust' => ['nullable', 'max:100', 'string'],
      'under_bust' => ['nullable', 'max:100', 'string'],
      'arm_hole' => ['nullable', 'max:100', 'string'],
      'sleeve_length' => ['nullable', 'max:100', 'string'],
      'bicep' => ['nullable', 'max:100', 'string'],
      'elbow' => ['nullable', 'max:100', 'string'],
      'wrist' => ['nullable', 'max:100', 'string'],
      'waist' => ['nullable', 'max:100', 'string'],
      'hip' => ['nullable', 'max:100', 'string'],
      'top_length' => ['nullable', 'max:100', 'string'],
      'bottom_length' => ['nullable', 'max:100', 'string'],
      'kurta_length' => ['nullable', 'max:100', 'string'],
      'front_neck_depth' => ['nullable', 'max:100', 'string'],
      'back_neck_depth' => ['nullable', 'max:100', 'string'],
      'crotch_depth' => ['nullable', 'max:100', 'string'],
      'thigh' => ['nullable', 'max:100', 'string'],
      'knee' => ['nullable', 'max:100', 'string'],
      'ankle' => ['nullable', 'max:100', 'string'],
      'calf' => ['nullable', 'max:100', 'string'],
      'height' => ['nullable', 'max:100', 'string'],
      'name' => ['nullable', 'max:100', 'string'],
      'email' => ['email:rfc,dns', 'required', 'max:100'],
      'mobile' => ['required', 'string', 'min:5', 'max:20'],
      'message' => ['nullable', 'string', 'max:1000'],
      'neck_round' => ['nullable', 'max:100', 'string'],
      'across_front' => ['nullable', 'max:100', 'string'],
      'cross_back' => ['nullable', 'max:100', 'string'],
      'apex' => ['nullable', 'max:100', 'string'],
      'apex_apex' => ['nullable', 'max:100', 'string'],
      'above_bust' => ['nullable', 'max:100', 'string'],
      'shoulder_to_under_bust' => ['nullable', 'max:100', 'string'],
      'blouse_length' => ['nullable', 'max:100', 'string'],
      'waist_round' => ['nullable', 'max:100', 'string'],
      'sleeve_round' => ['nullable', 'max:100', 'string'],
      'skirt_waist' => ['nullable', 'max:100', 'string'],
      'skirt_length' => ['nullable', 'max:100', 'string'],
      'full_karte_legth' => ['nullable', 'max:100', 'string'],
      'upper_bust' => ['nullable', 'max:100', 'string'],
      'mid_waist' => ['nullable', 'max:100', 'string'],
      'tummy' => ['nullable', 'max:100', 'string'],
      'low_waist' => ['nullable', 'max:100', 'string'],
      'forearm' => ['nullable', 'max:100', 'string'],
      'sleeve_mori' => ['nullable', 'max:100', 'string'],
      'shoulder_to_under_bust' => ['nullable', 'max:100', 'string'],
      'shoulder_slope' => ['nullable', 'max:100', 'string'],
      'waist_till_mid_thigh' => ['nullable', 'max:100', 'string'],
      'shoulder_to_apex' => ['nullable', 'max:100', 'string'],
      'bottom' => ['nullable', 'max:100', 'string'],
      'mid_thigh' => ['nullable', 'max:100', 'string'],
      'crotch_length' => ['nullable', 'max:100', 'string'],
      'pant_length' => ['nullable', 'max:100', 'string'],
      'upper_thigh' => ['nullable', 'max:100', 'string'],
      'pant_mori' => ['nullable', 'max:100', 'string'],
      'stomach' => ['nullable', 'max:100', 'string'],
      'trouser_waist' => ['nullable', 'max:100', 'string'],
      'trouser_length' => ['nullable', 'max:100', 'string'],
      'inseam_length' => ['nullable', 'max:100', 'string'],
    ];
  }
}
