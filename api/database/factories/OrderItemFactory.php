<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id'   => \App\Models\Order::factory(),
            'produto_id' => \App\Models\Produto::factory(),
            'quantidade' => $this->faker->numberBetween(1, 5),
            'preco_unitario' => fn (array $attrs) =>
                \App\Models\Produto::find($attrs['produto_id'])->preco,
        ];
    }
}