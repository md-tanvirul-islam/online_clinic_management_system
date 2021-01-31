<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\StoreNewPatientAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Department;
use App\Models\Patient;
use Carbon\Carbon;
use App\Services\AppointmentService;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
class AppointmentController extends Controller
{
    protected $appointmentService ;
    public function __construct()
    {
        $this->appointmentService = new AppointmentService();
    }

    public function index()
    {
        $appointments = $this->appointmentService->list(); 
        return view('backend.admin.appointments.index',compact('appointments'));
    }

 
    public function create()
    {
        $departments = Department::pluck('name','id');
        $patients = Patient::pluck('name','id');
        $doctors = Doctor::pluck('name','id');
        $selectedData = null;
        return view('backend.admin.appointments.create',compact('departments','patients','doctors','selectedData'));
    }

    public function newPatientAppointmentCreate()
    {
        $departments = Department::pluck('name','id');
        $doctors = Doctor::pluck('name','id');
        $selectedData = null;
        return view('backend.admin.appointments.new_patient_appointment_create',compact('departments','doctors','selectedData'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        $data = $request->all();
        $appointment = $this->appointmentService->storeOrUpdate($data);
        if(isset($appointment))
        {
            session()->flash("success", "The Appointment has been successfully made");
            return redirect()->route('appointments.index');
        }
        else{
            $date  = Carbon::createFromFormat('Y-m-d',$request->date )->isoFormat('Do MMMM,YYYY');
            session()->flash("error", "The Doctor doesn't have Schedule for $date");
            return redirect()->back();
        }  
    }
    public function doctorScheduleSearch(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'department_id'=> 'integer|required',
            'doctor_id'=> 'integer|required'
        ]);
        $departments = Department::pluck('name','id');
        $doctors = Doctor::pluck('name','id');
        $selectedData = $request->all();
        $schedules = DoctorSchedule::where('doctor_id','=',$selectedData['doctor_id'])->get();
        return view('backend.admin.appointments.create',compact('departments','selectedData','doctors','schedules'));

    }
    
    public function newPatientAppointmentStore(StoreNewPatientAppointmentRequest $request)
    {
        // dd($request->all());
        $data = $request->all();
        $appointment = $this->appointmentService->storeOrUpdate($data);
        if(isset($appointment))
        {
            session()->flash("success", "The Appointment has been successfully made");
            return redirect()->route('appointments.index');
        }
        else{
            $date  = Carbon::createFromFormat('Y-m-d',$request->date )->isoFormat('Do MMMM,YYYY');
            session()->flash("error", "The Doctor doesn't have Schedule for $date");
        }
        
    }
   
    public function show(Appointment $appointment)
    {
        return view('backend.admin.appointments.show',compact('appointment'));
    }

   
    public function edit(Appointment $appointment)
    {
        $patient = Patient::find($appointment->patient_id);
        $doctor_schedule = DoctorSchedule::find($appointment->doctor_schedule_id);
        $doctor = Doctor::find($doctor_schedule->doctor_id);
        return view('backend.admin.appointments.edit',compact('appointment','patient','doctor'));
    }

 
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $data = $request->all();
        // dd($data);
        $data['appointment_id'] =$appointment->id;
        $data['patient_id'] =$appointment->patient_id;
        $appointment = $this->appointmentService->storeOrUpdate($data);
        session()->flash("success", "The Appointment has been successfully updated");
        return redirect()->back();
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

   
    
    public function destroy(Appointment $appointment)
    {
        try {
            $appointment->delete();
            return redirect()->route('appointments.index')->withSuccess('Delete Successful');    
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function recycleBin()
    {
        $appointments = Appointment::onlyTrashed()->get();
        return view('backend.admin.appointments.recycle',compact('appointments'));
    }

    public function restoreAll()
    {
        Appointment::withTrashed()->restore();
        return redirect()->route('appointments.index')->withSuccess("Restore Successful");
    }

    public function permanentlyDelete($id=null)
    {
        if(isset($id))
        {
            Appointment::onlyTrashed()->find($id)->forceDelete();
            return  redirect()->back();
        }
        else
        {
            Appointment::onlyTrashed()->forceDelete();
            return  redirect()->back();
        }
        
    }

    public function doctorInfo(Request $request)
    {
        if(isset($request->departmentId))
        {
            $id = $request->departmentId; 
            $doctors = Doctor::where('department_id','=',"$id")->get();
            return response()->json($doctors);
        }else
        {
            $id = $request->doctorId; 
            $doctor = Doctor::find($id);
            $doctorSchedule = DoctorSchedule::where('doctor_id','=',"$id")->get();
            $data = ['doctor'=>"$doctor",'schedule'=>"$doctorSchedule"];
            return response()->json($data);
        }
        
        // $email = $request->email;
        // $doctor = Doctor::where('id','=',"$id")->orWhere('email','=',"$email")->first();
        // $doctorSchedule = DoctorSchedule::where('doctor_id','=',"$doctor->id")->first();
        // $data = ['doctor'=>"$doctor",'schedule'=>" $doctorSchedule"];
        

        // 
    }

}
