<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AssignPermissionForRole;
use App\Http\Controllers\AssignRoleForUser;
use App\Http\Controllers\AuthorizationRoleController;
use App\Http\Controllers\AuthorizationPermissionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestBillController;
use App\Http\Controllers\TestTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorOwnController;
use App\Http\Controllers\PatientOwnController;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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

//****** For Redirection according to the user type

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
// ******* Finish

// Routes for Localization
Route::get('/lang/{lang}', [GeneralController::class,'language'])->name('language');
// ******* Localization Finish

// Routes for general users
Route::get('/', [GeneralController::class,'index'])->name('indexPage');
Route::get('/doctor_search', [GeneralController::class,'doctorSearch'])->name('doctorSearch');
Route::post('/doctor_search', [GeneralController::class,'doctorSearchResult'])->name('doctorSearchResult');
Route::get('/doctor_profile/{doctor}', [GeneralController::class,'doctorProfile'])->name('doctorProfile');
Route::middleware(['auth'])->group(function(){
    Route::get('/create_appointment/{doctor}', [GeneralController::class,'createAppointment'])->name('createAppointment');
    Route::post('/store_appointment', [GeneralController::class,'storeAppointment'])->name('StoreAppointment');
});
// ******* general users Finish

//******** Routes for Doctor
Route::prefix('doctor')->middleware(['auth','routesForDoctor'])->group(function(){
    Route::get('/dashboard',[DoctorOwnController::class,'index'])->name('doctor.own.index');
    Route::get('/profile',[DoctorOwnController::class,'profile'])->name('doctor.own.profile');
    Route::get('/schedule',[DoctorOwnController::class,'schedules'])->name('doctor.own.schedule');
    Route::get('/appointments',[DoctorOwnController::class,'appointments'])->name('doctor.own.appointment');
    Route::get('/appointments/today',[DoctorOwnController::class,'appointmentsToday'])->name('doctor.own.appointment.today');
    Route::get('/appointments/patient/profile/{patientId}',[DoctorOwnController::class,'patientProfile'])->name('doctor.own.patient.profile');
    Route::get('/appointments/patient/createPrescription/appointment/{appointmentId}/patient/{patientId}',[DoctorOwnController::class,'createPrescription'])->name('doctor.own.patient.createPrescription');
    Route::post('/appointments/patient/storePrescription/{patientId}',[DoctorOwnController::class,'storePrescription'])->name('doctor.own.patient.storePrescription');
    Route::get('/appointments/patient/showPrescription/{prescriptionId}',[DoctorOwnController::class,'showPrescription'])->name('doctor.own.patient.showPrescription');
    Route::get('/appointments/patient/printPrescription/{prescriptionId}',[DoctorOwnController::class,'printPrescription'])->name('doctor.own.patient.printPrescription');
    Route::get('/appointments/patient/pdfPrescription/{prescriptionId}',[DoctorOwnController::class,'pdfPrescription'])->name('doctor.own.patient.pdfPrescription');
    Route::put('/appointments/pay',[DoctorOwnController::class,'pay'])->name('doctor.own.pay');
});
//******** Finish

//******** Routes for Patient
Route::prefix('patient')->middleware(['auth','routesForPatient'])->group(function(){
    Route::get('/dashboard',[PatientOwnController::class,'patientDashboard'])->name('patient.own.dashboard');
    Route::get('/profile',[PatientOwnController::class,'profile'])->name('patient.own.profile');
    Route::get('/doctorProfile/{doctor}',[PatientOwnController::class,'doctorProfile'])->name('patient.own.doctorProfile');
    Route::get('/appointments',[PatientOwnController::class,'patientAppointments'])->name('patient.own.appointments');
    Route::get('/prescriptions',[PatientOwnController::class,'patientPrescriptions'])->name('patient.own.prescriptions');
    Route::get('/prescription/view/{prescriptionId}',[PatientOwnController::class,'patientPrescriptionView'])->name('patient.own.prescription.view');
    Route::get('/prescription/print/{prescriptionId}',[PatientOwnController::class,'patientPrescriptionPrint'])->name('patient.own.prescription.print');
    Route::get('/prescription/pdf/{prescriptionId}',[PatientOwnController::class,'patientPrescriptionPDF'])->name('patient.own.prescription.PDF');
    
});
//******** Finish

