<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Services\PatientService;
use Illuminate\Database\QueryException;

class PatientController extends Controller
{
    protected $patientService;
    public function __construct()
    {
       $this->patientService =  new PatientService();
    }
    public function index()
    {
        $patients = $this->patientService->allPatients();
        return view('backend.admin.patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    { 
        try{
            $validatedData = $request->validated();
            $patient = $this->patientService->storeOrUpdate($validatedData);
            
            session()->flash("success", "$patient->name (Patient) Profile has been successfully created");
    
            return redirect()->route('patients.index');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('backend.admin.patients.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('backend.admin.patients.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        try{
            $validatedData = $request->validated();
            $validatedData['patient_id'] =$patient->id;
            $patient = $this->patientService->storeOrUpdate($validatedData);
            
            session()->flash("success", "$patient->name (patient) profile has been successfully updated");
            return redirect()->route('patients.index');
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        try {
            $patient->delete();
            return redirect()->route('patients.index')->withSuccess("Delete Successful"  );
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
    public function recycleBin()
    {
        $patients = Patient::onlyTrashed()->get();
        return view('backend.admin.patients.recycle',compact('patients'));
    }

    public function restoreAll()
    {
        Patient::withTrashed()->restore();
        return redirect()->route('patients.index')->withSuccess("Restore Successful");
    }

    public function permanentlyDelete($id=null)
    {
        // dd($id);
        if(isset($id))
        {
            Patient::onlyTrashed()->find($id)->forceDelete();
            return  redirect()->back()->withSuccess("Delete Successful"  );
        }
        else
        {
            Patient::onlyTrashed()->forceDelete();
            return  redirect()->back()->withSuccess("Delete Successful"  );
        }
        
    }
}
