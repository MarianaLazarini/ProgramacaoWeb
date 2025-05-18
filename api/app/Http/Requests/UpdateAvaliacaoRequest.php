<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvaliacaoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome_cliente' => 'sometimes|string|max:255',
            'comentario' => 'nullable|string',
            'nota' => 'sometimes|integer|min:1|max:5',
            'produto_nome' => 'nullable|string'
        ];
    }
}
