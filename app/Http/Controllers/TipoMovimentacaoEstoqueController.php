<?php

namespace App\Http\Controllers;

use App\Models\TipoMovimentacaoEstoque;
use Illuminate\Http\Request;

class TipoMovimentacaoEstoqueController extends Controller
{
    public function index()
    {
        return TipoMovimentacaoEstoque::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
        ]);

        $tipoMovimentacao = TipoMovimentacaoEstoque::create($request->all());

        return response()->json($tipoMovimentacao, 201);
    }

    public function show($id)
    {
        $tipoMovimentacao = TipoMovimentacaoEstoque::findOrFail($id);

        return response()->json($tipoMovimentacao);
    }

    public function update(Request $request, $id)
    {
        $tipoMovimentacao = TipoMovimentacaoEstoque::findOrFail($id);

        $request->validate([
            'descricao' => 'nullable|string|max:255',
        ]);

        $tipoMovimentacao->update($request->all());

        return response()->json($tipoMovimentacao);
    }

    public function destroy($id)
    {
        $tipoMovimentacao = TipoMovimentacaoEstoque::findOrFail($id);
        $tipoMovimentacao->delete();

        return response()->json(null, 204);
    }
}
