<?php
namespace App\Services;

use App\Models\Patient;
use App\Models\Prescription;
use App\Notifications\DoctorMakePrescriptionNotification;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class DoctorOwnService
{
    public function storePrescription($data)
    {
        //combining medicine data to store in prescriptions_medicines  table.
        $medicines = array();
        $count = count($data['medicine_generic_id']);
        $medicine = array();
        for($i = 0 ; $i <= $count-1; $i++)
        {
            $medicine['medicine_generic_id'] = $data['medicine_generic_id'][$i];
            $medicine['frequency'] = $data['frequency'][$i]??null;
            $medicine['note'] = $data['note'][$i]??null;
            $medicines[] = $medicine;
        }
        //combining medicine data to store in prescriptions_medicines  table.

        // creating prescription, the the id of the prescription will use in next tables.
        $prescription = new Prescription();
        $prescription->doctor_id = $data['doctor_id'];
        $prescription->patient_id = $data['patient_id'];
        $prescription->appointment_id = $data['appointment_id'];
        $prescription->patient_medical_history = isset($data['medicalHistory'])?$data['medicalHistory']:null;
        $prescription->created_by = Auth::user()->id;
        $createdPrescription = $prescription->save() ? $prescription : null;
        // creating prescription, the the id of the prescription will use in next tables.

        // inserting data in prescriptions_medicines table
        foreach($medicines as $medicine)
        {
            DB::table('prescriptions_medicines')->insert(
                [
                    'prescription_id'=> $createdPrescription->id,
                    'medicine_id'=> $medicine['medicine_generic_id'],
                    'frequency'=> $medicine['frequency'],
                    'note'=> $medicine['note'],
                    'created_by'=> Auth::user()->id,
                ]);
        }
        // inserting data in prescriptions_medicines table

        // inserting data in prescriptions_tests table
        $testIds = $data['test_id'] ;
        foreach($testIds as $testId)
        {
            DB::table('prescriptions_tests')->insert(
                [
                    'prescription_id'=> $createdPrescription->id,
                    'test_id'=> $testId,
                    'created_by'=> Auth::user()->id,
                ]);
        }
        // inserting data in prescriptions_tests table

        $patient = Patient::find($createdPrescription->patient_id);
        Notification::send($patient->user, new DoctorMakePrescriptionNotification($createdPrescription));
    }
    

}
?>
