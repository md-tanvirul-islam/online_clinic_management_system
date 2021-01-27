<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use App\Services\DoctorOwnService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;


class DoctorOwnController extends Controller
{
    protected $doctorOwnService;

    public function __construct()
    {
        $this->doctorOwnService = new DoctorOwnService();
    }
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
        return view('frontend.doctor.doctorPatientProfile',compact('patient','doctor','appointments'));
    }

    public function createPrescription($appointment_id,$patient_id)
    {
        $patient = Patient::find($patient_id);
        $doctor = Doctor::where('user_id','=',Auth::user()->id)->first();
        return view('frontend.doctor.doctorCreatePrescription',compact('patient','doctor','appointment_id'));
    }

    public function storePrescription(Request $request, $patient_id)
    {
        $request->validate(
            [
                'appointment_id'=>'required|integer|unique:prescriptions,appointment_id',
            ]
        );
        // we decide that only doctor can create prescription. admin can only edit the created prescription. 
        $data = $request->all();
        $data['patient_id'] = $patient_id;
        $data['doctor_id'] = Auth::user()->doctorProfile->id;
        $this->doctorOwnService->storePrescription($data);
        return redirect()->back()->with('success','The Prescription has created Successfully');
    }

    public function showPrescription($prescription_id)
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
        return view('frontend.doctor.doctorPrescriptionShow',compact('patient','doctor','prescription','prescription_medicines','prescription_tests'));
    }

    public function printPrescription($prescription_id)
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
        return view('frontend.doctor.doctorPrescriptionPrint',compact('patient','doctor','prescription','prescription_medicines','prescription_tests'));
    }

    public function PdfPrescription($prescription_id)
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
        $html = view('frontend.doctor.doctorPrescriptionPrint',compact('patient','doctor','prescription','prescription_medicines','prescription_tests'));
        $pdf = PDF::loadHTML($html);
        return $pdf->stream("Prescription.pdf");
    }


    public function pay(Request $request)
    {

        $validated = $request->validate([
            'appointment_id' => 'required|integer',
        ]);
        $appointment = Appointment::find($validated['appointment_id']);
        $appointment->is_paid ="yes";
        $appointment->save();
        session()->flash("success", "The payment has been completed successfully");
        return redirect()->back();
    }
}
