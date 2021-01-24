<?php

namespace App\Providers;

use App\Models\Patient;
use App\Models\User;
use App\Services\DepartmentService;
use App\Services\DoctorService;
use App\Services\PatientService;
use App\Services\TestService;
use App\Services\TestTypeService;
use App\Services\MedicineGenericService;
use Illuminate\Support\ServiceProvider;
use Form;




class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::macro('selectTestType', function ($name, $selected = null, $options = []) {
            $testTypeService = new TestTypeService();
            $data = $testTypeService->getDropdownList();
            return Form::select($name, $data, $selected, $options);
        });

        Form::macro('selectTest', function ($name, $selected = null, $options = []) {
            $testService = new TestService();
            $data = $testService->getDropdownList();
            return Form::select($name, $data, $selected, $options);
        });

        Form::macro('selectPatient', function ($name, $selected = null, $options = []) {
            $patientService = new PatientService();
            $data = $patientService->getDropdownList();
            return Form::select($name, $data, $selected, $options);
        });

        Form::macro('selectDepartment', function ($name, $selected = null, $options = []) {
            $departmentService = new DepartmentService();
            $data = $departmentService->getDropdownList();
            return Form::select($name, $data, $selected, $options);
        });

        Form::macro('selectDoctor', function ($name, $selected = null, $options = []) {
            $doctorService = new DoctorService();
            $data = $doctorService->getDropdownList();
            return Form::select($name, $data, $selected, $options);
        });

        Form::macro('selectUser', function ($name, $selected = null, $options = []) {
            $data = User::pluck('name','id');
            return Form::select($name, $data, $selected, $options);
        });

        Form::macro('selectMedicineGeneric', function ($name, $selected = null, $options = []) {
            $medicineGenericService = new MedicineGenericService();
            $data = $medicineGenericService->getDropdownList();
            return Form::select($name, $data, $selected, $options);
        });
    }
}
