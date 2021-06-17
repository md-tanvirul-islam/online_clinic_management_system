<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
        'email'=>'required|email|unique:users,email',
        'department_id'=>'required|int',
        'address'=>'nullable|string',
        'phoneNo'=>'nullable|string',
        'mobileNo'=>'nullable|string',
        'image'=>'nullable|image',
        'speciality'=>'nullable|string',
        'degree'=>'nullable|string',
        'bio'=>'nullable|string|max:500',
        'birthDate'=>'nullable|date',
        'gender'=>'nullable|string',
        'bloodGroup'=>'nullable|string',
        'feeNew'=>'nullable|string',
        'feeInMonth'=>'nullable|string',
        'feeReport'=>'nullable|string',
        ];
    }
}
