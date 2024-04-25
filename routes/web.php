<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
Route::get('viewPdf',[AdminController::class,'viewPdf'])->name('viewPdf');

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
        Route::post('Submit-Employes', [employeDetailsController::class, 'Submit_Employes'])->name('user.Submit_Employes');


        Route::get('Vacation-Record',[VacationsController::class,'VacationRecord'])->name('user.VacationRecord');


        Route::get('Vacation-Request',[VacationsController::class,'VacationRequest'])->name('user.VacationRequest');


        Route::post('normalVacationSubmit',[VacationsController::class,'normalVacationSubmit'])->name('normalVacationSubmit');
        Route::post('SickVacationSubmit',[VacationsController::class,'SickVacationSubmit'])->name('SickVacationSubmit');
        Route::post('TimerVacationSubmit',[VacationsController::class,'TimerVacationSubmit'])->name('TimerVacationSubmit');




});
