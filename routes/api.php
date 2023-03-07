<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('/categorias', [CategoriaController::class, 'obtenerTodos']);
Route::get('/categorias/{id}', [CategoriaController::class, 'obtenerXId']);
Route::post('/categorias', [CategoriaController::class, 'crear']);
Route::put('/categorias/{id}', [CategoriaController::class, 'actualizar']);
Route::delete('/categorias/{id}', [CategoriaController::class, 'eliminar']);

Route::get('/usuarios', [UsuarioController::class, 'obtenerTodos']);
Route::get('/usuarios/{cedula}', [UsuarioController::class, 'obtenerXCedula']);
Route::post('/usuarios', [UsuarioController::class, 'crear']);
Route::put('/usuarios/{cedula}', [UsuarioController::class, 'actualizar']);
Route::delete('/usuarios/{cedula}', [UsuarioController::class, 'eliminar']);
