<?php

namespace App\Http\Controllers;

use App\Models\Composicao;
use Illuminate\Http\Request;

class ComposicaoController extends Controller
{
    public function index()
    {
        return Composicao::with(['itemPai', 'itemComponente'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_pai_id' => 'required|exists:itens,id',
            'item_componente_id' => 'required|exists:itens,id',
            'quantidade' => 'required|numeric',
            'percentual_perda' => 'required|numeric',
        ]);

        $composicao = Composicao::create($request->all());

        return response()->json($composicao, 201);
    }

    public function show($id)
    {
        $composicao = Composicao::with(['itemPai', 'itemComponente'])->findOrFail($id);

        return response()->json($composicao);
    }

    public function update(Request $request, $id)
    {
        $composicao = Composicao::findOrFail($id);

        $request->validate([
            'quantidade' => 'nullable|numeric',
            'percentual_perda' => 'nullable|numeric',
        ]);

        $composicao->update($request->all());

        return response()->json($composicao);
    }

    public function destroy($id)
    {
        $composicao = Composicao::findOrFail($id);
        $composicao->delete();

        return response()->json(null, 204);
    }
}
