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
use App\Http\Controllers\Admin\{AuthController,ProfileController,UserController};
use App\Http\Controllers\{CompanyController,EmployeeController};


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AuthController::class,'getLogin'])->name('getLogin');
Route::post('/admin/login',[AuthController::class,'postLogin'])->name('postLogin');

Route::group(['middleware'=>['admin_auth']],function(){

    //Resource Controller
        Route::resource('admin/employees', EmployeeController::class);
        Route::resource('admin/companies', CompanyController::class);
    // End Resource Controller

    Route::get('/admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/users',[UserController::class,'index'])->name('users.index');
    Route::get('/admin/logout',[ProfileController::class,'logout'])->name('logout');
});
