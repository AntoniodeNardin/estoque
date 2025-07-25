<?php

namespace App\Http\Controllers;

use App\Models\Composicao;
use Illuminate\Http\Request;
use App\Models\Item;

class ComposicaoController extends Controller
{
    public function index()
    {
        return Composicao::with('itens')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'quantidade' => 'required|numeric',
            'percentual_perda' => 'nullable|numeric',
            'itens' => 'required|array',
            'itens.*' => 'exists:itens,id',
        ]);

        $composicao = Composicao::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'percentual_perda' => $request->percentual_perda ?? 0,
        ]);

        Item::create([
            'nome' => $request->nome,
            'categoria_id' => null,
            'unidade_id' => null,
            'preco_custo' => 0,
            'estoque_atual' => 0, 
            'is_composicao' => true,
            'ativo' => true,
        ]);

        $composicao->itens()->attach($request->itens);

        return response()->json($composicao->load('itens'), 201);
    }

    public function show($id)
    {
        $composicao = Composicao::with('itens')->findOrFail($id);
        return response()->json($composicao);
    }

    public function update(Request $request, $id)
    {
        $composicao = Composicao::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|string',
            'quantidade' => 'sometimes|numeric',
            'percentual_perda' => 'nullable|numeric',
            'itens' => 'sometimes|array',
            'itens.*' => 'exists:itens,id',
        ]);

        $composicao->update($request->only(['nome', 'quantidade', 'percentual_perda']));

        if ($request->has('itens')) {
            $composicao->itens()->sync($request->itens);
        }

        return response()->json($composicao->load('itens'));
    }

    public function destroy($id)
    {
        $composicao = Composicao::findOrFail($id);
        $composicao->delete();

        return response()->json(null, 204);
    }
}
