<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// database/factories/CategoriaFactory.php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome'       => $this->faker->unique()->word(),
            'descricao'  => $this->faker->sentence(),
        ];
    }
}

