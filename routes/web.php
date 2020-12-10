<?php

use Illuminate\Support\Facades\Route;


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
    Route::resources([
        'departments'=>App\Http\Controllers\DepartmentController::class,
        'doctors'=>\App\Http\Controllers\DoctorController::class,
        'dayOfWeek'=>\App\Http\Controllers\DaysOfWeekController::class
    ]);
    Route::get('/',function (){
       return view('backend.admin.index');
    });
});

Route::get('/test',function()
{
	return view('backend.admin.index');
});
