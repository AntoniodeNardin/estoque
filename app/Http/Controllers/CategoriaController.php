<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

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

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

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
