<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use App\Services\AppointmentService;


class GeneralController extends Controller
{
    protected $appointmentService;

    public function __construct()
    {
        $this->appointmentService = new AppointmentService();
    }

    public function index()
    {
        // return view('welcome');
        return view('frontend.general.index');
    }
    public function doctorSearch()
    {
        return view('frontend.general.doctor_search');
    }
    public function doctorSearchResult(Request $request)
    {
        // dd($request->all());
        $id = $request->department_id;
        $doctors = Doctor::where('department_id','=',"$id")->get();
        return view('frontend.general.doctor_search',compact('doctors'));
    }

    public function createAppointment($id)
    {
       $doctor = Doctor::find($id);
        return view('frontend.general.book_appointment',compact('doctor'));
    }

    public function storeAppointment(Request $request)
    {
       $data = $request->all();
       $this->appointmentService->storeOrUpdate($data);
       session()->flash("success", "The Appointment has been successfully made");
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
