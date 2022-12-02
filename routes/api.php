<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRMController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('create_department',[CRMController::class,'create_department']);
Route::get('get_department',[CRMController::class,'get_department']);
Route::delete('delete_department/{id}',[CRMController::class,'delete_department']);
Route::put('edit_department/{id}',[CRMController::class,'edit_department']);
Route::post('create_employee',[CRMController::class,'create_employee']);
Route::get('get_employee',[CRMController::class,'get_employee']);
Route::delete('delete_employee/{id}',[CRMController::class,'delete_employee']);
Route::put('edit_employee/{id}',[CRMController::class,'edit_employee']);
Route::put('change_employee_password/{id}',[CRMController::class,'change_employee_password']);
Route::post('create_announcment',[CRMController::class,'create_announcment']);
Route::post('login', [CRMController::class, 'login']);
Route::get('get_employee_profile/{id}',[CRMController::class,'get_employee_profile']);
Route::get('get_team',[CRMController::class,'get_team']);
Route::post('demage_report',[CRMController::class,'demage_report']);
Route::post('policy_create',[CRMController::class,'policy_create']);
Route::delete('policy_delete/{id}',[CRMController::class,'policy_delete']);
Route::put('policy_edit/{id}',[CRMController::class,'policy_edit']);

