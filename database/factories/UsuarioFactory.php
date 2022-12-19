<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
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
            'email'      => $this->faker->email(2, true),
            'senha' => $this->faker->text(),
            'cpf' => $this->faker->randomNumber(4),
            'nivel' => $this->faker->words(1, true),
            'informacao' => $this->faker->words(1, true)
        ];
    }
}
