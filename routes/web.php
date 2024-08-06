<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Departments\AdminDepartmentController;
use App\Http\Controllers\Departments\DepartmentController;
use App\Http\Controllers\Employes\employeDetailsController;
use App\Http\Controllers\Employes\VacationsController;
use App\Http\Controllers\UserController;
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
Route::get('personalVacation',[AdminController::class,'personalVacation'])->name('personalVacation');
// Route::get('viewPdf',[AdminController::class,'viewPdf'])->name('viewPdf');





Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
        Auth::routes();

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
        Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');

});

Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']],function(){
        Route::get('dashboard',[employeDetailsController::class,'index'])->name('user.dashboard');
        Route::get('profile',[employeDetailsController::class,'profile'])->name('user.profile');
        Route::get('settings',[employeDetailsController::class,'settings'])->name('user.settings');
        Route::get('settingsTwo',[employeDetailsController::class,'settingsTwo'])->name('user.settingsTwo');
        Route::get('personalData', [employeDetailsController::class, 'personalData'])->name('user.personalData');
        Route::get('shoukurData', [employeDetailsController::class, 'ShoukurData'])->name('user.ShoukurData');
        Route::get('committee', [employeDetailsController::class, 'Committee'])->name('user.Committee');




        Route::post('submit_personalData', [employeDetailsController::class, 'submit_personalData'])->name('user.submit_personalData');
        Route::post('update_personalData/{id}', [employeDetailsController::class, 'update_personalData'])->name('user.update_personalData');


        Route::get('Vacation-Record',[VacationsController::class,'VacationRecord'])->name('user.VacationRecord');
        Route::get('Vacation-Request',[VacationsController::class,'VacationRequest'])->name('user.VacationRequest');
        Route::post('normalVacationSubmit',[VacationsController::class,'normalVacationSubmit'])->name('user.normalVacationSubmit');
        Route::post('SickVacationSubmit',[VacationsController::class,'SickVacationSubmit'])->name('user.SickVacationSubmit');
        Route::post('TimerVacationSubmit',[VacationsController::class,'TimerVacationSubmit'])->name('user.TimerVacationSubmit');
        Route::post('OtherVacationSubmit',[VacationsController::class,'otherVacationSubmit'])->name('user.otherVacationSubmit');

});

Route::group(['prefix'=>'department','middleware'=>['isDepartment','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[DepartmentController::class,'index'])->name('department.dashboard');
    Route::get('Vacation-Request',[DepartmentController::class,'VacationRequest'])->name('department.VacationRequest');
    Route::post('RequesSubmit={id}',[DepartmentController::class,'RequesSubmit'])->name('department.RequesSubmit');
});

Route::group(['prefix'=>'AdminDepartment','middleware'=>['isAdminDepartment','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[AdminDepartmentController::class,'index'])->name('AdminDepartment.dashboard');
    // Route::get('Vacation-Request',[AdminDepartmentController::class,'VacationRequest'])->name('AdminDepartment.VacationRequest');
    Route::get('Current-Status',[AdminDepartmentController::class,'CurrentStatus'])->name('AdminDepartment.CurrentStatus');

    Route::post('Current-Status-Submit',[AdminDepartmentController::class,'Current_Status_Submit'])->name('AdminDepartment.Current-Status-Submit');
    Route::get('deleteCurrent/{id}',[AdminDepartmentController::class,'deleteCurrent'])->name('AdminDepartment.deleteCurrent');

    Route::get('Timer-Report',[AdminDepartmentController::class,'TimerReport'])->name('AdminDepartment.TimerReport');

    Route::get('Past-Status',[AdminDepartmentController::class,'PastStatus'])->name('AdminDepartment.PastStatus');

    // Route::post('RequesSubmit={id}',[DepartmentController::class,'RequesSubmit'])->name('department.RequesSubmit');
});
