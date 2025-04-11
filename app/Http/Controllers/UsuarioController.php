<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha_hash' => 'required|string',
            'tipo' => 'required|string|max:255',
            'ativo' => 'required|boolean',
        ]);

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha_hash' => bcrypt($request->senha_hash),
            'tipo' => $request->tipo,
            'ativo' => $request->ativo,
        ]);

        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);

        return response()->json($usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:usuarios,email,' . $id,
            'senha_hash' => 'nullable|string',
            'tipo' => 'nullable|string|max:255',
            'ativo' => 'nullable|boolean',
        ]);

        // Se a senha foi enviada, criptografa
        if ($request->filled('senha_hash')) {
            $validatedData['senha_hash'] = bcrypt($request->senha_hash);
        }

        $usuario->update($validatedData);

        return response()->json($usuario);
    }


    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(null, 204);
    }
}
