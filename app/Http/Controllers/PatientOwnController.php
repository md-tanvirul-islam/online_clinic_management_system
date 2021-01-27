<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientOwnController extends Controller
{
    public function patientDashboard()
    {
        $patient_id = Auth::user()->patientProfile->id;
        $patient = Patient::find($patient_id );
        $appointments = Appointment::where('patient_id','=',$patient->id)
                                    ->orderBy('date','Desc')
                                    ->get();
        return view('frontend.patient.patientDashboard',compact('patient','appointments'));
    }

    public function patientPrescriptions()
    {

    }
}
