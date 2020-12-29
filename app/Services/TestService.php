<?php
    namespace App\Services;
    use App\Models\Test;

class TestService
    {
        public function list()
        {
            return Test::all();
        }

        public function storeOrUpdate($data)
        {
            $user_id = auth()->user()->id;

            if(isset($data['test_id']))
            {
                $test = Test::find($data['test_id']);
                $test->updated_by = $user_id;
            }
            else
            {
                $test = new Test();
                $test->created_by = $user_id;
            }
            $test->name = $data['name'];
            $test->testType_id = $data['testType_id'];
            $test->price = $data['price'];
            return $test->save()?$test:null;
        }

        public function getDropdownList()
            {
                return Test::pluck('name','id');
            }

    }
?>