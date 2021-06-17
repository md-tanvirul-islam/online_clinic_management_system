<?php
    namespace App\Services;

    use App\Models\DaysOfWeek;

    class DaysOfWeekService
        {
            public function list()
            {
                return DaysOfWeek::all();
            }

            public function storeOrUpdate($data)
            {
                $user_id = auth()->user()->id;
                // dd($data["id"]);
                if(!empty($data["id"])){
                    // update
                    $daysOfWeek = DaysOfWeek::whereId($data["id"])->first();
                    $daysOfWeek->updated_by = $user_id;

                }else{
                    //create
                    $daysOfWeek = new DaysOfWeek();
                    $daysOfWeek->created_by = $user_id;
                }

                $daysOfWeek->name = $data['name'];
                return $daysOfWeek->save() ? $daysOfWeek : null;
            }
            
        }

?>