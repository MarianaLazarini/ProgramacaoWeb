<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;

Route::get('/produtos', [ProdutoController::class, 'index']);
