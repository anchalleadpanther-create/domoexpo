<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class SetNewPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [  
            'biz_email' => 'required|email|exists:cpr_suppliers,biz_email',
            'token' => 'required|exists:password_resets,token',
            'password' => [
                'required', 'confirmed', 'min:8', 'max:30',
            ],
        ];
    }
}
