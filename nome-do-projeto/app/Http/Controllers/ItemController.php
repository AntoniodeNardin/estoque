<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Categoria;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::with(['categoria', 'unidade'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'unidade_id' => 'required|exists:unidades,id',
            'preco_custo' => 'required|numeric',
            'estoque_atual' => 'required|numeric',
            'ativo' => 'required|boolean',
        ]);

        $item = Item::create([
            'nome' => $request->nome,
            'categoria_id' => $request->categoria_id,
            'unidade_id' => $request->unidade_id,
            'preco_custo' => $request->preco_custo,
            'estoque_atual' => $request->estoque_atual,
            'ativo' => $request->ativo,
        ]);

        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Item::with(['categoria', 'unidade'])->findOrFail($id);

        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $request->validate([
            'nome' => 'nullable|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
            'unidade_id' => 'nullable|exists:unidades,id',
            'preco_custo' => 'nullable|numeric',
            'estoque_atual' => 'nullable|numeric',
            'ativo' => 'nullable|boolean',
        ]);


        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json(null, 204);
    }
}
