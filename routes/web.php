<?php

use App\Http\Controllers\Configuracion\CategoriaPrimaController;
use App\Http\Controllers\Configuracion\SistemaUnidadController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/categoria-prima',[CategoriaPrimaController::class,'index'])->name('categoria-prima.index');
    Route::get('/categoria-prima/create',[CategoriaPrimaController::class,'create'])->name('categoria-prima.create');
    Route::get('/categoria-prima/edit/{id}',[CategoriaPrimaController::class,'edit'])->name('categoria-prima.edit');

    Route::resource('sistema-unidad', SistemaUnidadController::class);


});
