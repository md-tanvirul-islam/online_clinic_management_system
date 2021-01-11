<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueAppointmentPerDay;
use Illuminate\Http\Request;

class StoreAppointmentFrontend extends FormRequest
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
    public function rules(Request $request)
    {
        $data = $request->all();
        return [
            'patient_status'=>'string|',
            'schedule_id'=>'required|integer',
            'doctor_id'=>'integer|required',
            'date'=>'date|required',
            'patient_id'=>['required','integer',new UniqueAppointmentPerDay($data) ]
        ];
    }
}
