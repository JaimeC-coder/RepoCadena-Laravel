<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ProblemaController;
use App\Http\Controllers\VehiculoProblemaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProveedorController;
use App\Models\Producto;
use GuzzleHttp\Handler\Proxy;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});

Route::resource('clientes', ClienteController::class)->names('clientes');
Route::resource('proveedores',ProveedorController::class)->names('proveedores');
Route::resource('productos', ProductoController::class)->names('productos');

Route::resource('problemas', ProblemaController::class)->names('problemas');
Route::resource('vehiculos', VehiculoController::class)->names('vehiculos');
Route::resource('taller', VehiculoProblemaController::class)->names('taller');
Route::resource('pedidos', PedidoController::class)->names('pedidos');
//
