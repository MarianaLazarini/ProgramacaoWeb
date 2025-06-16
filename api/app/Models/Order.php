<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'valor_total',
        'status',
        'data',
    ];

    protected $casts = [
        'valor_total' => 'decimal:2',
        'data'        => 'datetime',
    ];

    /** Pedido possui muitos itens */
    public function itens(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /** Pedido pertence a um usuário */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** Acesso direto aos produtos via itens (opcional) */
    public function produtos(): HasManyThrough
    {
        return $this->hasManyThrough(
            Produto::class,     // modelo final
            OrderItem::class,   // modelo intermediário
            'order_id',         // FK em OrderItem
            'id',               // PK em Produto (padrão)
            'id',               // chave local em Order
            'product_id'        // FK em OrderItem p/ Produto
        );
    }
}
