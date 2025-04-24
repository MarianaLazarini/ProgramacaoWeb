<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        return Produto::all();
    }
}
