<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineGenericSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genericNames = ['Abacavir','Acetazolamide','Acetylsalicylic acid ','Betamethasone','Cloxacillin','Doxycycline','Ergometrine','Fluconazole','Glucose','Retinol','Vitamin B-Complex'];

        foreach($genericNames as $genericName)
        {
            DB::table('medicine_generics')->insert([
                 'name' =>   $genericName,
                 'detail' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when ..."
            ]);
        }
    }
}
