<?php

use App\Http\Controllers\Api\CompraDistribucion\DistribuidorController;
use App\Http\Controllers\Api\CompraDistribucion\NotaCompraApiController;
use App\Http\Controllers\Api\CompraDistribucion\ProveedorController;
use App\Http\Controllers\Api\Inventario\MateriaPrimaController;
use App\Http\Controllers\Api\Inventario\MateriaPrimaApiController;
use App\Http\Controllers\Api\Inventario\ProductoApiController;
use App\Http\Controllers\Api\Pedido\PedidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TokenAuthController;
use App\Http\Controllers\Api\Login\UserController;
use App\Http\Controllers\Api\ClienteController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//------------------------------------------------------ USERS ----------------------------------------------------------------------------------//
Route::get('users', [UserController::class, 'index'])->name('users');
//-----------------------------------------------------------------------------------------------------------------------------------------------//


Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $user->tokens()->where('name', $request->device_name)->delete();

    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware(['auth:sanctum'])->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return "The tokens have been deleted";
})->name('login.revoke');

//------------------------------------------------------ MATERIA PRIMA API----------------------------------------------------------------------------------//
Route::get('materia-prima-api', [MateriaPrimaController::class, 'index'])->name('materia-prima-api');
Route::post('materia-prima-api/delete/{materia}', [MateriaPrimaController::class, 'delete'])->name('materia-prima-api.delete');
Route::post('create/materia-prima-api', [MateriaPrimaController::class, 'create'])->name('materia-prima-api.create');
Route::post('update/materia-prima-api/{materia}', [MateriaPrimaController::class, 'update'])->name('materia-prima-api.update');
//------------------------------------------------------ MATERIA PRIMA API RESOURCES----------------------------------------------------------------------------------//
//Route::apiResource('materia-prima-api2', MateriaPrimaApiController::class)->names('api.materia-prima');

//------------------------------------------------------ DISTRIBUIDOR API----------------------------------------------------------------------------------//
Route::get('distribuidora-api', [DistribuidorController::class, 'index'])->name('distribuidora-api');
Route::post('distribuidora-api/delete/{distribuidora}', [DistribuidorController::class, 'delete'])->name('distribuidora-api.delete');
Route::get('show/distribuidora-api/{distribuidora}', [DistribuidorController::class, 'show_distribuidora'])->name('show-distribuidora-api');
Route::post('create/distribuidora-api', [DistribuidorController::class, 'create'])->name('distribuidora-api.create');
Route::post('update/distribuidora-api/{distribuidora}', [DistribuidorController::class, 'update'])->name('distribuidora-api.update');


//------------------------------------------------------ PROVEEDOR API----------------------------------------------------------------------------------//
Route::get('proveedor-api', [ProveedorController::class, 'index'])->name('proveedor-api');
Route::post('proveedor-api/delete/{proveedor}', [ProveedorController::class, 'delete'])->name('proveedor-api.delete');
Route::post('create/proveedor-api', [ProveedorController::class, 'create'])->name('proveedor-api.create');
Route::post('update/proveedor-api/{proveedor}', [ProveedorController::class, 'update'])->name('proveedor-api.update');

//------------------------------------------------------ PEDIDO API----------------------------------------------------------------------------------//
Route::get('pedido-api', [PedidoController::class, 'index'])->name('pedido-api');
Route::post('show/pedido-api/{pedido}', [PedidoController::class, 'show'])->name('pedido-api.show');
Route::post('pedido-api/delete/{pedido}', [PedidoController::class, 'delete'])->name('pedido-api.delete');
Route::get('detalle-pedido-api/{pedido}', [PedidoController::class, 'show_detalle'])->name('detalle-pedido-api');
Route::get('producto-pedido-api/{producto}', [PedidoController::class, 'show_producto'])->name('producto-pedido-api');
Route::get('producto-detalle-pedido-api/{producto}', [PedidoController::class, 'show_producto_detalle'])->name('producto-detalle-pedido-api');


//------------------------------------------------------ CLIENTE API----------------------------------------------------------------------------------//
Route::get('cliente-api', [ClienteController::class, 'index'])->name('cliente-api');
Route::get('show/cliente-api/{cliente}', [ClienteController::class, 'show_cliente'])->name('show-cliente-api');
Route::post('cliente-api/delete/{cliente}', [ClienteController::class, 'delete'])->name('cliente-api.delete');
Route::post('create/cliente-api', [ClienteController::class, 'create'])->name('cliente-api.create');
Route::post('update/cliente-api/{cliente}', [ClienteController::class, 'update'])->name('cliente-api.update');





Route::apiResource('productos', ProductoApiController::class)->names('api.productos');

//------------------------------------------------------ NOta Compra API----------------------------------------------------------------------------------//
Route::apiResource('nota-compra', NotaCompraApiController::class)->names('api.nota-compra');
Route::get('nota-compra-detalles/{id}', [NotaCompraApiController::class, 'detalles'])->name('api.nota-compra-datelles');

