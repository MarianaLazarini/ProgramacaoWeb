<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHorarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'dia_semana' => 'required|string|max:30',
            'abre' => 'required|string',
            'fecha' => 'required|string',
        ];
    }
}
