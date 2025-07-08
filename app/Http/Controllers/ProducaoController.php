<?php

namespace App\Http\Controllers;

use App\Models\Producao;
use Illuminate\Http\Request;

class ProducaoController extends Controller
{
    public function index()
    {
        return Producao::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_producao' => 'required|date',
        ]);

        $producao = Producao::create($request->all());

        foreach ($request->itens as $item) {
            $producao->itens()->create([
                'item_id' => $item['item_id'],
                'quantidade' => $item['quantidade']
            ]);
        }

        return response()->json($producao->load('itens'));
    }

    public function show($id)
    {
        $producao = Producao::findOrFail($id);

        return response()->json($producao);
    }

    public function update(Request $request, $id)
    {
        $producao = Producao::findOrFail($id);

        $request->validate([
            'descricao' => 'nullable|string|max:255',
            'quantidade_produzida' => 'nullable|numeric',
            'data_producao' => 'nullable|date',
        ]);

        $producao->update($request->all());

        return response()->json($producao);
    }

    public function destroy($id)
    {
        $producao = Producao::findOrFail($id);
        $producao->delete();

        return response()->json(null, 204);
    }
}
