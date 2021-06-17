<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Models\Test;
use App\Services\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $testService ;
    public function __construct()
    {
        $this->testService = new TestService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = $this->testService->list();
        return view('backend.admin.tests.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestRequest $request)
    {
        $data = $request->all();
        $test = $this->testService->storeOrUpdate($data);
        return redirect()->route('tests.index')->withSuccess('The Test Has Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        return view('backend.admin.tests.edit',compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        $data = $request->all();
        $data['test_id'] = $test->id;
        $test = $this->testService->storeOrUpdate($data);
        return redirect()->route('tests.index')->withSuccess('The Test Has Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return redirect()->route('tests.index')->withSuccess('Delete Successfully');
    }

    public function testListByTestType(Request $request)
    {
        $request->validate([
            'testType_id' => 'required|integer'
        ]);
        $testTypeId =$request->testType_id;
        $tests = Test::where('testType_id','=',"$testTypeId")->get();
        return response()->json($tests);
    }

    public function testById(Request $request)
    {
        $request->validate([
            'test_id' => 'required|integer'
        ]);
        $test = Test::find($request->test_id);
        return response()->json($test);
    }
}
