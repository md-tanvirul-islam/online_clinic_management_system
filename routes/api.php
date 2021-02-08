<?php
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\ApiDepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/departments',[ApiDepartmentController::class,'getAllDepartments']);
Route::middleware('api')->post('/generateToken',[TokenController::class,'generateToken']);


 