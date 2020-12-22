<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\DoctorSchedule;
use App\Models\Doctor;
use Carbon\Carbon;

class AppointmentService
{

    public function list()
    {
        return Appointment::all();
    }

    public function storeOrUpdate($data)
    {
        $user_id = auth()->user()->id;
        // dd($data["id"]);
        if(!empty($data["id"])){
            // update
            $appointment = Appointment::whereId($data["id"])->first();
            $appointment->updated_by = $user_id;

        }else{
            //create
            $appointment = new Appointment();
            $appointment->created_by = $user_id;
        }
         
        $scheduleDaysWithId = DoctorSchedule::where('doctor_id','=',$data['doctor_id'])->pluck('day','id')->toArray();
        $scheduleDays = DoctorSchedule::where('doctor_id','=',$data['doctor_id'])->pluck('day')->toArray();
        // dd($scheduleDaysWithId);

        $day = strtolower(Carbon::createFromFormat('Y-m-d', $data['date'])->format('l'));
  
        if (in_array($day, $scheduleDays))
            {
                $appointment->doctor_schedule_id = array_search($day,$scheduleDaysWithId) ;
                $appointment->patient_id = $data['patient_id'];
                $appointment->date = $data['date'];
                $doctor = Doctor::find($data['doctor_id']);

                if($data['patient_status'] =="new")
                {
                    $appointment->fee = $doctor->feeNew; 
                }
                elseif($data['patient_status'] =="old")
                {
                    $appointment->fee = $doctor->feeInMonth; 
                }
                else{
                    $appointment->fee = $doctor->feeReport;
                }

                return $appointment->save() ? $appointment : null;
            }
            else
            {
                return $appointment = null;
            }

        
        
    }

}

?>