<?php

namespace App\Http\Controllers;

use App\Models\ProducaoResultado;
use Illuminate\Http\Request;

class ProducaoResultadoController extends Controller
{
    public function index()
    {
        return ProducaoResultado::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'producao_id' => 'required|exists:producoes,id',
            'quantidade_gerada' => 'required|numeric',
            'lote_id' => 'required|exists:lotes,id',
        ]);

        $resultado = ProducaoResultado::create($request->all());

        return response()->json($resultado, 201);
    }

    public function show($id)
    {
        $resultado = ProducaoResultado::findOrFail($id);

        return response()->json($resultado);
    }

    public function update(Request $request, $id)
    {
        $resultado = ProducaoResultado::findOrFail($id);

        $request->validate([
            'producao_id' => 'nullable|exists:producoes,id',
            'quantidade_gerada' => 'nullable|numeric',
            'lote_id' => 'nullable|exists:lotes,id',
        ]);

        $resultado->update($request->all());

        return response()->json($resultado);
    }

    public function destroy($id)
    {
        $resultado = ProducaoResultado::findOrFail($id);
        $resultado->delete();

        return response()->json(null, 204);
    }
}
