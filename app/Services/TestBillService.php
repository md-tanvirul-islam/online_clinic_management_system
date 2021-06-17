<?php
    namespace App\Services;
    use App\Models\BillForTest;
    use App\Models\PatientTest;
    use App\Models\Test;
    use Illuminate\Support\Facades\Route;

    class TestBillService
            {
                public function list()
                {
                    return BillForTest::all();
                }

                public function store($data)
                {
                    
                    $user_id = auth()->user()->id;
                    //first make bill for bill id with only date input
                    $bill_for_test = new BillForTest();
                    $bill_for_test->created_by = $user_id ;
                    $bill_for_test->date = $data['date'];
                    $bill_for_test = $bill_for_test->save()? $bill_for_test : null ;  

                    // after creating new bill, now add the test list in the patient_test table with bill id                
                    $test_ids = $data['test_ids'];
                    // dd($test_ids);
                    foreach($test_ids as $test_id)
                    {
                        $patient_test = new PatientTest();
                        $patient_test->created_by = $user_id ;
                        $patient_test->bill_for_test_id = $bill_for_test['id'];
                        $patient_test->patient_id = $data['patient_id'];
                        $patient_test->test_id = $test_id;
                        $patient_test->testType_id = Test::find($test_id)->testType->id;
                        $patient_test->invoice = uniqid()??null;
                        $patient_test->save()? $patient_test : null ; 
                    }

                    // now save the total amount of price in the bill_for_tests table with the  help of loop. first retrieve the test list of the bill and get the test price form test table
                    $test_ids = PatientTest::where('bill_for_test_id','=',$bill_for_test['id'] )->pluck('test_id')->toarray();
                    $amount =0;
                    foreach($test_ids as $test_id )
                    {
                        $amount = $amount + (float)Test::where('id',$test_id)->pluck('price')->first();
                    }
                    $bill_for_test = BillForTest::find($bill_for_test['id']);
                    $bill_for_test->amount = $amount;
                    $bill_for_test = $bill_for_test->save()? $bill_for_test : null ;
                }



                public function update($data)
                {
                    $routeName = Route::currentRouteName();
                    $user_id = auth()->user()->id;
                    if($routeName === "testBills.update.add.test")
                    {
                        $bill_for_test_id = $data['bill_for_test_id'];
                        $patient_id = PatientTest::where('bill_for_test_id','=',$bill_for_test_id )->pluck('patient_id')->first();
                        // dd($bill_for_test_id );
                        $patient_test = PatientTest::create([
                            'patient_id' =>  $patient_id ,
                            'test_id' => $data['test_id'],
                            'testType_id' => $data['testType_id'] ,
                            'bill_for_test_id' => $bill_for_test_id??null,
                            'invoice' =>uniqid()??null ,
                            'created_by' => $user_id,
                        ]);

                        $test_ids = PatientTest::where('bill_for_test_id','=',$bill_for_test_id )->pluck('test_id')->toarray();
                            $amount =0;
                        foreach($test_ids as $test_id )
                        {
                            $amount = $amount + (float)Test::where('id',$test_id)->pluck('price')->first();
                        }
                        $bill_for_test = BillForTest::find($bill_for_test_id);
                        $bill_for_test->amount = $amount;
                        $bill_for_test->updated_by =  $user_id;
                        $bill_for_test = $bill_for_test->save()? $bill_for_test : null ;
                        return redirect()->route('testBills.edit',[$bill_for_test_id])->withSuccess('You add a Test ');   
                    }
                    if($routeName === "testBills.update.remove.test")
                    {
                        // dd($id);
                        $patient_test = PatientTest::find($data['patient_test_id']);
                        $bill_for_test_id = $data['bill_for_test_id'];
                        $patient_test->delete();

                        $test_ids = PatientTest::where('bill_for_test_id','=',$bill_for_test_id )->pluck('test_id')->toarray();
                            $amount =0;
                        foreach($test_ids as $test_id )
                        {
                            $amount = $amount + (float)Test::where('id',$test_id)->pluck('price')->first();
                        }
                        $bill_for_test = BillForTest::find($bill_for_test_id);
                        $bill_for_test->amount = $amount;
                        $bill_for_test->updated_by =  $user_id;
                        $bill_for_test = $bill_for_test->save()? $bill_for_test : null ;
                        return redirect()->route('testBills.edit',[$bill_for_test_id])->withSuccess('You remove a Test');
                    }
                }

                public function getDropdownList()
                {
                    return BillForTest::pluck('name','id');
                }
            }
?>