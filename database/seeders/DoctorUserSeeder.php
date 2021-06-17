<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DoctorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmentIds  = Department::pluck('id')->toArray();
        $specialties =['Anesthesiology','Dermatology','Diagnostic radiology','Neurology','Nuclear medicine','
        Ophthalmology','Pathology','Surgery'] ;
        $faker = \Faker\Factory::create();
       
        for($i=1;$i<=10;$i++)
        {
            
            $user = new User();
            $user->name = 'Dr.'.$faker->name;
            $user->email = $faker->safeEmail;
            $user->type = 'doctor';
            $user->password = Hash::make('password');
            $user->save();

            DB::table('doctors')->insert([
                'name' => $user->name,
                'email' => $user->email,
                'user_id'=> $user->id,
                'department_id' => $faker->randomElement($departmentIds),
                'address' => $faker->address,
                'phoneNo' => $faker->e164PhoneNumber,
                'mobileNo' =>$faker->tollFreePhoneNumber,
                'image' => null,
                'speciality' => $faker->randomElement($specialties),
                'degree' => 'MBBS , FCPS',
                'bio' => $faker->text(200),
                'birthDate' =>$faker->dateTimeThisCentury->format('Y-m-d'),
                'gender' => $faker->randomElement(config('constant.gender')),
                'bloodGroup'=>$faker->randomElement(config('constant.bloodGroup')),
                'feeNew'=>$faker->numberBetween($min = 500, $max = 1500),
                'feeInMonth'=>$faker->numberBetween($min = 500, $max = 1000),
                'feeReport'=>$faker->numberBetween($min = 500, $max = 900),
            ]);

        }

    }
}
