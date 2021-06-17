<?php
namespace App\Services;

    use App\Models\MedicineGeneric;

class MedicineGenericService
    {
    public function list()
    {
        return MedicineGeneric::simplePaginate(10);
    }

    public function storeOrUpdate($data)
    {
        $user_id = auth()->user()->id;
        if(!empty($data["medicineGeneric_id"])){
            // update
            $medicineGeneric = MedicineGeneric::whereId($data["medicineGeneric_id"])->first();
            $medicineGeneric->updated_by = $user_id;

        }else{
            //create
            $medicineGeneric = new MedicineGeneric();
            $medicineGeneric->created_by = $user_id;
        }
        $medicineGeneric->name = $data['name'];
        $medicineGeneric->status = $data['status'];
        $medicineGeneric->detail = isset($data['detail'])?$data['detail']:null;
        
        return $medicineGeneric->save() ? $medicineGeneric : null;
    }

    public function getDropdownList()
        {
            return MedicineGeneric::pluck('name','id');
        }

    }

?>
