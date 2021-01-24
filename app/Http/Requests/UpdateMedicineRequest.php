<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMedicineRequest extends FormRequest
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
            "brand_name" => [
                'required',
                'string',
                Rule::unique('medicines')->ignore(request()->route('medicine')->id),
            ],
            "form" => 'required|string',
            "dosage_description" => 'nullable|string|max:400',
            "other_info" => 'string|nullable|max:400',
            "strength" => 'nullable|string',
            "status" => [
                'required',
                Rule::in(['Active','Inactive']),
                'string'
            ]
        ];
    }
}
