<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Appointment;
use App\Models\Doctor;

class UniqueAppointmentPerDay implements Rule
{
    protected $formData;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->formData = $data;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        $is_empty = Appointment::where('patient_id','=',$this->formData['patient_id'])->where('date','=',$this->formData['date'])->where('doctor_schedule_id','=',$this->formData['schedule_id'])->get()->isEmpty();
       
        // dd( $is_empty);
        if( $is_empty)
        {
            return true;
        }
        else{
           
            global $doctor;
            $doctor = Doctor::find($this->formData['doctor_id']);
            return false;
        }
        // dd($this->formData,'form rule class');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $doctor = $GLOBALS['doctor'];
        $date = new \DateTime($this->formData['date']);

        return "You already have an appointment with Doctor ".$doctor->name." in ".$date->format('d F,Y');
    }
}
