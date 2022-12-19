<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
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
            'rua'      => $this->faker->words(2, true),
            'numero' => $this->faker->phoneNumber(),
            'bairro' => $this->faker->streetName(),
            'cidade_id' => $this->faker-> randomElement(Cidade::pluck('id'))
        ];
    }
}
