<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'categoria_id' => \App\Models\Category::factory(),  // cria categoria automática
            'nome'         => $this->faker->words(3, true),
            'descricao'    => $this->faker->paragraph(),
            'preco'        => $this->faker->randomFloat(2, 10, 500),
            'estoque'      => $this->faker->numberBetween(0, 100),
        ];
    }
}

