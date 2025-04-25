<?php

namespace App\Http\Controllers\Api;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProdutoController extends Controller
{
    public function index()
    {
        return response()
            ->json(Produto::all())
            ->header('Access-Control-Allow-Origin', '*');
    }

    public function store(Request $request)
    {
        $produto = Produto::create($request->all());

        return response()
            ->json($produto, 201)
            ->header('Access-Control-Allow-Origin', '*');
    }
}
