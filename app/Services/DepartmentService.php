<?php
namespace App\Services;

    use App\Models\Department;
    use Illuminate\Database\QueryException;

class DepartmentService
    {
    public function allDepartments()
    {
        return Department::all();
    }



    public function storeOrUpdate($data)
    {
        $user_id = auth()->user()->id;

        if(!empty($data["id"])){
            // update
            $department = Department::whereId($data["id"])->first();
            $department->updated_by = $user_id;

        }else{
            //create
            $department = new Department();
            $department->created_by = $user_id;
        }

        $department->name = $data['name'];
        $department->is_active = $data['is_active'];
        $department->description = isset($data['description'])?$data['description']:null;
//        $department->description = $data['description']??null;


        return $department->save() ? $department : null;
    }

    }

?>
