<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome'       => $this->faker->words(2, true),
            'descricao'   => $this->faker->words(2, true),
            'imagem' => $this->faker->words(2, true),
            'nome_url' => $this->faker->words(2, true),
            'produtos' => $this->faker->randomNumber(1)
        ];
    }
}
