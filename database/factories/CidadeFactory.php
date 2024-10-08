<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estado;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cidade>
 */
class CidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "descricao" => $this->faker->words(2, true),
            "estado_id" => $this->faker->randomElement(Estado::pluck('id'))
        ];
    }
}
