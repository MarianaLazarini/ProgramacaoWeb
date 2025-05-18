<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'sometimes|numeric',
            'imagem' => 'nullable|string',
        ];
    }
}
