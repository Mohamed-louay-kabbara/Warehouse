<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\MattersController;
use App\Http\Controllers\InputsController;
use App\Http\Controllers\ExportsController;
use App\Http\Controllers\BillsController;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('auth.login');
});
Route::resource('categorys',CategorysController::class);
Route::resource('matters', MattersController::class);
Route::resource('inputs', InputsController::class);
Route::resource('entry_dates', Entry_datesController::class);
Route::resource('exports', ExportsController::class);
Route::resource('bills', BillsController::class);
Route::resource('units', UnitsController::class);
Route::get('show_matters',[InputsController::class,'show_matters'])->name('show_matters');
Route::post('search_name',[MattersController::class,'search_name_category'])->name('search_name_category');
Route::post('search_date',[InputsController::class,'search_date'])->name('search_date');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
