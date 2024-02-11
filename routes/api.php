<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{CompanyApiController,EmployeeApiController};

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/company/{id}', [CompanyApiController::class ,'show']);
Route::post('/create-company', [CompanyApiController::class ,'store']);


//Employee Route

Route::get('/company/{id}/employees', [EmployeeApiController::class,'index']);
Route::post('/company/{id}/employees', [EmployeeApiController::class, 'storeEmp']);