// Routes for Admin Users
Route::prefix('admin')->middleware(['auth','routesForAdmin'])->group(function (){

    Route::get('/',function (){return view('backend.admin.index');})->name('admin.index');

    Route::get('/auth/roles/list',[AuthorizationRoleController::class,'roleList'])->name('authorization.roles.list');
    Route::get('/auth/roles/create',[AuthorizationRoleController::class,'roleCreate'])->name('authorization.roles.create');
    Route::post('/auth/roles/create',[AuthorizationRoleController::class,'roleStore'])->name('authorization.roles.store');
    Route::get('/auth/roles/edit/{role}',[AuthorizationRoleController::class,'roleEdit'])->name('authorization.roles.edit');
    Route::put('/auth/roles/edit/{role}',[AuthorizationRoleController::class,'roleUpdate'])->name('authorization.roles.update');
    Route::delete('/auth/roles/{role}',[AuthorizationRoleController::class,'roleDestroy'])->name('authorization.roles.destroy');
    Route::get('/auth/roles/{role}/permission',[AuthorizationRoleController::class,'rolePermissionList'])->name('authorization.roles.permissions.list');
    Route::get('/auth/roles/bin',[AuthorizationRoleController::class,'roleBin'])->name('authorization.roles.bin');
    Route::get('/auth/roles/restore',[AuthorizationRoleController::class,'roleRestore'])->name('authorization.roles.restore');
    
    Route::get('/auth/permissions/list',[AuthorizationPermissionController::class,'list'])->name('authorization.permission.list');
    Route::get('/auth/permissions/create',[AuthorizationPermissionController::class,'create'])->name('authorization.permission.create');
    Route::post('/auth/permissions/create',[AuthorizationPermissionController::class,'store'])->name('authorization.permission.store');
    Route::get('/auth/permissions/edit/{permission}',[AuthorizationPermissionController::class,'edit'])->name('authorization.permission.edit');
    Route::put('/auth/permissions/edit/{permission}',[AuthorizationPermissionController::class,'update'])->name('authorization.permission.update');
    Route::delete('/auth/permissions/{permission}',[AuthorizationPermissionController::class,'destroy'])->name('authorization.permission.destroy');
    Route::get('/auth/permissions/bin',[AuthorizationPermissionController::class,'bin'])->name('authorization.permission.bin');
    Route::get('/auth/permissions/restore',[AuthorizationPermissionController::class,'restore'])->name('authorization.permission.restore');
    
    Route::get('/auth/assignRole/index',[AssignRoleForUser::class,'index'])->name('authorization.assignRole.index');
    Route::get('/auth/assignRole/edit/{model_id}',[AssignRoleForUser::class,'edit'])->name('authorization.assignRole.edit');
    Route::put('/auth/assignRole/add/{model_id}',[AssignRoleForUser::class,'add'])->name('authorization.assignRole.add');
    Route::delete('/auth/assignRole/remove/{model_id}',[AssignRoleForUser::class,'remove'])->name('authorization.assignRole.remove');
    
    Route::post('/auth/assignPermissionRole/store',[AssignPermissionForRole::class,'store'])->name('authorization.assignPermission.role.store');


    Route::get('/departments/bin',[DepartmentController::class,'recycleBin'] )->name('departments.bin');
    Route::get('/departments/restore',[DepartmentController::class,'restoreAll'] )->name('departments.restore');
    Route::delete('/departments/{id}/pdelete',[DepartmentController::class,'permanentlyDelete'] )->name('departments.permanently.delete');
    Route::get('/excel/import/show',[DepartmentController::class,'excelImportCreate'])->name('department.excelimport.create');
    Route::post('/excel/import/store',[DepartmentController::class,'excelImportStore'])->name('department.excel.import.store');
    Route::get('/excel/export',[DepartmentController::class,'excelExport'])->name('department.excel.export');

    Route::get('/doctors/bin',[DoctorController::class,'recycleBin'] )->name('doctors.bin');
    Route::get('/doctors/restore',[DoctorController::class,'restoreAll'] )->name('doctors.restore');
    Route::delete('/doctors/{id}/pdeletebyid',[DoctorController::class,'permanentlyDelete'] )->name('doctors.permanently.delete.by.id');
    Route::post('/doctors/search',[DoctorController::class,'searchDoctor'] )->name('doctors.search');
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
    Route::get('/appointments/doctorSchedule/search',[AppointmentController::class,'doctorScheduleSearch'] )->name('appointments.doctorScheduleSearch');
    Route::get('/appointments/doctorScheduleNewPatient/search',[AppointmentController::class,'doctorScheduleSearchNewPatient'] )->name('appointments.doctorScheduleSearch.newPatient');
  

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
        'medicineGenerics'=>App\Http\Controllers\MedicineGenericController::class,
        'medicines'=>App\Http\Controllers\MedicineController::class,
    ]);  
});




// Route::get('test',[GeneralController::class,'infoXchange']);

// Route::get('test',function(Request $request)
// {
//     $user = User::find(1);
//     $user->assignRole('patient');
//     return 'work done';

// });

//testing interfaces
// Route::get('/testing/interfaces', function(PaymentGatewayInterface $paymentGatewayInterface)
// {
//     dd($paymentGatewayInterface->payment());
// });
//finsish


Route::get('test',function(Request $request)
{
    // return view('errors.403');
    // $user = User::where('type','=','admin')->get();
    // $name = 'abdullah';
    //  $data = "<a href='".route('patients.show',[4])."'>".$name." has created a profile as a patient. </a>";
    // dd($data, 'web.php');
    dd(testingHelper());
});

Route::get('test1',function(Request $request)
{
    dd(testingHelper());
});

Route::get('logOutTesting',function(Request $request)
{
    return redirect()->route('logout');
    
});
