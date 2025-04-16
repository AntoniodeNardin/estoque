<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    public function store(CategoriaRequest $request)
    {
        $categoria = Categoria::create([
            'nome' => $request->nome,
        ]);

        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);

        return response()->json($categoria);
    }

    public function update(CategoriaRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'nome' => $request->nome,
        ]);

        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json(null, 204);
    }
}
