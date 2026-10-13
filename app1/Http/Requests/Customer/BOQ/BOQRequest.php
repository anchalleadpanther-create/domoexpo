<?php

namespace App\Http\Requests\Customer\BOQ;

use Illuminate\Foundation\Http\FormRequest;

class BOQRequest extends FormRequest
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
        
        $user = auth()->guard('buyer')->user();
        // dd($user);
        $rules =  [
            "project_name"      => 'required|max:255|string',
            "client_name"         => 'nullable|max:255|string',
            "boq_type"           => 'required|string',
            // "project_sent_to"   => 'required|string',
            "project_address"       => 'nullable|string',
            "project_area"          => 'required|string',
            "project_city"          => 'required|string',
            // "contractor_type"          => 'required|array',
            "boq_deadline"          => 'required|string',
            "validity_date"          => 'required|string',
            // 'upload_rfq_file'=> 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,csv,odt,ods|max:2048',
            // 'attachment_one' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,csv,odt,ods|max:2048',
            // 'attachment_two' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,csv,odt,ods|max:2048',
            // 'attachment_three' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,csv,odt,ods|max:2048',
            // 'attachment_four' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,csv,odt,ods|max:2048',
        ];
        
        if($user->account_type != 'Developer'){
            $rules["project_sent_to"] =   'required|string';
        }
        
        if(request()->project_sent_to == 'Contractor Type' && $user->account_type != 'Developer'){
            $rules["contractor_type"] =   'required|array';
        }
        
        if(request()->project_sent_to == 'Direct Contractor'){
            $rules["contractors"] =   'required|array';
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            'attachment_one.max' => 'The attachment one must not be greater than 2MB.',  // max is in kilobytes
            'attachment_two.max' => 'The attachment one must not be greater than 2MB.', 
            'attachment_three.max' => 'The attachment one must not be greater than 2MB.', 
            'attachment_four.max' => 'The attachment one must not be greater than 2MB.',
        ];
    }
}
