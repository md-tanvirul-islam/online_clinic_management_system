<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Appointment;
use App\Models\Doctor;

class UniqueAppointmentPerDay implements Rule
{
    protected $formData;
    protected $doctor;
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
        
        $is_exist = Appointment::where('patient_id','=',$this->formData['patient_id'])->
                                 where('date','=',$this->formData['date'])->
                                 where('doctor_schedule_id','=',$this->formData['schedule_id'])->exists();
        if($is_exist)
        {
            return true;
        }
        $this->doctor = Doctor::find($this->formData['doctor_id']);
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $date = new \DateTime($this->formData['date']);
        return "You already have an appointment with Doctor ".$this->doctor->name." in ".$date->format('d F,Y');
    }
}
