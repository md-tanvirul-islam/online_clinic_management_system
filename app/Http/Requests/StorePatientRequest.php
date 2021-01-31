<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
        'address'=>'nullable|string',
        'phone'=>'required|string|unique:patients,phone',
        'image'=>'image|nullable',
        'birthDate'=>'required|date|nullable',
        'gender'=>'required|nullable|string',
        'bloodGroup'=>'required|string',
        ];
    }
}
