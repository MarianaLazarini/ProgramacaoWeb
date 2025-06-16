<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    // Nome da tabela (apenas se difere do plural padrão)
    // protected $table = 'categories';

    protected $fillable = [
        'nome',
        'descricao',
    ];

    /** Uma categoria possui muitos produtos */
    public function produtos(): HasMany
    {
        // Se a FK na tabela products for category_id, especifique no 2º parâmetro
        return $this->hasMany(Produto::class, 'category_id');
    }
}
