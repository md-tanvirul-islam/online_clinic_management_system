<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestBillRequest;
use App\Models\BillForTest;
use App\Models\PatientTest;
use App\Models\Test;
use App\Services\TestBillService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Prophecy\Call\Call;


class TestBillController extends Controller
{
    protected $testBillService;

    public function __construct()
    {
        $this->testBillService = new TestBillService();
    }

    public function index()
    {
        $testBills = $this->testBillService->list();
        return view('backend.admin.testBills.index',compact('testBills')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // for old patient test bill create
        return view('backend.admin.testBills.create',compact('request')); 
    }

    public function newPatientTestBillcreate()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestBillRequest $request)
    {
        if($request->do_submit == "yes")
        {
            // dd('yes submit');
            $data = $request->all();
            // dd($data);
            $data['test_ids'] = $request->session()->get('test_ids');
            //  dd($data);
            $testBill = $this->testBillService->store($data);
            $request->session()->forget(['test_ids', 'patient_id','date']);
            return redirect()->route('testBills.index')->withSuccess('The Bill for the test has created successfully');
        }
        else
        {
            if ($request->session()->has('test_ids'))
            {
                $data = array();
                $data = $request->session()->get('test_ids');
                $request->session()->forget('test_ids');
                // dd($request->session()->all());
                $data[] = $request->test_id;
                session(['test_ids' =>$data]);
                return redirect()->route('testBills.create');
            }
            else
            {
                // dd($request->session()->all());
                $data = array();
                $data[] = $request->test_id;
                session([
                    'test_ids' =>$data,
                    'patient_id'=>$request->patient_id,
                    'date'=>$request->date,
                ]);
                // dd($request->session()->get('test_ids'));
                return redirect()->route('testBills.create');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testBill = BillForTest::find($id);
        return view('backend.admin.testBills.show',compact('testBill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testBill = BillForTest::find($id);
        $patient_tests = PatientTest::where('bill_for_test_id','=',$testBill->id)->get();
        return view('backend.admin.testBills.edit',compact('testBill','patient_tests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $data = $request->all();
       $data['bill_for_test_id']  = $id;
       $this->testBillService->update($data);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // first delete all rows in the patient_tests table related with this bill 
        $patient_test_ids = PatientTest::where('bill_for_test_id','=',$id)->pluck('id')->toarray();
        foreach($patient_test_ids as $patient_test_id)
        {
            $patient_test = PatientTest::find($patient_test_id);
            $patient_test->delete();
        }
        // now delete the bill for Bill_for_test table
        $testBill = BillForTest::find($id);
        $testBill->delete();
        return redirect()->route('testBills.index')->withSuccess('Delete Successfull');
    }

    public function removeTest(Request $request,$id)
    {
        // dd($id);
        $test_ids = $request->session()->get('test_ids');
        // dd($test_ids);
        if (($key = array_search($id, $test_ids)) !== false) {
            unset($test_ids[$key]);
        }
        $request->session()->forget('test_ids');
        session([
            'test_ids' => $test_ids,
        ]);

        return redirect()->back();

    }
}
