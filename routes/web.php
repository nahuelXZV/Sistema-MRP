<?php

use App\Http\Controllers\Administracion\BitacoraController;
use App\Http\Controllers\Administracion\RoleController;
use App\Http\Controllers\Api\Login\UserController as LoginUserController;
use App\Http\Controllers\Configuracion\CategoriaPrimaController;
use App\Http\Controllers\Inventario\MateriaPrimaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Inventario\ProductoController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\CompraDistribucion\NotaCompraController;
use App\Http\Controllers\Configuracion\EmpresaController;
use App\Http\Controllers\Configuracion\SistemaUnidadController;
use App\Http\Controllers\Inventario\BOMController as InventarioBOMController;
use App\Http\Controllers\PedidosCompras\PedidoController;
use App\Http\Controllers\Produccion\MpsController;
use App\Http\Controllers\Produccion\ProcesosController;
//use App\Http\Controllers\Login\UserController;
use App\Http\Controllers\Reportes\ReporteController;
use App\Models\Empresa;
use App\Models\Inventario\MateriaPrima;
use App\Models\Produccion\Mps;
use Illuminate\Http\Request;

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

    // Route categoria productos
    Route::resource('categoria_productos', CategoriaProductoController::class);

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

    // Route Bitacora
    Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');

    //Route Usuarios
    Route::get('/usuarios', [LoginUserController::class, 'indexx'])->middleware('can:usuarios.index')->name('usuarios.index');
    Route::get('/usuarios/create', [LoginUserController::class, 'createe'])->middleware('can:usuarios.index')->name('usuarios.create');
    Route::get('/usuarios/edit/{id}', [LoginUserController::class, 'editt'])->middleware('can:usuarios.index')->name('usuarios.edit');

    // Route BOM
    Route::get('/productos/show/{id}/bom/create', [InventarioBOMController::class, 'create'])->name('bom.create');
    Route::get('/productos/show/{id}/bom/edit/{idbom}', [InventarioBOMController::class, 'edit'])->name('bom.edit');

    // Route reporte
    Route::get('/reporte', [ReporteController::class, 'index'])->name('reporte.index');
    Route::post('/reporte', [ReporteController::class, 'validar'])->name('reporte.validar');

    //Route Rol
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');

    // Route categoria productos
    Route::resource('empresas', EmpresaController::class);

    //Route nota compra
    Route::get('/nota-compra', [NotaCompraController::class, 'index'])->name('nota-compra.index');
    Route::get('/nota-compra/create', [NotaCompraController::class, 'create'])->name('nota-compra.create');
    Route::get('/nota-compra/{id}', [NotaCompraController::class, 'edit'])->name('nota-compra.edit');

    //Route procesos
    Route::get('/procesos', [ProcesosController::class, 'index'])->name('procesos.index');
    Route::get('/procesos/create', [ProcesosController::class, 'create'])->name('procesos.create');
    Route::get('/procesos/edit/{id}', [ProcesosController::class, 'edit'])->name('procesos.edit');
    Route::get('/procesos/productos/{id}', [ProcesosController::class, 'productos'])->name('procesos.productos');

    //Route pedidos
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
    Route::get('/pedidos/edit/{id}', [PedidoController::class, 'edit'])->name('pedidos.edit');
    Route::get('/pedidos/add/{id}', [PedidoController::class, 'add'])->name('pedidos.add');
    Route::get('/detalles-pedidos/{id}', [PedidoController::class, 'details'])->name('pedidos.details');

    //Route mps
    Route::get('/mps', [MpsController::class, 'index'])->name('mps.index');
    Route::get('/detalles-mps/{id}', [MpsController::class, 'details'])->name('mps.details');


    Route::get('stock', function () {
        return MateriaPrima::all();
    });
    Route::get('mps/stock', function () {
        return Mps::all();
    });
});
