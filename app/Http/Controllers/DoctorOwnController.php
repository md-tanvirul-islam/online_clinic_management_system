<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DoctorOwnController extends Controller
{
    public function index()
    {
        $doctor = Doctor::where('user_id','=',Auth::user()->id)->first();
        $appointments = Appointment::where('doctor_id','=',$doctor->id)->orderBy('date','desc')->get();
        return view('frontend.doctor.doctorDashboard',compact('doctor','appointments'));
    }

    public function schedules()
    {
        $doctor = Doctor::where('user_id','=',Auth::user()->id)->first();
        return view('frontend.doctor.doctorSchedule',compact('doctor'));
    }

    public function appointments()
    {
        $doctor = Doctor::where('user_id','=',Auth::user()->id)->first();
        $appointments = Appointment::where('doctor_id','=',$doctor->id)->orderBy('date','desc')->get();
        return view('frontend.doctor.doctorAppointment',compact('doctor','appointments'));
    }
    public function appointmentsToday()
    {

        $doctor = Doctor::where('user_id','=',Auth::user()->id)->first();
        $today = Carbon::now();
        $appointments = Appointment::where('doctor_id','=',$doctor->id)
                                    ->where('date','=',$today->toDateString())
                                    ->get();
        return view('frontend.doctor.doctorDashboard',compact('doctor','appointments'));
    }

    public function patientProfile($patientId)
    {
        $patient = Patient::find($patientId);
        $doctor = Doctor::where('user_id','=',Auth::user()->id)->first();
        $appointments = Appointment::where('doctor_id','=',$doctor->id)
                                    ->where('patient_id','=',$patient->id)
                                    ->orderBy('date','desc')->get();
        $patient = Patient::find($patientId);
        return view('frontend.doctor.doctorPatientProfile',compact('patient','doctor','appointments'));
    }

    public function pay(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required|integer',
        ]);
        $appointment = Appointment::find($validated['id']);
        $appointment->is_paid ="yes";
        $appointment->save();
        session()->flash("success", "The payment has been completed successfully");
        return redirect()->back();
    }
}
