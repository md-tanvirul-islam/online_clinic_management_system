<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\DoctorUserSeeder;
use Database\Seeders\TestTypeSeeder;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\MedicineGenericSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminUserSeeder::class,
            DepartmentSeeder::class,
            TestTypeSeeder::class,
            DoctorUserSeeder::class,
            MedicineGenericSeeder::class,
        ]);
    }
}
