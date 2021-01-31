<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Services\DoctorService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\DoctorSchedule;
use Illuminate\Database\QueryException;

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


    public function store(StoreDoctorRequest $request)
    {
        $validatedData = $request->validated();
        // dd($validatedData);
        $doctor = $this->doctorService->storeOrUpdate($validatedData);
        session()->flash("success", "$doctor->name profile has been successfully created");
        return redirect()->route('doctors.index');
    }


    public function show(Doctor $doctor)
    {
        $departments = Department::pluck('name','id');
        $weekDays = config('constant.daysOfTheWeek');
        return view('backend/admin/doctors/show',compact('doctor','departments','weekDays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $departments = Department::pluck('name','id');
        return view('backend/admin/doctors/edit',compact('doctor','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $validatedData = $request->validated();
        $validatedData['id'] =$doctor->id;
        $doctor = $this->doctorService->storeOrUpdate($validatedData);
        session()->flash("success", "$doctor->name profile has been successfully updated");
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        try {
            $doctor->delete();
            return redirect()->route('doctors.index')->withSuccess("Delete Successful"  );
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function recycleBin()
    {
        $doctors = Doctor::onlyTrashed()->get();
        return view('backend.admin.doctors.recycle',compact('doctors'));
    }

    public function restoreAll()
    {
        Doctor::withTrashed()->restore();
        return redirect()->route('doctors.index')->withSuccess("Restore Successful");
    }

    public function permanentlyDelete($id=null)
    {
        // dd(isset($id));
        if(isset($id))
        {
            Doctor::onlyTrashed()->find($id)->forceDelete();
            return  redirect()->back();
        }
        else
        {
            Doctor::onlyTrashed()->forceDelete();
            return  redirect()->back();
        }
        
    }

    public function searchDoctor(Request $request)
    {
        $data = $request->all();
        $doctors = $this->doctorService->searchDoctor($data);
        return view('backend.admin.doctors.index',compact('doctors'));
    }
}
