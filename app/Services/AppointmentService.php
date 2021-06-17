<?php

namespace App\Services ;

use App\Models\Appointment;
use App\Models\DoctorSchedule;
use App\Models\Doctor;
use App\Notifications\PatientCreateAppointmentNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class AppointmentService
{
    protected $patientService;


    public function list()
    {
        return Appointment::all();
    }  

    public function storeOrUpdate($data)
    {
        // dd($data , 'appointment service');
        $auth_user_id = auth()->user()->id;
        if(!empty($data["appointment_id"])){
            // update
            $appointment = Appointment::whereId($data["appointment_id"])->first();
            $appointment->updated_by = $auth_user_id;

        }else{
            //create
            $appointment = new Appointment();
            $appointment->created_by = $auth_user_id;
        }

        $stdDate = Carbon::parse($data['date']);

        if(isset($data['name']) && isset($data['phone']))
        {
            // make appointment for new user with account creation
            $keysForFilter = array('name','phone','address','gender','email','birthDate','patient_id');
            $dataForPatientService = array_intersect_key($data,array_flip($keysForFilter));
            $this->patientService = new PatientService();
            $patient = $this->patientService->storeOrUpdate( $dataForPatientService);
            $appointment->patient_id = $patient->id;
        }else
        {
            $appointment->patient_id = $data['patient_id'];
        }

        $appointment->doctor_schedule_id = $data['schedule_id'] ;
        $appointment->doctor_id = $data['doctor_id'] ;
        $appointment->date = $stdDate->format('Y-m-d');

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

        $appointment->patient_status = $data['patient_status'];
        $appointment->is_paid = $data['is_paid']??null;

        $newAppointment = $appointment->save() ? $appointment : null;
        //notification
        $doctor = Doctor::find($appointment->doctor_id);
        Notification::send($doctor->user, new PatientCreateAppointmentNotification($newAppointment));

        return $newAppointment;
    }
}

?>