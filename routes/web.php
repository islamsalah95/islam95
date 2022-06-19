<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Controller;
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


///////////////////////////////////////////// dash/////////////////////////////////////////>>>>>>>>>>>>>>>>>>>>
    Route::get('dash',[CountryController::class,'dash'])->name('dash');
    Route::get('dash/create',[CountryController::class,'create'])->name('dash.create');
        Route::get('dash/index',[CountryController::class,'index'])->name('dash.index');
        Route::get('dash/withoutCity',[CountryController::class,'withoutCity'])->name('dash.withoutCity');
        Route::get('dash/edit/{id}',[CountryController::class,'edit'])->name('dash.edit');
        Route::post('/dash/store',[CountryController::class,'store'])->name('dash/store');
        Route::post('dash/storeCity',[CountryController::class,'storeCity'])->name('dash.storeCity');
        Route::put('dash/update/{id}',[CountryController::class,'update'])->name('dash.update');
        Route::delete('dash/delete/{id}',[CountryController::class,'delete'])->name('dash.delete');
        Route::delete('dash/deleteCity/{id}',[CountryController::class,'deleteCity'])->name('dash.deleteCity');

    //////////////////////////////////////////////////////////////////////////////////////>>>>>

Auth::routes();

Route::get('home',[HomeController::class, 'index'])->name('home');
