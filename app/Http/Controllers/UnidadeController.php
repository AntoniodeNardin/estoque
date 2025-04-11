<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function index()
    {
        return Unidade::all();  // Retorna todas as unidades
    }

    public function show($id)
    {
        return Unidade::findOrFail($id);  // Retorna uma unidade específica
    }

    public function store(Request $request)
    {
        $request->validate([
            'unidade' => 'required|string|max:255|unique:unidades'
        ]);

        return Unidade::create($request->all());  // Cria uma nova unidade
    }

    public function update(Request $request, $id)
    {
        $unidade = Unidade::findOrFail($id);
        $unidade->update($request->all());  // Atualiza a unidade
        return $unidade;
    }

    public function destroy($id)
    {
        $unidade = Unidade::findOrFail($id);
        $unidade->delete();  // Deleta a unidade
        return response()->noContent();  // Retorna resposta vazia
    }
}
