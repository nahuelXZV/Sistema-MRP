<?php

use App\Http\Controllers\Configuracion\CategoriaPrimaController;
use App\Http\Controllers\Configuracion\SistemaUnidadController;
use App\Http\Controllers\Inventario\MateriaPrimaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Inventario\ProductoController;
use App\Http\Controllers\CategoriaProductoController;

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

    Route::get('/', function () {
        return view('welcome');
    });

    // Route Sistema de unidades
    Route::resource('sistema-unidad', SistemaUnidadController::class);

    // Route clientes
    Route::resource('clientes', ClienteController::class);

    // Route categoria prima
    Route::resource('categoria_productos',CategoriaProductoController::class);

    // Route Categoria de materia prima
    Route::get('/categoria-prima', [CategoriaPrimaController::class, 'index'])->name('categoria-prima.index');
    Route::get('/categoria-prima/create', [CategoriaPrimaController::class, 'create'])->name('categoria-prima.create');
    Route::get('/categoria-prima/edit/{id}', [CategoriaPrimaController::class, 'edit'])->name('categoria-prima.edit');

    // Route Product
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::get('/productos/show/{id}', [ProductoController::class, 'show'])->name('productos.show');

    // Route Materia Prima
    Route::get('/materia-prima', [MateriaPrimaController::class, 'index'])->name('materia-prima.index');
    Route::get('/materia-prima/create', [MateriaPrimaController::class, 'create'])->name('materia-prima.create');
    Route::get('/materia-prima/edit/{id}', [MateriaPrimaController::class, 'edit'])->name('materia-prima.edit');
});
