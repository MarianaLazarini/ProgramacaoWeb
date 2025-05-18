<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Avaliacao;

class AvaliacaoController extends Controller
{
    public function index()
    {
        return Avaliacao::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_cliente' => 'required|string|max:255',
            'comentario' => 'nullable|string',
            'nota' => 'required|integer|min:1|max:5',
            'produto_nome' => 'nullable|string'
        ]);

        return Avaliacao::create($request->all());
    }

    public function show($id)
    {
        return Avaliacao::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        $avaliacao->update($request->all());

        return $avaliacao;
    }

    public function destroy($id)
    {
        Avaliacao::destroy($id);

        return response()->json(null, 204);
    }
}
