<?php
    namespace App\Services;
    use App\Models\BillForTest;
use App\Models\PatientTest;
use App\Models\Test;

class TestBillService
        {
            public function list()
            {
                return BillForTest::all();
            }

            public function store($data)
            {
                $user_id = auth()->user()->id;
                $testBill = new BillForTest();
                $testBill->created_by = $user_id ;

                $testBill->date = $data['date'];
                $testBill = $testBill->save()? $testBill : null ;  

                $patient_test = new PatientTest();
                $patient_test->created_by = $user_id ;
                
                $testCost = 0;
                foreach($data['test_ids'] as $test_id)
                {
                    $patient_test->bill_for_test_id = $testBill['id'];
                    $patient_test->patient_id = $data['patient_id'];
                    $patient_test->test_id = $test_id;
                    $patient_test->testType_id = Test::find($test_id)->testType->id;
                    $testCost = $testCost + (float)Test::where('id',1)->pluck('price')->first();;
                    $patient_test->invoice = uniqid()??null;
                    $patient_test->save()? $patient_test : null ; 
                }
                $testBill->amount = $testCost;
                $testBill = $testBill->save()? $testBill : null ; 
            }

            public function update()
            {
                
            }

            public function getDropdownList()
            {
                return BillForTest::pluck('name','id');
            }
        }
?>