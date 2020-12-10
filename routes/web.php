<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;


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
    Route::resources([
        'departments'=>DepartmentController::class,
        'doctors'=>App\Http\Controllers\DoctorController::class,
        'dayOfWeek'=>App\Http\Controllers\DaysOfWeekController::class
    ]);
    Route::get('/',function (){return view('backend.admin.index');});
    
    
});

Route::get('/test',function()
{
	return view('backend.admin.index');
});
