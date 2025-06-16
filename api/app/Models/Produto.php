<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produto extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'category_id',   // FK
        'nome',
        'descricao',
        'preco',
        'estoque',       // caso exista na migration
        'imagem',
    ];

    // Converte preço para decimal(2) automaticamente
    protected $casts = [
        'preco' => 'decimal:2',
    ];

    /** Produto pertence a uma categoria */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }

    /** Produto aparece em muitos itens de pedido (opcional) */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
