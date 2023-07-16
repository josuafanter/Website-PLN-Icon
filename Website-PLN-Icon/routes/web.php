<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\alatController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\aplikasiController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\dospemController;
use App\Http\Controllers\ubah_komponenController;
use App\Http\Controllers\ubah_aplikasiController;

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
    return view('login');
});


Route::get('/login', [loginController::class,'index'])->name('login');

Route::post('/login', [loginController::class,'login']);



Route::post('/logout', [loginController::class,'logout']);




Route::get('/home', [HomeController::class,'index'])->middleware('auth');

Route::middleware(['admin'])->group(function () {

Route::resource('/komponen', alatController::class)->middleware('auth');

Route::resource('/aplikasi', aplikasiController::class)->middleware('auth');

Route::resource('/mahasiswa', mahasiswaController::class)->middleware('auth');

Route::resource('/dospem', dospemController::class)->middleware('auth');

Route::get('/register', [loginController::class,'daftar'])->middleware('auth');

Route::post('/register', [loginController::class,'register'])->middleware('auth');

});

Route::resource('/project', projectController::class)->middleware('auth');

Route::resource('/user_komponen', ubah_komponenController::class)->middleware('auth');

Route::resource('/user_aplikasi', ubah_aplikasiController::class)->middleware('auth');



