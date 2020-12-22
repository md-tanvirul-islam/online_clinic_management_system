<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
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
        return view('backend.admin.appointments.create',compact('departments','patients'));
    }


    public function store(StoreAppointmentRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $appointment = $this->appointmentService->storeOrUpdate($data);
        if(isset($appointment))
        {
            session()->flash("success", "The Appointment has been successfully made");
            return redirect()->route('appointments.index');
        }
        else{
            $date  = Carbon::createFromFormat('Y-m-d',$request->date )->isoFormat('Do MMMM,YYYY');
            // dd($date );
            session()->flash("error", "The Doctor doesn't have Schedule for $date");
        }
        
    }

   
    public function show(Appointment $appointment)
    {
        return view('backend.admin.appointments.show',compact('appointment'));
    }

   
    public function edit(Appointment $appointment)
    {
        return view('backend.admin.appointments.edit',compact('appointment'));
    }

 
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $data = $request->all();
        $data['id'] =$appointment->id;
        $appointment = $this->appointmentService->storeOrUpdate($data);
        session()->flash("success", "The Appointment has been successfully updated");
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