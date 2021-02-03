<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Department;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PatientOwnController extends Controller
{
    public function patientDashboard()
    {
        $patient_id = Auth::user()->patientProfile->id;
        $patient = Patient::find($patient_id );
        $appointments = Appointment::where('patient_id','=',$patient->id)
                                    ->orderBy('date','Desc')
                                    ->get();
        $prescriptions = Prescription::where('patient_id','=',$patient->id)
                                      ->orderBy('created_at','Desc')
                                      ->get();
        return view('frontend.patient.patientDashboard',compact('patient','appointments','prescriptions'));
    }

    public function profile()
    {
        $patient = Patient::where('user_id','=',Auth::user()->id)->first();
        return view('frontend.patient.profile',compact('patient')); 
    }

    public function doctorProfile(Doctor $doctor)
    {
        $departments = Department::pluck('name','id');
        $weekDays = config('constant.daysOfTheWeek');
        $patient = Patient::where('user_id','=',Auth::user()->id)->first();
        return view('frontend.doctor.profile',compact('doctor','departments','weekDays','patient'));  
    }

    public function patientAppointments()
    {
        $patient_id = Auth::user()->patientProfile->id;
        $patient = Patient::find($patient_id );
        $appointments = Appointment::where('patient_id','=',$patient->id)
                                    ->orderBy('date','Desc')
                                    ->get();
        return view('frontend.patient.patientAppointments',compact('patient','appointments'));
    }

    public function patientPrescriptions()
    {
        $patient_id = Auth::user()->patientProfile->id;
        $patient = Patient::find($patient_id );
        $prescriptions = Prescription::where('patient_id','=',$patient->id)
                                      ->orderBy('created_at','Desc')
                                      ->get();
        return view('frontend.patient.patientPrescriptions',compact('patient','prescriptions'));
    }

    public function patientPrescriptionView($prescription_id)
    {
        $prescription = Prescription::find($prescription_id);
        $prescription_medicines = DB::table('prescriptions_medicines')
                                ->where('prescription_id', '=', $prescription->id)
                                ->get();

        $prescription_tests = DB::table('prescriptions_tests')
                                ->where('prescription_id', '=', $prescription->id)
                                ->get();
       
        $doctor = Doctor::find($prescription->doctor_id);
        $patient = Patient::find($prescription->patient_id);
        return view('frontend.patient.patientPrescriptionView',compact('patient','doctor','prescription','prescription_medicines','prescription_tests'));
    }

    public function patientPrescriptionPrint($prescription_id)
    {
        $prescription = Prescription::find($prescription_id);
        $prescription_medicines = DB::table('prescriptions_medicines')
                                ->where('prescription_id', '=', $prescription->id)
                                ->get();

        $prescription_tests = DB::table('prescriptions_tests')
                                ->where('prescription_id', '=', $prescription->id)
                                ->get();
       
        $doctor = Doctor::find($prescription->doctor_id);
        $patient = Patient::find($prescription->patient_id);
        return view('frontend.patient.patientPrescriptionPrint',compact('patient','doctor','prescription','prescription_medicines','prescription_tests'));
    }

    public function patientPrescriptionPDF($prescription_id)
    {
        $prescription = Prescription::find($prescription_id);
        $prescription_medicines = DB::table('prescriptions_medicines')
                                ->where('prescription_id', '=', $prescription->id)
                                ->get();

        $prescription_tests = DB::table('prescriptions_tests')
                                ->where('prescription_id', '=', $prescription->id)
                                ->get();
       
        $doctor = Doctor::find($prescription->doctor_id);
        $patient = Patient::find($prescription->patient_id);

        // $pdf = PDF::loadView('frontend.patient.patientPrescriptionPDF',['patient'=>$patient,'doctor'=>$doctor,'prescription'=>$prescription,'prescription_medicines'=>$prescription_medicines,'prescription_tests'=>$prescription_tests]);
        // return $pdf->download('Prescription.pdf');
        
        $html = view('frontend.doctor.doctorPrescriptionPDF',compact('patient','doctor','prescription','prescription_medicines','prescription_tests'));
        $pdf = PDF::loadHTML($html);
        return $pdf->stream("Prescription.pdf");
    }
}
