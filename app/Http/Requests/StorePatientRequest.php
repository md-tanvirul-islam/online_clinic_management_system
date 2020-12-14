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
        'email'=>'required|email',
        'address'=>'required|string',
        'phone'=>'required|string|unique:patients,phone',
        'image'=>'image|nullable',
        'birthDate'=>'date|nullable',
        'gender'=>'required|string',
        'bloodGroup'=>'required|string',
        ];
    }
}
