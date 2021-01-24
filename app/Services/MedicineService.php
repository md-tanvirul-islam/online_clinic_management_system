<?php
namespace App\Services;

    use App\Models\Medicine;

class MedicineService
    {
    public function list()
    {
        return Medicine::simplePaginate(10);
    }

    public function storeOrUpdate($data)
    {
        $user_id = auth()->user()->id;
        if(!empty($data["medicine_id"])){
            // update
            $medicine = Medicine::whereId($data["medicine_id"])->first();
            $medicine->updated_by = $user_id;

        }else{
            //create
            $medicine = new Medicine();
            $medicine->created_by = $user_id;
        }
        $medicine->generic_id = $data['generic_id'];
        $medicine->brand_name = $data['brand_name'];
        $medicine->form = $data['form'];
        $medicine->strength = $data['strength'];
        $medicine->status = $data['status'];
        $medicine->dosage_description = isset($data['dosage_description'])?$data['dosage_description']:null;
        $medicine->other_info = isset($data['other_info'])?$data['other_info']:null;
        
        return $medicine->save() ? $medicine : null;
    }

    public function getDropdownList()
        {
            return Medicine::pluck('name','id');
        }

    }

?>
