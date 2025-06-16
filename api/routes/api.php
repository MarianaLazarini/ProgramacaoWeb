<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* ─────────── Controladores ─────────── */
use App\Http\Controllers\Api\AuthController;          //  ← novo
use App\Http\Controllers\Api\PasswordController;      //  ← novo
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\AvaliacaoController;
use App\Http\Controllers\Api\HorarioController;

/* ─────────── Teste simples de autenticação ─────────── */
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/* ─────────── Auth pública ─────────── */
Route::post('/login',            [AuthController::class,     'login']);
Route::post('/register',         [AuthController::class,     'register']);
Route::post('/password/forgot',  [PasswordController::class, 'sendResetLink']);

/* ─────────── Rotas que exigem token ─────────── */
Route::middleware('auth:sanctum')->group(function () {

    /* Alteração de senha + logout */
    Route::post('/password/change', [PasswordController::class, 'change']);
    Route::post('/logout',          [AuthController::class,     'logout']);

    /* Usuários */
    Route::prefix('/user')->group(function () {
        Route::get   ('/index',        [UsuarioController::class, 'index']);
        Route::get   ('/show/{id}',    [UsuarioController::class, 'show']);
        Route::post  ('/store',        [UsuarioController::class, 'store']);
        Route::put   ('/update/{id}',  [UsuarioController::class, 'update']);
        Route::delete('/destroy/{id}', [UsuarioController::class, 'destroy']);
    });

    /* REST resources protegidos */
    Route::apiResource('produtos',    ProdutoController::class);
    Route::apiResource('categorias',  CategoriaController::class);
    Route::apiResource('menus',       MenuController::class);
    Route::apiResource('avaliacoes',  AvaliacaoController::class);
    Route::apiResource('horarios',    HorarioController::class);
});
