<?php
namespace App\Services;

use App\Models\DoctorSchedule;

class DoctorScheduleService
    {
        public function list()
        {
            return DoctorSchedule::all();
        }

        public function storeOrUpdate($data)
        {
            $user_id = auth()->user()->id;
        // dd($data["id"]);
        if(!empty($data["id"])){
            // update
            $doctorSchedule = DoctorSchedule::whereId($data["id"])->first();
            $doctorSchedule->updated_by = $user_id;

        }else{
            //create
            $doctorSchedule = new DoctorSchedule();
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