<?php

namespace App\Http\Requests\Buyer;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class BuyerRegistrationRequest extends FormRequest
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
        // dd(app('request')->segment(3));
        return [
            'first_name' => 'sometimes|required|max:50|string|regex:/^[a-zA-Z0-9\s]+$/',
            'last_name' => 'sometimes|required|max:50|string|regex:/^[a-zA-Z0-9\s]+$/',
            'email' => 'sometimes|required|email|max:150|unique:App\Models\Buyer\Buyer,email,' . app('request')->segment(3),
            'phone' => 'sometimes|required|max:15|unique:App\Models\Buyer\Buyer,phone,' . app('request')->segment(3),
            'phonecode' => 'sometimes|required|max:10|exists:cpr_countries,phonecode',
            'dob' => 'nullable|date',
            'newsletter' => 'nullable|boolean',
            'password' => 'sometimes|required|min:6|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/|max:50|confirmed',
            
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages()
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.max' => 'First name should not be more than 50 characters.',
            'first_name.string' => 'First name should be a string.',
            'first_name.regex' => 'First name should not contain any special characters.',
            'last_name.required' => 'Surname is required.',
            'last_name.max' => 'Surname should not be more than 50 characters.',
            'last_name.string' => 'Surname should be a string.',
            'last_name.regex' => 'Surname should not contain any special characters.',
            'email.required' => 'Email is required.',
            'email.max' => 'Email should not be more than 150 characters.',
            'email.unique' => 'Email already exists.',
            'phone.required' => 'Phone is required.',
            'phone.max' => 'Phone should not be more than 15 characters.',
            'phone.unique' => 'Phone already exists.',
            'password.min' => 'Password should be at least 6 characters.',
            'password.max' => 'Password should not be more than 50 characters.',
            'password.confirmed' => 'Password and confirm password should be same.',
            'password.regex'    =>  "Password must have atleast one uppercase latter,number and special character."
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        // Throw a ValidationException but only return the first error message
        $response = response()->json([
            'message' => $validator->errors()->first(), // Get only the first error
        ], 422);

        throw new ValidationException($validator, $response);
    }
}
