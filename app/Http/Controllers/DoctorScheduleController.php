<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorScheduleRequest;
use App\Http\Requests\UpdateDoctorScheduleRequest;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Services\DoctorScheduleService;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DoctorScheduleController extends Controller
{
    protected $doctorScheduleService;
    public function __construct()
    {
        $this->doctorScheduleService = new DoctorScheduleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorSchedules = $this->doctorScheduleService->list();
        return view('backend.admin.doctorSchedules.index',compact('doctorSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::pluck('name','id');
        return view('backend.admin.doctorSchedules.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorScheduleRequest $request)
    {
        $data = $request->all();
        $doctorSchedule=$this->doctorScheduleService->storeOrUpdate($data);
        $doctor = Doctor::find($doctorSchedule->doctor_id);
        session()->flash("success", "The Doctor $doctor->name's $doctorSchedule->day Schedule has been successfully added");
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorSchedule $doctorSchedule)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorSchedule $doctorSchedule)
    {
        $doctors = Doctor::pluck('name','id');
        return view('backend.admin.doctorSchedules.edit',compact('doctorSchedule','doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorScheduleRequest $request, DoctorSchedule $doctorSchedule)
    {
        $data = $request->all();
        $data['id'] = $doctorSchedule->id;
        $data['doctor_id'] = $doctorSchedule->doctor_id;
        $doctorSchedule=$this->doctorScheduleService->storeOrUpdate($data);
        $doctor = Doctor::find($doctorSchedule->doctor_id);
        session()->flash("success", "The Doctor $doctor->name's $doctorSchedule->day Schedule has been successfully updated");
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorSchedule $doctorSchedule)
    {
        try {
            $doctorSchedule->delete();
            return redirect()->route('doctorSchedules.index')->withSuccess("Delete Successful"  );
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function recycleBin()
    {
        $doctorSchedules = DoctorSchedule::onlyTrashed()->get();
        return view('backend.admin.doctorSchedules.recycle',compact('doctorSchedules'));
    }

    public function restoreAll()
    {
        DoctorSchedule::withTrashed()->restore();
        return redirect()->route('doctorSchedules.index')->withSuccess("Restore Successful");
    }

    public function permanentlyDelete($id=null)
    {
        // dd(isset($id));
        if(isset($id))
        {
            DoctorSchedule::onlyTrashed()->find($id)->forceDelete();
            return  redirect()->back();
        }
        else
        {
            DoctorSchedule::onlyTrashed()->forceDelete();
            return  redirect()->back();
        }
        
    }
}
