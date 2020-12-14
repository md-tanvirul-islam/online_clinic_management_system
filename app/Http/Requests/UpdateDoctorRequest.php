<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
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
        'name'=>'required|string',
        'email'=>[
            'required',
            'email',
            Rule::unique('doctors')->ignore(request()->route('doctor'))
    ],
        'department_id'=>'required|int',
        'address'=>'required|string',
        'phoneNo'=>'required|string',
        'mobileNo'=>'required|string',
        'image'=>'image|nullable',
        'speciality'=>'required|string',
        'degree'=>'required|string',
        'bio'=>'nullable|string',
        'birthDate'=>'required|date',
        'gender'=>'required|string',
        'bloodGroup'=>'required|string',
        'feeNew'=>'required|string',
        'feeInMonth'=>'required|string',
        'feeReport'=>'required|string',
        ];
    }
}
