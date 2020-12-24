<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewPatientAppointmentRequest extends FormRequest
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
            'doctor_id'=>'required|integer',
            'name'=>'required|string',
            'phone'=>'required|string',
            'address'=>'nullable|string',
            'age'=>'nullable|string',
            'gender'=>'nullable|string',
            'date'=>'required|date',
            'patient_status'=>'required|string',
        ];
    }
}
