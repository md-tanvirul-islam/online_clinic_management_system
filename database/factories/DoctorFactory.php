<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name',
            'email',
            'department_id',
            'address',
            'phoneNo',
            'mobileNo',
            'image',
            'speciality',
            'degree',
            'bio',
            'birthDate',
            'gender',
            'bloodGroup',
            'feeNew',
            'feeInMonth',
            'feeReport',
        ];
    }
}
