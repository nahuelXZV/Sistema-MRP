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
use App\Http\Controllers\CompraDistribucion\DistribuidorController;
use App\Http\Controllers\CompraDistribucion\NotaCompraController;
use App\Http\Controllers\CompraDistribucion\PedidoCanceladoController;
use App\Http\Controllers\CompraDistribucion\ProveedorController;
use App\Http\Controllers\Configuracion\EmpresaController;
use App\Http\Controllers\Configuracion\SistemaUnidadController;
use App\Http\Controllers\Inventario\BOMController as InventarioBOMController;
use App\Http\Controllers\Inventario\DadaBajaController;
use App\Http\Controllers\Inventario\MaquinariaController;
use App\Http\Controllers\PedidosCompras\PedidoController;
use App\Http\Controllers\Produccion\ManufacturaController;
use App\Http\Controllers\Produccion\MpsController;
use App\Http\Controllers\Produccion\ProcesosController;
use App\Http\Controllers\Reportes\ComprasController;
use App\Http\Controllers\Reportes\ManufacturaController as ReportesManufacturaController;
use App\Http\Controllers\Reportes\PedidoController as ReportesPedidoController;
use App\Http\Controllers\Reportes\ReporteController;
use App\Http\Controllers\WelcomeController;
use App\Models\Produccion\Problema;

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

    // Route to the dashboard page.
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

    // Route Sistema de unidades
    Route::resource('sistema-unidad', SistemaUnidadController::class)->middleware('can:sistema-unidad.index');

    // Route clientes
    Route::resource('clientes', ClienteController::class)->middleware('can:clientes.index');

    // Route Proveedores
    Route::resource('proveedor', ProveedorController::class)->middleware('can:proveedor.index');

    // Route distribuidores
    Route::resource('distribuidores', DistribuidorController::class)->middleware('can:distribuidores.index');
    
    // Route maquinarias
    Route::resource('maquinarias', MaquinariaController::class)->middleware('can:maquinarias.index');

    // Route categoria productos
    Route::resource('categoria_productos', CategoriaProductoController::class)->middleware('can:categoria_productos.index');

    // Route Dada de baja de productos 
    Route::resource('/dada-baja', DadaBajaController::class)->middleware('can:dada-baja.index');

    // Route Categoria de materia prima
    Route::get('/categoria-prima', [CategoriaPrimaController::class, 'index'])->middleware('can:categoria-prima.index')->name('categoria-prima.index');
    Route::get('/categoria-prima/create', [CategoriaPrimaController::class, 'create'])->middleware('can:categoria-prima.index')->name('categoria-prima.create');
    Route::get('/categoria-prima/edit/{id}', [CategoriaPrimaController::class, 'edit'])->middleware('can:categoria-prima.index')->name('categoria-prima.edit');

    // Route Product
    Route::get('/productos', [ProductoController::class, 'index'])->middleware('can:productos.index')->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->middleware('can:productos.index')->name('productos.create');
    Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->middleware('can:productos.index')->name('productos.edit');
    Route::get('/productos/show/{id}', [ProductoController::class, 'show'])->middleware('can:productos.index')->name('productos.show');

    // Route Materia Prima
    Route::get('/materia-prima', [MateriaPrimaController::class, 'index'])->middleware('can:materia-prima.index')->name('materia-prima.index');
    Route::get('/materia-prima/create', [MateriaPrimaController::class, 'create'])->middleware('can:materia-prima.index')->name('materia-prima.create');
    Route::get('/materia-prima/edit/{id}', [MateriaPrimaController::class, 'edit'])->middleware('can:materia-prima.index')->name('materia-prima.edit');

    // Route Bitacora
    Route::get('/bitacora', [BitacoraController::class, 'index'])->middleware('can:bitacora.index')->name('bitacora.index');

    //Route Usuarios
    Route::get('/usuarios', [LoginUserController::class, 'indexx'])->middleware('can:usuarios.index')->name('usuarios.index');
    Route::get('/usuarios/create', [LoginUserController::class, 'createe'])->middleware('can:usuarios.index')->name('usuarios.create');
    Route::get('/usuarios/edit/{id}', [LoginUserController::class, 'editt'])->middleware('can:usuarios.index')->name('usuarios.edit');

    // Route BOM
    Route::get('/productos/show/{id}/bom/create', [InventarioBOMController::class, 'create'])->middleware('can:bom.index')->name('bom.create');
    Route::get('/productos/show/{id}/bom/edit/{idbom}', [InventarioBOMController::class, 'edit'])->middleware('can:bom.index')->name('bom.edit');

    // Route reporte
    Route::get('/reporte', [ReporteController::class, 'index'])->middleware('can:reportes.index')->name('reporte.index');
    Route::post('/reporte', [ReporteController::class, 'validar'])->middleware('can:reportes.index')->name('reporte.validar');

    // Route Reporte Manufactura
    Route::get('/reporte/rp', [ReportesManufacturaController::class, 'rp'])->middleware('can:reportes.index')->name('reporte.rp');

    // Route Reporte MPS
    Route::get('/reporte/rmps/{id}', [ReportesManufacturaController::class, 'rmps'])->middleware('can:reportes.index')->name('reporte.rmps');

    // Route Reporte Detalle Pedido 
    Route::get('/reporte/rdp/{id}', [ReportesPedidoController::class, 'rdp'])->middleware('can:reportes.index')->name('reporte.rdp');
    // Route Reporte Pedidos
    Route::get('/reporte/rlp', [ReportesPedidoController::class, 'rlp'])->middleware('can:reportes.index')->name('reporte.rlp');

    // Route Reporte detalles Compras
    Route::get('/reporte/rdc/{id}', [ComprasController::class, 'rdc'])->middleware('can:reportes.index')->name('reporte.rdc');

    //Route Rol
    Route::get('/roles', [RoleController::class, 'index'])->middleware('can:roles.index')->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->middleware('can:roles.index')->name('roles.create');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->middleware('can:roles.index')->name('roles.edit');

    // Route categoria productos
    Route::resource('empresas', EmpresaController::class)->middleware('can:empresa.index');

    //Route nota compra
    Route::get('/nota-compra', [NotaCompraController::class, 'index'])->middleware('can:nota-compra.index')->name('nota-compra.index');
    Route::get('/nota-compra/create', [NotaCompraController::class, 'create'])->middleware('can:nota-compra.index')->name('nota-compra.create');
    Route::get('/nota-compra/edit/{id}', [NotaCompraController::class, 'edit'])->middleware('can:nota-compra.index')->name('nota-compra.edit');
    Route::get('/nota-compra/show/{id}', [NotaCompraController::class, 'show'])->middleware('can:nota-compra.index')->name('nota-compra.show');
    Route::get('/nota-compra/show/{id}/detalle', [NotaCompraController::class, 'add'])->middleware('can:nota-compra.index')->name('nota-compra.add');

    //Route procesos
    Route::get('/procesos', [ProcesosController::class, 'index'])->middleware('can:procesos.index')->name('procesos.index');
    Route::get('/procesos/create', [ProcesosController::class, 'create'])->middleware('can:procesos.index')->name('procesos.create');
    Route::get('/procesos/edit/{id}', [ProcesosController::class, 'edit'])->middleware('can:procesos.index')->name('procesos.edit');
    Route::get('/procesos/productos/{id}', [ProcesosController::class, 'productos'])->middleware('can:procesos.index')->name('procesos.productos');

    //Route pedidos
    Route::get('/pedidos', [PedidoController::class, 'index'])->middleware('can:pedidos.index')->name('pedidos.index');
    Route::get('/pedidos/create', [PedidoController::class, 'create'])->middleware('can:pedidos.index')->name('pedidos.create');
    Route::get('/pedidos/edit/{id}', [PedidoController::class, 'edit'])->middleware('can:pedidos.index')->name('pedidos.edit');
    Route::get('/pedidos/add/{id}', [PedidoController::class, 'add'])->middleware('can:pedidos.index')->name('pedidos.add');
    Route::get('/detalles-pedidos/{id}', [PedidoController::class, 'details'])->middleware('can:pedidos.index')->name('pedidos.details');

    //Route mps
    Route::get('/mps', [MpsController::class, 'index'])->middleware('can:mps.index')->name('mps.index');
    Route::get('/detalles-mps/{id}', [MpsController::class, 'details'])->middleware('can:mps.index')->name('mps.details');

    //Route manufactura
    Route::get('/manufactura/{id}/{idP}', [ManufacturaController::class, 'show'])->middleware('can:pedidos.index')->name('manufactura.show');
    Route::get('/manufactura/reporte/create/{id}/{idM}', [ManufacturaController::class, 'report'])->middleware('can:pedidos.index')->name('manufactura.report');
    Route::get('/manufactura/reporte/details/{id}', [ManufacturaController::class, 'details'])->middleware('can:pedidos.index')->name('manufactura.details');

    //Route pedidos cancelados
    Route::get('/pedidos-cancelados', [PedidoCanceladoController::class, 'index'])->middleware('can:pedido-cancelado.index')->name('pedido-cancelado.index');
    Route::get('/pedidos-cancelados/create', [PedidoCanceladoController::class, 'create'])->middleware('can:pedido-cancelado.index')->name('pedido-cancelado.create');
    Route::get('/pedidos-cancelados/edit/{id}', [PedidoCanceladoController::class, 'edit'])->middleware('can:pedido-cancelado.index')->name('pedido-cancelado.edit');
});
