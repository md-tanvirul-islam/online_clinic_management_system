<?php
namespace App\Services;

    use App\Models\Doctor;


class DoctorService
    {
    public function allDoctors()
        {
            return Doctor::all();
        }

        public function store($data)
        {
          Doctor::create($data);
        }

        public function update($data,$doctor)
        {
            $doctor->update($data);
        }
    }
?>
