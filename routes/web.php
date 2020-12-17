<?php

use App\Http\Controllers\DaysOfWeekController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::prefix('admin')->group(function (){
    Route::get('/departments/bin',[DepartmentController::class,'recycleBin'] )->name('departments.bin');
    Route::get('/departments/restore',[DepartmentController::class,'restoreAll'] )->name('departments.restore');
    Route::delete('/departments/{id}/pdelete',[DepartmentController::class,'permanentlyDelete'] )->name('departments.permanently.delete');

    Route::get('/doctors/bin',[DoctorController::class,'recycleBin'] )->name('doctors.bin');
    Route::get('/doctors/restore',[DoctorController::class,'restoreAll'] )->name('doctors.restore');
    Route::delete('/doctors/{id}/pdeletebyid',[DoctorController::class,'permanentlyDelete'] )->name('doctors.permanently.delete.by.id');
    // Route::delete('/doctors/pdelete',function(){echo "abc";} )->name('doctors.permanently.delete.all');

    Route::get('/patients/bin',[PatientController::class,'recycleBin'] )->name('patients.bin');
    Route::get('/patients/restore',[PatientController::class,'restoreAll'] )->name('patients.restore');
    Route::delete('/patients/{id}/pdelete',[PatientController::class,'permanentlyDelete'] )->name('patients.permanently.delete.by.id');
    
    // Route::get('/daysOfWeek/bin',[DaysOfWeekController::class,'recycleBin'] )->name('daysOfWeek.bin');
    // Route::get('/daysOfWeek/restore',[DaysOfWeekController::class,'restoreAll'] )->name('daysOfWeek.restore');
    // Route::delete('/daysOfWeek/{id}/pdelete',[DaysOfWeekController::class,'permanentlyDelete'] )->name('daysOfWeek.permanently.delete.by.id');

    Route::get('/doctorSchedules/bin',[DoctorScheduleController::class,'recycleBin'] )->name('doctorSchedules.bin');
    Route::get('/doctorSchedules/restore',[DoctorScheduleController::class,'restoreAll'] )->name('doctorSchedules.restore');
    Route::delete('/doctorSchedules/{id}/pdelete',[DoctorScheduleController::class,'permanentlyDelete'] )->name('doctorSchedules.permanently.delete.by.id');

    Route::get('/appointments/bin',[AppointmentController::class,'recycleBin'] )->name('appointments.bin');
    Route::get('/appointments/restore',[AppointmentController::class,'restoreAll'] )->name('appointments.restore');
    Route::delete('/appointments/{id}/pdelete',[AppointmentController::class,'permanentlyDelete'] )->name('appointments.permanently.delete.by.id');
    Route::resources([
        'departments'=>DepartmentController::class,
        'doctors'=>App\Http\Controllers\DoctorController::class,
        'daysOfWeek'=>App\Http\Controllers\DaysOfWeekController::class,
        'patients'=>App\Http\Controllers\PatientController::class,
        'doctorSchedules'=>App\Http\Controllers\DoctorScheduleController::class,
        'appointments'=>App\Http\Controllers\AppointmentController::class,
    ]);
    Route::get('/',function (){return view('backend.admin.index');});
    
    
});

Route::get('/test',function()
{
	return view('backend.admin.index');
});
