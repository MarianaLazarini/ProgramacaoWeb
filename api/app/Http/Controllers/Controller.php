<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function store(Request $request)
    {
        $produto = Produto::create($request->all());

        return response()->json($produto, 201);
    }

    public function index()
    {
        return response()->json(Produto::all());
    }
}
