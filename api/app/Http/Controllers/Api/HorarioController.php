<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function index()
    {
        return Horario::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'dia_semana' => 'required|string|max:30',
            'abre' => 'required|string',
            'fecha' => 'required|string',
        ]);

        return Horario::create($request->all());
    }

    public function show($id)
    {
        return Horario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->update($request->all());

        return $horario;
    }

    public function destroy($id)
    {
        Horario::destroy($id);

        return response()->json(null, 204);
    }
}
