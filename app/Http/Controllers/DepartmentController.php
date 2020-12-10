<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Services\DepartmentService;
use Illuminate\Validation\Rule;



class DepartmentController extends Controller
{
    private $departmentService;
    public function __construct()
    {
        $this->departmentService = new DepartmentService();
    }

    public function index()
    {
        $departments = $this->departmentService->allDepartments();
        return view('backend.admin.departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.departments.create');
    }


    public function store(StoreDepartmentRequest $request)
    {
        try{
            $validData = $request->validated();
            $department = $this->departmentService->storeOrUpdate($validData);

            if(is_null($department) === false){
                $message = message("Department has been successfully created");
                return redirect()->route('departments.index')->with('success','Task was successful!');
            }else{
                $message = message("Department has not created", "error");
                return redirect()->back()->with('success','Task was successful!');
            }
            session()->flash("success", $message);

            return redirect()->back();

//            return redirect()->route('departments.index')->with('success','Task was successful!');

        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('backend.admin.departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {

        return view('backend.admin.departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        try{
            $validData = $request->validate();
            $this->departmentService->update($validData,$department);
            return redirect()->route('departments.index')->with('success','Update successful!');

        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        try {
            $department->delete();
            return redirect()->route('departments.index')->withError("Delete Successful"  );
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
