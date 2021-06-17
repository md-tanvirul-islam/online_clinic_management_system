<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $testTypeNames = ['Blood Analysis','Gastric Fluid','Kidney Function Test','Liver Function Test','Lumbar Puncture','Malabsorption Tests' ,'Pregnancy Test','Prenatal Testing','Thyroid Function Test','Urinalysis'];
        foreach($testTypeNames as $testTypeName)
        {
            DB::table('test_types')->insert([
                'name' => $testTypeName,
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
                'slug'=> Str::slug($testTypeName),
            ]);
        }
            
        
    }
}
