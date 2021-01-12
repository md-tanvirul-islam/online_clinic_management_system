<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorOwnController extends Controller
{
    public function index()
    {
        return view('frontend.doctor.doctorDashboard');
    }
}
