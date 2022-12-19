<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Config>
 */
class ConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "previsao_tempo" => $this->faker->randomNumber(2),
            "taxa_entrega" => $this->faker-> randomNumber(2),
            'abertura' => $this-> faker-> dateTime("2022-11-19 08:37:17"),
            'fechamento' => $this-> faker-> dateTime($max = 'now')
        ];
    }
}
