<?php

namespace App\Services;

use App\Models\Appointment;

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
            $doctorSchedule = Appointment::whereId($data["id"])->first();
            $doctorSchedule->updated_by = $user_id;

        }else{
            //create
            $doctorSchedule = new Appointment();
            $doctorSchedule->created_by = $user_id;
        }

        $doctorSchedule->doctor_id = $data['doctor_id'];
        $doctorSchedule->day = $data['day'];
        $doctorSchedule->starting_time = $data['starting_time'];
        $doctorSchedule->ending_time = $data['ending_time'];
        return $doctorSchedule->save() ? $doctorSchedule : null;
    }

}

?>