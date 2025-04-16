<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'nome' => 'required|string|max:255|unique:categorias,nome',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome da categoria é obrigatório.',
            'nome.unique' => 'Essa categoria já existe.',
            'nome.max' => 'O nome da categoria deve ter no máximo 255 caracteres.',
        ];
    }
}
