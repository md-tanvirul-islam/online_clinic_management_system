<?php
    namespace App\Services;
    use App\Models\TestType;
    use Illuminate\Support\Str;

    class TestTypeService
        {
            
            public function list()
            {
                return TestType::all();
            }

            public function storeOrUpdate($data)
            {
                $user_id = auth()->user()->id;

                if(isset($data['testType_id']))
                {
                    $testType = TestType::find($data['testType_id']);
                    $testType->updated_by = $user_id;
                }
                else
                {
                    $testType = new TestType();
                    $testType->created_by = $user_id ;
                }
                $testType->name = $data['name'];
                $testType->description = $data['description'];
                $testType->status = $data['status'];
                $testType->slug = Str::slug($data['name']);
                return $testType->save()? $testType : null ;      
            }

            public function getDropdownList()
            {
                return TestType::pluck('name','id');
            }
        }
?>