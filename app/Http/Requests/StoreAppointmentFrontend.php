<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueAppointmentPerDay;
use Illuminate\Http\Request;

class StoreAppointmentFrontend extends FormRequest
{
    protected $formData ; 
    
    public function __construct()
    {
        // $this->formData = $this->request;
        // dd($this->request , 'form construct function');
    }
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
        return [
            'patient_status'=>'string|required',
            'schedule_id'=>'required|integer',
            'doctor_id'=>'integer|required',
            'date'=>'date|required',
            'patient_id'=>['required','integer',new UniqueAppointmentPerDay($formData) ]
        ];
    }
}
