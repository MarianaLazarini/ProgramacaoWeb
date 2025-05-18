<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHorarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'dia_semana' => 'sometimes|string|max:30',
            'abre' => 'sometimes|string',
            'fecha' => 'sometimes|string',
        ];
    }
}
