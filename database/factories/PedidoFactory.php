<?php

namespace Database\Factories;

use App\Models\Config;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
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
            'tipoPedido'      => $this->faker->words(2, true),
            'valorTotal' => $this->faker->randomFloat(),
            'descricao_longa' => $this->faker->words(3, true),
            'config_id' => $this->faker-> randomElement(Config::pluck('id')),
            'usuario_id' => $this->faker-> randomElement(Usuario::pluck('id'))
        ];
    }
}
