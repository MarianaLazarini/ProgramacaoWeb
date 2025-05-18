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
    // Validação dos dados recebidos
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'preco' => 'required|numeric',
        'imagem' => 'nullable|string',
    ]);

    // Cria o produto com os dados validados
    $produto = Produto::create($validated);

    return response()->json($produto, 201);
    }
}
