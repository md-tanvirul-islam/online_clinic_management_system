<?php

namespace App\Http\Controllers;

use App\Models\TestType;
use App\Services\TestTypeService;
use Illuminate\Http\Request;

class TestTypeController extends Controller
{
    protected $testTypeService;
    public function __construct()
    {
    $this->testTypeService = new TestTypeService();  
    }
    
    public function index()
    {
        $testType = $this->testTypeService->list();
        return view('backend.admin.testTypes.index',compact('testType'));
    }

   
    public function create()
    {
        return view('backend.admin.testTypes.create');
    }

   
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required|string|unique:test_types,name'
            ]
        );
        $testType = $this->testTypeService->storeOrUpdate($validateData);
        return redirect()->route('testTypes.index')->withSuccess("Test type has succesfully added"); 
    }

    
    public function show(TestType $testType)
    {
        //
    }

    
    public function edit(TestType $testType)
    {
        return view('backend.admin.testTypes.edit',compact('testType'));
    }

    
    public function update(Request $request, TestType $testType)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|unique:test_types,name,'.$testType->id,
            ]
        );
        $data['testType_id'] = $testType->id;
        $testType = $this->testTypeService->storeOrUpdate($data);
        return redirect()->route('testTypes.index')->withSuccess("Test type has succesfully update");
    }

   
    public function destroy(TestType $testType)
    {
        $testType->delete();
        return redirect()->route('testTypes.index')->withSuccess('Delete Successfully');
    }
}
