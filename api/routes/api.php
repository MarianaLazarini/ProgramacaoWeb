<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\AvaliacaoController;
use App\Http\Controllers\Api\HorarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Login
Route::post('/login', [LoginController::class, 'login']);

// Usuários
Route::prefix('/user')->group(function () {
    Route::get('/index', [UsuarioController::class, 'index']);
    Route::get('/show/{id}', [UsuarioController::class, 'show']);
    Route::post('/store', [UsuarioController::class, 'store']);
    Route::put('/update/{id}', [UsuarioController::class, 'update']);
    Route::delete('/destroy/{id}', [UsuarioController::class, 'destroy']);
});

Route::apiResource('produtos', ProdutoController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('menus', MenuController::class);
Route::apiResource('avaliacoes', AvaliacaoController::class);
Route::apiResource('horarios', HorarioController::class);
