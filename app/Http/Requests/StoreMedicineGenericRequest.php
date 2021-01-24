<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMedicineGenericRequest extends FormRequest
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
            'name' =>[
                'required',
                'unique:medicine_generics,name',
                'string'
                ],
            'description' => 'string|nullable|max:300',
            'status'=>[
                    'string',
                    Rule::in(['Active','Inactive']),
                    'required'
                ]

        ];
    }
}
