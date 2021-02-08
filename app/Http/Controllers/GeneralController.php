<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use App\Services\AppointmentService;
use App\Http\Requests\StoreAppointmentFrontend;
use App\Models\Department;
use Illuminate\Support\Facades\Session;

class GeneralController extends Controller
{
    protected $appointmentService;

    public function __construct()
    {
        $this->appointmentService = new AppointmentService();
    }
    public function index()
    {
        return view('frontend.general.index');
    }
    public function doctorSearch()
    {
        return view('frontend.general.doctor_search');
    }
    public function doctorSearchResult(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'department_id'=>'required|integer',
        ]);
        $department_id = $request->department_id;
        $doctors = Doctor::where('department_id','=',"$department_id")->get();
        return view('frontend.general.doctor_search',compact('doctors','department_id'));
    }

    public function doctorProfile(Doctor $doctor)
    {

        $departments = Department::pluck('name','id');
        $weekDays = config('constant.daysOfTheWeek');
        return view('frontend.general.doctorProfile',compact('doctor','departments','weekDays'));
    }

    public function createAppointment(Doctor $doctor)
    {
        // dd($doctor);
        return view('frontend.general.book_appointment',compact('doctor'));
    }

    public function storeAppointment(StoreAppointmentFrontend $request)
    {
       $data = $request->all();
    //    dd($data);
       $this->appointmentService->storeOrUpdate($data);
       session()->flash("success", "The Appointment has been successfully created");
        return redirect()->back();
        
    }
    public function language(Request $request, $lang)
    {
        if (! in_array($lang, ['en', 'bn'])) {
            abort(400);
        }      
           
          Session::put('locale_language',$lang);

        return redirect()->back();
        
    }
















    // public function infoXchange()
    // {
        
    //     try{

    //         $patients= Doctor::all();
    //         foreach($patients as $patient)
    //         {
    //             $user_id = $patient->user_id;
    //             // dd($user_id);
    //             $user = User::find($user_id);
    //             // dd($user);
    //             $patient->name = $user->name;
    //             $patient->email = $user->email;
    //             $patient->save();
    //         }
            
    //         return "successful";
    //     }catch (QueryException $exception)
    //     {
    //         return redirect()->back()->withErrors($exception->getMessage());
    //     }
    // }
}
