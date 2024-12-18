<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiagnosisResultController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\IndicationController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DiagnosisResultController::class,'consultation'])->name('consul');
Route::get('/result-consultation/{code}', [DiagnosisResultController::class,'resultConsultation'])->name('consul.result');
Route::post('/save-consultation', [DiagnosisResultController::class,'saveConsultation'])->name('consul.save');

Route::prefix('admin')->group(function(){
    Route::get('/login', [AuthController::class,'login'])->name('login');
    Route::post('/login', [AuthController::class,'loginProcess'])->name('login.process');
    
    Route::middleware(['auth'])->group(function () {    
        Route::get('/logout', [AuthController::class,'logout'])->name('logout');
    
        Route::resource('disease', DiseaseController::class);
        Route::get('disease/rule-settings/{disease}', [DiseaseController::class,"ruleSetting"])->name('disease.rule-setting');
        Route::post('disease/rule-settings/{disease}', [DiseaseController::class,"updateRule"])->name('disease.rule-setting.update');
        Route::resource('indication', IndicationController::class);    
        Route::resource('patient', PatientController::class);
    });
});

