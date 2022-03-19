<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\TenantScholarshipController;
use App\Http\Controllers\Student\RegisterStudentController;
use App\Http\Controllers\API\APIController;

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
//GET API to fetch data
Route::GET('/test-students/{id?}',[APIController::class,'ShowTestStudents']);
//POST API to ADD data
Route::POST('/add-test-student',[APIController::class,'addTestStudent']);
//POST API to add MULTIPLE data
Route::POST('/add-student-multiple',[APIController::class,'addStudentMultiple']);
//PUT API to udpate details
Route::PUT('/update-student-details/{id}',[APIController::class,'updateTestStudent']);
//PATCH API to update single FIELD
Route::PATCH('/update-single-student-details/{id}',[APIController::class,'updateSingleTestStudent']);
//DELETE API to delete with ID
Route::DELETE('/delete-test-student/{id?}',[APIController::class,'deleteTestStudent']);
//DELETE with JSON data
Route::DELETE('/delete-test-student-json',[APIController::class,'deleteTestStudentjson']);
//DELETE withmultiple user
Route::DELETE('/delete-test-student-multiple/{ids}',[APIController::class,'deleteTestStudentMultiple']);
//DELETE withmultiple user JSON
Route::DELETE('/delete-test-student-multiple-json',[APIController::class,'deleteTestStudentMultipleJSON']);
//DELETE withmultiple user with JWT
Route::DELETE('/delete-test-student-multiple-jwt',[APIController::class,'deleteMultipleJSON_jwt_token']);




