<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Middleware\CorsMiddleware;

Route::middleware([CorsMiddleware::class])->group(function () {
    Route::get('/produtos', [ProdutoController::class, 'index']);
    Route::post('/produtos', [ProdutoController::class, 'store']);

});
