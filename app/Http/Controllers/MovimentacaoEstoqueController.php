<?php

namespace App\Http\Controllers;

use App\Models\MovimentacaoEstoque;
use Illuminate\Http\Request;

class MovimentacaoEstoqueController extends Controller
{
    public function index()
    {
        return MovimentacaoEstoque::with(['usuario', 'tipoMovimentacao'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tipo_movimentacao_id' => 'required|exists:tipos_movimentacao_estoque,id',
            'quantidade' => 'required|numeric',  // Tornando quantidade opcional
            'data_movimentacao' => 'required|date',           // Tornando data opcional
            'observacao' => 'required|string',   // Tornando observação opcional
            'lote_id' => 'required|exists:lotes,id', // Tornando lote_id opcional (adicionado conforme contexto)
            'item_id' => 'required|exists:itens,id', // Adicionando item_id como obrigatório
        ]);


        $movimentacao = MovimentacaoEstoque::create($request->all());

        return response()->json($movimentacao, 201);
    }

    public function show($id)
    {
        $movimentacao = MovimentacaoEstoque::with(['usuario', 'tipoMovimentacao'])->findOrFail($id);

        return response()->json($movimentacao);
    }

    public function update(Request $request, $id)
    {
        $movimentacao = MovimentacaoEstoque::findOrFail($id);

        $request->validate([
            'tipo_movimentacao_estoque_id' => 'nullable|exists:tipos_movimentacao_estoque,id',
            'quantidade' => 'nullable|numeric',  // Tornando quantidade opcional
            'data' => 'nullable|date',           // Tornando data opcional
            'observacao' => 'nullable|string',   // Tornando observação opcional
            'lote_id' => 'nullable|exists:lotes,id', // Tornando lote_id opcional (adicionado conforme contexto)
        ]);


        $movimentacao->update($request->all());

        return response()->json($movimentacao);
    }

    public function destroy($id)
    {
        $movimentacao = MovimentacaoEstoque::findOrFail($id);
        $movimentacao->delete();

        return response()->json(null, 204);
    }
}
