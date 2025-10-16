<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ProductoController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//APIRESOURCE = Metodo de Ruta 1
//DECLARAR LAS RUTAS DE CATEGORIAS
//Route::apiResource('categorias', CategoriaController::class);
//DECLARAR LAS RUTAS DE PRODUCTOS
//Route::apiResource('productos', ProductoController::class);

//APIRESOURCE = Metodo de Ruta 2
//DECLARAR LAS RUTAS DE CATEGORIAS
Route::get('consultar-todas-categorias', [CategoriaController::class, 'index']);
Route::get('consultar-una-categorias/{categoria}', [CategoriaController::class, 'show']);
Route::post('guardar-categorias', [CategoriaController::class, 'store']);
Route::put('actualizar-categorias/{categoria}', [CategoriaController::class, 'update']);
Route::delete('eliminar-categorias/{categoria}', [CategoriaController::class, 'destroy']);
//Rutas para Productos
Route::get('consultar-productos', [ProductoController::class, 'index']);
Route::get('consultar-un-producto/{producto}', [ProductoController::class, 'show']);
Route::post('guardar-productos', [ProductoController::class, 'store']);
Route::put('actualizar-productos/{producto}', [ProductoController::class, 'update']);
Route::delete('eliminar-productos/{producto}', [ProductoController::class, 'destroy']);

