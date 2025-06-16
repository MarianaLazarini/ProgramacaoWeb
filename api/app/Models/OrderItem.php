<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',     // ajuste aqui se sua coluna for product_id
        'quantidade',
        'preco_unitario',
    ];

    protected $casts = [
        'preco_unitario' => 'decimal:2',
    ];

    /** Item pertence a um pedido */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /** Item pertence a um produto */
    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class, 'product_id'); // troque se for produto_id
    }
}
