<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(auth()->user()->type === 'admin'){
            // return view('backend.admin.index');
            return redirect()->route('admin.index');
        }
        elseif(auth()->user()->type === 'patient')
        {
            // return view('frontend.general.index');
            return redirect()->route('patient.own.dashboard');
        }
        elseif(auth()->user()->type === 'doctor') {
            // return view('backend.admin.doctors.index');
            return redirect()->route('doctor.own.index');
        }
    }
}
