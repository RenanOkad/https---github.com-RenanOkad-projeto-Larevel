<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome'       => $this->faker->name(2, true),
            'preco'      => $this->faker->randomFloat(),
            'imagem' => $this->faker->words(2, true),
            'nome_url' => $this->faker->words(2, true),
            'vendas' => $this->faker->randomNumber(1, true),
            'descricao_longa' => $this->faker->words(2, true),
            'categoria_id' => $this->faker-> randomElement(Categoria::pluck('id'))
        ];
    }
}
