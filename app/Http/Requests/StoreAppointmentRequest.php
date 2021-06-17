<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueAppointmentPerDay;
use Illuminate\Validation\Rule;

class StoreAppointmentRequest extends FormRequest
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
        $formData = $this->all();
        // dd($formData , 'request');
        return [
        'doctor_id'=>'required|integer',
        'patient_id'=>['required','integer',new UniqueAppointmentPerDay($formData) ],
        'date'=>'required|date',
        'schedule_id'=>'integer|required',
        'patient_status' => [
            'required',
            Rule::in(['new', 'old', 'report']),
        ],
        ];
    }
}
