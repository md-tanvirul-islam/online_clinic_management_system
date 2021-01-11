<?php

use App\Http\Controllers\DaysOfWeekController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestBillController;
use App\Http\Controllers\TestTypeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\BillForTest;
use App\Imports\DepartmentsImport;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//****** For Redirect according to the user type

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

// ******* Finsih

// Routes for general users
Route::get('/', [GeneralController::class,'index'])->name('indexPage');
Route::get('/doctor_search', [GeneralController::class,'doctorSearch'])->name('doctorSearch');
Route::post('/doctor_search', [GeneralController::class,'doctorSearchResult'])->name('doctorSearchResult');
Route::middleware(['auth'])->group(function(){
    Route::get('/create_appointment/{id}', [GeneralController::class,'createAppointment'])->name('createAppointment');
    Route::post('/store_appointment', [GeneralController::class,'storeAppointment'])->name('StoreAppointment');
});


// Routes for Admin Users
Route::prefix('admin')->middleware('auth')->group(function (){

    Route::get('/',function (){return view('backend.admin.index');})->name('admin.index');

    Route::get('/departments/bin',[DepartmentController::class,'recycleBin'] )->name('departments.bin');
    Route::get('/departments/restore',[DepartmentController::class,'restoreAll'] )->name('departments.restore');
    Route::delete('/departments/{id}/pdelete',[DepartmentController::class,'permanentlyDelete'] )->name('departments.permanently.delete');
    Route::get('/excel/import/show',[DepartmentController::class,'importCreate'])->name('department.import.create');
    Route::post('/excel/import/store',[DepartmentController::class,'importStore'])->name('department.import.store');

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
    Route::delete('/appointments/pdelete/{id}',[AppointmentController::class,'permanentlyDelete'] )->name('appointments.permanently.delete.by.id');
    Route::get('/appointments/doctorInfo',[AppointmentController::class,'doctorInfo'] )->name('appointments.doctorInfo');
    Route::get('/appointments/newPatientCreate',[AppointmentController::class,'newPatientAppointmentCreate'] )->name('appointments.newPatient.create');
    Route::post('/appointments/newPatientStore',[AppointmentController::class,'newPatientAppointmentStore'] )->name('appointments.newPatient.store');
    Route::put('/appointments/pay',[AppointmentController::class,'pay'] )->name('appointments.pay');
  

    Route::get('/tests/testListByTestType/',[TestController::class,'testListByTestType'] )->name('tests.testListByTestType');

    Route::get('testBills/removeTest/{id}',[TestBillController::class,'removeTest'])->name('testBills.remove.test');
    Route::put('testBills/removeTest/{id}/update',[TestBillController::class,'update'])->name('testBills.update.remove.test');
    Route::put('testBills/addTest/{id}/update',[TestBillController::class,'update'])->name('testBills.update.add.test');
    Route::get('testBills/print/{id}',[TestBillController::class,'print'])->name('testBills.print');
    Route::get('testBills/pdf/{id}',[TestBillController::class,'pdf'])->name('testBills.pdf');


    Route::resources([
        'departments'=>DepartmentController::class,
        'doctors'=>App\Http\Controllers\DoctorController::class,
        'daysOfWeek'=>App\Http\Controllers\DaysOfWeekController::class,
        'patients'=>App\Http\Controllers\PatientController::class,
        'doctorSchedules'=>App\Http\Controllers\DoctorScheduleController::class,
        'appointments'=>App\Http\Controllers\AppointmentController::class,
        'testTypes'=>App\Http\Controllers\TestTypeController::class,
        'tests' => App\Http\Controllers\TestController::class,
        'testBills'=>App\Http\Controllers\TestBillController::class,
    ]);  
});


// **** route for import

//Route::get('/test/show',[DepartmentController::class,'importCreate'])->name('department.import.create');
//Route::get('/test/store',[DepartmentController::class,'importStore'])->name('department.import.store');
// ***** route for impot finish.

// Route::get('test',[GeneralController::class,'infoXchange']);

Route::get('test1',function(Request $request)
{
   return view('frontend.general.search_doctor');

});