<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Auth;
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

// Route::middleware(['auth'])->group(function (){
// Route::resource(name: 'fakultas', controller: FakultasController::class);
// Route::resource(name: 'prodi', controller: ProdiController::class);
// Route::resource(name: 'mahasiswa', controller: MahasiswaController::class);
// });
//admin
    Route::middleware(['auth' ])->group(function(){
    Route::resource('fakultas',FakultasController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
});
//user
    // Route::middleware(['auth', 'checkRole:U'])->group(function(){
    // Route::get('/fakultas',[FakultasController::class, 'index'])->name('fakultas.index');
    // Route::get('/prodi',[ProdiController::class, 'index'])->name('prodi.index');
    // Route::get('/mahasiswa',[MahasiswaController::class, 'index'])->name('mahasiswa.index');

// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
