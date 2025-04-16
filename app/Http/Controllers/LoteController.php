<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function index()
    {
        return Lote::with('item')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:itens,id',
            'codigo_lote' => 'required|string|max:255',
            'data_validade' => 'required|date',
            'quantidade_disponivel' => 'required|numeric',
        ]);

        $lote = Lote::create($request->all());

        return response()->json($lote, 201);
    }

    public function show($id)
    {
        $lote = Lote::findOrFail($id);

        return response()->json($lote);
    }

    public function update(Request $request, $id)
    {
        $lote = Lote::findOrFail($id);

        $request->validate([
            'quantidade_disponivel' => 'nullable|numeric',
        ]);

        $lote->update($request->all());

        return response()->json($lote);
    }

    public function destroy($id)
    {
        $lote = Lote::findOrFail($id);
        $lote->delete();

        return response()->json(null, 204);
    }
}
