<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmentNames = ['Medicine','Cardiology','General Surgery','Orthopedic','Neurology','Oncology','Urology','Gynaecology','Diabetic','Dental','Nutrition'];

        foreach($departmentNames as $departmentName)
        {
            DB::table('departments')->insert([
                'name'        =>  $departmentName,
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
                'slug'        =>  Str::slug($departmentName) ,    
            ]);
        }
           
        
        
    }
}
