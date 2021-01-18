<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin 1',
            'email' => 'admin1@mail.com',
            'type' => 'admin',
            'password' => Hash::make('password'),
        ]);
    }
}
