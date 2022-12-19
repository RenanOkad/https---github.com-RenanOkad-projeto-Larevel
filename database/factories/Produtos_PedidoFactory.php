<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Produtos_PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'produto_id'       => $this->faker-> randomElement(Produto::pluck('id')),
            'pedido_id'      => $this->faker-> randomElement(Pedido::pluck('id')),
            'valor' => $this->faker->randomFloat(1, false),
            'qtd' => $this->faker->randomNumber(1, true)
        ];
    }
}
