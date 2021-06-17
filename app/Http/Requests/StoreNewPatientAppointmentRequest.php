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
            'schedule_id'=>'required|integer',
            'name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|integer',
            'address'=>'nullable|string',
            'gender'=>'required|string',
            'date'=>'required|date',
            'patient_status'=>'required|string',
        ];
    }
}
