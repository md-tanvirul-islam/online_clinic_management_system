<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Services\DepartmentService;
use Illuminate\Validation\Rule;
use App\Imports\DepartmentsImport;



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
        // dd($request->all());
        try{
            $validData = $request->validated();
            $validData['is_active'] === "yes"?$validData['is_active']:$validData['is_active']="No";
            $department = $this->departmentService->storeOrUpdate($validData);
            
            session()->flash("success", "Department has been successfully created");
    
            return redirect()->back();
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function show(Department $department)
    {
        return view('backend.admin.departments.show',compact('department'));
    }

    public function edit(Department $department)
    {

        return view('backend.admin.departments.edit',compact('department'));
    }

    public function update(UpdateDepartmentRequest $request, $id)
    {

        $validated = $request->validated();
        $validated['id'] = $id;
        // dd($validated['id']);

        try{
            $department = $this->departmentService->storeOrUpdate($validated);

            // $department->update($validated); 
            // dd($department) ;      

            session()->flash("success", "$department->name department info has been successfully updated");

        return back();

        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function destroy(Department $department)
    {
        try {
            $department->delete();
            return redirect()->route('departments.index')->withSuccess("Delete Successful"  );
        }catch (QueryException $exception)
        {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function recycleBin()
    {
        $departments = Department::onlyTrashed()->get();
        return view('backend.admin.departments.recycle',compact('departments'));
    }

    public function restoreAll()
    {
        Department::withTrashed()->restore();
        return redirect()->route('departments.index')->withSuccess("Restore Successful");
    }

    public function permanentlyDelete($id)
    {
        Department::onlyTrashed()->find($id)->forceDelete();
        return  redirect()->back();
    }

    public function importCreate()
    {
        return view('backend.admin.departments.excel_import');
    }

    public function importStore(Request $request)
    {
        $file = $request->file('departmentExcelFile');
        \Excel::import(new DepartmentsImport,$file);
        return redirect()->route('departments.index')->with('success','The data has uploaded successfully');
    }
}
