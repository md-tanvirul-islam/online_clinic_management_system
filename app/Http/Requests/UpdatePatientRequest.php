<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePatientRequest extends FormRequest
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
        // dd(request()->route('patient')->id);
        return [
        'name'=>'required|string',
        'email'=>'required|email',
        'address'=>'required|string',
        'phone'=>[
            'required',
            'string',
            // Rule::unique('patients')->ignore(request()->route('patient')->id)
        ],
        'image'=>'image|nullable',
        'birthDate'=>'date|nullable',
        'gender'=>'required|string',
        'bloodGroup'=>'required|string',
        ];
    }
}
