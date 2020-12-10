<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Services\DoctorService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctorService;
    public function __construct()
    {
        $this->doctorService = new DoctorService();
    }


    public function index()
    {
        $doctors = $this->doctorService->allDoctors();
        return view('backend.admin.doctors.index',compact('doctors'));
    }


    public function create()
    {
        $departments = Department::pluck("name","id");
        return view('backend.admin.doctors.create',compact('departments'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {

    }
}
